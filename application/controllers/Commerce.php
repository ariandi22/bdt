<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commerce extends CI_Controller {
    function __construct() {
        parent::__construct();

 		$this->load->model('m_admin');
 		$this->load->model('m_pages');
 		$this->load->library('form_validation');
 		$this->load->helper(array('form'));
 		$this->load->helper('file');
 		$this->load->library('datatables');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";        
    }

	public function index() {

		$data['content'] = 'commerce/index';
		$this->load->view('layout/backend', $data);
	}

    public function showSettings() {
        $data =    '<div class="panel panel-default pnl">
                    <div class="panel-heading">
                    <h3 class="panel-title">Settings</h3>
                    </div>
                    <div class="panel-body">
                    <small>edit your settings here</small>
                    </div>
                    </div>';
        echo $data;
    }

    public function showNewOrder() {
        $data =    '<div class="panel panel-default pnl">
                    <div class="panel-heading">
                    <h3 class="panel-title">New Order</h3>
                    </div>
                    <div class="panel-body">
                    <small>manage this new order</small>
                    </div>
                    </div>';
        echo $data;
    }
}

?>