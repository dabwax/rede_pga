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

  public function config_actors()
  {

    // generate labels
    $labels = [
       'Protectors' => 'Pai / Mãe'
      ,'Schools' => 'Mediador / Coordenador'
      ,'Therapists' => 'Terapeuta'
      ,'Tutors' => 'Tutor'
    ];

    // get all actors from this student
    $actors = $this->getAtores();

    $instituitions = TableRegistry::get("instituitions");
    $instituitions = $instituitions->find('list')->all();

    // send to view
    $this->set(compact("labels", "actors", "instituitions"));

    // if POST request
    if($this->request->is(["post", "put"])) {

      // shortcut
      $data = $this->request->data;

      // Se não tiver sido preenchido nenhuma senha, remove o campo dela
      // para nao bugar e atualizar a senha para vazio
      if(strlen($data['password']) <= 0) {
        unset($data['password']);
      }

      // generates model object
      $table = TableRegistry::get($data['model']);

      // generates entity object
      $entity = $table->newEntity();

      // if has any ID, update it
      if(!empty($data['id']))
      {
        $entity = $table->get($data['id']);
      }

      $entity = $table->patchEntity($entity, $data);

      if(!empty($data['instituition_id']))
      {

        $table2 = TableRegistry::get("Instituitions");

        // start - get instituition name input and converts to ID
        $tmp = $table2->find()->where(['name LIKE' => '%' . $data['instituition_id'] . '%' ])->first();

        if($tmp)
        {
            $entity->instituition_id = $tmp->id;
        } else {
            $tmp = $table2->newEntity(['name' => $data['instituition_id'] ]);
            $table2->save($tmp);

            $entity->instituition_id = $tmp->id;
        }
        // end - get instituition name

      }

      // save entity
      $table->save($entity);

      // alert
      $this->Flash->success($labels[$data['model']] . ' foi atualizado!');

      // redirect
      return $this->redirect(['action' => 'config_actors', '#' => 'c_' . $data['model'] ]);
    } // end POST request

  }
}