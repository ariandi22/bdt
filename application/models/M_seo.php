<?php

class M_seo extends CI_Model {
	var $db;
	public $id = 'id';
    public $order = 'DESC';

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function index($table) {
		$this->db->select('*');
		$this->db->limit(1);
        $query = $this->db->get($table);
        return $query->row();
	}

	// insert data
    function insert($table, $data) {
        $this->db->insert($table, $data);
        return true;
    }

	// update data
    function update($id, $data, $table) {
        $this->db->where($this->id, $id);
        $this->db->update($table, $data);
        return true;
    }
    // get data by id
    function get_by_id($id, $table) {
        $this->db->where($this->id, $id);
        return $this->db->get($table)->row();
    }

}
?>