<div class="inputs index large-10 medium-9 columns" ng-controller="AdminInputsCtrl" ng-init='items = <?php echo json_encode($inputs, JSON_HEX_APOS); ?>'>

    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary pull-right">Adicionar Novo Input</a>

    <h2>Inputs</h2>
    <hr>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
            <th><?= $this->Paginator->sort('model', 'Atores') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody ui-sortable="sortableOptions" ng-model="items">
        <tr ng-repeat="item in items" id="item_id_{{item.id}}">
            <td>{{item.name}}</td>
            <td>{{item.model}}</td>
            <td class="actions">

                <a href="<?php echo $this->Url->build(['action' => 'edit']); ?>/{{item.id}}" class="btn btn-success">Editar</a>
                <a href="<?php echo $this->Url->build(['action' => 'delete']); ?>/{{item.id}}" class="btn btn-success">Ocultar</a>
            </td>
        </tr>
    </tbody>
    </table>
</div>
