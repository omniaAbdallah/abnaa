<?php

class Ektfaa_talab extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/osr_ektfaa_m/Ektfaa_talab_m');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function message($type, $text)
    {
        $this->session->set_flashdata('message', '<script> swal({
                    type:"' . $type . '",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
    }

    function index()/*family_controllers/osr_ektfaa/Ektfaa_talab*/
    {
        $data['project_type'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 201));
        $data['project_states'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 301));
        $data['tranning_type'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 401));

        $data['title'] = 'طلب اكتفاء ';
        if ($this->input->post('save')) {
//            $this->test($_POST);
            $page = $this->input->post('page');
            $last_id = $this->Ektfaa_talab_m->insert();
            if (in_array($page, array(1, 2))) {
//                $this->test($_POST);

                redirect('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $last_id);

            } else {
//                $this->test($_POST);

                $this->message('success', 'تم الاضافة بنجاح ');
                redirect('family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat');
            }
        }
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_add_view';
//        $this->test($data);
        $this->load->view('admin_index', $data);
    }

    function all_talabat()/*family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat*/
    {
        $data['title'] = 'طلب اكتفاء ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/all_ektfaa_talabt';
        $this->load->view('admin_index', $data);
    }

    private function upload_image_2($file_name, $folder = '')
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
            //  $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
    }

    function edite($id)/*family_controllers/osr_ektfaa/Ektfaa_talab/edite/*/
    {
        //   $data['files']= $this->Ektfaa_talab_m->get_by_attach('osr_ektfaa_mostndat');

        //  $this->test($data['result']);
        $data['one_dataa'] = $this->Ektfaa_talab_m->get_attach($id);
        //  $this->test($data['one_data']);
        $data['result'] = $this->Ektfaa_talab_m->getAllDetails($id);
        $data['project_type'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 201));
        $data['project_states'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 301));
        $data['tranning_type'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_setting', array('from_code' => 401));
        $data['nationalities'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 2));
        $data['education_level_array'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 8));
        $data['job_titles'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 3));
        $data['relationships'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 34));
        $data['marital_status_array'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 4));
        $data['house_own'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 13));
        $data['arr_type_house'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 14));

        $data['title'] = 'تعديل طلب اكتفاء ';
        if ($this->input->post('save')) {
//            $this->test($_POST);
            $page = $this->input->post('page');
            $this->Ektfaa_talab_m->update($id);

            if ($page == 5) {
                $files_names = array('national_card_img', 'sgel_img', 'location_img', 'other_img');
                foreach ($files_names as $value) {
                    $file_name = $value;
                    $file_array[$file_name] = $this->upload_image_2($file_name, 'family_attached/osr_ektfaa_mostndat');
                }
                $talab_id = $this->Ektfaa_talab_m->insert_attach($id, $file_array);
            }
            if (in_array($page, array(1, 2, 4, 5))) {
//                $this->test($_POST);

                redirect('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $id);

            } else {
//                $this->test($_POST);

                $this->message('success', 'تم التعديل بنجاح ');
                redirect('family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat');
            }
        }
        $data['one_data'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_talabat', array('id' => $id), 1);
        $data['file_num_data'] = $this->Ektfaa_talab_m->get_by('osr_ektfaa_talabat', array('id' => $id), 1);
        /*if (!empty($data['one_data'])) {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($data['one_data']['file_num']);
        }*/
//        $this->test($data);
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_edite_view';
        $this->load->view('admin_index', $data);
    }

    public function getFamilyTable()
    {
        $customer = $this->Ektfaa_talab_m->select_family_table(' ');
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];
                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];
                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $button = '<input type="radio" name="radio" data-father="' . $row['mother_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $row['file_num'] . '"
                      ondblclick="getFile_num(' . $row['file_num'] . ')">';
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
                $on_click_data = array('father' => $row['mother_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' => $row['file_num']);
                $arr['data'][] = array(
                    $this->add_link($x, $on_click_data),
                    $this->add_link($row['file_num'], $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

    public function getDetails()
    {

        $data['nationalities'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 2));
        $data['education_level_array'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 8));
        $data['job_titles'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 3));
        $data['relationships'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 34));
        $data['marital_status_array'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 4));
        $data['house_own'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 13));
        $data['arr_type_house'] = $this->Ektfaa_talab_m->get_by('family_setting', array('type' => 14));

        if ($_POST['type'] == 1) {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($_POST['file_num'], $_POST['id']);
        } else {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFilememberData($_POST['file_num'], $_POST['id']);

        }
//        $this->test($data);
        $this->load->view('admin/familys_views/osr_ektfaa_v/details_load_page', $data);
    }

    public function get_member()
    {


        $data['member_data'] = $this->Ektfaa_talab_m->get_member($_POST['file_num']);
//        $this->test($data);
        echo json_encode($data);
    }

    public function add_link($title, $arr)
    {
        /*   return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"
               data-father-card="' . $arr['father_card'] . '"
                data-mother="' . $arr['mother'] . '"
                ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';*/
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="get_select_data(' . $arr['file_num'] . ')">' . $title . '</a>';
    }

    function Delete($id)
    {
        $this->Ektfaa_talab_m->Delete($id);
        $this->message('success', 'تم الحذف بنجاح ');
        redirect('family_controllers/osr_ektfaa/Ektfaa_talab');
    }


function fetch_all_data()
{

    // Fetch member's records
    $i = $_POST['start'];
    $fetch_data = $this->Ektfaa_talab_m->getRows($_POST);
    $data = array();
    $x = 1;
    foreach ($fetch_data as $row) {
        $sub_array = array();
        $sub_array[] = $x++;
        $sub_array[] = $row['date_ar'];
        $sub_array[] = $row['file_num'];
        $sub_array[] = $row['mother_name'];
        $sub_array[] = '<a type="button"
                           class="btn btn-sm btn-info" data-toggle="modal"
                           data-target="#detailsModal" onclick="get_single_data(' . $row['id'] . ')"
                           style="padding: 3px 5px;line-height: 1;">
                            <i class="glyphicon glyphicon-list"></i>
                        </a> <a onclick="edite(' . $row['id'] . ')"><i class="fa fa-pencil"> </i></a>
                        <a onclick="delete_row(' . $row['id'] . ') " ><i class="fa fa-trash"> </i></a>
                        
                        
                        ';
        $data[] = $sub_array;
    }
    $output = array(
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => $this->Ektfaa_talab_m->get_all_data(),
        "recordsFiltered" => $this->Ektfaa_talab_m->get_filtered_data($_POST),
        "data" => $data
    );

    echo json_encode($output);
}
   /* function fetch_all_data()
    {

        // Fetch member's records
        $i = $_POST['start'];
        $fetch_data = $this->Ektfaa_talab_m->getRows($_POST);
        $data = array();
        $x = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $x++;
            $sub_array[] = $row['date_ar'];
            $sub_array[] = $row['file_num'];
            $sub_array[] = $row['mother_name'];
            $sub_array[] = '<a type="button"
                               class="btn btn-sm btn-info" data-toggle="modal"
                               data-target="#detailsModal" onclick="get_single_data(' . $row['id'] . ')"
                               style="padding: 3px 5px;line-height: 1;">
                                <i class="glyphicon glyphicon-list"></i>
                            </a> <a onclick="edite(' . $row['id'] . ')"><i class="fa fa-pencil"> </i></a>
                            <a onclick="delete_row(' . $row['id'] . ') " ><i class="fa fa-trash"> </i></a>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Ektfaa_talab_m->get_all_data(),
            "recordsFiltered" => $this->Ektfaa_talab_m->get_filtered_data($_POST),
            "data" => $data
        );

        echo json_encode($output);
    }*/

    function get_single_data()
    {
        $data['one_data'] = $this->Ektfaa_talab_m->fetch_single_data($_POST["id"]);
        if (!empty($data['one_data'])) {
            $data['file_num_data'] = $this->Ektfaa_talab_m->getFileNUmData($data['one_data']['file_num']);
        }
//        $this->test($data);
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_detailes';
        $this->load->view($data['subview'], $data);
    }


    public function get_interview_date()
    {

        $data['id'] = $_POST["id"];
        $data['title'] = '   تحديد ميعاد المقابلة ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_interview';
        $this->load->view($data['subview'], $data);
    }

    // get_reason
    public function get_reason()
    {

        $data['id'] = $_POST["id"];
        $data['title'] = '  سبب رفض الطلب ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/ektfaa_talab_reason';
        $this->load->view($data['subview'], $data);
    }

    public function add_reason_refuse()
    {
        $id = $_POST["id"];
        $this->Ektfaa_talab_m->add_reason_refuse($id);
    }

    public function add_interview_date()
    {
        $id = $_POST["id"];
        $this->Ektfaa_talab_m->add_interview_date($id);
    }

    ///yara_start31-1-2021
    function all_talabat_accept()/*family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat_accept*/
    {
        $data['title'] = ' طلبات الاكتفاء المقبولة ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/all_ektfaa_talabt_accept';
        $this->load->view('admin_index', $data);
    }

    function all_talabat_refuse()/*family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat_accept*/
    {
        $data['title'] = ' طلبات الاكتفاء المرفوضة ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/all_ektfaa_talabt_refuse';
        $this->load->view('admin_index', $data);
    }

    public function data()
    {
        $customer = $this->Ektfaa_talab_m->get_all_data_accept();
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    $row->id,
                    $row->date_ar,
                    $row->file_num,
                    $row->mokadem_talb,
                    $row->national_card,

                    $row->determine_mo2bla_publisher_name,
                    $row->determine_mo2bla_date,
                    $row->determine_mo2bla_time,
                     '
     <a target="_blank" href="'.base_url().'family_controllers/osr_ektfaa/Ektfaa_talab/start_interview/'. $row->id.'/'.$row->file_num.'" 
        class="btn btn-sm btn-warning"> <i class="fa fa-pencil-square " aria-hidden="true"></i> بدء المقابلة</a> 
  '     
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    public function start_interview($id,$file_num) 
    {
        $data['title'] = "بدء المقابلة";
        $data['id']=$id;
        $data['file_num']=$file_num;
        $data['branch2'] = $this->Ektfaa_talab_m->get_from(2);
        $data['branch'] = $this->Ektfaa_talab_m->get_from(1);
      $data['evaluations'] = $this->Ektfaa_talab_m->get_all_evaluations($id);
      if(!empty($data['evaluations'][0])){
      $data['details'] = $this->Ektfaa_talab_m->get_one_details($data['evaluations'][0]->id,$data['evaluations'][0]->file_num);}
      $this->load->model("familys_models/talbat_m/Talb_main_model");
      $data['file_num_data'] = $this->Talb_main_model->getFileNUmData($file_num);
        if ($this->input->post('add')) {

            $this->Ektfaa_talab_m->insert_data();
           $this->message('success', 'تم الاضافة بنجاح');
            redirect('family_controllers/osr_ektfaa/Ektfaa_talab/start_interview/'. $id.'/'.$file_num, 'refresh');
        }
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/start_interview';
        $this->load->view('admin_index', $data);
    }

    public function updateEvaluation($id, $file_num, $talb_id_fk)
    {
        //$this->test($_POST);
        $this->Ektfaa_talab_m->update_data($id);
        $this->message('success', 'تم التعديل بنجاح');
        redirect('family_controllers/osr_ektfaa/Ektfaa_talab/start_interview/' . $talb_id_fk . '/' . $file_num, 'refresh');
    }

    //////////////////////////yara////////////
    public function add_morfaq()
    {
        $id = $this->input->post('row');

        $images = $this->upload_muli_file("files");

        $this->Ektfaa_talab_m->insert_attach_talb($id, $images);

    }

    public function get_attaches()
    {
        $rkm = $this->input->post('rkm');
        $data['rkm'] = $this->input->post('rkm');
        $data['one_data'] = $this->Ektfaa_talab_m->get_attach($rkm);

        $this->load->view('admin/familys_views/osr_ektfaa_v/get_table_attaches', $data);
    }

    public function Delete_attach()
    {
        $id = $this->input->post('id');
        $this->Ektfaa_talab_m->delete_attach($id);


    }

    private function upload_muli_file($input_name)
    {
        //  $this->test($_FILES[$input_name]['name']);
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }

    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/family_attached/osr_ektfaa_mostndat';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    function all_talabat_new()/*family_controllers/osr_ektfaa/Ektfaa_talab/all_talabat_new*/
    {
        $data['title'] = 'طلبات اكتفاء الواردة  ';
        $data['subview'] = 'admin/familys_views/osr_ektfaa_v/all_ektfaa_talabt_new';
        $this->load->view('admin_index', $data);
    }

    function fetch_all_data_new()
    {

        // Fetch member's records
        $i = $_POST['start'];
        $fetch_data = $this->Ektfaa_talab_m->getRows_new($_POST);
        $data = array();
        $x = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $x++;
            $sub_array[] = $row['date_ar'];
            $sub_array[] = $row['file_num'];
            $sub_array[] = $row['mother_name'];
            $sub_array[] = '<a type="button"
                           class="btn btn-sm btn-info" data-toggle="modal"
                           data-target="#detailsModal" onclick="get_single_data(' . $row['id'] . ')"
                           style="padding: 3px 5px;line-height: 1;">
                            <i class="glyphicon glyphicon-list"></i>
                        </a> <a onclick="edite(' . $row['id'] . ')"><i class="fa fa-pencil"> </i></a>
                        <a onclick="delete_row(' . $row['id'] . ') " ><i class="fa fa-trash"> </i></a>
                     

                            <button 
                            class="brn btn-warning"
                            onclick="make_action(' . $row['id'] . ')">
                            <i class="fa fa-archive"> </i>الاجراء</button>
                        
                        ';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Ektfaa_talab_m->get_all_data(),
            "recordsFiltered" => $this->Ektfaa_talab_m->get_filtered_data($_POST),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function data_refuse()
    {
        $customer = $this->Ektfaa_talab_m->get_all_data_refuse();
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    $row->id,
                    $row->date_ar,
                    $row->file_num,
                    $row->mokadem_talb,
                    $row->national_card,
                    $row->reason_refuse,
                    $row->action_time,
                    $row->action_publisher_name,


                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
}