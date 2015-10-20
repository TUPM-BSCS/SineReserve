<?php
class Promos extends CI_CONTROLLER{
	public function __construct(){
      		parent::__construct();
      		$this->load->helper('url');     
      		$this->load->library('session');
    	}
	public function promos(){
		
		
		// <the code that needs controller> 
		if($this->session->userdata('hurt-me-plenty')){
			$data['accounts_link'] = "#modal1";

			$this->load->model('header_model');
			$details = $this->header_model->get_user_fullname($this->session->userdata('hurt-me-plenty'));
			$data['accounts_label'] = "Hello, " . $details['fname'] . " " . $details['lname'];

		} else {
			$data['accounts_link'] = "#modal1";
			$data['accounts_label'] = "Accounts";	
		}		
		// </the code that needs controller>
		
		$this->load->view('header', $data);
		$this->load->view('promos_page_view', $data);
		$this->load->view('footer');
	}
}
?>