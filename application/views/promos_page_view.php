<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  		
  		<title>Promos and Events Page</title>

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
		<div class ="navbar-fixed">
			<nav class="red darken-4 main-nav ripple" id="meet-1" role="navigation">
				<div class="nav-wrapper container"> 
					<a id="logo-container" href="#" class="brand-logo white-text">SineReserve</a>
					<a href="#" data-activates="mobile-nav" class="right button-collapse"><i class="mdi-navigation-more-vert"></i></a>
					<ul class="right hide-on-med-and-down">
        				<li><a href="http://localhost/SineReserve/index.php/movie_page_controller/movie">Movies</a></li>
        				<li><a href="#"><i class="mdi-action-account-circle"></i></a></li>
        				<li>
        					<div class="input-field">
          						<input id="search" type="search" required></input>
          						<label for="search"><i class="mdi-action-search"></i></label>
          						<i class="mdi-navigation-close close"></i>
        					</div>	
        				</li>
      				</ul>
				</div>	
			</nav>
		</div>
		<div>
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
	            <p class="white-text">© 2015 All Rights Reserved</p>
	            </div>
	          </div>
	        </footer>
	</div>
	</body>
</html>