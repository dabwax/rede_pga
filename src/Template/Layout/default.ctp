<!DOCTYPE html>
<html lang="pt-BR" dir="ltr" ng-app="RedePga" class="pep-<?php echo strtolower($this->request->params['controller']); ?>">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Estilização da aplicação minificada -->
  <?= $this->Html->css('/application.css'); ?>
  <title>PEP - Plataforma de Ensino Personalizado</title>
</head>
<body ng-controller="ApplicationCtrl" ng-init='usuarioLogado = <?php echo json_encode($userLogged); ?>' class="pep-<?php echo strtolower($this->request->params['controller']); ?>">

  <div class="loader" data-loading>
    <?php echo $this->Html->image("spinner.gif") ?>
  </div>

  <?php if($userLogged) : ?>
    <?php if($this->name != "Relatorio") : ?>
      <?php echo $this->element("menu"); ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if($this->request->params['controller'] != 'Authentication') : ?>
  <div id="main" class="container">
  <?php endif; ?>

    <?= $this->fetch('content') ?>

  <?php if($this->request->params['controller'] != 'Authentication') : ?>
  </div>
  <?php endif; ?>

  <?php if($this->request->params['controller'] != 'Authentication') : ?>
    <footer id="rodape">
      <hr>


        <?php if($userLogged) : ?>
          <a href="#" style="float: left; margin-left: 250px;" onclick="window.open('https://www.sitelock.com/verify.php?site=pep.net.br','SiteLock','width=600,height=600,left=160,top=170');" >
            <img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/pep.net.br" />
          </a>
        <?php else: ?>
          <a href="#" style="float: left; margin-left: 10px;" onclick="window.open('https://www.sitelock.com/verify.php?site=pep.net.br','SiteLock','width=600,height=600,left=160,top=170');" >
            <img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/pep.net.br" />
          </a>
        <?php endif; ?>
          <em style=" float: right; line-height: 65px;">PEP Plataforma de Ensino Profissinalizante. Todos os direitos reservados.</em>

    </footer>
  <?php endif; ?>

  <?php echo $this->element("/assets"); ?>
    <?= $this->Flash->render() ?>
    <?php echo $this->Flash->render('auth',['element' => 'Flash/error']); ?>

</body>

</html>
