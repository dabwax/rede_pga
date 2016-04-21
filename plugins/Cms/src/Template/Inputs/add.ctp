<div class="page-title red darken-3">
    <h2>Novo Input</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn grey"><i class="material-icons left">keyboard_backspace</i> voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel" ng-controller="CmsInputCtrl" ng-init='input = <?php echo json_encode($input); ?>;'>

    <shortcut></shortcut>

  <?= $this->Form->create($input) ?>

  <?php echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']); ?>

  <strong>Tipo</strong>
  <?php
  echo $this->Form->input('type', [
  'label' => false,
  'div' => false,
   'options' => [
       'calendario' => 'Calendário',
       'intervalo_tempo' => 'Intervalo de Tempo',
       'registro_textual' => 'Registro Textual',
       'escala_numerica' => 'Escala Numérica',
       'escala_texto' => 'Escala de Texto',
       'numero' => 'Número',
       'texto_privativo' => 'Texto Privativo'
  ],
  'class' => 'browser-default',
  'ng-model' => 'input.type'
  ]); ?>

  <strong>Atores</strong>

  <p>
    <input type="hidden" name="belongs_to_schools" value="0">
    <input type="checkbox" name="belongs_to_schools" id="belongs_to_schools" value="1" <?php if($input->belongs_to_schools == 1) :?>checked<?php endif; ?>>
    <label for="belongs_to_schools">Escolas?</label>
  </p>

  <p>
    <input type="hidden" name="belongs_to_tutors" value="0">
    <input type="checkbox" name="belongs_to_tutors" id="belongs_to_tutors" value="1" <?php if($input->belongs_to_tutors == 1) :?>checked<?php endif; ?>>
    <label for="belongs_to_tutors">Tutores?</label>
  </p>

  <p>
    <input type="hidden" name="belongs_to_protectors" value="0">
    <input type="checkbox" name="belongs_to_protectors" id="belongs_to_protectors" value="1" <?php if($input->belongs_to_protectors == 1) :?>checked<?php endif; ?>>
    <label for="belongs_to_protectors">Responsáveis?</label>
  </p>

  <p>
    <input type="hidden" name="belongs_to_users" value="0">
    <input type="checkbox" name="belongs_to_users" id="belongs_to_users" value="1" <?php if($input->belongs_to_users == 1) :?>checked<?php endif; ?>>
    <label for="belongs_to_users">Alunos?</label>
  </p>

  <p>
    <input type="hidden" name="belongs_to_therapists" value="0">
    <input type="checkbox" name="belongs_to_therapists" id="belongs_to_therapists" value="1" <?php if($input->belongs_to_therapists == 1) :?>checked<?php endif; ?>>
    <label for="belongs_to_therapists">Terapeutas?</label>
  </p>


  <div class="config" ng-if="input.type == 'escala_numerica'">
    <strong>Configuração Escala Numérica</strong>
    <div class="clearfix"></div>


    <div class="col s6">
      <?php echo $this->Form->input('config.min', ['label' => 'Valor Mínimo', 'class' => 'form-control', 'ng-model' => 'input.config.min']); ?>
    </div>

    <div class="col s6">
      <?php echo $this->Form->input('config.max', ['label' => 'Valor Máximo', 'class' => 'form-control', 'ng-model' => 'input.config.max']); ?>
    </div>

  </div> <!-- escala_numerica -->

  <div class="config" ng-if="input.type == 'escala_texto'">
    <strong>Configuração Escala de Texto</strong>

      <div class="clearfix"></div>

      <a href="javascript:;" class="btn btn-xs btn-info" style="margin-bottom: 20px; margin-top: 20px;" ng-click="adicionar_mais()">Adicionar +</a>

      <div class="clearfix"></div>

      <div class="form-group">
          <textarea class="form-control" name="config[options][{{index}}]" ng-repeat="(index, option) in input.config.options track by $index" placeholder="Preencha com um nome">{{option}}</textarea>
      </div>
  </div> <!-- escala_texto -->

  <div class="form-group">
    <button type="submit" class="btn"><i class="material-icons">save</i> Salvar</button>
  </div>

    <?= $this->Form->end() ?>
</div>
