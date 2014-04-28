define(["jquery", "forms", "bootstrap", "err_handler"], function($, myforms){
	(function($){
		   
		    //Do some jQuery stuff right here
		    console.log('lol from index js');

		    $('#form-signup').submit(function(e){
		    	e.preventDefault();
		    	myforms.sendForm();
		    });
			

	})(jQuery);
});