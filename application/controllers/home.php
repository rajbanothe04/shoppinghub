<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hmodel');
        $this->load->model('gift_coupon_model');
        $this->load->model('disc_coupon_model');
        $this->load->helper('text');
    }
    public function index()
    {

        $this->load->model('hmodel');
        $data = $this->hmodel->get_all_product();
        // $array = [];
        // foreach ($data as $value) {
        // 	// print_r(json_decode(json_encode($value)));
        // 	$array[] = json_decode(json_encode($value), true);
        // }
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // exit();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('home', compact('data'));
    }
    public function single($id)
    {
        // echo "Raj";
        // exit();
        $data = array();
        $data['get_single_product'] = $this->hmodel->get_single_product($id);
        $this->load->view('page/single', $data);
    }
    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->hmodel->get_product_by_id($product_id);

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);

        $this->cart->insert($data);

        redirect('home/cart');
    }
    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('page/cart', $data);
    }
    public function customer_shipping()
    {
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('page/customer_shipping', $data);
    }
    public function save_shipping_address()
    {

        // $data                     = array();
        // // $data = ($this->input->post());
        // $data['customer_id']   = $this->session->userdata('user_id');
        // $data['order_total'] = $this->input->post('sub-tot');
        // $data['disc_amount'] = $this->input->post('disc-amount');
        // $data['grand_tot'] = $this->input->post('grand-tot');
        // $data['dis_type'] = $this->input->post('dis-type');
        // //  $this->cart->update($data);
        // $this->hmodel->save_coupon_code($data);

        // $data['cart_contents'] = $this->cart->contents();

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

        $this->form_validation->set_rules('shipping_name', 'Shipping Name', 'trim|required');
        // |is_unique[tbl_shipping.shipping_email]
        $this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'trim|required');
        $this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required');
        $this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|required');
        $this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'trim|required');
        $this->form_validation->set_rules('shipping_zipcode', 'Shipping Zipcode', 'trim|required');

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
            redirect('home/customer_shipping');
        }
    }
    public function checkout()
    {
        $data = array();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('page/checkout');
    }
    public function save_order()
    {
        $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');
        $shipid = $this->session->userdata('shipping_id');

        $order_total = $this->hmodel->get_coupon_disc($shipid);
        // print_r($order_total);
        // exit;
        // __LINE__;

        if ($this->form_validation->run() == true) {
            $payment_id           = $this->hmodel->save_payment_info($data);
            $odata                = array();
            foreach ($order_total as $odtotal) {
                $odata['customer_id'] = $this->session->userdata('user_id');
                $odata['shipping_id'] = $this->session->userdata('shipping_id');
                $odata['payment_id']  = $payment_id;
                $odata['order_total'] = $odtotal->order_total;
                $odata['disc_amount'] = $odtotal->disc_amount;
                $odata['dis_type']    = $odtotal->dis_type;
                $odata['grand_tot']   = $odtotal->grand_tot;
                // print_r($odata);
                // exit;
                // __LINE__;
                $order_id = $this->hmodel->save_order_info($odata);
            }
            $oddata = array();

            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {
                $oddata['customer_id']            = $this->session->userdata('user_id');
                $oddata['order_id']               = $order_id;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                // $oddata['order_total']            = $odtotal->order_total;
                // $oddata['disc_amount']            = $odtotal->disc_amount;
                // $oddata['dis_type']               = $odtotal->dis_type;
                // $oddata['grand_tot']              = $odtotal->grand_tot;

                $this->hmodel->save_order_details_info($oddata);
            }

            // if ($data['payment_type'] == 'paypal') {
            // }
            // if ($data['payment_type'] == 'cashon') {
            // }

            $this->cart->destroy();

            redirect('home/payment');
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('home/checkout');
        }
    }
    public function payment()
    {
        $data = array();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('page/payment');
    }

    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('home/cart');
    }
    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('home/cart');
    }
    public function my_order()
    {
        if ($this->session->userdata('user_id')) {
            $id = $this->session->userdata('user_id');
            $data = array();
            $data['order_details'] = $this->hmodel->get_cust_order_det($id);
            // echo "<pre>";
            // print_r($data['order_details']);
            // echo "</pre>";
            // exit;
            $this->load->view('inc/primary_header');
            $this->load->view('inc/secondary_header');
            $this->load->view('page/cust_order_details', $data);
        } else {
            return redirect('login');
        }
    }
    public function order_shipp_address()
    {

        $id = $this->input->post('rowid');

        // $data = array();
        $data = $this->hmodel->order_details($id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        // $this->load->view('inc/primary_header');
        // $this->load->view('inc/secondary_header');
        // $this->load->view('page/view_details', $data);
        echo json_encode($data);
    }
    public function discount_zone()
    {

        $data = array();
        $data1 = array();
        $discount = $this->input->post('coupon_code');

        $data = $this->gift_coupon_model->get_coupon_gift($discount);
        $data1 = $this->disc_coupon_model->get_coupon_discount($discount);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode($data1);
        }
    }
    public function update_gift_data()
    {
        $disc['id'] = $this->input->post('coupon_id');
        $disc['amount_left'] = $this->input->post('coupon_amt');
        // print_r($disc);
        // exit();
        $updated_disc = $this->gift_coupon_model->update_gift_coupon($disc);
        echo json_encode($updated_disc);
    }
    public function update_disc_data()
    {
        $disc = $this->input->post('coupon_id');
        // print_r($disc);
        // exit();
        $result = $this->disc_coupon_model->update_disc_coupon($disc);
        echo json_encode($result);
    }

    public function ord_details()
    {
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('inc/primary_header');
        $this->load->view('inc/secondary_header');
        $this->load->view('page/product_det_coupon', $data);
    }
    // public function check_coupon()
    // {
    //     $data = array();
    //     $code = $this->input->post('coupon');
    //     $data['rowid'] = $this->input->post('rowid');
    //     $result = $this->gift_coupon_model->get_coupon_discount($code);
    // $total=$this->cart->total();
    // $coupon = $result->disc_amount;
    // print_r($coupon);
    // exit;
    // if ($result) {
    //     if ($result->disc_type == 'amount') {


    //     } 
    //     else if ($result->disc_type == 'percent') {
    //     }
    // } else {
    //     return false;
    // }

    // $this->cart->update($data);
    // redirect('home/cart');
    // }
}