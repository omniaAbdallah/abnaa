<?php
class Mohma_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
    //    F:\laragon\www\ABNAAv1\application\models\human_resources_model\mohma_models\Mohma_model.php
    $this->load->model('Difined_model');
        $this->load->model("human_resources_model/mohma_models/Mohma_model");
    }
//--------------------------------------------------
    public function index()
    {     // human_resources/mohma/Mohma_c
        
        if($_SESSION['role_id_fk']==3)
        {
            $data['emp_data_sesstion'] = $this->Mohma_model->emp_data_sesstion($_SESSION['emp_code']);
          //  $this->test($data['emp_data_sesstion']);
        }
      
        $data['records'] = $this->Mohma_model->select_all();
        $data['last_id'] = $this->Mohma_model->get_last();
        $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","38","");
        $data['title'] = 'إضافة مهمة';
        $data['emp_data'] = $this->Mohma_model->select_all_emp();
     

        if(isset($_POST['from_profile'])&&!empty($_POST['from_profile']))
      {
        $this->load->view('admin/Human_resources/mohma_v/mohma_emp', $data);
      }
      else{

        $data['subview'] = 'admin/Human_resources/mohma_v/mohma_emp';
        $this->load->view('admin_index', $data);
      }
    }

    public function update($id= false)
    {     // human_resources/mohma/Mohma_c
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        if($_SESSION['role_id_fk']==3)
        {
            $data['emp_data_sesstion'] = $this->Mohma_model->emp_data_sesstion($_SESSION['emp_code']);
          //  $this->test($data['emp_data_sesstion']);
        }
        $data['result'] = $this->Mohma_model->select_by_id($id);

      if ($this->input->post('save') === 'save') {
  
      
            $this->Mohma_model->insert($id);
            $this->message('success', 'تمت الاضافة ');
       // redirect('human_resources/mohma/Mohma_c', 'refresh');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
      } else {
          redirect('human_resources/mohma/Mohma_c','refresh');
      }
       
    }
    $data['last_id'] = $this->Mohma_model->get_last();
    $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","38","");
        $data['title'] = 'تعديل مهمة';
        $data['emp_data'] = $this->Mohma_model->select_all_emp();
       

        if(isset($_POST['from_profile'])&&!empty($_POST['from_profile']))
        {
          $this->load->view('admin/Human_resources/mohma_v/mohma_emp', $data);
        }
        else{
  
            $data['subview'] = 'admin/Human_resources/mohma_v/mohma_emp';
            $this->load->view('admin_index', $data);
        }
    }
//-------------------------------------------------
    public function load_tahwel()
    {
        $type = $this->input->post('type');
        if ($type == 1) {
            $data['all'] = $this->Mohma_model->get_all_edarat();
            $this->load->view('admin/Human_resources/mohma_v/load_tahwel', $data);
        } else if ($type == 2) {
            $data['all'] = $this->Mohma_model->get_all_emps(0);
            $this->load->view('admin/Human_resources/mohma_v/load_tahwel_employee', $data);
        }
    }
//-----------------------------------------
   
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/mohma/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Disposition: filename="' . $file_name . '"');
        //header('Content-Discription:inline; filename="'.$name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function insert()
    {
        if ($this->input->post('save') === 'save') {

          
                $this->Mohma_model->insert($id=0);
            
        }
        $this->message('success', 'تمت الاضافة ');
       // redirect('human_resources/mohma/Mohma_c', 'refresh');

        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
      } else {
          redirect('human_resources/mohma/Mohma_c','refresh');
      }
    }
    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //   $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
    public function message($type, $text, $method = false)
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
    public function Delete_namozeg($rkm = false)
    {
        if ($this->input->post('id')) {
            $rkm = $this->input->post('id');
        }
        $this->Mohma_model->Delete($rkm);
    //    $this->Mohma_model->Delete_details($rkm);
       // redirect('human_resources/mohma/Mohma_c', 'refresh');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
      } else {
          redirect('human_resources/mohma/Mohma_c','refresh');
      }
        $this->message('success', 'تمت الحذف ');
    }
    public function get_all_data()
    {
        $id = $this->input->post('id');
     
        $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","38","");
        $data['get_all'] = $this->Mohma_model->select_by_id($id);
        $this->load->view('admin/Human_resources/mohma_v/getDetailsDiv', $data);
    }
    public function update_seen_mohma()//human_resources/mohma/Mohma_c/update_seen_mohma
    {
        $this->Mohma_model->update_seen_mohma();
    }

    public function update_seen_comments_mohma()//human_resources/mohma/Mohma_c/update_seen_comments_mohma
    {
        $this->Mohma_model->update_seen_comments_mohma();
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //yara23-9-2020
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
    //////////////////////////مرفقات///////////////////////////////////////
    public function add_attaches($id= false)//human_resources/mohma/Mohma_c/add_attaches
{

    if ($this->input->post('id')) {
        $id = $this->input->post('id');
    }
    $data['path']="uploads/human_resources/mohma";
    $data['mohma_id_fk']=$id;
    $data['one_data'] = $this->Mohma_model->get_attach($id);

    $data['ghat'] = $this->Difined_model->select_search_key2("hr_forms_settings","type","38","");
    $data['get_all'] = $this->Mohma_model->select_by_id($id);
  $data['title']='مرفقات   ';
   // $data['subview'] = 'admin/Human_resources/mohma_v/add_attaches';

    if(isset($_POST['from_profile'])&&!empty($_POST['from_profile']))
    {
      $this->load->view('admin/Human_resources/mohma_v/add_attaches', $data);
    }
    else{

        $data['subview'] = 'admin/Human_resources/mohma_v/add_attaches';
        $this->load->view('admin_index', $data);
    }
    //$this->load->view('admin_index', $data);
}
    public function add_morfaq()
    {
       
        $rkm=$this->input->post('row');
        $images=$this->upload_muli_file("files");

       $this->Mohma_model->insert_attach($images);

    }
   // F:\laragon\www\ABNAAv1\application\views\admin/Human_resources/mohma_v/mohma_emp.php
    public function get_attaches()
    {
        $rkm=$this->input->post('rkm');
        $data['rkm']=$this->input->post('rkm');
      $data['one_data'] = $this->Mohma_model->get_attach($rkm);

        $this->load->view('admin/Human_resources/mohma_v/get_table_attaches',$data);
    }
    public function Delete_attach()
    {
        $id=$this->input->post('id');
        $this->Mohma_model->delete_attach($id);

       
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
        $config['upload_path'] = 'uploads/human_resources/mohma';
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
    public function send_all_mohma()
    {

        $id=$this->input->post('id');
        $this->Mohma_model->send_all_mohma($id);

    }
   
    public function download_file( $file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/human_resources/mohma/'. $file);
        force_download($name, $data);
    }
    public function add_option()
    {

        $this->Mohma_model->insert_record($this->input->post('valu'));
    }

    public function end_mohma($id)
    {
        
        $this->Mohma_model->end_mohma($id);
        redirect('human_resources/mohma/Mohma_c', 'refresh');
        $this->message('success', 'تمت انهاء ');
    }
    ///////////////////////////////////////coments///////////////////////////
    public function add_comment($id= false)
    {
  
    if ($this->input->post('id')) {
        $id = $this->input->post('id');
    }
    
       $data['result']=$this->Mohma_model->get_comments($id);
      // $this->test($data['result']);
      $data['get_mohma']= $this->Mohma_model->select_by_id($id);
       $data['get_all']=$this->Mohma_model->select_by_id($id);
       // $data['subview'] = 'admin/Human_resources/mohma_v/mohma_comments';
        if(isset($_POST['from_profile'])&&!empty($_POST['from_profile']))
        {
          $this->load->view('admin/Human_resources/mohma_v/mohma_comments', $data);
        }
        else{
    
            $data['subview'] = 'admin/Human_resources/mohma_v/mohma_comments';
            $this->load->view('admin_index', $data);
        }
       // $this->load->view('admin_index', $data);

    }
    public function add_comments()
    {
      
        $id = $this->input->post('id');
        $to_emp_id_fk=$this->input->post('to_emp_id_fk');
         $this->Mohma_model->add_comment($id,$to_emp_id_fk);
       
    
      

    }
    public function update_comments()
    {
      
        $id = $this->input->post('id');
         $this->Mohma_model->update_comment($id);
       
    
      

    }
    public function delete_comment()
    {
        $id = $this->input->post('id');
        $this->Mohma_model->delete_comment($id);
     //   $this->message('success',' تم الحذف  ' );
       // redirect('human_resources/mohma/Mohma_c/add_comment/'.$tazkra_id_fk,'refresh');
    }
    public function update_comment($id,$tazkra_id_fk){
        if ($this->input->post('add')){
            $this->Mohma_model->update_comment($id);
            $this->message('success',' تم التعديل بنجاح');
            redirect('human_resources/mohma/Mohma_c/add_comment/'.$tazkra_id_fk,'refresh');
        }
        $data['subview'] = 'admin/Human_resources/mohma_v/mohma_comments';
        $this->load->view('admin_index',$data);
    }
    public function load_details()
    {
        $row_id = $this->input->post('row_id');
        $data['get_mohma']= $this->Mohma_model->get_comment_byId($row_id);
        //$this->test( $data['get_mohma']);
        $this->load->view('admin/Human_resources/mohma_v/load_details', $data);
    }
    // load_comments

    public function load_comments()
    {
        $id = $this->input->post('id');
        $data['result']=$this->Mohma_model->get_comments($id);
        //$this->test( $data['get_mohma']);
        $this->load->view('admin/Human_resources/mohma_v/load_comments', $data);
    }

    // yara

    public function add_setting(){
        $type = $this->input->post('type');
        
        $type_name = $this->input->post('type_name'); 
       
        $this->Mohma_model->add_setting($type);
       // $data['result'] = $this->Volunteer_hours_model->get_setting($type,$edara_n,$edara_id_fk);
       $data['result'] = $this->Mohma_model->get_setting($type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/mohma_v/load_setting',$data);
    }
     public function load_settigs(){
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
       
       
           
        $data['result'] = $this->Mohma_model->get_setting($type);
        
        
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/mohma_v/load_setting',$data);
    }
           public function delete_setting(){
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
          
            $this->Mohma_model->delete_setting($id);
             $data['result'] = $this->Mohma_model->get_setting($type);
            $data['type_name'] = $type_name;
            $this->load->view('admin/Human_resources/mohma_v/load_setting',$data);
        }
            public function get_setting_by_id(){
        $id = $this->input->post('row_id') ;
       $result = $this->Mohma_model->get_setting_by_id($id);
       echo json_encode($result) ;
    } 
} // END CLASS