<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QA extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$arg['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(2): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list('menu_'.$arg['default_language']);
		$arg['archives_list'] = $this->qa_model->get_archives_list($arg['default_language']);
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		if (($this->uri->segment(3) === 'archives') AND $this->uri->segment(4)) {
			$arg['qa_list'] = $this->qa_model->get_qa_list_by_archives(array($this->uri->segment(4), $arg['default_language'], 0));
		} else {
			$arg['qa_list'] = $this->qa_model->get_qa_list(array($arg['default_language'],0));
		}
		$this->load->view('header_view', $arg);
		$this->load->view('qa_view', $arg);
		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */