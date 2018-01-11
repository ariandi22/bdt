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
		$this->load->view('main/index');
	}

	public function tour_package() {
		$data['regular'] = $this->m_main->index_regular();

		$data['content'] = 'main/tour_package';
		$this->load->view('layout/layout_main', $data);
	}

	public function tour_package_detail($slug) {

		$data['detail'] = $this->m_main->package_detail($slug);
		
		$data['content'] = 'main/tour_package_detail';
		$this->load->view('layout/layout_main', $data);
	}

	public function costume_plan() {
		$data['reg'] = $this->m_main->index_north();
		$data['hotels'] = $this->m_main->index_hotels();
		$data['cars'] = $this->m_main->index_cars();
		$data['content'] = 'main/costume_order';
		$this->load->view('layout/layout_main', $data);
	}
	public function costume_plan_preview() {
		if (isset($_POST['des']) or isset($_POST['hotels']) or isset($_POST['cars']) ) {
			
			$a = $this->m_main->costume_plan_preview();
			if($a) {
				$data['data_plan'] = $this->session->userdata();

				$data['content'] = 'main/costume_order_preview';
				$this->load->view('layout/layout_main', $data);
			}

		} elseif (isset($_SESSION['destination']) or isset($_SESSION['hotels']) or isset($_SESSION['cars'])) {
			$data['data_plan'] = $this->session->userdata();
			
			$data['content'] = 'main/costume_order_preview';
			$this->load->view('layout/layout_main', $data);
		} 
		else {
			$this->session->set_flashdata('fail', 'No data are selected');
			redirect(base_url('costume_plan'));
		}
		
	}



}
?>