<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Chart'), ['action' => 'edit', $chart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chart'), ['action' => 'delete', $chart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Charts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chart Inputs'), ['controller' => 'ChartInputs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chart Input'), ['controller' => 'ChartInputs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="charts view large-10 medium-9 columns">
    <h2><?= h($chart->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($chart->name) ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $chart->has('user') ? $this->Html->link($chart->user->id, ['controller' => 'Users', 'action' => 'view', $chart->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Theme') ?></h6>
            <p><?= $chart->has('theme') ? $this->Html->link($chart->theme->name, ['controller' => 'Themes', 'action' => 'view', $chart->theme->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($chart->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($chart->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($chart->modified) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Use Markers') ?></h6>
            <p><?= $chart->use_markers ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Type') ?></h6>
            <?= $this->Text->autoParagraph(h($chart->type)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Format') ?></h6>
            <?= $this->Text->autoParagraph(h($chart->format)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Chart Inputs') ?></h4>
    <?php if (!empty($chart->chart_inputs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Chart Id') ?></th>
            <th><?= __('Input Id') ?></th>
            <th><?= __('Lessons Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($chart->chart_inputs as $chartInputs): ?>
        <tr>
            <td><?= h($chartInputs->id) ?></td>
            <td><?= h($chartInputs->chart_id) ?></td>
            <td><?= h($chartInputs->input_id) ?></td>
            <td><?= h($chartInputs->lessons_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ChartInputs', 'action' => 'view', $chartInputs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ChartInputs', 'action' => 'edit', $chartInputs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChartInputs', 'action' => 'delete', $chartInputs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chartInputs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
