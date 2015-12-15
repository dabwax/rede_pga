<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MessagesTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('messages');
      $this->belongsTo('Users');
      $this->hasMany('MessageRecipients');
      $this->hasMany('MessageReplies');
      $this->addBehavior('Timestamp');
  }
}
