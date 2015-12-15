<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-comments"></i> Bate-papo', '/bate-papo', ['escape' => false]); ?>

<div class="row" ng-controller="BatePapoCtrl">

	<div class="col-lg-8 col-lg-offset-2">
		
		<div id="listagem-busca" class="form-group">
			<label>Buscar por palavra-chave</label>

			<div ng-class="{'input-group': search.$}">
				<input type="text" class="form-control input-icon" ng-model="search.$" placeholder="&#xF002; Pesquisar" />

				<span class="input-group-btn">
		        	<button class="btn btn-danger" ng-if="search.$" ng-click="reset_search()" type="button"><i class="fa fa-times"></i></button>
		      	</span>
	      	</div>
      	
		</div> <!-- #listagem-busca -->
		<hr>
	</div>

	<div class="clearfix">	</div>

	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3" style="margin-bottom: 20px;">
		<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-default">Enviar nova mensagem</a>
	</div>
	<div ng-class="{'col-xs-6 col-lg-5': janela_expandida, 'col-xs-8 col-lg-8 col-lg-offset-2': !janela_expandida}">
		
		<ul id="mensagens" slimscroll>
			<li ng-repeat="mensagem in mensagens | filter:search:strict">
				<a href="javascript:;" ng-click="selecionar_mensagem(mensagem)" ng-class="{ativo: mensagem_selecionada.id == mensagem.id}">
					<p class="from">{{mensagem.from}}</p>
					<p class="date">{{mensagem.date}}</p>
					<p class="subject">{{mensagem.name}}</p>
					<p class="excerpt">{{mensagem.excerpt}}</p>
					<span class="arrow"><i class="fa fa-angle-right"></i></span>
				</a>
			</li>
		</ul>

	</div>
	<div ng-class="{'col-xs-6 col-lg-7': janela_expandida}">

		<div id="visao-mensagem" ng-if="mensagem_selecionada">

			<a href="javascript:;" class="btn-fechar-mensagem" ng-click="fechar()"><i class="fa fa-times-circle"></i></a>

			<h2 class="subject">Assunto: {{mensagem_selecionada.name}}</h2>

			<h3 class="from">De: <span class="from label label-default">{{mensagem_selecionada.from}}</span></h3>

			<h3 class="from">Para: <span class="from label label-default" ng-repeat="autor in mensagem_selecionada.to">{{autor}}</span></h3>

			<hr />
			
			<h4>Mensagem:</h4>
			{{mensagem_selecionada.content}}

			<hr>

			<div class="well" ng-repeat="resposta in mensagem_selecionada.replies">
				<p>{{resposta.content}}</p>

				<strong>{{resposta.author}}</strong>
			</div>
			<hr>

			<div class="alert alert-success" ng-if="resposta_enviada">
				<p>Sua resposta foi enviada com sucesso! :) A página vai recarregar em {{segundos_restantes}} segundos.</p>
			</div>

			<form ng-if="!resposta_enviada" ng-submit="enviar_resposta(resposta, mensagem_selecionada.id, '<?php echo $admin_logged['role_table'] ?>', '<?php echo $admin_logged['id'] ?>', '<?php echo $admin_logged['full_name'] ?>')">

				<div class="form-group">
					<textarea ng-model="resposta.content" required="required" placeholder="Sua resposta" rows="5" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-success">Responder</button>
				</div>
			</form>

			
		</div> <!-- #visao-mensagem -->
	</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enviar nova mensagem</h4>
      </div>
      <div class="modal-body">

      		<div class="alert alert-success" ng-if="mensagem_enviada">
				<p>Sua mensagem foi enviada com sucesso! Atualizando a página em {{segundos_restantes}} segundos... :)</p>
			</div>

			<form ng-submit="enviar_nova_mensagem(nova_mensagem, '<?php echo $admin_logged['role_table'] ?>', '<?php echo $admin_logged['id'] ?>', '<?php echo $admin_logged['full_name'] ?>')" ng-if="!mensagem_enviada">
				<div class="form-group">
					<label>Para:</label>
					<div class="clearfix"></div>
					<select multiple ng-model="nova_mensagem.to" select-two style="width: 100%;">

						<?php foreach($atores as $model => $categoria_ator) : ?>
						<?php foreach($categoria_ator as $ator) : ?>
							<option value="<?php echo $ator->id; ?>_<?php echo $model; ?>"><?php echo $ator->full_name; ?></option>
						<?php endforeach; ?>
						<?php endforeach; ?>
					</select>	
				</div>
				<div class="form-group">
					<label>Assunto:</label>
					<input type="text" required="required" ng-model="nova_mensagem.name" class="form-control">
				</div>
				<div class="form-group">
					<label>Mensagem:</label>
					<textarea required="required" ng-model="nova_mensagem.content" cols="30" rows="10"  class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block">Enviar nova mensagem</button>
				</div>
				<div class="form-group">
        			<button type="button" class="btn btn-default btn-xs btn-block" data-dismiss="modal">Fechar</button>
				</div>
			</form>

      </div>
    </div>
  </div>
</div>

</div>
