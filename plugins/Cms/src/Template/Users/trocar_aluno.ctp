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

    <ul class="collection">
      <?php foreach($users as $u) : ?>
      <li class="collection-item">

      <p style="float: left;">
        <?php echo $u->full_name; ?>
      </p>

      <div style="float: right;">
        <a class="waves-effect waves-teal btn-flat" onclick="if(!confirm('Você tem certeza que quer clonar este aluno?')) { return false; }" href="<?php echo $this->Url->build(['action' => 'clone', $u->id]); ?>">
          <i class="material-icons">account_box</i> Clonar
        </a>
        <a class="waves-effect waves-teal btn-flat" href="<?php echo $this->Url->build(['action' => 'trocar_aluno', $u->id]); ?>">
          <i class="material-icons">send</i> Trocar
        </a>

        <a class="waves-effect waves-teal btn-flat" style="color: #ef5350;" href="<?php echo $this->Url->build(['action' => 'delete', $u->id]); ?>" onclick="if(!confirm('Você tem certeza disto? Todos os dados deste aluno serão removidos!')) { return false; }">
          <i class="material-icons">delete</i> Excluir
        </a>
      </div>

      <div class="clearfix"></div>

      </li>
      <?php endforeach; ?>
    </ul>

  <div class="clearfix"></div>

</div>

</div>
