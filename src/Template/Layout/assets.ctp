<!--Materialize -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<!-- Kendo UI -->
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.1.112/styles/kendo.common.min.css">
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.1.112/styles/kendo.flat.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.js"></script>

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js"></script>
<script src="https://code.angularjs.org/1.4.8/i18n/angular-locale_pt-br.js"></script>
<script src="http://krescruz.github.io/angular-materialize/src/angular-materialize.js"></script>

<!-- ng-file-upload -->
<?= $this->Html->script('/vendors/ng-file-upload-master/dist/ng-file-upload-all.min.js'); ?>

<!-- highcharts-ng -->
<?= $this->Html->script('http://code.highcharts.com/highcharts.src.js'); ?>
<?= $this->Html->script('/vendors/highcharts-ng-master/dist/highcharts-ng.min.js'); ?>

<!-- Kendo UI -->
<script src="http://kendo.cdn.telerik.com/2016.1.112/js/kendo.ui.core.min.js"></script>
<script src="http://kendo.cdn.telerik.com/2016.1.112/js/messages/kendo.messages.pt-BR.min.js"></script>
<script src="http://kendo.cdn.telerik.com/2016.1.112/js/cultures/kendo.culture.pt-BR.min.js"></script>

<script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>
<?= $this->Html->script('/js/main.js'); ?>