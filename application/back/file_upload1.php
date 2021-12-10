<?php
defined('BASEPATH') or exit('No direct script access allowed');
class File_upload  extends CI_Controller
{
  public function index()
  {
    $this->load->view('inc/primary_header');
    $this->load->view('inc/secondary_header');
    $this->load->view('page/upload');
  }

  public function imageUploadPost()
  {
    $config['upload_path']   = './uploads/uploadfile/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = 6024;


    $this->load->library('upload', $config);
    $this->upload->do_upload('file');


    print_r('Image Uploaded Successfully.');
    exit;
  }
}