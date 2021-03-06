<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_transformations_tagel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('human_resources_model/employee_forms/solaf/Transformation_tagel_model');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-dwarning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>!</strong> ' . $text . '.</div>');
        }
    }
    /************************************************************/
    public function index()
    {//human_resources/employee_forms/solaf/All_transformations_tagel
        // $this->test($_SESSION);
        $data['coming_records'] = $this->Transformation_tagel_model->select_from_hr_solaf_tagel(array('current_to_user_id' => $_SESSION['user_id']));
        $data["personal_data"] = $this->Transformation_tagel_model->get_user_data2(array('user_id' => $_SESSION['user_id']));
        $data['user_orders'] = $this->Transformation_tagel_model->select_from_hr_solaf_tagel(array('emp_id_fk' => $_SESSION['emp_code']));
        $data['title'] = 'طلبات السلف المحولة';
        //   $data['subview'] = 'admin/Human_resources/employee_forms/all_agazat/all_transformations/all_transformations';
        //   $this->load->view('admin_index', $data);
        if ($this->input->post('tab_id')) {
            $data['tab_id'] = array($this->input->post('tab_id'));
            // $this->test($data['tab_id']);
            $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations_tagel/all_transformations', $data);
        } else {
            $data['tab_id'] = array('mine_1', 'follow_1', 'comming_1');
            //$this->test($data['tab_id']);
            $data['title'] = 'طلبات السلف المحولة';
            $data['subview'] = 'admin/Human_resources/employee_forms/solaf/all_transformations_tagel/all_transformations';
            $this->load->view('admin_index', $data);
        }
    }
    // omnia
    public function Get_transformation_form()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');
        $data_load["talab_data"] = $this->Transformation_tagel_model->get_solaf_tagel_data(array('t_rkm' => $this->input->post('t_rkm')));
        $data_load["solaf_data"] = $this->Transformation_tagel_model->get_solaf_data(array('t_rkm' => $data_load["talab_data"]->solfa_rkm));
        if (!empty($data_load["talab_data"])) {
            $emp_where = array(1 => 401);
            if (key_exists($data_load["talab_data"]->level, $emp_where)) {
                $data_load["employees_data"] = $this->Transformation_tagel_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data_load["talab_data"]->level]));
            }
        }
        // $this->test($data_load);
        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations_tagel/transformation_form_load_page', $data_load);
    }
    public function save_Transform()
    {
        // $this->test($_POST);
        $this->Transformation_tagel_model->save_from_transfomation();
        if ($this->input->post('from_profile')) {
            //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations_tagel', 'refresh');
        }
    }
    public function Get_transformDetails()
    {
        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');
        $data_load["talab_data"] = $this->Transformation_tagel_model->get_solaf_tagel_data(array('t_rkm' => $this->input->post('t_rkm')));
        $data_load["solaf_data"] = $this->Transformation_tagel_model->get_solaf_data(array('t_rkm' => $this->input->post('solfa_rkm')));
        $data_load["level_1data"] = $this->Transformation_tagel_model->select_hr_all_transformations_history_by_level(array('tagel_rkm_fk' => $this->input->post('t_rkm'), 'level' => 1));
        $data_load["level_2data"] = $this->Transformation_tagel_model->select_hr_all_transformations_history_by_level(array('tagel_rkm_fk' => $this->input->post('t_rkm'), 'level' => 2));
        $this->load->view('admin/Human_resources/employee_forms/solaf/all_transformations_tagel/transformDetails_load_page', $data_load);
    }

}
