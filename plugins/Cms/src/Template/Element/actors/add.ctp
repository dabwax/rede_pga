<form method="POST" action="">

<input type="hidden" name="user_id" value="<?php echo $estudanteAtual['id']; ?>">
<input type="hidden" name="model" value="<?php echo $k; ?>">
<input type="hidden" name="id" value="{{actor.id}}">

<div class="col s6">


	<div class="field">
		<label>Nome Completo</label>

			<input type="text" class="form-control" name="full_name" required ng-model="actor.full_name">
	</div> <!-- .field -->

	<div class="field">
		<label>Usuário</label>

			<input type="text" class="form-control" name="username" required ng-model="actor.username">
	</div> <!-- .field -->

	<div class="field">
		<label>Telefone</label>

			<input type="text" class="form-control" name="phone" required ng-model="actor.phone" ui-mask="(99) 9999-9999?9"  ui-mask-placeholder ui-mask-placeholder-char="space">
	</div> <!-- .field -->

</div> <!-- .col s6 -->

<div class="col s6">

	<div class="field">
		<label>Cargo</label>

		<select name="role" ng-model="actor.role" class="form-control browser-default" required>
			<option value="">Selecionar</option>

			<option value="dad" ng-if="'<?php echo $k; ?>' == 'Protectors'">Pai</option>
			<option value="mom" ng-if="'<?php echo $k; ?>' == 'Protectors'">Mãe</option>

			<option value="mediator" ng-if="'<?php echo $k; ?>' == 'Schools'">Mediador</option>
			<option value="coordinator" ng-if="'<?php echo $k; ?>' == 'Schools'">Coordenador</option>

			<option value="therapist" ng-if="'<?php echo $k; ?>' == 'Therapists'">Terapeuta</option>

			<option value="tutor" ng-if="'<?php echo $k; ?>' == 'Tutors'">Tutor</option>

		</select>
	</div> <!-- .field -->

	<div class="field">
		<label>Senha</label>

			<input type="text" class="form-control" name="password" ng-model="actor.password">

		<p>
		<input type="checkbox" name="is_admin" id="is_admin" value="1" ng-model="actor.is_admin">
		<label for="is_admin">É um usuário administrador (Poderá ver o CMS)</label>
		</p>

	</div> <!-- .field -->

	<div class="field" ng-if="'<?php echo $k; ?>' == 'Schools'">
		<label>Escola</label>

			<input type="text" class="form-control" name="instituition_id" required ng-model="actor.instituition_id">
	</div> <!-- .field -->

</div> <!-- .col s6 -->

<div class="clearfix"></div>

<div class="col-lg-12">

	<button type="submit" class="btn green"><i class="material-icons">save</i> Salvar Ator</button>

	<?php if($estudanteAtual['full_name'] != "Fulano de Tal") : ?>
		<a href="<?php echo $this->Url->build(['action' => 'delete_actor']); ?>/{{actor.model}}/{{actor.id}}" class="btn red white-text" ng-if="actor.id"><i class="material-icons">delete</i> Excluir Ator</a>
	<?php endif; ?>

	<a href="javascript:;" ng-click="cancelarEdicao()" class="btn btn-flat right" ng-if="actor.id"><i class="material-icons">close</i> Cancelar Edição</a>

</div> <!-- .col-lg-12 -->

</form>
