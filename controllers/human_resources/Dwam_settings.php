<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dwam_settings extends MY_Controller
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
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();


        $this->load->model('human_resources_model/dwam_m/Dwam_model');
    }

    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
    }


    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }

    }

    public function downloads($file) //  // human_resources/Human_resources/downloads
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/' . $file);
        force_download($name, $data);
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

    public function read_emp_file($file_name)
    {
        $this->load->helper('file');
        //$file_path = 'uploads/human_resource/emp_mostnad_files/'.$file_name;
        $file_path = 'uploads/human_resources/emp_mostnad_files/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }


    public function cheek_link_all($last_id)
    {
        $key = $last_id;
        $arr_in = array("emp_code" => $key);
        $cheek_value["printer_machin"] = $this->Dwam_model->getByArray("hr_emp_dwam_details", $arr_in);
        return $cheek_value;
    }

    public function index(){

    }
    public function add_dwam($emp_id) // human_resources/Dwam_settings/add_dwam/7
    {
        $this->load->model('Difined_model');
        if ($this->input->post('add')) {
            $this->Dwam_model->insert();
            $this->messages('success', 'إضافة  مواعيد العمل');
            redirect("human_resources/Dwam_settings/add_dwam/" . $emp_id . "");
        }

        //$data["my_always"] = $this->Dwam_model->get_my_dwam($emp_id);
        $data["last_period_id_fk"] = $this->Dwam_model->get_last_period_id_fk($emp_id);
        $data["personal_data"] = $this->Dwam_model->get_one_employee($emp_id);
        $data['all_links'] = $this->cheek_link_all($data["personal_data"][0]->emp_code);
        $data['all_field'] = $this->Dwam_model->get_field('hr_emp_dwam_details');
        $data['employee_data'] = $this->Dwam_model->get_emp_data($emp_id);
        $data['always_setting_data'] = $this->Dwam_model->get_always_setting();
        $data["printer_machine"] = $this->Dwam_model->select_search_key('employees_settings', 'type', 11);
        $data['title'] = 'إضافة  مواعيد العمل ';
        $data['subview'] = 'admin/Human_resources/dwam_v/dwam_added';
        $this->load->view('admin_index', $data);
    }

    public function dwam_table($emp_id)
    {
        $data["my_always"] = $this->Dwam_model->get_my_dwam($emp_id);
        $this->load->view('admin/Human_resources/dwam_v/dwam_table', $data);
    }

    public function get_machin_employee_row(){
        // human_resources/Dwam_settings/get_machin_employee_row
        $this->load->model('Difined_model');
        if($this->input->post("period_id_fk")){
            $id = $this->input->post("always_id_fk") ;
            $data_load["len_class"] = $this->input->post("len") ;
            $data_load["always_id_fk"] = $this->input->post("always_id_fk") ;
            $data_load["period_id_fk"] = $this->input->post("period_id_fk") ;
            $data_load["data_period"]=$this->Difined_model->getById("always_setting",$id);
            $this->load->view('admin/Human_resources/dwam_v/get_machine_added'  , $data_load);
        }
    }

    public function AddEmpDwam(){
        $this->Dwam_model->insert_emp_dwam();
    }

    public function UpdateEmpDwam(){
        if($this->input->post("update_id")){
            $id=$this->input->post("update_id");
            $data_load["data_period"]=$this->Dwam_model->get_emp_dwam($id);
            $this->load->view('admin/Human_resources/dwam_v/get_updte_machine_added'  , $data_load);
        }elseif($this->input->post("id_update") && $this->input->post("days_update") ){
            $id= $this->input->post("id_update") ;
            $this->Dwam_model->update_emp_dwam($id);
        }
    }
    public function DeleteEmpDwam($id){
        $this->Dwam_model->delete_emp_dwam($id);

        echo 1;
        return ;
        //$this->messages('error','تم حذف فترة الدوام  ');
        //redirect("human_resources/Dwam_settings/add_dwam/".$emp_id."");
    }


}// end class
/* End of file Dwam_settings.php */
/* Location: ./application/controllers/human_resources/Dwam_settings.php */