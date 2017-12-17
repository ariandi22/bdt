<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct() {
        parent::__construct();

 		$this->load->model('m_admin');
 		$this->load->model('m_pages');
 		$this->load->model('m_menu');
 		$this->load->library('form_validation');
 		$this->load->helper(array('form'));
 		$this->load->helper('file');
 		$this->load->library('datatables');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";        
    }

	public function index() {
		$data['kategori'] = $this->m_pages->CategoryForMenu();
		$data['menu'] = $this->m_menu->index();
        $data['content'] = 'menu/index';
 		$this->load->view('layout/backend', $data);
    }

    public function insert() {
    	$a = $this->m_menu->insert();

    	if($a) {
    		$this->session->set_flashdata('success', 'menu successfully set');
    		redirect(site_url('menu'));
    	} else {
    		$this->session->set_flashdata('fail', 'something wrong when proccess you request, try again');
    		redirect(site_url('menu'));
    	}
    }

}
?>