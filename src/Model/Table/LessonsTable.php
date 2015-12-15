<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LessonsTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('lessons');
      $this->belongsTo('Users');
      $this->hasMany('LessonEntries');
      $this->hasMany('LessonThemes');
      $this->hasMany('LessonHashtags');
      $this->addBehavior('Timestamp');
  }

  public function buscaAulas($user_id, $where_2)
  {
  	$where = [
  		'Lessons.user_id' => $user_id,
  	];

    $where = array_merge($where, $where_2);

  	return $this->find()->where($where)->contain([
  		'LessonThemes' => function($q) {
      		return $q->contain(['Themes']);
    	},
    	'LessonEntries' => function($q) {
      		return $q->contain(['Inputs']);
    	}
    ])->all();
  }

}
