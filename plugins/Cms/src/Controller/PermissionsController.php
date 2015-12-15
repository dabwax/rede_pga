<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class PermissionsController extends AppController
{

	public function index()
    {
    	$table = TableRegistry::get("Permissions");
    	$permissions = [
    		'Protectors' => false,
    		'Schools' => false,
    		'Therapists' => false,
    		'Users' => false,
    	];

    	$all = $table->find()->all();

    	foreach($all as $a)
    	{
    		$permissions[$a->model] = $a;
    	}

    	$this->set(compact("permissions"));
    }

    public function update($permission_id, $value, $column)
    {
    	$table = TableRegistry::get("Permissions");

    	$get = $table->get($permission_id);

		$value = ($value == 0) ? null : 1;

    	$get->$column = $value;

    	$table->save($get);

    	$this->Flash->success("Atualizado.");

    	return $this->redirect('/cms/permissions');
    }

}
