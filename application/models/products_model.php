<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_product_list() {
		$sql = "select * ";
		$sql .= "from cms_products ";
		$sql .= "order by product_name_en";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_product($product) {
		$sql = "select p.*, pt.product_type_name_en, pc.product_class_name_en ";
		$sql .= "from cms_products p, cms_product_type pt, cms_product_class pc ";
		$sql .= "where p.product_type_id = pt.row_id ";
		$sql .= "and pt.product_class_id = pc.row_id ";
		foreach($product as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
		$sql .= "limit 1";
		$query = $this->db->query($sql, $product);
		return $query->row_array();
	}
	
	public function get_product_list_by_class($product, $in_offset = 0, $in_count = 0) {
		$sql = "select p.row_id, p.product_code, p.product_name_en, p.product_name_th, p.product_detail_en, p.product_detail_th, p.benefit_en, p.benefit_th, p.usage_en, p.usage_th, p.key_ingredient_en, p.key_ingredient_th, p.product_image ";
		$sql .= "from cms_products p ";
		$sql .= "where p.product_type_id in (select pt.row_id from cms_product_type pt where pt.product_class_id = ?) ";
		$sql .= "order by rand() ";
		$sql .= "limit $in_offset, $in_count;";
		$query = $this->db->query($sql, $product);
		return $query->result_array();
	}
	
	public function get_product_class($product_class) {
		$sql = "select row_id as product_class_id, product_class_name_en, product_class_name_th, product_class_alias_name ";
		$sql .= "from cms_product_class ";
		foreach($product_class as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
		$sql .= "limit 1";
		$query = $this->db->query($sql, $product_class);
		return $query->row_array();
	}

	public function get_product_type($product_type) {
		$sql = "select row_id product_type_id, product_type_alias_name, product_type_name_en, product_type_name_th, parent_id, product_class_id ";
		$sql .= "from cms_product_type ";
		foreach($product_type as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
		$sql .= "limit 1";
		$query = $this->db->query($sql, $product_type);
		return $query->row_array();
	}
	
	public function get_product_type_list_by_class($product_class) {
		$sql = "select protyp.row_id product_type_id, protyp.product_type_name_en, protyp.product_type_name_th ";
		$sql .= "from cms_product_type protyp ";
		$sql .= "where protyp.product_class_id = (select procla.row_id from cms_product_class procla where procla.product_class_alias_name = ?) ";
		$sql .= "order by protyp.product_type_alias_name asc";
		$query = $this->db->query($sql, $product_class);
		return $query->result_array();
	}
	
	public function get_product_type_list($product_type) {
		$sql = "select row_id as product_type_id, product_type_name_en, product_type_name_th, product_type_alias_name, product_class_id ";
		$sql .= "from cms_product_type ";
		foreach($product_type as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
// 		$sql .= "and ";
		$sql .= "order by product_type_alias_name;";
		$query = $this->db->query($sql, $product_type);
		return $query->result_array();
	}
	
	public function select_product_type_list_by_class($arg) {
		$sql = "select product_type_name_en, product_type_name_th, product_type_alias_name ";
		$sql .= "from cms_product_type ";
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
		
	public function get_product_list_by_type($product, $in_offset = 0, $in_count = 0) {
		$sql = "select p.row_id, p.product_code, p.product_name_en, p.product_name_th, p.product_detail_en, p.product_detail_th, p.benefit_en, p.benefit_th, p.usage_en, p.usage_th, p.key_ingredient_en, p.key_ingredient_th, p.product_image ";
		$sql .= "from cms_products p ";
		if (key($product) !== 'parent_id') {
			$sql .= "where p.product_type_id = ? ";
		} else {
			$sql .= "where p.product_type_id in (select pt.row_id from cms_product_type pt where pt.parent_id = ?) ";
		}
		$sql .= "order by  p.product_code ";
		$sql .= "limit $in_offset, $in_count;";
		$query = $this->db->query($sql, $product);
		return $query->result_array();
	}
	
	public function do_select_product($arg) {
		$sql = "select * ";
		$sql .= "from cms_products ";
		$sql .= "where product_code = ? ";
		$sql .= "limit 1";
		try {
			$query = $this->db->query($sql, $arg);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $query->row_array();
	}
	public function do_add($product) {
		$sql = "insert into cms_products (row_id, created, created_by, last_updated, last_updated_by, product_code, product_name_en, product_name_th, product_detail_en, product_detail_th, benefit_en, benefit_th, usage_en, usage_th, key_ingredient_en, key_ingredient_th, product_image, product_type_id) ";
		$sql .= "values (null, now(), ?, now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		try {
			$this->db->query($sql, $product);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_edit($product) {
		$sql = "update cms_products ";
		foreach($product as $key => $value) {
			if ($key !== 'row_id') {
				if (strpos($sql, 'set') === FALSE) {
					$sql .= "set $key = ? ";
				} else {
					$sql .= ", $key = ? ";
				}
			} else {
				$sql .= "where $key = ? ";
			}
		}
		try {
			$this->db->query($sql, $product);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_delete($product_list) {
		$affected_rows = 0;
		foreach ($product_list as $product) {
			$sql = "delete from cms_products ";
			$sql .= "where row_id in (?)";
			try {
				$this->db->query($sql, $product);
			} catch (Exception $e) {
				echo 'Caught exception: ' , $e->getMessage();
			}
			$affected_rows += $this->db->affected_rows();
		}
		return $affected_rows;
	}
	
	public function do_add_product_image($product) {
		$sql = "select * ";
		$sql .= "from cms_products ";
		$sql .= "where row_id = ?";
		$query = $this->db->query($sql, $product['row_id']);
		$p = $query->row_array();
		$product_image_list = explode('|', $p['product_image']);
		$new_product_image_list = array_merge($product_image_list, $product['product_image']);
		$sql = "update cms_products ";
		$sql .= "set last_updated = now(), product_image = ? ";
		$sql .= "where row_id = ?";
		$this->db->query($sql, array(implode('|', $new_product_image_list), $product['row_id']));
		return $this->db->affected_rows();
	}
	
	public function do_delete_product_image($product_row_id, $product_image) {
		$sql = "select * ";
		$sql .= "from cms_products ";
		$sql .= "where row_id = ?";
		$query = $this->db->query($sql, $product_row_id);
		$product = $query->row_array();
		$product_image_list = explode('|', $product['product_image']);
		unset($product_image_list[array_search($product_image, $product_image_list)]);
		$sql = "update cms_products ";
		$sql .= "set last_updated = now(), product_image = ? ";
		$sql .= "where row_id = ?";
		$this->db->query($sql, array(implode('|', $product_image_list), $product_row_id));
	}
}

/* End of file products_model.php */
/* Location: ./application/models/products_model.php */