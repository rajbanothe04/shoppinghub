<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_Public extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service_public_model');
	}
	public function index()
	{
		$service_data['service_content'] = $this->service_public_model->get_service_data();
		// print_r($service_data);
		// exit;
		$this->load->view('auth/first_header');
		$this->load->view('auth/second_header');
		$this->load->view('service/page/order', $service_data);
	}
	public function submit_service()
	{
		$id = $this->input->post('service');
		// print_r($id);
		// exit;
		$data['no_of_image'] = $this->input->post('no_of_image');
		$data['get_details'] = $this->service_public_model->get_service_attribute($id);
		// print_r($data);
		// exit;
		$this->load->view('auth/first_header');
		$this->load->view('auth/second_header');
		$this->load->view('service/page/custome', $data);
	}
	public function submit_custom_order()
	{
		$data = $this->input->post();
		print_r($data);
		exit;
	}
}