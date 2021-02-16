<?php

class Egtma3at_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('human_resources_model/egtma3at/Egtma3at_model');

    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    //-----------------------------------------
    private function message($type, $text)
    {
        return $this->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    type:"' . $type . '" ,
                    confirmButtonText: "تم"
                })</script>');
    }

    public function index()//human_resources/egtma3at/Egtma3at_c
    {
        if ($this->input->post('add')) {
            $this->Egtma3at_model->insert_galsa();
            $this->Egtma3at_model->insert_galsa_member();
            $this->message('success', 'تمت الاضافه بنجاح');
            redirect('human_resources/egtma3at/Egtma3at_c');
        }
        $data['records'] = $this->Egtma3at_model->select_all();
        $data['last_galsa'] = $this->Egtma3at_model->get_last_galsa();
        $data['all_Emps'] = $this->Egtma3at_model->get_by_id('employees', array('employee_type' => 1, 'status' => 96));
        $data['all_places'] = $this->Egtma3at_model->get_by_id('hr_egtma3at_setting', array('from_code' => 1001));
        $data['title'] = "فتح جلسة جديدة ";
        $data['title_t'] = "قائمة الجلسات";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/all_glasat';
        $this->load->view('admin_index', $data);
    }


    public function send_da3wat()
    {
        $this->Egtma3at_model->send_da3wat();
        echo 1;
        return;
    }

    /*************************************************/
    /*  public function all_mahadrs()
      {
          $data['records'] = $this->Egtma3at_model->select_all_galasat_finshed();
          $data['title'] = "قائمة بمحاضر الجلسات ";
          $data['title_t'] = "قائمة بمحاضر الجلسات";
          $data['subview'] = 'admin/human_resources/all_mahadrs/all_mahadrs_view';
          $this->load->view('admin_index', $data);
      }

      public function print_mahdr($galsa_id_fk)
      {
          $data['galsa_details'] = $this->Egtma3at_model->select_all_glasat_by_rkm($galsa_id_fk);
          $this->load->view('admin/human_resources/print_mahdr/print_mahdr_view', $data);
      }*/

    public function delete_galsa($id, $glsa_rkm)
    {
        $Conditions_arr = array("glsa_rkm" => $id);
        $Conditions_arr_hdoor = array("glsa_rkm" => $glsa_rkm);
        $this->Egtma3at_model->delete("hr_all_glasat_emp", $Conditions_arr);
        $this->Egtma3at_model->delete("hr_all_glasat_emp_hdoor", $Conditions_arr_hdoor);
        $this->Egtma3at_model->delete("hr_all_galast_gadwal_a3mal", $Conditions_arr_hdoor);
        redirect("human_resources/egtma3at/Egtma3at_c", 'refresh');
    }

    /***********************************************************************/
    private function upload_image($file_name, $filepath = false)
    {
        if ($filepath == false) {
            $config['upload_path'] = 'uploads/images';
        } else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    private function upload_file($file_name, $filepath = false)
    {
        if ($filepath == false) {
            $config['upload_path'] = 'uploads/files';
        } else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    public function add_attach($glsa_rkm)
    {//human_resources/egtma3at/Egtma3at_c/add_attach
        if ($this->input->post('save')) {
            if (isset($_FILES['file'])) {
                $file = $this->upload_file("file", 'uploads/human_resources/hr_all_glasat_emp_attaches');
            }
            $this->Egtma3at_model->insert_attach($glsa_rkm, $file);

        }
        $data['galsa'] = $this->Egtma3at_model->get_by("hr_all_glasat_emp", array("glsa_rkm" => $glsa_rkm));
        $data['records'] = $this->Egtma3at_model->get_galsa_attach($glsa_rkm);
        $data['last_galsa'] = $glsa_rkm;

        $data['title'] = "إضافة مرفقات ";
        $data['title_t'] = " المرفقات ";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/add_attach';
        $this->load->view('admin_index', $data);
    }

    public function download_file($id, $type = 3)
    {
        $this->load->helper('download');
        if ($type == 3) {
            $name_folder = "hr_all_glasat_emp_attaches";
        } else if ($type == 1) {
            $name_folder = "hr_all_glasat_emp_morfaq";
        }
        $row = $this->Egtma3at_model->get_by($name_folder, array("glsa_rkm" => $id));
        $type = pathinfo($row->file)['extension'];
        $data = file_get_contents('uploads/human_resources/' . $name_folder . "/" . $row->file);
        $name = $row->title . '.' . $type;
        force_download($name, $data);
    }

    public function read_file($id)
    {
        $this->load->helper('file');
        $row = $this->Egtma3at_model->get_by("hr_all_glasat_emp_attaches", array("glsa_rkm" => $id));
        $type = pathinfo($row->file)['extension'];
        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
        if (in_array($type, $arry_images)) {
            $type_doc = 1;
        } elseif (in_array(strtoupper($type), $arr_doc)) {
            $type_doc = 2;
        }
        // $file_name=$this->uri->segment(3);
        $file_path = 'uploads/human_resources/hr_all_glasat_emp_attaches/' . $row->file;
        switch ($type_doc) {
            case 1:
            {
                header('Content-Type: image/' . $type);
                break;
            }
            case 2:
            {
                header('Content-Type: application/pdf');
                break;
            }
        }
        header('Content-Discription:inline; filename="' . $row->title . '"');
        header('Content-Disposition: filename="' . $row->title . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function delete_attach()
    {
        $id = $this->input->post('attach');
        $type = $this->input->post('type');
        if ($type == 3) {
            $table = "hr_all_glasat_emp_attaches";
        } else {
            $table = "hr_all_glasat_emp_morfaq";
        }
        $this->Egtma3at_model->delete_attach($id, $table);
    }

    public function add_image($glsa_rkm)
    {//human_resources/egtma3at/Egtma3at_c/add_image
        if ($this->input->post('save')) {
            if (isset($_FILES['file'])) {
                $file = $this->upload_file("file", 'uploads/human_resources/hr_all_glasat_emp_morfaq');
            }
            $this->Egtma3at_model->insert_morfaq($glsa_rkm, $file);

        }
        $data['galsa'] = $this->Egtma3at_model->get_by("hr_all_glasat_emp", array("glsa_rkm" => $glsa_rkm));
        $data['records'] = $this->Egtma3at_model->get_galsa_morfaq($glsa_rkm, $type = 1);
        $data['last_galsa'] = $glsa_rkm;
        $data['title'] = "إضافة صور ";
        $data['title_t'] = " الصور ";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/add_image';
        $this->load->view('admin_index', $data);
    }

    public function add_video($glsa_rkm)
    {//human_resources/egtma3at/Egtma3at_c/add_video
        if ($this->input->post('save')) {
            if (!empty($this->input->post('file'))) {
                $video_link = $this->input->post('file');
                $video_id = explode("?v=", $video_link); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1])) {
                    $video_id = explode("/v/", $video_link);
                } // For videos like http://www.youtube.com/watch/v/..
                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $video_id = $video_id[0];
                $file = $video_id;
            }
            $this->Egtma3at_model->insert_morfaq($glsa_rkm, $file);

        }
        $data['galsa'] = $this->Egtma3at_model->get_by("hr_all_glasat_emp", array("glsa_rkm" => $glsa_rkm));
        $data['records'] = $this->Egtma3at_model->get_galsa_morfaq($glsa_rkm, $type = 2);
        $data['last_galsa'] = $glsa_rkm;
        $data['title'] = "إضافة فيديوهات ";
        $data['title_t'] = " الفيديوهات ";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/add_video';
        $this->load->view('admin_index', $data);
    }

    public function change_status()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Egtma3at_model->change_status($valu, $id);
        echo json_encode($data);
    }


    public function get_table_mehwer()// human_resources/egtma3at/Egtma3at_c/get_table_mehwer
    {

        $this->load->model('human_resources_model/egtma3at/All_mehwr_model');
        $glsa_rkm = $this->input->post('glsa_rkm');
        $data['glsa_rkm'] = $glsa_rkm;
        $data['result'] = $this->All_mehwr_model->get_mehwr_details($glsa_rkm);
        $this->load->view('admin/Human_resources/egtma3at_v/get_table_mehwer_view', $data);
    }

    public function delete_mehwr_galsa()
    {
        $this->load->model('human_resources_model/egtma3at/All_mehwr_model');
        $id = $this->input->post('id');
        $this->All_mehwr_model->delete_row($id);
        echo 1;
        return;
    }

    public function a3da_glsa($rkm)
    { // human_resources/egtma3at/Egtma3at_c/a3da_glsa
        $data['last_galsa'] = $this->Egtma3at_model->get_by_rkm($rkm)->glsa_rkm;
        //  $code=$this->Egtma3at_model->get_by_rkm($rkm)->mgls_code;
        $data['galsa_member'] = $this->Egtma3at_model->get_galsa_member($rkm);
        $data['last_magls_update'] = $this->Egtma3at_model->get_by_rkm($rkm);
        $data['members'] = $this->Egtma3at_model->get_magls_member();
        if ($this->input->post('add')) {
            $this->Egtma3at_model->update_galsa_member($rkm);
            $this->message('success', 'تمت التعديل بنجاح');
            redirect('human_resources/egtma3at/Egtma3at_c/a3da_glsa/' . $rkm, 'refresh');
        }
        $data['title'] = 'أعضاء الجلسه ';
        $data['subview'] = 'admin/Human_resources/egtma3at_v/a3da_glsa';
        $this->load->view('admin_index', $data);
    }

    /*16-7-om*/
    public function det_datiles()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['galsa_member'] = $this->Egtma3at_model->get_all_details($galsa_rkm);
//        $this->test($data);
        $this->load->view('admin/Human_resources/egtma3at_v/load_datiles_member', $data);
    }
    //yaraaaa18-8-2020
    //old_funcc
    public function update_galsa($rkm)
    {
        $data['last_galsa'] = $this->Egtma3at_model->get_by_rkm($rkm)->glsa_rkm;
        $data['galsa_member'] = $this->Egtma3at_model->get_galsa_member($rkm);
        $data['last_magls_update'] = $this->Egtma3at_model->get_by_rkm($rkm);
        // $data['members']=$this->Egtma3at_model->get_magls_member($data['last_magls_update']->mgls_code);
        $data['all_Emps'] = $this->Egtma3at_model->get_by_id('employees', array('employee_type' => 1, 'status' => 96));
        $data['all_places'] = $this->Egtma3at_model->get_by_id('hr_egtma3at_setting', array('from_code' => 1001));
        if ($this->input->post('add')) {

            $rkm = $this->input->post('glsa_rkm');

            // $this->test($_POST);
            // $this->Egtma3at_model->update_galsa_member($rkm);
            $this->Egtma3at_model->update_galsa($rkm);
            $this->message('success', 'تمت التعديل بنجاح');
            redirect('human_resources/egtma3at/Egtma3at_c');
        }
        $data['title'] = "نعديل جلسة ";
        $data['title_t'] = "قائمة الجلسات";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/all_glasat';
        $this->load->view('admin_index', $data);
    }

    public function mehwr_glsa($glsa_rkm)
    { // human_resources/egtma3at/Egtma3at_c/mehwr_glsa

        $this->load->model('human_resources_model/egtma3at/All_mehwr_model');
        if ($this->input->post('btn')) {
            $files = $this->upload_muli_file("mehwar_morfaq");
            $this->All_mehwr_model->insert_mehwr($files, $glsa_rkm);
            $this->message('success', 'تمت الاضافة بنجاح');
            redirect('human_resources/egtma3at/Egtma3at_c/mehwr_glsa/' . $glsa_rkm, 'refresh');
        }
        $data['last_mehwer'] = $this->Egtma3at_model->get_last_mehwer();
        $data['last_galsa'] = $glsa_rkm;
        $data['title'] = 'إضافة محاور ';
        $data['subview'] = 'admin/Human_resources/egtma3at_v/mehwr_glsa';
        $this->load->view('admin_index', $data);
    }

    //new_funccc
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

    private function upload_all_file($file_name)
    {

        $config['upload_path'] = 'uploads/human_resources/glasat_emp/all_mehwr_glasat';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '10000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }

    public function getConnection_emp()
    {
        $all_Emps = $this->Egtma3at_model->get_all_emp();
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            $x = 1;
            foreach ($all_Emps as $row_emp) {


                $arr_emp['data'][] = array(
                    $x,
                    '<a 
                         ondblclick="Get_emp_Name(this)"
                       
                          data-code="' . $row_emp->id . '"
                          data-name="' . $row_emp->employee . '"
                        
                           >' . $row_emp->emp_code . '</a>',
                    '<a  
                           ondblclick="Get_emp_Name(this)"

                            data-code="' . $row_emp->id . '"
                            data-name="' . $row_emp->employee . '"
                         
                             >' . $row_emp->employee . '</a>',
                    '<a 
                           ondblclick="Get_emp_Name(this)"
                          
                            data-code="' . $row_emp->id . '"
                            data-name="' . $row_emp->employee . '"
                         
                             >' . $row_emp->mosma_wazefy_n . '</a>',
                    '<a 
                             ondblclick="Get_emp_Name(this)"
                             
                              data-code="' . $row_emp->id . '"
                              data-name="' . $row_emp->employee . '"
                           
                               >' . $row_emp->edara_n . '</a>',
                    '<a 
                               ondblclick="Get_emp_Name(this)"
                               
                                data-code="' . $row_emp->id . '"
                                data-name="' . $row_emp->employee . '"
                             
                                 >' . $row_emp->qsm_n . '</a>',


                );
                $x++;
            }
        }
        echo json_encode($arr_emp);
    }

    public function get_option()// human_resources/egtma3at/Egtma3at_c/get_table_mehwer
    {

        $this->load->view('admin/Human_resources/egtma3at_v/load_optios');
    }

//yara27-8-2020
    public function reply_dawa()
    {

        $this->Egtma3at_model->reply_dawa();
    }

    public function check_d3wa_emp()
    {
        if ($_SESSION['role_id_fk'] == 3) {
            $this->load->model('human_resources_model/egtma3at/Egtma3at_model');
            $data['galsa_details'] = $this->Egtma3at_model->get_galsa_details();
            $data['da3watt'] = $this->Egtma3at_model->get_action_da3wa();
            $data['all_places'] = $this->Egtma3at_model->get_by_id('hr_egtma3at_setting', array('from_code' => 1001));
            $data['mahwrs'] = $this->Egtma3at_model->get_mehwr_details_dash();
            $this->load->view('admin/Human_resources/egtma3at_v/da3wa_load_emp', $data);

        }
    }

    /*29-8-20-om*/
    public function add_galsat_mon24a($id)
    {
        $data['title'] = "مناقشة الجلسة ";

        $data['last_galsa'] = $id;
        $data['last_galsa_date'] = $this->Egtma3at_model->get_by_rkm($id);
        $data['members'] = $this->Egtma3at_model->get_last_galsa_member($id);
        $data['mahawer'] = $this->Egtma3at_model->get_all_mahawer($id, 0);
        /*        $data['mahawer_end'] = $this->Egtma3at_model->get_all_mahawer($id, 1);*/

        /*        $data['all_members'] = $this->Egtma3at_model->get_magls_member_new();*/

        /*        $data['subview'] = 'admin/Human_resources/egtma3at_v/start_galsa_gam3ia_omomia';*/
        $data['subview'] = 'admin/Human_resources/egtma3at_v/get_galsa_monaqsha';

        $this->load->view('admin_index', $data);


        /*$data['title'] = "مناقشة الجلسة ";
        $data['last_galsa_date'] = $this->Egtma3at_model->get_by_rkm($id);
        $data['members'] = $this->Egtma3at_model->get_last_galsa_member($id);
        $data['mahawer'] = $this->Egtma3at_model->get_all_mahawer($id, 0);
        $data['mahawer_end'] = $this->Egtma3at_model->get_all_mahawer($id, 1);
        $data['subview'] = 'admin/Human_resources/egtma3at_v/mon24a_galsa';
        $this->load->view('admin_index', $data);*/
    }

    public function update_qrar()
    {
        $this->Egtma3at_model->update_qrar();
    }

    public function insert_mehwor_qrar()
    {
        $galsa_rkm = $this->input->post('galsa_rkm');

        $files = $this->upload_all_file("mehwar_morfaq");
        $this->Egtma3at_model->insert_mehwor_qrar($files, $galsa_rkm);

        $data['mahawer_end'] = $this->Egtma3at_model->get_all_mahawer($galsa_rkm, 1);
        /*
                echo '<pre>';
                print_r($data);*/

        $this->load->view('admin/Human_resources/egtma3at_v/load_end_mhawer', $data);
    }

    public function load_add_mehwar()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');

        $data['galsa_rkm'] = $galsa_rkm;

        $this->load->view('admin/Human_resources/egtma3at_v/load_add_mehwar', $data);
    }

    public function load_members()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['members'] = $this->Egtma3at_model->get_last_galsa_member($galsa_rkm);

        $data['galsa_rkm'] = $galsa_rkm;
        $this->load->view('admin/Human_resources/egtma3at_v/load_members', $data);
    }

    public function load_end_mhawer()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['mahawer_end'] = $this->Egtma3at_model->get_all_mahawer($galsa_rkm, 1);
        $data['galsa_rkm'] = $galsa_rkm;
        $this->load->view('admin/Human_resources/egtma3at_v/load_end_mhawer', $data);
    }

    public function update_member_hdoor()
    {
        $this->Egtma3at_model->update_table_hoddor();
    }

    public function start_galsa_time()
    {
        $tim = date("h:i:s");
        $this->Egtma3at_model->update_start_galsa($tim);
        echo $tim;
    }

    public function end_galsa()
    {
        $tim = date("h:i:s");
        $this->Egtma3at_model->finished_galsa($tim);
    }

    public function det_datiles_accept()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $data['galsa_member'] = $this->Egtma3at_model->get_all_details_accept($galsa_rkm);
        $this->load->view('admin/Human_resources/egtma3at_v/load_datiles_member', $data);
    }

    public function det_datiles_hdoor()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $attend = $this->input->post('attend');
        $data['galsa_member'] = $this->Egtma3at_model->get_all_details_attend_new($galsa_rkm, $attend);
        $this->load->view('admin/Human_resources/egtma3at_v/load_datiles_member', $data);

    }

    function get_hdoor_num()
    {
        $galsa_rkm = $this->input->post('galsa_rkm');
        $data = $this->Egtma3at_model->get_hdoor_num($galsa_rkm);
        echo json_encode($data);
    }

    function print_hdoor()
    {

        $galsa_rkm = $this->input->post('galsa_rkm');
        $data['members'] = $this->Egtma3at_model->get_member_hdoor($galsa_rkm);
        $data['galsa_date'] = $this->Egtma3at_model->get_by("hr_all_glasat_emp", array("glsa_rkm" => $galsa_rkm));

        $this->load->view('admin/Human_resources/egtma3at_v/print/print_hdoor', $data);
    }

    function save_member()
    {

        /*        $this->test($_POST);*/
        $this->Egtma3at_model->save_member_hdoor();

    }


    /*************************************************/
//yara30-8-2020
    public function all_mahadrs()//human_resources/egtma3at/Egtma3at_c/all_mahadrs
    {
        $data['records'] = $this->Egtma3at_model->select_all_galasat_finshed();
        $data['title'] = "قائمة بمحاضر الجلسات ";
        $data['title_t'] = "قائمة بمحاضر الجلسات";
        $data['subview'] = 'admin/Human_resources/egtma3at_v/all_mahadrs_view';
        $this->load->view('admin_index', $data);
    }

    public function print_mahdr($galsa_id_fk = false)
    {
        if (empty($galsa_id_fk)) {
            $galsa_id_fk = $this->input->post('row_id');
        }
        $data['galsa_details'] = $this->Egtma3at_model->select_all_glasat_by_rkm($galsa_id_fk);

        $this->load->view('admin/Human_resources/egtma3at_v/print_mahdr_view', $data);
    }

    public function det_datiles_action()
    {
        $galsa_rkm = $this->input->post('glsa_rkm');
        $action = $this->input->post('action');
        $data['galsa_member'] = $this->Egtma3at_model->get_all_details_action($galsa_rkm, $action);
        $this->load->view('admin/Human_resources/egtma3at_v/load_datiles_member', $data);
    }
    //yara30-8-2020


}