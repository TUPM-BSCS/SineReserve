<?php
	class Signup_Validator extends CI_Controller{

		public $username;
		public $password;
		public $rpassword;
		public $email;
		public $lname;
		public $fname;
		public $mname;
		public $sex;
		public $birth;
		public $address;
		public $cardnum;

		function index(){
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation', 'session');

			$this->form_validation->set_rules('up_username', 'Username', 'trim|required|callback_insert_username');
			$this->form_validation->set_rules('up_password', 'Password', 'trim|required|callback_insert_password|md5');//'trim|required|matches[passconf]|md5');
			$this->form_validation->set_rules('up_rpassword', 'Re-entered Password', 'trim|required|callback_insert_rpassword');
			$this->form_validation->set_rules('up_lname', 'Last Name', 'trim|required|callback_insert_lname');
			$this->form_validation->set_rules('up_fname', 'First Name', 'trim|required|callback_insert_fname');
			$this->form_validation->set_rules('up_mname', 'Middle Name', 'trim|required|callback_insert_mname');
			$this->form_validation->set_rules('up_sex', 'Sex', 'trim|required|callback_insert_sex');
			$this->form_validation->set_rules('up_birth', 'Birthdate', 'trim|required|callback_insert_birth');
			$this->form_validation->set_rules('up_address', 'Address', 'trim|required|callback_insert_address');
			$this->form_validation->set_rules('up_cardnum', 'Card Number', 'trim|required|callback_insert_cardnum');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('home/home');
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

		public function insert_rpassword($str){
			$this->rpassword = $str;
		}

		public function insert_email($string){
			$this->email = $string;
		}

		public function insert_lname($str){
			$this->lname = $str;
		}

		public function insert_fname($string){
			$this->fname = $string;
		}

		public function insert_mname($str){
			$this->mname = $str;
		}

		public function insert_sex($string){
			$this->sex = $string;
		}

		public function insert_birth($str){
			$this->birth = $str;
		}

		public function insert_address($string){
			$this->address = $string;
		}
		public function insert_cardnum($string){
			$this->cardnum = $string;
		}

		private function check_validity(){
			$this->load->model('header_model');
			$this->header_model->add_new_user($this->username, $this->password, $this->email, $this->lname, $this->fname, $this->mname, $this->sex, $this->birth, $this->address, $this->cardnum);
			redirect('home/home');	
		}
	}
?>