<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Service extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		/* DEFAULT */
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		/* GET DATA BY VIEW*/
		$params['slides'] = $this->utility_model->get_option_by_type('slides');
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia', $params['default_language']);
		$params['news'] = $this->contents_model->get_last_content('news', $params['default_language']);
		$params['home_content'] = $this->utility_model->get_option_by_type('home_content' ,'customize');
		$params['product_list'] = $this->products_model->get_product_list_by_class('HomeCare', 'N', 0, 4);
		$params['how_to_order'] = $this->contents_model->get_content('how-to-order', $params['default_language']);
		$params['payment_channel'] = $this->contents_model->get_content('payment-channel', $params['default_language']);
		$params['our_location'] = $this->contents_model->get_content('our-location', $params['default_language']);
		/* LOAD VIEW */
		$this->load->view('header_view', $params);
		$this->load->view('customer_service_view', $params);
		$this->load->view('footer_view', $params);
	}
	
}

/* End of file customer_service.php */
/* Location: ./application/controllers/customer_service.php */