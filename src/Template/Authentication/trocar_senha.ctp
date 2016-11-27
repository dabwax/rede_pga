<?php echo $this->Form->create(); ?>

<div class="card blue-grey darken-1 card-trocar-senha" ng-controller="TrocarSenhaCtrl">
  <div class="card-content white-text">
    <span class="card-title"> <i class="material-icons icone-trocar-senha left">vpn_key</i> Trocar Senha</span>

    <?php echo $this->Form->input("new_password", ["label" => "Nova Senha", "type" => "password", "ng-model" => "user.new_password"]); ?>
    <?php echo $this->Form->input("confirm_new_password", ["label" => "Confirmar Nova Senha", "type" => "password", "ng-model" => "user.confirm_new_password"]); ?>

    <p class="card-panel red" ng-if="user.new_password != user.confirm_new_password">As senhas estão diferentes.</p>


  </div>
  <div class="card-action">
      <button type="submit" class="btn" ng-class="{'grey': !formValido, 'green': formValido}" ng-disabled="!formValido">Alterar Senha</button>
  </div>
</div>

<?php echo $this->Form->end(); ?>