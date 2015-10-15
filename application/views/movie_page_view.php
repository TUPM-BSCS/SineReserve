<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  		
  		<title>Movie Page</title>

  		<!-- CSS  -->
  		<link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url(); ?>assets/css/moviepage.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url(); ?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url();?>assets/css/sticky.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body class="grey lighten-5">
		<!-- Navigation Bar -->
		<div class ="navbar-fixed">
			<nav class="grey lighten-4 main-nav ripple" id="meet-1" role="navigation">
				<div class="nav-wrapper container"> 
					<a id="logo-container" href="#" class="brand-logo black-text">SineReserve</a>
				</div>
			</nav>
		</div>

		<div class="container">
			<h5>
				<?php echo $movie_name; ?>
				<span class="blue-text"> (2014) <?php echo '[' . $movie_rating . ']'; ?></span>
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
					<?php 
						for($i = 0; $i < sizeof($movie_genre); $i++) {
					?>
						<div class="chip"> <?php echo $movie_genre[$i]['genre_name']; ?> </div>
					<?php 
						}
					?>

					<h6>Cast:</h6>
					<div class="row">
					<?php
						for($i = 0; $i < sizeof($movie_cast); $i++) {
					?>
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
						 <div class="chip">
							<img class="circle" src="<?php echo base_url().$movie_cast[$i]['actor_img']; ?>" alt="Actor Photo">
							<?php echo $movie_cast[$i]['actor_fname'].' '.$movie_cast[$i]['actor_lname']; ?> as <?php echo $movie_cast[$i]['cast_role']; ?>
						</div> 
					<?php
						}
					?>

					</div>
				</div>

				<div class="col s3 hide-on-small-only"><img src="<?php echo base_url().$movie_poster_img; ?>" class="responsive-img movie-page-poster materialboxed" />
					<a class="waves-effect waves-teal btn-flat center-align" style="width: 100%;">Reserve</a>
				</div>
			</div>

			<div class="col s12 m12">
				<ul class="tabs movie-tabs white">
					<li class="tab col s3"><a href="#photos">Photos</a></li>
					<li class="tab col s3"><a href="#videos">Videos</a></li>
					<li class="tab col s3"><a href="#reviews">Reviews</a></li>
				</ul>

				<div class="section">
					<div id="photos">
						<?php
							if($movie_screenshots != null) {
								for($i = 0; $i < sizeof($movie_screenshots); $i++) {
						?>
									<img class="responsive-img materialboxed" src="<?php echo base_url().$movie_screenshots[$i]['sc_img']; ?>" alt="Movie Screenshot">
						<?php
								}
							}
						?>
					</div>

					<div id="videos">
						<div class="video-container">
							<iframe width="853" height="480" src="<?php echo $movie_trailer; ?>" frameborder="0" allowfullscreen></iframe>
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
	<div>
	<footer class="page-footer red darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">SineReserve</h5>
		<p class="white-text">A website where you can view currently showing and coming soon movies and reserve tickets.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul class="list">
                  <li><a class="white-text" href="http://localhost/SineReserve/index.php/Home/home">Home</a></li>
                  <li><a class="white-text" href="http://localhost/SineReserve/index.php/movie_page_controller/movie">Movies</a></li>
                  <li><a class="white-text" href="http://localhost/SineReserve/index.php/Admin_controller/index">Admin</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            <p class="white-text">� 2015 All Rights Reserved</p>
            </div>
          </div>
        </footer>
	</div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	</body>

</html>