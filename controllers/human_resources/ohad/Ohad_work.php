<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ohad_work extends MY_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('Difined_model');
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/Model_access_rule');
        $this->load->model('system_management/Groups');

        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();

        $this->load->model('human_resources_model/ohad/Ohad_model');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function employees()//human_resources/ohad/Ohad_work/employees
    {
        $data['customer_js'] = $this->load->view('admin/Human_resources/ohad/app_js', '', TRUE);
        $data['subview'] = 'admin/Human_resources/ohad/employees';
        $this->load->view('admin_index', $data);

    }

    public function data()
    {
        $customer =  $this->Employee_model->select_allEmployee(1);

        $arr = array();
        $arr['data'] = array();
        if(!empty($customer)){
            $x = 0;
            foreach($customer as $row){
                $x++;
                $emp_type = array('لم تحدد' ,'نشط','موقوف');


                if ($row->employee_type == 1) {
                    $class = "success";
                } elseif ($row->employee_type == 2) {
                    $class = "danger";
                } elseif ($row->employee_type == 0) {
                    $class = "warning";
                }

                $end_contract_date_m = strtotime($row->end_contract_date_m);
                if($end_contract_date_m == 0) {

                   $time_stay='<button type="button" class="btn btn-sm btn-success btn-rounded">
                        متاح الأن - لم يتم تسكينه قبل ذلك
                        </button>';

                 }else{
                    $today =strtotime(date("Y-m-d"));
                    if(  $today  >  $end_contract_date_m  )
                    {
                        $time_stay=' <button type="button" class="btn btn-sm btn-success btn-rounded">
                            <i style="color: white;" class="fa fa-cog fa-spins"></i> 
                            '. 'انتهي منذ  '. $row->It_was_finshed_since.' </button>';

                     }elseif($today  <  $end_contract_date_m ){

                        $time_stay='<button type="button" class="btn btn-sm btn-danger btn-rounded">
                            <i style="color: white;" class="fa fa-cog fa-spin"></i>
                           '. 'متبقي '. $row->Remain_time.' </button>';

                     }
                }
                if ($row->contract_index == "1") {
                    $contract_name ="عقد محدد المدة  ";
                }else{
                    $contract_name ="ععقد غير محدد المدة";
                }


                $arr['data'][] = array(
                    $x,
                    $row->emp_code,
                    '
                     <a data-toggle="modal" data-target="#empModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_emp_data('.$row->emp_code.');">
                               '.$row->employee.'</a>
                    ',
                    $row->phone,
                    $row->card_num,
                    $row->nationality,
                    $row->job_role?$row->job_role:'',
                    $row->management?$row->management:'',
                    $row->part?$row->part:'',
                    $contract_name,
                    $row->end_contract_date_m,
                    '
                      <span class="label label-pill label-'. $class .' m-r-15"
                      style="font-size: 12px;">'. $emp_type[$row->employee_type].' </span> ',
                    $time_stay

                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public  function load_emp_data(){
        $emp_code = $this->input->post('emp_code')  ;
        $data['person_data'] = $this->Ohad_model->get_emp_data($emp_code);
        $this->load->view('admin/Human_resources/ohad/load_emp_data',$data);
    }


    public function emp_ohad($emp_id){     // human_resources/ohad/Ohad_work/emp_ohad/7

        if($this->input->post('add')){
            $empCode = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'emp_code');
            $this->Ohad_model->insert($empCode);
            echo 1;
            return ;
            //$this->messages('success','تسجيل بيانات العهد');
            //redirect("human_resources/ohad/Ohad_work/emp_ohad/".$emp_id."");
        }

        $data["personal_data"]=$this->Employee_model->get_one_employee($emp_id);
        $data['employee'] = $this->Ohad_model->getEmpData($emp_id);

        $data['title'] = 'بيانات العهد';
        $data['subview'] = 'admin/Human_resources/ohad/emp_ohad';
        $this->load->view('admin_index', $data);
    }

    //load_add_ohad  ,  load_my_ohad , load_tahwlat
    public function load_add_ohad($emp_id) {

        $data['empCode'] = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'emp_code');
        $data['ohad_devices'] =$this->Ohad_model->select_all_main_devices();
        $data['array_sub_ohad_devices'] =$this->Ohad_model->array_all_sub_devices();
        $data['all_my_ohad'] = $this->Ohad_model->get_by('emp_ohad',array('emp_code'=>$data['empCode'],'it_own'=>1));
        $this->load->view('admin/Human_resources/ohad/load_add_ohad',$data);
    }
    public function load_my_ohad($emp_id) {

        $data['empCode'] = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'emp_code');
        $data['empName'] = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'employee');
        $data['ohad_devices'] =$this->Ohad_model->select_all_main_devices();
        $data['array_sub_ohad_devices'] =$this->Ohad_model->array_all_sub_devices();
        $data['all_my_ohad'] = $this->Ohad_model->get_by('emp_ohad',array('emp_code'=>$data['empCode'],'it_own'=>1));
        $data['all_employee'] = $this->Ohad_model->getEmpData_exp($emp_id);

        $this->load->view('admin/Human_resources/ohad/load_my_ohad',$data);
    }

    public function load_tahwlat_ohad($emp_id) {

        $data['empCode'] = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'emp_code');
        $data['empName'] = $this->Ohad_model->get_by('employees',array('id'=>$emp_id),'employee');

        $data['ohad_devices'] =$this->Ohad_model->select_all_main_devices();
        $data['array_sub_ohad_devices'] =$this->Ohad_model->array_all_sub_devices();

        $data['all_tahwlat_ohad'] = $this->Ohad_model->all_tahwlat_ohad($data['empCode']);

        $this->load->view('admin/Human_resources/ohad/load_tahwlat_ohad',$data);
    }

    public function add_tahwel($emp_id){     // human_resources/ohad/Ohad_work/add_tahwel/7

        if($this->input->post('add')) {
            $emp_ohad_id = $this->input->post('emp_ohad_id');
            $this->Ohad_model->update_emp_ohad($emp_ohad_id);
            $estlam_date = $this->input->post('tahwel_date');
            $to_emp_code = $this->input->post('to_emp_code');
            $this->Ohad_model->insert($to_emp_code, $estlam_date);
            echo 1;
            return ;
        }else{
            echo 0;
            return ;
        }

    }


    public function delete_ohad()
    {
        $id = $this->input->post('id');
        $this->Ohad_model->delete_ohad($id);
        echo 1;
        return ;
    }
    public function GetSubCodeDevices(){

	    $code = $this->input->post('code');
        if($code){
            $records =$this->Ohad_model->select_all_sub_devices($code);
            if(!empty($records)){

                $html[]= '<option value=""> إختر</option>';

                foreach ($records as $record){
                    $html[] ='<option value="'.$record->code.'"> '.$record->title.'</option>';

                }
                echo implode(" ",$html);

            }
            return;

            //$this->load->view('admin/Human_resources/custody/GetSubData',$data);
        }else{
            $html[]= '<option value=""> إختر</option>';
            echo implode(" ",$html);
            return ;
        }
    }

/*************************************************************/
public function add_custody_devices()//human_resources/Human_resources/add_custody_devices
{
    $this->load->model('human_resources_model/ohad/Ohad_devices_model');
    if ($this->input->post('form_save')) {
    if ($this->input->post('id') ==0) {
        $this->Ohad_devices_model->insert_form();
    }else{
        $this->Ohad_devices_model->update_form();

    }
    } else {
        $data['mgalat'] = $this->Ohad_devices_model->get_by('emp_ohad_device', array('from_code' => 0));
        $data['title'] = 'العهــد';
        $data['subview'] = 'admin/Human_resources/custody_devices/ohad_setting_view';
        $this->load->view('admin_index', $data);
    }
}
//new_function
function get_select_data()
    {
        $this->load->model('human_resources_model/ohad/Ohad_devices_model');
        $data['mgalat'] = $this->Ohad_devices_model->get_by('emp_ohad_device', array('from_code' => 0));
        echo json_encode($data);
    }

    function get_data_table($type)
    {
        $this->load->model('human_resources_model/ohad/Ohad_devices_model');
        if ($type == 1) {
            $where_arr = array('from_code' => 0);

        } else {
            $where_arr = array('from_code !=' => 0);
        }
        $data['type'] = $type;
        $data['data_table'] = $this->Ohad_devices_model->get_table_data('emp_ohad_device', $where_arr);

        $this->load->view('admin/Human_resources/ohad/setting/ohad_setting_table_view', $data);
    }

    function delete_data($id)
    {
        $this->load->model('human_resources_model/ohad/Ohad_devices_model');
        $this->Ohad_devices_model->delete_data($id);
    }

    function set_data_form($id)
    {
        $this->load->model('human_resources_model/ohad/Ohad_devices_model');
        $data['data'] = $this->Ohad_devices_model->get_by('emp_ohad_device', array('id' => $id),1);
        echo json_encode($data);

    }


    
}// end class
/* End of file Ohad_work.php */
/* Location: ./application/controllers/human_resources/ohad/Ohad_work.php */