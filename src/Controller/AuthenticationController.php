<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\LoginForm;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Network\Http\Client;
use Mailgun\Mailgun;
use Cake\Routing\Router;

class AuthenticationController extends AppController
{

  public function initialize()
  {
    parent::initialize();

    // vamos verificar qual o modelo que o AuthComponent deverá carregar
    // isso é baseado na escolha de ator do usuário
    $ator_selecionado = $this->detectarAtor();

    if(!empty($ator_selecionado['table'])) {
      $this->Auth->config('authenticate', [
        'Form' => [
           'userModel' => $ator_selecionado['table']
          ,'finder' => 'auth'
        ],
      ]);
    }
  }

  public function confirm_reset_password() {

    $token = unserialize(base64_decode($_GET['token']));

    if(empty($token)) {
        $this->Flash->error("Token inválido.");
        return $this->redirect(['action' => 'login']);
    }

    if($this->request->is(["post", "put"])) {

      // Validar data de expiração
      $now              = new \DateTime('now');
      $expiration_time  = $token['expiration_time'];

      $expiration_time->modify('+1 day');

      if($expiration_time > $now) {
        // echo "Data válida";

        // Buscar atores pelo username
        $where = ['username' => $token['username']];
        $atores_disponiveis = $this->getAtores($where);

        // Alterar senha de cada um
        foreach($atores_disponiveis as $model => $actors) {

          foreach($actors as $actor) {

            $table = TableRegistry::get($model);

            // Vamos atualizar a senha do usuário
            $actor->password = (new DefaultPasswordHasher)->hash($this->request->data["new_password"]);

            // Salvamos o usuário
            $table->save($actor);
          }
        }

        // Alerta
        $this->Flash->success("A senha da sua conta foi alterada com sucesso.");

        // Redireciona pra home
        return $this->redirect(['action' => 'login']);

      } else {
        $this->Flash->error("Este link já expirou. Solicite novamente pelo site.");
        return $this->redirect(['action' => 'login']);
      }
    }

  }

  public function reset_password() {
    // Se houver requisição POST
    if($this->request->is(["post", "put"])) {

      // Pesquisa ator
      unset($this->request->data['role']);
      $where = $this->request->data;
      $atores_disponiveis = $this->getAtores($where);

      $tem_ator = false;

      foreach($atores_disponiveis as $modelo => $atores) {
        $tem_ator = (!empty($atores)) ? true : $tem_ator;
      }

      // Se tiver ator
      if($tem_ator) {

        $hash = base64_encode(serialize([
          'expiration_time' => new \DateTime('now'),
          'username' => $this->request->data['username']
        ]));

        // Enviar e-mail com URL com hash
        // Disparo de e-mail usando o template de trocar a senha
        $extra_data = [
          'user' => $this->request->data['username'],
          'url' => Router::url( ['controller' => 'authentication', 'action' => 'confirm_reset_password', '?' => ['token' => $hash] ], true )
        ];

        $user = (object) [
          'full_name' => $this->request->data['username'],
          'username' => $this->request->data['username']
        ];

        if($this->dispararEmail(5, $user, $extra_data )) {
          $this->Flash->success("E-mail com página para alterar senha enviado com sucesso.");
          return $this->redirect(['action' => 'login']);
        }
      }

      // Se não tiver ator
      if(!$tem_ator) {
        $this->Flash->success("Não há atores com este e-mail.");
        return $this->redirect(['action' => 'login']);
      }


    } else {
        $this->Flash->success("Requisição inválida.");
      return $this->redirect(['action' => 'login']);
    }
  }

  /**
   * Página para trocar senha.
   */
  public function trocar_senha() {

    // Se houver requisição POST
    if($this->request->is(["post", "put"])) {

      // Carregamos a entidade de usuários
      // Busca o usuário atual
      $table = TableRegistry::get($this->userLogged['table']);
      $user = $table->get($this->userLogged['id']);

      // Vamos atualizar a senha do usuário
      $user->password = (new DefaultPasswordHasher)->hash($this->request->data["new_password"]);

      // Salvamos o usuário
      $table->save($user);

      // Enviamos um e-mail com a nova senha como forma de backup

      // Alertamos ele
      $this->Flash->success("Sua senha foi alterada.");
      $this->Flash->success("Enviamos um e-mail com ela para você não perdê-la.");

      // Disparo de e-mail usando o template de trocar a senha
      $extra_data = [
        'new_password' => $this->request->data["new_password"]
      ];
      if($this->dispararEmail(1, $user, $extra_data )) {
        return $this->redirect(['action' => 'trocar_senha']);
      }
    }
  }

/**
 * Página de escolha de perfil.
 */
  public function trocar_perfil($model = null, $id = null)
  {
    // se ainda nao selecionar
    if(empty($model) && empty($id)) {
      $users = TableRegistry::get("Users");
      $username = ($this->userLogged['username']);

      // Buscar em todos os atores que tenham este username
      $where = ['username' => $username];
      $atores_disponiveis = $this->getAtores($where);

      // remove dado errado
      unset($atores_disponiveis['Users']);

      $atores = [];

      // itera atores disponiveis e armazena o estudante (bug por causa do containq foi resolvido na gambiarra = marra)
      foreach($atores_disponiveis as $key => $val) :
        if(!empty($val)) :
          foreach($val as $ator) :
            // gambiarra aqui

            if(!empty($ator->user_id)) {
              $ator->user = $users->get($ator->user_id);
            } else {
              $ator->user = $users->get($ator->id);
            }

            $ator->model = $key;

            $atores[] = $ator;
          endforeach;
        endif;
      endforeach;

      // envia para view
      $this->set(compact("atores"));
    // se tiver selecionado um perfil
    } else {
      $entity = TableRegistry::get($model);
      $entity = $entity->get($id);

      $entity->table = $model;

      $this->Auth->setUser($entity->toArray());

      $this->Flash->success("Perfil alterado.");
      return $this->redirect("/");
    }

    $this->set("userLogged", false);
  }

  public function edit()
  {
    $this->protected_area = true;
    $admin_logged = $this->Cookie->read("admin_logged");

    // cria o model do usuário
    // dá um get no usuário
    // se for post, salva os dados novos do usuário
    // desloga usuário
    // alerta
    $table = TableRegistry::get($admin_logged['role_table']);
    $user = $table->get($admin_logged['id']);

    if($this->request->is(['post', 'put']))
    {

      if(empty($this->request->data['password']))
      {
        unset($this->request->data['password']);
      }

      $user = $table->patchEntity($user, $this->request->data);
      $table->save($user);

      $this->Cookie->delete("admin_logged");
      $this->Flash->success("Seus dados foram atualizados. Você foi deslogado.");
      return $this->redirect('/login');
    }

    $this->set(compact("user"));
  }

  // função utilizada para detectar o table/role do ator selecionado
  private function detectarAtor() {
    $tmp = @$this->request->data['role'];

    if(!empty($this->request->data['role'])) {
      return [
         'table' => ucfirst($tmp)
        ,'role' => ''
        ,'model' => TableRegistry::get(ucfirst($tmp))
      ];
    } else {
      return false;
    }
  }

/**
 * Action de login.
 * Varia de acordo com o ator.
 */
  public function login()
  {

      $this->Auth->logout();

    // se houver requisição POST
    if ($this->request->is('post')) {

      // Tenta identificar o usuário
      $user = $this->Auth->identify();

      if ($user) {

        // inclui informações extras de login
        $ator_selecionado = $this->detectarAtor();
        $user['table'] = ucfirst($ator_selecionado['table']);

        // autentica
        $this->Auth->setUser($user);

        // gambiarra pra corrigir bug abaixo
        $this->userLogged = $user;

        // verifica se o usuario logado tem mais de um perifl pra selecionar.
        // se tiver, manda ele pra pagina de selecionar perfil.
        $users = TableRegistry::get("Users");
        $username = ($this->userLogged['username']);

        // Buscar em todos os atores que tenham este username
        $where = ['username' => $username];
        $atores_disponiveis = $this->getAtores($where);

        // remove dado errado
        if($ator_selecionado['table'] != 'Users') {
          unset($atores_disponiveis['Users']);
        }

        $atores = [];

        // itera atores disponiveis e armazena o estudante (bug por causa do containq foi resolvido na gambiarra = marra)
        foreach($atores_disponiveis as $key => $val) :
          if(!empty($val)) :
            foreach($val as $ator) :

              // gambiarra aqui
              if(!empty($ator->user_id)) {
                $ator->user = $users->get($ator->user_id);
              } else {
                $ator->user = $users->get($ator->id);
              }
              $ator->model = $key;

              $atores[] = $ator;
            endforeach;
          endif;
        endforeach;

        if(sizeof($atores) == 1) {

          // Altera o campo de último login
          $table = TableRegistry::get($this->userLogged['table']);
          $currentUser = $table->get($this->userLogged['id']);

          // Se for o primeiro login do usuário, redireciona ele para a página de alterar senha
          if(empty($currentUser->lastLogin)) {

            // Atualiza este primeiro login como se fosse o último
            $currentUser->lastLogin = new \DateTime("now");

            $table->save($currentUser);

            // Alerta
            $this->Flash->success("Seja bem-vindo ao PEP! Esta é sua 1ª visita ao site. Recomendamos que você altere sua senha.");

            // Redirecionamento
            return $this->redirect(['action' => 'trocar_senha']);
          }

          // Atualiza o último login do usuário
          $currentUser->lastLogin = new \DateTime("now");

          // Salva
          $table->save($currentUser);

          // Alerta
          $this->Flash->success("Seja bem-vindo ao PEP!");

          // Redireciona
          return $this->redirect($this->Auth->redirectUrl());
        } else {
          // Redireciona
          $this->Flash->success("Selecione um perfil para se logar.");

          return $this->redirect(['action' => 'trocar_perfil']);
        }
      } else {
        $this->Flash->error(__('E-mail ou senha inválidos. Tente novamente.'), [
            'key' => 'auth'
        ]);
        return $this->redirect(['action' => 'login']);
      } // $user

    } // POST
  } // login()

  public function logout()
  {
    $this->Flash->success("Nos vemos em breve! :)");
    return $this->redirect($this->Auth->logout());
  }

}
