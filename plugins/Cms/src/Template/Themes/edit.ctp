<div class="page-title red darken-3">
    <h2>Editar Matéria</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_backspace</i> voltar</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel">
    <?= $this->Form->create($theme) ?>
    <fieldset>
        <legend><?= __('Editar Matéria') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
        ?>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
