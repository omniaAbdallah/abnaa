<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dash extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $this->load->model('gam3ia_omomia/Pages_m');
        $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
      
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
        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $this->load->model('gam3ia_omomia/gam3ia_omomia_model');
        $data['person_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
        $data['odwia_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
   ///yara11-5-2020
   $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
   $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
   $data['all_gam3ia_omomia'] = $this->Gam3ia_omomia_members_model->select_all();
   $data['all_members'] = $this->All_magls_edara_members_model->select_all_magls_edara_members();
   $data['magls_data'] = $this->All_magls_edara_members_model->get_all_magls_data();
   $data['gam3ia_omomia'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_members', array());
   $data['mgles_edara'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array('status'=>1));
   $data['orders'] = $this->Gam3ia_omomia_model->get_esalat_orders();
   $data['all_pills_today'] = $this->Gam3ia_omomia_model->select_all_by_fr_all_pills_all();
   $data["result"] = $this->Gam3ia_omomia_model->display_publisher_data('',array());
   //yara11-5-2020
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'gam3ia_omomia/main';
        $this->load->view('gam3ia_omomia/index_gam3ia_omomia_without_sidebar', $data);
    }
    public function mian_group($id)
    {
        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $_SESSION["group_number"] = $id;
        $data["groups"] = $this->Pages_m->get_group($id);
        //$this->test($data["groups"]);
        $data["groups_id"] = $id;
        $date_table = $this->Pages_m->getgroupbyid($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'gam3ia_omomia/sub_main';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }
    public function sub_sub_main($id, $main_group_id)
    {
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Pages_m->get_group($id);
        $date_table = $this->Pages_m->getgroupbyid($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'gam3ia_omomia/sub_sub_main';
        $this->load->view('gam3ia_omomia/gam3ia_omomia_index', $data);
    }
      
    
}//END CLASS
?>