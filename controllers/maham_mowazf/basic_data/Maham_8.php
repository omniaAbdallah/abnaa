<?php 
class Maham extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
         $this->load->model('maham_mowazf_model/basic_data/Basic_data_model');
          $this->load->model('human_resources_model/Finance_employee_model');  
          $this->load->model('human_resources_model/Employee_model'); 
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    
    
    
        public function hr_data(){ //maham_mowazf/basic_data/Maham/hr_data
        
          /*echo "<pre>";
        print_r($_SESSION);*/
        
       $emp_id=  $_SESSION['emp_code'];
        //----------------- basic_data
        $data["basic_data"]=$this->Employee_model->get_emp_basic_data($emp_id);
        //----------------- job_data
        $data["job_data"]=$this->Employee_model->get_emp_job_data($emp_id);
      if(isset($data["basic_data"]->edara_id) || $data["basic_data"]->edara_id != null || 
      $data["basic_data"]->edara_id != 0
      ){
        $data["my_employee_edara"]=$this->Basic_data_model->select_my_employee_edara($data["basic_data"]->edara_id); 
      }else{
        $data["my_employee_edara"] = '' ; 
      }
      
       $data["all_employees"]=$this->Basic_data_model->select_all_employee();    
      
      
  
      
     /*   //----------------- finance_data
        $data['badalat'] = $this->Finance_employee_model->getBadalat(1);
        $data['discounts'] = $this->Finance_employee_model->getBadalat(2);
        $data['banks'] = $this->Finance_employee_model->getBanks();
        $data['bdalat_id'] = $this->Finance_employee_model->getBadalat_id(1);
        $data['cuts_id'] = $this->Finance_employee_model->getBadalat_id(2);
        $data["finance_data"]=$this->Employee_model->get_emp_finance_data($emp_id);
        //----------------- contract_data
        $data["contract_data"]=$this->Employee_model->get_emp_contract_data($data["basic_data"]->emp_code);
        //----------------- dwam_data
        $data["dwam_details_data"]=$this->Employee_model->get_emp_dwam_details_data($emp_id);
        $data["dwam_data"]=$this->Employee_model->get_emp_dwam_data($emp_id);
        //----------------- files_data
        $data["files_data"]=$this->Employee_model->get_emp_files_data($emp_id);
        //----------------- custody_data
        $data["ohad_data"]=$this->Employee_model->get_emp_ohad_data($emp_id);
        */
        
       /*echo "<pre>";
        print_r($data);
        echo '</pre>';
        die;
        */
     $data['title'] = 'الرئيسية';
    $data['subview'] = 'admin/maham_mowazf_view/basic_data/pprofile_view';
    $this->load->view('admin_index',$data); 
    }
    
    
    
    
    public function ratb(){ //maham_mowazf/basic_data/Maham/ratb
      
      
     $data['title'] = 'الرواتب';
    $data['subview'] = 'admin/maham_mowazf_view/ratb_data/ratb_view';
    $this->load->view('admin_index',$data);  
      
      }   
    
    
}
?>