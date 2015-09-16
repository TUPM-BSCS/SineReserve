<?php 
	class Admin_controller extends CI_Controller{
		public function index(){
			$this->load->helper('url');
			$this->dashboard();
		}
		
		public function dashboard(){
			$data['title_page'] = 'Admin Page';
			$this->load->view('admin_page', $data);
		}
	}
?>