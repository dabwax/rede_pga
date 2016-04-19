<?php echo $this->element("../Registros/custom_assets"); ?>

<div class="row">
  <!-- Título da página -->
  <div class="page-title red darken-3">
      <h2>Editar Aula - <?php echo $aula->date; ?></h2>

      <div class="actions">

        <a href="<?php echo $this->Url->build(['controller' => 'Feed', 'action' => 'index']); ?>" class="waves-effect waves-light btn green"><i class="material-icons left">keyboard_backspace</i> voltar</a>

      </div> <!-- .actions -->

      <div class="clearfix"></div>
  </div> <!-- .page-title -->

  <div class="card-panel">

      <div id="registros-container" class="portlet-body form" ng-controller="EditarRegistroCtrl" ng-init="init()" data-hashtags='<?php echo json_encode($aula->hashtags, true); ?>' data-lesson-id='<?php echo $aula->id; ?>' data-admin-logged='<?php echo json_encode($admin_logged); ?>' data-materias='<?php echo json_encode($aula->materias, true); ?>'>

        <?= $this->Form->create($aula); ?>

        <div class="form-body" ng-init="lesson_date = '<?= $aula->date->format('d/m/Y'); ?>'">

          <div class="col s12 l8">

            <strong>Inputs</strong>

            <div class="form-group campo campo-{{indice}}" ng-repeat="(indice, registro) in registros">

              <div class="col s4 l3">

                  <span class="label label-primary">{{registro.name}}</span>

              </div> <!-- .col-md-3 -->

              <div class="col s8 l9">

                  <input name="registros[{{indice}}][id]" ng-model="registro.id" type="hidden" value="{{registro.id}}" class="form-control">
                  <input name="registros[{{indice}}][status]" ng-model="registro.status" type="hidden" value="{{registro.status}}" class="form-control">

                  <div ng-if="!admin_logged.clinical_condition">
                    <input name="registros[{{indice}}][lesson_entry_id]" ng-if="registro.lesson_entry_id" ng-model="registro.lesson_entry_id" type="hidden" value="{{registro.lesson_entry_id}}" class="form-control">
                  </div>

                <div ng-if="registro.type === 'calendario'">
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" datepicker value="{{registro.value}}" type="text" class="form-control">
                </div> <!-- calendario -->

                <div ng-if="registro.type === 'intervalo_tempo'">
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" type="text" class="form-control">
                </div> <!-- intervalo_tempo -->

                <div ng-if="registro.type === 'registro_textual'">
                  <textarea id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" class="form-control" editor></textarea>
                </div> <!-- registro_textual -->

                <div ng-if="registro.type === 'escala_numerica'">
                  <p>
                    Valor atual: <strong>{{registro.value}}</strong>
                  </p>
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" type="range" min="{{registro.config.min}}" max="{{registro.config.max}}" class="form-control">
                </div> <!-- escala_numerica -->

                <div ng-if="registro.type === 'escala_texto'">

                  <select id="input{{registro.id}}" class="form-control browser-default" name="registros[{{indice}}][value]" ng-model="registro.value"  ng-options="option for option in registro.config.options track by option">
                  <option value="">Selecionar</option>
                  </select>

                </div> <!-- escala_texto -->

                <div ng-if="registro.type === 'numero'">
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" type="text" class="form-control">
                </div> <!-- numero -->

                <div ng-if="registro.type === 'texto_privativo'">
                  <textarea id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" class="form-control" editor></textarea>
                </div> <!-- numero -->

              </div> <!-- .col-md-8 -->

              <div class="clearfix"></div>

            </div> <!-- .campo -->

          </div> <!-- .col-lg-8 -->

          <div class="col s12 l4">

            <div class="campo" ng-if="!admin_logged.clinical_condition">
              <strong>Matérias</strong>


              <div class="materia" ng-repeat="materia in materias">

                <input type="hidden" name="materias[{{materia.theme_id}}][enabled]" value="0">

                <label class="label-materia chip chip-materia">
                  <input type="checkbox" name="materias[{{materia.theme_id}}][enabled]" ng-checked="materia.enabled" ng-click="materia.enabled = !materia.enabled" value="1"> {{materia.name}}
                </label>

                <textarea name="materias[{{materia.theme_id}}][observation]" placeholder="Observação sobre a aula de {{materia.name}}" class="form-control textarea-materia" ng-if="materia.enabled">{{materia.observation}}</textarea>

                <input name="materias[{{materia.theme_id}}][nota_esperada]" placeholder="Nota esperada {{materia.name}}" class="form-control" ng-if="materia.enabled" value="{{materia.nota_esperada}}" />
                <input name="materias[{{materia.theme_id}}][nota_alcancada]" placeholder="Nota alcançada {{materia.name}}" class="form-control" ng-if="materia.enabled" value="{{materia.nota_alcancada}}" />

              </div>

            </div> <!-- .campo -->

            <div class="campo" ng-if="!admin_logged.clinical_condition">
              <strong>Hashtags</strong>
              <hr>

              <tags-input ng-model="hashtags"></tags-input>

              <input type="hidden" name="hashtags[{{key}}]" value="{{hashtag.text}}" ng-repeat="(key, hashtag) in hashtags">

            </div> <!-- .campo -->

          </div> <!-- .col-lg-4 -->


          <div class="clearfix"></div>

          <div class="col s12">


            <strong>Observações</strong>

            <div class="clearfix"></div>

            <?php echo $this->Form->input("observation", ["editor", "label" => false]); ?>


            <strong>Data da Aula</strong>

            <div class="clearfix"></div>

            <?php echo $this->Form->input("date", ["label" => false, "type" => "text", "value" => $aula->date->format('d/m/Y'), 'ng-model' => 'lesson_date', 'ng-change' => 'mudouData(lesson_date)', 'datepicker' ]); ?>

            <a href="<?php echo $this->Url->build(['action' => 'excluir', $aula->id]); ?>" class="btn-remover-dados-aula" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }">remover meus dados desta aula</a></small>
          </div>

        </div> <!-- .form-body -->

        <div class="form-actions" style="margin-bottom: 20px;">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" ng-disabled="!avancar" class="btn btn-block btn-success green">
                <i class="fa fa-pencil"></i> Salvar dados
              </button>

            </div>
          </div>
        </div> <!-- .form-actions -->

        <?= $this->Form->end(); ?>

</div> <!-- .row -->

<?php if(!empty($redirect_to_input_id)) : ?>
<script>
  $(document).ready(function() {

    setTimeout(function() {
      $("#input<?php echo $redirect_to_input_id; ?>").focus();
    }, 0);

  });
</script>
<?php endif; ?>
