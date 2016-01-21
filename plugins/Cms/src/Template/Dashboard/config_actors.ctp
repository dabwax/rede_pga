<div class="row" ng-controller="ConfigurarAtoresCtrl">
	<div class="col-lg-12" ng-init='instituitions = <?php echo json_encode($instituitions, JSON_HEX_APOS); ?>;'>
		
		<h2>Configurar Atores</h2>
		<hr>

		Nesta página você pode administrar os atores do <?php echo $current_user_selected['full_name']; ?>.

		<div class="panel-group mt20" id="accordion" role="tablist">
			
			<?php foreach($labels as $k => $l) : ?>
		  <div class="panel panel-default">

		    <div class="panel-heading" role="tab" id="<?php echo $k; ?>">
		      <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#c_<?php echo $k; ?>" ng-click="set_model('<?php echo $k; ?>')" <?php if($k == 'Protectors') : ?>aria-expanded="true"<?php endif; ?> aria-controls="c_<?php echo $k; ?>">
		          <?php echo $l; ?>
		      </a></h4>
		    </div>

		    <div id="c_<?php echo $k; ?>" class="panel-collapse collapse <?php if($k == 'Protectors') : ?>in<?php endif; ?>" role="tabpanel" aria-labelledby="<?php echo $k; ?>"><div class="panel-body">

		    <form action="" method="POST">

		    	<input type="hidden" name="user_id" value="<?php echo $current_user_selected['id']; ?>">
		    	<input type="hidden" name="model" value="<?php echo $k; ?>">
		    	<input type="hidden" name="id" value="{{actor.id}}">

		    	<div class="col-lg-6">
		    		
			    	<div class="form-group">
			    		<label>Cargo</label>

			    		<select name="role" ng-model="actor.role" class="form-control">
			    			<option value="">Selecionar</option>

			    			<option value="dad" ng-if="actor.model == 'Protectors'">Pai</option>
			    			<option value="mom" ng-if="actor.model == 'Protectors'">Mãe</option>

			    			<option value="mediator" ng-if="actor.model == 'Schools'">Mediador</option>
			    			<option value="coordinator" ng-if="actor.model == 'Schools'">Coordenador</option>

			    			<option value="therapist" ng-if="actor.model == 'Therapists'">Terapeuta</option>

			    			<option value="tutor" ng-if="actor.model == 'Tutors'">Tutor</option>

			    		</select>
			    	</div> <!-- .form-group -->

			    	<div class="form-group">
			    		<label>Usuário</label>

							<input type="text" class="form-control" name="username" ng-model="actor.username">
			    	</div> <!-- .form-group -->
		    		
			    	<div class="form-group">
			    		<label>Nome Completo</label>

							<input type="text" class="form-control" name="full_name" ng-model="actor.full_name">
			    	</div> <!-- .form-group -->

		    	</div> <!-- .col-lg-6 -->

		    	<div class="col-lg-6">

			    	<div class="form-group">
			    		<label>Senha</label>
			    		
							<input type="text" class="form-control" name="password" ng-model="actor.password">
			    	</div> <!-- .form-group -->

			    	<div class="form-group">
			    		<label>Telefone</label>
			    		
							<input type="text" class="form-control" name="phone" ng-model="actor.phone" ui-mask="(99) 9999-9999?9"  ui-mask-placeholder ui-mask-placeholder-char="space">
			    	</div> <!-- .form-group -->
		    		
			    	<div class="form-group" ng-if="actor.model == 'Schools'">
			    		<label>Escola</label>
			    		
							<input type="text" class="form-control" name="instituition_id" ng-model="actor.instituition_id">
			    	</div> <!-- .form-group -->

		    	</div> <!-- .col-lg-6 -->

		    	<div class="clearfix"></div>

		    	<div class="col-lg-12">
		    		
		    		<button type="submit" class="btn btn-success btn-block btn-lg"><i class="fa fa-floppy-o"></i> Salvar Ator</button>

		    	</div> <!-- .col-lg-12 -->

	    	</form>

		    	<div class="clearfix"></div>

		    	<table class="table mt20">
		    		<thead>
		    			<tr>
		    				<th>Nome Completo</th>
		    				<th>Telefone</th>
		    				<th>Usuário</th>
		    				<th>Senha</th>
		    				<th></th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<?php foreach($actors[$k] as $a) : ?>
		    			<tr>
		    				<td><span class="label label-primary">{{get_label('<?php echo $a->role; ?>')}}</span> <?php echo $a->full_name; ?> </td>
		    				<td><?php echo $a->phone; ?></td>
		    				<td><?php echo $a->username; ?></td>
		    				<td><span title="<?php echo $a->password; ?>">********</span></td>
		    				<td>
		    					<a href="javascript:;" class="btn btn-primary" ng-click='set_actor(<?php echo json_encode($a, true); ?>, "<?php echo $k; ?>")' title="Editar ator"><i class="fa fa-pencil"></i></a>
		    					<a class="btn btn-danger" href="<?php echo $this->Url->build(['action' => 'delete_actor']); ?><?php echo $a->id; ?>/<?php echo $a->role; ?>" title="Excluir ator"><i class="fa fa-trash"></i></a>
		    				</td>
		    			</tr>
		    			<?php endforeach; ?>
		    		</tbody>
		    	</table>

		    </div></div> <!-- .panel-body -->

		  </div> <!-- .panel -->
			<?php endforeach; ?>

		</div> <!-- #accordion -->

	</div> <!-- .col-lg-12 -->
</div> <!-- .row -->
