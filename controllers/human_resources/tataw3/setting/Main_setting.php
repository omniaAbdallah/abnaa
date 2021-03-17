<?php
/**
 * Created by PhpStorm.
 * User: alatheer
 * Date: 3/9/2020
 * Time: 10:30 AM
 */
class Main_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('human_resources_model/tataw3/setting/Main_setting_m');
        $this->myarray = $this->Main_setting_m->all_settings();
//        /**********************************************************/
//        $this->load->model('familys_models/for_dash/Counting');
//        $this->count_basic_in  = $this->Counting->get_basic_in_num();
//        $this->files_basic_in  = $this->Counting->get_files_basic_in();
//        /*************************************************************/
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
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
   /* public function index($type=0)//human_resources/tataw3/setting/Main_setting/
    {
        $data['typee']= $type;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);
       //yara
        $data['all_band']= $this->Main_setting_m->get_type_band_settings();
      //$this->test($data['all_band']);
        $data['title'] = 'اعدادات';
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);
    }*/
    
       public function index($type=0)//human_resources/tataw3/setting/Main_setting/
    {
        $data['typee']= $type;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);
        //yara
        $data['all_band']= $this->Main_setting_m->get_type_band_settings();
        $data['all_band_taqeem']= $this->Main_setting_m->get_type_band_taqeem_settings();
        //$this->test($data['all_band']);
        $data['title'] = 'اعدادات';
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);
    }
  /*  public function AddSetting($from_code){  // tataw3/setting/Main_setting/AddSetting
        if($this->input->post('add')){
            $this->Main_setting_m->add($from_code);
            $this->messages('success',' تم الإضافة بنجاح '.$this->myarray[$from_code]);
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }

        if($this->input->post('add_band')){
            $this->Main_setting_m->add_band();
            $this->messages('success',' تم الإضافة بنجاح ');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
    }*/
    
        public function AddSetting($from_code){  // tataw3/setting/Main_setting/AddSetting
        if($this->input->post('add')){
            $this->Main_setting_m->add($from_code);
            $this->messages('success',' تم الإضافة بنجاح '.$this->myarray[$from_code]);
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }

        if($this->input->post('add_band')){
            $this->Main_setting_m->add_band();
            $this->messages('success',' تم الإضافة بنجاح ');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        if($this->input->post('add_band_taqeem')){
            $this->Main_setting_m->add_band_taqeem();
            $this->messages('success',' تم الإضافة بنجاح ');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
    }
    
    
    /*public function UpdateSetting($id,$from_code){
        if($this->input->post('add')){
            $this->Main_setting_m->update($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        if($this->input->post('add_band')){
            $this->Main_setting_m->update_band($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        $data['typee']= $from_code;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);
        $data['record'] = $this->Main_setting_m->getById($id);
        //yara
        $data['record_band'] = $this->Main_setting_m->getById_band($id);
        $data['typee'] = $from_code ;
        $data["id"]=$id;
        $data['title'] = 'اعدادات';
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);
    }*/
        public function UpdateSetting($id,$from_code){
        if($this->input->post('add')){
            $this->Main_setting_m->update($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        if($this->input->post('add_band')){
            $this->Main_setting_m->update_band($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        if($this->input->post('add_band_taqeem')){
            $this->Main_setting_m->update_band_taqeem($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
        }
        $data['typee']= $from_code;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);
        $data['record'] = $this->Main_setting_m->getById($id);
        //yara
        $data['record_band'] = $this->Main_setting_m->getById_band($id);
        $data['record_band_taqeem'] = $this->Main_setting_m->getById_band_taqeem($id);
        $data['typee'] = $from_code ;
        $data["id"]=$id;
        $data['title'] = 'اعدادات';
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);
    }
    public function DeleteSetting($id,$from_code){
        $this->Main_setting_m->delete($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
    }
    //yara
    public function DeleteSetting_band($id,$from_code){
        $this->Main_setting_m->delete_band($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
    }
    public function change_status()
    {
     $valu = $this->input->post('valu');
     $id = $this->input->post('id');
     $data['status'] = $this->Main_setting_m->change_status($valu, $id);
     echo json_encode($data);
    
    } 
    
    
    
     public function DeleteSetting_band_taqeem($id,$from_code){
        $this->Main_setting_m->delete_band_taqeem($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('human_resources/tataw3/setting/Main_setting/index/'.$from_code,'refresh');
    }
    public function change_status_band_taqeem()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Main_setting_m->change_status_band_taqeem($valu, $id);
        echo json_encode($data);

    }
 /*********************************************************************************/
 
    
  public function add_emp_magalat() // human_resources/Salaries_setting/salaries_setting
    {
        $this->load->model('human_resources_model/employee_forms/Volunteer_hours_model');
        if($this->input->post('add')){
            
            $this->Main_setting_m->add_emp_magalat();
            redirect('human_resources/tataw3/setting/Main_setting/add_emp_magalat');
        }
         $data['edarat'] = $this->Volunteer_hours_model->select_by();
        $data['all_emp_magalat'] = $this->Main_setting_m->get_all_emp_magalat_records();
        $data['title'] = "مجالات تطوع الموظفين ";
     
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/emp_magalat';
        $this->load->view('admin_index', $data);
    }    
    
    
      public function edit_emp_magalat($id = false){
         $this->load->model('human_resources_model/employee_forms/Volunteer_hours_model');
            if($this->input->post('add'))
            {
               $this->Main_setting_m->update_emp_magalat($id);
                redirect('human_resources/tataw3/setting/Main_setting/add_emp_magalat', 'refresh');
           
            }else{
                
                 if ($this->input->post('id')) {
                $id = $this->input->post('id');
            }
           $data['result'] = $this->Main_setting_m->getById_emp_magalat($id);
         $data['edarat'] = $this->Volunteer_hours_model->select_by();
        $data['all_emp_magalat'] = $this->Main_setting_m->get_all_emp_magalat_records();
        
     $data['title'] = "مجالات تطوع الموظفين ";
                $data['subview'] = 'admin/Human_resources/tataw3_v/setting/emp_magalat';
                $this->load->view('admin_index', $data);
          
          
          
            }
    }
    
    
    
        public function delete_emp_magalat($id)
    {
        $this->Main_setting_m->delete_emp_magalat($id);

            redirect('human_resources/tataw3/setting/Main_setting/add_emp_magalat');
 
    }
 
}