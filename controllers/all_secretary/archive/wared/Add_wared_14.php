<?php
class Add_wared extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
 
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
  
       
               /**********************************************************/ 
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();  
      /*************************************************************/
      $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $this->load->model('system_management/Groups');
        
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
   /* public function read_file($folder,$file_name)
    {
        $this->load->helper('file');
        // $file_name=$this->uri->segment(3);
        // $file_path = 'uploads/archive/deals/'.$file_name;
        $file_path = $folder.'/'.$file_name;
      //  $file_path = $folder;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);

    }*/
       public function read_file($file_name)
    {
        $this->load->helper('file');
     
       $wared_id=$this->Wared_model->select_key('arch_wared_morfq','file',$file_name)->wared_id_fk;
       $folder=$this->Wared_model->select_key('arch_wared','id',$wared_id)->folder_path;

        $file_path = $folder.'/'.$file_name;
  
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);

    }
    public function index()//all_secretary/archive/wared/Add_wared
    {
        
         /*  $data['emp_dep'] = $this->Sader_model->get_edara_dep_code();
         
           $this->test( $data['emp_dep']);*/
        /*
        echo '<pre>';
        print_r($_SESSION);*/
      //  $data['emp_dep'] = $this->Sader_model->emp_dep();
        $data['emp_dep'] = $this->Sader_model->get_edara_dep_code();
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['last_rkm']=$this->Wared_model->get_last_rkm();
    //    $data['result']=$this->Wared_model->select_all_wared();
      $data['arr']=$this->Wared_model->select_secret();
    
      // $this->test( $data['arr']);
        $data['subview'] = 'admin/all_secretary_view/archive_v/wared/add_wared';
        $this->load->view('admin_index', $data);
    }
    public function add()
    {   
      //  $this->test($_POST);
       
       
       $insert_id=$this->Wared_model->insert();
       echo ($insert_id);
       return;
     //  $this->messages('success', ' تمت الاضافه  بنجاح');
     //  $data['last_rkm']=$this->Wared_model->get_rkm();
   //    redirect('all_secretary/archive/wared/Add_wared/compelete_details/'.$data['last_rkm'],'refresh');

    }
   /* public function  update($id){   
        if($this->input->post('add')){
       
           $this->Wared_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           redirect('all_secretary/archive/wared/Add_wared/update/'.$id,'refresh');
        }
        $data['arr']=$this->Wared_model->select_secret();
      $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($id,2);
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['title']="تعديل جهه اساسيه";
        $data['item']=$this->Wared_model->get_by_id($id);
        $data['subview'] = 'admin/all_secretary_view/archive_v/wared/add_wared';
        $this->load->view('admin_index', $data);
         
     }*/
     
     public function  update($id){   
        if($this->input->post('add')){
           $this->Wared_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           redirect('all_secretary/archive/wared/Add_wared/compelete_details/'.$id,'refresh');
        }
         $data['emp_dep'] = $this->Sader_model->emp_dep();
        $data['arr']=$this->Wared_model->select_secret();
      $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($id,2);
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['title']="تعديل جهه اساسيه";
        $data['item']=$this->Wared_model->get_by_id($id);
        $data['subview'] = 'admin/all_secretary_view/archive_v/wared/add_wared';
        $this->load->view('admin_index', $data);
     }
     public function delete($id)
     {
        $this->Wared_model->delete($id); 
        $this->messages('success', ' تمت الحذف  بنجاح');
        redirect('all_secretary/archive/wared/Add_wared','refresh');
     }

   /* public function load_geha()
     {

        $data["geha"]=$this->Wared_model->select_search('arch_gehat');
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_geha', $data);
     }*/
     
      public function load_geha()
     {
        $data["geha"]=$this->Wared_model->select_search('arch_gehat');

         $this->load->view('admin/all_secretary_view/archive_v/wared/load_geha', $data);

     }
     public function load_estlam()
     {

        $data["estlam"]=$this->Wared_model->select_search_key('arch_setting','from_code',401);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_estlam', $data);

     }
     
     
     
     
     public function add_estlam()
     
     { 
     
             $this->Wared_model->add_estlam();
             
            
         
     }
    
     public function getById_estlam()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->GetFromGeneral_settings($id);
         echo json_encode($reason);
         
     }
     public function update_estlam()
     { 
         
         
         $id=$this->input->post('id');
             $this->Wared_model->update_estlam($id);
            
           
         
     }
     public function delete_estlam()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_setting($id);
          
            
         
     }  

     
     
    public function load_geha_morsel()
    {
     
     
     
   
   
       $data["geha"]=$this->Wared_model->select_search('arch_gehat');
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_geha_morsel', $data);
    }


    public function load_morsel()
    {
$id=$this->input->post('id');
//$this->test($id);
$data["geha"]=$this->Wared_model->select_search_key('arch_gehat_ms2olen','geha_id_fk',$id);

$this->load->view('admin/all_secretary_view/archive_v/wared/load_morsel', $data);

    }
   
     public function load_details(){
        $row_id = $this->input->post('row_id');
       $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($row_id,2);
      
        $data['get_all'] = $this->Wared_model->get_wared_by_id($row_id);
        $data['arr']=$this->Wared_model->select_secret();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_details', $data);
}
   /* public function load_details(){

       $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($row_id,2);
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Wared_model->get_wared_by_id($row_id);
        $data['arr']=$this->Wared_model->select_secret();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_details', $data);
}*/
/*
public function compelete_details($id)
{
//$this->test($_SESSION);
  $data['title'] = "  تفاصيل المعاملة";
   $data['title_wared'] = "  تفاصيل الوارد";
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
    //$this->test(   $data['get_all']);
 //   $data['morfqat']=$this->Wared_model->get_morfq_by_id($id);
    $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;
    $data['department']=$this->Wared_model->get_all_department();
    $data['employees']=$this->Wared_model->get_all_employees();
    $data["record"]=$this->Wared_model->select_mohmat($id);
    $data['last_rkm']=$this->Wared_model->get_last_mohma();
    $data['result']=$this->Wared_model->get_comments($id);
    $data['sader']=$this->Wared_model->get_all_sader();
    $data['wared']=$this->Wared_model->select_all_wared();
    $data['arr']=$this->Wared_model->select_secret();
    $data["relations"]=$this->Wared_model->select_relations($id);
    //$this->test($data['get_all_morfq']);
    
    $data['subview'] = 'admin/all_secretary_view/archive_v/wared/deal_details';
    $this->load->view('admin_index',$data); 
}

*/
/*public function compelete_details($id)
{
//$this->test($_SESSION);
  $data['title'] = "  تفاصيل المعاملة";
   $data['title_wared'] = "  تفاصيل الوارد";
   $data['emp_dep'] = $this->Sader_model->emp_dep();
   

     $data['emp_dep'] = $this->Sader_model->emp_dep();
   
   
     //$this->test(   $data['get_all']);
   
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
    //$this->test(   $data['get_all']);
 //   $data['morfqat']=$this->Wared_model->get_morfq_by_id($id);
    $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;
    $data['department']=$this->Wared_model->get_all_department();
    $data['employees']=$this->Wared_model->get_all_employees();
    //$data["record"]=$this->Wared_model->select_mohmat($id);
    $data["record"]=$this->Wared_model->select_mohmat_by_ward_id($id);
    
    $data['last_rkm']=$this->Wared_model->get_last_mohma();
    $data['results']=$this->Wared_model->get_comments($id);
    $data['sader']=$this->Wared_model->get_all_sader();
    $data['wared']=$this->Wared_model->select_all_wared();
    $data['arr']=$this->Wared_model->select_secret();
    $data["relations"]=$this->Wared_model->select_relations($id);
    $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($id,2);
    //$this->test($data['get_all_morfq']);
    $data['edite']=$this->Wared_model->get_by_id($id);
    $data['subview'] = 'admin/all_secretary_view/archive_v/wared/deal_details';
    $this->load->view('admin_index',$data); 
}
*/

public function compelete_details($id)
{
//$this->test($_SESSION);
  $data['title'] = "  تفاصيل المعاملة";
   $data['title_wared'] = "  تفاصيل الوارد";
   $data['emp_dep'] = $this->Sader_model->emp_dep();
   $data['all_Emps_thwel'] = $this->Wared_model->get_emp_wared_by_id($id);

     $data['emp_dep'] = $this->Sader_model->emp_dep();
   
   
     //$this->test(   $data['get_all']);
   
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
    //$this->test(   $data['get_all']);
 //   $data['morfqat']=$this->Wared_model->get_morfq_by_id($id);
    $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;
    $data['department']=$this->Wared_model->get_all_department();
    $data['employees']=$this->Wared_model->get_all_employees();
   
       //$data["record"]=$this->Wared_model->select_mohmat($id);
    $data["record"]=$this->Wared_model->select_mohmat_by_ward_id($id);
    $data['last_rkm']=$this->Wared_model->get_last_mohma();
    $data['results']=$this->Wared_model->get_comments($id);
    $data['sader']=$this->Wared_model->get_all_sader();
    $data['wared']=$this->Wared_model->select_all_wared();
    $data['arr']=$this->Wared_model->select_secret();
    $data["relations"]=$this->Wared_model->select_relations($id);
    $data['tareket_estlam']=$this->Wared_model->get_all_tareket_estlam($id,2);
    //$this->test($data['get_all_morfq']);
    $data['edite']=$this->Wared_model->get_by_id($id);
    $data['subview'] = 'admin/all_secretary_view/archive_v/wared/deal_details';
    $this->load->view('admin_index',$data); 
}


private function upload_all_file($file_name,$id)
{
    $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
  $path=$data['get_all']->folder_path;
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
   $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

    $config['encrypt_name'] = true;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $this->upload->data();
        //  $this->thumb($datafile);
        return $datafile['file_name'];
    }
}
// private function upload_muli_file($input_name,$id)
// {
//     $filesCount = count($_FILES[$input_name]['name']);
//     for ($i = 0; $i < $filesCount; $i++) {
//         $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
//         $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
//         $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
//         $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
//         $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
//         $all_img[] = $this->upload_all_file("userFile",$id);
//     }
//     return $all_img;
// }
private function upload_muli_file($input_name,$folder){
    $filesCount = count($_FILES[$input_name]['name']);

    for($i = 0; $i < $filesCount; $i++){
        $ext = pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION);
        $full_ext = '.'.$ext;
      if ($ext=="jpeg" || $ext=="JPEG"){
          $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.jpg');

      }
      if ($ext=="PNG"){
        $_FILES[$input_name]['name'][$i] = str_replace($_FILES[$input_name]['name'][$i],$full_ext,'.png');

    }
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[]=$this->upload_all_file("userFile",$folder);
    }
 
   return $all_img;

}

public function upload_img()
{
    $id = $this->input->post('row');
    
    //    echo "<pre>";
    //    print_r( $id);
    //    return;
    $images = $this->upload_muli_file("files",$id);
  
    //  $this->test($_FILES);
    
    $this->Wared_model->insert_attach($id, $images);
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    $wared_id = $this->input->post('row');
    $this->delete_upload($id,$wared_id);
    $this->Wared_model->delete_morfq($id);

}
public function delete_upload($id,$wared_id)
{
    $img = $this->Wared_model->get_table_by_id('arch_wared_morfq',array('id'=>$id));
    $path=$this->Wared_model->get_table_by_id('arch_wared',array('id'=>$wared_id));
    if (file_exists($path->folder_path . "/" . $img->file)) {
        unlink(FCPATH . "" . $path->folder_path . "/" . $img->file);
    }
  
}
public function load()
     {
      
      
      $id=$this->input->post('id');
      $data['get_all'] = $this->Wared_model->get_wared_by_id($id);
      $data['morfqat'] = $this->Wared_model->get_table('arch_wared_morfq',array('wared_id_fk'=>$id));
    $data['folder_path']= $data['get_all']->folder_path;

         $this->load->view('admin/all_secretary_view/archive_v/wared/load', $data);
     }
     public function get_fatora_attach()
     {
         $id=$this->input->post('val_id');
         $data['imgs']=$this->Wared_model->get_images($id);
         $x= $data['imgs'][0]->wared_id_fk;
        
       $data['path']=$this->Wared_model->get_wared_by_id($x);
     //$this->test( $data['path']->folder_path);
        
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_attach',$data);
 
 
     }

    
///////////////////////////التوجيهات
// public function add_comment($id)//technical_support/tazkra/tazkra_comments/tazaker_comments
// {

//     //$data['result']= $this->Tazaker_comments->get_details();
//    // $this->test($data['result']);
//    // die;
// // $this->test($_SESSION);
//    $data['result']=$this->Wared_model->get_comments($id);
//   // $this->test($data['result']);
//   $data['get_tazkra']= $this->Tazkra_orders_model->get_tzkra_byId($id);
//    $data['get_all']=$this->Tazkra_orders_model->get_tzkra_byId($id);
//         //$this->test($data['get_all']->id);
//     $data['subview'] = 'admin/all_secretary_view/archive_v/wared/tazkra_comments/tazaker_comments';
//     $this->load->view('admin_index', $data);

// }


public function load_details_comment()
{
    $row_id = $this->input->post('row_id');

   
    $data['get_tazkra']= $this->Wared_model->get_comment_byId($row_id);
 
    //$this->test( $data['get_tazkra']);
    $this->load->view('admin/all_secretary_view/archive_v/wared/comments/load_details', $data);

}
//yara

public function add_comment()
{
  $id=  $this->input->post('id');
  $comment=  $this->input->post('comment');
  $this->Wared_model->add_comment($id, $comment);
}
public function update_comment()
{
  //  $this->test($_POST);
    $id=  $this->input->post('id');
    $comment=  $this->input->post('comment');
    $this->Wared_model->update_comment($id, $comment);

}

public function delete_comment()
{
    $id=  $this->input->post('id');

    $this->Wared_model->delete_comment($id);

}
public function load_comments()
 {
  
  
  
$id= $this->input->post('id');
    $data['result']=$this->Wared_model->get_comments($id);
    $this->load->view('admin/all_secretary_view/archive_v/wared/comments/load_comment', $data);
 } 
 
 public function add_mohma()
 {
   
//$this->test($_POST);
    $this->Wared_model->add_mohma();
   // $this->Wared_model->update_wared_mohma();


 }

 public function update_mohma()
 {
   //$this->test($_POST);
$id=$this->input->post('id');
    $this->Wared_model->update_mohma($id);
   // $this->Wared_model->update_wared_mohma();

 }
 public function load_travel_type()
     {
      
      
      
    
    $id=$this->input->post('id');
        $data["record"]=$this->Wared_model->select_mohmat($id);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_travel_type', $data);
     }
 
     public function getById_travel_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->select_mohmat_by_id($id);
         echo json_encode($reason);
         
     }
     public function delete_travel_type()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_mohma($id);
           
      
         
     }
     public function get_details_wared()
     {
        $data['type']=$this->input->post('valu');
        $data['wared']=$this->Wared_model->select_all_wared();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_wared', $data);
     }
     public function get_details_sader()
     {
$data['type']=$this->input->post('valu');
        $data['sader']=$this->Wared_model->get_all_sader();
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_sader', $data);
     }
     
 
     public function add_relation()
     {
       
    
        $this->Wared_model->add_relation();
      
    
    
     }
     
     public function load_relation()
     {
      
      $id=$this->input->post('id');
      
    
    
        $data["relations"]=$this->Wared_model->select_relations($id);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_relation', $data);
     }
     public function getById_relation()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->select_relation_by_id($id);
         echo json_encode($reason);
         
     }
     public function update_relation()
     {
       
    $id=$this->input->post('id');
        $this->Wared_model->update_relation($id);
     
    
     }
     public function delete_relation()
     {
       
    $id=$this->input->post('id');
        $this->Wared_model->delete_relation($id);
     
    
     }
     public function load_reason(){

          $data['id'] = $this->input->post('row_id');
        $data['reason']=$this->Wared_model->select_search_key('arch_setting','from_code',701);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_reasons', $data);
}
public function add_reason_end()
{
$id=$this->input->post('id');
$value=$this->input->post('value');
$name=$this->input->post('name');
$to_user_n=$this->input->post('to_user_n');
$to_user_id=$this->input->post('to_user_id');
$from_user_n=$this->input->post('from_user_n');
$date_end=$this->input->post('date_end');
$num_end=$this->input->post('num_end');


$this->Wared_model->update_wared_status($id,$value,$name,$to_user_n,$to_user_id,$from_user_n,$date_end,$num_end);


}
/*public function PrintCode(){
   // $this->test($_SESSION);    

 
    if($this->input->post("id")){
         



           function arabic_w2e($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_western, $arabic_eastern, $str);
           }
           //=============================================
           function arabic_e2w($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_eastern, $arabic_western, $str);
           }
           //=============================================
           $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));  //get_one_barcode

     
           $id=$this->input->post('id');
           $wared = $this->Wared_model->get_wared_by_id($id);

           $data_load["date"]= $wared->date_ar;
           $data_load["id"]=$wared->id;
           $data_load["morfaq_num"]=$wared->morfq_num;
           $data_load["subject"]=$wared->subject;


     
      
         $this->load->view('admin/all_secretary_view/archive_v/wared/get_one_barcode', $data_load);

       }
 // $this->test($_POST);
   }
   */
   
   public function PrintCode(){
   // $this->test($_SESSION);    

 
    if($this->input->post("id")){
         



           function arabic_w2e($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_western, $arabic_eastern, $str);
           }
           //=============================================
           function arabic_e2w($str){
               $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
               $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
               return str_replace($arabic_eastern, $arabic_western, $str);
           }
           //=============================================
           $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));  //get_one_barcode

         /*  $arr_date=explode("/",$this->input->post("date"));
           $arr_date[0]=arabic_w2e($arr_date[0]);
           $arr_date[1]=arabic_w2e($arr_date[1]);
           $arr_date[2]=arabic_w2e($arr_date[2]);*/

           //$data_load["date"]=  $arr_date[0]."/". $arr_date[1]."/". $arr_date[2];
           $id=$this->input->post('id');
           $wared = $this->Wared_model->get_wared_by_id($id);

           $data_load["date"]= $wared->date_ar;
           $data_load["id"]=$wared->id;
           $data_load["morfaq_num"]=$wared->morfq_num;
           $data_load["subject"]=$wared->subject;


     
           $this->Wared_model->add_history(7, $id);
         $this->load->view('admin/all_secretary_view/archive_v/wared/get_one_barcode', $data_load);

       }
 // $this->test($_POST);
   }
   
   
   public function load_tahwel(){
 
    $type = $this->input->post('type');
    if ($type==2){
        $data['all'] = $this->Wared_model->get_table('department_jobs',array('from_id_fk !='=>0));
        $data['type']= $type;
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel', $data);
    } elseif ($type==1){
        $data['all'] = $this->Wared_model->get_all_emp(0);
        $data['type']= $type;
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel_employee', $data);
    }
 elseif ($type==3){
    $data['all'] = $this->Wared_model->get_table('department_jobs',array('from_id_fk'=>0));
    $data['type']= $type;
    $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel', $data);
}

   // $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel', $data);
}

public function load_tahwel_emp(){
    $this->load->model('all_secretary_models/email/Email');
    $type = $this->input->post('type');
    if ($type==2){
        $data['all'] = $this->Email->get_table('department_jobs',array('from_id_fk !='=>0));
        $data['type']= $type;
    } elseif ($type==1){
        $data['all'] = $this->Email->get_table('employees','');
        $data['type']= $type;
    }

    $this->load->view('admin/all_secretary_view/archive_v/wared/load_tahwel_emp', $data);
}

public function load_no3_khtab()
     {

        $data["no3_khtab"]=$this->Wared_model->select_search_key('arch_setting','from_code',201);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_no3_khtab', $data);

     }
     
     
     
     
     public function add_no3_khtab()
     
     { 
     
             $this->Wared_model->add_no3_khtab();
             
            
         
     }
    
     public function getById_no3_khtab()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->GetFromGeneral_settings_no3_khtab($id);
         echo json_encode($reason);
         
     }
     public function update_no3_khtab()
     { 
         
         
         $id=$this->input->post('id');
             $this->Wared_model->update_no3_khtab($id);
            
           
         
     }
     public function delete_no3_khtab()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_setting($id);
          
            
         
     }  


     public function load_morfq()
     {
      
      
      
    
    
        $data["morfq"]=$this->Wared_model->select_search_key('arch_setting','from_code',501);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_morfq', $data);
     }
     
     public function add_morfq()
     
     { 
     
            
        $this->Wared_model->add_morfq();
           
           
         
     }
    
     public function getById_morfq()
     {
     
         
        $id=$this->input->post('id');
        $reason=$this->Wared_model->GetFromGeneral_settings_morfq($id);
        echo json_encode($reason);
         
     }
     public function update_morfq()
     { 
         
         
        $id=$this->input->post('id');
        $this->Wared_model->update_morfq($id);
          
         
     }


     ///////////////////////////////////
     public function add_reason_setting()
     
     { 
     
            
        $this->Wared_model->add_reason_setting();
           
           
         
     }
    
     public function getById_reason_setting()
     {
     
         
        $id=$this->input->post('id');
        $reason=$this->Wared_model->GetFromGeneral_reason_setting($id);
        echo json_encode($reason);
         
     }
     public function update_reason_setting()
     { 
         
         
        $id=$this->input->post('id');
        $this->Wared_model->update_reason_setting($id);
          
         
     }
      
////new////

public function load_title()
     {

        $data["title"]=$this->Wared_model->select_search_key('arch_setting','from_code',601);
       // $this->test($data);
         $this->load->view('admin/all_secretary_view/archive_v/wared/load_title', $data);

     }
     
     
     
     
     public function add_title()
     
     { 
     
             $this->Wared_model->add_title();
             
            
         
     }
    
     public function getById_title()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->GetFromGeneral_settings_title($id);
         echo json_encode($reason);
         
     }
     public function update_title()
     { 
         
         
         $id=$this->input->post('id');
             $this->Wared_model->update_title($id);
            
           
         
     }
     public function delete_title()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_setting($id);
          
            
         
     } 
     
     
     ////notification
     public function get_tot_wared()

     {

         $tot=$this->Wared_model->total_rows();

         $result['tot_wared']=$tot;

         $msg=$this->Wared_model->get_new_wared();

         $result['msg_wared']=$msg;

         echo json_encode($result);
     }

 

     

     public function get_msg_wared()

     {

         $msg=$this->Wared_model->get_new_wared();

         $result['msg_wared']=$msg;

         echo json_encode($result);

 

 

     }

     public function update_seen_wared()

     {

     $this->Wared_model->update_seen_wared();

     }

 

 

 public function update_read_wared($id)

 {

    // $id=$this->input->post("id");

     $this->Wared_model->update_read_wared($id);

 }

     

   /* public function all_wared()//all_secretary/archive/wared/Add_wared/all_wared
            {
                $data['result']=$this->Wared_model->select_all_wared();
                $data['greetings'] = $this->Wared_model->get_table('fr_settings',array('type'=>9));
                $data['startings'] = $this->Wared_model->get_table('fr_settings',array('type'=>8));
                $data['title'] = "  سجل الوارد  ";
                $data['subview'] = 'admin/all_secretary_view/archive_v/wared/all_wared';
                $this->load->view('admin_index', $data);
            }
            
            */
            
                     public function all_wared()//all_secretary/archive/wared/Add_wared/all_wared
            {
                 $data['title'] = "  قائمه  بالوارد  ";
              $data['customer_js'] = $this->load->view('admin/all_secretary_view/archive_v/wared/all_wared_js', '', TRUE);
              $this->load->view('admin/all_secretary_view/archive_v/wared/all_wared', $data);
            }
            public function data()
          {
                 
            //  $customer = $this->ALLtest->get_all();
              $customer = $this->Wared_model->select_all_wared();
            
             /*
             echo '<pre>';
             print_r($customer);
              echo '<pre>';*/
            // die;
              $arr = array();
              $arr['data'] = array();
              if(!empty($customer)){
                  $x = 0;
                  foreach($customer as $row){ 
                      $x++;
                            /*2-9-20-om*/
        $count_comment=$this->Wared_model->get_count_comments($row->id);
        if ($count_comment !=0){
            $count_comment_text=' <a class="btn btn-info btn-sm" ><i class="fa fa-bell"></i>  '.$count_comment.'</a>';
        }else{
            $count_comment_text='';
        }
        /*2-9-20-om*/
                      
                      
                      if( $row->wared_type==1){
                          $wared_type= 'داخلي';}
                      else if($row->wared_type==2){
                          $wared_type= 'خارجي';
                      };   
                      $wared_rkm=$row->year.'/'. $row->emp_depart_code .'/'.$row->rkm;            
                      $type_zarf = array('1'=>'صغير ','2'=>'كبير');
                      if($row->awlawya==1){$awlawya= 'هام';}
                      elseif($row->awlawya==2){$awlawya=  ' عادي  ';}
                      elseif($row->awlawya==0){$awlawya=  'هام جدا  ';}
                      $arr['data'][] = array(
                    /*  if($row['file_update_date'] == 0 ){
                          echo '0';
                      }*/
                      
                          $x,
                          $wared_rkm,
                          $wared_type, 
                          $row->tsgeel_date,  
                         $row->tsgeel_time,
                          
                         
                          $row->geha_morsla_name,
                          $row->title,
                          
                          $awlawya,
                           '
<div class="btn-group">
<button type="button" class="btn btn-warning">إجراءات</button>
<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <span class="caret"></span>
 <span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="'.base_url().'/all_secretary/archive/wared/Add_wared/compelete_details/'.$row->id.'"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
<li> <a onclick="get_print('.  $row->id.');"
     data-toggle="modal" data-target="#myModal_print" ><i class="fa fa-print" aria-hidden="true"></i>طباعه الباركود</a></li>

     <li>
             <a onclick="make_print('. $row->id .');">
                 <i class="fa fa-print" aria-hidden="true">
                 </i>طباعه الترويثة</a></li>
                                                       <li> <a  onclick=\'swal({
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
                                             window.location="'.base_url().'all_secretary/archive/wared/Add_wared/update/'. $row->id.'";
                                             });\'>
                                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a></li>
                                        <li> <a  onclick=\'swal({
                                             title: "هل انت متأكد من الحذف ؟",
                                             text: "",
                                             type: "warning",
                                             showCancelButton: true,
                                             confirmButtonClass: "btn-danger",
                                             confirmButtonText: "حذف",
                                             cancelButtonText: "إلغاء",
                                             closeOnConfirm: false
                                             },
                                             function(){
                                             swal("تم الحذف!", "", "success");
                                             window.location="'.base_url().'all_secretary/archive/wared/Add_wared/delete/'. $row->id.'";
                                             });\'>
                                             <i class="fa fa-trash"> </i>حذف</a></i>
                                             <li>
             <a    aria-hidden="true" onclick="wader_id=' . $row->id . '"
                        data-toggle="modal" 
                        data-target="#myModal_reason_end'.$row->id.'"><i class="fa fa-archive"> </i>انهاء للمعامله</a></li>
                        <li>
                                             <a    aria-hidden="true"
                                                        data-toggle="modal" onclick="get_print_zarf('.$row->id.',2)"
                                                        data-target="#myModal_print_zarf"><i class="fa fa-print"> </i> طباعه الظرف</a></li>
                           </ul>
                         </div> 
                         <a onclick="get_details('.$row->id.');"
                                                     aria-hidden="true"
                                                        data-toggle="modal"
                                                        data-target="#myModal_det"><i     class="fa fa-search-plus" aria-hidden="true"></i></a>
                                                        
                                                          '.$count_comment_text.'
                                    
            <div class="modal fade" id="myModal_reason_end' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog" role="document" style="width: 80%">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title title "> انهاء المعامله </h4>
                     </div>
                     <div class="modal-body" style="
             height: 171px;
         ">
                     <div class="form-group col-sm-12">    
                     <div class="form-group col-md-4 col-sm-6 padding-4" 
                              >
                             <label class="label  "> سبب انهاء المعامله </label>
                             <input type="text" name="reason_name" id="reason_name' . $row->id . '" value=""
                                    class="form-control testButton inputclass" data-validation="required" 
                                    style="cursor:pointer; width:88%;float: right;" autocomplete="off" 
                                    data-toggle="modal" data-target="#myModal_end" 
                                    ondblclick=" get_reason_end()"
                                    onblur="$(this).attr("readonly","readonly")"
                                    onkeypress="return isNumberKey(event);"
                                    readonly>
                                    <input type="hidden" id="reason_id_fk' . $row->id . '" name="reason_id_fk" value=""/>
                             <button type="button" data-toggle="modal" data-target="#myModal_end" style="float: left;"
                             onclick="get_reason_end()" class="btn btn-success btn-next">
                                 <i class="fa fa-plus"></i></button>
                         </div>
                         <div class="form-group col-md-4 col-sm-6 padding-4">
                                  <label class="label">المسلم  </label>
                                  <input type="text" class="form-control"
                                 type="text"  name="from_user_n" id="from_user_n' . $row->id . '"   value="">
                              </div>
                         <div class="form-group col-md-4 col-sm-6 padding-4">
                                  <label class="label">المستلم منه  </label>
                                  <input type="text" class="form-control"
                                  placeholder=" حدد الموظف م" type="text" style="width: 88%;float: right;"
                                            name="to_user_n" id="to_user_n' . $row->id . '"    readonly="readonly"
                                            data-toggle="modal" data-target="#tahwelModal"  value="">
                                            <input type="hidden" id="to_user_id' . $row->id . '" name="to_user_id" value=""/>
                                     <button type="button" style="float: left;" data-toggle="modal" data-target="#tahwelModal"  class="btn btn-success btn-next" >
                                         <i class="fa fa-plus"></i></button>
                              </div>
                              <div class="form-group col-md-4 col-sm-6 padding-4">
                                  <label class="label">التاريخ </label>
                                  <input type="date" class="form-control"
                                 type="text"  name="date_end" id="date_end' . $row->id . '"  
                                            value="' . date('Y-m-d') . '">
                              </div>
                              <div class="form-group col-md-2 col-sm-6 padding-4">
                                  <label class="label">رقم القيد الخارجي </label>
                                  <input type="number" class="form-control"
                                 type="text"  name="num_end" id="num_end' . $row->id . '"  value="">
                              </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                         <button type="button" class="btn btn-labeled btn-success "  onclick="add_reason(' . $row->id . ')" >
                                     <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                 </button>
                     </div>
                 </div>
             </div>
         </div>
         
         
         
         
        
                          
        
         
        '
      
                           
                      );
                  }
              }
              $json = json_encode($arr);
              echo $json;
          }
      
            
            
            
            public function load_twgeh(){
 
  
    $data['all'] = $this->Wared_model->get_all_emp(0);

    $this->load->view('admin/all_secretary_view/archive_v/wared/load_tawgeh_employee', $data);

}


/*
  public function print_tawresa(){
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Wared_model->get_wared_by_id($row_id);
        $this->load->view('admin/all_secretary_view/archive_v/wared/print_tawresa', $data);
}*/

  public function print_tawresa(){
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Wared_model->get_wared_by_id($row_id);
        $this->Wared_model->add_history(8, $row_id);
        $this->load->view('admin/all_secretary_view/archive_v/wared/print_tawresa', $data);
}


 public function add_geha_type()
     { 
     
             $this->Wared_model->add_geha_type();
     }
    
     public function getById_geha_type()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Wared_model->getById_geha_type($id);
         echo json_encode($reason);
         
     }
     public function update_geha_type()
     { 

         $id=$this->input->post('id');
             $this->Wared_model->update_geha_type($id);
          
         
     }
     public function delete_geha_type()
     { 
  
         $id=$this->input->post('id');
             $this->Wared_model->delete_geha_type($id);
    
     }
     
     
        public function get_tot_wared_comments()
    {
        $tot = $this->Wared_model->total_rows_comment();
        $result['tot_wared'] = $tot;
//        $msg = $this->Wared_model->get_new_wared_comments();
//        $result['msg_wared'] = $msg;
        echo json_encode($result);
    }
    public function update_seen_wared_comments()
    {
        $this->Wared_model->update_seen_wared_comments();
    }
    
    
 public function add_ms2ol()
    {
        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $geha_id =$this->input->post('geha_id');
        $this->Sader_model->add_mostlm($geha_id);
        $data["geha"]=$this->Wared_model->select_search_key('arch_gehat_ms2olen','geha_id_fk',$geha_id);

        $this->load->view('admin/all_secretary_view/archive_v/wared/load_morsel', $data);
    }

    public function getById_mostlm(){
        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $id=$this->input->post('id');
        $mostlm =$this->Sader_model->getById_mostlm($id);

        echo json_encode($mostlm);
    }
    public function update_ms2ol()
    {
        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $geha_id =$this->input->post('geha_id');
        $row_id =$this->input->post('row_id');
        $this->Sader_model->update_mostlm($geha_id,$row_id);
        $data["geha"]=$this->Wared_model->select_search_key('arch_gehat_ms2olen','geha_id_fk',$geha_id);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_morsel', $data);

    }
    public function delete_mostlm(){

        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');
        $row_id =$this->input->post('row_id');
        $geha_id =$this->input->post('geha_id');
        $this->Sader_model->delete_mostlm($row_id);
        $data["geha"]=$this->Wared_model->select_search_key('arch_gehat_ms2olen','geha_id_fk',$geha_id);
        $this->load->view('admin/all_secretary_view/archive_v/wared/load_morsel', $data);

    }
     
} // END CLASS 