<div class="users index large-10 medium-9 columns">

    <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="btn btn-primary">Adicionar</a>

    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('full_name', 'Nome') ?></th>
            <th><?= $this->Paginator->sort('date_of_birth', 'Data de Aniversário') ?></th>
            <th><?= $this->Paginator->sort('username', 'E-mail') ?></th>
            <th><?= $this->Paginator->sort('instituition_id', 'Instituição') ?></th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>
        <?php echo $this->Html->image("/uploads/" . $user->profile_attachment, ['class' => 'img-circle', 'style' => 'width: 40px; height: 40px; margin-top: 20px;']); ?> <?= h($user->full_name) ?></td>
            <td><?= h($user->date_of_birth) ?></td>
            <td><?= h($user->username) ?></td>
            <td>
                <?= $user->has('instituition') ? $this->Html->link($user->instituition->name, ['controller' => 'Instituitions', 'action' => 'edit', $user->instituition->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-default']) ?>
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
