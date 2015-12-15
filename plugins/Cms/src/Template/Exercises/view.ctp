<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="exercises view large-10 medium-9 columns">
    <h2><?= h($exercise->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $exercise->has('user') ? $this->Html->link($exercise->user->id, ['controller' => 'Users', 'action' => 'view', $exercise->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Lesson') ?></h6>
            <p><?= $exercise->has('lesson') ? $this->Html->link($exercise->lesson->id, ['controller' => 'Lessons', 'action' => 'view', $exercise->lesson->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Theme') ?></h6>
            <p><?= $exercise->has('theme') ? $this->Html->link($exercise->theme->name, ['controller' => 'Themes', 'action' => 'view', $exercise->theme->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($exercise->name) ?></p>
            <h6 class="subheader"><?= __('Attachment') ?></h6>
            <p><?= h($exercise->attachment) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($exercise->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Due To') ?></h6>
            <p><?= h($exercise->due_to) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($exercise->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($exercise->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observation') ?></h6>
            <?= $this->Text->autoParagraph(h($exercise->observation)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('User Answer') ?></h6>
            <?= $this->Text->autoParagraph(h($exercise->user_answer)) ?>
        </div>
    </div>
</div>
