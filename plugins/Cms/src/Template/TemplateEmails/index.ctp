<div class="templateEmails index large-9 medium-8 columns content">
    <h3><?= __('Emails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title', 'Modelo') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($templateEmails as $templateEmail): ?>
            <tr>
                <td><?= h($templateEmail->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar Modelo'), ['action' => 'edit', $templateEmail->id], ['class' => 'btn']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
