<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QA extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		/* DEFAULT */
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia', $params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		/* GET DATA BY VIEW*/
		$params['breadcrumbs_list'] = array('You are here:', 'Home', ucwords($this->uri->segment(2)));
		$params['archives_list'] = $this->contents_model->get_archives_list($this->uri->segment(2), $params['default_language']);
		/* LOAD VIEW */
		$this->load->view('header_view', $params);
		if($this->uri->segment(3) AND $this->uri->segment(3) == 'archives' AND $this->uri->segment(4)) {
			$params['content_list'] = $this->contents_model->get_content_list_by_archives($this->uri->segment(4), $this->uri->segment(2), $params['default_language']);
			$this->load->view('content_list_view', $params);
		} elseif ($this->uri->segment(3)) {
			$params['content'] = $this->contents_model->get_content($this->uri->segment(3), $params['default_language']);
			$this->load->view('content_view', $params);
		} else {
			$params['content_list'] = $this->contents_model->get_content_list_by_type($this->uri->segment(2), $params['default_language']);
			$this->load->view('content_list_view', $params);
		}
		$this->load->view('footer_view', $params);
	}
	
}

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */