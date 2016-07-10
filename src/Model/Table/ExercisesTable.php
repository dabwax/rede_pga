<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ExercisesTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('exercises');
      $this->belongsTo('Users');
      $this->belongsTo('Themes');
      $this->hasMany('ExerciseReplies');
      $this->addBehavior('Timestamp');
  }
}
