<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electronic_card extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      if ($this->session->userdata('is_osra_logged_in') == 0) {
          redirect('osr/Login_osr');
      }
      $this->load->model('osr/service_orders/Electronic_card_model');
   
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
	public function index() //osr/service_orders/Electronic_card
	{
    $mother_national_id_fk= $_SESSION['mother_national_num'];
    $data['last_rkm'] = $this->Electronic_card_model->get_last_rkm();
    $data['last_record'] = $this->Electronic_card_model->get_last_record();
 // $this->test($data['last_record']);
        $data['children'] = $this->Electronic_card_model->getMotherChildren($mother_national_id_fk);
        $data['records'] = $this->Electronic_card_model->selectElectronic_card($mother_national_id_fk);
      if($this->input->post('add')){
        $this->Electronic_card_model->add_electronic_card();
       // messages('success','إضافة خدمة للأسرة');
       // redirect('osr/service_orders/Electronic_card','refresh');
    }

        $data['title'] = 'معالجة البطاقة الاكترونية';
        $data['subview'] = 'osr/service_orders/electronic_card/electronicId';
      
        $this->load->view('osr/osr_index', $data);
    }
    public function editElectronic_cardOrders()//osr/Electronic_card/editElectronic_cardOrders
	{
        $id=$this->input->post('id');
        $data['record'] = $this->Electronic_card_model->selectElectronic_cardByID($id); 
        $data['children'] = $this->Electronic_card_model->getMotherChildren($data['record']['mother_national_id_fk']);
  
        $this->load->view('osr/service_orders/electronic_card/edite_elecrtonic', $data);
    }
    

     
    public function edite()
    {
        $id=$this->input->post('id');
            $this->Electronic_card_model->edit_electronic_card($id);
            //messages('success','تعديل خدمة للأسرة');
            //redirect('osr/service_orders/Electronic_card','refresh');
        

         
    }
    public function deleteElectronic_card()
	{
        $id=$this->input->post('id');
		
        $this->Electronic_card_model->deleteElectronic_card($id);
           // messages('success','حذف خدمة للأسرة');
      
            //redirect('osr/service_orders/Electronic_card','refresh');
        
    }
    
    
    public function load_details()
     {
        
      $mother_national_id_fk= $_SESSION['mother_national_num'];
      $data['children'] = $this->Electronic_card_model->getMotherChildren($mother_national_id_fk);
      $data['records'] = $this->Electronic_card_model->selectElectronic_card($mother_national_id_fk);
         $this->load->view('osr/service_orders/electronic_card/load_tabel', $data);

        
     }
     public function get_add()
     {
        $data['last_record'] = $this->Electronic_card_model->get_last_record();
      
      //  $this->test($data['last_record']);
        $data['last_rkm'] = $this->Electronic_card_model->get_last_rkm();
         $mother_national_id_fk= $_SESSION['mother_national_num'];
         $data['children'] = $this->Electronic_card_model->getMotherChildren($mother_national_id_fk);
         $this->load->view('osr/service_orders/electronic_card/edite_elecrtonic', $data);
     }
     
     public  function getNationalNum(){   //family_controllers/Family/CheckNationalNum
       // $this->load->model("familys_models/Register");
        $child_id_fk =$this->input->post('child_id_fk');
        echo $this->Electronic_card_model->check_national_num($child_id_fk);

    }
	

}

