<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Volunteer_hours_ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            echo 'login';
        }
        $this->load->model('human_resources_model/employee_forms/Volunteer_hours_model');
    }

    
    public function load_responsible()
    {
        $edara_id=$this->input->post('row_id');
        $data['responsibles']=$this->Volunteer_hours_model->get_all_emp_edara($edara_id);
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_responsible', $data);
    }
   

    public function get_emp_data()
    {
        $data["personal_data"]=$this->Volunteer_hours_model->get_one_employee($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }
    public function get_load_page()
    {
        $data_load["personal_data"]=$this->Volunteer_hours_model->get_one_employee($this->input->post('valu'));
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);
    }


    public function GetMostafed_type()
    {
        $data_load['last_id'] = $this->Volunteer_hours_model->get_last();
        $data_load['admin'] = $this->Volunteer_hours_model->select_by();
        $data_load['ghat'] = $this->Volunteer_hours_model->select_search_key2("hr_forms_settings","type","9","");
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/Getmostafed_type',$data_load);
    }



    public function add_option()
    {

        $this->Volunteer_hours_model->insert_record($this->input->post('valu'));
    }


    public function add_volunteer_table(){
        $data_load['admin'] = $this->Volunteer_hours_model->select_by();
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/GetVolunteer_table',$data_load);

    }





public function GetNum_hours(){
$from_time = strtotime($_POST['from_time']);
$to_time = strtotime($_POST['to_time']);
     $data['from_time'] =date('h:ia',$from_time);
     $data['to_time'] =date('h:ia',$to_time);
   if($from_time !='' && $to_time !='' ){
       $difference = ( strtotime($data['to_time']) -  strtotime($data['from_time']));
       $hours = $difference / 3600;
         $minutes = ($hours - floor($hours)) * 60;
         $data['hours']=abs(floor($hours));
         $data['minutes']=abs($minutes);
         echo json_encode($data);
     }

 }
 
 public function getConnection_emp()
{
    $all_Emps = $this->Volunteer_hours_model->get_all_emp();
     //   $this->test($all_Emps);
    $arr_emp = array();
    $arr_emp['data'] = array();

    if (!empty($all_Emps)) {
        foreach ($all_Emps as $row_emp) {

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
 
 
  public function load_details(){

        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Volunteer_hours_model->GetById($row_id);
        $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_details',$data);

    }
    public function Print_details(){

        $row_id = $this->input->post('row_id');
        $data['result'] = $this->Volunteer_hours_model->GetById($row_id);
        $data['emp_data'] = $this->Volunteer_hours_model->select_depart_edite($data['result']->emp_id_fk);
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/print_details',$data);

    }


  
    public function get_ms2ol_data()
    {
        $emp_name=$this->input->post('id');
        $reason=$this->Volunteer_hours_model->get_ms2ol_data($emp_name);
        echo json_encode($reason);
    }

    public function add_setting(){
        $type = $this->input->post('type');
        
        $type_name = $this->input->post('type_name'); 
       
        $this->Volunteer_hours_model->add_setting($type);
       // $data['result'] = $this->Volunteer_hours_model->get_setting($type,$edara_n,$edara_id_fk);
       $data['result'] = $this->Volunteer_hours_model->get_setting($type);
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting',$data);
    }
     public function load_settigs(){
        $type = $this->input->post('type');
        $type_name = $this->input->post('type_name'); 
       
       
           
        $data['result'] = $this->Volunteer_hours_model->get_setting($type);
        
        
        $data['type_name'] = $type_name;
        $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting',$data);
    }
           public function delete_setting(){
            $id = $this->input->post('id') ;
            $type = $this->input->post('type');
            $type_name = $this->input->post('type_name');
          
            $this->Volunteer_hours_model->delete_setting($id);
             $data['result'] = $this->Volunteer_hours_model->get_setting($type);
            $data['type_name'] = $type_name;
            $this->load->view('admin/Human_resources/employee_forms/volunteer_hours/load_setting',$data);
        }
            public function get_setting_by_id(){
        $id = $this->input->post('row_id') ;
       $result = $this->Volunteer_hours_model->get_setting_by_id($id);
       echo json_encode($result) ;
    } 
    //////
    function fetch_all_data()
    {
        //$fetch_data = $this->Volunteer_hours_model->make_datatables();
    $fetch_data= $this->Volunteer_hours_model->select_all();
        $data = array();
        $mostafed_type_arr = array(0 => 'داخلى', 1 => 'خارجى');
      //  $type_arr = array('country' => "الدولة", "city" => "المحافظة", "region" => "المدينة");
        $x = 1;
        foreach ($fetch_data as $row) {
            if ($row->mostafed_type_fk == 1) {
                            $edara_geha = $row->title_setting;
                        } elseif ($row->mostafed_type_fk == 0) {
                            $edara_geha = $row->department_name;
                        }
                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_Volunteer_hours(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours/' . $row->id . '";';
                            $link_delete = 0;
                        }
            $sub_array = array();
            $sub_array[] = $x++;
            $sub_array[] =  $row->emp_code;
            $sub_array[] =  $row->employee;
            $sub_array[] = $mostafed_type_arr[$row->mostafed_type_fk];
            $sub_array[] =   $edara_geha;

           
            $sub_array[] = '
            <a data-toggle="modal" data-target="#details_Modal" class="btn btn-xs btn-info"
                                   style="padding:1px 5px;" onclick="load_page('.$row->id .');">
                                    <i class="fa fa-list "></i> </a>
            
                                    <a onclick="swal({
                                        title: "هل انت متأكد من التعديل ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: "تعديل",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: true
                                        },
                                        function(){
                                '.$link_update .'
                                        });"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a onclick="swal({
                                        title: "هل انت متأكد من الحذف ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "حذف",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: true
                                        },
                                        function(){
                                        swal("تم الحذف!", "", "success");
                                        window.location="'.  base_url() .'human_resources/employee_forms/Volunteer_hours/delete_volunteer_hours/'. $row->id .'/'.$link_delete .'";
                                        });"><i class="fa fa-trash"
                                                aria-hidden="true"></i> </a>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Volunteer_hours_model->get_all_data(),
            "recordsFiltered" => $this->Volunteer_hours_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
    ?>
	
	
	
	
