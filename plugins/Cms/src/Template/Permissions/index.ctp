<table class="table">
	<thead>
		<tr>
			<td class="text-center">Ator</td>
			<td class="text-center">Feed</td>
			<td class="text-center">Evolução</td>
			<td class="text-center">Bate-Papo</td>
			<td class="text-center">Input</td>
			<td class="text-center">Exercícios</td>
		</tr>
	</thead>
	<tbody>
		<?php 

		$models = ['Protectors', 'Schools', 'Tutors', 'Therapists', 'Users'];
		$labels = [
			'Protectors' => 'Responsáveis',
			'Schools' => 'Escolas',
			'Tutors' => 'Tutores',
			'Therapists' => 'Terapeutas',
			'Users' => 'Usuários',
		];
		foreach($models as $m)
		{
		 ?>
		<tr>
			<td class="text-center"> <span class="label label-warning"><?php echo $labels[$m]; ?></span></td>
			<td class="text-center">


				<?php if(empty($permissions[$m]->feed)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/feed') ?>" class="btn btn-default" style="color: green !important;"><i style="color: green !important;" class="fa fa-eye-slash"></i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->feed == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/feed') ?>" class="btn btn-default"><i class="fa fa-eye" style="color: blue;"></i></a>
				<?php endif; ?>
			</td>
			<td class="text-center">


				<?php if(empty($permissions[$m]->evolucao)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/evolucao') ?>" class="btn btn-default" style="color: green !important;"><i style="color: green !important;" class="fa fa-eye-slash"></i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->evolucao == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/evolucao') ?>" class="btn btn-default"><i class="fa fa-eye" style="color: blue;"></i></a>
				<?php endif; ?>
			</td>
			<td class="text-center">


				<?php if(empty($permissions[$m]->bate_papo)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/bate_papo') ?>" class="btn btn-default" style="color: green !important;"><i style="color: green !important;" class="fa fa-eye-slash"></i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->bate_papo == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/bate_papo') ?>" class="btn btn-default"><i class="fa fa-eye" style="color: blue;"></i></a>
				<?php endif; ?>
			</td>
			<td class="text-center">


				<?php if(empty($permissions[$m]->input)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/input') ?>" class="btn btn-default" style="color: green !important;"><i style="color: green !important;" class="fa fa-eye-slash"></i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->input == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/input') ?>" class="btn btn-default"><i class="fa fa-eye" style="color: blue;"></i></a>
				<?php endif; ?>
			</td>
			<td class="text-center">


				<?php if(empty($permissions[$m]->exercicios)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/exercicios') ?>" class="btn btn-default" style="color: green !important;"><i style="color: green !important;" class="fa fa-eye-slash"></i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->exercicios == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/exercicios') ?>" class="btn btn-default"><i class="fa fa-eye" style="color: blue;"></i></a>
				<?php endif; ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>