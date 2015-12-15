<div class="row">
  <div class="col-lg-12">
    <div class="portlet box blue">
      <div class="portlet-title">

        <div class="caption">
					<i class="icon-user"></i>
					<span class="caption-subject bold uppercase"> Minha Conta</span>
				</div>

      </div>
      <div class="portlet-body form">

        <?= $this->Form->create($user, ['class' => 'form-horizontal form-row-seperated']); ?>

        <div class="form-body">


          <div class="form-group">
            <label class="control-label col-md-3">Nome Completo</label>
            <div class="col-md-9">
              <?= $this->Form->input("full_name", ['label' => false, 'div' => false, 'class' => 'form-control']); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">E-mail</label>
            <div class="col-md-9">
              <?= $this->Form->input("username", ['label' => false, 'div' => false, 'class' => 'form-control', 'disabled' => true]); ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Senha</label>
            <div class="col-md-9">
              <?= $this->Form->input("password", ['label' => false, 'div' => false, 'class' => 'form-control', 'value' => '']); ?>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3">Telefone</label>
            <div class="col-md-9">
              <?= $this->Form->input("phone", ['label' => false, 'div' => false, 'class' => 'form-control']); ?>
            </div>
          </div>


        </div>

        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn green">
                <i class="fa fa-pencil"></i> Salvar
              </button>
            </div>
          </div>
        </div>

        <?= $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
