<?php

class M_info extends CI_Model {
	var $db;
	public $id = 'id';
    public $order = 'DESC';

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function index() {
		$this->db->select('*');
		$query = $this->db->get('about_us');
        return $query->result_array();
	}

    public function getlogo() {
        $this->db->where('status', '1');
        return $this->db->get('logo')->row_array();
    }
    public function geticon() {
        $this->db->where('status', '1');
        return $this->db->get('icon')->row_array();
    }

	public function index_logo() {
		$this->db->select('*');
        $query = $this->db->get('logo');
        return $query->result_array();
	}

    public function index_icon() {
        $this->db->select('*');
        $query = $this->db->get('icon');
        return $query->result_array();
    }

    public function index_carousel() {
        $this->db->select('*');
        $query = $this->db->get('carousel');
        return $query->result_array();
    }

	// get data by id
    function get_by_id($id, $table) {
        $this->db->where($this->id, $id);
        return $this->db->get($table)->row();
    }
	// insert data
    function insert($data, $table) {
        $this->db->insert($table, $data);
        return true;
    }

    // update data
    function update($id, $data, $table) {
        $this->db->where($this->id, $id);
        $this->db->update($table, $data);
        return true;
    }

    // delete data
    function delete_icon($id, $img, $table) {
        $this->db->where($this->id, $id);
        unlink($img);
        $this->db->delete($table);
    }

 }
?>