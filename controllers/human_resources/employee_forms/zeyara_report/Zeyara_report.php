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

    public function addzeyara_report($id=0)// human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report
    {
        $this->load->model('human_resources_model/employee_forms/visitors/Zeyara_report_m');
        if ($this->input->post('add')) {
            $this->Zeyara_report_m->insertGam3iaVisitors($id);
            $this->message('success','تم إضافة بنجاح');
            redirect('human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report', 'refresh');
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
        $data['subview'] = 'admin/Human_resources/employee_forms/zeyara_report_v/add_zeyara';
        $this->load->view('admin_index', $data);
    }
    public function deleteGam3iaVisitors($id)
    {
        $this->Zeyara_report_m->deleteGam3iaVisitors($id);
        $this->message('success', 'تم الحذف بنجاح');
        redirect('human_resources/employee_forms/zeyara_report/Zeyara_report/addzeyara_report', 'refresh');
    }
    public function add_setting(){
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
     
       if($type!=5)
        {
            $edara_n = $this->input->post('edara_n');
            $edara_id_fk = $this->input->post('edara_id_fk');
        }else{
            $edara_n = $this->input->post('geha');
            $edara_id_fk = $this->input->post('geha_id_fk');
        }
        $this->Zeyara_report_m->add_gam3ia_visitor_setting($type,$type_name,$edara_n,$edara_id_fk);
       // $data['result'] = $this->Zeyara_report_m->get_setting($type,$edara_n,$edara_id_fk);
       $data['result'] = $this->Zeyara_report_m->get_setting($type, $type_name, $edara_n, $edara_id_fk);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_setting',$data);
    }
     public function load_settigs(){
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
       
        if($type!=5)
        {
            $edara_n = $this->input->post('edara_n');
            $edara_id_fk = $this->input->post('edara_id_fk');
        $data['result'] = $this->Zeyara_report_m->get_setting($type,$type_name,$edara_n,$edara_id_fk);
        }else{
            $geha = $this->input->post('geha');
            $geha_id_fk = $this->input->post('geha_id_fk');
            $data['result'] = $this->Zeyara_report_m->get_setting($type,$type_name,$geha,$geha_id_fk);
        }
        
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
    public function setting_Zeyara($id=0)// human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara
    {
        if ($this->input->post('add')) {
            $this->Zeyara_report_m->insert_stetting($id);
            $this->message('success','تم إضافة بنجاح');
           
            redirect('human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara', 'refresh');
        }
          $data['records']=$this->Zeyara_report_m->get_all_setting();
        if($id != 0){
            $data['result']=$this->Zeyara_report_m->get_one_setting($id);
          
            $data['records']= '';
        }
        $data['edarat'] = $this->Zeyara_report_m->get_all_edara();
       
        $data['title'] = " أعدادت زيارة وتواصل";
        $data['tittle'] = " أعدادت زيارة وتواصل";
        $data['subview'] = 'admin/Human_resources/employee_forms/zeyara_report_v/add_setting_zeyara';
        $this->load->view('admin_index', $data);
    }
    public function load_edarat(){
        $data['result'] = $this->Zeyara_report_m->get_all_edara();
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_edarat',$data);
    }

    public function load_geha(){
        $data['ms2olen']=$this->Zeyara_report_m->get_all_ms2olen();
        $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/load_ms2olen',$data);
    }
    public function delete_settings($id){
        $this->Zeyara_report_m->delete_setting($id);
        redirect(' human_resources/employee_forms/zeyara_report/Zeyara_report/setting_Zeyara', 'refresh');
    }
    //////add_attaches///////////

    public function add_attaches($id)//human_resources/ta3mem/Ta3mem_c/add_attaches
    {
        $data['path']="uploads/human_resources/zeyara_report";
        $data['zeyara_id_fk']=$id;
        $data['one_data'] = $this->Zeyara_report_m->get_attach($id);
      $data['title']='مرفقات   ';
        $data['subview'] = 'admin/Human_resources/employee_forms/zeyara_report_v/add_attaches';
        $this->load->view('admin_index', $data);
    }
        public function add_morfaq()
        {
           
            $rkm=$this->input->post('row');
            $images=$this->upload_muli_file("files");
    
           $this->Zeyara_report_m->insert_attach($images);
    
        }
    
        public function get_attaches()
        {
            $rkm=$this->input->post('rkm');
            $data['rkm']=$this->input->post('rkm');
          $data['one_data'] = $this->Zeyara_report_m->get_attach($rkm);
    
            $this->load->view('admin/Human_resources/employee_forms/zeyara_report_v/get_table_attaches',$data);
        }
        public function Delete_attach()
        {
            $id=$this->input->post('id');
            $this->Zeyara_report_m->delete_attach($id);
    
           
        }
     private function upload_muli_file($input_name){
       //  $this->test($_FILES[$input_name]['name']);
            $filesCount = count($_FILES[$input_name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[] = $this->upload_all_file("userFile");
            }
            return $all_img;
        }
        private function upload_all_file($file_name)
        {
            $config['upload_path'] = 'uploads/human_resources/zeyara_report';
            $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
            $config['max_size'] = '100000000';
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
        public function read_file($file_name)
        {
            $this->load->helper('file');
            $file_path = 'uploads/human_resources/zeyara_report/' . $file_name;
            header('Content-Type: application/pdf');
            header('Content-Discription:inline; filename="' . $file_name . '"');
            header('Content-Disposition: filename="' . $file_name . '"');
            //header('Content-Discription:inline; filename="'.$name.'"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges:bytes');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
        }
} // END CLASS 