<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_content_list() {
		$sql = "select * ";
		$sql .= "from cms_contents ";
		$sql .= "order by content_type, content_language, created desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_content_list_by_type($in_content_type, $in_content_language) {
		$sql = "select row_id content_id, date_format(created,'%e') d, substring(date_format(created,'%M'), 1, 3) m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql .= "from cms_contents ";
		$sql .= "where lower(content_type) = lower(?) ";
		$sql .= "and content_language = ? ";
		if ($in_content_type === 'pevonia-spas') {
			$sql .= "order by content_header";
		} else {
			$sql .= "order by created desc";
		}
		$query = $this->db->query($sql, array($in_content_type, $in_content_language));
		return $query->result_array();
	}
	
	public function get_content_list_by_archives($in_archives, $in_content_type, $in_content_language) {
		$sql = "select row_id content_id, date_format(created,'%e') d, substring(date_format(created,'%M'), 1, 3) m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql .= "from cms_contents ";
		$sql .= "where lower(date_format(created,'%M-%Y')) = ? ";
		$sql .= "and lower(content_type) = lower(?) ";
		$sql .= "and content_language = ? ";
		$sql .= "order by created desc";
		$query = $this->db->query($sql, array($in_archives, $in_content_type, $in_content_language));
		return $query->result_array();
	}
	
	public function get_archives_list($in_content_type, $in_content_language) {
		$sql = "select distinct date_format(created,'%M %Y') archives ";
		$sql .= "from cms_contents ";
		$sql .= "where lower(content_type) = lower(?) ";
		$sql .= "and content_language = ? ";
		$sql .= "order by created";
		$query = $this->db->query($sql, array($in_content_type, $in_content_language));
		return $query->result_array();
	}
	
	public function get_spas_list($in_content_type, $in_content_language) {
		$sql = "select distinct row_id spa_id, content_header spa ";
		$sql .= "from cms_contents ";
		$sql .= "where lower(content_type) = lower(?) ";
		$sql .= "and content_language = ? ";
		$sql .= "order by content_header";
		$query = $this->db->query($sql, array($in_content_type, $in_content_language));
		return $query->result_array();
	}

	public function get_content($content) {
		$sql = "select row_id content_id, date_format(created,'%e') d, substring(date_format(created,'%M'), 1, 3) m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql .= "from cms_contents ";
		foreach($content as $key => $value) {
			if (strpos($sql, 'where') === FALSE) {
				$sql .= "where $key = ? ";
			} else {
				$sql .= "and $key = ? ";
			}
		}
		$sql .= "limit 1";
		$query = $this->db->query($sql, $content);
		return $query->row_array();
	}
	
	public function get_content_by_id($content) {
		$sql = "select * ";
		$sql .= "from cms_contents ";
		$sql .= "where row_id = ? ";
		$sql .= "limit 1";
		$query = $this->db->query($sql, $content);
		return $query->row_array();
	}
	
	public function get_last_content($in_content_type, $in_content_language) {
		$sql = "select row_id content_id, date_format(created,'%e') d, substring(date_format(created,'%M'), 1, 3) m, created_by, content_alias_name, content_header, content_body , content_media ";
		$sql .= "from cms_contents ";
		$sql .= "where content_type = ? ";
		$sql .= "and content_language = ? ";
		$sql .= "order by created desc ";
		$sql .= "limit 1";
		$query = $this->db->query($sql, array($in_content_type, $in_content_language));
		return $query->row_array();
	}
	
	public function do_add($content) {
		$sql = "insert into cms_contents (row_id, created, created_by, last_updated, last_updated_by, content_type, content_alias_name, content_header, content_body, content_media, content_language) ";
		$sql .= "values (null, now(), ?, now(), ?, ?, ?, ?, ?, ?, ?)";
		try {
			$this->db->query($sql, $content);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_edit($content) {
		$sql = "update cms_contents ";
		$sql .= "set last_updated = now(), last_updated_by = ?, content_type = ?, content_alias_name = ?, content_header = ?, content_body = ?, content_media = ?, content_language = ? ";
		$sql .= "where row_id = ?";
		try {
			$this->db->query($sql, $content);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
	
	public function do_delete($content_list) {
		$affected_rows = 0;
		foreach ($content_list as $content) {
			$sql = "delete from cms_contents ";
			$sql .= "where row_id in (?)";
			try {
				$this->db->query($sql, $content);
			} catch (Exception $e) {
				echo 'Caught exception: ' , $e->getMessage();
			}
			$affected_rows += $this->db->affected_rows();
		}
		return $affected_rows;
	}
}

/* End of file contents_model.php */
/* Location: ./application/models/contents_model.php */