<?php
class Homepage extends CI_Controller {
	public function home(){
		$this->load->helper('url');
		$data['title'] = 'SineReserve';
		$this->load->view('index', $data);
	}
}
?>