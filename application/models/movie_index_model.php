<?php

class movie_index_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function get_movies_list() {
		$this->db->select('mov_id');
		$this->db->from('movie');
		return $this->db->get();
	}

	public function get_other_mov($mov_ids = array(), $date = null) {
		if($date == null) 
			$date = date('Y-m-d');
		if(count($mov_ids) > 0)
			$this->db->where_not_in('mov_id', $mov_ids);
		$this->db->where('mov_release_date <', $date);
		$this->db->select('mov_id');
		$this->db->from('movie');
		return $this->db->get();
	}
}

?>