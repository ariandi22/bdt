<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Main extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model(array('m_admin','m_main'));
		$this->logo = $this->m_admin->getlogo();
		$this->icon = $this->m_admin->geticon();
	}

	public function index() {
		$data['regular'] = $this->m_main->index_regular();
		$data['premium'] = $this->m_main->index_premium();
		$this->load->view('main/index', $data);
	}

	public function costume_plan() {
		$data['reg'] = $this->m_main->index_north();
		$data['hotels'] = $this->m_main->index_hotels();
		$data['cars'] = $this->m_main->index_cars();
		unset($_SESSION['name']);
		$this->load->view('main/costume_order', $data);
	}
	public function costume_plan_preview() {
		if (isset($_POST['des']) or isset($_POST['hotels']) or isset($_POST['cars']) ) {
			
			$a = $this->m_main->costume_plan_preview();
			if($a) {
				$data['destination'] = $this->session->userdata();
				$this->load->view('main/costume_order_preview', $data);
			}

		} else {
			$data['destination'] = $this->session->userdata();
			$this->load->view('main/costume_order_preview', $data);
		}
		
	}



}
?>