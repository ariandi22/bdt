<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_main extends CI_Model {

	function index_regular() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->group_by('id_product');
		$this->db->where('category', 'regular package');
		$this->db->where('lang', 'ID');
		return $this->db->get()->result_array();
	}

	function index_premium() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->group_by('id_product');
		$this->db->where('category', 'premium package');
		$this->db->where('lang', 'ID');
		return $this->db->get()->result_array();
	}

	function index_north() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->group_by('id_product');
		$this->db->where('category', 'north yogya');
		$this->db->where('lang', 'ID');
		return $this->db->get()->result_array();
	}

	function index_hotels() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->group_by('id_product');
		$this->db->where('category', 'hotel');
		$this->db->where('lang', 'ID');
		return $this->db->get()->result_array();
	}

	function index_cars() {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->group_by('id_product');
		$this->db->where('category', 'cars');
		$this->db->where('lang', 'ID');
		return $this->db->get()->result_array();
	}

	function package_detail($slug) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('images', 'products.code_product=images.relation');
		$this->db->where('lang', 'ID');
		$this->db->where('slug', $slug);
		return $this->db->get()->result_array();
	}

	function costume_plan_preview() {

		if (isset($_POST['des'])) {
			foreach ($_POST['des'] as $a) {
				$b[] = $a;
			}
		} else {
			$b[] = null;
		}

		if (isset($_POST['hotels'])) {
			foreach ($_POST['hotels'] as $h) {
				$hot[] = $h;
			} 
		} else {
			$hot[] = null;
		}

		if (isset($_POST['cars'])) {
			foreach ($_POST['cars'] as $c) {
				$car[] = $c;
			}
		} else {
			$car[] = null;
		}

		$alldata = array('destination' => $b,
						 'hotels' => $hot,
						 'cars' => $car,
		);
		$this->session->set_userdata($alldata);
		return true;

	}

}
?>