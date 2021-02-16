<?php
class Taqeem_setting extends MY_Controller
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

        $this->load->model('human_resources_model/egraat_settings/taqeem_setting/Taqeem_setting_m');
        
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




    public function settings(){    // human_resources/egraat_settings/Taqeem_setting/settings
    $data['mainDepartments'] = $this->Taqeem_setting_m->select_all();
        $data['subview'] = 'admin/Human_resources/egraat_settings/taqeem_setting_v/allSittings';
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
    public function AddMainDepartmentSitting(){

        if ($this->input->post('add_main_department')) {
            $this->Taqeem_setting_m->insert_edara();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Taqeem_setting/settings' ,'refresh');
        }
    }

    public function UpdateMainDepartmentSitting($id){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['mainDepartment']=$this->Taqeem_setting_m->getById($id);
        $data["id"]=$id;
        $data["type_name"]='';
        
        if ($this->input->post('add_main_department')) {
            $this->Taqeem_setting_m->update_edara($id);
            $this->message('success', 'تم التعديل بنجاح');
            redirect('human_resources/egraat_settings/Taqeem_setting/settings' ,'refresh');
        }

      
        $data['subview'] = 'admin/Human_resources/egraat_settings/taqeem_setting_v/allSittings';
        $this->load->view('admin_index', $data);

    }
    public function DeleteMainDepartmenSitting($id){
        $this->load->model('Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("hr_evaluate_setting",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/egraat_settings/Taqeem_setting/settings' ,'refresh');
    }
//

   
public function getConnection_emp()
    {
         $all_Emps = $this->Taqeem_setting_m->get_all_emp();
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
               
                $arr_emp['data'][] = array(
                    '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-code="' . $row_emp->code . '"
                        data-name="' . $row_emp->title . '"
                        data-id="' . $row_emp->id . '"
                         >' . $row_emp->id . '</a>',
                         '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                         ondblclick="Get_emp_Name(this)"
                          id="member' . $row_emp->id . '"
                          data-code="' . $row_emp->code . '"
                          data-name="' . $row_emp->title . '"
                          data-id="' . $row_emp->id . '"
                           >' .$row_emp->code . '</a>' ,
                           '<a type="radio" name="choosed" value="' . $row_emp->id . '"
                           ondblclick="Get_emp_Name(this)"
                            id="member' . $row_emp->id . '"
                            data-code="' . $row_emp->code . '"
                            data-name="' . $row_emp->title . '"
                            data-id="' . $row_emp->id . '"
                             >' .$row_emp->title . '</a>' ,
                   
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }


}
