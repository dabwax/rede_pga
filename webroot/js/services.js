angular.module("RedePga")

.factory("Inputs", function($http, Upload) {

	return {
		fetch_all: function(id)
		{
			return $http.get(baseUrl + "registros/api_inputs/" + id);
		}
	};

})

.factory("Exercicios", function($http, Upload) {

	return {
		add_reply: function(resposta)
		{
			return Upload.upload({
		        url: baseUrl + 'exercicios/api_add_reply',
		        data: {anexo: resposta.attachment, resposta: resposta}
		    });
		},
		fetch_all: function()
		{
			return $http.get(baseUrl + "Exercicios/api_fetch_all");
		}
	};

})
.factory("Mensagens", function($http) {

	return {
		add_message: function(mensagem)
		{
			return $http.post("BatePapo/api_add_message", mensagem);
		},
		add_reply: function(resposta)
		{
			return $http.post("BatePapo/api_add_reply", resposta);
		},
		fetch_all: function()
		{
			return $http.get("BatePapo/api_fetch_all");
		}
	};

})