<div class="inputs index large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
            <th><?= $this->Paginator->sort('model', 'Atores') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($inputs as $input): ?>
        <tr>
            <td><?= h($input->name) ?></td>
            <td><?= h($input->model) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $input->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $input->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $input->id)]) ?>
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
