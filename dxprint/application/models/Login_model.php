<?php

class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'users';
    }

    function check_login($where)
	{
		$this->db->select('*');
        $this->db->where($where);
        $query = $this->db->get($this->users_table);

        if($query->num_rows() > 0){
        	$response = array( 'status' => true, 'data' => $query->row_array() ); 
        } else {
        	$response = array('status' => false, 'msg' => 'Its look like your username or password is incorrect.');
        }

        return $response;

	}
}
