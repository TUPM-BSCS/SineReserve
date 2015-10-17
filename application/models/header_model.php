<?php

class header_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function validate_user($username, $password) {
		$this->db->select('username, PASSWORD');
		$this->db->where('username, PASSWORD', $username, $password);
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	public function add_new_user($username, $password, $email, $lastname, $firstname, $middleinitial, $sex, $birthdate, $aaddress, $card_no, $card_pin) {

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

	public function get_movie_name($mov_id) {
		$this->db->select('mov_name');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_name;
		}
		return false;
	}

	public function get_movie_poster_img($mov_id) {
		$this->db->select('mov_poster_img');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_poster_img;
		}
		return false;
	}

	public function get_movie_plot($mov_id) {
		$this->db->select('mov_plot');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_plot;
		}
		return false;
	}

	public function get_movie_rating($mov_id) {
		$this->db->select('mov_rating');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_rating;
		}
		return false;
	}

	public function get_movie_running_time($mov_id) {
		$this->db->select('mov_running_time');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_running_time;
		}
		return false;
	}

	public function get_movie_release_date($mov_id) {
		$this->db->select('mov_release_date');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_release_date;
		}
		return false;
	}

	public function get_movie_trailer($mov_id) {
		$this->db->select('mov_trailer');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_trailer;
		}
		return false;
	}

	public function get_movie_genre($mov_id) {
		$this->db->select('genre_name');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('genre_of_movie');
		$this->db->join('genre', 'genre_of_movie.genre_id = genre.genre_id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_movie_cast($mov_id) {
		$this->db->select('actor_fname, actor_lname, actor_img, cast_role');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('cast');
		$this->db->join('actor', 'cast.actor_id = actor.actor_id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_movie_screenshots($mov_id) {
		$this->db->select('sc_details, sc_img');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('screenshots');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_movie_reviews($mov_id) {
		$this->db->where('mov_id', $mov_id);
		$this->db->from('review');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

}

?>