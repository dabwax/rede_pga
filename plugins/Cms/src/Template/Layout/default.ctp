
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php echo $this->element("/../Layout/assets"); ?>
    <?= $this->Flash->render() ?>

  <!-- Estilização da aplicação minificada -->
    <?= $this->Html->css('/css/style.css'); ?>
  <title>PEP - Plataforma de Ensino Personalizado</title>
</head>
<body class="pep-login">

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="<?php echo $this->Url->build('/'); ?>" class="brand-logo center">
        <?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?>
        
        <?php if(!empty($g_users->toArray())) : ?>
          <?php /*echo $this->Html->image("/uploads/" . $current_user_selected['profile_attachment'], ['class' => 'img-circle', 'style' => 'width:70px; height: 60px; margin-top: 0px;']);*/ ?>
          CMS
      <?php endif; ?>
      </a>


        <a class="teal-text right" href="<?php echo $this->Url->build('/sair'); ?>" title="Sair"><i class="material-icons left">power_settings_new</i></a>

        <a href="#" id="pep-menu-btn" data-activates="mobile-menu" class="button-collapse teal-text"><i class="material-icons">menu</i></a>

        <ul class="side-nav teal-text" id="mobile-menu">
        <li class="<?php echo ($this->request->params['controller'] == 'Permissions') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/permissions'); ?>">
        <i class="fa fa-pencil"></i>
        <span class="title">Permissões de Página</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Inputs') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/inputs'); ?>">
        <i class="fa fa-keyboard-o"></i>
        <span class="title">Inputs</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Themes') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/themes'); ?>">
        <i class="fa fa-keyboard-o"></i>
        <span class="title">Matérias</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Charts') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/charts'); ?>">
        <i class="fa fa-keyboard-o"></i>
        <span class="title">Gráficos</span>
        <span class="arrow "></span>
        </a>
        </li>
        <li class="<?php echo ($this->request->params['controller'] == 'Settings') ? 'current' : ''; ?>">
        <a href="<?= $this->Url->build('/cms/settings'); ?>">
        <i class="fa fa-cog"></i>
        <span class="title">Configurações do Sistema</span>
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

        <div class="card">
          <div class="card-content">
            
            <span class="card-title">Estudante Atual: <?php echo @$current_user_selected['full_name']; ?></span>
            <?php if(empty($g_users->toArray())) : ?>
              <div class="alert alert-danger pull-left" style="margin: 20px;">
                Não há estudantes cadastrados. Isto fará com que o sistema não funcione. <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']) ?>">Adicione um novo estudante</a>.
              </div>
            <?php endif; ?>

            <?php if(!empty($g_users->toArray()) && @$admin_logged) : ?>
            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit', @$current_user_selected['id']]); ?>" class="btn btn-floating deep-orange darken-3" title="Editar Dados do Aluno Atual">
              <i class="material-icons left">edit</i>
              Editar aluno
            </a>

            <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'config_actors']); ?>" class="btn amber accent-3 btn-floating" title="Configurar Atores">
              <i class="material-icons left">settings</i>
              Configurar atores
            </a>

            <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'set_current_user']); ?>" class="btn lime accent-4 btn-floating" title="Trocar de Aluno">
              <i class="material-icons left">find_replace</i>
              Trocar de aluno
            </a>
            <?php endif; ?>
            <hr>

            <?= $this->fetch('content') ?>

          </div>
        </div> <!-- .card -->
        
      </div>
    </div>

  </div>

</body>
</html>