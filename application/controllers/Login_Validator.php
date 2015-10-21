<?php
	class Login_Validator extends CI_Controller{

		public $username;
		public $password;

		function index(){
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'trim|callback_insert_username');
			$this->form_validation->set_rules('password', 'Password', 'trim|callback_insert_password|md5');//'trim|required|matches[passconf]|md5');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('movie_index_view');
			}
			
			else {
				$this->check_validity();
			}
			
		}

		public function insert_username($str){
			$this->username = $str;
		}

		public function insert_password($string){
			$this->password = $string;
		}

		private function check_validity(){
			$this->load->model('header_model');
			$res = $this->header_model->validate_user($this->username, $this->password);
			if($res == TRUE){
				$this->header_model->signin_user($this->username, $this->password);
				redirect('home/home');	
			} else {
				$res = $this->header_model->validate_admin($this->username, $this->password);
				if($res == TRUE){
					$this->header_model->signin_admin($this->username, $this->password);
					redirect('Admin_controller');
				} else {
					$res = $this->header_model->signin_admin($this->username, $this->password);
					redirect('Admin_controller/index');
				}
			}
			
		}
	}
?>