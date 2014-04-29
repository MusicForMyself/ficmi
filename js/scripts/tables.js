define(["jquery"], function($){

	(function($){
		   
		    //Do some jQuery stuff right here
		    console.log('Table scripts initialized');

		    $('td').hover(function(){
		    	$(this).css('border', '1px solid #C4C4C4');
		    },
		    function(){

		    });
			

	})(jQuery);
});