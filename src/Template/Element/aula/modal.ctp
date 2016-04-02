<!-- Modal Structure -->
<div id="modal{{lesson.id}}" class="modal modal-fixed-footer" ng-repeat="lesson in lessons | filter:search:strict">
	<div class="modal-content">
		<h4>{{lesson.date_d}} de {{lesson.date | date: 'MMMM'}} de {{lesson.date | date: 'y'}}</h4>

		<div class="card-panel red white-text" ng-if="!lesson.formatted_data">Não há dados de atores nesta aula ainda. Aproveite e inclua alguns dados! <a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}">Clique aqui</a></div>

		<ul class="collection">

		<li class="collection-item" ng-if="lesson.formatted_data">

		<strong>Atores</strong>
		
		<div class="clearfix"></div>

		<!-- Listagem de atores participantes -->
		<a href="javascript:;" title="Clique para ver as entradas dele(a)" ng-click="mostrarDados(lesson.actors[author_id].role)" class="chip" ng-repeat="(author_id, entries) in lesson.formatted_data" ng-class="{'grey darken-3 white-text selected': mostrar == lesson.actors[author_id].role}">
			<span class="cargo indigo lighten-5" ng-class="{'deep-orange darken-3': mostrar == lesson.actors[author_id].role}">
				{{role_helper(lesson.actors[author_id].role)}}
			</span>
			{{lesson.actors[author_id].full_name }}
		</a> <!-- .chip -->

		<div class="dados-ator" ng-if="mostrar == lesson.actors[author_id].role" class="dados-{{lesson.actors[author_id].role}}" ng-repeat="(author_id, entries) in lesson.formatted_data">

			<div class="col s6" ng-repeat="entry in entries">

				<div style="border: 1px solid #CCC; border-collapse: collapse; padding: 10px; margin-bottom: 10px;">

					<strong>{{entry.input.name}}</strong>

					<p>{{entry.value}}</p>
				</div>

			</div>

			<div class="clearfix"></div>

		</div> <!-- .dados-ator -->

		</li>

		<!-- Hashtags -->
		<li class="collection-item" ng-if="lesson.lesson_hashtags.length > 0">

			<strong>Hashtags</strong>
			<div class="clearfix"></div>

			<a href="<?php echo $this->Url->build('/feed/') ?>?hashtag_id={{entries.hashtag.id}}" class="chip chip-hashtag grey lighten-3" title="Clique para filtrar pela hashtag" ng-repeat="(id, entries) in lesson.lesson_hashtags">
				#{{entries.hashtag.name }}
			</a> <!-- .chip -->

		</li>

		<!-- Matérias -->
		<li class="collection-item" ng-if="lesson.lesson_themes.length > 0">

			<strong>Matérias</strong>

			<div class="clearfix"></div>

			<a href="javascript:;" class="chip chip-hashtag grey lighten-3" ng-click="mostrarMateria(entries.theme_id)" title="Clique para ver as informações sobre a matéria" ng-repeat="(id, entries) in lesson.lesson_themes" ng-class="{'grey darken-3 white-text selected': materiaAtual == entries.theme_id}">
				{{entries.theme.name }}
			</a> <!-- .chip -->

			<div class="dados-materia" ng-if="materiaAtual == entries.theme_id" ng-repeat="(id, entries) in lesson.lesson_themes">

				<div class="col s6" ng-if="entries.observation">

					<div style="border: 1px solid #CCC; border-collapse: collapse; padding: 10px; margin-bottom: 10px;">
						<strong>Observação</strong> <div class="clearfix"></div> {{entries.observation}}
					</div>
				</div>

				<div class="col s6" ng-if="entries.nota_esperada">

					<div style="border: 1px solid #CCC; border-collapse: collapse; padding: 10px; margin-bottom: 10px;">
						<strong>Nota Esperada</strong> <div class="clearfix"></div> {{entries.nota_esperada}}
					</div>
				</div>

				<div class="col s6" ng-if="entries.nota_alcancada">

					<div style="border: 1px solid #CCC; border-collapse: collapse; padding: 10px; margin-bottom: 10px;">
						<strong>Nota Alcançada</strong> <div class="clearfix"></div> {{entries.nota_alcancada}}
					</div>
				</div>

				<div class="clearfix"></div>

			</div> <!-- .dados-materia -->

		</li>

	    </ul>

	</div>

	<div class="modal-footer">
	  <a href="<?php echo $this->Url->build(['controller' => 'registros', 'action' => 'editar']); ?>/{{lesson.id}}" class="modal-action modal-close waves-effect waves-green btn-flat">Adicionar novas informações a esta aula</a>
	  <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
	</div>
</div> <!-- #modal -->