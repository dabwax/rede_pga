

<ul id="slide-out" class="side-nav fixed" ng-init="paginaAtual = '<?php echo strtolower($this->request->params['controller']); ?>'">

  <li>
   <a href="<?php echo $this->Url->build('/'); ?>" class="brand-logo center">

   <?php echo $this->Html->image("logo-branco.png", ["height" => 50]); ?>

   <?php if(!empty($userLogged['role'])) : ?>
      <em style="text-align: center; display: inline-block; font-size: 14px; line-height: 14px; position: relative; top: -14px; font-weight: normal; font-style: normal; letter-spacing: 1px; color: #FFF;"><?php echo $this->formatarCargo($userLogged['role']); ?> de <?php echo $userLogged['user']->full_name; ?></em>
    <?php endif; ?>
   </a>
   <a href="#" class="hide-on-large-only menu-mobile" onclick="$('#submenu').toggleClass('hide-on-med-and-down');"><i class="material-icons">menu</i></a>

  </li>

  <ul id="submenu" class="hide-on-med-and-down">


  <?php if($permissions[$userLogged['table']]->feed == 1) : ?>
  <li ng-class="{'selecionado': paginaAtual == 'feed'}"><i class="material-icons left">home</i><a class="" href="<?php echo $this->Url->build('/'); ?>">Inputs</a> </li>
  <?php endif; ?>

  <?php if($permissions[$userLogged['table']]->timeline == 1) : ?>
  <li ng-class="{'selecionado': paginaAtual == 'timeline'}"><i class="material-icons left">timeline</i><a class="" href="<?php echo $this->Url->build('/timeline'); ?>">Linha do Tempo</a> </li>
  <?php endif; ?>

  <?php if($permissions[$userLogged['table']]->evolucao == 1) : ?>
  <li ng-class="{'selecionado': paginaAtual == 'evolucao'}"><i class="material-icons left">insert_chart</i><a class="" href="<?php echo $this->Url->build('/evolucao'); ?>">Evolução</a> </li>
  <?php endif; ?>

  <?php if($permissions[$userLogged['table']]->batepapo == 1) : ?>
  <li ng-class="{'selecionado': paginaAtual == 'batepapo'}"><i class="material-icons left">chat</i><a class="" href="<?php echo $this->Url->build('/bate-papo'); ?>">Fluxo</a> </li>
  <?php endif; ?>

  <?php if($permissions[$userLogged['table']]->exercicios == 1) : ?>
  <li ng-class="{'selecionado': paginaAtual == 'exercicios'}"><i class="material-icons left">textsms</i><a class="" href="<?php echo $this->Url->build('/exercicios'); ?>">Exercícios</a> </li>
  <?php endif; ?>

  <li>
    <i class="material-icons left">settings</i> <a class='dropdown-button ' href="javascript:;" data-activates='dropdown1'>Config. <i class="material-icons" style="position: relative; top: 6px;">keyboard_arrow_down</i></a>
    <ul id='dropdown1' class="dropdown-content">
      <li><a href="<?php echo $this->Url->build('/authentication/trocar_senha'); ?>"><i class="material-icons left">vpn_key</i> Trocar Senha</a></li>
      <li><a href="<?php echo $this->Url->build('/authentication/trocar_perfil'); ?>"><i class="material-icons left">person_pin_circle</i> Trocar Perfil</a></li>

  <?php if($userLogged['is_admin']) : ?>
      <li><a href="<?php echo $this->Url->build('/cms'); ?>"><i class="material-icons left">settings</i> Ir ao Admin</a></li>

  <?php endif; ?>
      <li><a href="<?php echo $this->Url->build('/sair'); ?>"><i class="material-icons left">power_settings_new</i> Sair</a></li>
    </ul>
  </li>

  <?php if($userLogged['is_admin']) : ?>
  <!--<li>
    <i class="material-icons left">settings</i> <a href="<?php echo $this->Url->build('/cms'); ?>">CMS</a>
  </li>-->
  <?php endif; ?>

  <!--<li><i class="material-icons left">power_settings_new</i><a class="" href="<?php echo $this->Url->build('/sair'); ?>">Sair</a> </li>-->
  </ul>

</ul>
