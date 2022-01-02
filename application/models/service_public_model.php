<?php

class Service_Public_model extends CI_Model
{

	public function get_service_data()
	{
		$query = $this->db->select('*')
			->from('service')
			->where('ser_activation', 'Yes')
			->get();
		return $query->result();
	}
	public function get_service_attribute($id)
	{
		$info = $this->db->select('*')
			->from('service')
			->join('service_attribute', 'service_attribute.service_id=service.ser_id')
			->join('attribute', 'attribute.att_id=service_attribute.attribute_id')
			->where('service.ser_id', $id)
			->order_by('attribute.att_id asc')
			->get();
		// print_r($info->result());
		// exit;
		return $info->result();
	}

	public function verify_card_details($id, $card_no, $cvv, $exp_month, $exp_year, $total)
	{
		$multiCardDetail = array(
			'user_id' => $id,
			'card_number' => $card_no,
			'cvv' => $cvv,
			'exp_month' => $exp_month,
			'exp_year' => $exp_year
		);

		$cardTotal = array(
			'user_id' => $id,
			'total' => $total,
			'card_number' => $card_no,
			'cvv' => $cvv,
			'exp_month' => $exp_month,
			'exp_year' => $exp_year
		);
		$q = $this->db->where($multiCardDetail)
			->get('card');
		if ($q->num_rows()) {
			$this->db->insert('tbl_service_payment', $cardTotal);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		} else {
			return FALSE;
		}
	}
	public function save_user_details($data)
	{
		return $this->db->insert('tbl_user_order_details', $data);
	}
	public function get_order_disc_payID($pay_id)
	{

		$query = $this->db->select('*')
			->from('tbl_user_order_details')
			->where('payment_id', $pay_id)
			->get();
		return $query->result();
	}
	public function save_order_info($data)
	{
		$this->db->insert('tbl_service_order', $data);
		return $this->db->insert_id();
	}
	public function save_order_details_info($user_id, $ord_id, $ser_id, $attribute)
	{
		$DataArr = array();
		foreach ($attribute as $key => $val) {
			$arr_user_id = $user_id;
			$arr_ord_id = $ord_id;
			$arr_ser_id = $ser_id;
			$arr_att_id = $key;
			$arr_att_val = $val;
			$DataArr[] = "('$arr_user_id', '$arr_ord_id','$arr_ser_id', '$arr_att_id', '$arr_att_val')";
		}
		$query = "INSERT INTO tbl_order_service_details (u_id, order_id, service_id, attribute_id,attribute_value) values";
		$query .= implode(',', $DataArr);
		$result = $this->db->query($query);
		return $result;
	}
	public function get_my_order($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_service_order');
		$this->db->join('tbl_order_service_details', 'tbl_order_service_details.attribute_id=140');
		$this->db->join('service', 'service.ser_id=tbl_order_service_details.service_id');
		$this->db->where('tbl_service_order.user_id', $id);
		$this->db->order_by('tbl_order_service_details.order_id', 'asc');
		$this->db->group_by('tbl_order_service_details.order_id'); //for unique record as per defined like order_id
		$info = $this->db->get();
		// echo "<pre>";
		// print_r($info->result());
		// echo "</pre>";
		// __LINE__;
		// exit;
		return $info->result();
	}
	public function get_user_order_det_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_order_service_details');
		$this->db->where('tbl_order_service_details.order_id', $id);
		$this->db->join('attribute', 'attribute.att_id=tbl_order_service_details.attribute_id');
		$this->db->join('service', 'service.ser_id=tbl_order_service_details.service_id');
		$this->db->join('tbl_user_order_details', 'tbl_user_order_details.payment_id=tbl_order_service_details.order_id');
		$this->db->order_by('tbl_order_service_details.attribute_id', 'ASC');
		// $this->db->group_by('tbl_order_service_details.order_id', $id);
		$info = $this->db->get();
		return $info->result();
	}
}
