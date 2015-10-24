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

	<body class="lighten-5" style="background-color: #18191b;" onload="<?php echo $automodal; ?>">
		<!-- Dropdown -->
		<ul id="accounts_dropdown" class="dropdown-content" >
			<!--<li class="hide-on-med-and-up"><?php echo $accounts_label; ?></li>-->
			<li><a href="<?php echo base_url();?>index.php/user_page_controller/user">See your profile</a></li>
			<li><a href="<?php echo base_url();?>index.php/User_Operations/sign_out">Signout</a></li>
		</ul>

		<!-- Navigation Bar -->
		<div class ="navbar-fixed">
			<nav class="red darken-4 main-nav ripple" id="meet-1" role="navigation">
				<div class="nav-wrapper container"> 
					<a id="logo-container" href= "<?php echo base_url();?>index.php/Home/home" class="brand-logo left-align white-text">SineReserve</a>
					<!--<a id="logo-container" href="http://localhost/SineReserve/index.php/Home/home" class="brand-logo left white-text hide-on-med-and-up">SineReserve</a>-->
					<!--          <a href="#" data-activates="mobile-nav" class="right button-collapse"><i class="mdi-navigation-more-vert"></i></a>-->
					<ul class="right hide-on-large-only">
						<li><a href="<?php echo base_url();?>/index.php/movie_index_controller/movie_index"><i class="mdi-av-movie"></i></a></li>
						<li><a class="<?php echo $accounts_action; ?>" data-activates="<?php echo $accounts_link; ?>" data-target="modal1" href="<?php echo $accounts_link; ?>"><i class="mdi-action-account-circle"></i></a></li>
					</ul>

					<ul class="right hide-on-med-and-down">
						<!--<li><a href="http://localhost/SineReserve/index.php/movie_page_controller/movie">Movies</a></li>-->
						<li><a href="<?php echo base_url();?>/index.php/movie_index_controller/movie_index"><i class="mdi-av-movie left"></i>Movies</a></li>
						<li><a class="<?php echo $accounts_action; ?>" data-beloworigin="true" data-activates="<?php echo $accounts_link; ?>" data-target="modal1" href="<?php echo $accounts_link; ?>"><i class="mdi-action-account-circle left"></i><?php echo $accounts_label; ?></a></li>
						<li>
							<div class="input-field red darken-2">
								<div id="search_container" center class="input-field">
									<input id="search_field" type="search" required placeholder="Search..." style="margin-bottom: 0px;">
									<label for="search"><i class="mdi-action-search"></i></label>
									<!-- Collections -->
									<div id="search_result" class="collections">
										
									</div>

								</div>
							</div>

							<!--<div class="input-field red darken-2">
								<input id="search_bar" class="search" type="text" required></input>
								<label for="search"><i class="mdi-action-search"></i></label>
								<i class="mdi-navigation-close close"></i>
							</div> -->
						</li>
					</ul>

				</div>
			</nav>
		</div>

		<div id="modal1" class="modal modal-fixed-footer">
			<div class="modal-header red darken-4 text-white">
				<a class="modal-close btn-floating btn-medium waves-effect waves-light red"><i class="mdi-content-clear"></i></a>
				<p class="text-white">Sign In</p>
			</div>

			<div class="modal-content">
				<div class="row">
				<!-- <ul class="collapsible" data-collapsible="accordion">
				<li>
				<div id="login-tab" class="collapsible-header active">
				Login
				</div> -->
				<!-- <div class="collapsible-body"> -->

					<?php echo $signin_errors; ?>
					<?php echo form_open('login_validator'); ?>
						<div class="row">
							<div class="input-field col s12">
								<input id="username_field" name="username" type="text" class="validate" />
								<label for="username_field">Username</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="password_field" name="password" type="password" class="validate" />
								<label for="password_field">Password</label>
							</div>
						</div>

						<div class="row">
							<div class="col s12 valign-wrapper">
								<button class="waves-effect btn valign" type="submit" name="btn_sign-in">Sign In</button>
								<a class="waves-effect waves-light btn modal-action modal-close modal-trigger right" href="#modal-signup">No account? Sign Up</a>
							</div>
						</div>
					</form>
				</div>
		<!-- </ul> -->
		<!-- </div> -->
			</div>

			<div class="modal-footer">
			</div>
		</div>

		<div id="modal-signup" class="modal modal-fixed-footer">
			<div class="modal-header red darken-4 text-white">
				<a class="modal-close btn-floating btn-medium waves-effect waves-light red"><i class="mdi-content-clear"></i></a>
				<p class="text-white">Sign Up</p>
			</div>

			<div class="modal-content">
				<?php echo $signup_errors; ?>
	            <?php echo form_open('signup_validator'); ?>
				<div class="row">
					<div class="input field col s12">
						<input id="field_uname" name="up_username" type="text" class="validate" placeholder="JAppl" required/>
						<label for="field_uname">Username</label>
					</div>

					<div class="input field col s12">
						<input id="field_pass" name="password" type="password" class="validate" placeholder="Marcos" required/>
						<label for="field_pass">Password</label>
					</div>

					<div class="input field col s12">
						<input id="field_rpass" name="password" type="password" class="validate" placeholder="Marcos" required/>
						<label for="field_rpass">Re-enter Password</label>
					</div>

					<div class="input field col s12">
						 <input id="field_email" name="email" type="email" class="validate" placeholder="johnappleseed@sinereserve.com" required/>
						<label for="field_email">E-Mail</label>
					</div>

					<div class="input field col s12">
						<input id="field_lname" name="lname" type="text" class="validate" placeholder="Appleseed" required/>
						<label for="field_lname">Last Name</label>
					</div>

					<div class="input field col s12">
						<input id="field_fname" name="fname" type="text" class="validate" placeholder="John" required/>
						<label for="field_fname">First Name</label>
					</div>

					<div class="input field col s12">
						<input id="field_mname" name="mname" type="text" class="validate" placeholder="Marcos" required/>
						<label for="field_mname">Middle Name</label>
					</div>
					<div class="col s12">
						<p>Sex</p>

						<p>
						<input name="rad_sex" type="radio" id="male" value="M" />
						<label for="male">Male</label>
						</p>

						<p>
						<input name="rad_sex" type="radio" id="female" value="F" />
						<label for="female">Female</label>
						</p>
					</div>

					<div class="input field col s12">
						<input id="field_bday" name="bday" type="date" class="datepicker" placeholder="2015/10/22" required/>
						<label for="field_bday">Birthday</label>
					</div>

					<div class="input field col s12">
						<textarea id="field_address" name="address" class="materialize-textarea" required></textarea>
						<label for="field_address">Address</label>
					</div>

          <div class="col s12">
          <p>
              With our dedicated card, you can reserve a movie with your top-up points!
          </p>
          </div>

					<div class="input field col s12">
						<input id="field_cardnum" name="cardnum" type="text" class="validate" placeholder="Marcos" required/>
						<label for="field_cardnum">Card Number</label>
					</div>

          <div class="input field col s12">
            <input id="field_cardpin" name="cardpin" type="password" class="validate" placeholder="1234" required/>
            <label for="field_cardpin">Card PIN</label>
          </div>

					<div class="col s12 valign-wrapper">
						<button class="waves-effect btn valign" type="submit" name="btn_sign-up">Sign Up</button>
					</div>
				</div> 
			</div>

			<div class="modal-footer">
			</div>
		</div>
		<!-- </div> -->
    <div id="modal-signup-success" class="modal">
      <div class="modal-content">
        <p>Your account has been signed up. You can now sign in.</p>
      </div>
      <div class="modal-footer">
        <a class="modal-close btn-floating btn-medium waves-effect waves-light green">Okay</a>
      </div>
    </div>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			var BASE_URL = "<?php echo base_url();?>";

			$("#search_field").keyup(function() {
				$('#search_result').html('');
				var search_term = $('#search_field').val();
				
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/search_controller/ajax_search',
					dataType: 'json',
					method: 'post',
					data: {search_term: search_term},
					success: function(data) {
						console.log(JSON.stringify(data));
						for(var sample in data) {
							if(data == 'No Result') {
								$('#search_result').html('').append('<a class="collection-item white black-text center-align"><img class="responsive-img" src="">No Results Found.</a>');;
							}

							else {
								// $('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
								$('#search_result').append('<a href="'+ BASE_URL + 'index.php/movie_page_controller/movie/' + data[sample]['mov_id'] + '/" class="collection-item white black-text valign-wrapper"><img class="responsive-img" src="' + BASE_URL + data[sample]['mov_poster_img'] + '" style="max-height: 60px; margin-right: 10px;"><span class="movie-title">' + data[sample]['mov_name'] + '</span></a>');
							}
						}
					},
				});
			});

			$("#search_field").focusin(function(){
				$('#search_result').html('');

				var search_term = $('#search_field').val();
				
				$.ajax({
					url: '<?php echo base_url(); ?>index.php/search_controller/ajax_search',
					dataType: 'json',
					method: 'post',
					data: {search_term: search_term},
					success: function(data) {
						console.log(JSON.stringify(data));
            //console.log(data[sample]['cine_id']);
            //console.log(data[sample]['cine_name']);
            var list = document.getElementById('search_result');
            while (list.hasChildNodes()) {   
               list.removeChild(list.firstChild);
            }            
						for(var sample in data) {
							if(data == 'No Result') {
								$('#search_result').html('').append('<a class="collection-item white black-text center-align"><img class="responsive-img" src="">No Results Found.</a>');;
							}

							else {
								// $('#reserve_cinema').append('<option id="reserve_cinema_option" value="' + data[sample]['cine_id'] + '">' + data[sample]['cine_name'] + '</option>');
								$('#search_result').append('<a href="'+ BASE_URL + 'index.php/movie_page_controller/movie/' + data[sample]['mov_id'] + '/" class="collection-item white black-text valign-wrapper"><img class="responsive-img" src="' + BASE_URL + data[sample]['mov_poster_img'] + '" style="max-height: 60px; margin-right: 10px;"><span class="movie-title">' + data[sample]['mov_name'] + '</span></a>');
							}
						}

					},
				});
			});
			
			var mousedownHappened = false;

			$("#search_result").mousedown(function() {
				mousedownHappened = true;
			});

			$("#search_field").blur(function(){
				if(mousedownHappened) {
					setTimeout(function() {
						$('#search_field').focus();
					}, 1000);

					mousedownHappened = false;
				}

				else {
					$('#search_result').html('');
				}
				// setTimeout(function() {
				// 	$('#search_field').focus();
				// }, 1000);
			});
		</script>
