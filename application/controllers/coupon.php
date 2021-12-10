<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coupon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('coupon_model');
    }

    public function add_coupon()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/page/add_coupon', '', true);
        $this->load->view('admin/master', $data);
    }
    public function manage_coupon()
    {
        $data                = array();
        $data['all_coupon'] = $this->coupon_model->getall_coupon();
        // print_r($data['all_coupon']);
        // exit();
        $data['maincontent'] = $this->load->view('admin/page/manage_coupon',  $data, true);
        $this->load->view('admin/master', $data);
    }
    public function save_coupon()
    {
        // $data = $this->input->post();

        // print_r($data);
        // exit();
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        $this->form_validation->set_rules('dis_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_type', 'Disc Amount in %', 'required');
        $this->form_validation->set_rules('disc_amount', 'Disc Amount in %', 'required');
        // $this->form_validation->set_rules('coupon_description', 'Coupon Description', 'trim|required');
        $this->form_validation->set_rules('discount_category', 'Discount Category', 'trim|required');
        $this->form_validation->set_rules('no_of_uses', 'Number of uses', 'required');
        $this->form_validation->set_rules('dis_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('dis_end_date', 'End Date', 'required');

        if ($this->form_validation->run() == true) {
            $data = $this->input->post();
            // print_r($data);
            // exit();
            unset($data['submit']);
            $result = $this->coupon_model->save_coupon($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Inseted Sucessfully');
                redirect('coupon/manage_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Inserted Failed');
                redirect('couponci/add_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('couponci/add_coupon');
        }
    }
}
