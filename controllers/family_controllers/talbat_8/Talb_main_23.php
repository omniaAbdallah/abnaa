<?php

class Talb_main extends MY_Controller
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
        $this->load->model("familys_models/talbat_m/Talb_main_model");
        $this->load->model("familys_models/talbat_m/Talb_electric_device_model");
        $this->load->model("familys_models/talbat_m/Talb_syana_electric_device_model");
        $this->load->model("familys_models/talbat_m/Talb_sadad_fatora_model");
        $this->load->model("familys_models/talbat_m/Talb_syana_house_model");


        $this->load->model("Difined_model");
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

    private function upload_all_file($file_name)
    {
        $path = 'uploads/family_attached/osr_talbat_files';
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

    private function upload_muli_file($input_name)
    {
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


//-----------------------------------------
    public function index()
    {     // family_controllers/talbat/Talb_main
        $data['title'] = 'طلب الاجهزة الكهربائية  ';
        /*        $data['categories'] = $this->Talb_main_model->select_categories();*/
        $data['categories'] = $this->Talb_main_model->get_by('osr_serv_khdmat_settings');

        $data['records'] = $this->Talb_main_model->select_all();
        $data['subview'] = 'admin/familys_views/talbat_v/main_talb_v/talb_main_v';
        $this->load->view('admin_index', $data);
    }

    public function insert()
    {
        $images = $this->upload_muli_file("file");
        $main_id = $this->Talb_main_model->insert();
        $type_service_id_fk = $this->input->post('type_sevice');
        switch ($type_service_id_fk) {
            case 1:
                $talab_id = $this->Talb_electric_device_model->insert($main_id);
                break;
            case 2:
                $talab_id = $this->Talb_syana_electric_device_model->insert($main_id);
                break;
            case 3:
                $talab_id = $this->Talb_sadad_fatora_model->insert($main_id);
                break;
            case 4:
                $talab_id = $this->Talb_syana_house_model->insert($main_id);
                break;
            default:
                break;
        }
//        $electric_device_id = $this->Talb_electric_device_model->select_last();
        $this->Talb_main_model->insert_attach($main_id, $images);
        $this->message('success', 'تمت الاضافة ');
        redirect('family_controllers/talbat/Talb_main', 'refresh');
    }

    public function update($id)
    {
//         $this->test($_POST);
        $main_id = $this->Talb_main_model->update($id);
        $main_data = $this->Talb_main_model->getAllDetails($id);
        $talab_id = $this->input->post('talab_id');

        if (!empty($main_data)) {
            $type_service_id_fk = $main_data['type_sevice'];
            switch ($type_service_id_fk) {
                case 1:
                    $this->Talb_electric_device_model->update($main_id);
                    break;
                case 2:
                    $this->Talb_syana_electric_device_model->update($main_id);
                    break;
                case 3:
                    $this->Talb_sadad_fatora_model->update($main_id);
                    break;
                case 4:
                    $this->Talb_syana_house_model->update($main_id);
                    break;
                default:
                    break;
            }
            if (!empty($_FILES)) {
                $images = $this->upload_muli_file("file");
                if (!empty($images)) {
                    $this->Talb_main_model->insert_attach($main_id, $images);
                }
            }
        }
        $this->message('success', 'تمت التعديل ');
        redirect('family_controllers/talbat/Talb_main/edit/' . $id, 'refresh');
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';
        $data['morfqat'] = $this->Talb_main_model->get_by('osr_talbat_main_files', array('main_id_fk' => $id));
        $data['categories'] = $this->Talb_main_model->get_by('osr_serv_khdmat_settings');

        $data['main_data'] = $this->Talb_main_model->getAllDetails($id);
        if (!empty($data['main_data'])) {
            $type_service_id_fk = $data['main_data']['type_sevice'];
            $data['file_num_data'] = $this->Talb_main_model->getFileNUmData($data['main_data']['file_num']);
            $data['load_details'] = ('admin/familys_views/talbat_v/main_talb_v/details_load_page');

            switch ($type_service_id_fk) {
                case 1:
                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 301));
                    $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                    $data['result'] = $this->Talb_electric_device_model->getAllDetails($id);

                    $data['load_page'] = ('admin/familys_views/talbat_v/electric_device/talb_electric_device_v');
                    break;
                case 2:
                    $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 401));
                    $data['device_status'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 202));
                    $data['result'] = $this->Talb_syana_electric_device_model->getAllDetails($id);

                    $data['load_page'] = ('admin/familys_views/talbat_v/syana_electric_device/talb_syana_electric_device_v');
                    break;
                case 3:

                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 601));
                    $data['type_fatora'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 501));
                    $data['result'] = $this->Talb_sadad_fatora_model->getAllDetails($id);

                    $data['load_page'] = ('admin/familys_views/talbat_v/sadad_fatora/talb_sadad_fatora_v');
                    break;
                case 4:

                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 901));
                    $data['type_syana'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 701));
                    $data['syana_place'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 801));
                    $data['house_own'] = $this->Talb_main_model->get_by('family_setting', array('type' => 13));
                    $data['arr_type_house'] = $this->Talb_main_model->get_by('family_setting', array('type' => 14));
                    $data['house_state'] = $this->Talb_main_model->get_by('family_setting', array('type' => 22));
                    $data['result'] = $this->Talb_syana_house_model->getAllDetails($id);

                    $data['load_page'] =('admin/familys_views/talbat_v/syana_house/edite_talb_syana_house_v');
                    break;
                default:
                    echo '';
            }
        }

        $data['title'] = 'طلب الاجهزة الكهربائية  ';
        $data['subview'] = 'admin/familys_views/talbat_v/main_talb_v/talb_main_v';
        $this->load->view('admin_index', $data);
    }


    public function Delete($rkm)
    {
        $data['main_data'] = $this->Talb_main_model->getAllDetails($rkm);
        if (!empty($data['main_data'])) {
            $type_service_id_fk = $data['main_data']['type_sevice'];
            switch ($type_service_id_fk) {
                case 1:
                    $this->Talb_electric_device_model->Delete($rkm);
                    break;
                case 2:
                    $this->Talb_syana_electric_device_model->Delete($rkm);
                    break;
                case 3:
                    $this->Talb_sadad_fatora_model->Delete($rkm);
                    break;
                    case 4:
                    $this->Talb_syana_house_model->Delete($rkm);
                    break;
                default:
                    echo '';
            }
        }
        $this->Talb_main_model->Delete($rkm);

        $this->message('success', 'تمت الحذف ');
        redirect('family_controllers/talbat/Talb_main', 'refresh');
    }

    public function  print($id)
    {
        $data['title'] = 'طباعة    طلب الاجهزة الكهربائية';

        $data['main_data'] = $this->Talb_main_model->getAllDetails($id);
        if (!empty($data['main_data'])) {
            $type_service_id_fk = $data['main_data']['type_sevice'];
            $data['file_num_data'] = $this->Talb_main_model->getFileNUmData($data['main_data']['file_num']);
            $data['load_details'] = ('admin/familys_views/talbat_v/main_talb_v/details_load_page');

            switch ($type_service_id_fk) {
                case 1:
                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 301));
                    $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                    $data['result'] = $this->Talb_electric_device_model->getAllDetails($id);
                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 301));
                    $data['family_members_num'] = $this->Talb_main_model->getFamilyNum($data['result']['mother_national_num']);
                    $this->load->view('admin/familys_views/talbat_v/electric_device/print', $data);
                    break;
                case 2:
                    $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 401));
                    $data['device_status'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 202));
                    $data['result'] = $this->Talb_syana_electric_device_model->getAllDetails($id);
                    $data['family_members_num'] = $this->Talb_main_model->getFamilyNum($data['result']['mother_national_num']);
                    $this->load->view('admin/familys_views/talbat_v/syana_electric_device/print', $data);
                    break;
                case 3:

                    $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 601));
                    $data['type_fatora'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 501));
                    $data['result'] = $this->Talb_sadad_fatora_model->getAllDetails($id);
                    $data['family_members_num'] = $this->Talb_sadad_fatora_model->getFamilyNum($data['result']['mother_national_num']);
                    $this->load->view('admin/familys_views/talbat_v/sadad_fatora/print', $data);
                    break;
                    case 4:

                        $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 901));
                        $data['type_syana'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 701));
                        $data['syana_place'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 801));
                        $data['house_own'] = $this->Talb_main_model->get_by('family_setting', array('type' => 13));
                        $data['arr_type_house'] = $this->Talb_main_model->get_by('family_setting', array('type' => 14));
                        $data['house_state'] = $this->Talb_main_model->get_by('family_setting', array('type' => 22));
                        $data['result'] = $this->Talb_sadad_fatora_model->getAllDetails($id);
                    $data['family_members_num'] = $this->Talb_sadad_fatora_model->getFamilyNum($data['result']['mother_national_num']);
                    $this->load->view('admin/familys_views/talbat_v/syana_house/print', $data);
                    break;
                default:
                    echo '';
            }
        }


    }


    /*31-1-21-om strat*/

    public function process_transform_to_mowazf_mokhtas()
    {
        $post = $this->input->post(null, true);
        /*    echo '<pre>';
            print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_main_model->add_emp_transform($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_main_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_main_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_to_moder_edara()
    {
        $post = $this->input->post(null, true);
        /*    echo '<pre>';
            print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_main_model->add_emp_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_main_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_main_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_moder()
    {
        $post = $this->input->post(null, true);
        /*  echo '<pre>';
          print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Talb_main_model->add_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Talb_main_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Talb_main_model->get_emp($post['to_person_id'], 'employee');
    }

    function all_transformed()
    {
        $this->load->model('Model_family_cashing');
        $data['records'] = $this->Talb_main_model->get_transformed();
        $data['title'] = ' الطلبات المحولة ';
        $data['subview'] = 'admin/familys_views/talbat_v/main_talb_v/all_transformed';
        $this->load->view('admin_index', $data);
    }

    function update_seen_main_taleb()
    {
        $this->Talb_main_model->update_seen_main_taleb();
    }
} // END CLASS