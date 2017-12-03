<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_info');
        $this->load->model('m_admin');

        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->helper('file');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";
    }

    // welcome page
    public function list_info() {
        $data['about'] = $this->m_info->index();
        $data['content'] = 'company_profile/info/index';
        $this->load->view('layout/backend', $data);
    }

 }
?>