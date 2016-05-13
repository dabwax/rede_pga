<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EvolucaoController extends AppController
{

	public function index()
	{
		if($this->request->is("get")) {
			$charts = TableRegistry::get("Charts");
			$where = [
				'Charts.user_id' => $this->userLogged['user_id']
			];
			$charts = $charts->find()->distinct()->where($where)->contain(['ChartSeries'])->all();

	    $user_id = $this->userLogged['user_id'];

			$this->set(compact("charts", "user_id"));
		} else {

			$tmp = TableRegistry::get("Reports");
			$entity = $tmp->newEntity($this->request->data);

			$tmp->save($entity);

			return $this->redirect('/relatorio/visualizar/' . $entity->id);

			$this->autoRender = false;
		}
	}
}
