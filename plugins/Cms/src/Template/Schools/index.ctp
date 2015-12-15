<div class="schools index large-10 medium-9 columns">


    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('full_name', 'Coordenador / Mediador') ?></th>
            <th><?= $this->Paginator->sort('instituition_id', 'Instituição') ?></th>
            <th><?= $this->Paginator->sort('username', 'E-mail') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($schools as $school): ?>
        <tr>
            <td><?= h($school->full_name) ?></td>
            <td>
                <?= $school->has('instituition') ? $this->Html->link($school->instituition->name, ['controller' => 'Instituitions', 'action' => 'edit', $school->instituition->id]) : '' ?>
            </td>
            <td><?= h($school->username) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $school->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $school->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
        </ul>
    </div>
</div>
