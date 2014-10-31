<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_product_list_by_class($in_class, $in_rand_flag = 'N', $in_offset = 0, $in_count = 10) {
		$sql = "select p.row_id, p.product_code, p.product_name_en, p.product_name_th, p.product_detail_en, p.product_detail_th, p.benefit_en, p.benefit_th, p.usage_en, p.usage_th, p.key_ingredient_en, p.key_ingredient_th, p.product_image, pt.product_type_name_en, pt.product_type_name_th, pc.product_class_name_en, pc.product_class_name_th ";
		$sql .= "from cms_products p, cms_product_type pt, cms_product_class pc ";
		$sql .= "where p.product_type_id = pt.row_id ";
		$sql .= "and pt.product_class_id = pc.row_id ";
		$sql .= "and pc.product_class_alias_name = ? ";
		if ($in_rand_flag === 'Y') {
			$sql .= "order by rand() ";
		} else {
			$sql .= "order by p.product_code asc ";
		}
		$sql .= "limit ?, ?;";
		$query = $this->db->query($sql, array($in_class,$in_offset,$in_count));
		return $query->result_array();
	}
	
	public function select_product_class($arg) {
		$sql = "select row_id as product_class_id, product_class_name_en, product_class_name_th, product_class_alias_name ";
		$sql .= "from table_product_class ";
		$sql .= "where lower(product_class_alias_name) = lower(?);";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->row_array();
	}

	public function select_product_type_list_by_class($arg) {
		$sql = "select product_type_name_en, product_type_name_th, product_type_alias_name ";
		$sql .= "from table_product_type ";
		$sql .= "where product_class_id = ? ";
		$sql .= "and parent_id = 0 ";
		$sql .= "order by product_type_alias_name;";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->result_array();
	}

	public function do_select_product_list_by_class($arg) {
		$sql = "select * ";
		$sql .= "from table_products ";
		$sql .= "where product_type_id in (select row_id from table_product_type where product_class_id = ?) ";
		$sql .= "order by rand() ";
		$sql .= "limit ?,12;";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->result_array();
	}
	
	public function select_product_list_by_type($arg) {
		$sql = "select * ";
		$sql .= "from table_products ";
		$sql .= "where product_type_id in (select row_id from table_product_type where lower(product_type_alias_name) = lower(?)) ";
		$sql .= "order by rand() ";
		$sql .= "limit ?,12;";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->result_array();
	}
	
	public function do_select_product($arg) {
		$sql = "select * ";
		$sql .= "from table_products ";
		$sql .= "where row_id = ? ";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->row_array();
	}
}

/* End of file products_model.php */
/* Location: ./application/models/products_model.php */