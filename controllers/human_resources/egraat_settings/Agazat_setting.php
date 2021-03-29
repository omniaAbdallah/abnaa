<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agazat_setting extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
      
        $this->load->model('human_resources_model/egraat_settings/agazat_setting/Agazat_setting_model');  
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
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

 
public function index()//human_resources/egraat_settings/Agazat_setting
    {
        $data['title'] = "    إعدادت سياسات الاجازات  ";
        $data['table'] = $this->Agazat_setting_model->get_records();
        if(isset($_POST['add'])){
            $this->Agazat_setting_model->insert_sysat();
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Agazat_setting', 'refresh');
        }
        $data['subview'] = 'admin/Human_resources/egraat_settings/agazat_setting_v/agazat_setting_v';
        $this->load->view('admin_index', $data);
    }
}
    ?>