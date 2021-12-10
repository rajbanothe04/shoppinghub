<?php
class User_model extends CI_model
{

	// public function __construct()   
	// {
	// 	$this->db2 = $this->load->database('db2', true); 
	// }


	public function register_user($user)
	{
		$this->db->insert('tbl_customer', $user);
		// echo ($this->db->last_query());
		// exit;
		// $this->db2->insert('tbl_customer', $user);
	}

	public function login_user($email, $pass)
	{
		//$email,$pass
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->where('user_email', $email);
		$this->db->where('user_password', $pass);

		if ($query = $this->db->get()) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function email_check($email)
	{

		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->where('user_email', $email);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function get_user_info($id)
	{
		$query = $this->db->select("ur.id, ur.name, ur.uname, ur.pword,co.countryname,st.statename,ct.cityname,ur.zip,ur.gender,ur.file")
			->from("tbl_customer as ur")
			->join("country as co", "ur.country = co.id", "left")
			->join("state as st", "st.id = ur.state", "left")
			->join("city as ct", "ct.id = ur.city", "left")
			->where("ur.id", $id)
			->get();
		// echo "<pre>";
		// print_r($query->result());
		// echo "</pre>";
		// exit;
		return $query->result()[0];   // to remove [0] array
	}
	public function user_profile($id)
	{
		$query = $this->db
			->select('*')
			->where('id', $id)
			->get('tbl_customer');
		// echo "<pre>";
		// print_r($query->result()[0]);
		// echo "</pre>";
		// exit;
		return $query->result()[0];
	}
	public function user_update($id, array $post)
	{
		return $this->db
			->where('id', $id)
			->update('tbl_customer', $post);
	}
	public function img_path($u_id)
	{
		$q = $this->db
			->select('file')
			->where('id', $u_id)
			->get('tbl_customer');
		return $q->result()[0];
		// echo "<pre>";
		// print_r($q->result());
		// echo "</pre>";
		// exit;
	}
}