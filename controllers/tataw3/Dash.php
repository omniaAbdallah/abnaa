<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dash extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
        //     redirect('gam3ia_omomia/Login_gam3ia_omomia');
        // }
        if ($this->session->userdata('is_tataw3_logged_in') == 0) {
            redirect('tataw3/Login_tataw3');
        }
        $this->load->model('tataw3/Pages_m');
        $this->load->model('tataw3/Tataw3_model');
      //  $this->load->model('gam3ia_omomia/Tataw3_model');
      
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index()
    { /*gam3ia_omomia/Dash*/
        
        if ($this->session->userdata('is_tataw3_logged_in') == 0) {
            redirect('tataw3/Login_tataw3');
        }
        $this->load->model('gam3ia_omomia/Tataw3_model');
      //  $this->test($_SESSION);
        $data['person_data'] = $this->Tataw3_model->get_by_member_id($_SESSION['id'],'id', 'tat_motat3en');
       // $data['odwia_data'] = $this->Tataw3_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'tataw3/main';
        $this->load->view('tataw3/index_tataw3_without_sidebar', $data);
    }
    public function mian_group($id)
    {
        
        if ($this->session->userdata('is_tataw3_logged_in') == 0) {
            redirect('tataw3/Login_tataw3');
        }
        $_SESSION["group_number"] = $id;
        $data["groups"] = $this->Pages_m->get_group($id);
        //$this->test($data["groups"]);
        $data["groups_id"] = $id;
        $date_table = $this->Pages_m->getgroupbyid($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'tataw3/sub_main';
        $this->load->view('tataw3/tataw3_index', $data);
    }
    public function sub_sub_main($id, $main_group_id)
    {
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Pages_m->get_group($id);
        $date_table = $this->Pages_m->getgroupbyid($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'tataw3/sub_sub_main';
        $this->load->view('tataw3/tataw3_index', $data);
    }
      
    
}//END CLASS
?>