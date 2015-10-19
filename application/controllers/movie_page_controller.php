<?php
class movie_page_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper('url');     
    }   

	public function movie($movie){
		$this->load->model('movie_page_model');

		$data['title'] = 'Movie Page';
		$data['movie_name'] = $this->movie_page_model->get_movie_name($movie);
		$data['movie_rating'] = $this->movie_page_model->get_movie_rating($movie);
		$data['movie_poster_img'] = $this->movie_page_model->get_movie_poster_img($movie);
		$data['movie_plot'] = $this->movie_page_model->get_movie_plot($movie);
		$data['movie_running_time'] = $this->movie_page_model->get_movie_running_time($movie);
		$data['movie_release_date'] = $this->movie_page_model->get_movie_release_date($movie);
		$data['movie_genre'] = $this->movie_page_model->get_movie_genre($movie);
		$data['movie_cast'] = $this->movie_page_model->get_movie_cast($movie);
		$data['movie_screenshots'] = $this->movie_page_model->get_movie_screenshots($movie);
		$data['movie_trailer'] = $this->movie_page_model->get_movie_trailer($movie);
		$data['movie_reviews'] = $this->movie_page_model->get_movie_reviews($movie);

		$data['reserve_branch'] = $this->movie_page_model->get_reserve_branch($movie);
		
		// print_r($data);
		// die();

		$this->load->view('header');
		$this->load->view('movie_page_view', $data);
		$this->load->view('footer');
	}
	
	public function get_cinema($reserve_branch) {
		$this->load->model('movie_page_model');

		$data['reserve_cinema'] = $this->movie_page_model->get_reserve_cinema($reserve_branch);

		// print_r($data);
		// die();
		$this->load->view('movie_page_view', $data);
	}

	public function reserve_movie() {
		$this->load->model('movie_page_model');

	}

	public function review_movie() {
		$this->load->model('movie_page_model');
		$this->movie_page_model->add_movie_review();
	}

}
?>