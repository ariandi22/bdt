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