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
		$option_criteria = array('option_type' => 'default_language', 'active_flag' => 'Y');
		$params['default_language_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'html_meta', 'active_flag' => 'Y');
		$params['html_meta_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'social_network', 'active_flag' => 'Y');
		$params['social_network_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'contact_en', 'active_flag' => 'Y');
		$params['contact_en_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'contact_th', 'active_flag' => 'Y');
		$params['contact_th_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'home_content', 'active_flag' => 'Y');
		$params['home_content_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'download_list', 'active_flag' => 'Y');
		$params['download_list'] = $this->utility_model->get_option_list($option_criteria);
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/setting_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
}

/* End of file setting.php */
/* Location: ./application/controllers/backend/setting.php */