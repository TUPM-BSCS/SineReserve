<?php 
	class Admin_controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url'); 
			$this->load->library('session'); 
			$this->load->library('upload');
			$this->load->model('admin_model');
		}   
	
		public function index(){
			$this->load->helper('url');
			$this->branch();
			$this->session->set_userdata('branch', 1);
		}
		
		public function dashboard(){
			$data['title_page'] = 'Admin Dashboard';
			$data['branch'] = array();
			$this->load->view('Admin_Navigation', $data);
		}
		
		public function branch(){
			$data['title_page'] = 'Branch';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result; 
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Branch', $data);
		}
		
		
		public function add_branch(){
			$data['title_page'] = 'Branch';
			$name = $this->input->post('add_branch_name');
			$address = $this->input->post('add_branch_address');
			$this->admin_model->set_branch($name, $address);
			redirect('Admin_Controller/branch');
		}
		
		public function cinema(){
			
			if($this->input->post('for_branch') != null)
				$this->session->set_userdata('branch', $this->input->post('for_branch'));
			$data['title_page'] = 'Cinema';
			$data['residing_branch'] = $this->session->userdata('branch');
			$result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result;
			$result = $this->admin_model->get_cinema_in_branch($this->session->userdata('branch'));
			if($result == null){
				$data['cinema'] = array();
				$data['last_cinema'] = 0;
			}
			else{
				$data['cinema'] = $result['result'];
				$data['last_cinema'] = str_replace("Cinema", '', $result['last_row']->cine_name);
				if ($result['last_row']->cine_name == null)
					$data['last_cinema'] = 0;
			}
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Cinema', $data);
		}
		
		public function insert_cinema_seats(){
			$seats = $this->input->post('no_of_seats');
			$branch = $this->input->post('bran_id');
			$cine = $this->input->post('cine_id');
			$this->admin_model->insert_cinema_seat($cine, $branch, $seats);
			$this->session->set_userdata('branch', $branch);
			redirect('Admin_Controller/cinema');
		}
		
		public function movie(){
			$data['title_page'] = 'Movie';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result; 
			$data['poster_error'] = $this->session->flashdata('poster_error');
			// $data['poster_error'] = 'hi';
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Movie', $data);
		}

		public function admin_shows() {
			$data['title_page'] = 'Shows';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result; 
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Movie', $data);
		}
	
		public function insert_movie_by_imdb(){
			// var_dump($_FILES);
			if($this->admin_model->get_last_movie_index() == null)
				$mov_id = 1;
			else
				$mov_id = $this->admin_model->get_last_movie_index()->mov_id + 1;
			
			$mov_name = $this->input->post("add_imdb_title");
			$mov_plot = $this->input->post("add_imdb_plot");
			$mov_trailer = $this->input->post("add_imdb_trailer");
			$mov_release_date = str_replace(',','', $this->input->post("add_imdb_date"));
			$date_parts = explode(" ", $mov_release_date);
			$mov_release_date = date_create_from_format("Y-M-d",$date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
			$mov_release_date = $mov_release_date->format("Y-m-d");
			$mov_rating = $this->input->post("add_imdb_rate");
			$mov_running_time = $this->input->post("add_imdb_time");
			$actors = explode(',', $this->input->post("add_imdb_actor_hidden"));
			$genre = explode(',', $this->input->post("add_imdb_genre_hidden"));
			var_dump($actors);
			var_dump($genre);
			
			//Insert Movie to DB and Upload Poster
			$type = substr($_FILES['add_imdb_poster_btn']['name'],-4,4);
			$_FILES['add_imdb_poster_btn']['name'] = $mov_id.$type;
			$mov_poster_img = 'assets/images/screenshots/'.$_FILES['add_imdb_poster_btn']['name'];
			var_dump($mov_release_date);
			// $this->admin_model->insert_movie($mov_name, $mov_plot, $mov_rating, $mov_running_time, $mov_release_date, $mov_poster_img, $mov_trailer);
			
			// Insert Actor to DB
			foreach ($actors as $x) {
				$this->admin_model->insert_actor($mov_id, $x);
			}
			
			// Insert Genre to DB
			foreach ($genre as $x) {
				$this->admin_model->insert_genre($mov_id, $x);
			}
			
			// Insert screenshots to DB and Upload 
			$type = substr($_FILES['add_imdb_image1_btn']['name'],-4,4);
			$_FILES['add_imdb_image1_btn']['name'] = $mov_id.'_1'.$type;	
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_imdb_image1_btn']['name']);
			
			$type = substr($_FILES['add_imdb_image2_btn']['name'],-4,4);
			$_FILES['add_imdb_image2_btn']['name'] = $mov_id.'_2'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_imdb_image1_btn']['name']);
			
			$type = substr($_FILES['add_imdb_image3_btn']['name'],-4,4);
			$_FILES['add_imdb_image3_btn']['name'] = $mov_id.'_3'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_imdb_image1_btn']['name']);			
			
			// var_dump($_FILES);
			$this->upload_poster($_FILES, 'imdb');
			$this->upload_screenshots($_FILES, 'imdb');
		}
		
		public function insert_movie_by_title(){
			// var_dump($_FILES);
			if($this->admin_model->get_last_movie_index() == null)
				$mov_id = 1;
			else
				$mov_id = $this->admin_model->get_last_movie_index()->mov_id + 1;
			
			$mov_name = $this->input->post("add_title_title");
			$mov_plot = $this->input->post("add_title_plot");
			$mov_trailer = $this->input->post("add_title_trailer");
			$mov_release_date = str_replace(',','', $this->input->post("add_title_date"));
			$date_parts = explode(" ", $mov_release_date);
			$mov_release_date = date_create_from_format("Y-M-d",$date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
			$mov_release_date = $mov_release_date->format("Y-m-d");
			$mov_rating = $this->input->post("add_title_rate");
			$mov_running_time = $this->input->post("add_title_time");
			die($this->input->post("add_title_actor_hidden"));
			$actors = explode(',', $this->input->post("add_title_actor_hidden"));
			$genre = explode(',', $this->input->post("add_title_genre_hidden"));
			var_dump($actors);
			var_dump($genre);
			
			//Insert Movie to DB and Upload Poster
			$type = substr($_FILES['add_title_poster_btn']['name'],-4,4);
			$_FILES['add_title_poster_btn']['name'] = $mov_id.$type;
			$mov_poster_img = 'assets/images/screenshots/'.$_FILES['add_title_poster_btn']['name'];
			// var_dump($mov_release_date);
			$this->admin_model->insert_movie($mov_name, $mov_plot, $mov_rating, $mov_running_time, $mov_release_date, $mov_poster_img, $mov_trailer);
			
			// Insert Actor to DB
			foreach ($actors as $x) {
				$this->admin_model->insert_actor($mov_id, $x);
			}
			
			// Insert Genre to DB
			foreach ($genre as $x) {
				$this->admin_model->insert_genre($mov_id, $x);
			}
			
			// Insert screenshots to DB and Upload 
			$type = substr($_FILES['add_title_image1_btn']['name'],-4,4);
			$_FILES['add_title_image1_btn']['name'] = $mov_id.'_1'.$type;	
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_title_image1_btn']['name']);
			
			$type = substr($_FILES['add_title_image2_btn']['name'],-4,4);
			$_FILES['add_title_image2_btn']['name'] = $mov_id.'_2'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_title_image1_btn']['name']);
			
			$type = substr($_FILES['add_title_image3_btn']['name'],-4,4);
			$_FILES['add_title_image3_btn']['name'] = $mov_id.'_3'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_title_image1_btn']['name']);			
			
			// var_dump($_FILES);
			$this->upload_poster($_FILES, 'title');
			$this->upload_screenshots($_FILES, 'title');
		}
		
		
		public function upload_poster($files, $type){
			$config['upload_path'] = './assets/images/posters';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9999999999999';
			$config['max_width']  = '999999999999';
			$config['max_height']  = '999999999999';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('add_'.$type.'_poster_btn')) {

				$errors = $this->upload->display_errors();
				$this->session->set_flashdata('poster_error',$errors);
				redirect('Admin_Controller/movie');
			} 
			else {
				// print_r($_FILES);
			}
		}
		
		public function upload_screenshots($files, $type){
			$config['upload_path'] = './assets/images/screenshots';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9999999999999';
			$config['max_width']  = '999999999999';
			$config['max_height']  = '999999999999';

			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('add_'.$type.'_image1_btn')) {

				$errors = $this->upload->display_errors();
				echo ($errors);

			} 
			else {
				// print_r($_FILES);
			}
			
			if (!$this->upload->do_upload('add_'.$type.'_image2_btn')) {

				$errors = $this->upload->display_errors();
				echo ($errors);

			} 
			else {
				// print_r($_FILES);
			}
			
			if (!$this->upload->do_upload('add_'.$type.'_image3_btn')) {

				$errors = $this->upload->display_errors();
				echo ($errors);

			} 
			else {
				// print_r($_FILES);
			}
		}
		
		function upload_multiple() {
			$config['upload_path'] = './assets/images/posters';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9999999999999';
			$config['max_width']  = '999999999999';
			$config['max_height']  = '999999999999';
			
			$this->upload->initialize($config);
			foreach ($_FILES as $key => $value) {
				if (!empty($value['tmp_name']) && $value['size'] > 0) {

					if (!$this->upload->do_upload()) {

						$errors = $this->upload->display_errors();
						echo ($errors);

					} 
					else {
						// print_r($_FILES);
					}
				}
			}
		}
		
		public function validate_input($string, $type){
			switch($type){
				case 'genre': 
					if(!preg_match("^[a-zA-Z]*$", $string))
						return 'Genre is invalid.';
					break;
				case 'name': 
					if(!preg_match("/^[a-z ,.'-]+$/i", $string))
						return 'Name is invalid.';
					break;
			}
		}
	}
?>