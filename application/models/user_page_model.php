<?php

class user_page_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_user_fullname($username) {
		$this->db->select('fname, minit, lname');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->fname . " " . $query->row()->minit . " " . $query->row()->lname;
		}
		return false;
	}

	public function get_user_email($username) {
		$this->db->select('email');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->email;
		}
		return false;
	}

	public function get_user_birthdate($username) {
		$this->db->select('birthdate');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->birthdate;
		}
		return false;
	}

	public function get_user_sex($username) {
		$this->db->select('sex');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->sex;
		}
		return false;
	}

	public function get_user_address($username) {
		$this->db->select('address');
		$this->db->where('username', $username);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->address;
		}
		return false;
	}

	public function get_card_no($username) {
		$this->db->select('card.card_no');
		$this->db->where('user.username', $username);
		$this->db->from('card');
		$this->db->join('user', 'card.card_no = user.card_no');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->card_no;
		}
		return false;
	}

	public function get_card_points($username) {
		$this->db->select('card_points');
		$this->db->where('user.username', $username);
		$this->db->from('card');
		$this->db->join('user', 'card.card_no = user.card_no');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->card_points;
		}
		return false;
	}

}

?>