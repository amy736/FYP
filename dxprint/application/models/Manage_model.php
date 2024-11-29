<?php

class Manage_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->users_table  = 'product';
    }

    function get_all_product()
    {
        $this->db->select('*');
        $this->db->order_by('product_id', 'asc');
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_product_by_category($id)
    {
        // code...
        $this->db->select('*');
        $this->db->where('category', $id);
        $this->db->order_by('product_id', 'asc');
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function get_all_order($data=false)
    {
        $this->db->select('*');
        $this->db->where('status !=', 'CART');
        $this->db->order_by('order_date', 'desc');
        $query = $this->db->get('product_order');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function get_order_log($id)
    {
        $this->db->select('*');
        $this->db->where('item_id', $id);
        $this->db->order_by('create_dt', 'desc');
        $query = $this->db->get('log');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
