<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Couponci extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('gift_coupon_model');
    }

    public function add_gift_coupon()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/page/add_gift_coupon', '', true);
        $this->load->view('admin/master', $data);
    }
    public function manage_gift_coupon()
    {
        $data                = array();
        $data['all_gift_coupon'] = $this->gift_coupon_model->getall_gift_coupon();
        // print_r($data['all_flate_coupon']);
        // exit();
        $data['maincontent'] = $this->load->view('admin/page/manage_gift_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function save_gift_coupon()
    {
        // $data = $this->input->post();

        // print_r($data);
        // exit();
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        // $this->form_validation->set_rules('disc_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_amount', 'Disc Type', 'required');
        $this->form_validation->set_rules('dis_amount_left', 'Disc Type', 'disc_amount');
        $this->form_validation->set_rules('discount_category', 'Discount Category', 'trim|required');
        $this->form_validation->set_rules('dis_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('dis_end_date', 'End Date', 'required');

        if ($this->form_validation->run() == true) {
            $data['code'] = $this->input->post('code');
            $data['disc_name'] = $this->input->post('disc_name');
            $data['disc_amount'] = $this->input->post('disc_amount');
            $data['disc_amount_left'] = $this->input->post('disc_amount');
            $data['discount_category'] = $this->input->post('discount_category');
            $data['dis_start_date'] = $this->input->post('dis_start_date');
            $data['dis_end_date'] = $this->input->post('dis_end_date');
            // print_r($data);
            // exit();
            unset($data['submit']);
            $result = $this->gift_coupon_model->save_gift_coupon($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Inserted Sucessfully');
                redirect('couponci/manage_gift_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Not inserted');
                redirect('couponci/add_gift_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('couponci/add_gift_coupon');
        }
    }
    public function edit_gift_coupon($id)
    {
        $data                     = array();
        $data['gift_info_by_id'] = $this->gift_coupon_model->edit_gift_info($id);
        $data['maincontent']      = $this->load->view('admin/page/edit_gift_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function update_gift_by_id($id)
    {
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        // $this->form_validation->set_rules('disc_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_amount', 'Disc Type', 'required');
        $this->form_validation->set_rules('dis_amount_left', 'Disc Type', 'disc_amount');
        $this->form_validation->set_rules('discount_category', 'Discount Category', 'trim|required');
        $this->form_validation->set_rules('dis_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('dis_end_date', 'End Date', 'required');

        if ($this->form_validation->run() == true) {
            $data['code'] = $this->input->post('code');
            $data['disc_name'] = $this->input->post('disc_name');
            $data['disc_amount'] = $this->input->post('disc_amount');
            $data['disc_amount_left'] = $this->input->post('disc_amount');
            $data['discount_category'] = $this->input->post('discount_category');
            $data['dis_start_date'] = $this->input->post('dis_start_date');
            $data['dis_end_date'] = $this->input->post('dis_end_date');
            // print_r($data);
            // exit();
            // __LINE__;
            unset($data['submit']);
            $result = $this->gift_coupon_model->update_gift_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Updated Sucessfully');
                redirect('couponci/manage_gift_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Not Updated');
                redirect('couponci/edit_gift_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('couponci/edit_gift_coupon');
        }
    }
    public function delete_gift_coupon($id)
    {
        $result = $this->gift_coupon_model->delete_gift_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Coupon Deleted Sucessfully');
            redirect('couponci/manage_gift_coupon');
        } else {
            $this->session->set_flashdata('message', 'Coupon Deleted Failed');
            redirect('couponci/manage_gift_coupon');
        }
    }
}