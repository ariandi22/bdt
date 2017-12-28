<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pages extends CI_Model
{

    public $table = 'pages';
    public $id = 'id_pages';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pages,title,content,category,status,created_by,created_at');
        $this->datatables->from('pages');
        //add this line for join
        //$this->datatables->join('table2', 'pages.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pages/read/$1'),'Read')." | ".anchor(site_url('pages/update/$1'),'Update')." | ".anchor(site_url('pages/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pages');
        return $this->datatables->generate();
    }

    function getCategory() {
    	$this->db->select('category');
    	return $this->db->get('category')->result_array();
    }

    function inCategory() {
    	$this->db->select('category');
    	$query = $this->db->get('category');
    	return $query->result();
    }

    function CategoryForMenu() {
    	$this->db->select('category, title, slug');
    	$this->db->where('status', 1);
    	$query = $this->db->get('pages');
    	return $query->result();
    }

    function insert_category($table, $data) {
    	$this->db->insert($table, $data);
    	return true;
    }
    function del_category($data) {
        $this->db->where('category', $data);
        $this->db->delete('category');
        return true;
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pages', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('content', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('img', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pages', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('content', $q);
	$this->db->or_like('category', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('img', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return true;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}