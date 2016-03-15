<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FeedController extends AppController
{
	public $protected_area = true;

	public function index($hashtag_id = null)
	{
		// Get all tables
		$lessons 			= TableRegistry::get("Lessons");
		// get current actors
		$actors 			= $this->getAtores();

		// if current user is a user, load correct view
		if($this->currentUserIsStudent())
			$this->view = "dashboard_aluno";

		// get all lessons from current user
		$query = $lessons->buscaAulas( $this->currentUser('user_id') );

		// if has any hashtag
		if(!empty($hashtag_id))
		{
			$hashtag 														= $lessons->LessonHashtags->Hashtags->get($hashtag_id);
			$options														= ['valueField' => 'lesson_id'];
			$where 															= ['hashtag_id' => $hashtag_id];
			$lessons_that_contains_this_hashtag = $lessons->LessonHashtags->find('list', $options)->where($where)->all()->toArray();
		} // end - hashtag

		// iterates current lessons
		foreach ($query as $key => $lesson) {
			// init actors attr
			$lesson->actors = [];
			// init front-end formatted data
			$lesson->formatted_data = [];
			// init boolean current user belongs
			$lesson->current_user_belongs = false;

			// iterates entries
			foreach($lesson->lesson_entries as $entry)
			{
				// check if current user is equal to author from entry
				if($this->currentUser('id') == $entry->model_id)
				{
					$lesson->current_user_belongs = true;
				}

				// iterates actors for this entry
				foreach($actors[$entry->model] as $actor)
				{
					// check if actor id is equal to author from entry
					if($actor->id == $entry->model_id)
					{
						$lesson->actors[$actor->id] = $actor;

						// include this current entry as belonging to actor
						$lesson->formatted_data[$actor->id][$entry->id] = $entry;
					} // end - check

				} // end - actors
			} // end - lesson entries

			// if has any hashtag filter and this lesson didn't have it, unset it
			if(!empty($hashtag_id))
			{
				if(!in_array($lesson->id, $lessons_that_contains_this_hashtag))
				{
					unset($query[$key]);
				}
			} // end - hashtag

		} // end - iterate lessons

		$this->set(compact("query", "hashtag"));
	}
}