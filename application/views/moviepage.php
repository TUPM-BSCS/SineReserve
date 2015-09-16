<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  		
  		<title>Movie Page</title>

  		<!-- CSS  -->
  		<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		
  		<link href="<?php echo base_url();?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
			<h5>Kingsman: The Secret Service <span class="blue-text"> (2014)[R-13]</span></h5>
			<hr />
			<div class="container hide-on-med-and-up">
				<div class="section">
					<img src="<?php echo base_url();?>assets/images/kingsman.jpg" class="responsive-img movie-page-poster" />
				</div>
			</div>
			<div class="row">
				<div class="col s3 hide-on-small-only"><img src="<?php echo base_url();?>assets/images/kingsman.jpg" class="responsive-img movie-page-poster" /></div>
				<div class="col s12 m9">
					<ul class="tabs movie-tabs white">
			        <li class="tab col s3"><a href="#details">Details</a></li>
			        <li class="tab col s3"><a href="#photos">Photos</a></li>
			        <li class="tab col s3"><a href="#videos">Videos</a></li>
			        <li class="tab col s3"><a href="#reviews">Reviews</a></li>
			      </ul>
			      <div class="section">
				      <div id="videos">
				      	<div class="video-container">
					       <iframe width="853" height="480" src="https://www.youtube.com/embed/xkX8jKeKUEA" frameborder="0" allowfullscreen></iframe>
					      </div>
				      </div>
				   </div>
				</div>
			</div>
		</div>

		<!-- Tab-Contents -->
		<div class="container">

	   </div>

		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>
	</body>

</html>