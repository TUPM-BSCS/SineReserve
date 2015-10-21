<main>
			<h1> Movies </h1>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_custom_btn' href="#add_by_custom">Custom Add</a>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_id_btn' href="#add_by_id">Add by IMDB ID</a>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_title_btn' href="#add_by_title">Add by Title</a>
			<table class="responsive">
				<table class="responsive-table">
				<thead>
				  <tr>
					  <th data-field="title" style='width: 35%'>Title</th>
					  <th data-field="name" style='width: 15%'>Year</th>
					  <th data-field="name" style='width: 20%'>Total Sales</th>
					  <th data-field="name" style='width: 30%'>Details</th>
				  </tr>			  
				</thead>
				</table>
				<div style="height:400px; overflow:auto;">
				<table class="responsive-table">
				<tbody>
				<?php foreach($movie as $row): ?>
				  <tr>
					<td class='id' style='display:none;'><?php echo $row->mov_id?></td>
					<td style='width: 35%;'><?php echo $row->mov_name?></td>
					<td style='width: 15%'><?php echo $row->mov_year?></td>
					<td style='width: 20%'><?php echo $row->mov_sales?></td>
					<td style='width: 30%'><a class="waves-effect waves-light btn modal-trigger open_details" id="movie_details" href="#view_details">View Details</a></td>
				  </tr>
				<?php endforeach ?>
				</tbody>
				</table>
				</div>
			</table>			
			<!-- Modals -->		
			<div id="add_by_custom" class="modal">
				<form method='post' action='<?php echo base_url();?>index.php/Admin_controller/insert_movie_by_custom' enctype="multipart/form-data">
					<div id='add_by_custom_modal_content'class="modal-content">
						<div class='row'>
							<h4 class = 'col s12'>Add Movie</h4>
							<div id='custom_err' class='red-text col s12'></div>
							
							<div class="input-field col s6 m8">
								<input placeholder='Movie Title' id="add_custom_title" name='add_custom_title' type="text" class="validate"  required>
								<!--<label for="add_custom_title">Movie Title</label>-->
							</div>
							
							<div id="textarea_plot"class="input-field col s12 m12">
							  <textarea placeholder='Plot' id="add_custom_plot" name="add_custom_plot" class="materialize-textarea"  required></textarea>
							  <!--<label for="add_custom_plot">Plot</label>-->
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Trailer' id="add_custom_trailer" name="add_custom_trailer" type="text" class="validate"  required>
								<!--<label for="add_custom_trailer">Trailer</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Poster Upload</span>
								<input id='add_custom_poster_btn' name='add_custom_poster_btn' type="file" accept="image/png, image/jpeg"  required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_custom_poster' class="file-path validate truncate" type="text" placeholder="Upload Poster Image Here"  required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Release Date' id="add_custom_date" name="add_custom_date" type="date" class="datepicker"  required>
								<!--<label for="add_custom_date" class="truncate">Release Date </label> -->
							</div>	
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 1 Upload</span>
								<input id='add_custom_image1_btn' name='add_custom_image1_btn' type="file" accept="image/png, image/jpeg" required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_custom_image1' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" required>
							  </div>
							</div>				
							
							<!--<i class='col m2 truncate'>Rated:</i>-->
							<div class="input-field col s12 m6">
								<select class="browser-default" id='add_custom_rate' name='add_custom_rate'  required onchange=console.log($('#add_custom_rate').val())>
								  <option value="G" selected>G</option>
								  <option value="PG">PG</option>
								  <option value="PG-13">PG-13</option>
								  <option value="R">R</option>
								  <option value="NC-17">NC-17</option>
								</select>
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 2 Upload</span>
								<input id='add_custom_image2_btn' name='add_custom_image2_btn' type="file" accept="image/png, image/jpeg" required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_custom_image2' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" required>
							  </div>
							</div>
							
							
							<div class="input-field col s12 m6">
								<input placeholder='Run Time' id="add_custom_time" name='add_custom_time' type="number" class="validate "  required>
								<!--<label for="add_custom_time">Run Time</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 3 Upload</span>
								<input id='add_custom_image3_btn' name='add_custom_image3_btn' type="file" accept="image/png, image/jpeg" required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_custom_image3' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_custom_actor_btn'class="btn col s4">Add Actor</div>							
									<input placeholder='Add Actor Here' id='add_custom_actor' type="text" class="validate col s8" >
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_custom_actor_list' class='row'>
								</div>
							</div>
		
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_custom_genre_btn'class="btn col s4">Add Genre</div>							
									<input placeholder='Add Genre Here' id="add_custom_genre" type="text" class="validate col s8" >
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_custom_genre_list' class='row'>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					   <button class="btn waves-effect waves-light signup-button" type="submit" name="custom_confirm_btn" id='custom_confirm_btn'>Confirm</button>
					</div>
				</form>
			</div>
			<div id="add_by_id" class="modal">
				<form method='post' action='<?php echo base_url();?>index.php/Admin_controller/insert_movie_by_imdb' enctype="multipart/form-data">
					<div id='add_by_id_modal_content'class="modal-content">
						<div class='row'>
							<h4 class = 'col s12'>Add Movie</h4>
							<div id='imdb_err' class='red-text col s12'></div>
							<div class="input-field col s8">
								<input id="add_imdb_id" type="text" class="validate" required>
								<label for="add_imdb_id">IMDB ID</label>
							</div>
							<a id='btn_check_imdb' class="col s4 waves-effect waves-light btn">Check ID<a>
							
							<div class="input-field col s6 m8">
								<input placeholder='Movie Title' id="add_imdb_title" name='add_imdb_title' type="text" class="validate"  required>
								<!--<label for="add_imdb_title">Movie Title</label>-->
							</div>
							
							<div class="input-field col s6 m4">
								<input placeholder='Year' id="add_imdb_year" type="number" class="validate"  required>
								<!--<label for="add_imdb_year">Year</label>-->
							</div>
							
							<div id="textarea_plot"class="input-field col s12 m12">
							  <textarea placeholder='Plot' id="add_imdb_plot" name="add_imdb_plot" class="materialize-textarea"  required></textarea>
							  <!--<label for="add_imdb_plot">Plot</label>-->
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Trailer' id="add_imdb_trailer" name="add_imdb_trailer" type="text" class="validate"  required>
								<!--<label for="add_imdb_trailer">Trailer</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Poster Upload</span>
								<input id='add_imdb_poster_btn' name='add_imdb_poster_btn' type="file" accept="image/png, image/jpeg"  required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_imdb_poster' class="file-path validate truncate" type="text" placeholder="Upload Poster Image Here"  required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Release Date' id="add_imdb_date" name="add_imdb_date" type="date" class="datepicker"  required>
								<!--<label for="add_imdb_date" class="truncate">Release Date </label> -->
							</div>	
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 1 Upload</span>
								<input id='add_imdb_image1_btn' name='add_imdb_image1_btn' type="file" accept="image/png, image/jpeg" required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_imdb_image1' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" required>
							  </div>
							</div>				
							
							<!--<i class='col m2 truncate'>Rated:</i>-->
							<div class="input-field col s12 m6">
								<select class="browser-default" id='add_imdb_rate' name='add_imdb_rate'  required onchange=console.log($('#add_imdb_rate').val())>
								  <option value="G" selected>G</option>
								  <option value="PG">PG</option>
								  <option value="PG-13">PG-13</option>
								  <option value="R">R</option>
								  <option value="NC-17">NC-17</option>
								</select>
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 2 Upload</span>
								<input id='add_imdb_image2_btn' name='add_imdb_image2_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_imdb_image2' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" disabled required>
							  </div>
							</div>
							
							
							<div class="input-field col s12 m6">
								<input placeholder='Run Time' id="add_imdb_time" name='add_imdb_time' type="number" class="validate " disabled required>
								<!--<label for="add_imdb_time">Run Time</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 3 Upload</span>
								<input id='add_imdb_image3_btn' name='add_imdb_image3_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_imdb_image3' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" disabled required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_imdb_actor_btn'class="btn col s4">Add Actor</div>							
									<input placeholder='Add Actor Here' id='add_imdb_actor' type="text" class="validate col s8" disabled>
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_imdb_actor_list' class='row'>
								</div>
							</div>
		
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_imdb_genre_btn'class="btn col s4">Add Genre</div>							
									<input placeholder='Add Genre Here' id="add_imdb_genre" type="text" class="validate col s8" disabled>
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_imdb_genre_list' class='row'>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					   <button class="btn waves-effect waves-light signup-button" type="submit" name="imdb_confirm_btn" id='imdb_confirm_btn'>Confirm</button>
					</div>
				</form>
			</div>
			<div id="add_by_title" class="modal">
				<form method='post' action='<?php echo base_url();?>index.php/Admin_controller/insert_movie_by_title' enctype="multipart/form-data">
					<div id='add_by_title_modal_content'class="modal-content">
						<div class='row'>
							<h4 class = 'col s12 black-text'>Add Movie</h4>
							<div id='title_err' class='red-text col s12'></div>
							
							<div class="input-field col s12 m7">
								<input placeholder='Movie Title' id="add_title_title" name='add_title_title' type="text" class="validate" required>
								<!--<label for="add_title_title">Movie Title</label>-->
							</div>
							
							<div class="input-field col s6 m2">
								<input placeholder='Year' id="add_title_year" name="add_title_year" type="number" class="validate" required>
								<!--<label for="add_title_year">Year</label>-->
							</div>
							
							<a id='btn_check_title' class="col s6 m3 waves-effect waves-light btn">Check ID<a>
							
							<div id="textarea_plot"class="input-field col s12 m12">
							  <textarea placeholder='Plot' id="add_title_plot" name="add_title_plot" class="materialize-textarea" disabled required></textarea>
							  <!--<label for="add_title_plot">Plot</label>-->
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Trailer' id="add_title_trailer" name="add_title_trailer" type="text" class="validate" disabled required>
								<!--<label for="add_title_trailer">Trailer</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Poster Upload</span>
								<input id='add_title_poster_btn' name='add_title_poster_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_title_poster' class="file-path validate truncate" type="text" placeholder="Upload Poster Image Here" disabled required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<input placeholder='Release Date' id="add_title_date" name="add_title_date" type="date" class="datepicker" disabled required>
								<!--<label for="add_title_date" class="truncate">Release Date </label> -->
							</div>	
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 1 Upload</span>
								<input id='add_title_image1_btn' name='add_title_image1_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_title_image1' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" disabled required>
							  </div>
							</div>				
							
							<!--<i class='col m2 truncate'>Rated:</i>-->
							<div class="input-field col s12 m6">
								<select class="browser-default" id='add_title_rate' name='add_title_rate' disabled required>
								  <option value="G" selected>G</option>
								  <option value="PG">PG</option>
								  <option value="PG-13">PG-13</option>
								  <option value="R">R</option>
								  <option value="NC-17">NC-17</option>
								</select>
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 2 Upload</span>
								<input id='add_title_image2_btn' name='add_title_image2_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_title_image2' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" disabled required>
							  </div>
							</div>
							
							
							<div class="input-field col s12 m6">
								<input placeholder='Run Time' id="add_title_time" name='add_title_time' type="number" class="validate " disabled required>
								<!--<label for="add_title_time">Run Time</label>-->
							</div>
							
							<div class="file-field input-field col s12 m6">
							  <div class="btn">
								<span>Image 3 Upload</span>
								<input id='add_title_image3_btn' name='add_title_image3_btn' type="file" accept="image/png, image/jpeg" disabled required>
							  </div>
							  <div class="file-path-wrapper">
								<input id='add_title_image3' class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here" disabled required>
							  </div>
							</div>
							
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_title_actor_btn'class="btn col s4">Add Actor</div>							
									<input placeholder='Add Actor Here' id='add_title_actor' type="text" class="validate col s8" disabled>
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_title_actor_list' class='row'>
								</div>
							</div>
		
							<div class="input-field col s12 m6">
								<div class='row'>
									<div id='add_title_genre_btn'class="btn col s4">Add Genre</div>							
									<input placeholder='Add Genre Here' id="add_title_genre" type="text" class="validate col s8" disabled>
								</div>
							</div>
							
							<div class="input-field col s12 m12">
								<div id='add_title_genre_list' class='row'>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					   <button class="btn waves-effect waves-light signup-button" type="submit" name="title_confirm_btn" id='title_confirm_btn'>Confirm</button>
					</div>
				</form>
			</div>
			<div id="view_details" class="modal">
				<form method='post' enctype="multipart/form-data">
					<div id='view_details_modal_content'class="modal-content">
						<div class='row'>
							<h4 class = 'col s12 black-text'>Movie Details</h4>
							
							<div class="input-field col s6 m8">
								<input class='blue-text' placeholder='Movie Title' id="view_details_title" name='view_details_title' type="text" class="validate" disabled required>
								<label for="view_details_title">Movie Title</label>
							</div>
							
							<div class="input-field col s6 m4">
								<input class='blue-text' placeholder='Year' id="view_details_year" type="number" class="validate" disabled required>
								<label  for="view_details_year">Year</label>
							</div>
							
							<div id="textarea_plot"class="input-field col s12 m12">
							  <textarea style=" resize:none; height:100px"class='blue-text' placeholder='Plot' id="view_details_plot" name="view_details_plot" class="materialize-textarea" disabled required></textarea>
							  <label for="view_details_plot">Plot</label>
							</div>
							
							<div class="input-field col s12 m6">
								<input class='blue-text' placeholder='Trailer' id="view_details_trailer" name="view_details_trailer" type="text" class="validate" disabled required>
								<label for="view_details_trailer">Trailer</label>
							</div>
							
							<div class="input-field col s12 m6">
								<input class='blue-text' placeholder='Release Date' id="view_details_date" name="view_details_date" type='text' disabled required>
								<label for="view_details_date" class="truncate">Release Date </label>
							
							<div class="input-field col s12 m6">
								<select class="blue-text browser-default" id='view_details_rate' name='view_details_rate' disabled required onchange=console.log($('#view_details_rate').val())>
								  <option value="G" selected>G</option>
								  <option value="PG">PG</option>
								  <option value="PG-13">PG-13</option>
								  <option value="R">R</option>
								  <option value="NC-17">NC-17</option>
								</select>
							</div>
							
							<div class="input-field col s12 m6">
								<input class='blue-text' placeholder='Run Time' id="view_details_time" name='view_details_time' type="number" class="validate" disabled required>
								<label for="view_details_time">Run Time (min/s)</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
					   <button class="btn waves-effect waves-light signup-button" type="submit" name="custom_confirm_btn" id='custom_confirm_btn'>Ok</button>
					</div>
				</form>
			</div>
		</main>
		<!-- JS TAGS -->
		<script> var movie = <?php if ($movie == null) echo 'null'; else echo json_encode($movie);?></script>
		<script> var poster_error = <?php if ($poster_error == null) echo 'null'; else echo "'The File type you are attempting to upload is not allowed.'";?>; </script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/admin.js"></script>
		<script>
			$('.open_details').click(function(){
				var x, index;
				var id = $(this).parent().parent().children(':first').text();
				for (x in movie){
					if(id == movie[x].mov_id){
						index = x;
						break;
					}
				}
				$('#view_details_title').val(movie[index].mov_name);
				$('#view_details_year').val(movie[index].mov_year);
				$('#view_details_plot').val(movie[index].mov_plot);
				$('#view_details_trailer').val(movie[index].mov_trailer);
				$('#view_details_date').val(movie[index].mov_release_date);
				$('#view_details_rate').val(movie[index].mov_rating);
				$('#view_details_time').val(movie[index].mov_running_time);
			});
		</script>
	</body>
</html>