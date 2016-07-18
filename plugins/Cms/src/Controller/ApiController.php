<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class ApiController extends AppController
{

  public function initialize() {
    parent::initialize();
    $this->Auth->allow();
  }

/**
 * Action utilizada para calcular a série de um gráfico.
 * Utilizado principalmente no cadastramento de gráfico
 * e na página de Evolução.
 */
    public function calcular_serie($user_id = null, $input_id = null, $formato_grafico = null, $theme_id = null)
    {
      $this->autoRender = false;

     // Dados Recebidos
      $dados_recebidos = json_decode(file_get_contents("php://input"));
      if(empty($dados_recebidos)) {
        $dados_recebidos = json_decode(json_encode($_POST, FALSE));
      }

      if(!empty($dados_recebidos)) {
        $user_id = $dados_recebidos->user_id;
        $input_id = $dados_recebidos->input_id;
        $formato_grafico = $dados_recebidos->formato_grafico;

        if(!empty($dados_recebidos->tab_id)) {
          $tab_id = $dados_recebidos->tab_id;
        }

        if(!empty($dados_recebidos->theme_id)) {
         $theme_id = $dados_recebidos->theme_id;
        }
      }

      // Busca o input
      $inputs = TableRegistry::get("Inputs");
      $input = $inputs->get($input_id);

      // Busca a tab
      $tab = [];
      if(!empty($tab_id)) {
        $tabs = TableRegistry::get("ChartTabs");
        $tab = $tabs->get($tab_id);
      }

      // Geramos o objeto vazio da série
      $serie = [
        'name' => '',
        'data' => []
      ];

      // Os inputs se encaixam em 2 grupos:
      // Númericos e Textuais

      // Os numéricos são inputs acumuláveis, pois o seu valor é em número.
      // Os textuais não são acumuláveis, portanto o que se acumula é a quantidade
      // de vezes que ela aparece.

      // A nossa primeira verificação é esta: qual grupo este input pertence
      $grupoNumericos = ['escala_numerica', 'numero'];
      $grupoTextuais = ['calendario', 'intervalo_tempo', 'registro_textual', 'escala_texto', 'texto_privativo'];

      if(in_array($input->type, $grupoNumericos)) {
        $serie['type'] = 'numeric';
      } else if(in_array($input->type, $grupoTextuais)) {
        $serie['type'] = 'text';
      } else {
        throw new \Exception("Tipo de input inválido.");
      }

      // Acoplamos o nome da série o nome do input
      $serie['name'] = $input->name;

      // Acoplamos o formato do gráfico a série (apenas para debug)
      $serie['format'] = $formato_grafico;

      // Vamos buscar todas as aulas que contém este input
      $lessons = TableRegistry::get("Lessons");

      $where = [
        'Lessons.user_id' => $user_id,
      ];

      if(!empty($dados_recebidos->inicio)) {

        $inicio = \DateTime::createFromFormat("d/m/Y", $dados_recebidos->inicio);

        $where['AND'][] = ['Lessons.date >=' => $inicio->format("Y-m-d")];
      }

      if(!empty($dados_recebidos->fim)) {

        $fim = \DateTime::createFromFormat("d/m/Y", $dados_recebidos->fim);

        $where['AND'][] = ['Lessons.date <=' => $fim->format("Y-m-d")];
      }

      $order = [
        'Lessons.date' => 'ASC'
      ];
      $LessonEntries = function($q) use ($input, $tab) {

        $where = [
          'LessonEntries.input_id' => $input->id
        ];

        if(!empty($tab)) {
          /* start:boilerplate */
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
          /* end:boilerplate */

					$where['LessonEntries.model IN'] = $tmpModels; 
					$where['LessonEntries.model_id IN'] = $tmpModelsId;
        }

        return $q->where($where);
      };
      $LessonThemes = function($q) use ($theme_id) {

        $where = [];

        if(!empty($theme_id)) {
          $where['LessonThemes.theme_id'] = $theme_id;
        }

        return $q->where($where);
      };

      // se tiver matéria, INNER JOIN de matéria
      if(!empty($theme_id)) {
        $lessons = $lessons->find()
        ->where($where)
        ->order($order)
        ->distinct()
        ->matching('LessonEntries', $LessonEntries)
        ->innerJoinWith('LessonThemes', $LessonThemes)
        ->all()
        ->toArray();
      } else {
        $lessons = $lessons->find()
        ->where($where)
        ->order($order)
        ->distinct()
        ->matching('LessonEntries', $LessonEntries)
        // ->innerJoinWith('LessonThemes', $LessonThemes)
        ->all()
        ->toArray();

      }

      // Antes de tudo, vamos fazer logo os gráficos que a série seja do tipo texto
      // Pois é mais simples
      if($serie['type'] == "text") {

        $tmp = [];


        foreach($lessons as $lesson) {

          $value = $lesson->_matchingData['LessonEntries']->value;

          $tmp[$value] = @$tmp[$value] + 1;
        }

        foreach($tmp as $key => $val) {

          if($key != "?" && $key != "") {
            $serie['data'][] = ['name' => $key, 'y' => $val];
          }
        }

        echo json_encode($serie);

        die();
      }

      // Se o gráfico for mensal, vamos incluir os meses
      if($formato_grafico == "mensal") {
        $serie['data'] = [
          ['name' => 'Jan', 'y' => 0],
          ['name' => 'Fev', 'y' => 0],
          ['name' => 'Mar', 'y' => 0],
          ['name' => 'Abr', 'y' => 0],
          ['name' => 'Mai', 'y' => 0],
          ['name' => 'Jun', 'y' => 0],
          ['name' => 'Jul', 'y' => 0],
          ['name' => 'Ago', 'y' => 0],
          ['name' => 'Set', 'y' => 0],
          ['name' => 'Out', 'y' => 0],
          ['name' => 'Nov', 'y' => 0],
          ['name' => 'Dez', 'y' => 0]
        ];

        // Itera as aulas que tem este input e adiciona na série
        foreach($lessons as $lesson) {

          $y = 0;

          // Se o gráfico for numérico, mostra o valor dele
          if($serie['type'] == 'numeric' && $lesson->date->format("Y") == date("Y")) {

            $y = floatval($lesson->_matchingData['LessonEntries']->value);

            $indice_do_mes = $lesson->date->format("m") - 1;

            $serie['data'][$indice_do_mes]['y'] = $y;
          }

        }



      // Se o gráfico for diário, vamos incluir os dias
      } else if($formato_grafico == "diario") {

        // Itera as aulas que tem este input e adiciona na série
        foreach($lessons as $lesson) {

          $y = 0;

          // Se o gráfico for numérico, mostra o valor dele
          if($serie['type'] == 'numeric') {

            $y = floatval($lesson->_matchingData['LessonEntries']->value);

            if($y > 0) {

              $serie['data'][] = ['name' => $lesson->date->format("d/m/Y"), 'y' => $y];
            }

          }
        } // foreach
      } // se $formato_grafico == "diario"

      echo json_encode($serie);

    } // calcular_serie

/**
 * Action utilizada para buscar todos os inputs disponíveis
 * para o cadastramento de gráficos.
 */
    public function inputs_disponiveis()
    {
        $this->autoRender = false;

        $inputs = TableRegistry::get("Inputs");

        $estudanteAtual = $this->estudanteAtual();

        // Busca os inputs do usuário selecionado
        $where = [
            'Inputs.user_id' => $estudanteAtual['id']
        ];
        $query = $inputs->find()->where($where)->all()->toArray();

        echo json_encode($query);
    } // inputs_disponiveis

/**
 * Action utilizada para buscar todas as matérias disponíveis
 * para o cadastramento de gráficos.
 */
  public function materias_disponiveis()
  {
      $this->autoRender = false;

      $themes = TableRegistry::get("Themes");

      $estudanteAtual = $this->estudanteAtual();

      // Busca as matérias do usuário selecionado
      $where = [
        'Themes.user_id' => $estudanteAtual['id']
      ];
      $query = $themes->find()->where($where)->all()->toArray();

      echo json_encode($query);
  } // materias_disponiveis
}
