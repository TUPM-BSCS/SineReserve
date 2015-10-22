<?php
	class Login_Validator extends CI_Controller{

		public $username;
		public $password;
		public $type;

		function index(){
			$this->load->helper(array('form', 'url'));

			$this->load->library(array('form_validation','session'));

			$this->form_validation->set_error_delimiters('<div class="row s12 red darken-1 white-text card center-align"><p>', '</p></div>');

			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_validity',
													array('required' => 'Please enter your username.'));
			// $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_insert_password',
			// 										array('required' => 'Please enter your password.'));//'trim|required|matches[passconf]|md5');

			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('validation-errors-signin', validation_errors());
				redirect($this->session->flashdata('last-page'));
				
			}
			
			else {
				$this->sign_in();
			}
			
		}

		public function insert_username($str){
			$this->username = $str;
		}

		public function insert_password($string){
			$this->password = $string;
		}

		public function check_validity($str){
			$this->username = $str;
			$this->password = $this->input->post('password');
			$this->load->model('header_model');
			$res = $this->header_model->validate_user($this->username, $this->password);
			if($res == TRUE){
				$this->type = "USER";
				return TRUE;
			} else {
				$res = $this->header_model->validate_admin($this->username, $this->password);
				if($res == TRUE){
					$this->type = "ADMIN";
					return TRUE;
				} else {

				}
				$this->form_validation->set_message('check_validity', 'Username/Password is incorrect.');
				return FALSE;
			}
		}

		private function sign_in(){
			switch($this->type){
				case "USER":
					$this->header_model->signin_user($this->username, $this->password);
					redirect($this->session->flashdata('last-page'));
					break;
				case "ADMIN":
					$this->header_model->signin_admin($this->username, $this->password);
					redirect('Admin_controller');
					break;
			}

		}
	}

?>