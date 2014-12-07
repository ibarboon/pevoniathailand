<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		/* DEFAULT */
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$content = array('content_alias_name' => 'why-pevonia', 'content_language' => $params['default_language']);
		$params['why_pevonia'] = $this->contents_model->get_content($content);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		/* GET DATA BY VIEW*/
		$params['keyword'] = $this->input->post('in-keyword');
		$params['search_list'] = $this->utility_model->get_search_results($params['keyword'], $params['default_language']);
		/* LOAD VIEW */
		$this->load->view('header_view', $params);
		$this->load->view('search_view', $params);
		$this->load->view('footer_view', $params);
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */