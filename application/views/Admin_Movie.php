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
						<div class="input-field col s4">
							<input placeholder="" id="add_imdb_id" type="text" class="validate">
							<label for="add_imdb_id">IMDB ID</label>
						</div>
						<div class="input-field col s6">
							<input placeholder="" id="add_movie_title" type="text" class="validate">
							<label for="add_movie_title">Movie Title</label>
						</div>
						<div class="input-field col s2">
							<input placeholder="" id="add_movie_year" type="text" class="validate">
							<label for="add_movie_year">Year</label>
						</div>
						<div id="textarea_plot"class="input-field col s12">
						  <textarea id="plot_field" class="materialize-textarea"></textarea>
						  <label for="plot_field">Plot</label>
						</div>
						<div class="input-field col s3">
							<input id="release_date_field" type="date" class="datepicker">
							<label for="release_date_field">Release Date </label> 
						</div>
						<div class="input-field col s7">
							<input placeholder="" id="add_trailer" type="text" class="validate">
							<label for="add_trailer">Trailer</label>
						</div>
						<div class="input-field col s2">
							<input placeholder="" id="add_runing_time" type="text" class="validate lolliclock">
							<label for="add_running_time">Running Time</label>
						</div>
						<div class="file-field input-field col s6">
						  <div class="btn">
							<span>File</span>
							<input type="file" accept="image/png, image/jpeg" multiple>
						  </div>
						  <div class="file-path-wrapper">
							<input id='poster' class="file-path validate" type="text" placeholder="Upload one or more files">
						  </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				  <a href="#!" onclick="alert('fefefe'+ $('#poster').val())" class=" modal-action modal-close waves-effect waves-green btn-flat">Edit</a>
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
				});
		</script>
	</body>
</html>