angular.module('RedePga', ["ngSanitize", "ngFileUpload", "highcharts-ng", "ngTagsInput", "masonry", 'ui.sortable']);

$(document).ready(function() {

  $(".button-collapse").sideNav();

  $(".dropdown-button").on("click", function() {

    setTimeout(function() {
      $("#slide-out").scrollTop(99999);
    }, 300);

  });

  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrain_width: true, // Does not change width of dropdown to that of the activator
    gutter: 0, // Spacing from edge
    belowOrigin: true, // Displays dropdown below the button
    alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );

	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

});
