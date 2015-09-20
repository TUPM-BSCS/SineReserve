<?php
class Home extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper('url');     
    }   

	public function home(){
		//create root array for movie list
		$data['movie_list'] = array();

		//create now showing array inside root array
		$data['movie_list']['now_showing'] = array();		

		//create coming soon array inside root array
		$data['movie_list']['coming_soon'] = array();

		//get all mov_id on shows table that has a date today
		$this->load->model('shows_model');
		$query = $this->shows_model->get_mov_id_by_date('2015-09-20');
		$mov_ids = array();
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				array_push($mov_ids, $row->mov_id);
			}
		}

		//get all mov_name and mov_poster from movie_table that has a mov_id taken from previous array
		if(count($mov_ids) > 0) {
			$this->load->model('movies_model');
			$query = $this->movies_model->get_movies_by_id($mov_ids, array('mov_name', 'mov_poster_img'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['now_showing'], array('name'=>$row->mov_name, 'poster'=>$row->mov_poster_img));
			}
		}

		// echo var_dump($data);


		$this->load->view('index', $data);
	}

	public function movie(){
		$this->load->model('movies');

		$movie = 3;

		$data['title'] = 'Movie Page';
		$data['movie_name'] = $this->movies->get_movie_name($movie);
		$data['movie_rating'] = $this->movies->get_movie_rating($movie);
		$data['movie_poster'] = $this->movies->get_movie_poster($movie);
		$data['movie_plot'] = $this->movies->get_movie_plot($movie);
		$data['movie_running_time'] = $this->movies->get_movie_running_time($movie);
		$data['movie_genre'] = $this->movies->get_movie_genre($movie);
		$data['movie_cast'] = $this->movies->get_movie_cast($movie);
		$data['movie_screenshots'] = $this->movies->get_movie_screenshots($movie);
		$data['movie_trailer'] = $this->movies->get_movie_trailer($movie);
		$data['movie_reviews'] = $this->movies->get_movie_reviews($movie);
		
		// print_r($data);
		// die();

		$this->load->view('moviepage', $data);
	}
	
}
?>