<div class="themes form large-10 medium-9 columns">
    <?= $this->Form->create($theme) ?>
    <fieldset>
        <legend><?= __('Adicionar Matéria') ?></legend>
        <?php
            echo $this->Form->input('name', ['label' => 'Nome', 'class' => 'form-control']);
        ?>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
