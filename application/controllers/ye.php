<?php
class ye extends CI_Controller {
	public function home(){
		$this->load->helper('url');
		$data['title'] = 'SineReserve';
		$this->load->view('index', $data);
	}
	public function movie(){
		$this->load->helper('url');
		$data['title'] = 'Movie Page';
		$this->load->view('moviepage', $data);
	}
	
}
?>