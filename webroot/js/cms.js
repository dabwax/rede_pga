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
	$scope.emptyChart = {
  "options": {
    "chart": {
      "type": "areaspline"
    },
    "plotOptions": {
      "series": {
        "stacking": ""
      }
    },
		"xAxis": {
			"categories": []
		}
  },
  "series": [
    {
      "name": "Linha Exemplo",
			"color": "#AAAAAA",
      "data": [
        1,
        2,
        4,
        7,
        3
      ],
      "id": "series-0"
    }
  ],
  "title": {
    "text": "Hello"
  },
  "subtitle": {
    "text": "World"
  },
  "credits": {
    "enabled": true
  },
  "loading": false,
	"filter_start": "01/01/" + $filter('date')(new Date(), 'yyyy'),
	"filter_end": $filter('date')(new Date(), 'dd/MM/yyyy'),
	"format": "diario",
  "size": {}
};

	// Observador do campo de formato
	$scope.$watch("emptyChart.options.format", function (newValue, oldValue) {
		$timeout(function() {
			if(newValue == "mensal") {
				//$scope.emptyChart.xAxis.categories = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
			} else {
				//$scope.emptyChart.xAxis.categories = null;
			}
		});
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

	// Função chamada quando um input/matéria é definido
	$scope.trocou = function(key) {

		// Busca cálculo
		var dados = {
			grafico: {
				data_inicial: $scope.emptyChart.filter_start,
				data_final: $scope.emptyChart.filter_end,
				formato: $scope.emptyChart.format,
				tipo: $scope.emptyChart.options.chart.type
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
	}

	// Função chamada quando é adicionado uma nova série
	$scope.adicionar = function() {

		var ultima_serie = angular.copy($scope.emptyChart.series.slice(-1)[0]);
		delete ultima_serie.$$hashKey;

		ultima_serie.name = ultima_serie.name + "1";
		ultima_serie.id = ultima_serie.id + "1";

		$timeout(function() {

			$scope.emptyChart.series.push(ultima_serie);
		});
	}

}]);
