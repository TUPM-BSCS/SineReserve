		<main>
			<div  class='row'>
				<h1 class='col l8'> Cinema </h1>
				<form method='post' name='form_drop_branch' action="http://localhost/SineReserve/index.php/Admin_controller/cinema"
				<div class='branch_dropdown'>
					<label class='col s12 l4'>View by Branch:</label>
					<select id='branch_for_cinema' name='for_branch' class="browser-default col s12 l4" onchange="this.form.submit();">
						<?php foreach($branch as $row):?>
						<?php var_dump($residing_branch);
							if($row->bran_id == $residing_branch)
								echo "<option selected value='".$row->bran_id."'>".$row->bran_name."</option>";
							else
								echo "<option value='".$row->bran_id."'>".$row->bran_name."</option>";
						?>
						<?php endforeach ?>
					</select>
				</div>
				</form>
			</div>
			<a class="waves-effect waves-light btn modal-trigger" id='addbtn_modal' href="#add-cinema">Add</a>
			<table class="responsive">
				<table class="responsive-table">
				<thead>
				  <tr>
					  <th style="width:50%" data-field="id">Name</th>
					  <th style="width:50%" data-field="name">Seats</th>
				  </tr>
				</thead>
				</table>
				<div style="height:400px; overflow:auto;">
				<table class="responsive-table">
				<tbody>
				<?php foreach ($cinema as $row): ?>
				  <tr>
					<td style="width:50%"><?php echo $row->cine_name?></td>
					<td style="width:50%"><?php echo $row->cine_slots?></td>
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
							<input placeholder="Insert No. of Seats" id="no_of_seats" name='no_of_seats' type="number" class="validate" required>
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
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/admin.js"></script>
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