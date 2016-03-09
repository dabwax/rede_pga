<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class ApiController extends AppController
{

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