<div class="therapists form large-10 medium-9 columns">
    <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-default">Listar Tutores</a>
    <?= $this->Form->create($tutor) ?>
    <fieldset>
        <legend><?= __('Adicionar Tutor') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Estudante', 'class' => 'form-control', 'type' => 'hidden']);
            echo $this->Form->input('full_name', ['label' => 'Nome Completo', 'class' => 'form-control']);
            echo $this->Form->input('username', ['label' => 'Usuário', 'class' => 'form-control']);
            echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control']);
            echo $this->Form->input('phone', ['label' => 'Telefone', 'class' => 'form-control']);
        ?>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>
    <?= $this->Form->end() ?>
</div>
