<?php 
	class Admin_controller extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url'); 
			$this->load->model('admin_model');
		}   
	
		public function index(){
			$this->load->helper('url');
			$this->branch();
		}
		
		public function branch(){
			$data['title_page'] = 'Admin Page';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			foreach($result as $row){
				array_push($branch_name,$row->bran_name);
				array_push($branch_address,$row->bran_add);
			}
			$this->load->view('admin_page', $data);
		}
	}
?>