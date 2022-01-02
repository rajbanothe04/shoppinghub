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
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/order', $service_data);
	}
	public function submit_service()
	{
		$id = $this->input->post('service', true);
		$data['no_of_image'] = $this->input->post('no_of_image');
		$data['get_details'] = $this->service_public_model->get_service_attribute($id);
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/custome', $data);
	}
	public function submit_custom_order()
	{

		$att_contents = $this->input->post('attribute');
		$data['id']      = $this->input->post('ser_id');
		$data['name']    = $this->input->post('ser_name');
		$data['price']   = $this->input->post('total');
		$data['qty']     = $this->input->post('no_of_image');
		$data['options'] = $att_contents;

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
		$data['grand_tot']        = $this->input->post('grand-tot');
		$data['dis_type']         = $this->input->post('dis-type');
		// print_r($data);
		// exit;
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/place_order', $data);
	}
	public function save_details()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('shipping_name', 'Shipping Name', 'required');
		$this->form_validation->set_rules('shipping_email', 'Shipping Email', 'required');
		$this->form_validation->set_rules('shipping_address', 'Shipping Address', 'required');
		$this->form_validation->set_rules('shipping_city', 'Shipping City', 'required');
		$this->form_validation->set_rules('shipping_country', 'Shipping Country', 'required');
		$this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'required');
		$this->form_validation->set_rules('shipping_zipcode', 'Shipping Zipcode', 'required');
		$this->form_validation->set_rules('card_number', 'Card Number', 'required');
		$this->form_validation->set_rules('exp_month', 'Exp Month', 'required');
		$this->form_validation->set_rules('cvv', 'CVV', 'required');
		$this->form_validation->set_rules('exp_year', 'Exp Year', 'required');

		$shipp_data                     = array();
		$shipp_data['user_id']      = $this->session->userdata('user_id');
		$shipp_data['email']   = $this->input->post('shipping_email');
		$shipp_data['name']    = $this->input->post('shipping_name');
		$shipp_data['address'] = $this->input->post('shipping_address');
		$shipp_data['city']    = $this->input->post('shipping_city');
		$shipp_data['country'] = $this->input->post('shipping_country');
		$shipp_data['phone']   = $this->input->post('shipping_phone');
		$shipp_data['zipcode'] = $this->input->post('shipping_zipcode');
		$shipp_data['order_total']      = $this->input->post('sub-tot');
		$shipp_data['disc_amount']      = $this->input->post('disc-amount');
		$shipp_data['grand_tot']        = $this->input->post('grand-tot');
		$shipp_data['dis_type']         = $this->input->post('dis-type');
		$id        						= $this->session->userdata('user_id');
		$total   				        = $this->input->post('grand-tot');
		$card_no        				= $this->input->post('card_number');
		$cvv        					= $this->input->post('cvv');
		$exp_month         				= $this->input->post('exp_month');
		$exp_year         				= $this->input->post('exp_year');

		$payment_id = $this->service_public_model->verify_card_details($id, $card_no, $cvv, $exp_month, $exp_year, $total);

		if ($this->form_validation->run() == TRUE){
			$shipp_data['payment_id']      = $payment_id;
			$result = $this->service_public_model->save_user_details($shipp_data);

			if ($result) {
				$this->session->set_userdata('payment_id', $payment_id);
				redirect('service_public/save_order');
			} else {
				$this->session->set_flashdata('message', 'Order Failed');
				redirect('home/customer_shipping');
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			redirect('service_public/place_order');
		}
	}
	public function save_order()
	{
		$payId = $this->session->userdata('payment_id');

		$order_total = $this->service_public_model->get_order_disc_payID($payId);

		if ($order_total) {
			$odata                = array();
			foreach ($order_total as $odtotal) {
				$odata['user_id'] = $this->session->userdata('user_id');
				$odata['payment_id']  = $payId;
				$odata['order_total'] = $odtotal->order_total;
				$odata['disc_amount'] = $odtotal->disc_amount;
				$odata['dis_type']    = $odtotal->dis_type;
				$odata['grand_tot']   = $odtotal->grand_tot;
			}
			$order_id = $this->service_public_model->save_order_info($odata);
			$myoddata = $this->cart->contents();

			foreach ($myoddata as $oddatas) {
				$user_id           = $this->session->userdata('user_id');
				$ord_id            = $order_id;
				$ser_id            = $oddatas['id'];
				$attribute 		   = $oddatas['options'];
			}
			$result = $this->service_public_model->save_order_details_info($user_id, $ord_id, $ser_id, $attribute);
			if ($result) {
				$this->cart->destroy();
				redirect('service_public/success');
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			redirect('service_public_shipping');
		}
	}
	public function success()
	{
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/service_success');
	}
	public function my_account()
	{
		$id = $this->session->userdata('user_id');
		$data = array();
		$data['order_details'] = $this->service_public_model->get_my_order($id);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// __LINE__;
		// exit;
		$this->load->view('auth/service first_header');
		$this->load->view('auth/service_second_header');
		$this->load->view('service/page/my_account', $data);
	}
	public function get_order_details()
	{

		$id = $this->input->post('rowid');
		$data = $this->service_public_model->get_user_order_det_by_id($id);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		echo json_encode($data);
	}
}
