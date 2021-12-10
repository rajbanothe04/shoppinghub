<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Couponci extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('flate_coupon_model');
    }

    public function add_flate_coupon()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/page/add_flate_coupon', '', true);
        $this->load->view('admin/master', $data);
    }
    public function manage_flate_coupon()
    {
        $data                = array();
        $data['all_flate_coupon'] = $this->flate_coupon_model->getall_flate_coupon();
        // print_r($data['all_flate_coupon']);
        // exit();
        $data['maincontent'] = $this->load->view('admin/page/manage_flate_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function save_flate_coupon()
    {
        // $data = $this->input->post();

        // print_r($data);
        // exit();
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        $this->form_validation->set_rules('dis_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_type', 'Disc Type', 'required');
        $this->form_validation->set_rules('disc_amount', 'Disc Amount', 'required');
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
            $result = $this->flate_coupon_model->save_flt_coupon($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Inseted Sucessfully');
                redirect('couponci/manage_flate_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Inserted Failed');
                redirect('couponci/add_flate_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('couponci/add_flate_coupon');
        }
    }
    
}
