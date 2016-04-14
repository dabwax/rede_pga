<div class="page-title red darken-3">
    <h2>Edição de Aluno</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'configurar_atores']); ?>" class="waves-effect waves-light btn"><i class="material-icons left">settings</i> Configurar atores</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel">

    <?= $this->Form->create($user, ['type' => 'file']) ?>

    <h5>Informações do Aluno</h5>
    <hr>

    <div class="col s4">
        <?php

        echo $this->Form->input('full_name', ['label' => 'Nome', 'class' => 'form-control']);
        echo $this->Form->input('description', ['label' => 'Observação', 'class' => 'form-control', 'type' => 'textarea']);
        ?>

    </div>

    <div class="col s4">

    <?php

        echo $this->Form->input('date_of_birth', ['label' => 'Data de Aniversário', 'class' => 'form-control', 'type' => 'text', 'datepicker']);
        echo $this->Form->input('profile_attachment', ['label' => 'Imagem de Perfil', 'class' => 'form-control', 'type' => 'file']);

    ?>
    </div>

    <div class="col s4">

    <?php
        echo $this->Form->input('clinical_condition', ['label' => 'Condição Clínica', 'class' => 'form-control', 'type' => 'text']);
        echo $this->Html->image("/uploads/" . $user->profile_attachment, ['class' => 'img-circle', 'style' => 'width: 80px; height: 80px; margin-top: 20px; float: right;']);

    ?>
    </div>

    <div class="clearfix"></div>


    <h5>Autenticação</h5>
    <hr>

    <div class="col s6">
        <?php

        echo $this->Form->input('username', ['label' => 'E-mail', 'class' => 'form-control']);
        ?>
    </div>


    <div class="col s6">

    <?php
        echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control', 'value' => '']);
    ?>
    </div>


    <h5>Escola</h5>

    <hr>

    <div class="col s6">
        <?php
            echo $this->Form->input('instituition_id', ['label' => 'Escola', 'class' => 'form-control', 'type' => 'text', 'maxlength' => '255']);
            ?>
    </div>

    <div class="col s6">
        <?php
            echo $this->Form->input('school_grade', ['label' => 'Série', 'class' => 'form-control', 'type' => 'text']);
        ?>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="material-icons">save</i> Editar Aluno</button>
    </div>

    <?= $this->Form->end() ?>

</div>
