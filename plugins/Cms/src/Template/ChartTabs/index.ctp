<div class="page-title red darken-3">
    <h2>Abas dos Gráficos</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'add']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i> novo</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="chartTabs index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Aba</th>
                <th>Atores</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chartTabs as $chartTab): ?>
            <tr>
                <td><?= h($chartTab->title) ?></td>
                <td>
                    <?php foreach($chartTab->actors as $c) : ?>
                        <div class="chip">
                            <i class="material-icons">insert_chart</i> <?php echo $c->full_name; ?>
                        </div>
                    <?php endforeach; ?>
                </td>
                <td class="actions">

                    <a href="<?php echo $this->Url->build(['action' => 'edit', $chartTab->id]); ?>" class="btn blue darken-2" title="Editar"><i class="material-icons">edit</i></a>
                    <a href="<?php echo $this->Url->build(['action' => 'delete', $chartTab->id]); ?>" class="btn red darken-3" title="Ocultar" onclick="if(!confirm('Você tem certeza disso? Irá apagar o gráfico.')) { return false; }"><i class="material-icons">remove_circle_outline</i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
