<div class="themes index large-10 medium-9 columns">

    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('name', 'Matéria') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($themes as $theme): ?>
        <tr>
            <td><?= h($theme->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $theme->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $theme->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]) ?>
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
