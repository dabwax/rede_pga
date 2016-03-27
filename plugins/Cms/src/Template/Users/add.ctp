<div class="card-panel">

    <h2><?= __('Adicionar Estudante') ?></h2>
    <hr>

    <p>Você irá definir os atores na paǵina seguinte. Esta página é exclusiva do aluno.</p>

    <?= $this->Form->create($user, ['type' => 'file']) ?>

    <h3>Informações Gerais</h3>

    <?php
        echo $this->Form->input('full_name', ['label' => 'Nome', 'class' => 'form-control', 'required']);
        echo $this->Form->input('profile_attachment', ['label' => 'Imagem de Perfil', 'class' => 'form-control', 'type' => 'file', 'required']);
        echo $this->Form->input('date_of_birth', ['label' => 'Data de Aniversário', 'class' => 'form-control datepicker', 'datepicker' => 'datepicker', 'type' => 'text', 'required']);
        echo $this->Form->input('clinical_condition', ['label' => 'Condição Clínica', 'class' => 'form-control', 'type' => 'text', 'required']);
        echo $this->Form->input('description', ['label' => 'Observação', 'class' => 'form-control', 'type' => 'textarea', 'required', 'required']);
    ?>

    <h3>Dados de Acesso</h3>

    <?php
        echo $this->Form->input('username', ['label' => 'E-mail', 'class' => 'form-control', 'required']);
        echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control', 'required']);
    ?>

    <h3>Informações Escolares</h3>
    <?php
        echo $this->Form->input('instituition_id', ['label' => 'Escola', 'class' => 'form-control', 'type' => 'text', 'maxlength' => '255', 'required']);
        echo $this->Form->input('school_grade', ['label' => 'Série', 'class' => 'form-control', 'type' => 'text', 'required']);
    ?>


    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
    </div>

    <?= $this->Form->end() ?>

</div>
