<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	
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
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/setting_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
}

/* End of file setting.php */
/* Location: ./application/controllers/backend/setting.php */