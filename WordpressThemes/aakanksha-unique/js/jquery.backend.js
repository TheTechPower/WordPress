(function( $ ) {
	$(function() {                       				//run when the DOM is ready
	  $(".advanced-options-panel").click(function() {   //use a class, since your ID gets mangled
	    $(".advanced-options").toggle("slow");      	//add the class to the clicked element
	  });
	});
})( jQuery );

