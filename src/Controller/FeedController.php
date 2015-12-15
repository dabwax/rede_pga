<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FeedController extends AppController
{
	public $protected_area = true;

	public function listar($hashtag_id = null)
	{
		$lessons_table = TableRegistry::get("Lessons");

    	$admin_logged = $this->Cookie->read("admin_logged");

    	if(!empty($admin_logged['clinical_condition']))
    	{
    		$this->view = "dashboard_aluno";
    	} else {

			$where = [
				'user_id' => $admin_logged['user_id']
			];

			$lessons = $lessons_table
			->find()
			->where($where)
			->order(['Lessons.modified' => 'DESC'])
			->contain([
			'LessonEntries' => function($q) {
				return $q->contain(["Inputs"]);
			},
			'LessonThemes' => function($q) {
				return $q->contain(["Themes"]);
			},
			'LessonHashtags' => function($q) {
				return $q->contain(["Hashtags"]);
			}])
			->all()->toArray();



			if($hashtag_id)
			{
				$table_hashtag = TableRegistry::get("Hashtags");
				$table_lesson_hashtags = TableRegistry::get("LessonHashtags");
				$hashtag = $table_hashtag->get($hashtag_id);

				$filtering = $hashtag;

				$lesson_hashtags = $table_lesson_hashtags->find('list', ['valueField' => 'lesson_id'])
				->where(['hashtag_id' => $hashtag_id])
				->all()->toArray();


				foreach($lessons as $key => $value)
				{
					if(!in_array($value->id, $lesson_hashtags))
					{
						unset($lessons[$key]);
					}
				}
			} else {
				$filtering = false;
			}


			$atores = $this->getAtores();

			foreach($lessons as $l)
			{
				$l->atores = [];

				foreach($l->lesson_entries as $le)
				{
					foreach($atores[$le->model] as $m)
					{
						if($m->id == $le->model_id)
						{
							$l->atores[$m->id] = [
								'id' => $m->id,
								'nome' => $m->full_name,
								'email' => $m->username,
							];
						}
					}
				}
			}
		}

		$this->set(compact("lessons", "filtering"));
	}
}