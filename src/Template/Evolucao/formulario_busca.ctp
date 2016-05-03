<form action="" method="GET" id="formulario-busca" <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>ng-init="date_start = '<?php echo $_GET['inicio'] ?>'; date_finish = '<?php echo $_GET['fim'] ?>';"<?php endif; ?> class="grey lighten-2">



  <div class="col s4">
    <label for="data_inicio">Início</label>
    <input type="text" name="inicio" ng-model="date_start" datepicker id="data_inicio">
  </div>

  <div class="col s5">
    <label for="data_inicio">Fim</label>
    <input type="text" name="fim" ng-model="date_finish" datepicker id="data_fim">
  </div>

  <div class="col s2">
    <button type="submit" class="search-icon btn-enviar-busca">
      <i class="material-icons">search</i>
    </button>
    <p>&nbsp;</p>
  </div>
  <div class="clearfix"></div>

</form> <!-- #formulario-busca -->
