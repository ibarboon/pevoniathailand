<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function set_user_last_signin($in_user_signin) {
		$sql = 'update cms_users u ';
		$sql .= 'set u.user_last_signin = now() ';
		$sql .= 'where user_signin = ? ';
		$sql .= 'limit 1';
		$query = $this->db->query($sql, $in_user_signin);
		return $query;
	}
	
	public function get_user($user) {
		$sql = "select u.row_id user_id, u.* ";
		$sql .= "from cms_users u ";
		$sql .= "where u.user_signin = lower(?) ";
		$sql .= "limit 1";
		$query = $this->db->query($sql, $user);
		return $query->row_array();
	}
	
	public function get_user_list() {
		$sql = 'select u.row_id user_id, u.user_signin, u.user_password, u.user_email, u.user_last_signin, user_password_changed ';
		$sql .= 'from cms_users u ';
		$sql .= 'where u.active_flag = ? ';
		$sql .= 'order by u.user_signin';
		$query = $this->db->query($sql, 'Y');
		return $query->result_array();
	}
	
	public function user_authentication($in_user_login, $in_user_password) {
		$sql = 'select u.row_id user_id, u.user_signin, u.user_password, u.user_last_signin ';
		$sql .= 'from cms_users u ';
		$sql .= 'where u.user_signin = ? ';
		$sql .= 'and u.user_password = md5(md5(?)) ';
		$sql .= 'limit 1';
		$query = $this->db->query($sql, array($in_user_login, $in_user_password));
		return $query->row_array();
	}
	
	public function do_add($user) {
		$sql = "insert into cms_users (row_id, created, created_by, last_updated, last_updated_by, user_signin, user_last_signin, user_password, user_password_changed, user_email, active_flag) ";
		$sql .= "values (null, now(), ?, now(), ?, lower(?), null, md5(md5(?)), null, ?, 'Y')";
		try {
			$this->db->query($sql, $user);
		} catch (Exception $e) {
			echo 'Caught exception: ' , $e->getMessage();
		}
		return $this->db->affected_rows();
	}
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */