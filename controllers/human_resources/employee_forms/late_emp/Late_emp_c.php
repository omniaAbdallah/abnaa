<?php
class Late_emp_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model("human_resources_model/employee_forms/late_emp_models/Late_emp_model");
    }
//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//-------------------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
//-----------------------------------------
    public function message($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }

    public function index(){     // human_resources/employee_forms/late_emp/Late_emp_c
        $data['records'] =$this->Late_emp_model->select_all();
       
        $data['title']='    ادارة التاخيرات';
        //$data['emp_data'] = $this->Late_emp_model->select_depart();
         $data['emp_data'] = $this->Late_emp_model->select_all_emp();
        $data['subview'] = 'admin/Human_resources/employee_forms/late_emp_v/late_emp';
        $this->load->view('admin_index', $data);
    }
    public function update_gezaa($id){     // human_resources/employee_forms/late_emp/Late_emp_c
    
        $data['title']='    ادارة التاخيرات';
    $data['result']=$this->Late_emp_model->select_by_id($id);
         $data['emp_data'] = $this->Late_emp_model->select_all_emp();
        $data['subview'] = 'admin/Human_resources/employee_forms/late_emp_v/late_emp';
        $this->load->view('admin_index', $data);
    }
    public function getConnection_emp()
    {
         $all_Emps = $this->Late_emp_model->get_all_emp();
      //  $all_Emps = $this->Late_emp_model->get_all_emp();
      //    $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
                if (empty($row_emp->edara)) {
                    $row_emp->edara = 'غير محدد ';
                }
                if (empty($row_emp->qsm)) {
                    $row_emp->qsm = 'غير محدد ';
                }
                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this);get_pop_detailes(this);"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara_n . '"
                        data-edara_id="' . $row_emp->edara_id . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_id="' . $row_emp->degree_id . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->qsm_id . '"
                        data-start_work_date="' . $row_emp->start_work_date_m . '"
                        data-card_num="' . $row_emp->card_num . '" />',
                        $row_emp->emp_code,
                    $row_emp->employee,
                    $row_emp->edara_n,
                    $row_emp->qsm_n,
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }
    public function insert(){
        if( $this->input->post('save') ==='save'){
            $this->Late_emp_model->insert();
        }
        $this->message('success','تمت الاضافة ');
        redirect('human_resources/employee_forms/late_emp/Late_emp_c','refresh');
    }
    public function update($id){
        if( $this->input->post('save') ==='save'){
            $this->Late_emp_model->update($id);
        }
        $this->message('success','تمت الاضافة ');
        redirect('human_resources/employee_forms/late_emp/Late_emp_c','refresh');
    }
    public function Delete_namozeg($rkm){
        $this->Late_emp_model->Delete($rkm);
        redirect('human_resources/employee_forms/late_emp/Late_emp_c','refresh');
        $this->message('success','تمت الحذف ');
    }
    public function change_status()
    {
     $valu = $this->input->post('valu');
     $id = $this->input->post('id');
     $data['status'] = $this->Late_emp_model->change_status($valu, $id);
     echo json_encode($data);
    }

    //yara20-8-2020
  /*  function get_pop_detailes()
    {
    
        $emp_id = $this->input->post('emp_id');
        $data['mosayer_data'] = $this->Late_emp_model->get_all_mosayer_details_by_emp_id($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/late_emp_v/load_pop_detailes_view', $data);
    
    }*/
    
        function get_pop_detailes()
    {
        $emp_id = $this->input->post('emp_id');
        $data['mosayer_data'] = $this->Late_emp_model->get_all_mosayer_details_by_emp_id($emp_id);
        $data['mosayer_sysat'] = $this->Late_emp_model->get_mosayer_sysat('takher');
        $this->load->view('admin/Human_resources/employee_forms/late_emp_v/load_pop_detailes_view', $data);

    }
    
    
} // END CLASS