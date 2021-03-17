<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_tataw3 extends CI_Controller
{
    //application\controllers\gam3ia_omomia.php
    public function __construct()
    {
        parent::__construct();
     
    }
   
    function index()//tataw3/Login_tataw3
    {
        if ($this->session->has_userdata('is_tataw3_logged_in') == 1) {
            redirect('tataw3/Tataw3_c');
        }
        $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $this->load->view('tataw3/users/login', $data);
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function check_login()
    {
   
     //  $this->test($_POST);
            $this->load->model('tataw3/Tataw3_model');
            $login = $this->Tataw3_model->check_login();
            $pass = sha1(md5($this->input->post('memb_password')));
         //   $this->test($pass);
            if ((!empty($login))) {
                
    
                $sess = $this->session->set_userdata($login);
                $_SESSION['is_tataw3_logged_in'] = true;
                redirect('tataw3/Dash', 'refresh');
            } else {
                $data['response'] = "يوجد خطأ في اسم المستخدم او كلمه المرور يمكنك التواصل مع الجمعية ";
                $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $this->load->view('tataw3/users/login', $data);
    
            }
       

    }

    public function logout()
    {
//        $this->Users->update_log();
//        $this->Users->insert_action_log($_SESSION['user_id'], 'out');
//        $this->Users->update_last_login($_SESSION['user_id']);
        $this->session->sess_destroy();
        redirect('tataw3/Login_tataw3', 'refresh');
    }

}