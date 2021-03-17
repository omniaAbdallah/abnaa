<?php
class FamilyCashing extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
    }
    //--------------------------------------------------
    private function test($data = array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //--------------------------------------------------
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
           // $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    //-----------------------------------------------
    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    //-------------------------------------------------
    private function upload_muli_image($input_name){
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
    //-------------------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-------------------------------------------------
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
    //-------------------------------------------------
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>' . $text . '. !</strong> 
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> ' . $text . '.  !</strong> 
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>' . $text . '.!</strong> 
                                                </div>');
        }
    }
    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */
    public function index(){  // FamilyCashing
        $this->load->model('Model_family_cashing');
        //  $this->test($_POST);
       if($this->input->post('ADD') == "ADD"){
       // if($_POST){
            $file=$this->upload_image("bank_attachment");
             $this->Model_family_cashing->insert($file);
             $this->Model_family_cashing->insert_details($this->input->post('sarf_num'));
             $this->message('success','تمت إضافة إذن الصرف');
            redirect('FamilyCashing', 'refresh');
        }else {
            $data['all_data']=$this->Model_family_cashing->select_all();
            $data['all_banks']=$this->Model_family_cashing->select_all_banks();
            $data['last_sarf']=$this->Model_family_cashing->select_last_value_fild();
            $data['bnod_help'] = $this->Model_family_cashing->select_all_bnod();
            $data['title'] = 'إعداد صرف المساعدات المالية   ';
            $data['metakeyword'] = 'إعداد صرف المساعدات المالية    ';
            $data['metadiscription'] = 'إعداد صرف المساعدات المالية    ';
            $data['subview'] = 'admin/family_cash/add_family_cashing';
            $this->load->view('admin_index', $data);
        }    
    }
    //=======================================================
    public function AccordingTo(){
        $this->load->model('Difined_model');
       if($this->input->post('according_to')){
           $according_to=$this->input->post('according_to');
           $data_load=$_POST;
           if($according_to == 1){
                $data_load["family_types"]=$this->Difined_model->select_search_key("family_setting","type","29");
            }elseif($according_to == 2){
               $data_load["education_types"]=$this->Difined_model->select_search_key("family_setting","type","40");
            }
           $this->load->view('admin/family_cash/get_according_to', $data_load);
       }elseif($this->input->post('sarf_type')){
            $data_load["type_sarf"]=$this->input->post('sarf_type');
            $data_load["member_type"]=$this->input->post('member_type');
            $this->load->view('admin/family_cash/load_sarf_type', $data_load);
        }
    }
    //=======================================================
    public function LoadPage(){   // FamilyCashing/LoadPage
        $this->load->model('Model_family_cashing');
        $this->load->model("familys_models/Register");
        $condition_year= $this->current_hjri_year() - 18 ;
        if($this->input->post('sarf_type') == 1  && $this->input->post('member_type')
                  && $this->input->post('mother_id') ){  //  1
            //-------------------------------------
            $member_type=$this->input->post('member_type');
            $method_type=$this->input->post('method_type');
            $data_load=$_POST;
            if($member_type == 1){    //     sarf_type = 1       member_type == 1    
                $Conditions_arr = array("basic.final_suspend" => 4, "basic.file_num" => $this->input->post('mother_id'));
                $basic_data =$data_load['data_table'] = $this->Register->select_where_cashing($Conditions_arr, $condition_year);
                 if($method_type == 4) {
                     $this->load->view('admin/family_cash/load_family', $data_load);
                 }elseif ($method_type == 2){
                     $data_load["all_armal"]= $this->Model_family_cashing->get_data_armal_sum_armal_full_active_mother($basic_data[0]->mother_national_num);
                     $data_load["all_yatem"]= $this->Model_family_cashing->get_data_yatem_full_active($basic_data[0]->mother_national_num);
                     $data_load["all_bale3"]= $this->Model_family_cashing->get_data_bale3_full_active($basic_data[0]->mother_national_num);
                     $data_load["all_mother_family"]= $this->Model_family_cashing->get_mother_selelct($basic_data[0]->mother_national_num);
                     $data_load["all_member_family"]= $this->Model_family_cashing->get_member_select($basic_data[0]->mother_national_num);
                      $this->load->view('admin/family_cash/load_bank_family', $data_load);
                 }
            }elseif($member_type == 3){
                $Conditions_arr=array("basic.final_suspend"=>4);
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_family', $data_load);
            }elseif ($member_type == 2){
                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_some_family', $data_load);
            }


        }
        elseif ($this->input->post('sarf_type')== 2   && $this->input->post('member_type') &&
                     $this->input->post('mother_id')){ //  2
             //-------------------------------------
            $member_type=$this->input->post('member_type');
            $method_type=$this->input->post('method_type');
            $data_load=$_POST;
            if($member_type == 1){  //     sarf_type = 2       member_type == 1

                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $basic_data =$data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                if($method_type == 4) {
                    $this->load->view('admin/family_cash/load_family', $data_load);
                }else if($method_type == 2) {
                    $data_load["all_armal"]= $this->Model_family_cashing->get_data_armal_sum_armal_full_active_mother($basic_data[0]->mother_national_num);
                    $data_load["all_yatem"]= $this->Model_family_cashing->get_data_yatem_full_active($basic_data[0]->mother_national_num);
                    $data_load["all_bale3"]= $this->Model_family_cashing->get_data_bale3_full_active($basic_data[0]->mother_national_num);
                    $data_load["all_mother_family"]= $this->Model_family_cashing->get_mother_selelct($basic_data[0]->mother_national_num);
                    $data_load["all_member_family"]= $this->Model_family_cashing->get_member_select($basic_data[0]->mother_national_num);
                    $this->load->view('admin/family_cash/load_bank_family', $data_load);
                }
            }elseif($member_type == 3){
                $Conditions_arr=array("basic.final_suspend"=>4);
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_family', $data_load);
            }elseif ($member_type == 2){
                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_some_family', $data_load);
            }


        }
        elseif ($this->input->post('sarf_type')== 3   && $this->input->post('member_type') &&
                  $this->input->post('mother_id')  ){ //  3
            //-------------------------------------
            $member_type=$this->input->post('member_type');
            $data_load=$_POST;
            $method_type=$this->input->post('method_type');
            if($member_type == 1){  //     sarf_type = 3       member_type == 1
                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $basic_data =$data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                if($method_type == 4) {
                    $this->load->view('admin/family_cash/load_family', $data_load);
                }else if($method_type == 2) {
                    $data_load["all_armal"]= $this->Model_family_cashing->get_data_armal_sum_armal_full_active_mother($basic_data[0]->mother_national_num);
                    $data_load["all_yatem"]= $this->Model_family_cashing->get_data_yatem_full_active($basic_data[0]->mother_national_num);
                    $data_load["all_bale3"]= $this->Model_family_cashing->get_data_bale3_full_active($basic_data[0]->mother_national_num);
                    $data_load["all_mother_family"]= $this->Model_family_cashing->get_mother_selelct($basic_data[0]->mother_national_num);
                    $data_load["all_member_family"]= $this->Model_family_cashing->get_member_select($basic_data[0]->mother_national_num);
                    $this->load->view('admin/family_cash/load_bank_family', $data_load);
                }
            }elseif($member_type == 3){
                $Conditions_arr=array("basic.final_suspend"=>4);
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_family', $data_load);
            }elseif ($member_type == 2){
                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/load_some_family', $data_load);
            }
         //--------------------------------------------------------------------------------------


        }
        elseif ($this->input->post('sarf_type')== 4   && $this->input->post('member_type') ){ //  2
            //-------------------------------------
            $member_type=$this->input->post('member_type');
            $method_type=$this->input->post('method_type');
            //===============================================
              if($this->input->post('method_type_according_to') == 2){
               $education_id=   $this->input->post('education_according_to');
               $mother_condition=array("m_education_status_id_fk"=>$education_id);
               $member_condition=array("member_study_case"=>$education_id);
              }elseif ($this->input->post('method_type_according_to') == 3){
                  $age_from_key=$this->input->post('from_age_according_to');
                  $age_to_key=$this->input->post('to_age_according_to');
                  $year_from_condition=$this->current_hjri_year() - $age_from_key ;
                  $year_to_condition=$this->current_hjri_year() - $age_to_key ;
                   $mother_condition=array("m_birth_date_hijri_year <="=>$year_from_condition,
                                           "m_birth_date_hijri_year >="=>$year_to_condition);
                   $member_condition=array("member_birth_date_hijri_year  <="=>$year_from_condition,
                                            "member_birth_date_hijri_year  >="=>$year_to_condition);
              }
            //===============================================
            $data_load=$_POST;
            if($member_type == 1){  //     sarf_type = 4       member_type == 1
                if($method_type == 2) {
                    $Conditions_arr = array("basic.final_suspend" => 4, "basic.file_num" => $this->input->post('mother_id'));
                    $basic_data =$data_load['data_table'] = $this->Register->select_where_cashing($Conditions_arr, $condition_year);
                    $data_load["all_armal"]= $this->Model_family_cashing->get_data_armal_sum_armal_full_active_mother($basic_data[0]->mother_national_num ,$mother_condition);
                    $data_load["all_yatem"]= $this->Model_family_cashing->get_data_yatem_full_active($basic_data[0]->mother_national_num , $member_condition);
                    $data_load["all_bale3"]= $this->Model_family_cashing->get_data_bale3_full_active($basic_data[0]->mother_national_num , $member_condition);
                    $data_load["all_mother_family"]= $this->Model_family_cashing->get_mother_selelct($basic_data[0]->mother_national_num);
                    $data_load["all_member_family"]= $this->Model_family_cashing->get_member_select($basic_data[0]->mother_national_num);
                    $this->load->view('admin/family_cash/load_bank_family', $data_load);
                }elseif($method_type == 4) {
                    $Conditions_arr = array("basic.final_suspend" => 4, "basic.file_num" => $this->input->post('mother_id'));
                    $data_load['data_table'] = $this->Model_family_cashing->get_family_caching_member($Conditions_arr,$mother_condition, $member_condition);
                    $this->load->view('admin/family_cash/get_family_according_to', $data_load);
                }
            }elseif($member_type == 3){
                $Conditions_arr = array("basic.final_suspend" => 4);
                $data_load['data_table'] = $this->Model_family_cashing->get_family_caching_member($Conditions_arr,$mother_condition, $member_condition);
                $this->load->view('admin/family_cash/get_family_according_to', $data_load);
            }elseif ($member_type == 2){
                $Conditions_arr=array("basic.final_suspend"=>4,"basic.file_num"=>$this->input->post('mother_id'));
                $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
                $this->load->view('admin/family_cash/get_family_according_to', $data_load);
            }
            //--------------------------------------------------------------------------------------
        }
        elseif ($this->input->post('sarf_num_fk')){
            $sarf_num=$this->input->post('sarf_num_fk');
             $data_load['all_banks']=$this->Model_family_cashing->select_all_banks();
             $data_load["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
             $data_load["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
             $this->load->view('admin/family_cash/load_details', $data_load);
        }
        elseif ($this->input->post('sarf_num_fk_attach')){
            $data_load["sarf_num_fk_attach"]=$sarf_num=$this->input->post('sarf_num_fk_attach');
            $data_load["sarf_attachments"]=$this->Model_family_cashing->select_sarf_attach($sarf_num);
            $this->load->view('admin/family_cash/load_attachment', $data_load);
        }
        elseif ($this->input->post('type_sarf') && $this->input->post('update_national_num')){
            $data_load=$_POST;
            $Conditions_arr=array("basic.suspend"=>4,"basic.file_num"=>$this->input->post('update_national_num'));
            $data_load['data_table']=$this->Register->select_where_cashing($Conditions_arr,$condition_year);
            $this->load->view('admin/family_cash/load_update_table', $data_load);
        }
        elseif( $this->input->post('file_num_check') ){
            $family_data = $this->input->post('file_num_check');
            echo $this->Model_family_cashing->check_family($family_data);
        }
        elseif ($this->input->post("sarf_num_fk_tabadol")){
            $sarf_num=$this->input->post('sarf_num_fk_tabadol');
            $data_load['all_banks']=$this->Model_family_cashing->select_all_banks();
            $data_load["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
            $data_load["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
            $data_load["sarf_attachments"]=$this->Model_family_cashing->select_sarf_attach($sarf_num);
            $this->load->view('admin/family_cash/load_details_exchange', $data_load);
        }

    }
  /*  public function ahmed(){
          $this->load->model('Model_family_cashing');
        $this->test($this->Model_family_cashing->select_sarf_detals(2));
    }*/
    //=======================================================
    public  function SarfAttachments($sarf_num){
        if($this->input->post("Add_Attach") == "Add_Attach"){
            $this->load->model('Model_family_cashing');
            $images=$this->upload_muli_image("attachment");
            $this->Model_family_cashing->insert_sarf_attach($sarf_num,$images);
            $this->message('success','تمت إضافة المرفقات');
            redirect('FamilyCashing', 'refresh');
        }
    }
    //=======================================================
    public  function  DeleteAttachments(){  //  FamilyCashing/DeleteAttachments/
        $id = $this->input->post("id_delete_attach");
        $this->load->model('Model_family_cashing');
        $this->Model_family_cashing->delete_sarf_attach($id);
    }
    //=======================================================
    public function downloads($file){ //  FamilyCashing/downloads/
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/images/'.$file);
        force_download($name, $data);
    }
    //=======================================================
    public function printSarf($sarf_num){
        $this->load->model('Model_family_cashing');
        $data['records'] = $this->Model_family_cashing->printSarf($sarf_num);
        $this->load->view('admin/family_cash/print',$data);
    }
    public function PrintSarfType($sarf_num,$method_type){
         $this->load->model('Model_family_cashing');
             $data_load['all_banks']=$this->Model_family_cashing->select_all_banks();
             $data_load["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
             $data_load["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
             if($method_type == 4){
                $this->load->view('admin/family_cash/print_sarf_4', $data_load);
             }else{
                $this->load->view('admin/family_cash/print_sarf_2', $data_load);
             }   
    }
    //=======================================================
    public function DeleteFamilyCashing($sarf_num){
        $this->load->model('Model_family_cashing');
        $this->Model_family_cashing->delete_sarf($sarf_num);
        $this->message('success','تم حذف اذن الصرف ');
        redirect('FamilyCashing', 'refresh');
    }
    //=======================================================
    public function UpdateFamilyCashing($sarf_num){  //  FamilyCashing/UpdateFamilyCashing/
        $this->load->model('Model_family_cashing');
        if($this->input->post('UPDATE') == "UPDATE"){
            if(sizeof($this->input->post('all_num')) > 0){
                $this->Model_family_cashing->insert_details($sarf_num);
            }
            $total_value=$this->Model_family_cashing->get_sarf_total_value($sarf_num);
            $this->Model_family_cashing->update($sarf_num ,$total_value);
            $this->message('success','تم تعديل اذن الصرف ');
            redirect('FamilyCashing', 'refresh');
        }
        $data['all_banks']=$this->Model_family_cashing->select_all_banks();
        $sarf_data=$data["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
        $data["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
            if($sarf_data["type_sarf"]){
                $data["person_values"]=$this->Model_family_cashing->get_person_values($sarf_num);
            }
        $data['bnod_help'] = $this->Model_family_cashing->select_all_bnod();    
        $data['title'] = 'تعديل إعداد صرف المساعدات المالية    ';
        $data['metakeyword'] = 'تعديل إعداد صرف المساعدات المالية      ';
        $data['metadiscription'] = 'تعديل إعداد صرف المساعدات المالية      ';
        $data['subview'] = 'admin/family_cash/add_family_cashing';
        $this->load->view('admin_index', $data);
    }
    //=======================================================
    public function DeleteCashingDetials(){
        $this->load->model('Model_family_cashing');
        $id_details=$this->input->post('id_details');
        $this->Model_family_cashing->delete_sarf_detals_id($id_details);
    }
     //=======================================================
    public function UpdatePresence($id){
        $this->load->model('Model_family_cashing');
        if($this->input->post('ADD') == "ADD"){
         $this->Model_family_cashing->update_presence($id);
            $this->message('success','تم حفظ رقم المحضر  ');
            redirect('FamilyCashing', 'refresh');
        }
    }
    public function saad($id){
         $this->load->model('Model_family_cashing');
          $sarf_num=$id;
             $data_load['all_banks']=$this->Model_family_cashing->select_all_banks();
             $data_load["sarf_data"]=$this->Model_family_cashing->getByArray($sarf_num);
             $data_load["sarf_details"]=$this->Model_family_cashing->select_sarf_detals($sarf_num);
             $this->test( $data_load);
    }
    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */

}// END CLASS