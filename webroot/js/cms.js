angular.module("RedePga")

.controller("FormularioEdicaoUsuario", ["$scope", function($scope) {

}])
.controller('AdminInputsCtrl', ['$scope', '$http', function($scope, $http) {

  $scope.sortableOptions = {
    stop: function(e, ui) {
      var data = $(this).sortable('serialize');

      console.log(data);

      $http.get(baseUrl + "cms/inputs/sortable?" + data).then(function(result) {


      });

    }
  };

}])
.controller('AdminChartsCtrl', ['$scope', '$http', function($scope, $http) {

  $scope.sortableOptions = {
    stop: function(e, ui) {
      var data = $(this).sortable('serialize');

      console.log(data);

      $http.get(baseUrl + "cms/charts/sortable?" + data).then(function(result) {


      });

    }
  };

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
		$scope.user_id = $("#card-grafico").data("user_id");

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

		var materia = 0;

		if($scope.emptyChart.series[key].theme_id != undefined) {
			materia = $scope.emptyChart.series[key].theme_id;
		}

		// Busca cálculo
		var dados = {
			formato: $scope.emptyChart.format,
			tipo: $scope.emptyChart.series[key].type,
			materia: materia,
			input: $scope.emptyChart.series[key].input_id,
			user_id: $scope.user_id
		};
		$http.get(baseUrl + "cms/api/calcular_serie/" + dados.user_id  + "/" +  dados.input + "/" + dados.formato + "/" + dados.materia).then(function sucess(response) {

			$scope.emptyChart.series[key].data = response.data.data;

			if(response.data.type == "text") {
				$scope.emptyChart.series[key].type = "pie";
			}

		}, function error(response) {

		});

	}

	// Função chamada quando é adicionado uma nova série
	$scope.adicionar = function() {


		var clonado = {
			id: Math.floor((Math.random() * 10000) + 1),
			name: 'Exemplo ' + Math.floor((Math.random() * 10000) + 1),
			color: '#446CB3',
			type: 'line'
		};

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
