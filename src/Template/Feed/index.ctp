<div class="row" ng-controller="FeedCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s12 m6">
        <h2>Inputs</h2>

      <p class="subtitle"><?php if(!empty($hashtag)) : ?><strong>Filtrando pela hashtag: <?php echo $hashtag->name; ?>.</strong><?php endif; ?> </p>
    </div>


    <!-- Pesquisa -->
    <div class="col s12 m5 text-left right">

      <h2 class="search-title">Pesquisa</h2>

      <div class="clearfix"></div>

      <div class="input-field">
        <input type="text"  ng-model="search.$" required>
        <label for="search">Digite aqui</label>
      </div>

        <i class="material-icons" ng-show="search.$" ng-click="reset_search()">close</i>

      <p>{{lessons.length}} aulas registradas.</p>
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
      Você ainda não participou de nenhuma aula.
      <br>
       Use o botão verde ao lado direito para participar de uma aula.
    </div>

    <div class="card-panel grey lighten-1 white-text" ng-if="(lessons | filter:search:strict).length == 0 && search.$">
      Não foram encontradas aulas com estes termos: {{search.$}}.
    </div>

</div> <!-- .row -->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light green" href="<?php echo $this->Url->build('/registros/adicionar'); ?>"><i class="material-icons">add</i></a>
</div>
