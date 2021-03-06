<?php
class movie_index_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));    
      $this->load->library(array('form_validation','session'));
    }   

	public function movie_index(){
		$today = '2015-02-14';
		$today = $today->format('Y-M-d');
		//create root array for movie list
		$data['movie_list'] = array();

		//create root array for pande list
		$data['pande'] = array();

		//create now showing array inside root array
		$data['movie_list']['now_showing'] = array();		

		//create next attraction array inside root array
		$data['movie_list']['next_attraction'] = array();

		//create coming soon array inside root array
		$data['movie_list']['coming_soon'] = array();

		//create other movies array inside root array
		$data['movie_list']['other_movies'] = array();

		//get all pande that is effective today
		$this->load->model('promos_model');
		$query = $this->promos_model->get_promos_by_date($today);
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				array_push($data['pande'], array('title'=>$row->prom_title, 'banner'=>$row->prom_banner));
			}
		}

		//get all mov_id on shows table that has a date today
		$this->load->model('shows_model');
		$this->load->model('movies_model');
		$this->load->model('movie_index_model');
		$now_showing = array();
		$next_attraction = array();
		$coming_soon = array();
		$other_movies = array();

		$query = $this->shows_model->get_mov_ids_by_date($today);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				array_push($now_showing, $row->mov_id);
			}
		}

		$query2 = $this->shows_model->get_other_mov_ids($now_showing, $today);
		if($query2->num_rows() > 0) {
			foreach($query2->result() as $row) {
				array_push($next_attraction, $row->mov_id);
			}
		}

		$query3 = $this->movies_model->get_other_mov_ids(array_merge($now_showing, $next_attraction), $today);
		if($query3->num_rows() > 0) {
			foreach ($query3->result() as $row) {
				array_push($coming_soon, $row->mov_id);
			}
		}

		$query4 = $this->movie_index_model->get_other_mov(array_merge($now_showing, $next_attraction, $coming_soon), $today);
		if($query4->num_rows() > 0){
			foreach ($query4->result() as $row) {
				array_push($other_movies, $row->mov_id);
			}
		}

		//get all mov_name and mov_poster from movie_table that has entry in now showing array
		if(count($now_showing) > 0) {
			$query = $this->movies_model->get_movies_by_id($now_showing, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color', 'mov_running_time'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['now_showing'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color, 'running_time'=>$row->mov_running_time));
			}
		}

		//get all mov_name and mov_poster from movie_table that has entry in next attraction array
		if(count($next_attraction) > 0) {
			$query = $this->movies_model->get_movies_by_id($next_attraction, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color', 'mov_running_time'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['next_attraction'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color, 'running_time'=>$row->mov_running_time));
			}
		}


		//get all mov_name and mov_poster from movie_table that has entry in coming soon array
		if(count($coming_soon) > 0) {
			$query = $this->movies_model->get_movies_by_id($coming_soon, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color', 'mov_running_time'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['coming_soon'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color, 'running_time'=>$row->mov_running_time));
			}
		}

		//get all mov_name and mov_poster from movie_table that has entry in other movies array
		if(count($other_movies) > 0) {
			$query = $this->movies_model->get_movies_by_id($other_movies, array('mov_id', 'mov_name', 'mov_poster_img', 'mov_color', 'mov_running_time'));
			foreach($query->result() as $row) {
				array_push($data['movie_list']['other_movies'], array('id'=>$row->mov_id, 'name'=>$row->mov_name, 'poster'=>$row->mov_poster_img, 'color'=>$row->mov_color, 'running_time'=>$row->mov_running_time));
			}
		}

		// echo var_dump($data);
		// <the code that needs controller> 
		$this->session->set_flashdata('last-page', current_url());

		$headerdata['page_name'] = "SineReserve | Movies";
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

			$headerdata['signup-success'] = $this->session->flashdata('signup-success');
			if($headerdata['signup-success'] == 1) $headerdata['automodal'] = "$('#modal-signup-success').openModal()";  
		}
		// </the code that needs controller>

		$this->load->view('header', $headerdata);
		$this->load->view('movie_index_view', $data);
		$this->load->view('footer');
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