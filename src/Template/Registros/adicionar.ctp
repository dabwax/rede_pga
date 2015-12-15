<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-keyboard-o"></i>Inputs', '/registros/listar', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-plus-square-o"></i>Adicionar Novo...', '/registros/adicionar', ['escape' => false]); ?>

<?php echo $this->element("header_pagina", ["titulo" => "Inputs - Adicionar Aula"]); ?>

<div class="row" ng-controller="AdicionarRegistrosCtrl">

	<div class="col-lg-12">
        <?= $this->Form->create($lesson); ?>


          <p>
            Esta é a página em que você inclui novos registros para seu aluno/filho/paciente. <br>
            <br>
            Você só poderá preencher campos que dizem respeito a seu cargo (tutor, psicoterapeuta, responsáveis).
          </p>

          <hr>


		<div class="form-group">
        	<?= $this->Form->input("date", ['type' => 'text', 'class' => 'form-control', 'datepicker', 'ng-model' => 'lesson.date', 'label' => 'Data da Aula']); ?>
		</div>

		<div class="form-group">
        	<?= $this->Form->input("observation", ['type' => 'textarea', 'class' => 'form-control ckeditor', 'label' => 'Observações']); ?>
        </div>

        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn green">
                <i class="fa fa-pencil"></i> Salvar
              </button>
            </div>
          </div>
        </div> <!-- .form-actions -->

        <?= $this->Form->end(); ?>

	</div>
</div>

<?php echo $this->element("footer_pagina"); ?>