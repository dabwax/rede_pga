
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
          <a href="<?php echo $this->Url->build('/'); ?>" class="brand-logo center"><?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?></a>
          <p class="titulo-cms">CMS</p>
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
        </ul>

  <div id="main" class="container">

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
