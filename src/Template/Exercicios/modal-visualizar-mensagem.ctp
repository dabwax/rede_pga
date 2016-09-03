<!-- Modal Structure -->
<div id="modalMensagem" class="modal">
<div class="modal-content">
  <h4 class="center">Visualizar Exercício</h4>

  <ul class="collection">
    <li class="collection-item">
      <strong>Título</strong>
      <p>{{mensagem.name}}</p>
    </li>
    <li class="collection-item">
      <strong>Observações</strong>
      <p>{{mensagem.observation}}</p>
    </li>
    <li class="collection-item">
      <strong>Data final</strong>
      <p>{{mensagem.due_to}}</p>
    </li>
    <li class="collection-item" ng-if="mensagem.theme.name">
      <em>Matéria <strong>{{mensagem.theme.name}}</strong></em>
    </li>
    <li class="collection-item" ng-if="mensagem.attachment">
      <strong>Anexo</strong>
      <em> <a style="float: right;" href="<?php echo $this->Url->build('/exercicios/download/'); ?>{{mensagem.id}}" class="btn blue">Download Aqui</a></em>

      <div class="clearfix"></div>
    </li>
    <li class="collection-item" ng-repeat="resposta in mensagem.exercise_replies">
      <strong>{{resposta.author}} disse:</strong>
      <p>{{resposta.content}}</p>

      <div ng-if="resposta.attachment">
        <strong>Anexo incluído nesta resposta</strong>

        <a style="float: right;" href="<?php echo $this->Url->build('/exercicios/download_reply/'); ?>{{resposta.id}}" class="btn blue">Download Aqui</a>
      </div>

      <div class="clearfix"></div>

    </li>
    <li class="collection-item">
      <strong>Responder</strong>
      <textarea name="resposta" ng-model="resposta.content" class="materialize-textarea"></textarea>

      <label>Anexo?</label>
      <input type="file" required="required" ngf-select ng-model="resposta.attachment" name="attachment" class="form-control">

      <button type="submit" ng-click="enviar_resposta(resposta, mensagem.id)" class="btn">Enviar Resposta</button>
    </li>
    <li class="collection-item center">
          <a href="javascript:void(0);" ng-click="fechar()" class="waves-effect waves-red btn-flat">Fechar</a>
    </li>
  </ul>

</div> <!-- .modal-content -->

</div> <!-- #modal -->
