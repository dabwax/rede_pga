  <div id="role-check" class="text-center">

    <?php if(!empty($g_users->toArray())) : ?>
    <span class="card-subtitle">Selecione um estudante para administrar:</span>

    <div class="clearfix" style="margin-top: 20px;"></div>

    <?php foreach($g_users as $u) : ?>
		<a class="chip teal accent-4" href="<?php echo $this->Url->build(['controller' => 'Dashboard', 'action' => 'set_current_user_selected', $u->id]); ?>">
			<?php echo $this->Html->image('/uploads/' . $u->profile_attachment, ['class' => 'img-circle', 'style' => '']); ?>
			<?php echo $u->full_name; ?>
		</a>
  	<?php endforeach; ?>

  <?php endif; ?>

  </div>