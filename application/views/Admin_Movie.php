<main>
			<h1> Movies </h1>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_custombtn' href="#add_by_custom">Custom Add</a>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_idbtn' href="#add_by_id">Add by IMDB ID</a>
			<a class="waves-effect waves-light btn modal-trigger" id='add_by_titlebtn' href="#add_by_title">Add by Title</a>
			<table class="responsive">
				<table class="responsive-table">
				<thead>
				  <tr>
					  <th data-field="id">Name</th>
					  <th data-field="name">Address</th>
				  </tr>
				</thead>
				</table>
				<div style="height:400px; overflow:auto;">
				<table class="responsive-table">
				<tbody>
				<?php foreach ($branch as $row): ?>
				  <tr>
					<td><?php echo $row->bran_name?></td>
					<td><?php echo $row->bran_address?></td>
				  </tr>
				<?php endforeach ?>
				</tbody>
				</table>
				</div>
			</table>			
			<!-- Modals -->			
			<div id="add_by_custom" class="modal">
				<div class="modal-content">
				<form method="post" action="http://localhost/SineReserve/index.php/Admin_controller/add_branch">
					<div class='row'>
						<h4 class = 'col s12'>Add Movie</h4>
						<div class="input-field col s12">
							<input placeholder="Insert Name Here" id="add_branch_name" name='add_branch_name' type="text" class="validate">
							<label for="add_branch_name">Branch Name</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Insert Address Here" id="add_branch_address" name='add_branch_address' type="text" class="validate">
							<label for="add_branch_address">Branch Address</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				 <button class="btn waves-effect waves-light signup-button" type="submit" name="action">Confirm</button>
				</div>
				</form>
			</div>
			<div id="add_by_id" class="modal">
				<div class="modal-content">
					<div class='row'>
						<h4 class = 'col s12'>Add Movie</h4>
						<div class="input-field col s8">
							<input id="add_imdb_id" type="text" class="validate">
							<label for="add_imdb_id">IMDB ID</label>
						</div>
						<a class="col s4 waves-effect waves-light btn">Check ID<a>
						<div class="input-field col s6 m8">
							<input id="add_movie_title" type="text" class="validate">
							<label for="add_movie_title">Movie Title</label>
						</div>
						<div class="input-field col s6 m4">
							<input id="add_movie_year" type="text" class="validate">
							<label for="add_movie_year">Year</label>
						</div>
						<div id="textarea_plot"class="input-field col s12 m12">
						  <textarea id="plot_field" class="materialize-textarea"></textarea>
						  <label for="plot_field">Plot</label>
						</div>
						<div class="input-field col s6 m6">
							<input id="add_trailer" type="text" class="validate">
							<label for="add_trailer">Trailer</label>
						</div>
<<<<<<< HEAD
						<div class="input-field col s2">
							<input placeholder="" id="add_runing_time" type="text" class="validate lolliclock">
							<label for="add_running_time">Running Time</label>
=======
						<div class="file-field input-field col s12 m6">
						  <div class="btn">
							<span>Import</span>
							<input id='poster' type="file" accept="image/png, image/jpeg">
						  </div>
						  <div class="file-path-wrapper">
							<input class="file-path validate truncate" type="text" placeholder="Upload Poster Image Here">
						  </div>
>>>>>>> origin/master
						</div>
						<div class="input-field col s12 m6">
							<div class='row'>
								<div id='add_actor'class="btn col s4">Add Actor</div>							
								<input placeholder='Add Actor Here' id="actor_name" type="text" class="validate col s8">
							</div>
						</div>
						
						<div class="input-field col s12 m4">
							<input id="release_date_field" type="date" class="datepicker">
							<label for="release_date_field" class="truncate">Release Date </label> 
						</div>
						
						<div class="input-field col s12 m12">
							<div id='actor_list' class='row'>
							</div>
						</div>
						
						<div class="file-field input-field col s12 m6">
						  <div class="btn">
							<span>Import</span>
							<input id='poster' type="file" accept="image/png, image/jpeg">
						  </div>
						  <div class="file-path-wrapper">
							<input class="file-path validate truncate" type="text" placeholder="Upload Screenshots Here">
						  </div>
						</div>
						
						<div class="input-field col s12 m4">
							<select>
							  <option value="1" selected>G</option>
							  <option value="2">PG</option>
							  <option value="3">PG-13</option>
							  <option value="4">R</option>
							  <option value="5">NC-17</option>
							</select>
							<label>Rated:</label>
						</div>
						
						<div class="input-field col s12 m12">
							<div id='screenshot_list' class='row'>
							</div>
						</div>
						<div class="input-field col s12 m6">
							<div class='row'>
								<div id='add_genre'class="btn col s4">Add Genre</div>							
								<input placeholder='Add Genre Here' id="genre_name" type="text" class="validate col s8">
							</div>
						</div>
						<div class="input-field col s12 m4">
							<input id="add_time" type="text" class="validate cock">
							<label for="add_time">Run Time</label>
						</div>
						<div class="input-field col s12 m12">
							<div id='genre_list' class='row'>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				   <button class="btn waves-effect waves-light signup-button" type="submit" name="action">Confirm</button>
				</div>
			</div>
			<div id="add_by_title" class="modal">
				<div class="modal-content">
				<div class='row'>
					<h4 class = 'col s12'>Edit Branch</h4>
					<div class="input-field col s12">
						<input placeholder="Insert Name Here" id="edit_branch_name" type="text" class="validate">
						<label for="edit_branch_name">Branch Name</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Insert Address Here" id="edit_branch_address" type="text" class="validate">
						<label for="edit_branch_address">Branch Address</label>
					</div>
				</div>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Edit</a>
				</div>
			</div>
		</main>
		<!-- JS TAGS -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/lolliclock.js"></script>
		<script>
<<<<<<< HEAD
			$('.lolliclock').lolliclock({autoclose:true});
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
=======
			$(document).ready(function(){
				$('.cock').lolliclock({autoclose:true});
				$('select').material_select();
				$('.button-collapse').sideNav();
				$('.modal-trigger').leanModal();
				$('#addbtn_modal').click(function(){
					$('#add_branch_name').val('');
					$('#add_branch_address').val('');
>>>>>>> origin/master
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
			});
		</script>
	</body>
</html>