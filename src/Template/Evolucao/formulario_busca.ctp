<form action="" method="GET" id="formulario-busca" class="grey lighten-2">


  <div class="col s3">
    <button type="submit" class="search-icon btn-enviar-busca">
      <i class="material-icons">search</i>
    </button>
    <p>&nbsp;</p>
  </div>

  <div class="input-field col s4">
    <label for="data_inicio">Data Início</label>
    <input type="text" name="inicio" ng-model="date_start" datepicker id="data_inicio">
  </div>

  <div class="input-field col s4">
    <label for="data_inicio">Data Fim</label>
    <input type="text" name="fim" ng-model="date_finish" datepicker id="data_fim">
  </div>

  <div class="clearfix"></div>

</form> <!-- #formulario-busca -->
