<div class="row" ng-controller="AdicionarRegistrosCtrl">
  
  <div class="col s12">
    <div class="card">
      
      <?= $this->Form->create($lesson); ?>

      <div class="card-content">
        <span class="card-title">Adicionar Nova Aula</span>
        <p>Ao avançar a página, você preencherá as informações da aula.</p>

        <div class="input-field">
          <?= $this->Form->input("date", ['type' => 'text', 'class' => 'form-control', 'md-datepicker', 'ng-model' => 'lesson.date', 'label' => 'Data da Aula *']); ?>
        </div>

        <div class="input-field">
          <?= $this->Form->input("observation", ['type' => 'textarea', 'class' => 'materialize-textarea ckeditor', 'label' => 'Observações']); ?>
        </div>

      </div> <!-- .card-content -->

      <div class="card-action">
        <a href="<?php echo $this->Url->build('/'); ?>" class="waves-effect waves-teal btn-flat"><i class="large material-icons">arrow_back</i> Voltar para Feed</a>
        <button type="submit" class="waves-effect waves-light btn">Avançar <i class="large material-icons right">send</i></button>
      </div> <!-- .card-action -->

      <?= $this->Form->end(); ?>

    </div> <!-- .card -->

  </div> <!-- .col -->

</div> <!-- .row -->
