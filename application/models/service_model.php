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
	public function get_service_by_id($id)
	{
		$query = $this->db->select('*')
			->from('service')
			->where('ser_id', $id)
			->get();
		return $query->row();
	}
	// public function update_service($data, $id)
	// {
	// 	// print_r($data);
	// 	// exit;
	// 	$query = $this->db->set($data)
	// 		->where('ser_id', $id)
	// 		->update('service');
	// 	return $query;
	// }
	public function delete_service($id)
	{
		$query = $this->db->where('ser_id', $id)
			->delete('service');
		return $query;
	}

	//----------------------------------------------------------------------------------------------

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
			->where('att_id', $id)
			->get();
		return $result->row();
	}
	public function update_attribute($data, $id)
	{
		// print_r($data);
		// exit;
		$query = $this->db->set($data)
			->where('att_id', $id)
			->update('attribute');
		return $query;
	}
	public function delete_attribute($id)
	{
		// print_r($data);
		// exit;
		$query = $this->db->where('att_id', $id)
			->delete('attribute');
		return $query;
	}

	//--------------------------------------------------------------------------------------------------

	public function save_service_attribute($id, $data)
	{
		foreach ($data as $key1 => $val) {
			$arr['service_id'] = $id;
			$arr['attribute_id'] = $val;
			$query = $this->db->insert('service_attribute', $arr);
		}
		return $query;
	}
	public function get_service_attribute_by_id($id)
	{
		$query = $this->db->select('*')
			->from('service_attribute')
			->where('service_id', $id)
			->get();
		return $query->result();
	}
}