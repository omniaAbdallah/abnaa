<?php
/*http://localhost/ABNAAv1/human_resources/employee_forms/mandate_order/Mandate_transformation/get_orders*/
class Mandate_transformation extends MY_Controller
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
        $this->load->model('human_resources_model/employee_forms/mandate_orders/Transformation_mandate_model');

        $this->load->model('system_management/Groups');
        $this->main_groups = $this->Groups->main_fetch_group();
        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->model('human_resources_model/Always_model');
    }

    public function index()//human_resources/employee_forms/mandate_orders/Transformation
    {
        $data['title'] = "تحويلات الأنتدابات";
        $data['valu'] = 1;
        $arr = array('current_from_user_id' => $_SESSION['user_id']);
        $data['records'] = $this->Transformation_mandate_model->my_orders('hr_mandate_orders', $arr);
        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/all_transformations/transformation_view';
        $this->load->view('admin_index', $data);
    }

    public function get_orders()
    {

        $valu = $this->input->post('valu');
        //$this->test($valu);
        if ($valu == 1) {
            $arr = array('current_from_user_id' => $_SESSION['user_id']);
        }else if ($valu == 2) {
            $arr = array('current_from_user_id' => $_SESSION['user_id']);
        }else if ($valu == 3) {
            $arr = array('current_to_user_id' => $_SESSION['user_id']);
        }
        $data['valu'] = $valu;
        $data['records'] = $this->Transformation_mandate_model->my_orders('hr_mandate_orders', $arr);
         //$this->test($data['records']);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/load_page', $data);

    }

    public function changer_level()
    {
        //$this->test($_POST);
        $valu = $this->input->post('valu');
        $this->Transformation_mandate_model->change_approved($valu);
        $this->Transformation_mandate_model->insert_transformation_level2($valu);
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function get_modal()
    {
        $level = $this->input->post('level');
        $data['level'] = $level;
        $data['mess'] = $this->Transformation_mandate_model->get_from_setting($level);
        $id = $this->input->post('val_id');
        // $data['employee']=$this->Transformation_mandate_model->get_all_employees('employees');
        // $data['admin']=$this->Transformation_mandate_model->select_by();
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $data['row'] = $this->Mandate_order_model->get_by_id( $id);
        if (!empty($data['row'])) {
            $emp_where = array(0 => 101);
            if (key_exists($data['row']->level, $emp_where)) {
                $data["employee"] = $this->Transformation_mandate_model->get_employees_by_level(array('job_title_code_fk' => $emp_where[$data['row']->level]));

            }
        }
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/level_page', $data);


    }


    public function make_suspend()
    {
// echo "<pre>";
// print_r($_POST);die;
        $this->Transformation_mandate_model->change_suspend();
        $this->Transformation_mandate_model->insert_transformation();
    }

    /*public function make_suspend_refused()
    {
        // echo "<pre>";
        // print_r($_POST);die;
        $this->Transformation_mandate_model->change_suspend();
        $this->Transformation_mandate_model->insert_transformation();
    }*/

    public function get_employee()
    {
        $valu = $this->input->post('valu');
        $data['emps'] = $this->Transformation_mandate_model->get_emps_by_edara('employees', $valu);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/get_emps', $data);
    }

    public function get_modal_details()
    {
        $id = $this->input->post('valu');
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $data['result']= $this->Mandate_order_model->get_by_id( $id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_details', $data);
    }



    public function get_mandate_follow()
    {
        $rkm_talab = $this->input->post('valu');
        $id = $this->input->post('id');
        $arr = array('mandate_rkm_fk' => $rkm_talab);
//        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
//        $data['row']= $this->Mandate_order_model->get_by_id( $id);
        //$data['row'] = $this->Transformation_mandate_model->get_by_id('hr_mandate_orders', $id);
        $data['records'] = $this->Transformation_mandate_model->my_orders_history('hr_mandate_orders_history', $arr);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/get_mandate_follow', $data);
    }

    public function get_emp_data()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('emp_id');
        if ($this->input->post('valu')) {
            if ($valu == 2) {
                $data['row'] = $this->Transformation_mandate_model->get_moder_final_data($id);
            } else {
                $data['row'] = $this->Transformation_mandate_model->get_emp_data($id);
            }
        }else{
            $data['row'] = $this->Transformation_mandate_model->get_moder_final_data($id);
        }
        //  $this->test( $data['row']);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/person_profile', $data);

    }

    public function get_modal_details_steps()  //human_resources/employee_forms/mandate_orders/Transformation
    {
        $id = $this->input->post('valu');
//        $data['row'] = $this->Transformation_mandate_model->get_by_id('hr_mandate_orders', $id);
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
        $data['result']= $this->Mandate_order_model->get_by_id( $id);
        $data['records'] = $this->Transformation_mandate_model->get_array_by_id('hr_mandate_orders_history', $id);

        $this->load->view('admin/Human_resources/employee_forms/mandate_order/all_transformations/get_mandate_details_steps', $data);
    }
}
