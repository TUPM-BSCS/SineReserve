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
					<?php echo $movie_name; ?>
					<span class="blue-text"> <?php echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '[' . $movie_rating . ']'; ?></span>
					<br />
					<?php
							foreach($movie_genre as $child) {
								foreach ($child as $value) {
									echo $value."| ";
								}
							}
						?>
				</h5>
			</div>

			<div class="row">
				<div class="col s12 m3">
					<img src="<?php echo base_url().$movie_poster_img; ?>" class="responsive-img movie-page-poster materialboxed" />
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#reservemodal">Reserve</a>
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#reviewmodal">Rate Me</a>
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="">Hurt Me Plenty</a>
				</div>

				<div class="col s12 m9">
					<h5 class="hide-on-small-only text-primary-color text-white">
						<?php echo $movie_name; ?>
						<span class="blue-text"><?php echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '[' . $movie_rating . ']'; ?></span>
						<br />
						<?php
							foreach($movie_genre as $child) {
								foreach ($child as $value) {
									echo $value."| ";
								}
							}
							// echo "<pre>";
							// var_dump($movie_genre);
							// echo "</pre>";
						?>
					</h5>
					
					<p class="text-white"> <?php echo $movie_plot; ?> </p>

					<h6 class="text-white">Cast:</h6>
						<p class="text-white">
							<?php
								foreach($movie_cast as $child) {
									foreach ($child as $value) {
										echo $value."<br />";
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
								if($movie_reviews != null) {
									for($i = 0; $i < sizeof($movie_reviews); $i++) {
							?>
							<div class="review-card">
								<h6 class="bold text-white"><?php echo $movie_reviews[$i]['title']; ?></h6>
								<h6>

								<?php
									for($j = 0; $j < $movie_reviews[$i]['user_rating']; $j++) {
								?>
								<i class='tiny mdi-action-stars'></i>
								<?php
									}
								?>

								<?php echo '('.$movie_reviews[$i]['user_rating'].' out of 5)'; ?>
								<br />
								<?php echo date('F d Y', strtotime($movie_reviews[$i]['review_date'])); ?>
								</h6>
								<p class="review italic justify text-white"> "<?php echo $movie_reviews[$i]['review']; ?>" </p>
								<h6 class="right-align text-white"> written by: <?php echo $movie_reviews[$i]['username']; ?> </h6>
							</div>
							<?php
									}
								}

								else {
								echo 'no reviews yet';
							?>
							<!-- INSERT "NO REVIEWS YET CODE HERE" -->
							<?php
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
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12 m12">
							<input disabled value="<?php echo $movie_name ?>" id="movie_title" type="text" class="validate">
							<label for="movie_title" class="active">Movie Title</label>
						</div>

						<div class="input-field col s12 m6">
							<select>
								<option value="" disabled selected>Select the Date</option>
								<option value="1">Option 1</option>
							</select>
							<label>Date</label>
						</div>

						<div class="input-field col s12 m6">
							<select>
								<option value="" disabled selected>Select the Time</option>
								<option value="1">Option 1</option>
							</select>
							<label>Time</label>
						</div>

						<div class="input-field col s12 m6">
							<select>
								<option value="" disabled selected>Select the Location</option>
								<option value="1">Option 1</option>
							</select>
							<label>Location</label>
						</div>

						<div class="input-field col s12 m6">
							<select>
								<option value="" disabled selected>Select the Cinema</option>
								<option value="1">Option 1</option>
							</select>
							<label>Cinema</label>
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<a href="<?php echo base_url();?> index.php/controller_name/method_name/optional_parameter" class="modal-action modal-close waves-effect waves-green btn-flat ">Confirm</a>
			</div>
		</div>

		<div id="reviewmodal" class="modal modal-fixed-footer">
			<div class="modal-header red row">
				<a class="modal-close btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">clear</i></a>
				<p class="text-white">Review Form</p>
			</div>

			<div class="modal-content">
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input disabled value="MOVIE TITLE" id="movie_title" type="text" class="validate">
							<label for="movie_title" class="active text-black">Movie Title</label>
						</div>

						<div class="input-field col s12">
							<input id="review_title" type="text" class="text" length="50">
							<label for="review_title" class="text-black">Review Title</label>
						</div>
						
						<label for="star-rating" class="col s12 text-black">Movie Rating</label>
						<div class="col s12">
							<span id="rating" class="star-rating">
								<input type="radio" id="star1" name="rating" value="1"><i></i>
								<input type="radio" id="star2" name="rating" value="2"><i></i>
								<input type="radio" id="star3" name="rating" value="3"><i></i>
								<input type="radio" id="star4" name="rating" value="4"><i></i>
								<input type="radio" id="star5" name="rating" value="5"><i></i>
							</span>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<textarea id="review" class="materialize-textarea"></textarea>
								<label for="review">Review</label>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<a href="<?php echo base_url();?> index.php/controller_name/method_name/optional_parameter" class="modal-action modal-close waves-effect waves-green btn-flat ">Confirm</a>
			</div>
		</div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	</body>

</html>