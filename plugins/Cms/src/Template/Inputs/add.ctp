<div class="page-title red darken-3">
    <h2>Novo Input</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_backspace</i> voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel" ng-controller="CmsInputCtrl" ng-init='input = <?php echo json_encode($input); ?>; input.type = "registro_textual";'>

<?= $this->Form->create($input) ?>

<?php echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Estudante', 'class' => 'form-control', 'type' => 'hidden']); ?>

    <fieldset>
        <div class="input col s6">
          <label for="type">Tipo de Input</label>
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
        </div>
        <div class="input col s6">
        <label for="">Atores</label>
        <?php
            echo $this->Form->input('model', [
            'label' => false,
            'options' => [
                'All' => 'Todos',
                'Protectors' => 'Responsáveis',
                'Schools' => 'Escola',
                'Tutors' => 'Tutor',
                'Therapists' => 'Terapeuta'
            ],
            'class' => 'browser-default',]); ?>
        </div>
        <div class="clearfix"></div>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
        ?>

        <div class="config" ng-if="input.type == 'escala_numerica'">
            <?php echo $this->Form->input('config.min', ['label' => 'Valor Mínimo', 'class' => 'form-control', 'ng-model' => 'input.config.min']); ?>
            <?php echo $this->Form->input('config.max', ['label' => 'Valor Máximo', 'class' => 'form-control', 'ng-model' => 'input.config.max']); ?>
        </div>

        <div class="config" ng-if="input.type == 'escala_texto'">

            <strong>Dica: Se você pressionar Ctrl+B, automaticamente irá adicionar mais uma opção</strong>

            <div class="clearfix"></div>

            <a href="javascript:;" class="btn btn-xs btn-info" style="margin-bottom: 20px; margin-top: 20px;" ng-click="adicionar_mais()">Adicionar +</a>

            <div class="clearfix"></div>

            <div class="form-group">
                <textarea class="form-control" name="config[options][{{index}}]" ng-repeat="(index, option) in input.config.options track by $index" placeholder="Preencha com um nome">{{option}}</textarea>
            </div>
        </div>
    </fieldset>

        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>

    <?= $this->Form->end() ?>
</div>
