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
			$query = $this->movies_model->get_movies_by_id($mov_ids, array('mov_name', 'mov_poster'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['now_showing'], array('name'=>$row->mov_name, 'poster'=>$row->mov_poster));
			}
		}

		// echo var_dump($data);


		$this->load->view('index', $data);
	}
	
}
?>