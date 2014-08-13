<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_option_by_type($arg)
	{
		$sql = "select row_id option_id, option_key, option_value ";
		$sql .= "from tbl_options ";
		$sql .= "where option_type = ? ";
		$sql .= "order by option_sequence asc;";
	
		$query = $this->db->query($sql, $arg);
		$result_array = $query->result_array();

		return $result_array;
	}
	
	public function get_menu_list() {
// 		$sql = "select option_key, option_value, b.product_type_alias_name, b.product_type_name ";
// 		$sql .= "from tbl_options ";
// 		$sql .= "left join tbl_product_type a ";
// 		$sql .= "inner join tbl_product_type b ";
// 		$sql .= "on a.row_id = b.parent_row_id ";
// 		$sql .= "on option_key = a.product_type_alias_name ";
// 		$sql .= "where option_type = 'MENU' ";
// 		$sql .= "order by option_sequence, b.product_type_name;";

		$sql = "select option_key, option_value ";
		$sql .= "from tbl_options ";
		$sql .= "where option_type = 'MENU' ";
		$sql .= "order by option_sequence";
		
		$query = $this->db->query($sql);

		foreach($query->result_array() as $key => $value):
// 			if($value['product_type_alias_name'] === NULL) {
				$menu_list[$value['option_key']] = $value['option_value'];
// 			} else {
// 				$menu_list[$value['option_key']]['display_value'] = $value['option_value'];
// 				$menu_list[$value['option_key']]['sub_menu'][] = array(
// 					'href' => $value['product_type_alias_name'], 
// 					'display_value' => $value['product_type_name']
// 				);
// 			}
		endforeach;
		return $menu_list;
	}
}

/* End of file utility_model.php */
/* Location: ./application/models/utility_model.php */