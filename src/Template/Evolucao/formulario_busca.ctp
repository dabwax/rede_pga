<!-- Pesquisa -->
<div class="col s12 m5 text-left right">

<form action="" method="GET" <?php if(!empty($_GET['inicio']) && !empty($_GET['fim'])) : ?>ng-init="date_start = '<?php echo $_GET['inicio'] ?>'; date_finish = '<?php echo $_GET['fim'] ?>';"<?php endif; ?>>

  <div class="col s12">
    <h2 class="search-title">Pesquisa</h2>
  </div>

  <div class="clearfix"></div>

  <div class="input-field col m5 s12">
    <input type="text" name="inicio" ng-model="date_start" datepicker id="data_inicio">
    <label for="data_inicio">Data Início</label>
  </div>

  <div class="input-field col m5 s12">
    <input type="text" name="fim" ng-model="date_finish" datepicker id="data_fim">
    <label for="data_fim">Data Início</label>
  </div>

  <div class="input-field col m2 s12">
    <button type="submit" id="" class="waves-effect waves-teal btn">
      <i class="material-icons">search</i>
    </button>
  </div>

    <i class="material-icons" ng-show="search.$" ng-click="reset_search()">close</i>


  </form> <!-- #formulario-busca -->
</div>