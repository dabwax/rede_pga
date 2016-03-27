<div class="page-title red darken-3">
    <h2>Matérias</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel">

    <table class="table">
    <thead>
        <tr>
            <th>Matéria</th>
            <th class="actions"><?= __('Ações') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($themes as $theme): ?>
        <tr>
            <td><?= h($theme->name) ?></td>
            <td class="actions">

                              <a href="<?php echo $this->Url->build(['action' => 'edit', $theme->id]); ?>" class="btn amber darken-2" title="Editar"><i class="material-icons">edit</i></a>
                              <a href="<?php echo $this->Url->build(['action' => 'delete', $theme->id]); ?>" class="btn red darken-3" title="Ocultar"><i class="material-icons">remove_circle_outline</i></a>

            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
