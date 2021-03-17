<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model(['all_secretary_models/chating/ChatModel', 'all_secretary_models/chating/OuthModel', 'all_secretary_models/chating/UserModel']);
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function index()
    {
        $data['strTitle'] = 'المستخدمين المتصلين';
        $data['strsubTitle'] = 'مستخدم';
        $data['chatTitle'] = ' اختر مستخدم للتواصل';
        $data['subview'] = 'admin/maham_mowazf_view/chating/construction_services/chat_template';
        $this->load->view('admin_index', $data);
    }

}