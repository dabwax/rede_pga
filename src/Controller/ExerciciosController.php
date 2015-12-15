<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ExerciciosController extends AppController
{

	public $protected_area = true;

	public function download($id)
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

		$exercise = $exercises_table->get($id);

		$this->response->file('uploads/' . $exercise->attachment, ['download' => true]);
	}

	public function download_user($id)
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

		$exercise = $exercises_table->get($id);

		$this->response->file('uploads/' . $exercise->user_answer_attachment, ['download' => true]);
	}

	// API - add_message()
	public function api_add_reply()
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

		// Sessão de admin
    	$admin_logged = $this->Cookie->read("admin_logged");
    	$user_id = $admin_logged['user_id'];

    	$dados = json_decode(file_get_contents('php://input'), true);

    	$entity = $exercises_table->get($_POST['resposta']['id']);

    	$entity->user_answer_content = $_POST['resposta']['content'];

    	if($_FILES['anexo']['error'] == 0)
    	{
    		$entity->user_answer_attachment = $this->Upload->uploadIt('anexo', $entity);
    	}

    	$exercises_table->save($entity);

	}

	// API - fetch_all()
	public function api_fetch_all()
    {
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

abaq
		// Sessão de admin
    	$admin_logged = $this->Cookie->read("admin_logged");
    	$user_id = $admin_logged['user_id'];

    	// Busca todos os exercícios do usuário logado
    	$where = [
    		'Exercises.user_id' => $user_id
    	];
		$exercises = $exercises_table->find()->where($where)->contain(['Themes'])->order(['Exercises.id' => 'DESC'])->all();

		$atores_global = $this->getAtores();

		// Itera todos os exercícios
		foreach($exercises as $exercise)
		{
			// Data de envio formatada
			$exercise->date = $exercise->created->format("d M");
		}

		// Retorna em JSON
		echo json_encode($exercises->toArray());
    }

	public function index()
    {
		// Sessão de admin
    	$admin_logged = $this->getAdminLogged();

    	$atores = $this->getAtores();

    	$this->set(compact("admin_logged", "atores"));

    }

}
