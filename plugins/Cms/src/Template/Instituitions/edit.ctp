<div class="instituitions form large-10 medium-9 columns">

    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default">Listar Instituições</a>

    <?= $this->Form->create($instituition) ?>
    <fieldset>
        <legend><?= __('Editar Instituição') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
        ?>
    </fieldset>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
