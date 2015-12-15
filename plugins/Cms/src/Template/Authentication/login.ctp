<div class="row">
	<div class="col-lg-12">
		
		<?php echo $this->Form->create(null); ?>
		
		<div class="col-lg-5 col-md-5">
		<div class="form-group">
			<?php echo $this->Form->input("username", ['label' => 'Usuário', 'class' => 'form-control']); ?>
		</div>
		</div>
		
		<div class="col-lg-5 col-md-5">
		<div class="form-group">
			<?php echo $this->Form->input("password", ['label' => 'Senha', 'class' => 'form-control']); ?>
		</div>
		</div>

		<div class="col-lg-2 col-md-2">
		<div class="form-group">
			<label for="">&nbsp;</label>
			<button type="submit" class="btn btn-primary btn-block">Entrar</button>
		</div>
		</div>

		<?php echo $this->Form->end(); ?>
	</div>
</div>