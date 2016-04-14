<div class="row" ng-controller="FeedCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s6">
        <h2>Feed</h2>

      <p class="subtitle"><?php if(!empty($hashtag)) : ?><strong>Filtrando pela hashtag: <?php echo $hashtag->name; ?>.</strong><?php endif; ?> </p>
    </div>


    <!-- Pesquisa -->
    <div class="col s6">
      <form>
        <div class="input-field grey lighten-2">
          <input id="search" type="search"  ng-model="search.$" placeholder="Pesquisar aulas por palavra-chave" required>
          <span class="search-icon"><i class="material-icons">search</i></span>
          <i class="material-icons" ng-click="reset_search()">close</i>
        </div>
      </form>
    </div>

      <div class="actions">

      <?php if(!empty($hashtag)) : ?>
        <a href="<?php echo $this->Url->build('/'); ?>" class="btn grey">Remover filtro</a>
      <?php endif; ?>

      </div> <!-- .actions -->

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div id="masonry-grid" masonry='{ "transitionDuration" : "0.4s" , "itemSelector" : ".tile"}'>

    <!-- Loop -->
    <div masonry-tile class="tile col s12 m4" ng-if="lessons.length > 0" ng-repeat="lesson in lessons | filter:search:strict">

      <!-- Card -->
      <div class="card card-feed" title="{{lesson.date | date: 'dd'}} de {{lesson.date | date: 'MMMM'}} de {{lesson.date | date: 'y'}}">

      <?php echo $this->element("../Feed/card"); ?>

      </div> <!-- .card -->

    </div> <!-- End Loop -->

  </div> <!-- #main -->


  <?php echo $this->element("../Feed/modal"); ?>

    <div class="card-panel grey white-text" ng-if="lessons.length == 0">
      Não há aulas cadastradas no momento. Use o botão verde ao lado direito para adicionar uma nova.
    </div>

    <div class="card-panel grey lighten-1 white-text" ng-if="(lessons | filter:search:strict).length == 0">
      Não foram encontradas aulas com estes termos: {{search.$}}.
    </div>

</div> <!-- .row -->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light green" href="<?php echo $this->Url->build('/registros/adicionar'); ?>"><i class="material-icons">add</i></a>
</div>
