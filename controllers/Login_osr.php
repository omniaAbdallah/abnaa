<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_osr extends CI_Controller
{
    //application\controllers\Login_osr.php
    public function __construct()
    {
        parent::__construct();
        $this->load->model('osr/Users');
    }

    function index()
    {
        if ($this->session->has_userdata('is_osra_logged_in') == 1) {
            redirect('osr');
        }
        $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $this->load->view('osr/users/login', $data);
    }

    public function check_login()
    {
   
            $login = $this->Users->check_user_data();
            $this->Users->make_online();
            if ((!empty($login))) {
                $_SESSION = $login;
                $_SESSION['is_osra_logged_in'] = true;
                redirect('osr/Dash', 'refresh');
            } else {
                $data['response'] = "يوجد خطأ في اسم المستخدم او كلمه المرور يمكنك التواصل مع الجمعية ";
                $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $this->load->view('osr/users/login', $data);
            }
       

    }

    public function logout()
    {
//        $this->Users->update_log();
//        $this->Users->insert_action_log($_SESSION['user_id'], 'out');
//        $this->Users->update_last_login($_SESSION['user_id']);
        $this->session->sess_destroy();
        redirect('/Login_osr', 'refresh');
    }

}