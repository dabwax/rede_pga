angular.module("RedePga")

.controller("FormularioEdicaoUsuario", ["$scope", function($scope) {

}])

.controller("ConfigurarAtoresCtrl", ["$scope", "$http", "$filter", "$timeout", function($scope, $http, $filter, $timeout) {
	$scope.actor = {
    	model: "Protectors"
	};

	$scope.cancelarEdicao = function() {
		$scope.actor = {
	    	model: "Protectors"
		};
	}

	$scope.get_label = function(model) {

		var labels = {
		  "mediator": "Mediador",
		  "coordinator": "Coordenador",
		  "dad": "Pai",
		  "mom": "Mãe",
		  "therapist": "Terapeuta",
		  "tutor": "Tutor"
		};

		return labels[model];
	};

	$scope.set_model = function(model) {
		$scope.actor = {
			model: model
		}

		if(model == "Tutors") {
			$scope.actor.role = "tutor";
		}

		if(model == "Therapists") {
			$scope.actor.role = "therapist";
		}
	};

	$scope.set_actor = function(obj, model) {

		obj.model = model;

		obj.instituition_id = $scope.instituitions[obj.instituition_id];

		delete obj.password;

		$scope.actor = obj;
	};

	// Opening accordion based on URL
	var url = document.location.toString();

	if ( url.match('#') ) {
		var hash = url.split('#')[1];
		var model = hash.replace('c_', '');

		$scope.set_model(model);

		$('.panel-collapse').removeClass('in');
		$('#'+hash).addClass('in');
	}

	$(document).on("click", ".ui-tabs-anchor", function() {

		$timeout(function() {
			$scope.cancelarEdicao();
		});
	});
}])
.controller("NovoGraficoCtrl", ["$scope", "$http", "$filter", "$timeout", function($scope, $http, $filter, $timeout) {

	$scope.serieEmBranco = null;

	// Recupera os dados do gráfico
	$timeout(function() {
		var currentChart = $("#card-grafico").data("chart");

		if(currentChart != "undefined") {
			$scope.emptyChart = currentChart;

			// Faz bakup da serie em branco, para ser usado no botão de adicionar

			$scope.serieEmBranco = $scope.emptyChart.series[0];
		}
	});

	// Busca todos os inputs disponíveis
	$http({
		method: "GET",
		url: baseUrl + "cms/api/inputs_disponiveis"
	}).then(function sucess(response) {
		$scope.inputs = response.data;
	}, function error(response) {

	});

	// Busca todas as matérias disponíveis
	$http({
		method: "GET",
		url: baseUrl + "cms/api/materias_disponiveis"
	}).then(function sucess(response) {
		$scope.materias = response.data;
	}, function error(response) {

	});

	$scope.mudouGrafico = function() {
		$scope.emptyChart.series.forEach(function(value, key) {
			if(value.input_id) {
				$scope.trocou(key);
			}
		});
	};

	// Função chamada quando um input/matéria é definido
	$scope.trocou = function(key) {

		// Busca cálculo
		var dados = {
			grafico: {
				data_inicial: $scope.emptyChart.filter_start,
				data_final: $scope.emptyChart.filter_end,
				formato: $scope.emptyChart.format,
				tipo: $scope.emptyChart.series[key].type
			},
			materia: $scope.emptyChart.series[key].theme_id,
			input: $scope.emptyChart.series[key].input_id,
		};
		$http.post(baseUrl + "cms/api/calcular_serie", dados).then(function sucess(response) {

			$scope.emptyChart.options.xAxis.categories = response.data.eixo_x;
			$scope.emptyChart.series[key].data = response.data.serie;
						console.log($scope.emptyChart);

			// $scope.emptyChart.series[key].data = [];
		}, function error(response) {

		});

		console.log($scope.emptyChart.series[key].input_id);
	}

	// Função chamada quando é adicionado uma nova série
	$scope.adicionar = function() {


		var clonado = angular.copy($scope.serieEmBranco);

		clonado.name = $scope.serieEmBranco.name + Math.floor((Math.random() * 10000) + 1);
		clonado.id = $scope.serieEmBranco.id + Math.floor((Math.random() * 10000) + 1);

		$timeout(function() {

			$scope.emptyChart.series.push(clonado);
		});
	}

	// Função chamada quando é excluído uma série
	$scope.deletarSerie = function(key) {
		if(confirm('Voce tem certeza disto?')) {
			$scope.emptyChart.series.splice(key, 1);
		}

		return false;
	};

}]);
