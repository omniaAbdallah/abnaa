<?php


class Taklef_order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('human_resources_model/employee_forms/taklef_model/Taklef_order_model');
    }

    function upload_file($file_name, $filepath = false)
    {
        $CI =& get_instance();
        if ($filepath == false) {
            $config['upload_path'] = 'uploads/files';
        } else {
            $config['upload_path'] = $filepath;
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $CI->load->library('upload', $config);
        //    10-3-om
        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $CI->upload->data();
            return $datafile['file_name'];
        }
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    title:"' . $text . '" ,
                    type:"' . $type . '" ,

                    confirmButtonText: "تم"
                })</script>');
        }

    }

    function index()
    {/*human_resources/employee_forms/taklef/Taklef_order*/

        if ($this->input->post('order_save')) {
            $order_file = $this->upload_file('job_descib', 'uploads/human_resources/taklef_orders');
            $this->Taklef_order_model->insert_order($order_file);
            $this->messages('success', 'تم الحفظ بنجاح');
            redirect('human_resources/employee_forms/taklef/Taklef_order', 'refresh');
        }
        $data['last_rkm'] = $this->Taklef_order_model->get_last_rkm();
        $data['all_data'] = $this->Taklef_order_model->get_all_data();
        $data['subview'] = 'admin/Human_resources/employee_forms/taklef_view/Taklef_order_form';
        $this->load->view('admin_index', $data);
    }

    function update_order($id)
    {/*human_resources/taklef/Taklef_order*/

        if ($this->input->post('order_save')) {
            $order_file = $this->upload_file('job_descib', 'uploads/human_resources/taklef_orders');
            $this->Taklef_order_model->update_order($id, $order_file);
            $this->messages('success', 'تم التعديل بنجاح');
            redirect('human_resources/employee_forms/taklef/Taklef_order', 'refresh');
        }
        $data['one_data'] = $this->Taklef_order_model->get_one_data($id);
        if (!empty($data['one_data'] )&&($data['one_data']['type_to']=='job')){
            $data['jobs_title']=$this->Taklef_order_model->get_by('hr_egraat_setting');

        }
      /*  echo '<pre>';
        print_r($data['one_data'] );
        die;*/
        $data['subview'] = 'admin/Human_resources/employee_forms/taklef_view/Taklef_order_form';
        $this->load->view('admin_index', $data);
    }


    public function getConnection_emp()
    {
        $from = $this->input->post('from');
        $from_id = $this->input->post('from_id');
        $all_Emps = $this->Taklef_order_model->get_all_emp($from_id);

        //        $this->test($all_Emps);
        $arr_emp = array();
        $arr_emp['data'] = array();

        if (!empty($all_Emps)) {
            foreach ($all_Emps as $row_emp) {

                if (empty($row_emp->edara_n)) {
                    $row_emp->edara = 'غير محدد ';
                }
                if (empty($row_emp->qsm_n)) {
                    $row_emp->qsm = 'غير محدد ';
                }

                $arr_emp['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_emp->id . '"
                       ondblclick="Get_emp_Name(this,' . $from . ')"
                        id="member' . $row_emp->id . '"
                        data-emp_code="' . $row_emp->emp_code . '"
                        data-edara_n="' . $row_emp->edara_n . '"
                        data-edara_id="' . $row_emp->edara_id . '"
                        data-name="' . $row_emp->employee . '"
                        data-job_title="' . $row_emp->mosma_wazefy_n . '"
                        data-qsm_n="' . $row_emp->qsm_n . '"
                        data-qsm_id="' . $row_emp->qsm_id . '" />',
                    $row_emp->emp_code,
                    $row_emp->employee,
                    $row_emp->edara_n,
                    $row_emp->qsm_n,

                    ''
                );
            }
        }
        echo json_encode($arr_emp);


    }


    function get_jobs_title()
    {
        $data = $this->Taklef_order_model->get_by('hr_egraat_setting');
        echo json_encode($data);
    }

    function delete_order($id)
    {
        $this->Taklef_order_model->delete_order($id);
        $this->messages('success', 'تم الحذف بنجاح');
        redirect('human_resources/employee_forms/taklef/Taklef_order', 'refresh');
    }

    function load_details(){
        $id=$this->input->post('row_id');

        $data['one_data'] = $this->Taklef_order_model->get_one_data($id);
        $this->load->view('admin/Human_resources/employee_forms/taklef_view/order_details_view', $data);

    }
    //yara_start
    /****************************************/
   public function add_filles($id)
   {
       $data['title'] = 'إضافة  مرفقات';
       $data['one_data'] = $this->Taklef_order_model->get_one_data($id);
       $data['get_all'] = $this->Taklef_order_model->get_news_by_id($id);
       $data['item']=$this->Taklef_order_model->get_by_id($id);
       $data['folder_path']= 'uploads/human_resources/taklef_orders';
       $data['morfqat'] = $this->Taklef_order_model->get_table('hr_taklef_files',array('taklef_id_fk'=>$id));
      $data['subview'] = 'admin/Human_resources/employee_forms/taklef_view/add_picture';
       $this->load->view('admin_index',$data); 
   }
   public function load()
        {
         $id=$this->input->post('id');
         $data['get_all'] = $this->Taklef_order_model->get_news_by_id($id);
       $data['folder_path']= 'uploads/human_resources/taklef_orders';
       $data['morfqat'] = $this->Taklef_order_model->get_table('hr_taklef_files',array('taklef_id_fk'=>$id));
            $this->load->view('admin/Human_resources/employee_forms/taklef_view/load', $data);
        }
        public function read_file($file_name)
       {
           $this->load->helper('file');
           $file_path = 'uploads/human_resources/taklef_orders/'.$file_name;
           header('Content-Type: application/pdf');
           header('Content-Discription:inline; filename="'.$file_name.'"');
           header('Content-Transfer-Encoding: binary');
           header('Accept-Ranges:bytes');
           header('Content-Length: ' . filesize($file_path));
           readfile($file_path);
       }
   private function upload_all_file($file_name,$id)
   {
       $data['get_all'] = $this->Taklef_order_model->get_news_by_id($id);
     $path='uploads/human_resources/taklef_orders';
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
   private function upload_muli_file($input_name,$id)
   {
       $filesCount = count($_FILES[$input_name]['name']);
       for ($i = 0; $i < $filesCount; $i++) {
           $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
           $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
           $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
           $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
           $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
           $all_img[] = $this->upload_all_file("userFile",$id);
       }
       return $all_img;
   }
   public function upload_img()
   {
       $id = $this->input->post('row');
       $images = $this->upload_muli_file("files",$id);
       $this->Taklef_order_model->insert_attach($id, $images);
   }
   public function delete_upload($id)
   {
       $img = $this->Taklef_order_model->get_table_by_id('hr_taklef_files',array('id'=>$id));
       $path='uploads/human_resources/taklef_orders';
     //  $this->test($img->morfaq);
       if (file_exists($path . "/" . $img->file)) {
           unlink(FCPATH . "" . $path . "/" . $img->file);
       }
   }
   public function delete_morfq()
   {
       $id = $this->input->post('id');
       $this->delete_upload($id);
       $this->Taklef_order_model->delete_morfq($id);
   }


}