<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		$params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'dashboard';
		$params['menu_list'] = $this->utility_model->get_option_by_type('backend_menu');
		$params['mysql_result'] = ($this->session->flashdata('mysql_result'))? $this->session->flashdata('mysql_result'): NULL;
		$params['product_list'] = $this->products_model->get_product_list();
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/product_list_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function add() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		/* GET DATA BY DEFAULT */
		$params['user_data'] = $this->session->userdata('user_data');
		$params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'dashboard';
		$params['menu_list'] = $this->utility_model->get_option_by_type('backend_menu');
		/* GET DATA BY VIEW */
		$params['mysql_result'] = ($this->session->flashdata('mysql_result'))? $this->session->flashdata('mysql_result'): NULL;
		$params['action'] = 'add';
		$params['action_link'] = site_url('backend/products/do_add');
		$product_class = array('product_class_alias_name' => 'HomeCare');
		$params['product_type_list']['home-care'] = $this->products_model->get_product_type_list_by_class($product_class);
		$product_class = array('product_class_alias_name' => 'professional-zone');
		$params['product_type_list']['professional-zone'] = $this->products_model->get_product_type_list_by_class($product_class);
		/* LOAD VIEW */
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/product_form_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_add() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		$config['upload_path'] = './assets/images/products/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '512';
		$config['max_width'] = '640';
		$config['max_height'] = '500';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);

		foreach ($_FILES['userfile'] as $o_k => $o_v) {
			foreach ($o_v as $i_k => $i_v) {
				$_FILES['userfile'.$i_k][$o_k] = $i_v;
			}
		}
		unset($_FILES['userfile']);
		$result_sets = array(
			'succeed' => 0,
			'failed' => 0
		);
		foreach ($_FILES as $key => $value) {
			if ($this->upload->do_upload($key)) {
				$file = $this->upload->data();
				$product_image_list[] = $file['file_name'];
				$result_sets['succeed'] += 1;
			} else {
				$result_sets['failed'] += 1;
			}
		}
		if ((int)$result_sets['succeed'] > 0) {
			$product = array(
				'created_by' => $params['user_data']['user_signin'],
				'last_updated_by' => $params['user_data']['user_signin'],
				'product_code' => $this->input->post('input-product-code'),
				'product_name_en' => $this->input->post('input-product-name-en'),
				'product_name_th' => $this->input->post('input-product-name-th'),
				'product_detail_en' => $this->input->post('input-product-detail-en'),
				'product_detail_th' => $this->input->post('input-product-detail-th'),
				'benefit_en' => $this->input->post('input-benefit-en'),
				'benefit_th' => $this->input->post('input-benefit-th'),
				'usage_en' => $this->input->post('input-usage-en'),
				'usage_th' => $this->input->post('input-usage-th'),
				'key_ingredient_en' => $this->input->post('input-key-ingredient-en'),
				'key_ingredient_th' => $this->input->post('input-key-ingredient-th'),
				'product_image' => implode('|', $product_image_list),
				'product_type_id' => $this->input->post('input-product-type')
			);
			$mysql_result = $this->products_model->do_add($product);
		} else {
			$mysql_result = $this->upload->display_errors('', '');
		}
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/products', 'refresh');
	}
	
	public function view() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		$params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'dashboard';
		$params['menu_list'] = $this->utility_model->get_option_by_type('backend_menu');
		
		$params['mysql_result'] = ($this->session->flashdata('mysql_result'))? $this->session->flashdata('mysql_result'): NULL;
		$params['action'] = 'view';
		$params['action_link'] = site_url('backend/products/do_edit');
		$product_class = array('product_class_alias_name' => 'HomeCare');
		$params['product_type_list']['home-care'] = $this->products_model->get_product_type_list_by_class($product_class);
		$product_class = array('product_class_alias_name' => 'professional-zone');
		$params['product_type_list']['professional-zone'] = $this->products_model->get_product_type_list_by_class($product_class);
		$product = array('p.row_id' => $this->uri->segment(4));
		$params['product'] = $this->products_model->get_product($product);
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/product_form_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_edit() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		$product = array(
			'last_updated_by' => $params['user_data']['user_signin'],
			'product_code' => $this->input->post('input-product-code'),
			'product_name_en' => $this->input->post('input-product-name-en'),
			'product_name_th' => $this->input->post('input-product-name-th'),
			'product_detail_en' => $this->input->post('input-product-detail-en'),
			'product_detail_th' => $this->input->post('input-product-detail-th'),
			'benefit_en' => $this->input->post('input-benefit-en'),
			'benefit_th' => $this->input->post('input-benefit-th'),
			'usage_en' => $this->input->post('input-usage-en'),
			'usage_th' => $this->input->post('input-usage-th'),
			'key_ingredient_en' => $this->input->post('input-key-ingredient-en'),
			'key_ingredient_th' => $this->input->post('input-key-ingredient-th'),
			'product_type_id' => $this->input->post('input-product-type'),
			'row_id' => $this->input->post('input-row-id')
		);
		$mysql_result = $this->products_model->do_edit($product);
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/products	', 'refresh');
	}
	
	public function do_delete() {
		$mysql_result = $this->products_model->do_delete($this->input->post('input-row-id'));
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/products', 'refresh');
	}
	
	public function ajax_delete_image() {
		if ($this->uri->segment(4) AND $this->uri->segment(5)) {
			$this->products_model->do_delete_product_image($this->uri->segment(4), $this->uri->segment(5));
		}
	}
	
	public function manage_image() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		$config['upload_path'] = './assets/images/products/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '512';
		$config['max_width'] = '640';
		$config['max_height'] = '500';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);

		foreach ($_FILES['userfile'] as $o_k => $o_v) {
			foreach ($o_v as $i_k => $i_v) {
				$_FILES['userfile'.$i_k][$o_k] = $i_v;
			}
		}
		unset($_FILES['userfile']);
		$result_sets = array(
			'succeed' => 0,
			'failed' => 0
		);
		foreach ($_FILES as $key => $value) {
			if ($this->upload->do_upload($key)) {
				$file = $this->upload->data();
				$product_image_list[] = $file['file_name'];
				$result_sets['succeed'] += 1;
			} else {
				$result_sets['failed'] += 1;
			}
		}
		if ((int)$result_sets['succeed'] > 0) {
			$product = array(
				'row_id' => $this->uri->segment(4),
				'product_image' => $product_image_list
			);
			$mysql_result = $this->products_model->do_add_product_image($product);
		} else {
			$mysql_result = $this->upload->display_errors('', '');
		}
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/products/view/'.$this->uri->segment(4), 'refresh');
	}
	
	public function to_string($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}

/* End of file products.php */
/* Location: ./application/controllers/backend/products.php */