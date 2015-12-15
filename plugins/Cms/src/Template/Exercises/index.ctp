<div class="exercises index large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('lesson_id', 'Aula') ?></th>
            <th><?= $this->Paginator->sort('due_to', 'Para Quando') ?></th>
            <th><?= $this->Paginator->sort('theme_id', 'Matéria') ?></th>
            <th><?= $this->Paginator->sort('name', 'Questão') ?></th>
            <th><?= $this->Paginator->sort('attachment', 'Anexo') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($exercises as $exercise): ?>
        <tr>
            <td>
                <?= $exercise->has('lesson') ? $this->Html->link($exercise->lesson->date, ['controller' => 'Lessons', 'action' => 'view', $exercise->lesson->id]) : '' ?>
            </td>
            <td><?= h($exercise->due_to) ?></td>
            <td>
                <?= $exercise->has('theme') ? $this->Html->link($exercise->theme->name, ['controller' => 'Themes', 'action' => 'view', $exercise->theme->id]) : '' ?>
            </td>
            <td><?= h($exercise->name) ?></td>
            <td><?= $this->Html->image("/uploads/" . $exercise->attachment, ['class' => 'img-circle', 'style' => 'width: 80px; height: 80px;']) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $exercise->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $exercise->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
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
