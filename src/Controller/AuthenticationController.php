<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\LoginForm;
use Cake\ORM\TableRegistry;

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
          // redireciona
          return $this->redirect($this->Auth->redirectUrl());
        } else {
          // redireciona
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
