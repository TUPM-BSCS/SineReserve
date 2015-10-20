<?php
class movie_page_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));     
    }   

	public function movie($mov_id, $mov_type = null, $mov_reserve = null){
		$this->load->model('movie_page_model');

		$data['title'] = 'Movie Page';
		$data['movie_id'] = $mov_id;
		$data['movie_type'] = $mov_type;
		$data['movie_reserve'] = $mov_reserve;
		$data['movie_name'] = $this->movie_page_model->get_movie_name($mov_id);
		$data['movie_rating'] = $this->movie_page_model->get_movie_rating($mov_id);
		$data['movie_poster_img'] = $this->movie_page_model->get_movie_poster_img($mov_id);
		$data['movie_plot'] = $this->movie_page_model->get_movie_plot($mov_id);
		$data['movie_running_time'] = $this->movie_page_model->get_movie_running_time($mov_id);
		$data['movie_release_date'] = $this->movie_page_model->get_movie_release_date($mov_id);
		$data['movie_genre'] = $this->movie_page_model->get_movie_genre($mov_id);
		$data['movie_cast'] = $this->movie_page_model->get_movie_cast($mov_id);
		$data['movie_screenshots'] = $this->movie_page_model->get_movie_screenshots($mov_id);
		$data['movie_trailer'] = $this->movie_page_model->get_movie_trailer($mov_id);
		$data['movie_reviews'] = $this->movie_page_model->get_movie_reviews($mov_id);

		$data['reserve_branch'] = $this->movie_page_model->get_reserve_branch($mov_id);
		
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

	public function review_movie($mov_id) {
		$this->load->model('movie_page_model');

		$movie_id = $mov_id;
		$review_title = $this->input->post('review_title');
		$review_rating = $this->input->post('review_rating');
		$review_content = $this->input->post('review_content');
		$review_date = date("Y-m-d");
		$username = 'renzoralph07';

		$this->movie_page_model->add_movie_review($review_title, $review_content, $review_rating, $review_date, $username, $movie_id);
	}

}
?>