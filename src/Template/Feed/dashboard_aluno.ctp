<div class="row" style="margin-top: 20px;">

	<?php if($permissions[$admin_logged['role_table']]->input == 1) : ?>
	<div class="col-lg-3">
		<a href="<?php echo $this->Url->build('/registros/listar'); ?>" class="btn btn-block btn-primary" style="height: 120px; line-height: 100px; font-size: 28px;">
			<i class="fa fa-user"></i>
			Diário do Aluno
		</a>
	</div>
	<?php endif; ?>

	<?php if($permissions[$admin_logged['role_table']]->bate_papo == 1) : ?>
	<div class="col-lg-3">
		<a href="<?php echo $this->Url->build('/bate-papo'); ?>" class="btn btn-block btn-success" style="height: 120px; line-height: 100px; font-size: 28px;">
			<i class="fa fa-keyboard-o"></i>
			Bate-Papo
		</a>
	</div>
	<?php endif; ?>

	<?php if($permissions[$admin_logged['role_table']]->exercicios == 1) : ?>
	<div class="col-lg-3">
		<a href="<?php echo $this->Url->build('/exercicios'); ?>" class="btn btn-block btn-danger" style="height: 120px; line-height: 100px; font-size: 28px;">
			<i class="fa fa-pencil"></i>
			Exercícios
		</a>
	</div>
	<?php endif; ?>

	<?php if($permissions[$admin_logged['role_table']]->evolucao == 1) : ?>
	<div class="col-lg-3">
		<a href="<?php echo $this->Url->build('/evolucao/listar'); ?>" class="btn btn-block btn-warning" style="height: 120px; line-height: 100px; font-size: 28px;">
			<i class="fa fa-line-chart"></i>
			Evolução
		</a>
	</div>
	<?php endif; ?>
</div>