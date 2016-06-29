<!-- Modal Structure -->
<div id="modalMensagem" class="modal">
<div class="modal-content">
  <h4 class="center">Visualizar Mensagem</h4>

  <form ng-submit='enviar(nova_mensagem)'>

  <ul class="collection">
    <li class="collection-item">
          <label>Para:</label>

            <?php foreach($atores as $model => $categoria_ator) : foreach($categoria_ator as $ator) :
            $tmp[] = array('text' => $ator->full_name, 'id' => $ator->id, 'model' => $model);
            endforeach;endforeach;
            ?>

          <tags-input placeholder="Quem você quer que receba esta mensagem?" add-from-autocomplete-only="true" replace-spaces-with-dashes="false" ng-model="nova_mensagem.to">
            <auto-complete source='<?php echo json_encode($tmp); ?>'></auto-complete>
          </tags-input>

    </li>
    <li class="collection-item">
          <label>Assunto:</label>
          <input type="text" required="required" ng-model="nova_mensagem.name" class="form-control">
    </li>
    <li class="collection-item">
          <label>Mensagem:</label>
          <textarea required="required" ng-model="nova_mensagem.content" class="materialize-textarea"></textarea>
    </li>
    <li class="collection-item center">
          <button type="submit" class="btn btn-success">Enviar nova mensagem</button>
          <a href="#!" class="waves-effect waves-red btn-flat">Fechar</a>
    </li>
  </ul>

  </form>

</div> <!-- .modal-content -->

</div> <!-- #modal -->
