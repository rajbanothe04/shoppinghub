<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Disc_Coupon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('disc_coupon_model');
    }

    public function add_disc_coupon()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/page/add_disc_coupon', '', true);
        $this->load->view('admin/master', $data);
    }
    public function manage_discount_coupon()
    {
        $data                = array();
        $data['all_disc_coupon'] = $this->disc_coupon_model->getall_disc_coupon();
        // print_r($data['all_coupon']);
        // exit();
        $data['maincontent'] = $this->load->view('admin/page/manage_disc_coupon',  $data, true);
        $this->load->view('admin/master', $data);
    }
    public function save_disc_coupon()
    {
        // $data = $this->input->post();

        // print_r($data);
        // exit();
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        $this->form_validation->set_rules('disc_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_amount', 'Disc Amount', 'required');
        $this->form_validation->set_rules('no_of_uses', 'No of Uses', 'required');
        $this->form_validation->set_rules('discount_category', 'Discount Category', 'trim|required');
        $this->form_validation->set_rules('disc_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('disc_end_date', 'End Date', 'required');

        if ($this->form_validation->run() == true) {
            $data['code'] = $this->input->post('code');
            $data['disc_name'] = $this->input->post('disc_name');
            $data['disc_amount'] = $this->input->post('disc_amount');
            $data['no_of_uses'] = $this->input->post('no_of_uses');
            $data['discount_category'] = $this->input->post('discount_category');
            $data['disc_start_date'] = $this->input->post('disc_start_date');
            $data['disc_end_date'] = $this->input->post('disc_end_date');
            // print_r($data);
            // exit();
            // __LINE__;
            unset($data['submit']);
            $result = $this->disc_coupon_model->save_disc_coupon($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Inseted Sucessfully');
                redirect('disc_coupon/manage_discount_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Inserted Failed');
                redirect('disc_coupon/add_disc_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('disc_coupon/add_disc_coupon');
        }
    }
    public function edit_disc_coupon($id)
    {
        $data                     = array();
        $data['disc_info_by_id'] = $this->disc_coupon_model->edit_disc_info($id);
        $data['maincontent']      = $this->load->view('admin/page/edit_disc_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function update_disc_by_id($id)
    {
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        $this->form_validation->set_rules('disc_name', 'Disc Name', 'trim|required');
        $this->form_validation->set_rules('disc_amount', 'Disc Amount', 'required');
        $this->form_validation->set_rules('no_of_uses', 'No of Uses', 'required');
        $this->form_validation->set_rules('discount_category', 'Discount Category', 'trim|required');
        $this->form_validation->set_rules('disc_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('disc_end_date', 'End Date', 'required');

        if ($this->form_validation->run() == true) {
            $data['code'] = $this->input->post('code');
            $data['disc_name'] = $this->input->post('disc_name');
            $data['disc_amount'] = $this->input->post('disc_amount');
            $data['no_of_uses'] = $this->input->post('no_of_uses');
            $data['discount_category'] = $this->input->post('discount_category');
            $data['disc_start_date'] = $this->input->post('disc_start_date');
            $data['disc_end_date'] = $this->input->post('disc_end_date');
            // print_r($data);
            // exit();
            // __LINE__;
            unset($data['submit']);
            $result = $this->disc_coupon_model->update_disc_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Coupon Inseted Sucessfully');
                redirect('disc_coupon/manage_discount_coupon');
            } else {
                $this->session->set_flashdata('message', 'Coupon Inserted Failed');
                redirect('disc_coupon/edit_disc_coupon');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('disc_coupon/edit_disc_coupon');
        }
    }
    public function delete_disc_coupon($id)
    {
        $result = $this->disc_coupon_model->delete_disc_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Coupon Deleted Sucessfully');
            redirect('couponci/manage_gift_coupon');
        } else {
            $this->session->set_flashdata('message', 'Coupon Deleted Failed');
            redirect('couponci/manage_gift_coupon');
        }
    }
}