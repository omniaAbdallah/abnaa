<?php
class Ezn_order extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('human_resources_model/employee_forms/all_ozonat/Ezn_order_model');
        $this->load->model('human_resources_model/Public_employee_main_data');
        $this->load->library('google_maps');
    }
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function url (){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');
        }

        elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    

    
    public function index()
{ 
    
//echo $this->Ezn_order_model->current_date_mosayer('2020-10-23','year');
   
    // human_resources/employee_forms/all_ozonat/Ezn_order
    if ($_SESSION['role_id_fk'] == 3) {
        $data['emp'] = $this->Ezn_order_model->get_emp($_SESSION['emp_code']);

    }
    $data['all_emp'] = $this->Ezn_order_model->get_all_emp(0);
    $data['emp_data'] = $this->Ezn_order_model->select_depart();
    if ($_SESSION['role_id_fk'] == 3) {
        $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        $current_to = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($_SESSION['emp_code']);
        $current_to_id = $this->Ezn_order_model->get_user_emp_id($current_to, 3);
        $name = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
    } elseif ($_SESSION['role_id_fk'] == 1) {
        $current_to = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($this->input->post('emp_id_fk'));
        $current_to_id = $this->Ezn_order_model->get_user_emp_id($current_to, 3);
        $name = $this->Ezn_order_model->get_emp_name($this->input->post('emp_id_fk'));
    }
    if ($this->input->post('add_ezn')) {
        $this->Ezn_order_model->add_ezn();
        $this->send_notify($current_to_id, $name);
        $this->messages('success', 'تم الإضافة بنجاح');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order', 'refresh');
        }
    }
    $data['title'] = "طلب اذن";



    if ($this->input->post('from_profile')) {
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);
    } else {
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ezn_order_view';
        $this->load->view('admin_index', $data);
    }
}

   /* public function index()
{ 
    if ($_SESSION['role_id_fk'] == 3) {
        $data['emp'] = $this->Ezn_order_model->get_emp($_SESSION['emp_code']);

    }
    $data['all_emp'] = $this->Ezn_order_model->get_all_emp(0);
    $data['emp_data'] = $this->Ezn_order_model->select_depart();
    if ($_SESSION['role_id_fk'] == 3) {
        $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        $current_to = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($_SESSION['emp_code']);
        $current_to_id = $this->Ezn_order_model->get_user_emp_id($current_to, 3);
        $name = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
    } elseif ($_SESSION['role_id_fk'] == 1) {
        $current_to = $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($this->input->post('emp_id_fk'));
        $current_to_id = $this->Ezn_order_model->get_user_emp_id($current_to, 3);
        $name = $this->Ezn_order_model->get_emp_name($this->input->post('emp_id_fk'));
    }
    if ($this->input->post('add_ezn')) {
        $this->Ezn_order_model->add_ezn();
        $this->send_notify($current_to_id, $name);
        $this->messages('success', 'تم الإضافة بنجاح');
        if ($this->input->post('from_profile')) {
            redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order', 'refresh');
        }
    }
    $data['title'] = "طلب اذن";



    if ($this->input->post('from_profile')) {
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);
    } else {
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ezn_order_view';
        $this->load->view('admin_index', $data);
    }
}*/
    public function check_setting()
{
    $no3_ezn = $this->input->post('no3_ezn');
    $emp_id = $this->input->post('emp_id');
    $ezn_date = $this->input->post('ezn_date');
    $data['ezn_setting'] = $this->Ezn_order_model->ezn_setting();
    $data['count_ezn'] = $this->Ezn_order_model->select_emp_ezn($emp_id, $no3_ezn, $ezn_date);
    if ($no3_ezn == 1) {
        if ($data['count_ezn'] > $data['ezn_setting']->nums_in_month) {
            echo($data['ezn_setting']->nums_in_month - $data['count_ezn']);
        } else {
            echo 0;
        }
    }
}

/*    public function check_setting()
{
    $no3_ezn = $this->input->post('no3_ezn');
    $emp_id = $this->input->post('emp_id');
    $data['ezn_setting'] = $this->Ezn_order_model->ezn_setting();
    $data['count_ezn'] = $this->Ezn_order_model->select_emp_ezn($emp_id,$no3_ezn);
    if ($no3_ezn == 1) {
        if ($data['count_ezn'] > $data['ezn_setting']->nums_in_month) {
            echo $data['count_ezn'];
        } else {
            echo 0;
        }
    }
}*/
   /* public function check_setting(){
    $fatra_fk=$this->input->post('fatra_fk');
    $emp_id=$this->input->post('emp_id');
    $data['ezn_setting']=$this->Ezn_order_model->ezn_setting();  
    $data['count_ezn']=$this->Ezn_order_model->select_emp_ezn($emp_id);
    if($fatra_fk==1)
    {
        if($data['count_ezn']==$data['ezn_setting']->moda_dwam_gozee ||$data['count_ezn'] >$data['ezn_setting']->moda_dwam_gozee)
        {
            echo 1;
        }
        else{
            echo 0;
        }
    }
    else if($fatra_fk==2)
    {
        if($data['count_ezn']==$data['ezn_setting']->moda_dwam_kamel ||$data['count_ezn'] > $data['ezn_setting']->moda_dwam_kamel)
        {
            echo 1;
        }
        else{
            echo 0;
        }
    } 
}*/
public function check_setting_time()
{
    $num_hours = $this->input->post('num_hours');
    $emp_id = $this->input->post('emp_id');
    $ezn_date = $this->input->post('ezn_date');

    $data['ezn_setting'] = $this->Ezn_order_model->ezn_setting();
    $data['all_time_ezn'] = $this->Ezn_order_model->select_all_time_ezn($emp_id, $ezn_date);

    if ($num_hours != 0) {
        if ((($num_hours) > $data['ezn_setting']->nums_in_one_time)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
public function testss()
{
      echo  $current_month = $this->Ezn_order_model->current_date_mosayer('','month');
      echo'<br/>';
     echo    $current_year = $this->Ezn_order_model->current_date_mosayer('','year');
         
         }
public function get_available()
{
    $num_hours = $this->input->post('num_hours');
    $emp_id = $this->input->post('emp_id');
    $ezn_date = $this->input->post('ezn_date');

    $data['ezn_setting'] = $this->Ezn_order_model->ezn_setting();
    $data['all_time_ezn'] = $this->Ezn_order_model->select_all_time_ezn($emp_id, $ezn_date);
   // $remain_hours = $data['ezn_setting']->nums_in_month - $data['all_time_ezn']->count_ozonat;
    
  
        $no3_dawam = $this->get_no3_dawam($emp_id);
    if($no3_dawam == 'full'){
        $no3_dawam_option = $data['ezn_setting']->moda_dwam_kamel;
    }elseif($no3_dawam == 'half'){
       $no3_dawam_option = $data['ezn_setting']->moda_dwam_gozee;  
    }else{
        $no3_dawam_option = 0;        
    }
    $remain_hours = $no3_dawam_option - $data['all_time_ezn']->total_hours;
    
      $remain_num = $data['ezn_setting']->nums_in_month - $data['all_time_ezn']->count_ozonat;
    
    
    echo json_encode(array('remain_hours' => $remain_hours, "remain_num" => $remain_num));
}


    public function get_no3_dawam($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('hr_emp_dwam_details');
        if ($query->num_rows() > 0) {
            return $query->row()->no3_dawam;
        } else {
            return 0;
        }
    }
/*public function check_setting_time()
{
    $num_hours = $this->input->post('num_hours');
    $emp_id = $this->input->post('emp_id');
    $data['ezn_setting'] = $this->Ezn_order_model->ezn_setting();
      $data['count_ezn']=$this->Ezn_order_model->select_emp_ezn_new($emp_id,1,$ezn_month,$ezn_year);
    if ($num_hours != 0 and $data['count_ezn'] < 3 ) {
        if ((($num_hours * 60) > $data['ezn_setting']->nums_in_one_time)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}*/
/*public function check_setting_time()
{
    $num_hours=$this->input->post('num_hours');
    $emp_id=$this->input->post('emp_id');
    $data['ezn_setting']=$this->Ezn_order_model->ezn_setting();  
    $data['count_ezn']=$this->Ezn_order_model->select_emp_ezn($emp_id);
    
    if($num_hours!=0)
    {
        if((($num_hours*60)==$data['ezn_setting']->nums_in_one_time) ||(($num_hours*60) > $data['ezn_setting']->nums_in_one_time))
        {
            echo 1;
        }
        else{
            echo 0;
        } 
    }
}*/
  /*  public function index(){ // human_resources/employee_forms/all_ozonat/Ezn_order
        if ($_SESSION['role_id_fk']==3){
            $data['emp']= $this->Ezn_order_model->get_emp($_SESSION['emp_code']);
        }
        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['emp_data'] = $this->Ezn_order_model->select_depart();
        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($_SESSION['emp_code']);
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
        }elseif($_SESSION['role_id_fk'] ==1)
        {
            $current_to= $this->Public_employee_main_data->get_direct_manager_id_by_emp_id($this->input->post('emp_id_fk'));
            $current_to_id=$this->Ezn_order_model->get_user_emp_id($current_to,3);
            $name=$this->Ezn_order_model->get_emp_name($this->input->post('emp_id_fk'));
        }
        if ($this->input->post('add_ezn')){
            // $this->test($_POST);
            $this->Ezn_order_model->add_ezn();
            $this->send_notify($current_to_id,$name);
            $this->messages('success','تم الإضافة بنجاح');
            //  $this->test($this->input->post('from_profile'));
            if ($this->input->post('from_profile')) {
               // redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
                 redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
            } else {
                redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
            }
        }
        $data['title']="طلب اذن";
     if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ezn_order_view';
            $this->load->view('admin_index', $data);
        }
    }
*/
   /* public function getConnection_emp()
    {
        $all_Emps = $this->Ezn_order_model->get_all_emp(0);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                if(empty($row_emp->edara)){
                    $row_emp->edara='غير محدد ';
                }
                if(empty($row_emp->qsm)){
                    $row_emp->qsm='غير محدد ';
                }
                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara . '"
                        data-edara_id="' . $row_emp->administration . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->job_title . '"
                        data-qsm_n="' . $row_emp->qsm . '"
                        data-qsm_id="' . $row_emp->department . '"
                        data-adress="' . $row_emp->adress . '"
                        data-phone="' . $row_emp->phone . '" />',
                    $row_emp->employee,
                    $row_emp->edara,
                    $row_emp->qsm,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }*/


public function getConnection_emp()
{
    $all_Emps = $this->Ezn_order_model->get_all_emp(0);
    //        $this->test($all_Emps);
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
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->qsm_id . '"
                        data-adress="' . $row_emp->adress . '"
                        data-phone="' . $row_emp->phone . '" />',
                $row_emp->employee,
                $row_emp->edara_n,
                $row_emp->qsm_n,

                ''
            );
        }
    }
    echo json_encode($arr_emp);


}
    public function get_emp_data()
    {
        $data["personal_data"]=$this->Ezn_order_model->get_employee_data($this->input->post('valu'));
        print_r( json_encode($data["personal_data"][0]));


    }


    public function send_notify($current_to,$name)//  http://localhost/abnaa/maham_mowazf/talabat/all_ozonat/Ezn_order/send_notify
    {

        $this->load->model('Notification');

        define( 'API_ACCESS_KEY', 'AIzaSyDPQ5964xL01kr3rsVlzXveeAn-7HhPqBo' );
        //$this->load->model('api/Web_service');

        $token=$this->Notification->get_token_by_id($current_to);
        $text="تم تحويل طلب اذن لك من الموظف'.$name.'  ";
        $this->Notification->insert_notify($current_to,$text,1);
        $logged= $this->Notification->get_user_logged($current_to);
        if($logged==1) {
            for ($x = 0; $x < count($token); $x++) {
                $data = array("to" => $token[$x],

                    "notification" => array("title" => "اشعار جديد", "body" => $text, "sound" => 'https://www.computerhope.com/jargon/m/example.mp3', "icon" => "https://abnaa-sa.org/uploads/images/05c833d02d69a88b8b3322dd22fb9e22.png", "click_action" => "http://shareurcodes.com"));
                $data_string = json_encode($data);

                // echo "The Json Data : " . $data_string;

                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

                $result = curl_exec($ch);

                curl_close($ch);

                //        echo "<p>&nbsp;</p>";
                // echo "The Result : " . $result;
            }
        }
    }


    public function display_data(){


        if ($_SESSION['role_id_fk']==3){
            $records = $this->Ezn_order_model->get_ozonat($_SESSION['emp_code']);
        } elseif ($_SESSION['role_id_fk']==1){
            $records = $this->Ezn_order_model->display_data();
        }
        //   $this->test($_POST);
        $arr = array();
        $arr['data'] = array();
        if(!empty($records)) {
            $x = 0;
            foreach ($records as $row) {


                $x++;

                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                    $link_update = 'edite_ezn(' . $row->id . ')';
                    $link_delete = 1;
                } else {
                    $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/' . $row->id . '";';

                    $link_delete = 0;

                }
                if ($row->no3_ezn==1){
                    $no3_ezn = 'استئذان شخصي';
                } elseif ($row->no3_ezn==2){
                    $no3_ezn ='استئذان للعمل' ;
                }
                else{
                    $no3_ezn =' غير محدد' ;
                }
                if($row->suspend == 0){
                  //  $halet_eltalab = 'جاري متابعة الطلب ';
                     $halet_eltalab = 'جاري متابعة الطلب ';
                    $halet_eltalab_class = 'warning';
                }elseif($row->suspend == 1){
                   // $halet_eltalab = 'تم قبول الطلب من '.$row->talab_in_title;
                    $halet_eltalab = 'تم قبول الطلب ';
                    $halet_eltalab_class = 'success';
                }elseif($row->suspend == 2){
                   // $halet_eltalab = 'تم رفض الطلب من '.$row->talab_in_title;
                      $halet_eltalab = 'تم رفض الطلب  ';
                    $halet_eltalab_class = 'danger';
                }elseif($row->suspend == 4){
                   // $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->talab_in_title;
                     $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
                    $halet_eltalab_class = 'success';
                }elseif($row->suspend == 5 and ($row->cancel == 'no' or $row->cancel == ' ' ) ){
                  //  $halet_eltalab = 'تم اعتماد الطلب بالرفض من  '.$row->talab_in_title;
                      $halet_eltalab = 'تم اعتماد الطلب بالرفض ';
                    $halet_eltalab_class = 'danger';
                    $halet_eltalab_color =  '#E5343D';
                }elseif($row->suspend == 5 and $row->cancel == 'yes' ){
                  //  $halet_eltalab = 'تم اعتماد الطلب بالرفض من  '.$row->talab_in_title;
                      $halet_eltalab = 'تم إلغاء الطلب ';
                    $halet_eltalab_class = 'danger';
                    $halet_eltalab_color =  '#E5343D';
                }else{
                    $halet_eltalab = 'غير محدد ';
                    $halet_eltalab_class = 'danger';
                   $halet_eltalab_color =  '#E5343D';
                }

                if($row->suspend == 0){
                    $egraaa =    '  <a href="#" onclick=\'swal({
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
                        ' . $link_update . '
                        });\'>
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a href="#" onclick=\'swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                                swal("تم الحذف!", "", "success");
                                                window.location="' . base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/delete_ezn/' . $row->id . '/' . $link_delete . '";
                                                });
                                            \'>
                                            <i class="fa fa-trash"> </i></a>
                                            <!-- Nagwa 1-6 -->
                                            <!--<a onclick="print_ezn('.$row->id.');"><i class="fa fa-print"></i></a>-->

                                            ';
                }else{

                    $egraaa = '' ;

                }
                $currentDateTime =$row->from_hour;

                $DateTime =$row->to_hour;

$to_time = strtotime("$row->from_hour");
$from_time = strtotime("$row->to_hour");
$time_diff =  round(abs($to_time - $from_time) / 60,2). " دقيقة ";


                $arr['data'][] = array(
                    $x,
                    $no3_ezn,
                    $row->ezn_date_ar,
                    $row->emp_name,
                    $newDateTime = date('h:i A', strtotime($currentDateTime)),
                    $to_DateTime = date('h:i A', strtotime($DateTime)),
                    $time_diff,

                    //   '<button data-toggle="modal" data-target="#Ozonat_detailsModal" class="btn btn-sm btn-info"  onclick="load_person_data('.$row->emp_id_fk.');">
                    //   <i class="fa fa-list "></i>
                    //   افاده شئون الموظفين
                    //   </button>',
                    '<a data-toggle="modal" data-target="#detailsModal" title="تفاصيل" class="btn btn-sm btn-info" style="padding:1px 6px"  onclick="load_page('.$row->id.'); load_person_data('.$row->emp_id_fk.'); load_profile_data('.$row->emp_id_fk.');">
                  <i class="fa fa-list "></i></a>
                  <a  title="طباعة" onclick="print_new_ezn('.$row->id.');">
                  <i class="fa fa-print "></i></a>'
                    .$egraaa,
                    $row->current_to_user_name,
                    '<span class="label label-'. $halet_eltalab_class.'" style="min-width: 140px;">
                  '. $halet_eltalab.'
                   </span>',
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function check_ezn()
    {
        $emp_id = $this->input->post('emp_id');
        $result = $this->Ezn_order_model->check_ezn($emp_id);
        echo json_encode($result);
    }
    public function Upadte_ezn($id){
        //$id=$this->input->post('id');



        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($id);
        //$data['emp_data'] = $this->Ezn_order_model->select_depart();
        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
            // $this->test(  $data['emp_name']);
        }
        if ($this->input->post('add_ezn')){
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success','تم التعديل بنجاح');

            if ($this->input->post('from_profile')) {

              //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
                 redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');

            } else {

                redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');

            }


        }

        $data['title']="تعديل اذن";

          $data['title'] = "تعديل اذن";
        if ($this->input->post('from_profile')) {
            $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);
        } else {
            $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ezn_order_view';
            $this->load->view('admin_index', $data);
        }
      /*  $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);*/

    }
    public function Upadte_eznn(){
        $id=$this->input->post('id');



        $data['all_emp']= $this->Ezn_order_model->get_all_emp(0);
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($id);
        //$data['emp_data'] = $this->Ezn_order_model->select_depart();
        if ($_SESSION['role_id_fk'] ==3){
            $data['emp_name'] = $this->Ezn_order_model->get_emp_name($_SESSION['emp_code']);
            // $this->test(  $data['emp_name']);
        }
        if ($this->input->post('add_ezn')){
            $this->Ezn_order_model->update_ezn($id);
            $this->messages('success','تم التعديل بنجاح');

            if ($this->input->post('from_profile')) {

                redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');

            } else {

                redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');

            }


        }

        $data['title']="تعديل اذن";

        $data['ezn_js'] = $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_js', '', TRUE);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/ezn_order_view', $data);

    }

    public function delete_ezn ($id, $from = false){
        $this->Ezn_order_model->delete_ezn($id);
        $this->messages('success','تم الحذف بنجاح ');
        // redirect('human_resources/employee_forms/job_requests/Job_request','refresh');

        if (!empty($from) && ($from == 1)) {
          //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
             redirect('maham_mowazf/person_profile/Personal_profile/talabat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/all_ozonat/Ezn_order','refresh');
        }
    }
    // _________Nagwa 1-6 ___________________

    public function load_details(){

        $row_id = $this->input->post('row_id');

        $data['get_ezn']= $this->Ezn_order_model->get_by_id($row_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);
    }

    public function load_ozonat_details(){

        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat']= $this->Ezn_order_model->get_ozonat($emp_id);

        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);

    }
    public function load_profile_details(){

        $emp_id = $this->input->post('emp_id');

        $data['emp_name'] = $this->Ezn_order_model->get_emp_profile($emp_id);
        // $this->test($data['emp_name']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/load_details',$data);

    }
    public function print_ezn(){

        $data['title']="طباعة طلب الإذن" ;
        $row_id = $this->input->post('row_id');
        $data['get_ezn']= $this->Ezn_order_model->get_by_id($row_id);
        //   $this->test($data['get_ezn']);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ezn', $data);


    }
    public function print_new_ezn(){

        $data['title']="طباعة طلب الإذن" ;
        $row_id = $this->input->post('ezn_id');
        $data['ezn_data']= $this->Ezn_order_model->get_by_id($row_id);
        $data['ozonat']= $this->Ezn_order_model->get_all_ozenat($data['ezn_data']->emp_id_fk);
        $data['UserName'] = $this->Ezn_order_model->getUserName($_SESSION['user_id']);

        // $this->test($data['ezn_data']);
        // application\views\admin\Human_resources\employee_forms\all_ozonat\new_print_ezn.php
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/new_print_ezn', $data);


    }
    public function print_ozonat(){

        $data['title']="طباعة طلب الإذن" ;
        $emp_id = $this->input->post('emp_id');
        $data['all_ozonat']= $this->Ezn_order_model->get_ozonat($emp_id);
        $this->load->view('admin/Human_resources/employee_forms/all_ozonat/print_ozonat', $data);


    }


    public function request_ozonat()
    { //human_resources/employee_forms/all_ozonat/Ezn_order/request_ozonat
        if (($_SESSION['role_id_fk'] == 1)|| (($_SESSION['role_id_fk'] == 3)
           &&(in_array($_SESSION['user_id'],array(153,151,61,62))))) {
            $data['items'] = $this->Ezn_order_model->display_data();
            // $this->test($data);
        }
        $data['title'] = "طلبات الأذونات ";
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/ozonat_order_view';
        $this->load->view('admin_index', $data);
  }
//////////////////////////////////////////////////////////////////////////////


    public function check_ezn_notifications()
    {
        $result = $this->Ezn_order_model->check_ezn_notifications(array('current_to_id' => $_SESSION['user_id']));
        echo json_encode($result);
    }

    public function update_ezn_notification()
    {
//        $ezn_rkm = $this->input->post('ezn_rkm');
        $result = $this->Ezn_order_model->update_ezn_notification();


    }

function calculate_time_span($date = '2020-10-10'){
    $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);

        $months = floor($seconds / (3600*24*30));
        $day = floor($seconds / (3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600)) / 60);
        $secs = floor($seconds % 60);

        if($seconds < 60)
            $time = $secs." seconds ago";
        else if($seconds < 60*60 )
            $time = $mins." min ago";
        else if($seconds < 24*60*60)
            $time = $hours." hours ago";
        else if($seconds < 24*60*60)
            $time = $day." day ago";
        else
            $time = $months." month ago";

        echo $time;
}



    public function all_statics()
    { //human_resources/employee_forms/all_ozonat/Ezn_order/all_statics

         $current_month = $this->Ezn_order_model->current_date_mosayer('','month');
         $current_year = $this->Ezn_order_model->current_date_mosayer('','year');
         
$data['current_month_name'] = $this->Ezn_order_model->current_date_mosayer('','month_n');
$data['current_year'] = $this->Ezn_order_model->current_date_mosayer('','year');


 $data['total_nums_personal_ezn'] = $this->Ezn_order_model->select_nums_ozonat('',1,$current_month,$current_year);
 $data['total_nums_3mal_ezn'] = $this->Ezn_order_model->select_nums_ozonat('',2,$current_month,$current_year);

 $data['total_sum_personal_ezn'] = $this->Ezn_order_model->select_sums_ozonat('',1,$current_month,$current_year);
 $data['total_sum_3mal_ezn'] = $this->Ezn_order_model->select_sums_ozonat('',2,$current_month,$current_year);




       $data['all_emps'] = $this->Ezn_order_model->Employee_date_new($current_month,$current_year);
        $data['title'] = " إحصائي الأذونات خلال شهر  " . $data['current_month_name'] .' لعام ' .$current_year ;
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/report/all_statics_report';
        $this->load->view('admin_index', $data);
  }

    public function all_statics_report()
    { //human_resources/employee_forms/all_ozonat/Ezn_order/all_statics_report
        $data['current_month'] = $this->Ezn_order_model->current_date_mosayer('', 'month');
        $data['current_year'] = $this->Ezn_order_model->current_date_mosayer('', 'year');
        $data['title'] = " إحصائي الأذونات خلال شهر  " ;
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/report/all_statics_report_form';
        $this->load->view('admin_index', $data);
    }
    
        public function all_statics_report_result()
    {
        if ($this->input->post('month')) {
            $current_month = $this->input->post('month');
            $data['current_month_name']  = $this->input->post('month_n');
        } else {
            $current_month = $this->Ezn_order_model->current_date_mosayer('', 'month');
            $data['current_month_name'] = $this->Ezn_order_model->current_date_mosayer('', 'month_n');

        }
        if ($this->input->post('year')) {
            $current_year = $this->input->post('year');
        } else {
            $current_year = $this->Ezn_order_model->current_date_mosayer('', 'year');
        }
        $data['current_year'] = $current_year;
        $data['total_nums_personal_ezn'] = $this->Ezn_order_model->select_nums_ozonat('', 1, $current_month, $current_year);
        $data['total_nums_3mal_ezn'] = $this->Ezn_order_model->select_nums_ozonat('', 2, $current_month, $current_year);
        $data['total_sum_personal_ezn'] = $this->Ezn_order_model->select_sums_ozonat('', 1, $current_month, $current_year);
        $data['total_sum_3mal_ezn'] = $this->Ezn_order_model->select_sums_ozonat('', 2, $current_month, $current_year);
        $data['all_emps'] = $this->Ezn_order_model->Employee_date_new($current_month, $current_year);
        $data['title'] = " إحصائي الأذونات خلال شهر  " . $data['current_month_name'] . ' لعام ' . $current_year;
        $data['subview'] = 'admin/Human_resources/employee_forms/all_ozonat/report/all_statics_report';
        $this->load->view($data['subview'], $data);
    }


}
