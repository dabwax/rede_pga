<div id="login-page" ng-controller="AuthenticationController" class="row">
    <div class="col l12 card-panel">

        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://pep.net.br/img/logo-azul.png" alt="" class="valign profile-image-login">
            <p class="center login-form-text">{{getRole()}}</p>
          </div>
        </div>

        <ul id="pep-lista-atores" class="collection" ng-hide="roleChecked">
          <li class="collection-item"><div>Família (Pai/Mãe/Outros)<a ng-click="setRole('protectors')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Escola (Coordenação / Professor / Mediador)<a ng-click="setRole('schools')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Tutor<a ng-click="setRole('tutors')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Terapeuta<a ng-click="setRole('therapists')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Aluno<a ng-click="setRole('users')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        </ul>
    
  <div id="form-login" ng-if="roleChecked && !showForgot">

    <?php
      echo $this->Form->create(null, ['class' => 'login-form', 'autocomplete' => 'false']);
      
      $this->Form->templates([
      'inputContainer' => '{{content}}'
      ]);
    ?>
    <?php echo $this->Form->input("role", ['type' => 'hidden', 'value' => '{{roleChecked}}']); ?>


        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <?php echo $this->Form->input("username", ['class' => 'validate', 'label' => false, 'autocomplete' => 'false']); ?>
            <label for="username" class="">E-mail</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <?php echo $this->Form->input("password", ['class' => 'validate', 'label' => false, 'autocomplete' => 'false']); ?>
            <label for="password" class="">Senha</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 center">
            <button type="submit" class="btn yellow darken-3 waves-effect waves-light">Entrar <i class="material-icons right">send</i></button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
              <p class="margin center medium-small"><a ng-click="forgot()" href="javascript:void(0);" class="btn-flat waves-effect forgot-pw">Esqueceu sua senha?</a></p>
          </div>          
        </div>

    <?php echo $this->Form->end(); ?>

  </div> <!-- #form-login -->
    
  <div id="form-login" ng-if="!roleChecked && showForgot">

    <?php
      echo $this->Form->create(null, ['class' => 'login-form', 'autocomplete' => 'false', 'url' => ['action' => 'reset_password']]);
      
      $this->Form->templates([
      'inputContainer' => '{{content}}'
      ]);
    ?>
    <?php echo $this->Form->input("role", ['type' => 'hidden', 'value' => '{{roleChecked}}']); ?>


        <div class="row">
          <div class="input-field col s12 center">
            <img src="http://pep.net.br/img/logo-azul.png" alt="" class="valign profile-image-login">
            <p class="center login-form-text">Plataforma de Ensino Personalizado</p>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <?php echo $this->Form->input("username", ['class' => 'validate', 'label' => false, 'autocomplete' => 'false']); ?>
            <label for="username" class="">E-mail</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12 center">
            <button type="submit" class="btn yellow darken-3 waves-effect waves-light">Resetar Senha <i class="material-icons right">send</i></button>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
              
              <p class="margin center medium-small"><a href="javascript:;" ng-click="clear()" class="btn-flat waves-effect forgot-pw"> <i class="material-icons left">arrow_left</i> Voltar</a></p>
          </div>          
        </div>

    <?php echo $this->Form->end(); ?>

  </div> <!-- #form-login -->

    </div>
  </div>