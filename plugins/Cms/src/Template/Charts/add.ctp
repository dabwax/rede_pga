<div class="page-title red darken-3">
    <h2><i class="material-icons left">add</i> Novo Gráfico</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_backspace</i> Voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card" ng-controller="NovoGraficoCtrl">
    <div class="card-content">

        <?= $this->Form->create($chart) ?>

        <div id="demonstracao" class="col s6">
            <p><strong>Demonstração:</strong></p>

            <highchart id="grafico_demonstracao" config="emptyChart"></highchart>
        </div> <!-- #demonstracao -->

        <div class="col s6">

          <?php echo $this->Form->input("name", ["id" =>"chart_name", "ng-model" =>"emptyChart.title.text","label"=>"Título"]) ?>

          <?php echo $this->Form->input("subname", ["id" =>"chart_subname", "ng-model" =>"emptyChart.subtitle.text","label"=>"Sub-título"]) ?>

          <?php echo $this->Form->input("type", ["id" =>"chart_type", "ng-model" =>"emptyChart.options.chart.type","label"=>"Formato","class"=>"browser-default","options"=>$types]) ?>

          <?php echo $this->Form->input("filter_start", ["id" =>"date_start", "datepicker", "ng-model" =>"emptyChart.filter_start","label"=>"Filtro dos Dados (Data Inicial - apenas para demonstração)"]) ?>

          <?php echo $this->Form->input("filter_end", ["id" =>"date_end", "datepicker", "ng-model" =>"emptyChart.filter_end","label"=>"Filtro dos Dados (Data Final - apenas para demonstração)"]) ?>

          <input name="format" type="radio" id="mensal" ng-model="emptyChart.format" value="mensal" />

          <input name="format" type="radio" id="diario" ng-model="emptyChart.format" value="diario" />

        <div class="card pink lighten-5">
            <div class="card-content">
                <strong class="card-title">Séries</strong>

                <a href="javascript:;" class="btn red" ng-click="adicionar()">Adicionar Série</a>

                <p class="serie-item pink lighten-4" style="margin-top: 10px;" ng-repeat="(key, value) in emptyChart.series track by $index">
                    <label for="">Título</label>
                    <input type="text" name="chart_series[{{key}}][name]" ng-model="emptyChart.series[key].name">
                    <label for="">Cor</label>
                    <input type="text" name="chart_series[{{key}}][color]" ng-model="emptyChart.series[key].color">
                    <label for="">Tipo</label>

                    <select name="chart_series[{{key}}][type]" ng-model="emptyChart.series[key].type" class="browser-default">
                      <?php foreach($types as $k => $v) : ?>
                        <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <label for="">Input</label>
                    <select name="chart_series[{{key}}][input_id]" ng-model="emptyChart.series[key].input_id" ng-change="trocou(key)" class="browser-default">
                        <option value="">Selecionar</option>
                        <option ng-repeat="input in inputs" value="{{input.id}}">{{input.name}}</option>
                    </select>

                    <div ng-if="emptyChart.series[key].input_id">

                      <label for="">Matéria</label>
                      <select name="chart_series[{{key}}][theme_id]" ng-model="emptyChart.series[key].theme_id" ng-change="trocou(key)" class="browser-default">
                          <option value="">Todas</option>
                          <option ng-repeat="materia in materias" value="{{materia.id}}">{{materia.name}}</option>
                      </select>

                    </div>

                </p>
            </div>
        </div>

        <button class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>

        </div> <!-- .col -->

        <?php echo $this->Form->end(); ?>

        <div class="clearfix"></div>

    </div> <!-- .card-content -->

</div> <!-- .card -->
