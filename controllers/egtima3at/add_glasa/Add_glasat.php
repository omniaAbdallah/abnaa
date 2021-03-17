<?php
class Add_glasat extends MY_Controller
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

        $this->load->model('egtima3at_m/add_glasat/Glasat_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index()//egtima3at/add_glasa/Add_glasat
    {
       
      
        $data['all_Emps'] = $this->Glasat_model->get_by('employees',array('employee_type'=>1,'status'=>96));
        $data['records']=$this->Glasat_model->select_all();
        
        $data['last_galsa']=$this->Glasat_model->get_last_galsa();
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['open_galesa'] = $this->Glasat_model->get_open_galesa( $data['edara']);
      //  $this->test( $data['edara']);
        $data['title']="إعداد جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";
        $data['subview'] = 'admin/egtima3at_v/all_glasat/all_glasat';
        $this->load->view('admin_index', $data);
    }
    public function add_galsa()
    {
        $this->Glasat_model->insert_galsa();
        $this->Glasat_model->insert_galsa_member();
    }
    public function edite()
    {
        $rkm=$this->input->post('glsa_rkm');
        $this->Glasat_model->update_galsa_member($rkm);
        $this->Glasat_model->update_galsa($rkm);
        

         
    }
    public function load_details()
     {
        $data['title']="إعداد جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";
      $data['records']=$this->Glasat_model->select_all();
         $this->load->view('admin/egtima3at_v/all_glasat/load_tabel', $data);
        
     }
     public function get_add()
     {
        $data['all_Emps'] = $this->Glasat_model->get_by('employees',array('employee_type'=>1,'status'=>96));
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['emp_code']);
        $data['open_galesa'] = $this->Glasat_model->get_open_galesa($data['edara']);
       $data['last_galsa']=$this->Glasat_model->get_last_galsa();
       //$data['edara']=$this->Glasat_model->get_edara($_SESSION['dep_code']);
       $data['title']="إعداد جلسة جديدة ";
        $data['title_t']="قائمة الجلسات";
         $this->load->view('admin/egtima3at_v/all_glasat/edite_glasat', $data);
     }
    public function update_galsa()
    {
        $rkm=$this->input->post('id');
        $data['last_galsa']=$this->Glasat_model->get_by_rkm($rkm)->galsa_rkm;
        $data['edara']=$this->Glasat_model->get_edara($_SESSION['dep_code']);
        $data['galsa_member']=$this->Glasat_model->get_galsa_member($rkm);
       // $this->test($data['galsa_member']);
        $data['last_magls_update']=$this->Glasat_model->get_by_rkm($rkm);
        //$this->test($data['last_magls_update']);
       // $data['members']=$this->Glasat_model->get_magls_member($rkm);
       
        $data['all_Emps'] = $this->Glasat_model->get_by('employees',array('employee_type'=>1,'status'=>96));
    
        $data['title']="تعديل جلسة ";
        $data['title_t']="قائمة الجلسات";

       // $data['subview'] = 'admin/md/all_glasat/all_glasat';
    $this->load->view('admin/egtima3at_v/all_glasat/edite_glasat', $data);


    }
    public function load_mem_details()
    {
        $rkm=$this->input->post('id');
        $data['galsa_member']=$this->Glasat_model->get_galsa_member($rkm);
        $this->load->view('admin/egtima3at_v/all_glasat/load_member', $data);
    }
    
  /*************************************************/
   
  
  
   
    
    
    
   public function delete_galsa(){
    $glsa_rkm=$this->input->post('id');
    $Conditions_arr=array("id"=>$glsa_rkm); 
    $Conditions_arr_hdoor=array("galsa_rkm_fk"=>$glsa_rkm); 
    $this->Glasat_model->delete("egtm_galast",$Conditions_arr);
    $this->Glasat_model->delete("egtm_galast_members",$Conditions_arr_hdoor);
   

     // redirect("md/all_glasat/all_glasat", 'refresh');
   }

   //
   public function getConnection2()
   {
       $type=$this->input->post('type');
       
       $row_id=$this->input->post('row_id');
       $to_user_id=$this->input->post('to_user_id');
       //$all_Asnafs = $this->Ezn_edafa_model->get_asnaf($store_id);
        //$this->test($to_user_id);
        if($type==1)
        {
       $all_Asnafs = $this->Glasat_model->get_all_emp();
              //$this->test($all_Asnafs);
       $arr_asnaf = array();
       $arr_asnaf['data'] = array();

       if (!empty($all_Asnafs)) {
           $x=1;
           foreach ($all_Asnafs as $row_asnafs) {

               $arr_asnaf['data'][] = array(
                    
                     
                     '<a  value="' . $row_asnafs->id . '"
                     onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                      id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 
  
                      data-type="1"
                      data-emp_n="' . $row_asnafs->employee . '"
                      data-emp_edara="' . $row_asnafs->administration . '"
                      data-emp_edara_n="' . $row_asnafs->edara . '" 
                      data-emp_qsm="' . $row_asnafs->department . '" 
                      data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                      data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                      data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'. $x.'</a>'
                     ,
                
                   
                   '<a  value="' . $row_asnafs->id . '"
                   onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                    id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 

                    data-type="1"
                    data-emp_n="' . $row_asnafs->employee . '"
                    data-emp_edara="' . $row_asnafs->administration . '"
                    data-emp_edara_n="' . $row_asnafs->edara . '" 
                    data-emp_qsm="' . $row_asnafs->department . '" 
                    data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                    data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                    data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'.$row_asnafs->emp_code.'</a>'
                   
                   ,
                   
                   '<a  value="' . $row_asnafs->id . '"
                   onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                    id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 

                    data-type="1"
                    data-emp_n="' . $row_asnafs->employee . '"
                    data-emp_edara="' . $row_asnafs->administration . '"
                    data-emp_edara_n="' . $row_asnafs->edara . '" 
                    data-emp_qsm="' . $row_asnafs->department . '" 
                    data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                    data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                    data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'.$row_asnafs->employee.'</a>'
                   
                   ,
              
                   
                   '<a  value="' . $row_asnafs->id . '"
                   onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                    id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 

                    data-type="1"
                    data-emp_n="' . $row_asnafs->employee . '"
                    data-emp_edara="' . $row_asnafs->administration . '"
                    data-emp_edara_n="' . $row_asnafs->edara . '" 
                    data-emp_qsm="' . $row_asnafs->department . '" 
                    data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                    data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                    data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'.$row_asnafs->job_title.'</a>' 
                   
                   ,
                 
                   '<a  value="' . $row_asnafs->id . '"
                   onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                    id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 

                    data-type="1"
                    data-emp_n="' . $row_asnafs->employee . '"
                    data-emp_edara="' . $row_asnafs->administration . '"
                    data-emp_edara_n="' . $row_asnafs->edara . '" 
                    data-emp_qsm="' . $row_asnafs->department . '" 
                    data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                    data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                    data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'.$row_asnafs->edara.'</a>' 
                   
                   ,
               
                   
                   '<a  value="' . $row_asnafs->id . '"
                   onclick="Get_sanfe_Name(this,' . $row_id . ',1)" 
                    id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->emp_code . '" 

                    data-type="1"
                    data-emp_n="' . $row_asnafs->employee . '"
                    data-emp_edara="' . $row_asnafs->administration . '"
                    data-emp_edara_n="' . $row_asnafs->edara . '" 
                    data-emp_qsm="' . $row_asnafs->department . '" 
                    data-emp_qsm_n="' . $row_asnafs->qsm . '" 
                    data-emp_mosama_wazifa="' . $row_asnafs->degree_id . '" 
                    data-emp_mosama_wazifa_n="' . $row_asnafs->job_title . '"  />'.$row_asnafs->qsm.'</a>' 
                   ,

                   ''
               );
               $x++;
           }
       }
       echo json_encode($arr_asnaf);
    }else if($type==2)
    {
        $all_Asnafs = $this->Glasat_model->get_all_gam3ia_mem();
        //$this->test($all_Asnafs);
 $arr_asnaf = array();
 $arr_asnaf['data'] = array();

 if (!empty($all_Asnafs)) {
     $x=1;
     foreach ($all_Asnafs as $row_asnafs) {

         $arr_asnaf['data'][] = array(

            '<a  value="' . $row_asnafs->id . '"
            onclick="Get_sanfe_Name(this,' . $row_id . ',2)" 
             id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->card_num . '" 
             data-type="2"
             data-emp_n="' . $row_asnafs->name . '"
              />'.$row_asnafs->id.'</a>'  
            
            ,
             
             '<a  value="' . $row_asnafs->id . '"
             onclick="Get_sanfe_Name(this,' . $row_id . ',2)" 
              id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->card_num . '" 
              data-type="2"
              data-emp_n="' . $row_asnafs->name . '"
               />'.$row_asnafs->card_num.'</a>'  
             
             
             ,
             
             '<a  value="' . $row_asnafs->id . '"
             onclick="Get_sanfe_Name(this,' . $row_id . ',2)" 
              id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->card_num . '" 
              data-type="2"
              data-emp_n="' . $row_asnafs->name . '"
               />'.$row_asnafs->name.'</a>'
             
             ,
         
              
             '<a  value="' . $row_asnafs->id . '"
             onclick="Get_sanfe_Name(this,' . $row_id . ',2)" 
              id="member' . $row_asnafs->id . '" data-code="' . $row_asnafs->card_num . '" 
              data-type="2"
              data-emp_n="' . $row_asnafs->name . '"
               />'.$row_asnafs->jwal.'</a>'
             
             ,
            

             ''
         );
         $x++;
     }
 }
 echo json_encode($arr_asnaf);

    }


   }
 //yara30-4-2020
   public function vote_galsa()//egtima3at/add_glasa/Add_glasat/vote_galsa
   {

       $data['records']=$this->Glasat_model->select_all_end();
       $data['notify_galsa']=$this->Glasat_model->select_notify_galsa();
       $data['title']="تصويت الجلسات";
       $data['title_t']="تصويت الجلسات";
       $data['subview'] = 'admin/egtima3at_v/all_glasat/vote_galsa';
       $this->load->view('admin_index', $data);
   }
   public function load_mem_vote()
   {
       $rkm=$this->input->post('id');
       $data['row']=$this->Glasat_model->get_session_data($rkm);
       if($_SESSION["role_id_fk"] == 3 ){
        if($_SESSION["emp_name"]==$data['row']->suspender_emp_n)
        {
           $Conditions_arr=array();
        }
        else{
        $Conditions_arr=array("emp_n"=>$_SESSION["emp_name"]);
        }
      }
       $data['galsa_member']=$this->Glasat_model->get_galsa_member_vote($rkm,$Conditions_arr);
//
      
      

    

  // $data['member_galsa']=$this->Member_session->get_member_session_data($session_num,$Conditions_arr);

   //
       $this->load->view('admin/egtima3at_v/all_glasat/load_vote', $data);
   }
   
    public function update_member_vote()
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $this->Glasat_model->update_vote_hoddor($galsa_rkm);
    }
    public function check_data()
    {
        $galsa_rkm=$this->input->post('galsa_rkm');
        $result=  $this->Glasat_model->check_vote_hoddor($galsa_rkm);
      echo json_encode($result);
    }

}