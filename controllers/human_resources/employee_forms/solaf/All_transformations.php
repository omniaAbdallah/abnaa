<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_transformations extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('human_resources_model/employee_forms/solaf/Hr_solaf_transformation_setting_model');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_image("userFile");
        }
        return $all_img;
    }

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function downloads($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/' . $file);
        force_download($name, $data);
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>!</strong> ' . $text . '.</div>');
        }
    }

    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays = round($time / (60 * 60 * 24));
        $HYear = round($TDays / 354.37419);
        $Remain = $TDays - ($HYear * 354.37419);
        $HMonths = round($Remain / 29.531182);
        $HDays = $Remain - ($HMonths * 29.531182);
        $HYear = $HYear + 1389;
        $HMonths = $HMonths + 10;
        $HDays = $HDays + 23;
        if ($HDays > 29.531188 and round($HDays) != 30) {
            $HMonths = $HMonths + 1;
            $HDays = Round($HDays - 29.531182);
        } else {
            $HDays = Round($HDays);
        }
        if ($HMonths > 12) {
            $HMonths = $HMonths - 12;
            $HYear = $HYear + 1;
        }
        $NowDay = $HDays;
        $NowMonth = $HMonths;
        $NowYear = $HYear;
        $MDay_Num = date("w");
        if ($MDay_Num == "0") {
            $MDay_Name = "الأحد";
        } elseif ($MDay_Num == "1") {
            $MDay_Name = "الإثنين";
        } elseif ($MDay_Num == "2") {
            $MDay_Name = "الثلاثاء";
        } elseif ($MDay_Num == "3") {
            $MDay_Name = "الأربعاء";
        } elseif ($MDay_Num == "4") {
            $MDay_Name = "الخميس";
        } elseif ($MDay_Num == "5") {
            $MDay_Name = "الجمعة";
        } elseif ($MDay_Num == "6") {
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name . "، " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }

    /************************************************************/
    public function index()
    {//human_resources/employee_forms/solaf/All_transformations
        // $this->test($_SESSION);
        $data['coming_records'] = $this->Hr_solaf_transformation_setting_model->select_from_hr_all_solaf_orders(
            array('current_to_user_id' => $_SESSION['user_id'])
        );
        // $this->test($data['coming_records']);

        $data["personal_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data['user_orders'] = $this->Hr_solaf_transformation_setting_model->select_from_hr_all_solaf_orders(
            array('emp_id_fk' => $_SESSION['emp_code'])
        );

//$this->test($data['coming_records']);
        $data['title'] = 'طلبات السلف المحولة';
        //   $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_transformations/all_transformations';
        //   $this->load->view('admin_index', $data);

        if ($this->input->post('tab_id')) {
            $data['tab_id'] = array($this->input->post('tab_id'));
            // $this->test($data['tab_id']);
            $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/all_transformations', $data);
        } else {
            $data['tab_id'] = array('mine_1', 'follow_1', 'comming_1');
            //$this->test($data['tab_id']);
            $data['title'] = 'طلبات السلف المحولة';
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/all_transformations/all_transformations';
            $this->load->view('admin_index', $data);
        }


    }


    public function Get_load_page()
    {
        $data_load["department_emps"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('administration' => 3));
        $data_load["sho2on_edaria"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('department != ' => 142));
        $data_load["modeer_3am"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('department' => 147));
        $data_load["personal_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $this->input->post('fromUser')));
        $data_load["mokhtas_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $this->input->post('toUser')));
        $data_load["solaf_data"] = $this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm' => $this->input->post('t_rkm')));
        $data_load["solaf_level"] = $data_load["solaf_data"]->level;
        $data_load["modeer_mobasher"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('employees.id' => $data_load["solaf_data"]->direct_manager_id_fk));


        $data_load['department_jobs_all'] = $this->Hr_solaf_transformation_setting_model->select_department_jobs();

        $data_load["level_2data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 2));
        $data_load["level_3data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 3));
        $data_load["level_4data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 4));
        $data_load["level_5data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 5));
        //$this->test($data_load["agaza_data"]);
        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/transformation_load_page', $data_load);

    }

    // omnia
    public function Get_transformation_form()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');

        $data_load["solaf_data"] = $this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm' => $this->input->post('t_rkm')));
        if (!empty($data_load["solaf_data"])) {
            $emp_where = array(1 => 402, 2 => 401, 3 => 502, 4 => 501, 5 => 101);
            if (key_exists($data_load["solaf_data"]->level, $emp_where)) {
                $data_load["employees_data"] = $this->Hr_solaf_transformation_setting_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data_load["solaf_data"]->level]));
            }
            $data_load['emp_data'] = $this->Solaf_requests_model->get_emp_data($data_load["solaf_data"]->emp_id_fk);

        }
        // $this->test($data_load);

        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/transformation_form_load_page', $data_load);

    }


    public function save_Transform()
    {
        // $this->test($_POST);
        $this->Hr_solaf_transformation_setting_model->save_from_transfomation();
        if ($this->input->post('from_profile')) {
          //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    // omnia

    public function saveTransformBadel()
    {

        $this->Hr_solaf_transformation_setting_model->saveTransformBadel();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    public function saveTransformMokhtas()
    {

        $this->Hr_solaf_transformation_setting_model->saveTransformMokhtas();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }


    public function saveTransformDirectManger()
    {

        $this->Hr_solaf_transformation_setting_model->saveTransformDirectManger();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    public function saveTransformToManger()
    {

        $this->Hr_solaf_transformation_setting_model->saveTransformToManger();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    public function saveTransformManger()
    {

        /*echo '<pre>';
        print_r($_POST);
        die;*/
        $this->Hr_solaf_transformation_setting_model->saveTransformManger();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    public function Get_transformDetails()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');

        $data_load["department_emps"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('administration' => 3));
        $data_load["sho2on_edaria"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('department != ' => 142));
        $data_load["modeer_3am"] = $this->Hr_solaf_transformation_setting_model->get_employees(array('department' => 147));
        $data_load["solaf_data"] = $this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm' => $this->input->post('t_rkm')));
        $data_load["personal_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data_load["solaf_level"] = $data_load["solaf_data"]->level;
        $data_load["modeer_mobasher"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('employees.id' => $data_load["solaf_data"]->direct_manager_id_fk));
        $data_load["level_1data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 1));
        $data_load["solaf_level"] = $data_load["solaf_data"]->level;
        $data_load["level_2data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 2));
        $data_load["level_3data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 3));
        $data_load["level_4data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 4));
        $data_load["level_5data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $this->input->post('t_rkm'), 'level' => 5));
        // echo"<pre>"; print_r($data_load["level_4data"]); echo"</pre>"; die;

        $data_load['emp_data'] = $this->Solaf_requests_model->get_emp_data($data_load["solaf_data"]->emp_id_fk);

        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/transformDetails_load_page', $data_load);


    }

    public function print_transformation()
    {
        $t_rkm = $_POST['t_rkm'];

        //$this->test($agaza_rkm);
        $data_load["solaf_data"] = $this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm' => $t_rkm));
        $data_load["personal_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data_load["solaf_level"] = $data_load["solaf_data"]->level;
        $data_load["level_2data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $t_rkm, 'level' => 2));
        $data_load["level_3data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $t_rkm, 'level' => 3));
        $data_load["level_4data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $t_rkm, 'level' => 4));
        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/print_transformation', $data_load);


    }


    public function motab3a_details()
    {
        $t_rkm = $this->input->post('t_rkm');
        $data_load["solaf_data"] = $this->Hr_solaf_transformation_setting_model->get_solaf_data(array('t_rkm' => $this->input->post('t_rkm')));
        $data_load["personal_data"] = $this->Hr_solaf_transformation_setting_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data_load['allhistory'] = $this->Hr_solaf_transformation_setting_model->select_allhistory_by_solaf_rkm_fk($this->input->post('t_rkm'));
        $data_load["level_2data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $data_load["solaf_data"]->t_rkm, 'level' => 2));
        $data_load["level_3data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $t_rkm, 'level' => 3));
        $data_load["level_4data"] = $this->Hr_solaf_transformation_setting_model->select_hr_all_transformations_history_by_level(array('solaf_rkm_fk' => $t_rkm, 'level' => 4));
        // $this->test($data_load['allhistory']);
        //echo"<pre>"; print_r($data_load["personal_data"]); echo"</pre>"; die;
        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations/motab3a_details_load_page', $data_load);


    }

    /***************30-6-2019*****************/


    public function getDepartmentMembers()
    {

        $data = $this->Hr_solaf_transformation_setting_model->get_employees(array('administration' => $this->input->post('department_id')));
        echo json_encode($data);


    }

}
