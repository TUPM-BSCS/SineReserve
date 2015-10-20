
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
		<?php
			if(count($pande) > 0) {
				echo
					'<div class="container">
						<h4 class="white-text">Promos and Events</h4>
						<div class="slickify">';
				foreach ($pande as $panda) {
					echo '<div><img src="' . base_url() . $panda['banner'] . '"></div>';
				}
				echo
						'</div>
					</div>';
			}
		?>

	    <!-- Intermission -->
	    <div id="movies" class="section">
	    	<div class="row container">
	    		<h3 class="header white-text">Movie Selection</h3>
	    		<p class="white-text">The fresh, the latest, the grandest films hand-picked by the most epic critics all over the world</p>
	    	</div>
	    </div>
		
		<!-- Tabs -->
		<div class="container">
			<ul class="tabs movie-tabs red darken-4">
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
	      								<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/cs">
	      									<img src="' . base_url() . $movie['poster'] . '">
	      								</a>
	      							</div>
	      							<div class="desc-container" style="background-color: #'. $movie['color'] .';">
	      								<div class="absolute-desc">
	      									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'/cs">
	      										<span class="movie-title white-text">' . $movie['name'] . '</span>
	      									</a>
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

	    <!-- Modals -->
      
		<!-- Javascript  -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/expand.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>
	</body>
</html>
