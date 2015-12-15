<div class="therapists index large-10 medium-9 columns">

    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('full_name', 'Tutor') ?></th>
            <th><?= $this->Paginator->sort('username', 'E-mail') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tutors as $therapist): ?>
        <tr>
            <td><?= h($therapist->full_name) ?></td>
            <td><?= h($therapist->username) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $therapist->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $therapist->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $therapist->id)]) ?>
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
