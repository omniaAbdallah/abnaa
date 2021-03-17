<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    //
public function  __construct(){
    parent::__construct();
       $this->load->model('system_management/Pages'); //osama
}
 function  index(){
    
     if($this->session->has_userdata('is_logged_in')==1){
            redirect('Dash');
     }
     $data['title']='نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
     $data['metakeyword']='نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
     $data['metadiscription']='  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
    $this->load->view('admin/users/login',$data);
 }
    public  function check_login(){
        $this->load->model('Users');
        $userdata=$this->Users->check_user_data();
    
        
        if($userdata !='' and  $userdata['approved'] == 1  ){
            $userdata['is_logged_in']=true;
            $userdata['group_number']="0";
              $userdata['main_data_info'] =$this->Pages->main_data_info(); //osama
            $this->session->set_userdata($userdata);
           //    $this->Users->insert_action_log($_SESSION['user_id'],'log'); 
               
        $this->Users->insert_action_log($_SESSION['user_id'], 'log');
        $this->Users->update_login();/*9-9-20-om*/
               
            redirect('Dash');
        }else{
     $data['title']='نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
     $data['metakeyword']='نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
     $data['metadiscription']='  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء';
            $data['response']="لا يمكنك الدخول علي البرنامج ";
            $this->load->view('admin/users/login',$data);
        }
    }
    public function logout(){
          $this->load->model('Users');
            $this->Users->update_log();
          $this->Users->insert_action_log($_SESSION['user_id'],'out'); 
         $this->Users->update_last_login($_SESSION['user_id']); 
        $this->session->sess_destroy();
        redirect('/login','refresh');
    }

}