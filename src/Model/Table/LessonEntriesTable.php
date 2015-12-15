<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LessonEntriesTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('lesson_entries');
      $this->belongsTo('Inputs');
      $this->belongsTo('Lessons');
      $this->addBehavior('Timestamp');
  }

  public function salvarRegistros($aula, $registros, $admin_logged)
  {
	foreach($registros as $registro) :

		$input = [
			'lesson_id' 		=> $aula->id,
			'input_id' 			=> $registro['id'],
			'model_id' 			=> $admin_logged['id'],
			'user_id' 			=> $admin_logged['user_id'],
			'model' 			=> $admin_logged['role_table'],
			'value'				=> $registro['value']
		];

		if(empty($registro['lesson_entry_id']))
		{
			$entity = $this->newEntity($input);
		} else {

			$entity = $this->get($registro['lesson_entry_id']);

			$entity = $this->patchEntity($entity, $input);
		}

		$this->save($entity);
        
	endforeach;
  }

}
