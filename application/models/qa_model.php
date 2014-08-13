<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QA_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_qa_list($arg)
	{
		$sql = "select qa_question, qa_answer, qa_image ";
		$sql .= "from tbl_qa ";
		$sql .= "where qa_lang = ? ";
		$sql .= "order by last_updated_dt desc ";
		$sql .= "limit ?, 10;";
		
		$query = $this->db->query($sql, $arg);
		$result_array = $query->result_array();

		return $result_array;;
	}
}

/* End of file qa_model.php */
/* Location: ./application/models/qa_model.php */