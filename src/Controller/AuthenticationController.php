<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\LoginForm;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Network\Http\Client;
use Mailgun\Mailgun;

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


      # Instantiate the client.
      $client = new \Http\Adapter\Guzzle6\Client();
      $mailgun = new \Mailgun\Mailgun('key-9rx3rxgdw21u5hphx9bvft18-1urrrg0', $client);
      $domain = "sandbox12317.mailgun.org";


      $template_emails = TableRegistry::get("TemplateEmails");
      $html = $template_emails->get(1);
      $html = $html->content;
      $html = str_replace('{{user}}', $user->full_name, $html);
      $html = str_replace('{{password}}', $this->request->data['new_password'], $html);

      # Make the call to the client.
      $result = $mailgun->sendMessage($domain, array(
          'from'    => 'PEP Plataforma de Ensino Personalizado <nao-responda@0e1dev.com>',
          'to'      => '<' . $user->username . '>',
          'subject' => '[PEP] Alteração de Senha',
          'html'    => $html
      ));

      return $this->redirect(['action' => 'trocar_senha']);
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
            $ator->user = $users->get($ator->user_id);

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
         'table' => $tmp
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
    // se houver requisição POST
    if ($this->request->is('post')) {

      // Tenta identificar o usuário
      $user = $this->Auth->identify();

      if ($user) {

        // inclui informações extras de login
        $ator_selecionado = $this->detectarAtor();
        $user['table'] = $ator_selecionado['table'];

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
        unset($atores_disponiveis['Users']);

        $atores = [];

        // itera atores disponiveis e armazena o estudante (bug por causa do containq foi resolvido na gambiarra = marra)
        foreach($atores_disponiveis as $key => $val) :
          if(!empty($val)) :
            foreach($val as $ator) :

              // gambiarra aqui
              $ator->user = $users->get($ator->user_id);

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
