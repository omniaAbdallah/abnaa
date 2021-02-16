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
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//-------------------------------------------------
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
//-----------------------------------------
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
    public function index(){     // human_resources/ta3mem/Ta3mem_c
        $data['records'] =$this->Ta3mem_model->select_all();
      //$this->test($data['records']);
        $data['title']='    إدارة التعميم';
        //$data['emp_data'] = $this->Ta3mem_model->select_depart();
         $data['emp_data'] = $this->Ta3mem_model->select_all_emp();
        $data['subview'] = 'admin/Human_resources/ta3mem_v/ta3mem_emp';
        $this->load->view('admin_index', $data);
    }
    public function getConnection_emp()
    {
         $all_Emps = $this->Ta3mem_model->get_all_edarat();
      //    $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();
        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {
               
                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this)"
                        id="member' . $row_emp->id . '"
                  
                        data-edara_n="' . $row_emp->title . '"
                        data-edara_id="' . $row_emp->id . '"/>',
                        $row_emp->title,
                   
                    ''
                );
            }
        }
        echo json_encode($arr_emp);
    }  private function thumb($data,$folder='')
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
        $config['max_size'] = '1024*8888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888';
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
    public function insert(){
        if( $this->input->post('save') ==='save'){
            $img = 'file';
            $img_file = $this->upload_image_2($img, 'human_resources/ta3mem');
            $this->Ta3mem_model->insert($img_file);
        }
        $this->message('success','تمت الاضافة ');
        redirect('human_resources/ta3mem/Ta3mem_c','refresh');
    }
    public function Delete_namozeg($rkm){
        $this->Ta3mem_model->Delete($rkm);
        $this->Ta3mem_model->Delete_details($rkm);
        redirect('human_resources/ta3mem/Ta3mem_c','refresh');
        $this->message('success','تمت الحذف ');
    }
    
    public function get_all_data(){ 
        $id=$this->input->post('id');
        $data['records'] =$this->Ta3mem_model->get_all_emp($id);
        $this->load->view('admin/Human_resources/ta3mem_v/getDetailsDiv',$data);
    }
} // END CLASS