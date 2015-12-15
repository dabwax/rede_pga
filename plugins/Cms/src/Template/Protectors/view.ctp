<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Protector'), ['action' => 'edit', $protector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Protector'), ['action' => 'delete', $protector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $protector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Protectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Protector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="protectors view large-10 medium-9 columns">
    <h2><?= h($protector->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $protector->has('user') ? $this->Html->link($protector->user->id, ['controller' => 'Users', 'action' => 'edit', $protector->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($protector->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($protector->password) ?></p>
            <h6 class="subheader"><?= __('Full Name') ?></h6>
            <p><?= h($protector->full_name) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($protector->phone) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($protector->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($protector->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($protector->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Role') ?></h6>
            <?= $this->Text->autoParagraph(h($protector->role)) ?>
        </div>
    </div>
</div>
