<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$arg['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$arg['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list('menu_'.$arg['default_language']);
		$arg['breadcrumbs_list'] = array('You are here:', 'Home', ucwords($this->uri->segment(2)));
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$arg['archives_list'] = $this->contents_model->get_archives_list($this->uri->segment(2));
		$this->load->view('header_view', $arg);
		if($this->uri->segment(3)) {
			if($this->uri->segment(3) == 'archives') {
				$arg['content_list'] = $this->contents_model->get_content_list_by_type(array($this->uri->segment(2), $this->uri->segment(4)));
				$this->load->view('content_list_view', $arg);
			} else {
				$arg['content'] = $this->contents_model->get_content($this->uri->segment(3));
				$this->load->view('content_view', $arg);
			}
		} else {
			if (strcmp($this->uri->segment(2),'pevonia-spas') === 0) {
				$arg['content_list'] = $this->contents_model->get_content_list_by_type($this->uri->segment(2));
				$this->load->view('pevonia_spas_view', $arg);
			} else {
				$arg['content_list'] = $this->contents_model->get_content_list_by_type($this->uri->segment(2));
				$this->load->view('content_list_view', $arg);
			}
		}
		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file contents.php */
/* Location: ./application/controllers/contents.php */