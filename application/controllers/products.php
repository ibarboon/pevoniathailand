<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index() {
		$arg['default_language'] = $this->utility_model->get_default_language($this->uri->segment(1));
		$arg['current_view'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$arg['menu_list'] = $this->utility_model->get_menu_list('menu_'.$arg['default_language']);
		$arg['contact_list'] = $this->utility_model->get_option_by_type('contact_en', 'nomal');
		$arg['product_class'] = $this->products_model->select_product_class($arg['current_view']);
		$arg['product_type_list'] = $this->products_model->select_product_type_list_by_class($arg['product_class']['product_class_id']);
		$this->load->view('header_view', $arg);
		if ($this->uri->segment(4)) {
			$arg['breadcrumbs_list'] = array(
				$this->uri->segment(2),
				$this->uri->segment(3),
				$this->uri->segment(4)
			);
			$arg['product'] = $this->products_model->do_select_product($this->uri->segment(4));
			$this->load->view('product_view', $arg);
		} else {
			if ($this->uri->segment(3)) {
				$arg['breadcrumbs_list'] = array(
					$this->uri->segment(2),
					$this->uri->segment(3)
				);
				$arg['product_list'] = $this->products_model->select_product_list_by_type(array($this->uri->segment(3), 0));
				$this->load->view('product_list_view', $arg);
			} else {
				$arg['breadcrumbs_list'] = array(
					$this->uri->segment(2)
				);
				$arg['product_list'] = $this->products_model->do_select_product_list_by_class(array($arg['product_class']['product_class_id'], 0));
				$this->load->view('product_list_view', $arg);
			}
		}
		$this->load->view('footer_view', $arg);
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */