define(["jquery", "forms", "bootstrap", "err_handler"], function($, myforms){
	(function($){
		   
			//Do some jQuery stuff right here
			console.log('lol from index js');

			//TODO: Put this event handlers somewhere else
			$('#form-signin').submit(function(e){
				e.preventDefault();
				myforms.sendLoginForm();
			});

			$('#form-signup').submit(function(e){
				e.preventDefault();
				myforms.sendForm();
			});

			//These too, put in tables.js
			$('#add_row').on('click', function(){
				//$('')
			});
			
			var prevBorder;
			$('td').hover(function(){
				prevBorder = $(this).css('border');
				$(this).css('border', '1px solid #333333');
			},
			function(){
				$(this).css('border', prevBorder);
			});

	})(jQuery);
});