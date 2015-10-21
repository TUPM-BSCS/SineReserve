<html>
<body>
	<div class="container">
		<h4 class="white-text center-align">Movies</h4>
	</div>
	<div class="container">
      		<?php
      			// $movie_list['now_showing'] = array();
      			if(count($movie_list['now_showing']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['now_showing'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/ns">
	      									<img src="' . base_url() . $movie['poster'] . '">
	      								</a>
	      							</div>
	      							<div class="desc-container" style="background-color: #'. $movie['color'] .';">
	      								<div class="absolute-desc">
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/ns/reserve">
	      										<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
	      									</a>
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/ns">
	      										<span class="movie-title white-text">' . $movie['name'] . '</span>
	      									</a>
	      									<span class="movie-stat">'.$movie['running_time'].' mins.</span>
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

      			// $movie_list['next_attraction'] = array();
      			if(count($movie_list['next_attraction']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['next_attraction'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/na">
	      									<img src="' . base_url() . $movie['poster'] . '">
	      								</a>
	      							</div>
	      							<div class="desc-container" style="background-color: #'. $movie['color'] .';">
	      								<div class="absolute-desc">
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/na/reserve">
	      										<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
	      									</a>
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/na">
	      										<span class="movie-title white-text">' . $movie['name'] . '</span>
	      									</a>
	      									<span class="movie-stat">'.$movie['running_time'].' mins.</span>
	      								</div>
	      							</div>
	      						</div>
	      					</li>';
	      			}
	      			echo '</ul>';
	      		}

      			// $movie_list['coming_soon'] = array();
      			if(count($movie_list['coming_soon']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['coming_soon'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/cs">
	      									<img src="' . base_url() . $movie['poster'] . '">
	      								</a>
	      							</div>
	      							<div class="desc-container" style="background-color: #'. $movie['color'] .';">
	      								<div class="absolute-desc">
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/cs">
	      										<span class="movie-title white-text">' . $movie['name'] . '</span>
	      									</a>
	      									<span class="movie-stat">'.$movie['running_time'].' mins.</span>
	      								</div>
	      							</div>
	      						</div>
	      					</li>';
	      			}
	      			echo '</ul>';
	      		}

	      		// $movie_list[]
	     		if(count($movie_list['other_movies']) > 0) {
      				echo '<ul class="rig">';
	      			foreach ($movie_list['other_movies'] as $movie) {
	      				echo
	      					'<li>
	      						<div class="movie-box">
	      							<div class="image-container">
	      								<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/cs">
	      									<img src="' . base_url() . $movie['poster'] . '">
	      								</a>
	      							</div>
	      							<div class="desc-container" style="background-color: #'. $movie['color'] .';">
	      								<div class="absolute-desc">
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/">
	      										<span class="movie-title white-text">' . $movie['name'] . '</span>
	      									</a>
	      									<span class="movie-stat">'.$movie['running_time'].' mins.</span>
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
	    		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/movie_page_script.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>

</html>