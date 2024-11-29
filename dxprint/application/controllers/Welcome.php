<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        if ( $this->session->userdata('user_type') == "ADMIN") {
        	redirect('admin');
        }

        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        
	}

	public function index()
	{	

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('home', $data);
	}
}
