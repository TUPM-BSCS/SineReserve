<?php
	class Login_Validator extends CI_Controller{

		private $username = NULL;
		private $password = NULL;

		function index(){
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'callback_insert_username');
			$this->form_validation->set_rules('password', 'Password', 'callback_insert_password');//'trim|required|matches[passconf]|md5');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('movie_index_view');
			}
			else
			{
				$this->check_validity();
			}
		}

		public function insert_username($str){
			var_dump($str);
			$this->username = $str;
		}

		public function insert_password($str){
			$this->password = $str;
		}

		private function check_validity(){
			$this->load->model('header_model');
			var_dump($this->username);
			$res = $this->header_model->validate_user($this->username, $this->password);
			var_dump($res);
		}
	}
?>