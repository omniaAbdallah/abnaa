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
    //////////////////yara_start2-3-2021//////////////
    public function add_ohda(){ // technical_support/device_card/Device_card_c/add_ohda
        $data['device_type']= $this->Device_card_model->get_card_settings(1);
        $data['brands']= $this->Device_card_model->get_card_settings(2);
        $data['all_ohda']= $this->Device_card_model->get_all_ohda();
        if ($this->input->post('add')){
           $id = $this->Device_card_model->add_ohda();
          
            $this->messages('success',' تم انشاء عهدة جهاز الكتروني  ');
            redirect('technical_support/device_card/Device_card_c/add_ohda','refresh');
        }
        $data['title']='  اضافة  عهدة جهاز الكتروني ';
        $data['subview']= 'admin/technical_support/device_card_settings/device_ohda_view';
        $this->load->view('admin_index',$data);
    }
    // get_devices
    public function update_ohda($id){
        $data['device_type']= $this->Device_card_model->get_card_settings(1);
        $data['brands']= $this->Device_card_model->get_card_settings(2);
     
        $data['get_card']= $this->Device_card_model->get_ohda_byId($id);

        $data['devices_rkm_fk']= $this->Device_card_model->get_devices_settings($data['get_card']->no3_device);
       // $data['models']= $this->Device_card_model->get_model_settings(3,$data['get_card']->brand_id_fk);
        if ($this->input->post('add')){
            $this->Device_card_model->update_ohda($id);
            $this->messages('success',' تم التعديل بنجاح');
            redirect('technical_support/device_card/Device_card_c/add_ohda','refresh');
        }
        $data['title']='  تعديل   عهدة جهاز الكتروني';
        $data['subview']= 'admin/technical_support/device_card_settings/device_ohda_view';
        $this->load->view('admin_index',$data);
    }
    public function  delete_ohda($id){
        $this->Device_card_model->delete_ohda($id);
       
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/device_card/Device_card_c/add_ohda','refresh');
    }
    public function get_devices(){
        $from_code=$this->input->post('from_code');
        $data['devices_rkm_fk']= $this->Device_card_model->get_devices_settings($from_code);
        $this->load->view('admin/technical_support/device_card_settings/get_devices',$data);
    }
  

    // get_model_name
    public function get_model_name()
    {
        $model_id_fk=$this->input->post('from_code');
      
        $reason=$this->Device_card_model->get_model_name($model_id_fk);
        echo $reason;  
    }
   
    public function get_devices_details()
    {
        $id=$this->input->post('rkm');
        $reason=$this->Device_card_model->get_card_byId($id);
        echo json_encode($reason);  
    }
    public function getConnection_emp()
    {
      
        $all_Emps = $this->Device_card_model->get_all_emps();
          //     $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
                
                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                           ondblclick="Get_emp_Name(this)"
                            id="member' . $row_emp->id . '"
                            data-emp_code="' . $row_emp->emp_code . '"
                            data-edara_n="' . $row_emp->edara_n . '"
                            data-edara_id="' . $row_emp->administration . '"
                            data-name="' . $row_emp->employee . '"
                            data-job_title="' . $row_emp->mosma_wazefy_n . '"
                            data-qsm_n="' . $row_emp->qsm_n . '"
                            data-qsm_id="' . $row_emp->department . '"
                            />',
                    $row_emp->employee,
                    $row_emp->edara_n,
                    $row_emp->qsm_n,
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }
     //////////////////yara_start2-3-2021//////////////
     public function add_technial_support(){ // technical_support/device_card/Device_card_c/add_technial_support
        $data['talb_types']= $this->Device_card_model->get_card_settings(4);
        $data['all_technial_support']= $this->Device_card_model->get_all_technial_support();
        if ($this->input->post('add')){
           $id = $this->Device_card_model->add_technial_support();
            $this->messages('success',' تم انشاء طلب دعم فني تقني  ');
            redirect('technical_support/device_card/Device_card_c/add_technial_support','refresh');
        }
        $data['title']='  اضافة    طلب دعم فني تقني ';
        $data['subview']= 'admin/technical_support/device_card_settings/add_technial_support_view';
        $this->load->view('admin_index',$data);
    }
    public function update_technial_support($id){
        $data['talb_types']= $this->Device_card_model->get_card_settings(4);
        $data['get_card']= $this->Device_card_model->get_technial_support_byId($id);
        if ($this->input->post('add')){
            $this->Device_card_model->update_technial_support($id);
            $this->messages('success',' تم التعديل بنجاح');
            redirect('technical_support/device_card/Device_card_c/add_technial_support','refresh');
        }
        $data['title']='  تعديل طلب دعم فني تقني';
        $data['subview']= 'admin/technical_support/device_card_settings/add_technial_support_view';
        $this->load->view('admin_index',$data);
    }
    public function  delete_technial_support($id){
        $this->Device_card_model->delete_technial_support($id);
        $this->messages('success',' تم الحذف بنجاح');
        redirect('technical_support/device_card/Device_card_c/add_technial_support','refresh');
    }

    public function print_ohda()
    {
        $id=$this->input->post('row_id');
        $data['record']= $this->Device_card_model->get_ohda_byId($id);
        $data['device_type']= $this->Device_card_model->get_card_settings(1);
        $this->load->view('admin/technical_support/device_card_settings/print_ohda', $data);
    }
    // print_technical_support
    public function print_technical_support()
    {
        $id=$this->input->post('row_id');
        $data['record']= $this->Device_card_model->get_technial_support_byId($id);
        $data['talb_types']= $this->Device_card_model->get_card_settings(4);
        $this->load->view('admin/technical_support/device_card_settings/print_technical_support', $data);
    }
}