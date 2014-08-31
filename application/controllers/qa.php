<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QA extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list();
		$arg['qa_list'] = $this->qa_model->get_qa_list(array('ENG',0));
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$this->load->view('header_view', $arg);
		$this->load->view('qa_view', $arg);
		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */