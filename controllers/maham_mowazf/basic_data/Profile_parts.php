<?phpclass Profile_parts extends CI_Controller{    public function __construct()    {        parent::__construct();        $this->load->model('maham_mowazf_model/basic_data/Basic_data_model');    }    function get_notes()    {        $this->load->model('all_secretary_models/archive_m/notes/Notes_model');        $data['notes'] = $this->Notes_model->get_events();        echo json_encode($data);    }    function get_employees()    {        $edara_id = $this->input->post('edara_id');        if (isset($edara_id) || $edara_id != null || $edara_id != 0) {            $data["my_employee_edara"] = $this->Basic_data_model->select_my_employee_edara($edara_id);        } else {            $data["my_employee_edara"] = '';        }        $data["all_employees"] = $this->Basic_data_model->select_all_employee();        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/employe_view', $data);    }    function get_decuments()    {        $degree_id = $this->input->post('degree_id');        $data['system'] = $this->Basic_data_model->get_by_options('pr_system', array('type' => 1));        $data['sysa'] = $this->Basic_data_model->get_by_options('pr_system', array('type' => 2));        if (!empty($degree_id)) {            $data['mahma_wazefya'] = $this->Basic_data_model->get_by_options('hr_egraat_setting_details', array('status' => 1, 'job_title_id_fk' => $degree_id));        }        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/decuments_view', $data);    }    /*26-4-21-om*/    function get_all_tlabat()    {        $data['count_all_talabat'] = $this->Basic_data_model->count_all_talabat();        $data['count_all_accept'] = $this->Basic_data_model->count_all_accept();        $data['count_all_refuce'] = $this->Basic_data_model->count_all_refuce();        $data['count_all_ta3mem'] = $this->Basic_data_model->count_all_ta3mem();        $data['count_all_ta3mem_msg'] = $this->Basic_data_model->count_all_ta3mem_msg();        $data['count_all_ta3mem_adv'] = $this->Basic_data_model->count_all_ta3mem_adv();        echo json_encode($data);    }    function get_emp_methali()    {        $data['emp_methali'] = $this->Basic_data_model->get_emp_methali();        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/emp_methali_view', $data);    }    function get_new_emp()    {        $data['new_emp'] = $this->Basic_data_model->get_new_emp();        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/new_emp_view', $data);    }    function all_holidays()    {        $data['all_holidays'] = $this->Basic_data_model->all_holidays();        /*  echo '<pre>';            print_r($data['all_holidays']);            die;*/        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/all_holidays_views', $data);    }    function get_all_leave()    {        $data['all_agaza'] = $this->Basic_data_model->all_agaza();        //  echo '<pre>';        //     print_r($data['all_agaza']);        //     die;        $data['all_ezn'] = $this->Basic_data_model->all_ezn();        $data['all_mandate'] = $this->Basic_data_model->all_mandate();        $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/all_leave_view', $data);    }    public function get_ratb()    {        $this->load->model('human_resources_model/Employee_model');        $this->load->model('human_resources_model/Finance_employee_model');        $empCode = $_SESSION['emp_code'];        $data["personal_data"] = $this->Employee_model->get_one_employee($empCode);        $data['allData'] = $this->Finance_employee_model->getAllData_n($empCode)[0];        //  $this->test($data['allData']);        $data['employee'] = $this->Finance_employee_model->getEmpData($empCode);        $data['badalat'] = $this->Finance_employee_model->getBadalat(1);        $data['discounts'] = $this->Finance_employee_model->getBadalat(2);        $month_n = date('m');        $data['all_mosayer_data'] = $this->Finance_employee_model->get_all_mosayer_details_for_emp($empCode, $month_n);        $data['month_n'] = date('m');        $data['title'] = 'بيان مفردات راتب شهر ';        $data['subview'] = 'admin/maham_mowazf_view/basic_data/profile_parts/ratb_view';        $this->load->view($data['subview'], $data);    }    public function get_tafsel_ratb()    {        $this->load->model('human_resources_model/Finance_employee_model');        $empCode = $_SESSION['emp_code'];        $data['employee'] = $this->Finance_employee_model->getEmpData($empCode);        $data['all_mosayer_data'] = $this->Finance_employee_model->get_all_mosayer_details_for_emp($empCode);        $data['title'] = '';        $data['subview'] = 'admin/maham_mowazf_view/basic_data/profile_parts/tafselratb_view';        $this->load->view($data['subview'], $data);    }    public function get_all_solaf()    {        $this->load->model('human_resources_model/employee_forms/solaf/Solaf_requests_model');        $empCode = $_SESSION['emp_code'];        $real_emp_ccode = $this->Solaf_requests_model->getemp_code($empCode);        //$data['items'] = $this->Solaf_requests_model->get_all_solfa_cond($empCode);        $data['items'] = $this->Solaf_requests_model->get_all_solfa_new_emps($empCode);        $data['quests'] = $this->Solaf_requests_model->get_all_aksat($real_emp_ccode);        $data['title'] = 'بيان السلف';        $data['subview'] = 'admin/maham_mowazf_view/basic_data/profile_parts/all_solaf_v';        $this->load->view($data['subview'], $data);    }}