<form action="" method="GET" <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>ng-init="date_start = '<?php echo $_GET['inicio'] ?>'; date_finish = '<?php echo $_GET['fim'] ?>';"<?php endif; ?>>

  <div class="input-field col s5">
      <!-- <i class="material-icons prefix">date_range</i> -->
      <input type="text" name="inicio" ng-model="date_start" datepicker id="data_inicio">
      <label for="data_inicio">Data Início</label>
  </div>

  <div class="input-field col s5">
    <!-- <i class="material-icons prefix">date_range</i> -->
    <label for="data_inicio">Data Fim</label>
    <input type="text" name="fim" ng-model="date_finish" datepicker id="data_fim">
  </div>

  <div class="col s2">
    <button type="submit" id="btn-busca-evolucao" class="waves-effect waves-teal btn-flat">
      <i class="material-icons">search</i>
    </button>
    <p>&nbsp;</p>
  </div>
  <div class="clearfix"></div>

</form> <!-- #formulario-busca -->
