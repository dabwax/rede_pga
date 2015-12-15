<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\LoginForm;
use Cake\ORM\TableRegistry;

class AuthenticationController extends AppController
{
  public $protected_area = false;

  public function initialize()
  {
    if($this->request->params['action'] == 'edit')
    {
      $this->protected_area = true;
    }

    parent::initialize();
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

  public function login()
  {
    $login = new LoginForm();

    $this->set(compact("login"));

    if($this->request->is("post"))
    {
      $form = $this->request->data;

      // Role
      $role = explode(".", $form['role']);
      $role_table = $role[0];
      $role_role = $role[1];

      // Carrega o model selecionado
      $role_model = TableRegistry::get(ucfirst($role_table));


      if($role_table == 'users')
      {
        $where = [];
      } else {
        $where = ['role' => $role_role];
      }

      // Busca no model usuários deste role
      $find = $role_model->find()->where($where)->all()->toArray();

      // Itera os usuários para ver se existe algum com este usuário
      $username = $form['username'];
      $password = $form['password'];

      $user_found = false;
      foreach($find as $f)
      {
        if($f->username == $username && $f->password == $password)
        {
          $user_found = $f;
        }
      }


      if($user_found)
      {
            $user_found->role_table = ucfirst($role_table);
            $user_found->role_role = $role[1];
            $this->Cookie->write('admin_logged', $user_found);
            $this->Flash->success("Seja bem-vindo!");

            if(!empty($f->clinical_condition))
            {
              $this->Flash->success("Seja bem-vindo querido aluno(a)!");
              return $this->redirect('/');
            }
            
            return $this->redirect('/feed/listar');
      } else {
        $this->Flash->error("Usuário e/ou senha inválidos.");
        return $this->redirect('/login');
      }

    }
  }

  public function logout()
  {
    $this->Cookie->delete("admin_logged");
    $this->Flash->success("Nos vemos em breve! :)");
    return $this->redirect('/login');
  }

}
