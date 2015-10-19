	<div class="container">
		<h4 class="white-text center-align">Movies</h4>
	</div>
	<div class="container">
		<?php
			if(count($movie_index['movie_list']) > 0) {
				echo '<ul class="rig">';
				foreach ($movie_index['movie_list'] as $movie) {
					echo
						'<li>
							<div class="movie-box">
								<div class="image-container">
									<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'">
										<img src="' . base_url() . $movie['poster'] . '">
									</a>
								</div>
								<div class="desc-container" style="background-color: #'. $movie['color'] .';">
									<div class="absolute-desc">
										<a href="#">
											<img class="responsive-img ticket-icon" src="' . base_url() . 'assets/images/ticket-white.png" />
										</a>
										<a href="'. base_url() .'index.php/movie_page_controller/movie/'. $movie['id'] .'">
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
</body>
</html>