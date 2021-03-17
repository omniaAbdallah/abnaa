<?php
class Salaries_setting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('human_resources_model/Salary_model');
    }
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
    
    public function salaries_setting() // human_resources/Salaries_setting/salaries_setting
    {
        if($this->input->post('add')){
            $this->Salary_model->insert_salary();
            $this->message('success','تم الحفظ ');
            redirect('human_resources/Salaries_setting/salaries_setting');
        }
        $data['title'] = "سلم الرواتب";
        $data['records'] =  $this->Salary_model->all_salaries();
        $data['subview'] = 'admin/Human_resources/salaries/salaries_settings';
        $this->load->view('admin_index', $data);
    }
    public function get_details_update() // human_resources/Salaries_setting/update_salaries
    {
        $id=$this->input->post('id');
        $data['title'] = "تعديل سلم الرواتب";
        $data['record'] =  $this->Salary_model->getById_salary($id);
        $this->load->view('admin/Human_resources/salaries/salaries_settings', $data);
    }
    public function update_salaries($id) // human_resources/Salaries_setting/update_salaries
    {
        if($this->input->post('add')){
            $this->Salary_model->update_salary($id);
            $this->message('success','تعديل ');
            redirect('human_resources/Salaries_setting/salaries_setting');
        }
        $data['title'] = "تعديل سلم الرواتب";
        $data['record'] =  $this->Salary_model->getById_salary($id);
        $data['subview'] = 'admin/Human_resources/salaries/salaries_settings';
        $this->load->view('admin_index', $data);
    }
    public function delete_salaries($id){  // human_resources/Salaries_setting/delete_salaries
        $this->Salary_model->delete_salary($id);
        $this->message('success','حذف ');
        redirect('human_resources/Salaries_setting/salaries_setting','refresh');
    }
}