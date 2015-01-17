<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_option_by_type($arg, $format = NULL) {
		$sql = "select row_id option_id, option_key, option_value ";
		$sql .= "from cms_options ";
		$sql .= "where lower(option_type) = lower(?) ";
		$sql .= "order by option_sequence asc;";
		$query = $this->db->query($sql, $arg);
		if ($format === 'customize') {
			$result_array = array();
			foreach ($query->result_array() as $row) {
				$result_array[$row['option_key']] = $row['option_value'];
			}
			return $result_array;
		} else {
			return $query->result_array();
		}
	}
	
	public function get_download_list($in_key) {
		$sql = "select row_id option_id, option_key, option_value ";
		$sql .= "from cms_options ";
		$sql .= "where lower(option_type) = lower('download_list') ";
		$sql .= "and lower(option_key) = lower(?) ";
		$sql .= "order by option_sequence asc;";
		$query = $this->db->query($sql, $in_key);
		return $query->result_array();
	}
	
	public function get_menu_list($arg) {
		$sql = "select option_key, option_value ";
		$sql .= "from cms_options ";
		$sql .= "where lower(option_type) = lower(?) ";
		$sql .= "order by option_sequence";
		$query = $this->db->query($sql, $arg);
		foreach($query->result_array() as $key => $value) {
			$menu_list[$value['option_key']] = $value['option_value'];
		}
		return $menu_list;
	}
	
	public function get_default_language() {
		$default_language = $this->get_option_by_type('default_language', 'customize');
		return $default_language['language'];
	}
	
	public function get_search_results($in_keyword, $in_language) {
		$sql = "select c.content_alias_name as row_id, c.content_header, c.content_body, c.content_type ";
		$sql .= "from cms_contents c ";
		$sql .= "where c.content_type in ('activities', 'news', 'pevonia-spas', 'q-and-a') ";
		$sql .= "and c.content_body like ? ";
		$sql .= "and c.content_language = ? ";
		$sql .= "union ";
		$sql .= "select p.row_id, p.product_name_en content_header, p.product_detail_en content_body, if(pt.product_class_id = 1, 'products', 'treatment') content_type ";
		$sql .= "from cms_products p, cms_product_type pt ";
		$sql .= "where p.product_type_id = pt.row_id ";
		$sql .= "and p.product_detail_en like ? ";
		$sql .= "union ";
		$sql .= "select p.row_id, p.product_name_th content_header, p.product_detail_th content_body, if(pt.product_class_id = 1, 'products', 'treatment') content_type ";
		$sql .= "from cms_products p, cms_product_type pt ";
		$sql .= "where p.product_type_id = pt.row_id ";
		$sql .= "and p.product_detail_th like ? ";
		$query = $this->db->query($sql, array('%'.$in_keyword.'%', $in_language, '%'.$in_keyword.'%', '%'.$in_keyword.'%'));
		return $query->result_array();
	}
	public function get_option_list($option) {
		$sql = "select * ";
		$sql .= "from cms_options ";
		foreach($option as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
		$query = $this->db->query($sql, $option);
		return $query->result_array();
	}
	
	public function do_insert($option) {
		$sql = "insert into cms_options (row_id, created, created_by, last_updated, last_updated_by, option_type, option_key, option_value, option_sequence, active_flag) ";
		$sql .= "values (null, now(), ?, now(), ?, ?, ?, ?, 0, 'Y')";
		try {
			$this->db->query($sql, $option);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_update($option) {
		$criteria = array();
		$sql = "update cms_options ";
		foreach($option['set'] as $key => $value) {
			if (strpos($sql, 'set') === FALSE) {
				$sql .= "set $key = ? ";
			} else {
				$sql .= ", $key = ? ";
			}
			$criteria[] = $value;
		}
		foreach($option['where'] as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
			$criteria[] = $value;
		}
		try {
			$this->db->query($sql, $criteria);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_delete($option) {
		$sql = "delete from cms_options ";
		$sql .= "where row_id = ?";
		try {
			$this->db->query($sql, $option);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
}

/* End of file utility_model.php */
/* Location: ./application/models/utility_model.php */