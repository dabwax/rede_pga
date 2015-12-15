angular.module("RedePga")

.controller('ConfigurarAtoresCtrl', ['$scope', function($scope) {

  $scope.actor = {
    model: "Protectors"
  };

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

    if(model == "Tutors")
    {
      $scope.actor.role = "tutor";
    }

    if(model == "Therapists")
    {
      $scope.actor.role = "therapist";
    }
  };

  $scope.set_actor = function(obj, model) {
    
    obj.model = model;

    obj.instituition_id = $scope.instituitions[obj.instituition_id];

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
}])

.controller('FeedCtrl', ['$scope', function($scope) {
  $scope.reset_search = function()
  {
    $scope.search.$ = '';
  };
}])
.controller('ExerciciosCtrl', ['$scope', '$http', '$timeout', '$interval', 'Exercicios', 'Upload', function($scope, $http, $timeout, $interval, Exercicios, Upload) {
  
  Exercicios.fetch_all().then(function(result) {
    $scope.exercicios = result.data;
  }, function() {
    alert("Ocorreu um erro ao carregar os exercícios do site!");
  });

  // init
  $scope.janela_expandida = false;
  $scope.mensagem_selecionada = false;
  $scope.resposta_enviada = false;
  $scope.mensagem_enviada = false;
  $scope.mostrar_formulario_nova_mensagem = false;
  $scope.resposta = {};
  $scope.carregando = false;
  $scope.carregando_porcentagem = 0;

  $scope.reset_search = function()
  {
    $scope.search.$ = '';
    $scope.fechar();
  };

  $scope.fechar = function()
  {
    $scope.janela_expandida = false;
    $scope.mensagem_selecionada = false;
    $scope.mostrar_formulario_nova_mensagem = false;
  };

  $scope.selecionar_mensagem = function(mensagem)
  {
    $scope.janela_expandida = true;
    $scope.mensagem_selecionada = ($scope.mensagem_selecionada != mensagem) ? mensagem : false;
  };

  $scope.upload = function (id, user_id) {

    $scope.carregando = true;
    $scope.carregando_porcentagem = 1;
    $scope.resposta.id = id;
    $scope.resposta.user_id = user_id;

    Exercicios.add_reply($scope.resposta).then(function(result)
    {

      $scope.resposta_enviada = true;
      $scope.segundos_restantes = 3;

      $interval(function() {
        if($scope.segundos_restantes > 0)
        {
          $scope.segundos_restantes = $scope.segundos_restantes - 1;
        } else {
          window.location.reload();
        }
      }, 1000);

    }, function(result)
    {
      alert("Aconteceu um erro ao ser enviado a resposta. Tente novamente.");
    }, function(result)
    {
        var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);

        $scope.carregando_porcentagem = progressPercentage;
    });
  };

}])

.controller('BatePapoCtrl', ['$scope', '$http', '$timeout', '$interval', 'Mensagens', function($scope, $http, $timeout, $interval, Mensagens) {
  
  Mensagens.fetch_all().then(function(result) {
    $scope.mensagens = result.data;
  }, function() {
    alert("Ocorreu um erro ao carregar as mensagens do site!");
  });

  // init
  $scope.janela_expandida = false;
  $scope.mensagem_selecionada = false;
  $scope.resposta_enviada = false;
  $scope.mensagem_enviada = false;
  $scope.mostrar_formulario_nova_mensagem = false;

  $scope.reset_search = function()
  {
    $scope.search.$ = '';
    $scope.fechar();
  };

  $scope.enviar_nova_mensagem = function(mensagem, model_role, model_id, model_name)
  {

    mensagem = {
      to: mensagem.to,
      model: model_role,
      model_id: model_id,
      author: model_name,
      content: mensagem.content,
      name: mensagem.name
    };

    Mensagens.add_message(mensagem).then(function(result) {

      $scope.mensagem_enviada = true;
      $scope.segundos_restantes = 3;

      $interval(function() {
        if($scope.segundos_restantes > 0)
        {
          $scope.segundos_restantes = $scope.segundos_restantes - 1;
        } else {
          window.location.reload();
        }
      }, 1000);
    }, function() {

      alert("Não foi possível incluir a mensagem!");
    });
    
  };

  $scope.btn_nova_mensagem = function()
  {
    $scope.janela_expandida = true;
    $scope.mensagem_selecionada = false;
    $scope.mostrar_formulario_nova_mensagem = true;
  };

  $scope.enviar_resposta = function(resposta, mensagem_id, model, model_id, model_name)
  {
    resposta = {
      content: resposta.content,
      model: model,
      model_id: model_id,
      message_id: mensagem_id,
      author: model_name
    };

    $scope.mensagem_selecionada.replies.push(resposta);

    Mensagens.add_reply(resposta).then(function(result) {

      $scope.resposta_enviada = true;

      $scope.segundos_restantes = 3;

      $interval(function() {
        if($scope.segundos_restantes > 0)
        {
          $scope.segundos_restantes = $scope.segundos_restantes - 1;
        } else {
          window.location.reload();
        }
      }, 1000);

    }, function() {
      alert("Não foi possível salvar a sua resposta");
    })
  };


  $scope.fechar = function()
  {
    $scope.janela_expandida = false;
    $scope.mensagem_selecionada = false;
    $scope.mostrar_formulario_nova_mensagem = false;
  };

  $scope.selecionar_mensagem = function(mensagem)
  {
    $scope.janela_expandida = true;
    $scope.mensagem_selecionada = ($scope.mensagem_selecionada != mensagem) ? mensagem : false;
  };

}])

.controller('ListarRegistrosCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.filtro = {
    ano: null,
    mes: null,
    aula: null
  };

  $scope.meses = [
    {nome: 'Janeiro', registros: 0, numero: 01},
    {nome: 'Fevereiro', registros: 0, numero: 02},
    {nome: 'Março', registros: 0, numero: 03},
    {nome: 'Abril', registros: 0, numero: 04},
    {nome: 'Maio', registros: 0, numero: 05},
    {nome: 'Junho', registros: 0, numero: 06},
    {nome: 'Julho', registros: 0, numero: 07},
    {nome: 'Agosto', registros: 0, numero: 08},
    {nome: 'Setembro', registros: 0, numero: 09},
    {nome: 'Outubro', registros: 0, numero: 10},
    {nome: 'Novembro', registros: 0, numero: 11},
    {nome: 'Dezembro', registros: 0, numero: 12}
  ];
  $scope.meses_registros = [];

  $scope.aulas = [];

  $http.post(baseUrl + "registros/api_registros_por_ano").then(function(result) {

      $scope.aulas = result.data.lessons;
      $scope.meses_registros = result.data.meses;

  });

  $scope.reset_search = function()
  {
    $scope.search.$ = '';
    
    $scope.voltarParaAulas();
  };

  $scope.selecionarAula = function(aula)
  {

      $scope.filtro.aula = aula;

      console.log(aula.lesson_themes[0].observation);

    $("#listagem-aulas").slideUp(500, function() {

      $("#listagem-detalhes").slideDown(500);
    });
  }

  $scope.mudarAno = function()
  {
    $("#listagem-detalhes,#listagem-aulas,#listagem-meses").slideUp(500, function() {
      $scope.filtro.aula = null;
      $scope.filtro.mes = null;

      $("#listagem-meses").slideDown(500);
    });
  };

  $scope.getTotalRegistros = function(mes)
  {

    var retorno = 0;

    angular.forEach($scope.meses_registros, function(value, key) {
      if(key == mes)
      {
        retorno = value;
      }
    });

    return retorno;
  };

  $scope.selecionarMes = function(mes)
  {
    $scope.filtro.mes = mes;

    $("#listagem-meses").slideUp(500, function() {
      $("#listagem-aulas").slideDown(500);
    });
  };

  $scope.voltarParaMeses = function()
  {
    $("#listagem-detalhes,#listagem-aulas").slideUp(500, function() {
      $scope.filtro.aula = null;
      $scope.filtro.mes = null;

      $("#listagem-meses").slideDown(500);
    });
  };

  $scope.voltarParaAulas = function()
  {
    $("#listagem-detalhes").slideUp(500, function() {
      $scope.filtro.aula = null;

      $("#listagem-aulas").slideDown(500);
    });
  };

}])

.controller('EditarRegistroCtrl', ['$scope', 'Inputs', function($scope, Inputs) {
  $scope.registros = [];

  $scope.lesson_id = angular.element("#registros-container").data("id");

  Inputs.fetch_all($scope.lesson_id).then(function(result) {
    $scope.registros = result.data.registros;
    $scope.campos = result.data.campos;
  });

}])

.controller('EvolucaoCtrl', ['$scope', function($scope) {
  
}])

.controller('AdicionarRegistrosCtrl', ['$scope', function($scope) {
}])

.controller('AuthenticationController', ['$scope', function($scope) {
  $scope.roleChecked = false;
  $scope.roles = {
    'tutors.tutor' : 'Tutor(a)',
    'schools.mediator' : 'Mediador(a)',
    'schools.coordinator' : 'Coordenador(a)',
    'protectors.dad' : 'Pai',
    'protectors.mom' : 'Mãe',
    'therapists.therapist' : 'Terapeuta',
    'users.user' : 'Aluno(a)',
  };
  $scope.roles_icons = {
    'tutors.tutor' : 'graduation-cap',
    'schools.mediator' : 'users',
    'schools.coordinator' : 'building',
    'protectors.dad' : 'male',
    'protectors.mom' : 'female',
    'therapists.therapist' : 'user-md',
    'users.user' : 'user',
  };

    $scope.setRole = function($role)
    {
      $scope.roleChecked = $role;
    }

    $scope.getRole = function()
    {
      return $scope.roles[$scope.roleChecked];
    }

    $scope.getRoleIcon = function()
    {
      return $scope.roles_icons[$scope.roleChecked];
    }

    $scope.clear = function()
    {
      $scope.roleChecked = false;
    }
}])

.controller("CmsInputCtrl", ['$scope', function($scope) {

  $scope.$watch("input.type", function(newValue) {
    if(newValue == 'escala_texto')
    {
      if($scope.input.config == undefined)
      {
        $scope.input.config = {options: ['Preencha com um nome']};
      }
    }
  });
}])

.controller("CmsChartsCtrl", ['$scope', function($scope) {


  $scope.$watch("chart", function(newValue) {

    if(newValue.chart_inputs.length == 0)
    {
      $scope.chart.chart_inputs = [""];
    }
  });

}])