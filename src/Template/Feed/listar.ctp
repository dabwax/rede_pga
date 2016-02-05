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

			<div class="col s12 m4" ng-repeat="lesson in lessons | filter:search:strict">
			<div class="card">

				<div class="card-content">

					<span class="card-title">{{lesson.date | date: 'dd/MM'}} <small>{{lesson.date | date: 'y'}}</small> 

					<a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}/{{entry.input.id}}" class="waves-effect waves-light btn green btn-floating right"><i class="material-icons">mode_edit</i></a></span>


					<ul class="pep-lista-atores collapsible" data-collapsible="accordion">
						<li ng-repeat="(author_id, entries) in lesson.formatted_data">

							<div class="collapsible-header" ng-class="{'pep-autor-voce': author_id == current_user.id }"> {{lesson.actors[author_id].full_name | limitTo: 29 }} <i class="material-icons">arrow_drop_down</i> </div>

							<div class="collapsible-body">

								<div ng-repeat="entry in entries" class="center" style="padding-top: 10px;">
									
									<div class="chip">{{entry.input.name}}</div>

									<p>{{entry.value}}</p>
								</div>

							</div> <!-- .collapsible-body -->

						</li>
					</ul> <!-- .pep-lista-atores -->

				<!--
									
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

</div> <!-- .card-content -->
</div> <!-- .card-content -->
</div> <!-- .card -->
</div> <!-- .row -->