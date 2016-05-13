<div class="row">

<div class="page-title">
  <h2>Configurações</h2>
</div>


<div class="clearfix"></div>

<div class="card-panel">

<div class="page-title">
  <h2 style="font-size: 16px;">Base de Dados</h2>
</div>
<div class="clearfix"></div>
  <a href="<?php echo $this->Url->build(['action' => 'backup']); ?>" class="btn btn-lg btn-success"><i class="material-icons">file_download</i> Fazer Download</a>

  <div class="clearfix"></div>

  <div class="page-title">
    <h2 style="font-size: 16px;">Importação</h2>
  </div>

  <div class="clearfix"></div>

    <div class="field col s4">
      <label>Aluno</label>
      <select name="" class="browser-default" id="">
        <option value="">Selecionar</option>
        <option value="">JP</option>
      </select>
    </div>
    <div class="field col s4">
      <label>Arquivo SQL</label>
      <input type="file">
    </div>
    <div class="field col s4">
    <button class="btn orange">Importar</button>
    </div>

    <div class="clearfix"></div>
    <div class="card-panel red white-text">A importação ainda não está funcionando!</div>

  <div class="clearfix"></div>
</div>
</div>
