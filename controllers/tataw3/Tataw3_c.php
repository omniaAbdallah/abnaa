<?php



class Tataw3_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_tataw3_logged_in') == 0) {
            redirect('tataw3/Login_tataw3');
        }
     //   $this->load->model('gam3ia_omomia/Tataw3_model');
        $this->load->model('tataw3/Tataw3_model');
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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

    public function index()
    {
      
//tataw3/Tataw3_c
        $id = $_SESSION['id'];  
/************************************************************/

if ($this->input->post('add')) {
    $img = 'img';
    $img_file = $this->upload_image($img);
    $this->Tataw3_model->update($id, $img_file);
//            $this->messages('success', 'تعديل  متطوع');
//            redirect('human_resources/tataw3/Tataw3_c/new_motato3', 'refresh');
    return;
} else {

    $data['fields'] = $this->Tataw3_model->select_settings_tat_mgalat();
    $data['reasons'] = $this->Tataw3_model->select_settings_tat_reason(101);
    $data['volunteer'] = $this->Tataw3_model->getRecordById(array('id' => $id));
    // $this->test( $data['volunteer']);
    // $this->test($data['volunteer_work_type'] );
    $data['volunteer_detail_reason'] = $this->Tataw3_model->getRecordreasonById(array('tat_id_fk' => $id));
    $data['volunteer_detail_field'] = $this->Tataw3_model->getRecordfieldById(array('tat_id_fk' => $id));
    $data['volunteer_work_type'] = $this->Tataw3_model->getRecordreasonById_type(array('tat_id_fk' => $id));
    // $this->test($data['volunteer_work_type'] );
    $data['title'] = 'البيانات الاساسية  متطوع/ـه';
    // $data['subview'] = 'admin/Human_resources/tataw3_v/motat3en/new_motato3';
    // $this->load->view('admin_index', $data);

    $data['subview'] = 'tataw3/tataw3_views/basic_data/motato3_profile';
        $this->load->view('tataw3/tataw3_index', $data);
}
 
 /*************************************************************/

        
//        $this->load->view('', $data);
    }

    
    public function account_setting()//tataw3/Tataw3_c/account_setting
    {
        $id = $_SESSION['id'];
        $data['result'] = $this->Tataw3_model->getById($id)[0];
        if(!empty($data['result']))
        {
          
            $data['subview'] = 'tataw3/tataw3_views/basic_data/motato3_account_edite';
        }
        else{
            $data['subview'] = 'tataw3/tataw3_views/basic_data/motato3_account';     
        }
       
        $this->load->view('tataw3/tataw3_index', $data);
        
    }
    public function editaccount()
    {
        $id=$this->input->post('id');
        $data['result'] = $this->Tataw3_model->getById($id)[0];
       
      
        $this->load->view('tataw3/tataw3_views/basic_data/motato3_account', $data);
    }
    /////yara_tato3
    public function load_tahwel()
    {
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        if ($type == 1) {
            $data['talb_num'] = $this->Tataw3_model->get_last_id();
            if (isset($id) && !empty($id)) {
                $data['volunteer'] = $this->Tataw3_model->getRecordById(array('id' => $id));
            }
            $data['skills_arr'] = $this->Tataw3_model->get_table('tat_settings', array('from_code' => 1101));/*7-6-om*/
            $data['study_arr'] = $this->Tataw3_model->get_table('tat_settings', array('from_code' => 1001));/*7-6-om*/
            $data['interests_arr'] = $this->Tataw3_model->get_table('tat_settings', array('from_code' => 801));
            $data['foras'] = $this->Tataw3_model->get_table('tat_foras', array());
            $this->load->view('tataw3/tataw3_views/basic_data/load_frd', $data);
        } elseif ($type == 2) {
            $data['talb_num'] = $this->Tataw3_model->get_last_id();
            if (isset($id) && !empty($id)) {
                $data['volunteer_work_type'] = $this->Tataw3_model->getRecordreasonById_type(array('tat_id_fk' => $id));
                $data['volunteer'] = $this->Tataw3_model->getRecordById(array('id' => $id));
            }
            $data['foras'] = $this->Tataw3_model->get_table('tat_foras', array());
            $data['no3_monzma'] = $this->Tataw3_model->get_table('tat_settings', array('from_code' => 701));
            $data['work_type'] = $this->Tataw3_model->get_table('tat_settings', array('from_code' => 601));
            $this->load->view('tataw3/tataw3_views/basic_data/load_geha', $data);
        }
    }
    public function checkUnique()
    {
        echo json_encode($this->Tataw3_m->getRecordById(array('id_card' => $this->input->post('id_card'), 'f2a_talab' => $this->input->post('f2a_talab'))));
    }
    public function get_data_setting()
    {
        $type = $this->input->post('type');
        if ($type == 1) {
            $data['fields'] = $this->Tataw3_m->select_settings_tat_mgalat();
        } elseif ($type == 2) {
            $data['reasons'] = $this->Tataw3_m->select_settings_tat_reason(101);
        }
        $this->load->view('tataw3/tataw3_views/basic_data/load_data_setting', $data);
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
        $file_path = 'uploads/human_resources/tato3/tato3_logo/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function getConnection()
    {
        $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $all_Donors = $this->Employee_setting->select_all_areas();
        //$this->test( $all_Donors);
        $arr_donors = array();
        $arr_donors['data'] = array();
   
        if (!empty($all_Donors)) {
            $x = 0;
            foreach ($all_Donors as $row_donors) {
                $arr_donors['data'][] = array(
                    ++$x
                 /*   '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' . $row_donors->city_name . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' . $row_donors->city_id . '" data-hai_id="' . $row_donors->id . '">' . ++$x . '</span>'*/
                ,
                    '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' . $row_donors->city_name . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' . $row_donors->city_id . '" data-hai_id="' . $row_donors->id . '">' . $row_donors->city_name . '</span>'
                ,
                    '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' . $row_donors->city_name . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' . $row_donors->city_id . '" data-hai_id="' . $row_donors->id . '">' . $row_donors->name . '</span>'
                );
            }
        }
        echo json_encode($arr_donors);
   
   
    }
    public function show_table()
           {
            $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
             $data['input_num']=$this->input->post('input_num');
             $data['type']=$this->input->post('type');
   
             if($this->input->post('add')){
               $this->Sponsors_model->insert_data_pop($data['input_num'],  $data['type']);
             }elseif ($this->input->post('update')) {
               $this->Sponsors_model->update_data_pop($data['input_num'],  $data['type']);
             }elseif ($this->input->post('delete')) {
               $this->Sponsors_model->delete_data_pop($data['input_num']);
             }
             $data['table_data']=$this->Sponsors_model->get_data_table($data['input_num'],  $data['type']);
           
               $this->load->view('tataw3/tataw3_views/basic_data/table_data_load', $data);
           } 
    //yara_stop
   
     
    
}