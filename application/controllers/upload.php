<?php defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('upload/primary_header');
        $this->load->view('upload/secondary_header');
        $this->load->view('upload/index_view');
    }

    public function json()
    {
        $options = [
            'script_url' => site_url('upload/json'),
            'upload_dir' => APPPATH . '../uploads/files/',
            'upload_url' => site_url('uploads/files/')
        ];

        // echo "<pre>";
        // print_r($options);
        // echo "</pre>";
        // exit();
        $this->load->library('UploadHandler', $options);
    }
}