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
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/order', $service_data);
	}
	public function submit_service()
	{
		$id = $this->input->post('service', true);
		// print_r($id);
		// exit;
		$data['no_of_image'] = $this->input->post('no_of_image');
		$data['get_details'] = $this->service_public_model->get_service_attribute($id);
		// print_r($data);
		// exit;
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/custome', $data);
	}
	public function submit_custom_order()
	{
		// $data       = array();
		$att_contents = $this->input->post('attribute');
		// print_r($data);
		// foreach ($att_contents as $key => $value) {
		// 	$att_id = $key;
		// 	$att_value = $value;
		// 	$arr[] = "('$att_id', '$att_value')";
		// }
		// $dataArr = implode(',', $arr);

		$data['id']      = $this->input->post('ser_id');
		$data['name']    = $this->input->post('ser_name');
		$data['price']   = $this->input->post('total');
		$data['qty']     = $this->input->post('no_of_image');
		$data['options'] = $att_contents;
		// print_r($data);
		// exit;
		$this->cart->insert($data);
		redirect('service_public/cart');
		// switch (n) {
		// 	case free-text:
		// 	 if mma ===1 valid_email(else)
		// 	  break;
		// 	case label2:
	}
	public function cart()
	{
		$data                  = array();
		$data['cart_contents'] = $this->cart->contents();
		// print_r($data);
		// exit;
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/service_cart', $data);
	}
	public function remove_cart()
	{

		$data = $this->input->post('rowid');
		$this->cart->remove($data);
		redirect('service_public/cart');
	}
	public function service_shipping()
	{
		$data['cart_contents'] = $this->cart->contents();
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/service_shipping', $data);
	}
	public function place_order()
	{
		$data['order_total']      = $this->input->post('sub-tot');
		$data['disc_amount']      = $this->input->post('disc-amount');
		$data['grand_tot']        = $this->input->post('grand-tot',true);
		$data['dis_type']         = $this->input->post('dis-type');
		// print_r($data);
		// exit;
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/place_order', $data);
	}
	public function save_order()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('shipping_name', 'Shipping Name', 'trim|required');
		$this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('shipping_address', 'Shipping Address', 'trim|required');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|required');
		$this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'trim|required');
		$this->form_validation->set_rules('shipping_zipcode', 'Shipping Zipcode', 'trim|required');

		$shipp_data                     = array();
		$shipp_data['customer_id']      = $this->session->userdata('user_id');
		$shipp_data['shipping_email']   = $this->input->post('shipping_email');
		$shipp_data['shipping_name']    = $this->input->post('shipping_name');
		$shipp_data['shipping_address'] = $this->input->post('shipping_address');
		$shipp_data['shipping_city']    = $this->input->post('shipping_city');
		$shipp_data['shipping_country'] = $this->input->post('shipping_country');
		$shipp_data['shipping_phone']   = $this->input->post('shipping_phone');
		$shipp_data['shipping_zipcode'] = $this->input->post('shipping_zipcode');
		$shipp_data['order_total']      = $this->input->post('sub-tot');
		$shipp_data['disc_amount']      = $this->input->post('disc-amount');
		$shipp_data['grand_tot']        = $this->input->post('grand-tot');
		$shipp_data['dis_type']         = $this->input->post('dis-type');
		print_r($shipp_data);
		echo __LINE__;
		exit;


		if ($this->form_validation->run() == true) {
			$result = $this->hmodel->save_shipping_address($shipp_data);
			$this->session->set_userdata('shipping_id', $result);
			if ($result) {
				redirect('home/checkout');
			} else {
				$this->session->set_flashdata('message', 'Customer Shipping Fail');
				redirect('home/customer_shipping');
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			redirect('service_public/place_order');
		}
	}
}
