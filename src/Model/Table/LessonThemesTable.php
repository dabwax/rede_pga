<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class LessonThemesTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('lesson_themes');
      $this->belongsTo('Lessons');
      $this->belongsTo('Themes');
      $this->addBehavior('Timestamp');
  }

  public function getMateriasDefinidas($lesson_id, $user_id, $model = null, $model_id = null)
  {
  	
    $materias = [];

    // Agora vamos incluir as matérias não-existentes
    $themes_table = TableRegistry::get("Themes");
    $where = ['user_id' => $user_id ];
    $themes = $themes_table->find('all')->where($where)->all();
    
    foreach($themes as $f)
    {
      $materias[$f->id] = [
        'theme_id' => $f->id,
        'enabled' => false,
        'name' => $f->name,
        'observation' => ''
        ,'nota_esperada' => ''
        ,'nota_alcancada' => ''
      ];
    }

    $where = ['lesson_id' => $lesson_id, 'model' => $model, 'model_id' => $model_id];
    $find = $this->find('all')->contain(['Themes'])->where($where)->all();

    // Inclui as matérias existentes
    foreach($find as $f)
    {

      $materias[$f->theme->id] = [
        'id' => $f->id,
        'theme_id' => $f->theme->id,
        'enabled' => true,
        'name' => $f->theme->name,
        'observation' => $f->observation
        ,'nota_esperada' => $f->nota_esperada
        ,'nota_alcancada' => $f->nota_alcancada
      ];
    }

  	return $materias;
  }

  public function salvarMaterias($aula, $materias, $current_user)
  {

    // Itera todas as matérias preenchidas
    // Verifica se a matéria preenchida já existe no registro da aula
    // Se não existir, gera uma nova entidade e salva ela na base de dados

    foreach($materias as $theme_id => $materia)
    {


      if($materia['enabled'] == '1')
      {

        foreach($aula->materias as $materia_da_aula)
        {

          if(!$materia_da_aula['enabled'] && $materia_da_aula['theme_id'] == $theme_id)
          {

            $tmp = $this->newEntity([
              'lesson_id'       => $aula->id,
              'theme_id'        => $theme_id,
              'observation'     => $materia['observation'],
              'nota_esperada'   => $materia['nota_esperada'],
              'nota_alcancada'  => $materia['nota_alcancada'],
              'model' => $current_user['role_table'],
              'model_id' => $current_user['id']
            ]);

            $this->save($tmp);
          }

          if($materia_da_aula['enabled'] && $materia_da_aula['theme_id'] == $theme_id)
          {

            $tmp = $this->get($materia_da_aula['id']);

            $tmp->observation     = $materia['observation'];
            $tmp->nota_esperada   = $materia['nota_esperada'];
            $tmp->nota_alcancada  = $materia['nota_alcancada'];
            $tmp->model           = $current_user['role_table'];
            $tmp->model_id        = $current_user['id'];

            $this->save($tmp);
          } // if materia enabled e materia_da_aula igual theme_id
        } // foreach

      } else {


        $where = [
          'theme_id' => $theme_id,
          'lesson_id' => $aula->id
        ];

        $find = $this->deleteAll($where);
        
      }// if materia enabled == 1

    } // foreach

  } // function

}
