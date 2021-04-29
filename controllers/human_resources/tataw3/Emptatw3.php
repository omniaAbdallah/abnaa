<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emptatw3 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();


        $this->load->model('human_resources_model/tataw3/Emptatw3_model');
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
     public function add_talab(){ ///human_resources/tataw3/Emptatw3/add_talab
//$this->test($_SESSION);


        if($this->input->post('add') =='حفظ')
            {
                $this->Emptatw3_model->insert();
         
                  $this->messages('success',' بنجاح إضافة    طلب احتياج فرصة تطوعية');
                    if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/tataw3/Emptatw3/add_talab', 'refresh');
            }
                  
                  
           }else{
            $data['emp_data'] = $this->Emptatw3_model->select_depart();
           // $this->test( $data['emp_data']);
            $data['admin'] = $this->Emptatw3_model->select_by();
            $data['last_rkm'] = $this->Emptatw3_model->get_last_rkm();
$data['moder_tatow']=$this->Emptatw3_model->moder_tatow();
            $data['records'] = $this->Emptatw3_model->select_all();
            
            $data['title'] = "  طلب احتياج فرصة تطوعية ";

            
                if ($this->input->post('from_profile')) {

                $this->load->view('admin/Human_resources/tataw3_v/emps/talab', $data);
            } else {
                $data['subview'] = 'admin/Human_resources/tataw3_v/emps/talab';
                $this->load->view('admin_index', $data);
            }
        }
    }
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Emptatw3_model->GetById($row_id);
        $data['responsibles']=$this->Emptatw3_model->get_all_emp_edara($data['result']->edara_id);
        $data['magalat']=$this->Emptatw3_model->get_all_magalat_edara($data['result']->edara_id);
        $data['admin'] = $this->Emptatw3_model->select_by();
        $data['records'] = $this->Emptatw3_model->get_all_emps($row_id);
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_details',$data);

    }
    public function load_details_emps(){

        $row_id = $this->input->post('row_id');
     
        $data['records'] = $this->Emptatw3_model->get_all_emps($row_id);
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_details_emps',$data);

    }

   public function edit_talab($id = false){
            if($this->input->post('add'))
            {

            $this->Emptatw3_model->update($id);
             
                 if ($this->input->post('from_profile')) {
                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            } else {
                redirect('human_resources/tataw3/Emptatw3/add_talab', 'refresh');
            }
              
            }else{
                
                 if ($this->input->post('id')) {
                $id = $this->input->post('id');
            }
          
        
            $data['admin'] = $this->Emptatw3_model->select_by();
        
  
            $data['title'] = "  طلب احتياج فرصة تطوعية ";
        
            $data['result'] = $this->Emptatw3_model->GetById($id);
         

    
          $data['responsibles']=$this->Emptatw3_model->get_all_emp_edara($data['result']->edara_id);
          $data['magalat']=$this->Emptatw3_model->get_all_magalat_edara($data['result']->edara_id);
             if ($this->input->post('from_profile')) {
                $this->load->view('admin/Human_resources/tataw3_v/emps/talab', $data);
            } else {
                $data['subview'] = 'admin/Human_resources/tataw3_v/emps/talab';
                $this->load->view('admin_index', $data);
            }
          
          
            }
    }

    public function load_responsible()
    {
        $edara_id=$this->input->post('row_id');
        $data['responsibles']=$this->Emptatw3_model->get_all_emp_edara($edara_id);
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_responsible', $data);
    }

    public function load_mgalat()
    {
        $edara_id=$this->input->post('row_id');
        $data['magalat']=$this->Emptatw3_model->get_all_magalat_edara($edara_id);
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_mgalat', $data);
    }
    public function delete_talab($id, $from = false)
    {
        $this->Emptatw3_model->delete($id);
     //  redirect('human_resources/employee_forms/Volunteer_hours/add_volunteer_hours');
   if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        } else {
            redirect('human_resources/tataw3/Emptatw3/add_talab');
        }
    }


    public function get_emp_data()
    {
        $data["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }
  


   


    public function add_option()
    {

        $this->Emptatw3_model->insert_record($this->input->post('valu'));
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
         echo json_encode($data);
     }

 }
 

    public function get_ms2ol_data()
    {
        $emp_name=$this->input->post('id');
        $reason=$this->Emptatw3_model->get_ms2ol_data($emp_name);
        echo json_encode($reason);
    }

    public function add_setting(){
        $type = $this->input->post('type');
        
        $type_name = $this->input->post('type_name'); 
       
        $this->Emptatw3_model->add_setting($type);
       // $data['result'] = $this->Emptatw3_model->get_setting($type,$edara_n,$edara_id_fk);
       $data['result'] = $this->Emptatw3_model->get_setting($type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_setting',$data);
    }
     public function load_settigs(){
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
       
       
           
        $data['result'] = $this->Emptatw3_model->get_setting($type);
        
        
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/tataw3_v/emps/load_setting',$data);
    }
           public function delete_setting(){
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
          
            $this->Emptatw3_model->delete_setting($id);
             $data['result'] = $this->Emptatw3_model->get_setting($type);
            $data['type_name'] = $type_name;
            $this->load->view('admin/Human_resources/tataw3_v/emps/load_setting',$data);
        }
            public function get_setting_by_id(){
        $id = $this->input->post('row_id') ;
       $result = $this->Emptatw3_model->get_setting_by_id($id);
       echo json_encode($result) ;
    } 
    //////yara
    public function publish()
    {
        $id = $this->input->post('id') ;
        $this->Emptatw3_model->publish($id);
    }
    
    public function close()
    {
        $id = $this->input->post('id') ;
        $this->Emptatw3_model->close($id);
    }
    public function all_talab(){ ///human_resources/tataw3/Emptatw3/all_talab

        
                    $data['records'] = $this->Emptatw3_model->select_all_publish();
                    
                    $data['title'] = "  طلبات احتياج فرصة تطوعية المنشورة ";
        
                    
                    
                        $data['subview'] = 'admin/Human_resources/tataw3_v/emps/all_talab';
                        $this->load->view('admin_index', $data);
                    
                
            }
            // check_tataw3



public function check_tataw3()
    {
        if($_SESSION['role_id_fk']==3)
        {
    $tataw3 = $this->Emptatw3_model->get_unseen_tataw3();   
 //   echo 'id='. $da3wat['t3mem']->id;
    if($tataw3->id == ''){
       $data['da3wat_tataw3'] = '';
    }elseif($tataw3->id != ''){
   $data['da3wat_tataw3'] = $this->Emptatw3_model->get_unseen_tataw3();  
 //  $this->test($data['da3wat_tataw3']);
   $this->load->view('admin/Human_resources/tataw3_v/emps/da3wa_load', $data);
    }   
    }
    
}





public function reply_dawa()
    {
        $this->Emptatw3_model->reply_dawa();
    }



 public function all_talab_moder_tatw3(){ ///human_resources/tataw3/Emptatw3/all_talab_moder_tatw3
    $data['moder_tatow']=$this->Emptatw3_model->moder_tatow();
                $data['records'] = $this->Emptatw3_model->select_all_talab_moder_tatw3();
                $data['title'] = "  طلبات احتياج فرصة تطوعية  ";
                $data['subview'] = 'admin/Human_resources/tataw3_v/emps/all_talab_moder_tatw3';
                $this->load->view('admin_index', $data);
                
            
        }
       
        public function update_seen_tatw3()
        {
            $this->Emptatw3_model->update_seen_tatw3();
        }





public function all_talab_ward()
{ ///human_resources/tataw3/Emptatw3/all_talab
    $data['records'] = $this->Emptatw3_model->select_all_emp_tatw3();
    /*print_r($this->db->last_query());
    $this->test($data);*/
    $data['title'] = "طلبات احتياج فرصة تطوعية";
    $data['subview'] = 'admin/Human_resources/tataw3_v/emps/all_talab_ward';
    $this->load->view('admin_index', $data);
}

public function make_action()
{
    $this->Emptatw3_model->make_action();
}

}

    ?>
	
	
	
	
