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
    public function calcular_serie()
    {
        // ajax
        $this->autoRender = false;

        // Dados Recebidos
        $dados_recebidos = json_decode(file_get_contents("php://input"));

        if(empty($dados_recebidos)) {
          $dados_recebidos = json_decode(json_encode($_POST, FALSE));
        }

        // retorno padrão do AJAX
        $resultado = ["status" => "sucesso", "serie" => [], "eixo_x" => [] ];

        // inclui dados recebidos no retorno (para debug)
        $resultado['dados_recebidos'] = $dados_recebidos;

        // 1) Vamos buscar as aulas que sejam compatíveis com o filtro desejado
        $lessons = TableRegistry::get("Lessons");
        $inputs = TableRegistry::get("Inputs");

        $data_inicial = \DateTime::createFromFormat("d/m/Y", $dados_recebidos->grafico->data_inicial)->format("Y-m-d");
        $data_final   = \DateTime::createFromFormat("d/m/Y", $dados_recebidos->grafico->data_final)->format("Y-m-d");

        $where = [
            'AND' => [
                'Lessons.date >=' => $data_inicial,
                'Lessons.date <=' => $data_final
            ]
        ];

        $order = [
          'Lessons.date' => 'ASC'
        ];
        $aulas_compativeis = $lessons->find()->where($where)->order($order)->contain(['LessonEntries', 'LessonThemes'])->all();

        // Dados do input
        $input = $inputs->find()->where(['id' => $dados_recebidos->input])->first();

        $resultado['aulas_compativeis'] = $aulas_compativeis;

        $resultado['input'] = $input;

        // Armazena o total de cada input (usado para calcular média)
        $total = [];
        $total_aulas = [];

        // Valor padrão para cada mês, se for mensal
        if($dados_recebidos->grafico->formato == "mensal") {
          $resultado['serie'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

          $resultado['eixo_x'] = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
        }

        // 2) Agora que temos as aulas, vamos iterar as entradas delas
        foreach($aulas_compativeis as $aula) {

          foreach($aula->lesson_entries as $entrada_aula) {
            $e_valido = true;

            // 2.1) A entrada da aula só será VÁLIDA, se o input_id dela for igual da série
            if($entrada_aula->input_id != $dados_recebidos->input) {
              $e_valido = false;
            }

            // 2.2) A entrada da aula só será VÁLIDA, se o theme_id dela for igual da série (opcional)
            if(!empty($dados_recebidos->materia) && $e_valido == true) {
              $compativel_com_materia = false;

              foreach($aula->lesson_themes as $entrada_materia) {
                if($entrada_materia->theme_id == $dados_recebidos->materia) {
                  $compativel_com_materia = true;
                }
              }

              if(!$compativel_com_materia) {
                $e_valido = false;
              }
            } // fim - se a série tiver matéria e a entrada ainda for válida

            if($e_valido == true) {


              // Armazena o total deste input para poder calcular médias
              $mes = $aula->date->format("m")-1;

              // Se o input for numérico, o valor é número (obviamente)
              if(is_numeric($entrada_aula->value)) {

                $valor_aula = intval($entrada_aula->value);

                $total[$mes] = @$total[$mes] + $valor_aula;
              // Se for string
              } else {

                $valor_aula[$entrada_aula->value] = @$valor_aula[$entrada_aula->value] + 1;

                $total[$mes][$entrada_aula->value] = @$total[$mes][$entrada_aula->value] + 1;
              }
              
              $total_aulas[$mes] = @$total_aulas[$mes] + 1;

              // Se for gráfico diário
              if($dados_recebidos->grafico->formato == "diario") {
                $resultado['eixo_x'][] = $aula->date->format("d/m/Y");


                // Calcular média
                if(is_numeric($valor_aula)) {
                  $resultado['serie'][] = $valor_aula;
                } else {
                  $valores_aulas[] = $valor_aula;
                }
              }

            }

          } // fim - $entrada_aula
        } // fim - $aula


        // Se for gráfico mensal
        if($dados_recebidos->grafico->formato == "mensal") {

          // Iterar cada total e incluir na série
          foreach($total as $total_mes => $total_valor) {
            $resultado['serie'][$total_mes] = $total_valor / $total_aulas[$total_mes];
          }
        }

        // Se o input for de texto, os eixos X são as possibilidades
        $tipos_texto = ['escala_texto'];
        if(in_array($input->type, $tipos_texto)) {

          $resultado['valores_aulas'] = $valores_aulas;

                  foreach($valores_aulas as $tmp) {

                    foreach($tmp as $k => $v) {

                      $resultado['serie'][$k] = [
                        'name' => $k,
                        'y' => $v
                      ];
                    }
                    
                  }

                  $resultado['serie'] = array_values($resultado['serie']);


          /*
          // decodifica o campo de options
          $config = json_decode($input->config);

          $resultado['eixo_x'] = [];

          foreach($config->options as $label) {
            $resultado['eixo_x'][] = $label;
          }*/
        }

        $resultado['total'] = $total;

        echo json_encode($resultado);
    } // calcular_serie

/**
 * Action utilizada para buscar todos os inputs disponíveis
 * para o cadastramento de gráficos.
 */
    public function inputs_disponiveis()
    {
        $this->autoRender = false;

        $inputs = TableRegistry::get("Inputs");

        // Busca os inputs do usuário selecionado
        $where = [
            'Inputs.user_id' => $this->currentUser('user_id')
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

      // Busca as matérias do usuário selecionado
      $where = [
        'Themes.user_id' => $this->currentUser('user_id')
      ];
      $query = $themes->find()->where($where)->all()->toArray();

      echo json_encode($query);
  } // materias_disponiveis
}
