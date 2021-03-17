<?php

class Da3wat_gam3ia_omomia extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia_model');
        $this->load->model("Difined_model");

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

    public function index()
    {//md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['galsa'] = $this->Da3wat_gam3ia_omomia_model->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $data['da3wa_rkmm'] = $this->Da3wat_gam3ia_omomia_model->get_da3wa_rkm();
        $data['all_da3wat'] = $this->Da3wat_gam3ia_omomia_model->get_all_da3wat();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);
//        $this->test($data['greetings']);

        if ($this->input->post('save')) {
         //  $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa();
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }

  /*  public function get_da3wat_Details()
    {
        $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($_POST['galsa_rkm']);
        $this->load->view('admin/md/da3wat_gam3ia_omomia/da3wa_gam3ia_details', $data);
    }
    */
    public function get_da3wat_Details()
    {
        $this->load->model('md/all_glasat_gam3ia_omomia/Glasat_model_gam3ia_omomia');
        $glsa_rkm = $_POST['galsa_rkm'];
        $data['glsa_data']  = $this->Glasat_model_gam3ia_omomia->get_by_rkm($glsa_rkm);
        $data['makn_en3qd_glsa'] = $this->Da3wat_gam3ia_omomia_model->get_by('md_settings', array('id_setting' => $data['glsa_data']->makn_en3qd), 'title_setting');

        $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($glsa_rkm);
        $this->load->view('admin/md/da3wat_gam3ia_omomia/da3wa_gam3ia_details', $data);
    }
  


  /*  public function getDetailsDiv()
    {
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $_POST['id']));
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
        $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetailsDiv', $data);
    }*/
      public function getDetailsDiv()
    {
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('da3wa_rkm' => $_POST['da3wa_rkm']));
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
        $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetailsDiv', $data);
    }

    public function delete_dawat($id)
    {
        $this->Da3wat_gam3ia_omomia_model->delete_dawa($id);
        $this->messages('success', 'تم الحذف بنجاح ');
        redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
    }

    public function edit($id)
    {

        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $id));
        if (!empty($data['result'])) {
            $data['mhawer'] = $this->Da3wat_gam3ia_omomia_model->get_mhawer($data['result']->galsa_rkm);
        }
//        $this->test($data);
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa($id);
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }


    public function reply_dawa()
    {
        $data['result'] = $this->Da3wat_gam3ia_omomia_model->getAllDetails(array('id' => $_POST['id']));
        $this->load->view('admin/md/da3wat_gam3ia_omomia/reply_da3wa_view', $data);
    }
    
    
       public function send_da3wa()
    {
        $this->Da3wat_gam3ia_omomia_model->send_da3wa();
        echo 1;
        return;
    }

     public function getDetails_a3da()
    {
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_members_da3wa();

        $this->load->view('admin/md/da3wat_gam3ia_omomia/getDetails_a3da', $data);
    }
    
      /*   public function galsa_send_da3wat($glsa_rkm = 0)
    {//md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia/galsa_send_da3wat
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['galsa'] = $this->Da3wat_gam3ia_omomia_model->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $data['da3wa_rkmm'] = $this->Da3wat_gam3ia_omomia_model->get_da3wa_rkm();
        $data['all_da3wat'] = $this->Da3wat_gam3ia_omomia_model->get_all_da3wat();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);
//        $this->test($data['greetings']);

        if ($this->input->post('save')) {
//            $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa();
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }else if (!empty($glsa_rkm) && $glsa_rkm !=0){
            $this->load->model('md/all_glasat_gam3ia_omomia/Glasat_model_gam3ia_omomia');
            $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($glsa_rkm);
            $data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($glsa_rkm);
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }*/
    
    
    public function galsa_send_da3wat($glsa_rkm = 0)
    {//md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia/galsa_send_da3wat
        $data['all_members'] = $this->Da3wat_gam3ia_omomia_model->get_all_gam3ia_omomia_members();
        $data['galsa'] = $this->Da3wat_gam3ia_omomia_model->get_by('md_all_glasat_gam3ia_omomia', array('glsa_finshed' => 0), 'glsa_rkm');
        $data['da3wa_rkmm'] = $this->Da3wat_gam3ia_omomia_model->get_da3wa_rkm();
        $data['all_da3wat'] = $this->Da3wat_gam3ia_omomia_model->get_all_da3wat();
        $data['greetings'] = $this->Da3wat_gam3ia_omomia_model->GetFromFr_settings(9);
//        $this->test($data['greetings']);

        if ($this->input->post('save')) {
          $this->test($_POST);
            $this->Da3wat_gam3ia_omomia_model->insert_dawa();
            $this->messages('success', 'تم إضافة بنجاح ');
            redirect('md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia', 'refresh');
        }else if (!empty($glsa_rkm) && $glsa_rkm !=0){
            $this->load->model('md/all_glasat_gam3ia_omomia/Glasat_model_gam3ia_omomia');
            $data['galsa_member']=$this->Glasat_model_gam3ia_omomia->get_galsa_member($glsa_rkm);
            $data['last_magls_update']=$this->Glasat_model_gam3ia_omomia->get_by_rkm($glsa_rkm);
            $data['all_places'] = $this->Glasat_model_gam3ia_omomia->get_by_id('md_settings',array('type'=>5));
        }
        $data['title'] = 'دعوة انعقاد جمعية عمومية';
        $data['subview'] = 'admin/md/da3wat_gam3ia_omomia/da3wat_gam3ia_omomia_view';
        $this->load->view('admin_index', $data);
    }
    
}