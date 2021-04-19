<?php
class File_research extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }

        $this->load->model('familys_models/for_dash/Counting');

        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();

        $this->load->helper(array('url','text','permission','form'));
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->load->model("familys_models/files_need_update/File_research_model");
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/



    }
//--------------------------------------------------
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }





    public function all_re_files_accep(){ // family_controllers/files_need_update/File_research/all_re_files_accep

        $data['category']= $this->File_research_model->get_category();

        $data['customer_js'] = $this->load->view('admin/familys_views/files_need_update/app_js', '', TRUE);
        $this->load->view('admin/familys_views/files_need_update/file_research_view', $data);

    }

public function data()
{
    $file = $this->File_research_model->get_all_files();
    $arr = array();
    $arr['data'] = array();

    if (!empty($file)) {
        $x = 0;
        foreach ($file as $row) {
            $x++;
            if ($row['file_update_date'] == 0) {
                if ($row['file_status'] == 3 || $row['file_status'] == 4) {
                    $file_update_date = 'الملف موقوف';
                    $file_update_date_class = 'danger';
                } else {
                    $file_update_date = 'تحديث الملف';
                    $file_update_date_class = 'info';
                }
            } else {
                $file_update_date = $row['file_update_date'];
                $file_update_date_class = 'add';
            }
            if ($row['file_status'] == 1) {
                $file_status = 'نشط كليا';
                // $file_colors = '#00ff00';
                $file_colors = '#15bf00';
            } elseif ($row['file_status'] == 2) {
                $file_status = 'نشط جزئيا';
                $file_colors = '#00d9d9';
            } elseif ($row['file_status'] == 3) {
                $file_status = 'موقوف مؤقتا';
                $file_colors = '#ffff00';
            } elseif ($row['file_status'] == 4) {
                $file_status = 'موقوف نهائيا';
                $file_colors = '#ff0000';
            } elseif ($row['file_status'] == 0) {
                $file_status = 'جـــــــــاري';
                $file_colors = '#62d0f1';
            }
            if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                $mother_name = $row['mother_name'];
            } elseif ($row['mother_name'] == '') {
                $mother_name = $row['full_name_order'];
            } else {
                $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }
            if (!empty($row['nasebElfard'])) {
                $color = '';
                if (!empty($row['nasebElfard']['f2a']->color)) {
                    $color = $row['nasebElfard']['f2a']->color;
                }
                $title = '';
                if (!empty($row['nasebElfard']['f2a']->title)) {
                    $title = $row['nasebElfard']['f2a']->title;
                }
                $Fe2z_name =
                    '<span title="نصيب الفرد = ' . round($row['nasebElfard']['naseb']) . 'ريال" class="label label-pill
                         "  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;
                           font-size: 14px; background-color:' . $color . '" >
                      ' . $title . '</span>';
                $naseb_elfard = '<span class="label label-pill label-info " style="color: black"  >' . round($row['nasebElfard']['naseb']) . '</span>';
            } else {
                $Fe2z_name = '<span title=" ريال 0 " class="label label-pill " style="color:black ; 
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">أ</span>';
            }
            if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                $mother_new_card = $row['mother_new_card'];
            } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                $mother_new_card = $row['mother_national_num'];
            } else {
                $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }
            if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                $father_full_name = $row['father_full_name'];
            } else {
                $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }
            if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                $father_national_num = $row['father_national_num'];
            } else {
                $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
            }
            $sub_array = array();
            /*  if($row['file_update_date'] == 0 ){
                  echo '0';
              }*/
            $sub_array[] = $x;
            if (in_array($_SESSION['role_id_fk'], array(1)) || (in_array($_SESSION['user_id'], array(136)))) {

                $sub_array[] = '<div class="check-style">
                        <input type="checkbox" class="checkbox_osr" name="osr_id[]" value="' . $mother_new_card . '" id="choose-' . $x . '">
                        <label for="choose-' . $x . '">  </label>
                    </div>';
            }
            $sub_array[] = $row['file_num'];
            $sub_array[] = $father_full_name;
            //   $father_national_num,
            //  $mother_name,
            //  $mother_new_card,
            $sub_array[] = $row['contact_mob'];
            $sub_array[] = '
                      <div class="btn-group ">
                        <button type="button" class="btn btn-danger">  تحديث الملف </button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                   <li style="    background: #f5b233;">
                    <a target="_blank" href="' . base_url() . 'family_controllers/Family/father/' . $row['mother_national_num'] . '/1"  >  
                    ملف الأسرة
                    </a>  </li>
                        <li><a target="_blank"
                               href="' . base_url() . 'family_controllers/osr_crm/Osr_crm_c/add_crm_osr/' . $row['mother_national_num'] . '">
                         بدء الاجراءات البحث والدخول
                           </a></li>
                                       <!--<li ><a target="_blank" 
                               href="#">
                             حضور الأسرة </a></li>
                        <li><a target="_blank"
                               href="' . base_url() . 'family_controllers/Family/talb_mostandat/' . $row['mother_national_num'] . '/1">
                                تسليم المعاملات
                            </a></li>
                        <li><a data-toggle="modal" data-target="#modal-process-procedure"
                               onclick="GetTransferPage_drob_dwon( ' . $row['mother_national_num'] . ') " >
                                تحويل الي الباحث
                            </a></li>
                        <li><a target="_blank"
                               href="' . base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $row['mother_national_num'] . '">
                                إنشاء موعد زيارة
                            </a></li>-->
                                <li><a onclick="get_all_operations(' . $row['mother_national_num'] . ')" >
                         تتبع عمليات التواصل
                           </a></li>
                    </ul>
                </div>  ';
            $sub_array[] = '
                      <button style="color:#fff ;width:80px; background-color:' . $file_colors . '  " 
                             data-toggle="modal" data-target="#modal-info" class="btn btn-sm" >
                           ' . $file_status . '</button>
                      ';
            $sub_array[] = $Fe2z_name;
            $sub_array[] = '
                      <button data-toggle="modal" data-target="#modal-update690" class="btn btn-sm btn-' . $file_update_date_class . '">
                             ' . $file_update_date . '
                    </button>
                      ';
            if (in_array($_SESSION['role_id_fk'], array(1)) || (in_array($_SESSION['user_id'], array(136)))) {
                $sub_array[] = $row['current_to_emp_user_name'];
            }
            $arr['data'][] = $sub_array;

        }
    }
    $json = json_encode($arr);
    echo $json;
}

    public function filter_table(){

        $data['records'] = $this->File_research_model->get_all_files();
        $this->load->view('admin/familys_views/files_need_update/load_filter_page', $data);



    }
    
    
    
    function get_load_page()
{
    $this->load->model("familys_models/NewRegister");
    $this->load->model('Difined_model');

    $id = $this->input->post('mother_num');
    $data['record'] = $this->NewRegister->select_data_basic_order_mostand($id)[0];
    $data['mother_num']=$id;
    $data["main_attach_files"] = $this->Difined_model->select_search_key('family_setting', 'type', 47);

    $this->load->view('admin/familys_views/files_need_update/load_page_view', $data);

}
}