angular.module("RedePga")

.controller('TrocarSenhaCtrl', ['$scope', function($scope) {

  $scope.formValido = false;

  $scope.$watch("user.confirm_new_password", function(newValue) {

    if(newValue == $scope.user.new_password) {
      $scope.formValido = true;
    } else {
      $scope.formValido = false;
    }
  });
}])

.controller('ApplicationCtrl', ['$scope', '$http', function($scope, $http) {

  $scope.usuarioAtual = function(campo) {

    if(campo == 'tipoDeAtor') {
      var roles = {
         "dad": "Pai"
        ,"mom": "Mãe"
        ,"tutor": "Tutor"
        ,"therapist": "Terap."
        ,"mediator": "Mediad."
        ,"coordinator": "Coord."
        ,"user": "Est."
      };

      return roles[$scope.usuarioLogado['role']];
    } else {
      return $scope.usuarioLogado[campo];
    }
    // if(campo == 'tipoDeAtor') {
    //   return $scope.userLogged[campo];
    // } else {
    //   return $scope.userLogged[campo];
    // }
  }

}])

.controller('FeedCtrl', ['$scope', 'Feed', '$window', '$timeout', function($scope, Feed, $window, $timeout) {

  $scope.lessons = [];

  Feed.fetch_all($window.location.search).then(function(result) {
    //console.log(result.data);
    $scope.lessons = result.data;

  }, function() {
    alert("Ocorreu um erro ao carregar os exercícios do site!");
  });

  $scope.reset_search = function()
  {
    $scope.search.$ = '';
  };

  $scope.role_helper = function(role)
  {

    var roles = {
       "dad": "Pai"
      ,"mom": "Mãe"
      ,"tutor": "Tutor"
      ,"therapist": "Terap."
      ,"mediator": "Mediad."
      ,"coordinator": "Coord."
      ,"user": "Est."
    };

    return roles[role];
  }

  $scope.materiaAtual = false;

  $scope.mostrarMateria = function(theme_id) {

    if($scope.materiaAtual == false) {
      $scope.materiaAtual = theme_id;
    } else {
      $scope.materiaAtual = false;
    }
  }

  $scope.mostrarDados = function(role, actors) {


      if(role != null) {
        $scope.mostrar = role;
      } else {
        if(actors.length > 0) {
          first = actors[Object.keys(actors)[0]];
          $scope.mostrar = first.role;
        }
      }
  }
}])

.controller('TimelineCtrl', ['$scope', 'Feed', '$window', '$http', '$timeout', function($scope, Feed, $window, $http, $timeout) {

  $scope.lessons = [];

  $http.get(baseUrl + 'timeline/api').then(function(result) {
    //console.log(result.data);
    $scope.lessons = result.data;


    $timeout(function() {
      var card = $("#cd-timeline").data("card");

      if(card != "") {

        angular.forEach($scope.lessons, function(value) {
          var data_formatada = value.date_d + "/" + value.date_m + "/" + value.date_y;

          if(data_formatada == card) {
            $("#modal" + value.id).openModal();
          }
        });
      }
    });

  }, function() {
    alert("Ocorreu um erro ao carregar os exercícios do site!");
  });

  $scope.reset_search = function()
  {
    $scope.search.$ = '';
  };

  $scope.role_helper = function(role)
  {

    var roles = {
       "dad": "Pai"
      ,"mom": "Mãe"
      ,"tutor": "Tutor"
      ,"therapist": "Terap."
      ,"mediator": "Mediad."
      ,"coordinator": "Coord."
      ,"user": "Est."
    };

    return roles[role];
  }

  $scope.materiaAtual = false;

  $scope.mostrarMateria = function(theme_id) {

    if($scope.materiaAtual == false) {
      $scope.materiaAtual = theme_id;
    } else {
      $scope.materiaAtual = false;
    }
  }

  $scope.mostrarDados = function(role, actors) {


      if(role != null) {
        $scope.mostrar = role;
      } else {
        if(actors.length > 0) {
          first = actors[Object.keys(actors)[0]];
          $scope.mostrar = first.role;
        }
      }
  }
}])
.controller('ExerciciosCtrl', ['$scope', '$http', '$timeout', '$interval', 'Exercicios', 'Upload', function($scope, $http, $timeout, $interval, Exercicios, Upload) {

  // NOVO
  $scope.mensagens = [];
  $scope.mensagem = {};

  $scope.carregarMensagens = function() {
    Exercicios.fetch_all().then(function(result) {
      $scope.mensagens = result.data;
    }, function() {
      alert("Ocorreu um erro ao carregar os exercícios do site!");
    });
  }

  $scope.enviar = function(mensagem) {
    Exercicios.send(mensagem, $scope.usuarioLogado).success(function(result) {
      $scope.carregarMensagens();
      $scope.fechar();
      Materialize.toast('Seu exercício foi enviado com sucesso!', 4000);
    });
  }

  $scope.fechar = function() {
    $('#modalnova').closeModal();
    $('#modalMensagem').closeModal();
  }

  $scope.visualizar = function(mensagem) {
    $scope.mensagem = mensagem;
    $('#modalMensagem').openModal();
    // Materialize.toast('Os participantes desta mensagem serão notificados por e-mail caso você responda.', 4000);
  }

  $scope.enviar_resposta = function(resposta, mensagem_id) {
    Exercicios.send_reply(resposta, mensagem_id, $scope.usuarioLogado).success(function(result) {
      $scope.resposta = {};

      $scope.carregarMensagens();
      $scope.fechar();

      Materialize.toast('Sua resposta foi enviada com sucesso!', 4000);
    });
  }

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

  $scope.carregarMensagens();

}])

.controller('BatePapoCtrl', ['$scope', '$http', '$timeout', '$interval', 'Mensagens', function($scope, $http, $timeout, $interval, Mensagens) {

  $scope.mensagens = [];
  $scope.mensagem = {};

  $scope.carregarMensagens = function() {
    Mensagens.fetch_all().success(function(result) {
      $scope.mensagens = result;
    });
  }

  $scope.enviar = function(mensagem) {
    Mensagens.send(mensagem, $scope.usuarioLogado).success(function(result) {
      $scope.carregarMensagens();
      $scope.fechar();
      Materialize.toast('Sua mensagem foi enviada com sucesso!', 4000);
    });
  }

  $scope.fechar = function() {
    $('#modalnova').closeModal();
    $('#modalMensagem').closeModal();
  }

  $scope.visualizar = function(mensagem) {
    $scope.mensagem = mensagem;
    $('#modalMensagem').openModal();
    // Materialize.toast('Os participantes desta mensagem serão notificados por e-mail caso você responda.', 4000);
  }

  $scope.enviar_resposta = function(resposta, mensagem_id) {
    Mensagens.send_reply(resposta, mensagem_id, $scope.usuarioLogado).success(function(result) {
      $scope.resposta = {};

      $scope.carregarMensagens();
      $scope.fechar();

      Materialize.toast('Sua resposta foi enviada com sucesso!', 4000);
    });
  }

  $scope.carregarMensagens();

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

.controller('EditarRegistroCtrl', ['$scope', 'Inputs', '$timeout', function($scope, Inputs, $timeout) {
  $scope.registros = [];
  $scope.avancar = true;

  $scope.loadItems = function($query) {

    console.log($("#registros-container").data("hashtags-disponiveis"));

    return $("#registros-container").data("hashtags-disponiveis");
  }

  $scope.init = function() {

    $scope.hashtags = $("#registros-container").data('hashtags');
    $scope.materias = $("#registros-container").data('materias');
    $scope.admin_logged = $("#registros-container").data('admin-logged');
    $scope.lesson_id = $("#registros-container").data('lesson-id');

    Inputs.fetch_all($scope.lesson_id).then(function(result) {
      $scope.registros = result.data.registros;
      $scope.campos = result.data.campos;
    });
  };

  $scope.mudouData = function(data) {
    Inputs.validar_data(data).then(function(result) {

      if(result.data.status == "INDISPONÍVEL") {
        $scope.avancar = false;
      } else {
        $scope.avancar = true;
      }

      Materialize.toast(result.data.message, 10000);

    });
  };

  $scope.init();

}])

.controller('EvolucaoCtrl', ['$scope', '$filter', function($scope, $filter) {

  $scope.graficos = [];

  $("div.grafico").each(function() {
    var dados = $(this).data("dados");

    dados.options.plotOptions.series.point = {
      events: {
        click: function() {

          var str = this.name;
          var m = str.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);

          if(m) {
            var url = baseUrl + "timeline?card=" + str;
            var win = window.open(url, '_blank');
            win.focus();
          }
        }
      }
    };

    console.log(dados);

    $scope.graficos.push(dados);
  });
}])

.controller('AdicionarRegistrosCtrl', ['$scope', '$http', 'Inputs', function($scope, $http, Inputs) {

  $scope.avancar = false;

  $scope.mudouData = function(date) {

    Inputs.validar_data(date).then(function(result) {

      if(result.data.status == "INDISPONÍVEL") {
        $scope.avancar = false;
      } else {
        $scope.avancar = true;
      }

      Materialize.toast(result.data.message, 10000);

    });

  }
}])

.controller('AuthenticationController', ['$scope', function($scope) {

  // Materialize animation effects
  Materialize.showStaggeredList('#pep-lista-atores');
  Materialize.fadeInImage('img');

  $scope.showForgot = false;
  $scope.roleChecked = false;
  $scope.roles = {
    'tutors' : 'Tutor',
    'schools' : 'Escola (Coordenação / Professor / Mediador / Outros)',
    'protectors' : 'Família (Pai/Mãe/Outros)',
    'therapists' : 'Terapeuta',
    'users' : 'Aluno(a)',
  };
  $scope.roles_icons = {
    'tutors' : 'graduation-cap',
    'schools' : 'building',
    'protectors' : 'male',
    'therapists' : 'user-md',
    'users' : 'user'
  };

    $scope.setRole = function($role)
    {
      $scope.roleChecked = $role;
    }

    $scope.getRole = function()
    {
      if($scope.roles[$scope.roleChecked] == undefined) {
        return "Quem é você?";
      }

      return $scope.roles[$scope.roleChecked];
    }

    $scope.getRoleIcon = function()
    {
      return $scope.roles_icons[$scope.roleChecked];
    }

    $scope.clear = function()
    {
      $scope.roleChecked = false;
      $scope.showForgot = false;
    }

    $scope.forgot = function()
    {
      $scope.showForgot = true;
    }
}])

.controller("CmsInputCtrl", ['$scope', function($scope) {

  $scope.keyPressed = function(e) {

    // console.log(e.which);
    if(e.which == 2)
    {
      $scope.adicionar_mais();
    }
  };

  $scope.adicionar_mais = function() {
    $scope.input.config.options.push('');

    setTimeout(function() {
      $("textarea").last().focus();
    }, 0);
  }

  $scope.$watch("input.type", function(newValue) {
    if(newValue == 'escala_texto')
    {
      if($scope.input.config == undefined)
      {
        $scope.input.config = {options: ['']};
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
