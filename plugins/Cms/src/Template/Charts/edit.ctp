<div class="charts form large-10 medium-9 columns" ng-controller="CmsChartsCtrl">
    <?= $this->Form->create($chart) ?>
    <fieldset ng-init='chart = <?php echo json_encode($chart, true); ?>; inputs = <?php echo json_encode($inputs, true); ?>'>
        <legend><?= __('Editar Gráfico') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
            echo $this->Form->input('use_media', ['label' => 'Usar média?', 'type' => 'checkbox', 'class' => 'form-control']);
            echo $this->Form->input('to_user', ['label' => 'É para aparecer SOMENTE para o aluno?', 'type' => 'checkbox', 'class' => 'form-control']);
            echo $this->Form->input('type', ['label' => 'Tipo', 'class' => 'form-control', 'options' => ['line' => 'Linha', 'bar' => 'Barra', 'donut' => 'Donut', 'radar' => 'Radar', 'pie' => 'Pizza', 'column' => 'Coluna', 'numero_absoluto' => 'Número Absoluto'] ]);
            echo $this->Form->input("themes", ['options' => $themes, 'multiple' => true, 'label' => false, 'class' => 'form-control', 'select-two'] );
        ?>

        <h2>Inputs</h2>
        <hr>

        <a href="javascript:;" class="btn btn-info" ng-click="chart.chart_inputs.push({input_id: null})">Adicionar +</a>

        <div class="form-group" ng-repeat="(index, chart_input) in chart.chart_inputs">
            <select name="chart_inputs[{{index}}]" class="form-control">
                <option value="">Selecionar</option>
                <option value="{{index2}}" ng-repeat="(index2, value2) in inputs" ng-selected="index2 == chart_input.input_id">{{value2}}</option>
            </select>    
        </div> <!-- .form-group -->

    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
