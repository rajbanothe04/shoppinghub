<?php
class Loginmodel extends CI_Model
{
	public function login_valid($username, $password)
	{
		// $this->db;        //we used object of database because database has been Autoloaded  in autoload.php 
		// $q = $this->db->query('select * from users where username = $username and password = $password');
		// count($q->row());
		$q = $this->db->where(['uname' => $username, 'pword' => $password])
			->get('tbl_customer'); //this is same like select * from users where username = $username and password = $password'
		if ($q->num_rows()) {  // (!$q == NULL)
			// echo "<pre>";
			// print_r($q->row());
			// exit;
			return $q->row()->id;
			return TRUE;
		} else {
			return FALSE;
		}
	}
	// 	public function __construct()
	// 	{
	// 		parent::__construct();					// for database load
	// 		$this->load->database();
	// 	}         

}