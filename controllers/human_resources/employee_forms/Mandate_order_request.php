<?php
class Mandate_order_request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }
    
    
    
        public function GetTransferPage() {

        $id = $_POST['id'];
        $data['eznInfo'] = $this->Mandate_order_model->getEntdabById_new($id);
        $data['hr_emp_mokhtas'] = $this->Mandate_order_model->get_all_emps_egraat(402);
        $data['mohasebs'] = $this->Mandate_order_model->get_all_emps_egraat(502);
        $data['moder_malis'] = $this->Mandate_order_model->get_all_emps_egraat(501);
        $data['moder_3ams'] = $this->Mandate_order_model->get_all_emps_egraat(101);
        $data['amin_sandoks'] = $this->Mandate_order_model->get_all_emps_egraat(503);
        
         $data['modeer_hr'] = $this->Mandate_order_model->get_all_emps_egraat(401);

     /*     $data['one_data'] = $this->Ezn_sarf_model->get_attach($id);
           $data['ezn_history'] = $this->Ezn_sarf_model->get_all_ozonat_history($id); 
*/
 $data['talab_data'] = $this->Mandate_order_model->get_talab_data($id);
$data['sss']='sss';
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/GetProcedureActionPage', $data);

    }
    
        public function process_transform_mokhtas(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_mokhtas($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }


        public function process_to_mokadem_talab(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_mokadem_talab($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }
    
            public function process_transform_emp(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_emp_talab($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
    

            public function process_action_end_emp(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_end_emp($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
    
            public function process_transform_moder_mobasher(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_moder_mobasher($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
    
    
    
               public function process_transform_moder_hr(){
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Mandate_order_model->add_action_moder_hr($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Mandate_order_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Mandate_order_model->get_emp($post['to_person_id'], 'employee');
    }

    
    }
    ?>