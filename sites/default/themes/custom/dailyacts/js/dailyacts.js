/* custom JS goes here */

jQuery(document).ready(function($) {
	// enable click on top-level navbar element
	$(window).resize(function(){
		if ($(window).width() >= 979){	
      			$('nav ul.nav li a').removeClass('dropdown-toggle');
       			$('nav ul.nav li a').removeAttr('data-toggle');
 		}	
 	});

 	$('div.node img').addClass('img-responsive');
 	jQuery(window).trigger('resize').trigger('scroll');
});
