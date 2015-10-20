		<main>
			<div  class='row'>
				<h1 class='col l8'> Shows </h1>
				<form method='post' name='form_drop_branch' action="http://localhost/SineReserve/index.php/Admin_controller/cinema"
				<div class='branch_dropdown'>
					<label class='col s12 l4'>View By:</label>
					<select id='grouped_by' name='grouped_by' class="browser-default col s12 l4"
						onchange="window.location.href='<?php echo base_url(); ?>index.php/Adminn_controller/shows/' + this.value">
						<option value="time" <?php if($view == 'time') echo "selected"; ?>>Period of Time</option>
						<option value="branch" <?php if($view == 'branch') echo "selected"; ?>>Branch</option>
						<option value="movie" <?php if($view == 'movie') echo "selected"; ?>>Movie</option>
					</select>

					<!-- By Period of Time -->
					<div class="view-by-time <?php if($view != 'time') echo "hide"; ?>">
						<label class="col s12 l2">From</label>
						<label class="col l2 hide-on-med-and-down">To</label>
						<input <?php if($view == 'time') echo 'data-value="' . $time['from'] . '"'; ?> id="from" type="date" class="datepicker col s12 l2" placeholder="Pick a Date">
						<label class="col s12 hide-on-large-only">To</label>
						<input <?php if($view == 'time') echo 'data-value="' . $time['to'] . '"'; ?> id="to" type="date" class="datepicker col s12 l2" placeholder="Pick a Date">
					</div>

					<!-- By Branch -->
					<div class="view-by-branch <?php if($view != 'branch') echo "hide"; ?>">
						<select id="branch" name="branch" class="browser-default col s12 l4"
							onchange="window.location.href='<?php echo base_url(); ?>index.php/Adminn_controller/shows/branch/' + this.value">
							<option <?php if($branch == 'all') echo 'selected'; ?> value="all">All Branches</option>
							<?php foreach($branches as $row): ?>
								<option <?php if($branch == $row->bran_id) echo 'selected' ?> value="<?php echo $row->bran_id; ?>"><?php echo $row->bran_name;?></option>
							<?php endforeach ?>
						</select>
					</div>

					<!-- By Movie -->
					<div class="view-by-movie input-field col s12 l4 <?php if($view != 'movie') echo "hide"; ?>">
						<i class="material-icons prefix">search</i>
			         <input id="icon_prefix" type="text" class="validate">
			         <label for="icon_prefix">Search a Movie</label>
					</div>

				</div>
				</form>
			</div>
			<a class="waves-effect waves-light btn modal-trigger" id='addbtn_modal' href="#add-show">Add</a>
			<table class="responsive">
				<table class="responsive-table">
				<thead>
				  <tr>
					  <th data-field="movie_name">Movie Name</th>
					  <th data-field="show_date">Date</th>
					  <th data-field="branch">Branch</th>
					  <!-- <th data-field="sold">Sold</th> -->
					  <th data-field="details">Details</th>
				  </tr>
				</thead>
				</table>
				<div style="height:400px; overflow-y:auto;">
				<table class="responsive-table">
				<tbody>
				<?php foreach ($table as $row): ?>
				 	<tr>
						<td><?php echo $row->mov_name;?></td>
						<td style="width: 16%;"><?php echo $row->show_date;?></td>
						<td style="width: 23%"><?php echo $row->bran_name;?></td>
						<td style="width: 23%;"><a class="waves-effect waves-light btn modal-trigger" id="show_<?php echo $row->sched_id; ?>" href="#view_show_<?php echo $row->sched_id; ?>">View Details</a></td>
				  	</tr>
				<?php endforeach ?>
				</tbody>
				</table>
				</div>
			</table>				
			<!-- Modals -->
			
			<div id="add-show" class="modal">				
				<div class="modal-content">
				<form method="post" action="#">
					<div class='row'>
						<h4 class = 'col s12'>Add Shows</h4>
						<div class="input-field col s12">
							<!-- Movie Input Field -->
							<i class="material-icons prefix">search</i>
				         <input id="icon_prefix" name="movie" type="text" class="validate">
				         <label for="icon_prefix">Search a Movie</label>

				         <!-- Branch Input Field -->
				         <select id="modal-branch" name="branch" class="browser-default col s12 l6">
				         	<option disabled selected>Select a branch</option>
								<?php foreach($branches as $row): ?>
									<option value="<?php echo $row->bran_id; ?>"><?php echo $row->bran_name;?></option>
								<?php endforeach ?>
							</select>

							<!-- Cinema Input Field -->
							<select disabled id="modal-cinema" name="branch" class="browser-default col s12 l6">
								<option id="#cine-append-here" disabled selected>Select a cinema</option>
							</select>
						</div>	
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn waves-effect waves-light signup-button" type="submit" name="action">Confirm</button>
				</div>
				</form>
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
			$('.datepicker').pickadate({
    			selectMonths: true,
    			selectYears: 15,
    			formatSubmit: 'yyyy-mm-dd',
    			format: 'yyyy-mm-dd',
    			closeOnSelect: true,
    			min: <?php echo $limits['min'] ?>,
    			max: <?php echo $limits['max'] ?>,
    			clear: "",
    			onClose: function(context) {
    				if(new Date($('#from').val()) > new Date($('#to').val())) {
    					var to = $('#from').val();
    					var from = $('#to').val();
    				}
    				else {
    					var to = $('#to').val();
    					var from = $('#from').val();
    				}
    				window.location.href='<?php echo base_url(); ?>index.php/Adminn_controller/shows/time/' + from + '_' + to;
    			}
  			});

			$('#modal-branch').change(function() {
				$('#modal-cinema').removeAttr('disabled');
				$('#modal-cinema').attr('enabled', true);
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Adminn_controller/ajax_get_cinemas_by_branch',
					type: post,
					dataType: json,
					data: {branch: $('#modal-branch').val()},
					success: function(data) {
						alert(JSON.stringify(data));
					},
					error: function(error) {
						alert(error);
					}
				});
			});
		</script>
	</body>
</html>