<!DOCTYPE HTML>
<html>
<head>
	<!-- META TAGS -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title_page?></title>
	
	<!-- CSS TAGS -->
	<link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style>
		main, footer {
			padding-left: 280px;
		} 
		
		.side-nav{
			top: 65px;
		}		
		
		.mdi-navigation-menu{
			font-size: 60px;
			top: -14px;
			position: fixed;
			z-index: 999;
		}
		
		#tabmenu {
			margin: 20px 0 0 20px;
		}

		li, p { font: 12px/16px Arial, Helvetica, sans-serif; }

		#nav {
			overflow: hidden;
			padding-left: 0;
		}
			
		@media only screen and (max-width : 992px) {
			main, footer {
			  padding-left: 0;
			} 
		
			.side-nav{
				top: 65px;
			}		
			
			.mdi-navigation-menu{
				font-size: 60px;
				top: -14px;
				position: fixed;
				z-index: 999;
			}
			
			#tabmenu {
				margin: 20px 0 0 20px;
			}

			li, p { font: 12px/16px Arial, Helvetica, sans-serif; }

			#nav {
				overflow: hidden;
				padding-left: 0;
			}
			
			.responsive-table {
				width: 100%;
			}
	</style>
</head>
<body>	
	<header>
		<div class="navbar-fixed">
			<nav class="grey lighten-4 main-nav ripple" id="meet-1" role="navigation">
			  <div class="nav-wrapper container">
				<a href="#!" class="brand-logo black-text">Sinereserve Admin</a>
				<ul class="right hide-on-med-and-down">
				  <li><a href="sass.html" class="black-text">Log-out</a></li>
				</ul>
			  </div>
			</nav>
		</div>
	</header>
	<div class="side_nav">
		<ul id="slide-out" class="side-nav fixed">
			<li><a href="#">Branches</a></li>
			<li><a href="#">Cinemas</a></li>
			<li><a href="#">Movies</a></li>
			<li><a href="#">Shows</a></li>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu hide-on-large-only"></i></a>
	</div>
	<main class='row'>
		<div id="tab-content" class="col s12 container">				
			<div id="tab1">
				<h1> Branches Page</h1>
				<a class="modal-trigger waves-effect waves-light btn green" href='#new_branch'>New</a>
				<a class="waves-effect waves-light btn blue">Update</a>
				<a class="waves-effect waves-light btn red">Delete</a>
				<table class='responsive-table bordered striped'>
					<thead>
					  <tr>
						  <th data-field="id">Name</th>
						  <th data-field="name">Item Name</th>
						  <th data-field="price">Item Price</th>
					  </tr>
					</thead>

					<tbody>
					  <tr>
						<td>Alvin</td>
						<td>Eclair</td>
						<td>$0.87</td>
					  </tr>
					  <tr>
						<td>Alan</td>
						<td>Jellybean</td>
						<td>$3.76</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					</tbody>
				 </table>
			</div>
			
			<div id="tab2">
				<h1> Cinemas Page</h1>
				<a class="waves-effect waves-light btn green">New</a>
				<a class="waves-effect waves-light btn blue">Update</a>
				<a class="waves-effect waves-light btn red">Delete</a>
				<table class='responsive-table bordered striped'>
					<thead>
					  <tr>
						  <th data-field="id">Name</th>
						  <th data-field="name">Item Name</th>
						  <th data-field="price">Item Price</th>
					  </tr>
					</thead>

					<tbody>
					  <tr>
						<td>Alvin</td>
						<td>Eclair</td>
						<td>$0.87</td>
					  </tr>
					  <tr>
						<td>Alan</td>
						<td>Jellybean</td>
						<td>$3.76</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					</tbody>
				 </table>
			</div>
			
			<div id="tab3">
				<h1> Movies Page</h1>
				<a class="waves-effect waves-light btn green">New</a>
				<a class="waves-effect waves-light btn blue">Update</a>
				<a class="waves-effect waves-light btn red">Delete</a>
				<table class='responsive-table bordered striped'>
					<thead>
					  <tr>
						  <th data-field="id">Name</th>
						  <th data-field="name">Item Name</th>
						  <th data-field="price">Item Price</th>
					  </tr>
					</thead>

					<tbody>
					  <tr>
						<td>Alvin</td>
						<td>Eclair</td>
						<td>$0.87</td>
					  </tr>
					  <tr>
						<td>Alan</td>
						<td>Jellybean</td>
						<td>$3.76</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					</tbody>
				 </table>
			</div>
			
			<div id="tab4">
				<h1> Shows Page</h1>
				<a class="waves-effect waves-light btn green">New</a>
				<a class="waves-effect waves-light btn blue">Update</a>
				<a class="waves-effect waves-light btn red">Delete</a>
				<table class='responsive-table bordered striped'>
					<thead>
					  <tr>
						  <th data-field="id">Name</th>
						  <th data-field="name">Item Name</th>
						  <th data-field="price">Item Price</th>
					  </tr>
					</thead>

					<tbody>
					  <tr>
						<td>Alvin</td>
						<td>Eclair</td>
						<td>$0.87</td>
					  </tr>
					  <tr>
						<td>Alan</td>
						<td>Jellybean</td>
						<td>$3.76</td>
					  </tr>
					  <tr>
						<td>Jonathan</td>
						<td>Lollipop</td>
						<td>$7.00</td>
					  </tr>
					</tbody>
				 </table>
			</div>	
		</div>	
		<!-- MODALS -->
		<div id="new_branch" class="modal modal-fixed-footer">
			<div class="modal-content">
			  <h4>Modal Header</h4>
			  <p>A bunch of text</p>
			</div>
			<div class="modal-footer">
			  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
			</div>
		</div>
	</main>
	
	<!-- JS TAGS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
	<script>
		$(document).ready(function(){
			$(".button-collapse").sideNav();
			
			$('#tab-content div').hide();
			$('#tab-content div:first').show();

			$('.side-nav li').click(function() {
				$('.side-nav li').removeClass("active");
				$(this).addClass("active");
				$('#tab-content div').hide();

				var indexer = $(this).index(); //gets the current index of (this) which is #nav li
				$('#tab-content div:eq(' + indexer + ')').fadeIn(); //uses whatever index the link has to open the corresponding box 
				$(".button-collapse").sideNav('hide');
			});
			
			$('table tbody tr').click(function(){
				alert($(this).children().text());
			});
			$('.modal-trigger').leanModal();
		});
	</script>
</body>
</html>