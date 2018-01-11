<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_commerce extends CI_Model {

    public $table = 'products';
    public $id = 'id_product';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function index() {
    	$this->db->select('id_product, name, lang, category, status, path')
    			 ->from($this->table)
    			 ->join('images', 'products.code_product=images.relation')
    			 ->group_by('id_product');
    	$query = $this->db->get();
    	return $query->result_array();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return true;
    }
    function get_id_before_delete($id) {
        $this->db->select('id_product, path');
        $this->db->from($this->table);
        $this->db->join('images', 'products.code_product=images.relation');
        $this->db->where('products.id_product', $id);
        return $this->db->get()->result_array();
    }
    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    /* IMAGES HANDLING */
    function insertImages($data) {
    	$this->db->insert('images', $data);
    	return true;
    }

    function insert_category($data) {
    	$this->db->insert('products_category', $data);
    	return true;
    }

    function getProductsCategory() {
    	$this->db->select('id, category_products');
    	return $this->db->get('products_category')->result_array();
    }

    function inCategory() {
    	$this->db->select('id, category_products');
    	$query = $this->db->get('products_category');
    	return $query->result();
    }

    function del_category($data) {
        $this->db->where('id', $data);
        $this->db->delete('products_category');
        return true;
    }

    // PACKAGE HANDLING
    function all_package() {
        $this->db->select('id_package, name, lang, status, path')
                 ->from('package')
                 ->join('images', 'package.code_package=images.relation', 'left')
                 ->group_by('id_package');
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_package($data) {
        $this->db->insert('package', $data);
        return true;
    }

    function get_package_for_edit($id) {
        $this->db->select('*')
                 ->from('package')
                 ->join('images', 'package.code_package=images.relation', 'left')
                 ->where('id_package', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_all_images($id) {
        $this->db->select('id_img,path')
                 ->from('package')
                 ->join('images', 'package.code_package=images.relation')
                 ->where('id_package', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_package($id, $data) {
        $this->db->where('id_package', $id);
        $this->db->update('package', $data);
        return true;
    }

    function update_images_for_packages($data) {
        if(isset($_POST['id_img'])) {

            foreach($_POST['id_img'] as $k) {
                $this->db->where('id_img', $k);
                $this->db->delete('images');
            }
            $this->delete_changes_img();
        }

        if (isset($_POST['pnd'])) {
            $this->insertImages($data);
            return true;
        } 
    }


    function delete_changes_img() {
        if(isset($_POST['data_del'])) {
            foreach($_POST["data_del"] as $a) {
                unlink($a);
            }
            return true;
        }
    }

    function get_package_id_before_delete($id) {
        $this->db->select('id_package, path');
        $this->db->from('package');
        $this->db->join('images', 'package.code_package=images.relation', 'left');
        $this->db->where('package.id_package', $id);
        return $this->db->get()->result_array();
    }

    function delete_package($id) {
        $this->db->where('id_package', $id);
        $this->db->delete('package');
        return true;
    }

    // DESTINATION HANDLING

    function all_destination() {
        $this->db->select('*')
                 ->from('destination')
                 ->join('images', 'destination.code_destination=images.relation', 'left')
                 ->group_by('id_destination');
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_destination($data) {
        $this->db->insert('destination', $data);
        return true;
    }

    function get_destination_for_edit($id) {
        $this->db->select('*')
                 ->from('destination')
                 ->join('images', 'destination.code_destination=images.relation', 'left')
                 ->where('id_destination', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_all_destination_images($id) {
        $this->db->select('id_img,path')
                 ->from('destination')
                 ->join('images', 'destination.code_destination=images.relation')
                 ->where('id_destination', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_destination($id, $data) {
        $this->db->where('id_destination', $id);
        $this->db->update('destination', $data);
        return true;
    }

    function update_images_for_destination($data) {
        if(isset($_POST['id_img'])) {

            foreach($_POST['id_img'] as $k) {
                $this->db->where('id_img', $k);
                $this->db->delete('images');
            }
            $this->delete_changes_img_in_destination();
        }

        if (isset($_POST['pnd'])) {
            $this->insertImages($data);
            return true;
        } 
    }


    function delete_changes_img_in_destination() {
        if(isset($_POST['data_del'])) {
            foreach($_POST["data_del"] as $a) {
                unlink($a);
            }
            return true;
        }
    }

    function get_destination_id_before_delete($id) {
        $this->db->select('id_destination, path');
        $this->db->from('destination');
        $this->db->join('images', 'destination.code_destination=images.relation', 'left');
        $this->db->where('destination.id_destination', $id);
        return $this->db->get()->result_array();
    }

    function delete_destination($id) {
        $this->db->where('id_destination', $id);
        $this->db->delete('destination');
        return true;
    }

}
?>