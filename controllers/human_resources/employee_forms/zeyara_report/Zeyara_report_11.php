<?php
class Zeyara_report extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
        $this->load->model('system_management/Groups');
        
        $this->load->model('human_resources_model/employee_forms/zeyara_report_m/Zeyara_report_m');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
         
        
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
  
   
 //-----------------------------------------   
 private function message($type,$text){
    $CI =& get_instance();

    $CI->load->library("session");

if($type =='success') {
    return $CI->session->set_flashdata('message', '<script> swal({

        title:"' . $text . '" ,

        confirmButtonText: "تم"

    })</script>');

}elseif($type=='wiring'){
return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
}elseif($type=='error'){
return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
}
        }

    // yraa
    public function addGam3iaVisitors($id=0)// human_resources/employee_forms/visitors/Visitors_c/addGam3iaVisitors
    {
       
        $this->load->model('human_resources_model/employee_forms/visitors/Zeyara_report_m');
        if ($this->input->post('add')) {
            $this->Zeyara_report_m->insertGam3iaVisitors($id);
            $this->message('success','تم إضافة بنجاح');
            redirect('human_resources/employee_forms/visitors/Visitors_c/addGam3iaVisitors', 'refresh');
        }
        $this->load->model('human_resources_model/Employee_model');
        $emp_id=$_SESSION['emp_code'];
        $data['record']=$this->Employee_model->get_one_employee($emp_id);
          $data['records']=$this->Zeyara_report_m->get_all_record();
        if($id != 0){
            $data['result']=$this->Zeyara_report_m->get_one_vesitor($id);
            $data['records']= '';
        }

        $data['title'] = " تقرير زيارة وتواصل";
        $data['subview'] = 'admin/Human_resources/employee_forms/visitors_v/add_visitors';
        $this->load->view('admin_index', $data);
    }

    public function deleteGam3iaVisitors($id)// human_resources/employee_forms/visitors/Visitors_c/deleteGam3iaVisitors
    {
       
        $this->Zeyara_report_m->deleteGam3iaVisitors($id);
        $this->message('success', 'تم الحذف بنجاح');
        redirect('human_resources/employee_forms/visitors/Visitors_c/addGam3iaVisitors', 'refresh');
    }


    
    public function add_setting(){
      
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');

       $edara_n = $this->input->post('edara_n');
       $edara_id_fk = $this->input->post('edara_id_fk');
        $this->Zeyara_report_m->add_gam3ia_visitor_setting($type,$type_name,$edara_n,$edara_id_fk);
       // $data['result'] = $this->Zeyara_report_m->get_setting($type,$edara_n,$edara_id_fk);
       $data['result'] = $this->Zeyara_report_m->get_setting($type, $type_name, $edara_n, $edara_id_fk);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_setting',$data);


    }

     public function load_settigs(){
    
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
        $edara_n = $this->input->post('edara_n');
        $edara_id_fk = $this->input->post('edara_id_fk');
        $data['result'] = $this->Zeyara_report_m->get_setting($type,$type_name,$edara_n,$edara_id_fk);
        $data['type_name'] = $type_name;
     
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_setting',$data);
    }


           public function delete_setting(){
       
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
            $edara_n = $this->input->post('edara_n');
            $edara_id_fk = $this->input->post('edara_id_fk');
            $this->Zeyara_report_m->delete_setting($id);
           // $data['result'] = $this->Zeyara_report_m->get_setting($type,$edara_n,$edara_id_fk);
             $data['result'] = $this->Zeyara_report_m->get_setting($type, $type_name, $edara_n, $edara_id_fk);
            $data['type_name'] = $type_name;
            $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_setting',$data);
        }
        
            public function get_setting_by_id(){
      
        $id = $this->input->post('row_id') ;
       $result = $this->Zeyara_report_m->get_setting_by_id($id);
       echo json_encode($result) ;

    } 

    //////
    public function setting_Visitors($id=0)// human_resources/employee_forms/visitors/Visitors_c/setting_Visitors
    {
       
      
        if ($this->input->post('add')) {
            $this->Zeyara_report_m->insert_stetting($id);
            $this->message('success','تم إضافة بنجاح');
            redirect('human_resources/employee_forms/visitors/Visitors_c/setting_Visitors', 'refresh');
        }
     
 
      
          $data['records']=$this->Zeyara_report_m->get_all_setting();
        if($id != 0){
            $data['result']=$this->Zeyara_report_m->get_one_setting($id);
            $data['records']= '';
        }
        $data['edarat'] = $this->Zeyara_report_m->get_all_edara();
        $data['title'] = " أعدادت زيارة وتواصل";
        $data['tittle'] = " أعدادت زيارة وتواصل";
        $data['subview'] = 'admin/Human_resources/employee_forms/zeyara_report_v/add_setting_visitors';
        $this->load->view('admin_index', $data);
    }
    public function load_edarat(){
    
       
        $data['result'] = $this->Zeyara_report_m->get_all_edara();
     
     
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_edarat',$data);
    }
    public function delete_settings($id){
       
       
        $this->Zeyara_report_m->delete_setting($id);
        redirect('human_resources/employee_forms/visitors/Visitors_c/setting_Visitors', 'refresh');
    }
} // END CLASS 


