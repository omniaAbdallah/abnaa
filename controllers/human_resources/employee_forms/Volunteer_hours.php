<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Volunteer_hours extends MY_Controller

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

        $this->load->model('human_resources_model/employee_forms/Job_requests_model');

        $this->load->model('human_resources_model/employee_forms/Volunteer_hours_model');

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

    /* public function add_volunteer_hours(){ //human_resources/employee_forms/Volunteer_hours/add_volunteer_hours

$this->load->model('human_resources_model/tataw3/setting/Main_setting_m');

        if($this->input->post('add') =='حفظ')

            {

                $this->Volunteer_hours_model->insert();

               // redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours','refresh');

                  $this->messages('success',' بنجاح إضافة  ساعات  التطوع');

                    if ($this->input->post('from_profile')) {

                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');

            } else {

                redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours', 'refresh');

            }

                  

                  

           }else{

            

              $data['all_emp_magalat'] = $this->Main_setting_m->get_all_emp_magalat_records();

            $data['emp_data'] = $this->Volunteer_hours_model->select_depart();

            $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);

            $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);

            $data['all_emps'] = $this->Job_requests_model->get_emp(0);

            $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);

            $data['admin'] = $this->Volunteer_hours_model->select_by();

            $data['departs'] = $this->Volunteer_hours_model->get_department();

            $data['records'] = $this->Volunteer_hours_model->select_all();

            

            $data['title']="إضافة ساعات التطوع";



                if ($this->input->post('from_profile')) {

                $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours', $data);

            } else {

                $data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours';

                $this->load->view('admin_index', $data);

            }

        }

    }

*/


    /*   public function edit_volunteer_hours($id = false){



        $this->load->model('human_resources_model/tataw3/setting/Main_setting_m');

                if($this->input->post('add'))

                {



                $this->Volunteer_hours_model->update($id);

                  //  redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours','refresh');

                     if ($this->input->post('from_profile')) {

                    redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');

                } else {

                    redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours', 'refresh');

                }



                }else{



                     if ($this->input->post('id')) {

                    $id = $this->input->post('id');

                }



                $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);

       $data['all_emp_magalat'] = $this->Main_setting_m->get_all_emp_magalat_records();

                $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);

                $data['all_emps'] = $this->Job_requests_model->get_emp(0);

                $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);

                $data['admin'] = $this->Volunteer_hours_model->select_by();

                $data['departs'] = $this->Volunteer_hours_model->get_department();

                $data['result'] = $this->Volunteer_hours_model->GetById($id);

                $data['last_id'] = $this->Volunteer_hours_model->get_last();



                $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","9","");

                $data['title']="تعديل ساعات التطوع";

                //$data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours';

              //  $this->load->view('admin_index', $data);



              $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);

    if($data['result']->mostafed_type_fk==0)

    {



              $data['responsibles']=$this->Volunteer_hours_model->get_all_emp_edara($data['result']->mostafed_edara_id);

    }

                 if ($this->input->post('from_profile')) {

                    $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours', $data);

                } else {

                    $data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours';

                    $this->load->view('admin_index', $data);

                }





                }

        }


    */
    public function load_responsible()

    {

        $edara_id = $this->input->post('row_id');

        $data['responsibles'] = $this->Volunteer_hours_model->get_all_emp_edara($edara_id);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_responsible', $data);

    }

    public function add_volunteer_hours($forsa_id = false)
    { //human_resources/employee_forms/Volunteer_hours/add_volunteer_hours

        if ($this->input->post('add') == 'حفظ') {
            $this->Volunteer_hours_model->insert();
            $this->messages('success', ' بنجاح إضافة  ساعات  التطوع');
            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours', 'refresh');
            }


        } else {
            $data['emp_data'] = $this->Volunteer_hours_model->select_depart();
            $data['jobtitles'] = $this->Volunteer_hours_model->select_all_defined(4);
            $data['employies'] = $this->Volunteer_hours_model->get_emp($_SESSION['emp_code']);
            $data['all_emps'] = $this->Volunteer_hours_model->get_emp(0);
            $data["personal_data"] = $this->Volunteer_hours_model->get_one_employee($_SESSION['emp_code']);
            $data['admin'] = $this->Volunteer_hours_model->select_by();
            $data['departs'] = $this->Volunteer_hours_model->get_department();
            $data['records'] = $this->Volunteer_hours_model->select_all();
            if (!empty($forsa_id)) {
                $data['forsa_data'] = $this->Volunteer_hours_model->get_forsa_data($forsa_id);
//                $this->test($data['forsa_data']);
            }
            $data['title'] = "إضافة ساعات التطوع";

            if ($this->input->post('from_profile')) {
                $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours', $data);
            } else {
                $data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours';
                $this->load->view('admin_index', $data);
            }
        }
    }


    public function edit_volunteer_hours($id = false)
    {
        if ($this->input->post('add')) {

            $this->Volunteer_hours_model->update($id);
            if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours', 'refresh');
            }

        } else {

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            }

            $data['jobtitles'] = $this->Volunteer_hours_model->select_all_defined(4);

            $data['employies'] = $this->Volunteer_hours_model->get_emp($_SESSION['emp_code']);
            $data['all_emps'] = $this->Volunteer_hours_model->get_emp(0);
            $data["personal_data"] = $this->Volunteer_hours_model->get_one_employee($_SESSION['emp_code']);
            $data['admin'] = $this->Volunteer_hours_model->select_by();
            $data['departs'] = $this->Volunteer_hours_model->get_department();
            $data['result'] = $this->Volunteer_hours_model->GetById($id);
            $data['last_id'] = $this->Volunteer_hours_model->get_last();

            $data['ghat'] = $this->Volunteer_hours_model->select_search_key2("hr_forms_settings", "type", "9", "");
            $data['title'] = "تعديل ساعات التطوع";
            $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);
            if ($data['result']->mostafed_type_fk == 0) {

                $data['responsibles'] = $this->Volunteer_hours_model->get_all_emp_edara($data['result']->mostafed_edara_id);
            }
            if ($this->input->post('from_profile')) {
                $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours', $data);
            } else {
                $data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/add_volunteer_hours';
                $this->load->view('admin_index', $data);
            }


        }
    }


    public function delete_volunteer_hours($id, $from = false)
    {
        $this->Volunteer_hours_model->delete($id);
        //  redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours');
        if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours');
        }
    }

    /*public function delete_volunteer_hours($id, $from = false)

    {

        $this->Volunteer_hours_model->delete($id);

     //  redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours');

   if (!empty($from) && ($from == 1)) {

            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');

        } else {

            redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours');

        }

    }*/


    /*  public function get_emp_data()

      {

          $data["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));

          print_r( json_encode($data["personal_data"][0]));





      }*/


    public function get_emp_data()

    {

        $valu = $this->input->post('valu');

        $id = $this->input->post('emp_id');

        if ($this->input->post('valu')) {

            if ($valu == 2) {

                $data['row'] = $this->Volunteer_hours_model->get_emp_data_by_id($id);

            } else {

                $data['row'] = $this->Volunteer_hours_model->get_emp_data_by_user_id($id);

            }

        } else {

            $data['row'] = $this->Volunteer_hours_model->get_emp_data_by_id($id);

        }

        //  $this->test( $data['row']);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_transformations/person_profile', $data);

    }


    public function get_load_page()

    {

        $data_load["personal_data"] = $this->Employee_model->get_one_employee($this->input->post('valu'));

        $this->load->view('admin/Human_resources/sidebar_person_data_vacation', $data_load);

    }


    public function GetMostafed_type()

    {

        $data_load['last_id'] = $this->Volunteer_hours_model->get_last();

        $data_load['admin'] = $this->Volunteer_hours_model->select_by();

        $data_load['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings", "type", "9", "");

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/Getmostafed_type', $data_load);

    }


    public function add_option()

    {


        $this->Volunteer_hours_model->insert_record($this->input->post('valu'));

    }


    public function add_volunteer_table()
    {

        $data_load['admin'] = $this->Employee_model->select_by();

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/GetVolunteer_table', $data_load);


    }


    /*

             public function GetNum_hours(){

            $from_time = strtotime($_POST['from_time']);

            $to_time = strtotime($_POST['to_time']);

                 $data['from_time'] =date('h:ia',$from_time);

                 $data['to_time'] =date('h:ia',$to_time);

               if($from_time !='' && $to_time !='' ){

                     $difference = ( strtotime($data['to_time']) -  strtotime($data['from_time']));

                     $hours = $difference / 3600;

                     $minutes = ($hours - floor($hours)) * 60;

                     $data['hours']=abs(floor($hours));

                     $data['minutes']=abs($minutes);

                     echo json_encode($data);

                 }



             }*/


    public function GetNum_hours()
    {

        $from_time = strtotime($_POST['from_time']);

        $to_time = strtotime($_POST['to_time']);

        $data['from_time'] = date('h:ia', $from_time);

        $data['to_time'] = date('h:ia', $to_time);

        if ($from_time != '' && $to_time != '') {

            $difference = (strtotime($data['to_time']) - strtotime($data['from_time']));

            $hours = $difference / 3600;

            $minutes = ($hours - floor($hours)) * 60;

            $data['hours'] = abs(floor($hours));

            $data['minutes'] = abs($minutes);

            echo json_encode($data);

        }


    }


    public function getConnection_emp()

    {

        $all_Emps = $this->Volunteer_hours_model->get_all_emp();

        //   $this->test($all_Emps);

        $arr_emp = array();

        $arr_emp['data'] = array();


        if (!empty($all_Emps)) {

            foreach ($all_Emps as $row_emp) {


                $arr_emp['data'][] = array(

                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"

                   ondblclick="Get_emp_Name(this)" 

                    id="member' . $row_emp->id . '" 

                    data-emp_code="' . $row_emp->emp_code . '" 

                    data-edara_n="' . $row_emp->edara_n . '"

                    data-edara_id="' . $row_emp->administration . '"

                    data-name="' . $row_emp->employee . '"

                    data-job_title="' . $row_emp->mosma_wazefy_n . '" 

                    data-qsm_n="' . $row_emp->qsm_n . '" 

                    data-qsm_id="' . $row_emp->department . '" 

                    data-manger="' . $row_emp->manger . '" 

                    data-card_num="' . $row_emp->card_num . '" />',


                    $row_emp->emp_code,

                    $row_emp->employee,

                    $row_emp->edara_n,

                    $row_emp->qsm_n,


                    ''

                );

            }

        }

        echo json_encode($arr_emp);


    }


    public function load_details()
    {


        $row_id = $this->input->post('row_id');

        $data['result'] = $this->Volunteer_hours_model->GetById($row_id);

        $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_details', $data);


    }


    public function Print_details()
    {


        $row_id = $this->input->post('row_id');

        $data['result'] = $this->Volunteer_hours_model->GetById($row_id);

        $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/print_details', $data);


    }


    public function get_ms2ol_data()

    {

        $emp_name = $this->input->post('id');

        $reason = $this->Volunteer_hours_model->get_ms2ol_data($emp_name);

        echo json_encode($reason);

    }


    public function add_setting()
    {

        $type = $this->input->post('type');


        $type_name = $this->input->post('type_name');


        $this->Volunteer_hours_model->add_setting($type);

        // $data['result'] = $this->Volunteer_hours_model->get_setting($type,$edara_n,$edara_id_fk);

        $data['result'] = $this->Volunteer_hours_model->get_setting($type);

        $data['type_name'] = $type_name;

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting', $data);

    }

    public function load_settigs()
    {

        $type = $this->input->post('type');

        $type_name = $this->input->post('type_name');


        $data['result'] = $this->Volunteer_hours_model->get_setting($type);


        $data['type_name'] = $type_name;

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting', $data);

    }

    public function delete_setting()
    {

        $id = $this->input->post('id');

        $type = $this->input->post('type');

        $type_name = $this->input->post('type_name');


        $this->Volunteer_hours_model->delete_setting($id);

        $data['result'] = $this->Volunteer_hours_model->get_setting($type);

        $data['type_name'] = $type_name;

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting', $data);

    }

    public function get_setting_by_id()
    {

        $id = $this->input->post('row_id');

        $result = $this->Volunteer_hours_model->get_setting_by_id($id);

        echo json_encode($result);

    }

    //////


    public function get_orders()

    {

        $valu = $this->input->post('valu');

        //$this->test($valu);

        if ($valu == 1) {

            $arr = array('current_from_user_id' => $_SESSION['user_id']);

        } else if ($valu == 2) {

            $arr = array('current_from_user_id' => $_SESSION['user_id']);

        } else if ($valu == 3) {

            $arr = array('current_to_user_id' => $_SESSION['user_id']);

        }

        $data['valu'] = $valu;

        $data['records'] = $this->Volunteer_hours_model->my_orders($arr);

        //$this->test($data['records']);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_transformations/load_page', $data);

    }


    public function get_modal()

    {

        $level = $this->input->post('level');

        $data['level'] = $level;

        $data['mess'] = $this->Volunteer_hours_model->get_from_setting($level);

        $id = $this->input->post('val_id');

        $data['row'] = $this->Volunteer_hours_model->GetById($id);

        if (!empty($data['row'])) {

            $emp_where = array(1 => 404);

            if (key_exists($data['row']->level, $emp_where)) {

                $data["employee"] = $this->Volunteer_hours_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data['row']->level]));

            }

        }

        /*        $this->test($data);*/

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_transformations/level_page', $data);

    }


    public function make_suspend()

    {


        $this->Volunteer_hours_model->change_suspend();

        $this->Volunteer_hours_model->insert_transformation();

    }


    public function get_modal_details()

    {

        $id = $this->input->post('valu');

        $data['result'] = $this->Volunteer_hours_model->GetById($id);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_details', $data);

    }


    public function get_follow()

    {

        $id = $this->input->post('id');

        $arr = array('id' => $id);

        $data['records'] = $this->Volunteer_hours_model->my_orders_history('hr_volunteer_hours_history', $arr);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_transformations/get_follow', $data);

    }


    public function get_modal_details_steps()

    {

        $id = $this->input->post('valu');

        $data['result'] = $this->Volunteer_hours_model->GetById($id);

        $data['records'] = $this->Volunteer_hours_model->get_array_by_id('hr_volunteer_hours_history', $id);

        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_transformations/get_details_steps', $data);

    }


    public function all_talabat()

    {

        /* $valu = $this->input->post('valu');

         //$this->test($valu);

         if ($valu == 1) {

             $arr = array('current_from_user_id' => $_SESSION['user_id']);

         } else if ($valu == 2) {

             $arr = array('current_from_user_id' => $_SESSION['user_id']);

         } else if ($valu == 3) {

             $arr = array('current_to_user_id' => $_SESSION['user_id']);

         }

         $data['valu'] = $valu;*/

        $data['title'] = 'جميع الطلبات';

        $data['records'] = $this->Volunteer_hours_model->get_all_orders();

        //$this->test($data['records']);

        //  $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/all_talabat', $data);


        $data['subview'] = 'admin/Human_resources/employee_forms/volunteer_hours/all_talabat';

        $this->load->view('admin_index', $data);

    }


}

?>

	

	

	

	

