<!--Materialize -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js"></script>
<script src="https://code.angularjs.org/1.4.8/i18n/angular-locale_pt-br.js"></script>

<!-- Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- ng-file-upload -->
<?= $this->Html->script('/vendors/ng-file-upload-master/dist/ng-file-upload-all.min.js'); ?>

<!-- highcharts-ng -->
<?= $this->Html->script('http://code.highcharts.com/highcharts.src.js'); ?>
<?= $this->Html->script('/vendors/highcharts-ng-master/dist/highcharts-ng.min.js'); ?>

<script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>
<?= $this->Html->script('/js/main.js'); ?>