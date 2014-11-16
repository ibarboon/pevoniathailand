<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {
	
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
		$params['content_list'] = $this->contents_model->get_content_list();
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/content_list_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function add() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		$params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'dashboard';
		$params['menu_list'] = $this->utility_model->get_option_by_type('backend_menu');
		$params['mysql_result'] = ($this->session->flashdata('mysql_result'))? $this->session->flashdata('mysql_result'): NULL;
		$params['action'] = 'add';
		$params['content_list'] = $this->contents_model->get_content_list();
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/content_form_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_add() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()) {
			$content_media = $this->upload->data();
			$content = array(
				'created_by' => $params['user_data']['user_signin'],
				'last_updated_by' => $params['user_data']['user_signin'],
				'content_type' => $this->input->post('input-content-type'),
				'content_alias_name' => str_replace(' ', '-', $this->input->post('input-content-header')),
				'content_header' => $this->input->post('input-content-header'),
				'content_body' => $this->input->post('input-content-body'),
				'content_media' => 'image|'.$content_media['file_name'],
				'content_language' => $this->input->post('input-content-language')
			);
			$mysql_result = $this->contents_model->do_add($content);
		} else {
			$mysql_result = array('error' => $this->upload->display_errors());
		}
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/contents', 'refresh');
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
		$content = array('row_id' => $this->uri->segment(4));
		$params['content'] = $this->contents_model->get_content_by_id($content);
		
// 		echo "<pre>";
// 		print_r($params);
// 		echo "</pre>";
		
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/content_form_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_edit() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()) {
			$content_media = $this->upload->data();
			$content = array(
				'last_updated_by' => $params['user_data']['user_signin'],
				'content_type' => $this->input->post('input-content-type'),
				'content_alias_name' => str_replace(' ', '-', $this->input->post('input-content-header')),
				'content_header' => $this->input->post('input-content-header'),
				'content_body' => $this->input->post('input-content-body'),
				'content_media' => 'image|'.$content_media['file_name'],
				'content_language' => $this->input->post('input-content-language'),
				'row_id' => $this->input->post('input-row-id')
			);
		} else {
			$mysql_result = $this->upload->display_errors('', '');
			if ($mysql_result === 'You did not select a file to upload.') {
				$content = array(
					'last_updated_by' => $params['user_data']['user_signin'],
					'content_type' => $this->input->post('input-content-type'),
					'content_alias_name' => str_replace(' ', '-', $this->input->post('input-content-header')),
					'content_header' => $this->input->post('input-content-header'),
					'content_body' => $this->input->post('input-content-body'),
					'content_media' => $this->input->post('input-old-content-media'),
					'content_language' => $this->input->post('input-content-language'),
					'row_id' => $this->input->post('input-row-id')
				);
			}
		}
		$mysql_result = $this->contents_model->do_edit($content);
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/contents', 'refresh');
	}
	
	public function do_delete() {
		$mysql_result = $this->contents_model->do_delete($this->input->post('input-row-id'));
		$this->session->set_flashdata('mysql_result', $mysql_result);
		redirect('backend/contents', 'refresh');
	}
}

/* End of file contents.php */
/* Location: ./application/controllers/backend/contents.php */