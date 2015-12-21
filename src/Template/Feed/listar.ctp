<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-rss"></i>Feed', '/feed/listar', ['escape' => false]); ?>
<div class="row" ng-controller="FeedCtrl">

	<div class="col-lg-8 col-lg-offset-2">
		
		<?php if(!empty($hashtag)) : ?>
		<h2>Filtrando pela hashtag: <strong><?php echo $hashtag->name; ?></strong></h2>

		<a href="<?php echo $this->Url->build('/feed/listar'); ?>" class="btn btn-xs btn-default">Remover filtro</a>
		<?php endif; ?>

		<div id="listagem-busca" class="form-group">
			<label>Buscar por palavra-chave</label>
			
			<div ng-class="{'input-group': search.$}">
				<input type="text" class="form-control input-icon" ng-model="search.$" placeholder="Pesquisar" />

				<span class="input-group-btn">
		        	<button class="btn btn-danger" ng-if="search.$" ng-click="reset_search()" type="button"><i class="fa fa-times"></i></button>
		      	</span>
	      	</div>

		</div> <!-- #listagem-busca -->

	</div>

	<div class="clearfix"></div>

	<div class="col-lg-12">
		
		<div class="timeline" ng-init='lessons = <?php echo json_encode(array_values($query) ); ?>; current_user = <?php echo json_encode( $admin_logged ); ?>; '>

			<div class="timeline-item" ng-repeat="lesson in lessons | filter:search:strict">
				<div class="timeline-badge">
					<span style="background: #14B9D6;">{{lesson.date | date:'dd/MM'}}</span>
				</div>
				<div class="timeline-body">

						<div class="timeline-body-content">

							<div class="row">

								<div ng-repeat="(author_id, entries) in lesson.formatted_data" class="col-lg-12 col-md-12">

									<h2><span class="label label-lg label-success">{{role_helper(lesson.actors[author_id].role)}}</span> {{lesson.actors[author_id].full_name}} <span class="label label-danger label-sm" ng-if="author_id == current_user.id">Você</span></h2>
									
									<table class="table">
										<tbody>
											<tr ng-repeat="entry in entries">
												<td valign="right" class="text-right col-xs-4"> <strong>{{entry.input.name}}</strong> </td>
												<td class="text-left">{{entry.value}}</td>
												<td class="text-left" ng-if="author_id == current_user.id"> <a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}/{{entry.input.id}}" class="btn-editar-registro" title="Editar"><i class="fa fa-pencil"></i></a></td>
											</tr>
										</tbody>
									</table>

									<a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}" class="btn btn-danger btn-xs" ng-if="!lesson.current_user_belongs"><i class="fa fa-pencil"></i> Parece que você não participou desta aula ainda. Clique aqui para participar</a>

									<h3 ng-if="lesson.lesson_themes.length">Matérias</h3>

									<div ng-repeat="registro in lesson.lesson_themes" ng-if="registro.model_id == author_id">
										<span class="label label-default">{{registro.theme.name}}</span>

										<p style="margin-bottom: 20px;">
										<br>
										{{registro.observation}}
										</p>

										<p ng-if="registro.nota_esperada">
											<strong class="label label-success">Nota esperada</strong> <small>{{registro.nota_esperada}}</small>
										</p>
										
										<p ng-if="registro.nota_alcancada">
											<strong class="label label-danger mt20">Nota alcançada</strong> <small>{{registro.nota_alcancada}}</small>
										</p>
									</div>

									<h3 ng-if="lesson.lesson_hashtags.length">Hashtags</h3>

									<a class="label label-default" href="<?php echo $this->Url->build('/feed/listar/'); ?>{{le.hashtag.id}}" ng-repeat="le in lesson.lesson_hashtags">{{le.hashtag.name}}</a>

								</div> <!-- end - entry -->

							</div> <!-- .row -->


						</div> <!-- .timeline-body-content -->

				</div> <!-- .timeline-body -->
			</div>
		</div>
	</div>
</div>