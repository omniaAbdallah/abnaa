<?php
class Settings extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
 
      
        $this->load->model('technical_support/device_card/Settings_model');
    
     
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
    }
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-----------------------------------------
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
        }
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
        }
        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }
    }
    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */

    public function settings($type=0){    // technical_support/device_card/Settings/settings
        $data['brands']= $this->Settings_model->select_brands();
        $data['modals']= $this->Settings_model->select_modals();
        $data['devices']= $this->Settings_model->select_devices();

        $data['talb']= $this->Settings_model->select_talb();
        $data['typee']= $type;
        $data['title'] = 'التعريفات ';
        $data['subview'] = 'admin/technical_support/device_card_settings/settings_view';
        $this->load->view('admin_index', $data);
    }
 
    /*****************************************/
    public function AddSittingbrands($type){  
        if($this->input->post('add_brand')){
            $this->Settings_model->add_brand($type);
            $this->messages('success',' تم إضافة ');
            redirect('technical_support/device_card/Settings/settings/'.$type,'refresh');
        }
    }
    public function UpdateSittingbrands($id,$type){
        $data['brands']= $this->Settings_model->select_brands();
        //$data['classes']= $this->Settings_model->select_classes();
        $data['brand'] = $this->Settings_model->getbrands($id);
        $data['typee'] = $type ;
        $data["id"]=$id;
        $data['disabled'] = 'disabled' ;
        $data["type_name"]='';
        if($this->input->post('add_brand')){
            $this->Settings_model->update_brand($id,$type);
            $this->messages('success','  تم بنجاح تحديث البيانات');
            redirect('technical_support/device_card/Settings/settings/'.$type,'refresh');
        }
        // $data['title'] = 'تعديل ';
        $data['title'] = "التعريفات ";
        $data['subview'] = 'admin/technical_support/device_card_settings/settings_view';
        $this->load->view('admin_index', $data);
    }
    public function DeleteSittingbrands($type,$id){
        $this->Settings_model->deletebrands($id);
        $this->messages('success','حذف ');
        redirect('technical_support/device_card/Settings/settings/'.$type ,'refresh');
    }
   
}// END CLASS