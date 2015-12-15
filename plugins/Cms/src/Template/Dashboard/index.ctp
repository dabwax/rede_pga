  <div id="role-check" class="text-center">

    <?php if(!empty($g_users->toArray())) : ?>
    <h2>Selecione um estudante para administrar</h2>

    <?php foreach($g_users as $u) : ?>
    <a href="<?php echo $this->Url->build(['controller' => 'Dashboard', 'action' => 'set_current_user_selected', $u->id]); ?>" class="mugshot">

      <div class='bola'>
        <?php echo $this->Html->image('/uploads/' . $u->profile_attachment, ['class' => 'img-circle', 'style' => 'width: 100px; height: 90px;']); ?>
      </div>

      <div class="legenda"><?php echo $u->full_name; ?></div>

    </a>
  <?php endforeach; ?>
  <?php endif; ?>

  </div>