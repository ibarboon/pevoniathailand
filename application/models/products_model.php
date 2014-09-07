<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
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