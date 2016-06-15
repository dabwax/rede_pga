
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Estilização da aplicação minificada -->
    <?= $this->Html->css('/application.css'); ?>
  <title>PEP - Plataforma de Ensino Personalizado</title>
</head>
<body class="pep-login">

  	<div class="loader" data-loading>
  		<?php echo $this->Html->image("spinner.gif") ?>
  	</div>

    <ul class="side-nav side-nav-cms fixed">

        <li>
          <a href="<?php echo $this->Url->build('/cms'); ?>" class="brand-logo center"><?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?></a>
          <p class="titulo-cms">ADMIN</p>
          <div class="clearfix"></div>
        </li>

        <li class="<?php echo ($this->request->params['controller'] == 'Inputs') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">edit</i>
        <a href="<?= $this->Url->build('/cms/inputs'); ?>">
        <span class="title">Inputs</span>
        <span class="arrow "></span>
        </a>
        </li>

        <li class="<?php echo ($this->request->params['controller'] == 'Themes') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">book</i>
        <a href="<?= $this->Url->build('/cms/themes'); ?>">
        <span class="title">Matérias</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Charts') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">insert_chart</i>
        <a href="<?= $this->Url->build('/cms/charts'); ?>">
        <span class="title">Gráficos</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Permissions') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">verified_user</i>
        <a href="<?= $this->Url->build('/cms/permissions'); ?>">
        <span class="title">Permissões</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Settings') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">settings</i>
        <a href="<?= $this->Url->build('/cms/settings'); ?>">
        <span class="title">Config.</span>
        <span class="arrow "></span>
        </a>
        </li>
        </li>

        <li class="<?php echo ($this->request->params['controller'] == 'TemplateEmails') ? 'selecionado' : ''; ?>">
        <i class="material-icons left">email</i>
        <a href="<?= $this->Url->build('/cms/template_emails'); ?>">
        <span class="title">Emails</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li>
        <i class="material-icons left">home</i>
        <a href="<?= $this->Url->build('/'); ?>">
        <span class="title">Site</span>
        <span class="arrow "></span>
        </a>
        </li>
        </ul>

  <div id="main" class="container">

    <div class="row">
      <div class="col s12">

        <?= $this->fetch('content') ?>

      </div>
    </div>

  </div>

</body>
  <?php echo $this->element("/assets"); ?>
  <?= $this->Flash->render() ?>
</html>
