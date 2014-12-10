<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		$params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'dashboard';
		$params['menu_list'] = $this->utility_model->get_option_by_type('backend_menu');
		$this->db->where('option_type', 'slides');
		$this->db->from('cms_options');
		$params['slides'] = $this->db->count_all_results();
		$this->db->from('cms_contents');
		$params['contents'] = $this->db->count_all_results();
		$this->db->from('cms_products');
		$params['products'] = $this->db->count_all_results();
		$this->db->where('active_flag', 'Y');
		$this->db->from('cms_users');
		$params['users'] = $this->db->count_all_results();
// 		echo '<pre>';
// 		print_r($params);
// 		echo '</pre>';
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/dashboard_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/backend/dashboard.php */