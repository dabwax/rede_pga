<div class="row" ng-controller="EvolucaoCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s12 l6">
        <h2>Evolução</h2>

        <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>
        <p class="subtitle">
          <?php echo $_GET['inicio']; ?> a <?php echo $_GET['fim']; ?>.
        </p>
        <?php endif; ?>

    </div>

    <!-- Pesquisa -->
    <div class="col s12 l5 right">
      <?php echo $this->element("../Evolucao/formulario_busca"); ?>
    </div>

        <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>
          <div class="clearfix"></div>
      <div class="actions">
        <a href="<?php echo $this->Url->build('/evolucao'); ?>" class="btn grey">Limpar busca</a>
      </div>
        <?php endif; ?>

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="row">
  
    <?php foreach($charts as $c) : ?>
      <div class="grafico" data-dados='<?php echo $this->formatarGrafico($c, $user_id ); ?>'></div>
    <?php endforeach; ?>

    <div class="col s12 l6" ng-repeat="grafico in graficos">
      <highchart config='grafico'></highchart>
    </div>

  </div>

  <?php if(empty($charts->toArray())) : ?>
  <div class="card-panel grey white-text">
    Não há gráficos no momento.
  </div>
  <?php endif; ?>

</div> <!-- .row -->
