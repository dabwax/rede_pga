<div class="page-title red darken-3">
    <h2>Gráficos</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
        <a href="<?php echo $this->Url->build(['controller' => 'chart_tabs', 'action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">list</i> abas</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card col s8 offset-s2" ng-controller="AdminChartsCtrl" ng-init='items = <?php echo json_encode($charts, JSON_HEX_APOS); ?>'>
    <div class="card-content">

        <table class="table">
        <thead>
            <tr>
                <th>Título do Gráfico</th>
                <th>Sub-Título</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody ui-sortable="sortableOptions" ng-model="items">

        <tr ng-repeat="item in items" id="item_id_{{item.id}}">
            <td>{{item.name}}</td>
            <td>{{item.subname}}</td>
            <td class="actions">

                <a href="<?php echo $this->Url->build(['action' => 'edit']); ?>/{{item.id}}" class="btn blue darken-2" title="Editar"><i class="material-icons">edit</i></a>
                <a href="<?php echo $this->Url->build(['action' => 'delete']); ?>/{{item.id}}" class="btn red darken-3" title="Ocultar" onclick="if(!confirm('Você tem certeza disso? Irá apagar o gráfico.')) { return false; }"><i class="material-icons">remove_circle_outline</i></a>
            </td>
        </tr>
        </tbody>
        </table>

    </div> <!-- .card-content -->
</div> <!-- .card -->
