<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_option_by_type($arg, $format) {
		$sql = "select row_id option_id, option_key, option_value ";
		$sql .= "from pt_options ";
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
	
	public function get_menu_list() {
		$sql = "select option_key, option_value ";
		$sql .= "from pt_options ";
		$sql .= "where lower(option_type) = lower('menu') ";
		$sql .= "order by option_sequence";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $key => $value) {
			$menu_list[$value['option_key']] = $value['option_value'];
		}
		return $menu_list;
	}
}

/* End of file utility_model.php */
/* Location: ./application/models/utility_model.php */