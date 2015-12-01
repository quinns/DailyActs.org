/* custom JS goes here */

jQuery(document).ready(function($) {
	// enable click on top-level navbar element
	$(window).resize(function(){
		if ($(window).width() >= 767){	
      			$('nav ul.nav li a').removeClass('dropdown-toggle');
       			$('nav ul.nav li a').removeAttr('data-toggle');
 		}	
 	});

	// apply img-responsive class to all images within the node body
 	$('div.node img').addClass('img-responsive');
 	// except for ...
 	$('div.node .field-type-file img').removeClass('img-responsive'); 	
 	
 	// help parallax window adjust on window resize
 	jQuery(window).trigger('resize').trigger('scroll');
 	
 	// add touch swipe events to carousel 
	$("#front-carousel").swiperight(function() {  
		$(this).carousel('prev');  
	});  
	$("#front-carousel").swipeleft(function() {  
		$(this).carousel('next');  
	});  

	// 	help the calendar play nice on small screens
	$('body.page-events .fc-header').wrap("<div class='table-responsive'></div>");

	// 	equalize the grid height on the sponsors view
	$('.view-sponsors .views-row').responsiveEqualHeightGrid();


// 	$('#block-menu-block-1 a.active').before('> ');
});
