<?php

class Disc_Coupon_Model extends CI_Model
{
    public function save_disc_coupon($data)
    {
        return $this->db->insert('tbl_disc_coupon', $data);
    }
    public function getall_disc_coupon()
    {
        $this->db->select('*');
        $this->db->from('tbl_disc_coupon');
        $info = $this->db->get();
        // print_r($info->result());
        // exit;
        return $info->result();
    }
    public function get_coupon_discount($c_code)
    {
        $now = date('Y-m-d');
        $multipleWhere = ['code' => $c_code, 'disc_end_date >=' => $now, 'no_of_used < no_of_uses'];

        $this->db->select('*');
        $this->db->from('tbl_disc_coupon');
        $this->db->where($multipleWhere);
        $info = $this->db->get()->row();
        // print_r($info->result());
        // exit;
        return $info;
    }
    public function update_disc_coupon($d_data)
    {

        $this->db->set('no_of_used', 'no_of_used + 1', FALSE);
        $this->db->where('id', $d_data);
        return $this->db->update('tbl_disc_coupon');
    }
    public function edit_disc_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_disc_coupon');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }
    public function update_disc_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_disc_coupon', $data);
    }
    public function delete_disc_info($id)
    {
        // echo $id;
        // exit;
        $this->db->where('id', $id);
        return $this->db->delete('tbl_disc_coupon');
    }
}