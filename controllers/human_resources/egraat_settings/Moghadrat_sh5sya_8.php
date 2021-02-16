
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Moghadrat_sh5sya extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('human_resources_model/egraat_settings/moghadrat_sh5sya/Moghadrat_sh5sya_model');  
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
public function index()//human_resources/egraat_settings/Moghadrat_sh5sya
    {
       
        $data['title'] = "    إعدادت المغادرات الشخصية  ";
        $data['table'] = $this->Moghadrat_sh5sya_model->get_records();
        if(isset($_POST['add'])){
            $this->Moghadrat_sh5sya_model->insert_sysat();
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Moghadrat_sh5sya', 'refresh');
     
        }
        $data['subview'] = 'admin/Human_resources/egraat_settings/moghadrat_sh5sya_v/moghadrat_sh5sya_v';
        $this->load->view('admin_index', $data);
    }
        
}
    ?>