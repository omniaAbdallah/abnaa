<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marriage_orders extends CI_Controller {

	
  

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('osr/service_orders/Marriage_help_model');
       
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
    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/images';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }
	public function index() //osr/service_orders/Marriage_orders
	{


        $mother_national_id_fk= $_SESSION['mother_national_num'];
        $data['last_rkm'] = $this->Marriage_help_model->get_last_rkm();
        $data['last_record'] = $this->Marriage_help_model->get_last_record();
        $data['children'] = $this->Marriage_help_model->getMotherChildren($mother_national_id_fk);
		$data['nationality'] = $this->Marriage_help_model->getSetting(array('type'=>2));
		$data['areas'] = $this->Marriage_help_model->getSetting(array('type'=>15));
        $data['national_type'] = $this->Marriage_help_model->getSetting(array('type'=>1));
        $data['records'] = $this->Marriage_help_model->selectMarriage_help($mother_national_id_fk);
		if($this->input->post('add')){
			$files_names = array('family_card_img','nekah_akd_img','hawia_img','person_img','akd_qa3a_img','ta3ref_ratb_img','tazkia_emam_img');
			foreach ($files_names as $value) {
				$file_name = $value;
				$file_array[$file_name] = $this->upload_image_2($file_name, 'osr/service_order/marriage_orders');
            }
           // $this->test($_FILES);
            $this->Marriage_help_model->add_help($file_array);
          //  messages('success','إضافة  مساعده زواج');
            //redirect('osr/service_orders/Marriage_orders','refresh');
        }

        $data['title'] = 'مساعدة زواج';
        $data['subview'] = 'osr/service_orders/marriage/marriageHelp';
        
        $this->load->view('osr/osr_index', $data);
	}
	public function editMarriageOrders()
	{
        $mother_national_id_fk= $_SESSION['mother_national_num'];
        $id=$this->input->post('id');
			$data['record'] = $this->Marriage_help_model->selectMarriage_helpByID($id);
			$data['nationality'] = $this->Marriage_help_model->getSetting(array('type'=>2));
			$data['areas'] = $this->Marriage_help_model->getSetting(array('type'=>15));
           
        $data['national_type'] = $this->Marriage_help_model->getSetting(array('type'=>1));
        $data['children'] = $this->Marriage_help_model->getMotherChildren($data['record']['mother_national_num']);
        $data['title'] = 'مساعدة زواج';
  
        $this->load->view('osr/service_orders/marriage/edite_marriageHelp', $data);
    }
    public function edite()
    {
        $id=$this->input->post('id');
       // $this->test($_POST);
        $files_names = array('family_card_img','nekah_akd_img','hawia_img','person_img','akd_qa3a_img','ta3ref_ratb_img','tazkia_emam_img');
        foreach ($files_names as $value) {
            $file_name = $value;
            $file_array[$file_name] = $this->upload_image_2($file_name, 'osr/service_order/marriage_orders');
        }
        $this->Marriage_help_model->edit_help($file_array,$id);

         
    }
    public function delete_marrage()
	{
        $id=$this->input->post('id');
		
            $this->Marriage_help_model->deleteMarriage_help($id);
           
      
       
        
    }
	
    public function download($fileName)
    {
    $this->load->helper('download');
    $name = $fileName;
    $data = file_get_contents('./uploads/images/'.$fileName); 
    force_download($name, $data); 
    }

    public function get_add()//osr/Manzl_fix/editManzl_fixOrders
     {
        
        $mother_national_id_fk= $_SESSION['mother_national_num'];
    
			$data['nationality'] = $this->Marriage_help_model->getSetting(array('type'=>2));
			$data['areas'] = $this->Marriage_help_model->getSetting(array('type'=>15));
            $data['last_rkm'] = $this->Marriage_help_model->get_last_rkm();  
            $data['last_record'] = $this->Marriage_help_model->get_last_record();
        $data['national_type'] = $this->Marriage_help_model->getSetting(array('type'=>1));
        $data['children'] = $this->Marriage_help_model->getMotherChildren($mother_national_id_fk);
        $data['title'] = 'مساعدة زواج';
  
        $this->load->view('osr/service_orders/marriage/edite_marriageHelp', $data);
     }
     public function load_details()
     {
        
      $mother_national_id_fk= $_SESSION['mother_national_num'];
      $data['records'] = $this->Marriage_help_model->selectMarriage_help($mother_national_id_fk);
     
         $this->load->view('osr/service_orders/marriage/load_details', $data);

        
     }
	

}
