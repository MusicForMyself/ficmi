define(["jquery", "forms", "bootstrap", "mustache", "err_handler"], function($, myforms, btsrtp, Mustache){
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

			var get_row_values = function(selector){
				var id, flag = true, 
					data = {
						"columns" : []
					};
				$selector = $(selector);
				$selector.find('th').each(function(){
					if($(this).hasClass('check')) return;
					var contents;
					if(flag){
						id = contents = $(this).text();
						data.columns.push(contents);
						data.id = id;
						flag = !flag;
						return;
					}
					data.columns.push('');
				});
				return data;
			}

			//These too, put in tables.js
			/**
			 * Adds new row at the bottom of the table
			 * @see row template into tables module
			 */
			$('#add_row').on('click', function(){
				
				var $lastRow = $('#tableBody tr').last();
				var data = get_row_values($lastRow);

				$.get('includes/tables/row.mustache', function(template) {
					
					var rendered = Mustache.render(template, data);
					$('#tableBody').append(rendered);
				});
			});

			


			$('#add_col').on('click', function(){
				$(this).addClass('hidden');
				$('#done_adding_col').removeClass('hidden');
				$('#new_column_form').removeClass('hidden');
				
			});
			
			//Done adding row
			$('#done_adding').on('click', function(){
				//TODO: Check if fields are not empty
				$('.table_cell_input').each(function(){
					var passValue = $(this).val();
					$(this).appendTo('#insert_row_form').val();
				});
				$('#insert_row_form').submit();
			});

			//Done adding column
			$('#done_adding_col').on('click', function(){
				var myForm = $('#new_column_form');
				if(myForm.find('input').val() != "") myForm.submit();
			});

			//Remove Column
			$('.remove_col').on('click', function(){
				console.log('lol');
				var data_remove = $(this).attr('data-remove');
				console.log(data_remove);
			});

			/**
			 * Wraps the row info within input controls
			 * @param  $selector JQuery selector '<tr></tr>'
			 * 
			 */
			function inputRow(selector){
				var id, flag = true, data;
				$selector = $(selector);
				data = get_row_values($selector);

				$.get('includes/tables/input_row.mustache', function(template) {
					
					var rendered = Mustache.render(template, data);
					$selector.html(rendered);
				});
			}

			$("th").on('click', function(){
				if($(this).hasClass('generated') || $(this).hasClass('check')) return;
				
				var $thisRow = $(this).parent();
				inputRow($thisRow);
				

				$(this).parent().find('.save-absolute').removeClass('hidden');
			});

			//Save row
			$('.save-absolute').on('click', function(){
				var update_id = $(this).attr('data-update');
				$('.table_cell_input').each(function(){

					var passValue = $(this).val();
					$(this).appendTo('#update_row_form').val(passValue);
				});
				$('#update_id').attr('value', update_id);
				$('#update_row_form').submit();
			});

			//Delete row
			$('#delete_row').on('click', function(){
				var length = 0;
				var IDarray = [];
				$("input[value='select_single']").each(function(){
					if($(this).is(':checked')){
						var data = $(this).attr('data-delete');
						IDarray.push(data);
						length++;
					} 
				});
				if(length == 0) return;
				$('#delete_id').attr('value', JSON.stringify(IDarray));
				$('#delete_row_form').submit();
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