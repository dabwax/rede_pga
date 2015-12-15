<div class="protectors index large-10 medium-9 columns">

    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('full_name', 'Responsável') ?></th>
            <th><?= $this->Paginator->sort('role', 'Cargo') ?></th>
            <th><?= $this->Paginator->sort('username', 'E-mail') ?></th>
            <th><?= $this->Paginator->sort('phone', 'Telefone') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($protectors as $protector): ?>
        <tr>
            <td><?= h($protector->full_name) ?></td>
            <td><?= h($protector->role) ?></td>
            <td><?= h($protector->username) ?></td>
            <td><?= h($protector->phone) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $protector->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $protector->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $protector->id)]) ?>
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
