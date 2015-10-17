<?php
class promos_model extends CI_MODEL{

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_promos_by_date($date = null) {
		if($date == null)
			$date = date('Y-m-d');
		$this->db->select('prom_title, prom_banner');
		$this->db->where('prom_start_date <', $date);
		$this->db->where('prom_end_date >', $date);
		$this->db->from('promo_and_event');
		return $this->db->get();
	}

}
?>