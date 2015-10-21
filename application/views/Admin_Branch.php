<main>
			<h1> Branches </h1>
			<a class="waves-effect waves-light btn modal-trigger" id='addbtn_modal' href="#add-branch">Add</a>
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
			
			<div id="add-branch" class="modal">
				<div class="modal-content">
				<form method="post" action="<?php echo base_url();?>index.php/Admin_controller/add_branch">
					<div class='row'>
						<h4 class = 'col s12'>Add Branch</h4>
						<div class="input-field col s12">
							<input placeholder="Insert Name Here" id="add_branch_name" name='add_branch_name' type="text" class="validate" required>
							<label for="add_branch_name">Branch Name</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Insert Address Here" id="add_branch_address" name='add_branch_address' type="text" class="validate" required>
							<label for="add_branch_address">Branch Address</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				 <button class="btn waves-effect waves-light signup-button" type="submit" id='branch_confirm' name="action">Confirm</button>
				</div>
				</form>
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
				$('#add_branch_name').val('');
				$('#add_branch_address').val('');
			});
			$('#editbtn_modal').click(function(){
				$('#edit_branch_name').val('');
				$('#edit_branch_address').val('');
			});
			$('#branch_confirm').click(function(){
				$('#add_branch_name').val($('#add_branch_name').val().trim());
				$('#add_branch_address').val($('#add_branch_address').val().trim());
			});
		</script>
	</body>
</html>