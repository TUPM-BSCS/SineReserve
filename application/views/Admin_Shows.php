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
						<td style="width: 23%;"><a class="waves-effect waves-light btn modal-trigger view-details" data-mov-name="<?php echo $row->mov_name; ?>" data-show-date="<?php echo $row->show_date; ?>" data-bran-name="<?php echo $row->bran_name; ?>" id="show_<?php echo $row->sched_id; ?>" href="#view-details">View Details</a></td>
				  	</tr>
				<?php endforeach ?>
				</tbody>
				</table>
				</div>
			</table>				
			<!-- Modals -->
			<div id="view-details" class="modal">
				<div class="modal-content">
					<div class="row">
						<div class="section">
							<h4 class="view-title">Kingsman: The Secret Service</h4>
							<h5 class="col s12 m6 blue-text view-date">2015-02-14</h5>
							<h5 class="col s12 m6 blue-text view-branch">Sine Manila</h5>
						</div>
						<br>
						<div class="section">
							<ul class="collapsible cinema-list" data-collapsible="accordion">
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="add-show" class="modal">				
				<form method="post" action="#">
				<div class="modal-content">
					<div class='row'>
						<h4 class = 'col s12'>Add Shows</h4>
						<div class="input-field col s12">
							<!-- Movie Input Field -->
							<div class="row">
								<div class="input-field col s12 l6" style="margin-top: 0px">
									 <input id="modal-movie" name="movie" type="text" class="validate" placeholder="Search a Movie" required>
									 <input id="modal-movie-hidden" value="-1" type="hidden" name="movie-hidden">
									 <div id="modal-movie-results" class="collections">
							         	
							         </div>
								</div>
					         <input placeholder="Input Show Cost" id="modal-cost" type="number" class="validate col s12 l6" name="cost" required>
					      </div>

				         <!-- Date Input Field -->
				         <div class="row">
								<input <?php echo 'data-value="' . $today . '"'; ?> id="today" type="date" class="modal-datepicker col s12 l6" placeholder="Pick a Date" required>
						      <input placeholder="Input a Starting Time" id="modal-time" type="text" class="validate lolliclock col s12 l6" name="time">
							</div>

				         <!-- Branch Input Field -->
				         <select id="modal-branch" name="branch" class="browser-default col s12 l6" required>
				         	<?php $wawa = 0; ?>
								<?php foreach($branches as $row): ?>
									<option <?php if($wawa == 0) echo 'selected'; ?> value="<?php echo $row->bran_id; ?>"><?php echo $row->bran_name;?></option>
								<?php $wawa++; endforeach ?>
							</select>

							<!-- Cinema Input Field -->
							<select disabled id="modal-cinema" name="cinema" class="browser-default col s12 l6" required>
								<option id="#cine-append-here" disabled selected>Select a cinema</option>
							</select>
							<div class="row add-result center">
								
							</div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
						</div>	
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn waves-effect waves-light" type="submit" name="action" id="add-submit">Confirm</button>
				</div>
				</form>
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
    				window.location.href='<?php echo base_url(); ?>index.php/Admin_controller/shows/time/' + from + '_' + to;
    			}
  			});

  			$('.modal-datepicker').pickadate({
    			selectMonths: true,
    			selectYears: 15,
    			formatSubmit: 'yyyy-mm-dd',
    			format: 'yyyy-mm-dd',
    			closeOnSelect: true,
    			min: <?php echo $today ?>,
    			clear: ""
  			});

  			$('#add-submit').click(function(event) {
  				event.preventDefault();
  				var cinema = $('#modal-cinema').val();
  				var movie = $('#modal-movie-hidden').val();
  				var date = $('#today').val();
  				var start = $('#modal-time').val();
  				var cost = $('#modal-cost').val();
  				$('.add-result').html('');
  				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/Admin_controller/ajax_add_shows',
  					dataType: 'json',
  					method: 'post',
  					data: {cinema: cinema, movie: movie, date: date, start: start, cost: cost},
  					success: function(data) {
  						console.log(data);
  						if (data == false) {
  							$('.add-result').append('The cinema selected is already occupied on the selected date');
  						}
  						else {
  							$('.add-result').addClass('green-text');
  							var i;
  							for(i in data['start']) {
  								$('.add-result').append(data['start'][i] + ' - ' + data['end'][i] + '<br>');
  							}
  						}

  					},
  					error: function(err) {
  						console.log(err);
  					}
  				}); 
  			});

  			$('.view-details').click(function() {
  				var the_id; 
  				the_id = $(this).attr('id');
  				the_id = the_id.replace("show_", "");
  				var mov_name = $(this).attr('data-mov-name');
  				var show_date = $(this).attr('data-show-date');
  				var bran_name = $(this).attr('data-bran-name');
  				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/Admin_controller/ajax_get_shows_information',
  					dataType: 'json',
  					method: 'post',
  					data: {id: the_id},
  					success: function(data) {
  						$('.view-title').text(mov_name);
  						$('.view-date').text(show_date);
  						$('.view-branch').text(bran_name);
  						$('.cinema-list').html('');
  						console.log(JSON.stringify(data));
  						var row;
  						var current;
  						for(row in data) {
  							if(current != data[row]['cine_id']) {
  								current = data[row]['cine_id'];
  								$('.cinema-list').append('<li>'
										+'<div class="collapsible-header">' + data[row]['cine_name'] + '</div>'
										+'<div class="collapsible-body">'
											+'<ul class="collection" id="cine_id_'+ data[row]['cine_id'] +'">'
												+'<li class="collection-item">'+ data[row]['start_time'] +' - '+ data[row]['end_time'] +'</li>'
											+'</ul>'
										+'</div>'
									+'</li>');
  							}
  							else {
  								$('#cine_id_'+ cine_id).append('<li class="collection-item">'+ data[row]['start_time'] +' - '+ data[row]['end_time'] +'</li>');
  							}
  						}
  						$('.cinema-list').collapsible();
  					},
  					error: function(error, wawa, meme) {
  						console.log(error);
  					}
  				});
  			});

  			function branch_changed() {
  				$('#modal-cinema').removeAttr('disabled');
				$('#modal-cinema').attr('enabled', true);
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/Admin_controller/ajax_get_cinemas_by_branch',
					method: 'post',
					dataType: 'json',
					data: {branch: $('#modal-branch').val()},
					success: function(data) {
						console.log(JSON.stringify(data));
						$('#modal-cinema').html('');
						var row;
						for(row in data) {
							if(row == 0)
								$('#modal-cinema').append(
									'<option selected value="' + data[row]['cine_id'] + '">' + data[row]['cine_name'] + '</option>'
								);
							else
								$('#modal-cinema').append(
									'<option value="' + data[row]['cine_id'] + '">' + data[row]['cine_name'] + '</option>'
								);
						}
					},
					error: function(error) {
						console.log(error);
					}
				});
  			}

			$(document).ready(function() {
				branch_changed();
			});

			$('modal-branch').change(function() {
				branch_changed();
			});

			// Search_Results pls edit how to retrieve data

			var BASE_URL = "<?php echo base_url();?>";

			$("#modal-movie").keyup(function() {
				$('#modal-movie-results').html('');
				var search_term = $('#modal-movie').val();
				
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/search_controller/ajax_search',
					dataType: 'json',
					method: 'post',
					data: {search_term: search_term},
					success: function(data) {
						console.log(JSON.stringify(data));
						for(var sample in data) {
							if(data == 'No Result') {
								$('#modal-movie-results').html('').append('<a class="collection-item white black-text center-align"><img class="responsive-img" src="">No Results Found.</a>');;
							}

							else {
								// '+ BASE_URL + 'index.php/movie_page_controller/movie/' + data[sample]['mov_id'] + '/
								// $('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
								$('#modal-movie-results').append('<a href="#" data-mov-id="'+ data[sample]['mov_id'] +'" data-mov-name="'+ data[sample]['mov_name'] +'" class="collection-item white black-text valign-wrapper clickity"><img class="responsive-img" src="' + BASE_URL + data[sample]['mov_poster_img'] + '" style="max-height: 60px; margin-right: 10px;"><span class="movie-title">' + data[sample]['mov_name'] + '</span></a>');
								$('.clickity').click(function(event) {
									event.preventDefault();
									var thiss = this;
									$('#modal-movie').val($(thiss).attr('data-mov-name'));
									$('#modal-movie-hidden').val($(thiss).attr('data-mov-id'));
									$('$modal-movie-results').html('');
								});
							}
						}
					},
				});
			});

 

      $("#modal-movie_mob").keyup(function(){
        $('#modal-movie-results_mob').html('');

        var search_term = $('#modal-movie_mob').val();
        
        $.ajax({
          url: '<?php echo base_url(); ?>index.php/search_controller/ajax_search',
          dataType: 'json',
          method: 'post',
          data: {search_term: search_term},
          success: function(data) {
            console.log(JSON.stringify(data));        
            for(var sample in data) {
              if(data == 'No Result') {
                $('#modal-movie-results_mob').html('').append('<a class="collection-item white black-text center-align"><img class="responsive-img" src="">No Results Found.</a>');;
              }

              else {
                // $('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
                $('#modal-movie-results_mob').append('<a href="'+ BASE_URL + 'index.php/movie_page_controller/movie/' + data[sample]['mov_id'] + '/" class="collection-item white black-text valign-wrapper"><img class="responsive-img" src="' + BASE_URL + data[sample]['mov_poster_img'] + '" style="max-height: 60px; margin-right: 10px;"><span class="movie-title">' + data[sample]['mov_name'] + '</span></a>');
              }
            }

          },
        });
      });

			
			var mousedownHappened = false;
      var mousedownHappenedMobile = false;

			$("#modal-movie-results").mousedown(function() {
				if($("#no-result").length == 0)
        mousedownHappened = true;
			});

      $("#modal-movie-results_mob").mousedown(function() {
        if($("#no-result").length == 0)
        mousedownHappenedMobile = true;
      });

			$("#modal-movie").blur(function(){
				if(mousedownHappened) {
					setTimeout(function() {
						$('#modal-movie').focus();
					}, 1);

					mousedownHappened = false;
				}

				else {
					$('#modal-movie-results').html('');
				}
				// setTimeout(function() {
				// 	$('#modal-movie').focus();
				// }, 1000);
			});


		</script>
	</body>
</html>