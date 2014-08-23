<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
// 		echo "<code>intro / index</code>";
// 		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
// 		$arg['menu_list'] = $this->utility_model->get_menu_list();
// 		$arg['contact_list'] = $this->utility_model->get_option_by_type('CONTACT_EN');
		
		$this->load->view('intro_view');
// 		$this->load->view('http_404_view');
// 		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file intro.php */
/* Location: ./application/controllers/intro.php */