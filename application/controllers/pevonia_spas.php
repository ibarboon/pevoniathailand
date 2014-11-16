<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pevonia_Spas extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['breadcrumbs_list'] = array('You are here:', 'Home', ucwords($this->uri->segment(2)));
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia', $params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		
		$params['spas_list'] = $this->contents_model->get_spas_list($this->uri->segment(2), $params['default_language']);
		$params['content_list'] = $this->contents_model->get_content_list_by_type($this->uri->segment(2), $params['default_language']);
		
		$this->load->view('header_view', $params);
		$this->load->view('pevonia_spas_view', $params);
		$this->load->view('footer_view', $params);
	}
	
}

/* End of file pevonia_spas.php */
/* Location: ./application/controllers/pevonia_spas.php */