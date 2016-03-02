<form id="formulario-busca">

	<div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">

        	<div class="row">
            	<div class="input-field col s5">
            		<label for="data_inicio">Data Início</label>
            		<input type="text" ng-model="date_start" kendo-date-picker k-format="'dd/MM/yyyy'" id="data_inicio">
            	</div>

            	<div class="input-field col s5">
            		<label for="data_inicio">Data Fim</label>
            		<input type="text" ng-model="date_finish" kendo-date-picker k-format="'dd/MM/yyyy'" id="data_inicio">
            	</div>

            	<div class="input-field col s2">
            		<button class="btn right">
			      		<i class="material-icons">search</i>
			      	</button>
            	</div>
        	</div>
        </div>
      </div>
    </div>

</form> <!-- #formulario-busca -->