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
        $a =  $this->m_pages->json();
        echo $a;
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
        $row = $this->m_pages->get_by_id($id);
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
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }

    public function create() 
    {
    	$data['kategori'] = $this->m_pages->inCategory();
    	$data['button'] = 'Publish';
    	$data['action'] = site_url('pages/create_action');
    	$data['id_post'] = set_value('id_post');
    	$data['title'] = set_value('title');
    	$data['lang'] = set_value('lang');
    	$data['konten'] = set_value('content');
    	$data['category'] = set_value('category');
    	$data['meta_desc'] = set_value('meta_desc');

		$data['content'] = 'pages/pages_form';
 		$this->load->view('layout/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	$data['title'] = $this->input->post('title',TRUE);
        	$data['lang'] = $this->input->post('lang',TRUE);
        	$data['content'] = $this->input->post('konten');
        	$data['category'] = $this->input->post('category',TRUE);
        	$data['meta_desc'] = $this->input->post('meta_desc',TRUE);

        	$slug = $this->input->post('title',TRUE);
        	$data['slug'] = $this->ToSlug($slug);

        	$data['img'] = $this->upload_handler($params);

            if($this->m_pages->insert($data)) {
            	$this->session->set_flashdata('success', 'Create Record Success');
            	redirect(site_url('pages'));
        	} else {
        		$this->session->set_flashdata('fail', 'Something went wrong during the process. Try again');
        		$gagal = $data['img'];
        		unlink($gagal);
        		redirect(site_url('pages'));
        	}
        }
    }
    
    public function update($id) 
    {
        $row = $this->m_pages->get_by_id($id);

        if ($row) {

        	$data['kategori'] = $this->m_pages->inCategory();
        	$data['button'] = 'Update';
        	$data['action'] = site_url('pages/update_action');
        	$data['id_post'] = set_value('id_post', $row->id_post);
        	$data['title'] = set_value('title', $row->title);
        	$data['lang'] = set_value('lang', $row->title);
        	$data['konten'] = set_value('content', $row->content);
        	$data['category'] = set_value('category', $row->category);
        	$data['meta_desc'] = set_value('meta_desc', $row->meta_desc);
        	$data['status'] = set_value('status', $row->status);

        	$data['content'] = 'pages/pages_form';
            $this->load->view('layout/backend', $data);
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_post', TRUE));
        } else {

        	$idpost = $this->input->post('id_post');
        	$row = $this->m_pages->get_by_id($idpost);
        	$img_old = $row->img;

        	$data['title'] = $this->input->post('title',TRUE);
        	$data['lang'] = $this->input->post('lang',TRUE);
        	$data['content'] = $this->input->post('konten');
        	$data['category'] = $this->input->post('category',TRUE);
        	$data['meta_desc'] = $this->input->post('meta_desc',TRUE);
        	$data['status'] = $this->input->post('status',TRUE);

        	$slug = $this->input->post('title',TRUE);
        	$data['slug'] = $this->ToSlug($slug);

        	$cek = $this->upload_handler($params);
        	if ($cek != false) {
        		$data['img'] = $cek;
        	}

        	if($this->m_pages->update($this->input->post('id_post', TRUE), $data)) {
        		if(isset($data['img'])) {unlink($img_old);}
            	$this->session->set_flashdata('success', 'Update Record Success');
            	redirect(site_url('pages'));
        	}
        }
    }
    
    public function delete($id) 
    {
        $row = $this->m_pages->get_by_id($id);
        $img = $row->img;

        if ($row) {
            $this->m_pages->delete($id);
            unlink($img);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pages'));
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('lang', 'language', 'trim|required');
	$this->form_validation->set_rules('konten', 'content', 'trim|required');
	$this->form_validation->set_rules('meta_desc', 'meta', 'max_length[160]');

	$this->form_validation->set_rules('id_post', 'id_post', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function ToSlug($text) { 
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
			if (empty($text)) {
			    return 'n-a';
			  }
			  return $text;
	}

    public function upload_handler($params) {
    	// check directory if available
		$imagePath	= './i/pages/';
		$newpath 	= '';
		$year		= '';
		$month		= '';
		$path_full	= '';

		$year  = date("Y");   //current year
		
		//check if current year directory is exist
		if(!is_dir($imagePath.$year)) {
			//make directory if not exist
			mkdir($imagePath.$year, 0775, TRUE);
		} 
		
		if (!file_exists($imagePath.$year.'/index.html')) {
			
			//create index.html to prevent browse image folder from browser
			$createIndexHTML	= $imagePath.$year.'/index.html';
			$handle 			= fopen($createIndexHTML, 'w') or die('Cannot open file:  '.$createIndexHTML); //implicitly creates file
        }

		// image config/requirement for upload
		$config['upload_path'] = $imagePath.$year;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;

		// upload image
		$this->load->library('upload', $config);
		if($this->upload->do_upload()) {
			$upload_data = $this->upload->data();
            $data['img'] = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];

		$config['image_library'] = 'gd2';
		$config['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 500;
		$config['height']       = 500;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();

        $hapus = $upload_data["file_path"].$upload_data['file_name'];
        unlink($hapus);

        return $params = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
    	} else {
    		return false;
    	}
    }

}