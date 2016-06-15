<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Template Emails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="templateEmails form large-9 medium-8 columns content">
    <?= $this->Form->create($templateEmail) ?>
    <fieldset>
        <legend><?= __('Add Template Email') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
