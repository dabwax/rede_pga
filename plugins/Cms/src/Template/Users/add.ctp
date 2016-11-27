<?= $this->Form->create($user, ['type' => 'file']) ?>

<div class="card card-users-add blue-grey darken-1">

    <div class="card-content white-text">

      <span class="card-title">Adicionar Estudante</span>

      <p>Você irá definir os atores na paǵina seguinte. Esta página é exclusiva do aluno.</p>

      <?php
          echo $this->Form->input('full_name', ['label' => 'Nome', 'class' => 'form-control', 'required']);
          echo $this->Form->input('profile_attachment', ['label' => 'Imagem de Perfil', 'class' => 'form-control', 'type' => 'file', 'required']);
          echo $this->Form->input('date_of_birth', ['label' => 'Data de Aniversário', 'class' => 'form-control datepicker', 'datepicker' => 'datepicker', 'type' => 'text', 'required']);
          echo $this->Form->input('clinical_condition', ['label' => 'Condição Clínica', 'class' => 'form-control', 'type' => 'text', 'required']);
          echo $this->Form->input('description', ['label' => 'Observação', 'class' => 'form-control', 'type' => 'textarea', 'required', 'required']);
      ?>

      <b>Dados de Acesso</b>

      <?php
          echo $this->Form->input('username', ['label' => 'E-mail', 'class' => 'form-control', 'required']);
          echo $this->Form->input('password', ['label' => 'Senha', 'class' => 'form-control', 'required']);
      ?>

      <b>Dados Escolares</b>
      <?php
          echo $this->Form->input('instituition_id', ['label' => 'Escola', 'class' => 'form-control', 'type' => 'text', 'maxlength' => '255', 'required']);
          echo $this->Form->input('school_grade', ['label' => 'Série', 'class' => 'form-control', 'type' => 'text', 'required']);
      ?>

  </div> <!-- .card-content -->

  <div class="card-action">
      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-floppy-o"></i> Salvar</button>
  </div> <!-- .card-action -->

</div> <!-- .card -->

<?= $this->Form->end() ?>