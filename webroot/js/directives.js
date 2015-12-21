angular.module('RedePga')

.directive('shortcut', function() {
  return {
    restrict: 'E',
    replace: true,
    scope: true,
    link:    function postLink(scope, iElement, iAttrs){
      jQuery(document).on('keypress', function(e){
         scope.$apply(scope.keyPressed(e));
       });
    }
  };
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

.directive('selectTwo', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).select2();
    }
  }
})

.directive('slimscroll', function() {
  return {
    link: function(scope, elem, attrs)
    {
      $(elem).slimScroll({
        height: '480px',
        alwaysVisible: true,
        railVisible: true,
        position: "right"
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

.directive('datepicker', function() {
   return function(scope, element, attrs) {

      $.datepicker.regional[ "pt-BR" ] = {
      closeText: "Fechar",
      prevText: "&#x3C;Anterior",
      nextText: "Próximo&#x3E;",
      currentText: "Hoje",
      monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
      "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
      monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
      "Jul","Ago","Set","Out","Nov","Dez" ],
      dayNames: [ "Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado" ],
      dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
      dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
      weekHeader: "Sm",
      dateFormat: "dd/mm/yy",
      firstDay: 0,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: "" };
      $.datepicker.setDefaults( $.datepicker.regional[ "pt-BR" ] );

       $(element).datepicker({
           inline: true,
           dateFormat: 'dd/mm/yy',
           changeMonth: true,
           changeYear: true,
           yearRange : 'c-65:c+10'
       });
   }
})