
<div class="card blue-grey center darken-1">
  <div class="card-content">

    <span class="card-title white-text">Aluno Atual: <?php echo @$estudanteAtual['full_name']; ?></span>

    <?php if(empty($estudanteAtual)) : ?>
      <div class="alert alert-danger pull-left" style="margin: 20px;">
        Não há estudantes cadastrados. Isto fará com que o sistema não funcione. <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']) ?>">Adicione um novo estudante</a>.
      </div>
    <?php endif; ?>

    <?php if(!empty($estudanteAtual)) : ?>

    <div class="clearfix"></div>

    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>" class="btn light-green" title="Editar Dados do Aluno Atual">
      <i class="material-icons left">add</i>
      Adicionar novo aluno
    </a>

    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', @$estudanteAtual['id']]); ?>" class="btn light-blue" title="Editar Dados do Aluno Atual">
      <i class="material-icons left">edit</i>
      Editar aluno atual
    </a>

    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'trocar_aluno']); ?>" class="btn yellow darken-4" title="Trocar de Aluno">
      <i class="material-icons left">find_replace</i>
      Trocar de aluno
    </a>

    <?php endif; ?>

  </div>
</div> <!-- .card -->
