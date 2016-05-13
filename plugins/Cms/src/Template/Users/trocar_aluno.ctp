<div class="row">

<div class="page-title">
  <h2>Trocar de Aluno</h2>

  <div class="actions">

  <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>" class="btn green"> <i class="material-icons">add</i> Adicionar novo aluno</a>
  <div class="clearfix"></div>
  </div>
</div>

<div class="clearfix"></div>
<div id="role-check" class="text-center card-panel">


  <div class="clearfix"></div>

  <?php if(!empty($users)) : ?>

  <div class="clearfix" style="margin-top: 20px;"></div>

  <?php foreach($users as $u) : ?>
  <a class="chip-aluno chip teal accent-4" href="<?php echo $this->Url->build(['action' => 'trocar_aluno', $u->id]); ?>">
    <?php echo $u->full_name; ?>
  </a>

  <?php if($u->full_name != "Fulano de Tal") : ?>
  <a class="chip-remover-aluno chip red white-text accent-4" href="<?php echo $this->Url->build(['action' => 'delete', $u->id]); ?>" style="float: left; margin-left: 0px;" onclick="if(!confirm('Você tem certeza disto? Todos os dados deste aluno serão removidos!')) { return false; }">
    <i class="material-icons">delete</i>
  </a>
  <?php endif; ?>

  <?php endforeach; ?>

  <div class="clearfix"></div>

<?php endif; ?>

</div>

</div>
