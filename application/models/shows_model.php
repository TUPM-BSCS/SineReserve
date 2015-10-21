<?php

class shows_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_mov_ids_by_date($date = null) {
		if($date == null)
			$date = date('Y-m-d');
		$this->db->select('mov_id');
		$this->db->where('show_date', $date);
		$this->db->from('shows');
		return $this->db->get();
	}

	public function get_other_mov_ids($mov_ids = array(), $date = null) {
		if($date == null)
			$date = date('Y-m-d');
		if(count($mov_ids) > 0)
			$this->db->where_not_in('mov_id', $mov_ids);
		$this->db->where('show_date >', $date);
		$this->db->select('mov_id');
		$this->db->from('shows');
		return $this->db->get();
	}

	public function get_min_max_show_date() {
		$this->db->select_max('show_date', 'max');
		$this->db->select_min('show_date', 'min');
		$this->db->from('shows');
		return $this->db->get();
	}

	public function get_show_by_date_range($from = null, $to = null) {
		if($from != null)
			$this->db->where('show_date >=', $from);
		if($to != null)
			$this->db->where('show_date <=', $to);
		$this->db->from('shows');
		$this->db->select('movie.mov_name, show_date, branch.bran_name, sched_id');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		$this->db->join('movie', 'movie.mov_id = shows.mov_id');
		return $this->db->get();
	}

	public function get_show_by_branch($branch = 'all') {
		if($branch != 'all')
			$this->db->where('branch.bran_id', $branch);
		$this->db->from('shows');
		$this->db->select('movie.mov_name, show_date, branch.bran_name, sched_id');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		$this->db->join('movie', 'movie.mov_id = shows.mov_id');
		return $this->db->get();
	}

	public function get_shows_by_id($id = null) {
		if($id != null)
			$this->db->where('sched_id', $id);
		$this->db->from('shows');
		return $this->db->get();
	}

	public function get_show_by_things($movie, $cinema, $date) {
		$where = array(
			'mov_id' => $movie,
			'cine_id' => $cinema,
			'show_date' => $date
		);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		return $this->db->get();
	}

	public function get_show_by_thangs($movie, $branch) {
		$where = array(
			'mov_id' => $movie,
			'branch.bran_id' => $branch
		);
		$this->db->from('shows');
		$this->db->join('cinema', 'cinema.cine_id = shows.cine_id');
		$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
		return $this->db->get();
	}

}

?>