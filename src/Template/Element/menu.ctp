<ul class="side-nav fixed" ng-init="paginaAtual = '<?php echo strtolower($this->request->params['controller']); ?>'">

  <li>
   <a href="<?php echo $this->Url->build('/'); ?>" class="brand-logo center"><?php echo $this->Html->image("logo_monster.png", ["height" => 50]); ?></a>
  </li>

  <li ng-class="{'selecionado': paginaAtual == 'feed'}"><i class="material-icons left">home</i><a class="" href="<?php echo $this->Url->build('/'); ?>">Início</a> </li>

  <li ng-class="{'selecionado': paginaAtual == 'evolucao'}"><i class="material-icons left">insert_chart</i><a class="" href="<?php echo $this->Url->build('/evolucao'); ?>">Evolução</a> </li>

  <li ng-class="{'selecionado': paginaAtual == 'batepapo'}"><i class="material-icons left">chat</i><a class="" href="<?php echo $this->Url->build('/bate-papo'); ?>">Fluxo</a> </li>

  <li ng-class="{'selecionado': paginaAtual == 'exercicios'}"><i class="material-icons left">textsms</i><a class="" href="<?php echo $this->Url->build('/exercicios'); ?>">Exercícios</a> </li>

  <?php if($userLogged['is_admin']) : ?>
  <li>
    <i class="material-icons left">settings</i> <a href="<?php echo $this->Url->build('/cms'); ?>">CMS</a>
  </li>
  <?php endif; ?>

  <li><i class="material-icons left">power_settings_new</i><a class="" href="<?php echo $this->Url->build('/sair'); ?>">Sair</a> </li>

</ul>
