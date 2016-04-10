<!-- Modal Structure -->
<div id="modalnova" class="modal modal-fixed-footer">
<div class="modal-content">
  <h4>Nova Mensagem</h4>

  <form ng-submit="enviar_nova_mensagem(nova_mensagem, '<?php echo $userLogged['table'] ?>', '<?php echo $userLogged['id'] ?>', '<?php echo $admin_logged['full_name'] ?>')" ng-if="!mensagem_enviada">
        <div class="form-group">
          <label>Para:</label>

            <?php foreach($atores as $model => $categoria_ator) : foreach($categoria_ator as $ator) :
            $tmp[] = array('text' => $ator->full_name);
            endforeach;endforeach;
            ?>

          <tags-input add-from-autocomplete-only="true" replace-spaces-with-dashes="false" ng-model="nova_mensagem.to">
            <auto-complete source='<?php echo json_encode($tmp); ?>'></auto-complete>
          </tags-input>

        </div>
        <div class="form-group">
          <label>Assunto:</label>
          <input type="text" required="required" ng-model="nova_mensagem.name" class="form-control">
        </div>
        <div class="form-group">
          <label>Mensagem:</label>
          <textarea required="required" ng-model="nova_mensagem.content" cols="30" rows="10"  class="form-control"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Enviar nova mensagem</button>
        </div>
      </form>


</div> <!-- .modal-content -->

<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
</div>
</div> <!-- #modal -->
