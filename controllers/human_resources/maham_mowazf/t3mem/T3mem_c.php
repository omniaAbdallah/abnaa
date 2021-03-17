<?php
class T3mem_c extends MY_Controller
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
    public function index()//maham_mowazf/t3mem/T3mem_c/index
    {
        if (!empty($notif)) {
            $data['notifi'] = $notif;
        } else {
            $data['notifi'] = '';
        }
        $data['ward_count'] = $this->T3mem_m->count_by('hr_ta3mem_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL,'type'=>1));
        $data['ward_adv_count'] = $this->T3mem_m->count_by('hr_ta3mem_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL,'type'=>2));
        $data['started_count'] = $this->T3mem_m->count_by('hr_ta3mem_msg_details', array('emp_id' => $_SESSION['emp_code'], 'seen' => NULL));
        $data['title'] = 'التعميم';
        $data['subview'] = 'admin/maham_mowazf_view/t3mem/main_page';
        $this->load->view('admin_index', $data);
    }
    public function check_d3wa()
    {
       $id=$this->input->post('id');
       $data['da3wat'] = $this->T3mem_m->get_action_da3wa($id);
    //  $this->test($data['da3wat']);
       $this->load->view('admin/maham_mowazf_view/t3mem/da3wa_load', $data);
             
    }
    public function check_d3wa_adv()
    {
        $id=$this->input->post('id');
       $data['da3wat'] = $this->T3mem_m->get_action_da3wa_adv($id);
    // $this->test($data['da3wat']);
       $this->load->view('admin/maham_mowazf_view/t3mem/da3wa_load_adv', $data);
             
    }
    public function check_d3wa_msg()
    {
        $id=$this->input->post('id');
       $data['da3wat'] = $this->T3mem_m->get_action_da3wa_msg($id);
    // $this->test($data['da3wat']);
       $this->load->view('admin/maham_mowazf_view/t3mem/da3wa_load_msg', $data);
             
    }
    
}