<?php
class Jobtitle extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('human_resources_model/egraat_settings/Job_title_model');
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
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/job_title/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function add_job_title()//human_resources/egraat_settings/Jobtitle/add_job_title
    {
        $data['title']="إضافة المسميات الوظيفيه ";
      $data['result']=$this->Job_title_model->select_all_job_title();
      $data['mainDepartments'] = $this->Job_title_model->select_all();
      $data['sub_department']=$this->Job_title_model->select_all_sub();
      $data['mosma_wazefy']=$this->Job_title_model->select_all_job_title();
        $data['subview'] = 'admin/Human_resources/egraat_settings/job_title_v/add_job_title';
        $this->load->view('admin_index', $data);
    }
    public function get_qsm()
    {
        $edara=$this->input->post('edara');
        $data['sub']=$this->Job_title_model->select_sub($edara);
        $this->load->view('admin/Human_resources/egraat_settings/job_title_v/load_qsm', $data);
    }
    public function add()
    {   
       $this->Job_title_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('human_resources/egraat_settings/Jobtitle/add_job_title','refresh');
    }
    public function  update($id){   
        if($this->input->post('add')){
           $this->Job_title_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           redirect('human_resources/egraat_settings/Jobtitle/add_job_title','refresh');
        }
        $data['item']=$this->Job_title_model->get_by_id($id);
        if(!empty($data['item']->edara))
        {
        $data['sub']=$this->Job_title_model->select_sub($data['item']->edara);
        }
        $data['mainDepartments'] = $this->Job_title_model->select_all();
        $data['mosma_wazefy']=$this->Job_title_model->select_all_job_title();
        $data['subview'] = 'admin/Human_resources/egraat_settings/job_title_v/add_job_title';
        $this->load->view('admin_index', $data);
     }
     public function  update_complete(){   
         $id=$this->input->post('id');       
           $this->Job_title_model->update($id);  
     }
     public function delete($id)
     {
        $this->Job_title_model->delete($id); 
        $this->Job_title_model->delete_media($id); 
        $this->messages('success', ' تمت الحذف  بنجاح');
        redirect('human_resources/egraat_settings/Jobtitle/add_job_title','refresh');
     }
    public function load_details(){
        $row_id = $this->input->post('row_id');
        $data['mainDepartments'] = $this->Job_title_model->select_all();
        $data['sub_department']=$this->Job_title_model->select_all_sub();
        $data['mosma_wazefy']=$this->Job_title_model->select_all_job_title();
        $data['get_all'] = $this->Job_title_model->get_news_by_id($row_id);
        $this->load->view('admin/Human_resources/egraat_settings/job_title_v/load_details', $data);
}
public function compelete_details($id)
{
    $data['title'] = 'تفاصيل الخبر';
    $data['get_all'] = $this->Job_title_model->get_news_by_id($id);
    $data['item']=$this->Job_title_model->get_by_id($id);
    $data['folder_path']= 'uploads/human_resources/job_title';
    $data['morfqat'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id));
    $data['vedio'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id,'type'=>2));
    $data['subview'] = 'admin/Human_resources/egraat_settings/job_title_v/news_details';
    $this->load->view('admin_index',$data); 
}
// add_picture
public function add_picture($id)
{
    $data['title'] = 'إضافة مهام وظيفية';
    $data['get_all'] = $this->Job_title_model->get_news_by_id($id);
    $data['item']=$this->Job_title_model->get_by_id($id);
    $data['folder_path']= 'uploads/human_resources/job_title';
    $data['morfqat'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id));
 //   $data['vedio'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id,'type'=>2));
    $data['subview'] = 'admin/Human_resources/egraat_settings/job_title_v/add_picture';
    $this->load->view('admin_index',$data); 
}
//yara22-9-2020
public function add_edara_qsm($id)//human_resources/egraat_settings/Jobtitle/add_job_title
    {
        $data['title']="ربط المسمي الوظيفي الاداره والقسم ";
        $data['item']=$this->Job_title_model->get_by_id($id);
      $data['mainDepartments'] = $this->Job_title_model->select_all();
      $data['sub_department']=$this->Job_title_model->select_all_sub();
      if(!empty($data['item']->edara))
      {
      $data['sub']=$this->Job_title_model->select_sub($data['item']->edara);
      }
      $data['mosma_wazefy']=$this->Job_title_model->select_all_job_title();
        $data['subview'] = 'admin/Human_resources/egraat_settings/job_title_v/add_edara_qsm';
        $this->load->view('admin_index', $data);
    }
    public function update_edara_qsm($id)
    {
        if($this->input->post('add')){
            $this->Job_title_model->update_edara_qsm($id); 
            $this->messages('success', ' تمت التعديل  بنجاح');
            redirect('human_resources/egraat_settings/Jobtitle/add_edara_qsm/'.$id,'refresh');
         }
    }
//yara22-9-2020
private function upload_all_file($file_name,$id)
{
    $data['get_all'] = $this->Job_title_model->get_news_by_id($id);
  $path='uploads/human_resources/job_title';
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
private function upload_muli_file($input_name,$id)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = $this->upload_all_file("userFile",$id);
    }
    return $all_img;
}
public function upload_img()
{
    $id = $this->input->post('row');
    $images = $this->upload_muli_file("files",$id);
    $this->Job_title_model->insert_attach($id, $images);
}
public function delete_upload($id)
{
    $img = $this->Job_title_model->get_table_by_id('hr_egraat_setting_details',array('id'=>$id));
    $path='uploads/human_resources/job_title';
  //  $this->test($img->morfaq);
    if (file_exists($path . "/" . $img->file)) {
        unlink(FCPATH . "" . $path . "/" . $img->file);
    }
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    // $id = $this->input->post('row_id');
    // $sader_id = $this->input->post('sader_id');
    $this->delete_upload($id);
    $this->Job_title_model->delete_morfq($id);
}
public function load()
     {
      $id=$this->input->post('id');
      $data['get_all'] = $this->Job_title_model->get_news_by_id($id);
    $data['folder_path']= 'uploads/human_resources/job_title';
    $data['morfqat'] = $this->Job_title_model->get_table('hr_egraat_setting_details',array('job_title_id_fk'=>$id));
         $this->load->view('admin/Human_resources/egraat_settings/job_title_v/load', $data);
     }
     public function get_fatora_attach()
     {
         $id=$this->input->post('val_id');
         $data['imgs']=$this->Job_title_model->get_images($id);
         $x= $data['imgs'][0]->job_title_id_fk;
       $data['path']='uploads/human_resources/job_title';
         $this->load->view('admin/Human_resources/egraat_settings/job_title_v/load_attach',$data);
     }
     public function change_status(){
        $id=$this->input->post('row');
        $emp_code=$this->input->post('emp_code');
        $approved=$this->input->post('approved');
        $this->Job_title_model->change_status($id,$emp_code,$approved);
        echo "تم تغير حاله ";
    }
} // END CLASS 