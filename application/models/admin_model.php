<?php 
	class Admin_model extends CI_model{
		
		public function __construct(){
			$this->load->database();
		}
		
		public function get_branch(){
			$this->db->from('branch');
			$query = $this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
		}
		
		public function set_branch($name, $address){
			if(($name != null) && ($address != null)){
				$branch = array(
					'bran_name' => $name,
					'bran_address' => $address,
				);
				$this->db->insert('branch', $branch);
			}
		}
		
		public function get_cinema_in_branch($branch = null){
			$where = array('cinema.bran_id' => $branch);
			$this->db->select();
			$this->db->from('cinema');
			$this->db->join('branch', 'branch.bran_id = cinema.bran_id');
			$this->db->where($where);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$res = array('result' => $query->result(), 'last_row' => $query->last_row());
				return $res;
			} 
			else
				return null;
		} 
		
		public function insert_cinema_seat($cine_name, $bran_id, $cine_slots){
			if(($cine_name != null) && ($bran_id != null) && ($cine_slots != null)){
				$seat = array(
					'cine_name' => $cine_name,
					'bran_id' => $bran_id,
					'cine_slots' => $cine_slots,
				);
				$this->db->insert('cinema', $seat);
			}
			
		}		
	}
?>