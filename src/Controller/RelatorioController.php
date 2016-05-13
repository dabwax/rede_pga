<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class RelatorioController extends AppController
{

  public function visualizar($id = null) {

      $this->Auth->allow();

      $charts = TableRegistry::get("Charts");
      $reports = TableRegistry::get("Reports");
      $report = $reports->get($id);
      $where = [
        'Charts.user_id' => $report->user_id
      ];
      $charts = $charts->find()->distinct()->where($where)->contain(['ChartSeries'])->all();

      $user_id = $report->user_id;

      $this->set(compact("charts", "user_id"));

      $this->set("report", $report);
      
    $this->render('/Evolucao/index');
  }
}