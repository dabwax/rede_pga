angular.module('RedePga', ["kendo.directives", "ngFileUpload", "angular-tour"]);

$(document).ready(function() {
	kendo.culture("pt-BR");

	$(".button-collapse").sideNav();
	
	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});