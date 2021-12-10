<?php

class Hmodel extends CI_Model
{

	public function get_all_product()
	{
		$query = $this->db->select('*')
			->from('tbl_product')
			->get();
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		// exit;
		return $query->result();
	}
	public function get_single_product($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('product_id ', $id);
		$info = $this->db->get();
		// echo "<pre>";
		// print_r($info->result());
		// echo "</pre>";
		// exit;
		return $info->row();
	}
	// public function get_all_category()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_category');
	// 	$this->db->where('publication_status', 1);
	// 	$info = $this->db->get();
	// 	return $info->result();
	// }
	public function get_product_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
		$this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
		$this->db->order_by('tbl_product.product_id', 'DESC');
		$this->db->where('tbl_product.publication_status', 1);
		$this->db->where('tbl_product.product_id', $id);
		$info = $this->db->get();
		return $info->row();
	}
	public function save_coupon_code($data)
	{
		$this->db->insert('tbl_discount_cal', $data);
		return true;
	}

	public function save_shipping_address($data)
	{
		$this->db->insert('tbl_shipping', $data);
		return $this->db->insert_id();
	}

	public function get_coupon_disc($shipid)
	{
		$this->db->select('*');
		$this->db->from('tbl_shipping');
		$this->db->where('shipping_id',$shipid);
		$result = $this->db->get();
		return $result->result();
	}
	
	public function save_payment_info($data)
	{
		$this->db->insert('tbl_payment', $data);
		return $this->db->insert_id();
	}
	
	

	public function save_order_info($data)
	{
		$this->db->insert('tbl_order', $data);
		return $this->db->insert_id();
	}

	public function save_order_details_info($oddata)
	{
		$this->db->insert('tbl_order_details', $oddata);
	}

	public function get_cust_order_det($cust_id)
	{

		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_customer', 'tbl_customer.id = tbl_order.customer_id');
		$this->db->join('tbl_shipping', 'tbl_shipping.shipping_id = tbl_order.shipping_id');
		$this->db->join('tbl_order_details', 'tbl_order_details.order_id = tbl_order.order_id');
		$this->db->join('tbl_product', 'tbl_product.product_id = tbl_order_details.product_id');
		$this->db->where('tbl_order.customer_id', $cust_id);
		$result = $this->db->get();
		// echo "<pre>";
		// print_r($result->result());
		// echo "</pre>";
		// exit;
		return $result->result();
	}
	public function order_details($o_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_customer', 'tbl_customer.id = tbl_order.customer_id');
		$this->db->join('tbl_shipping', 'tbl_shipping.shipping_id = tbl_order.shipping_id');
		$this->db->join('tbl_order_details', 'tbl_order_details.order_id = tbl_order.order_id');
		$this->db->join('tbl_product', 'tbl_product.product_id = tbl_order_details.product_id');
		$this->db->where('tbl_order_details.order_id', $o_id);
		$result = $this->db->get()->row();
		// echo "<pre>";
		// print_r($result->result());
		// echo "</pre>";
		// exit;
		return $result;
	}
}