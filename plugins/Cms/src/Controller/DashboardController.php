<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{
    public $protected_area = true;

  public function set_current_user()
  {
    $table_users = TableRegistry::get("Users");
    $g_users = $table_users->find()->all();

    $cookie_current_user_selected = $this->Cookie->read('current_user_selected');

    $this->set(compact("g_users", "cookie_current_user_selected"));
  }

/**
 * Action utilizada para definir qual é o estudante atual.
 */
  public function set_current_user_selected($user_id = null)
  {
    $cookie_current_user_selected = $this->Cookie->read('current_user_selected');
    
    $user_id = (empty($user_id)) ? intval($this->request->query('user_id')) : $user_id;

    $table = TableRegistry::get("Users");

    $user = $table->get($user_id);

    $this->Cookie->write('current_user_selected', $user);

    $this->Flash->success("O estudante foi alterado para {$user->full_name}.");


    return $this->redirect('/cms');
    $this->autoRender = false;
  }

  public function index()
  {
    $table_users = TableRegistry::get("Users");
    $g_users = $table_users->find()->all();

    $cookie_current_user_selected = $this->Cookie->read('current_user_selected');

    $this->set(compact("g_users", "cookie_current_user_selected"));
  }

}