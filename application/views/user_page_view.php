<head>
	<link href="<?php echo base_url();?>assets/css/user_page_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style>
		input[type="text"]:disabled #movie_title{
			color: #FFFFFF;
			border-bottom-color: #FFFFFF;
		}
		#form_user_page label {
			color: #FFFFFF;
		}
	</style>
</head>

<div class="container">
	<h4 class="white-text center-align">User Details</h4>
</div>
<div class="container">
	<form id="form_user_page" class="col s12" method="POST">
		<div class="row">
			<div class="input-field col s12">
				<input disabled value="<?php echo $user_fullname ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">Full Name</label>
			</div>

			<div class="input-field col s12">
				<input disabled value="<?php echo $user_username ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">User Name</label>
			</div>

			<div class="input-field col s12">
				<input disabled value="<?php echo $user_email ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">Email Address</label>
			</div>

			<div class="input-field col s12">
				<input disabled value="<?php echo date("F d Y", strtotime($user_birthdate)) ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">Birthdate</label>
			</div>

			<div class="input-field col s12 text-white">
				<input disabled value="<?php if($user_sex == 'm' || $user_sex == 'M') echo 'Male'; else if($user_sex == 'f' || $user_sex == 'F') echo 'Female'; ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">Sex</label>
			</div>

			<div class="input-field col s12">
				<input disabled value="<?php echo $user_address ?>" id="movie_title" type="text" class="validate text-white">
				<label for="movie_title" class="active text-white">Address</label>
			</div>

			<!-- <div class="input-field col s12">
				<input id="review_title" type="text" class="text" length="50" name="review_title">
				<label for="review_title" class="text-black">Review Title</label>
			</div>
			
			<label for="star-rating" class="col s12 text-black">Movie Rating</label>
			<div class="col s12">
				<span id="rating" class="star-rating">
					<input type="radio" id="star1" name="review_rating" value="1"><i></i>
					<input type="radio" id="star2" name="review_rating" value="2"><i></i>
					<input type="radio" id="star3" name="review_rating" value="3"><i></i>
					<input type="radio" id="star4" name="review_rating" value="4"><i></i>
					<input type="radio" id="star5" name="review_rating" value="5"><i></i>
				</span>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<textarea id="review" class="materialize-textarea" name="review_content"></textarea>
					<label for="review">Review</label>
				</div>
			</div> -->
		</div>
	</form>
</div>
		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>