<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Main extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
		$this->logo = $this->m_admin->getlogo();
		$this->icon = $this->m_admin->geticon();
	}

	public function index() {
		$this->load->view('main/index');
	}
}


?>