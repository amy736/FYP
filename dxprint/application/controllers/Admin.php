<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Admin_model', 'DbAdmin');

        if ( $this->session->userdata('user_type') <> "ADMIN") {
        	redirect();
        }
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');


		// total earning
		$product_order = get_any_table_array(array('status !=' => 'CART'), 'product_order');

		$total = 0;
		$totalOrder = 0;
		foreach ($product_order as $key) {
			$total = $total + $key['payment'];
			$totalOrder = $totalOrder + $key['quantity'];
		}

		$data['total_earnings'] = $total;
		$data['total_order'] = $totalOrder;

		$this->load->view('admin/dashboard', $data);
	}

	function logout()
	{
	    $this->session->sess_destroy();
	    redirect();
	}
}
