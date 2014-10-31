<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['slides'] = $this->utility_model->get_option_by_type('slides');
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia');
		$params['news'] = $this->contents_model->get_content('news');
		$params['home_content'] = $this->utility_model->get_option_by_type('home_content' ,'customize');
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		$params['product_list'] = $this->products_model->get_product_list_by_class('HomeCare', 'N', 0, 4);
// 		echo '<pre>';
// 		print_r($params);
// 		echo '</pre>';
		$this->load->view('header_view', $params);
		$this->load->view('home_view', $params);
		$this->load->view('footer_view', $params);
	}
	
	public function why_pevonia() {
		$params['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$params['content'] = $this->contents_model->get_content($params['current_view']);
// 		echo '<pre>';
// 		print_r($params['content']);
// 		echo '</pre>';
		$this->load->view('header_view', $params);
		$this->load->view('why_pevonia_view', $params);
		$this->load->view('footer_view', $params);
	}
	
	public function _http_404() {
		$arg['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$arg['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list('menu_'.$arg['default_language']);
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$arg['default_language'], 'nomal');
		$this->load->view('header_view', $arg);
		$this->load->view('http_404_view');
		$this->load->view('footer_view', $arg);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */