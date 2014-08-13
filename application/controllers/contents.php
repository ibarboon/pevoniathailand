<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list();
		
		$arg['breadcrumbs_list'] = array('You are here:', 'Home', ucwords($this->uri->segment(1)));
		
		$arg['contact_list'] = $this->utility_model->get_option_by_type('CONTACT_EN');
		
		$arg['archives_list'] = $this->contents_model->get_archives_list($this->uri->segment(1));
		
		$this->load->view('header_view', $arg);
		
		if($this->uri->segment(2))
		{
			if($this->uri->segment(2) == 'archives') {
				$arg['content_list'] = $this->contents_model->get_content_list(array($this->uri->segment(1), $this->uri->segment(3)));
				$this->load->view('content_list_view', $arg);
			} else {
				$arg['content'] = $this->contents_model->get_content($this->uri->segment(2));
				$this->load->view('content_view', $arg);
			}
		}
		else
		{
			$arg['content_list'] = $this->contents_model->get_content_list($this->uri->segment(1));
			$this->load->view('content_list_view', $arg);
		}
		
		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file contents.php */
/* Location: ./application/controllers/contents.php */