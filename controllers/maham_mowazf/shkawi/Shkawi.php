<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Shkawi extends  MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('maham_mowazf_model/shkawi/Shkawi_model');
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
        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
   // F:\laragon\www\ABNAAv1\application\controllers\maham_mowazf\shkawi\Shkawi.php
    public function add_shkwa(){ // maham_mowazf/shkawi/Shkawi/add_shkwa
       if ($_SESSION['role_id_fk']==3){
           $data['emp_data']= $this->Shkawi_model->get_employee_data('employees',$_SESSION['emp_code']);
       }
       if ($this->input->post('add')){
         // $this->test($_POST);
           $this->Shkawi_model->add_shkwa();
           $this->messages('success', ' تم الارسال  بنجاح');
           redirect('maham_mowazf/shkawi/Shkawi/add_shkwa');
       }
       $data['records']=$this->Shkawi_model->get_all_shkwa_records($_SESSION['emp_code']);
        $data['title'] = " شكاوي الموظفين ";
        $data['subview'] = 'admin/maham_mowazf_view/shkawi/shkawi_view';
        $this->load->view('admin_index', $data);
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Shkawi_model->get_shkwa($row_id);
        $this->load->view('admin/maham_mowazf_view/shkawi/load_details', $data);
}
    public function load_tahwel()
    {
        $type = $this->input->post('type');
        if ($type == 2) {
            $data['all'] = $this->Shkawi_model->get_table('department_jobs', array('from_id_fk !=' => 0));
            $data['type'] = $type;
        } elseif ($type == 1) {
            $data['all'] = $this->Shkawi_model->get_all_emp(0);
            $data['type'] = $type;
        } elseif ($type == 3) {
            $data['all'] = $this->Shkawi_model->get_table('department_jobs', array('from_id_fk' => 0));
            $data['type'] = $type;
        }
        $this->load->view('admin/maham_mowazf_view/shkawi/load_tahwel', $data);
    }
    public function all_shkwa(){ // maham_mowazf/shkawi/Shkawi/all_shkwa
      $data['records']=$this->Shkawi_model->get_all_shkwa($_SESSION['emp_code']);
     // $this->test($data['records']);
         $data['title'] = "     استلام الشكاوي والمقترحات ";
         $data['subview'] = 'admin/maham_mowazf_view/shkawi/employee_shkawi';
         $this->load->view('admin_index', $data);
     }

     ///yara15-9-2020
     //////////////controller
public function load_message_type()
{
   $data["message"]=$this->Shkawi_model->select_search_key('arch_setting','from_code',111);
    $this->load->view('admin/maham_mowazf_view/shkawi/load_message_type', $data);
}
public function add_message_type()
{ 
        $this->Shkawi_model->add_message_type(111);     
}
public function getById_message_type()
{
    $id=$this->input->post('id');
    $reason=$this->Shkawi_model->GetFromGeneral_settings($id,111);
    echo json_encode($reason);
}
public function update_message_type()
{ 
    $id=$this->input->post('id');
    $this->Shkawi_model->update_message_type(111,$id);     
}
public function delete_message_type()
{ 
    $id=$this->input->post('id');
    $this->Shkawi_model->delete_setting($id);
}  

//get_shkwa_type
public function get_shkwa_type()
{
    $this->load->view('admin/maham_mowazf_view/shkawi/load_shkwa');
}
public function load_shkwa_type()
{
   $data["message"]=$this->Shkawi_model->select_search_key('arch_setting','from_code',112);
    $this->load->view('admin/maham_mowazf_view/shkawi/load_shkwa_type', $data);
}
public function add_shkwa_type()
{ 
        $this->Shkawi_model->add_shkwa_type(112);     
}
public function getById_shkwa_type()
{
    $id=$this->input->post('id');
    $reason=$this->Shkawi_model->GetFromGeneral_settings($id,112);
    echo json_encode($reason);
}
public function update_shkwa_type()
{ 
    $id=$this->input->post('id');
    $this->Shkawi_model->update_shkwa_type(112,$id);     
}
//delete_shakwa
public function delete_shakwa($id)
{ 
    $this->Shkawi_model->delete_shakwa($id);
    redirect('maham_mowazf/shkawi/Shkawi/add_shkwa');
}  
public function read_shakwa($id)
{ 
    $this->Shkawi_model->read_shakwa($id);
    redirect('maham_mowazf/shkawi/Shkawi/add_shkwa');
}  
public function getConnection_emp()
{
     $all_Emps = $this->Shkawi_model->get_all_emp();
    $arr_emp = array();
    $arr_emp['data'] = array();
    if (!empty($all_Emps)) {
        foreach ($all_Emps as $row_emp) {
            if (empty($row_emp->edara)) {
                $row_emp->edara = 'غير محدد ';
            }
            if (empty($row_emp->qsm)) {
                $row_emp->qsm = 'غير محدد ';
            }
            $arr_emp['data'][] = array(
                '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                   ondblclick="Get_emp_Name(this)"
                    id="member' . $row_emp->id . '"
                    data-emp_code="' . $row_emp->emp_code . '"
                    data-edara_n="' . $row_emp->edara_n . '"
                    data-edara_id="' . $row_emp->edara_id . '"
                    data-name="' . $row_emp->employee . '"
                    data-job_id="' . $row_emp->degree_id . '"
                    data-job_title="' . $row_emp->mosma_wazefy_n . '"
                    data-qsm_n="' . $row_emp->qsm_n . '"
                    data-qsm_id="' . $row_emp->qsm_id . '"
                    data-start_work_date="' . $row_emp->start_work_date_m . '"
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

}