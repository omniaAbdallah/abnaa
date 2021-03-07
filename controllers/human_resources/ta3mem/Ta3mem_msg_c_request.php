<?php

class Ta3mem_msg_c_request extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        if ($this->session->userdata('is_logged_in') == 0) {

            echo 'login';

        }

        $this->load->model("human_resources_model/ta3mem_models/Ta3mem_msg_model");

    }

//--------------------------------------------------

    private function test($data = array())

    {

        echo "<pre>";

        print_r($data);

        echo "</pre>";

        die;

    }

    // public function load_tahwel()

    // {

    //     $type = $this->input->post('type');

    //     if ($type == 1) {

    //         $data['all'] = $this->Ta3mem_msg_model->get_all_edarat();

    //         $this->load->view('admin/Human_resources/ta3mem_v/msg/load_tahwel', $data);

    //     } else if ($type == 2) {

    //         $data['all'] = $this->Ta3mem_msg_model->get_all_emps(0);

    //         $this->load->view('admin/Human_resources/ta3mem_v/msg/load_tahwel_employee', $data);

    //     }

    // }

  

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

    public function get_all_data()

    {

        $id = $this->input->post('id');

        $data['path'] = "uploads/human_resources/ta3mem";

        $data['records'] = $this->Ta3mem_msg_model->get_all_emp($id);

        $data['get_all'] = $this->Ta3mem_msg_model->select_by_id($id);

        $data['one_data'] = $this->Ta3mem_msg_model->get_attach($id);

        $this->load->view('admin/Human_resources/ta3mem_v/msg/getDetailsDiv', $data);

    }

    //yara23-9-2020

    public function reply_dawa()

    {

        $this->Ta3mem_msg_model->reply_dawa();

    }

   

    //////////////////////////مرفقات///////////////////////////////////////

    public function add_attaches($id)//human_resources/ta3mem/Ta3mem_msg_c/add_attaches

    {

        $data['path'] = "uploads/human_resources/ta3mem";

        $data['ta3mem_id_fk'] = $id;

        $data['one_data'] = $this->Ta3mem_msg_model->get_attach($id);

        $data['title'] = 'مرفقات   ';

        $data['subview'] = 'admin/Human_resources/ta3mem_v/msg/add_attaches';

        $this->load->view('admin_index', $data);

    }

    public function add_morfaq()

    {

        $rkm = $this->input->post('row');

        $images = $this->upload_muli_file("files");

        $this->Ta3mem_msg_model->insert_attach($images);

    }

    public function get_attaches()

    {

        $rkm = $this->input->post('rkm');

        $data['rkm'] = $this->input->post('rkm');

        $data['one_data'] = $this->Ta3mem_msg_model->get_attach($rkm);

        $this->load->view('admin/Human_resources/ta3mem_v/msg/get_table_attaches', $data);

    }

    public function Delete_attach()

    {

        $id = $this->input->post('id');

        $this->Ta3mem_msg_model->delete_attach($id);

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

        $this->Ta3mem_msg_model->send_all_t3mem($id);

    }



    ///////////////////////////////

    public function load_tahwel()

    {

        $type = $this->input->post('type');

        if ($type == 1) {

            $data['all'] = $this->Ta3mem_msg_model->get_all_edarat();

            $this->load->view('admin/Human_resources/ta3mem_v/msg/load_tahwel', $data);

        } else if ($type == 2) {

            if($_SESSION['role_id_fk']==3)

            {

                $data['all'] = $this->Ta3mem_msg_model->get_all_emps($_SESSION['emp_code']);

            }

            else{

            $data['all'] = $this->Ta3mem_msg_model->get_all_emps(0);

            }

            $this->load->view('admin/Human_resources/ta3mem_v/msg/load_tahwel_employee', $data);

        }

    }
    // seen_msg
   
    // seen_t3mem
    public function seen_msg()
    {
        $this->Ta3mem_msg_model->seen_msg();
    }
    public function check_d3wa()
    {
        // $da3wat = $this->Ta3mem_model->get_unseen_ta3mem();
       /// $adv = $this->Ta3mem_model->get_unseen_adv();
      $msg = $this->Ta3mem_msg_model->get_unseen_msg();

        if ($msg->id == '') {
            $data['da3wat_msg'] = '';
        } elseif ($msg->id != '') {
            $data['da3wat_msg'] = $this->Ta3mem_msg_model->get_unseen_msg();
            $this->load->view('admin/Human_resources/ta3mem_v/msg/da3wa_load', $data);
        }
        //  $this->test($data['da3wat_msg']);
    }
    public function get_msg_emp()
    {
        $data['records'] = $this->Ta3mem_msg_model->select_all_unseen_ta3mem();
        //$this->test( $data['records']);
      //  $data['records'] = $this->Ta3mem_model->get_unseen_ta3mem();
        $this->load->view('admin/Human_resources/ta3mem_v/msg/t3mem_load', $data);
    }

} // END CLASS