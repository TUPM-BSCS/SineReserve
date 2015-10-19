$(document).ready(function(){
	var actor_no = 0;
	var genre_no = 0;
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

	if(poster_error != null){
		$('#add_by_id').openModal();
		$('#imdb_err').text(poster_error);
	}
	
	$('#imdb_confirm_btn').click(function(){
		alert('success');
		var i;
		var actor_list_str, genre_list_str;
		var actor_list = [], genre_list = [];		
		
		
		for(i=0; i<actor_no; i++){
			actor_list[i] = $("#add_imdb_actor_val_"+(i+1)).text();
		}
		console.log(actor_list);
		for(i=0; i<genre_no; i++){
			genre_list[i] = $("#add_imdb_genre_val_"+(i+1)).text();
		}
		console.log(actor_list);
		for(i=0; i<actor_no; i++){
			if(actor_list[i] != ''){
				if(i == 0)
					actor_list_str = (actor_list[i]);
				else
					actor_list_str += (',' +actor_list[i]);
			}
		}
		for(i=0; i<genre_no; i++){
			if(genre_list[i] != ''){
				if(i == 0)
					genre_list_str = (genre_list[i]);
				else
					genre_list_str += (',' +genre_list[i]);
			}
		}
		$('#add_by_id_modal_content').append('<input type="hidden" id="actor_bitch" name="add_imdb_actor_hidden" value="'+ actor_list_str +'">');
		$('#add_by_id_modal_content').append('<input type="hidden" id="genre_bitch" name="add_imdb_genre_hidden" value="'+ genre_list_str +'">');
	});
	
	
	
	$('#add_imdb_genre').click(function(){
		$('#add_imdb_genre').val('');
	});
	
	$('#add_imdb_actor').click(function(){
		$('#add_imdb_actor').val('');
	});
	
	$('#add_imdb_actor_btn').click(function(){
		actor_no++;
		if($('#add_imdb_actor').val() != ''){
			if(($('#add_imdb_actor').val().match("^[a-zA-Z\\s-.]*$"))){
				$('#add_imdb_actor_list').append('<div class="chip"><span id="add_imdb_actor_val_'+actor_no+'">'+ $('#add_imdb_actor').val() +'</span><i class="remove material-icons">close</i></div>');
				$('.remove').click(function(){
					$(this).parent().remove();
				});
				console.log($('#add_imdb_actor_list').html());
			}
			else
				$('#add_imdb_actor').val('Invalid Name');
		}
	});
	
	$('#add_imdb_genre_btn').click(function(){
		genre_no++;
		if($('#add_imdb_genre').val() != ''){
			if(($('#add_imdb_genre').val().match("^[a-zA-Z\\s]*$"))){
				$('#add_imdb_genre_list').append('<div class="chip"><span id="add_imdb_genre_val_'+genre_no+'">'+ $('#add_imdb_genre').val() +'</span><i class="remove material-icons">close</i></div>');
				$('.remove').click(function(){
					$(this).parent().remove();
				});
			}
			else
				$('#add_imdb_genre').val('Invalid Genre');
			console.log(genre_no);
		}
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
						$('#imdb_err').text('Movie does not exist in database');
					else{
						$('#imdb_err').text("");
						$('#add_imdb_actor_list').empty()
						$('#add_imdb_genre_list').empty()
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
						var Actors = data['Actors'].split(', ');
						for (x in Actors) {
							actor_no++;
							$('#add_imdb_actor_list').append('<div class="chip"><span id="add_imdb_actor_val_'+actor_no+'">'+ Actors[x] +'</span><i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}	
						if(data['Released'] != 'N/A');
							$('#add_imdb_date').val(data['Released']);
						$('#add_imdb_rate').val(data['Rated']);
						alert($('#add_imdb_rate').val(data['Rated']));
						// switch(data['Rated']){
							// case 'G': $('#add_imdb_rate').val('1'); break;
							// case 'PG': $('#add_imdb_rate').val('2'); break;
							// case 'PG-13': $('#add_imdb_rate').val('3'); break;
							// case 'R': $('#add_imdb_rate').val('4'); break;
							// case 'NC-17': $('#add_imdb_rate').val('5'); break;
						// }
						var Genre = data['Genre'].split(', ');
						for (x in Genre) {
							genre_no++;
							$('#add_imdb_genre_list').append('<div class="chip"><span id="add_imdb_genre_val_'+genre_no+'">'+ Genre[x] +'</span><i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}			
						$('#add_imdb_time').val(data['Runtime'].replace(" min", ""));
						
					}
					
						
				},
				error: function(err) {
					console.log('FUCKING ERROR' + err);
					$('#imdb_err').text("No Connection!");
				}
			});
		}
	});
	
	//CHECKING OF MOVIE TITLE AND YEAR
	$('#btn_check_title').click(function(){
		var title, year;
		$('#title_id_err').text('');
		if($('#add_title_title').val() != null){
			title = $('#add_title_title').val();
			if($('#add_title_title').val() != null)
				year = $('#add_title_year').val();
			$.ajax({
			  url: "http://www.omdbapi.com/?plot=full&t="+title+"&y="+year,
				dataType: 'json',
				success: function(data){
					if(data['Response'] == 'False')
						$('#title_err').text('Movie does not exist in database');
					else{
						$('#title_err').text("");
						$('#add_title_actor_list').empty()
						$('#add_title_genre_list').empty()
						$('#add_title_title').removeAttr('disabled');
						$('#add_title_year').removeAttr('disabled');
						$('#add_title_plot').removeAttr('disabled');
						$('#add_title_trailer').removeAttr('disabled');
						$('#add_title_poster_btn').removeAttr('disabled');
						$('#add_title_poster').removeAttr('disabled');
						$('#add_title_actor_btn').removeAttr('disabled');
						$('#add_title_actor').removeAttr('disabled');
						$('#add_title_date').removeAttr('disabled');
						$('#add_title_image1_btn').removeAttr('disabled');
						$('#add_title_image1').removeAttr('disabled');
						$('#add_title_image2_btn').removeAttr('disabled');
						$('#add_title_image2').removeAttr('disabled');
						$('#add_title_image3_btn').removeAttr('disabled');
						$('#add_title_image3').removeAttr('disabled');
						$('#add_title_rate').removeAttr('disabled');
						$('#add_title_rate').attr('enabled', true);
						$('#add_title_genre_btn').removeAttr('disabled');
						$('#add_title_genre').removeAttr('disabled');
						$('#add_title_time').removeAttr('disabled');
						
						$('#add_title_title').val(data['Title']);
						$('#add_title_year').val(data['Year']);
						$('#add_title_plot').val(data['Plot']);
						var Actors = data['Actors'].split(', ');
						for (x in Actors) {
							actor_no++;
							$('#add_title_actor_list').append('<div class="chip"><span id="add_title_actor_val_'+actor_no+'">'+ Actors[x] +'</span><i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}		
						$('#add_title_date').val(data['Released']);
						$('#add_title_rate').val(data['Rated']);
						alert($('#add_title_rate').val(data['Rated']));
						// switch(data['Rated']){
							// case 'G': $('#add_title_rate').val('1'); break;
							// case 'PG': $('#add_title_rate').val('2'); break;
							// case 'PG-13': $('#add_title_rate').val('3'); break;
							// case 'R': $('#add_title_rate').val('4'); break;
							// case 'NC-17': $('#add_title_rate').val('5'); break;
						// }
						var Genre = data['Genre'].split(', ');
						for (x in Genre) {
							genre_no++;
							$('#add_title_genre_list').append('<div class="chip"><span id="add_title_genre_val_'+genre_no+'">'+ Genre[x] +'</span><i class="remove material-icons">close</i></div>');
							$('.remove').click(function(){
								$(this).parent().remove();
							});
						}			
						$('#add_title_time').val(data['Runtime'].replace(" min", ""));
						
					}
					
						
				},
				error: function(err) {
					console.log('FUCKING ERROR' + err);
					$('#title_err').text("No Connection!");
				}
			});
		}
	});
	
	$('#title_confirm_btn').click(function(){
		alert('success');
		var i;
		var actor_list_str, genre_list_str;
		var actor_list = [], genre_list = [];		
		
		
		for(i=0; i<actor_no; i++){
			actor_list[i] = $("#add_title_actor_val_"+(i+1)).text();
		}
		console.log(actor_list);
		for(i=0; i<genre_no; i++){
			genre_list[i] = $("#add_title_genre_val_"+(i+1)).text();
		}
		console.log(actor_list);
		for(i=0; i<actor_no; i++){
			if(actor_list[i] != ''){
				if(i == 0)
					actor_list_str = (actor_list[i]);
				else
					actor_list_str += (',' +actor_list[i]);
			}
		}
		for(i=0; i<genre_no; i++){
			if(genre_list[i] != ''){
				if(i == 0)
					genre_list_str = (genre_list[i]);
				else
					genre_list_str += (',' +genre_list[i]);
			}
		}
		$('#add_by_title_modal_content').append('<input type="hidden" id="title_actor_bitch" name="add_title_actor_hidden" value="'+ actor_list_str +'">');
		$('#add_by_title_modal_content').append('<input type="hidden" id="title_genre_bitch" name="add_title_genre_hidden" value="'+ genre_list_str +'">');
		alert($('#title_actor_bitch').val());
		alert($('#title_genre_bitch').val());
	});
	
	$('#add_title_genre').click(function(){
		$('#add_title_genre').val('');
	});
	
	$('#add_title_actor').click(function(){
		$('#add_title_actor').val('');
	});
	
	$('#add_title_actor_btn').click(function(){
		actor_no++;
		if($('#add_title_actor').val() != ''){
			if(($('#add_title_actor').val().match("^[a-zA-Z\\s-.]*$"))){
				$('#add_title_actor_list').append('<div class="chip"><span id="add_title_actor_val_'+actor_no+'">'+ $('#add_title_actor').val() +'</span><i class="remove material-icons">close</i></div>');
				$('.remove').click(function(){
					$(this).parent().remove();
				});
				console.log($('#add_title_actor_list').html());
			}
			else
				$('#add_title_actor').val('Invalid Name');
		}
	});
	
	$('#add_title_genre_btn').click(function(){
		genre_no++;
		if($('#add_title_genre').val() != ''){
			if(($('#add_title_genre').val().match("^[a-zA-Z\\s]*$"))){
				$('#add_title_genre_list').append('<div class="chip"><span id="add_title_genre_val_'+genre_no+'">'+ $('#add_title_genre').val() +'</span><i class="remove material-icons">close</i></div>');
				$('.remove').click(function(){
					$(this).parent().remove();
				});
			}
			else
				$('#add_title_genre').val('Invalid Genre');
			console.log(genre_no);
		}
	});
	
	$('#add_by_idbtn').click(function(){
		$('#add_imdb_id').val('');
		$('#add_imdb_title').val('');
		$('#add_imdb_year').val('');
		$('#add_imdb_plot').val('');
		$('#add_imdb_trailer').val('');
		$('#add_imdb_poster').val('');
		$('#add_imdb_poster_btn').val('');
		$('#add_imdb_date').val('');
		$('#add_imdb_image1_btn').val('');
		$('#add_imdb_image1').val('');
		$('#add_imdb_image2_btn').val('');
		$('#add_imdb_image2').val('');
		$('#add_imdb_image3_btn').val('');
		$('#add_imdb_image3').val('');
		$('#add_imdb_rate').val('G');
		$('#add_imdb_time').val('');
		$('#add_imdb_actor').val('');
		$('#add_imdb_genere').val('');
		$('#add_imdb_actor_list').empty();
		$('#add_imdb_genre_list').empty();
		
		$('#add_imdb_title').attr('disabled', true);
		$('#add_imdb_year').attr('disabled', true);
		$('#add_imdb_plot').attr('disabled', true);
		$('#add_imdb_trailer').attr('disabled', true);
		$('#add_imdb_poster').attr('disabled', true);
		$('#add_imdb_poster_btn').attr('disabled', true);
		$('#add_imdb_date').attr('disabled', true);
		$('#add_imdb_image1_btn').attr('disabled', true);
		$('#add_imdb_image1').attr('disabled', true);
		$('#add_imdb_image2_btn').attr('disabled', true);
		$('#add_imdb_image2').attr('disabled', true);
		$('#add_imdb_image3_btn').attr('disabled', true);
		$('#add_imdb_image3').attr('disabled', true);
		$('#add_imdb_rate').attr('disabled', true);
		$('#add_imdb_time').attr('disabled', true);
		$('#add_imdb_actor').attr('disabled', true);
		$('#add_imdb_genere').attr('disabled', true);
		$('#add_imdb_actor_list').attr('disabled', true);
		$('#add_imdb_genre_list').attr('disabled', true);
	});
});