<?php
class Osr_ektfaa_t3ref extends MY_Controller
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

        $this->load->model('familys_models/osr_ektfaa_m/Osr_ektfaa_t3ref_m');
       
    }
    private function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
   
   
   
    public function ehsai()/* */
    {


  
        $data['title'] = '';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/statics';
 $this->load->view('index_without_sidebar', $data);    }
    public function index()//family_controllers/osr_ektfaa/Osr_ektfaa_t3ref
    {
     
      
        $data['title'] = 'إضافة  تعريف برنامج';
        $data['talab_rkm_fk']=$this->input->post('id');
        $data['folder_path']= 'uploads/family_attached/osr_ektfaa_mostndat';
        $data['morfqat'] = $this->Osr_ektfaa_t3ref_m->get_table('osr_ektfaa_mostndat',array());
        $data['t3ref_data'] = $this->Osr_ektfaa_t3ref_m->get_table_by_id('osr_ektfaa_ta3ref',array('id'=>1));
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/osr_ektfaa_t3ref/add_t3ref';
        $this->load->view('admin_index', $data);
    }
    public function load()
         {
         
         
        $data['folder_path']= 'uploads/family_attached/osr_ektfaa_mostndat';
        $data['morfqat'] = $this->Osr_ektfaa_t3ref_m->get_table('osr_ektfaa_mostndat',array());
             $this->load->view('admin/familys_views/osr_ektfaa_v/osr_ektfaa_t3ref/load', $data);
         }
         public function read_file($file_name)
        {
            $this->load->helper('file');
            $file_path = 'uploads/family_attached/osr_ektfaa_mostndat/'.$file_name;
            header('Content-Type: application/pdf');
            header('Content-Discription:inline; filename="'.$file_name.'"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges:bytes');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
        }
    private function upload_all_file($file_name)
    {
      $path='uploads/family_attached/osr_ektfaa_mostndat';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function upload_muli_file($input_name)
    {
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
    private  function upload_image($file_name){

        $config['upload_path'] = 'uploads/family_attached/osr_ektfaa_mostndat';
    
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    
        $config['max_size']    = '1024*8';
    
        $config['encrypt_name']=true;
    
        $this->load->library('upload',$config);
    
        if(! $this->upload->do_upload($file_name)){
    
          return  false;
    
        }else{
    
            $datafile = $this->upload->data();
    
           
    
           return  $datafile['file_name'];
    
        }
    
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
    // upload_data
    public function upload_data()
    {
     
        $images = $this->upload_image("file_logo");
        $this->Osr_ektfaa_t3ref_m->insert_data($images);
        redirect('family_controllers/osr_ektfaa/Osr_ektfaa_t3ref','refresh');
        $this->messages('success','إضافة ');

    }
    public function upload_img()
    {
     
     
        $images = $this->upload_muli_file("files");
        $this->Osr_ektfaa_t3ref_m->insert_attach($images);
    }
    public function delete_upload($id)
    {
     
        $img = $this->Osr_ektfaa_t3ref_m->get_table_by_id('osr_ektfaa_mostndat',array('id'=>$id));
        $path='uploads/family_attached/osr_ektfaa_mostndat';
        if (file_exists($path . "/" . $img->file)) {
            unlink(FCPATH . "" . $path . "/" . $img->file);
        }
    }
    public function delete_morfq()
    {
     
        $id = $this->input->post('id');
        $this->delete_upload($id);
        $this->Osr_ektfaa_t3ref_m->delete_morfq($id);
    }

    
} // END CLASS 