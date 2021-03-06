<?php
class Talb_hij_omra extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
  
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model("familys_models/talbat_m/Talb_hij_omra_model");
        $this->load->model("Difined_model");
    }
//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
  
//-----------------------------------------
    
   public function get_osra_last_date()
   {
        $data['osra_in']=$this->Talb_hij_omra_model->get_osra_in_last_date($_POST['file_num']);
   if($data['osra_in']!='')
   {
   
       $this->load->view('admin/familys_views/talbat_v/serv_hij_omra_views/get_osra_last_date',$data);
   }
   }

    public function getDetails()
   {
       $mother_national_num=$this->input->post('mother_national_num');
        
        $data["family_data"] = $this->Talb_hij_omra_model->basic_data($mother_national_num);
        $data["member_data"] = $this->Talb_hij_omra_model->member_data($mother_national_num);
   
       $this->load->view('admin/familys_views/talbat_v/serv_hij_omra_views/mem_data',$data);
   
   }

  
} // END CLASS