$(document).ready(function(){
	$('.cock').lolliclock({autoclose:true});
	$('select').material_select();
	$('.button-collapse').sideNav();
	$('.modal-trigger').leanModal();
	$('#addbtn_modal').click(function(){
		$('#add_branch_name').val('');
		$('#add_branch_address').val('');
	});
	$('#editbtn_modal').click(function(){
		$('#edit_branch_name').val('');
		$('#edit_branch_address').val('');
	});
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	});
	$('#add_imdb_actor_btn').click(function(){
		if($('#add_imdb_actor').val() != '')
			$('#add_imdb_actor_list').append('<div class="chip">'+ $('#add_imdb_actor').val() +'<i class="remove material-icons">close</i></div>');
		$('#add_imdb_actor').val('');
		$('.remove').click(function(){
			$(this).parent().remove();
		});
	});
	$('#add_imdb_genre_btn').click(function(){
		if($('#add_imdb_genre').val() != '')
			$('#add_imdb_genre_list').append('<div class="chip">'+ $('#add_imdb_genre').val() +'<i class="remove material-icons">close</i></div>');
		$('#add_imdb_genre').val('');
		$('.remove').click(function(){
			$(this).parent().remove();
		});
	});
	$('.remove').click(function(){
		$(this).parent().remove();
	});	
	
	$('#btn_check_imdb').click(function(){
		var id;
		$('#imdb_id_err').text('');
		if($('#add_imdb_id').val() != null){
			id = $('#add_imdb_id').val()
			$.ajax({
			  url: "http://www.omdbapi.com/?plot=full&i="+id,
				dataType: 'json',
				success: function(data){
					if(data['Response'] == 'False')
						alert('Movie does not exist in database');
					else{
						alert('detected');
						$('#add_imdb_title').removeAttr('disabled');
						$('#add_imdb_year').removeAttr('disabled');
						$('#add_imdb_plot').removeAttr('disabled');
						$('#add_imdb_trailer').removeAttr('disabled');
						$('#add_imdb_poster_btn').removeAttr('disabled');
						$('#add_imdb_poster').removeAttr('disabled');
						$('#add_imdb_actor_btn').removeAttr('disabled');
						$('#add_imdb_actor').removeAttr('disabled');
						$('#add_imdb_date').removeAttr('disabled');
						$('#add_imdb_image1_btn').removeAttr('disabled');
						$('#add_imdb_image1').removeAttr('disabled');
						$('#add_imdb_image2_btn').removeAttr('disabled');
						$('#add_imdb_image2').removeAttr('disabled');
						$('#add_imdb_image3_btn').removeAttr('disabled');
						$('#add_imdb_image3').removeAttr('disabled');
						$('#add_imdb_rate').removeAttr('disabled');
						$('#add_imdb_rate').attr('enabled', true);
						$('#add_imdb_genre_btn').removeAttr('disabled');
						$('#add_imdb_genre').removeAttr('disabled');
						$('#add_imdb_time').removeAttr('disabled');
						
						$('#add_imdb_title').val(data['Title']);
						$('#add_imdb_year').val(data['Year']);
						$('#add_imdb_plot').val(data['Plot']);
						var Actors = data['Actors'].split(',');
						for (x in Actors) {
							$('#add_imdb_actor_list').append('<div class="chip">'+ Actors[x] +'<i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}						
						$('#add_imdb_date').val(data['Released']);
						switch(data['Rated']){
							case 'G': $('#add_imdb_rate').val('1'); break;
							case 'PG': $('#add_imdb_rate').val('2'); break;
							case 'PG-13': $('#add_imdb_rate').val('3'); break;
							case 'R': $('#add_imdb_rate').val('4'); break;
							case 'NC-17': $('#add_imdb_rate').val('5'); break;
						}
						var Genre = data['Genre'].split(',');
						for (x in Genre) {
							$('#add_imdb_genre_list').append('<div class="chip">'+ Genre[x] +'<i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}			
						$('#add_imdb_time').val(data['Runtime'].replace(" min", ""));
						
					}
						
				},
				error: function(err) {
					console.log('FUCKING ERROR' + err);
				}
			});
		}
	});
});