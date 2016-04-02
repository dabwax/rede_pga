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

			<?php echo $this->element("aula/card"); ?>

		</div> <!-- .card -->

	</div> <!-- .col -->


	<?php echo $this->element("aula/modal"); ?>

</div> <!-- .row -->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light green" href="<?php echo $this->Url->build('/registros/adicionar'); ?>"><i class="material-icons">add</i></a>
</div>
