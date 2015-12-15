<?php $this->Html->addCrumb('<i class="fa fa-home"></i>Home', '/', ['escape' => false]); ?>
<?php $this->Html->addCrumb('<i class="fa fa-line-chart"></i>Evolução', '/evolucao/listar', ['escape' => false]); ?>

<div class="row" ng-controller="EvolucaoCtrl" ng-init='charts = <?php echo json_encode($charts, true); ?>'>
	
	<div class="col-lg-12">
		<?php echo $this->Form->create(null, ['type' => 'GET']); ?>
			<div class="row">
				<div class="col-lg-5">
					<input type="text" name="start" class="form-control input-icon" placeholder="&#xF073; Data Início" datepicker value="<?php echo $this->request->query('start'); ?>" />
				</div>
				<div class="col-lg-5">
					<input type="text" name="finish" class="form-control input-icon" placeholder="&#xF073; Data Fim" datepicker value="<?php echo $this->request->query('finish'); ?>" />
				</div>
				<div class="col-lg-2">
					<input type="submit" class="btn btn-primary btn-block" value="OK" />
				</div>
			</div>
		<?php echo $this->Form->end(); ?>

		<?php if($filtering) : ?> 
			<hr />
			<div class="alert alert-info mt20">
				Total de <strong><?php echo count($lessons); ?></strong> aulas.
			</div>
		<?php endif; ?>

	</div>

	<div class="clearfix"></div>

	<div class="col-lg-6 text-center" ng-repeat="chart in charts" style="margin-top: 20px;">
		
		<h2>{{chart.name}}</h2>

		<div ng-if="chart.type == 'numero_absoluto'">
			<h3 ng-repeat="c_i in chart.chart_inputs">
				{{c_i.input.name}} 
				<small ng-repeat="(t_b_i, key) in chart.total_by_input" ng-if="t_b_i == c_i.input.name" style="font-weight: bold;">
				{{key}}</small>
			</h3>
			<p><strong>{{chart.total_lessons}}</strong> aulas</p>
		</div>

		<highchart id="chart{{chart.id}}" config="chart.front_end" ng-if="chart.type != 'numero_absoluto'"></highchart>
	</div>
</div>