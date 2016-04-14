<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{
    public $protected_area = true;


  public function index()
  {
    $table_users = TableRegistry::get("Users");
    $g_users = $table_users->find()->all();

    $cookie_current_user_selected = $this->Cookie->read('estudanteAtual');

    $this->set(compact("g_users", "cookie_current_user_selected"));
  }

}
