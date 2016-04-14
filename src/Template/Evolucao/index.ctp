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
    <div class="col s12 l6">
      <?php echo $this->element("../Evolucao/formulario_busca"); ?>
    </div>

        <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>
      <div class="actions">
        <a href="<?php echo $this->Url->build('/evolucao'); ?>" class="btn grey">Remover filtro</a>
      </div>
        <?php endif; ?>

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="row">
    <?php foreach($charts as $c) : ?>
    <div class="col s12 l6" ng-init='abacate = <?php echo $this->formatarGrafico($c); ?>'>

      <highchart config="abacate"></highchart>
    </div>
  <?php endforeach; ?>
  </div>

  <?php if(empty($charts->toArray())) : ?>
  <div class="card-panel grey white-text">
    Não há gráficos no momento.
  </div>
  <?php endif; ?>

</div> <!-- .row -->
