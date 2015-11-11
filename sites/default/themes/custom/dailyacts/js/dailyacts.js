/* custom JS goes here */

jQuery(document).ready(function($) {
	// enable click on top-level navbar element
	/*
		$(window).resize(function(){
			if ($(window).width() >= 979){	
	      			$('nav ul.nav li a').removeClass('dropdown-toggle');
	       			$('nav ul.nav li a').removeAttr('data-toggle');
	 		}	
	 	});
	*/
	
	// apply img-responsive class to all images within the node body
 	$('div.node img').addClass('img-responsive');
 	
 	// help parallax window adjust on window resize
 	jQuery(window).trigger('resize').trigger('scroll');
 	

//   $(document).ready(function() {  
  		 $("#front-carousel").swiperight(function() {  
    		  $(this).carousel('prev');  
	    		});  
		   $("#front-carousel").swipeleft(function() {  
		      $(this).carousel('next');  
	   });  
// 	});  

});
