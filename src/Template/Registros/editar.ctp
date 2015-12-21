<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-keyboard-o"></i>Inputs', '/registros/listar', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-keyboard-o"></i>Editar', '/registros/editar/' . $aula->id, ['escape' => false]); ?>

<div class="row">
  <div class="col-lg-12">
    <div class="portlet box blue">
      <div class="portlet-title">

        <div class="caption">
					<i class="fa fa-keyboard-o"></i>
					<span class="caption-subject bold uppercase"> Inputs - Edição da Aula <?php echo $aula->date; ?></span>
				</div>

      </div> <!-- .portlet-title -->
      <div id="registros-container" class="portlet-body form" ng-controller="EditarRegistroCtrl" data-id="<?php echo $aula->id; ?>" ng-init='hashtags = <?php echo json_encode($aula->hashtags, true); ?>; admin_logged = <?php echo json_encode($admin_logged); ?>; materias = <?php echo json_encode($aula->materias, true); ?>;'>

        <?= $this->Form->create($aula); ?>

        <div class="form-body">

          <p ng-if="!admin_logged.clinical_condition">
            Esta é a página em que você edita os registros existentes para seu aluno/filho/paciente. <br>
            <br>
            Você só poderá preencher campos que dizem respeito a seu cargo (tutor, psicoterapeuta, responsáveis).
          </p>

          <?php if(!empty($_GET['status']) && $_GET['status'] == "sucesso") : ?>
            <p class="sucesso">
              <i class="fa fa-check-square-o"></i>
              <span>
              Salvo!</span>
            </p> <!-- .sucesso -->
          <?php endif; ?>

          <hr>
          
          <div class="col-lg-8">

            <div class="form-group campo campo-{{indice}}" ng-repeat="(indice, registro) in registros">

              <div class="col-md-3">

                  <span class="label label-primary">{{registro.name}}</span>

              </div> <!-- .col-md-3 -->

              <div class="col-md-9">

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
                  <textarea id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" class="form-control"></textarea>
                </div> <!-- registro_textual -->

                <div ng-if="registro.type === 'escala_numerica'">
                  <p>
                    Valor atual: <strong>{{registro.value}}</strong>
                  </p>
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" type="range" min="{{registro.config.min}}" max="{{registro.config.max}}" class="form-control">
                </div> <!-- escala_numerica -->

                <div ng-if="registro.type === 'escala_texto'">

                  <select id="input{{registro.id}}" class="form-control" name="registros[{{indice}}][value]" ng-model="registro.value"  ng-options="option for option in registro.config.options track by option">
                  </select>

                </div> <!-- escala_texto -->

                <div ng-if="registro.type === 'numero'">
                  <input id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" type="text" class="form-control">
                </div> <!-- numero -->

                <div ng-if="registro.type === 'texto_privativo'">
                  <textarea id="input{{registro.id}}" name="registros[{{indice}}][value]" ng-model="registro.value" class="form-control"></textarea>
                </div> <!-- numero -->

              </div> <!-- .col-md-8 -->

              <div class="clearfix"></div>
              <hr>
            </div> <!-- .campo -->

          </div> <!-- .col-lg-8 -->

          <div class="col-lg-4">

            <div class="campo" ng-if="!admin_logged.clinical_condition">
              <strong>Matérias</strong>
              <hr>
              
              <div class="materia" ng-repeat="materia in materias">

                <input type="hidden" name="materias[{{materia.theme_id}}][enabled]" value="0">

                <label class="label-materia">
                  <input type="checkbox" name="materias[{{materia.theme_id}}][enabled]" ng-checked="materia.enabled" ng-click="materia.enabled = !materia.enabled" value="1"> {{materia.name}}
                </label>

                <textarea name="materias[{{materia.theme_id}}][observation]" placeholder="Observação sobre a aula de {{materia.name}}" class="form-control textarea-materia" ng-if="materia.enabled">{{materia.observation}}</textarea>

                <input name="materias[{{materia.theme_id}}][nota_esperada]" placeholder="Nota esperada {{materia.name}}" class="form-control" ng-if="materia.enabled" value="{{materia.nota_esperada}}" />
                <input name="materias[{{materia.theme_id}}][nota_alcancada]" placeholder="Nota alcançada {{materia.name}}" class="form-control" ng-if="materia.enabled" value="{{materia.nota_alcancada}}" />

              </div>

              <?php /* ?>
              <?php foreach($materias as $id => $materia) : ?>
                <label class="label-materia" ng-repeat="materia in materias">
                  <input type="checkbox" name="materias[<?php echo $id; ?>][enabled]" ng-click="materias[<?php echo $id; ?>] = true" value="<?php echo $id; ?>"> <?php echo $materia; ?>
                </label>

                <textarea name="materias[<?php echo $id; ?>][enabled]" placeholder="Observação sobre a aula de <?php echo $materia; ?>" class="form-control textarea-materia" ng-if="materias[<?php echo $id; ?>] == true"></textarea>

                <div class="clearfix"></div>

              <?php endforeach; ?>

              <?php */ ?>

            </div> <!-- .campo -->

            <div class="campo" ng-if="!admin_logged.clinical_condition">
              <strong>Hashtags</strong>
              <hr>

              <tags-input ng-model="hashtags"></tags-input>

              <input type="hidden" name="hashtags[{{key}}]" value="{{hashtag.text}}" ng-repeat="(key, hashtag) in hashtags">

            </div> <!-- .campo -->

          </div> <!-- .col-lg-4 -->


          <div class="clearfix"></div>

        </div> <!-- .form-body -->

        <div class="form-actions" style="margin-bottom: 20px;">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn btn-block btn-success green">
                <i class="fa fa-pencil"></i> Salvar dados
              </button>

              <small class="text-center" style="display: block; margin-top: 10px;"><a href="<?php echo $this->Url->build(['action' => 'excluir', $aula->id]); ?>" style="color: #f00 !important;" onclick="if(!confirm('Você tem certeza disto? Esta ação é permanente!')) { return false; }">remover esta aula</a></small>
            </div>
          </div>
        </div> <!-- .form-actions -->

        <?= $this->Form->end(); ?>

      </div> <!-- .portlet-body -->
    </div> <!-- .portlet -->
  </div> <!-- .col-lg -->
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