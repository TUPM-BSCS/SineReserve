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
  		<link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		
  		<link href="<?php echo base_url();?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	
	<body class="grey lighten-5">
		<!-- Navigation Bar -->
		<div class ="navbar-fixed">
			<nav class="grey lighten-4 main-nav ripple" id="meet-1" role="navigation">
				<div class="nav-wrapper container"> 
					<a id="logo-container" href="#" class="brand-logo black-text">Put a Header/Navi Here | Wanted: Logo Maker</a>
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

	    <!-- Intermission -->
	    <div class="section">
	    	<div class="row container">
	    		<h2 class="header">Movie Selection</h2>
	    		<p>The fresh, the latest, the grandest films hand-picked by the most epic critics all over the world</p>
	    	</div>
	    </div>
		
		<!-- Tabs -->
		<div class="container">
			<ul class="tabs movie-tabs white">
				<li class="tab"><a href="#now-showing">Now<span class="new-line hide-on-med-and-up">Showing</span><span class="hide-on-small-only"> Showing</span></a></li>
				<li class="tab"><a href="#next-attraction">Next<span class="new-line hide-on-med-and-up">Attraction</span><span class="hide-on-small-only"> Attraction</span></a></li>
				<li class="tab"><a href="#coming-soon">Coming<span class="new-line hide-on-med-and-up">Soon</span><span class="hide-on-small-only"> Soon</span></a></li>
			</ul>
		</div>

		<br />

		<!-- Tab-Contents -->
		<div class="container">
	      <div id="now-showing">
	      	<ul class="rig">
	      		<?php

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

	      		?>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/kingsman.jpg"></div>
							<div class="desc-container kingsman">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">Kingsman: The Secret Service</span>
									<span class="movie-stat">Action</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/trumbo.jpg"></div>
							<div class="desc-container trumbo">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">Trumbo</span>
									<span class="movie-stat">Bryan Cranston</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/pitch1.jpg"></div>
							<div class="desc-container pitch1">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">Pitch Perfect</span>
									<span class="movie-stat">10/10</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/imitation.jpg"></div>
							<div class="desc-container imitation">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">The Imitation Game</span>
									<span class="movie-stat">5 Stars</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/pitch2.jpg"></div>
							<div class="desc-container pitch2">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">Pitch Perfect 2</span>
									<span class="movie-stat">Bechloe</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/john.jpg"></div>
							<div class="desc-container john">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">And His Name</span>
									<span class="movie-stat">is John Cena</span>
								</div>
							</div>
						</div>
			    	</li>
			    	<li>
			    		<div class="movie-box">
							<div class="image-container"><img src="<?php echo base_url();?>assets/images/trumbo.jpg"></div>
							<div class="desc-container trumbo">
								<div class="absolute-desc">
									<img class="responsive-img ticket-icon" src="<?php echo base_url();?>assets/images/ticket-white.png" />
									<span class="movie-title">Trumbo</span>
									<span class="movie-stat">Bryan Cranston</span>
								</div>
							</div>
						</div>
			    	</li>
			    </ul>
	      	</div>
	      	<div id="next-attraction">
	      	</div>
	      	<div id="coming-soon">
	      	</div>
	    </div>

	    <!-- Modals -->
      
		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/expand.js"></script>
	</body>
</html>
