<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EvolucaoController extends AppController
{

	public function index()
	{
		$charts = TableRegistry::get("Charts");
		$where = [
			'Charts.user_id' => $this->userLogged['user_id']
		];
		$charts = $charts->find()->distinct()->where($where)->contain(['ChartSeries'])->all();

    $user_id = $this->userLogged['user_id'];

		$this->set(compact("charts", "user_id"));
	}
}
