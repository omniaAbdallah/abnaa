<?php
class Bath_mobsher extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
       // F:\laragon\www\ABNAAv1\application\models\md\bath_mobasher\Bath_mobasher_model.php
        $this->load->model('md/bath_mobasher/Bath_mobasher_model');
        $this->load->model('system_management/Groups');
        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
         $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
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

  


public function add_bathmobasher()

//md/bath_mobasher/Bath_mobsher/add_bathmobasher
{

    $data['title'] = 'البث المباشر ';
  $data['exist'] = $this->Bath_mobasher_model->get_count('md_bath_mobasher', array());
   $data['vedios'] = $this->Bath_mobasher_model->get_table('md_bath_mobasher',array());
    $data['subview'] = 'admin/md/bath_mobasher/news_details';
    $this->load->view('admin_index',$data); 
}

     public function load_vedio()
     { 
   
        $data['vedios'] = $this->Bath_mobasher_model->get_table('md_bath_mobasher',array());
     //   $data['vedio'] = $this->Bath_mobasher_model->get_table('md_bath_mobasher',array());
         $this->load->view('admin/md/bath_mobasher/load_vedios', $data);
     }
     
     public function add_vedio()
     
     { 
      
        
        $link=$this->input->post("link");
     
        $this->Bath_mobasher_model->add_vedio($link);
            
           
         
     }
     public function getById_vedio()
     {
     
         
         $id=$this->input->post('id');
         $reason=$this->Bath_mobasher_model->GetFromGeneral_settings_vedio($id);
         echo json_encode($reason);
         
     }
     public function update_vedio()
     
     { 
 
   
  
        $link=$this->input->post("link");
     $vedio_id=$this->input->post("id");
        $this->Bath_mobasher_model->update_vedio($link,$vedio_id);
            
           
         
     }
     public function delete_vedio()
     
     { 
 
        $vedio_id=$this->input->post("id");
     
     
        $this->Bath_mobasher_model->delete_vedio($vedio_id);
            
            
         
     }
     



} // END CLASS 