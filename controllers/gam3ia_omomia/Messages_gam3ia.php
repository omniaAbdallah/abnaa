<?php


class Messages_gam3ia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('gam3ia_omomia/Message_gam3ia_model');

    }

    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    function load_message()
    {
        $data['contact_types'] = $this->Message_gam3ia_model->get_by('md_gam3ia_contact_setting', array("type" => 1));
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/load_message_view', $data);
    }
    function ward_messages()
    {
        $data['title']='الرسائل الواردة';
        $data['message'] = $this->Message_gam3ia_model->get_message_by(array('id>='=>0,"send_to_id_fk" => $_SESSION['id'],'member_type_to'=>1,'deleted_to'=>0,'archived_to'=>0));
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/ward_messages_view', $data);
    }
    function my_messages_start()
    {
        $data['title']='الرسائل الهامة';
        $data['page'] = 4;
        $data['message'] = $this->Message_gam3ia_model->get_message_2_by(array('id>' => 0),$data['page']);
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/messages_view', $data);
    }
    function sent_messages()
    {
        $data['title']='الرسائل المرسلة';
        $data['message'] = $this->Message_gam3ia_model->get_message_by(array('id>='=>0,"send_from_id_fk" => $_SESSION['id'],'deleted_from'=>0,'archived_from'=>0));
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/sent_messages_view', $data);
    }

    public function my_deleted_messages()
    {
        $data['title'] = 'سلة المهملات';
        $data['page'] = 3;
        $data['message'] = $this->Message_gam3ia_model->get_message_2_by(array('id>' => 0),$data['page']);
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/messages_view', $data);
    }
    
        function message_details($id, $type = 2)
    {
        if ($type == 1) {
            $data_update['readed'] = 1;
            $this->Message_gam3ia_model->update_message($data_update, array('id' => $id));
        }
        $data['type'] = $type;
        $data['title'] = ' ';
        $data['message_data'] = $this->Message_gam3ia_model->get_message_by(array('id' => $id))[0];
        $data['message_replay_data'] = $this->Message_gam3ia_model->get_message_detailes_replay_by(array('replay_id_fk' => $id));
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/message_details_view', $data);
    }
        function replay_message($id)
    {
        $file_attach_name = 'file_attach_name';
        $file = $this->upload_file($file_attach_name, 'md/gam3ia_contact/contact_us');
        $this->Message_gam3ia_model->add_message($file,$id);
    }

    /*28-6-om*/
    public function update_seen()
    {
        $this->Message_gam3ia_model->update_seen();
    }
   /* function message_details($id,$type=2)
    {
        if ($type == 1){
            $data_update['readed'] = 1;
            $this->Message_gam3ia_model->update_message($data_update,array('id'=>$id));
        }
        $data['type']=$type;
        $data['title']=' ';
        $data['message_data'] = $this->Message_gam3ia_model->get_message_by(array('id'=>$id))[0];
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/message_details_view', $data);
    }*/

    function send_message()
    { /*am3ia_omomia/Messages_gam3ia/send_message*/
/*        $this->test($_POST);*/
        $file_attach_name = 'file_attach_name';
        $file = $this->upload_file($file_attach_name, 'md/gam3ia_contact/contact_us');
        $this->Message_gam3ia_model->add_message($file);
        /*$this->messages('success', 'تم إرسال الطلب الي الجمعية سيقوم الموظف المختص بالتواصل معك ... شكرا لك  ');
        redirect('gam3ia_omomia/Messages_gam3ia', 'refresh');*/
    }

    function get_members()
    {
        $type = $this->input->get('type_member');
        if ($type == 1) {
            $data['members'] = $this->Message_gam3ia_model->get_by('md_all_gam3ia_omomia_members');
        } elseif ($type == 2) {
            $data['members'] = $this->Message_gam3ia_model->get_by('pr_edara_tanfezia');

        }
        echo json_encode($data);

    }

    public function download_file($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('uploads/md/gam3ia_contact/contact_us/' . $file);
        force_download($name, $data);
    }

    public function make_star()
    {
        $email_id = $this->input->post('id');
        $type = $this->input->post('type');
        $this->Message_gam3ia_model->make_star($email_id,$type);
    }

    public function make_action()
    {
        $emailes_ids = $this->input->post('emailes_ids');
        $action = $this->input->post('action');
        $type = $this->input->post('type');
        $this->Message_gam3ia_model->make_action($emailes_ids, $action,$type);
    }

    public function print_email()
    {
        $id = $this->input->post('row_id');
        $data['message_data'] = $this->Message_gam3ia_model->get_message_by(array('id'=>$id))[0];
        $this->load->view('gam3ia_omomia/gam3ia_views/messages_view/print_email', $data);
    }

    public function archive_message()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $this->Message_gam3ia_model->archive_message($id,$type);
    }
    public function add_emps_message()
    {
        $this->Message_gam3ia_model->add_emps_message();
    }
    
      function get_all_count(){
        $data['ward_count']=$this->Message_gam3ia_model->count_by('md_gam3ia_contact',array('send_to_id_fk'=>$_SESSION['id'],'member_type_to'=>1,'readed'=>0));
        $data['send_count']=$this->Message_gam3ia_model->count_by('md_gam3ia_contact',array('send_from_id_fk'=>$_SESSION['id'],'member_type_to'=>1));
        $data['started_count']=$this->Message_gam3ia_model->count_2_by(4);
        $data['deleted_count']=$this->Message_gam3ia_model->count_2_by(3);
        echo json_encode($data);
    }
}