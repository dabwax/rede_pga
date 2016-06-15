<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Template Email'), ['action' => 'edit', $templateEmail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Template Email'), ['action' => 'delete', $templateEmail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templateEmail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Template Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template Email'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="templateEmails view large-9 medium-8 columns content">
    <h3><?= h($templateEmail->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($templateEmail->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($templateEmail->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($templateEmail->content)); ?>
    </div>
</div>
