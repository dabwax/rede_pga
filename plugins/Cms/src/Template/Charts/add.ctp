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

        <p class="input-field">
            <input type="text" id="chart_name" ng-model="emptyChart.title.text">
            <label for="chart_name">Título do gráfico</label>
        </p> <!-- .input-field -->

        <p class="input-field">
            <input type="text" id="chart_subname" ng-model="emptyChart.subtitle.text">
            <label for="chart_subname">Sub-título do gráfico</label>
        </p> <!-- .input-field -->

        <p class="">
            <label for="chart_type">Formato</label>
            <select name="chart_type" id="chart_type" ng-model="emptyChart.options.chart.type" class="browser-default">
                <option value="line">Linha</option>
                <option value="spline">Smooth Linha</option>
                <option value="area">Área</option>
                <option value="areaspline">Smooth Área</option>
                <option value="column">Colunas</option>
                <option value="bar">Barras</option>
                <option value="pie">Pizza</option>
            </select>
        </p> <!-- .input-field -->

            <label for="date_start">Filtro dos Dados (Data Inicial - apenas para demonstração)</label>
        <p class="input-field">
            <input type="text" id="date_start" kendo-date-picker k-format="'dd/MM/yyyy'" ng-model="emptyChart.options.date_start">
        </p> <!-- .input-field -->

            <label for="date_finish">Filtro dos Dados (Data Final - apenas para demonstração)</label>
        <p class="input-field">
            <input type="text" id="date_finish" kendo-date-picker k-format="'dd/MM/yyyy'" ng-model="emptyChart.options.date_finish">
        </p> <!-- .input-field -->

        <p>
            <input name="formato" type="radio" id="mensal" ng-model="emptyChart.options.format" value="mensal" />
            <label for="mensal">Mensal</label>
        </p>

        <p>
            <input name="formato" type="radio" id="diario" ng-model="emptyChart.options.format" value="diario" />
            <label for="diario">Diário</label>
        </p>

        <div class="card pink lighten-5">
            <div class="card-content">
                <strong class="card-title">Séries</strong>

                <a href="javascript:;" class="btn red" ng-click="adicionar()">Adicionar Série</a>

                <p class="serie-item pink lighten-4" style="margin-top: 10px;" ng-repeat="(key, value) in emptyChart.series">
                    <label for="">Título</label>
                    <input type="text" ng-model="emptyChart.series[key].name">
                    <label for="">Cor</label>
                    <input type="text" ng-model="emptyChart.series[key].color">
                    <label for="">Tipo</label>
                    <select ng-model="emptyChart.series[key].type" class="browser-default">
                        <option value="line">Linha</option>
                        <option value="spline">Smooth Linha</option>
                        <option value="area">Área</option>
                        <option value="areaspline">Smooth Área</option>
                        <option value="column">Colunas</option>
                        <option value="bar">Barras</option>
                        <option value="pie">Pizza</option>
                    </select>
                    <label for="">Input</label>
                    <select ng-model="emptyChart.series[key].input_id" ng-change="trocou()" class="browser-default">
                        <option value="">Selecionar</option>
                        <option ng-repeat="input in inputs" value="{{input.id}}">{{input.name}}</option>
                    </select>
                    <label for="">Matéria</label>
                    <select ng-model="emptyChart.series[key].theme_id" ng-change="trocou()" class="browser-default">
                        <option value="">Todas</option>
                        <option ng-repeat="materia in materias" value="{{materia.id}}">{{materia.name}}</option>
                    </select>
                </p>
            </div>
        </div>

        </div> <!-- .col -->

        <div class="clearfix"></div>

    </div> <!-- .card-content -->

    <div class="card-action">   
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div> <!-- .card-action -->
</div> <!-- .card -->
