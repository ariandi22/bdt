<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model
{

    public $table = 'menus';
    public $id = 'id_menu';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function index() {
    	$this->db->select('*');
    	$query = $this->db->get($this->table);
    	return $query->result_array();
    }

    function insert() {
        $this->kosongkan();
        foreach($_POST["kat"] as $a) {
            $data['menu'] = $a;
            $this->db->insert($this->table, $data);
        }
        return true;
    }

    function kosongkan() {
        $this->db->empty_table('menus');
    }

    function delete($id) {
    	$this->db->where_in($this->id, $id);
        $this->db->delete($this->table);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}