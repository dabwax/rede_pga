<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chart Absolute'), ['action' => 'edit', $chartAbsolute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chart Absolute'), ['action' => 'delete', $chartAbsolute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chartAbsolute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chart Absolutes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart Absolute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inputs'), ['controller' => 'Inputs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Input'), ['controller' => 'Inputs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chartAbsolutes view large-9 medium-8 columns content">
    <h3><?= h($chartAbsolute->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $chartAbsolute->has('user') ? $this->Html->link($chartAbsolute->user->full_name, ['controller' => 'Users', 'action' => 'view', $chartAbsolute->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Input') ?></th>
            <td><?= $chartAbsolute->has('input') ? $this->Html->link($chartAbsolute->input->name, ['controller' => 'Inputs', 'action' => 'view', $chartAbsolute->input->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($chartAbsolute->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($chartAbsolute->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($chartAbsolute->type)); ?>
    </div>
</div>
