<?php
class Esthkak_estkta3_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
      //  human_resources_model/egraat_settings/Esthkak_estkta3
      $this->load->model('human_resources_model/egraat_settings/Esthkak_estkta3/Model_deduction');
      $this->load->model('human_resources_model/egraat_settings/Esthkak_estkta3/Model_allowances');
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
    public function settings($type=0){    // human_resources/egraat_settings/Esthkak_estkta3_setting/settings/tab_allowances
        $data['typee']= $type;
        $data['allowances']=$this->Model_allowances->select_all();
        $data['deductions']=$this->Model_deduction->select_all();
  //    Esthkak_estkta3
        $data['subview'] = 'admin/Human_resources/egraat_settings/esthkak_estkta3_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }
    //Osama 9-9
    /********************************/
    public function AddSittingAllowances($type){  // human_resources/Esthkak_estkta3_setting/AddSittingLevels
        if ($this->input->post('add_allowances')) {
            $this->Model_allowances->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type ,'refresh');
        }
    }
    public function UpdateSittingAllowances($id,$type){
        $data['allowance']=$this->Model_allowances->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';
        if($this->input->post('add_allowances')){
            $this->Model_allowances->update($id);
            $this->message('success',' تحديث البيانات');
            redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type,'refresh');
        }
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/egraat_settings/esthkak_estkta3_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }
    public function DeleteSittingAllowances($type,$id){
        $this->Model_allowances->delete(array("id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type ,'refresh');
    }
    public function AddDeductionSitting($type){  // human_resources/Esthkak_estkta3_setting/AddSittingLevels
        if ($this->input->post('add_deduction')) {
            $this->Model_deduction->insert();
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type ,'refresh');
        }
    }
    public function UpdateDeductionSitting($id,$type){
        $data['deduction']=$this->Model_deduction->getById($id);
        $data['typee'] = $type ;
        $data['disabled'] = 'disabled' ;
        $data["id"]=$id;
        $data["type_name"]='';
        if ($this->input->post('add_deduction')) {
            $this->Model_deduction->update($id);
            $this->message('success', 'تم الاضافة بنجاح');
            redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type ,'refresh');
        }
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/Human_resources/egraat_settings/esthkak_estkta3_settings/allEmployeesSittings';
        $this->load->view('admin_index', $data);
    }
    public function DeleteDeductionSitting($type,$id){
        $this->Model_deduction->delete(array("id"=>$id));
        $this->message('success','حذف ');
        redirect('human_resources/egraat_settings/Esthkak_estkta3_setting/settings/'.$type ,'refresh');
    }
    public  function Checkcode(){   
        $prog_code =$this->input->post('prog_code');
        $type =$this->input->post('type');
      //  $plan_rkm =$this->input->post('plan_rkm');
        
        echo $this->Model_allowances->check_code($prog_code,$type);

    }
}