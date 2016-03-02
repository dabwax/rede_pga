<div class="row" ng-controller="EvolucaoCtrl">

	<?php echo $this->element("../Evolucao/formulario_busca"); ?>

	<div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active" href="#planilha1">Linha geral ou por matéria mensal</a></li>
        <li class="tab col s4"><a href="#planilha2">Pizza por matéria porcentagem</a></li>
        <li class="tab col s4"><a href="#planilha3">Coluna Escala de texto matéria</a></li>
      </ul> <!-- .tabs -->
    </div> <!-- .col -->

    <div id="planilha1" class="aba-planilha col s12">

    	<div class="row">
	    	<div class="col s6">
	    		<highchart id="atencao_por_materia_mensal" config="graficos.atencao_por_materia_mensal"></highchart>
	    	</div>
	    	<div class="col s6">
	    		<highchart id="atencao_independencia_autonomia_geral_mensal" config="graficos.atencao_independencia_autonomia_geral_mensal"></highchart>
	    	</div>
    	</div>

    </div> <!-- #planilha1 -->

    <div id="planilha2" class="aba-planilha col s12">

    </div> <!-- #planilha2 -->

    <div id="planilha3" class="aba-planilha col s12">

    </div> <!-- #planilha3 -->

</div> <!-- .row -->