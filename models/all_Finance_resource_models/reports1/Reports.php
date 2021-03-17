<?php
class Reports extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }

       $this->load->model('all_Finance_resource_models/reports/Reports_Model');
        $this->load->model('all_Finance_resource_models/sponsors/Sponsors_model');
              $this->load->model('Difined_model');

      
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/


    }

    private  function test($data=array()){
        // $this->load->model('all_Finance_resource_models/reports/Reports_Model');
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays=round($time/(60*60*24));
        $HYear=round($TDays/354.37419);
        $Remain=$TDays-($HYear*354.37419);
        $HMonths=round($Remain/29.531182);
        $HDays=$Remain-($HMonths*29.531182);
        $HYear=$HYear+1389;
        $HMonths=$HMonths+10;$HDays=$HDays+23;
        if ($HDays>29.531188 and round($HDays)!=30){
            $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);
        }else{
            $HDays=Round($HDays);
        }
        if ($HMonths>12) {
            $HMonths=$HMonths-12;
            $HYear = $HYear+1;
        }
        $NowDay=$HDays;
        $NowMonth=$HMonths;
        $NowYear=$HYear;
        $MDay_Num = date("w");
        if ($MDay_Num=="0"){
            $MDay_Name = "الأحد";
        }elseif ($MDay_Num=="1"){
            $MDay_Name = "الإثنين";
        }elseif ($MDay_Num=="2"){
            $MDay_Name = "الثلاثاء";
        }elseif ($MDay_Num=="3"){
            $MDay_Name = "الأربعاء";
        }elseif ($MDay_Num=="4"){
            $MDay_Name = "الخميس";
        }elseif ($MDay_Num=="5"){
            $MDay_Name = "الجمعة";
        }elseif ($MDay_Num=="6"){
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";


        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).

        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).

        $HDays; تاريخ اليوم (1).

        $HMonths; الشهر (3).

        $HYear; السنة الهجرية (1430).



        */
        return $HYear;


    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
        }
    }


    public function sponsor_report(){ //all_Finance_resource/reports/Reports/sponsor_report
    $data['title']="تقرير";
    $this->load->model('all_Finance_resource_models/settings/Finance_resource_setting');
      $data['gender_data'] =$this->Sponsors_model->GetFromEmployees_settings(1);
      $data['kfalat_types'] = $this->Difined_model->select_all('fr_kafalat_types_setting','','',"id","asc");
 
       $data['kafala_status'] = $this->Difined_model->select_search_key("fr_kafalat_kafel_status",'type',1);
       $data['halat_kafel'] = $this->Finance_resource_setting->all_frhk_settings('fr_kafalat_kafel_status',2);
        $data['f2a'] = $this->Difined_model->select_search_key('fr_sponser_donors_setting','type',1);

        $data['subview'] = 'admin/all_Finance_resource_views/reports/sponsor_report_view';

        $this->load->view('admin_index', $data);
    }
public function check_knum()
{
    $k_num = $this->input->post('k_num');
    $data= $this->Reports_Model->get_kafel($k_num);
    echo  $data;
    return;
}

public function report_result()
{
    $data['records']=$this->Reports_Model->get_all();

    //print_r($data['records'][33]->person_data);
    $data['valu']=$this->input->post('valu');


    $this->load->view('admin/all_Finance_resource_views/reports/load_page', $data);
}
public function member_reports()
{
    $data['title']="تقرير";
    $data['subview'] = 'admin/all_Finance_resource_views/reports/member_report_view';

    $this->load->view('admin_index', $data);
}

public function get_report_member()
{
    $type_member=$this->input->post('type_member');
    $fe2a=$this->input->post('fe2a');
    $data_all['current_year'] =$this->current_hjri_year();
  
/*
  
    //================المكفولين=========================
    $data['f_member']=$this->Reports_Model->get_member_fr_khfalat();
    $data['mother']=$this->Reports_Model->get_mother_fr_khfalat();

    //===================================================الغير مكفةلين===================================
    $data['f_member_non']=$this->Reports_Model->get_f_member();
    $data['f_mother_non']=$this->Reports_Model->get_f_mother();

    //================================================= الارامل المكفولين وغير المكفولين===========================================
    $data['all_armls']=$this->Reports_Model->get_all_arml();
    //================================================= الايتام المكفولين وغير المكفولين===========================================

    $data['all_aytam']=$this->Reports_Model->get_all_aytam();
    //echo $type_member . $fe2a;

*/


    if($type_member==0 && $fe2a==0) {
        $data_all['all_armls'] = $this->Reports_Model->get_all_arml();
        $data_all['all_aytam'] = $this->Reports_Model->get_all_aytam();
        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
        return;
    }elseif ($type_member==1&& $fe2a==0)
    {
        $data_all['all_aytam']=$this->Reports_Model->get_f_member();
        $data_all['all_armls']=$this->Reports_Model->get_f_mother();
        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
    }elseif($fe2a==1&&$type_member==1){
        $data_all['all_aytam']=$this->Reports_Model->get_f_member();

        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
    }
    elseif($fe2a==1&&$type_member==0){
        $data_all['all_aytam']=$this->Reports_Model->get_all_aytam();

        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
    }
    elseif($fe2a==2&&$type_member==1){
        $data_all['all_armls']=$this->Reports_Model->get_f_mother();

        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
    }
    elseif($fe2a==2&&$type_member==0){
        $data_all['all_armls']=$this->Reports_Model->get_all_arml();

        $this->load->view('admin/all_Finance_resource_views/reports/load_all_page', $data_all);
    }
    elseif($fe2a==0 && $type_member==2){
        $data_all['all_armls']=$this->Reports_Model->get_member_fr_khfalat();
        $data_all['all_aytam']=$this->Reports_Model->get_mother_fr_khfalat();
        $this->load->view('admin/all_Finance_resource_views/reports/get_all_m', $data_all);
    }
    elseif($fe2a==1&&$type_member==2){
        $data_all['all_aytam']=$this->Reports_Model->get_mother_fr_khfalat();

        $this->load->view('admin/all_Finance_resource_views/reports/get_all_m', $data_all);
    }
    elseif($fe2a==2&&$type_member==2){
        $data_all['all_armls']=$this->Reports_Model->get_mother_fr_khfalat();

        $this->load->view('admin/all_Finance_resource_views/reports/get_all_m', $data_all);
    }
    
    

}
}