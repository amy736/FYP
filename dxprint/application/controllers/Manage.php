<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Manage_model', 'DbManage');

        if ( $this->session->userdata('user_type') <> "ADMIN") {
        	redirect();
        }


	}

	function addProduct($data=false)
	{	
		$data['tempkey'] = getRandomString('20');

		$data['colors'] = get_any_table_array(array('name' => 'color'), 'attributes');
		$data['sizes'] = get_any_table_array(array('name' => 'size'), 'attributes');

		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');

	    $this->load->view('admin/add-product', $data);
	}

	function allProduct($data=false)
	{	
		$data['products'] = $this->DbManage->get_all_product();
		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');
		$this->load->view('admin/product-list', $data);
	}

	function orderList($data=false)
	{
		$data['orders'] = $this->DbManage->get_all_order();
		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');
		$this->load->view('admin/order-list', $data);
	}

	function upload_product_img($data=false)
	{
		// print_r($_FILES['image']); exit;
		$post = $this->input->post();
		// print_r($post); exit;

		$ext                            = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $hashfilename                   = getRandomString('20') . "." . $ext;

		$config['upload_path']          = './uploads/product-image';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 9999;
        $config['file_name']            = $hashfilename;

        // echo $hashfilename; exit;

        $this->load->library('upload', $config);

        $status = true;

        if ( ! $this->upload->do_upload('image'))
        {
            $error      = array('error' => $this->upload->display_errors());
            $status     = false;
            $error_msg  = $error['error'];
            // print_r($error); exit;
        }
        else
        {	
        	# success upload
        	$data_insert = array(
                'path' => $config['upload_path'],
                'create_dt' => current_dt(),
                'filename' => $hashfilename,
                'original_filename' => $_FILES['image']['name'],
                'tempkey' => $post['tempkey']
            );

            // print_r($data_insert); exit;

            $insert = insert_any_table($data_insert, 'product_image');

        }

        if ($status == true) {

        	$where_img = array('tempkey' => $post['tempkey']);
        	$imgs = get_any_table_array($where_img, 'product_image');

        	$result = "";
        	foreach ($imgs as $key) {
        		$path = base_url () . $key['path'] . "/" . $key['filename'];
				$result .= "<div class='item'><img src='". $path ."' width='20%'><a onclick=deleteProductImg('".$key['id']."','".$post['tempkey']."')>Delete</a></div>";
        	}

        	$content = $result;
        
        } else {
        	$content = $error_msg;
        }
        
        $response = array('content' => $content, 'status' => $status);
       	echo encode($response);

	}

	function deleteImg($data=false)
	{	
		$id = $this->input->post('id');
		$tempkey = $this->input->post('tempkey');
		$where = array('id' => $id);
		delete_any_table($where, 'product_image');

		$where_img = array('tempkey' => $tempkey);
        $imgs = get_any_table_array($where_img, 'product_image');

        $result = "";
    	foreach ($imgs as $key) {
    		$path = base_url () . $key['path'] . "/" . $key['filename'];
    		$result .= "<div class='item'><img src='". $path ."' width='20%'><a onclick=deleteProductImg('".$key['id']."','".$tempkey."')>Delete</a></div>";
    	}

    	$content = $result;

		$response = array('status' => true , 'content' => $content);
		echo encode($response);
	}

	function saveProduct($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		if (empty($post['size']) || empty($post['color'])) {
			// code...
			$this->session->set_flashdata('error', 'Please choose at least One color and Size');
			redirect('manage/addProduct');
		}

		

		$product_id = get_keytab_value('product_id');

		$img = get_any_table_row(array('tempkey' => $post['tempkey']), 'product_image');

		if ($img == false) {
			$this->session->set_flashdata('success', 'Please insert at least 1 image !');
			redirect('manage/addProduct');
		}

		$color = implode("|", $post['color']);
		$size = implode("|", $post['size']);

		$data_insert = array(
			'name' => $post['name'], 
			'category' => $post['category'], 
			'price' => $post['price'], 
			'stock' => $post['stock'], 
			'color' => $color, 
			'size' => $size, 
			'remark' => $post['description'],
			'product_id' => $product_id,
		);

		$insert = insert_any_table($data_insert, 'product');

		$update_img = array('product_id' => $product_id, 'is_submit' => '1');
		$where = array('tempkey' => $post['tempkey']);

		$update = update_any_table($update_img, $where, 'product_image');

		$this->session->set_flashdata('success', 'Product Successfully Added !');
		redirect('manage/addProduct');

	}

	function shippedModal($data=false)
	{
		$data['id'] = $this->input->post('id');
		$this->load->view('admin/modal-ship-item', $data);

	}

	function packaging($data=false)
	{
		$update = array('status' => 'PACKAGING');
		$where = array('id' => $this->input->post('id'));
		update_any_table($update, $where, 'product_order');

		# insert log
		$idd = $this->input->post('id');
		$logdata = array('item_id' => $idd, 'create_dt' => current_dt(), 'log_comment' => 'Product Packaging');
        insert_any_table($logdata, 'log');

        $updateTrack = array('status' => '1', 'complete_dt' => current_dt());
        $whreTrack = array('checklist' => 'Order processing', 'item_id' => $idd);
        update_any_table($updateTrack, $whreTrack, 'track_order');
	}


	public function proceedShipping($data=false)
	{
		// code...
		$post = $this->input->post();

		$id = $post['id'];
		$tracking_no = $post['trackingno'];

		$update = array('status' => 'SHIPPED', 'tracking_no' => $tracking_no);
		$where = array('id' => $this->input->post('id'));
		update_any_table($update, $where, 'product_order');

		$givenDate = date('Y-m-d');

		$date = new DateTime($givenDate);

		$date->modify('+7 days');

		$estimated = $date->format('Y-m-d');


		# insert log

		$logdata = array(
			'item_id' => $id, 
			'create_dt' => current_dt(), 
			'log_comment' => 'Product Shipped',
			'service' => 'J&T Express',
			'estimate_date' => $estimated,
			'tracking_no' => $tracking_no,
			'display_sub' => '1',
		);

		// print_r($logdata); exit;
        insert_any_table($logdata, 'log');


        $updateTrack = array('status' => '1', 'complete_dt' => current_dt());
        $whreTrack = array('checklist' => 'Being delivered', 'item_id' => $id);
        update_any_table($updateTrack, $whreTrack, 'track_order');
	}

	function orderDetails($order_id)
	{
		$data['order'] = get_any_table_row(array('id' => $order_id), 'product_order');
		$data['product'] = get_any_table_row(array('product_id' => $data['order']['product_id']), 'product');
		$data['address'] = get_any_table_row(array('user_id' => $data['order']['user_id']), 'address');
		$data['log'] = get_any_table_row(array('item_id' => $order_id, 'log_comment' => 'Product Shipped', 'estimate_date !=' => '0000-00-00 00:00:00'), 'log');
		$this->load->view('admin/order-details', $data);

	}

	function trackOrder($id)
	{
		$data['log'] = get_any_table_array(array('item_id' => $id), 'log');
		$data['order'] = get_any_table_row(array('id' => $id), 'product_order');
		$data['product'] = get_any_table_row(array('product_id' => $data['order']['product_id']), 'product');

		$data['track'] = get_any_table_array(array('item_id' => $id), 'track_order');

		$this->load->view('admin/track-order', $data);
	}

	function allUser($data=false)
	{
		$data['all_users'] = get_any_table_array(array('user_type' => 'MEMBER'), 'users');
		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');
		$this->load->view('admin/all-users', $data);

	}

	function accSetting()
	{	
		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');
		$this->load->view('admin/acc-setting', $data);
	}

	function updateProfile($data=false)
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		if ($post['password'] == '') {
			$update = array('name' => $post['name'], 'email' => $post['email'], 'phone_no' => $post['phone_no'], 'username' => $post['username']);
		} else {
			$update = array('name' => $post['name'], 'username' => $post['username'], 'email' => $post['email'], 'phone_no' => $post['phone_no'], 'password' => md5($post['password']));	
		}

		$where = array('id' => $this->session->userdata('user_id'));

		update_any_table($update, $where, 'users');
		// $response = array('status' => true);
		// echo encode($response);
		$this->session->set_flashdata('success', "Successfully update !");
		redirect('manage/accSetting');

	}

	public function editProduct($id)
	{
		// code...
		$data['colors'] = get_any_table_array(array('name' => 'color'), 'attributes');
		$data['sizes'] = get_any_table_array(array('name' => 'size'), 'attributes');

		$user_id = $this->session->userdata('user_id');
		$data['user'] = get_any_table_row(array('id' => $user_id), 'users');

		$data['product'] = get_any_table_row(array('id' => $id), 'product');

	    $this->load->view('admin/edit-product', $data);
	}

	function doEditProduct($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>";

		$update = array('name' => $post['name'], 'category' => $post['category'], 'price' => $post['price'], 'stock' => $post['stock']);
		$where = array('id' => $post['id']);

		update_any_table($update, $where, 'product');

		$this->session->set_flashdata('success', 'Product Successfully Update !');
		redirect('manage/allProduct');
	}


}
