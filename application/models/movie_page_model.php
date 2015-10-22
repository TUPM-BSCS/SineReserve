<?php

class movie_page_model extends CI_Model {

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
		$this->db->from('genre');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_movie_cast($mov_id) {
		$this->db->select('actor_name');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('actor');
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

	// RESERVATION
	public function add_movie_reservation($or_no, $or_date, $sched_id, $username) {
		$reserved_by = array(
			'or_no' => $or_no,
			'or_date' => $or_date,
			'sched_id' => $sched_id,
			'username' => $username,
		);
		$this->db->insert('reserved_by', $reserved_by);
	}

	public function add_movie_reservation_slots($sched_id, $slots_avail) {
		$update = array(
			'shows.slots_avail' => $slots_avail,
		);
		$this->db->where('sched_id', $sched_id);
		$this->db->update('shows', $update);
	}

	public function add_movie_reservation_points($card_no, $cost) {
		$update = array(
			'card.card_points' => $cost,
		);
		$this->db->where('card_no', $card_no);
		$this->db->update('card', $update);
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

	// public function getschedule() {
	// 	$this->db->where('mov_id', $mov_id);
	// 	$this->db->from('screenshots');
	// 	$query = $this->db->get();

	// 	if($query->num_rows() > 0) {
	// 		return $query->result_array();
	// 	}
	// 	return false;
	// }

	public function get_reserve_branch($mov_id) {
		$this->db->select('branch.bran_id, branch.bran_name');
		$this->db->where('mov_id', $mov_id);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');

		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	public function get_reserve_cinema($mov_id, $bran_id) {
		$this->db->select('cinema.cine_id, cinema.cine_name');

		$where = array(
			'mov_id' => $mov_id,
			'branch.bran_id' => $bran_id
		);
		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		
		return $this->db->get();
	}

	public function get_reserve_date($mov_id, $cine_id, $bran_id) {
		$this->db->select('shows.show_date');

		$where = array(
			'mov_id' => $mov_id,
			'cinema.cine_id' => $cine_id,
			'branch.bran_id' => $bran_id
		);
		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');

		return $this->db->get();
	}

	public function get_reserve_time($mov_id, $show_date, $cine_id, $bran_id) {
		$this->db->select('shows.start_time, shows.end_time');

		$where = array(
			'mov_id' => $mov_id,
			'show_date' => $show_date,
			'cinema.cine_id' => $cine_id,
			'branch.bran_id' => $bran_id
		);
		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');

		return $this->db->get();
	}

	public function get_reserve_cost($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id) {
		$this->db->select('shows.cost');

		$where = array(
			'mov_id' => $mov_id,
			'start_time' => $start_time,
			'end_time' => $end_time,
			'show_date' => $show_date,
			'cinema.cine_id' => $cine_id,
			'branch.bran_id' => $bran_id
		);
		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		
		return $this->db->get();
	}

	public function get_reserve_slots($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id) {
		$this->db->select('shows.slots_avail');

		$where = array(
			'mov_id' => $mov_id,
			'start_time' => $start_time,
			'end_time' => $end_time,
			'show_date' => $show_date,
			'cinema.cine_id' => $cine_id,
			'branch.bran_id' => $bran_id
		);
		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		
		return $this->db->get();
	}

	public function get_schedule($mov_id, $start_time, $end_time, $show_date, $cine_id, $bran_id) {
		$this->db->select('sched_id');

		$where = array(
			'mov_id' => $mov_id,
			'start_time' => $start_time,
			'end_time' => $end_time,
			'show_date' => $show_date,
			'cinema.cine_id' => $cine_id,
			'branch.bran_id' => $bran_id
		);

		// print_r($where);

		$this->db->where($where);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->sched_id;
		}
		return false;
	}

	public function get_slots_available($sched_id) {
		$this->db->select('shows.slots_avail');
		$this->db->where('sched_id', $sched_id);
		$this->db->from('shows');
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			return $query->row()->slots_avail;
		}
		return false;
	}

	// ADD REVIEW
	public function add_movie_review($title, $review, $user_rating, $review_date, $username, $mov_id) {
		if(($title != null) && ($review != null)) {
			$review = array(
				'title' => $title,
				'review' => $review,
				'user_rating' => $user_rating,
				'review_date' => $review_date,
				'username' => $username,
				'mov_id' => $mov_id
			);
			$this->db->insert('review', $review);
		}
	}

}

?>