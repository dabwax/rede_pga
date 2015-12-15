<!DOCTYPE html>
<html ng-app="RedePga">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Rede PGA
    </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') ?>

    <?= $this->Html->css('/global/css/components.css'); ?>
    <?= $this->Html->css('/global/css/plugins.css'); ?>
    <?= $this->Html->css('/css/layout.css'); ?>
    <?= $this->Html->css('/css/themes/grey.css'); ?>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') ?>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>

    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/ckeditor.js') ?>
    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/adapters/jquery.js') ?>

    <?= $this->Html->script('http://code.highcharts.com/highcharts.src.js') ?>
    
    <!-- Angular -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js') ?> 
    <?= $this->Html->script('/global/scripts/highcharts-ng.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-file-upload-all.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-tags-input.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ui-mask/dist/mask.min.js'); ?>

    <?= $this->Html->script('redepga.js') ?>
    <?= $this->Html->script('controllers.js') ?>
    <?= $this->Html->script('services.js') ?>
    <?= $this->Html->script('directives.js') ?>

    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css') ?>   
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js') ?> 


    <script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>

    <?= $this->Html->css('redepga.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="page-boxed page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo body-admin">

	<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner container">
  <!-- BEGIN LOGO -->
  <div class="page-logo text-center">
    <a href="<?= $this->Url->build('/cms'); ?>" style="width: 130px;">
    <?php echo $this->Html->image("logo.png", ['class' => 'logo-default logo-redepga', 'alt' => 'PGA', 'style' => 'height: 50px; padding-top: 6px;']); ?>
    </a>
        <?php if(@$admin_logged) : ?>
    <div class="menu-toggler sidebar-toggler">
      <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
    </div>
  <?php endif; ?>
  </div>
  <!-- END LOGO -->
  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
  </a>
  <!-- END RESPONSIVE MENU TOGGLER -->
  <!-- BEGIN PAGE TOP -->
  <div class="page-top">


    <div class="" style="padding-left: 20px;">
	   
    <?php if(empty($g_users->toArray())) : ?>
      <div class="alert alert-danger pull-left" style="margin: 20px;">
        Não há estudantes cadastrados. Isto fará com que o sistema não funcione. <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']) ?>">Adicione um novo estudante</a>.
      </div>
    <?php endif; ?>

    <?php if(!empty($g_users->toArray())) : ?>

      <h2 class="pull-left">
      <?php echo $this->Html->image("/uploads/" . $current_user_selected['profile_attachment'], ['class' => 'img-circle', 'style' => 'width:70px; height: 60px; margin-top: 0px;']); ?>
      <?php echo $current_user_selected['full_name']; ?>
      </h2>

  <?php endif; ?>

      <div id="btn-group-header" class="btn-group pull-right">

    <?php if(!empty($g_users->toArray())) : ?>
        <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', @$current_user_selected['id']]); ?>" class="btn btn-primary" title="Editar Dados do Aluno Atual">
          <i class="fa fa-pencil"></i>
        </a>

        <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'config_actors']); ?>" class="btn btn-success" title="Configurar Atores">
          <i class="fa fa-cog"></i>
        </a>
        
        <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'index']); ?>" class="btn btn-info" title="Trocar de Aluno">
          <i class="fa fa-edit"></i>
        </a>
  <?php endif; ?>

        <a href="<?= $this->Url->build('/cms/authentication/logout'); ?>" class="btn btn-danger" title="Sair">
          <i class="fa fa-power-off"></i>
        </a>

      </div>
  	
    </div>
  </div>
  <!-- END PAGE TOP -->
</div>
<!-- END HEADER INNER -->
</div>


  <div class="clearfix"></div>

  <div class="container">
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">

        <?php if(@$admin_logged && !empty(@$current_user_selected) && !empty($g_users->toArray()) ) : ?>
				<!-- BEGIN SIDEBAR MENU -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

					<li>
						<a href="<?= $this->Url->build('/cms/permissions'); ?>">
						<i class="fa fa-pencil"></i>
						<span class="title">Permissões de Página</span>
						<span class="arrow "></span>
						</a>
					</li>
					<li>
						<a href="<?= $this->Url->build('/cms/inputs'); ?>">
						<i class="fa fa-keyboard-o"></i>
						<span class="title">Inputs</span>
						<span class="arrow "></span>
						</a>
					</li>
					<li>
						<a href="<?= $this->Url->build('/cms/themes'); ?>">
						<i class="fa fa-keyboard-o"></i>
						<span class="title">Matérias</span>
						<span class="arrow "></span>
						</a>
					</li>
          <li>
            <a href="<?= $this->Url->build('/cms/charts'); ?>">
            <i class="fa fa-keyboard-o"></i>
            <span class="title">Gráficos</span>
            <span class="arrow "></span>
            </a>
          </li>
          <li>
            <a href="<?= $this->Url->build('/cms/settings'); ?>">
            <i class="fa fa-cog"></i>
            <span class="title">Configurações do Sistema</span>
            <span class="arrow "></span>
            </a>
          </li>
				</ul>
      <?php endif; ?>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content" style="min-height:1269px">

          <?= $this->Flash->render() ?>

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
