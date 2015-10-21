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
		
		public function log_out(){
			$this->session->unset_userdata('hurt-me-plenty-more');
			redirect('home/home');
		}
		
		public function dashboard(){
			$data['title_page'] = 'Admin Dashboard';
			$data['branch'] = array();
			$this->load->view('Admin_Navigation', $data);
		}
		
		public function branch(){
			if(!$this->session->userdata('hurt-me-plenty-more'))
				redirect('Home/home');
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
			if(!$this->session->userdata('hurt-me-plenty-more'))
				redirect('Home/home');
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
			if(!$this->session->userdata('hurt-me-plenty-more'))
				redirect('Home/home');
			$i = 0;
			$movie = $date = array();
			$data['title_page'] = 'Movie';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result; 
			$data['poster_error'] = $this->session->flashdata('poster_error');
			$movie = $this->admin_model->get_movie();
			foreach($movie as $row){
				$date = explode('-',$row->mov_release_date);
				$row->mov_year = $date[0];
				$row->mov_sales = $this->admin_model->get_total_sales($row->mov_id);
			}
			$data['movie'] = array_reverse($movie);
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
		
		public function insert_movie_by_custom(){
			// var_dump($_FILES);
			if($this->admin_model->get_last_movie_index() == null)
				$mov_id = 1;
			else
				$mov_id = $this->admin_model->get_last_movie_index()->mov_id + 1;
			
			$mov_name = trim($this->input->post("add_custom_title"));
			$mov_plot = trim($this->input->post("add_custom_plot"));
			$mov_trailer = $this->input->post("add_custom_trailer");
			$mov_release_date = str_replace(',','', $this->input->post("add_custom_date"));
			$date_parts = explode(" ", $mov_release_date);
			$mov_release_date = date_create_from_format("Y-M-d",$date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
			$mov_release_date = $mov_release_date->format("Y-m-d");
			$mov_rating = $this->input->post("add_custom_rate");
			$mov_running_time = $this->input->post("add_custom_time");
			$actors = explode(',', $this->input->post("add_custom_actor_hidden"));
			$genre = explode(',', $this->input->post("add_custom_genre_hidden"));
			var_dump($actors);
			var_dump($genre);
			
			//Insert Movie to DB and Upload Poster
			$type = substr($_FILES['add_custom_poster_btn']['name'],-4,4);
			$_FILES['add_custom_poster_btn']['name'] = $mov_id.$type;
			$mov_poster_img = 'assets/images/poster/'.$_FILES['add_custom_poster_btn']['name'];
			var_dump($mov_release_date);
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
			$type = substr($_FILES['add_custom_image1_btn']['name'],-4,4);
			$_FILES['add_custom_image1_btn']['name'] = $mov_id.'_1'.$type;	
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_custom_image1_btn']['name']);
			
			$type = substr($_FILES['add_custom_image2_btn']['name'],-4,4);
			$_FILES['add_custom_image2_btn']['name'] = $mov_id.'_2'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_custom_image1_btn']['name']);
			
			$type = substr($_FILES['add_custom_image3_btn']['name'],-4,4);
			$_FILES['add_custom_image3_btn']['name'] = $mov_id.'_3'.$type;
			$this->admin_model->insert_screenshot($mov_id, 'assets/images/screenshots/'.$_FILES['add_custom_image1_btn']['name']);			
			
			// var_dump($_FILES);
			$this->upload_poster($_FILES, 'custom');
			$this->upload_screenshots($_FILES, 'custom');
			redirect('Admin_Controller/movie');
		}
	
		public function insert_movie_by_imdb(){
			// var_dump($_FILES);
			if($this->admin_model->get_last_movie_index() == null)
				$mov_id = 1;
			else
				$mov_id = $this->admin_model->get_last_movie_index()->mov_id + 1;
			
			$mov_name = trim($this->input->post("add_imdb_title"));
			$mov_plot = trim($this->input->post("add_imdb_plot"));
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
			$mov_poster_img = 'assets/images/poster/'.$_FILES['add_imdb_poster_btn']['name'];
			var_dump($mov_release_date);
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
			redirect('Admin_Controller/movie');
		}
		
		public function insert_movie_by_title(){
			// var_dump($_FILES);
			if($this->admin_model->get_last_movie_index() == null)
				$mov_id = 1;
			else
				$mov_id = $this->admin_model->get_last_movie_index()->mov_id + 1;
			
			$mov_name = trim($this->input->post("add_title_title"));
			$mov_plot = trim($this->input->post("add_title_plot"));
			$mov_trailer = $this->input->post("add_title_trailer");
			$mov_release_date = str_replace(',','', $this->input->post("add_title_date"));
			$date_parts = explode(" ", $mov_release_date);
			$mov_release_date = date_create_from_format("Y-M-d",$date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
			$mov_release_date = $mov_release_date->format("Y-m-d");
			$mov_rating = $this->input->post("add_title_rate");
			$mov_running_time = $this->input->post("add_title_time");
			$actors = explode(',', $this->input->post("add_title_actor_hidden"));
			$genre = explode(',', $this->input->post("add_title_genre_hidden"));
			var_dump($actors);
			var_dump($genre);
			
			//Insert Movie to DB and Upload Poster
			$type = substr($_FILES['add_title_poster_btn']['name'],-4,4);
			$_FILES['add_title_poster_btn']['name'] = $mov_id.$type;
			$mov_poster_img = 'assets/images/poster/'.$_FILES['add_title_poster_btn']['name'];
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
			redirect('Admin_Controller/movie');
		}

		public function shows($view = null, $sub = null) {
			if(!$this->session->userdata('hurt-me-plenty-more'))
				redirect('Home/home');
			$today = '2015-02-14';
			$this->load->model('shows_model');
			if($view == null) {
				$view = 'time';
			}
			$data['view'] = $view;

			$query = $this->shows_model->get_min_max_show_date();
			$row = $query->row();
			$min = date_create($row->min);
			date_sub($min, date_interval_create_from_date_string('1 month'));
			$min = date_format($min, '[Y,m,d]');
			$max = date_create($row->max);
			date_sub($max, date_interval_create_from_date_string('1 month'));
			$max = date_format($max, '[Y,m,d]');
			
			switch ($view) {
				case 'time':
					$data['time'] = array();
					if($sub == null) {
						$data['time']['from'] = $today;
						$data['time']['to'] = $row->max;
					}
					else {
						$dates = explode("_", $sub);
						$data['time']['from'] = $dates[0];
						$data['time']['to'] = $dates[1];
					}
					$query = $this->shows_model->get_show_by_date_range($data['time']['from'], $data['time']['to']);
					$data['table'] = $query->result();
					break;
				
				case 'branch':
					if($sub == null) {
						$data['branch'] = 'all';
					}
					else {
						$data['branch'] = $sub;
					}
					$query = $this->shows_model->get_show_by_branch($data['branch']);
					$data['table'] = $query->result();
					break;

				case 'movie':
					# code...
					break;
			}
			$result = $this->admin_model->get_branch();
			$data['branches'] = $result;

			$today = date_create($today);
			date_sub($today, date_interval_create_from_date_string('1 month'));
			$today = date_format($today, '[Y,m,d]');
			$data['today'] = $today;
			$data['limits'] = array();
			$data['limits']['min'] = $min; 
			$data['limits']['max'] = $max;
			$data['title_page'] = 'Shows';
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Shows', $data);
		}

		public function ajax_get_cinemas_by_branch() {
			$branch = $this->input->post('branch');
			$this->load->model('admin_model');
			$result = $this->admin_model->get_cinema_in_branch($branch);
			echo json_encode($result['result']);
		}

		public function ajax_get_shows_information() {
			$id = $this->input->post('id');
			$this->load->model('shows_model');
			$query = $this->shows_model->get_shows_by_id($id);
			$row = $query->row();
			// echo json_encode($row);
			$query = $this->shows_model->get_show_by_things($row->mov_id, $row->cine_id, $row->show_date);
			echo json_encode($query->result());
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