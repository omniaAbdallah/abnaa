<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Overtime_hours_orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');

        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();

        $this->load->model('human_resources_model/employee_forms/Job_requests_model');
        $this->load->model('human_resources_model/employee_forms/overtime_hours/Overtime_hours_orders_model');
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
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }



public function add_overtime_hours_orders(){ //human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders

    $data['order_rkm'] = $this->Overtime_hours_orders_model->get_order_rkm();
    if($this->input->post('add') =='حفظ')
    {

        $id = $this->Overtime_hours_orders_model->insert();
        $this->Overtime_hours_orders_model->insert_overtime_details($id);

        $this->messages('success','   تم الاضافة بنجاح');
        //  redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders','refresh');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders', 'refresh');
        }
    }else{
        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);
        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Overtime_hours_orders_model->get_department();
        $data['records'] = $this->Overtime_hours_orders_model->get_all('');
        $data['title']="إضافة تكليف إضافى";
        // $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders';
        // $this->load->view('admin_index', $data);
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders';
            $this->load->view('admin_index', $data);
        }



    }
}
public function edit_overtime_hours_orders_deatils(){
    $id=$this->input->post('from_id');
  
        $this->Overtime_hours_orders_model->insert_overtime_details($id);
     
      
    



}
public function getById()
{

    $id=$this->input->post('id');
    $reason=$this->Overtime_hours_orders_model->GetFrom($id);
    echo json_encode($reason);
    
}
public function load_data()
{
    $id=$this->input->post('from_id');
  
    $data['result'] = $this->Overtime_hours_orders_model->get_all($id)[0];
    $this->load->view('admin/Human_resources/employee_forms/overtime_hours/load_data', $data);
}
// add_edit_overtime_hours_orders
public function add_edit_overtime_hours_orders(){
    $id=$this->input->post('id');
        $this->Overtime_hours_orders_model->update_overtime_details($id);
      
  
}

public function compelete_details($row_id){

//    $row_id = $this->input->post('row_id');
    $data['result'] = $this->Overtime_hours_orders_model->get_all($row_id)[0];
    $data['title']="استكمال بيانات تكليف إضافى";
   // $this->load->view('admin/Human_resources/employee_forms/overtime_hours/compelete_details',$data);
    $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/compelete_details';
    $this->load->view('admin_index', $data);

}

	public function edit_overtime_hours_orders($id = false){
    if($this->input->post('add'))
    {

        $this->Overtime_hours_orders_model->update($id);
    //    $this->Overtime_hours_orders_model->insert_overtime_details($id);
        // $this->test($id);
        //   die;
        $this->messages('success','   تم التعديل بنجاح');

        //  redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders','refresh');

        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders', 'refresh');
        }
    }else{

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $data['emp_data'] = $this->Job_requests_model->select_depart();
        $data['jobtitles'] = $this->Job_requests_model->select_all_defined(4);

        $data['employies'] = $this->Job_requests_model->get_emp($_SESSION['emp_code']);
        $data['all_emps'] = $this->Job_requests_model->get_emp(0);
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['admin'] = $this->Employee_model->select_by();
        $data['departs'] = $this->Overtime_hours_orders_model->get_department();
        $data['result'] = $this->Overtime_hours_orders_model->get_all($id)[0];
        // $this->test($data['result']);


        $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","9","");
        $data['title']="تعديل  التكليف الإضافى";
        //$data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders';
        //$this->load->view('admin_index', $data);
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/add_overtime_hours_orders';
            $this->load->view('admin_index', $data);
        }


    }
}



public function delete_overtime_hours_orders($id, $from = false)
{
    $this->Overtime_hours_orders_model->delete($id);
    $this->messages('success',' تم الحذف بنجاح');
    //redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders');
    if (!empty($from) && ($from == 1)) {
        redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
    } else {
        redirect('human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders', 'refresh');
    }
}
/**********************************Load_pages**********************************************/

    public function get_emp_data()
    {
        $data["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }
    public function get_load_page()
    {
        $data_load["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);
    }
    public function GetMostafed_type()
    {
        $data_load['last_id'] = $this->Overtime_hours_orders_model->get_last();
        $data_load['admin'] = $this->Employee_model->select_by();
        $data_load['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","9","");
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/Getmostafed_type',$data_load);
    }
    public function add_overtime_hours_work(){
        $data_load['admin'] = $this->Employee_model->select_by();
        $this->load->view('admin/Human_resources/employee_forms/overtime_hours/get_overtime_hours_work',$data_load);

    }
    /**********************************Load_pages**********************************************/
    public function add_option()
    {

        $this->Overtime_hours_orders_model->insert_record($this->input->post('valu'));
    }
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
                 $data['minutes2']=abs($hours * 60);
                 echo json_encode($data);
             }

         }



   
         public function getConnection_emp()
    {
        $all_Emps = $this->Overtime_hours_orders_model->get_all_emp();
   // $this->test($all_Emps);
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
                        data-edara_id="' . $row_emp->edara_id . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '" 
                        data-qsm_n="' . $row_emp->qsm_n . '" 
                        data-qsm_id="' . $row_emp->qsm_id . '" 
                        data-direct_manager_job_title_fk="' . $row_emp->direct_manager_job_title_fk . '"
                        data-direct_manager_id_fk="' . $row_emp->direct_manager_id_fk . '" />',
                        
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


public function delete_item()
{
    $id=$this->input->post('id');
    $this->Overtime_hours_orders_model->delete_details_item($id);
   
}


 public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Overtime_hours_orders_model->get_all($row_id)[0];
     
        $this->load->view('admin/Human_resources/employee_forms/overtime_hours/load_details',$data);

    }
    // compelete_details
   

    public function Print_order(){

        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Overtime_hours_orders_model->get_all($row_id)[0];

        $this->load->view('admin/Human_resources/employee_forms/overtime_hours/print_order',$data);

    }


    public function my_over_time_emp()//human_resources/employee_forms/overtime_hours/Overtime_hours_orders/my_over_time_emp
    {

        $data['over_time_emp'] = $this->Overtime_hours_orders_model->my_over_time_emp();

        $data['title']="التكليف الاضافي الخاصي بي";
        
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/overtime_hours/over_time_emp_view', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/over_time_emp_view';
            $this->load->view('admin_index', $data);
        }
                    
    } 
    public function my_over_time_manger()//human_resources/employee_forms/overtime_hours/Overtime_hours_orders/my_over_time_manger
    {

        $data['over_time_manger'] = $this->Overtime_hours_orders_model->my_over_time_manger();

        $data['title']="التكليف الاضافي الخاصي بي";
        
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/overtime_hours/over_time_manger', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/overtime_hours/over_time_manger';
            $this->load->view('admin_index', $data);
        }
                    
    }

    public function estlam_task()
    {
        $id = $this->input->post('id');
        if ($this->input->post('value')) {
        $value = $this->input->post('value');
        }else{
            $value='';
        }

        echo $this->Overtime_hours_orders_model->estlam_task($id,$value);
    }

}

	
	
	
	
