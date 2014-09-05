<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$args['html_meta'] = $this->utility_model->get_option_by_type('html_meta', 'customize');
		$args['carousel_list'] = $this->utility_model->get_option_by_type('carousel_intro', 'nomal');
		$args['social_network_list'] = $this->utility_model->get_option_by_type('social_network', 'nomal');
		$args['default_language'] = $this->utility_model->get_option_by_type('default_language', 'customize');
// 		echo '<pre>';
// 		print_r($args);
// 		echo '</pre>';
		$this->load->view('intro_view', $args);
	}
	
}

/* End of file intro.php */
/* Location: ./application/controllers/intro.php */