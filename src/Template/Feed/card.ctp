<div class="card-content">

	<!-- Card Title -->
	<span class="card-title text-center">{{lesson.date_d}}/{{lesson.date_m}}/{{lesson.date_y}}</span>

	<div class="clearfix"></div>

	<div class="card-panel small grey lighten-3" ng-if="lesson.formatted_data.length == 0">
		Não há registros para esta aula.
	</div>

	<!-- Listagem de atores participantes -->
	<p ng-repeat="(author_id, entries) in lesson.formatted_data">
			{{role_helper(lesson.actors[author_id].role)}}: {{lesson.actors[author_id].full_name }}
	</p> <!-- .chip -->

	<div class="clearfix"></div>

	<!-- Listagem de hashtags -->
	<a href="<?php echo $this->Url->build('/feed/') ?>?hashtag_id={{entries.hashtag.id}}" class="chip chip-hashtag grey lighten-3" ng-repeat="(id, entries) in lesson.lesson_hashtags">
		#{{entries.hashtag.name }}
	</a> <!-- .chip -->


</div> <!-- .card-content -->

<div class="card-action">

	<!-- Botão de Ver Mais -->
	<a href="javascript:;" data-id="{{lesson.id}}" modal>ver mais</a>
</div>
