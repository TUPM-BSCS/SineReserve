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
				<form id="form_reserve" class="col s12" method="POST" action="<?php echo base_url();?>movie_page_controller/reserve_movie/<?php echo $movie_id; ?>">
					
					<div class="row">
						<div class="input-field col s12 m12">
							<input disabled value="<?php echo $movie_name ?>" id="movie_title" type="text" class="validate">
							<label for="movie_title" class="active text-black">Movie Title</label>
						</div>

						<div class="col s12 m8">
							<label>Branch</label>
							<select id="reserve_branch" class="browser-default">
								<option value="" disabled selected>Select the Branch</option>
								<?php
									for($i = 0; $i < sizeof($reserve_branch); $i++) {
										echo '<option id="reserve_branch_option" value="'. $reserve_branch[$i]['bran_id'] .'">' . $reserve_branch[$i]['bran_name'] . '</option>';
									}
								?>
							</select>
							
						</div>

<!-- 						//$.ajax({
  					url: '<?php echo base_url(); ?>index.php/Adminn_controller/ajax_get_shows_information',
  					dataType: 'json',
  					method: 'post',
  					data: {id: the_id},
  					success: function(data) {
  						$('.view-title').text(mov_name);
  						$('.view-date').text(show_date);
  						$('.view-branch').text(bran_name);
  						$('.cinema-list').html('');
  						var row;
  						var current;
  						for(row in data) {
  							if(current != data[row][cine_name]) {
  								current = data[row][cine_id];
  								$('.cinema-list').append('<li>'
										+'<div class="collapsible-header">' + data[row][cine_name] + '</div>'
										+'<div class="collapsible-body">'
											+'<ul class="collection" id="cine_id_'+ data[row][cine_id] +'">'
												+'<li class="collection-item">'+ data[row][start_time] +' - '+ data[row][end_time] +'</li>'
											+'</ul>'
										+'</div>'
									+'</li>');
  							}
  							else {
  								$('#cine_id_'+ cine_id).append('<li class="collection-item">'+ data[row][start_time] +' - '+ data[row][end_time] +'</li>');
  							}
  						} -->

						<div class="col s12 m8">
							<label>Cinema</label>
							<select id="reserve_cinema" class="browser-default">
								<option value="" disabled selected>Select the Cinema</option>
								<?php 
									for($i = 0; $i < sizeof($reserve_cinema); $i++) {
										echo '<option id="reserve_cinema_option" value="'. $reserve_cinema[$i]['cine_id'] .'" href="' . base_url() .'movie_page_controller/get_cinema/' . $reserve_cinema[$i]['bran_id'] . '">' . $reserve_cinema[$i]['cine_name'] . '</option>';
									}
								?>
							</select>
						</div>

						<div class="col s12 m8">
							<label>Date</label>
							<select id="reserve_date" class="browser-default">
								<option value="" disabled selected>Select the Date</option>
								<?php 
									for($i = 0; $i < sizeof($reserve_cinema); $i++) {
										echo '<option id="reserve_date_option" value="'. $reserve_cinema[$i]['bran_id'] .'" href="' . base_url() .'movie_page_controller/get_cinema/' . $reserve_cinema[$i]['bran_id'] . '">' . $reserve_cinema[$i]['bran_name'] . '</option>';
									}
								?>
							</select>
						</div>

						<div class="col s12 m8">
							<label>Time</label>
							<select id="reserve_time" class="browser-default">
								<option value="" disabled selected>Select the Time</option>
								<?php 
									for($i = 0; $i < sizeof($reserve_cinema); $i++) {
										echo '<option id="reserve_time_option" value="'. $reserve_cinema[$i]['bran_id'] .'" href="' . base_url() .'movie_page_controller/get_cinema/' . $reserve_cinema[$i]['bran_id'] . '">' . $reserve_cinema[$i]['bran_name'] . '</option>';
									}
								?>
							</select>
						</div>

						<div class="input-field col s12">
							<input disabled value="<?php echo 'test' ?>" id="movie_title" type="text" class="validate text-black">
							<label for="movie_title" class="active text-black">Movie Price</label>
						</div>
					</div>

					
				</form>
			</div>
			<div class="modal-footer">
				<button form="form_reserve" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="action">Confirm</button>
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
				<button form="form_review" class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="action">Confirm</button>
			</div>
		</div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
		<script type="text/javascript">
			var wawa;
			<?php
				if($movie_type == 'ns' || $movie_type == 'na') {
					if($movie_reserve == 'reserve') {
						echo "$('#reservemodal').openModal();";
					}
				}
			?>

			$('#reserve_branch').change(function() {
				$('#reserve_cinema').html('');
				$('#reserve_date').html('');
				$('#reserve_time').html('');
				var mov_id = <?php echo $movie_id;?>;
				var bran_id = <?php echo $reserve_branch[0]['bran_id'] ?>;
				$.ajax({
  					url: '<?php echo base_url(); ?>index.php/Admin_controller/ajax_get_pua_information',
  					dataType: 'json',
  					method: 'post',
  					data: {mov_id: mov_id, bran_id: bran_id},
  					success: function(data) {
  						wawa = data;
  						console.log(JSON.stringify(data));
  						var sample;
  						for( sample in data) {  							
							$('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
						}
						

  						// $('.view-title').text(mov_name);
  						// $('.view-date').text(show_date);
  						// $('.view-branch').text(bran_name);
  						// $('.cinema-list').html('');
  						// var row;
  						// var current;
  						// for(row in data) {
  						// 	if(current != data[row][cine_name]) {
  						// 		current = data[row][cine_id];
  						// 		$('.cinema-list').append('<li>'
								// 		+'<div class="collapsible-header">' + data[row][cine_name] + '</div>'
								// 		+'<div class="collapsible-body">'
								// 			+'<ul class="collection" id="cine_id_'+ data[row][cine_id] +'">'
								// 				+'<li class="collection-item">'+ data[row][start_time] +' - '+ data[row][end_time] +'</li>'
								// 			+'</ul>'
								// 		+'</div>'
								// 	+'</li>');
  						// 	}
  						// 	else {
  						// 		$('#cine_id_'+ cine_id).append('<li class="collection-item">'+ data[row][start_time] +' - '+ data[row][end_time] +'</li>');
  						// 	}
  						// }
  					},
  					error: function(err) {
  						console.log(err);
  					}
  				});
			});
		</script>
	</body>

</html>