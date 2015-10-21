<?php
class movie_page_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));     
      $this->load->library('session');
      $this->load->model('movie_page_model');
    }   

	public function movie($mov_id, $mov_type = null, $mov_reserve = null){
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

		
		// <the code that needs controller> 
		if($this->session->userdata('hurt-me-plenty')){
			$data['accounts_link'] = "accounts_dropdown";

			$this->load->model('header_model');
			$details = $this->header_model->get_user_fullname($this->session->userdata('hurt-me-plenty'));
			$data['accounts_label'] = "Hello, " . $details['fname'] . " " . $details['lname'];
			$data['accounts_entry'] = "";
			$data['accounts_action'] = "dropdown-button";
		} else {
			$data['accounts_link'] = "#modal1";
			$data['accounts_label'] = "Accounts";	
			$data['accounts_entry'] = "";
			$data['accounts_action'] = "modal-trigger";
		}		
		// </the code that needs controller>

		$this->load->view('header', $data);
		$this->load->view('movie_page_view', $data);
		$this->load->view('footer');
	}
	
	public function ajax_get_reserve_cinema() {
		$mov_id = $this->input->post('mov_id');
		$bran_id = $this->input->post('bran_id');
		
		// echo json_encode($row);
		$query = $this->movie_page_model->get_reserve_cinema($mov_id, $bran_id);
		echo json_encode($query->result());
	}

	public function ajax_get_reserve_date() {
		$mov_id = $this->input->post('mov_id');
		$cine_id = $this->input->post('cine_id');
		$bran_id = $this->input->post('bran_id');
		
		// echo json_encode($row);
		$query = $this->movie_page_model->get_reserve_date($mov_id, $cine_id, $bran_id);
		echo json_encode($query->result());
	}

	public function ajax_get_reserve_time() {
		$mov_id = $this->input->post('mov_id');
		$show_date = $this->input->post('show_date');
		$cine_id = $this->input->post('cine_id');
		$bran_id = $this->input->post('bran_id');
		
		// echo json_encode($row);
		$query = $this->movie_page_model->get_reserve_time($mov_id, $show_date, $cine_id, $bran_id);
		echo json_encode($query->result());
	}

	public function ajax_get_reserve_cost() {
		$mov_id = $this->input->post('mov_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$show_date = $this->input->post('show_date');
		$cine_id = $this->input->post('cine_id');
		$bran_id = $this->input->post('bran_id');
		
		// echo json_encode($row);
		$query = $this->movie_page_model->get_reserve_cost($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id);
		echo json_encode($query->result());
	}

	public function reserve_movie($mov_id, $mov_type) {
		$movie_id = $mov_id;
		$movie_type = $mov_type;
		$username = $this->session->userdata('hurt-me-plenty');
		$bran_id = $this->input->post('reserve_branch');
		$cine_id = $this->input->post('reserve_cinema');
		$date = $this->input->post('reserve_date');
		$time = $this->input->post('reserve_time');

		$start_time = $time.substr(0, 8);
		$end_time = $time.substr(11, 8);


		$price = $this->input->post('reserve_cost');

		$or_no = 'aa';
		$or_date = date("Y-m-d");
		$sched_id = $this->movie_page_model->get_schedule($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id);
		$this->movie_page_model->add_movie_reservation($or_no, $or_date, $sched_id, $username);

		redirect('movie_page_controller/movie/'. $movie_id .'/'. $movie_type);
	}

	public function review_movie($mov_id, $mov_type) {
		$movie_id = $mov_id;
		$movie_type = $mov_type;
		$review_title = $this->input->post('review_title');
		$review_rating = $this->input->post('review_rating');
		$review_content = $this->input->post('review_content');
		$review_date = date("Y-m-d");
		$username = $this->session->userdata('hurt-me-plenty');

		$this->movie_page_model->add_movie_review($review_title, $review_content, $review_rating, $review_date, $username, $movie_id);

		redirect('movie_page_controller/movie/'. $movie_id .'/'. $movie_type);
	}

}
?>