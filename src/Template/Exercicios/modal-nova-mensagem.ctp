<!-- Modal Structure -->
<div id="modalnova" class="modal">
<div class="modal-content">
  <h4 class="center">Novo Exercício</h4>

  <form ng-submit='enviar(nova_mensagem)'>

  <ul class="collection">
    <li class="collection-item">
          <label>Data Final:</label>
          <input type="text" required="required" ng-model="nova_mensagem.due_to" datepicker class="form-control">
    </li>
    <li class="collection-item">
          <label>Título:</label>
          <input type="text" required="required" ng-model="nova_mensagem.name" class="form-control">
    </li>
    <li class="collection-item">
          <label>Observações:</label>
          <textarea required="required" ng-model="nova_mensagem.observation" class="materialize-textarea"></textarea>
    </li>
    <li class="collection-item">
          <label>Matéria?</label>
          <select class="browser-default" ng-model="nova_mensagem.theme_id">
            <option value="">Selecionar</option>
            <?php foreach($themes as $t) : ?>
            <option value="<?php echo $t->id; ?>"><?php echo $t->name; ?></option>
            <?php endforeach; ?>
          </select>
    </li>
    <li class="collection-item">
          <label>Anexo?</label>
          <input type="file" required="required" ngf-select ng-model="nova_mensagem.attachment" name="attachment" class="form-control">
    </li>
    <li class="collection-item center">
          <button type="submit" class="btn btn-success">Enviar novo exercício</button>
          <a href="javascript:void(0);" ng-click="fechar()" class="waves-effect waves-red btn-flat">Fechar</a>
    </li>
  </ul>

  </form>

</div> <!-- .modal-content -->

</div> <!-- #modal -->
