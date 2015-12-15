<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Instituition'), ['action' => 'edit', $instituition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Instituition'), ['action' => 'delete', $instituition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instituition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Instituitions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instituition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="instituitions view large-10 medium-9 columns">
    <h2><?= h($instituition->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($instituition->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($instituition->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Schools') ?></h4>
    <?php if (!empty($instituition->schools)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Instituition Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($instituition->schools as $schools): ?>
        <tr>
            <td><?= h($schools->id) ?></td>
            <td><?= h($schools->user_id) ?></td>
            <td><?= h($schools->role) ?></td>
            <td><?= h($schools->instituition_id) ?></td>
            <td><?= h($schools->username) ?></td>
            <td><?= h($schools->password) ?></td>
            <td><?= h($schools->full_name) ?></td>
            <td><?= h($schools->phone) ?></td>
            <td><?= h($schools->created) ?></td>
            <td><?= h($schools->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Schools', 'action' => 'edit', $schools->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Schools', 'action' => 'edit', $schools->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schools', 'action' => 'delete', $schools->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schools->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($instituition->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= __('Profile Attachment') ?></th>
            <th><?= __('Date Of Birth') ?></th>
            <th><?= __('Instituition Id') ?></th>
            <th><?= __('Clinical Condition') ?></th>
            <th><?= __('School Grade') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($instituition->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->full_name) ?></td>
            <td><?= h($users->profile_attachment) ?></td>
            <td><?= h($users->date_of_birth) ?></td>
            <td><?= h($users->instituition_id) ?></td>
            <td><?= h($users->clinical_condition) ?></td>
            <td><?= h($users->school_grade) ?></td>
            <td><?= h($users->description) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
