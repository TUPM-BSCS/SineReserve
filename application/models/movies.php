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

	public function get_movie_poster($mov_id) {
		$this->db->select('mov_poster');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('movie');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->mov_poster;
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