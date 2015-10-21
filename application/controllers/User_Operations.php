<?php
	class User_Operations extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('header_model');
			$this->load->library('session');
		}

		public function sign_in($username, $password){
			$this->header_model->signin_user($this->session->userdata('username'), $this->session->userdata('password'));
		}

		public function sign_out(){
			$this->header_model->signout_user();
			redirect('home/home');
		}
	}
?>