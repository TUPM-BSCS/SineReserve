<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  		
  		<title>Movie Page</title>

  		<!-- CSS  -->
  		<link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url(); ?>assets/css/movie_page_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url(); ?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url();?>assets/css/sticky.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body class="grey lighten-5">
		<div class="container">
			<h5>
				<?php echo $movie_name; ?>
				<span class="blue-text"> <?php echo '[' . $movie_release_date . ']' ?> <?php echo '[' . $movie_rating . ']'; ?></span>
			</h5>

			<hr />

			<div class="container hide-on-med-and-up">
				<div class="section">
					<img src="<?php echo base_url().$movie_poster_img; ?>" class="responsive-img movie-page-poster materialboxed" />
				</div>
			</div>

			<div class="row">
				<div class="col s9">
					<h6>Plot:</h6>
					<p> <?php echo $movie_plot; ?> </p>
					
					<h6>Genre:</h6>
					<div class="chip"> <?php echo $movie_genre; ?> </div>

					<h6>Cast:</h6>
					<div class="chip">
<!-- 							<div class="row">
								<div class="col s12 m7"> -->
<!--

									<div class="card">
										<div class="card-image">
											<img class="responsive-img" src="<?php echo base_url().$movie_cast[$i]['actor_img']; ?>">
											<span class="card-title">Card Title</span>
										</div>

										<div class="card-content">
											<p><?php echo $movie_cast[$i]['actor_fname'].' '.$movie_cast[$i]['actor_lname']; ?> as <?php echo $movie_cast[$i]['cast_role']; ?></p>
										</div>
									</div>
-->

<!-- 								</div>
							</div> -->
						<?php echo $movie_cast; ?>
					</div>
				</div>

				<div class="col s3 hide-on-small-only"><img src="<?php echo base_url().$movie_poster_img; ?>" class="responsive-img movie-page-poster materialboxed" />
					<a class="waves-effect waves-teal btn-flat center-align modal-trigger" style="width: 100%;" href="#modal1">Reserve</a>
				</div>
					
				<div id="modal1" class="modal modal-fixed-footer">
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
										<option value="2">Option 2</option>
										<option value="3">Option 3</option>
									</select>
									<label>Date</label>
								</div>
								
								<div class="input-field col s4">
									<select>
										<option value="" disabled selected>Choose your option</option>
										<option value="1">Option 1</option>
										<option value="2">Option 2</option>
										<option value="3">Option 3</option>
									</select>
									<label>Time</label>
								</div>

								<div class="input-field col s4">
									<select>
										<option value="" disabled selected>Choose your option</option>
										<option value="1">Option 1</option>
										<option value="2">Option 2</option>
										<option value="3">Option 3</option>
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
			</div>

			<div class="col s12 m12">
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
										<h6 class="bold"><?php echo $movie_reviews[$i]['title']; ?></h6>
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
										<p class="review italic justify"> "<?php echo $movie_reviews[$i]['review']; ?>" </p>
										<h6 class="right-align"> written by: <?php echo $movie_reviews[$i]['username']; ?> </h6>
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

		<!-- Tab-Contents -->
		<div class="container">

	   </div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	</body>

</html>