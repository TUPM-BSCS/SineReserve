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
					<span class="blue-text"> <?php echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '<br />[' . $movie_rating . ']'; ?></span>
				</h5>
			</div>

			<div class="row">
				<div class="col s12 m3">
					<img src="<?php echo base_url().$movie_poster_img; ?>" class="responsive-img movie-page-poster materialboxed" />
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#reservemodal">Reserve</a>
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#modal1">Rate Me</a>
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#modal1">Hurt Me Plenty</a>
				</div>

				<div class="col s12 m9">
					<h5 class="hide-on-small-only text-primary-color text-white">
						<?php echo $movie_name; ?>
						<span class="blue-text"> <?php echo '(' . date('Y', strtotime($movie_release_date)) . ')'?> <?php echo '<br />[' . $movie_rating . ']'; ?></span>
						<div class="chip"> <?php echo $movie_genre; ?> </div>
					</h5>
					
					<p class="text-white"> <?php echo $movie_plot; ?> </p>

					<h6 class="text-white">Cast:</h6>
						 <div class="chip">
							<?php echo $movie_cast; ?>
						</div> 
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
			<div class="modal-header red row">
				<p class="header-label col s11">Reservation Form</p>
				<a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat valign col s1"><i class="mdi-navigation-close mdi-inverse"></i></a>
			</div>

			<div class="modal-content">
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input disabled value="I am not editable" id="movie_title" type="text" class="validate">
							<label for="movie_title" class="active">Movie Title</label>
						</div>

						<div class="input-field col s4">
							<select>
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
							</select>
							<label>Date</label>
						</div>

						<div class="input-field col s4">
							<select>
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
							</select>
							<label>Time</label>
						</div>

						<div class="input-field col s4">
							<select>
								<option value="" disabled selected>Choose your option</option>
								<option value="1">Option 1</option>
							</select>
							<label>Venue</label>
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Confirm</a>
			</div>
		</div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	</body>

</html>