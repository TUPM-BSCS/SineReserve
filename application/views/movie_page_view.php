<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

		<title>Movie Page</title>

		<!-- CSS  -->
		<link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url(); ?>assets/css/movie_page_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url(); ?>assets/css/movie_page_color_scheme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body class="grey lighten-5">
		<!--Content-->
		<div class="container">
			<div class="row s12 hide-on-med-and-up center-align">
				<h5 class="text-white">
					<?php
							if($movie_name == null) {
								echo 'N/A';
							}

							else {
								echo $movie_name;
							}
						?>
						<span class="blue-text">
						<?php
							if($movie_release_date == null || $movie_rating == null) {
								echo 'N/A';
							}

							else {
								echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '[' . $movie_rating . ']';
							}
						?>
						</span>
					<br />
				</h5>
			</div>

			<div class="row">
				<div class="col s12 m3">
					<img src="
						<?php
							if($movie_name == null) {
								echo base_url().'assets/images/posters/noposter.jpg';
							}

							else {
								echo base_url().$movie_poster_img; 
							}
							
						?>
					" class="responsive-img movie-page-poster materialboxed" />
					<?php
						if($this->session->userdata('hurt-me-plenty') != null) {
							if($movie_type == 'ns') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reservemodal">Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reviewmodal">Rate Me</button>';
							}

							else if($movie_type == 'na') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reservemodal">Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reviewmodal" disabled>Rate Me</button>';
							}

							else if($movie_type == 'cs') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reservemodal" disabled>Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reviewmodal" disabled>Rate Me</button>';
							}

							else {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reservemodal" disabled>Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reviewmodal">Rate Me</button>';
							}
						}

						else {
							if($movie_type == 'ns') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1">Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1">Rate Me</button>';
							}

							else if($movie_type == 'na') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1">Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1" disabled>Rate Me</button>';
							}

							else if($movie_type == 'cs') {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1" disabled>Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1" disabled>Rate Me</button>';
							}

							else {
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1" disabled>Reserve</button>';
								echo '<button class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#modal1">Rate Me</button>';
							}
						}
					?>
					
					<!-- <a class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="#reviewmodal">Rate Me</a>
					<a class="movie_page-btn waves-effect waves btn center-align modal-trigger" href="">Hurt Me Plenty</a> -->
				</div>

				<div class="col s12 m9">
					<h5 class="hide-on-small-only text-primary-color text-white">
						<?php
							if($movie_name == null) {
								echo 'N/A';
							}

							else {
								echo $movie_name;
							}
						?>
						<span class="blue-text">
						<?php
							if($movie_release_date == null || $movie_rating == null) {
								echo 'N/A';
							}

							else {
								echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '[' . $movie_rating . ']';
							}
						?>
						</span>
						<br />
					</h5>

					<hr />
					
					<p class="text-white">
						Plot:
						<br />
						<?php
							if($movie_plot == null) {
								echo 'N/A';
							}

							else {
								 echo $movie_plot; 
							}
						?>
					</p>

					<p class="text-white">
						Running Time:
						<br />
						<?php
							if($movie_running_time == null) {
								echo 'N/A';
							}

							else {
								 echo $movie_running_time . " min(s)";
							}
						?>
					</p>

					<p class="text-white">
						Cast:
						<br />
						<?php
							if($movie_cast == null) {
								echo 'N/A';
							}

							else {
								for($i = 0; $i < count($movie_cast); $i++) {
									if($i == count($movie_cast) - 1) {
										echo $movie_cast[$i]['actor_name'];
									}

									else {
										echo $movie_cast[$i]['actor_name'] . ", ";
									}
								}
							}
						?>
					</p>

					<p class="text-white">
						Genre:
						<br />
						<?php
							if($movie_genre == null) {
								echo 'N/A';
							}

							else {
								for($i = 0; $i < count($movie_genre); $i++) {
									if($i == count($movie_genre) - 1) {
										echo $movie_genre[$i]['genre_name'];
									}

									else {
										echo $movie_genre[$i]['genre_name'] . ", ";
									}
								}
							}
						?>
					</p>

					<ul class="tabs white">
						<li class="tab col s3"><a href="#photos">Photos</a></li>
						<li class="tab col s3"><a href="#videos">Videos</a></li>
						<li class="tab col s3"><a href="#reviews">Reviews</a></li>
					</ul>

					<div class="section">
						<div id="photos">
							<div class="slider">
								<ul class="slides">
									<?php
										if($movie_screenshots != null) {
											for($i = 0; $i < sizeof($movie_screenshots); $i++) {
										?>
											<li><img src="<?php echo base_url().$movie_screenshots[$i]['sc_img']; ?>" alt="Movie Screenshot"></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
						</div>

						<div id="videos">
							<div class="video-container">
								<iframe src="<?php echo $movie_trailer; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>

						<div id="reviews">
							<?php
								if($movie_reviews == null) {
									echo '<p class="center-align text-white">This movie does not have any reviews yet.</p>';
								}

								else {
									for($i = 0; $i < sizeof($movie_reviews); $i++) {
										// if($i % 2 == 0) {
											// echo '<div class="review-card light-grey text-white">';
										// }

										// else {
											echo '<div class="review-card text-white">';
										// }
							?>
								<p class="bold"><?php echo $movie_reviews[$i]['title']; ?></p>
								<p>

								<?php
									for($j = 0; $j < 5; $j++) {
										if($j < $movie_reviews[$i]['user_rating']) {
								?>
											<i class='material-icons'>star</i>
								<?php
										}

										else {
								?>
											<i class='material-icons'>star_border</i>
								<?php
										}
									}
								?>

								<?php echo '('.$movie_reviews[$i]['user_rating'].' out of 5)'; ?>
								<br />
								<?php echo date('F d Y', strtotime($movie_reviews[$i]['review_date'])); ?>
								</p>
								<p class="review italic justify"> "<?php echo $movie_reviews[$i]['review']; ?>" </p>
								<p class="right-align"> written by: <?php echo $movie_reviews[$i]['username']; ?> </p>
							</div>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="reservemodal" class="modal modal-fixed-footer">
			<div class="modal-header red">
				<a class="modal-close btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">clear</i></a>
				<p class="text-white">Reservation Form</p>
			</div>
			<div class="modal-content">
				<form id="form_reserve" class="col s12" method="POST" action="<?php echo base_url();?>movie_page_controller/reserve_movie/<?php echo $movie_id; ?>/<?php echo $movie_type; ?>">
					
					<div class="row">
						<div class="input-field col s12 m12">
							<input readonly value="<?php echo $movie_name ?>" id="movie_title" type="text" class="validate">
							<label for="movie_title" class="active text-black">Movie Title</label>
						</div>

						<div class="col s12 m8">
							<label>Branch</label>
							<select id="reserve_branch" name="reserve_branch" class="browser-default">
								<option value="" disabled selected>Select a Branch</option>
								<?php
									for($i = 0; $i < sizeof($reserve_branch); $i++) {
										echo '<option id="reserve_branch_option" value="'. $reserve_branch[$i]['bran_id'] .'">' . $reserve_branch[$i]['bran_name'] . '</option>';
									}
								?>
							</select>
							
						</div>

						<div class="col s12 m8">
							<label>Cinema</label>
							<select id="reserve_cinema" name="reserve_cinema" class="browser-default">
								<option value="" disabled selected>Select a Branch</option>
							</select>
						</div>

						<div class="col s12 m8">
							<label>Date</label>
							<select id="reserve_date" name="reserve_date" class="browser-default">
								<option value="" disabled selected>Select a Branch</option>
							</select>
						</div>

						<div class="col s12 m8">
							<label>Time</label>
							<select id="reserve_time" name="reserve_time" class="browser-default">
								<option value="" disabled selected>Select a Branch</option>
							</select>
						</div>

						<div class="input-field col s12 m6">
							<div id="remaining_seats">
								<input readonly value="Select a Branch" id="slots_avail" name="slots_avail" type="text" class="validate text-black">
								<label for="slots_avail" class="active text-black">Slots Available</label>
							</div>
						</div>

						<div class="input-field col s12 m6">
							<div id="movie_price">
								<input readonly value="Select a Branch" id="reserve_cost" name="reserve_cost" type="text" class="validate text-black">
								<label for="reserve_cost" class="active text-black">Movie Cost</label>
							</div>
						</div>
					</div>
					
				</form>
			</div>
			<div class="modal-footer">
				<button form="form_reserve" class="modal-action modal-close waves-effect waves-green btn-flat red text-white" type="submit" name="action">Confirm</button>
			</div>
		</div>

		<div id="reviewmodal" class="modal modal-fixed-footer">.
			<div class="modal-header red row">
				<a class="modal-close btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">clear</i></a>
				<p class="text-white">Write a Review for "<?php echo $movie_name ?>"</p>
			</div>
			<div class="modal-content">
				<form id="form_review" class="col s12" method="POST" action="<?php echo base_url();?>movie_page_controller/review_movie/<?php echo $movie_id; ?>/<?php echo $movie_type; ?>">
					<div class="row">
						<div class="input-field col s12">
							<input disabled value="<?php echo $movie_name ?>" id="movie_title" type="text" class="validate text-black">
							<label for="movie_title" class="active text-black">Movie Title</label>
						</div>

						<div class="input-field col s12">
							<input id="review_title" type="text" class="text" length="50" name="review_title">
							<label for="review_title" class="text-black">Review Title</label>
						</div>
						
						<label for="star-rating" class="col s12 text-black">Movie Rating</label>
						<div class="col s12">
							<span id="rating" class="star-rating">
								<input type="radio" id="star1" name="review_rating" value="1"><i></i>
								<input type="radio" id="star2" name="review_rating" value="2"><i></i>
								<input type="radio" id="star3" name="review_rating" value="3"><i></i>
								<input type="radio" id="star4" name="review_rating" value="4"><i></i>
								<input type="radio" id="star5" name="review_rating" value="5"><i></i>
							</span>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<textarea id="review" class="materialize-textarea" name="review_content"></textarea>
								<label for="review">Review</label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button form="form_review" class="modal-action modal-close waves-effect waves-green btn-flat red text-white" type="submit" name="action">Confirm</button>
			</div>
		</div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
		<script type="text/javascript">
			<?php
				if($movie_type == 'ns' || $movie_type == 'na') {
					if($movie_reserve == 'reserve') {
						if($this->session->userdata('hurt-me-plenty') != null) {
							echo "$('#reservemodal').openModal();";
						}

						else {
							echo "$('#modal1').openModal();";
						}
					}
				}
			?>

			var mov_id = <?php echo $movie_id;?>;
			var bran_id, cine_id, show_date, start_time, end_time, slots_avail;

			$('#reserve_branch').change(function() {
				$('#reserve_cinema').html('').append('<option value="" disabled selected>Select a Cinema</option>');
				$('#reserve_date').html('').append('<option value="" disabled selected>Select a Cinema</option>');
				$('#reserve_time').html('').append('<option value="" disabled selected>Select a Cinema</option>');
				$('#remaining_seats').html('').append('<input readonly value="Select a Cinema" id="slots_avail" name="slots_avail" type="text" class="validate text-black"><label for="slots_avail" class="active text-black">Slots Available</label>');
				$('#movie_price').html('').append('<input readonly value="Select a Cinema" id="reserve_cost" name="reserve_cost" type="text" class="validate text-black"><label for="reserve_cost" class="active text-black">Movie Cost</label>');
				
				bran_id = <?php echo $reserve_branch[0]['bran_id'] ?>;

				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/movie_page_controller/ajax_get_reserve_cinema',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, bran_id: bran_id},
  					success: function(data) {
  						// console.log(JSON.stringify(data));
  						for(var sample in data) {
							$('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
						}
  					},
  				});
			});

			$('#reserve_cinema').change(function() {
				$('#reserve_date').html('').append('<option value="" disabled selected>Select a Date</option>');
				$('#reserve_time').html('').append('<option value="" disabled selected>Select a Date</option>');
				$('#remaining_seats').html('').append('<input readonly value="Select a Date" id="slots_avail" name="slots_avail" type="text" class="validate text-black"><label for="slots_avail" class="active text-black">Slots Available</label>');
				$('#movie_price').html('').append('<input readonly value="Select a Date" id="reserve_cost" name="reserve_cost" type="text" class="validate text-black"><label for="reserve_cost" class="active text-black">Movie Cost</label>');
				
				cine_id = $('#reserve_cinema').val();

				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/movie_page_controller/ajax_get_reserve_date',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, bran_id: bran_id, cine_id: cine_id},
  					success: function(data) {
  						// console.log(JSON.stringify(data));
  						for(var sample in data) {
							$('#reserve_date').append('<option id="reserve_date_option" value="' + data[sample]['show_date'] + '">' + data[sample]['show_date'] + '</option>');
						}
  					},
  				});
			});

			$('#reserve_date').change(function() {
				$('#reserve_time').html('').append('<option value="" disabled selected>Select a Time</option>');
				$('#remaining_seats').html('').append('<input readonly value="Select a Time" id="slots_avail" name="slots_avail" type="text" class="validate text-black"><label for="slots_avail" class="active text-black">Slots Available</label>');
				$('#movie_price').html('').append('<input readonly value="Select a Time" id="reserve_cost" name="reserve_cost" type="text" class="validate text-black"><label for="reserve_cost" class="active text-black">Movie Cost</label>');
				
				show_date = $('#reserve_date').val();

				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/movie_page_controller/ajax_get_reserve_time',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, show_date: show_date, bran_id: bran_id, cine_id: cine_id},
  					success: function(data) {
  						// console.log(JSON.stringify(data));
  						for(var sample in data) {
							$('#reserve_time').append('<option id="reserve_time_option" value="' + data[sample]['start_time'] + " - " + data[sample]['end_time'] + '">' + data[sample]['start_time'] + " - " + data[sample]['end_time'] + '</option>');
						}
  					},
  				});
			});

			$('#reserve_time').change(function() {
				start_time = $('#reserve_time :selected').val().substr(0, 8);
				end_time = $('#reserve_time :selected').val().substr(11, 8);

				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/movie_page_controller/ajax_get_reserve_cost',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, start_time: start_time, end_time: end_time, show_date: show_date, bran_id: bran_id, cine_id: cine_id},
  					success: function(data) {
  						// console.log(JSON.stringify(data));
  						for(var sample in data) {
  							$('#movie_price').html('').append('<input readonly value=' + data[sample]['cost'] + ' id="reserve_cost" name="reserve_cost" type="text" class="validate text-black"><label for="reserve_cost" class="active text-black">Movie Cost</label>');
  						}
  					},
  				});

  				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/movie_page_controller/ajax_get_reserve_slots',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, start_time: start_time, end_time: end_time, show_date: show_date, bran_id: bran_id, cine_id: cine_id},
  					success: function(data) {
  						// console.log(JSON.stringify(data));
  						for(var sample in data) {
  							$('#remaining_seats').html('').append('<input readonly value=' + data[sample]['slots_avail'] + ' id="slots_avail" name="slots_avail" type="text" class="validate text-black"><label for="slots_avail" class="active text-black">Slots Available</label>');
  							
  							slots_avail = data[sample]['slots_avail'];
  							if(slots_avail == 0) {
  								$('.modal-footer').html('').append('<button disabled form="form_reserve" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="action">Confirm</button>');
  							}

  							else {
  								$('.modal-footer').html('').append('<button form="form_reserve" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="action">Confirm</button>');
  							}
  						}
  					},
  				});
			});
		</script>
	</body>

</html>