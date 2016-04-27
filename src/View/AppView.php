<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\Network\Http\Client;

/**
 * App View class
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * For e.g. use this method to load a helper for all views:
     * `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
    }

    public function formatarGrafico($chart = null, $user_id = null) {
      $default = [
        "options" => [
          "chart" => [
            "type" => $chart->type
          ],
          "plotOptions" => [
            "series" => [
              "stacking" => ""
            ],
            "pie" => [
              "cursor" => "pointer",
              "dataLabels" => [
                "enabled" => "true",
                "format" => '<b>{point.name}</b>: {point.percentage:.1f} %'
              ]
            ]
          ],
          "xAxis" => [
            "categories" => []
          ]
        ],
        "series" => [
        ],
        "title" => [
          "text" => "Gráfico de Demonstração"
        ],
        "subtitle" => [
          "text" => ""
        ],
        "credits" => [
          "enabled" => false
        ],
        "loading" => false,
        "size" => [],
        "filter_start" => (new \DateTime())->format("01/01/Y"),
        "filter_end" => (new \DateTime())->format("d/m/Y"),
        'format' => 'diario'
      ];

      if(!empty($_GET['inicio'])) {
        $chart->filter_start = $_GET['inicio'];
      }

      if(!empty($_GET['fim'])) {
        $chart->filter_end = $_GET['fim'];
      }

      if(!empty($chart->name)) {
        $default['title']['text'] = $chart->name;
      }

      if(!empty($chart->subname)) {
        $default['subtitle']['text'] = $chart->subname;
      }

      if(!empty($chart->filter_start)) {
        $default['filter_start'] = $chart->filter_start;
      }

      if(!empty($chart->filter_end)) {
        $default['filter_end'] = $chart->filter_end;
      }

      if(!empty($chart->chart_series)) {
        // limpa as series
        $default['series'] = [];

        $http = new Client();

        foreach($chart->chart_series as $serie) {
          // requisição a API
          $url = $this->Url->build("/", true);


          $dados = [
            'formato' => $chart->format,
            'input' => $serie->input_id,
            'materia' => $serie->theme_id,
          ];

          $url = $url.'cms/api/calcular_serie/' . $user_id . '/' . $dados['input'] . '/' . $dados['formato'] . '/' . $dados['materia'];

          $response = $http->get($url, ['type' => 'json']);

          $response = $response->json;


          $default['series'][] = [
            'id' => $serie->id,
            'name' => $serie->name,
            'color' => $serie->color,
            'type' => $serie->type,
            'input_id' => strval($serie->input_id),
            'theme_id' => strval($serie->theme_id),
            'data' => $response['data']
          ];
        }
      }

      return json_encode($default, JSON_HEX_APOS);
    }
}
