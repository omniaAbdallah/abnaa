<?php


class Profile_parts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('maham_mowazf_model/basic_data/Basic_data_model');
    }

    function get_notes()
    {
        $this->load->model('all_secretary_models/archive_m/notes/Notes_model');
        $data['notes'] = $this->Notes_model->get_events();
        echo json_encode($data);

    }

    function get_employees()
    {

        $edara_id = $this->input->post('edara_id');
        if (isset($edara_id) || $edara_id != null || $edara_id != 0) {
            $data["my_employee_edara"] = $this->Basic_data_model->select_my_employee_edara($edara_id);
        } else {
            $data["my_employee_edara"] = '';
        }
        $data["all_employees"] = $this->Basic_data_model->select_all_employee();
        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/employe_view', $data);

    }

    function get_decuments()
    {

        $degree_id = $this->input->post('degree_id');
        $data['system'] = $this->Basic_data_model->get_by_options('pr_system', array('type' => 1));
        $data['sysa'] = $this->Basic_data_model->get_by_options('pr_system', array('type' => 2));
        if (!empty($degree_id)) {
            $data['mahma_wazefya'] = $this->Basic_data_model->get_by_options('hr_egraat_setting_details', array('status' => 1, 'job_title_id_fk' => $degree_id));
        }
        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/decuments_view', $data);

    }

    function get_all_tlabat()
    {
        $data['count_all_talabat'] = $this->Basic_data_model->count_all_talabat();
        $data['count_all_accept'] = $this->Basic_data_model->count_all_accept();
        $data['count_all_refuce'] = $this->Basic_data_model->count_all_refuce();

        echo json_encode($data);
    }

    function get_emp_methali(){
        $data['emp_methali']=$this->Basic_data_model->get_emp_methali();
        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/emp_methali_view', $data);
    }
    function all_holidays(){

        $data['all_holidays']=$this->Basic_data_model->all_holidays();
      /*  echo '<pre>';
        print_r($data['all_holidays']);
        die;*/
        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/all_holidays_views', $data);
    }
    
    
        function get_all_leave(){
 
        $data['all_agaza'] = $this->Basic_data_model->all_agaza();
    //  echo '<pre>';
    //     print_r($data['all_agaza']);
    //     die;
        $data['all_ezn'] = $this->Basic_data_model->all_ezn();
        $data['all_mandate'] = $this->Basic_data_model->all_mandate();
        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/all_leave_view', $data);
    }
}