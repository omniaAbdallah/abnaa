<?php

class Talb_service extends MY_Controller
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
        $this->load->model("familys_models/talbat_m/Talb_service_model");

    }

//--------------------------------------------------
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

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

    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays = round($time / (60 * 60 * 24));
        $HYear = round($TDays / 354.37419);
        $Remain = $TDays - ($HYear * 354.37419);
        $HMonths = round($Remain / 29.531182);
        $HDays = $Remain - ($HMonths * 29.531182);
        $HYear = $HYear + 1389;
        $HMonths = $HMonths + 10;
        $HDays = $HDays + 23;
        if ($HDays > 29.531188 and round($HDays) != 30) {
            $HMonths = $HMonths + 1;
            $HDays = Round($HDays - 29.531182);
        } else {
            $HDays = Round($HDays);
        }
        if ($HMonths > 12) {
            $HMonths = $HMonths - 12;
            $HYear = $HYear + 1;
        }
        $NowDay = $HDays;
        $NowMonth = $HMonths;
        $NowYear = $HYear;
        $MDay_Num = date("w");
        if ($MDay_Num == "0") {
            $MDay_Name = "الأحد";
        } elseif ($MDay_Num == "1") {
            $MDay_Name = "الإثنين";
        } elseif ($MDay_Num == "2") {
            $MDay_Name = "الثلاثاء";
        } elseif ($MDay_Num == "3") {
            $MDay_Name = "الأربعاء";
        } elseif ($MDay_Num == "4") {
            $MDay_Name = "الخميس";
        } elseif ($MDay_Num == "5") {
            $MDay_Name = "الجمعة";
        } elseif ($MDay_Num == "6") {
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name . "، " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";

        return $HYear;
    }
//--------------------------------------------------

//-------------------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

//-----------------------------------------
    public function index()
    {     // family_controllers/talbat/Talb_service

        $data['title'] = 'طلب خدمة رعاية';
        $data['service'] = $this->Talb_service_model->select_all_service();
        $data['records'] = $this->Talb_service_model->select_all();
        $data['subview'] = 'admin/familys_views/talbat_v/service/Talb_service_v';
        $this->load->view('admin_index', $data);
    }

    public function getDetails()
    {

        $data['file_num_data'] = $this->Talb_service_model->getFileNUmData($_POST['file_num']);
        $data['afrad_num'] = $this->Talb_service_model->getFamilyNum($data['file_num_data']['mother_national_num']);
        $data['mother_num'] = $this->Talb_service_model->get_mother_status($data['file_num_data']['mother_national_num']);
        $data['family_members_num'] = $data['afrad_num'] + $data['mother_num'];
        $data['family_members'] = $this->Talb_service_model->family_member($_POST['file_num']);

        $this->load->view('admin/familys_views/talbat_v/service/details_load_page', $data);
    }

    public function getFamilyTable()
    {
        $customer = $this->Talb_service_model->select_family_table(' ');

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

    public function add_link($title, $arr)
    {
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';
    }

    public function insert()
    {
        if ($this->input->post('save') === 'save') {
            $this->Talb_service_model->insert();
        }
        $this->message('success', 'تمت الاضافة ');
        redirect('family_controllers/talbat/Talb_service', 'refresh');
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $data['service'] = $this->Talb_service_model->select_all_service();
        $data['result'] = $this->Talb_service_model->getAllDetails($id);
        $data['family_members_num'] = $this->Talb_service_model->getFamilyNum($data['result']['mother_national_num']);
        $data['family_members'] = $this->Talb_service_model->family_member($data['result']['file_num']);
        $data['title'] = 'طلب خدمة رعاية';
        $data['subview'] = 'admin/familys_views/talbat_v/service/Talb_service_v';
        $this->load->view('admin_index', $data);
    }

    public function update($id)
    {
        if ($this->input->post('save') === 'save') {
            $this->Talb_service_model->update($id);
            $this->message('success', 'تمت الاضافة ');
            redirect('family_controllers/talbat/Talb_service', 'refresh');

        }
    }

    public function Delete($rkm)
    {
        $this->Talb_service_model->Delete($rkm);
        $this->message('success', 'تمت الحذف ');
        redirect('family_controllers/talbat/Talb_service', 'refresh');
    }

    public function  print($id)
    {
        $data['service'] = $this->Talb_service_model->select_all_service();
        $data['result'] = $this->Talb_service_model->getAllDetails($id);
        $data['family_members_num'] = $this->Talb_service_model->getFamilyNum($data['result']['mother_national_num']);
        $data['title'] = 'طباعة  طلب خدمة رعاية';
        $this->load->view('admin/familys_views/talbat_v/service/print', $data);
    }

    ///////////////////////////////
    //////////////////new_funcccc/////////////////////////////////////
    public function add_picture()
    {

        $id = $this->input->post('id');
        $data['title'] = 'إضافة  مرفقات';
        $data['talab_rkm_fk'] = $this->input->post('id');
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_service_files';
        $data['morfqat'] = $this->Talb_service_model->get_table('osr_talbat_service_files', array('talab_rkm_fk' => $id));
        $this->load->view('admin/familys_views/talbat_v/service/add_picture', $data);
    }

    public function load()
    {

        $id = $this->input->post('id');
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_service_files';
        $data['morfqat'] = $this->Talb_service_model->get_table('osr_talbat_service_files', array('talab_rkm_fk' => $id));
        $this->load->view('admin/familys_views/talbat_v/service/load', $data);
    }

    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/family_attached/osr_talbat_service_files/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    private function upload_all_file($file_name, $id)
    {
        $path = 'uploads/family_attached/osr_talbat_service_files';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function upload_muli_file($input_name, $id)
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile", $id);
        }
        return $all_img;
    }

    public function upload_img()
    {

        $id = $this->input->post('row');
        $images = $this->upload_muli_file("files", $id);
        $this->Talb_service_model->insert_attach($id, $images);
    }

    public function delete_upload($id)
    {

        $img = $this->Talb_service_model->get_table_by_id('osr_talbat_service_files', array('id' => $id));
        $path = 'uploads/family_attached/osr_talbat_service_files';
        if (file_exists($path . "/" . $img->file)) {
            unlink(FCPATH . "" . $path . "/" . $img->file);
        }
    }

    public function delete_morfq()
    {

        $id = $this->input->post('id');
        $this->delete_upload($id);
        $this->Talb_service_model->delete_morfq($id);
    }

    /////////new_funcc
    public function GetTransferPage()

    {

        $id = $_POST['id'];
        $data['result'] = $this->Talb_service_model->getAllDetails($id);
        $data['service'] = $this->Talb_service_model->select_all_service();
        $data['family_members_num'] = $this->Talb_service_model->getFamilyNum($data['result']['mother_national_num']);
        $data['family_members'] = $this->Talb_service_model->family_member($data['result']['file_num']);
        $data['folder'] = 'uploads/family_attached/osr_talbat_service_files';
        $data['one_data'] = $this->Talb_service_model->get_table('osr_talbat_service_files', array('talab_rkm_fk' => $id));

        $data['bahth'] = $this->Talb_service_model->get_all_emps_egraat(802);
        $data['moder_edara'] = $this->Talb_service_model->get_all_emps_egraat(801);
        $data['talab_history'] = $this->Talb_service_model->get_all_history($id);

        $this->load->view('admin/familys_views/talbat_v/service/GetProcedureActionPage', $data);

    }

    public function process_transform_to_bahth()
    {
        $post = $this->input->post(null, true);
        /*    echo '<pre>';
            print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_service_model->add_emp_transform($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_service_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_service_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_to_moder_edara()
    {
        $post = $this->input->post(null, true);
        /*    echo '<pre>';
            print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_service_model->add_emp_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_service_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_service_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_moder()
    {
        $post = $this->input->post(null, true);
        /*  echo '<pre>';
          print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_service_model->add_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_service_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_service_model->get_emp($post['to_person_id'], 'employee');
    }

    function all_transformed()
    {
        $this->load->model('Model_family_cashing');
        $data['records'] = $this->Talb_service_model->get_transformed();
        $data['service'] = $this->Talb_service_model->select_all_service();

        $data['title'] = ' الطلبات المحولة ';
        $data['subview'] = 'admin/familys_views/talbat_v/service/all_transformed';
        $this->load->view('admin_index', $data);
    }

    function update_seen_taleb_service()
    {
        $this->Talb_service_model->update_seen_taleb_service();
    }
} // END CLASS