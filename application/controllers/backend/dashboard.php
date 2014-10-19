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
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/dashboard_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function why_pevonia() {
		$arg['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$arg['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list('menu_'.$arg['default_language']);
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$this->load->view('header_view', $arg);
		$this->load->view('why_pevonia_view');
		$this->load->view('footer_view', $arg);
	}
	
	public function _http_404() {
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list();
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$this->load->view('header_view', $arg);
		$this->load->view('http_404_view');
		$this->load->view('footer_view', $arg);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/backend/dashboard.php */