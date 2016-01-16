<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!--Materialize -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

    <?= $this->Html->script('/js/main.js'); ?>
    <?= $this->Flash->render() ?>
</body>
</html>