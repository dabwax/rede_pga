<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ExerciciosController extends AppController
{

	public $protected_area = true;

  // API - add_message()
  public function api_add_message()
  {
      $this->autoRender = false;

      // Objetos de tabela
    $messages_table = TableRegistry::get("Exercises");

    // Sessão de admin
      $dados = $_POST;

      $user_id = $this->userLogged['user_id'];

      $mensagem = [
        'user_id' => $user_id,
        'due_to' => $dados['mensagem']['due_to'],
        'theme_id' => $dados['mensagem']['theme_id'],
        'name' => $dados['mensagem']['name'],
        'observation' => $dados['mensagem']['observation'],
      ];

      $entity = $messages_table->newEntity($mensagem);

      if($_FILES['anexo']['error'] == 0)
      {
        $entity->attachment = $this->Upload->uploadIt('anexo', $entity);
      }

      $messages_table->save($entity);
  }

	public function download($id)
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

		$exercise = $exercises_table->get($id);

		$this->response->file('uploads/' . $exercise->attachment, ['download' => true]);
	}

	public function download_reply($id)
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("ExerciseReplies");

		$exercise = $exercises_table->get($id);

		$this->response->file('uploads/' . $exercise->attachment, ['download' => true]);
	}

	// API - add_message()
	public function api_add_reply()
	{
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("ExerciseReplies");

		// Sessão de admin
  	$user_id = $this->userLogged['user_id'];

    $resposta = [
      'user_id' => $user_id,
      'exercise_id' => $_POST['message_id'],
      'model' => $_POST['usuarioLogado']['table'],
      'model_id' => $_POST['usuarioLogado']['id'],
      'content' => $_POST['resposta']['content'],
    ];

    $entity = $exercises_table->newEntity($resposta);

    if(!empty($_FILES['anexo'])) {
      if($_FILES['anexo']['error'] == 0)
      {
        $entity->attachment = $this->Upload->uploadIt('anexo', $entity);
      }
    }

    $exercises_table->save($entity);

	}

	// API - fetch_all()
	public function api_fetch_all()
    {
    	$this->autoRender = false;

    	// Objetos de tabela
		$exercises_table = TableRegistry::get("Exercises");

		// Sessão de admin
    	$user_id = $this->userLogged['user_id'];

    	// Busca todos os exercícios do usuário logado
    	$where = [
    		'Exercises.user_id' => $user_id
    	];
		$exercises = $exercises_table->find()->where($where)->contain(['Themes', 'ExerciseReplies'])->order(['Exercises.id' => 'DESC'])->all();

		$atores_global = $this->getAtores();

		// Itera todos os exercícios
		foreach($exercises as $exercise)
		{
			// Data de envio formatada
			$exercise->date = $exercise->created->format("d M");

      foreach($exercise->exercise_replies as $reply) {
        $table = TableRegistry::get($reply->model);
        $user = $table->get($reply->model_id);

        $reply->author = $user->full_name;
      }
		}

		// Retorna em JSON
		echo json_encode($exercises->toArray());
    }

	public function index()
    {
		// Sessão de admin
    	$admin_logged = $this->getAdminLogged();

    	$atores = $this->getAtores();

      $themes = TableRegistry::get("Themes");

      $where = [
        'Themes.user_id' => $this->userLogged['user_id']
      ];
      $themes = $themes->find()->where($where)->all();

    	$this->set(compact("admin_logged", "atores", "themes"));

    }

}
