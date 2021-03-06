<?php
class Ta3mem_c extends MY_Controller
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
        $this->load->model("human_resources_model/ta3mem_models/Ta3mem_model");
    }
//--------------------------------------------------
    public function index()
    {     // human_resources/ta3mem/Ta3mem_c
        $data['records'] = $this->Ta3mem_model->select_all();
        //$this->test($data['records']);
        $data['title'] = 'إضافة تعميم';
        //$data['emp_data'] = $this->Ta3mem_model->select_depart();
        $data['emp_data'] = $this->Ta3mem_model->select_all_emp();
        $data['subview'] = 'admin/Human_resources/ta3mem_v/ta3mem/ta3mem_emp';
        $this->load->view('admin_index', $data);
    }
    public function update($id)
    {     // human_resources/ta3mem/Ta3mem_c
        //$data['records'] = $this->Ta3mem_model->select_all();
        $data['result'] = $this->Ta3mem_model->select_by_id($id);
        //  $this->test($data['result']);
        if ($this->input->post('save') === 'save') {
            // $img = 'file';
            $img_t3mem = 'img';
            // $img_file = $this->upload_image_2($img, 'human_resources/ta3mem');
            $img = $this->upload_image_2($img_t3mem, 'human_resources/ta3mem');
            //   $this->test($img);
            // print_r($_POST);
            $this->Ta3mem_model->insert($id, $img);
            $this->message('success', 'تمت الاضافة ');
            redirect('human_resources/ta3mem/Ta3mem_c', 'refresh');
        }
        $data['title'] = 'تعديل تعميم';
        //$data['emp_data'] = $this->Ta3mem_model->select_depart();
        $data['emp_data'] = $this->Ta3mem_model->select_all_emp();
        $data['subview'] = 'admin/Human_resources/ta3mem_v/ta3mem/ta3mem_emp';
        $this->load->view('admin_index', $data);
    }
//-------------------------------------------------
    public function load_tahwel()
    {
        $type = $this->input->post('type');
        if ($type == 1) {
            $data['all'] = $this->Ta3mem_model->get_all_edarat();
            $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/load_tahwel', $data);
        } else if ($type == 2) {
            $data['all'] = $this->Ta3mem_model->get_all_emps(0);
            $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/load_tahwel_employee', $data);
        }
    }
//-----------------------------------------
    public function getConnection_emp()
    {
        $all_Emps = $this->Ta3mem_model->get_all_edarat();
        //    $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
                $arr_emp['data'][] = array(
                    '<input type="checkbox" name="choosed" value="' . $row_emp->id . '"
                       onclick="Get_emp_Name(this)"
                       class="checkbox  radio"
                        id="myCheck' . $row_emp->id . '"
                        data-edara_n="' . $row_emp->title . '"
                        data-edara_id="' . $row_emp->id . '"/>'
                ,
                    $row_emp->title,
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }
    public function read_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/human_resources/ta3mem/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Disposition: filename="' . $file_name . '"');
        //header('Content-Discription:inline; filename="'.$name.'"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    public function insert($id = 0)
    {
        if ($this->input->post('save') === 'save') {
            // $img = 'file';
            $img_t3mem = 'img';
            // $img_file = $this->upload_image_2($img, 'human_resources/ta3mem');
            $img = $this->upload_image_2($img_t3mem, 'human_resources/ta3mem');
            //print_r($_POST);
            // $this->test($_POST);
            if ($this->input->post('type') == 1) {
                $this->Ta3mem_model->insert($id = 0, $img);
            } else if ($this->input->post('type') == 2) {
                $this->Ta3mem_model->insert_emp($img);
            }
        }
        $this->message('success', 'تمت الاضافة ');
        redirect('human_resources/ta3mem/Ta3mem_c', 'refresh');
    }
    private function upload_image_2($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //   $this->thumb($datafile, $folder);
            return $datafile['file_name'];
        }
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
    public function Delete_namozeg($rkm)
    {
        $this->Ta3mem_model->Delete($rkm);
        $this->Ta3mem_model->Delete_details($rkm);
        redirect('human_resources/ta3mem/Ta3mem_c', 'refresh');
        $this->message('success', 'تمت الحذف ');
    }
    public function get_all_data()
    {
        $id = $this->input->post('id');
        $data['records'] = $this->Ta3mem_model->get_all_emp($id);
        $data['path'] = "uploads/human_resources/ta3mem";
        $data['one_data'] = $this->Ta3mem_model->get_attach($id);
        $data['get_all'] = $this->Ta3mem_model->select_by_id($id);
        $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/getDetailsDiv', $data);
    }
    public function reply_dawa()
    {
        $this->Ta3mem_model->reply_dawa();
    }
    public function check_d3wa()
    {
        $da3wat = $this->Ta3mem_model->get_unseen_ta3mem();
        $adv = $this->Ta3mem_model->get_unseen_adv();
        $msg = $this->Ta3mem_model->get_unseen_msg();
        //   echo 'id='. $da3wat['t3mem']->id;
        if ($da3wat->id == '') {
            $data['da3wat_t3mem'] = '';
        } elseif ($da3wat->id != '') {
            $data['da3wat_t3mem'] = $this->Ta3mem_model->get_unseen_ta3mem();
            $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/da3wa_load', $data);
        }
        if ($adv->id == '') {
            $data['da3wat_adv'] = '';
        } elseif ($adv->id != '') {
            $data['da3wat_adv'] = $this->Ta3mem_model->get_unseen_adv();
            $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/da3wa_load', $data);
        }
        if ($msg->id == '') {
            $data['da3wat_msg'] = '';
        } elseif ($msg->id != '') {
            $data['da3wat_msg'] = $this->Ta3mem_model->get_unseen_msg_new();
            $this->load->view('admin/Human_resources/ta3mem_v/msg/da3wa_load', $data);
        }
        //  $this->test($data['da3wat_msg']);
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    //yara23-9-2020
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function thumb($data, $folder = '')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        if (!empty($folder)) {
            $config['new_image'] = 'uploads/' . $folder . '/thumbs/' . $data['file_name'];
        } else {
            $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        }
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
    //////////////////////////مرفقات///////////////////////////////////////
    public function add_attaches($id)//human_resources/ta3mem/Ta3mem_c/add_attaches
    {
        $data['ta3mem_id_fk'] = $id;
        $data['path'] = "uploads/human_resources/ta3mem";
        $data['title'] = 'مرفقات   ';
        $data['subview'] = 'admin/Human_resources/ta3mem_v/ta3mem/add_attaches';
        $this->load->view('admin_index', $data);
    }
    public function add_morfaq()
    {
        $rkm = $this->input->post('row');
        $images = $this->upload_muli_file("files");
        $this->Ta3mem_model->insert_attach($images);
    }
    public function get_attaches()
    {
        $rkm = $this->input->post('rkm');
        $data['rkm'] = $this->input->post('rkm');
        $data['one_data'] = $this->Ta3mem_model->get_attach($rkm);
        $this->load->view('admin/Human_resources/ta3mem_v/ta3mem/get_table_attaches', $data);
    }
    public function Delete_attach()
    {
        $id = $this->input->post('id');
        $this->Ta3mem_model->delete_attach($id);
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
        $config['upload_path'] = 'uploads/human_resources/ta3mem';
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
    public function send_all_t3mem()
    {
        $id = $this->input->post('id');
        $this->Ta3mem_model->send_all_t3mem($id);
    }
    // public function download_file($file)
    // {
    //     $this->load->helper('download');
    //     $type = pathinfo($file)['extension'];
    //     $data = file_get_contents('uploads/human_resources/ta3mem/'. $file);
    //     force_download($data);
    // }
    public function download_file($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/human_resources/ta3mem/' . $file);
        force_download($name, $data);
    }
} // END CLASS