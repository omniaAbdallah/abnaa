
<?php
class Sysat_setting extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
   $this->load->model("familys_models/Sysat_setting_m");
      }
      
     public function addsysat_setting()//human_resources/egraat_settings/Sysat_setting/addsysat_setting
    {
        $data['title'] = "   إعداد السياسات  ";

         $data['all_data'] = $this->Sysat_setting_m->get(1)->row();
          $data['subview'] = 'admin/familys_views/sysat_setting_v/sysat_setting';
           $this->load->view('admin_index', $data);
    }     
          public function process()
    {
        $post = $this->input->post(null,true);

        if(isset($_POST['add'])){
            $this->Sysat_setting_m->add($post);
            $msg_title = 'process Added Successfully';
        }
        if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', $msg_title);
        }
       redirect('family_controllers/Sysat_setting/addsysat_setting','refresh');
    }
      
      
      }