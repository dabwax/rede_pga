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

  // método para buscar todas as aulas do estudante

  // $where_2 = parametros extras
  public function buscaAulas($user_id, $where_2 = array() )
  {
  	$where = [
  		'Lessons.user_id' => $user_id,
  	];

    $where = array_merge($where, $where_2);

    // joins
    $contain = [
    'LessonEntries' => function($q) {
      return $q->contain(["Inputs"]);
    },
    'LessonThemes' => function($q) {
      return $q->contain(["Themes"]);
    },
    'LessonHashtags' => function($q) {
      return $q->contain(["Hashtags"]);
    }];

    $order = [
      'Lessons.date' => 'DESC'
    ];
    // query
  	return $this->find()
    ->where($where)
    ->contain($contain)
    ->order($order)
    ->all()
    ->toArray();
  }

}
