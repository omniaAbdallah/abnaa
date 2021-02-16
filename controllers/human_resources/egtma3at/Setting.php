<?php
class Setting extends MY_Controller
{
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
        $this->load->model("human_resources_model/egtma3at/Setting_model");
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function message($type, $text, $method = false)
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
    public function settings($type=0){    // human_resources/egtma3at/Setting/settings/0
        $data['typee']= $type;
        $data['mainDepartments'] = $this->Setting_model->select_all();
        $data['subDepartments'] = $this->Setting_model->select_sub();
        $data['subview'] = 'admin/Human_resources/egtma3at_v/setting_v';
        $this->load->view('admin_index', $data);
    }
    public function AddMainDepartmentSitting($type){
        if ($this->input->post('add_main_department')) {
            $this->Setting_model->insert_edara();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
        }
    }
    public function UpdateMainDepartmentSitting($id,$type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['mainDepartment']=$this->Setting_model->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';
        if ($this->input->post('add_main_department')) {
            $this->Setting_model->update_edara($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
        }
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/setting_v';
        $this->load->view('admin_index', $data);
    }
//
public function AddSubDepartmentSitting($type){
    if ($this->input->post('add_main_department')) {
        $this->Setting_model->insert_sub();
        $this->message('success', 'تم الاضافة بنجاح');
        redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
    }
}
public function UpdateSubDepartmentSitting($id,$type){
    $data['subDepartment']=$this->Setting_model->getById_sub($id);
    $data['typee'] = $type ;
    $data['disabled'] = 'disabled' ;
    $data["id"]=$id;
    $data["type_name"]='';
    if ($this->input->post('add_main_department')) {
        $this->Setting_model->update_sub($id);
        $this->message('success', 'تم الاضافة بنجاح');
        redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
    }
    $data['mainDepartments'] = $this->Setting_model->select_all();
    $data['subview'] = 'admin/Human_resources/egtma3at_v/setting_v';
    $this->load->view('admin_index', $data);
}
public function DeleteMainDepartmenSitting($type,$id){
    $this->load->model('Difined_model');
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("hr_egtma3at_legan",$Conditions_arr);
    $this->message('success','حذف ');
    redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
}
public function DeleteSubDepartmentSitting($type,$id){
    $this->load->model('Difined_model');
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("hr_egtma3at_legan_emp",$Conditions_arr);
    $this->message('success','حذف ');
    redirect('human_resources/egtma3at/Setting/settings/'.$type ,'refresh');
}
public function getConnection_emp()
{
     $all_Emps = $this->Setting_model->get_all_emp();
  //  $all_Emps = $this->Setting_model->get_all_emp();
  //    $this->test($all_Emps);
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