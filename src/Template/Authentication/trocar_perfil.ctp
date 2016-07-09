<div ng-controller="AuthenticationController" class="row">
  <div class="col s12 m6 l6 offset-l3 offset-m3">
    <div class="card blue-grey lighten-5">
      <div class="card-content center-align">

        <div class="clearfix"></div>
        <span class="card-title">Perfis disponíveis</span>

        <ul id="pep-lista-atores" class="collection">
            <?php foreach($atores as $ator) :  ?>
          <li class="collection-item">
            <div>

              <?php if(!empty($ator->role)) : ?>
              <?php echo $this->formatarCargo($ator->role); ?> de <?php echo $ator->user->full_name; ?>
            <?php else: ?>
              Entrar como aluno (<?php echo $ator->user->full_name; ?>)
            <?php endif; ?>

              <a href="<?php echo $this->Url->build(['action' => 'trocar_perfil', $ator->model, $ator->id]); ?>" class="secondary-content"> <i class="material-icons">send</i></a>
            </div>

          </li>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </div>
</div>
