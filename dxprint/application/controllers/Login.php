<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Login_model', 'DbLogin');
	}

	public function index()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where       = array('username' => $username, 'password' => md5($password));
		// print_r($where); exit;
		$check_login = $this->DbLogin->check_login($where);

		if ($check_login['status'] == true) {

			$session_data = array(
				'user_id' 	=> $check_login['data']['id'],
				'name' 	  	=> $check_login['data']['name'],
				'username' 	=> $check_login['data']['username'],
				'user_type' => $check_login['data']['user_type']
			);

			$this->session->set_userdata($session_data);

			# switch user based on type ; parent or student or tutor
			switch ($check_login['data']['user_type']) {
				case 'ADMIN':
					redirect('admin');
					break;

				case 'MEMBER':
					redirect();
					break;
				
				default:
					$data['heading'] = "User Type Not Found";
					$data['message'] = "User type not found while login, please contact admin and check your username";
					$this->load->view('errors/html/error_general', $data);
					break;
			}

		} else {
			$this->session->set_flashdata('error', $check_login['msg']);
			redirect();
		}
	}

	function logout()
	{
	    $this->session->sess_destroy();
	    redirect();
	}

	function register($data=false)
	{
		$post = $this->input->post();
		// print_r($post);

		$insert = array(
			'name' => $post['name'],
			'username' => $post['username'],
			'email' => $post['email'],
			'password' => md5($post['password']),
			'user_type' => 'MEMBER',
			'phone_no' => $post['phone_no']
		);

		insert_any_table($insert, 'users');

		$this->session->set_flashdata('success', "Successfully create account");
		redirect();
	}
}
