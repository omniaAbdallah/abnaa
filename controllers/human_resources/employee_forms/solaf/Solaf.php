<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solaf extends MY_Controller
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
        $this->load->model('human_resources_model/Finance_employee_model');


        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');

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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    //
    public function get_num_solf()
    {
        $emp_id = $this->input->post('emp_id');
        $solf = $this->Solaf_requests_model->get_num_solf($emp_id);
        $data['num_solf'] = sizeof($solf);
        if (!empty($solf)) {
            $data['last_date'] = $solf[0]->t_rkm_date_m;
        } else {
            $data['last_date'] = date('Y-m-d');
        }

        echo json_encode($data);
    }

    public function get_had_solfa()
    {
        $emp_id = $this->input->post('emp_id');
        $had_solfa = $this->Solaf_requests_model->get_had_solfa($emp_id);
        echo json_encode($had_solfa);
    }

    public function make_transformation_direct()
    {
        $solf_id = $this->input->post('solf_id');
        $transform_solf = $this->Solaf_requests_model->make_transformation_direct($solf_id);
        echo json_encode($transform_solf);
    }

    public function getConnection_emp()
    {
        $all_Emps = $this->Solaf_requests_model->get_all_emp();
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-id="' . $row_emp->id . '"
                        data-edara_n="' . $row_emp->edara_n . '"
                        data-edara_id="' . $row_emp->edara_id . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->qsm_id . '"
                         data-hdd_solfa="' . $row_emp->hdd_solfa . '"
                       />',
                    $row_emp->emp_code,
                    $row_emp->employee,
                    $row_emp->edara_n,
                    $row_emp->qsm_n,
                    $row_emp->hdd_solfa

                  
                );
            }
        }
        echo json_encode($arr_emp);


    }

   public function get_had_solfa_new()
    {
        $emp_id = $this->input->post('emp_id');
        $had_solfa = $this->Solaf_requests_model->get_had_solfa_new($emp_id);

        echo json_encode($had_solfa);
    }
    public function get_date()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $datetime2 = date_create($end_date);
        $datetime1 = date_create($start_date);
        $interval = date_diff($datetime1, $datetime2);
        $data['day'] = $interval->format('%R%a') + 1;
        $day1 = 1;
        $data['back_date'] = date('Y-m-d', strtotime($end_date . +$day1 . 'days'));

        print_r(json_encode($data));

    }


    public function add_solaf()//human_resources/employee_forms/solaf/Solaf/add_solaf
    {
//echo $_SESSION['emp_code'];
        if ($this->input->post('add')) {
            $this->Solaf_requests_model->insert_solfa();
            $this->messages('success', 'تم الحفظ بنجاح');

            if ($this->input->post('from_profile')) {
                //redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
                  redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
            } else {
                redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            }
        }
//yara
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
        $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm();
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['items'] = $this->Solaf_requests_model->get_all_solfa_new();
        $data['title'] = "طلب سلفه";
        $data['solfa'] = $this->Solaf_requests_model->get_had_solfa_new();
        
        $data['solaf_setting'] = $this->Solaf_requests_model->get_solaf_setting();
        
       // $this->test($data['solaf_setting']);
        
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/solaf/add_solaf', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
            $this->load->view('admin_index', $data);
        }
    }

    public function GetReplacementEmployee($emp_id)
    {
        $all_emp = $this->Solaf_requests_model->GetReplacementEmployee($emp_id);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_emp)) {
            foreach ($all_emp as $row_emps) {

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emps->id . '"
                         ondblclick="GetMemberName(this)"   id="member' . $row_emps->id . '"
                          data-name="' . $row_emps->employee . '"
                          data-id="' . $row_emps->id . '"
                          data-code="' . $row_emps->emp_code . '"
                      data-mob="' . $row_emps->phone . '"/>',
                    $row_emps->emp_code,
                    $row_emps->employee,
                    $row_emps->phone,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }

    public function edit_solaf($id = false)
    {
        if ($this->input->post('add')) {

            $this->Solaf_requests_model->update_by_id($id);
            $this->messages('success', 'تم التعديل بنجاح');
            if ($this->input->post('from_profile')) {
              //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
                 redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
            } else {
                redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
            }

        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        //yara
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
//$data['suspend']=$this->Solaf_requests_model->get_solf_suspend();
//
        $data['title'] = "تعديل طلب اجازه";
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
        //   $this->test($data['emp_data']);
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();


        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
//        $this->test($data['item']);
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/solaf/add_solaf', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_solaf';
            $this->load->view('admin_index', $data);
        }
    }


    public function delete_solfa($id, $from = false)
    {
        $this->Solaf_requests_model->delete_from_table($id, 'hr_solaf');
        $this->Solaf_requests_model->delete_from_table_solaf($id, 'hr_solaf_quest');
        $this->messages('success', 'تم الحذف بنجاح');

        if (!empty($from) && ($from == 1)) {
           // redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
             redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/Solaf/add_solaf', 'refresh');
        }

    }

//new
    public function get_solaf_details()
    {
        $rkm = $this->input->post('rkm');
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm_new($rkm);

       $data['quests']=$this->db->where('t_rkm_fk',$rkm)->get('hr_solaf_quest')->result_array();
        $emp_id = $data['rows'][0]->emp_id_fk;
        //$this->test( $emp_id);
        $data["personal_data"] = $this->Employee_model->get_one_employee($emp_id);
        //  $this->test($data['personal_data']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/detail_page', $data);
    }


    public function update_quest(){

        $id = $this->input->post('id');
        $data['paid']="yes";
        $this->db->where('id',$id)->update('hr_solaf_quest',$data);

    }
    public function get_solfa_print()
    {
            $this->load->model('Model_family_cashing');
        $rkm = $this->input->post('rkm');
      //$rkm = 13;
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($rkm);
        $data['emp_data'] = $this->Solaf_requests_model->get_emp_data($data['rows'][0]->emp_id_fk);
        $data['UserName'] = $this->Solaf_requests_model->getUserName($_SESSION['user_id']);

        //    $this->test($data);

             $data["modeer_mali"]=$this->Model_family_cashing->get_emp_assigns(501);
             $data["mohaseb"]=$this->Model_family_cashing->get_emp_assigns(502);
             $data["modeer_hr"]=$this->Model_family_cashing->get_emp_assigns(401);
             $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 
             

        $this->load->view('admin/Human_resources/employee_forms/solaf/print_page', $data);
    }


    public function get_solfa_print_ta3gel()
    {
        $this->load->model('Model_family_cashing');
        $rkm = $this->input->post('rkm');
     // $rkm = 8;
        $data['rows'] = $this->Solaf_requests_model->all_ta3gel_solfa_details($rkm);
        $data['emp_data'] = $this->Solaf_requests_model->get_emp_data($data['rows'][0]->emp_id_fk);
        $data['UserName'] = $this->Solaf_requests_model->getUserName($_SESSION['user_id']);

        //    $this->test($data);

             $data["modeer_mali"]=$this->Model_family_cashing->get_emp_assigns(501);
             $data["mohaseb"]=$this->Model_family_cashing->get_emp_assigns(502);
             $data["modeer_hr"]=$this->Model_family_cashing->get_emp_assigns(401);
             $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 
             

        $this->load->view('admin/Human_resources/employee_forms/solaf/print_page_ta3gel', $data);
    }



    //yara
    public function get_details()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['badlat'] = $this->Solaf_setting_model->get_by('emp_badlat_discount_settings', array('type' => 1), false, 'id');
        // $this->test($data['badlat']);
        $data['solaf_main_setting'] = $this->Solaf_setting_model->get_by('hr_solaf_main_setting', '', 1);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dawabt_details', $data);

    }

    public function get_details_dbt()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 1));
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }

    public function get_details_doc()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 3));
        //   $this->test($data['solaf_dawabt']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }

    public function get_details_exp()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_setting_model');
        $data['solaf_dawabt'] = $this->Solaf_setting_model->get_by('hr_solaf_dawabt', array('type' => 2));
        //   $this->test($data['solaf_dawabt']);
        $this->load->view('admin/Human_resources/employee_forms/solaf/dbt_details', $data);

    }
//$data['suspend']=$this->Solaf_requests_model->get_solf_suspend();

//yara
    public function get_suspend_solf()
    {
        $emp_id =  $emp_id = $this->input->post('emp_id');
       // $emp_id = $this->input->post('emp_id');
     //   $suspend = $this->Solaf_requests_model->get_solf_suspend($emp_id);
        $suspend = $this->Solaf_requests_model->get_solf_suspend_new($emp_id);
        
        echo json_encode($suspend);
    }


    public function get_suspend_solf_new()
    {
       // $emp_id =  13;
        $emp_id = $this->input->post('emp_id');
     //   $suspend = $this->Solaf_requests_model->get_solf_suspend($emp_id);
        $suspend = $this->Solaf_requests_model->get_solf_suspend_new($emp_id);
        
        echo json_encode($suspend);
    }

    public function request_solaf()
    { //human_resources/employee_forms/solaf/Solaf/request_solaf
        if (($_SESSION['role_id_fk'] == 1) || (($_SESSION['role_id_fk'] == 3))) {
            // $data['items'] = $this->Ezn_order_model->display_data();
            $data['items'] = $this->Solaf_requests_model->get_all_solfa();
            // $this->test($data);
        }
        $data['title'] = "طلبات السلف المقدمة";
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/solaf_order_view';
        $this->load->view('admin_index', $data);
    }



    public function check_solaf_notifications()
    {
        $result = $this->Solaf_requests_model->check_solaf_notifications(array('current_to_user_id' => $_SESSION['user_id']));
        echo json_encode($result);
    }

    public function update_solaf_notification()
    {
//        $ezn_rkm = $this->input->post('ezn_rkm');
        $result = $this->Solaf_requests_model->update_solaf_notification();


    }


 public function all_solf_reports(){
       // echo $_SESSION['user_id'];

         $data['all_talabat'] = $this->Solaf_requests_model->get_all_solfa_new_suspend();
         //$this->test($data);
      // $data['dddd'] =  $this->Solaf_requests_model->get_all_solfa_new_suspend_summ();
         $data['mabl3_da3m'] =  $this->Solaf_requests_model->get_mabl3_da3m();
         $data['sum_all_solaf'] =  $this->Solaf_requests_model->get_sum_all_solaf();
         $data['sum_all_solaf_paid'] =  $this->Solaf_requests_model->get_sum_all_solaf_quest('yes');
         $data['sum_solaf_not_paid'] =  $this->Solaf_requests_model->get_sum_all_solaf_quest('no');
            
           $data['title'] = "متابعة السلف";
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/report/all_solaf_reports_view';
            $this->load->view('admin_index', $data);
    }


 public function solf_reports()
    {
         $data['solfs'] = $this->Solaf_requests_model->get_solf_report();
         //$this->test($data);
           $data['title'] = "تقرير السلف";
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/report_solfa';
            $this->load->view('admin_index', $data);
    }


    public function get_solfa_value(){
        $data['title']= 'قيمه السلفه لهذا الشهر' ;
        $data['value_of_qst'] = $this->input->post('row_id');


        $this->load->view('admin/Human_resources/employee_forms/solaf/loadsolfaqust',$data);
    }
 
    public function get_solfa_order()
    {


  /*$rkm = 12;
  $data['num_quest_not_paids'] = 0;*/
   $rkm =$this->input->post('rkm');
    $num_quest_not_paid =$this->input->post('num_quest_not_paid');
    $data['num_quest_not_paids'] = $num_quest_not_paid;
    $data['rkm'] = $rkm; 
      
        $data['sanad_details'] = $this->Solaf_requests_model->get_solfa_report($rkm);
//$this->test($data['sanad_details']);
        //$data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($rkm);
        $data['emp_data'] = $this->Solaf_requests_model->get_emp_data($data['sanad_details']->emp_id_fk);
        $data['UserName'] = $this->Solaf_requests_model->getUserName($_SESSION['user_id']);


        // $this->test($data);

        $this->load->view('admin/Human_resources/employee_forms/solaf/print_sanad', $data);
    }
    
    
      public function namozg_khasm()
    {
      


            $this->load->model('Model_family_cashing');
        $rkm = $this->input->post('rkm');
      // $rkm = 11;
       // $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($rkm);
        $data['talab_emp_data'] = $this->Solaf_requests_model->get_solfa_report($rkm);
        
      /*  $data['emp_data'] = $this->Solaf_requests_model->get_emp_data($data['rows'][0]->emp_id_fk);
        $data['UserName'] = $this->Solaf_requests_model->getUserName($_SESSION['user_id']);
*/
        //    $this->test($data);

             $data["modeer_mali"]=$this->Model_family_cashing->get_emp_assigns(501);
             $data["mohaseb"]=$this->Model_family_cashing->get_emp_assigns(502);
             $data["modeer_hr"]=$this->Model_family_cashing->get_emp_assigns(401);
             $data["modeer_3am"]=$this->Model_family_cashing->get_emp_assigns(101); 
             


        $this->load->view('admin/Human_resources/employee_forms/solaf/print_namozg_khasm', $data);
    }  
    
 /*  function get_qemt_qst(){
    $solfa_rkm=$this->input->post('solfa_rkm');
    $month=$this->input->post('month');
    $data['qemt_qst']=  $this->Solaf_requests_model->get_qemt_qst($solfa_rkm,$month);
    echo json_encode($data);
}*/

function get_qemt_qst(){
    $solfa_rkm=$this->input->post('solfa_rkm');
    $month=$this->input->post('month');
    $data['qemt_qst']=  $this->Solaf_requests_model->get_qemt_qst($solfa_rkm,$month);
    echo json_encode($data);
}
public function tagel_solaf($id = false)
{
    if ($this->input->post('add')) {
        $id = $this->input->post('solfa_id');
        $this->Solaf_requests_model->insert_tagel_solfa($id);
        $this->messages('success', 'تم الاضافة بنجاح');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/Solaf/tagel_solaf/' . $id, 'refresh');
        }
    }
    $data['title'] = " طلب تأجيل السلفة";

    $data['emp_data'] = $this->Solaf_requests_model->select_depart();
    $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_tagel();
    $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
    if (!empty($data['item'])) {
        $data['records'] = $this->Solaf_requests_model->get_all_tagel_solfa($data['item']->t_rkm);
    } else {
        if (!empty($data['item'])) {
            $data['records'] = $this->Solaf_requests_model->get_all_tagel_solfa($data['item']->id);
        }
    }
    if (!empty($data['item']->t_rkm)) {
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($data['item']->t_rkm);
        $data['quests'] = $this->db->where('t_rkm_fk', $data['item']->t_rkm)->where('paid', 'no')->get('hr_solaf_quest')->result_array();
    }
    if ($this->input->post('from_profile')) {
        $this->load->view('admin/Human_resources/employee_forms/solaf/tagel_solaf', $data);

    } else {

        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
        $this->load->view('admin_index', $data);
    }

}

//edit_tagel_solaf
public function edit_tagel_solaf($id, $rkm)
{
    if ($this->input->post('add')) {
        $rkm = $this->input->post('solfa_rkm');
        $this->Solaf_requests_model->update_tagel_solfa($id);
        $this->messages('success', 'تم الاضافة بنجاح');
        redirect('human_resources/employee_forms/solaf/Solaf/tagel_solaf/' . $rkm, 'refresh');
    }
    $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
    $data['title'] = " طلب تأجيل السلفة";
    $data['emp_data'] = $this->Solaf_requests_model->select_depart();
    $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_tagel();
    $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($rkm);
    $data['items'] = $this->Solaf_requests_model->get_solfa_tagel_by_id($id);
    if (!empty($data['item']->t_rkm)) {
        $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($data['item']->t_rkm);
        $data['quests'] = $this->db->where('t_rkm_fk', $data['item']->t_rkm)->get('hr_solaf_quest')->result_array();
    }
    if ($this->input->post('from_profile')) {
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
    } else {
        $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
        $this->load->view('admin_index', $data);
    }
    /* $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
     $this->load->view('admin_index', $data);*/
} 
    
    //yara1-9-2020////////////////////
   /* public function tagel_solaf($id = false)
    {
        if ($this->input->post('add')) {
            $id = $this->input->post('solfa_rkm');
            $this->Solaf_requests_model->insert_tagel_solfa($id);
            $this->messages('success', 'تم الاضافة بنجاح');
                redirect('human_resources/employee_forms/solaf/Solaf/tagel_solaf/'.$id, 'refresh');
        }
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
        $data['title'] = " طلب تأجيل السلفة";
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
        $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_tagel();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
        $data['records'] = $this->Solaf_requests_model->get_all_tagel_solfa($id);
       
   if(!empty($data['item']->t_rkm))
   {
   $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($data['item']->t_rkm);
   $data['quests']=$this->db->where('t_rkm_fk',$data['item']->t_rkm)->where('paid','no')->get('hr_solaf_quest')->result_array();
   }
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
            $this->load->view('admin_index', $data);
        
    }*/
    //edit_tagel_solaf
  /*  public function edit_tagel_solaf($id,$rkm)
    {
        if ($this->input->post('add')) {
            $rkm = $this->input->post('solfa_rkm');
            $this->Solaf_requests_model->update_tagel_solfa($id);
            $this->messages('success', 'تم الاضافة بنجاح');
                redirect('human_resources/employee_forms/solaf/Solaf/tagel_solaf/'.$rkm, 'refresh');
        }
        $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
        $data['title'] = " طلب تأجيل السلفة";
        $data['emp_data'] = $this->Solaf_requests_model->select_depart();
        $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
        $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
        $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_tagel();

        $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Employee_model->select_depart();
        $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($rkm);
        $data['items'] = $this->Solaf_requests_model->get_solfa_tagel_by_id($id);
   if(!empty($data['item']->t_rkm))
   {
   $data['rows'] = $this->Solaf_requests_model->get_by_t_rkm($data['item']->t_rkm);
   $data['quests']=$this->db->where('t_rkm_fk',$data['item']->t_rkm)->get('hr_solaf_quest')->result_array();
   }
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/tagel_solaf';
            $this->load->view('admin_index', $data);
        
    }*/
    public function delete_tagel_solfa($id,$rkm)
    {
        
        $this->Solaf_requests_model->delete_from_table($id, 'hr_solaf_tagel');
        $this->messages('success', 'تم الحذف بنجاح');
        redirect('human_resources/employee_forms/solaf/Solaf/tagel_solaf/'.$rkm, 'refresh');
        

    }
    public function make_tagel_transformation_direct()
    {
        $solf_id = $this->input->post('solf_id');
        $fe2a=$this->input->post('fe2a');
        $month=$this->input->post('month');
        $qemt_qst=$this->input->post('qemt_qst');
        $emp_code_fk=$this->input->post('emp_code_fk');
        $transform_solf = $this->Solaf_requests_model->make_tagel_transformation_direct($solf_id,$fe2a,$month,$qemt_qst,$emp_code_fk);
        echo json_encode($transform_solf);
    }

/****************************************/

   public function add_picture($id)
{
    $data['title'] = 'إضافة  مرفقات';
    $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
    $data['get_all'] = $this->Solaf_requests_model->get_news_by_id($id);
    $data['item']=$this->Solaf_requests_model->get_by_id($id);
    $data['folder_path']= 'uploads/human_resources/solaf';
    $data['morfqat'] = $this->Solaf_requests_model->get_table('hr_solaf_files',array('solaf_id_fk'=>$id));
 //   $data['vedio'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id,'type'=>2));
    $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_picture';
    $this->load->view('admin_index',$data); 
}
public function load()
     {
      $id=$this->input->post('id');
      $data['get_all'] = $this->Solaf_requests_model->get_news_by_id($id);
    $data['folder_path']= 'uploads/human_resources/solaf';
    $data['morfqat'] = $this->Solaf_requests_model->get_table('hr_solaf_files',array('solaf_id_fk'=>$id));
         $this->load->view('admin/Human_resources/employee_forms/solaf/load', $data);
     }
     public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/solaf/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
private function upload_all_file($file_name,$id)
{
    $data['get_all'] = $this->Solaf_requests_model->get_news_by_id($id);
  $path='uploads/human_resources/solaf';
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '100000000';
    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $this->upload->data();
        return $datafile['file_name'];
    }
}
private function upload_muli_file($input_name,$id)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = $this->upload_all_file("userFile",$id);
    }
    return $all_img;
}
public function upload_img()
{
    $id = $this->input->post('row');
    $images = $this->upload_muli_file("files",$id);
    $this->Solaf_requests_model->insert_attach($id, $images);
}
public function delete_upload($id)
{
    $img = $this->Solaf_requests_model->get_table_by_id('hr_solaf_files',array('id'=>$id));
    $path='uploads/human_resources/solaf';
  //  $this->test($img->morfaq);
    if (file_exists($path . "/" . $img->file)) {
        unlink(FCPATH . "" . $path . "/" . $img->file);
    }
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    // $id = $this->input->post('row_id');
    // $sader_id = $this->input->post('sader_id');
    $this->delete_upload($id);
    $this->Solaf_requests_model->delete_morfq($id);
}
/************************************************************/

public function ta3gel_solaf($id = false)
{
    if ($this->input->post('add')) {
        $id = $this->input->post('solfa_rkm');
    //    $this->test($_POST);
        $this->Solaf_requests_model->insert_ta3gel_solfa($id);
        $this->messages('success', 'تم الاضافة بنجاح');
            redirect('human_resources/employee_forms/solaf/Solaf/ta3gel_solaf/'.$id, 'refresh');
    }
    $data['banks'] = $this->Solaf_requests_model->getBanks();
    $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
    $data['title'] = " طلب تعجيل السلفة";
    $data['emp_data'] = $this->Solaf_requests_model->select_depart();
    $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
    $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
    $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
    $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_ta3gel();
    $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
    $data['admin'] = $this->Employee_model->select_by();
    $data['departs'] = $this->Employee_model->select_depart();
    $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($id);
   // $this->test($data['item']);
    $data['records'] = $this->Solaf_requests_model->get_all_ta3gel_solfa($id);
if(!empty($data['item']->t_rkm))
{
$data['rows'] = $this->Solaf_requests_model->get_by_t_rkm_new($data['item']->t_rkm);
$data['quests']=$this->db->where('t_rkm_fk',$data['item']->t_rkm)->where('paid','no')->get('hr_solaf_quest')->result_array();
}
      //  $data['subview'] = 'admin/Human_resources/employee_forms/solaf/ta3gel_solaf';
        //$this->load->view('admin_index', $data);

        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/solaf/ta3gel_solaf', $data);
    
        } else {
    
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/ta3gel_solaf';
            $this->load->view('admin_index', $data);
        }
}
//edit_ta3gel_solaf
public function edit_ta3gel_solaf($id,$rkm)
{
    if ($this->input->post('add')) {
        $rkm = $this->input->post('solfa_rkm');
        $this->Solaf_requests_model->update_ta3gel_solfa($id);
        $this->messages('success', 'تم الاضافة بنجاح');
            redirect('human_resources/employee_forms/solaf/Solaf/ta3gel_solaf/'.$rkm, 'refresh');
    }
    $data['banks'] = $this->Solaf_requests_model->getBanks();
    $data['had_quest'] = $this->Solaf_requests_model->get_had_aqsa_qst();
    $data['title'] = " طلب تعجيل السلفة";
    $data['emp_data'] = $this->Solaf_requests_model->select_depart();
    $data['jobtitles'] = $this->Solaf_requests_model->select_all_defined(4);
    $data['employies'] = $this->Solaf_requests_model->get_emp($_SESSION['emp_code']);
    $data['all_emps'] = $this->Solaf_requests_model->get_emp2();
    $data['last_rkm'] = $this->Solaf_requests_model->get_last_rkm_ta3gel();
    $data["personal_data"] = $this->Employee_model->get_one_employee($_SESSION['emp_code']);
    $data['admin'] = $this->Employee_model->select_by();
    $data['departs'] = $this->Employee_model->select_depart();
    $data['item'] = $this->Solaf_requests_model->get_solfa_by_id($rkm);
    $data['items'] = $this->Solaf_requests_model->get_solfa_ta3gel_by_id($id);
if(!empty($data['item']->t_rkm))
{
$data['rows'] = $this->Solaf_requests_model->get_by_t_rkm_new($data['item']->t_rkm);
$data['quests']=$this->db->where('t_rkm_fk',$data['item']->t_rkm)->get('hr_solaf_quest')->result_array();
}
        // $data['subview'] = 'admin/Human_resources/employee_forms/solaf/ta3gel_solaf';
        // $this->load->view('admin_index', $data);
        if ($this->input->post('from_profile')) {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/ta3gel_solaf';
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/ta3gel_solaf';
            $this->load->view('admin_index', $data);
        }
}
public function delete_ta3gel_solfa($id,$rkm)
{
    $this->Solaf_requests_model->delete_from_table($id, 'hr_solaf_ta3gel');
    $this->messages('success', 'تم الحذف بنجاح');
    redirect('human_resources/employee_forms/solaf/Solaf/ta3gel_solaf/'.$rkm, 'refresh');
}



public function get_fe2a_ta3gel()
{
    $id=$this->input->post('emp_id');
    $fe2a_ta3gel=$this->input->post('fe2a_ta3gel');
    if($fe2a_ta3gel==2)
    {
$data['banks'] = $this->Solaf_requests_model->getBanks();
$data['allData'] = $this->Solaf_requests_model->getEmpBankby_id($id);
$this->load->view('admin/Human_resources/employee_forms/solaf/get_fe2a_ta3gel',$data);
    }

}


function get_all_detailes_solfa()
{
    $type_detailes = $this->input->post('type_detailes');
    $data = array();
    if (!empty($type_detailes)) {
        switch ($type_detailes) {
            case 1:
                $rkm_solfa = $this->input->post('rkm_solfa');
                $data['solfa_data'] = $this->Solaf_requests_model->get_by_t_rkm_new($rkm_solfa);
                break;
            case 2:
                $rkm_solfa = $this->input->post('rkm_solfa');
                $data['solfa_data'] = $this->Solaf_requests_model->get_by_t_rkm_new($rkm_solfa);
                $data['solfa_quests'] = $this->db->where('t_rkm_fk', $rkm_solfa)->get('hr_solaf_quest')->result_array();
                break;
            case 3:
                $rkm_solfa = $this->input->post('rkm_solfa');
                $id_solfa_tageel = $this->input->post('id_solfa_tageet');
                $data['solfa_data'] = $this->Solaf_requests_model->get_by_t_rkm_new($rkm_solfa);
                $data['tageel_data'] = $this->Solaf_requests_model->get_solfa_tagel_by_id($id_solfa_tageel);
                $data['solfa_quests'] = $this->db->where('t_rkm_fk', $rkm_solfa)->get('hr_solaf_quest')->result_array();
                break;
            case 4:
                $rkm_solfa = $this->input->post('rkm_solfa');
                $id_solfa_ta3geel = $this->input->post('id_solfa_ta3geet');
                $data['solfa_data'] = $this->Solaf_requests_model->get_by_t_rkm_new($rkm_solfa);
                $data['ta3geel_data'] = $this->Solaf_requests_model->get_solfa_ta3gel_by_id($id_solfa_ta3geel);
                $data['solfa_quests'] = $this->db->where('t_rkm_fk', $rkm_solfa)->get('hr_solaf_quest')->result_array();
                break;
            default:
                break;
        }
    }
//        $this->test($data);
    $this->load->view('admin/Human_resources/employee_forms/solaf/all_detailes_solfa', $data);
}



function get_many_qemt_qst()
{
    $solfa_rkm = $this->input->post('solfa_rkm');
    $month = $this->input->post('month');
    $data['qemt_qst'] = $this->Solaf_requests_model->get_many_qemt_qst($solfa_rkm, $month);
    echo json_encode($data);
}


function update_seen_solaf_ta3gel()
{
    $this->Solaf_requests_model->update_seen_solaf_ta3gel();
}

function update_seen_solaf_tagel()
{
    $this->Solaf_requests_model->update_seen_solaf_tagel();
}


public function all_ta3gel_solaf()
{
    
     $data['title'] = " طلبات تعجيل السلفة";
    $data['records'] = $this->Solaf_requests_model->all_ta3gel_solfa_new();
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/all_ta3gel_solaf';
            $this->load->view('admin_index', $data);
        
}


// add_picture_ta3gel
public function add_picture_ta3gel($id)
{
    $data['title'] = 'إضافة  مرفقات التعجيل';
    $data['get_all'] = $this->Solaf_requests_model->get_ta3gel_by_id($id);
    $data['folder_path']= 'uploads/human_resources/solaf_ta3gel';
    $data['morfqat'] = $this->Solaf_requests_model->get_table('hr_solaf_files_ta3gel',array('ta3gel_id_fk'=>$id));
    $data['subview'] = 'admin/Human_resources/employee_forms/solaf/add_picture_ta3gel';
    $this->load->view('admin_index',$data); 
}
public function load_ta3gel()
     {
      $id=$this->input->post('id');
      $data['get_all'] = $this->Solaf_requests_model->get_ta3gel_by_id($id);
    $data['folder_path']= 'uploads/human_resources/solaf_ta3gel';
    $data['morfqat'] = $this->Solaf_requests_model->get_table('hr_solaf_files_ta3gel',array('ta3gel_id_fk'=>$id));
         $this->load->view('admin/Human_resources/employee_forms/solaf/load_ta3gel', $data);
     }
     public function delete_upload_ta3gel($id)
{
    $img = $this->Solaf_requests_model->get_table_by_id('hr_solaf_files_ta3gel',array('id'=>$id));
    $path='uploads/human_resources/solaf_ta3gel';
  //  $this->test($img->morfaq);
    if (file_exists($path . "/" . $img->file)) {
        unlink(FCPATH . "" . $path . "/" . $img->file);
    }
}
public function delete_morfq_ta3gel()
{
    $id = $this->input->post('id');
    $this->delete_upload_ta3gel($id);
    $this->Solaf_requests_model->delete_morfq_ta3gel($id);
}
public function read_file_ta3gel($file_name)
{
    $this->load->helper('file');
    $file_path = 'uploads/human_resources/solaf_ta3gel/'.$file_name;
    header('Content-Type: application/pdf');
    header('Content-Discription:inline; filename="'.$file_name.'"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges:bytes');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
}
private function upload_muli_file_ta3gel($input_name,$id)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = $this->upload_all_file_ta3gel("userFile",$id);
    }
    return $all_img;
}
public function upload_img_ta3gel()
{
    $id = $this->input->post('row');
    $images = $this->upload_muli_file_ta3gel("files",$id);
    $this->Solaf_requests_model->insert_attach_ta3gel($id, $images);
}
private function upload_all_file_ta3gel($file_name,$id)
{
    $data['get_all'] = $this->Solaf_requests_model->get_ta3gel_by_id($id);
$path='uploads/human_resources/solaf_ta3gel';
$config['upload_path'] = $path;
$config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
$config['max_size'] = '100000000';
$config['encrypt_name'] = true;
$this->load->library('upload', $config);
if (!$this->upload->do_upload($file_name)) {
    return false;
} else {
    $datafile = $this->upload->data();
    return $datafile['file_name'];
}
}



   function get_accountes(){
        $bank_id = $this->input->post('bank_id');
        $data['accountes'] = $this->Solaf_requests_model->get_accounts($bank_id);
        echo json_encode($data);
    }





public function do_action_ta3gel_sarf()
{
    $tagel_id =  $this->uri->segment(6);
    $solfa_rkm=  $this->uri->segment(8);
    $emp_code=  $this->uri->segment(9);
    $fe2a_ta3gel =  $this->uri->segment(10);
    /* $tagel_id = 4 ;
     $emp_code = 10047 ;
    $solfa_rkm = 12;
    echo'<pre>';
    print_r($_POST);*/
  /*  echo $fe2a_ta3gel;
    die;*/
    if($fe2a_ta3gel == 2){
      if($tagel_id != '' and $emp_code != '' and $solfa_rkm !='' and 
   $tagel_id != null and $emp_code != null  and $solfa_rkm !=null and 
   $tagel_id != 0 and $emp_code != 0  and $solfa_rkm !=0 
 ){
   $this->Solaf_requests_model->update_solaf_ta3gel_months($tagel_id,$emp_code,$solfa_rkm);   
}else{
 redirect('human_resources/employee_forms/solaf/Solaf/all_ta3gel_solaf');   
}  
    }elseif($fe2a_ta3gel == 3){
        
    }elseif($fe2a_ta3gel == 1){
        
    }else{
      redirect('human_resources/employee_forms/solaf/Solaf/all_ta3gel_solaf');    
    }
    




}

}

?>
