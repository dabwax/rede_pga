<?php

namespace Cms\Controller;

use App\Controller\AppController as BaseController;
use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;

class AppController extends BaseController
{
	public $protected_area = true;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
      parent::initialize();
      
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->loadComponent('Upload');


        // Se o controller for uma área restrita
       if($this->protected_area == true) {
           // Recupera a sessão de admin
           $admin_logged = $this->Cookie->read("cms_logged");

           // Se não houver sessão de admin, redireciona o usuário para o login
           if(empty($admin_logged))
           {
               $this->Flash->error("Você não tem permissão para acessar esta página! Faça seu login.");
               return $this->redirect('/cms/authentication/login');
           } else {
             $this->set(compact("admin_logged"));
           } // fim - return
       } else {
        
       } // fim - areaRestrita

       $table_users = TableRegistry::get("Users");
       $g_users = $table_users->find()->all();
       $current_user_selected = $this->getCurrentUser();
       
       $this->set(compact("g_users", "current_user_selected"));

      Time::$defaultLocale = 'pt-BR';
      Time::setToStringFormat('dd/MM/YYYY');
    }

    public function getCurrentUser()
    {
      $current_user_selected = $this->Cookie->read("current_user_selected");

      if(empty($current_user_selected))
      {
        $table = TableRegistry::get("Users");

        $user = $table->find()->first();

        $this->Cookie->write('current_user_selected', $user);

        $current_user_selected = $this->Cookie->read("current_user_selected");
      }

      return $current_user_selected; 
    }
}
