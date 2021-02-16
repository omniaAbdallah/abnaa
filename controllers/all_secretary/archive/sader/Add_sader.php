<?php

class Add_sader extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');

        $this->load->model('all_secretary_models/archive_m/sader/Sader_model');

    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function upload_all_file($file_name,$folder="uploads/images")
    {
      //  $config['upload_path'] = 'uploads/archive';

        $config['upload_path'] = $folder;
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

    // private function upload_muli_file($input_name,$folder)
    // {
    //     $filesCount = count($_FILES[$input_name]['name']);
    //     for ($i = 0; $i < $filesCount; $i++) {
    //         $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
    //         $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
    //         $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
    //         $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
    //         $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
    //         $all_img[] = $this->upload_all_file("userFile",$folder);
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
    /*public function read_file($folder,$file_name)
    {
         $this->load->helper('file');

        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }*/
        /*  public function read_file($file_name)
    {
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
        $wared_id=$this->Wared_model->select_key('arch_sader_morfq','morfaq',$file_name)->sader_id_fk;
        $folder=$this->Wared_model->select_key('arch_sader','id',$wared_id)->folder_path;
         $this->load->helper('file');
        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }*/
        
    public function read_file($file_name)
    {
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
        $wared_id=$this->Wared_model->select_key('arch_sader_morfaq','morfaq',$file_name)->sader_id_fk;
        $folder=$this->Wared_model->select_key('arch_sader','id',$wared_id)->folder_path;
         $this->load->helper('file');

        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);


    }
    public function downloads($folder,$file){
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./'.$folder.$file);
        force_download($name, $data);
    }

    public function add_sader(){ // all_secretary/archive/sader/Add_sader/add_sader
/*
echo '<pre>';
print_r($_SESSION);*/

  $data['emp_dep'] = $this->Sader_model->get_edara_dep_code();


//$this->test($data['emp_dep']);

         $data['all_sader'] = $this->Sader_model->get_table('arch_sader',array('suspend'=>0));
         $data['rkm'] = $this->Sader_model->get_rkm();
         $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
         $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
         $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        if ($this->input->post('add')){
          
             $insert_id=$this->Sader_model->insert_sader();
             echo ($insert_id);
             return;
           //  $this->messages('success','تم الاضافة بنجاح ');
          //   $data['last_rkm'] = $this->Sader_model->get_rkm();
          //   redirect('all_secretary/archive/sader/Add_sader/add_deal/'.$data['last_rkm'],'refresh');
         }


        $data['title'] = "  اضافة صادر  ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';

        $this->load->view('admin_index', $data);
    }
    public function load_modal(){

        if ($this->input->post('type')){
            $type = $this->input->post('type');
            $data['all_data'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>$type));
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_page', $data);
        }
        elseif ($this->input->post('geha_id')){
            $geha_id = $this->input->post('geha_id');
            $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
        }

    }
       public function update_sader($id){
        $data['rkm'] = $this->Sader_model->get_rkm();
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        if ($this->input->post('add')){
            
            //$this->test($_POST);
            $this->Sader_model->insert_sader($id);
           // $this->messages('success','تم التعديل بنجاح ');
            redirect('all_secretary/archive/sader/Add_sader/add_deal/'.$id,'refresh');
        }
        $data['title'] = " صادر خارجي ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';
        $this->load->view('admin_index', $data);
    }
    /*public function update_sader($id){

        $data['emp_dep'] = $this->Sader_model->emp_dep();

        $data['rkm'] = $this->Sader_model->get_rkm();
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        $data['gehat'] = $this->Sader_model->get_table('arch_gehat','');
        $data['folders'] = $this->Sader_model->get_table('arch_folders',array('deleted'=>0));
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        if ($this->input->post('add')){
            $this->Sader_model->insert_sader($id);
            $this->messages('success','تم التعديل بنجاح ');
            redirect('all_secretary/archive/sader/Add_sader/add_sader','refresh');
        }
        $data['title'] = " صادر خارجي ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_sader_view';
        $this->load->view('admin_index', $data);
    }*/
    public  function delete_sader($id){
        $this->Sader_model->delete_sader($id);
        $this->messages('success','تم الحذف بنجاح ');
        redirect('all_secretary/archive/sader/Add_sader/add_sader','refresh');

    }
    public function load_details(){

            $row_id = $this->input->post('row_id');
            $data['arr']=$this->Sader_model->select_secret();
              $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($row_id,1);
            $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);
            $this->load->view('admin/all_secretary_view/archive_v/sader/load_details', $data);
    }
    /*public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal

        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table_order('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();

        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }*/
    
      /*  public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        //yara
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        //yara
        $data['emp_dep'] = $this->Sader_model->emp_dep();
        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }*/
   
       
      /*  public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$id));
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        //yara24-2
        $data['emp_dep'] = $this->Sader_model->emp_dep();
         //yara24-2
        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }*/
    
           public function add_deal($id){ // all_secretary/archive/sader/Add_sader/add_deal
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $data['folder_path']= $data['get_all']->folder_path;
       // $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$id));
           $data['comments'] = $this->Sader_model->get_comments($id);/*2-9-20-om*/
       
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$id));
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$id));
        $data['arr']=$this->Sader_model->select_secret();
        $data['tareket_estlam']=$this->Sader_model->get_all_tareket_estlam($id,1);
        $data['secret'] = $this->Sader_model->get_table('arch_setting',array('from_code'=>801));
        $data['get_sader'] = $this->Sader_model->get_sader_by_id($id);
        //yara24-2
        $data['emp_dep'] = $this->Sader_model->emp_dep();
        $data['all_Emps_thwel'] = $this->Sader_model->get_emp_sader_by_id($id);

         //yara24-2
        $data['title'] = "  المعاملات الصادره ";
        $data['subview'] = 'admin/all_secretary_view/archive_v/sader/add_deal';
        $this->load->view('admin_index', $data);
    }
    
    public function upload_morfaq()
    {
        $id = $this->input->post('row');
        $sader = $this->Sader_model->get_sader_by_id($id);
        $folder= $sader->folder_path;
        //$this->test($sader);
        $images = $this->upload_muli_file("files",$folder);
        $this->Sader_model->insert_attach($id, $images);
        $data['get_all'] = $this->Sader_model->get_sader_by_id($id);
        $data['folder_path']= $data['get_all']->folder_path;
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_morfaq', $data);
    }
   /* public function delete_morfaq(){

        $id = $this->input->post('row_id');
        $sader_id = $this->input->post('sader_id');
        $this->delete_upload($id,$sader_id);
        $this->Sader_model->delete_morfaq($id);
       
        $data['get_all'] = $this->Sader_model->get_sader_by_id($sader_id);
        $data['folder_path']= $data['get_all']->folder_path;
        $data['morfqat'] = $this->Sader_model->get_table('arch_sader_morfaq',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_morfaq', $data);
    }
    public function delete_upload($id,$sader_id)
{
    $img = $this->Sader_model->get_table_by_id('arch_sader_morfaq',array('id'=>$id));
    $path=$this->Sader_model->get_table_by_id('arch_sader',array('id'=>$sader_id));
    //$this->test($img->morfaq);
    if (file_exists($path->folder_path . "/" . $img->morfaq)) {
        unlink(FCPATH . "" . $path->folder_path . "/" . $img->morfaq);
    }
  
}
*/
    public function delete_morfaq()
    {
        $id = $this->input->post('row_id');
        $sader_id = $this->input->post('sader_id');
        $this->delete_upload($id,$sader_id);
            $this->Sader_model->delete_morfaq($id);
    
    } 
    public function delete_upload($id,$sader_id)
{
    $img = $this->Sader_model->get_table_by_id('arch_sader_morfaq',array('id'=>$id));
    $path=$this->Sader_model->get_table_by_id('arch_sader',array('id'=>$sader_id));
    //$this->test($img->morfaq);
    if (file_exists($path->folder_path . "/" . $img->morfaq)) {
        unlink(FCPATH . "" . $path->folder_path . "/" . $img->morfaq);
    }
  
}
    public function insert_comments(){
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_comments($sader_id);
      //  $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$sader_id));
         $data['comments'] = $this->Sader_model->get_comments($sader_id);/*2-9-20-om*/

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_comment', $data);
    }

    public function delete_comment(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_comment($row_id);
        $data['comments'] = $this->Sader_model->get_table('arch_sader_comments',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_comment', $data);
    }
    public function load_tahwel(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Sader_model->get_table('department_jobs',array('from_id_fk !='=>0));
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Sader_model->get_table('employees','');
            $data['type']= $type;
        }

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_tahwel', $data);
    }

    public function insert_tahwel(){
        //$this->test($_POST);
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_tahwel($sader_id);
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_tahwelat', $data);
    }
    public function delete_tahwel(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_tahwel($row_id);
        $data['tahwelat'] = $this->Sader_model->get_table('arch_sader_history',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_tahwelat', $data);
    }
    public function update_tahwel(){
        $row_id = $this->input->post('row_id');
        $tahwel = $this->Sader_model->get_table('arch_sader_history',array('id'=>$row_id))[0];
        echo json_encode($tahwel);

    }
    public function load_realtion(){

        $type = $this->input->post('type');
        if ($type==2){
            $data['all'] = $this->Sader_model->get_table('arch_sader','');
            $data['type']= $type;
        } elseif ($type==1){
            $data['all'] = $this->Sader_model->get_table('arch_wared','');
            $data['type']= $type;
        }
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_relation', $data);
    }
    public function insert_realtion(){
        $sader_id = $this->input->post('sader_id');
        $this->Sader_model->insert_realtion($sader_id);
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_relations', $data);
    }

    public function delete_relation(){
        $sader_id = $this->input->post('sader_id');
        $row_id = $this->input->post('row_id');
        $this->Sader_model->delete_relation($row_id);
        $data['relations'] = $this->Sader_model->get_table('arch_sader_relation',array('sader_id_fk'=>$sader_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_all_relations', $data);
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
$this->Sader_model->update_sader_status($id,$value,$name,$to_user_n,$to_user_id,$from_user_n,$date_end,$num_end);

}
  
  /*  public function PrintCode(){
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
            $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));
            $id=$this->input->post('id');
            $sader = $this->Sader_model->get_sader_by_id($id);
            $data_load["date"]= $sader->date_ar;
            $data_load["id"]=$sader->id;
            $data_load["morfaq_num"]=$sader->morfaq_num;
            $data_load["subject"]=$sader->mawdo3_subject;
            $this->load->view('admin/all_secretary_view/archive_v/sader/print_barcode', $data_load);
    }*/
     
       public function PrintCode(){



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
            $data_load["arabic_num"]=arabic_w2e($this->input->post("num"));
            $id=$this->input->post('id');
            $sader = $this->Sader_model->get_sader_by_id($id);

            $data_load["date"]= $sader->date_ar;
            $data_load["id"]=$sader->id;
            $data_load["morfaq_num"]=$sader->morfaq_num;
            $data_load["subject"]=$sader->mawdo3_subject;
            $this->Sader_model->add_history(7, $id);
            $this->load->view('admin/all_secretary_view/archive_v/sader/print_barcode', $data_load);


    }
     
     
     ////notification
     public function get_tot_sader()

     {

         $tot=$this->Sader_model->total_rows();

         $result['tot_sader']=$tot;

         $msg=$this->Sader_model->get_new_sader();

         $result['msg_sader']=$msg;

         echo json_encode($result);

 

 

     }

 

     

     public function get_msg_sader()

     {

         $msg=$this->Sader_model->get_new_sader();

         $result['msg_sader']=$msg;

         echo json_encode($result);

 

 

     }

     public function update_seen_sader()

     {

     $this->Sader_model->update_seen_sader();

     }

 

 

 public function update_read_sader($id)

 {

    // $id=$this->input->post("id");

     $this->Sader_model->update_read_sader($id);

 }
 ///rehab
 public function load_mohemat()
    {
        $data["mohemat"]=$this->Sader_model->select_search_key('arch_setting','from_code',901);
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mohemat', $data);
    }

    public function add_mohema_n()
    {
        $this->Sader_model->add_mohema_n();

    }
    public function getById_mohema_n()
    {
        $id=$this->input->post('id');
        $reason=$this->Sader_model->GetFromGeneral_settings_mohema_n($id);
        echo json_encode($reason);
    }
    public function update_mohema()
    {
        $id=$this->input->post('id');
        $this->Sader_model->update_mohema($id);
    }
    public function delete_mohema()
    {
        $id=$this->input->post('id');
        $this->Sader_model->delete_setting($id);
    }



  /* public function all_sader()// all_secretary/archive/sader/Add_sader/all_sader
      {
        $data['all_sader'] = $this->Sader_model->get_table('arch_sader',array('suspend'=>0));
        $data['greetings'] = $this->Sader_model->get_table('fr_settings',array('type'=>9));
        $data['startings'] = $this->Sader_model->get_table('fr_settings',array('type'=>8));
          $data['title'] = "  قائمه  بالصادر  ";
          $data['subview'] = 'admin/all_secretary_view/archive_v/sader/all_sader';
          $this->load->view('admin_index', $data);
      }*/
      
      public function all_sader()// all_secretary/archive/sader/Add_sader/all_sader
      {
        
           $data['title'] = "  قائمه  بالصادر  ";
        $data['customer_js'] = $this->load->view('admin/all_secretary_view/archive_v/sader/all_sader_js', '', TRUE);
        $this->load->view('admin/all_secretary_view/archive_v/sader/all_sader', $data);
      }
      
      
          public function data()
    {
           
      //  $customer = $this->ALLtest->get_all();
      //  $customer = $this->Sader_model->get_table('arch_sader',array('suspend'=>0));
      $customer = $this->Sader_model->get_table('arch_sader','' );
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
            $count_comment=$this->Sader_model->get_count_comments($row->id);
            if ($count_comment !=0){
                $count_comment_text=' <a class="btn btn-info btn-sm" ><i class="fa fa-bell"></i>  '.$count_comment.'</a>';
            }else{
                $count_comment_text='';
            }
            /*2-9-20-om*/
                
                if( $row->suspend==4){
                    $suspend_type= 'منتهية';
                    $class_suspend='danger';
                    }else{
                    $suspend_type= 'سارية';
                    $class_suspend='warning';
                }
                
                if( $row->sader_type==1){
                    $sader_type= 'داخلي';
                     $class_type='success';
                    }else if($row->sader_type==2){
                    $sader_type= 'خارجي';
                    $class_type='danger';
                };   
                $sader_rkm=$row->year.'/'. $row->emp_depart_code .'/'.$row->sader_rkm;            
                $type_zarf = array('1'=>'صغير ','2'=>'كبير');
                
                /*$then = $row->esthkak_date;
                      $now = date('Y-m-d');
                      if($then> $now || $then== $now)
                      {
                      $then = new DateTime($then);
                      $now = new DateTime($now);
                      $sinceThen = $then->diff($now);
                      }else{
                        $then = new DateTime('');
                        $now = new DateTime($now);
                        $sinceThen = $then->diff($now);
                      }*/
                           if( $row->suspend !=4 ){
                        if( !empty($row->esthkak_date)){
                    $then = $row->esthkak_date;
                    $rem = strtotime($then) - time();
                    $day = floor($rem / 86400);
                    $hr  = floor(($rem % 86400) / 3600);
                    $min = floor(($rem % 3600) / 60);
                    $sec = ($rem % 60);
                    $since= " 
                   $day يوم 
                   $hr ساعة 
                   $min دقيقة ";
                    }else{
                        $since= "";
                    }
                }else{
                        $since= "تم إنهاء المعاملة" ;
                    }  
                      
                      
                      
                      
                $arr['data'][] = array(
              /*  if($row['file_update_date'] == 0 ){
                    echo '0';
                }*/
                /*
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
                                       window.location="'.base_url().'all_secretary/archive/sader/Add_sader/update_sader/'. $row->id.'";
                                       });\'>
                                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a></li>
              fa fa-search-plus  load_deta */
                
                    $x,
                    $sader_rkm,
                    '<span  style="width: 100%;color: black !important;" class="label label-'.$class_type.'">'.$sader_type.'</span>', 
                    $row->ersal_date,  
                   $row->ersal_time,
                    
                   
                    $row->geha_morsel_n,
                    $row->mawdo3_name,
                    
                    $row->awlawia_n,
                  
                      $row->publisher_name,
                      
                      
                      '<span  style="width: 100%;color: black !important;" class="label label-'.$class_suspend.'">'.$suspend_type.'</span>',
                      $row->esthkak_date

                    ,
                     '
<div class="btn-group">
<button type="button" class="btn btn-primary">إجراءات</button>
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="'.base_url().'/all_secretary/archive/sader/Add_sader/add_deal/'.$row->id.'"><i class="fa fa-commenting-o" aria-hidden="true"></i> تعديل المعاملة </a></li>
<li> <a onclick="get_print('.  $row->id.');"
   data-toggle="modal" data-target="#barcodeModal" ><i class="fa fa-print" aria-hidden="true"></i>طباعه الباركود</a></li>

   <li>
<a onclick="make_print('. $row->id .');">
<i class="fa fa-print" aria-hidden="true">
</i>طباعه الترويثة</a></li>

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
window.location="'.base_url().'all_secretary/archive/sader/Add_sader/delete_sader/'. $row->id.'";
});\'>
<i class="fa fa-trash"> </i>حذف</a></i>
<li>
<a    aria-hidden="true"  onclick="sader_id=' . $row->id . '"
          data-toggle="modal" 
          data-target="#myModal_reason_end'.$row->id.'"><i class="fa fa-archive"> </i>انهاء للمعامله</a></li>
          <li>
<a    aria-hidden="true"
          data-toggle="modal" onclick="get_print_zarf('.$row->id.',1)"
          data-target="#myModal_print_zarf"><i class="fa fa-print"> </i> طباعه الظرف</a></li>
          
  <li>
  <a onclick="load_details('.$row->id.');"
       aria-hidden="true"
          data-toggle="modal"
          data-target="#detailsModal"><i     class="fa fa-search-plus" aria-hidden="true"></i>تفاصيل المعاملة</a>
          
     
  </li>        
          
</ul>
</div> 
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
onclick="get_reason_end()"
class="btn btn-success btn-next">
<i class="fa fa-plus"></i></button>
</div>
<div class="form-group col-md-4 col-sm-6 padding-4">
<label class="label">المستلم  </label>
<input type="text" class="form-control"
type="text" 
name="from_user_n" id="from_user_n' . $row->id . '"  
value="">
</div>
<div class="form-group col-md-4 col-sm-6 padding-4">
<label class="label">المستلم منه  </label>
<input type="text" class="form-control"
placeholder=" حدد الموظف م" type="text" style="width: 88%;float: right;"
name="to_user_n" id="to_user_n' . $row->id . '"  
readonly="readonly"
data-toggle="modal" data-target="#tahwelModal" 

value="">
<input type="hidden" id="to_user_id' . $row->id . '" name="to_user_id" value=""/>
<button type="button" style="float: left;"
data-toggle="modal" data-target="#tahwelModal" 

class="btn btn-success btn-next" >
<i class="fa fa-plus"></i></button>
</div>
<div class="form-group col-md-4 col-sm-6 padding-4">
<label class="label">التاريخ </label>
<input type="date" class="form-control"
type="text" 
name="date_end" id="date_end' . $row->id . '"  
value="' . date('Y-m-d') . '">
</div>
<div class="form-group col-md-2 col-sm-6 padding-4">
<label class="label">رقم القيد الخارجي </label>
<input type="number" class="form-control"
type="text" 
name="num_end" id="num_end' . $row->id . '"  
value="">
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
<button type="button"
class="btn btn-labeled btn-success "  onclick="add_reason('.$row->id.')"
>
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
  
      
      
      
      public function get_folders()
{
    $sader_type = $this->input->post('type');
    $data['folders'] = $this->Sader_model->get_main_folders($sader_type);
    $this->load->view('admin/all_secretary_view/archive_v/sader/load_folders', $data);
}


public function load_gehat_ektsas()
{
    $this->load->model('all_secretary_models/archive_m/gehat/Geha_model');

    $id=$this->input->post('geha');

    $data['result']=$this->Geha_model->getbyid_ektsas($id);

    $this->load->view('admin/all_secretary_view/archive_v/sader/load_gehat_ektsas', $data);
}
/*public function print_tawresa()
{
    $row_id = $this->input->post('row_id');
    $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);

    $this->load->view('admin/all_secretary_view/archive_v/sader/print_tawresa', $data);

}
*/

public function print_tawresa()
{
   $row_id = $this->input->post('row_id');
  // $row_id = 18;
    $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);
    $this->Sader_model->add_history(8, $row_id);
    $this->load->view('admin/all_secretary_view/archive_v/sader/print_tawresa', $data);

}




public function get_tot_sader_comments()
{
    $tot=$this->Sader_model->total_rows_comment();
    $result['tot_sader']=$tot;
//        $msg=$this->Sader_model->get_new_sader_comments();
//        $result['msg_sader']=$msg;
    echo json_encode($result);
}

public function update_seen_sader_comments()
{
    $this->Sader_model->update_seen_sader_comments();
}



  public function add_ms2ol()
    {

        $geha_id =$this->input->post('geha_id');

        $this->Sader_model->add_mostlm($geha_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
    }

    public function getById_mostlm(){
        $id=$this->input->post('id');

        $mostlm =$this->Sader_model->getById_mostlm($id);

        echo json_encode($mostlm);
    }
    public function update_ms2ol()
    {

        $geha_id =$this->input->post('geha_id');
        $row_id =$this->input->post('row_id');

        $this->Sader_model->update_mostlm($geha_id,$row_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));

        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);
    }
    public function delete_mostlm(){

        $row_id =$this->input->post('row_id');
        $geha_id =$this->input->post('geha_id');
        $this->Sader_model->delete_mostlm($row_id);
        $data['all_data'] = $this->Sader_model->get_table('arch_gehat_ms2olen',array('geha_id_fk'=>$geha_id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/load_mostlem', $data);

    }
    //yara
    public function add_print_zarf()
    {
      //  $this->Sader_model->add_print_zarf();
        $insert_id=$this->Sader_model->add_print_zarf();
        echo ($insert_id);
    }
    public function delete_print_zarf()
    {
        $id=$this->input->post('id');
        $this->Sader_model->delete_print_zarf($id);
    }
   /* public function get_all_print_zarf()
    {
        $id=$this->input->post('id');
        $mo3mla_type=$this->input->post('type');
        $data['mo3mla']=$this->input->post('id');
        $data['all_print_zarf']=$this->Sader_model->get_table('arch_print_zarf',array('mo3mla_id_fk'=>$id,'mo3mla_type'=>$mo3mla_type));
        $this->load->view('admin/all_secretary_view/archive_v/sader/all_print_zarf', $data);
    }*/
        public function get_all_print_zarf()
    {
        $id=$this->input->post('id');
        $mo3mla_type=$this->input->post('type');
        $data['mo3mla']=$this->input->post('id');
        $data['type']=$this->input->post('type');
          $data['greetings'] = $this->Sader_model->get_table('fr_settings',array('type'=>9));
     $data['startings'] = $this->Sader_model->get_table('fr_settings',array('type'=>8));
        $data['all_print_zarf']=$this->Sader_model->get_table('arch_print_zarf',array('mo3mla_id_fk'=>$id,'mo3mla_type'=>$mo3mla_type));
        $this->load->view('admin/all_secretary_view/archive_v/sader/all_print_zarf', $data);
    }
    
    
    public function print_zarf()
    {
        $id=$this->input->post('row_id');
        $data['all_print_zarf']=$this->Sader_model->get_table_by_id('arch_print_zarf',array('id'=>$id));
        $this->load->view('admin/all_secretary_view/archive_v/sader/print_zarf', $data);
    }
    
    
        //yara_new4-5
    public function load_details_comment()
{
    $row_id = $this->input->post('row_id');

   
    $data['get_tazkra']= $this->Sader_model->get_comment_byId($row_id);
 
    //$this->test( $data['get_tazkra']);
   
    $this->load->view('admin/all_secretary_view/archive_v/sader/load_details_comments', $data);

}
public function update_comment()
{
  //  $this->test($_POST);
    $id=  $this->input->post('id');
    $comment=  $this->input->post('comment');
    $this->Sader_model->update_comment($id, $comment);

}

function get_edara_type()
{
    $type = $this->input->post('type');
    $qsm_id = $this->input->post('qsm_id');
    $edara_id = $this->input->post('edara_id');
    $data['type']=$type;
    switch ($type) {
        case 1:
            $data['all_data'] = $this->Sader_model->get_table('hr_edarat_aqsam', array('from_id_fk' => 0));
            break;
        case 2:
            $data['all_data'] = $this->Sader_model->get_table('hr_edarat_aqsam', array('from_id_fk'=>$edara_id));
            break;
        case 3:
          //  $data['all_data'] = $this->Sader_model->get_table('employees', array('qsm_id' =>$qsm_id ));
           $data['all_data'] = $this->Sader_model->get_table('employees',array('employee_type'=>1));
            break;
        default:
            break;
    }
    $this->load->view('admin/all_secretary_view/archive_v/sader/load_edara_type', $data);
}
 // <yara13-9-2020>
  
 public function time_go(){
    $row_id=$this->input->post('row_id');
   
    $data['get_all'] = $this->Sader_model->get_sader_by_id($row_id);
    $this->load->view('admin/all_secretary_view/archive_v/sader/time_go', $data);
}
//</yara13-9-2020>

}