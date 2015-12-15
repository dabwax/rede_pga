<div ng-controller="AuthenticationController">

  <div id="role-check" class="text-center" ng-hide="roleChecked">
    <h2>Seja bem-vindo ao PGA!</h2>

    <h4>Quem é você?</h4>

    <a href="javascript:;" ng-click="setRole('tutors.tutor')" class="mugshot">

      <div class='bola'>
        <i class="fa fa-graduation-cap"></i>
      </div>

      <div class="legenda">Tutor(a)</div>

    </a>

    <a href="javascript:;" ng-click="setRole('therapists.therapist')" class="mugshot">

      <div class='bola'>
        <i class="fa fa-user-md"></i>
      </div>

      <div class="legenda">Terapeuta</div>

    </a>

    <a href="javascript:;" ng-click="setRole('schools.coordinator')" class="mugshot">

      <div class='bola'>
        <i class="fa fa-building"></i>
      </div>

      <div class="legenda">Coordenador(a)</div>

    </a>

    <a href="javascript:;" ng-click="setRole('schools.mediator')" class="mugshot">

    <div class='bola'>
      <i class="fa fa-users"></i>
    </div> 

    <div class="legenda">Mediadores</div>

    </a>

    <div class="clearfix"></div>

    <a href="javascript:;" ng-click="setRole('users.user')" class="mugshot mugshot-aluno">

      <div class='bola'>
        <i class="fa fa-user"></i>
      </div> 

      <div class="legenda">Aluno(a)</div>
    
    </a>

    <a href="javascript:;" ng-click="setRole('protectors.dad')" class="mugshot">

      <div class='bola'>
        <i class="fa fa-male"></i>
      </div>

      <div class="legenda">Pai</div>

    </a>

    <a href="javascript:;" ng-click="setRole('protectors.mom')" class="mugshot">

      <div class='bola'>
        <i class="fa fa-female"></i>
      </div>

      <div class="legenda">Mãe</div>
    </a>

  </div> <!-- #role-check -->

  <div id="form-login" ng-if="roleChecked">
  
    <a href="javascript:;" ng-click="clear()" class="mugshot" ng-class="{'mugshot-aluno': getRole() == 'Aluno(a)'}" style="display: block; margin: 0 auto;">

      <div class='bola'>
        <i class="fa fa-{{getRoleIcon()}}"></i>
      </div>

      <div class="legenda">{{getRole()}}</div>
    </a>
  
    <?php echo $this->Form->create($login, ['class' => 'form']); ?>
    <?php echo $this->Form->input("role", ['type' => 'hidden', 'value' => '{{roleChecked}}']); ?>
    
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
    <div class="form-group">
      <?php echo $this->Form->input("username", ['class' => 'form-control', 'label' => 'E-mail']); ?>
    </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
    <div class="form-group">
      <?php echo $this->Form->input("password", ['class' => 'form-control', 'label' => 'Senha']); ?>
    </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">

      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Entrar no PGA</button>
      </div>

      <div class="form-group">
        <a href="javascript:;" ng-click="clear()" class="btn btn-default btn-sm btn-block">Voltar</a>
      </div>

    </div>

    <?php echo $this->Form->end(); ?>
  </div> <!-- #form-login -->

</div>
