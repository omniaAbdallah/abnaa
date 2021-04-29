<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fav_emp_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
   
    }
    //--------------------- tools functions   ----------------------------------
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
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }

public function add_fav_page(){
    if($_SESSION['role_id_fk']==3)
    {
    $id=$_SESSION['user_id'];
        //-------------------------------------------
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        //-------------------------------------------
        $this->load->model('system_management/Groups');
        
        $this->load->model('human_resources_model/fav_emp/Fav_emp_m');
        $this->load->model('Difined_model');
           $data['title_name'] = $this->Groups->get_group_title($_SESSION["group_number"]);
           $this->main_groups=$this->Groups->main_fetch_group();
           $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $data['users']=$this->Difined_model->select_all("users","user_id","","user_id","ASC");
        $data["results_main"]=$this->Groups->get_categories();
        $data['user_data'] = $this->Difined_model->getByArray("users",array("user_id"=>$id));
      
        $data["user_permations"]=$this->Fav_emp_m->select_per($id);
     //  $this->test($data['user_permations']);
        if ($this->input->post('edit_role')) {
            $this->Difined_model->delete('hr_emp_fav_pages',array("user_id"=>$id));
            $this->Fav_emp_m->insert_user_role();
          $this->messages('success','تم إضافة بنجاح');
            redirect('human_resources/fav_emp/Fav_emp_c/add_fav_page', 'refresh');

        }
        $data['title'] = ' إضافة الصفحات المفضلة';
        $data['metakeyword'] = 'إضافة الصفحات المفضلة ';
        $data['metadiscription'] = '';
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/fav_emp_v/add_fav_page', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/fav_emp_v/add_fav_page';
            $this->load->view('admin_index', $data);
        }
       
    }
}
}