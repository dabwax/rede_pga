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

  public function getMateriasDefinidas($lesson_id, $user_id)
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
      ];
    }

    $find = $this->find('all')->contain(['Themes'])->where(['lesson_id' => $lesson_id])->all();

    // Inclui as matérias existentes
    foreach($find as $f)
    {

      $materias[$f->theme->id] = [
        'id' => $f->id,
        'theme_id' => $f->theme->id,
        'enabled' => true,
        'name' => $f->theme->name,
        'observation' => $f->observation
      ];
    }

  	return $materias;
  }

  public function salvarMaterias($aula, $materias)
  {

    // Itera todas as matérias preenchidas
    // Verifica se a matéria preenchida já existe no registro da aula
    // Se não existir, gera uma nova entidade e salva ela na base de dados

    foreach($materias as $theme_id => $materia)
    {


      if($materia['enabled'] == '1')
      {

        $observation = $materia['observation'];

        foreach($aula->materias as $materia_da_aula)
        {

          if(!$materia_da_aula['enabled'] && $materia_da_aula['theme_id'] == $theme_id)
          {

            $tmp = $this->newEntity([
              'lesson_id' => $aula->id,
              'theme_id' => $theme_id,
              'observation' => $observation
            ]);

            $this->save($tmp);
          }

          if($materia_da_aula['enabled'] && $materia_da_aula['theme_id'] == $theme_id)
          {

            $tmp = $this->get($materia_da_aula['id']);

            $tmp->observation = $observation;

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
