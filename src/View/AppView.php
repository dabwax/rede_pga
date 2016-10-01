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

    public function formatarCargo($role = null) {
      $tmp = [
         "dad" => "Pai"
        ,"mom" => "Mãe"
        ,"tutor" => "Tutor"
        ,"therapist" => "Terap."
        ,"mediator" => "Mediad."
        ,"coordinator" => "Coord."
        ,"user" => "Est."
      ];

      return $tmp[$role];
    }

    public function formatarGrafico($chart = null, $user_id = null, $tab_id = null) {
      $default = [
        "chart_id" => $chart->id,
        "options" => [

            "legend" => [
                "itemStyle" => [
                  "fontWeight" => "normal",
                  "fontSize" => "12px",
                  "fontFamily" => "'Arvo'",
                  "textTransform" => "uppercase"
                ]
            ],
          "chart" => [
            "type" => $chart->type
          ],
          "plotOptions" => [

            "series" => [
              "stacking" => "",
              "cursor" => 'pointer',
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
            "categories" => [],
          ]
        ],
        "series" => [
        ],
        "title" => [
          "text" => "Gráfico de Demonstração",
          "style" => [
            "fontWeight" => "bold",
            "fontSize" => "21px",
            "fontFamily" => "'Arvo'",
            "textTransform" => "uppercase"
          ]
        ],
        "subtitle" => [
          "text" => "",
          "style" => [
            "fontSize" => "15px",
            "fontFamily" => "'Arvo'",
            "textTransform" => "uppercase"
          ]
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

          $url = $url.'cms/api/calcular_serie/';

          $payload = [
            'user_id' => $user_id,
            'chart_serie_id' => $serie->id,
            'input_id' => $dados['input'],
            'formato_grafico' => $dados['formato'],
            'theme_id' => $dados['materia']
          ];

          if(!empty($_GET['inicio'])) {
            $payload['inicio'] = $_GET['inicio'];
          }

          if(!empty($_GET['fim'])) {
            $payload['fim'] = $_GET['fim'];
          }

          if(!empty($tab_id)) {
            $payload['tab_id'] = $tab_id;
          }

          $response = $http->post($url, $payload, ['type' => 'json']);

          $response = $response->json;

          if(!empty($response['data'])) {
            $default['series'][] = [
              'id' => $serie->id,
              'name' => $serie->name,
              'color' => $serie->color,
              'type' => $serie->type,
              'input_id' => strval($serie->input_id),
              'theme_id' => strval($serie->theme_id),
              'actors_tutors' => ($serie->actors_tutors),
              'actors_therapists' => ($serie->actors_therapists),
              'actors_schools' => ($serie->actors_schools),
              'actors_protectors' => ($serie->actors_protectors),
              'data' => $response['data']
            ];
          }
        }
      }

      return json_encode($default, JSON_HEX_APOS);
    }
}
