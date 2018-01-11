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
        $data['cat'] = $this->m_commerce->getProductsCategory();
        $this->load->view('commerce/addproducts', $data);
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
                $configt['width']         = 900;
                $configt['height']       = 900;

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
            } else {
                if($this->m_commerce->insert($data)) {
                $this->session->set_flashdata('success', 'data successfully saved!!');
                redirect(site_url('commerce/index'));
                }
            }
        }

        public function debugger($id) {
            $deb = $this->m_commerce->get_id_before_delete($id);
            foreach ($deb as $a) {
                unlink($a['path']);
            }
        }

        public function deleteProducts($id) {
            $row = $this->m_commerce->get_id_before_delete($id);

            if ($row) {

                foreach ($row as $a) {
                    unlink($a['path']);
                    $report = 'sukses';
                }

                if($report = 'sukses') {
                    $this->m_commerce->delete($id);
                    $this->session->set_flashdata('success', 'Delete Record Success');
                    redirect(site_url('commerce'));
                }
            } else {
                $this->session->set_flashdata('fail', 'Record Not Found');
                redirect(site_url('commerce'));
            }
        }

        /* PACKAGE HANDLING */

        public function add_package() {
            $data['allpackage'] = $this->m_commerce->all_package();

            $data['content'] = 'package/index';
            $this->load->view('layout/backend', $data);
        }

        public function showaddpackage() {
            $data['cat'] = $this->m_commerce->getProductsCategory();
            $this->load->view('package/form_package', $data);
        }

        // add
        public function save_package() {

        $data['name'] = $this->input->post('packagename', TRUE);
        $data['price'] = $this->input->post('price', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_package'] = $this->input->post('code_package', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['tour_days'] = $this->input->post('days', TRUE);
        $data['airplane'] = $this->input->post('plane', TRUE);
        $data['hotel'] = $this->input->post('hotel', TRUE);

        $slug = $this->input->post('packagename',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $relation = $this->input->post('code_package', TRUE);

        // check directory if available
        $imagePath  = './i/package/';
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
                $configt['width']         = 900;
                $configt['height']       = 900;

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
                    redirect(site_url('commerce/add_package'));
                }
            }

            if($hasil == "success") {
                if($this->m_commerce->insert_package($data)) {
                $this->session->set_flashdata('success', 'data successfully saved');
                redirect(site_url('commerce/add_package'));
                }
            } else {
                if($this->m_commerce->insert_package($data)) {
                $this->session->set_flashdata('success', 'data successfully saved!!');
                redirect(site_url('commerce/add_package'));
                }
            }
        }

        public function showEditPackage($id) {
            $data['edit'] = $this->m_commerce->get_package_for_edit($id);
            $data['img'] = $this->m_commerce->get_all_images($id);
            $this->load->view('package/edit_package', $data);
        }

        public function edit_package() {

        $id = $this->input->post('id_package');
        $data['name'] = $this->input->post('packagename', TRUE);
        $data['price'] = $this->input->post('price', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_package'] = $this->input->post('code_package', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['tour_days'] = $this->input->post('days', TRUE);
        $data['airplane'] = $this->input->post('plane', TRUE);
        $data['hotel'] = $this->input->post('hotel', TRUE);

        $slug = $this->input->post('packagename',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $relation = $this->input->post('code_package', TRUE);

        // check directory if available
        $imagePath  = './i/package/';
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

        // upload image

         // image config/requirement for upload
        $config['upload_path'] = $imagePath.$year;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        foreach ($_FILES as $key => $value) {
            $filesize =$_FILES[$key]["size"];
            if($filesize != 0) {
                if($this->upload->do_upload($key)) {
                    $upload_data = $this->upload->data();

                    $configt['image_library'] = 'gd2';
                    $configt['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
                    $configt['create_thumb'] = TRUE;
                    $configt['maintain_ratio'] = TRUE;
                    $configt['width']         = 900;
                    $configt['height']       = 900;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($configt);
                    $this->image_lib->resize();
                    // delete the original image
                    $hapus = $upload_data["file_path"].$upload_data['file_name'];
                    unlink($hapus);

                    $data_i['relation'] = $relation;
                    $data_i['path'] = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
                    $this->m_commerce->update_images_for_packages($data_i);
                    $hasil = "success";
                    } else {
                        unlink($data_i['path']);
                        $this->session->set_flashdata('fail', 'something wrong when upload your file. try again');
                        redirect(site_url('commerce/add_package'));
                    }
            }

        }

            if($hasil == "success") {
                if($this->m_commerce->update_package($id, $data)) {
                $this->session->set_flashdata('success', 'data successfully changes!');
                redirect(site_url('commerce/add_package'));
                }
            } else {
                $this->m_commerce->update_images_for_packages($data_i);
                if($this->m_commerce->update_package($id, $data)) {
                $this->session->set_flashdata('success', 'data successfully changes!!');
                redirect(site_url('commerce/add_package'));
                }
            }
        }

        public function deletePackage($id) {
            $row = $this->m_commerce->get_package_id_before_delete($id);

            if ($row) {

                foreach ($row as $a) {
                    unlink($a['path']);
                    $report = 'sukses';
                }

                if($report = 'sukses') {
                    $this->m_commerce->delete_package($id);
                    $this->session->set_flashdata('success', 'Delete Record Success');
                    redirect(site_url('commerce/add_package'));
                }
            } else {
                $this->session->set_flashdata('fail', 'Record Not Found');
                redirect(site_url('commerce/add_package'));
            }
        }

        // DESTINATION HANDLING

        public function add_destination() {
            $data['alldestination'] = $this->m_commerce->all_destination();

            $data['content'] = 'destination/index';
            $this->load->view('layout/backend', $data);
        }

        public function showadddestination() {
            $data['cat'] = $this->m_commerce->getProductsCategory();
            $this->load->view('destination/form_destination', $data);
        }

        public function save_destination() {

        $data['name'] = $this->input->post('destinationname', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_destination'] = $this->input->post('code_destination', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['category'] = $this->input->post('category', TRUE);

        $slug = $this->input->post('destinationname',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $relation = $this->input->post('code_destination', TRUE);

        // check directory if available
        $imagePath  = './i/destination/';
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
        foreach ($_FILES as $key => $value) {
            if($this->upload->do_upload($key)) {
                $upload_data = $this->upload->data();

                $configt['image_library'] = 'gd2';
                $configt['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
                $configt['create_thumb'] = TRUE;
                $configt['maintain_ratio'] = TRUE;
                $configt['width']         = 900;
                $configt['height']       = 900;

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
                    redirect(site_url('commerce/add_destination'));
                }
            }

            if($hasil == "success") {
                if($this->m_commerce->insert_destination($data)) {
                $this->session->set_flashdata('success', 'data successfully saved');
                redirect(site_url('commerce/add_destination'));
                }
            } else {
                if($this->m_commerce->insert_destination($data)) {
                $this->session->set_flashdata('success', 'data successfully saved!!');
                redirect(site_url('commerce/add_destination'));
                }
            }
        }

        // EDIT
        public function showEditDestination($id) {
            $data['edit'] = $this->m_commerce->get_destination_for_edit($id);
            $data['img'] = $this->m_commerce->get_all_destination_images($id);
            $data['cat'] = $this->m_commerce->getProductsCategory();

            $this->load->view('destination/edit_destination', $data);
        }

        public function edit_destination() {
            
        $id = $this->input->post('id_destination');
        $data['name'] = $this->input->post('destinationname', TRUE);
        $data['content'] = $this->input->post('konten', TRUE);
        $data['code_destination'] = $this->input->post('code_destination', TRUE);
        $data['lang'] = $this->input->post('lang', TRUE);
        $data['category'] = $this->input->post('category', TRUE);
        $data['status'] = $this->input->post('status', TRUE);

        $slug = $this->input->post('destinationname',TRUE);
        $data['slug'] = $this->ToSlug($slug);
        $relation = $this->input->post('code_destination', TRUE);

        // check directory if available
        $imagePath  = './i/destination/';
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

        // upload image

         // image config/requirement for upload
        $config['upload_path'] = $imagePath.$year;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        foreach ($_FILES as $key => $value) {
            $filesize =$_FILES[$key]["size"];
            if($filesize != 0) {
                if($this->upload->do_upload($key)) {
                    $upload_data = $this->upload->data();

                    $configt['image_library'] = 'gd2';
                    $configt['source_image'] = $upload_data["file_path"].$upload_data['file_name'];
                    $configt['create_thumb'] = TRUE;
                    $configt['maintain_ratio'] = TRUE;
                    $configt['width']         = 900;
                    $configt['height']       = 900;

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($configt);
                    $this->image_lib->resize();
                    // delete the original image
                    $hapus = $upload_data["file_path"].$upload_data['file_name'];
                    unlink($hapus);

                    $data_i['relation'] = $relation;
                    $data_i['path'] = $imagePath.$year.'/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
                    $this->m_commerce->update_images_for_destination($data_i);
                    $hasil = "success";
                    } else {
                        unlink($data_i['path']);
                        $this->session->set_flashdata('fail', 'something wrong when upload your file. try again');
                        redirect(site_url('commerce/add_destination'));
                    }
            }

        }

            if($hasil == "success") {
                if($this->m_commerce->update_destination($id, $data)) {
                $this->session->set_flashdata('success', 'data successfully changes!');
                redirect(site_url('commerce/add_destination'));
                }
            } else {
                $this->m_commerce->update_images_for_destination($data_i);
                if($this->m_commerce->update_destination($id, $data)) {
                $this->session->set_flashdata('success', 'data successfully changes!!');
                redirect(site_url('commerce/add_destination'));
                }
            }
        }

        // delete
        public function deleteDestination($id) {
            $row = $this->m_commerce->get_destination_id_before_delete($id);

            if ($row) {

                foreach ($row as $a) {
                    unlink($a['path']);
                    $report = 'sukses';
                }

                if($report = 'sukses') {
                    $this->m_commerce->delete_destination($id);
                    $this->session->set_flashdata('success', 'Delete Record Success');
                    redirect(site_url('commerce/add_destination'));
                }
            } else {
                $this->session->set_flashdata('fail', 'Record Not Found');
                redirect(site_url('commerce/add_destination'));
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