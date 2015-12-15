<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner container">
  <!-- BEGIN LOGO -->
  <div class="page-logo text-center">
    <a href="<?= $this->Url->build('/feed/listar'); ?>" style="width: 130px;">
    <?php echo $this->Html->image("logo.png", ['class' => 'logo-default logo-redepga', 'alt' => 'PGA', 'style' => 'height: 50px; padding-top: 6px;']); ?>
    </a>
        <?php if(@$admin_logged) : ?>
    <div class="menu-toggler sidebar-toggler">
      <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
    </div>
  <?php endif; ?>
  </div>
  <!-- END LOGO -->
  <!-- BEGIN RESPONSIVE MENU TOGGLER -->
  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
  </a>
  <!-- END RESPONSIVE MENU TOGGLER -->
  <!-- BEGIN PAGE TOP -->
  <div class="page-top">

    <?php if(@$admin_logged) : ?>

      <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
    <?php echo $this->Html->image("/uploads/" . $admin_logged['user']->profile_attachment, ['class' => 'img-circle', 'style' => 'width: 70px; height: 70px; margin-top: 10px; margin-left: 12px; float: left;']); ?>
      <p style="float: left; margin-left: 12px; margin-top: 32px; font-weight: bold; font-size: 16px;"><?php echo $admin_logged['user']->full_name; ?></p>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
      
      <div id="btn-group-header" class="btn-group">
      <a href="javascript:;" onclick="$('#modal_atores').modal('show');" class="btn btn-default" title="Atores"><i class="icon-user"></i> </a>
      <a href="<?= $this->Url->build('/minha-conta'); ?>" class="btn btn-default" title="Perfil"><i class="fa fa-cog"></i> </a>
      <a href="<?= $this->Url->build('/sair'); ?>" class="btn btn-danger" title="Sair"><i class="fa fa-power-off"></i> </a>
      </div>

    </div>

    </div>
    <!-- END TOP NAVIGATION MENU -->

  <?php endif; ?>
  </div>
  <!-- END PAGE TOP -->
</div>
<!-- END HEADER INNER -->
</div>

<div id="modal_atores" class="modal fade">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title"><i class="icon-user"></i> Atores</h4>
</div>
<div class="modal-body">
  

      <ul>
        <?php foreach($get_atores as $key => $aa) : foreach($aa as $a) : ?>
        <li style="display: inline-block; width: 45%; text-align: center; font-size: 14px; line-height: 24px; margin-bottom: 10px;">
        <?php if($a->id == $admin_logged['id'] && $key == $admin_logged['role_table']) : ?>
          <strong>
        <?php endif; ?>
            <?php echo $a->full_name; ?>
        <?php if($a->id == $admin_logged['id'] && $key == $admin_logged['role_table']) : ?>
          </strong>
        <?php endif; ?>
        </li>
        <?php endforeach; endforeach; ?>
      </ul>

</div>
</div>
</div>
</div>