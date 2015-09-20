<?php 
	class Admin_model extends CI_model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function get_branch(){
			$this->db->select();
			$this->db->from('branch');
			$query = $this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
		}
	}
?>