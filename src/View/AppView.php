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

    public function formatarGrafico($chart = null) {
      $default = [
        "options" => [
          "chart" => [
            "type" => $chart->type
          ],
          "plotOptions" => [
            "series" => [
              "stacking" => ""
            ]
          ],
          "xAxis" => [
            "categories" => []
          ]
        ],
        "series" => [
          [
            "name" => "Linha Exemplo (PHP)",
            "color" => "red",
            "data" => [1, 2],
            "id" => "series-0",
            "type" => "bar"
          ]
        ],
        "title" => [
          "text" => "Gráfico de Demonstração"
        ],
        "subtitle" => [
          "text" => "Subtítulo aqui"
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

          $jsonPayload = [
            'grafico' => [
              'data_inicial' => $chart->filter_start,
              'data_final' => $chart->filter_end,
              'formato' => $chart->format,
            ],
            'input' => $serie->input_id,
            'materia' => $serie->theme_id,
          ];
          $response = $http->post($url . 'cms/api/calcular_serie', $jsonPayload, ['type' => 'json']);
          $response = $response->json;

          $default['series'][] = [
            'id' => $serie->id,
            'name' => $serie->name,
            'color' => $serie->color,
            'type' => $serie->type,
            'input_id' => strval($serie->input_id),
            'theme_id' => strval($serie->theme_id),
            'data' =>$response['serie']
          ];;
          $default['options']['xAxis']['categories'] = $response['eixo_x'];
        }
      }

      return json_encode($default, JSON_HEX_APOS);
    }
}
