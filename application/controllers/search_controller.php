<?php
class search_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));     
		$this->load->library('session');
		$this->load->model('search_model');
	}

	public function ajax_search() {
		$search_term = $this->input->post('search_term');

		if($search_term == null) {
			echo json_encode();
		}

		else {
			$query = $this->search_model->get_movie_results($search_term);
			
			if($query == null) {
				echo json_encode('No Result');
			}

			else {
				echo json_encode($query->result());
			}
		}
	}
}

?>