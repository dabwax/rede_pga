<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-pencil"></i> Exercícios', '/exercicios', ['escape' => false]); ?>

<div class="row" ng-controller="ExerciciosCtrl" ng-init='admin_logged = <?php echo json_encode($admin_logged, true); ?>'>

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

	<div ng-class="{'col-xs-6 col-lg-5': janela_expandida, 'col-xs-8 col-lg-8 col-lg-offset-2': !janela_expandida}">
		
		<ul id="mensagens" slimscroll>
			<li ng-repeat="exercicio in exercicios | filter:search:strict">
				<a href="javascript:;" ng-click="selecionar_mensagem(exercicio)" ng-class="{ativo: mensagem_selecionada.id == exercicio.id}">
					<p class="date">{{exercicio.date}}</p>
					<p class="subject">{{exercicio.name}}</p>
					 <span class="label label-default">{{exercicio.theme.name}}</span> <span class="label label-warning">{{exercicio.due_to}}</span>
					<span class="arrow"><i class="fa fa-angle-right"></i></span>
				</a>
			</li>
		</ul>

	</div>
	<div ng-class="{'col-xs-6 col-lg-7': janela_expandida}">

		<div id="visao-mensagem" ng-if="mensagem_selecionada">

			<a href="javascript:;" class="btn-fechar-mensagem" ng-click="fechar()"><i class="fa fa-times-circle"></i></a>

			<h2 class="subject">Enunciado: {{mensagem_selecionada.name}}</h2>
			
			<div class="form-group">
				<h4>Observação:</h4>
				{{mensagem_selecionada.observation}}
			</div>

			<div class="clearfix"></div>

			<div class="form-group" ng-if="mensagem_selecionada.attachment">
				<a href="<?php echo $this->Url->build('/exercicios/download/') ?>{{mensagem_selecionada.id}}" class="btn btn-primary">Fazer Download do Anexo</a>
			</div>

			<div class="form-group" ng-if="mensagem_selecionada.user_answer_content">
				<h4>Resposta do aluno:</h4>
				{{mensagem_selecionada.user_answer_content}}
			</div>

			<div class="form-group" ng-if="mensagem_selecionada.user_answer_attachment">
				<a href="<?php echo $this->Url->build('/exercicios/download_user/') ?>{{mensagem_selecionada.id}}" class="btn btn-primary">Fazer Download do Anexo do Estudante</a>
			</div>

			<hr>

			<div class="alert alert-success" ng-if="resposta_enviada">
				<p>Sua resposta foi enviada com sucesso! :) A página vai recarregar em {{segundos_restantes}} segundos.</p>
			</div>

			<div ng-if="admin_logged.clinical_condition">
			<form ng-if="!resposta_enviada" ng-submit="upload(mensagem_selecionada.id, '<?php echo $admin_logged['user_id'] ?>')">

				<div class="form-group">
					<textarea ng-model="resposta.content" required="required" placeholder="Sua resposta" rows="5" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label>Anexar arquivo</label>

					<div class="btn btn-primary btn-block btn-lg" ngf-select ngf-drop ng-model="resposta.attachment">Selecionar (ou arraste aqui)</div>

				</div>

				<div class="form-group">
					<strong>Você não poderá responder novamente. Tenha cautela!</strong>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-success">Responder</button>
				</div>

				<div class="progress" ng-if="carregando">
				  <div class="progress-bar" role="progressbar" aria-valuenow="{{carregando_porcentagem}}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
				    {{carregando_porcentagem}}%
				  </div>
				</div>


			</form>
			</div>

			
		</div> <!-- #visao-mensagem -->
	</div>
</div>