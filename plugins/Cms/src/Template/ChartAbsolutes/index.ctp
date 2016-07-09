<div class="page-title red darken-3">
    <h2>Gráficos de Número Absoluto</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="chartAbsolutes index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('input_id') ?></th>
                <th><?= $this->Paginator->sort('title', 'Título') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chartAbsolutes as $chartAbsolute): ?>
            <tr>
                <td><?= $chartAbsolute->has('input') ? $chartAbsolute->input->name : '' ?></td>
                <td><?= h($chartAbsolute->title) ?></td>
                <td class="actions">

                    <a href="<?php echo $this->Url->build(['action' => 'edit', $chartAbsolute->id]); ?>" class="btn blue darken-2" title="Editar"><i class="material-icons">edit</i></a>
                    <a href="<?php echo $this->Url->build(['action' => 'delete', $chartAbsolute->id]); ?>" class="btn red darken-3" title="Ocultar" onclick="if(!confirm('Você tem certeza disso? Irá apagar o gráfico.')) { return false; }"><i class="material-icons">remove_circle_outline</i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
