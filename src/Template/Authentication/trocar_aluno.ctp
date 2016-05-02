<div ng-controller="AuthenticationController" class="row">
  <div class="col s12 m6 l6 offset-l3 offset-m3">
    <div class="card blue-grey lighten-5">
      <div class="card-content center-align">

        <div class="clearfix"></div>
        <span class="card-title">Selecione o aluno</span>

        <ul id="pep-lista-atores" class="collection">
          <li class="collection-item">

            <div>
              Aluno <a href="#!" class="secondary-content"> <i class="material-icons">send</i></a>
            </div>

          </li>
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

      </div>
    </div>
  </div>
</div>
