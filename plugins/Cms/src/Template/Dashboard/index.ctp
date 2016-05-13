
<div class="card-panel blue lighten-3">
  <div class="card-content">

    <span class="card-title white-text">Aluno Atual: <?php echo @$estudanteAtual['full_name']; ?></span>

    <?php if(empty($estudanteAtual)) : ?>
      <div class="alert alert-danger pull-left" style="margin: 20px;">
        Não há estudantes cadastrados. Isto fará com que o sistema não funcione. <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']) ?>">Adicione um novo estudante</a>.
      </div>
    <?php endif; ?>

    <?php if(!empty($estudanteAtual)) : ?>

    <div class="clearfix"></div>

    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', @$estudanteAtual['id']]); ?>" class="btn blue darken-3" title="Editar Dados do Aluno Atual">
      <i class="material-icons left">edit</i>
      Editar aluno atual
    </a>

    <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'trocar_aluno']); ?>" class="btn red" title="Trocar de Aluno">
      <i class="material-icons left">find_replace</i>
      Trocar de aluno
    </a>

    <?php endif; ?>

  </div>
</div> <!-- .card -->
