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

	public function get_movies($mov_ids = array(), $select = array()) {
		if(count($mov_ids) > 0) {
			if(count($select) > 0) {
				$this->db->select($select);
			}
			$this->db->where_in('mov_id', $mov_ids);
			$this->db->from('movie');
			return $this->db->get();
		}
	}
}

?>