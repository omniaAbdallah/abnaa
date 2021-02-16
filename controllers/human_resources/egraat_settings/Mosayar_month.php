<?php
class Mosayar_month extends MY_Controller
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

        $this->load->model('human_resources_model/egraat_settings/mosayar_month/Mosayar_month_m');
        
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




    public function settings(){    // human_resources/egraat_settings/Mosayar_month/settings
       $data['mainDepartments'] = $this->Mosayar_month_m->select_all();
       $data['title'] = "أعدادات فترات المسيرات     ";
        $data['subview'] = 'admin/Human_resources/egraat_settings/mosayar_month_v/allSittings';
        $this->load->view('admin_index', $data);
    }

    public function AddMainDepartmentSitting(){

        if ($this->input->post('add_main_department')) {
            $this->Mosayar_month_m->insert_edara();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Mosayar_month/settings' ,'refresh');
        }
    }

    public function UpdateMainDepartmentSitting($id){
        $this->load->model('administrative_affairs_models/Department_jobs');
        $data['mainDepartment']=$this->Mosayar_month_m->getById($id);
        $data["id"]=$id;
     
       
        if ($this->input->post('add_main_department')) {
            $this->Mosayar_month_m->update_edara($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Mosayar_month/settings' ,'refresh');
        }

        $data['title'] = "أعدادات فترات المسيرات    ";
        $data['subview'] = 'admin/Human_resources/egraat_settings/mosayar_month_v/allSittings';
        $this->load->view('admin_index', $data);

    }
    public function DeleteMainDepartmenSitting($id){
        $this->load->model('Difined_model');
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("hr_mosayer_months",$Conditions_arr);
        $this->message('success','حذف ');
        redirect('human_resources/egraat_settings/Mosayar_month/settings' ,'refresh');
    }
//Checkcode

   
public  function Checkcode(){   
    $year =$this->input->post('year');
   $month =$this->input->post('month');
    echo $this->Mosayar_month_m->check_code($year,$month);

}

////function for check day is where month
public  function Check_month(){   
  //date  example
    $date ="2020-01-01";
    //$date =$this->input->post('date');
    $data['data']= $this->Mosayar_month_m->Check_month($date);
  $this->test($data['data']->month);

}


}
