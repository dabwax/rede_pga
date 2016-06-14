<div ng-controller="AuthenticationController" class="row">
  <div class="col s12 m6 l6 offset-l3 offset-m3">
    <div class="card blue-grey lighten-5">
      <div class="card-content center-align">
        <?php echo $this->Html->image("logo-azul.png", ["height" => 90]); ?>

        <div class="clearfix"></div>
        <span class="card-title">{{getRole()}}</span>

        <ul id="pep-lista-atores" class="collection" ng-hide="roleChecked">
          <li class="collection-item"><div>Família (Pai/Mãe/Outros)<a ng-click="setRole('protectors')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Escola (Coordenação/Professor/Mediador/Outros)<a ng-click="setRole('schools')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Tutor<a ng-click="setRole('tutors')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Terapeuta<a ng-click="setRole('therapists')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Aluno<a ng-click="setRole('users')" href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        </ul>


  <div id="form-login" ng-if="roleChecked">
  
    <?php echo $this->Form->create(null, ['class' => '']); ?>
    <?php echo $this->Form->input("role", ['type' => 'hidden', 'value' => '{{roleChecked}}']); ?>

    <div class="input-field col s12">
      <?php echo $this->Form->input("username", ['class' => 'validate', 'label' => 'E-mail']); ?>
    </div>
    <div class="input-field col s12">
      <?php echo $this->Form->input("password", ['class' => 'form-control', 'label' => 'Senha']); ?>
    </div>

    <button type="submit" class="waves-effect waves-light btn">Entrar no PGA <i class="material-icons right">send</i></button>

    <a href="javascript:;" ng-click="clear()" class="waves-effect waves-teal btn-flat">Voltar</a>

    <?php echo $this->Form->end(); ?>
  </div> <!-- #form-login -->

        <em class="small-logo">Plataforma de Ensino Personalizado</em>

      </div>
    </div>
  </div>
</div>
