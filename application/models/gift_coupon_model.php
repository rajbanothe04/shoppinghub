<?php

class Gift_coupon_model extends CI_Model
{
    public function save_gift_coupon($data)
    {
        return $this->db->insert('tbl_gift_coupon', $data);
    }
    public function getall_gift_coupon()
    {
        $this->db->select('*');
        $this->db->from('tbl_gift_coupon');
        $info = $this->db->get();
        // print_r($info->result());
        // exit;
        return $info->result();
    }

    public function get_coupon_gift($c_code)
    {

        $now = date('Y-m-d');
        $multipleWhere = ['code' => $c_code, 'disc_amount_left >=' => 0, 'disc_amount_left <= disc_amount', 'dis_end_date >=' => $now];

        $this->db->select('*');
        $this->db->from('tbl_gift_coupon');
        $this->db->where($multipleWhere);
        $info = $this->db->get()->row();
        // print_r($info->result());
        // exit;
        return $info;
    }
    public function update_gift_coupon($d_data)
    {

        $value = array('disc_amount_left' => $d_data['amount_left']);
        // print_r($value);
        // exit();
        $this->db->set('no_of_uses', 'no_of_uses+1', FALSE);
        $this->db->where('id', $d_data['id']);
        $this->db->update('tbl_gift_coupon', $value);
        return true;
    }
    public function edit_gift_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_gift_coupon');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }
    public function update_gift_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_gift_coupon', $data);
    }
    public function delete_gift_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_gift_coupon');
    }
}