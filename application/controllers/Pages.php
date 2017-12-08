<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
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

    public function index()
    {
        $data['content'] = 'pages/index';
 		$this->load->view('layout/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->m_pages->json();
    }

    public function getCategory() {
    	header('Content-Type: application/json');
        $data = $this->m_pages->getCategory();
        echo json_encode($data);
    }

    public function addcategory() {
    	$table = 'category';
    	$data['category'] = $this->input->post('category');
    	if($this->m_pages->insert_category($table, $data)) {
    		$this->getCategory();
    	}
    }

    public function read($id) 
    {
        $row = $this->M_pages->get_by_id($id);
        if ($row) {
            $data = array(
				'id_post' => $row->id_post,
				'title' => $row->title,
				'content' => $row->content,
				'category' => $row->category,
				'status' => $row->status,
				'created_by' => $row->created_by,
				'created_at' => $row->created_at,
				'img' => $row->img,
			    );
        
        $this->load->view('pages/pages_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }

    public function create() 
    {
        $data = array(
        	'kategori' => $this->m_pages->inCategory(),
            'button' => 'Create',
            'action' => site_url('pages/create_action'),
		    'id_post' => set_value('id_post'),
		    'title' => set_value('title'),
		    'content' => set_value('content'),
		    'category' => set_value('category'),
		    'status' => set_value('status'),
		    'created_by' => set_value('created_by'),
		    'created_at' => set_value('created_at'),
		    'img' => set_value('img'),
		);
		$data['content'] = 'pages/pages_form';
 		$this->load->view('layout/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'title' => $this->input->post('title',TRUE),
			'content' => $this->input->post('content',TRUE),
			'category' => $this->input->post('category',TRUE),
			'status' => $this->input->post('status',TRUE),
			'created_by' => $this->input->post('created_by',TRUE),
			'created_at' => $this->input->post('created_at',TRUE),
			'img' => $this->input->post('img',TRUE),
		    );

            $this->M_pages->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pages'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_pages->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pages/update_action'),
		'id_post' => set_value('id_post', $row->id_post),
		'title' => set_value('title', $row->title),
		'content' => set_value('content', $row->content),
		'category' => set_value('category', $row->category),
		'status' => set_value('status', $row->status),
		'created_by' => set_value('created_by', $row->created_by),
		'created_at' => set_value('created_at', $row->created_at),
		'img' => set_value('img', $row->img),
	    );
            $this->load->view('pages/pages_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_post', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'content' => $this->input->post('content',TRUE),
		'category' => $this->input->post('category',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'img' => $this->input->post('img',TRUE),
	    );

            $this->M_pages->update($this->input->post('id_post', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pages'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_pages->get_by_id($id);

        if ($row) {
            $this->M_pages->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('img', 'img', 'trim|required');

	$this->form_validation->set_rules('id_post', 'id_post', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}