<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

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
        $this->loadComponent('Upload');
        $this->loadComponent('Cookie');
        $this->loadComponent('Irado');

        $permissions = $this->getPermissions();

        $this->set(compact("permissions"));

        // Se o controller for uma área restrita
       if($this->protected_area == true) {
           // Recupera a sessão de admin
           $admin_logged = $this->getAdminLogged();


           // Se não houver sessão de admin, redireciona o usuário para o login
           if(empty($admin_logged))
           {
               $this->Flash->error("Você não tem permissão para acessar esta página! Faça seu login.");
               return $this->redirect('/login');
           } else {

            if(!empty(@$admin_logged['clinical_condition']))
            {
              $this->layout = "aluno";
            }

            $this->configAcl();

            $get_atores = $this->getAtores();

            $this->set(compact("admin_logged", "get_atores"));
           } // fim - return
       } // fim - areaRestrita

      Time::$defaultLocale = 'pt-BR';
      Time::setToStringFormat('dd/MM/YYYY');
    }

    public function getPermissions()
    {

      // Permissões - ACL
      $permissions = [
        'Protectors' => false,
        'Schools' => false,
        'Therapists' => false,
        'Users' => false,
      ];

      $table = TableRegistry::get("Permissions");

      $all = $table->find()->all();

      foreach($all as $a)
      {
        $permissions[$a->model] = $a;
      }

      return $permissions;
    }

    public function configAcl()
    {
      $permissions = $this->getPermissions();

      $admin_logged = $this->Cookie->read("admin_logged");

      if(!empty($admin_logged['role_table']) && $this->request->params['plugin'] != "Cms")
      {
        
        switch ($this->request->params['controller']) {
          case 'BatePapo':

            if(empty($permissions[$admin_logged['role_table']]->bate_papo)) :

              $this->Flash->error("Você não tem permissão para acessar esta página.");
              return $this->redirect('/');

            endif;
            
            # code...
            break;
          case 'Evolucao':

            if(empty($permissions[$admin_logged['role_table']]->evolucao)) :

              $this->Flash->error("Você não tem permissão para acessar esta página.");
              return $this->redirect('/');

            endif;
            
            # code...
            break;

          case 'Exercicios':

            if(empty($permissions[$admin_logged['role_table']]->exercicios)) :

              $this->Flash->error("Você não tem permissão para acessar esta página.");
              return $this->redirect('/');

            endif;
            
            # code...
            break;
          case 'Feed':

            if(empty($permissions[$admin_logged['role_table']]->feed)) :


              if(empty(@$admin_logged['clinical_condition']))
              {
                $this->Flash->error("Você não tem permissão para acessar esta página.");
                return $this->redirect('/');
              }
            endif;
            
            # code...
            break;
          case 'Registros':

            if(empty($permissions[$admin_logged['role_table']]->input)) :

              $this->Flash->error("Você não tem permissão para acessar esta página.");
              return $this->redirect('/');

            endif;
            
            # code...
            break;
          
          default:
            # code...
            break;
        }
      }
    }

    /**
     * Função para recuperar todos os autores do usuário logado.
     */
    public function getAtores()
    {   
      $protectors_table = TableRegistry::get("Protectors");
      $schools_table = TableRegistry::get("Schools");
      $tutors_table = TableRegistry::get("Tutors");
      $users_table = TableRegistry::get("Users");
      $therapists_table = TableRegistry::get("Therapists");

      $admin_logged = $this->Cookie->read("admin_logged");
      $current_user_selected = $this->Cookie->read("current_user_selected");

      if(empty($admin_logged['user_id']) && !empty($admin_logged['id']))
      {
        $admin_logged['user_id'] = $admin_logged['id'];

        $this->Cookie->write("admin_logged", $admin_logged);
      }

      if(!empty($current_user_selected))
      {
        $admin_logged['user_id'] = $current_user_selected['id'];
      }

      $where = [
        'user_id' => $admin_logged['user_id']
      ];

      $atores = [
        'Protectors' => $protectors_table->find()->where($where)->all()->toArray(),
        'Schools' => $schools_table->find()->where($where)->all()->toArray(),
        'Tutors' => $tutors_table->find()->where($where)->all()->toArray(),
        'Users' => $users_table->find()->where(['id' => $admin_logged['user_id']])->all()->toArray(),
        'Therapists' => $therapists_table->find()->where($where)->all()->toArray(),
      ];

      return $atores;
    }

    public function getAdminLogged()
    {
      $admin_logged = $this->Cookie->read("admin_logged");

      if(empty($admin_logged['user_id']))
      {
        $admin_logged['user_id'] = $admin_logged['id'];
      }

      $users_table = TableRegistry::get("Users");

      if(!empty($admin_logged['user_id']))
      {
        $admin_logged['user'] = $users_table->get($admin_logged['user_id']);
      }
      
      return $admin_logged;
    }

}
