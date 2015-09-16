<!HTML DOCUMENT>
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
			<li><a href="#">Tab 1</a></li>
			<li><a href="#">Tab 2</a></li>
			<li><a href="#">Tab 3</a></li>
			<li><a href="#">Tab 4</a></li>
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu hide-on-large-only"></i></a>
	</div>
	<main>
		<div class="row">
			<div class="col s12">
			  <ul class="tabs">
				<li class="tab col s3"><a href="#test1">Test 1</a></li>
				<li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
				<li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
				<li class="tab col s3"><a href="#test4">Test 4</a></li>
			  </ul>
			</div>
			<div id="test1" class="col s12">Test 1</div>
			<div id="test2" class="col s12">Test 2</div>
			<div id="test3" class="col s12">Test 3</div>
			<div id="test4" class="col s12">Test 4</div>
		</div>     
		<div id="tab-content">				
			<div id="tab1">
				<p>This is a very simple jQuery tabbed navigation.</p>
			</div>
			
			<div id="tab2">
				<p>This can contain anything.</p>
			</div>
			
			<div id="tab3">
				<p>Like photos:</p><br />
				<img src="http://www.catname.org/images/cat04.jpg" alt=""/>
			</div>
			
			<div id="tab4">
				<p>Or videos:</p><br />
			</div>
			
		</div>		
	</main>
	
	<!-- JS TAGS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.js"></script>
	<script>
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
	</script>
</body>