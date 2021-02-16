<?php
 class Serv_setting extends MY_Controller{

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

         $this->load->model('services_models/family_serv_setting/Serv_setting_model');

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

     public function add_setting(){ // services_orders/family_serv_setting/Serv_setting/add_setting


         if ($this->input->post('add')){

             $this->Serv_setting_model->add_setting();
             $this->messages('success', 'تم الاضافة بنجاح ' );
             redirect('services_orders/family_serv_setting/Serv_setting/add_setting', 'refresh');
         }
         $data['records'] = $this->Serv_setting_model->get_setting();
         $data['title'] = " إعدادات الخدمات ";
         $data['subview'] = 'admin/services_orders/family_serv_setting/serv_settings/serv_setting_view';
         $this->load->view('admin_index', $data);
     }
     //
     public function update_setting($id){

         if ($this->input->post('add')){

             $this->Serv_setting_model->add_setting($id);
             $this->messages('success', 'تم التعديل بنجاح ' );
             redirect('services_orders/family_serv_setting/Serv_setting/add_setting', 'refresh');

         }
         $data['get_setting'] = $this->Serv_setting_model->get_setting($id);
         $data['title'] = " إعدادات الخدمات ";
         $data['subview'] = 'admin/services_orders/family_serv_setting/serv_settings/serv_setting_view';
         $this->load->view('admin_index', $data);
     }
     public function load_details(){

         $row_id = $this->input->post('row_id');
         $data['get_all']=$this->Serv_setting_model->get_setting($row_id);
         $this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_details',$data);

     }
     public function delete_setting($id){
         $this->Serv_setting_model->delete_table('family_serv_khdmat_settings',array('id'=>$id));
         $this->Serv_setting_model->delete_table('family_serv_khdmat_sett_details',array('khdma_id_fk'=>$id));
         $this->messages('success', 'تم الحذف بنجاح ' );
         redirect('services_orders/family_serv_setting/Serv_setting/add_setting', 'refresh');

     }
     public function load_cond($row_id){

         //$row_id = $this->input->post('row_id');
         $data['result']=$this->Serv_setting_model->get_setting($row_id);
         //$this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_cond',$data);


         $data['title'] = " إعدادات الخدمات ";
         $data['subview'] = 'admin/services_orders/family_serv_setting/serv_settings/load_cond';
         $this->load->view('admin_index', $data);

     }

     public function load_data(){

         $row_id = $this->input->post('row_id');
         $type = $this->input->post('type');
         $data['type']= $type;
         $data['result']=$this->Serv_setting_model->get_details($row_id,$type);
         $this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_cond_result',$data);
     }
     public function add_serv_details(){
         $data['type'] = $this->input->post('type');
         $row_id = $this->input->post('khdma_id_fk');
         $this->Serv_setting_model->add_serv_details();
         $data['result']=$this->Serv_setting_model->get_details($row_id,$data['type']);
         $this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_cond_result',$data);

     }

     public function update_serv_details(){
         $data['type'] = $this->input->post('type');
         $khdma_id_fk = $this->input->post('khdma_id_fk');
         $row_id = $this->input->post('row_id');
         $this->Serv_setting_model->update_serv_details($row_id);
         $data['result']=$this->Serv_setting_model->get_details($khdma_id_fk,$data['type']);
         $this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_cond_result',$data);

     }

     public function delete_serv_details(){
         $data['type'] = $this->input->post('type');
         $khdma_id_fk = $this->input->post('khdma_id_fk');
         $row_id = $this->input->post('row_id');
         $this->Serv_setting_model->delete_table('family_serv_khdmat_sett_details',array('id'=>$row_id));
         $data['result']=$this->Serv_setting_model->get_details($khdma_id_fk,$data['type']);
         $this->load->view('admin/services_orders/family_serv_setting/serv_settings/load_cond_result',$data);

     }
     //yara19-4-2020
     public function f2a_service_setting() // services_orders/family_serv_setting/Serv_setting/f2a_service_setting
     {
    $data['service'] = $this->Serv_setting_model->get_services();
    $data['cat_service'] = $this->Serv_setting_model->get_allf2at_services();

         if ($this->input->post('add')) {

             $this->Serv_setting_model->insert_f2a();
            
         }
         $data['title'] = " فئة الخدمات  ";
         $data['title2'] = "  فئة الخدمات ";
         $data['subview'] = 'admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/add_f2a_ser_view';
         $this->load->view('admin_index', $data);
     }
     public function f2a_service_setting_uptate()
     {
         $id=$this->input->post('id');
         $this->Serv_setting_model->f2a_service_setting_uptate($id);
     }
     
     public function edite_f2a()
     {
         $id=$this->input->post('id');
         $data['service'] = $this->Serv_setting_model->get_services();
         $data['f2at'] = $this->Serv_setting_model->getf2at_ser($id);
         $data['title'] = " تعديل فئة الخدمات ";
         $data['title2'] = "  فئة الخدمات ";
         $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/edite_f2a', $data);
     }

     public function load_details_f2a()
     {
        $data['title2'] = "  فئة الخدمات ";
      $data['cat_service'] = $this->Serv_setting_model->get_allf2at_services();
         $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/load_tabel', $data);   
     }
     public function get_add()
     {
        $data['service'] = $this->Serv_setting_model->get_services();
        $data['title'] = "  فئة الخدمات ";
        $data['title2'] = "  فئة الخدمات ";
        $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/edite_f2a', $data);
     }
     public function f2a_service_setting_delete()
    {
        $id=$this->input->post('id');
        $this->Serv_setting_model->f2a_service_setting_delete($id);
    }
      //yara19-4-2020//wasf
      public function wasf_service_setting() // services_orders/family_serv_setting/Serv_setting/wasf_service_setting
      {
        $data['service'] = $this->Serv_setting_model->get_services();
        $data['f2att'] = $this->Serv_setting_model->get_f2a();
        $data['cat_service'] = $this->Serv_setting_model->get_allwasf_services();
          if ($this->input->post('add')) {
              $this->Serv_setting_model->insert_wasf(); 
          }
          $data['title'] = " وصف الخدمات  ";
          $data['title2'] = "  وصف الخدمات ";
          $data['subview'] = 'admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/add_wasf_ser_view';
          $this->load->view('admin_index', $data);
      }
      public function wasf_service_setting_uptate()
      {
          $id=$this->input->post('id');
          $this->Serv_setting_model->wasf_service_setting_uptate($id);
      }
      
      public function edite_wasf()
      {
          $id=$this->input->post('id');
          $data['service'] = $this->Serv_setting_model->get_services();
          $data['f2att'] = $this->Serv_setting_model->get_f2a();
          $data['f2at'] = $this->Serv_setting_model->getf2at_ser($id);
          $data['title'] = " تعديل وصف الخدمات ";
          $data['title2'] = "  وصف الخدمات ";
          $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/edite_wasf', $data);
      }
 
      public function load_details_wasf()
      {
         $data['title2'] = "  وصف الخدمات ";
         $data['f2att'] = $this->Serv_setting_model->get_f2a();
       $data['cat_service'] = $this->Serv_setting_model->get_allwasf_services();
          $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/load_tabel_wasf', $data);   
      }
      public function get_add_wasf()
      {
         $data['service'] = $this->Serv_setting_model->get_services();
         $data['f2att'] = $this->Serv_setting_model->get_f2a();
         $data['title'] = "  وصف الخدمات ";
         $this->load->view('admin/services_orders/family_serv_setting/f2a_wasf_serv_setting/edite_wasf', $data);
      }
      //yaraend
 }