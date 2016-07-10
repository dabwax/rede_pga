<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ExerciseRepliesTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('exercise_replies');
      $this->belongsTo('Exercises');
  }
}
