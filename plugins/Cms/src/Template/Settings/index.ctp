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
  
    <?php echo $this->Form->create(null, ['type' => 'file']); ?>
    <div class="field col s4">
      <label>Arquivo SQL (Backup)</label>
      <input name="dump" type="file">
    </div>
    <div class="field col s4">
    <button type="submit" class="btn orange">Importar</button>
    </div>
    <?php echo $this->Form->end(); ?>

    <div class="clearfix"></div>
    <div class="card-panel red white-text">Muito cuidado ao utilizar a Importação dos dados!</div>

  <div class="clearfix"></div>
</div>
</div>
