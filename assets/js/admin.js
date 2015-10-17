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
	$('#add_actor').click(function(){
		if($('#actor_name').val() != '')
			$('#actor_list').append('<div class="chip">'+ $('#actor_name').val() +'<i class="remove_actor material-icons">close</i></div>');
		$('#actor_name').val('');
		$('.remove_actor').click(function(){
			$(this).parent().remove();
		});
	});
	$('.remove_actor').click(function(){
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
						$('#add_imdb_screenshot_btn').removeAttr('disabled');
						$('#add_imdb_screenshot').removeAttr('disabled');
						$('#add_imdb_rate').attr( "disabled", "" );
						$('#add_imdb_genre_btn').removeAttr('disabled');
						$('#add_imdb_genre').removeAttr('disabled');
						$('#add_imdb_time').removeAttr('disabled');
						
						$('#add_imdb_title').val(data['Title']);
						$('#add_imdb_year').val(data['Year']);
						$('#add_imdb_plot').val(data['Plot']);
						$('#add_imdb_actor_btn').val();
						$('#add_imdb_actor').val();
						$('#add_imdb_date').val();
						$('#add_imdb_screenshot_btn').val();
						$('#add_imdb_screenshot').val();
						switch(data['Rated']){
							case 'PG-13': $('#add_imdb_rate').prop("selectedIndex", 3); alert($('#add_imdb_rate').val()); break;
						}
						
						$('#add_imdb_genre_btn').val();
						$('#add_imdb_genre').val();
						$('#add_imdb_time').val(data['Runtime']);
						
					}
						
				},
				error: function(err) {
					console.log('FUCKING ERROR' + err);
				}
			});
		}
	});
});