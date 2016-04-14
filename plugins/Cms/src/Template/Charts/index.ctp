<div class="page-title red darken-3">
    <h2>Gráficos</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card">
    <div class="card-content">

        <?php if(!empty($charts)) : ?>
        <table class="table">
        <thead>
            <tr>
                <th>Título do Gráfico</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($charts as $chart): ?>
            <tr>
                <td><?= h($chart->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $chart->id], ['class' => 'btn btn-default']) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $chart->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $chart->id)]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
        <?php endif; ?>

                <?php if(empty($charts)) : ?>
         <div class="card-panel teal lighten-2 white-text">Não há gráficos cadastrados até o momento.</div>

         <?php endif; ?>
    </div> <!-- .card-content -->
</div> <!-- .card -->
