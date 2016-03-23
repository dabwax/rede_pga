<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class ApiController extends AppController
{

/**
 * Action utilizada para calcular a série de um gráfico.
 * Utilizado principalmente no cadastramento de gráfico
 * e na página de Evolução.
 */
    public function calcular_serie()
    {
        // ajax
        $this->autoRender = false;

        // angular FIX
        $postdata = json_decode(file_get_contents("php://input"))[0];

        // retorno padrão
        $resultado = ["status" => "sucesso"];

        // armazena dados recebidos
        $dados_recebidos = [
            "formato" => $postdata->formato,
            "filtro" => [
                "data_inicial" => $postdata->filtro->data_inicial,
                "data_final" => $postdata->filtro->data_final
            ]
        ];

        if(!empty($postdata->materia)) {
            $dados_recebidos['materia'] = $postdata->materia;
        }

        if(!empty($postdata->input)) {
            $dados_recebidos['input'] = $postdata->input;
        }

        // inclui dados recebidos no retorno (para debug)
        $resultado['dados_recebidos'] = $dados_recebidos;

        // 1) Vamos buscar as aulas que sejam compatíveis com o filtro desejado
        $lessons = TableRegistry::get("Lessons");

        $where = [
            'AND' => [
                'Lessons.date >=' => $dados_recebidos['filtro']['data_inicial'],
                'Lessons.date <=' => $dados_recebidos['filtro']['data_final']
            ]
        ];
        $aulas_compativeis = $lessons->find()->where($where)->contain(['LessonEntries'])->all();

        $resultado['aulas_compativeis'] = $aulas_compativeis;

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