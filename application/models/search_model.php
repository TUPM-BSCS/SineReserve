<?php

class search_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_movie_results($search_term) {
		$this->db->select('mov_id, mov_name');
		$this->db->from('movie');
		$this->db->like('mov_name', $search_term, 'both'); 
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query;
		}
		return null;
	}

}

?>