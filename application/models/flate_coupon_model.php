<?php

class Flate_coupon_model extends CI_Model
{
    public function save_flt_coupon($data)
    {
        return $this->db->insert('tbl_coupon', $data);
    }
    public function getall_flate_coupon()
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $info = $this->db->get();
        // print_r($info->result());
        // exit;
        return $info->result();
    }

    public function get_coupon_discount($c_code)
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $this->db->where('code', $c_code);
        $info = $this->db->get()->row();
        // print_r($info->result());
        // exit;
        return $info;
    }
}