<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class MessageRecipientsTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('message_recipients');
      $this->addBehavior('Timestamp');
  }
}
