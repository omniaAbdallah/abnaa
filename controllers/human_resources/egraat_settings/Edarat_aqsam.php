<?php
class Edarat_aqsam extends MY_Controller
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

        $this->load->model('human_resources_model/egraat_settings/edarat_aqsam/Edarat_aqsam_m');

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




    public function settings($type=0){    // human_resources/egraat_settings/Edarat_aqsam/settings/0
        $data['typee']= $type;
        $data['mainDepartments'] = $this->Edarat_aqsam_m->select_all();
        $data['subDepartments'] = $this->Edarat_aqsam_m->select_main();
        $data['subview'] = 'admin/Human_resources/egraat_settings/Edarat_aqsam_v/allSittings';
        $this->load->view('admin_index', $data);
    }
    public function AddMainDepartmentSitting($type){

        if ($this->input->post('add_main_department')) {
            $this->Edarat_aqsam_m->insert_edara();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
        }
    }

    public function UpdateMainDepartmentSitting($id,$type){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['mainDepartment']=$this->Edarat_aqsam_m->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';

        if ($this->input->post('add_main_department')) {
            $this->Edarat_aqsam_m->update_edara($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
        }

        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/egraat_settings/Edarat_aqsam_v/allSittings';
        $this->load->view('admin_index', $data);

    }
//
public function AddSubDepartmentSitting($type){

    if ($this->input->post('add_main_department')) {
        $this->Edarat_aqsam_m->insert_sub();
        $this->message('success', 'تم الاضافة بنجاح');
        redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
    }
}

public function UpdateSubDepartmentSitting($id,$type){

    $data['subDepartment']=$this->Edarat_aqsam_m->getById($id);
    $data['typee'] = $type ;
    $data['disabled'] = 'disabled' ;
    $data["id"]=$id;
    $data["type_name"]='';

    if ($this->input->post('add_main_department')) {
        $this->Edarat_aqsam_m->update_sub($id);
        $this->message('success', 'تم الاضافة بنجاح');
        redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
    }
    $data['mainDepartments'] = $this->Edarat_aqsam_m->select_all();

    $data['subview'] = 'admin/Human_resources/egraat_settings/Edarat_aqsam_v/allSittings';
    $this->load->view('admin_index', $data);

}
public function DeleteMainDepartmenSitting($type,$id){
    $this->load->model('Difined_model');
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("hr_edarat_aqsam",$Conditions_arr);
    $this->message('success','حذف ');
    redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
}

public function DeleteSubDepartmentSitting($type,$id){
    $this->load->model('Difined_model');
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("hr_edarat_aqsam",$Conditions_arr);
    $this->message('success','حذف ');
    redirect('human_resources/egraat_settings/Edarat_aqsam/settings/'.$type ,'refresh');
}
    public function getConnection_emp()
    {
         $all_Emps = $this->Edarat_aqsam_m->get_all_emp();
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
                    '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-code="' . $row_emp->code . '"
                        data-name="' . $row_emp->name . '"
                        data-title_id="' . $row_emp->id . '"
                         >' . $row_emp->id . '</a>',
                         '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                         ondblclick="Get_emp_Name(this)"
                          id="member' . $row_emp->id . '"
                          data-code="' . $row_emp->code . '"
                          data-name="' . $row_emp->name . '"
                          data-title_id="' . $row_emp->id . '"
                           >' .$row_emp->code . '</a>' ,
                           '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                           ondblclick="Get_emp_Name(this)"
                            id="member' . $row_emp->id . '"
                            data-code="' . $row_emp->code . '"
                            data-name="' . $row_emp->name . '"
                            data-title_id="' . $row_emp->id . '"
                             >' .$row_emp->name . '</a>' ,
                   
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }
    // getConnection_sub
    public function getConnection_sub()
    {
         $all_Emps = $this->Edarat_aqsam_m->get_all_emp();
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
                    '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_sub(this)"
                        id="member' . $row_emp->id . '"
                        data-code="' . $row_emp->code . '"
                        data-name="' . $row_emp->name . '"
                        data-title_id="' . $row_emp->id . '"
                         >' . $row_emp->id . '</a>',
                         '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                         ondblclick="Get_sub(this)"
                          id="member' . $row_emp->id . '"
                          data-code="' . $row_emp->code . '"
                          data-name="' . $row_emp->name . '"
                          data-title_id="' . $row_emp->id . '"
                           >' .$row_emp->code . '</a>' ,
                           '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                           ondblclick="Get_sub(this)"
                            id="member' . $row_emp->id . '"
                            data-code="' . $row_emp->code . '"
                            data-name="' . $row_emp->name . '"
                            data-title_id="' . $row_emp->id . '"
                             >' .$row_emp->name . '</a>' ,
                   
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }
   

function Checkcode()
{
    $prog_code = $this->input->post('prog_code');
    $data = $this->Edarat_aqsam_m->Checkcode($prog_code);
    if ($data > 0) {
        echo 1;

    } else {
        echo 0;
    }

}

function Checkcode_qsm()
{
    $prog_code = $this->input->post('prog_code');
    $from_id_fk = $this->input->post('from_id_fk');
    $data = $this->Edarat_aqsam_m->Checkcode_qsm($prog_code,$from_id_fk);
    if ($data > 0) {
        echo 1;

    } else {
        echo 0;
    }
}

}
