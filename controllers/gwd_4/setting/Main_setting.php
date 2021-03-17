<?php
/**
 * Created by PhpStorm.
 * User: alatheer
 * Date: 3/9/2020
 * Time: 10:30 AM
 */

class Main_setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('gwd_m/setting/Main_setting_m');

        $this->myarray = $this->Main_setting_m->all_settings();

//        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
//        /*************************************************************/
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }

    public function index($type=0)//gwd/setting/Main_setting/
    {
        $data['typee']= $type;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);


        $data['department_jobs'] = $this->Main_setting_m->select_department_jobs();

        $array= array();
        foreach ($data['department_jobs'] as $row){
            $array[$row->id]=$row->name;
        }
        $data['department_jobs_array']= $array;

        $data['title'] = 'اعدادات الجوده';
        $data['subview'] = 'admin/gwd_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);

    }

    public function AddSetting($from_code){  // gwd/setting/Main_setting/AddSetting

        if($this->input->post('add')){
            $this->Main_setting_m->add($from_code);
            $this->messages('success',' تم الإضافة بنجاح '.$this->myarray[$from_code]);
            redirect('gwd/setting/Main_setting/index/'.$from_code,'refresh');

        }

    }
    public function UpdateSetting($id,$from_code){


        if($this->input->post('add')){
            $this->Main_setting_m->update($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('gwd/setting/Main_setting/index/'.$from_code,'refresh');
        }

        $data['typee']= $from_code;
        $data['all']= $this->Main_setting_m->get_all_data_settings($this->myarray);

        $data['department_jobs'] = $this->Main_setting_m->select_department_jobs();
        $array= array();
        foreach ($data['department_jobs'] as $row){
            $array[$row->id]=$row->name;
        }
        $data['department_jobs_array']= $array;

        $data['record'] = $this->Main_setting_m->getById($id);
        $data['typee'] = $from_code ;
        $data['id']=$id;

        $data['title'] = ' اعدادات الجوده';
        $data['subview'] = 'admin/gwd_v/setting/Main_setting_view';
        $this->load->view('admin_index', $data);
    }

    public function DeleteSetting($id,$from_code){
        $this->Main_setting_m->delete($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('gwd/setting/Main_setting/index/'.$from_code,'refresh');
    }

}