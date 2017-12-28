<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_commerce extends CI_Model {

    public $table = 'products';
    public $id = 'id_products';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function index() {
    	$this->db->select('name, category, quantity, path')
    			 ->from($this->table)
    			 ->join('images', 'products.code_product=images.relation')
    			 ->group_by('name');
    	$query = $this->db->get();
    	return $query->result_array();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        return true;
    }

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
}
?>