<div class="row" ng-controller="FeedCtrl" ng-init='lessons = <?php echo json_encode(array_values($query) ); ?>; current_user = <?php echo json_encode( $admin_logged ); ?>; '>

  <nav>
    <div class="nav-wrapper  teal lighten-2">
      <form>
        <div class="input-field">
          <input id="search" type="search"  ng-model="search.$" placeholder="Pesquisar por palavra-chave" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons" ng-click="reset_search()">close</i>
        </div>
      </form>
    </div>
  </nav>

<?php if(!empty($hashtag)) : ?>
<h2>Filtrando pela hashtag: <strong><?php echo $hashtag->name; ?></strong></h2>

<a href="<?php echo $this->Url->build('/feed/listar'); ?>" class="btn btn-xs btn-default">Remover filtro</a>
<?php endif; ?>
		<div class="col s12 m6">
			<div class="card small" ng-repeat="lesson in lessons | filter:search:strict">

			<div class="card-content">


				<!--<div class="timeline-badge">
					<span style="background: #14B9D6;">{{lesson.date | date:'dd/MM'}}</span>
				</div>-->

				<div class="timeline-body">

						<div class="timeline-body-content">

							<div class="row">

								<div ng-repeat="(author_id, entries) in lesson.formatted_data">

									<span class="card-title">{{role_helper(lesson.actors[author_id].role)}} </span>
									<span class="card-title"> {{lesson.actors[author_id].full_name}}</span>
									<span class="card-title" ng-if="author_id == current_user.id"> Você</span>
									
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
				</div> <!-- .timeline-body -->
				</div>
	</div>
</div>