<div class="page-title red darken-3">
    <h2>Gráficos</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card col s8 offset-s2">
    <div class="card-content">

        <?php if(!empty($charts)) : ?>
        <table class="table">
        <thead>
            <tr>
                <th>Título do Gráfico</th>
                <th>Sub-Título</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($charts as $chart): ?>
            <tr>
                <td><?= h($chart->name) ?></td>
                <td><?= h($chart->subname) ?></td>
                <td class="actions">


              <a href="<?php echo $this->Url->build(['action' => 'edit', $chart->id]); ?>" class="btn blue darken-2" title="Editar"><i class="material-icons">edit</i></a>
              <a href="<?php echo $this->Url->build(['action' => 'delete', $chart->id]); ?>" class="btn red darken-3" title="Ocultar" onclick="if(!confirm('Você tem certeza disso? Irá apagar o gráfico.')) { return false; }"><i class="material-icons">remove_circle_outline</i></a>

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
