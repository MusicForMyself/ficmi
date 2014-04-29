define(["jquery", "forms", "bootstrap", "err_handler"], function($, myforms){
	(function($){
		   
		    //Do some jQuery stuff right here
		    console.log('lol from index js');

		    $('#form-signup').submit(function(e){
		    	e.preventDefault();
		    	myforms.sendForm();
		    });
			
			var prevBorder;
			$('td').hover(function(){
		    	prevBorder = $(this).css('border');
		    	$(this).css('border', '1px solid #C4C4C4');
		    },
		    function(){
		    	$(this).css('border', prevBorder);
		    });

	})(jQuery);
});