<div class="row">
<div class="page-title">
	<h2>Permissões</h2>
</div>
<div class="clearfix"></div>
<div class="card">
<table class="table">
	<thead style="font-weight: bold; text-transform: uppercase; font-size: 16px;">
		<tr>
			<td class="center">Ator</td>
			<td class="center">Feed</td>
			<td class="center">Evolução</td>
			<td class="center">Bate-Papo</td>
			<td class="center">Input</td>
			<td class="center">Exercícios</td>
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
		foreach($models as $k => $m)
		{
		 ?>
		<tr class="<?php echo ($k % 2 == 0) ? 'even' : 'odd'; ?>">
			<td class="center" style="text-transform: uppercase;"> <span class="label label-warning"><?php echo $labels[$m]; ?></span></td>

			<?php $tmp = ['feed', 'evolucao','batepapo','registros','exercicios']; ?>

			<?php foreach($tmp as $t) : ?>

			<td class="center">

				<?php if(empty($permissions[$m]->$t)) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/1/' . $t) ?>" class=""><i class="material-icons">panorama_fish_eye</i></a>
				<?php endif; ?>

				<?php if($permissions[$m]->$t == 1) : ?>
					<a href="<?php echo $this->Url->build('/cms/permissions/update/' . $permissions[$m]->id . '/0/' . $t) ?>">
					<i class="material-icons">remove_red_eye</i>
					</a>
				<?php endif; ?>
			</td>

			<?php endforeach; ?>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>

</div>
