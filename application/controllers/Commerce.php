<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commerce extends CI_Controller {
    function __construct() {
        parent::__construct();

 		$this->load->model('m_admin');
 		$this->load->model('m_pages');
        $this->load->model('m_commerce');
 		$this->load->library('form_validation');
 		$this->load->helper(array('file', 'string', 'form', 'text', 'url'));
 		$this->load->library('datatables');
        $this->logo = $this->m_admin->getlogo();
        $this->icon = $this->m_admin->geticon();
        $this->empty = "<tr><td class='text-danger'><i class='fa fa-info-circle'></i> no data</td></tr>";        
    }

	public function index() {
        $data['allproducts'] = $this->m_commerce->index();
		$data['content'] = 'commerce/index';
		$this->load->view('layout/backend', $data);
	}

    public function showaddproducts() {
        $this->load->view('commerce/addproducts');
    }

    public function showNewOrder() {
        $this->load->view('commerce/neworder.php');
    }

    // category handler
    public function showAddCategory() {
        $data['cat'] = $this->m_commerce->inCategory();
        $this->load->view('commerce/category.php', $data);
    }

    public function addProductsCategory() {
        $data['category_products'] = $this->input->post('category');
        if($this->m_commerce->insert_category($data)) {
            $this->getProductsCategory();
        }
    }

    public function getProductsCategory() {
        header('Content-Type: application/json');
        $data = $this->m_commerce->getProductsCategory();
        echo json_encode($data);
    }

    public function deleteProductsCategory() {
        $report = '';
        foreach ($_POST['act'] as $b) {
            if ($this->m_commerce->del_category($b)) {
               $report .= true; 
            }
        }
        if($report == true) {
            $this->getProductsCategory();
        }
    }

    // end category handler

    public function showProcessed() {
        $this->load->view('commerce/processed');
    }

    public function showdone() {
        $data =    '<div class="panel panel-default pnl">
                    <div class="panel-heading">
                    <h3 class="panel-title">Complete Transaction</h3>
                    </div>
                    <div class="panel-body">
                    <small>manage this new order</small>
                    </div>
                    </div>';
        echo $data;
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

    // create a slug
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

    // upload handler
    public function upload_handler() {

        $data['name'] = $this->input->post('productname', TRUE);
        $data['category'] = $this->input->post('category', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_product'] = $this->input->post('code_product', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['quantity'] = $this->input->post('quantity', TRUE);

        $slug = $this->input->post('productname',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $relation = $this->input->post('code_product', TRUE);

        // check directory if available
        $imagePath  = './i/products/';
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
        $relasi = $this->input->post('code_product');
        foreach ($_FILES as $key => $value) {
            if($this->upload->do_upload($key)) {
                $upload_data = $this->upload->data();

                $configt['image_library'] = 'gd2';
                $configt['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
                $configt['create_thumb'] = TRUE;
                $configt['maintain_ratio'] = TRUE;
                $configt['width']         = 500;
                $configt['height']       = 500;

                $this->load->library('image_lib');
                $this->image_lib->initialize($configt);
                $this->image_lib->resize();
                // delete the original image
                $hapus = $upload_data["file_path"].$upload_data['file_name'];
                unlink($hapus);

                $data_i['relation'] = $relation;
                $data_i['path'] = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
                $this->m_commerce->insertImages($data_i);
                $hasil = "success";
                } else {
                    unlink(isset($data_i['path']));
                    $this->session->set_flashdata('fail', 'something wrong when upload your file. try again');
                    redirect(site_url('commerce/index'));
                }
            }

            if($hasil == "success") {
                if($this->m_commerce->insert($data)) {
                $this->session->set_flashdata('success', 'data successfully saved');
                redirect(site_url('commerce/index'));
                }
            }
        }

        // addd
        public function addProducts() {
        $data['name'] = $this->input->post('productname', TRUE);
        $data['category'] = $this->input->post('category', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_product'] = $this->input->post('code_product', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['quantity'] = $this->input->post('quantity', TRUE);

        $slug = $this->input->post('productname',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $kodenya = $this->input->post('code_product');

        if (!$this->upload_handler($kodenya)) {
            $this->session->set_flashdata('fail', 'something wrong when upload your file. try again');
            redirect(site_url('commerce/index'));
        } else {
            if ($this->m_commerce->insert($data)) {
                $this->session->set_flashdata('success', 'data successfully saved');
                redirect(site_url('commerce/index'));
            }
        }
    }

    public static function genCode($length) {
        $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $clen   = strlen( $chars )-1;
        $id  = '';
          for ($i = 0; $i < $length; $i++) {
                  $id .= $chars[mt_rand(0,$clen)];
          }
        return ($id);
    }


}

?>