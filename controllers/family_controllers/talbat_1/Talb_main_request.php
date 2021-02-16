<?php


class Talb_main_request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
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

    function get_select_data()
    {
        $data['data'] = $this->Talb_main_model->get_by('osr_serv_khdmat_fe2a_setting', array('no3_khdma_id_fk' => $_POST['f2a_service_id_fk']));
        echo json_encode($data);

    }

    function get_form_data()
    {
        $type_service_id_fk = $this->input->post('type_service_id_fk');
        switch ($type_service_id_fk) {
            case 1:
                $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 301));
                $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                $this->load->view('admin/familys_views/talbat_v/electric_device/talb_electric_device_v', $data);
                break;
            case 2:
                $data['type_device'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 201));
                $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 401));
                $data['device_status'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 202));
                $this->load->view('admin/familys_views/talbat_v/syana_electric_device/talb_syana_electric_device_v', $data);
                break;
            case 3:
                $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 601));
                $data['type_fatora'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 501));
                $this->load->view('admin/familys_views/talbat_v/sadad_fatora/talb_sadad_fatora_v', $data);
                break;
            case 4:
                $data['mobrerat'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 901));
                $data['type_syana'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 701));
                $data['syana_place'] = $this->Talb_main_model->get_by('osr_talbat_setting', array('from_code' => 801));
                $data['house_own'] = $this->Talb_main_model->get_by('family_setting', array('type' => 13));
                $data['arr_type_house'] = $this->Talb_main_model->get_by('family_setting', array('type' => 14));
                $data['house_state'] = $this->Talb_main_model->get_by('family_setting', array('type' => 22));

                $this->load->view('admin/familys_views/talbat_v/syana_house/talb_syana_house_v', $data);
                break;
            default:
                echo '';
        }
    }

    public function add_link($title, $arr)
    {
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';
    }

    public function getDetails()
    {
        $data['file_num_data'] = $this->Talb_main_model->getFileNUmData($_POST['file_num']);
        $this->load->view('admin/familys_views/talbat_v/main_talb_v/details_load_page', $data);
    }

    public function getFamilyTable()
    {
        $type_service_id_fk = $this->input->post('type_service_id_fk');
        switch ($type_service_id_fk) {
            case 1:
                $osra_in = $this->Talb_electric_device_model->get_osra_in();
                break;
            case 2:
                $osra_in = $this->Talb_syana_electric_device_model->get_osra_in();
                break;
            case 3:
                $osra_in = $this->Talb_sadad_fatora_model->get_osra_in();
                break;
                case 4:
                $osra_in = $this->Talb_syana_house_model->get_osra_in();
                break;
            default:
                $osra_in = array();
        }
        $customer = $this->Talb_main_model->select_family_table($osra_in);
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

    public function getselect()
    {
        $data["mother"] = $this->Talb_main_model->select_search_mother($_POST['file_num']);
        $data["member"] = $this->Talb_main_model->select_search_member($_POST['file_num']);
        // $this->test($data);
        $this->load->view('admin/familys_views/talbat_v/main_talb_v/get_select_page', $data);
    }

    public function add_picture()
    {
        $id = $this->input->post('id');
        $data['title'] = 'إضافة  مرفقات';
        $data['talab_rkm_fk'] = $this->input->post('id');
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';
        $data['morfqat'] = $this->Talb_main_model->get_by('osr_talbat_main_files', array('main_id_fk' => $id));
        $this->load->view('admin/familys_views/talbat_v/main_talb_v/add_picture', $data);
    }

    public function load()
    {
        $id = $this->input->post('id');
        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';
        $data['morfqat'] = $this->Talb_main_model->get_by('osr_talbat_main_files', array('main_id_fk' => $id));
        $this->load->view('admin/familys_views/talbat_v/main_talb_v/load', $data);
    }

    public function download_file($id, $type = 3)
    {
        $this->load->helper('download');
        $name_folder = "osr_talbat_files";
        $type = pathinfo($id)['extension'];
        $data = file_get_contents('family_attached/osr_talbat_files/' . $id);
        $name = $id . '.' . $type;
        force_download($name, $data);
    }

    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/family_attached/osr_talbat_files/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function upload_img()
    {
        $id = $this->input->post('row');
        $images = $this->upload_muli_file("files", $id);
        $this->Talb_main_model->insert_attach($id, $images);
    }


    public function delete_morfq()
    {
        $id = $this->input->post('id');
        $this->Talb_main_model->delete_upload($id);
        $this->Talb_main_model->delete_morfq($id);
    }

    public function GetTransferPage()
    {
        $id = $_POST['id'];
        $data['mowazf_mokhtas'] = $this->Talb_main_model->get_all_emps_egraat(803);
        $data['moder_edara'] = $this->Talb_main_model->get_all_emps_egraat(801);
        $data['talab_history'] = $this->Talb_main_model->get_all_history($id);

        $data['folder_path'] = 'uploads/family_attached/osr_talbat_files';
        $data['morfqat'] = $this->Talb_main_model->get_by('osr_talbat_main_files', array('main_id_fk' => $id));

        $data['main_data'] = $this->Talb_main_model->getAllDetails($id);
        if (!empty($data['main_data'])) {
            $type_service_id_fk = $data['main_data']['type_sevice'];
            $data['file_num_data'] = $this->Talb_main_model->getFileNUmData($data['main_data']['file_num']);
            $data['load_details'] = ('admin/familys_views/talbat_v/main_talb_v/details_load_page');
            switch ($type_service_id_fk) {
                case 1:
                    $data['result'] = $this->Talb_electric_device_model->getAllDetails_data($id);
                    $data['load_page'] = ('admin/familys_views/talbat_v/electric_device/detalis_load');
                    break;
                case 2:
                    $data['result'] = $this->Talb_syana_electric_device_model->getAllDetails_data($id);
                    $data['load_page'] = ('admin/familys_views/talbat_v/syana_electric_device/detalis_load');
                    break;
                case 3:
                    $data['result'] = $this->Talb_sadad_fatora_model->getAllDetails_data($id);
                    $data['load_page'] = ('admin/familys_views/talbat_v/sadad_fatora/detalis_load');
                    break;
                case 4:
                    $data['result'] = $this->Talb_syana_house_model->getAllDetails_data($id);
                    $data['load_page'] = ('admin/familys_views/talbat_v/syana_house/detalis_load');
                    break;
                default:
                    echo '';
            }
        }


        $this->load->view('admin/familys_views/talbat_v/main_talb_v/GetProcedureActionPage', $data);
    }
}