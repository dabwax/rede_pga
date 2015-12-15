<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instituitions'), ['controller' => 'Instituitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instituition'), ['controller' => 'Instituitions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="schools view large-10 medium-9 columns">
    <h2><?= h($school->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $school->has('user') ? $this->Html->link($school->user->id, ['controller' => 'Users', 'action' => 'edit', $school->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Instituition') ?></h6>
            <p><?= $school->has('instituition') ? $this->Html->link($school->instituition->name, ['controller' => 'Instituitions', 'action' => 'edit', $school->instituition->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($school->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($school->password) ?></p>
            <h6 class="subheader"><?= __('Full Name') ?></h6>
            <p><?= h($school->full_name) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($school->phone) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($school->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($school->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($school->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Role') ?></h6>
            <?= $this->Text->autoParagraph(h($school->role)) ?>
        </div>
    </div>
</div>
