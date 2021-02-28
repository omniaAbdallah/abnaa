<?php

class Osr_crm_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/osr_crm/Osr_crm_m');
        $this->load->model("familys_models/Register");
    }

    //--------------------------------------------------

    public function add_crm()
    { //family_controllers/osr_crm/Osr_crm_c/add_crm
        if ($this->input->post('ADD') == "ADD") {
            $this->Osr_crm_m->insert();
            $this->message('success', 'تمت العملية بنجاح');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm', 'refresh');
        } else {
            //   $data['employees'] = $this->Register->select_all_employee();
            //  $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
            // $data['mother_national_num']=$mother_national_num;
            $data['all_data'] = $this->Osr_crm_m->select_all();
            //$this->test( $data['all_data']);
            $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
            $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
            //yara23-2-2020
            $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
            //yara23-2-2020
            $data['title'] = '  إدارة التواصل مع الاسرة  ';
            $data['metakeyword'] = ' إدارة التواصل مع الاسرة    ';
            $data['metadiscription'] = ' إدارة التواصل مع الاسرة   ';
            $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm';
            $this->load->view('admin_index', $data);
        }
    }

    public function message($type, $text, $method = false)
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

    //old_funcc

    public function Update($id)
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        if ($this->input->post('UPDATE') == "UPDATE") {
            $this->Osr_crm_m->update($id);
            $this->message('success', 'تم تعديل      ');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm', 'refresh');
        }
        $crm_data = $data["crm_data"] = $this->Osr_crm_m->getByArray($id);
        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["crm_data"]['mother_national_num']);
        $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
        $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
        //yara23-2-2020
        $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
        //yara23-2-2020
        $data['title'] = 'تعديل      ';
        $data['metakeyword'] = 'تعديل        ';
        $data['metadiscription'] = 'تعديل        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm';
        $this->load->view('admin_index', $data);
    }

    public function check_date()
    {
        $visit_date = $this->input->post('visit_date');
        $visit_time_from = $this->input->post('visit_time_from');
        $visit_time_to = $this->input->post('visit_time_to');
        echo $this->Osr_crm_m->check_date($visit_date, $visit_time_from, $visit_time_to);
    }

    //new_funcc

    public function delete($id)
    {
        $this->Osr_crm_m->delete($id);
        $this->message('success', 'تم حذف      ');
        redirect('family_controllers/osr_crm/Osr_crm_c/add_crm', 'refresh');
    }

    public function getDetails_crm()
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        $id = $this->input->post('id');
        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
        $crm_data = $data["crm_data"] = $this->Osr_crm_m->getByArray($id);
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["crm_data"]['mother_national_num']);
        $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
        $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
        //yara23-2-2020
        $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
        //yara23-2-2020
        $this->load->view('admin/familys_views/osr_crm_v/detalis_load_crm', $data);
    }

    // getDetails_crm

    public function add_crm_etsal($id)
    { //family_controllers/osr_crm/Osr_crm_c/add_crm_etsal
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        if ($this->input->post('ADD') == "ADD") {
            $this->Osr_crm_m->insert_etsal($id);
            $this->message('success', 'تمت العملية بنجاح ');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/' . $id, 'refresh');

        } else {
            $zyraa_data = $data["zyraa_data"] = $this->Osr_crm_zyraat_m->getByArray($id);
            $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
            $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["zyraa_data"]['mother_national_num']);
            $data['all_data'] = $this->Osr_crm_m->select_all_etsal($id);
            //$this->test( $data['all_data']);
            $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
            $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
            //yara23-2-2020
            $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
            //yara23-2-2020
            $data['title'] = '  إنشاء إتصال مع الاسرة  ';
            $data['metakeyword'] = ' إنشاء إتصال مع الاسرة    ';
            $data['metadiscription'] = ' إنشاء إتصال مع الاسرة   ';
            $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_etsal';
            $this->load->view('admin_index', $data);
        }
    }

    //yara

    public function Update_crm_etsal($id, $from_id)
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        if ($this->input->post('UPDATE') == "UPDATE") {
            $this->Osr_crm_m->update($id);
            $this->message('success', 'تم تعديل      ');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/' . $from_id, 'refresh');
        }
        $crm_data = $data["crm_data"] = $this->Osr_crm_m->getByArray($id);
        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["crm_data"]['mother_national_num']);
        $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
        $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
        //yara23-2-2020
        $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
        //yara23-2-2020
        $data['title'] = 'تعديل      ';
        $data['metakeyword'] = 'تعديل        ';
        $data['metadiscription'] = 'تعديل        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_etsal';
        $this->load->view('admin_index', $data);
    }

    //  Update_crm_etsal

    public function delete_crm_etsal($id, $from_id)
    {
        $this->Osr_crm_m->delete($id);
        $this->message('success', 'تم حذف      ');
        redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/' . $from_id, 'refresh');
    }

    //  delete_crm_etsal

    public function add_crm_osr($mother_national_num)
    { //family_controllers/osr_crm/Osr_crm_c/add_crm_osr/1042645620
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        if ($this->input->post('ADD') == "ADD") {
            $this->Osr_crm_m->insert();

            $this->message('success', 'تمت إضافة    ');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_osr/' . $mother_national_num, 'refresh');
        } else {
            $data['employees'] = $this->Register->select_all_employee();
            $data["basic_data_family"] = $this->basic_family_data($mother_national_num);
            $data['mother_national_num'] = $mother_national_num;
            $data['all_data'] = $this->Osr_crm_m->select_all_osr_crm($mother_national_num);
            $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
            $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($mother_national_num);
            $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
            $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
            $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
            $data['title'] = '   التواصل مع الاسرة  ';
            $data['metakeyword'] = '  التواصل مع الاسرة    ';
            $data['metadiscription'] = '  التواصل مع الاسرة   ';
            $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_osr';
            $this->load->view('admin_index', $data);
        }
    }
    ///////////////
    //////////////////////yara24-2-2021//////////////

    private function basic_family_data($mother_num_fk)
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        $basic_data = $this->Osr_crm_m->get_basic_mother_num($mother_num_fk);
        return $basic_data;
    }

    public function Update_crm_osr($id, $mother_national_num)
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        if ($this->input->post('UPDATE') == "UPDATE") {
            $this->Osr_crm_m->update($id);
            $this->message('success', 'تم تعديل      ');
            redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_osr/' . $mother_national_num, 'refresh');
        }
        $data['mother_national_num'] = $mother_national_num;
        $crm_data = $data["crm_data"] = $this->Osr_crm_m->getByArray($id);
        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($mother_national_num);
        $data["basic_data_family"] = $this->basic_family_data($mother_national_num);
        $data['employees'] = $this->Register->select_all_employee();
        $data['method_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'method_etsal'));
        $data['natega_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'natega_etsal'));
        $data['purpose_etsal'] = $this->Osr_crm_m->get_table("osr_crm_settings", array('type' => 'purpose_etsal'));
        $data['title'] = 'تعديل      ';
        $data['metakeyword'] = 'تعديل        ';
        $data['metadiscription'] = 'تعديل        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_osr';
        $this->load->view('admin_index', $data);
    }

//  delete_crm_osr
    public function delete_crm_osr($id, $mother_national_num)
    {
        $this->Osr_crm_m->delete($id);
        $this->message('success', 'تم حذف      ');
        redirect('family_controllers/osr_crm/Osr_crm_c/add_crm_osr/' . $mother_national_num, 'refresh');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}// END CLASS