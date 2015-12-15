<div class="charts index large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($charts as $chart): ?>
        <tr>
            <td><?= h($chart->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $chart->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $chart->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $chart->id)]) ?>
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
