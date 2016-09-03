<!-- Modal Structure -->
<div id="modalMensagem" class="modal">
<div class="modal-content">
  <h4 class="center">Visualizar Mensagem</h4>

  <ul class="collection">
    <li class="collection-item">
      <strong>Assunto</strong>
      <p>{{mensagem.name}}</p>
    </li>
    <li class="collection-item">
      <strong>Conteúdo</strong>
      <p>{{mensagem.content}}</p>
    </li>
    <li class="collection-item">
      <em>Escrito por <strong>{{mensagem.from}}</strong></em>
    </li>
    <li class="collection-item" ng-repeat="resposta in mensagem.replies">
      <strong>{{resposta.author}} disse:</strong>
      <p>{{resposta.content}}</p>
    </li>
    <li class="collection-item">
      <strong>Responder</strong>
      <textarea name="resposta" ng-model="resposta.content" class="materialize-textarea"></textarea>

      <button type="submit" ng-click="enviar_resposta(resposta, mensagem.id)" class="btn">Enviar Resposta</button>
    </li>
    <li class="collection-item center">
          <a href="javascript:void(0);" ng-click="fechar()" class="waves-effect waves-red btn-flat">Fechar</a>
    </li>
  </ul>

</div> <!-- .modal-content -->

</div> <!-- #modal -->
