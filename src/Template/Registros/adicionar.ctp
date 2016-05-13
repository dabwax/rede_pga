<?php echo $this->element("../Registros/custom_assets"); ?>

<div class="row" ng-controller="AdicionarRegistrosCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s12">
        <h2>Adicionar Nova Aula</h2>
    </div>

    <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="col s12">
    <div class="card">

      <?= $this->Form->create($lesson); ?>

      <div class="card-content">

        <div class="input-field">
          <strong>Data da Aula *</strong>
          <div class="clearfix"></div>
          <input name="date" type="text" ng-model="lesson.date" datepicker ng-change="mudouData(lesson.date)" />
        </div>


        <div class="input-field">
          <strong>Observações</strong>
          <div class="clearfix"></div>
          <?php echo $this->Form->input("observation", ["editor", "label" => false]); ?>

        </div>

      </div> <!-- .card-content -->

      <div class="card-action">
        <a href="<?php echo $this->Url->build('/'); ?>" class="waves-effect waves-teal btn-flat">Voltar para Feed</a>
        <button type="submit" class="waves-effect waves-light btn" ng-disabled="!avancar">Avançar <i class="large material-icons right">send</i></button>
      </div> <!-- .card-action -->

      <?= $this->Form->end(); ?>

    </div> <!-- .card -->

  </div> <!-- .col -->

</div> <!-- .row -->
