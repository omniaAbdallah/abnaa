<?php

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');


        // omnia
        $this->load->model('Public_relations/website/about_us/About_us_model', 'about_us');
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'Shoraka');
        $this->load->model('main_data/Model_main_data');
        $this->load->model('main_data/Model_slide');
        $this->load->model('main_data/Model_data_web');

        $this->pages_data = $this->about_us->pages_web();
        $this->web_shoraka = $this->Shoraka->selet_webshoraka();
        $this->soeials=$this->Model_main_data->select_all_soeial();
        $this->main_data=$this->Model_main_data->select_main_data();
        $this->main_data_slide= $this->Model_slide->selet_all();
        $this->web_display = $this->Model_data_web->select();

        $this->load->model('osr/Family_model');
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }

    public function family_register()/*/osr/Web/family_register*/
    {
        //$this->load->model("registration_models/Family_model");
        $data['national_id_array'] = $this->Family_model->select_search_key('family_setting', 'type', 1);
        $data['marital_status_array'] = $this->Family_model->select_search_key('family_setting', 'type', 4);
        //$data["relationships"] = $this->Family_model->selectByType('family_setting', 'type', 34, 41);
        $data['all_city'] = $this->Family_model->select_type(3);
//        if ($this->input->post('mother_national_num_chik')) {
//            $arr["in"] = $this->Family_model->select_search_key('basic', 'mother_national_num', $this->input->post('mother_national_num_chik'));
//            $this->load->view('web/registration_views/family_views/load', $arr);
//        }
        if ($this->input->post('ADD') == 'ADD') {

            $this->Family_model->insert_new_register($this->input->post('mother_national_num'));
            $this->messages('success', 'تم تسجيل الأسره بنجاح');
        }
        $data['cond'] = $this->Family_model->display_files(1);
        $data['accept'] = $this->Family_model->display_files(3);
        $data['file'] = $this->Family_model->display_files(2);
        $data['subview'] = 'osr/family_views/family_register';//web/registration_views
        $this->load->view('web_home_index', $data);
    }

    public function GetArea()
    {
        if ($this->input->post('get_sub_id')) {
            $id = $this->input->post('get_sub_id');
            $data["records_row"] = $this->Family_model->select_places($id);
            $this->load->view('osr/family_views/load_places', $data);
        }
    }
}