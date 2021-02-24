<?php
class Employee_salaries extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('system_management/Groups');
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('human_resources_model/employee_forms/Employee_salaries_model');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
     public function my_var(){
      
     // $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
     // $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');          
        
  echo    $select_last_mosayer =  $this->Employee_salaries_model->select_last_mosayer();
        
     }
    
    
    public function sysat_setting(){ //human_resources/employee_forms/Employee_salaries/sysat_setting
      //  $this->load->model('human_resources_model/Mosayer_sysat_model');
        $data['table'] = $this->Employee_salaries_model->get_records();
        if(isset($_POST['add'])){
            $this->Employee_salaries_model->insert_sysat();
          //  $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/employee_forms/Employee_salaries/sysat_setting', 'refresh');
        }
        $data['title'] = 'اعدادات مسير المرتبات';
        $data['subview'] = 'admin/Human_resources/employee_forms/mosayer_v/sysat/mosayer_sysat_view';
        $this->load->view('admin_index', $data);
    }
    public function mosayer(){ // human_resources/employee_forms/Employee_salaries
    
  
        $data['title']= 'مسير الرواتب' ;
       //  $data['all_emp']= $this->Employee_salaries_model->Employee_date();
        $data['all_emps']= $this->Employee_salaries_model->Employee_date_new();
        $data['all_bdlat']= $this->Employee_salaries_model->get_all_badlat();
      //$this->test($data['all_emp']);
      $data['mosayer_month'] = $this->Employee_salaries_model->get_mosayer_month();
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/test_employee_salaries_view';
        $this->load->view('admin_index',$data);
    }
    public function emp(){ // human_resources/employee_forms/Employee_salaries/emp
        $data['title']= 'الموظفين القائمين علي العمل' ;
       //  $data['all_emp']= $this->Employee_salaries_model->Employee_date();
        $data['all_emps']= $this->Employee_salaries_model->get_all_emps_bank();
     // $this->test($data['all_emps']);
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/all_emps_arkam_banks';
        $this->load->view('admin_index',$data);
    }
    public function index(){ // human_resources/employee_forms/Employee_salaries
        $data['title']= 'مسير الرواتب' ;
        // echo $this->Employee_salaries_model->current_date_mosayer('','month');
         $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
        $data['mosayer_month'] = $this->Employee_salaries_model->get_month();
      $data['halet_taghez'] = $this->Employee_salaries_model->get_halet_taghez(date('m'));
      //  $data['mosayer_month_p'] = $this->Employee_salaries_model->current_date_mosayer('','month');
      //  $this->test($data['mosayer_month_p']);
       //  $data['all_emp']= $this->Employee_salaries_model->Employee_date();
        $data['current_month_mosayer'] = $this->Employee_salaries_model->current_date_mosayer('','month');
        $data['all_emps']= $this->Employee_salaries_model->Employee_date_new();
        $data['all_bdlat']= $this->Employee_salaries_model->get_all_badlat();
      //  echo date('m');
     // $this->test($data['all_emps']);
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/Employee_salaries_view';
        $this->load->view('admin_index',$data);
    }
            public function get_load_mosayer()
    {
       $data_load['all_emps']= $this->Employee_salaries_model->Employee_date_new();
        $data_load['all_bdlat']= $this->Employee_salaries_model->get_all_badlat();
          $data_load['title']= ' تجهيز مسير الرواتب' ;
        $this->load->view('admin/Human_resources/employee_forms/mosayer_v/load_employee_salaries_view', $data_load);  
    }
          public function process()
    {
        $all_emps= $this->Employee_salaries_model->Employee_date_new();
       //  $this->test($all_emps); mosayer_month
           if (isset($all_emps) && !empty($all_emps)){
               $mosayer_rkm = $this->Employee_salaries_model->get_mosayer_rkm();/*18-8-20-om*/
            $egmali_rateb_asasy       = 0;
            $egmali_badal_sakn         = 0;
            $egmali_badal_mowaslat     = 0;
            $egmali_badal_etsal        = 0;
            $egmali_badal_e3asha       = 0;
            $egmali_badal_tabe3a_amal  = 0;
            $egmali_tot_edafi          = 0;
            $egmali_badal_taklef       = 0;
            $egmali_tot_mokafaa       = 0;
            $egmali_tot_entdab       = 0;
            $egmali_tot_okraa_esthkaq = 0;
            $egmali_total_esthkak   = 0;
            $egmali_khasm_keyab        = 0;
            $egmali_agaza_bdon_rateb   = 0;
            $egmali_khasm_takher       = 0;
            $egmali_khasm_gezaa        = 0;
            $egmali_khasm_tamen        = 0;
            $egmali_khasm_solaf        = 0;
            $egmali_tot_okraa_khasm = 0;
            $egmali_total_khsomat  = 0;        
            $egmali_safi = 0;
         foreach ($all_emps as $emp){
            $emp_pay_method       = $emp->emp_pay_method;
            $ayam_amal       = $emp->ayam_amal;
            $sa3at_amal       = $emp->sa3at_amal;
            $agr_sa3a       = $emp->agr_sa3a; 
            $emp_bank_id_fk       = $emp->emp_bank_id_fk;
            $emp_bank_account_num       = $emp->emp_bank_account_num;
            $bank_code       = $emp->bank_code;   
            $emp_name_in_bank      = $emp->emp_name_in_bank;  
        $rateb_asasy       = $emp->rateb_asasy;
        $badal_sakn        = $emp->badal_sakn;
        $badal_mowaslat    = $emp->badal_mowaslat;
        $badal_etsal       = $emp->badal_etsal;  
        $badal_e3asha      = $emp->badal_e3asha;  
        $badal_tabe3a_amal = $emp->badal_tabe3a_amal;
        $tot_edafi         = 0;
        $badal_taklef      = $emp->badal_taklef;
        $tot_mokafaa       = $emp->current_month_mokfaa;
        $tot_entdab       =  $emp->badal_entdab;
        $tot_okraa_esthkaq   = 0;
        $total_esthkak = ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
        $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab +  $tot_edafi + $tot_okraa_esthkaq  );
        $khasm_keyab        = 0;
        $agaza_bdon_rateb   = 0;
        $khasm_takher       = 0; 
        $khasm_gezaa        = 0; 
        $khasm_tamen        = $emp->khasm_tamen;
        //$khasm_solaf        = $emp->current_month_solaf;
        $khasm_solaf        = ($emp->current_month_solaf +  $emp->current_month_solaf_ta3gel);
        $tot_okraa_khasm = 0;
        $total_khsomat = ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher +$tot_okraa_khasm );         
        $safi = ($total_esthkak - $total_khsomat);
        /*************/
        $egmali_rateb_asasy       += $emp->rateb_asasy;
        $egmali_badal_sakn        += $emp->badal_sakn;
        $egmali_badal_mowaslat    += $emp->badal_mowaslat;
        $egmali_badal_etsal       += $emp->badal_etsal;  
        $egmali_badal_e3asha      += $emp->badal_e3asha;  
        $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;
        $egmali_tot_edafi         += 0;
        $egmali_badal_taklef      += $emp->badal_taklef;
        $egmali_tot_mokafaa       += $emp->current_month_mokfaa;
        $egmali_tot_entdab         +=$emp->badal_entdab;
        $egmali_tot_okraa_esthkaq +=0;
        $egmali_total_esthkak += ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
        $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab + $tot_okraa_esthkaq +   $tot_edafi  );
        $egmali_khasm_keyab        = 0;
        $egmali_agaza_bdon_rateb   = 0;
        $egmali_khasm_takher       = 0;
        $egmali_khasm_gezaa        = 0;
        $egmali_khasm_tamen        += $emp->khasm_tamen;
       // $egmali_khasm_solaf        += $emp->current_month_solaf;;
        $egmali_khasm_solaf        += ($emp->current_month_solaf +   $emp->current_month_solaf_ta3gel);
        $egmali_tot_okraa_khasm    +=0;
        $egmali_total_khsomat += ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher + $egmali_tot_okraa_khasm );         
        $egmali_safi += ($total_esthkak - $total_khsomat);        
          $details['mosayer_rkm_fk'] = $mosayer_rkm;/*18-8-20-om*/
          $details['emp_name']=$emp->emp_name;
           $details['emp_id']=$emp->id;
           $details['emp_code']=$emp->emp_code;
          $details['mosma_wazefy_n']=$emp->new_mosma_wazefy;
          $details['rateb_asasy']=$rateb_asasy;
          $details['badal_sakn']=$badal_sakn;
          $details['badal_mowaslat']=$badal_mowaslat;
          $details['badal_etsal']=$badal_etsal;
          $details['badal_e3asha']=$badal_e3asha;
          $details['badal_tabe3a_amal']=$badal_tabe3a_amal;
          $details['tot_edafi']=$tot_edafi;
          $details['badal_taklef'] =$badal_taklef;
          $details['tot_mokafaa']=$tot_mokafaa;
          $details['tot_entdab']=$tot_entdab;
          $details['tot_okraa_esthkaq']=$tot_okraa_esthkaq;
          $details['total_esthkak']=$total_esthkak;
          $details['khasm_keyab']=$khasm_keyab;
          $details['agaza_bdon_rateb']=$agaza_bdon_rateb;
          $details['khasm_takher']=$khasm_takher;
          $details['khasm_gezaa']=$khasm_gezaa;
          $details['khasm_tamen']=$khasm_tamen;
          $details['khasm_solaf']=$khasm_solaf;
          $details['tot_okraa_khasm']=$tot_okraa_khasm;
          $details['total_khsomat']=$total_khsomat;
          $details['safi']=$safi;
            $details['emp_pay_method']=$emp_pay_method;
            $details['ayam_amal']=$ayam_amal;
            $details['sa3at_amal']=$sa3at_amal;
            $details['agr_sa3a']=$agr_sa3a;
            $details['emp_bank_id_fk']=$emp_bank_id_fk;
            $details['emp_bank_account_num']=$emp_bank_account_num;
            $details['bank_code']=$bank_code;
            $details['emp_name_in_bank']=$emp_name_in_bank;  
           $details['taghez'] = 'yes';
           $details['taghez_date_ar'] =  date('Y-m-d');
           $details['taghez_time'] = date('h:i A');
         $this->db->insert('hr_mosayer_details', $details);
         }
 $data['egmali_rateb_asasy']=$egmali_rateb_asasy;
 $data['egmali_badal_sakn']=$egmali_badal_sakn;
 $data['egmali_badal_mowaslat']=$egmali_badal_mowaslat;
 $data['egmali_badal_etsal']=$egmali_badal_etsal;
 $data['egmali_badal_e3asha']=$egmali_badal_e3asha;
 $data['egmali_badal_tabe3a_amal']=$egmali_badal_tabe3a_amal;
 $data['egmali_tot_edafi']=$egmali_tot_edafi;
 $data['egmali_badal_taklef']=$egmali_badal_taklef;
 $data['egmali_tot_mokafaa']=$egmali_tot_mokafaa;
 $data['egmali_tot_entdab']=$egmali_tot_entdab;
 $data['egmali_tot_okraa_esthkaq']=$egmali_tot_okraa_esthkaq;
 $data['egmali_total_esthkak']=$egmali_total_esthkak;
 $data['egmali_khasm_keyab']=$egmali_khasm_keyab;
 $data['egmali_agaza_bdon_rateb']=$egmali_agaza_bdon_rateb;
 $data['egmali_khasm_takher']=$egmali_khasm_takher;
 $data['egmali_khasm_gezaa']=$egmali_khasm_gezaa;
 $data['egmali_khasm_tamen']=$egmali_khasm_tamen;
 $data['egmali_khasm_solaf']=$egmali_khasm_solaf;
 $data['egmali_tot_okraa_khasm']=$egmali_tot_okraa_khasm;
 $data['egmali_total_khsomat']=$egmali_total_khsomat;
 $data['egmali_safi']=$egmali_safi;
         $data['mosayer_date_ar'] =  date('Y-m-d');
        $data['mosayer_date'] =  strtotime( $data['mosayer_date_ar']);
      //  $data['mosayer_month'] = $this->Employee_salaries_model->get_month($data['mosayer_date_ar']);
      
       $data['mosayer_month'] = 1;  
      //  $data['mosayer_month'] = $this->Employee_salaries_model->current_date_mosayer('','month');
        $data['mosayer_year'] = $this->Employee_salaries_model->current_date_mosayer('','year');
        
        $data['mosayer_rkm'] = $mosayer_rkm;
       $data['taghez'] = 'yes';
       $data['taghez_date_ar'] =  date('Y-m-d');
       $data['taghez_time'] = date('h:i A');
 $this->db->insert('hr_mosayer', $data);
         }
    }
    public function egraa_mosayer(){ // human_resour ces/emp loyee_forms/Employee_salaries
       $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
        $data['title']= 'إجراءات علي مسير رواتب الموظفين خلال شهر ' ;
        $data['last_mosayer'] = $this->Employee_salaries_model->select_last_mosayer();
         $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
        // $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
        // $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');
         
         $current_month_mosayer = date('m');
         $current_year_mosayer  = date('Y');
         
        $data['mosayer_rkm_fk'] = $this->Employee_salaries_model->select_last_mosayer();
        
        $data['check_month_in_mosayer'] = $this->Employee_salaries_model->get_current_month_in_mosayer($current_month_mosayer,$current_year_mosayer);
        
        
        
        $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
        $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($select_last_mosayer);
      $data["markez_taklfa"] = $this->Employee_salaries_model->getAll_markez(array('id!=' => 0,'level'=>2));
    $data['edara'] = $this->Employee_salaries_model->get_table('employees', array(),'edara_n');
    $data['mosayer_fe2at'] = $this->Employee_salaries_model->get_table_past('hr_mosayer_fe2at');
     //$this->test($data['all_mosayer_data']);
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/egrat_mosayer_view';
        $this->load->view('admin_index',$data);
    }
      public function current_mosayer(){ // human_resour ces/emp loyee_forms/Employee_salaries
        $data['title']= 'إجراءات علي مسير رواتب شهر ' ;
        $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
        $data['all_mosayer_data_tabadol']= $this->Employee_salaries_model->get_all_mosayer_details($select_last_mosayer,3);
        $data['all_mosayer_data_sheeks']= $this->Employee_salaries_model->get_all_mosayer_details($select_last_mosayer,2);
        //$data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data(1);
     //$this->test($data['all_mosayer_data']);
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/current_mosayer_view';
        $this->load->view('admin_index',$data);
    }  
/*********************************************************************/

public function get_mosayer_egraat(){
    $data['title']= 'مسير الاجراءات' ;
    $data['emp_code'] = $this->input->post('emp_code');
    $data['row_id'] = $this->input->post('row_id');
    $data['emp_name'] = $this->input->post('emp_name');
    $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');
    $data['badl_code'] = $this->input->post('badl_code');
    $data['ancient_value'] = $this->input->post('ancient_value');
    $data['mosayer_rkm_fk'] = $this->input->post('mosayer_rkm_fk');
     $data['mosayer_egraat_data'] = $this->Employee_salaries_model->get_all_egrat_mosayer_by_emp_id($data['badl_code'],  $data['mosayer_rkm_fk'], $data['row_id']);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/load_mosayer_egraat',$data);
}
public function insert_mosayer_egraat(){
    $data= $this->Employee_salaries_model->save_egrat();
    echo json_encode($data);
    return;
  
}

    function get_pop_detailes()
{
    $mosayer_rkm_fk = $this->input->post('mosayer_rkm_fk');
    $emp_id = $this->input->post('emp_id');
    $code = $this->input->post('code');
    $process_id = $this->input->post('process_id');
    if($process_id == 0){
       $data['mosayer_sysat'] =''; 
    }elseif($process_id == 1){
       $data['mosayer_sysat'] = $this->Employee_salaries_model->get_mosayer_sysat('absent');   
    }elseif($process_id == 2){
      $data['mosayer_sysat'] = $this->Employee_salaries_model->get_mosayer_sysat('takher');
    }elseif ($process_id == 3) {
        $data['mosayer_sysat'] = $this->Employee_salaries_model->get_mosayer_sysat('sa3at_edafi');
        $data['sysat_setting'] = $this->Employee_salaries_model->get_sysat_setting('badl_hours_edafi');
    }
    $data['code'] = $code;
    $data['mosayer_data'] = $this->Employee_salaries_model->get_all_mosayer_details_by_emp_id($mosayer_rkm_fk, $emp_id);
    $data['mosayer_egraat_data'] = $this->Employee_salaries_model->get_all_egrat_mosayer_by_emp_id($code, $mosayer_rkm_fk, $emp_id);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/load_pop_detailes_view', $data);
}

function save_egrat()
{
    if ($this->input->post('add')) {
        $data= $this->Employee_salaries_model->save_egrat();
        echo json_encode($data);
        return;
    }
}
function delete_egraa()
{
    $egraa_id = $this->input->post('egraa_id');
    $this->Employee_salaries_model->delete_egraa($egraa_id);
}
    public function sarf_mosayer(){ // human_resources/employee_forms/Employee_salaries/sarf_mosayer
        $data['title']= ' صرف مسير رواتب الموظفين خلال شهر' ;
         $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
         $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
      
        $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
         $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');
        $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
    // $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details($select_last_mosayer);
        
        $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($select_last_mosayer);
        //YARA16-8-2020
        $data["markez_taklfa"] = $this->Employee_salaries_model->getAll_markez(array('id!=' => 0,'level'=>2));
       // $data['edara'] = $this->Employee_salaries_model->get_table('employees', array());
         $data['edara'] = $this->Employee_salaries_model->get_table('employees', array(),'edara_n');
         //YARA16-8-2020
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/sarf/sarf_mosayer_view';
        $this->load->view('admin_index',$data);
    }
       //NEW_FUNC
    public function make_sarf_search()
{
      $data['choosed_pay_method_id_fk'] = $this->input->post('pay_method_id_fk');
      
    $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
           $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
         $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');
   $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_search_new($select_last_mosayer);
  //  $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
    
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/sarf/get_sarf_mosayer_view', $data);
}
    public function search_mosayer(){ // human_resources/employee_forms/Employee_salaries
        $data['title']= ' طباعة مسير رواتب الموظفين خلال شهر ' ;
        $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
        $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
        
        $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
         $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');
        
      //  $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
    $data['mosayer_rkm_fk']=$select_last_mosayer;   
 $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month_all($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
        $data['last_mosayer'] = $this->Employee_salaries_model->select_last_mosayer();      
       $data['check_month_in_mosayer'] = $this->Employee_salaries_model->get_current_month_in_mosayer($current_month_mosayer,$current_year_mosayer);
         
        $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($select_last_mosayer);
        //YARA16-8-2020
        $data["markez_taklfa"] = $this->Employee_salaries_model->getAll_markez(array('id!=' => 0,'level'=>2));
       // $data['edara'] = $this->Employee_salaries_model->get_table('employees', array());
         $data['edara'] = $this->Employee_salaries_model->get_table('employees', array(),'edara_n');
         //YARA16-8-2020
       $data['mosayer_fe2at'] = $this->Employee_salaries_model->get_table_past('hr_mosayer_fe2at');
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/search_mosayer_view';
        $this->load->view('admin_index',$data);
    }
    
    
        public function search_mosayer_hesabat(){ // human_resources/employee_forms/Employee_salaries
        $data['title']= ' طباعة مسير رواتب الموظفين خلال شهر ' ;
        $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
        $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
        
        $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
         $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');
        
      //  $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
    $data['mosayer_rkm_fk']=$select_last_mosayer;   
 $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month_all($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
        $data['last_mosayer'] = $this->Employee_salaries_model->select_last_mosayer();      
       $data['check_month_in_mosayer'] = $this->Employee_salaries_model->get_current_month_in_mosayer($current_month_mosayer,$current_year_mosayer);
         
        $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($select_last_mosayer);
        //YARA16-8-2020
        $data["markez_taklfa"] = $this->Employee_salaries_model->getAll_markez(array('id!=' => 0,'level'=>2));
       // $data['edara'] = $this->Employee_salaries_model->get_table('employees', array());
         $data['edara'] = $this->Employee_salaries_model->get_table('employees', array(),'edara_n');
         //YARA16-8-2020
       $data['mosayer_fe2at'] = $this->Employee_salaries_model->get_table_past('hr_mosayer_fe2at');
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/search_mosayer_view';
        $this->load->view('admin_index',$data);
    }
    
    
       //NEW_FUNC
    public function make_search()
{
    
   $data['mosayer_fe2at']= $this->input->post('mosayer_fe2at');
    
    $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
    $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_search($select_last_mosayer);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/get_search_mosayer_view', $data);
}

public function print_card()
{
     $this->load->model('Model_family_cashing');
    $data['mosayer_fe2at']= $this->input->post('mosayer_fe2at');
     $data['pay_method_id_fk']= $this->input->post('pay_method_id_fk');
     $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
    /*   $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details(1);
       $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data(1);*/

             $data["modeer_mali"]=$this->Model_family_cashing->get_emp_assigns(501);

             $data["mohaseb"]=$this->Model_family_cashing->get_emp_assigns(502);

             $data["modeer_hr"]=$this->Model_family_cashing->get_emp_assigns(401);

             $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 
             
       
    $data['main_mosayer'] =  $this->Employee_salaries_model->get_main_mosayer_data($select_last_mosayer);
    $data['all_mosayer_data'] = $this->Employee_salaries_model->get_all_mosayer_details_search($select_last_mosayer);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/print_mosayer_view', $data);
}
/******************************************/
    public function actions_mosayer(){ // human_resources/employee_forms/Employee_salaries/print_card
    $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
        $data['title']= ' إجراءات تمت علي مسير وراتب الموظفين خلال شهر  ' ;
        $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));
        $data['all_mosayer_actions']= $this->Employee_salaries_model->get_all_mosayer_actions($select_last_mosayer);
         //YARA16-8-2020
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/actions_mosayer/all_actions_mosayer_view';
        $this->load->view('admin_index',$data);
    }
/**
 *tbadol 
 * 
 */ 

    public function all_mosayar_emps(){  //human_resources/employee_forms/Employee_salaries/all_mosayar 
        $this->load->model('Model_family_cashing');
        $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
          $data['egmali'] = $this->Employee_salaries_model->get_sum_cheetDetailes($select_last_mosayer); 
          $data['current_month']= $this->Employee_salaries_model->current_month_mosayer(date('m'));                                                                        //  family_controllers/Exchange/allSarf
         //  $data['all_data']= $this->Employee_salaries_model->get_all_mosayer();
            $data['all_data']= $this->Employee_salaries_model->get_all_mosayer_details_rwateb($data['current_month']->month,$data['current_month']->year);
           $data['raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(1);
        $data['naeb_raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(2);
        $data['amin_sandok'] = $this->Model_family_cashing->get_magls_edara_assigns(3);
          $data['manager_name'] = $this->Model_family_cashing->get_magles_edara(1);
          $data['naeb_name'] = $this->Model_family_cashing->get_magles_edara(2);
          $data['amin_name'] = $this->Model_family_cashing->get_magles_edara(3);
           $data['title'] = ' مسير الرواتب ';
           $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/tbadol/all_mosayar_emps_view';
           $this->load->view('admin_index', $data);
       }
public function tahwel_sarf()
{
    $mosayer_rkm_fk=$this->input->post('id');
    $choosed_pay_method_id_fk=$this->input->post('choosed_pay_method_id_fk');
    
    $this->Employee_salaries_model->update_all_mosayer_details_search($mosayer_rkm_fk,$choosed_pay_method_id_fk);
}
public function all_mosayar_emps_search(){  //human_resources/employee_forms/Employee_salaries/all_mosayar 
    $this->load->model('Model_family_cashing');
      $month= $this->input->post('month');                         
      $year= $this->input->post('year');   
      
       $data['all_data']= $this->Employee_salaries_model->get_all_mosayrat_for($month,$year);
      
      //  $data['all_data']= $this->Employee_salaries_model->get_all_mosayer_details_rwateb_new($month,$year);
     //   $this->test( $data['all_data']);
       $data['title'] = ' مسير الرواتب ';
       $this->load->view('admin/Human_resources/employee_forms/mosayer_v/tbadol/search_mosayar_emps_view', $data);
   }
public function all_mosayar(){  //human_resources/employee_forms/Employee_salaries/all_mosayar 
 $this->load->model('Model_family_cashing');
    $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
   $data['egmali'] = $this->Employee_salaries_model->get_sum_cheetDetailes($select_last_mosayer); 
                                                                                                //  family_controllers/Exchange/allSarf
   // $data['all_data']= $this->Employee_salaries_model->get_all_mosayer();
    $data['all_data']= $this->Employee_salaries_model->get_all_mosayer_tabadols_for();
    
    
    $data['raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(1);
 $data['naeb_raes_magls_edara'] = $this->Model_family_cashing->get_magls_edara_assigns(2);
 $data['amin_sandok'] = $this->Model_family_cashing->get_magls_edara_assigns(3);
   $data['manager_name'] = $this->Model_family_cashing->get_magles_edara(1);
   $data['naeb_name'] = $this->Model_family_cashing->get_magles_edara(2);
   $data['amin_name'] = $this->Model_family_cashing->get_magles_edara(3);
    $data['title'] = ' مسير الرواتب ';
    $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/tbadol/all_mosayar_view';
    $this->load->view('admin_index', $data);
}

    public function LoadPage()
{
    $mosayer_rkm=$this->input->post('mosayer_rkm');
    $f2a=$this->input->post('f2a');
    if($f2a==2)
    {
    $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_new($mosayer_rkm,2);
    }
    else if($f2a==3){
        $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_new($mosayer_rkm,3);
    }
    $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($mosayer_rkm);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/tbadol/details_mosayer_view', $data);
}
public function update_amin_manager($id)
{
    $this->Employee_salaries_model->update_amin_manager($id);
redirect('human_resources/employee_forms/Employee_salaries/all_mosayar', 'refresh');
}
public function updateSarfToAproved($id){
    if($_POST['make_approve']){
       $this->Employee_salaries_model->make_approve($id);
       redirect('human_resources/employee_forms/Employee_salaries/all_mosayar', 'refresh');
    }
}
private function upload_file($file_name)
{
    $config['upload_path'] = 'uploads/files';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size']    = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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
public  function add_sarf_file($mosayer_rkm){ 
    if ($this->input->post('ADD')){
        $file =$this->upload_file('file_downloded');
        $this->Employee_salaries_model->insert_file($file,$mosayer_rkm);
        redirect('human_resources/employee_forms/Employee_salaries/all_mosayar', 'refresh');
    }
}
public function read_file($file_name) 
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
public function SarfPrint($id){   
    $data['egmali'] = $this->Employee_salaries_model->get_sum_cheetDetailes($id); 
    $data['emps_num'] = $this->Employee_salaries_model->get_emp_tabdol_num($id);
    $data['sarf_data']=$this->Employee_salaries_model->get_all_mosayer_data($id);
    $data['main_data']=$this->Employee_salaries_model->select_from_main_data();
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/tbadol/mosayar_print', $data);
}
  /*********************************************************************/
    function exportBankCheat($id){
        $this->load->helper('download');
        //$this->load->model('familys_models/exchange_models/Sarf_model');
        //$file =BASEPATH."/../"."asisst/exports/".time().".txt";
        $file =BASEPATH."/../"."asisst/exports/template.txt";
        $fileencoded =iconv("UTF-8", "cp1256//TRANSLIT", $file);
        $bankid = $this->db->select("mainBank")->from("main_data")->get()->row();
        $staff = $this->Employee_salaries_model->cheetDetailes($id);
        $sarf = $this->Employee_salaries_model->getById($id);
       $egmali = $this->Employee_salaries_model->get_sum_cheetDetailes($id); 
      //  $bnod_help = $this->Sarf_model->getBand_help_name($sarf['bnod_help_fk']);
       // echo $bnod_help['bnod_help_fk'];
      //  echo $bnod_help;
     //  $this->test($staff);
        $dueDate = date("Ymd",$sarf["due_date"]);
        $cashdate = date("Ymd",$sarf["cashing_date"]);
        $total=str_pad(number_format((float)$egmali, 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
        $countofstaff = str_pad(sizeof($staff), 8, '0',  STR_PAD_LEFT) ;
        //$this->test($countofstaff);
        $bank = str_pad($bankid->mainBank, 15, '0',  STR_PAD_LEFT) ;
        $head = $dueDate.$cashdate.$total.$countofstaff.$bank;
        //  file_put_contents($file, "000000000000"."G".$head."                                                                   I"."\r\n", FILE_APPEND);
       $str="000000000000"."G".$head."                                                                   I"."\r\n";
       //$str="000000000000"."G".$head."                                                                   I"."\r\n";
        $filedata = fopen($fileencoded, 'w+');
        fwrite($filedata, $str);
        fclose($filedata);
        foreach ($staff as $st){
            $id = str_pad($st->emp_code, 12, '0',  STR_PAD_LEFT) ;
            $bankcode = $st->bank_code;
            $bankaccount = str_pad($st->emp_bank_account_num, 24, ' ',  STR_PAD_LEFT) ;
            $name=mb_str_pad($st->emp_name_in_bank, 50, " ");
            $nameencoded = iconv('UTF-8', 'WINDOWS-1256', $name);
            $salary=str_pad(number_format((float)$st->safi, 2, '', ''), 15, '0',  STR_PAD_LEFT) ;
            $nationalid=str_pad($st->card_num, 15, '0',  STR_PAD_LEFT) ;
            $body = $id.$bankcode.$bankaccount.$nameencoded.$salary.$nationalid."0000";
            $myfile = fopen($fileencoded, "a") or die("Unable to open file!");
            $txt = $body."           ";
            fwrite($myfile,$txt."\r\n" );
            fclose($myfile);
        }
        $data = file_get_contents($fileencoded); // Read the file's contents
       $type = 0;
     /*  if ($sarf["bnod_help_fk"]>=1){
           $type = "Family";
       }else{
           $type = "Employee";
       }
       */
      $sarf_num = $sarf["mosayer_rkm_fk"]; 
       // $name = $bnod_help.date("MY").$type.$sarf_num.".txt";
       //$name = $bnod_help.$type.date("MY").$sarf_num.".txt";
       $name = 'SalaryEmp'.$sarf_num.date("MY").".txt";
        force_download($name,$data);
      unlink($file);
    }
   
    
    
    
    
     public function delete_mosayer($mosayer_fk){
        $this->Employee_salaries_model->delete_mosayer($mosayer_fk);
       // $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('human_resources/employee_forms/Employee_salaries');
    } 
    
    
/*****************************************************************/

  
    public function employee_salaries_transformations()
    {
        // $this->test($_SESSION);
        $data['coming_records'] = $this->Employee_salaries_model->select_from_hr_mosayer_orders(array('current_to_user_id' => $_SESSION['user_id']));
        // $this->test($data['coming_records']);

        $data["personal_data"] = $this->Employee_salaries_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data['user_orders'] = $this->Employee_salaries_model->select_from_hr_mosayer_orders(array('emp_id_fk' => $_SESSION['emp_code']));

//$this->test($data['coming_records']);
        $data['title'] = 'طلبات المسير المحولة';

        if ($this->input->post('tab_id')) {
            $data['tab_id'] = array($this->input->post('tab_id'));
            // $this->test($data['tab_id']);
            $this->load->view('admin/Human_resources/employee_forms/mosayer_v/all_transformations_salaries/all_transformations', $data);
        } else {
            $data['tab_id'] = array('mine_1', 'follow_1', 'comming_1');
            //$this->test($data['tab_id']);
            $data['title'] = 'طلبات المسير المحولة';
            $data['subview'] = 'admin/Human_resources/employee_forms/mosayer_v/all_transformations_salaries/all_transformations';
            $this->load->view('admin_index', $data);
        }


    }


    /*12-8-20-om*/

    public function Get_transformation_form()
    {

        $data_load["mosayer_data"] = $this->Employee_salaries_model->get_mosayer_data(array('mosayer_rkm' => $this->input->post('mosayer_rkm')));
        if (!empty($data_load["mosayer_data"])) {
            $emp_where = array(1 => 502, 2 => 501, 3 => 101);
            if (key_exists($data_load["mosayer_data"]->level, $emp_where)) {
                $data_load["employees_data"] = $this->Employee_salaries_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data_load["mosayer_data"]->level],'person_suspend'=>1));
            }
            $data_load['emp_data'] = $this->Employee_salaries_model->get_emp_data($data_load["mosayer_data"]->emp_id_fk);
        }
        // $this->test($data_load);
        $this->load->view('admin/Human_resources/employee_forms/mosayer_v/all_transformations_salaries/transformation_form_load_page', $data_load);
    }

    public function save_Transform()
    {
        // $this->test($_POST);
        $this->Employee_salaries_model->save_from_transfomation();
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
        } else {
//            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }
    }

    public function Get_transformDetails()
    {
        $mosayer_rkm = $this->input->post('mosayer_rkm');

        $data_load["mosayer_data"] = $this->Employee_salaries_model->get_mosayer_data(array('mosayer_rkm' => $mosayer_rkm));
        $data_load["mosayer_data_history"] = $this->Employee_salaries_model->get_mosayer_data_history(array('mosayer_rkm_fk' => $mosayer_rkm));
        $this->load->view('admin/Human_resources/employee_forms/mosayer_v/all_transformations_salaries/transformDetails_load_page', $data_load);


    }
/*10-10-20-om*/
    public function mosayer_details()
    {
        $mosayer_rkm = $this->input->post('mosayer_rkm');

        $data_load['all_mosayer_data'] = $this->Employee_salaries_model->get_all_mosayer_details_new($mosayer_rkm,3);
        $data_load['all_mosayer_egmali'] = $this->Employee_salaries_model->get_all_mosayer_data($mosayer_rkm);
       $this->load->view('admin/Human_resources/employee_forms/mosayer_v/tbadol/details_mosayer_view', $data_load);


    }

    public function motab3a_details() 
    {
        $data_load["mosayer_data_history"] = $this->Employee_salaries_model->get_mosayer_data_history(array('mosayer_rkm_fk' => $this->input->post('mosayer_rkm')));

//         $this->test($data_load['mosayer_data_history']);
        //echo"<pre>"; print_r($data_load["personal_data"]); echo"</pre>"; die;
        $this->load->view('admin/Human_resources/employee_forms/mosayer_v/all_transformations_salaries/motab3a_details_load_page', $data_load);


    }

    function update_seen_mosayer()
    {
        $this->Employee_salaries_model->update_seen_mosayer();

    }

    /*13-10-20*-om*/
    function make_transformation()
    {
        $mosayer_rkm = $this->input->post('mosayer_rkm');
        $from_user = $this->Employee_salaries_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        if (!empty($from_user)) {
            $data['current_from_user_id'] = $from_user->user_id;
            $data['current_from_user_name'] = $from_user->employee;
            $data['emp_id_fk'] = $from_user->emp_id;
        }
        $to_user = $this->Employee_salaries_model->get_user_data2(array('users.emp_code' => $from_user->manger));
        if (!empty($to_user)) {
            $data['current_to_user_id'] = $to_user->user_id;
            $data['current_to_user_name'] = $to_user->employee;
        }
        $level_data = $this->Employee_salaries_model->select_transformation_setting_by_level(1);
        // $this->test($level_data);
        if (!empty($level_data)) {
            $data['level_title'] = $level_data->title;
            $data['level'] = 1;
        }
        $this->db->where('mosayer_rkm', $mosayer_rkm)->update('hr_mosayer', $data);
    }  
/**
 *@المرفقات
 */     
function get_attachment()
{
    $mosayer_rkm = $this->input->post('mosayer_rkm_fk');
    $data_load['folder_path'] = 'uploads/human_resources/mosayer';
    $data_load["mosayer_attechment"] = $this->Employee_salaries_model->get_attachment(array('mosayer_rkm_fk' => $mosayer_rkm));
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/attachment_table_view', $data_load);
}
function delete_morfaq()
{
    $mosayer_rkm = $this->input->post('mosayer_rkm_fk');
    $row_id = $this->input->post('row_id');
    $data_load['folder_path'] = 'uploads/human_resources/mosayer';
    $this->Employee_salaries_model->delete_morfaq($row_id, $mosayer_rkm, $data_load['folder_path']);
    $data_load["mosayer_attechment"] = $this->Employee_salaries_model->get_attachment(array('mosayer_rkm_fk' => $mosayer_rkm));
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/attachment_table_view', $data_load);
}
function save_attachment()
{
    $mosayer_rkm = $this->input->post('mosayer_rkm_fk');
    $images = $this->upload_all_file("files", 'uploads/human_resources/mosayer');
    $this->Employee_salaries_model->save_attachment($images, $mosayer_rkm);
    $data_load['folder_path'] = 'uploads/human_resources/mosaye';
    $data_load["mosayer_attechment"] = $this->Employee_salaries_model->get_attachment(array('mosayer_rkm_fk' => $mosayer_rkm));
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/attachment_table_view', $data_load);
}
private function upload_all_file($file_name, $folder = "uploads/images")
{
    //  $config['upload_path'] = 'uploads/archive';
    $config['upload_path'] = $folder;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
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
public function read_file_attechment($file_name)
{
    $this->load->helper('file');
    $file_path = 'uploads/human_resources/mosayer/' . $file_name;
    header('Content-Type: application/pdf');
    header('Content-Discription:inline; filename="' . $file_name . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}    
/**
 *@نهاية 
 */   
 
 
 /**
 *@تامينات 
 */  
 
 
 
 
//yara21-10-2020
public function all_mosayar_social_insurance(){  
    //human_resources/employee_forms/Employee_salaries/all_mosayar_social_insurance 


      //        $current_month_mosayer = $this->Employee_salaries_model->current_date_mosayer('','month');
       //  $current_year_mosayer = $this->Employee_salaries_model->current_date_mosayer('','year');

        $data['all_data']= $this->Employee_salaries_model->get_all_mosayer_insurace();
      //  $this->test($data['all_data']);

       
       $data['title'] = ' كشف التأمينات الاجتماعية';
       $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/social_insurance/all_mosayar_emps_insurace';
       $this->load->view('admin_index', $data);
   }
   
public function show_insurance_emps($mosayer_rkm_fk){  //human_resources/employee_forms/Employee_salaries/show_insurance_emps 

      //  $data['all_emps_insurance']= $this->Employee_salaries_model->get_all_mosayer_details_social_insurace($mosayer_rkm_fk);
$data['all_emps_insurance']= $this->Employee_salaries_model->get_all_mosayer_emps_insurace($mosayer_rkm_fk);

       
       $data['title'] = ' كشف التأمينات الاجتماعية';
       $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/social_insurance/show_insurance_emps';
       $this->load->view('admin_index', $data);
   }   
   
   
//    LoadPage_social_insurance
public function LoadPage_social_insurance()
{
    $this->load->model('Difined_model');
    $mosayer_rkm=$this->input->post('mosayer_rkm');
    $data['mosayer_rkm']=$this->input->post('mosayer_rkm');
    $f2a=$this->input->post('f2a');
    $data['f2a']=$this->input->post('f2a');
    if($f2a==1)
    {
    $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_social_insurace($mosayer_rkm,2);
  //  $this->test($data['all_mosayer_data']);
    }
    else if($f2a==2){
        $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_social_insurace($mosayer_rkm,3);
      //  $this->test($data['all_mosayer_data']);
    }
    $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
    $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($mosayer_rkm);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/social_insurance/details_mosayer_view', $data);
}
// print_mosayar_details

public function print_mosayar_details()
{
    $this->load->model('Difined_model');
    $mosayer_rkm=$this->input->post('mosayer_rkm');
    $f2a=$this->input->post('f2a');
    if($f2a==1)
    {
    $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_social_insurace($mosayer_rkm,2);
    }
    else if($f2a==2){
        $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_social_insurace($mosayer_rkm,3);
    }
    $data['nationality'] =$this->Difined_model->select_search_key('employees_settings', 'type', '2');
    $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($mosayer_rkm);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/social_insurance/mosayar_print', $data);
}
 /**
 *@نهاية 
 */

public function eslam(){
    
  $arr =   $this->Employee_salaries_model->get_all_mosayer_emps(2);
 /* foreach($arr as $w){
    echo $w->emp_name;
  }
  */
   echo $this->Employee_salaries_model->Get_mosayer_month_year(2,'mosayer_month');
  echo '<pre>';
  print_r($arr);
}   
   
   
public function do_sarf()
{
    $mosayer_rkm_fk = $this->input->post('mosayer_rkm');
    
    $mosayer_month = $this->Employee_salaries_model->Get_mosayer_month_year($mosayer_rkm_fk,'mosayer_month');
    $mosayer_year = $this->Employee_salaries_model->Get_mosayer_month_year($mosayer_rkm_fk,'mosayer_year');
    
    $this->Employee_salaries_model->do_sarf($mosayer_rkm_fk);
    $this->Employee_salaries_model->update_quest_solaf($mosayer_rkm_fk,$mosayer_month,$mosayer_year);
     $this->Employee_salaries_model->update_quest_solaf_ta3gel($mosayer_month,$mosayer_year);
    
    
}


/*******************************************/

function make_sand_sarf($mosayer_rkm)
{
    $this->load->model('finance_accounting_model/box/vouch_sarf/Vouch_sarf_model');
    $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
    $this->load->model('finance_accounting_model/dalel/Dalel_model');
    $data['banks_setting'] = $this->Dalel_model->getBanks();
    $data['banks'] = $this->Employee_salaries_model->get_by('banks_settings');
    $data['box'] = $this->Vouch_sarf_model->getBox(array('type' => 2));
    $records = $this->Vouch_sarf_model->getAllAccounts(array('id!=' => 0));
    
     $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_tabadols_sums($mosayer_rkm);
    //$data['all_mosayer_egmali'] = $this->Employee_salaries_model->get_all_mosayer_data($mosayer_rkm);
    if (!empty($data['all_mosayer_egmali'][0])) {
        $data['total_value'] = $data['all_mosayer_egmali'][0]->sum_all_tahwel;
    }else{
        $data['total_value']=0;
    }
    
    // $this->test($data['all_mosayer_egmali']);
    $data['arabicNum'] = convertNumber($data['total_value']);
    $data['tree'] = $this->buildTree($records);
    $data['geha_table'] = $this->Vouch_sarf_model->select_gehat();
    $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
    $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();
    $data['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
    $data['bank_accounts_arr'] = $this->Vouch_sarf_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk' => 19), '');
    $data['hesab_data'] = $this->Vouch_sarf_model->select_all_by_condition(array('type' => 2, 'society_main_banks_account.bank_id_fk' => 19, 'society_main_banks_account.account_id_fk' => 2), '');
    $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
    $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
    $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!=' => 0)) + 1;
    $data['title'] = 'إضافة سند صرف';
    $data['subview'] = 'admin/Human_resources/employee_forms/mosayer_v/tbadol/vouch_sarf';
    $this->load->view('admin_index', $data);

}

public function buildTree($elements, $parent = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element->parent == $parent) {
            $children = $this->buildTree($elements, $element->id);
            if ($children) {
                $element->subs = $children;
            }
            $branch[$element->id] = $element;
        }
    }
    return $branch;
}
  
  
function allmosayer($mosayer_rkm,$mosayer_month,$mosayer_year)
{

        
      $data['title']= ' عرض تفاصيل مسير رواتب الموظفين خلال شهر   ' ;
        $select_last_mosayer = $mosayer_rkm;
   
        $current_month_mosayer = $mosayer_month;
         $current_year_mosayer = $mosayer_year;
        
      //  $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
    $data['mosayer_rkm_fk']=$select_last_mosayer;   
 $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_current_month_all($select_last_mosayer,null,$current_month_mosayer,$current_year_mosayer);
        $data['last_mosayer'] = $this->Employee_salaries_model->select_last_mosayer();      
       $data['check_month_in_mosayer'] = $this->Employee_salaries_model->get_current_month_in_mosayer($current_month_mosayer,$current_year_mosayer);
         
        $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data($select_last_mosayer);
        //YARA16-8-2020
        $data["markez_taklfa"] = $this->Employee_salaries_model->getAll_markez(array('id!=' => 0,'level'=>2));
       // $data['edara'] = $this->Employee_salaries_model->get_table('employees', array());
         $data['edara'] = $this->Employee_salaries_model->get_table('employees', array(),'edara_n');
         //YARA16-8-2020
       $data['mosayer_fe2at'] = $this->Employee_salaries_model->get_table_past('hr_mosayer_fe2at');
        $data['subview']= 'admin/Human_resources/employee_forms/mosayer_v/mosayer_details';
        $this->load->view('admin_index',$data);
}  
      public function make_search_in_mosayer()
{
    
   $data['mosayer_fe2at']= $this->input->post('mosayer_fe2at');
    
    $mosayer_rkm =  $this->input->post('mosayer_rkm');
   // $select_last_mosayer = $this->Employee_salaries_model->select_last_mosayer();
    $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details_search_data($mosayer_rkm);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/get_search_mosayer_view', $data);
}


public function print_card_in_mosayer()
{
    
    $data['mosayer_fe2at']= $this->input->post('mosayer_fe2at');
     $data['pay_method_id_fk']= $this->input->post('pay_method_id_fk');
     $mosayer_rkm = $this->input->post('mosayer_rkm');
    /*   $data['all_mosayer_data']= $this->Employee_salaries_model->get_all_mosayer_details(1);
       $data['all_mosayer_egmali']= $this->Employee_salaries_model->get_all_mosayer_data(1);*/
    $data['all_mosayer_data'] = $this->Employee_salaries_model->get_all_mosayer_details_search_data($mosayer_rkm);
    $this->load->view('admin/Human_resources/employee_forms/mosayer_v/print_mosayer_view', $data);
}
  
    
}