<div class="inputs form large-10 medium-9 columns" ng-controller="CmsInputCtrl">
    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default">Listar Inputs</a>
    <?= $this->Form->create($input) ?>
    <fieldset ng-init='input = <?php echo json_encode($input); ?>;'>
        <legend><?= __('Adicionar Input') ?></legend>
        <?php
            echo $this->Form->input('type', ['label' => 'Tipo', 'options' => ['calendario' => 'Calendário', 'intervalo_tempo' => 'Intervalo de Tempo', 'registro_textual' => 'Registro Textual', 'escala_numerica' => 'Escala Numérica', 'escala_texto' => 'Escala de Texto', 'numero' => 'Número', 'texto_privativo' => 'Texto Privativo'], 'class' => 'form-control', 'ng-model' => 'input.type' ]);
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Estudante', 'class' => 'form-control', 'type' => 'hidden']);
            echo $this->Form->input('model', ['label' => 'Modelo', 'options' => ['All' => 'Todos', 'Protectors' => 'Responsáveis', 'Schools' => 'Escola', 'Tutors' => 'Tutor', 'Therapists' => 'Terapeuta'], 'class' => 'form-control' ]);
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
        ?>

        <div class="config" ng-if="input.type == 'escala_numerica'">
            <?php echo $this->Form->input('config.min', ['label' => 'Valor Mínimo', 'class' => 'form-control', 'ng-model' => 'input.config.min']); ?>
            <?php echo $this->Form->input('config.max', ['label' => 'Valor Máximo', 'class' => 'form-control', 'ng-model' => 'input.config.max']); ?>
        </div>

        <div class="config" ng-if="input.type == 'escala_texto'">

            <a href="javascript:;" class="btn btn-xs btn-info" style="margin-bottom: 20px; margin-top: 20px;" ng-click="input.config.options.push('Preencha com um nome')">Adicionar +</a>

            <div class="clearfix"></div>

            <div class="form-group">
                <textarea class="form-control" name="config[options][{{index}}]" ng-repeat="(index, option) in input.config.options">{{option}}</textarea>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>

    <?= $this->Form->end() ?>
</div>
