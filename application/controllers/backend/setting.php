<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	
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
		$option_criteria = array('option_type' => 'default_language', 'active_flag' => 'Y');
		$params['default_language_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'html_meta', 'active_flag' => 'Y');
		$params['html_meta_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'social_network', 'active_flag' => 'Y');
		$params['social_network_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'contact_en', 'active_flag' => 'Y');
		$params['contact_en_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'contact_th', 'active_flag' => 'Y');
		$params['contact_th_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_type' => 'home_content', 'active_flag' => 'Y');
		$params['home_content_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_key' => 'HomeCare', 'active_flag' => 'Y');
		$params['hc_download_list'] = $this->utility_model->get_option_list($option_criteria);
		$option_criteria = array('option_key' => 'professional-zone', 'active_flag' => 'Y');
		$params['pz_download_list'] = $this->utility_model->get_option_list($option_criteria);
		$params['action'] = 'view';
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/setting_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_edit_content() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		foreach ($this->input->post() as $key => $value) {
			$new_option = array();
			if ($key !== 'input-action') {
				if (strpos($key, '-')) {
					$attribute = explode('-', $key);
					$option_criteria = array('option_type' => $attribute[0], 'option_key' => $attribute[1], 'active_flag' => 'Y');
					$old_option = $this->utility_model->get_option_list($option_criteria);
					$old_value = explode('|', $old_option[0]['option_value']);
					$new_value = array($old_value[0], $value);
					$new_option['set'] = array('option_value' => implode('|', $new_value));
					$new_option['where'] = $option_criteria;
					$this->utility_model->do_update($new_option);
				} else {
					$option_criteria = array('option_key' => $key, 'active_flag' => 'Y');
					$old_option = $this->utility_model->get_option_list($option_criteria);
					if ($old_option[0]['option_type'] === 'social_network') {
						$old_value = explode('|', $old_option[0]['option_value']);
						$new_value = array($old_value[0], $value);
					} else {
						$new_value = array($value);
					}
					$new_option['set'] = array('option_value' => implode('|', $new_value));
					$new_option['where'] = $option_criteria;
					$this->utility_model->do_update($new_option);
				}
			}
		}
		redirect('backend/setting', 'refresh');
	}
	
	public function do_edit_file() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		if ($this->input->post('option_key') === 'pevonia_spa' OR
			$this->input->post('option_key') === 'professional_zone') {
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '512';
			$config['max_width'] = '460';
			$config['max_height'] = '263';
			$config['overwrite'] = false;
			$config['encrypt_name'] = true;
		} else {
			$config['upload_path'] = './assets/download/';
			$config['allowed_types'] = 'pdf';
		}
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
				if ($this->input->post('option_key') === 'pevonia_spa' OR
					$this->input->post('option_key') === 'professional_zone') {
					if ($this->input->post('option_key') === 'pevonia_spa') {
						$new_option['set'] = array('option_value' => $file['file_name'].'|pevonia-spas|Pevonia Spas');
					} else {
						$new_option['set'] = array('option_value' => $file['file_name'].'|products/professional-zone|Professional Zone');
					}
					$new_option['where'] = array('row_id' => $this->input->post('option_id'));
					$this->utility_model->do_update($new_option);
				} else {
					$option = array(
						'created_by' => $params['user_data']['user_signin'],
						'last_updated_by' => $params['user_data']['user_signin'],
						'option_type' => 'download_list',
						'option_key' => $this->input->post('option_key'),
						'option_value' => $file['file_name']
					);
					$this->utility_model->do_insert($option);
				}
				$result_sets['succeed'] += 1;
			} else {
				$result_sets['failed'] += 1;
			}
		}
		if ((int)$result_sets['succeed'] > 0) {
			$mysql_result = 'succeed';
		} else {
			$mysql_result = $this->upload->display_errors('', '');
		}
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/setting', 'refresh');
	}
	
	public function do_delete_file() {
		$option = array('row_id' => $this->input->post('option_id'));
		echo $this->utility_model->do_delete($option);
	}
}

/* End of file setting.php */
/* Location: ./application/controllers/backend/setting.php */