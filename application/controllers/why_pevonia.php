<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Why_Pevonia extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$arg['current_view'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$pt = $this->uri->segment(2); //GET PRODUCT TYPE
		$arg['menu_list'] = $this->utility_model->get_menu_list();
		
		$arg['contact_list'] = $this->utility_model->get_option_by_type('CONTACT_EN');
		
		$arg['product_type'] = $this->products_model->get_product_type($pt);
		$arg['product_type_list'] = $this->products_model->get_product_type_list($arg['current_view']);
		$arg['product_list'] = $this->products_model->get_product_list(array($pt, 0));
		
		
		$this->load->view('header_view', $arg);
		
		if($this->uri->segment(3))
		{
			$arg['product'] = $this->products_model->get_product($this->uri->segment(3));
			$this->load->view('product_view', $arg);
		}
		else
		{
			$this->load->view('product_list_view', $arg);
		}
		
		$this->load->view('footer_view', $arg);
	}
	
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */