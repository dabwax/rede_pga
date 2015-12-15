<div class="row">

<div class="col-lg-12">
  <h1>Configurações do Sistema</h1>
  <hr>

  <p>Esta página é destinada ao desenvolvedor.</p>

  <a href="<?php echo $this->Url->build(['action' => 'backup']); ?>" class="btn btn-lg btn-success">Efetuar Backup da Base de Dados</a>

  <div class="clearfix"></div>

  <a href="<?php echo $this->Url->build(['action' => 'delete_all']); ?>" class="btn btn-sm btn-danger mt20" onclick="if(!confirm('Você tem certeza disto? Vai apagar TODOS os dados! Esta ação é PERMANENTE!')) { return false; }">Limpar Base de Dados</a>
</div>
</div>