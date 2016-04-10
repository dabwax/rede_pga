<!--Materialize -->
<?= $this->Html->css('/vendors/materialize/css/materialize.min.css'); ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- jQuery - Biblioteca -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- AngularJS - Framework -->
<?= $this->Html->script('/vendors/angular.js'); ?>
<script src="https://code.angularjs.org/1.4.8/i18n/angular-locale_pt-br.js"></script>

<!-- Materialize - Plugin do Materialize -->
<?= $this->Html->script('/vendors/materialize/js/materialize.min.js'); ?>

<!-- jQuery UI - PLugin para UI -->
<?= $this->Html->css('/vendors/jquery-ui-1.11.4.custom/jquery-ui.min.css'); ?>
<?= $this->Html->script('/vendors/jquery-ui-1.11.4.custom/jquery-ui.min.js'); ?>

<!-- ng-file-upload - Plugin para upload de arquivos via AJAX -->
<?= $this->Html->script('/vendors/ng-file-upload-master/dist/ng-file-upload-all.min.js'); ?>

<!-- highcharts-ng - Plugin de gráficos -->
<?= $this->Html->script('/vendors/highcharts.src.js'); ?>
<?= $this->Html->script('/vendors/highcharts-ng-master/dist/highcharts-ng.min.js'); ?>

<!-- ng-tags-input - Plugin para campo de hashtags -->
<?= $this->Html->css('/vendors/ng-tags-input/ng-tags-input.min.css'); ?>
<?= $this->Html->script('/vendors/ng-tags-input/ng-tags-input.min.js'); ?>

<!-- Masonry - Plugin para grid de altura dinâmica -->
<?= $this->Html->script('/vendors/angular-masonry-directive-master/src/masonry.pkgd.min.js'); ?>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<?= $this->Html->script('/vendors/angular-masonry-directive-master/src/angular-masonry-directive.js'); ?>

<!-- Caminho absoluto da página acessível via JavaScript -->
<script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>
<?= $this->Html->script('/js/main.js'); ?>
