<div class="users form large-10 medium-9 columns">

    <h2><?= __('Editar ' . $current_user_selected['full_name']) ?></h2>
    <hr>

    <p>Esta página é exclusiva a edição dos dados do <?php echo $current_user_selected['full_name']; ?>. Para configurar seus atores, <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'config_actors']); ?>">clique aqui</a>.</p>

    <?= $this->Form->create($user, ['type' => 'file']) ?>

    <h3>Informações Gerais</h3>

    <?php
        echo $this->Form->input('full_name', ['label' => 'Nome', 'class' => 'form-control']);

        echo $this->Form->input('profile_attachment', ['label' => 'Imagem de Perfil', 'class' => 'form-control', 'type' => 'file']);
        echo $this->Html->image("/uploads/" . $user->profile_attachment, ['class' => 'img-circle', 'style' => 'width: 80px; height: 80px; margin-top: 20px;']);

        echo $this->Form->input('date_of_birth', ['label' => 'Data de Aniversário', 'class' => 'form-control datepicker', 'datepicker' => 'datepicker', 'type' => 'text']);
        echo $this->Form->input('clinical_condition', ['label' => 'Condição Clínica', 'class' => 'form-control', 'type' => 'text']);
        echo $this->Form->input('description', ['label' => 'Observação', 'class' => 'form-control', 'type' => 'textarea']);
    ?>

    <h3>Dados de Acesso</h3>

    <?php
        echo $this->Form->input('username', ['label' => 'E-mail', 'class' => 'form-control']);
        echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control']);
    ?>

    <h3>Informações Escolares</h3>
    <?php
        echo $this->Form->input('instituition_id', ['label' => 'Escola', 'class' => 'form-control', 'type' => 'text', 'maxlength' => '255']);
        echo $this->Form->input('school_grade', ['label' => 'Série', 'class' => 'form-control', 'type' => 'text']);
    ?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>

    <?= $this->Form->end() ?>

</div>
