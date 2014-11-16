<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
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
		$this->load->view('backend/header_view', $params);
		$params['user_list'] = $this->users_model->get_user_list();
		$this->load->view('backend/user_list_view', $params);
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
		$params['user_list'] = $this->users_model->get_user_list();
		$this->load->view('backend/header_view', $params);
		$this->load->view('backend/user_form_view', $params);
		$this->load->view('backend/footer_view', $params);
	}
	
	public function do_add() {
		if ($this->session->userdata('user_data') === '') {
			redirect('backend/users/signin', 'refresh');
			exit();
		}
		$params['user_data'] = $this->session->userdata('user_data');
		$user = array(
			'created_by' => $params['user_data']['user_signin'],
			'last_updated_by' => $params['user_data']['user_signin'],
			'user_signin' => $this->input->post('in-user-signin'),
			'user_password' => $this->input->post('in-password'),
			'user_email' => $this->input->post('in-email')
		);
		$this->session->set_flashdata('mysql_result', $this->users_model->do_add($user));
		redirect('backend/users', 'refresh');
	}
	
	public function signin() {
		$params['signin_status'] = ($this->session->flashdata('signin_status'))? $this->session->flashdata('signin_status'): NULL;
		$this->load->view('backend/signin_view', $params);
	}
	
	public function do_signin() {
		$username = $this->input->post('input-username');
		$password = $this->input->post('input-password');
		$user = $this->users_model->user_authentication($username, $password);
		if (count($user) > 0) {
			$this->session->set_userdata('user_data', $user);
			redirect('backend/dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('signin_status', 'failed');
			redirect('backend/users/signin', 'refresh');
		}
	}
	
	public function do_signout() {
		$params['user_data'] = $this->session->userdata('user_data');
		if ($this->users_model->set_user_last_signin($params['user_data']['user_signin'])) {
			$this->session->sess_destroy();
			redirect('backend/dashboard', 'refresh');
		}
	}
}

/* End of file users.php */
/* Location: ./application/controllers/backend/users.php */