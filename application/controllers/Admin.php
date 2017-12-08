<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 	
 	public function __construct() {
 		parent::__construct();
 		$this->load->model('m_admin');
 		$this->load->library('form_validation');
 		$this->load->helper(array('form'));
 		$this->load->helper('file');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";
 	}

 	// welcome page
 	public function index() {
 		$data['datanya'] = $this->m_admin->index_icon();
 		$data['content'] = 'admin/dash';
 		$this->load->view('layout/backend', $data);
 	}

 	// list icon
 	public function list_header() {
        $table='logo';
 		$data['logo'] = $this->m_admin->index_logo();
        $data['icon'] = $this->m_admin->index_icon();
        $data['carousel'] = $this->m_admin->index_carousel();

 		$data['content'] = 'company_profile/index';
 		$this->load->view('layout/backend', $data);
 	}

 	public function create_logo() 
    {
		$data['button'] = 'Add';
		$data['action'] = 'logo_action';
		$data['id'] = set_value('id');

		$data['content'] = 'company_profile/icon/icon_form';
        $this->load->view('layout/backend', $data);
    }
    
    public function logo_action() {
        $table='logo';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create_logo();
        } else {

        // check directory if available
		$imagePath	= './i/logo/';
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
		}

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
		if ($hasil = $this->m_admin->insert($data, $table)) {
			$this->session->set_flashdata('message', 'Data successfuly inserted');
            redirect(site_url('admin/list_header'));
		}
		 else {
			$this->session->set_flashdata('message', 'Data failed');
            $gagal = $imagePath.$year.'/'.$month.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
            unlink($gagal);
            redirect(site_url('admin/list_header'));
		}

        }
    }

    // update icon
    public function up_logo($id) 
    {
        $table='logo';
        $row = $this->m_admin->get_by_id($id, $table);

        if ($row) {

            $data['button'] = 'Update';
            $data['action'] = site_url('admin/up_logo_action');
			$data['id'] = set_value('id', $row->id);
			$data['img'] = set_value('img', $row->img);
			$data['status'] = set_value('status', $row->status);

        	$data['content'] = 'company_profile/icon/icon_form';
            $this->load->view('layout/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/list_header'));
        }
    }
    
    public function up_logo_action() 
    {
        $table='logo';
        $this->form_validation->set_rules('userfile', 'icon', 'callback_filecek_up');

        if ($this->form_validation->run() == FALSE) {
            $this->up_logo($this->input->post('id', TRUE));
        } else {

        // check directory if available
        $imagePath  = './i/logo/';
        $newpath    = '';
        $year       = '';
        $month      = '';
        $path_full  = '';

        $year  = date("Y");   //current year

        // image config/requirement for upload
        $config['upload_path'] = $imagePath.$year.'/'.$month;
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

            // get image path for first
            $id = $this->input->post('id', TRUE);
            $row = $this->m_admin->get_by_id($id, $table);
            $img = $row->img;

        }

		$data['status'] = $this->input->post('status');
        $hapus = $upload_data["file_path"].$upload_data['file_name'];
        unlink($hapus); 
        if ($this->m_admin->update($this->input->post('id'), $data, $table)) {
            if(isset($img)) {unlink($img);}
            $this->session->set_flashdata('message', 'Data successfuly updated');
            redirect(site_url('admin/list_header'));
        }
         else {
            $this->session->set_flashdata('message', 'Data failed');
            $gagal = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
            unlink($gagal);
            redirect(site_url('admin/list_header'));
        }

        }
    }

    public function delete_logo($id) {
        $table='logo';
    	$row = $this->m_admin->get_by_id($id, $table);
        $img = $row->img;

        if ($row) {
            $this->m_admin->delete_icon($id, $img, $table);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/list_header'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/list_header'));
        }
    }

    public function _rules() {
		$this->form_validation->set_rules('userfile', 'icon', 'callback_filecek');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

    public function filecek ($str) {
    	
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
            if(!in_array($mime, $allowed_mime_type_arr)){
            	$this->form_validation->set_message('filecek', 'Please select only gif/jpg/png file.');
                return false;
            } else if($_FILES['userfile']['size'] < 2000) {
                $this->form_validation->set_message('filecek', 'file too large, only 2MB are allowed');
                return false;
            } else {
            	return true;
            }
        } 
        else{
            $this->form_validation->set_message('filecek', 'Please choose a foto to upload.');
            return false;
        }

    }

    public function filecek_up ($str) {
        
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
            if(!in_array($mime, $allowed_mime_type_arr)){
                $this->form_validation->set_message('filecek_up', 'Please select only gif/jpg/png file.');
                return false;
            } else if($_FILES['userfile']['size'] < 2000) {
                $this->form_validation->set_message('filecek_up', 'file too large, only 2MB are allowed');
                return false;
            } else {
                return true;
            }
        } 
        else{
            return true;
        }

    }

    // ICON HANDLE

    public function create_icon() 
    {
        $data['button'] = 'Add';
        $data['action'] = 'icon_action';
        $data['id'] = set_value('id');

        $data['content'] = 'company_profile/icon/icon_form';
        $this->load->view('layout/backend', $data);
    }
    
    public function icon_action() {
        $table='icon';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create_logo();
        } else {

        // check directory if available
        $imagePath  = './i/icon/';
        $newpath    = '';
        $year       = '';
        $month      = '';
        $path_full  = '';

        $year  = date("Y");   //current year
        
        //check if current year directory is exist
        if(!is_dir($imagePath.$year)) {
            //make directory if not exist
            mkdir($imagePath.$year, 0775, TRUE);
        } 
        
        if (!file_exists($imagePath.$year.'/index.html')) {
            
            //create index.html to prevent browse image folder from browser
            $createIndexHTML    = $imagePath.$year.'/index.html';
            $handle             = fopen($createIndexHTML, 'w') or die('Cannot open file:  '.$createIndexHTML); //implicitly creates file
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
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 32;
        $config['height']       = 32;

        $this->load->library('image_lib', $config);

        $this->image_lib->crop();

        $hapus = $upload_data["file_path"].$upload_data['file_name'];
        unlink($hapus); 
        if ($hasil = $this->m_admin->insert($data, $table)) {
            $this->session->set_flashdata('message', 'Data successfuly inserted');
            redirect(site_url('admin/list_header'));
        }
         else {
            $this->session->set_flashdata('message', 'Data failed');
            $gagal = $imagePath.$year.'/'.$month.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
            unlink($gagal);
            redirect(site_url('admin/list_header'));
        }

        }
    }

    public function delete_icon($id) {
        $table='icon';
        $row = $this->m_admin->get_by_id($id, $table);
        $img = $row->img;

        if ($row) {
            $this->m_admin->delete_icon($id, $img, $table);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/list_header'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/list_header'));
        }
    }
 
 }

?>