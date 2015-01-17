<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index() {
		/* DEFAULT */
		$params['default_language'] = ($this->uri->segment(1))? $this->uri->segment(1): $this->utility_model->get_default_language();
		$params['menu_list'] = $this->utility_model->get_menu_list('menu_'.$params['default_language']);
		$content = array('content_alias_name' => 'why-pevonia', 'content_language' => $params['default_language']);
		$params['why_pevonia'] = $this->contents_model->get_content($content);
		$params['contact_list'] = $this->utility_model->get_option_by_type('contact_'.$params['default_language']);
		$params['social_network_list'] = $this->utility_model->get_option_by_type('social_network');
		$params['mapping_value'] = $this->uri->segment(2);
		
		/* Product Class */
		$product_class = array('product_class_alias_name' => $this->uri->segment(3));
		$params['product_class'] = $this->products_model->get_product_class($product_class);
		if (count($params['product_class']) > 0) {
			$params['current_view'] = $params['mapping_value'].'/'.$params['product_class']['product_class_alias_name'];
			$product_type = array('product_class_id' => $params['product_class']['product_class_id'], 'parent_id' => 0);
			$params['product_type_list'] = $this->products_model->get_product_type_list($product_type);
			$product = array('product_class_id' => $params['product_class']['product_class_id']);
			$params['product_list'] = $this->products_model->get_product_list_by_class($product, 0, 12);
			$params['download_list'] = $this->utility_model->get_download_list($params['product_class']['product_class_alias_name']);
			$params['breadcrumbs_list'] = array($params['product_class']['product_class_alias_name']);
			$this->load->view('header_view', $params);
			$this->load->view('product_list_view', $params);
			$this->load->view('footer_view', $params);
		}
		/* Product Type */
		if ($params['mapping_value'] === 'products') {
			$product_class_id = 1;
		}
		if ($params['mapping_value'] === 'treatment') {
			$product_class_id = 2;
		}
		$product_type = array('product_type_alias_name' => $this->uri->segment(3), 'product_class_id' => $product_class_id);
		$params['product_type'] = $this->products_model->get_product_type($product_type);
		if (count($params['product_type']) > 0) {
			$product_class = array('row_id' => $params['product_type']['product_class_id']);
			$params['product_class'] = $this->products_model->get_product_class($product_class);
			$params['current_view'] = $params['mapping_value'].'/'.$params['product_class']['product_class_alias_name'];
			if ((int)$params['product_class']['product_class_id'] === 1) {
				$product_type = array('product_class_id' => $params['product_class']['product_class_id'], 'parent_id' => 0);
				$params['product_type_list'] = $this->products_model->get_product_type_list($product_type);
				$product = array('product_type_id' => $params['product_type']['product_type_id']);
				$params['product_list'] = $this->products_model->get_product_list_by_type($product, 0, 99);
			} else {
				if ((int)$params['product_type']['parent_id'] === 0) {
					$product_type = array('parent_id' => $params['product_type']['product_type_id']);
					$params['product_type_list'] = $this->products_model->get_product_type_list($product_type);
					$product = array('parent_id' => $params['product_type']['product_type_id']);
					$params['product_list'] = $this->products_model->get_product_list_by_type($product, 0, 99);
				} else {
					$product_type = array('product_class_id' => $params['product_class']['product_class_id'], 'parent_id' => $params['product_type']['parent_id']);
					$params['product_type_list'] = $this->products_model->get_product_type_list($product_type);
					$product = array('product_type_id' => $params['product_type']['product_type_id']);
					$params['product_list'] = $this->products_model->get_product_list_by_type($product, 0, 99);
				}
			}
			$params['download_list'] = $this->utility_model->get_download_list($params['product_class']['product_class_alias_name']);
			$params['breadcrumbs_list'] = array($params['product_class']['product_class_alias_name']);
			$this->load->view('header_view', $params);
			$this->load->view('product_list_view', $params);
			$this->load->view('footer_view', $params);
		}
		
		/* Product */
		$product = array('p.row_id' => $this->uri->segment(3));
		$params['product'] = $this->products_model->get_product($product);
		if (count($params['product']) > 0) {
			$product_type = array('row_id' => $params['product']['product_type_id']);
			$params['product_type'] = $this->products_model->get_product_type($product_type);
			$product_type = array('product_class_id' => $params['product_type']['product_class_id']);
			$params['product_type_list'] = $this->products_model->get_product_type_list($product_type);
			$product_class = array('row_id' => $params['product_type_list'][0]['product_class_id']);
			$params['product_class'] = $this->products_model->get_product_class($product_class);
			$params['current_view'] = $params['mapping_value'].'/'.$params['product_class']['product_class_alias_name'];
			$params['sl'] = 'products/'.$this->uri->segment(3);
			$params['download_list'] = $this->utility_model->get_download_list($params['product_class']['product_class_alias_name']);
			$params['breadcrumbs_list'] = array($params['product_class']['product_class_alias_name']);
			$params['product_image_list'] = explode('|', $params['product']['product_image']);
			$this->load->view('header_view', $params);
			$this->load->view('product_view', $params);
			$this->load->view('footer_view', $params);
		}
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */