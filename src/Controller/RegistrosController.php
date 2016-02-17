<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class RegistrosController extends AppController
{
  public $protected_area = true;

  // OBS: O formato da data usado aqui é "yyyy-MM-dd".
  public function api_validar_data()
  {
    $this->autoRender = false;

    // Objetos de tabela
    $lessons_table = TableRegistry::get("Lessons");

    // Busca o registro da aula na data especificada
    $lesson = $lessons_table->find()->where(['date' => $_GET['data'] ])->first();

    $return = [];

    if($lesson) {
      $return['status']   = "INDISPONÍVEL";
      $return['message']  = "INDISPONÍVEL! Já existe uma aula nesta data.";
    } else {
      $return['status']   = "DISPONÍVEL";
      $return['message']  = "Esta data está DISPONÍVEL!";
    }

    echo json_encode($return);

  }

  public function api_inputs($lesson_id)
  {
    $this->autoRender = false;

    // dados do usuário logado
    $admin_logged = $this->getAdminLogged();

    // Objetos de tabela
    $lessons_table = TableRegistry::get("Lessons");
    $inputs_table = TableRegistry::get("Inputs");

    // Vai armazenar todos os campos da aula
    $resultado = [
      'registros' => [],
      'campos' => []
    ];

    // Busca o registro da aula
    $lesson = $lessons_table->find()->contain(['LessonEntries' => function($q) {

      $where = [
        'LessonEntries.model' => $this->currentUser('role_table')
        ,'LessonEntries.model_id' => $this->currentUser('id')
      ];

      return $q->where($where)->contain(['Inputs']);
    }])->where(['id' => $lesson_id])->first();

    // Busca e itera todos os campos do aluno
    $inputs = $inputs_table
    ->find()
    ->where([
      'Inputs.user_id'  => $admin_logged['user_id'],
      'Inputs.status'   => 1
    ])
    ->order(['Inputs.position' => 'DESC'])
    ->all();


    foreach($inputs as $input)
    {
      $config = json_decode($input->config);
      $default_value = "";

      if(!empty($config->min))
      {
        $default_value = $config->min;
      }

      $resultado['registros'][] = [
        'id' => $input->id,
        'type' => $input->type,
        'model' => $input->model,
        'name' => $input->name,
        'config' => $config,
        'value' => $default_value,
        'lesson_entry_id' => false
      ];
      $resultado['campos'][] = [
        'id' => $input->id,
        'type' => $input->type,
        'model' => $input->model,
        'name' => $input->name,
        'config' => json_decode($input->config),
      ];
    }

    // Itera os registros da aula
    foreach($lesson->lesson_entries as $lesson_entry)
    {

      // Itera os inputs
      foreach($resultado['registros'] as $key => $registro)
      {
        // Se o id do input iterado for igual o ID do input do registro da aula,
        // inclui o value dela para este campo
        if($registro['id'] == $lesson_entry->input_id)
        {

          if(empty($admin_logged['clinical_condition']))
          {
            $resultado['registros'][$key]['value']            = $lesson_entry->value;
            $resultado['registros'][$key]['lesson_entry_id']  = $lesson_entry->id;
          }
        }
      }

    }

    echo json_encode($resultado);

  }

  public function api_registros_por_ano()
  {
    $this->autoRender = false;

    // dados do Angular
    $dados = (array) json_decode(file_get_contents('php://input'), true);

    // dados do usuário logado
    $admin_logged = $this->getAdminLogged();

    // busca aulas do usuário logado que a data seja pertencente ao ano selecionado
    $lessons_table = TableRegistry::get("Lessons");
    

    $user_id = (empty($admin_logged['clinical_condition'])) ? $admin_logged['user_id'] : $admin_logged['id'];

    $where = [
      'user_id' => $user_id,
    ];

    // executa a consulta
    $lessons = $lessons_table->find()->where($where)->order(['Lessons.date' => 'DESC'])->contain([
      'LessonEntries' => function($q) {

        // join para buscar as entradas desta aula somente do usuário logado e para incluir os inputs tb
        $admin_logged = $this->getAdminLogged();

        $user_id = (empty($admin_logged['clinical_condition'])) ? $admin_logged['user_id'] : $admin_logged['id'];
    
        $where2 = [
          'LessonEntries.user_id' => $user_id,
        ];

        if(!empty($admin_logged['clinical_condition']))
        {
          $where2 = [
            'LessonEntries.user_id' => $admin_logged['id'],
            'LessonEntries.model' => 'Users',
            'LessonEntries.model_id' => $admin_logged['id'],
          ];
        }

        return $q->contain(['Inputs'])->where($where2);
      },
      'LessonThemes' => function($q) {

        return $q->contain(['Themes']);
      },
      'LessonHashtags' => function($q) {

        return $q->contain(['Hashtags']);
      }
      ])->all();

      $meses = [
         "01" => 0
        ,"02" => 0
        ,"03" => 0
        ,"04" => 0
        ,"05" => 0
        ,"06" => 0
        ,"07" => 0
        ,"08" => 0
        ,"09" => 0
        ,"10" => 0
        ,"11" => 0
        ,"12" => 0
      ];

      // inclui um campo com o mes do registro
      foreach($lessons as $l)
      {
        $dateFormatter = \IntlDateFormatter::create(
          \Locale::getDefault(),
          \IntlDateFormatter::NONE,
          \IntlDateFormatter::NONE,
          \date_default_timezone_get(),
          \IntlDateFormatter::GREGORIAN,
          'EEEE'
        );

        $l->mes = $l->date->format("m");
        $l->year = $l->date->format("Y");
        $l->dia = ucfirst($dateFormatter->format($l->date));

        $l->created = null;
        $l->modified = null;

        $l->date = $l->date->format("d/m");

        $meses[$l->mes] = $meses[$l->mes] + 1;
      }

      $return = [
        'lessons' => $lessons,
        'meses' => $meses
      ];
      echo json_encode($return);
  }

  public function listar()
  {
  }

  public function adicionar()
  {
    $lessons_table = TableRegistry::get("Lessons");
    $lesson = $lessons_table->newEntity();
    $admin_logged = $this->getAdminLogged();

    $this->set(compact("lesson"));

    if($this->request->is("post"))
    {
      if(empty($this->request->data['date'])) {
        $this->Flash->error("Não foi possível cadastrar a aula. Verifique os dados preenchidos.");
      } else {
        $dateTime = \DateTime::createFromFormat("d/m/Y", $this->request->data['date']);

        $this->request->data['date'] = $dateTime->format("Y-m-d");
        $this->request->data['user_id'] = $admin_logged['user_id'];

        $lesson = $lessons_table->patchEntity($lesson, $this->request->data);
        $lessons_table->save($lesson);

        $this->Flash->success("A aula foi criada com sucesso.");

        return $this->redirect(['action' => 'editar', $lesson->id]);
      }
    }
  }
  
  public function editar($lesson_id = null, $redirect_to_input_id = null)
  {
    // Dados do usuário logado
    $admin_logged         = $this->getAdminLogged();

    // DataTable's
    $themes_table          = TableRegistry::get("Themes");
    $lessons_table         = TableRegistry::get("Lessons");
    $lesson_themes_table   = TableRegistry::get("LessonThemes");
    $lesson_entries_table  = TableRegistry::get("LessonEntries");
    $lesson_hashtags_table = TableRegistry::get("LessonHashtags");

    // Configuração do formulário
    $aula                 = $lessons_table->get($lesson_id);

    // Select de matérias (themes)
    $materias             = $themes_table->getSelectMaterias($admin_logged['user_id']);

    // Atribui as matérias existentes ao objeto do formulário
    $aula->materias       = $lesson_themes_table->getMateriasDefinidas($lesson_id, $admin_logged['user_id'], $admin_logged['role_table'], $admin_logged['id']);
    $aula->hashtags       = $lesson_hashtags_table->getHashtagsDefinidas($lesson_id, $admin_logged);

    // Se houver requisição POST
    if($this->request->is(["post", "put"]))
    {

      // Salva o input de matérias
      $lesson_themes_table->salvarMaterias($aula, @$this->request->data['materias'], $admin_logged);

      // Salva todos os inputs da aula
      $lesson_entries_table->salvarRegistros($aula, @$this->request->data['registros'], $admin_logged);

      // Salva todas as hashtags da aula
      $lesson_hashtags_table->salvarHashtags($aula, @$this->request->data['hashtags'], $admin_logged);

      // Redireciona o usuário

      if($admin_logged['role_role'] != "user")
      {
        $this->Flash->success("Seu registro foi atualizado! Obrigado. :)");
        return $this->redirect("/registros/editar/" . $lesson_id . "?status=sucesso");
      } else {
        $this->Flash->success("Obrigado pela sua opinião, querido aluno. :)");
        return $this->redirect("/registros/listar");
      }
    }

    // Envia váriaveis pra view
    $this->set(compact("materias", "aula", "redirect_to_input_id"));
  }

  public function excluir($id = null)
  {
    $lessons_table  = TableRegistry::get("Lessons");
    $entity         = $lessons_table->get($id);

    $lessons_table->delete($entity);
    
    return $this->redirect('/listar');
  }

}
