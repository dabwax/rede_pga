<div class="row" ng-controller="ExerciciosCtrl">
  <!-- Título da página -->
  <div class="page-title red darken-3">

    <div class="col s6">
        <h2>Exercícios</h2>
    </div>


  <?php if($permissions[$userLogged['table']]->exercicios == 1 && $userLogged['table'] != 'Users') : ?>
    <div class="actions">
      <a href="javascript:;" data-id="nova" modal class="waves-effect waves-light btn blue">
        Novo exercício <i class="material-icons right">add</i>
      </a>
    </div>
  <?php endif; ?>

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="col s12">

    <div class="card-panel grey white-text" ng-if="mensagens.length == 0">
      Ainda não há nenhum exercício cadastrado.
    </div>

    <ul class="collection" ng-if="mensagens.length > 0">
      <li class="collection-item fluxoItem avatar" ng-repeat="message in mensagens">
        <a href="javascript:void(0);" ng-click="visualizar(message)">
          <i class="material-icons circle grey">edit</i>
          <span class="title">{{message.name}}</span>
          <div class="clearfix"></div>
          <em>Escrito em <span>{{message.date}}</span> - Data final <span class="chip blue white-text">{{message.due_to}}</span></em>
          <p>Observações: {{message.observation}}</p>
        </a>
      </li>
    </ul>

  </div>

  <?php echo $this->element("../Exercicios/modal-visualizar-mensagem"); ?>
  <?php echo $this->element("../Exercicios/modal-nova-mensagem"); ?>

</div>
