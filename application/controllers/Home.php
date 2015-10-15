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

		//create next attraction array inside root array
		$data['movie_list']['next_attraction'] = array();

		//create coming soon array inside root array
		$data['movie_list']['coming_soon'] = array();

		//get all mov_id on shows table that has a date today
		$this->load->model('shows_model');
		$this->load->model('movies_model');
		$now_showing = array();
		$next_attraction = array();
		$coming_soon = array();

		$query = $this->shows_model->get_mov_ids_by_date('2015-09-20');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				array_push($now_showing, $row->mov_id);
			}
		}

		$query2 = $this->shows_model->get_other_mov_ids($now_showing, '2015-09-20');
		if($query2->num_rows() > 0) {
			foreach($query2->result() as $row) {
				array_push($next_attraction, $row->mov_id);
			}
		}

		$query3 = $this->movies_model->get_other_mov_ids(array_merge($now_showing, $next_attraction), '2015-09-20');
		if($query3->num_rows() > 0) {
			foreach ($query3->result() as $row) {
				array_push($coming_soon, $row->mov_id);
			}
		}

		//get all mov_name and mov_poster from movie_table that has entry in now showing array
		if(count($now_showing) > 0) {
			$query = $this->movies_model->get_movies_by_id($now_showing, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['now_showing'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color));
			}
		}

		//get all mov_name and mov_poster from movie_table that has entry in next attraction array
		if(count($next_attraction) > 0) {
			$query = $this->movies_model->get_movies_by_id($next_attraction, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['next_attraction'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color));
			}
		}


		//get all mov_name and mov_poster from movie_table that has entry in coming soon array
		if(count($coming_soon) > 0) {
			$query = $this->movies_model->get_movies_by_id($coming_soon, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['coming_soon'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color));
			}
		}


		// echo var_dump($data);


		$this->load->view('index', $data);
	}
	
}
?>