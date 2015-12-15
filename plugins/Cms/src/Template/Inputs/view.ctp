<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Input'), ['action' => 'edit', $input->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Input'), ['action' => 'delete', $input->id], ['confirm' => __('Are you sure you want to delete # {0}?', $input->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inputs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Input'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lesson Entries'), ['controller' => 'LessonEntries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson Entry'), ['controller' => 'LessonEntries', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="inputs view large-10 medium-9 columns">
    <h2><?= h($input->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $input->has('user') ? $this->Html->link($input->user->id, ['controller' => 'Users', 'action' => 'edit', $input->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($input->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($input->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($input->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($input->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Type') ?></h6>
            <?= $this->Text->autoParagraph(h($input->type)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Model') ?></h6>
            <?= $this->Text->autoParagraph(h($input->model)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Config') ?></h6>
            <?= $this->Text->autoParagraph(h($input->config)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Lesson Entries') ?></h4>
    <?php if (!empty($input->lesson_entries)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Lesson Id') ?></th>
            <th><?= __('Input Id') ?></th>
            <th><?= __('Model') ?></th>
            <th><?= __('Model Id') ?></th>
            <th><?= __('Value') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($input->lesson_entries as $lessonEntries): ?>
        <tr>
            <td><?= h($lessonEntries->id) ?></td>
            <td><?= h($lessonEntries->user_id) ?></td>
            <td><?= h($lessonEntries->lesson_id) ?></td>
            <td><?= h($lessonEntries->input_id) ?></td>
            <td><?= h($lessonEntries->model) ?></td>
            <td><?= h($lessonEntries->model_id) ?></td>
            <td><?= h($lessonEntries->value) ?></td>
            <td><?= h($lessonEntries->created) ?></td>
            <td><?= h($lessonEntries->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'LessonEntries', 'action' => 'edit', $lessonEntries->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'LessonEntries', 'action' => 'edit', $lessonEntries->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'LessonEntries', 'action' => 'delete', $lessonEntries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lessonEntries->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
