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
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Movie', $data);
		}

		public function shows() {
			$data['title_page'] = 'Shows';
			$branch_name = $branch_address = $result = array();
			$result = $this->admin_model->get_branch();
			$data['branch'] = $result; 
			$this->load->view('Admin_Navigation', $data);
			$this->load->view('Admin_Movie', $data);
		}
		
		function upload_poster() {
			$config['upload_path'] = './assets/images/posters';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('upload_success', $data);
			}
		}
	}
?>