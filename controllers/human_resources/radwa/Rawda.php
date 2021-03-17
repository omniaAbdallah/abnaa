<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rawda extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
                $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
              $this->load->model('human_resources_model/Employee_model');
              $this->load->model('human_resources_model/Employe_model_tamouh');
              $this->load->model('human_resources_model/Employe_model_rawda/Employe_model_rawda');
     
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in(); 
        $this->load->model('human_resources_model/Finance_employee_model');  
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private  function test_r($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }
     private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
    $config['encrypt_name']=true;
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload($file_name)){
      return  false;
    }else{
        $datafile = $this->upload->data();
        $this->thumb($datafile);
       return  $datafile['file_name'];
    }
}

 private  function upload_image_2($file_name ,$folder = "images"){
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    public function downloads($file) //  // human_resources/Human_resources/downloads
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file); 
        force_download($name, $data); 
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
 
        public function index()
    {
       
       
        $data["last_emp_code"] = $this->Employe_model_rawda->select_last_code();
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');  
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['title'] = 'بيانات الموظف مركز الروضه';
        $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee_radwa/app_js', '', TRUE);
        if ($this->input->post('admin_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/Human_resources/add_employee_radwa/get_depart', $data);
        }elseif ($this->input->post('bank_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/new_employee/get_bank', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/add_employee_radwa/add_employee_rawda';
            $this->load->view('admin_index', $data);
        }
    }
    
    /*    public function index()
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
       $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings', '', '', '', '');
        $data['all_emps'] = $this->Employe_model_rawda->select_allEmployee();
      // $this->test( $data['all_emps']);
        //yara
        $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee_radwa/app_js', '', TRUE);
        //yara
       
       
    
        $data["last_emp_code"] = $this->Employe_model_rawda->select_last_code();
        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['city']= $this->Employee_setting->select_all_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
		//yara
        $data['job_role'] = $this->Difined_model->select_search_key('hr_radwa_department_jobs', 'status', '4');
		//
        $data['admin'] = $this->Employe_model_rawda->select_by();
      
        $data['departs'] = $this->Employe_model_rawda->select_depart();

        $data['department_branch'] = $this->Employe_model_rawda->select_branch_department();
    //    $this->test( $data['department_branch']);
        $data['records'] = $this->Employe_model_rawda->select_allEmployee();
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data["current_hijry_year"] = $this->current_hjri_year();
      
        $data['title'] = 'بيانات الموظف مركز الروضه';
        if ($this->input->post('admin_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/Human_resources/add_employee_radwa/get_depart', $data);
        }elseif ($this->input->post('bank_num')) {
            $data['id'] = $this->input->post('admin_num');
            $this->load->view('admin/administrative_affairs/employee/new_employee/get_bank', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/add_employee_radwa/add_employee_rawda';
            $this->load->view('admin_index', $data);
        }
    }*/


    public function add_personal_data()
    {
        if ($this->input->post('add')) {
          //  $this->test($_FILES);
            $img ='img';
            $img_file = $this->upload_image($img);
           // $this->test($img_file);
            $this->Employe_model_rawda->insert_emp($img_file);
            $this->messages('success','إضافة بيانات الموظف بنجاح');
           redirect('human_resources/radwa/Rawda','refresh');
        }
        $data['title']=" البيانات الاساسيه لموظفين مركز الروضه ";
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/add_employee_rawda';
        $this->load->view('admin_index', $data);
    }
  /*  public function edit_emp($code)
    {
       $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
       
        $data['cities']= $this->Employee_setting->select_areas();//Osama
        $data['ahais']= $this->Employee_setting->select_residentials();
        
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
        $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');   
        $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
        $data['emp'] =$this->Employe_model_rawda->select_search_key('employees', 'emp_code', $code,'emp_type','3')[0];
        $data['city_name']= $this->Employe_model_rawda->get_city_name( $data['emp']->city_id_fk);
        $data['hai_name']= $this->Employe_model_rawda->get_city_name( $data['emp']->hai_id_fk);
           $emp_id= $data['emp']->id;
        $data["personal_data"]=$this->Employe_model_rawda->get_one_employee($emp_id);
        $data['nationality_name']= $this->Employee_model->get_nationality_name($data['emp']->nationality);
        $data['dest_card_name']= $this->Employee_model->get_dest_card_name($data['emp']->dest_card);
        $data['status_name']= $this->Employee_model->get_status_name($data['emp']->status);
        $data['title']="البيانات الأساسية ";
        if ($this->input->post('add')) {
            if($this->input->post('add')){
            $img ='img';
         
            $img_file = $this->upload_image($img);
           // $this->test($img_file);
            $this->Employe_model_rawda->edit_emp($code,$img_file);
            $this->messages('success','تعديل بيانات الموظف بنجاح');
           redirect('human_resources/radwa/Rawda/edit_emp/'.$code,'refresh');
        }}
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/add_employee_rawda';
        $this->load->view('admin_index', $data);
    }
 
 */

  
  /*   public function add_job_data($code)
    {
        $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
        if ($this->input->post('manage')) {
         // $this->test($_POST);
            $this->Employe_model_rawda->insert_manage_emp($code);
            redirect('human_resources/radwa/Rawda/add_job_data/'.$code,'refresh');
        }
        $data['reasons_employees_cases'] =$this->Difined_model->select_search_key('employees_settings', 'type', '18');
        //$this->test($this->Employee_model->get_one_employee($code));
        $data["personal_data"]=$this->Employe_model_rawda->get_one_employee($code);
       // $data['emp'] =$this->Difined_model->select_search_key('employees', 'id', $code)[0];
        $data['emp'] =$this->Employe_model_rawda->select_search_key('employees', 'id', $code,'emp_type','3')[0];
        $data['admin'] = $this->Employe_model_rawda->select_data();
        $data['departs'] = $this->Employe_model_rawda->select_depart();
        $data['department_branch'] = $this->Employe_model_rawda->select_branch_department();
        $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'desc');
      //  $data['direct_all_emps'] = $this->Employee_model->select_all_except('employees', 'id',$code , 'id', 'desc');
       
      $data["direct_all_emps"] =$this->Employe_model_rawda->select_allEmployee();
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['company'] =$this->Difined_model->select_search_key('employees_settings', 'type', '7');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['degree_qual'] =$this->Difined_model->select_search_key('employees_settings', 'type', '14');
        $data['qualification'] =$this->Difined_model->select_search_key('employees_settings', 'type', '15');
       $data['all_maktb'] =$this->Difined_model->select_search_key('employees_settings', 'type', '12');
      //yara
        $data['job_role'] = $this->Difined_model->select_search_key('hr_radwa_department_jobs', 'status', '4');
        ///
        $data['manager_category']= $this->Employe_model_rawda->get_manager_cat();
        if(!empty($data['emp']->reason))
        {
        $data['reason_name']= $this->Employee_model->get_reason_name($data['emp']->reason);
        }
        else
        {
            $data['reason_name']="";

        }
        if(!empty($data['emp']->employee_qualification))
        {
        $data['qualification_name']= $this->Employee_model->get_qualification_name($data['emp']->employee_qualification);
        }
        else
        {
            $data['qualification_name']="";

        }
        if(!empty($data['emp']->employee_degree))
        {
        $data['employee_degree_name']= $this->Employee_model->get_employee_degree_name($data['emp']->employee_degree);
        }
        else
        {
            $data['employee_degree_name']="";

        }

        if(!empty($data['emp']->work_maktb))
        {
        $data['work_maktb_name']= $this->Employee_model->get_employee_degree_name($data['emp']->work_maktb);}
        else
        {
            $data['work_maktb_name']="";

        }
        if(!empty($data['emp']->tamin_company))
        {
        $data['tamin_company_name']= $this->Employee_model->get_work_maktb_name($data['emp']->tamin_company);}
        else
        {
            $data['tamin_company_name']="";

        }
        //
        
        $data['title']=" البيانات الوظيفيه";
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/job_data';
        $this->load->view('admin_index', $data);
    }
    */
    
    

    public function edit_emp($code){
        $data["current_hijry_year"] = $this->current_hjri_year();
        $data['gender_data'] =$this->Difined_model->select_search_key('employees_settings', 'type', '1');
        $data['deyana'] =$this->Difined_model->select_search_key('employees_settings', 'type', '3');
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['emp'] =$this->Employe_model_rawda->select_search_key('employees', 'emp_code', $code,'emp_type','3')[0];
        $data['city_name']= $this->Employe_model_rawda->get_city_name( $data['emp']->city_id_fk);
        $data['hai_name']= $this->Employe_model_rawda->get_city_name( $data['emp']->hai_id_fk);
           $emp_id= $data['emp']->id;
        $data["personal_data"]=$this->Employe_model_rawda->get_one_employee($emp_id);
        $data['nationality_name']= $this->Employee_model->get_nationality_name($data['emp']->nationality);
        $data['dest_card_name']= $this->Employee_model->get_dest_card_name($data['emp']->dest_card);
        $data['status_name']= $this->Employee_model->get_status_name($data['emp']->status);
        $data['title']="البيانات الأساسية ";
        if ($this->input->post('add')) {
            if($this->input->post('add')){
            $img ='img';
            $img_file = $this->upload_image($img);
            $this->Employe_model_rawda->edit_emp($code,$img_file);
            $this->messages('success','تعديل بيانات الموظف بنجاح');
           redirect('human_resources/radwa/Rawda/edit_emp/'.$code,'refresh');
        }}
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/add_employee_rawda';
        $this->load->view('admin_index', $data);
    }

     public function add_job_data($code){
        if ($this->input->post('manage')) {
            $this->Employe_model_rawda->insert_manage_emp($code);
            redirect('human_resources/radwa/Rawda/add_job_data/'.$code,'refresh');
        }
        $data["personal_data"]=$this->Employe_model_rawda->get_one_employee($code);
        $data['emp'] =$this->Employe_model_rawda->select_search_key('employees', 'id', $code,'emp_type','3')[0];
        $data['admin'] = $this->Employe_model_rawda->select_data();
        $data['departs'] = $this->Employe_model_rawda->select_depart();
        $data['department_branch'] = $this->Employe_model_rawda->select_branch_department();
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'desc');
      $data["direct_all_emps"] =$this->Employe_model_rawda->select_allEmployee();
        $data['type_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '5');
        $data['dest_card'] =$this->Difined_model->select_search_key('employees_settings', 'type', '6');
        $data['cat_tamin'] =$this->Difined_model->select_search_key('employees_settings', 'type', '8');
        $data['job_role'] = $this->Difined_model->select_search_key('hr_radwa_department_jobs', 'status', '4');
        $data['manager_category']= $this->Employe_model_rawda->get_manager_cat();
        if(!empty($data['emp']->reason)){
        $data['reason_name']= $this->Employee_model->get_reason_name($data['emp']->reason);
        }else{
       $data['reason_name']="";
        }
        if(!empty($data['emp']->employee_qualification)){
        $data['qualification_name']= $this->Employee_model->get_qualification_name($data['emp']->employee_qualification);
        }else{
            $data['qualification_name']="";
        }
        if(!empty($data['emp']->employee_degree)){
        $data['employee_degree_name']= $this->Employee_model->get_employee_degree_name($data['emp']->employee_degree);
        }
        else{
            $data['employee_degree_name']="";
        }
        if(!empty($data['emp']->work_maktb)){
        $data['work_maktb_name']= $this->Employee_model->get_employee_degree_name($data['emp']->work_maktb);
        } else{
            $data['work_maktb_name']="";
}
        if(!empty($data['emp']->tamin_company)) {
        $data['tamin_company_name']= $this->Employee_model->get_work_maktb_name($data['emp']->tamin_company);
        }else{
            $data['tamin_company_name']="";
        }
        $data['title']=" البيانات الوظيفيه";
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/job_data';
        $this->load->view('admin_index', $data);
    }

 public function print_employee_details(){
    $id=$this->input->post('row_id');
    $this->load->model('Difined_model');
    $this->load->model('human_resources_model/Finance_employee_model');
    $this->load->model('human_resources_model/Employee_print');
    $this->load->model('human_resources_model/employee_setting/Employee_setting');
    $this->load->model('administrative_affairs_models/Prog_main_sitting_mo');
    $this->load->model('human_resources_model/Employe_model_rawda');
    $this->load->model('human_resources_model/Printer_machin_employee_model');
    /*************/
    $data['hai'] = $this->Employee_print->Gethai();
    $data["current_hijry_year"] = $this->current_hjri_year();
    $data['cities']= $this->Employee_setting->select_areas();
    $data['ahais']= $this->Employee_setting->select_residentials();
    $data['nationality'] =$this->Employee_print->GetSettings(2);
    $data['deyana'] =$this->Employee_print->GetSettings(3);
    $data['type_card'] =$this->Employee_print->GetSettings(5);
    $data['dest_card'] =$this->Employee_print->GetSettings(6);
    $data['company'] =$this->Employee_print->GetSettings(7);
    $data['cat_tamin'] =$this->Employee_print->GetSettings(8);
    $data['social_status'] =$this->Employee_print->GetSettings(4);
    $data['gender_data'] =$this->Employee_print->GetSettings(1);
    $data['degree_qual'] =$this->Employee_print->GetSettings(14);
    $data['qualification'] =$this->Employee_print->GetSettings(15);
    $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"","");
    $data['departs'] = $this->Employe_model_tamouh->select_depart();
    $data['department_branch'] = $this->Employe_model_tamouh->select_branch_department();
    $data['contracts'] = $this->Prog_main_sitting_mo->select_sittings(5);
  //  $data['tables'] = $this->Employee_print->select_all($id);
    $data['tables'] = $this->Employee_print->select_all($id,3);
    $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
    $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
    $data['cuts_id'] = $this->Finance_employee_model->getBadalat_id(2);
    $data['bdalat_id'] = $this->Finance_employee_model->getBadalat_id(1);
    $data['allData'] = $this->Finance_employee_model->getAllData($data['tables']['employees']->emp_code)[0];
    $data['markz'] =$this->Difined_model->select_search_key('employees_settings', 'type', '17');
    $data["tickets"]=$this->Difined_model->select_search_key('employees_settings','type',13);
    $data['files_names'] = $this->Difined_model->select_search_key("employees_settings",'type',16);
    $data["printer_machine"]=$this->Printer_machin_employee_model->select_search_key('employees_settings','type',11);
    $this->load->view('admin/Human_resources/print/print_employee_details', $data);
}

public function print_card()
{
    $id=$this->input->post('row_id');
   
    $data["personal_data"]=$this->Employe_model_rawda->get_one_employee($id);
 //   $this->test($data);
    $this->load->view('admin/Human_resources/print/print_card',$data);
}
 
  public function get_tamin_value()
 {
    $emp_id= $this->input->post('emp_id');
     $nationality= $this->Finance_employee_model->get_nationality($emp_id);
     if($nationality==55) {
         echo $this->Finance_employee_model->get_emp_setting(0);
     }else{
         echo $this->Finance_employee_model->get_emp_setting(1);
     }
 }
 /*********************************************/
 
  public function refresh_page()
    {
        
        $this->Finance_employee_model->edit_table_finance();
    }  

    public function getConnection()
    {
        $this->load->model('human_resources_model/employee_setting/Employee_setting');  //Osama
        $all_Donors = $this->Employee_setting->select_all_areas();
        //$this->test( $all_Donors);
        $arr_donors = array();
        $arr_donors['data'] = array();

        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {

                $arr_donors['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_donors->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_donors->id . '" data-city_name="' .  $row_donors->city_name  . '" data-hai_name="' . $row_donors->name . '"
                         data-city_id="' .  $row_donors->city_id  . '" data-hai_id="' . $row_donors->id . '"
                      />',
                      
                       $row_donors->city_name ,
                       $row_donors->name ,
                 
                );
            }
        }
        echo json_encode($arr_donors);


    } 
    //yara
    //YARA
    public function load_nationality()
    {
     
        $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
        $this->load->view('admin/Human_resources/add_employee_radwa/load', $data);
    }
    public function add_nationality()
    
    { 
        
        
       
            $this->Employee_model->add_setting(2);
            $this->messages('success','إضافة ');
          
        
    }
    public function update_nationality()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->update_setting(2,$id);
            $this->messages('success','تعديل ');
          
        
    }
    public function delete_nationality()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->delete_setting($id);
            $this->messages('success','حذف ');
           
        
    }
    public function getById()
{

   
    $id=$this->input->post('id');
    $reason=$this->Employee_model->GetFromGeneral_settings($id,2);
    echo json_encode($reason);
    
}
public function load_status()
    {
     
     $data['social_status'] =$this->Difined_model->select_search_key('employees_settings', 'type', '4');
        $this->load->view('admin/Human_resources/add_employee_radwa/load_status', $data);
    }
    
    public function add_status()
    
    { 
        
        
       
            $this->Employee_model->add_setting_status(4);
            $this->messages('success','إضافة ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
   
    public function getById_status()
    {
    
        
        $id=$this->input->post('id');
        $reason=$this->Employee_model->GetFromGeneral_settings($id,4);
        echo json_encode($reason);
        
    }
    public function update_status()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->update_setting_status(4,$id);
            $this->messages('success','تعديل ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
    public function delete_status()
    
    { 
        
        
        $id=$this->input->post('id');
            $this->Employee_model->delete_setting($id);
            $this->messages('success','حذف ');
           // redirect('md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/'.$id, 'refresh');
        
    }
           public function get_direct_manger()
    {
        $id = $this->input->post('depart_id');
        $data["direct_mangers"] = $this->Employe_model_rawda->get_direct_manger($id);
        echo json_encode($data["direct_mangers"]);

    }
    public function DeleteEmpAll($id){
        $this->Finance_employee_model->DeleteEmpAll($id);
        messages('success','الحذف بنجاح');
        redirect('human_resources/radwa/Rawda','refresh');
    }
    /////yara
    public function data()
    {
          
        $customer =  $this->Employe_model_rawda->select_allEmployee();
       
     
  
        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){ 
                $x++;
                $a=1;
             $emp_type = array('لم تحدد' ,'نشط','موقوف');
                
                
             if ($row->employee_type == 1) {
                $class = "success";
            } elseif ($row->employee_type == 2) {
                $class = "danger";
            } elseif ($row->employee_type == 0) {
                $class = "warning";
            }
                
                
  
                
                
                $arr['data'][] = array(
              /*  if($row['file_update_date'] == 0 ){
                    echo '0';
                }*/
                
                    $a ,
                    $row->emp_code,
                    $row->employee,   
                   $row->phone,
                    
                     $row->card_num,
                    $row->nationality,
                  
                     '
                 
                     <span class="label label-pill label-'. $class .' m-r-15"
                     style="font-size: 12px;">'. $emp_type[$row->employee_type].' </span> ','



                     <div class="btn-group">
                     <button type="button" class="btn btn-danger">اضافه</button>
                     <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                         <span class="caret"></span>
                         <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <ul class="dropdown-menu">




                      <li><a target="_blank"
                                href="'. base_url() .'human_resources/radwa/Rawda/edit_emp/'.$row->emp_code.'">البيانات
                                 الأساسية </a></li>
                         <li><a target="_blank"
                                href="'. base_url() .'human_resources/radwa/Rawda/add_job_data/'.$row->id.'">البيانات
                                 الوظيفيه </a></li>
                                 <li><a href="'. base_url()  .'human_resources/human_resources/financeEmployee/'.$row->id.'">البيانات
المالية </a></li>
<li><a href="'. base_url()  .'human_resources/human_resources/contractEmployee/'.$row->id.'">بيانات
التعاقد </a></li>
<li><a href="'. base_url()  .'human_resources/human_resources/printer_machin_Employee/'.$row->id.'">بيانات
الدوام </a></li>
<li><a href="'. base_url()  .'human_resources/human_resources/employee_files/'.$row->id.'">
المستندات والبطاقات والمهارات </a></li>
<li><a href="'. base_url()  .'human_resources/human_resources/custody/'.$row->id.' ?>">
شاشة العهد </a></li>
                        
                     </ul>
                 </div>



                                                               
                 <a href="'.base_url() .'human_resources/radwa/Rawda/edit_emp/'.$row->emp_code.'?>"><i
                 class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>  
                 
                 
                 <a href="'.base_url() .'human_resources/radwa/Rawda/DeleteEmpAll/'.$row->id.'?>"><i
                 class="fa fa-trash" aria-hidden="true"></i> </a>  
                                                               
                         
                                                <a onclick="print_employee_details('. $row->id .')" title="طباعه"><i
                                            class="fa fa-print"></i></a>

                                           
                                                <a onclick="print_card('. $row->id .')" title="طباعه"><i style="background-color: #0a568c"
                                            class="fa fa-print"></i></a>         
             
             
             
  
   
  '
  
  
  
 

                     
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
          
       //yara
    public function employees_rawda()///human_resources/radwa/Rawda/employees_rawda
    {
        $data['customer_js'] = $this->load->view('admin/Human_resources/add_employee_radwa/app_js', '', TRUE);
        $data['subview'] = 'admin/Human_resources/add_employee_radwa/employees_rawda';
        $this->load->view('admin_index', $data);

    }
    //yara 
}// end class
/* End of file Finance_employee.php */
/* Location: ./application/controllers/human_ resources/Finance_employee.php */