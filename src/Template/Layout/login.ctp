<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!--Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Kendo UI -->
	<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.1.112/styles/kendo.common.min.css">
	<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.1.112/styles/kendo.flat.min.css">

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Materialize -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

	<!-- AngularJS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

	<!-- ng-file-upload -->
    <?= $this->Html->script('/vendors/ng-file-upload-master/dist/ng-file-upload-all.min.js'); ?>

	<!-- angular-tour -->
    <?= $this->Html->css('/vendors/angular-tour-master/dist/angular-tour.css'); ?>
    <?= $this->Html->script('/vendors/angular-tour-master/dist/angular-tour-tpls.min.js'); ?>

	<!-- Kendo UI -->
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/kendo.ui.core.min.js"></script>
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/messages/kendo.messages.pt-BR.min.js"></script>
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/cultures/kendo.culture.pt-BR.min.js"></script>
	
	<script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>
    <?= $this->Html->script('/js/main.js'); ?>
    <?= $this->Flash->render() ?>

	<!-- Estilização da aplicação minificada -->
    <?= $this->Html->css('/css/style.css'); ?>
	<title>PEP - Plataforma de Ensino Personalizado</title>
</head>
<body class="pep-login">
	
	<div class="container">
 		<?= $this->fetch('content') ?>
	</div>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Materialize -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

	<!-- AngularJS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.js"></script>

	<!-- Kendo UI -->
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/kendo.ui.core.min.js"></script>
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/messages/kendo.messages.pt-BR.min.js"></script>
	<script src="http://kendo.cdn.telerik.com/2016.1.112/js/cultures/kendo.culture.pt-BR.min.js"></script>
	
    <?= $this->Html->script('/js/main.js'); ?>
    <?= $this->Flash->render() ?>
</body>
</html>