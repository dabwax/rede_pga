<div class="page-title red darken-3">
    <h2>Inputs</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-content" ng-controller="AdminInputsCtrl" ng-init='items = <?php echo json_encode($inputs, JSON_HEX_APOS); ?>'>

    <table class="table">
    <thead>
        <tr>
            <th>Nome do campo</th>
            <th>Atores destinados</th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody ui-sortable="sortableOptions" ng-model="items">
        <tr ng-repeat="item in items" id="item_id_{{item.id}}">
            <td>{{item.name}}</td>
            <td>{{item.model}}</td>
            <td class="actions">

                <a href="<?php echo $this->Url->build(['action' => 'edit']); ?>/{{item.id}}" class="btn amber darken-2" title="Editar"><i class="material-icons">edit</i></a>
                <a href="<?php echo $this->Url->build(['action' => 'delete']); ?>/{{item.id}}" class="btn red darken-3" title="Ocultar"><i class="material-icons">remove_circle_outline</i></a>
            </td>
        </tr>
    </tbody>
    </table>
</div>
