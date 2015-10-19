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

}

?>