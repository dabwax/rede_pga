<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-keyboard-o"></i>Inputs', '/registros/listar', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-keyboard-o"></i>Listar', '/registros/listar', ['escape' => false]); ?>

<?php echo $this->element("header_pagina", ["titulo" => "Inputs - Listar"]); ?>

<div class="row" ng-controller="ListarRegistrosCtrl" ng-init='admin_logged = <?php echo json_encode($admin_logged); ?>'>
	<div class="col-lg-12">
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
	</div> <!-- #listagem-busca -->
	
		<div class="clearfix">	</div>

		<div id="listagem-aulas">

			<div class="clearfix"></div>
			
			<div class="col-lg-4" ng-repeat="aula in aulas | filter:search:strict">
					
				<div class="well text-center">
					<a href="javascript:;" ng-click="selecionarAula(aula)" class="btn mes-item ativo">
						<h4 class="mes-nome">{{aula.dia}}</h4>
						<h4 class="mes-nome">{{aula.date}} <small style="position: absolute; right: 24px; top: 12px; color: #C3C3C3;">{{aula.year}}</small></h4>

						<span class="label label-success">Selecionar</span>
					</a>
				</div> <!-- .well -->

			</div> <!-- mes -->

		</div> <!-- #listagem-aulas -->


		<div id="listagem-detalhes" style="display: none;">
			
			<div class="col-lg-6">
					
				<div class="well text-center">
					<h3 class="mes-nome">{{filtro.aula.date}} <small>{{filtro.aula.dia}}</small></h3>
				</div> <!-- .well -->

			</div>

			<div class="col-lg-6">

				<div class="well text-center">
					<a href="javascript:;" ng-click="voltarParaAulas()" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Voltar</a>
					<a href="<?php echo $this->Url->build(['action' => 'editar']); ?>/{{filtro.aula.id}}" class="btn btn-success" ng-if="!admin_logged.clinical_condition"><i class="fa fa-pencil"></i> Editar</a>

					<div ng-if="!filtro.aula.lesson_entries.length">
						<a href="<?php echo $this->Url->build(['action' => 'editar']); ?>/{{filtro.aula.id}}" class="btn btn-success" ng-if="admin_logged.clinical_condition"><i class="fa fa-pencil"></i> Toque aqui para adicionar dados a esta aula</a>
					</div>
				</div>

			</div> <!-- detalhes -->

			<div class="clearfix"></div>

			<div class="col-lg-4" ng-repeat="registro in filtro.aula.lesson_entries">

				<div class="well">
					<strong>{{registro.input.name}} <small>{{registro.input.type}}</small></strong>

					<p>{{registro.value}}</p>
				</div>
			</div>

			<div class="clearfix"></div>
			
			<h2>Matérias</h2>
			
			<div ng-repeat="registro in filtro.aula.lesson_themes">

				<span class="label label-info"> {{registro.theme.name}} </span>
				
				<p style="margin-bottom: 20px;">
				<br>
				{{registro.observation}}
				</p>

				<p>
					<strong class="label label-success">Nota esperada</strong> <small>{{registro.nota_esperada}}</small>
				</p>
				
				<p>
					<strong class="label label-danger mt20">Nota alcançada</strong> <small>{{registro.nota_alcancada}}</small>
				</p>

			</div>

			<h2>Hashtags</h2>

			<a class="label label-info" href="<?php echo $this->Url->build('/feed/listar/'); ?>{{registro.hashtag.id}}" ng-repeat="registro in filtro.aula.lesson_hashtags">{{registro.hashtag.name}}</a>
			
		</div> <!-- #listagem-detalhes -->

	</div>
</div>
<?php echo $this->element("footer_pagina"); ?>