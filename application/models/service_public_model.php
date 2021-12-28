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
}