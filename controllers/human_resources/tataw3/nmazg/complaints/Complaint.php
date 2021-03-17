<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
  
        $this->load->model('human_resources_model/tataw3/nmazg/complaint/Complaint_model');
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
    }

    public function messages($type, $text, $method = false)
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
	public function index()//human_resources/tataw3/nmazg/complaints/Complaint
	{
        
        $data['volunteers'] = $this->Complaint_model->select_volunteers();
    
        $data['title'] = 'بيانات شكوي والتظلم المتطوعين';
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/complaint_v/complaints';
        $this->load->view('admin_index', $data);
	}
//yara_json
public function data()
{
   // $all_strategy =  $this->Strategy_model->select_allStrategy();
    $volunteers = $this->Complaint_model->select_volunteers();
   // $this->test($volunteers);
    $arr = array();
    $arr['data'] = array();
    if(!empty($volunteers)){
       
        $x = 0;
        foreach($volunteers as $value){
            if($value->complaint_type==1)
            {
    $type='شكوي';
            }
            elseif($value->complaint_type==2)
            {
    $type='تظلم';
            }else
            {
                $type=''; 
            }
            $x++;

            $arr['data'][] = array(
                /*  if($row['file_update_date'] == 0 ){
                      echo '0';
                  }*/

                $x ,                    
                $value->id,
                $value->motatw3_name,
                $type,
                $value->jwal,
                $value->forsa_name,
                $value->publisher_name,

                '
                
                 

                <a 
                onclick="print_card('.$value->id.' )"
                
                 title="طباعة"> <i class="fa fa-print" aria-hidden="true"></i> </a>

                
                <a href="#" onclick=\'swal({
                                                                title: "هل انت متأكد من التعديل ؟",
                                                                text: "",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonClass: "btn-warning",
                                                                confirmButtonText: "تعديل",
                                                                cancelButtonText: "إلغاء",
                                                                closeOnConfirm: false
                                                                },
                                                                function(){
                                                                window.location="'.base_url().'human_resources/tataw3/nmazg/complaints/Complaint/edit_complaint/'. $value->id.'"
                                                                });\'>
   
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            
                                                            <a href="#" onclick=\'swal({
                                                                title: "هل انت متأكد من الحذف ؟",
                                                                text: "",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonClass: "btn-warning",
                                                                confirmButtonText: "الحذف",
                                                                cancelButtonText: "إلغاء",
                                                                closeOnConfirm: false
                                                                },
                                                                function(){
                                                                window.location="'. base_url().'human_resources/tataw3/nmazg/complaints/Complaint/delete/'. $value->id .' "
                                                                });\'>
                                                              <i class="fa fa-trash" aria-hidden="true"></i></a>
                          
                                                         
'

            );
        }
    }
    $json = json_encode($arr);
    echo $json;
}

//yara_json
    
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
	public function new_complaint()//human_resources/tataw3/nmazg/complaints/Complaint/new_complaint
    {
        if($this->input->post('add')){
           // $this->test($_POST);
            $this->Complaint_model->add();
            $this->messages('success','إضافة   شكوي والتظلم تطوع');
            redirect('human_resources/tataw3/nmazg/complaints/Complaint','refresh');
        }
        $data['mot3en']=$this->Complaint_model->get_table('tat_motat3en', array());
        $data['foras'] = $this->Complaint_model->get_table('tat_foras', array());
       $data['qsm']= $this->Complaint_model->get_table('department_jobs', array('from_id_fk!='=>0));
       $data['employees']= $this->Complaint_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['title'] = 'إضافة   شكوي والتظلم تطوع ';
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/complaint_v/new_complaint';
     //   $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/contracts_v/new_contract';
        $this->load->view('admin_index', $data);
    }

    public function edit_complaint($id)
    {
        if($this->input->post('add')){
            $this->Complaint_model->update($id);
           // $this->test($_POST);
            $this->messages('success','تعديل  شكوي والتظلم تطوع');
            redirect('human_resources/tataw3/nmazg/complaints/Complaint','refresh');
        }
     
        $data['foras'] = $this->Complaint_model->get_table('tat_foras', array());
        $data['qsm']= $this->Complaint_model->get_table('department_jobs', array('from_id_fk!='=>0));
        $data['employees']= $this->Complaint_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['volunteer'] = $this->Complaint_model->getRecordById(array('id'=>$id));
        $data['title'] = 'تعديل  شكوي والتظلم تطوع';
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/complaint_v/new_complaint';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
    	$this->Complaint_model->delete($id);
        $this->messages('success','حذف   شكوي والتظلم');
        redirect('human_resources/tataw3/nmazg/complaints/Complaint','refresh');
    }

    public function print_complaint()
    {
        $id=$this->input->post('row_id');
        $data['volunteer'] = $this->Complaint_model->getRecordById(array('id'=>$id));

       // $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/complaint_v/new_complaint';
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/complaint_v/print_complaint', $data);
    }

 

    public  function get_detalis(){   
    
         $forsa_id_fk =$this->input->post('forsa_id_fk');
         if(!empty($forsa_id_fk))
         {
         $forsa=$this->Complaint_model->get_table_by_id('tat_foras', array('id'=>$forsa_id_fk));
         echo $forsa->wasf;
         }
         
        
 
     }
     public function get_mot3en()
     {
        $forsa_id_fk =$this->input->post('forsa_id_fk');
        if(!empty($forsa_id_fk))
         {
        $data['mot3en']=$this->Complaint_model->get_table('tat_motat3en', array('current_forsa_fk'=>$forsa_id_fk,'taqem_moqabla'=>'yes','rkm_akd_id'=>0));
  // $this->test($data['mot3en']);
         }
         else{
             $data='';
         }
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/complaint_v/load_mot3en', $data);
         
    }
    public  function get_moto3(){   
    
        $motatw3_id_fk =$this->input->post('motatw3_id_fk');
        if(!empty($motatw3_id_fk))
        {
        $motat3en=$this->Complaint_model->get_table_by_id('tat_motat3en', array('id'=>$motatw3_id_fk));
        echo json_encode($motat3en);
        }
        
     
     

    }
    
    public function forsa_data(){

        $motatw3_id_fk = $this->input->post('motatw3_id_fk');
      
        $forsa_data= $this->Complaint_model->get_forsa_data($motatw3_id_fk);
        $json = json_encode($forsa_data);
        echo $json;

    }
    
    
    
      public function wared_complaint()//human_resources/tataw3/nmazg/complaints/Complaint/wared_complaint
	{
        
       
    
        $data['title'] = 'بيانات شكوي والتظلم المتطوعين';

        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/complaint_v/complaints_wared';
        $this->load->view('admin_index', $data);
	}
//yara_json
public function wared_data()
{
   // $all_strategy =  $this->Strategy_model->select_allStrategy();
    $volunteers = $this->Complaint_model->select_wared_volunteers();
   // $this->test($volunteers);
    $arr = array();
    $arr['data'] = array();
    if(!empty($volunteers)){
       
        $x = 0;
        foreach($volunteers as $value){
            if($value->complaint_type==1)
            {
    $type='شكوي';
            }
            elseif($value->complaint_type==2)
            {
    $type='تظلم';
            }else
            {
                $type=''; 
            }
            $x++;

            $arr['data'][] = array(
                /*  if($row['file_update_date'] == 0 ){
                      echo '0';
                  }*/

                $x ,                    
                $value->id,
                $value->motatw3_name,
                $type,
                $value->jwal,
                $value->forsa_name,
                $value->publisher_name,

                '
                
                 

                <a 
                onclick="print_card('.$value->id.' )"
                
                 title="طباعة"> <i class="fa fa-print" aria-hidden="true"></i> </a>

                
                 <button type="button" 
                 onclick="get_details(       '.$value->id.'   ) "
                 class="btn btn-warning"
                                                            
                                     >  استلام </button>
                                                            
                                                          
                          
                                                         
'

            );
        }
    }
    $json = json_encode($arr);
    echo $json;
}

public function accept_complimat()
	{
         $row_id = $this->input->post('row_id');
         
        $this->Complaint_model->accept_complimant_tataw3($row_id);
	}


}

