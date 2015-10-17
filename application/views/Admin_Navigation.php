<!DOCTYPE HTML>
<html>
	<head>
		<!-- META TAGS -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $title_page?></title>
		
		<!-- CSS TAGS -->
		<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="<?php echo base_url();?>assets/css/lolliclock.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		 
		<style>
			main {
				padding-left: 260px;
				padding-right: 10%;
			}
			
			.side_nav{
				top: inherit;
			}
			
			.modal{
				max-height: 95%;
				top: 3% !important;
			}
			
			.branch_dropdown {
				padding-top: 30px;
			}
			
			#add_imdb_plot{
				overflow-y: auto;
				max-height: 10px;
			}
			
			#textarea_plot{
				max-height: 100px;
			}
			
			@media only screen and (max-width : 992px) {
				main {
					padding-left: 20px;
				}
			}
		</style>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper container">
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					<a href="#!" class="brand-logo">Sinereserve</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="sass.html">Log Out</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<ul id="slide-out" class="side-nav fixed side_nav">
			<li><a href="<?php echo base_url();?>index.php/Admin_controller/branch">Branches</a></li>
			<li><a href="<?php echo base_url();?>index.php/Admin_controller/cinema">Cinema</a></li>
			<li><a href="<?php echo base_url();?>index.php/Admin_controller/movie">Movies</a></li>
			<li><a href="#!">Shows</a></li>
		</ul>