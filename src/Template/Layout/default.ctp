<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html class="fuelux" ng-app="RedePga">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Rede PGA
    </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') ?>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <?= $this->Html->css('/global/css/components.css'); ?>
    <?= $this->Html->css('/global/css/plugins.css'); ?>
    <?= $this->Html->css('/global/scripts/ng-tags-input.min.css'); ?>
    <?= $this->Html->css('/global/scripts/ng-tags-input.bootstrap.min.css'); ?>
    <?= $this->Html->css('/css/layout.css'); ?>
    <?= $this->Html->css('/css/exercicios.css'); ?>
    <?= $this->Html->css('/css/themes/grey.css'); ?>
    <!-- END THEME STYLES -->

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') ?>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>

    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/ckeditor.js') ?>
    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/adapters/jquery.js') ?>
    <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js') ?>
    <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_pt_BR.js') ?>

    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css') ?>   
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js') ?> 

    <?= $this->Html->script('http://code.highcharts.com/highcharts.src.js') ?>   

    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js'); ?>

    <script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>

    <?= $this->Html->css('redepga.css') ?>

    <!-- Angular -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js') ?> 
    <?= $this->Html->script('/global/scripts/highcharts-ng.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-file-upload-all.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-tags-input.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ui-mask/dist/mask.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ui-sortable/src/sortable.js'); ?>
    <?= $this->Html->script('redepga.js') ?>
    <?= $this->Html->script('controllers.js') ?>
    <?= $this->Html->script('services.js') ?>
    <?= $this->Html->script('directives.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="page-boxed page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo">

  <?= $this->element("header"); ?>

  <div class="clearfix"></div>

  <div class="container">
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">

        <?php if(@$admin_logged) : ?>
				<!-- BEGIN SIDEBAR MENU -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

					<?php if($permissions[$admin_logged['role_table']]->feed == 1) : ?>
          <li class="<?php echo ($this->request->params['controller'] == 'Feed') ? 'current' : ''; ?>">
						<a href="<?= $this->Url->build('/feed/listar'); ?>">
						<i class="fa fa-rss"></i>
						<span class="title">Feed</span>
						<span class="arrow "></span>
						</a>
					</li>
					<?php endif; ?>
					<?php if($permissions[$admin_logged['role_table']]->input == 1) : ?>
          <li class="<?php echo ($this->request->params['controller'] == 'Registros') ? 'current' : ''; ?>">
						<a href="<?= $this->Url->build('/registros/listar'); ?>">
						<i class="fa fa-keyboard-o"></i>
						<span class="title">Inputs</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="<?= $this->Url->build('/registros/listar'); ?>">
								<i class="fa fa-th-list"></i>
								Listar</a>
							</li>
							<li>
								<a href="<?= $this->Url->build('/registros/adicionar'); ?>">
								<i class="fa fa-plus-square-o"></i>
								Adicionar Novo...</a>
							</li>
						</ul>
					</li>
					<?php endif; ?>
					<?php if($permissions[$admin_logged['role_table']]->evolucao == 1) : ?>
          <li class="<?php echo ($this->request->params['controller'] == 'Evolucao') ? 'current' : ''; ?>">
						<a href="<?= $this->Url->build('/evolucao/listar'); ?>">
            <i class="fa fa-line-chart"></i>
						<span class="title">Evolução</span>
						<span class="arrow "></span>
						</a>
					</li>
					<?php endif; ?>
					<?php if($permissions[$admin_logged['role_table']]->bate_papo == 1) : ?>
          <li class="<?php echo ($this->request->params['controller'] == 'BatePapo') ? 'current' : ''; ?>">
						<a href="<?= $this->Url->build('/bate-papo'); ?>">
            <i class="fa fa-comments"></i>
						<span class="title">Bate-Papo</span>
						<span class="arrow "></span>
						</a>
					</li>
					<?php endif; ?>
					<?php if($permissions[$admin_logged['role_table']]->exercicios == 1) : ?>
          <li class="<?php echo ($this->request->params['controller'] == 'Exercicios') ? 'current' : ''; ?>">
						<a href="<?= $this->Url->build('/exercicios'); ?>">
            <i class="fa fa-pencil"></i>
						<span class="title">Exercícios</span>
						<span class="arrow "></span>
						</a>
					</li>
					<?php endif; ?>

				</ul>
      <?php endif; ?>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1269px">


				<div class="page-bar">
				</div>
				<!-- END PAGE HEADER-->

          <?= $this->fetch('content') ?>

					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner container">
		<div class="row">
		<div class="col-lg-12 text-center">
			 <?= date('Y'); ?> © Rede PGA Todos os Direitos Reservados.
		</div>
		</div>
		</div>
		<div class="scroll-to-top" style="display: none;">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
</div>

    </div>
</body>
</html>
