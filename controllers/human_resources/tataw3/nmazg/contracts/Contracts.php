<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contracts extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
         
  
        $this->load->model('human_resources_model/tataw3/nmazg/contracts/Contracts_model');
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
	public function index()//human_resources/tataw3/contracts/Contracts
	{
        
        $data['volunteers'] = $this->Contracts_model->select_volunteers();
    
        $data['title'] = 'بيانات إتفاقية المتطوعين';
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/contracts_v/contracts';
        $this->load->view('admin_index', $data);
	}
//yara_json
public function data()
{
   // $all_strategy =  $this->Strategy_model->select_allStrategy();
    $volunteers = $this->Contracts_model->select_volunteers();
    $arr = array();
    $arr['data'] = array();
    if(!empty($volunteers)){
        $x = 0;
        foreach($volunteers as $value){
            $x++;

            $arr['data'][] = array(
                /*  if($row['file_update_date'] == 0 ){
                      echo '0';
                  }*/

                $x ,                    
                $value->rkm_akd,
                $value->motatw3_name,
                $value->card_num,
                $value->jwal,
                $value->tabe3a_forsa,
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
                                                                window.location="'.base_url().'human_resources/tataw3/nmazg/contracts/Contracts/edit_contract/'. $value->id.'"
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
                                                                window.location="'. base_url().'human_resources/tataw3/nmazg/contracts/Contracts/delete/'. $value->id .'/'. $value->motatw3_id_fk.' "
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
	public function new_contract()//human_resources/tataw3/contracts/Contracts/new_contract
    {
        if($this->input->post('add')){
           // $this->test($_POST);
            $this->Contracts_model->add();
          
            $this->messages('success','إضافة  إتفاقية تطوع');
            redirect('human_resources/tataw3/contracts/Contracts','refresh');
        }
        $data['foras'] = $this->Contracts_model->get_table('tat_foras', array());
       $data['qsm']= $this->Contracts_model->get_table('department_jobs', array('from_id_fk!='=>0));
       $data['employees']= $this->Contracts_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['title'] = 'إضافة  إتفاقية تطوع ';
      
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/contracts_v/new_contract';
        $this->load->view('admin_index', $data);
    }

    public function edit_contract($id)
    {
        if($this->input->post('add')){
            $this->Contracts_model->update($id);
            $this->messages('success','تعديل إتفاقية تطوع');
            redirect('human_resources/tataw3/contracts/Contracts','refresh');
        }
        $data['foras'] = $this->Contracts_model->get_table('tat_foras', array());
        $data['qsm']= $this->Contracts_model->get_table('department_jobs', array('from_id_fk!='=>0));
        $data['employees']= $this->Contracts_model->get_table('employees', array('emp_type'=>1,'status'=>'96'));
        $data['volunteer'] = $this->Contracts_model->getRecordById(array('id'=>$id));
        $data['title'] = 'تعديل إتفاقية تطوع';
        $data['subview'] = 'admin/Human_resources/tataw3_v/nmazg/contracts_v/new_contract';
        $this->load->view('admin_index', $data);
    }

    public function delete($id,$motato3_id)
    {
    	$this->Contracts_model->delete($id,$motato3_id);
        $this->messages('success','حذف  متطوع');
        redirect('human_resources/tataw3/contracts/Contracts','refresh');
    }

    public function print_contract()
    {
        $id=$this->input->post('row_id');
        $data['volunteer'] = $this->Contracts_model->getRecordById(array('id'=>$id));
$data['plan1']=$this->Contracts_model->get_table('tat_nmazg_setting', array('from_code'=>100));
$data['plan2']=$this->Contracts_model->get_table('tat_nmazg_setting', array('from_code'=>200));
if(!empty($data['volunteer']))
        {
    
    
            $data['foras'] = $this->Contracts_model->get_table_by_id('tat_foras', array('id'=>$data['volunteer']['forsa_id_fk']));
     //  $this->test($data['foras']);
       
        }
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/contracts_v/print_contract', $data);
    }

 

    public  function get_detalis(){   
    
         $forsa_id_fk =$this->input->post('forsa_id_fk');
         if(!empty($forsa_id_fk))
         {
         $forsa=$this->Contracts_model->get_table_by_id('tat_foras', array('id'=>$forsa_id_fk));
         echo $forsa->wasf;
         }
         
        
 
     }
     public function get_mot3en()
     {
        $forsa_id_fk =$this->input->post('forsa_id_fk');
        if(!empty($forsa_id_fk))
         {
        $data['mot3en']=$this->Contracts_model->get_table('tat_motat3en', array('current_forsa_fk'=>$forsa_id_fk,'taqem_moqabla'=>'yes','rkm_akd_id'=>0));
  // $this->test($data['mot3en']);
         }
         else{
             $data='';
         }
        $this->load->view('admin/Human_resources/tataw3_v/nmazg/contracts_v/load_mot3en', $data);
         
    }
    public  function get_moto3(){   
    
        $motatw3_id_fk =$this->input->post('motatw3_id_fk');
        if(!empty($motatw3_id_fk))
        {
        $motat3en=$this->Contracts_model->get_table_by_id('tat_motat3en', array('id'=>$motatw3_id_fk));
        echo json_encode($motat3en);
        }
        
     
     

    }
    

}

