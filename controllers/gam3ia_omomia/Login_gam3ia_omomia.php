<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_gam3ia_omomia extends CI_Controller
{
    //application\controllers\gam3ia_omomia.php
    public function __construct()
    {
        parent::__construct();
     
    }

    function index()//gam3ia_omomia/Login_gam3ia_omomia
    {
        if ($this->session->has_userdata('is_gam3ia_omomia_logged_in') == 1) {
            redirect('gam3ia_omomia');
        }
        $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
        $this->load->view('gam3ia_omomia/users/login', $data);
    }

    public function check_login()
    {
   
           
            $this->load->model('gam3ia_omomia/Gam3ia_omomia_model');
            $login = $this->Gam3ia_omomia_model->check_login();

            if ((!empty($login))) {
    
    
                $sess = $this->session->set_userdata($login);
                $_SESSION['is_gam3ia_omomia_logged_in'] = true;
                redirect('gam3ia_omomia/Dash', 'refresh');
            } else {
                $data['response'] = "يوجد خطأ في اسم المستخدم او كلمه المرور يمكنك التواصل مع الجمعية ";
                $data['title'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metakeyword'] = 'نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $data['metadiscription'] = '  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
                $this->load->view('gam3ia_omomia/users/login', $data);
    
            }
       

    }

    public function logout()
    {
//        $this->Users->update_log();
//        $this->Users->insert_action_log($_SESSION['user_id'], 'out');
//        $this->Users->update_last_login($_SESSION['user_id']);
        $this->session->sess_destroy();
        redirect('gam3ia_omomia/Login_gam3ia_omomia', 'refresh');
    }

}