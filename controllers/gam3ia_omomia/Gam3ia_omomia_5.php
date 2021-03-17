<?php

/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/07/2019
 * Time: 01:07 م
 */

class Gam3ia_omomia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
//        if ($this->session->userdata('is_logged_in') == 0) {
//        redirect('gam3ia_omomia/Login_gam3ia_omomia');
//    }
        $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
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

    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/md/gam3ia_omomia_members';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
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
//gam3ia_omomia/Gam3ia_omomia
        $id = $_SESSION['id'];
        $data['records'] = $this->Gam3ia_omomia_model->select_all();

        $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];

        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(1);
        $data['nationality'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(2);

        $data['social_status'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(4);
        $data['dest_card'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(6);
        $data['cities'] = $this->Gam3ia_omomia_model->select_areas();
        $data['ahais'] = $this->Gam3ia_omomia_model->select_residentials();
        $data['membership_arr'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(2);
        $data['Degree'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(14);
        $data['science_qualification'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(15);
        $data['employer'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(1);
        $data['job_role'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(3);
        $data['surname_arr'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(4);

       
/************************************************************/


 
 /*************************************************************/

        $data['subview'] = 'gam3ia_omomia/gam3ia_views/basic_data/gam3ia_omomia_profile';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
//        $this->load->view('', $data);
    }

    
    public function account_setting()//gam3ia_omomia/Gam3ia_omomia/account_setting
    {
        $id = $_SESSION['id'];
        $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];
        if(!empty($data['result']))
        {
            $data['subview'] = 'gam3ia_omomia/gam3ia_views/basic_data/gam3ia_omomia_account_edite';
        }
        else{
            $data['subview'] = 'gam3ia_omomia/gam3ia_views/basic_data/gam3ia_omomia_account';     
        }
       
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
        
    }
    public function editaccount()
    {
        $id=$this->input->post('id');
        $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];
       
      
        $this->load->view('gam3ia_omomia/gam3ia_views/basic_data/gam3ia_omomia_account', $data);
    }
    // public function odowia_details()//gam3ia_omomia/Gam3ia_omomia/odowia_details
    // {
    //     $id = $_SESSION['id'];
    //     $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];
    //     $data['subview'] = 'gam3ia_omomia/gam3ia_views/gam3ia_odowia_details';
    //     $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
        
    // }
    public function odowia_details()//gam3ia_omomia/Gam3ia_omomia/odowia_details
    {
        $id = $_SESSION['id'];
        $data['result'] = $this->Gam3ia_omomia_model->getById($id)[0];
       
        $data['banks'] = $this->Gam3ia_omomia_model->select_banks();
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/basic_data/gam3ia_odowia_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
        
    }


//new 
   public function update_gam3ia_odwiat()
    {
        $this->Gam3ia_omomia_model->update_gam3ia_odwiat();
        echo 1;
        return;
    }
    public function update_gam3ia_last_odwiat()
    {
        $this->Gam3ia_omomia_model->update_gam3ia_last_odwiat();
        echo 1;
        return;
    }
    public function gami3a_ommia_details()//gam3ia_omomia/Gam3ia_omomia/gami3a_ommia_details
    {
       
        $data['gam3ia_omomia'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_members', array());
        $data['gam3ia_omomia_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk' => 1));
        $data['gam3ia_omomia_not_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk' => 0));
        $data['gam3ia_omomia_1'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 102));
        $data['gam3ia_omomia_2'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 103));
        $data['gam3ia_omomia_3'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk' => 106));
        $data['records'] = $this->Gam3ia_omomia_model->select_all();
    //
    $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
    $data['all_gam3ia_omomia'] = $this->Gam3ia_omomia_members_model->select_all();
    //
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/Gam3ia_omomia/gam3ia_ommia_view';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
        
    }
   
    public function human_resource_details()
    {
       
        $data['emp_count'] = $this->Gam3ia_omomia_model->get_count('employees', array('employee_type' => 1));
        $data['edara_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk' => 0));
        $data['qsm_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk !=' => 0));
        $data['sponsor_count'] = $this->Gam3ia_omomia_model->get_count('fr_sponsor', array('halat_kafel_id' => 7));
        $data['donor_count'] = $this->Gam3ia_omomia_model->get_count('fr_donor', array('halat_donor_id' => 7));
        $data['all_emp'] = $this->Gam3ia_omomia_model->get_all_emp();
        $data['GetAll'] = $this->Gam3ia_omomia_model->GetAll();


        $data['subview'] = 'gam3ia_omomia/gam3ia_views/human_resource/human_resource_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    //yara12-5-2020
    
    
      //yara
      function pdf($filename)
      {
          $filePath ='uploads/human_resources/main_egraat/'.$filename;

          if (file_exists($filePath)) {
           
              echo "The file  exists";
          } else {
            echo $filePath;
              echo "The file  does not exist <br>";
              die();
          }
          header('Content-type:application/pdf');
          header('Content-disposition: inline; filename="'.$filename.'"');
          header('content-Transfer-Encoding:binary');
          header('Accept-Ranges:bytes');
          readfile($filePath);
      }  
      public function human_resource_rules()
      {
          $data['pdfname'] = "pdf.pdf";
          $data['title'] = "   لائحة  إجراءات الموارد البشرية ";
          $data['subview'] = 'gam3ia_omomia/gam3ia_views/human_resource/human_resource_rules';
          $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
      }
      
      
        public function politicals_plans()
      {
          $data['pdfname'] = "strategy_plan.pdf";
          $data['title'] = "   السياسات ";
          $data['subview'] = 'gam3ia_omomia/gam3ia_views/politicals_plans/strategy_v';
          $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
      }  
      
             public function finance_reports()
      {
          $data['pdfname'] = "Finance_reports.pdf";
          $data['title'] = "   القوائم المالية ";
          $data['subview'] = 'gam3ia_omomia/gam3ia_views/politicals_plans/finance_reports_v';
          $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
      }  
    //yara12-5-2020
    public function family_details()
    {
       
        $data['all_files'] = $this->Gam3ia_omomia_model->get_all_files();
 $data['all_files_active'] = $this->Gam3ia_omomia_model->get_all_files_active();
 $data['all_files_non_active'] = $this->Gam3ia_omomia_model->get_all_files_non_active();
 $data['all_talabat'] = $this->Gam3ia_omomia_model->get_all_talabat();
 $data['all_mostafed'] = $this->Gam3ia_omomia_model->get_mostafed();
 $data['all_yatem'] = $this->Gam3ia_omomia_model->get_yatem();
 $data['all_mother_num'] = $this->Gam3ia_omomia_model->get_mother_num();
 $data['orders'] = $this->Gam3ia_omomia_model->get_arf_orders();

        $data['subview'] = 'gam3ia_omomia/gam3ia_views/family/family_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    function pdf_family($filename)
    {
        $filePath ='uploads/family_attached/main_egraat/'.$filename;

        if (file_exists($filePath)) {
         
            echo "The file  exists";
        } else {
          echo $filePath;
            echo "The file  does not exist <br>";
            die();
        }
        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="'.$filename.'"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        readfile($filePath);
    }
    public function  family_rules()
      {
          $data['pdfname'] = "pdf.pdf";
          $data['title'] = "   لائحةالرعاية والبرامج التنموية    ";
          $data['subview'] = 'gam3ia_omomia/gam3ia_views/family/family_rules';
          $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
      }
    
    public function kafalat_details()
    {
        $data['emp_count'] = $this->Gam3ia_omomia_model->get_count('employees', array('employee_type' => 1));
        $data['edara_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk' => 0));
        $data['qsm_count'] = $this->Gam3ia_omomia_model->get_count('department_jobs', array('from_id_fk !=' => 0));
        $data['sponsor_count'] = $this->Gam3ia_omomia_model->get_count('fr_sponsor', array('halat_kafel_id' => 7));
        $data['donor_count'] = $this->Gam3ia_omomia_model->get_count('fr_donor', array('halat_donor_id' => 7));
        $data['all_emp'] = $this->Gam3ia_omomia_model->get_all_emp();
        $data['GetAll'] = $this->Gam3ia_omomia_model->GetAll();

        
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/kafalat/kafalat_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    function pdf_kafalat($filename)
      {
          $filePath ='uploads/kafalat/main_egraat/'.$filename;

          if (file_exists($filePath)) {
           
              echo "The file  exists";
          } else {
            echo $filePath;
              echo "The file  does not exist <br>";
              die();
          }
          header('Content-type:application/pdf');
          header('Content-disposition: inline; filename="'.$filename.'"');
          header('content-Transfer-Encoding:binary');
          header('Accept-Ranges:bytes');
          readfile($filePath);
      }
    public function  kafalat_rules()
    {
        $data['pdfname'] = "pdf.pdf";
     
        $data['title'] = "   لائحة تنمية الموارد المالية         ";
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/kafalat/kafalat_rules';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }
    public function total_details()
    { 
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/total_money_chart/total_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }
    public function get_all_da3wat()
    {

        if ($_SESSION['id']) {
            $data['all_da3wat'] = $this->Gam3ia_omomia_model->get_all_da3wat();
        }
     
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/egtma3at/da3wat_gam3ia_omomia_view';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    public function show_mahdr()
    {
    
        $this->load->model('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia_model');
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        } else {
            $id = 0;
        }
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('mem_id_fk' => $id));
    
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
        if ($_SESSION['id']) {
                $data['all_da3wat'] = $this->Gam3ia_omomia_model->get_all_da3wat();
            }
        // $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetailsDiv', $data);
        
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/egtma3at/getDetailsDiv';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    
    }
    public function dawa_reply()
    {

//        $this->test($_POST);
      
            $file = $this->upload_image('mofawad_moefaq','md/da3wat_gam3ia_omomia');
            $this->Gam3ia_omomia_model->dawa_reply($file);
    //  $this->messages('success', ' تمت  ارسال الرد  بنجاح');
           // redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        
    }
       public function update_gam3ia_member()
    {
        $id=$this->input->post('memb_id');
        if ($this->input->post('memb_id')) {
            $member_img = 'member_img';
            $card_img = 'card_img';
            $file['mem_img'] = $this->upload_image($member_img);
            $file['card_img'] = $this->upload_image($card_img);
           // $this->test($file);
            $this->Gam3ia_omomia_model->update($file, $id);
          //  $this->messages('success', ' تمت تعديل البيانات بنجاح');
          //  redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        }
        
    }
    public function update_gam3ia_account()
    {
        $id=$this->input->post('id');
     
        
            $this->Gam3ia_omomia_model->update_account($id);
          //  $this->messages('success', ' تمت تعديل البيانات بنجاح');
          //  redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
        
        
    }
    public function update_odowia_details()
    {
    $memid=$this->input->post('id');
    $this->Gam3ia_omomia_model->update_note($memid);
    }

    public function get_gam3ia_omomia_member()
    {
        $records = $this->Gam3ia_omomia_model->select_all();
//        $this->test($records);
        $arr_records = array();
        $arr_records['data'] = array();

        if (!empty($records)) {
            $x = 1;
            foreach ($records as $row_records) {

                $arr_records['data'][] = array(
                    $x++,
                    $row_records->odwiat->rkm_odwia_full,
                    $row_records->laqb_title . '/' . $row_records->name,
                    $row_records->card_num,
                    $row_records->jwal,
                    $row_records->odwiat->no3_odwia_title,
                    $row_records->odwiat->odwia_status_title,
                    ''


                );
            }
        }
        echo json_encode($arr_records);


    }


       
/************************************************/


  


   
    
    
  public function downloads($file)  //gam3ia_omomia/Gam3ia_omomia/downloads/
{
    $this->load->helper('download');
    $name = $file;
    $data = file_get_contents('./uploads/files/' . $file);
    force_download($name, $data);
}  

 //yara
 public function getConnection()
 {
     $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
     $all_Donors = $this->Employee_setting->select_all_areas();
     //$this->test( $all_Donors);
     $arr_donors = array();
     $arr_donors['data'] = array();

     if (!empty($all_Donors)) {
         $x=0;
         foreach ($all_Donors as $row_donors) {

             $arr_donors['data'][] = array(
                 '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                      data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '">'.$x++ .'</span>'
             ,
                   '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                      data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '">'.$row_donors->city_name .'</span>'
                    ,
                 '<span ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                      data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '">'.$row_donors->name .'</span>'

                     ,

             );
         }
     }
     echo json_encode($arr_donors);


 }
 public function load_mhna()
 {
 
     $data['job_role'] = $this->Gam3ia_omomia_model->GetFromGeneral_assembly_settings(3);
     $this->load->view('gam3ia_omomia/gam3ia_views/basic_data/load', $data);
 }
 public function add_mhna()
 
 { 
     
     
    
         $this->Gam3ia_omomia_model->add_setting(3);
         $this->messages('success','إضافة ');
    
     
 }
 public function update_mhna()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->update_setting(3,$id);
         $this->messages('success','تعديل ');
     
     
 }
 public function delete_mhna()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->delete_setting($id);
         $this->messages('success','حذف ');
   
     
 }
 public function getById()
{

 $this->load->model('md/md_settings/Settings_model');
 $id=$this->input->post('id');
 $reason=$this->Gam3ia_omomia_model->GetFromGeneral_settings($id,3);
 echo json_encode($reason);
 
}

public function load_mo2hl()
 {

  $data['science_qualification'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(15);
     $this->load->view('gam3ia_omomia/gam3ia_views/basic_data/load_mo2hl', $data);
 }
 
 public function add_mo2hl()
 
 { 
     
     
    
         $this->Gam3ia_omomia_model->add_setting_mo2hl(15);
         $this->messages('success','إضافة ');
   
     
 }

 public function getById_mo2hl()
 {
 
     
     $id=$this->input->post('id');
     $reason=$this->Gam3ia_omomia_model->GetFromGeneral_settings_mo2hl($id,15);
     echo json_encode($reason);
     
 }
 public function update_mo2hl()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->update_setting_mo2hl(15,$id);
         $this->messages('success','تعديل ');
      
     
 }
 public function delete_mo2hl()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->delete_setting_mo2hl($id);
         $this->messages('success','حذف ');
     
     
 }
 //yara
 public function load_esdar()
 {
     $data['dest_card'] = $this->Gam3ia_omomia_model->GetFromEmployees_settings(6);
  
     $this->load->view('gam3ia_omomia/gam3ia_views/basic_data/load_esdar', $data);
 }
 
 public function add_esdar()
 
 { 
     
     
    
         $this->Gam3ia_omomia_model->add_setting_esdar(6);
         $this->messages('success','إضافة ');
    
     
 }

 public function getById_esdar()
 {
 
     
     $id=$this->input->post('id');
     $reason=$this->Gam3ia_omomia_model->GetFromGeneral_settings_mo2hl($id,6);
     echo json_encode($reason);
     
 }
 public function update_esdar()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->update_setting_esdar(6,$id);
         $this->messages('success','تعديل ');
      
     
 }
 public function delete_esdar()
 
 { 
     
     
     $id=$this->input->post('id');
         $this->Gam3ia_omomia_model->delete_setting_mo2hl($id);
         $this->messages('success','حذف ');
    
     
 }
////yara7-5-2020
public function add_morfaqt()//gam3ia_omomia/Gam3ia_omomia/add_morfaqt
{
    $data['title'] = "   إضافة مرفقات";
    $id = $_SESSION['id'];
    $data['morfqat'] = $this->Gam3ia_omomia_model->get_table('md_all_gam3ia_omomia_morfq',array('mem_id_fk'=>$id));
    $data['subview'] = 'gam3ia_omomia/gam3ia_views/basic_data/add_morfaqt';
    $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
}
private function upload_all_file($file_name)
{
    $path='uploads/md/gam3ia_omomia_attach';
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $this->upload->data();
        return $datafile['file_name'];
    }
}
public function read_file($file_name)
{
    $this->load->helper('file');
    $file_path = 'uploads/md/gam3ia_omomia_attach/'.$file_name;
    header('Content-Type: application/pdf');
    header('Content-Discription:inline; filename="'.$file_name.'"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}
private function upload_muli_file($input_name,$folder){
    $filesCount = count($_FILES[$input_name]['name']);
    for($i = 0; $i < $filesCount; $i++){
        $ext = pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION);
        $full_ext = '.'.$ext;
      if ($ext=="jpeg" || $ext=="JPEG"){
          $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.jpg');
      }
      if ($ext=="PNG"){
        $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.png');
    }
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[]=$this->upload_all_file("userFile");
    }
   return $all_img;
}
public function upload_img()
{
    $id = $_SESSION['id'];
    $images = $this->upload_muli_file("files",$id);
    $this->Gam3ia_omomia_model->insert_attach($id, $images);
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    $wared_id = $this->input->post('row');
    $this->delete_upload($id,$wared_id);
    $this->Gam3ia_omomia_model->delete_morfq($id);
}
public function delete_upload($id,$wared_id)
{
    $img = $this->Gam3ia_omomia_model->get_table_by_id('md_all_gam3ia_omomia_morfq',array('id'=>$id));
    if (file_exists( "uploads/md/gam3ia_omomia_attach/" . $img->file)) {
        unlink(FCPATH . "uploads/md/gam3ia_omomia_attach/". $img->file);
    }
}
public function load()
     {
        $id = $_SESSION['id'];
      $data['morfqat'] = $this->Gam3ia_omomia_model->get_table('md_all_gam3ia_omomia_morfq',array('mem_id_fk'=>$id));
         $this->load->view('gam3ia_omomia/gam3ia_views/basic_data/load_morfqat', $data);
     }
     //yara12-5-2020
     //gam3ia_omomia/Gam3ia_omomia/magles_details
     public function magles_details()
     {
        $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
        $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
        $data['all_members'] = $this->All_magls_edara_members_model->select_all_magls_edara_members();
        $data['magls_data'] = $this->All_magls_edara_members_model->get_all_magls_data();
        $data['active_magles'] = $this->Gam3ia_omomia_model->get_all_active_magles();
        $data['title'] = 'اعضاء مجلس الاداره';
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/magles_edara/magles_edara_details';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
     }
     public function load_magles()
     {
         $id=$this->input->post('row_id');
         $data['all_members'] = $this->Gam3ia_omomia_model->select_all_magls_edara_members($id);
        // $this->test( $data['all_members']);
         $this->load->view('gam3ia_omomia/gam3ia_views/magles_edara/search_result', $data);
     }
    /////////////////////////////////news;///////////////////////////////
    public function news_details()
    {
        $id=$this->input->post('row_id');

        $data['records'] = $this->Gam3ia_omomia_model->get_project_details($id);
$data['main_img']=$this->Gam3ia_omomia_model->get_publisher_single_photos($id);

      //  $data['subview'] = 'gam3ia_omomia/gam3ia_views/news/single_news';
        $this->load->view('gam3ia_omomia/gam3ia_views/news/single_news', $data);
    }
    public function all_news()
    {

        $data["result"] = $this->Gam3ia_omomia_model->display_publisher_data('',array());
//$this->test($data["result"]);
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/news/all_news';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }
   
   
   
   
   
   
   
    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }


    public function gam3ia_contact()/*gam3ia_omomia/Gam3ia_omomia/gam3ia_contact*/
    {
        //Gam3ia_omomia_model
        if ((isset($_SESSION['card_num'])) && (!empty($_SESSION['card_num']))) {
            $data['data'] = $this->Gam3ia_omomia_model->get_by_options('md_all_gam3ia_omomia_members', array("card_num" => $_SESSION['card_num']));
            $data['contact_types'] = $this->Gam3ia_omomia_model->get_by_options('md_gam3ia_contact_setting', array("type" => 1));
            if ($this->input->post('add')) {
                $file_attach_name = 'file_attach_name';
                $file = $this->upload_file($file_attach_name, 'md/gam3ia_contact/contact_us');
                $this->Gam3ia_omomia_model->add_contact($file);
                $this->messages('success', 'تم إرسال الطلب الي الجمعية سيقوم الموظف المختص بالتواصل معك ... شكرا لك  ');
                redirect('gam3ia_omomia/Gam3ia_omomia/gam3ia_contact', 'refresh');
            }
        } else {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/gam3ia_contact/gam3ia_contact';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }

    public function contact_messages(){/*gam3ia_omomia/Gam3ia_omomia/contact_messages*/
        if ((isset($_SESSION['card_num'])) && (!empty($_SESSION['card_num']))) {
            $data['records'] = $this->Gam3ia_omomia_model->get_all_messags($_SESSION['card_num']);

            $data['title'] = '  رسائل التواصل  ';
            $data['file_script'] = 'contact_messages';
            $data['subview'] = 'gam3ia_omomia/gam3ia_views/gam3ia_contact/contact_messages';
            $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
        }
        else {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
    }
    public function load_contact_message(){
        $row_id = $this->input->post('row_id') ;
        $data['result']= $this->Gam3ia_omomia_model->get_message_by_id($row_id);

        $this->load->view('gam3ia_omomia/gam3ia_views/gam3ia_contact/load_message', $data);
    }


//-----------------------------------------------------------------------------------

  
    public function managment_general()/*gam3ia_omomia/Gam3ia_omomia/managment_general*/
    {
        $data['all']= $this->Gam3ia_omomia_model->get_emp_Edara_tanfezia();

//        $data['id_page'] = 'managment_general';
        $data['title'] = ' الإدارة التنفيذية  ';
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/about/managment_general';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }

    public function plans()/*gam3ia_omomia/Gam3ia_omomia/plans*/
    {

        $data['plans'] = $this->Gam3ia_omomia_model->get_main_plans();

        $data['title'] = ' الخطة التشغيلية';
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/media_center/plans';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    

    public function read_file_plan($file_name)
    {
        $this->load->helper('file');

        $file_path = 'uploads/files/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    
/*****************************************************************/
    public function Past_egtma3at()/*gam3ia_omomia/Gam3ia_omomia/Past_egtma3at*/
    {

   
        $data['subview'] = 'gam3ia_omomia/gam3ia_views/Gam3ia_omomia/past_omomia_egtima3at/past_omomia_egtima3at';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    }
    
    
    
       public function glasat()/*gam3ia_omomia/Gam3ia_omomia/Past_egtma3at*/
    {

        $data['subview'] = 'gam3ia_omomia/gam3ia_views/Gam3ia_omomia/glasat/omomia_glasat';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);

    } 

    
    
    
    
    
    
}