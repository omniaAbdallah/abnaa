<?php

class Sysat_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('Difined_model');
        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/egraat_settings/entdab/Sysat_model');
        

    }

    private function test($data = array())
    {
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


    public function addsysat_setting()//human_resources/egraat_settings/Sysat_setting/addsysat_setting
    {
  
        $data['title'] = "   إعداد السياسات  ";
        $data['table'] = $this->Sysat_model->get_records();
        $data['table_taklef'] = $this->Sysat_model->get_records_taklef();
        // $data['manager_category_in']= $this->Sysat_model->get_manager_cat();

        // $data['manager_category_out']= $this->Sysat_model->get_manager_cat();

        $data['table_badel_out'] = $this->Sysat_model->get_records_badel_out();
        $data['table_badel_in'] = $this->Sysat_model->get_records_badel_in();
        $data['manager_category']= $this->Sysat_model->get_manager_cat();



        $ids=$this->Sysat_model->getBadalat_id_by_emp('badel_entab_in');
        $id_disc=$this->Sysat_model->getBadalat_id_by_emp('badel_entab_out');
        $data['manager_category_in']=$this->Sysat_model->get_all_badalat($ids);
        $data['manager_category_out']=$this->Sysat_model->get_all_badalat($id_disc);


        //$this->test(   $data['table']);
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_sysat();
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
    
        $data['subview'] = 'admin/Human_resources/egraat_settings/entdab_v/sysat_setting';
        $this->load->view('admin_index', $data);
    }

    public function addsysat_taklef()//human_resources/Sysat_setting/addsysat_setting
    {
       
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_tklef();
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
    
       
    }

    public function add_badel_out()//human_resources/Sysat_setting/add_badel_out
    {
       
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_badel_out($id=0);
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
    
       
    }
    // update_badel_out
    public function update_badel_out($id)//human_resources/Sysat_setting/add_badel_out
    {
        
        $data['title'] = "   إعداد السياسات  ";
        $data['table'] = $this->Sysat_model->get_records();
        $data['table_taklef'] = $this->Sysat_model->get_records_taklef();
        $data['manager_category']= $this->Sysat_model->get_manager_cat();
        $data['record']= $this->Sysat_model->get_badel_out_by_id($id);
        
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_badel_out($id);
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
        $data['subview'] = 'admin/Human_resources/egraat_settings/entdab_v/sysat_setting';
        $this->load->view('admin_index', $data);
       
    }
    // delete_badel_out
    public function delete_badel_out($id)
    {
        $this->Sysat_model->delete_badel_out($id);
        $this->messages('success', 'تم الحذف بنجاح');
        redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
    }


    /////////////////////////////////////

    public function add_badel_in()//human_resources/Sysat_setting/add_badel_out
    {
       
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_badel_in($id=0);
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
    
       
    }
    // update_badel_out
    public function update_badel_in($id)//human_resources/Sysat_setting/add_badel_out
    {
      
        $data['title'] = "   إعداد السياسات  ";
        $data['table'] = $this->Sysat_model->get_records();
        $data['table_taklef'] = $this->Sysat_model->get_records_taklef();
        $data['manager_category']= $this->Sysat_model->get_manager_cat();
        $data['record_in']= $this->Sysat_model->get_badel_in_by_id($id);
        if(isset($_POST['add'])){
            $this->Sysat_model->insert_badel_in($id);
           $this->messages('success','تمت العملية بنجاح');
            redirect('human_resources/egraat_settings/Sysat_setting/addsysat_setting', 'refresh');
        }
        $data['subview'] = 'admin/Human_resources/egraat_settings/entdab_v/sysat_setting';
        $this->load->view('admin_index', $data);
       
    }
    // delete_badel_out
  


}


