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
// 		$sql = "select row_id content_id, content_type, date_format(created,'%e') d, substring(date_format(created,'%M'), 1, 3) m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql = "select * ";
		$sql .= "from cms_contents ";
		$sql .= "where content_type in ('activities', 'news', 'pevonia-spas', 'q-and-a') ";
		$sql .= "and content_body like ? ";
		$sql .= "and content_language = ?";
		$query = $this->db->query($sql, array('%'.$in_keyword.'%', $in_language));
		return $query->result_array();
	}
}

/* End of file utility_model.php */
/* Location: ./application/models/utility_model.php */