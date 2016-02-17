angular.module('RedePga', ["kendo.directives", "ngFileUpload"]);

$(document).ready(function() {
	kendo.culture("pt-BR");

	$(".button-collapse").sideNav();
	
	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});