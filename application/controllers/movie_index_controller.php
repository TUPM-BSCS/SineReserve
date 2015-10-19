<?php
class movie_index_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper('url');     
    }   

	public function movie_index(){
		$this->load->model('movie_index_model');

		$data['movie_index'] = array();
		$data['movie_index']['movie_list'] = array();
		$movie_list = array();

		$query = $this->movie_index_model->get_movies_list();
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				array_push($movie_list, $row->mov_id);
			}
		}

		if(count($movie_list) > 0) {
			$query = $this->movie_index_model->get_movies($movie_list, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color'));
			foreach($query->result() as $row) {
				array_push($data['movie_index']['movie_list'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color));
			}
		}

		$this->load->view('header');
		$this->load->view('movie_index_view', $data);
		$this->load->view('footer');
	}
	
}
?>