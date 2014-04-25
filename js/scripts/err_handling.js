define(["jquery", "bootstrap"], function($){
	(function($){
		   
		    //Do some jQuery stuff right here
		    console.log("Error handling js module activated");
		    $(document).ready( function(){
		    	$('#err_modal').modal();
		    });
	})(jQuery);
});