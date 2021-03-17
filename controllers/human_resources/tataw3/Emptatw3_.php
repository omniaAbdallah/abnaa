<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emptatw3 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('human_resources_model/tataw3/Tataw3_m');
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
    }
    
    
    
    public function add_talab(){ //Emptatw3/add_talab
        
    
          //  $data['mobdrat']= $this->Foras_model->get_from_settings(401);
      //  $data['cities']= $this->Foras_model->get_cities();
        $data['title'] = "  طلب احتياج فرصة تطوعية ";
        
    $data['subview'] = 'admin/Human_resources/tataw3_v/emps/talab.php';
    $this->load->view('admin_index', $data);  
    }
    
    
    }