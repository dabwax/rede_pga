<div class="row" ng-controller="BatePapoCtrl">
  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s6">
        <h2>Fluxo</h2>
    </div>

    <div class="actions">
      <a href="javascript:;" data-id="nova" modal class="waves-effect waves-light btn grey">
        Nova mensagem <i class="material-icons right">add</i>
      </a>
    </div>

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="col s12">

    <div class="card-panel grey white-text" ng-if="mensagens.length == 0">
      Ainda não há nenhuma mensagem cadastrada.
      <br>
       Use o botão ao lado direito para criar uma mensagem.
    </div>

    <ul class="collection" ng-if="mensagens.length > 0">
      <li class="collection-item fluxoItem avatar" ng-repeat="message in mensagens">
        <a href="javascript:void(0);" ng-click="visualizar(message)">
          <i class="material-icons circle grey">message</i>
          <span class="title">{{message.name}}</span>
          <div class="clearfix"></div>
          <em>Escrito por {{message.from}} - <span>{{message.date}}</span></em>
          <p>{{message.excerpt}}...</p>
        </a>
      </li>
    </ul>

  </div>

  <?php echo $this->element("../BatePapo/modal-visualizar-mensagem"); ?>
  <?php echo $this->element("../BatePapo/modal-nova-mensagem"); ?>

</div>
