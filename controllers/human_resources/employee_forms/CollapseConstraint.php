<?php
class CollapseConstraint extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
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

    private function upload_image($file_name)
    {
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
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

    private function upload_file($file_name)
    {
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> ' . $text . '.
                                                </div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> ' . $text . '.
                                                </div>');
        }
    }


    public function addConstraint() // human_resources/employee_forms/CollapseConstraint/addConstraint
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->model('human_resources_model/employee_forms/Constraint');
        if($this->input->post('add')){
            $this->Constraint->insert();

            redirect('human_resources/employee_forms/CollapseConstraint/addConstraint');
        }
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
        $data['allConstraints'] = $this->Constraint->allConstraints();
                //$this->test($data['allConstraints']);
        $data["personal_data"]=$this->Employee_model->get_one_employee($_SESSION['emp_code']);
        $data['title'] = 'طي قيد';
        $data['subview'] = 'admin/Human_resources/employee_forms/collapse_constraint/add_constraint';
        $this->load->view('admin_index',$data);
    }

    public function updateConstraint($id) // human_resources/employee_forms/CollapseConstraint/updateConstraint
    {


        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->model('human_resources_model/employee_forms/Constraint');
        if($this->input->post('add')){
            $this->Constraint->update($id);

            redirect('human_resources/employee_forms/CollapseConstraint/addConstraint');
        }
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');

        $data['constraint'] = $this->Constraint->findConstraint($id);
      //  $this->test($data['disclaimer']);
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['constraint']->emp_id);
        $data['title'] = 'إخلاء طرف';
        $data['subview'] = 'admin/Human_resources/employee_forms/collapse_constraint/add_constraint';
        $this->load->view('admin_index',$data);
    }

    public function getEmployeeDetails(){ 
        $this->load->model('human_resources_model/Employee_model');
        $id = $this->input->post('employee_id');
        $employee_info =$this->Employee_model->get_one_employee($id)[0];
        echo json_encode($employee_info);
    }

    public function DeleteDisclaimer($id){
        $this->load->model('human_resources_model/Employee_model');
        $this->Employee_model->deleteDisclaimer($id);
        $this->message('success','حذف ');
        redirect('human_resources/employee_forms/CollapseConstraint/addConstraint' ,'refresh');
    }




    public function get_load_page()
    {
        $this->load->model('human_resources_model/Employee_model');
        $data_load["personal_data"]=$this->Employee_model->get_one_employee($this->input->post('valu'));
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);
    }

    public function printConstraint($id) // human_resources/employee_forms/CollapseConstraint/printConstraint/
    {
        $this->load->model('Difined_model');
        $this->load->model('human_resources_model/Employee_model');
        $this->load->model('human_resources_model/employee_forms/Constraint');
        $data['all_emps'] = $this->Difined_model->select_all('employees', '', '', 'id', 'ASC');
        $data['constraint'] = $this->Constraint->findConstraint($id);
        $data["personal_data"]=$this->Employee_model->get_one_employee($data['constraint']->emp_id);

        $this->load->view('admin/Human_resources/employee_forms/collapse_constraint/print_constraint',$data);
        
    }






}