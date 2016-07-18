<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EvolucaoController extends AppController
{

	public function index($tab_id = null)
	{
		if($this->request->is("get")) {
			$charts = TableRegistry::get("Charts");
			$chart_tabs = TableRegistry::get("ChartTabs");
			$chart_absolutes = TableRegistry::get("ChartAbsolutes");
			$LessonEntries = TableRegistry::get("LessonEntries");
			$where = [
				'Charts.user_id' => $this->userLogged['user_id']
			];
			$charts = $charts->find()->distinct()->where($where)->order(['Charts.position' => 'ASC'])->contain(['ChartSeries'])->all();
			
			$where = [
				'ChartTabs.user_id' => $this->userLogged['user_id']
			];
			$tabs = $chart_tabs->find()->distinct()->where($where)->all();

			// Se tiver sido selecionado uma aba busca os dados da aba
			if(!empty($tab_id)) {
				$where = [
					'ChartTabs.id' => $tab_id
				];
				$tab = $chart_tabs->find()->distinct()->where($where)->first();
				$tabActors = json_decode($tab->actors);
				$models = [];

				foreach($tabActors as $tabActor) {
					$explode = explode("_", $tabActor);
					$models[] = [
						'model_id' => $explode[0],
						'model' => $explode[1]
					];
				}

				$tmpModels = [];
				$tmpModelsId = [];

				foreach($models as $model) {
					$tmpModels[] = $model['model'];
					$tmpModelsId[] = $model['model_id'];
				}
			}

			$where = [
				'ChartAbsolutes.user_id' => $this->userLogged['user_id']
			];
			$absolutes = $chart_absolutes->find()->distinct()->where($where)->all();

			foreach($absolutes as $abs) {

				// Buscar todas LessonEntries com este input
				$where = [
					'LessonEntries.user_id' => $abs->user_id,
					'LessonEntries.input_id' => $abs->input_id,
				];

				// Se estiver na aba filtra pelos atores da aba
				if(!empty($models)) {

					$where['LessonEntries.model IN'] = $tmpModels; 
					$where['LessonEntries.model_id IN'] = $tmpModelsId; 
				}
				$tmp = $LessonEntries->find()->where($where)->all();

				$totalAulas = [];
				$total = 0;

				foreach($tmp as $entry) {
					if(empty($totalAulas[$entry->lesson_id])) {
						$totalAulas[$entry->lesson_id] = $entry->lesson_id;
						$total = $total + $entry->value;
					}
				}

				if($total > 0) {
					if($abs->type == "media") {
						$total = $total / sizeof($totalAulas);
					}
				}

				$abs->value = floor($total);
			}

	    $user_id = $this->userLogged['user_id'];

			$this->set(compact("tabs", "charts", "user_id", "absolutes", "tab_id"));
		} else if($this->request->is(["post", "put"])) {

			$this->autoRender = false;
			$tmp = TableRegistry::get("Reports");
			$entity = $tmp->newEntity($this->request->data);

			$tmp->save($entity);

			return $this->redirect('/relatorio/visualizar/' . $entity->id);

		}
	}
}
