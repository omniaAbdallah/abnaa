<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rent_orders extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('osr/service_orders/Rent_orders_m');
       
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

    public function index()
    {
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function new_rent()//osr/service_orders/Rent_orders/new_rent
    {
        $data['last_record'] = $this->Rent_orders_m->get_last_record();
           $mother_national_id_fk= $_SESSION['mother_national_num'];
           $data['records'] = $this->Rent_orders_m->select_egar_help($mother_national_id_fk);
           
           $data['type_use_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>201));
           $data['type_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>101));
         
           $data['hala_t2ses'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>401));
           $data['type_whda'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>301));
           $data['national_type'] = $this->Rent_orders_m->getSetting(array('type'=>1));
           $data['nationality'] = $this->Rent_orders_m->getSetting(array('type'=>2));
          $data['last_rkm'] = $this->Rent_orders_m->get_last_rkm();
            $data['title'] = ' ايجارات المنازل';
            $data['subview'] = 'osr/service_orders/rent_orders/new_rent';
            $this->load->view('osr/osr_index', $data);
          
           
        
    }
    public function add_rent()
    {
        $this->Rent_orders_m->add_rent();

    }
    public function load_details()
    {
       
     $mother_national_id_fk= $_SESSION['mother_national_num'];
     $data['records'] = $this->Rent_orders_m->select_egar_help($mother_national_id_fk);
    
        $this->load->view('osr/service_orders/rent_orders/load_details', $data);

       
    }
    public function editMarriageOrders()
	{
        $mother_national_id_fk= $_SESSION['mother_national_num'];
        $id=$this->input->post('id');
			$data['record'] = $this->Rent_orders_m->selectegar_helpByID($id);
            $data['type_use_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>201));
            $data['type_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>101));
          
            $data['hala_t2ses'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>401));
            $data['type_whda'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>301));
            $data['national_type'] = $this->Rent_orders_m->getSetting(array('type'=>1));
            $data['nationality'] = $this->Rent_orders_m->getSetting(array('type'=>2));
            $data['title'] = ' تعديل ايجارات المنازل ';
  
        $this->load->view('osr/service_orders/rent_orders/edite_rent_orders', $data);
    }
    public function get_add()
     {
        
        
        $data['last_record'] = $this->Rent_orders_m->get_last_record();
        $data['type_use_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>201));
        $data['type_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>101));
        $data['last_rkm'] = $this->Rent_orders_m->get_last_rkm();
        $data['hala_t2ses'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>401));
        $data['type_whda'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>301));
        $data['national_type'] = $this->Rent_orders_m->getSetting(array('type'=>1));
        $data['nationality'] = $this->Rent_orders_m->getSetting(array('type'=>2));
        $data['title'] = ' ايجارات المنازل';
  
        $this->load->view('osr/service_orders/rent_orders/edite_rent_orders', $data);
     }

     public function edite()
     {
         $id=$this->input->post('id');
        // $this->test($_POST);
        
         $this->Rent_orders_m->edit_rent($id);
 
          
     }

     public function delete_egar()
	{
        $id=$this->input->post('id');
		
            $this->Rent_orders_m->deleteegar_help($id);
           
      
       
        
    }
    
    public function get_order_details()
     {
        
        
        $id=$this->input->post('id');
        $data['record'] = $this->Rent_orders_m->selectegar_helpByID($id);
        $data['type_use_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>201));
        $data['type_house'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>101));
        $data['last_rkm'] = $this->Rent_orders_m->get_last_rkm();
        $data['hala_t2ses'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>401));
        $data['type_whda'] = $this->Rent_orders_m->getSetting_house(array('from_code'=>301));
        $data['national_type'] = $this->Rent_orders_m->getSetting(array('type'=>1));
        $data['nationality'] = $this->Rent_orders_m->getSetting(array('type'=>2));
        $data['title'] = ' ايجارات المنازل';
  
        $this->load->view('osr/service_orders/rent_orders/load_rent_orders', $data);
     }

}