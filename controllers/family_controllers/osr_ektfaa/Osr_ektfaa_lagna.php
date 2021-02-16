<?php
class Osr_ektfaa_lagna extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('familys_models/osr_ektfaa_m/Osr_ektfaa_lagna_m');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function message($type, $text, $method = false)
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
    public function index()//family_controllers/osr_ektfaa/Osr_ektfaa_lagna
    {
        $data['title'] = 'إضافة  لجنة إكتفاء';
        $data['job_in'] = $this->Osr_ektfaa_lagna_m->get_job_in_lagna_id();
        $data['emp_in'] = $this->Osr_ektfaa_lagna_m->get_emp_in_lagna_id();
        $data['records'] = $this->Osr_ektfaa_lagna_m->select_all();
        $data['employees'] = $this->Osr_ektfaa_lagna_m->get_table('employees', array());
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/Osr_ektfaa_lagna/add_lagna';
        $this->load->view('admin_index', $data);
    }
    public function insert()
    {
        if ($this->input->post('save') === 'save') {
            $this->Osr_ektfaa_lagna_m->insert();
        }
        $this->message('success', 'تمت الاضافة ');
        redirect('family_controllers/osr_ektfaa/Osr_ektfaa_lagna', 'refresh');
    }
    public function Delete($rkm)
    {
        $this->Osr_ektfaa_lagna_m->Delete($rkm);
        $this->message('success', 'تمت الحذف ');
        redirect('family_controllers/osr_ektfaa/Osr_ektfaa_lagna', 'refresh');
    }
    public function get_sidebar_data()
    {
        $id = $this->input->post('id');
        $data['result'] = $this->Osr_ektfaa_lagna_m->get_table_by_id('employees', array('emp_code' => $id));
        $this->load->view('admin/familys_views/osr_ektfaa_v/Osr_ektfaa_lagna/person_data', $data);
    }
    public function change_status()
    {
        $id = $this->input->post('id');
        $this->Osr_ektfaa_lagna_m->change_status($id);
    }
} // END CLASS 