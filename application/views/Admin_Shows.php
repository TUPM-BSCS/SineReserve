		<main>
			<div  class='row'>
				<h1 class='col l8'> Shows </h1>
				<form method='post' name='form_drop_branch' action="http://localhost/SineReserve/index.php/Admin_controller/cinema"
				<div class='branch_dropdown'>
					<label class='col s12 l4'>View By:</label>
					<select id='grouped_by' name='grouped_by' class="browser-default col s12 l4">
						<option>By Branch</option>
						<option>By by</option>
					</select>
					<select id="talala" name="talala" class="browser-default col s12 l4">
						<option>Sine Manila</option>
						<option>Sine Bulacan</option>
						<option>Sine Cavite</option>
					</select>
				</div>
				</form>
			</div>
			<a class="waves-effect waves-light btn modal-trigger" id='addbtn_modal' href="#add-cinema">Add</a>
			<a class="waves-effect waves-light btn modal-trigger" id='editbtn_modal' href="#edit-branch">Edit</a>
			<table class="responsive">
				<table class="responsive-table">
				<thead>
				  <tr>
					  <th data-field="id">Name</th>
					  <th data-field="name">Seats</th>
				  </tr>
				</thead>
				</table>
				<div style="height:400px; overflow:auto;">
				<table class="responsive-table">
				<tbody>
				<?php foreach ($cinema as $row): ?>
				  <tr>
					<td><?php echo $row->cine_name?></td>
					<td><?php echo $row->cine_slots?></td>
				  </tr>
				<?php endforeach ?>
				</tbody>
				</table>
				</div>
			</table>				
			<!-- Modals -->
			
			<div id="add-cinema" class="modal">
				<div class="modal-content">
				<form method="post" action="<?php echo base_url();?>index.php/Admin_controller/insert_cinema_seats">
					<div class='row'>
						<h4 class = 'col s12'>Cinema <?php echo $last_cinema+1;?></h4>
						<div class="input-field col s12">
							<input type="hidden" name="bran_id" value="<?php echo $residing_branch?>">
							<input type="hidden" name="cine_id" value="Cinema <?php echo $last_cinema+1;?>">
							<input placeholder="Insert No. of Seats" id="no_of_seats" name='no_of_seats' type="text" class="validate">
							<label for="no_of_seats">Seats</label>
						</div>	
					</div>
				</div>
				<div class="modal-footer">
				 <button class="btn waves-effect waves-light signup-button" type="submit" name="action">Confirm</button>
				</div>
				</form>
			</div>
			<div id="edit-branch" class="modal">
				<div class="modal-content">
				<div class='row'>
					<h4 class = 'col s12'>Edit Cinema</h4>
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
		<script>
			$('.button-collapse').sideNav();
			$('.modal-trigger').leanModal();
			$('#addbtn_modal').click(function(){
				$('#no_of_seats').val('');
			});
			$('#editbtn_modal').click(function(){
				$('#edit_branch_name').val('');
				$('#edit_branch_address').val('');
			});
		</script>
	</body>
</html>