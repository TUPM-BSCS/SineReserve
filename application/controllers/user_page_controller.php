<?php
class user_page_controller extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper(array('form','url'));     
      $this->load->library('session');
    }   

	public function user(){

		$username = $this->session->userdata('hurt-me-plenty');

		$this->load->model('user_page_model');

		$data['title'] = 'User Page';
		$data['user_username'] = $username;
		$data['user_fullname'] = $this->user_page_model->get_user_fullname($username);
		$data['user_email'] = $this->user_page_model->get_user_email($username);
		$data['user_birthdate'] = $this->user_page_model->get_user_birthdate($username);
		$data['user_sex'] = $this->user_page_model->get_user_sex($username);
		$data['user_address'] = $this->user_page_model->get_user_address($username);
		$data['card_no'] = $this->user_page_model->get_card_no($username);
		$data['card_points'] = $this->user_page_model->get_card_points($username);
		
		// print_r($data);
		// die();

		// <the code that needs controller> 
		$this->session->set_flashdata('last-page', current_url());

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
			//$headerdata['card_no'] = $this->generate_cardnum();

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
		$this->load->view('user_page_view', $data);
		$this->load->view('footer');
	}
}
?>