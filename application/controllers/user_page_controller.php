<?php
class user_page_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));     
      $this->load->library('session');
    }   

	public function user($username){
		$this->load->model('user_page_model');

		$data['title'] = 'User Page';
		$data['user_username'] = $username;
		$data['user_fullname'] = $this->user_page_model->get_user_fullname($username);
		$data['user_email'] = $this->user_page_model->get_user_email($username);
		$data['user_birthdate'] = $this->user_page_model->get_user_birthdate($username);
		$data['user_sex'] = $this->user_page_model->get_user_sex($username);
		$data['user_address'] = $this->user_page_model->get_user_address($username);
		
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
		$this->load->view('user_page_view', $data);
		$this->load->view('footer');
	}
}
?>