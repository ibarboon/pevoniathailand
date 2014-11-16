<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Why_Pevonia extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['slides'] = $this->utility_model->get_option_by_type('slides');
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia', $params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		$this->load->view('header_view', $params);
		$this->load->view('why_pevonia_view', $params);
		$this->load->view('footer_view', $params);
	}
}

/* End of file why_pevonia.php */
/* Location: ./application/controllers/why_pevonia.php */