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

    // console.log($scope.lesson_id);

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

    // console.log(dados);

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

  $scope.roleChecked = false;
  $scope.roles = {
    'tutors' : 'Tutor',
    'schools' : 'Escola (Coordenação/Professor/Mediador/Outros)',
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
