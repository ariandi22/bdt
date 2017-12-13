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

    	foreach($_POST["kat"] as $a) {
    		$data['menu'] = $a;
        	$a = $this->m_menu->insert($data);
    	}

    	if($a) {
    		$this->session->set_flashdata('success', 'data successfully added');
    		redirect(site_url('menu'));
    	} else {
    		$this->session->set_flashdata('fail', 'done bos');
    		redirect(site_url('menu'));
    	}
    }

}
?>