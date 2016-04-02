<div class="row" ng-controller="EvolucaoCtrl">

	<?php echo $this->element("../Evolucao/formulario_busca"); ?>


	    	<div class="row">
					<?php foreach($charts as $c) : ?>
		    	<div class="col s6" ng-init='abacate = <?php echo $this->formatarGrafico($c); ?>'>

						<highchart config="abacate"></highchart>
					</div>
				<?php endforeach; ?>
				</div>

</div> <!-- .row -->
