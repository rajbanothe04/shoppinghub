<?php

class Coupon_model extends CI_Model
{
    public function save_coupon($data)
    {
        return $this->db->insert('tbl_coupon', $data);
    }
    public function getall_coupon()
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $info = $this->db->get();
        // print_r($info->result());
        // exit;
        return $info->result();
    }
}
