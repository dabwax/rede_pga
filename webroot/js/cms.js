angular.module("RedePga")

.controller("NovoGraficoCtrl", ["$scope", "$http", "$filter", "$timeout", function($scope, $http, $filter, $timeout) {
	$scope.emptyChart = {
		title: {
			text: "Exemplo"
		},
		subtitle: {
			text: "Subtítulo aqui"
		},
		options: {
			date_start: "01/01/" + $filter('date')(new Date(), 'yyyy'),
			date_finish: $filter('date')(new Date(), 'dd/MM/yyyy'),
			format: "mensal",
			chart: {
				type: "line"
			}
		},
		series: [
			{
				"name": "Dados de exemplo - preencha o cadastro corretamente",
				"type": "line",
	      		"data": [
			        1,
			        2,
			        4,
			        7,
			        3
		      	],
	      		"id": "series-0",
	      		"color": "#CFC000"
	  		}
		],
		xAxis: {

		}
	};

	// Observador do campo de formato
	$scope.$watch("emptyChart.options.format", function (newValue, oldValue) {
		$timeout(function() {
			if(newValue == "mensal") {
				$scope.emptyChart.xAxis.categories = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
			} else {
				$scope.emptyChart.xAxis.categories = null;
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
	$scope.trocou = function() {
		// Busca cálculo
		$http({
			method: "POST",
			url: baseUrl + "cms/api/materias_disponiveis"
		}).then(function sucess(response) {
			$scope.materias = response.data;
		}, function error(response) {

		});
	}

	// Função chamada quando é adicionado uma nova série
	$scope.adicionar = function() {
		$scope.emptyChart.series.push({
			"name": "Dados de exemplo - preencha o cadastro corretamento",
			"type": "line",
      		"data": [
		        Math.floor((Math.random() * 10) + 1),
		        Math.floor((Math.random() * 10) + 1),
		        Math.floor((Math.random() * 10) + 1),
		        Math.floor((Math.random() * 10) + 1),
		        Math.floor((Math.random() * 10) + 1)
	      	],
      		"id": "series-" + $scope.emptyChart.series.length + 1,
      		"color": "#CFC000"
  		});
	}

}]);