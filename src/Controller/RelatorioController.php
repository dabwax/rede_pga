<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class RelatorioController extends AppController
{

  public function visualizar($id = null) {

      $this->Auth->allow();
      $charts = TableRegistry::get("Charts");
      $chart_tabs = TableRegistry::get("ChartTabs");
      $chart_absolutes = TableRegistry::get("ChartAbsolutes");
      $reports = TableRegistry::get("Reports");
      $report = $reports->get($id);
      $where = [
        'Charts.user_id' => $report->user_id
      ];
      $charts = $charts->find()->distinct()->where($where)->contain(['ChartSeries'])->all();
      $where = [
        'ChartTabs.user_id' => $report->user_id
      ];
      $tabs = $chart_tabs->find()->distinct()->where($where)->all();
      $where = [
        'ChartAbsolutes.user_id' => $this->userLogged['user_id']
      ];
      $absolutes = $chart_absolutes->find()->distinct()->where($where)->all();

      $user_id = $report->user_id;

      $this->set(compact("charts", "user_id", "tabs"));

      $this->set("report", $report);

    $this->render('/Evolucao/index');
  }
}