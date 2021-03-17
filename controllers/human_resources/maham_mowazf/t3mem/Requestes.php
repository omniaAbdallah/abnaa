<?php
class Requestes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('maham_mowazf_model/t3mem/T3mem_m');
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function my_emails()
    {
        $data['my_t3mem'] = $this->T3mem_m->select_all_my_email(array('id>' => 0));
        $data['title'] = 'التعميم الوارد';
        $data['page'] = 1;
        $this->load->view('admin/maham_mowazf_view/t3mem/message', $data);
    }
    public function my_sent_emails()
    {
        $data['page'] = 2;
        $data['title'] = 'الاعلان الوارد';
        $data['my_t3mem'] = $this->T3mem_m->select_all_my_sent_email();
        $this->load->view('admin/maham_mowazf_view/t3mem/message_adv', $data);
    }

    public function my_emails_start()
    {
        $data['page'] = 3;
        $data['title'] = 'الرسائل الوارد';
        $data['my_t3mem'] = $this->T3mem_m->select_all_my_sent_msg();
        $this->load->view('admin/maham_mowazf_view/t3mem/message_msg', $data);
    }
  
    function get_all_count(){
        $data['ward_count'] = $this->T3mem_m->count_by('hr_ta3mem_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL,'type'=>'t3mem'));
        $data['ward_adv_count'] = $this->T3mem_m->count_by('hr_ta3mem_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL,'type'=>'adv'));
        $data['started_count'] = $this->T3mem_m->count_by('hr_ta3mem_msg_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL));
        echo json_encode($data);
    }

   
}