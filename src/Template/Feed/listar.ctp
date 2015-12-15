<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-rss"></i>Feed', '/feed/listar', ['escape' => false]); ?>
<div class="row" ng-controller="FeedCtrl">

	<div class="col-lg-8 col-lg-offset-2">
		
		<?php if($filtering) : ?>
		<h2>Filtrando pela hashtag: <strong><?php echo $filtering->name; ?></strong></h2>

		<a href="<?php echo $this->Url->build('/feed/listar'); ?>" class="btn btn-xs btn-default">Remover filtro</a>
		<?php endif; ?>

		<div id="listagem-busca" class="form-group">
			<label>Buscar por palavra-chave</label>
			
			<div ng-class="{'input-group': search.$}">
				<input type="text" class="form-control input-icon" ng-model="search.$" placeholder="&#xF002; Pesquisar" />

				<span class="input-group-btn">
		        	<button class="btn btn-danger" ng-if="search.$" ng-click="reset_search()" type="button"><i class="fa fa-times"></i></button>
		      	</span>
	      	</div>

		</div> <!-- #listagem-busca -->

	</div>

	<div class="clearfix"></div>

	<div class="col-lg-12">
		
		<div class="timeline" ng-init='lessons = <?php echo json_encode(array_values($lessons) ); ?>'>

			<div class="timeline-item" ng-repeat="lesson in lessons | filter:search:strict">
				<div class="timeline-badge">
					<span style="background: #14B9D6;">{{lesson.date | date:'dd/MM'}}</span>
				</div>
				<div class="timeline-body">

						<div class="timeline-body-content" style="display: inline-block; clear: both; max-height: 200px; overflow-x: hidden; overflow-y: auto;">

							<div class="row">

								<div ng-repeat="le in lesson.lesson_entries" class="col-lg-6 col-md-6">
									<strong>{{le.input.name}}</strong>
									<p>
										{{le.value}}
									</p>

								</div>
							</div>

						</div>

						<h3 ng-if="lesson.lesson_themes.length">Matérias</h3>

						<span class="label label-default" ng-repeat="le in lesson.lesson_themes">{{le.theme.name}}</span>

						<h3 ng-if="lesson.lesson_hashtags.length">Hashtags</h3>

						<a class="label label-default" href="<?php echo $this->Url->build('/feed/listar/'); ?>{{le.hashtag.id}}" ng-repeat="le in lesson.lesson_hashtags">{{le.hashtag.name}}</a>


				</div>
			</div>
		</div>
	</div>
</div>