<?php

class Service_model extends CI_Model
{

	public function service_data()
	{
		$query = $this->db->select('*')
			->from('service')
			->get();
		return $query->result();
	}

	public function save_service($data)
	{
		$this->db->insert('service', $data);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}

	public function get_attribute_data()
	{
		$query = $this->db->select('*')
			->from('attribute')
			->get();
		return $query->result();
	}
	public function save_attribute($data)
	{
		return $this->db->insert('attribute', $data);
	}
	public function get_attribute_data_by_id($id)
	{
		$result = $this->db->select('*')
			->from('attribute')
			->get();
		return $result->row();
	}
	public function save_service_attribute($id, $Data)
	{
		foreach ($Data as $key1 => $val) {
			$arr['service_id'] = $id;
			$arr['attribute_id'] = $val;
			$query = $this->db->insert('service_attribute', $arr);
		}
		return $query;
	}
}