<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  		
  		<title>Home Page</title>

  		<!-- CSS  -->
  		<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/new-moviebox-style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/gridlist.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/expand.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/slick.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/slick-theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/sticky.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  		<link href="<?php echo base_url();?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	
	<body class="lighten-5" style="background-color: #18191b;">

		<!-- Navigation Bar -->
		<div class ="navbar-fixed">
			<nav class="deep-purple main-nav ripple" id="meet-1" role="navigation">
				<div class="nav-wrapper container"> 
					<a id="logo-container" href="#" class="brand-logo white-text">SineReserve</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="http://localhost/SineReserve/index.php/movie_page_controller/movie">Movies</a></li>
        				<li>
        					
        						<div class="input-field">
          							<input id="search" type="search" required>
          							<label for="search"><i class="material-icons">search</i></label>
          							<i class="material-icons">close</i>
          							</input>
        						</div>
        					
        				</li>
      				</ul>
				</div>
			</nav>
		</div>
		
		<!-- Banner -->
		<div class="row banner-with-bg"
		style="background: url('<?php echo base_url();?>assets/images/cinema_house_edited.jpg') no-repeat center center;
				 background-size: 100%;
				 -webkit-background-size: cover;
				 -moz-background-size: cover;
				 -o-background-size: cover;
				 background-size: cover;">
			<div class="container">
				<div class="col s12">
					<h2 class="center-align white-text" style="font-weight: 100;">SineReserve</h2>
					<h5 class="center-align white-text">Online Reservation Made Easy</h5>
					<div class="row section">
					<img class="responsive-img col s6 m4 l2 offset-l3" src="<?php echo base_url();?>assets/images/select_a_movie.png" />
					<img class="responsive-img col s6 m4 l2" src="<?php echo base_url();?>assets/images/fill_up.png" />
					<img class="responsive-img col s6 m4 l2 offset-s3" src="<?php echo base_url();?>assets/images/three.png" />
					</div>
				</div>
			</div>
		</div>

		<!-- Promos & Events -->
		<div class="container">
			<h4 class="white-text">Promos and Events</h4>
			<div class="slickify">
			  <div><img src="<?php echo base_url();?>assets/images/pande/hotel.jpg" /></div>
			  <div><img src="<?php echo base_url();?>assets/images/pande/imax.jpg" /></div>
			  <div><img src="<?php echo base_url();?>assets/images/pande/inside_out.jpg" /></div>
			  <div><img src="<?php echo base_url();?>assets/images/pande/imax2.jpg" /></div>
			  <div><img src="<?php echo base_url();?>assets/images/pande/inside_out.jpg" /></div>
			  <div><img src="<?php echo base_url();?>assets/images/pande/pixels.jpg" /></div>
			</div>
			<p class="white-text pande-message">Go to Promos and Events Page to read more and see all the Hot promos and events we are offering</p>
		</div>


	    <!-- Intermission -->
	    <div class="section">
	    	<div class="row container">
	    		<h3 class="header white-text">Movie Selection</h3>
	    		<p class="white-text">The fresh, the latest, the grandest films hand-picked by the most epic critics all over the world</p>
	    	</div>
	    </div>
		
		<!-- Tabs -->
		<div class="container">
			<ul class="tabs movie-tabs deep-purple">
				<li class="tab"><a href="#now-showing">Now<span class="new-line hide-on-med-and-up">Showing</span><span class="hide-on-small-only"> Showing</span></a></li>
				<li class="tab"><a href="#next-attraction">Next<span class="new-line hide-on-med-and-up">Attraction</span><span class="hide-on-small-only"> Attraction</span></a></li>
				<li class="tab"><a href="#coming-soon">Coming<span class="new-line hide-on-med-and-up">Soon</span><span class="hide-on-small-only"> Soon</span></a></li>
			</ul>
		</div>

		<br />

		<!-- Tab-Contents -->
		<div class="container">
	      <div id="now-showing">
      		<?php
      			// $movie_list['now_showing'] = array();
      			if(count($movie_list['now_showing']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['now_showing'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<img src="' . base_url() . $movie['poster'] . '">
	      							</div>
	      							<div class="desc-container">
	      								<div class="absolute-desc">
	      									<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
	      									<span class="movie-title">' . $movie['name'] . '</span>
	      									<span class="movie-stat">Action</span>
	      								</div>
	      							</div>
	      						</div>
	      					</li>';
	      			}
	      			echo '</ul>';
	      		}
	      		else
	     				echo '<div class="center-align">
	     							<img class="responsive-img" src="' . base_url() . 'assets/images/closed.png" />
	     						</div>';
      		?>
      	</div>
      	<div id="next-attraction">
      		<?php
      			// $movie_list['now_showing'] = array();
      			if(count($movie_list['next_attraction']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['next_attraction'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<img src="' . base_url() . $movie['poster'] . '">
	      							</div>
	      							<div class="desc-container">
	      								<div class="absolute-desc">
	      									<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
	      									<span class="movie-title">' . $movie['name'] . '</span>
	      									<span class="movie-stat">Action</span>
	      								</div>
	      							</div>
	      						</div>
	      					</li>';
	      			}
	      			echo '</ul>';
	      		}
	      		else
	     				echo '<div class="center-align">
	     							<img class="responsive-img" src="' . base_url() . 'assets/images/closed.png" />
	     						</div>';
      		?>
      	</div>
      	<div id="coming-soon">
      		<?php
      			// $movie_list['now_showing'] = array();
      			if(count($movie_list['coming_soon']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['coming_soon'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<img src="' . base_url() . $movie['poster'] . '">
	      							</div>
	      							<div class="desc-container">
	      								<div class="absolute-desc">
	      									<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
	      									<span class="movie-title">' . $movie['name'] . '</span>
	      									<span class="movie-stat">Action</span>
	      								</div>
	      							</div>
	      						</div>
	      					</li>';
	      			}
	      			echo '</ul>';
	      		}
	      		else
	     				echo '<div class="center-align">
	     							<img class="responsive-img" src="' . base_url() . 'assets/images/closed.png" />
	     						</div>';
      		?>
      	</div>
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

	    <!-- Modals -->
      
		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/expand.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>
	</body>
</html>
