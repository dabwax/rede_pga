<div class="page-title red darken-3">
    <h2>Configurar Atores</h2>

    <div class="actions">
        <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', $estudanteAtual['id'] ]); ?>" class="waves-effect waves-light btn"><i class="material-icons left">edit</i> Editar Aluno Atual</a>
    </div> <!-- .actions -->

    <div class="clearfix"></div>
</div> <!-- .page-title -->

<div class="card-panel" ng-controller="ConfigurarAtoresCtrl" ng-init='instituitions = <?php echo json_encode($instituitions, JSON_HEX_APOS); ?>;'>

<div id="tabs" tabs>
  <ul>
  	<?php foreach($labels as $k => $l) : ?>
    <li><a href="#tabs-<?php echo $k; ?>"><?php echo $l; ?></a></li>
	<?php endforeach; ?>
  </ul>

  	<?php foreach($labels as $k => $l) : ?>

  	<div id="tabs-<?php echo $k; ?>">

		<?php echo $this->element("actors/add", ['k' => $k, 'l' => $l, 'actors' => $actors]); ?>

		<div class="clearfix"></div>

		<?php echo $this->element("actors/list", ['k' => $k, 'l' => $l, 'actors' => $actors]); ?>
  	</div> <!-- #tabs-# -->
  	
	<?php endforeach; ?>


</div>

</div> <!-- .card-panel -->