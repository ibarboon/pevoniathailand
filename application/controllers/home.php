<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list();
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$this->load->view('header_view', $arg);
		$this->load->view('home_view');
		$this->load->view('footer_view', $arg);
	}
	
	public function why_pevonia() {
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list();
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

/* End of file home.php */
/* Location: ./application/controllers/home.php */