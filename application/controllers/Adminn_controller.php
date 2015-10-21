<?php 
	class Adminn_controller extends CI_Controller{
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
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Shows', $data);
		}

		public function shows($view = null, $sub = null) {
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
		
		function upload_poster() {
			$config['upload_path'] = 'C:\xampp\htdocs\Sinereserve\assets\images\posters';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '9999999999999';
			$config['max_width']  = '999999999999';
			$config['max_height']  = '999999999999';
			
			$this->upload->initialize($config);
			foreach ($_FILES as $key => $value) {
				if (!empty($value['tmp_name']) && $value['size'] > 0) {

					if (!$this->upload->do_upload($key)) {

						$errors = $this->upload->display_errors();
						echo ($errors);

					} else {
						print_r($_FILES);
					}
				}
			}
		}
	}
?>