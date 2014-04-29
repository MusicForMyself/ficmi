define(["jquery", "bootstrap"], function($){
	(function($){

		// TODO: Error handling should initialize everytime a page loads, load this module in header instead of the footer
		// TODO: Remove error element from DOM when closing dialog
		   
		    //Do some jQuery stuff right here
		    console.log("Activated Error handling js module");
		    $(document).ready( function(){
		    	$('#err_modal').modal();
		    });
	})(jQuery);
});