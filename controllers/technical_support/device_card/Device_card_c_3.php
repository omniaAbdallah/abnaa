<?php
class Device_card_c extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
 
        $this->load->model('technical_support/device_card/Device_card_model');
     
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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
   
    public function add_card(){ // technical_support/device_card/Device_card_c/add_card
        $data['device_type']= $this->Device_card_model->get_card_settings(1);
        $data['brands']= $this->Device_card_model->get_card_settings(2);
        $data['all_card']= $this->Device_card_model->get_all_card();
        if ($this->input->post('add')){
           $id = $this->Device_card_model->add_card();
          
            $this->messages('success',' تم انشاء البطافة  ');
            redirect('technical_support/device_card/Device_card_c/add_card','refresh');
        }
        $data['title']='  اضافة  بطاقة جهاز';
        $data['subview']= 'admin/technical_support/device_card_settings/device_card_view';
        $this->load->view('admin_index',$data);
    }
    public function update_card($id){
        $data['device_type']= $this->Device_card_model->get_card_settings(1);
        $data['brands']= $this->Device_card_model->get_card_settings(2);
     
        $data['get_card']= $this->Device_card_model->get_card_byId($id);
        $data['models']= $this->Device_card_model->get_model_settings(3,$data['get_card']->brand_id_fk);
        if ($this->input->post('add')){
            $this->Device_card_model->update_card($id);
            $this->messages('success',' تم التعديل بنجاح');
            redirect('technical_support/device_card/Device_card_c/add_card','refresh');
        }
        $data['title']='  تعديل  بطاقة جهاز';
        $data['subview']= 'admin/technical_support/device_card_settings/device_card_view';
        $this->load->view('admin_index',$data);
    }
    public function  delete_card($id){
        $this->Device_card_model->delete_card($id);
       
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/device_card/Device_card_c/add_card','refresh');
    }
    public function get_models(){
        $from_code=$this->input->post('from_code');
        $data['models']= $this->Device_card_model->get_model_settings(3,$from_code);
        $this->load->view('admin/technical_support/device_card_settings/get_models',$data);
    }
}