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
<body class="pep-login pep-<?php echo strtolower($this->request->params['controller']); ?>">

  <div class="loader" data-loading>
    <?php echo $this->Html->image("spinner.gif") ?>
  </div>

  <?php if($userLogged) : ?>
    <?php if($this->name != "Relatorio") : ?>
      <?php echo $this->element("menu"); ?>
    <?php endif; ?>
  <?php endif; ?>

  <div id="main" class="container">
    <?= $this->fetch('content') ?>

  </div>

    <footer id="rodape">
      <hr>
      <em>PEP Plataforma de Ensino Profissinalizante. Todos os direitos reservados.</em>
    </footer>

  <?php echo $this->element("/assets"); ?>
    <?= $this->Flash->render() ?>
    <?php echo $this->Flash->render('auth',['element' => 'Flash/error']); ?>

</body>

</html>
