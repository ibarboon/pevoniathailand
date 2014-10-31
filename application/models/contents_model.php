<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_content_list($arg) {
		if(count($arg) === 0) {
			$sql = "select row_id content_id, content_alias_name, content_header, content_body ";
			$sql .= "from tbl_contents ";
			$sql .= "order by last_updated_dt desc;";
		} elseif(count($arg) === 1) {
			$sql = "select row_id content_id, date_format(created_dt,'%e') d, date_format(created_dt,'%M') m, created_by, content_alias_name, content_header, content_body , content_media ";
			$sql .= "from tbl_contents ";
			$sql .= "where lower(content_type) = lower(?) ";
			$sql .= "and content_language = 'ENG' ";
			$sql .= "order by created_dt desc;";
		} elseif(count($arg) === 2) {
			$sql = "select row_id content_id, date_format(created_dt,'%e') d, date_format(created_dt,'%M') m, created_by, content_alias_name, content_header, content_body , content_media ";
			$sql .= "from tbl_contents ";
			$sql .= "where lower(content_type) = lower(?) ";
			$sql .= "and date_format(created_dt,'%M-%Y') = ? ";
			$sql .= "and content_language = 'ENG' ";
			$sql .= "order by created_dt desc;";
		}
		$query = $this->db->query($sql, $arg);
		return $query->result_array();
	}
	
	public function get_archives_list($arg = NULL) {
		if(is_null($arg)) {
			//
		} else {
			$sql = "select distinct date_format(created_dt,'%M %Y') archives ";
			$sql .= "from tbl_contents ";
			$sql .= "where lower(content_type) = lower(?) ";
			$sql .= "and content_language = 'ENG' ";
			$sql .= "order by created_dt;";
		}
		$query = $this->db->query($sql, $arg);
		return $query->result_array();
	}

	public function get_content($arg) {
		$sql = "select row_id content_id, date_format(created,'%e') d, date_format(created,'%M') m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql .= "from cms_contents ";
		$sql .= "where content_type = ? ";
		$sql .= "order by created desc ";
		$sql .= "limit 1";
		$query = $this->db->query($sql, $arg);
		return $query->row_array();
	}
}

/* End of file contents_model.php */
/* Location: ./application/models/contents_model.php */