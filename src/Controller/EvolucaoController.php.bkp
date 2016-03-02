<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EvolucaoController extends AppController
{
	public $protected_area = true;

	public function listar()
    {
    	// Filtro
    	$filtering 	= false;
    	$where 	= [];
    	$start 		= $this->request->query('start');
    	$finish 	= $this->request->query('finish');

    	// Se tiver sido preenchido alguma data no filtro
    	if(!empty($start) || !empty($finish))
    	{
    		$filtering = true;

    		// Data Início
    		if(!empty($start))
    		{
    			$start 						= \DateTime::createFromFormat("d/m/Y", $start);

    			$where['Lessons.date >='] 	= $start->format("Y-m-d");
    		}

    		// Data Fim
    		if(!empty($finish))
    		{
    			$finish 					= \DateTime::createFromFormat("d/m/Y", $finish);

    			$where['Lessons.date <='] 	= $finish->format("Y-m-d");
    		}
    	}

    	// Objetos de tabela
		$charts_table 					= TableRegistry::get("Charts");
		$chart_inputs_table 			= TableRegistry::get("ChartInputs");
		$lessons_table 					= TableRegistry::get("Lessons");
		$lesson_entries_table 			= TableRegistry::get("LessonEntries");

		// Sessão de admin
    	$admin_logged 	= $this->Cookie->read("admin_logged");
    	$user_id 		= $admin_logged['user_id'];

		// Busca todos os gráficos do estudante
		$charts 	= $charts_table->buscaGraficos($user_id, $admin_logged);

		// Busca todas as entradas de registros de aula
		$lessons 	= $lessons_table->buscaAulas($user_id, $where);

		// Itera os gráficos disponíveis
		foreach($charts as $chart)
		{

			$chart->total_lessons = count($lessons);
					
			// 1 - Verificar qual o tipo do gráfico
			switch ($chart->type) {
				// Linha
				case 'line':

					// 2 - Determinar as categorias do eixo X (São as matérias)
					$categories 	= $chart->getCategories();

					// 3 - Determinar as séries (São os inputs)
					$series 		= $chart->getSeries();

					// 4 - Calcular o valor total de cada input
					$total_by_input = $chart->getTotalByInput($lessons);

					// 5 - Calcular o valor total de cada matéria
					$total_by_theme = $chart->getTotalByTheme($lessons);

					// 5.5 - Calcular o valor total de cada mês
					$total_by_month = $chart->getTotalByMonth($lessons);

					// 6 - Gera as séries no formato do gráfico
					$chart_series = [];

					foreach($series as $serie)
					{
						$tmp = ['name' => $serie, 'data' => []];

						foreach($categories as $category)
						{
							$tmp['data'][] = @$total_by_month[$category][$serie];
						}
						$chart_series[] = $tmp;
					}

					/// 7 - Configurações finais do gráfico de coluna
					$options = [
						'options' => [
							'chart' => [
								'type' => 'line'
							],
							'title' => [
								'text' => $chart->name
							],
							'xAxis' => [
								'categories' => $categories,
							],
							'credits' => [
								'enabled' => false
							],
						],
						'series' => $chart_series
					];

					$chart->front_end = $options;

					break;
				// Coluna
				case 'column':
				case 'bar':

					// 2 - Determinar as categorias do eixo X (São as matérias)
					$categories = $chart->getCategories();

					// 3 - Determinar as séries (São os inputs)
					$series = $chart->getSeries();

					// 4 - Calcular o valor total de cada input
					$total_by_input = $chart->getTotalByInput($lessons);

					// 5 - Calcular o valor total de cada matéria
					$total_by_theme = $chart->getTotalByTheme($lessons);

					// 6 - Gera as séries no formato do gráfico
					$chart_series = [];

					foreach($series as $serie)
					{
						$tmp = ['name' => $serie, 'data' => []];

						foreach($categories as $category)
						{
							if(!empty($total_by_theme[$serie][$category]))
							{
								$tmp['data'][] = ($total_by_theme[$serie][$category]);
							}
						}
						$chart_series[] = $tmp;
					}

					/// 7 - Configurações finais do gráfico de coluna
					$options = [
						'options' => [
							'chart' => [
								'type' => $chart->type
							],
							'title' => [
								'text' => $chart->name
							],
							'xAxis' => [
								'categories' => $categories,
							],
							'plotOptions' => [
								'column' => [
									'stacking' => 'percent'
								]
							],
							'credits' => [
								'enabled' => false
							],
						],
						'series' => $chart_series
					];

					$chart->front_end = $options;

					break;
				// Pizza
				// Donut
				case 'pie':
				case 'donut':

					// 2 - Determinar as categorias do eixo X (São as matérias)
					$categories = $chart->getCategories();

					// 3 - Determinar as séries (São os inputs)
					$series = $chart->getSeries();

					// 4 - Calcular o valor total de cada input
					$total_by_input = $chart->getTotalByInput($lessons);

					// 5 - Calcular o valor total de cada matéria
					$total_by_theme = $chart->getTotalByTheme($lessons);

					// 6 - Gera as séries no formato do gráfico
					$chart_series = [];
					
					foreach($series as $serie)
					{
						$y = 0;

						foreach($total_by_input[$serie] as $theme => $value)
						{
							if(in_array($theme, $categories))
							{
								$y = $y + $value;
							}
						}

						$tmp = ['name' => $serie, 'y' => floatval($y)];

						$chart_series[] = $tmp;
					}

					/// 7 - Configurações finais do gráfico de coluna
					$options = [
						'options' => [
							'chart' => [
								'type' => 'pie'
							],
							'title' => [
								'text' => $chart->name
							],
							'plotOptions' => [
								'pie' => [
									'dataLabels' => [
										'enabled' => true
									]
								]
							],
							'credits' => [
								'enabled' => false
							],
							'tooltip' => [
								'pointFormat' => '{series.name}: <b>{point.y} ({point.percentage:.1f}%)</b>'
							],
						],
						'series' => [[
							'name' => 'Total',
							'colorByPoint' => true,
							'data' => $chart_series
						]]
					];

					if($chart->type == "donut")
					{
						$options['series'][0]['innerSize'] = '70%';
					}

					$chart->front_end = $options;

					break;
				case 'numero_absoluto':

					$chart->total_by_input = $chart->getTotalByInput($lessons);

					$chart->chart_inputs = $chart_inputs_table->find()->where(['chart_id' => $chart->id])->contain(['Inputs'])->all();

					break;
				default:
					throw new \Exception("Tipo de gráfico não configurado." . $chart->type);
					break;
			}

			if(!empty($options))
			{
				$chart->front_end = $options;
			}
		}

		$this->set(compact("charts", "lessons", "filtering"));
    }

}
