<div class="row" ng-controller="TrocarSenhaCtrl">

  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s12 center-align">
        <?php echo $this->Html->image("logo-azul.png", ["height" => 90]); ?>
    </div>

    <div class="col s6">


        <h2><i class="material-icons left">vpn_key</i> Trocar Senha</h2>
    </div>
    <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="col s12">
    <?php echo $this->Form->create(); ?>
    <?php echo $this->Form->input("new_password", ["label" => "Nova Senha", "type" => "password", "ng-model" => "user.new_password"]); ?>
    <?php echo $this->Form->input("confirm_new_password", ["label" => "Confirmar Nova Senha", "type" => "password", "ng-model" => "user.confirm_new_password"]); ?>

    <p ng-if="user.new_password != user.confirm_new_password">As senhas estão diferentes.</p>

    <div>
      <button type="submit" class="btn" ng-class="{'grey': !formValido, 'green': formValido}" ng-disabled="!formValido">Alterar Senha</button>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
</div> <!-- .row -->