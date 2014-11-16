<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index() {
		/* DEFAULT */
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$params['why_pevonia'] = $this->contents_model->get_content('why-pevonia', $params['default_language']);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		/* GET DATA BY VIEW*/
		$params['product_class'] = $this->products_model->get_product_class($params['current_view']);
		$params['product_type_list'] = $this->products_model->select_product_type_list_by_class($params['product_class']['product_class_id']);
		/* LOAD VIEW */
		$this->load->view('header_view', $params);
		if ($this->uri->segment(4)) {
			$params['breadcrumbs_list'] = array(
				$this->uri->segment(2),
				$this->uri->segment(3),
				$this->uri->segment(4)
			);
			$params['product'] = $this->products_model->do_select_product($this->uri->segment(4));
			$this->load->view('product_view', $params);
		} else {
			if ($this->uri->segment(3)) {
				$params['breadcrumbs_list'] = array(
					$this->uri->segment(2),
					$this->uri->segment(3)
				);
				$params['product_list'] = $this->products_model->get_product_list_by_type($this->uri->segment(3));
				$params['download_list'] = $this->utility_model->get_download_list($this->uri->segment(2));
				$this->load->view('product_list_view', $params);
			} else {
				$params['breadcrumbs_list'] = array(
					$this->uri->segment(2)
				);
				$params['product_list'] = $this->products_model->get_product_list_by_class($this->uri->segment(2), 'Y', 0, 12);
				$params['download_list'] = $this->utility_model->get_download_list($this->uri->segment(2));
				$this->load->view('product_list_view', $params);
			}
		}
		$this->load->view('footer_view', $params);
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */