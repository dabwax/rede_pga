<div class="row" ng-controller="FeedCtrl" ng-init='lessons = <?php echo json_encode(array_values($query) ); ?>; current_user = <?php echo json_encode( $userLogged ); ?>; '>


	<div class="page-title red darken-3">
	    <h2>Feed</h2>

		<?php if(!empty($hashtag)) : ?>
		<h2>Filtrando pela hashtag: <strong><?php echo $hashtag->name; ?></strong></h2>
		<?php endif; ?>

		<p class="subtitle">Resumo das últimas aulas cadastradas.</p>

	    <div class="actions">
	        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn green"><i class="material-icons left">add</i> nova aula</a>

			<?php if(!empty($hashtag)) : ?>
				<a href="<?php echo $this->Url->build('/feed'); ?>" class="btn green">Remover filtro</a>
			<?php endif; ?>

	    </div> <!-- .actions -->

	    <div class="clearfix"></div>
	</div> <!-- .page-title -->

	<nav>
		<div class="nav-wrapper  teal lighten-2">
		  <form>
		    <div class="input-field">
		      <input id="search" type="search"  ng-model="search.$" placeholder="Pesquisar aulas por palavra-chave" required>
		      <label for="search"><i class="material-icons">search</i></label>
		      <i class="material-icons" ng-click="reset_search()">close</i>
		    </div>
		  </form>
		</div>
	</nav>

	<div class="col s12 m4" ng-repeat="lesson in lessons | filter:search:strict">
		<div class="card">

			<div class="card-content">

				<span class="card-title">{{lesson.date | date: 'dd/MM'}}<small>/{{lesson.date | date: 'y'}}</small> 

				<a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}/{{entry.input.id}}" class="waves-effect waves-light btn blue btn-floating right"><i class="material-icons">mode_edit</i></a></span>


				<ul class="pep-atores collapsible" data-collapsible="accordion">
					<li ng-repeat="(author_id, entries) in lesson.formatted_data">

						<div class="collapsible-header" ng-class="{'pep-autor-voce': author_id == current_user.id }"> {{lesson.actors[author_id].full_name | limitTo: 25 }}<span ng-if="lesson.actors[author_id].full_name.length > 25">...</span><i class="material-icons">arrow_drop_down</i> </div>

						<div class="collapsible-body">

							<div ng-repeat="entry in entries" class="center" style="padding-top: 10px;">
								
								<div class="chip">{{entry.input.name}}</div>

								<p>{{entry.value}}</p>
							</div>

						</div> <!-- .collapsible-body -->

					</li>
				</ul> <!-- .pep-lista-atores -->

			</div> <!-- .card-content -->

		</div> <!-- .card -->

	</div> <!-- .col -->

</div> <!-- .row -->

<div class="clearfix"></div>
<p class="chip blue"><strong>Dica:</strong> Confira se a aula existe antes de adicionar</p>
<div class="clearfix"></div>

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light green" href="<?php echo $this->Url->build('/registros/adicionar'); ?>"><i class="material-icons">add</i></a>
</div>