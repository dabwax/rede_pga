<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class LessonHashtagsTable extends Table
{

  public function initialize(array $config)
  {
      $this->table('lesson_hashtags');
      $this->belongsTo('Lessons');
      $this->belongsTo('Hashtags');
  }

  public function getHashtagsDefinidas($lesson_id, $current_user)
  {
  	$find = $this
  	->find()
  	->contain(['Hashtags'])
  	->where([
      'lesson_id' => $lesson_id
      ,'model'    => $current_user['role_table']
      ,'model_id' => $current_user['id']
    ])
  	->all();

  	$tmp = [];

  	foreach($find as $f)
  	{
  		$tmp[] = $f->hashtag->name;
  	}
  	
  	return $tmp;
  }

  public function salvarHashtags($aula, $hashtags)
  {
  	$hashtags_table = TableRegistry::get("Hashtags");

    $this->deleteAll(['lesson_id' => $aula->id]);

    if(!empty($hashtags))
    {
  	 foreach($hashtags as $hashtag)
  	 {
        $entity = $hashtags_table->findByName($hashtag)->contain(['LessonHashtags'])->first();

    		$lesson_contain_hashtag = false;

    		if(!empty($entity))
    		{

    			foreach($entity->lesson_hashtags as $lesson_hashtag)
    			{
    				if($lesson_hashtag->lesson_id == $aula->id)
    				{
    					$lesson_contain_hashtag = true;
    				}
    			}

    		} else {
    			$entity = $hashtags_table->newEntity(['name' => $hashtag]);
    			
    			$hashtags_table->save($entity);
    		}


    		if(!$lesson_contain_hashtag)
    		{
    			$tmp = $this->newEntity(['lesson_id' => $aula->id, 'hashtag_id' => $entity->id]);

    			$this->save($tmp);
    		}
      }
  	}

  }

}
