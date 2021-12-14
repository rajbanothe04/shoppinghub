<?php
class Registration extends CI_Controller
{
    public function index()
    {

        $this->load->model('registermodel');
        $country_list = $this->registermodel->loadCountry();
        // echo "<pre>";
        // print_r($country_list);
        // exit;
        foreach ($country_list as $country) {
            // $arr = get_object_vars($country);
            // $countries[$arr['id']] = $arr['countryname'];
            $countries[""] = 'Select Country';   //created variable as a countries
            $countries[$country->id] = $country->countryname;
        }

        // echo "<pre>";
        // print_r($countries);
        // echo "</pre>";
        // exit;

        $this->load->view('page/primary_header');
        $this->load->view('page/secondary_header');
        $this->load->view('auth/register', compact('countries'));
    }

    public function getState()
    {
        $country_id = $this->input->post('country_id');
        $this->load->model('registermodel');
        $state_list = $this->registermodel->loadState($country_id);
        // echo "<pre>";
        // print_r($state_list);
        // echo "</pre>";
        // exit;
        echo json_encode($state_list);
    }
    public function getCity()
    {
        $city_id = $this->input->post('state_id');
        $this->load->model('registermodel');
        $city_list = $this->registermodel->loadCity($city_id);
        echo json_encode($city_list);
    }


    public function user_registration()
    {
        $post = $this->input->post();
        // echo '<pre>' . print_r($post) . '</pre>';
        // $this->load->library('upload');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('uname', 'Email', 'trim|required|is_unique[tbl_customer.uname]|valid_email');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Conform', 'trim|required|matches[pword]');
        $this->form_validation->set_rules('country', 'Country Name', 'required');
        $this->form_validation->set_rules('state', 'State Name', 'callback_validate_selection');
        // $this->form_validation->set_message('validate_selection', 'The State Name field is required.');

        $this->form_validation->set_rules('city', 'City Name', 'callback_validate_selection');
        // $this->form_validation->set_message('validate_selection', 'The City Name field is required.');
        $this->form_validation->set_rules('zip', 'ZipCode', 'required|numeric|min_length[6]|max_length[6]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        // $this->form_validation->set_rules('file', 'File', 'required|max_size[5048]');

        $config = [
            'upload_path' => './uploads',
            'allowed_types' => 'jpg|jpeg|png|gif',

        ];
        $this->load->library('upload', $config);
        // $this->upload->initialize($config); //We can also initialize config like this
        if ($this->form_validation->run() == true && $this->upload->do_upload('file')) {
            $post = $this->input->post();
            $data = $this->upload->data();
            unset($post['submit']); //to remove the submit from array 
            unset($post['confirm_password']); //to remove the Password confirmation from array 
            // echo "<pre>";
            // print_r($data);
            // exit;
            $image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);

            $post['file'] = $image_path;

            $this->load->model('registermodel');
            if ($this->registermodel->user_register($post)) {
                $this->session->set_flashdata('feedback', "Form Submitted successfully, PLease login");
            } else {
                $this->session->set_flashdata('feedback', "Form Submition failed");
            }
            // $this->load->view('public/admin_login');
            return redirect('login');
        } else {


            // echo "<pre>";
            // print_r($post);
            // exit;
            // $data = $this->upload->data();
            // echo validation_errors();
            // exit;
            $this->load->model('registermodel');
            $country_list = $this->registermodel->loadCountry();

            foreach ($country_list as $country) {
                $countries[""] = 'Select Country';
                $countries[$country->id] = $country->countryname;
            }
            $this->load->view('page/primary_header');
            $this->load->view('page/secondary_header');
            $this->load->view('auth/register', compact('countries'));
            // echo "Register Failed";
        }
    }

    function validate_selection($selection)
    {
        if ($selection <= 0) {
            $this->form_validation->set_message('validate_selection', 'The {field} is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function profile_details()
    {
        $this->load->view('page/primary_header');
        $this->load->view('page/secondary_header');
        $this->load->view('auth/user_profile');
    }
}