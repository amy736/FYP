<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
        parent::__construct();

        if ($this->session->userdata('user_id')) {
        	$this->user_id = $this->session->userdata('user_id');
        	$this->user_type = $this->session->userdata('user_type');
        }

        $this->load->model('Manage_model', 'DbManage');
        
	}

	public function productDetail($product_id)
	{	

		$product = get_any_table_row(array('product_id' => $product_id), 'product');

		// print_r($product); exit;

		switch ($product['category']) {
			case '1':
				$category = "T - Shirt Lengan Panjang";
				break;
			case '2':
				$category = "T - Shirt Lengan Pendek";
				break;
			case '3':
				$category = "Jersey";
				break;
			
			default:
				$category = "Unknow Category";
				break;
		}

		$data['category'] = $category;
		$data['product']  = $product;


		$product_img = get_any_table_array(array('product_id' => $product_id, 'is_submit' => '1'), 'product_image');

		$data['product_img'] = $product_img;
		// $data['user_id']     = $this->user_id;


		$data['colorarr'] = explode("|", $product['color']);
		$data['sizerarr'] = explode("|", $product['size']);

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		// echo $data['total_in_cart']; exit;

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$this->load->view('product-detail', $data);
	}

	function addToCart($data=false)
	{
		$post = $this->input->post();
		// print_r($post);	

		$check_exist = get_any_table_row(array('user_id' => $post['userid'],'product_id' => $post['product_id'], 'status' =>'CART'), 'product_order');

		if ($check_exist == true) {
			
			$update = array('size' => $post['selectedSize'], 'color' => $post['selectedColor'], 'quantity' => $post['quantityInput'] );

			$where = array('user_id' => $post['userid'], 'product_id' => $post['product_id'] );

			$update = update_any_table($update, $where, 'product_order');


		} else {


			$insert_data = array(
				'user_id' => $post['userid'],
				'product_id' => $post['product_id'],
				'quantity' => $post['quantityInput'],
				'size' => $post['selectedSize'],
				'color' => $post['selectedColor'],
				'status' => "CART"
			);

			insert_any_table($insert_data, 'product_order');

		}


		$response = array('status' => true);

		echo encode($response);

	}

	function my_account($data=false)
	{	

		$data['user'] = get_any_table_row(array('id' => $this->user_id), 'users');

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('account', $data);
	}


	function viewMycart($data=false)
	{

		$post = $this->input->post();

		$data['carts'] = get_any_table_array(array('user_id' => $post['userid'], 'status' => 'CART'), 'product_order');

		$data['user_id'] = $this->user_id;

		$this->load->view('view-my-cart', $data);
	}

	function updateCartQuantity($data=false)
	{
		$post = $this->input->post();

		// print_r($post);

		$update = array('quantity' => $post['finalQuantity']);
		$where = array('id' => $post['id']);

		update_any_table($update, $where, 'product_order');
	}

	function checkout($data=false)
	{	

		$data['address'] = get_any_table_row(array('user_id' => $this->user_id), 'address');
		// $data['info'] = get_any_table_row(array('user_id' => $this->user_id), 'personal_info');

		$data['users'] = get_any_table_row(array('id' => $this->user_id), 'users');

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['carts'] = get_any_table_array(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('checkout', $data);
	}

	function addressDetails($data=false)
	{
		$data['address'] = get_any_table_row(array('user_id' => $this->user_id), 'address');
		$data['info'] = get_any_table_row(array('user_id' => $this->user_id), 'personal_info');
		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');


		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['states'] = get_any_table_array(array('module' => 'state'), 'ref_code');

		$this->load->view('address-detail', $data);
	}


	function addNewAddress($data=false)
	{
		$post = $this->input->post();
		// print_r($post); exit;

		$insert = array(
			'address' => $post['addressunit'],
			'city' => $post['city'],
			'state' => $post['state'],
			'postcode' => $post['AddressZipNew'],
			'user_id' => $this->user_id,
		);

		// print_r($insert); exit;

		$status = insert_any_table($insert, 'address');

		if ($status == true) {
			$response = array('status' => true );
		} else {
			$response = array('status' => false );
		}

		echo encode($response); 
	}

	function editAddress($data=false)
	{
		$post = $this->input->post();
		// print_r($post);

		$update = array(
			'address' => $post['addressunit'],
			'city' => $post['city'],
			'state' => $post['state'],
			'postcode' => $post['postcode']
		);

		// echo "<pre>"; print_r($update); echo "</pre>"; exit;
		

		$where = array('user_id' => $this->user_id);

		update_any_table($update, $where, 'address');

		$response = array('status' => true );

		echo encode($response); 
	}

	function autoSaveName($data=false)
	{
		$post = $this->input->post();
		// print_r($post);

		$update = array('name' => $post['name']);

		$where = array('id' => $post['userid']);

		$update = update_any_table($update, $where, 'users');

	}

	function placeOrder($data=false)
	{
		$user_id = $this->user_id;

		$check_address = get_any_table_row(array('user_id' => $user_id), 'address');

		if (!$check_address || $check_address['address'] == '') {

			$data['address'] = false;

		} else {

			$data['address'] = true;

		}


		//$data['address'] = get_any_table_row(array('user_id' => $this->user_id), 'address');
		// $data['info'] = get_any_table_row(array('user_id' => $this->user_id), 'personal_info');

		$data['users'] = get_any_table_row(array('id' => $this->user_id), 'users');

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['carts'] = get_any_table_array(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');


		$this->load->view('place_order', $data);
		

	}

	function confirmPayment($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$data['now'] = display_current_dt();
		$data['card_no'] = $post['card_no'];
		$data['card_holder_name'] = $post['card_holder_name'];
		$data['expiry_date'] = $post['expiry_date'];
		$data['cvv'] = $post['cvv'];

		$data['users'] = get_any_table_row(array('id' => $this->user_id), 'users');

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['carts'] = get_any_table_array(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('payment-confirm', $data);

	}

	function doPayment($data=false)
	{	
		// product to be paid
		$order = get_any_table_array(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		foreach($order as $key){

			$product    = get_any_table_row(array('product_id' => $key['product_id']), 'product');
			$per_unit   = $product['price'];
            $total_paid = $per_unit * $key['quantity'];

            $update = array('payment' => $total_paid, 'status' => 'PAID', 'order_date' => current_dt());
            $where  = array('id' => $key['id']);
            update_any_table($update, $where, 'product_order');

            # generate tracking 
            $this->generate_tracking($key['id']);

            # update stock
            $quantity = $key['quantity'];
            $current_stock = $product['stock'];

            $balance = $current_stock - $quantity;

            $updateStock = array('stock' => $balance);
            $whreStock = array('product_id' => $key['product_id']);
            update_any_table($updateStock, $whreStock, 'product');

            # insert log
            $logdata = array('item_id' => $key['id'], 'user_id' => $this->user_id, 'create_dt' => current_dt(), 'log_comment' => 'Order Placed');
            insert_any_table($logdata, 'log');

            $updateTrack = array('status' => '1', 'complete_dt' => current_dt());
            $whreTrack = array('checklist' => 'Receiving orders', 'item_id' => $key['id']);
            update_any_table($updateTrack, $whreTrack, 'track_order');

		}

		$response = array('status' => true);
		echo encode($response);
	}

	function generate_tracking($id)
	{
		$check = get_any_table_row(array('item_id' => $id), 'track_order');

		if ($check == true) {
		} else {
			$checklist = get_any_table_array(array('module' => 'tracking'), 'ref_code');

			foreach ($checklist as $key) {
				$insert = array(
					'item_id' => $id,
					'checklist' => $key['code_desc'],
				);

				insert_any_table($insert, 'track_order');
			}

			
		}
	}

	function orderList($data=false)
	{

		$data['order'] = get_any_table_array(array('user_id' => $this->user_id, 'payment !=' => '0', 'status !=' => 'CART'), 'product_order');

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$this->load->view('order_list', $data);
	}

	function orderDetails($id)
	{	

		$data['item'] = get_any_table_row(array('id' => $id), 'product_order');

		$data['product'] = get_any_table_row(array('product_id' => $data['item']['product_id']), 'product');

		$data['courier'] = get_any_table_row(array('module' => 'courier'), 'ref_code');

		$data['address'] = get_any_table_row(array('user_id' => $this->user_id), 'address');

		$data['log'] = $this->DbManage->get_order_log($id);
		// get_any_table_array(array('item_id' => $id), 'log');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$this->load->view('order_detail', $data);
	}

	public function orderReceived($data=false)
	{
		// code...
		$id     = $this->input->post('id');
		$update = array('status' => 'COMPLETE');
        $where  = array('id' => $id);
        update_any_table($update, $where, 'product_order');

        // insert log
        $logdata = array('item_id' => $id, 'create_dt' => current_dt(), 'log_comment' => 'Product Has Been Delivered');
        insert_any_table($logdata, 'log');

        $response = array('status' => true);
		echo encode($response);

	}

	function accDetails($data=false)
	{	
		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['user'] = get_any_table_row(array('id' => $this->user_id), 'users');

		$this->load->view('acc_details', $data);
	}

	function updateAcc($data=false)
	{
		$post = $this->input->post();
		// print_r($post); exit;

		if ($post['password'] == '') {
			$update = array('name' => $post['name'], 'email' => $post['email'], 'phone_no' => $post['phone_no']);
		} else {
			$update = array('name' => $post['name'], 'email' => $post['email'], 'phone_no' => $post['phone_no'], 'password' => md5($post['password']));	
		}

		$where = array('id' => $this->user_id);

		update_any_table($update, $where, 'users');
		$response = array('status' => true);
		echo encode($response);
	}

	function shopNow($data=false)
	{	

		$data['product'] = $this->DbManage->get_all_product();


		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('shop_now', $data);
	}


	function shobyCategory($id)
	{
		$data['product'] = $this->DbManage->get_product_by_category($id);


		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');

		

		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');

		$this->load->view('shop_now', $data);	
	}

	function contactUs($data=false)
	{	

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');



		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');
		
		$this->load->view('contact_us', $data);	
	}

	function faq($data=false)
	{	

		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');



		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');
		
		$this->load->view('faq', $data);	
	}

	public function privacyPolicy($data=false)
	{
		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');



		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');
		
		$this->load->view('policy', $data);
	}

	public function terms($data=false)
	{
		// code...
		$data['list_tshirt_panjang'] = get_any_table_array(array('category' => '1'), 'product');
		$data['list_tshirt_pendek'] = get_any_table_array(array('category' => '2'), 'product');
		$data['list_jersey'] = get_any_table_array(array('category' => '3'), 'product');
		$data['list_uniform'] = get_any_table_array(array('category' => '4'), 'product');



		$data['user_id'] = $this->user_id;
		$data['user_type'] = $this->user_type;

		$data['total_in_cart'] = count_any_table(array('user_id' => $this->user_id, 'status' => 'CART'), 'product_order');
		
		$this->load->view('terms', $data);

	}

}
