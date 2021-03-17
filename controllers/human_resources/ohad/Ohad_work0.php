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

    
}// end class
/* End of file Ohad_work.php */
/* Location: ./application/controllers/human_resources/ohad/Ohad_work.php */