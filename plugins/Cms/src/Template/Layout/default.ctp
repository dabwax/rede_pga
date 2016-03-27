
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

  	<div class="loader" data-loading>
  		<?php echo $this->Html->image("spinner.gif") ?>
  	</div>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="<?php echo $this->Url->build('/cms'); ?>" class="brand-logo center">
        <?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?>

        <?php if(!empty($estudanteAtual)) : ?>
          CMS
      <?php endif; ?>
      </a>


        <a class="right" href="<?php echo $this->Url->build('/sair'); ?>" title="Sair"><i class="material-icons left">power_settings_new</i></a>

        <a href="#" id="pep-menu-btn" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

        <ul class="side-nav teal-text" id="mobile-menu">
        <li class="<?php echo ($this->request->params['controller'] == 'Inputs') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/inputs'); ?>">
        <i class="material-icons left">edit</i>
        <span class="title">Inputs</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Themes') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/themes'); ?>">
        <i class="material-icons left">edit</i>
        <span class="title">Matérias</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Charts') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/charts'); ?>">
        <i class="material-icons left">edit</i>
        <span class="title">Gráficos</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Permissions') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/permissions'); ?>">
        <i class="material-icons left">edit</i>
        <span class="title">Permissões de Página</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Settings') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/settings'); ?>">
        <i class="material-icons left">edit</i>
        <span class="title">Config. do PEP</span>
        <span class="arrow "></span>
        </a>
        </li>
        </ul>

      </div>
    </nav>
  </div>

  <div class="container">

    <div class="row">
      <div class="col s12">

        <div class="card-panel indigo darken-4">
          <div class="card-content">

            <span class="card-title white-text">Aluno Atual: <?php echo @$estudanteAtual['full_name']; ?></span>

            <?php if(empty($estudanteAtual)) : ?>
              <div class="alert alert-danger pull-left" style="margin: 20px;">
                Não há estudantes cadastrados. Isto fará com que o sistema não funcione. <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']) ?>">Adicione um novo estudante</a>.
              </div>
            <?php endif; ?>

            <?php if(!empty($estudanteAtual)) : ?>

            <div class="clearfix"></div>

            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'trocar_aluno']); ?>" class="btn lime accent-5" title="Trocar de Aluno">
              <i class="material-icons left">find_replace</i>
              Trocar de aluno
            </a>

            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', @$estudanteAtual['id']]); ?>" class="btn deep-orange darken-3" title="Editar Dados do Aluno Atual">
              <i class="material-icons left">edit</i>
              Editar aluno atual
            </a>
            <?php endif; ?>

          </div>
        </div> <!-- .card -->



        	<?php if($estudanteAtual['full_name'] == "Fulano de Tal") : ?>
        	<div class="card-panel red white-text">
        		Você está utilizando o aluno de demonstração (Fulano de Tal). <br>
        		Sugerimos que você adicione um novo aluno para usar o sistema <a href="<?php echo $this->Url->build(['controller' =>'users', 'action' =>'add']); ?>">clicando aqui</a>. <br>
        		Este aluno e os dados pertencentes a ele não são possíveis de serem excluídos.
        	</div>
        	<?php endif; ?>

        <?= $this->fetch('content') ?>

      </div>
    </div>

  </div>

</body>
  <?php echo $this->element("/assets"); ?>
  <?= $this->Flash->render() ?>
</html>
