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
			<td><span class="chip blue white-text" style="padding-left: 6px !important;">{{get_label('<?php echo $a->role; ?>')}}</span> <?php echo $a->full_name; ?> </td>
			<td><?php echo $a->phone; ?></td>
			<td><?php echo $a->username; ?></td>
			<td><span title="<?php echo $a->password; ?>">********</span></td>
			<td>
				<a href="javascript:;" class="btn blue white-text" ng-click='set_actor(<?php echo json_encode($a, true); ?>, "<?php echo $k; ?>")' title="Editar ator"><i class="material-icons">edit</i></a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>