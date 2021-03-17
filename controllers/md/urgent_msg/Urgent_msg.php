<?php
class Urgent_msg extends MY_Controller
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
        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('md/urgent_m/Urgent_model');
  
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



//md/urgent_msg/Urgent_msg

    public function index()
    {
        
       $U_msg = new stdClass();
        $U_msg->id = null;
        $U_msg->msg_name        = null;
        $data = array(
            'page'          => 'add',
            'all_msg_data'=>$U_msg
        );
         $data['all_msgs'] = $this->Urgent_model->get();
        $data['subview'] = 'admin/md/urgent_v/urgent_data';
        $this->load->view('admin_index', $data);
    }



    public function del($msg_id){

        $this->Urgent_model->delete_urgent_msg($msg_id);
        if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', 'Success deleted ');
        }
        redirect('md/urgent_msg/Urgent_msg','refresh');
    }

    public function add()
    {
        $U_msg = new stdClass();
        $U_msg->id = null;
        $U_msg->msg_name        = null;
        $data = array(
            'page'          => 'add',
            'all_msg_data'=>$U_msg
        );

              $data['subview'] = 'admin/md/urgent_v/urgent_form';
               $this->load->view('admin_index', $data);
    }


    public function process()
    {
        $post = $this->input->post(null,true);
        if(isset($_POST['add'])){
            $this->Urgent_model->add($post);
        }elseif (isset($_POST['edit'])){
            $this->Urgent_model->edit($post);
        }

        if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', 'Success deleted ');
        }
        redirect('md/urgent_msg/Urgent_msg','refresh');

    }


    public function edit($id)
    {
        $query = $this->Urgent_model->get($id);
        if($query->num_rows() >0){
            $U_msg = $query->row();
            $data = array(
                'page'          => 'edit',
                'all_msgs'=>$U_msg
            );
             $data['subview'] = 'admin/md/urgent_v/urgent_form';
             $this->load->view('admin_index', $data);
        }else{

            redirect('md/urgent_msg/Urgent_msg','refresh');
        }
    }



}