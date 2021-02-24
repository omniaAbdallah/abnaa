<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mandate_orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('human_resources_model/employee_forms/Mandate_order_model');
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
    private function test_r($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    public function add_option()
    {
        $this->Mandate_order_model->insert_record($this->input->post('valu'));
    }
    public function delete_mandate_order($id, $from = false)
    {
        $this->Mandate_order_model->delete_mandate_order($id);
        //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
        $this->message('success', 'تم حذف ');
        if (!empty($from) && ($from == 1)) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
        }
    }
    public function getConnection_emp()
    {
        $all_Emps = $this->Mandate_order_model->get_all_emp();
        //  $all_Emps = $this->Gezaat_emp_model->get_all_emp();
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
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara_n . '"
                        data-edara_id="' . $row_emp->edara_id . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_id="' . $row_emp->degree_id . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->qsm_id . '"
                        data-cat_manager_id_fk="' . $row_emp->cat_manager_id_fk . '"
                        data-manger="' . $row_emp->manger . '"
                        data-card_num="' . $row_emp->card_num . '"
                        data-times="0" />',
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
    public function load_details()
    {
        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Mandate_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_details', $data);
    }
    public function Print_order()
    {
     //   $row_id = $this->input->post('row_id');
        $row_id = 1;
        $data['result'] = $this->Mandate_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/print_order', $data);
    }
    public function load_geha()
    {
        $data["geha"] = $this->Mandate_order_model->select_search('hr_mandate_gehat');
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_geha', $data);
    }
    public function add_geha_type()
    {
        $this->Mandate_order_model->add_geha_type();
    }
    public function getById_geha_type()
    {
        $id = $this->input->post('id');
        $reason = $this->Mandate_order_model->getById_geha_type($id);
        echo json_encode($reason);
    }
    public function update_geha_type()
    {
        $id = $this->input->post('id');
        $this->Mandate_order_model->update_geha_type($id);
    }
    public function delete_geha_type()
    {
        $id = $this->input->post('id');
        $this->Mandate_order_model->delete_geha_type($id);
    }
    public function load_morsel()
    {
        $id = $this->input->post('id');
        $data["geha"] = $this->Mandate_order_model->select_search_key('hr_mandate_gehat_ms2olen', 'geha_id_fk', $id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_mandate', $data);
    }
    public function add_ms2ol(){
        $geha_id = $this->input->post('geha_id');
        $this->Mandate_order_model->add_mostlm($geha_id);
        $data["geha"] = $this->Mandate_order_model->select_search_key('hr_mandate_gehat_ms2olen', 'geha_id_fk', $geha_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_mandate', $data);
    }
    public function getById_mostlm()
    {
        $id = $this->input->post('id');
        $mostlm = $this->Mandate_order_model->getById_mostlm($id);
        echo json_encode($mostlm);
    }
    public function update_ms2ol()
    {
        $geha_id = $this->input->post('geha_id');
        $row_id = $this->input->post('row_id');
        $this->Mandate_order_model->update_mostlm($geha_id, $row_id);
        $data["geha"] = $this->Mandate_order_model->select_search_key('hr_mandate_gehat_ms2olen', 'geha_id_fk', $geha_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_mandate', $data);
    }
    public function delete_mostlm()
    {
        $row_id = $this->input->post('row_id');
        $geha_id = $this->input->post('geha_id');
        $this->Mandate_order_model->delete_mostlm($row_id);
        $data["geha"] = $this->Mandate_order_model->select_search_key('hr_mandate_gehat_ms2olen', 'geha_id_fk', $geha_id);
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_mandate', $data);
    }
    public function add_setting()
    {
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
        $this->Mandate_order_model->add_setting($type, $type_name);
        $data['result'] = $this->Mandate_order_model->get_setting($type, $type_name);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_setting', $data);
    }
    public function load_settigs()
    {
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
        $data['result'] = $this->Mandate_order_model->get_setting($type, $type_name);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_setting', $data);
    }
    public function delete_setting()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name');
        $this->Mandate_order_model->delete_setting($id);
        $data['result'] = $this->Mandate_order_model->get_setting($type, $type_name);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/load_setting', $data);
    }
    public function get_setting_by_id()
    {
        $id = $this->input->post('row_id');
        $result = $this->Mandate_order_model->get_setting_by_id($id);
        echo json_encode($result);
    }
    /*10-11-20-om*/
    function get_value_badel()
    {
        $value = $this->Mandate_order_model->get_value_badel();
/*        print_r($this->db->last_query());*/
        echo json_encode(array('value'=>$value));
    }
    function update_seen_entdab()
    {
        $this->Mandate_order_model->update_seen_entdab();
    }
/////////////////yara19-11-2020//////////////
//old
public function index()
{
    $this->load->model('human_resources_model/Employee_print');
    if ($this->input->post('add')) {
        $this->Mandate_order_model->insert_order();
        //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
        $this->messages('success', 'إضافة  انتداب بنجاح');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
        }
    }
    ///
    $data['amaken']=$this->Mandate_order_model->get_all_setting();
    ////
    $data['title'] = "اضافه انتداب";
    $data['last_id'] = $this->Mandate_order_model->get_last();
    $data['records'] = $this->Mandate_order_model->get_from_hr_entdab();
    if ($this->input->post('from_profile')) {
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/mandate_order', $data);
    } else {
        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $this->load->view('admin_index', $data);
    }
}
public function edit_Mandate_order($id = false)
{
    if ($this->input->post('id')) {
        $id = $this->input->post('id');
    }
    $data['row'] = $this->Mandate_order_model->get_by_id($id);
    $data['emp_data'] = $this->Mandate_order_model->get_emp_data($data['row']->emp_id_fk);
//        $this->test($data);
    $data['last_id'] = $this->Mandate_order_model->get_last();
    if ($this->input->post('add')) {
        $this->Mandate_order_model->edit_order($id);
        //  redirect('human_resources/employee_forms/Mandate_orders','refresh');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/Mandate_orders', 'refresh');
        }
    }
    $data['amaken']=$this->Mandate_order_model->get_all_setting();
   $data['title'] = "تعديل انتداب";
    if ($this->input->post('from_profile')) {
        $this->load->view('admin/Human_resources/employee_forms/mandate_order/mandate_order', $data);
    } else {
        $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/mandate_order';
        $this->load->view('admin_index', $data);
    }
}
//new_funcccc
public function setting_amken_entab($id=0)//human_resources/employee_forms/Mandate_orders/setting_amken_entab
{
    if ($this->input->post('add')) {
        $this->Mandate_order_model->insert_stetting($id);
        $this->messages('success','تم إضافة بنجاح');
        redirect('human_resources/employee_forms/Mandate_orders/setting_amken_entab', 'refresh');
    }
      $data['records']=$this->Mandate_order_model->get_all_setting();
    if($id != 0){
        $data['result']=$this->Mandate_order_model->get_one_setting($id);
        $data['records']= '';
    }
    $data['title'] = " أعدادت  اماكن الانتداب";
  //  $data['tittle'] = " أعدادت  اماكن الانتداب";
    $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/add_setting_amken_entab';
    $this->load->view('admin_index', $data);
}
public function delete_settings($id){
    $this->Mandate_order_model->delete_setting_amaken($id);
    redirect('human_resources/employee_forms/Mandate_orders/setting_amken_entab', 'refresh');
}


/*************************************************************/
  public function all_talabat_entdab(){
    $this->load->model('Model_family_cashing');
    $data['records'] = $this->Mandate_order_model->get_all_talabat_transformed();
        $data['manager_name'] = $this->Model_family_cashing->get_magles_edara(1);
        $data['naeb_name'] = $this->Model_family_cashing->get_magles_edara(2);
        $data['amin_name'] = $this->Model_family_cashing->get_magles_edara(3);

     $data['title'] = 'طلبات الإنتداب المحولة  ';
    $data['subview'] = 'admin/Human_resources/employee_forms/mandate_order/all_talabat_entdab_transformed';
    $this->load->view('admin_index', $data);  
 }

}