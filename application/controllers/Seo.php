<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller {
 	
 	public function __construct() {
 		parent::__construct();
 		$this->load->model('m_admin');
 		$this->load->model('m_seo');
 		$this->load->library('form_validation');
 		$this->load->helper(array('form'));
 		$this->load->helper('file');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";
 	}

 	public function index() {

 		$table = 'seo';
 		$row = $this->m_seo->index($table);
 		if($row) {
 			$data['action'] = 'saves';
 			$data['id']=  set_value('id', $row->id);
 			$data['site_title']=  set_value('site_title', $row->site_title);
 			$data['description']=  set_value('description', $row->description);
 			$data['g_verification']=  set_value('g_verification', $row->g_verification);

 			$data['content'] = 'admin/seo';
 			$this->load->view('layout/backend', $data);
 		} else {
 			$data['action'] = 'saves';
 			$data['id'] = set_value('id');
 			$data['site_title']=  set_value('site_title');
 			$data['description']=  set_value('description');
 			$data['g_verification']=  set_value('g_verification');

 			$data['content'] = 'admin/seo';
 			$this->load->view('layout/backend', $data);
 		}
 	}


 	public function saves() {

 		$id = $this->input->post('id');
 		$table='seo';
 		if(!empty($id)) {

 			$data['site_title'] = $this->input->post('site_title');
 			$data['description'] = $this->input->post('description');
 			$data['g_verification'] = $this->input->post('g_verification');

 			if($this->m_seo->update($this->input->post('id'), $data, $table)) {
 				$this->session->set_flashdata('message', 'Data successfuly saved');
            	redirect(site_url('seo/index'));
 			} else {
 				$this->session->set_flashdata('message', 'Failed!! try again');
            	redirect(site_url('seo/index'));
 			}
 		} else {
 			$data['site_title'] = $this->input->post('site_title');
 			$data['description'] = $this->input->post('description');
 			$data['g_verification'] = $this->input->post('g_verification');

 			if($this->m_seo->insert($table,$data)) {
 				$this->session->set_flashdata('message', 'Data successfuly updated');
            	redirect(site_url('seo/index'));
 			} else {
 				$this->session->set_flashdata('message', 'Failed!! try again');
            	redirect(site_url('seo/index'));
 			}
 		}

 	}

}
?>