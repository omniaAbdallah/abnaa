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
 
    
    
    

/* public function index()
    {
        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $this->load->model('gam3ia_omomia/gam3ia_omomia_model');
        //$this->load->model('md/urgent_m/Urgent_model');
        //$data['all_msgs'] =$this->Urgent_model->get();
        $data['person_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
       
        $data['odwia_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
        $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
        $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
        $data['all_gam3ia_omomia'] = $this->Gam3ia_omomia_members_model->select_all();
        $data['all_members'] = $this->All_magls_edara_members_model->select_all_magls_edara_members();
        $data['magls_data'] = $this->All_magls_edara_members_model->get_all_magls_data();
        $data['gam3ia_omomia'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_members', array());
        $data['mgles_edara'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array());
//yara13-6-2020
        $data['mgles_edara_active'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array('status'=>1));
        $data['mgles_edara_nonative'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array('status'=>2));
        $data['meetings'] = $this->Gam3ia_omomia_model->get_count('md_all_glasat_gam3ia_omomia', array('glsa_finshed'=>1));
        $data['mehwer'] = $this->Gam3ia_omomia_model->get_count('md_gadwal_a3mal_gam3ia_omomia', array('mehwar_title!='=>'NULL'));
        $data['qrar'] = $this->Gam3ia_omomia_model->get_count('md_gadwal_a3mal_gam3ia_omomia', array('elqrar!='=>'NULL'));
        $data['current_vote']=$this->Gam3ia_omomia_model->ge_current_vote();
        if(!empty($data['current_vote']))
        {
            $data['percentage']=$this->Gam3ia_omomia_model->get_percentage($data['current_vote']->id);
            if(!empty($data['percentage']))
            {
                $data['percentage_pos']=round(($this->Gam3ia_omomia_model->get_percentage_pos($data['current_vote']->id)/$data['percentage'])*100);
                $data['percentage_neg']=round(($this->Gam3ia_omomia_model->get_percentage_neg($data['current_vote']->id)/$data['percentage'])*100);
            }
        }
        $data['gam3ia_omomia_odwiat'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array());
        $data['adow_3amel'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>102));
        $data['adow_montsb'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>103));
        $data['adow_shraf'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>104));
        $data['adow_fakhry'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>106));
        $data['adow_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk'=>1));
        $data['adow_nonactive'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk'=>0));
        $data['job_role'] = $this->Gam3ia_omomia_model->get_job_role_array(array('defined_type'=>4));
        $data['employees_manager']= $this->Gam3ia_omomia_model->get_table_by_id('employees', array('emp_type'=>1,'status'=>'96','degree_id'=>25));
        $data['employees_assistant']= $this->Gam3ia_omomia_model->get_table_by_id('employees', array('emp_type'=>1,'status'=>'96','degree_id'=>23));
        //$data['employees']= $this->Gam3ia_omomia_model->get_table('employees', array('emp_type'=>1,'status'=>'96','degree_id!='=>32,'degree_id!='=>23));
        $data['employees']= $this->Gam3ia_omomia_model->get_all_employees('employees', array('emp_type'=>1,'employee_type'=>'1'));
        $data['vedios'] = $this->Gam3ia_omomia_model->get_id('md_bath_mobasher',0,0,'link');
        //yara13-6-2020
        $data['orders'] = $this->Gam3ia_omomia_model->get_esalat_orders();
        $data['all_pills_today'] = $this->Gam3ia_omomia_model->select_all_by_fr_all_pills_all();
        $data["result"] = $this->Gam3ia_omomia_model->display_publisher_data('',array());
        $data['current_vote']=$this->Gam3ia_omomia_model->ge_current_vote();
        if(!empty($data['current_vote']))
        {
            $data['check_voteing']=$this->Gam3ia_omomia_model->check_current_vote($data['current_vote']->id);
            $data['get_voteing']=$this->Gam3ia_omomia_model->get_voteing($data['current_vote']->id);
        }
        $data['memb_type'] = $this->Gam3ia_omomia_model->get_memb_type();
        if($data['memb_type'] == 2 ){
            $data['da3wa_magls_edara'] = $this->Gam3ia_omomia_model->get_da3wa_magls_edara();
        }
        $data['da3wat'] = $this->Gam3ia_omomia_model->get_action_da3wa();
        $data['mahwrs'] = $this->Gam3ia_omomia_model->get_mehwr_details(11);
        $this->load->model('Public_relations/website/library/Live_videos_model');
          $this->load->model('Public_relations/website/projects/Project_model');
        $data['vvv'] = $this->Live_videos_model->display_videos();
        $data['projects'] = $this->Project_model->display_projects(array('web_display'=>1));
         $data['downs'] = $this->Gam3ia_omomia_model->get_open_galesa_alert();
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'gam3ia_omomia/main';
        $this->load->view('gam3ia_omomia/index_gam3ia_omomia_without_sidebar', $data);
    }*/   
     public function index(){
$data['mahwrs'] = $this->Gam3ia_omomia_model->get_mehwr_details_dash();

        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
        $this->load->model('gam3ia_omomia/gam3ia_omomia_model');
        //$this->load->model('md/urgent_m/Urgent_model');
        //$data['all_msgs'] =$this->Urgent_model->get();
        $data['person_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
        $data['odwia_data'] = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
        $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
        $this->load->model('md/all_magls_edara_members/All_magls_edara_members_model');
        $data['all_gam3ia_omomia'] = $this->Gam3ia_omomia_members_model->select_all();
        $data['all_members'] = $this->All_magls_edara_members_model->select_all_magls_edara_members();
        $data['magls_data'] = $this->All_magls_edara_members_model->get_all_magls_data();
        $data['gam3ia_omomia'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_members', array());
        $data['mgles_edara'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array());
        $data['mgles_edara_active'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array('status'=>1));
        $data['mgles_edara_nonative'] = $this->Gam3ia_omomia_model->get_count('md_all_magls_edara_members', array('status'=>2));
        $data['meetings'] = $this->Gam3ia_omomia_model->get_count('md_all_glasat_gam3ia_omomia', array('glsa_finshed'=>1));
        $data['mehwer'] = $this->Gam3ia_omomia_model->get_count('md_gadwal_a3mal_gam3ia_omomia', array('mehwar_title!='=>'NULL'));
        $data['qrar'] = $this->Gam3ia_omomia_model->get_count('md_gadwal_a3mal_gam3ia_omomia', array('elqrar!='=>'NULL'));
        $data['current_vote']=$this->Gam3ia_omomia_model->ge_current_vote();
        if(!empty($data['current_vote']))
        {
            $data['percentage']=$this->Gam3ia_omomia_model->get_percentage($data['current_vote']->id);
            if(!empty($data['percentage']))
            {
                $data['percentage_pos']=round(($this->Gam3ia_omomia_model->get_percentage_pos($data['current_vote']->id)/$data['percentage'])*100);
                $data['percentage_neg']=round(($this->Gam3ia_omomia_model->get_percentage_neg($data['current_vote']->id)/$data['percentage'])*100);
            }
        }
        $data['gam3ia_omomia_odwiat'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array());
        $data['adow_3amel'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>102));
        $data['adow_montsb'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>103));
        $data['adow_shraf'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>104));
        $data['adow_fakhry'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('no3_odwia_fk'=>106));
        $data['adow_active'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk'=>1));
        $data['adow_nonactive'] = $this->Gam3ia_omomia_model->get_count('md_all_gam3ia_omomia_odwiat', array('odwia_status_fk'=>0));
        $data['job_role'] = $this->Gam3ia_omomia_model->get_job_role_array(array('defined_type'=>4));
        $data['employees_manager']= $this->Gam3ia_omomia_model->get_table_by_id('employees', array('emp_type'=>1,'status'=>'96','degree_id'=>25));
        $data['employees_assistant']= $this->Gam3ia_omomia_model->get_table_by_id('employees', array('emp_type'=>1,'status'=>'96','degree_id'=>23));
        //$data['employees']= $this->Gam3ia_omomia_model->get_table('employees', array('emp_type'=>1,'status'=>'96','degree_id!='=>32,'degree_id!='=>23));
        $data['employees']= $this->Gam3ia_omomia_model->get_all_employees('employees', array('emp_type'=>1,'employee_type'=>'1'));
        $data['vedios'] = $this->Gam3ia_omomia_model->get_id('md_bath_mobasher',0,0,'link');
        //yara13-6-2020
        $data['orders'] = $this->Gam3ia_omomia_model->get_esalat_orders();
        $data['all_pills_today'] = $this->Gam3ia_omomia_model->select_all_by_fr_all_pills_all();
        $data["result"] = $this->Gam3ia_omomia_model->display_publisher_data('',array());
        $data['current_vote']=$this->Gam3ia_omomia_model->ge_current_vote();
        if(!empty($data['current_vote'])){
            $data['check_voteing']=$this->Gam3ia_omomia_model->check_current_vote($data['current_vote']->id);
            $data['get_voteing']=$this->Gam3ia_omomia_model->get_voteing($data['current_vote']->id);
        }
        $data['memb_type'] = $this->Gam3ia_omomia_model->get_memb_type();
        if($data['memb_type'] == 2 ){
            $data['da3wa_magls_edara'] = $this->Gam3ia_omomia_model->get_da3wa_magls_edara();
        }
        $data['da3wat'] = $this->Gam3ia_omomia_model->get_action_da3wa();

        $this->load->model('Public_relations/website/library/Live_videos_model');
          $this->load->model('Public_relations/website/projects/Project_model');
        $data['vvv'] = $this->Live_videos_model->display_videos();
        $data['projects'] = $this->Project_model->display_projects(array('web_display'=>1));

         $data['downs'] = $this->Gam3ia_omomia_model->get_open_galesa_alert();
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'gam3ia_omomia/main';
        $this->load->view('gam3ia_omomia/index_gam3ia_omomia_without_sidebar', $data);

    }   

    
       public function reply_da3wa_magls_edara()
    {
        $this->Gam3ia_omomia_model->reply_da3wa_magls_edara();
        //  $this->messages('success', ' تمت  ارسال الرد  بنجاح');
        // redirect('gam3ia_omomia/Gam3ia_omomia', 'refresh');
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