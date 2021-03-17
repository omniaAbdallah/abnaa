<?php
class Main extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));  
        $this->load->model('all_secretary_models/archive_m/main/Main_model');
      /*************************************************************/
      $this->load->model('familys_models/for_dash/Counting');
      $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
    }
    
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    
 public function archive() { //all_secretary/archive/main/Main/archive

    $data['title'] = 'نظام الأرشيف';

    $data['subview'] = 'admin/all_secretary_view/archive_v/main/main_v';
    $data['wared']=$this->Main_model->select_new_wared();
    $data['sader']=$this->Main_model->select_new_sader();
  //  $this->test($data);
    $data['wared_mostalm']=$this->Main_model->select_wared_mostalm();
    $data['sader_mostalm']=$this->Main_model->select_sader_mostalm();
  // $this->test($data);
 //nagwa
 if ($_SESSION['role_id_fk']==1){
  $data['all_sader']=$this->Main_model->get_table('arch_sader_history','');
  $data['all_wared']=$this->Main_model->get_table('arch_wared_history','');
} else{
  $data['all_sader']=$this->Main_model->get_table('arch_sader_history',array('from_user_id'=>$_SESSION['emp_code']));
  $data['all_wared']=$this->Main_model->get_table('arch_wared_history',array('from_user_id'=>$_SESSION['emp_code']));

}
$data['new_sader']=$this->Main_model->get_updates('arch_sader',array('current_from_user_id !='=>0));
$data['new_wared']=$this->Main_model->get_updates('arch_wared',array('current_form_user_id !='=>0));
 
 
 //$this->test($data['wared_mostalm']);
    $this->load->view('admin_index',$data); 

}
public function all_archive()//all_secretary/archive/main/Main/all_archive
{
  //$data['all_sader_end']=$this->Main_model->get_updates('arch_sader',array('suspend'=>4));
  //$data['all_wared_end']=$this->Main_model->get_updates('arch_wared',array('suspend'=>4));
//  $this->test($data);
  $data['subview'] = 'admin/all_secretary_view/archive_v/main/data_archive';
  $this->load->view('admin_index',$data); 
 
}
public function getConnection($from_date,$to_date)
{
    
    $all_Donors = $this->Main_model->get_updates_wared('arch_wared',array('suspend'=>4),$from_date,$to_date);
  //$this->test( $all_Donors);
    $arr_donors = array();
    $arr_donors['data'] = array();

    if (!empty($all_Donors)) {
        foreach ($all_Donors as $row_donors) {
          if($row_donors->awlawya==1){$alwaya_text= 'هام';}
          elseif($row_donors->awlawya==2){$alwaya_text =' عادي  ';}
          elseif($row_donors->awlawya==0){$alwaya_text= 'هام جدا  ';}

            $arr_donors['data'][] = array(
             
                  
                   $row_donors->rkm ,
                   $row_donors->estlam_date,
                  
                   $row_donors->geha_ekhtsas_name,
                   $row_donors->geha_morsla_name ,
                   $row_donors->title,
                   $row_donors->tarekt_estlam_name,
                   $alwaya_text ,
                   '<button 
                   data-toggle="modal" data-target="#myModal_print"   
                   
                   onclick="get_print(\''. $row_donors->title.'\',\''.  $row_donors->date_ar.'\' ,\''.  $row_donors->rkm.'\');"
                   class="btn btn-success">طباعه الباركود</button>
                   <div class="btn-group">
                   <button type="button" class="btn btn-warning">إجراءات</button>
                   <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu">
                     <li><a  href="'. base_url().'/all_secretary/archive/wared/Add_wared/compelete_details/'. $row_donors->id.'"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                    
                   </ul>
                 </div> '
                   
               
             
            );
        }
    }
    echo json_encode($arr_donors);


}
///
public function getConnection_sader($from_date,$to_date)
{
    
    $all_Donors_sader = $this->Main_model->get_updates_sader('arch_sader',array('suspend'=>4),$from_date,$to_date);
    //$this->test( $all_Donors);
    $arr_donors_sader = array();
    $arr_donors_sader['data'] = array();

    if (!empty($all_Donors_sader)) {
        foreach ($all_Donors_sader as $row_donors) {

            $arr_donors_sader['data'][] = array(
             
                  
                   $row_donors->sader_rkm ,
                   $row_donors->ersal_date,
                  
                   $row_donors->geha_ekhtsas_n,
                   $row_donors->geha_morsel_n ,
                   $row_donors->mawdo3_name,
                   $row_donors->tarekt_ersal_n,
                   $row_donors->awlawia_n ,
                   '<button 
                   data-toggle="modal" data-target="#myModal_print"   
                   onclick="get_print(\''. $row_donors->mawdo3_name.'\',\''.  $row_donors->date_ar.'\' ,\''.  $row_donors->sader_rkm.'\');"

                   class="btn btn-success">طباعه الباركود</button>
                   <div class="btn-group">
                   <button type="button" class="btn btn-warning">إجراءات</button>
                   <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu">
                     <li><a  href="'. base_url().'/all_secretary/archive/sader/Add_sader/add_deal/'. $row_donors->id.'"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                    
                   </ul>
                 </div> '

               
             
            );
        }
    }
    echo json_encode($arr_donors_sader);


}


  
    
}
?>