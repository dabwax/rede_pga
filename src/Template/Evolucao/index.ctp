<div class="row" ng-controller="EvolucaoCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s12 l6">
    <?php if($this->name != "Relatorio") : ?>
        <h2>Evolução</h2>
      <?php else: ?>
        <h2>Relatório de Evolução</h2>

        <div class="clearfix" style="margin-top: 20px;"></div>

        <?php echo $report->observation; ?>

      <?php endif; ?>

        <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>
        <p class="subtitle">
          <?php echo $_GET['inicio']; ?> a <?php echo $_GET['fim']; ?>.
        </p>
        <?php endif; ?>

    </div>

    <!-- Pesquisa -->
    <?php if($this->name != "Relatorio") : ?>
      <?php echo $this->element("../Evolucao/formulario_busca"); ?>

        <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>
          <div class="clearfix"></div>
      <div class="actions">
        <a href="<?php echo $this->Url->build('/evolucao'); ?>" class="btn grey">Limpar busca</a>
      </div>
        <?php endif; ?>

      <div class="clearfix"></div>
    <?php endif; ?>
  </div> <!-- .page-title -->

  <div class="clearfix"></div>

  <div class="row">
    <div class="col s12">
    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn <?php if(empty($tab_id)): ?>green<?php endif; ?>">Geral</a>
    
    <?php foreach($tabs as $tab) : ?>
      <a href="<?php echo $this->Url->build(['action' => 'index', $tab->id]); ?>" class="btn <?php if(!empty($tab_id) && $tab_id == $tab->id): ?>green<?php endif; ?>"><?php echo $tab->title; ?></a>
    <?php endforeach; ?>

    </div> <!-- .col -->
  </div> <!-- .row -->

  <div class="row">
    <?php foreach($absolutes as $abs) : ?>
    <div class="col s6">

      <p style="text-transform: uppercase;"><strong><?php echo $abs->title; ?></strong> <?php echo $abs->value; ?></p>

    </div> <!-- .col -->
    <?php endforeach; ?>
  </div> <!-- .row -->

  <div class="row">

    <?php foreach($charts as $c) : ?>
      <div class="grafico" data-dados='<?php echo $this->formatarGrafico($c, $user_id, $tab_id ); ?>'></div>
    <?php endforeach; ?>

    <div class="col s12 l6 graficoHighchart grafico{{grafico.chart_id}}" ng-repeat="grafico in graficos">
      <highchart config='grafico'></highchart>
    </div>

  </div>

  <?php if(empty($charts->toArray())) : ?>
  <div class="card-panel grey white-text">
    Não há gráficos no momento.
  </div>
  <?php endif; ?>

        <div class="clearfix"></div>

        <?php if($this->name != "Relatorio") : ?>
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i> Clique Aqui para Gerar Relatório</div>
            <div class="collapsible-body">

              <?php echo $this->Form->create(); ?>

              <?php echo $this->Form->input("user_id", ['type' => 'hidden', 'value' => $userLogged['user_id'] ]); ?>
              <?php echo $this->Form->input("start", ['type' => 'hidden', 'value' => @$_GET['inicio']]); ?>
              <?php echo $this->Form->input("end", ['type' => 'hidden', 'value' => @$_GET['fim']]); ?>

              <p>
                <label for="observacao">Observação</label>
                <?php echo $this->Form->input("observation", ['type' => 'textarea', 'editor', 'label' => false]); ?>
              </p>

              <p>
                <button type="submit" class="btn grey">Gerar Relatório</button>
              </p>

              <?php echo $this->Form->end(); ?>

            </div>
          </li>
        </ul>
      <?php endif; ?>

</div> <!-- .row -->

<?php $this->start('custom_assets'); ?>
<?php echo $this->Html->css("/bower_components/trumbowyg/dist/ui/trumbowyg.min.css") ?>
<?php echo $this->Html->script("/bower_components/trumbowyg/dist/trumbowyg.min.js") ?>

<style>
  .trumbowyg-box, .trumbowyg-editor {
    margin: 0px !important;
  }
  .trumbowyg-editor li {
    list-style-type: disc;
  }
</style>
<?php $this->end(); ?>
