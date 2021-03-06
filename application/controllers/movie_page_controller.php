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
		$this->session->set_flashdata('last-page', current_url());

		if($this->session->userdata('hurt-me-plenty')){
			$headerdata["accounts_link"] = "accounts_dropdown";
			$headerdata["accounts_link_mobile"] = "#modal-accounts-mobile";

			$this->load->model('header_model');
			$details = $this->header_model->get_user_fullname($this->session->userdata('hurt-me-plenty'));
			$headerdata['accounts_label'] = "Hello, " . $details['fname'] . " " . $details['lname'];
			$headerdata['accounts_entry'] = "";
			$headerdata['accounts_action'] = "dropdown-button";
			$headerdata['accounts_action_mobile'] = "modal-trigger";
			$headerdata['signin_errors'] = "";
			$headerdata['signup_errors'] = "";
			$headerdata['automodal'] = "";
		} else {
			$headerdata['card_no'] = $this->generate_cardnum();
			$this->session->set_userdata('card_no', $headerdata['card_no']);

			$headerdata['automodal'] = "";
			$headerdata['accounts_link'] = "#modal1";
			$headerdata["accounts_link_mobile"] = "#modal1";
			$headerdata['accounts_label'] = "Sign In";	
			$headerdata['accounts_entry'] = "";
			$headerdata['accounts_action'] = "modal-trigger";
			$headerdata['accounts_action_mobile'] = "modal-trigger";
			$headerdata['signin_errors'] = $this->session->flashdata('validation-errors-signin');
			$headerdata['signup_errors'] = $this->session->flashdata('validation-errors-signup');
			if(strlen($headerdata['signin_errors'])>0){
				$headerdata['automodal'] = "$('#modal1').openModal()";	
			} 
			elseif(strlen($headerdata['signup_errors'])>0){
				$headerdata['automodal'] = "$('#modal-signup').openModal()";
			}

			$headerdata['page_name'] = "SineReserve | Movie Details";

			$headerdata['signup-success'] = $this->session->flashdata('signup-success');
			if($headerdata['signup-success'] == 1) $headerdata['automodal'] = "$('#modal-signup-success').openModal()";  
		}
		// </the code that needs controller>

		$this->load->view('header', $headerdata);
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

	public function ajax_get_reserve_slots() {
		$mov_id = $this->input->post('mov_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$show_date = $this->input->post('show_date');
		$cine_id = $this->input->post('cine_id');
		$bran_id = $this->input->post('bran_id');
		
		// echo json_encode($row);
		$query = $this->movie_page_model->get_reserve_slots($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id);
		echo json_encode($query->result());
	}

	public function reserve_movie($mov_id, $mov_type) {
		$movie_id = $mov_id;
		$movie_type = $mov_type;
		$username = $this->session->userdata('hurt-me-plenty');
		$bran_id = $this->input->post('reserve_branch');
		$cine_id = $this->input->post('reserve_cinema');
		$show_date = $this->input->post('reserve_date');
		$time = $this->input->post('reserve_time');
		$slots_avail = $this->input->post('slots_avail');
		$reserve_cost = $this->input->post('reserve_cost');

		$start_time = substr($time, 0, 8);
		$end_time = substr($time, 11, 8);

		$sched_id = $this->movie_page_model->get_schedule($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id);
		$card_no = $this->movie_page_model->get_card_no($username);
		$card_points = $this->movie_page_model->get_card_points($username);

		if(($slots_avail > 0) && ($card_points > $reserve_cost)) {
			$or_no = 'OR' . str_pad($slots_avail, 3, "0", STR_PAD_LEFT) . date("dmY");

			$or_date = date("Y-m-d");
			$this->movie_page_model->add_movie_reservation($or_no, $or_date, $sched_id, $username);
			$this->movie_page_model->add_movie_reservation_slots($sched_id, $slots_avail - 1);
			$this->movie_page_model->add_movie_reservation_points($card_no, ($card_points - $reserve_cost));

			redirect('movie_page_controller/movie/'. $movie_id .'/'. $movie_type);
		}

		else if($slots_avail <= 0) {
			// NO SLOTS LEFT
			redirect('movie_page_controller/movie/'. $movie_id .'/'. $movie_type);	
		}

		else if($card_points < $reserve_cost) {
			//CARD POINTS IS INSUFFICIENT
			redirect('movie_page_controller/movie/'. $movie_id .'/'. $movie_type);	
		}
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

	public function generate_cardnum(){
		$this->load->model('header_model');
		$cardstring = "          ";
		do{
			for($index = 0; $index < 10; $index++){
				$num = rand(0, 9);
				$cardstring[$index] = $num;
			}
		} while ($this->header_model->is_existing('card_no', $cardstring));

		return $cardstring;
	}



}
?>