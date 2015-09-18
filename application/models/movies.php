<?php

class movies extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
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

	public function get_movie_desc($mov_id) {
		$this->db->select('mov_desc');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_desc;
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

	public function get_movie_genre() {

	}

	public function get_movie_cast() {

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