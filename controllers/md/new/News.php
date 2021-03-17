<?php
class News extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('md/news/News_model');
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
    public function read_file($folder,$file_name)
    {
        $this->load->helper('file');
        $file_path = $folder.'/'.$file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="'.$file_name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);

    }
  

    public function add_news()//md/new/News/add_news
    {

      $data['result']=$this->News_model->select_all_news();
   
    
        $data['subview'] = 'admin/md/news_v/add_news';
        $this->load->view('admin_index', $data);
    }
    public function add()
    {   
       $this->News_model->insert();
       $this->messages('success', ' تمت الاضافه  بنجاح');
       redirect('md/new/News/add_news','refresh');
    }
    public function  update($id){   
        if($this->input->post('add')){
       
           $this->News_model->update($id); 
           $this->messages('success', ' تمت التعديل  بنجاح');
           
           redirect('md/new/News/update/'.$id,'refresh');
           
        }
        
        $data['item']=$this->News_model->get_by_id($id);
        $data['subview'] = 'admin/md/news_v/add_news';
        $this->load->view('admin_index', $data);
         
     }
     public function  update_complete(){   
         $id=$this->input->post('id');       
           $this->News_model->update($id);  
     }
     public function delete($id)
     {
        $this->News_model->delete($id); 
        $this->News_model->delete_media($id); 
        $this->News_model->delete_vedioes($id); 
        $this->messages('success', ' تمت الحذف  بنجاح');
        redirect('md/new/News/add_news','refresh');
     }
     
    public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->News_model->get_news_by_id($row_id);
        $this->load->view('admin/md/news_v/load_details', $data);
}

public function compelete_details($id)
{

    $data['title'] = 'تفاصيل الخبر';
    $data['get_all'] = $this->News_model->get_news_by_id($id);
    $data['item']=$this->News_model->get_by_id($id);
    $data['folder_path']= 'uploads/md/news';
    $data['morfqat'] = $this->News_model->get_table('md_news_attachment',array('news_id_fk'=>$id,'type'=>1));
    $data['vedio'] = $this->News_model->get_table('md_news_attachment',array('news_id_fk'=>$id,'type'=>2));
    $data['subview'] = 'admin/md/news_v/news_details';
    $this->load->view('admin_index',$data); 
}

private function upload_all_file($file_name,$id)
{
    $data['get_all'] = $this->News_model->get_news_by_id($id);
  $path='uploads/md/news';
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
    $this->News_model->insert_attach($id, $images);
}
public function delete_morfq()
{
    $id = $this->input->post('id');
    $this->News_model->delete_morfq($id);

}
public function load()
     {
      
      
      $id=$this->input->post('id');
      $data['get_all'] = $this->News_model->get_news_by_id($id);
    
    $data['folder_path']= 'uploads/md/news';
    $data['morfqat'] = $this->News_model->get_table('md_news_attachment',array('news_id_fk'=>$id,'type'=>1));
  
         $this->load->view('admin/md/news_v/load', $data);
     }
     public function get_fatora_attach()
     {
         $id=$this->input->post('val_id');
         $data['imgs']=$this->News_model->get_images($id);
         $x= $data['imgs'][0]->news_id_fk;
       $data['path']='uploads/md/news';
         $this->load->view('admin/md/news_v/load_attach',$data);
 
 
     }

 
   
     public function load_vedio()
     { 
    $id=$this->input->post("id");
 
        $data['vedio'] = $this->News_model->get_table('md_news_attachment',array('news_id_fk'=>$id,'type'=>2));
         $this->load->view('admin/md/news_v/load_vedios', $data);
     }
     
     public function add_vedio()
     
     { 
        $id=$this->input->post("id");
        $title=$this->input->post("title");
        $link=$this->input->post("link");
     
        $this->News_model->add_vedio($id,$title,$link);
            
           
         
     }
     public function getById_vedio()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->News_model->GetFromGeneral_settings_vedio($id);
         echo json_encode($reason);
         
     }
     public function update_vedio()
     
     { 
 
        $vedio_id=$this->input->post("id");
        $title=$this->input->post("title");
        $link=$this->input->post("link");
     
        $this->News_model->update_vedio($title,$link,$vedio_id);
            
           
         
     }
     public function delete_vedio()
     
     { 
 
        $vedio_id=$this->input->post("id");
     
     
        $this->News_model->delete_vedio($vedio_id);
            
            
         
     }
     



} // END CLASS 