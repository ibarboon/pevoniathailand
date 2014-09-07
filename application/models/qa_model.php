<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QA_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_qa_list($arg) {
		$sql = "select row_id qa_id, date_format(created_dt,'%e') qa_d, date_format(created_dt,'%M') qa_m, created_by, qa_image, qa_question, qa_answer ";
		$sql .= "from tbl_qa ";
		$sql .= "where qa_lang = ? ";
		$sql .= "order by last_updated_dt desc ";
		$sql .= "limit ?, 10;";
		$query = $this->db->query($sql, $arg);
		return $query->result_array();
	}
	
	public function get_qa_list_by_archives($arg) {
		$sql = "select row_id qa_id, date_format(created_dt,'%e') qa_d, date_format(created_dt,'%M') qa_m, created_by, qa_image, qa_question, qa_answer ";
		$sql .= "from tbl_qa ";
		$sql .= "where date_format(created_dt,'%M-%Y') = ? ";
		$sql .= "and qa_lang = ? ";
		$sql .= "order by last_updated_dt desc ";
		$sql .= "limit ?, 10;";
		$query = $this->db->query($sql, $arg);
		return $query->result_array();
	}
	
	public function get_archives_list($arg) {
		$sql = "select distinct date_format(created_dt,'%M %Y') archives ";
		$sql .= "from tbl_qa ";
		$sql .= "where qa_lang = ? ";
		$sql .= "order by last_updated_dt desc ";
		$query = $this->db->query($sql, $arg);
		return $query->result_array();
	}
}

/* End of file qa_model.php */
/* Location: ./application/models/qa_model.php */