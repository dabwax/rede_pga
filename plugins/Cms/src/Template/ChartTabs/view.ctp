<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chart Tab'), ['action' => 'edit', $chartTab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chart Tab'), ['action' => 'delete', $chartTab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chartTab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chart Tabs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart Tab'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chartTabs view large-9 medium-8 columns content">
    <h3><?= h($chartTab->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $chartTab->has('user') ? $this->Html->link($chartTab->user->full_name, ['controller' => 'Users', 'action' => 'view', $chartTab->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($chartTab->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($chartTab->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Charts Related') ?></h4>
        <?= $this->Text->autoParagraph(h($chartTab->charts_related)); ?>
    </div>
</div>
