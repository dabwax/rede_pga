<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instituitions'), ['controller' => 'Instituitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instituition'), ['controller' => 'Instituitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Charts'), ['controller' => 'Charts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart'), ['controller' => 'Charts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hashtags'), ['controller' => 'Hashtags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hashtag'), ['controller' => 'Hashtags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inputs'), ['controller' => 'Inputs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Input'), ['controller' => 'Inputs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lesson Entries'), ['controller' => 'LessonEntries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson Entry'), ['controller' => 'LessonEntries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parents'), ['controller' => 'Parents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent'), ['controller' => 'Parents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Therapists'), ['controller' => 'Therapists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Therapist'), ['controller' => 'Therapists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tutors'), ['controller' => 'Tutors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tutor'), ['controller' => 'Tutors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Full Name') ?></h6>
            <p><?= h($user->full_name) ?></p>
            <h6 class="subheader"><?= __('Profile Attachment') ?></h6>
            <p><?= h($user->profile_attachment) ?></p>
            <h6 class="subheader"><?= __('Instituition') ?></h6>
            <p><?= $user->has('instituition') ? $this->Html->link($user->instituition->name, ['controller' => 'Instituitions', 'action' => 'edit', $user->instituition->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Clinical Condition') ?></h6>
            <p><?= h($user->clinical_condition) ?></p>
            <h6 class="subheader"><?= __('School Grade') ?></h6>
            <p><?= h($user->school_grade) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Of Birth') ?></h6>
            <p><?= h($user->date_of_birth) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($user->description)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Charts') ?></h4>
    <?php if (!empty($user->charts)): ?>
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
        <?php foreach ($user->charts as $charts): ?>
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
                <?= $this->Html->link(__('View'), ['controller' => 'Charts', 'action' => 'edit', $charts->id]) ?>

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
    <?php if (!empty($user->exercises)): ?>
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
        <?php foreach ($user->exercises as $exercises): ?>
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
                <?= $this->Html->link(__('View'), ['controller' => 'Exercises', 'action' => 'edit', $exercises->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Exercises', 'action' => 'edit', $exercises->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercises', 'action' => 'delete', $exercises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercises->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Hashtags') ?></h4>
    <?php if (!empty($user->hashtags)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Model') ?></th>
            <th><?= __('Model Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->hashtags as $hashtags): ?>
        <tr>
            <td><?= h($hashtags->id) ?></td>
            <td><?= h($hashtags->user_id) ?></td>
            <td><?= h($hashtags->model) ?></td>
            <td><?= h($hashtags->model_id) ?></td>
            <td><?= h($hashtags->name) ?></td>
            <td><?= h($hashtags->created) ?></td>
            <td><?= h($hashtags->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Hashtags', 'action' => 'edit', $hashtags->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Hashtags', 'action' => 'edit', $hashtags->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hashtags', 'action' => 'delete', $hashtags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hashtags->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Inputs') ?></h4>
    <?php if (!empty($user->inputs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Model') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Config') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->inputs as $inputs): ?>
        <tr>
            <td><?= h($inputs->id) ?></td>
            <td><?= h($inputs->type) ?></td>
            <td><?= h($inputs->user_id) ?></td>
            <td><?= h($inputs->model) ?></td>
            <td><?= h($inputs->name) ?></td>
            <td><?= h($inputs->config) ?></td>
            <td><?= h($inputs->created) ?></td>
            <td><?= h($inputs->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Inputs', 'action' => 'edit', $inputs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Inputs', 'action' => 'edit', $inputs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inputs', 'action' => 'delete', $inputs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inputs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Lesson Entries') ?></h4>
    <?php if (!empty($user->lesson_entries)): ?>
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
        <?php foreach ($user->lesson_entries as $lessonEntries): ?>
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
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Lessons') ?></h4>
    <?php if (!empty($user->lessons)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Observation') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->lessons as $lessons): ?>
        <tr>
            <td><?= h($lessons->id) ?></td>
            <td><?= h($lessons->user_id) ?></td>
            <td><?= h($lessons->date) ?></td>
            <td><?= h($lessons->observation) ?></td>
            <td><?= h($lessons->created) ?></td>
            <td><?= h($lessons->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Lessons', 'action' => 'edit', $lessons->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Lessons', 'action' => 'edit', $lessons->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lessons', 'action' => 'delete', $lessons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lessons->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Messages') ?></h4>
    <?php if (!empty($user->messages)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Model') ?></th>
            <th><?= __('Model Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Content') ?></th>
            <th><?= __('Views') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->messages as $messages): ?>
        <tr>
            <td><?= h($messages->id) ?></td>
            <td><?= h($messages->user_id) ?></td>
            <td><?= h($messages->model) ?></td>
            <td><?= h($messages->model_id) ?></td>
            <td><?= h($messages->name) ?></td>
            <td><?= h($messages->content) ?></td>
            <td><?= h($messages->views) ?></td>
            <td><?= h($messages->created) ?></td>
            <td><?= h($messages->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Parents') ?></h4>
    <?php if (!empty($user->parents)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->parents as $parents): ?>
        <tr>
            <td><?= h($parents->id) ?></td>
            <td><?= h($parents->user_id) ?></td>
            <td><?= h($parents->role) ?></td>
            <td><?= h($parents->username) ?></td>
            <td><?= h($parents->password) ?></td>
            <td><?= h($parents->full_name) ?></td>
            <td><?= h($parents->phone) ?></td>
            <td><?= h($parents->created) ?></td>
            <td><?= h($parents->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Parents', 'action' => 'edit', $parents->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Parents', 'action' => 'edit', $parents->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parents', 'action' => 'delete', $parents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parents->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Schools') ?></h4>
    <?php if (!empty($user->schools)): ?>
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
        <?php foreach ($user->schools as $schools): ?>
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
    <h4 class="subheader"><?= __('Related Themes') ?></h4>
    <?php if (!empty($user->themes)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->themes as $themes): ?>
        <tr>
            <td><?= h($themes->id) ?></td>
            <td><?= h($themes->user_id) ?></td>
            <td><?= h($themes->name) ?></td>
            <td><?= h($themes->created) ?></td>
            <td><?= h($themes->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Themes', 'action' => 'edit', $themes->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Themes', 'action' => 'edit', $themes->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Themes', 'action' => 'delete', $themes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $themes->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Therapists') ?></h4>
    <?php if (!empty($user->therapists)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->therapists as $therapists): ?>
        <tr>
            <td><?= h($therapists->id) ?></td>
            <td><?= h($therapists->user_id) ?></td>
            <td><?= h($therapists->role) ?></td>
            <td><?= h($therapists->username) ?></td>
            <td><?= h($therapists->password) ?></td>
            <td><?= h($therapists->full_name) ?></td>
            <td><?= h($therapists->phone) ?></td>
            <td><?= h($therapists->created) ?></td>
            <td><?= h($therapists->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Therapists', 'action' => 'edit', $therapists->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Therapists', 'action' => 'edit', $therapists->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Therapists', 'action' => 'delete', $therapists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $therapists->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Tutors') ?></h4>
    <?php if (!empty($user->tutors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Full Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->tutors as $tutors): ?>
        <tr>
            <td><?= h($tutors->id) ?></td>
            <td><?= h($tutors->user_id) ?></td>
            <td><?= h($tutors->role) ?></td>
            <td><?= h($tutors->username) ?></td>
            <td><?= h($tutors->password) ?></td>
            <td><?= h($tutors->full_name) ?></td>
            <td><?= h($tutors->phone) ?></td>
            <td><?= h($tutors->created) ?></td>
            <td><?= h($tutors->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Tutors', 'action' => 'edit', $tutors->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Tutors', 'action' => 'edit', $tutors->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tutors', 'action' => 'delete', $tutors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tutors->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
