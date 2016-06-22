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
			$chart_tabs = TableRegistry::get("ChartTabs");
			$where = [
				'Charts.user_id' => $this->userLogged['user_id']
			];
			$charts = $charts->find()->distinct()->where($where)->contain(['ChartSeries'])->all();
			$where = [
				'ChartTabs.user_id' => $this->userLogged['user_id']
			];
			$tabs = $chart_tabs->find()->distinct()->where($where)->all();

	    $user_id = $this->userLogged['user_id'];

			$this->set(compact("tabs", "charts", "user_id"));
		} else {

			$tmp = TableRegistry::get("Reports");
			$entity = $tmp->newEntity($this->request->data);

			$tmp->save($entity);

			return $this->redirect('/relatorio/visualizar/' . $entity->id);

			$this->autoRender = false;
		}
	}
}
