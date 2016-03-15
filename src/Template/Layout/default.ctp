<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Estilização da aplicação minificada -->
    <?= $this->Html->css('/css/style.css'); ?>
	<title>PEP - Plataforma de Ensino Personalizado</title>
</head>
<body class="pep-login">
	<?php if($userLogged) : ?>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper teal lighten-5">
				<a href="<?php echo $this->Url->build('/'); ?>" class="brand-logo center"><?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?></a>

				<a class="teal-text right" href="<?php echo $this->Url->build('/sair'); ?>" title="Sair"><i class="material-icons left">power_settings_new</i></a>

				<a href="#" id="pep-menu-btn" data-activates="mobile-menu" class="button-collapse teal-text"><i class="material-icons">menu</i></a>

				<ul class="side-nav teal-text" id="mobile-menu">
			        <li><i class="material-icons left">home</i><a class="teal-text" href="<?php echo $this->Url->build('/'); ?>">Home</a> </li>
			        <li><i class="material-icons left">insert_chart</i><a class="teal-text" href="<?php echo $this->Url->build('/evolucao'); ?>">Evolução</a> </li>
			        <li><i class="material-icons left">input</i><a class="teal-text" href="<?php echo $this->Url->build('/registros/listar'); ?>">Inputs</a> </li>
			        <li><i class="material-icons left">chat</i><a class="teal-text" href="<?php echo $this->Url->build('/bate-papo'); ?>">Fluxo</a> </li>
			        <li><i class="material-icons left">textsms</i><a class="teal-text" href="<?php echo $this->Url->build('/bate-papo'); ?>">Exercícios</a> </li>
			        <li><i class="material-icons left">power_settings_new</i><a class="teal-text" href="<?php echo $this->Url->build('/sair'); ?>">Sair</a> </li>
		        </ul>

			</div>
		</nav>
	</div>
	<?php endif; ?>
	<div class="container">
 		<?= $this->fetch('content') ?>
	</div>
	
	<?php echo $this->element("/../Layout/assets"); ?>
	<?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Flash->render() ?>
    <?php echo $this->Flash->render('auth',['element' => 'Flash/error']); ?>

</body>

</html>