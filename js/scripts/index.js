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
			var newRow;
			$('#add_row').on('click', function(){
				$(this).addClass('hidden');
				$('#done_adding').removeClass('hidden');
				var $tbody = $('#tableBody');
				newRow = $('#tableBody tr').last().clone();
				newRow.addClass('inserted_row');
				
				var nextUnique = parseInt(newRow.find('th.unique').text())+1;
				newRow.find('th.unique').html(nextUnique);

				newRow.find('th:not(.unique)').each(function(index){

					$(this).addClass('generated has_input').html("<input type='text' name='field"+index+"' class='table_cell_input'>");
				});
				
				$tbody.append(newRow);
				
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

			//Wrap row in input
			function wrapWithInput(selector){

				$(selector).find('th:not(.unique)').each(function(index){
					if($(this).hasClass('check')) return;
					var preValue = $(this).text();
					$(this).addClass('has_input generated').html("<input type='text' name='field"+index+"' class='table_cell_input' value='"+preValue+"'>");
				});
				return;
			}

			$("th").on('click', function(){
				if($(this).hasClass('generated') || $(this).hasClass('check')) return;
				wrapWithInput($(this).parent());
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