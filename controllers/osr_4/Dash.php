<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dash extends CI_Controller
{
    public $email_count;
    public $count_basic_in;
    public $files_basic_in;
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('Login_osr');
        }
        $this->load->model('osr/Pages_m');
//        $this->main_groups = $this->Pages_m->main_fetch_group();
//        $this->my_side_bar = $this->Pages_m->get_my_page_permession();
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index()
    { /*osr/Dash*/
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('Login_osr');
        }
        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'osr/main';
        $this->load->view('index_osr_without_sidebar', $data);
    }
    public function mian_group($id)
    {
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('Login_osr');
        }
        $_SESSION["group_number"] = $id;
        $data["groups"] = $this->Pages_m->get_group($id);
        $data["groups_id"] = $id;
        $date_table = $this->Pages_m->getgroupbyid($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'osr/sub_main';
        $this->load->view('osr_index', $data);
    }
    public function sub_sub_main($id, $main_group_id)
    {
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Pages_m->get_group($id);
        $date_table = $this->Pages_m->getgroupbyid($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'osr/sub_sub_main';
        $this->load->view('osr_index', $data);
    }
}//END CLASS
?>