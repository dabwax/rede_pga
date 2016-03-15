<div class="row" ng-controller="FeedCtrl">

	<!-- Título da página -->
	<div class="page-title red darken-3">
	    <h2>Feed</h2>
		
		<p class="subtitle"><?php if(!empty($hashtag)) : ?><strong>Filtrando pela hashtag: <?php echo $hashtag->name; ?>.</strong><?php endif; ?> Resumo das últimas aulas cadastradas.</p>

	    <div class="actions">

			<?php if(!empty($hashtag)) : ?>
				<a href="<?php echo $this->Url->build('/'); ?>" class="btn grey">Remover filtro</a>
			<?php endif; ?>
	        <a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'adicionar']); ?>" class="waves-effect waves-light btn green"><i class="material-icons left">add</i> nova aula</a>

	    </div> <!-- .actions -->

	    <div class="clearfix"></div>
	</div> <!-- .page-title -->
	
	<!-- Pesquisa -->
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
	
	<!-- Loop -->
	<div class="col s12 m4" ng-if="lessons.length > 0" ng-repeat="lesson in lessons | filter:search:strict">

		<!-- Card -->
		<div class="card card-feed" title="{{lesson.date | date: 'dd'}} de {{lesson.date | date: 'MMMM'}} de {{lesson.date | date: 'y'}}">

			<div class="card-content">

				<!-- Card Title -->
				<span class="card-title text-center">{{lesson.date | date: 'dd/MM'}}<small>/{{lesson.date | date: 'y'}}</small></span>

				<div class="clearfix"></div>

				<div class="card-panel small grey lighten-3" ng-if="lesson.formatted_data.length == 0">
					Não há registros para esta aula.
				</div>

				<!-- Listagem de atores participantes -->
				<div class="chip" ng-repeat="(author_id, entries) in lesson.formatted_data">
					<span class="cargo indigo lighten-5">
						{{role_helper(lesson.actors[author_id].role)}}
					</span>
					{{lesson.actors[author_id].full_name }}
				</div> <!-- .chip -->
				
				<div class="clearfix"></div>

				<!-- Listagem de atores participantes -->
				<a href="<?php echo $this->Url->build('/feed/') ?>?hashtag_id={{entries.hashtag.id}}" class="chip chip-hashtag grey lighten-3" ng-repeat="(id, entries) in lesson.lesson_hashtags">
					#{{entries.hashtag.name }}
				</a> <!-- .chip -->
				

			</div> <!-- .card-content -->

			<div class="card-action">
				
				<!-- Botão de Ver Mais -->
				<a href="#modal{{lesson.id}}" modal ng-click="mostrarDados(null, lesson.actors)">ver mais</a>
			</div>

		</div> <!-- .card -->

	</div> <!-- .col -->


	<!-- Modal Structure -->
	<div id="modal{{lesson.id}}" class="modal bottom-sheet" ng-repeat="lesson in lessons | filter:search:strict">
		<div class="modal-content">
			<h4>{{lesson.date | date: 'dd'}} de {{lesson.date | date: 'MMMM'}} de {{lesson.date | date: 'y'}}</h4>

			<p>Selecione um ator:</p>

			<!-- Listagem de atores participantes -->
			<a href="javascript:;" ng-click="mostrarDados(lesson.actors[author_id].role)" class="chip" ng-repeat="(author_id, entries) in lesson.formatted_data" ng-class="{'grey darken-3 white-text selected': mostrar == lesson.actors[author_id].role}">
				<span class="cargo indigo lighten-5" ng-class="{'deep-orange darken-3': mostrar == lesson.actors[author_id].role}">
					{{role_helper(lesson.actors[author_id].role)}}
				</span>
				{{lesson.actors[author_id].full_name }}
			</a> <!-- .chip -->

			<div ng-if="mostrar == lesson.actors[author_id].role" class="dados-{{lesson.actors[author_id].role}}" ng-repeat="(author_id, entries) in lesson.formatted_data">

				<div class="col s4" ng-repeat="entry in entries">
								
					<strong>{{entry.input.name}}</strong>

					<p>{{entry.value}}</p>
				</div>

				<div class="clearfix"></div>


			</div>

		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-green btn red">Fechar</a>
		</div>
	</div> <!-- #modal -->

</div> <!-- .row -->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light green" href="<?php echo $this->Url->build('/registros/adicionar'); ?>"><i class="material-icons">add</i></a>
</div>