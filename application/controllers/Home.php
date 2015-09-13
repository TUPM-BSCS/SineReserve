<?php
class Home extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      $this->load->helper('url');     
    }   

	public function home(){
		$data['title'] = 'SineReserve';
		$data['posters'] = null;
		$this->load->view('index', $data);
	}
	public function movie(){
		$data['title'] = 'Movie Page';
		$this->load->view('moviepage', $data);
	}
	
}
?>