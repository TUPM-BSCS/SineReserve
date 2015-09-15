<?php

class shows_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_mov_id_by_date($date = null) {
		if($date == null)
			$date = date('Y-m-d');
		$this->db->select('mov_id');
		$this->db->where('date', $date);
		$this->db->from('shows');
		return $this->db->get();
	}

}

?>