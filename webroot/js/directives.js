angular.module('RedePga')
.directive('materializeSelect', function() {
  return {
    link: function(scope, elem, attrs) {
      $(elem).material_select();
    }
  }
})
.directive('filtrarGrafico', function() {
  return {
    link: function(scope, elem, attrs) {

      $(elem).click(function() {

        $(".btn-filtro").removeClass("green");
        $(this).addClass("green");
        var chartsRelated = $(elem).data("charts-related");

        $(".graficoHighchart").stop().fadeOut("fast", function() {

          if(chartsRelated.length > 0) {
            for(var i = 0; i < chartsRelated.length; i++) {
              $(".grafico" + chartsRelated[i]).stop().fadeIn("slow");
            }
          }
        });

      });
    }
  }
})
.directive('expandirTimeline', function() {

  return {
    link: function(scope, elem, attrs) {
      $(elem).click(function() {
        $(this).fadeOut('fast', function() {
          $(this).parent().css('height', 'auto');
        });
      });
    }
  }
})

.directive('loading', ['$http', function ($http) {
    return {
      restrict: 'A',
      link: function (scope, element, attrs) {
        scope.isLoading = function () {
          return $http.pendingRequests.length > 0;
        };
        scope.$watch(scope.isLoading, function (value) {
          if (value) {
            element.removeClass('ng-hide');
          } else {
            element.addClass('ng-hide');
          }
        });
      }
    };
}])

.directive('modal', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).click(function() {

        var href = $(elem).data("id");

        $("#modal" + href).openModal();
      });
    }
  }
})

.directive('datepicker', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).datepicker({
        dateFormat: "dd/mm/yy"
      });
    }
  }
})

.directive('editor', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).trumbowyg({
        btns: ['formatting', 'btnGrp-semantic', 'link', 'btnGrp-justify', 'btnGrp-lists']
      });
    }
  }
})

.directive('tabs', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).tabs();
    }
  }
})

.directive('selectAluno', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).change(function() {

        $(this).parent().submit();
      });
    }
  }
})

.directive('escolherCampo', function() {
  return {
    link: function(scope, element, attrs)
    {

      // evento de mudar o select
      element.bind('change', function() {
        // recupera o type do option selecionado
        var type = element.find(":selected").data('type');
        var config = element.find(":selected").data('config');

        // recupera o indice do registro atual
        var indice = attrs.indice;

        // Troca o type do índice selecionado
        scope.registros[indice].type = type;

        // Se o input tiver config, coloca ela tb
        if(type == "escala_numerica")
        {
          scope.registros[indice].value = config.min;
          scope.registros[indice].config = config;
        } else if(type == "escala_texto") {
          scope.registros[indice].value = config.options[0];
          scope.registros[indice].config = config;
        } else {
            scope.registros[indice].value = null;
        }
        scope.$apply();
      });

    }
  };
})
