<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Controller {
	
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
		$params['slides'] = $this->utility_model->get_option_by_type('slides');
		$params['result_sets'] = ($this->session->flashdata('result_sets'))? $this->session->flashdata('result_sets'): NULL;
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/slides_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_insert_photo() {
		$params['user_data'] = $this->session->userdata('user_data');
	
		$config['upload_path'] = './assets/images/slides/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '408';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
	
		$this->load->library('upload', $config);
		foreach ($_FILES['userfile'] as $o_k => $o_v) {
			foreach ($o_v as $i_k => $i_v) {
				$_FILES['userfile'.$i_k][$o_k] = $i_v;
			}
		}
		unset($_FILES['userfile']);
		$params['result_sets'] = array(
			'succeed' => 0,
			'failed' => 0
		);
		foreach ($_FILES as $key => $value) {
			if ($this->upload->do_upload($key)) {
				$photo = $this->upload->data();
				$sql = 'insert into cms_options values (null, now(), lower(?), now(), lower(?), ?, ?, ?, ?, ?);';
				$data = array(
						$params['user_data']['user_signin'],
						$params['user_data']['user_signin'],
						'slides',
						$photo['file_name'],
						'#',
						0,
						'Y'
				);
				$query = $this->db->query($sql, $data);
				$params['result_sets']['succeed'] += 1;
			} else {
				$params['result_sets']['failed'] += 1;
			}
		}
		if ($params['result_sets']['failed'] > 0) {
			$params['result_sets']['failed'] = $this->upload->display_errors(NULL,'<br>');
		}
		$this->session->set_flashdata('result_sets', $params['result_sets']);
		redirect('backend/slides', 'refresh');
	}
	public function do_edit_photo() {
		if ($this->uri->segment(4)) {
			$params['user_data'] = $this->session->userdata('user_data');
			$action_link = $this->input->post('input-action-link');
			$sql = 'update cms_options ';
			$sql .= 'set last_updated = now(), last_updated_by = ?, option_value = ? ';
			$sql .= 'where option_type = ? ';
			$sql .= 'and option_key = ? ';
			$sql .= 'limit 1;';
			$data = array(
				$params['user_data']['user_signin'],
				$action_link,
				'slides',
				$this->uri->segment(4)
			);
			if ($this->db->query($sql, $data)) {
				$params['result_sets']['succeed'] = 1;
			} else {
				$params['result_sets']['failed'] = 'Cannot edit this photo.';
			}
			$this->session->set_flashdata('result_sets', $params['result_sets']);
		}
		redirect('backend/slides', 'refresh');
	}
	
	public function do_delete_photo() {
		if ($this->uri->segment(4)) {
			$sql = 'delete from cms_options where option_type = ? and option_key = ?;';
			$data = array('slides', $this->uri->segment(4));
			if ($this->db->query($sql, $data)) {
				if (unlink('./assets/images/slides/'.$this->uri->segment(4))) {
					$params['result_sets']['succeed'] = 1;
				} else {
					$params['result_sets']['failed'] = 'Cannot delete this photo.';
				}
			} else {
				$params['result_sets']['failed'] = 'Cannot delete this photo.';
			}
			$this->session->set_flashdata('result_sets', $params['result_sets']);
		}
		redirect('backend/slides', 'refresh');
	}
}

/* End of file slides.php */
/* Location: ./application/controllers/backend/slides.php */