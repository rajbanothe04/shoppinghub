<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service_model');
	}
	public function index()
	{
		$data['all_services'] = $this->service_model->service_data();
		// print_r($data['all_services']);
		// exit;
		$data['maincontent'] = $this->load->view('service/admin/service_dtls', $data, true);
		$this->load->view('admin/master', $data);
	}
	public function add_service()
	{
		$data['all_attribute'] = $this->service_model->get_attribute_data();
		$data['maincontent'] = $this->load->view('service/admin/add_service', $data, true);
		$this->load->view('admin/master', $data);
	}
	public function save_service()
	{
		$attrData = $this->input->post('selected_attribute');
		// print_r($attrData);
		// exit;
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('ser_name', 'Service Name', 'required|is_unique|min_length[3]|max_length[100]');
		$data['ser_name'] = $this->input->post('ser_name');
		$data['ser_description'] = $this->input->post('ser_description');
		$data['ser_ternaround'] = $this->input->post('ser_ternaround');
		$data['ser_type'] = $this->input->post('ser_type');
		$data['ser_cust_price'] = $this->input->post('ser_cust_price');
		$data['ser_qty'] = $this->input->post('ser_qty');
		$data['ser_activation'] = $this->input->post('ser_activation');

		// unset($data['submit']);
		if ($this->form_validation->run() == true) {
			$ser_id = $this->service_model->save_service($data);
		}
		$ser_attr_result = $this->service_model->save_service_attribute($ser_id, $attrData);
		if ($ser_attr_result) {
			$this->session->set_flashdata('message', "Service added successfully");
			return redirect('service');
		} else {
			$this->session->set_flashdata('message', "Service added Failed");
			return redirect('service/add_service');
		}
	}




	public function manage_attribute()
	{
		$data['all_attribute'] = $this->service_model->get_attribute_data();
		// print_r($data['all_attribute']);
		// exit;
		$data['maincontent'] = $this->load->view('service/admin/attribute_dtls', $data, true);
		$this->load->view('admin/master', $data);
	}
	public function add_attribute()
	{
		$data['maincontent'] = $this->load->view('service/admin/add_attribute', '', true);
		$this->load->view('admin/master', $data);
	}
	public function save_attribute()
	{
		$data = $this->input->post();
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('att_name', 'Attribute Name', 'required|is_unique|min_length[3]');
		// $data['att_name'] = $this->input->post('att_name');
		// $data['att_type'] = $this->input->post('att_type');
		// $data['att_values'] = $this->input->post('att_values');
		// $data['att_fieldsize'] = $this->input->post('att_fieldsize');
		// $data['att_custprice'] = $this->input->post('att_custprice');
		// $data['mandatory'] = $this->input->post('mandatory');

		unset($data['submit']);

		if ($this->service_model->save_attribute($data)) {
			$this->session->set_flashdata('message', "Attribute added successfully");
			return redirect('service/manage_attribute');
		} else {
			$this->session->set_flashdata('message', "Attribute added Failed");
			return redirect('service/add_attribute');
		}


		// print_r($data);
		// exit;
	}
	public function edit_attribute($id)
	{
		$data['get_attribute_data'] = $this->service_model->get_attribute_data_by_id($id);
		$data['maincontent'] = $this->load->view('service/admin/edit_attribute', $data, true);
		$this->load->view('admin/master', $data);
	}
}