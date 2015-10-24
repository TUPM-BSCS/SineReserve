<?php

class header_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function validate_user($username, $password) {
		//$where = "username = '" . $username . "' AND PASSWORD = '" . $password . "'";
		$this->db->select('username');
		$this->db->where('username', $username);
		$this->db->where('PASSWORD', $password);
		$this->db->from('user');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	public function validate_admin($username, $password){
		$this->db->select('admin_id');
		$this->db->where('admin_id', $username);
		$this->db->where('admin_password', $password);
		$this->db->from('admin');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return true;
		}
	}

	public function signin_user($username, $password){
		$this->session->set_userdata('hurt-me-plenty', $username);
	}

	public function signin_admin($username, $password){
		$this->session->set_userdata('hurt-me-plenty-more', $username);
	}

	public function signout_user(){
		$this->session->unset_userdata('hurt-me-plenty');
	}

	public function signout_admin(){
		$this->session->unset_userdata('hurt-me-plenty-more');
	}

	public function get_user_fullname($username){
		$this->db->select('fname, lname');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function is_existing($field, $value){
		$this->db->select($field);
		$this->db->where($field, $value);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->row_array() > 0) return TRUE;
		return FALSE;
	}

	public function is_card_existing($value){

	}

	public function add_new_user($username, $password, $email, $lname, $fname, $minit, $sex, $birthdate, $address, $card_no) {

		$user_values = array(
				'username' => $username,
				'PASSWORD' => $password,
				'email' => $email,
				'lname' => $lname,
				'fname' => $fname,
				'minit' => $minit,
				'sex' => $sex,
				'birthdate' => $birthdate,
				'address' => $address,
				'card_no' => $card_no,
				'verify' => md5(rand(0,1000))
		);

		if($this->db->insert('user', $user_values)) return true;
		return false;

	}

	public function add_card($card_no, $card_pin){
		$card_values = array(
			'card_no' => $card_no,
			'card_pin' => $card_pin,
			'card_points' => 0
		);

		if($this->db->insert('card', $card_values)) return true;
		return false;
	}

	public function get_verifyhash($username){
		$this->db->select('verify');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		return $query->row_array()->verify;
	}

	public function set_user_username() {

	}

	public function set_user_password() {

	}

	public function set_user_email() {

	}

	public function set_user_lastname() {

	}

	public function set_user_firstname() {

	}

	public function set_user_middleinitial() {

	}

	public function set_user_sex() {

	}

	public function set_user_birthdate() {

	}

	public function set_user_address() {

	}

	public function set_user_card_no() {

	}

	public function set_user_card_pin() {

	}
}

?>