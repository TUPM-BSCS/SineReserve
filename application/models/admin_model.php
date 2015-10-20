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
		
		public function get_movie(){
			$movie_details = array();
			$this->db->select('*');
			$this->db->from('movie');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result();
			}
		}
		
		public function get_total_sales($mov_id){
			$movie = array('movie.mov_id' => $mov_id);
			$x = 0;
			$this->db->select('cost');
			$this->db->from('movie');
			$this->db->join('shows', 'movie.mov_id = shows.mov_id');
			$this->db->join('reserved_by', 'shows.sched_id = reserved_by.sched_id');
			$this->db->where($movie);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$x += $row->cost; 
				}
				return $x;
			}
		}

		public function insert_movie($mov_name, $mov_plot, $mov_rating, $mov_running_time, $mov_release_date, $mov_poster_img, $mov_trailer){
			// if(($mov_name != null) && ($mov_plot != null) && ($mov_rating != null) && ($mov_running_time != null) && ($mov_release_date != null) && ($mov_poster_img != null ) && ($mov_trailer != null)){
				$movie = array(
					'mov_name' => $mov_name,
					'mov_plot' => $mov_plot,
					'mov_rating' => $mov_rating,
					'mov_running_time' => $mov_running_time,
					'mov_release_date' => $mov_release_date,
					'mov_poster_img' => $mov_poster_img,
					'mov_trailer' => $mov_trailer,
				);
				$this->db->insert('movie', $movie);
			// }
		}
		
		public function insert_actor($mov_id, $actor_name){
			if(($mov_id != null) && ($actor_name != null)){
				$actor = array(
					'actor_name' => $actor_name,
					'mov_id' => $mov_id,
				);
				$this->db->insert('actor', $actor);
			}
		}
		
		public function insert_genre($mov_id, $genre_name){
			if(($mov_id != null) && ($genre_name != null)){
				$genre = array(
					'genre_name' => $genre_name,
					'mov_id' => $mov_id,
				);
				$this->db->insert('genre', $genre);
			}
		}
		
		public function insert_screenshot($mov_id, $path){
			if(($mov_id != null) && ($path != null)){
				$sc = array(
					'sc_img' => $path,
					'mov_id' => $mov_id,
				);
				$this->db->insert('screenshots', $sc);
			}
		}
		
		
		public function get_last_genre_index(){
			$this->db->select('genre_id');
			$this->db->from('genre');
			$query = $this->db->get();
				if ($query->num_rows() > 0){
					return $query->last_row();
				}
		}
		
		public function get_last_actor_index(){
			$this->db->select('actor_id');
			$this->db->from('actor');
			$query = $this->db->get();
				if ($query->num_rows() > 0){
					return $query->last_row();
				}
		}
		
		public function get_last_movie_index(){
			$this->db->select('mov_id');
			$this->db->from('movie');
			$query = $this->db->get();
				if ($query->num_rows() > 0){
					return $query->last_row();
				}
		}
	}
?>