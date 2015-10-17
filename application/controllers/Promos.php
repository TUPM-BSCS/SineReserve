<?php
class Promos extends CI_CONTROLLER{
	public function __construct(){
      		parent::__construct();
      		$this->load->helper('url');     
    	}
	public function promos(){
		
		$this->load->view('promos_page_view', $data);
	}
}
?>