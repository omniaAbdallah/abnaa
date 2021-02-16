<?php

class Emp_banks_c extends MY_Controller
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
        /*************************************************************/
       
        $this->load->model('human_resources_model/employee_forms/emp_banks/Emp_banks_model');
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


////yara_start_.////
private function upload_image_bank($file_name, $folder = '')
{
  if (!empty($folder)) {
      $config['upload_path'] = 'uploads/' . $folder;
  } else {
      $config['upload_path'] = 'uploads/images';
  }
  $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
  $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
  $config['encrypt_name'] = true;
  $this->load->library('upload', $config);
  if (!$this->upload->do_upload($file_name)) {
      return false;
  } else {
      $datafile = $this->upload->data();
      return $datafile['file_name'];
  }
}
public function change_bank()//human_resources/employee_forms/emp_banks/Emp_banks_c/change_bank
{
    
$empCode=$_SESSION['emp_code'];
$data['last_record'] = $this->Emp_banks_model->get_last_record($empCode);
$data['employee'] = $this->Emp_banks_model->getEmpData($empCode);
$data['banks'] = $this->Emp_banks_model->getBanks();
$data['bank_id']=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode));
if(!empty($data['bank_id']))
{
    $bank_id=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode))->id;
$data['allData'] = $this->Emp_banks_model->getEmpBankby_id($bank_id);
}
if($_SESSION['role_id_fk']==1)
{
    $data['allData_added']=$this->Emp_banks_model->get_by_options('hr_emp_hesabat_banks_orders',array(''));
   // $this->test($data['allData_added']);
}
else{
$data['allData_added']=$this->Emp_banks_model->get_by_options('hr_emp_hesabat_banks_orders',array('emp_id' =>$empCode));
}
//$this->test($data['allData_added']);
$data['title']="طلب تغيير  الحساب البنكي";
$data['subview'] = 'admin/Human_resources/employee_forms/emp_banks/change_banks';
$this->load->view('admin_index',$data); 
}

public function change_bank_form()//human_resources/employee_forms/emp_banks/Emp_banks_c/change_bank
{
    
$empCode=$_SESSION['emp_code'];
$data['last_record'] = $this->Emp_banks_model->get_last_record($empCode);
$data['employee'] = $this->Emp_banks_model->getEmpData($empCode);
$data['banks'] = $this->Emp_banks_model->getBanks();
$data['bank_id']=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode));
if(!empty($data['bank_id']))
{
    $bank_id=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode))->id;
$data['allData'] = $this->Emp_banks_model->getEmpBankby_id($bank_id);
}
//$this->test($data['allData_added']);
$this->load->view('admin/Human_resources/employee_forms/emp_banks/change_banks',$data); 
}

// get_bank_form
public function get_bank_form()//human_resources/employee_forms/emp_banks/Emp_banks_c/change_bank
{
   
$empCode=$this->input->post('emp_id');
$data['last_record'] = $this->Emp_banks_model->get_last_record($empCode);
$data['employee'] = $this->Emp_banks_model->getEmpData($empCode);
$data['banks'] = $this->Emp_banks_model->getBanks();
$data['bank_id']=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode));
if(!empty($data['bank_id']))
{
    $bank_id=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode))->id;
$data['allData'] = $this->Emp_banks_model->getEmpBankby_id($bank_id);
}
//$this->test($data['allData_added']);
$this->load->view('admin/Human_resources/employee_forms/emp_banks/load_data',$data); 
}
public function change_banks_employee()
{
  
$new_img = 'userfile';
$img_file = $this->upload_image_bank($new_img, 'human_resources/emp_banks');
$emp_id=$this->input->post('emp_id'); 
$this->Emp_banks_model->change_bank_account_emp($img_file);
} 

public function edite_banks_employee()
{
 
$new_img = 'userfile';
$img_file = $this->upload_image_bank($new_img, 'human_resources/emp_banks');
$emp_id=$this->input->post('emp_id'); 
$this->Emp_banks_model->edite_bank_account_emp($img_file);
} 
public function load_details_banks()
{
    
    $empCode=$this->input->post('emp_id');
  //  $this->test( $empCode);
    if($_SESSION['role_id_fk']==1)
    {
        $data['allData_added']=$this->Emp_banks_model->get_by_options('hr_emp_hesabat_banks_orders',array());
    }
    else{
    $data['allData_added']=$this->Emp_banks_model->get_by_options('hr_emp_hesabat_banks_orders',array('emp_id' =>$empCode));}
    $this->load->view('admin/Human_resources/employee_forms/emp_banks/load_details_banks',$data);
}
public function edite_bank()
{
    
$id=$this->input->post('id');
$data['banks'] = $this->Emp_banks_model->getBanks();
$data['allData'] =$this->Emp_banks_model->get_by_options_by_id('hr_emp_hesabat_banks_orders',array('id' =>$id));
$this->load->view('admin/Human_resources/employee_forms/emp_banks/edite_banks',$data);
}
public function deleteFinanceEmp()
{
    
    $id=$this->input->post('id');
    $this->Emp_banks_model->delete_bank_talb($id);
}

public function getConnection_emp()
{
    $all_Emps = $this->Emp_banks_model->get_all_emp();
     //     $this->test($all_Emps);
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
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->department . '"
                         />',
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
// send_all
public function send_all()
    {

        $id=$this->input->post('id');
        $this->Emp_banks_model->send_all($id);
        $allData_added=$this->Emp_banks_model->get_by_options('hr_emp_hesabat_banks_orders',array('id' =>$id));

/////////////////////////////////////////////////
$empCode=$this->input->post('emp_id');
$bank_id=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode));
if(!empty($bank_id))
{
$bank_id=$this->Emp_banks_model->get_by_options_by_id('bank_employes_details',array('emp_code' =>$empCode))->id;
$allData = $this->Emp_banks_model->getEmpBankby_id($bank_id);
}
       // $this->test($allData_added[0]->new_bank_id_fk);
       // $this->test($allData->bank_id_fk);
       
        if(!empty($allData)&&!empty($allData_added))
        {
        $this->Emp_banks_model->update_main_tabel($allData_added[0]->new_bank_id_fk,$allData_added[0]->new_bank_account_num,$allData_added[0]->new_bank_image,
        $allData->bank_id_fk,$allData->bank_account_num,$allData->bank_id_fk_image,$empCode);
        }
    }
}