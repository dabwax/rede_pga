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
        $aulas_compativeis = $lessons->find()->where($where)->order($order)->contain(['LessonEntries'])->all();

        $resultado['aulas_compativeis'] = $aulas_compativeis;

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
              foreach($aula->lesson_themes as $entrada_materia) {

                if($entrada_materia->theme_id != $dados_recebidos->materia) {
                  $e_valido = false;
                }

                if($entrada_materia->theme_id == $dados_recebidos->materia) {
                  $e_valido = true;
                }
              }
            } // fim - se a série tiver matéria e a entrada ainda for válida

            if($e_valido == true) {

              // Se for gráfico diário
              if($dados_recebidos->grafico->formato == "diario") {
                $resultado['eixo_x'][] = $aula->date->format("d/m/Y");
                $resultado['serie'][] = intval($entrada_aula->value);
              }
            }

          } // fim - $entrada_aula
        } // fim - $aula

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
