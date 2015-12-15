<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Theme'), ['action' => 'edit', $theme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Theme'), ['action' => 'delete', $theme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Charts'), ['controller' => 'Charts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart'), ['controller' => 'Charts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="themes view large-10 medium-9 columns">
    <h2><?= h($theme->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $theme->has('user') ? $this->Html->link($theme->user->id, ['controller' => 'Users', 'action' => 'view', $theme->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($theme->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($theme->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($theme->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($theme->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Charts') ?></h4>
    <?php if (!empty($theme->charts)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Format') ?></th>
            <th><?= __('Theme Id') ?></th>
            <th><?= __('Use Markers') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($theme->charts as $charts): ?>
        <tr>
            <td><?= h($charts->id) ?></td>
            <td><?= h($charts->name) ?></td>
            <td><?= h($charts->type) ?></td>
            <td><?= h($charts->user_id) ?></td>
            <td><?= h($charts->format) ?></td>
            <td><?= h($charts->theme_id) ?></td>
            <td><?= h($charts->use_markers) ?></td>
            <td><?= h($charts->created) ?></td>
            <td><?= h($charts->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Charts', 'action' => 'view', $charts->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Charts', 'action' => 'edit', $charts->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Charts', 'action' => 'delete', $charts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $charts->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Exercises') ?></h4>
    <?php if (!empty($theme->exercises)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Lesson Id') ?></th>
            <th><?= __('Due To') ?></th>
            <th><?= __('Theme Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Observation') ?></th>
            <th><?= __('Attachment') ?></th>
            <th><?= __('User Answer') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($theme->exercises as $exercises): ?>
        <tr>
            <td><?= h($exercises->id) ?></td>
            <td><?= h($exercises->user_id) ?></td>
            <td><?= h($exercises->lesson_id) ?></td>
            <td><?= h($exercises->due_to) ?></td>
            <td><?= h($exercises->theme_id) ?></td>
            <td><?= h($exercises->name) ?></td>
            <td><?= h($exercises->observation) ?></td>
            <td><?= h($exercises->attachment) ?></td>
            <td><?= h($exercises->user_answer) ?></td>
            <td><?= h($exercises->created) ?></td>
            <td><?= h($exercises->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Exercises', 'action' => 'view', $exercises->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Exercises', 'action' => 'edit', $exercises->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercises', 'action' => 'delete', $exercises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercises->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
