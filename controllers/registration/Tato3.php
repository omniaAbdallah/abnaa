<?php

class Tato3 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('main_data/Model_main_data');
        $this->load->model('main_data/Model_data_web');
        $this->load->model('Public_relations/website/about_us/About_us_model', 'about_us');
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'Shoraka');
        $this->pages_data = $this->about_us->pages_web();
        $this->web_shoraka = $this->Shoraka->selet_webshoraka();
        $this->soeials = $this->Model_main_data->select_all_soeial();
        $this->main_data = $this->Model_main_data->select_main_data();
        $this->web_display = $this->Model_data_web->select();
        $this->load->model('registration_models/Family_model');
        $this->load->model('registration_models/Tataw3_m');
        $this->load->model('Difined_model');
        //  $this->load->model('registration_models/Money');
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

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/human_resources/tato3/tato3_logo';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    public function read_file()
    {
        $this->load->helper('file');
        $file_name = $this->uri->segment(4);
        $file_path = 'uploads/human_resources/tato3/tato3_logo' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function new_motato3()//registration/Tato3/new_motato3
    {

        if ($this->input->post('add')) {
            $img = 'img';
            $img_file = $this->upload_image($img);
            $this->Tataw3_m->add($img_file);
            // $this->session->flashdata('success');
            //   messages('success','تم تسجيل طلبك بنجاح سيتم التواصل معك من خلال الموظف المختص بالجمعيه');
            // if($this->input->post('log_web')){
            // redirect('Web/new_volunteer','refresh');
            // }
            // else
            // {
            $this->session->set_flashdata('success', "تم تسجيل طلبك بنجاح سيتم التواصل معك من خلال الموظف المختص بالجمعيه");
            redirect('registration/Tato3/new_motato3', 'refresh');
            // }
        }
        $data['talb_num'] = $this->Tataw3_m->get_last_id();

        $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
        $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        $data['title'] = 'إضافة  متطوع/ـه';
        $data['subview'] = 'web/registration_views/tataw3_views/new_motato3';
        $this->load->view('web_home_index', $data);
    }

    public function load_tahwel()
    {
        $type = $this->input->post('type');
        $id = $this->input->post('id');

        if ($type == 1) {
            $data['talb_num'] = $this->Tataw3_m->get_last_id();
            if (isset($id) && !empty($id)) {
                $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id' => $id));

            }
            $data['all_city'] = $this->Family_model->select_type(3);
            $data['skills'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 901));
            $data['interest'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 801));
            $this->load->view('web/registration_views/tataw3_views/load_frd', $data);
        } elseif ($type == 2) {
            $data['talb_num'] = $this->Tataw3_m->get_last_id();
            if (isset($id) && !empty($id)) {
                $data['volunteer_work_type'] = $this->Tataw3_m->getRecordreasonById_type(array('tat_id_fk' => $id));
                $data['volunteer'] = $this->Tataw3_m->getRecordById(array('id' => $id));
            }
            $data['all_city'] = $this->Family_model->select_type(3);
            $data['no3_monzma'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 701));
            $data['work_type'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 601));
            $data['skills'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 901));
            $data['interest'] = $this->Tataw3_m->get_table('tat_settings', array('from_code' => 801));
            $this->load->view('web/registration_views/tataw3_views/load_geha', $data);
        }
    }

    public function checkUnique()
    {
        echo json_encode($this->Tataw3_m->getRecordById(array('id_card' => $this->input->post('id_card'), 'f2a_talab' => $this->input->post('f2a_talab'))));
    }
}