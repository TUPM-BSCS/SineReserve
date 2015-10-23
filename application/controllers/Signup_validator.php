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

			$this->load->library(array('form_validation', 'session'));

			$this->load->model('header_model');

			$this->form_validation->set_error_delimiters('<div class="row s12 red darken-1 white-text card center-align"><p>', '</p></div>');

			$this->form_validation->set_rules('up_username', 'Username', 'trim|alpha_dash|min_length[8]|max_length[12]|callback_insert_username',
												 array('alpha_dash' => 'Username must only be combination of letters and numbers.'));
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[16]|callback_insert_password|md5');//'trim| matches[passconf]|md5');
			$this->form_validation->set_rules('rpassword', 'Re-entered Password', 'trim|matches[password]',
												 array('matches' => 'Re-entered password does not match with the password.'));
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|callback_insert_email');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|alpha|callback_insert_lname',
												 array('alpha' => 'Last name must only be letters.'));
			$this->form_validation->set_rules('fname', 'First Name', 'trim|alpha|callback_insert_fname',
												 array('alpha' => 'First name must only be letters.'));
			$this->form_validation->set_rules('mname', 'Middle Name', 'trim|alpha|callback_insert_mname',
												 array('alpha' => 'Middle name must only be letters.'));
			$this->form_validation->set_rules('rad_sex', 'Sex', 'trim|required|callback_insert_sex');
			$this->form_validation->set_rules('bday', 'Birthdate', 'trim|callback_insert_birth');
			$this->form_validation->set_rules('address', 'Address', 'trim|callback_insert_address');
			$this->form_validation->set_rules('cardnum', 'Card Number', 'trim|callback_insert_cardnum');

			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('validation-errors-signup', validation_errors());
				redirect($this->session->flashdata('last-page'));

			}
			
			else {
				$this->check_validity();
			}

			
		}

		public function insert_username($str){
			if($this->header_model->is_existing('username', $str)){
				$this->form_validation->set_message('insert_username', 'You have entered username that is used by other users. Please enter another username.');
				return FALSE;
			} else {
				$this->username = $str;
				return TRUE;	
			}
			

		}

		public function insert_password($string){
			$this->password = $string;
		}

		public function insert_rpassword($str){
			
		}

		public function insert_email($string){
			if($this->header_model->is_existing('email', $string)){
				$this->form_validation->set_message('insert_email', 'You have entered email-address that is used by other users. Please enter another e-mail address.');
				return FALSE;
			}
			$this->email = $string;
			return TRUE;		
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
			redirect($this->session->flashdata('last-page'));
		}
	}
?>