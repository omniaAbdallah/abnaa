<?php
class Message_c extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/message/Message_m');
    }
    //--------------------------------------------------
    private function test($data = array()){
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
     public function index(){ //family_controllers/message/Message_c
       if($this->input->post('ADD') == "ADD"){
             $this->Message_m->insert();
             $this->message('success','تمت إضافة المجموعة   ');
            redirect('family_controllers/message/Message_c', 'refresh');
        }else {
            $data['all_data']=$this->Message_m->select_all();
            $data['family_category'] = $this->Message_m->get_table("family_category", array());
            $data['files_status'] = $this->Message_m->get_table("files_status_setting", array());
            $data['title'] = '  إدارة المجموعات  ';
            $data['metakeyword'] = ' إدارة المجموعات    ';
            $data['metadiscription'] = ' إدارة المجموعات   ';
            $data['subview'] = 'admin/familys_views/message/add_message';
            $this->load->view('admin_index', $data);
        }    
    }
    public function LoadPage_details(){   
        $member_type=$this->input->post('member_type');
        $data_load['member_type']=$this->input->post('member_type');
        $id=$this->input->post('id');
        $data_load['data_table']=$this->Message_m->select_sarf_detals($id);
        $this->load->view('admin/familys_views/message/load_family_details', $data_load);
}
 public function LoadPage(){   
        $member_type=$this->input->post('member_type');
        $data_load['member_type']=$this->input->post('member_type');
        $data_load=$_POST;
        if($member_type == 1){      
                $Conditions_arr = array("basic.final_suspend" => 4);
                $data_load['data_table'] = $this->Message_m->select_where_cashing(array("basic.final_suspend" => 4)); 
                $this->load->view('admin/familys_views/message/load_family', $data_load); 
        }elseif($member_type == 2){
               $data_load['data_table']=$this->Message_m->get_all_files();
                  $this->load->view('admin/familys_views/message/load_family', $data_load);
        }elseif ($member_type == 3){
              $data_load['data_table']=$this->Message_m->get_new_files();
               $this->load->view('admin/familys_views/message/load_family', $data_load);
        }   
    }
    public function Update($id){  
        if($this->input->post('UPDATE') == "UPDATE"){
            $this->Message_m->update($id);
            $this->message('success','تم تعديل  المجموعة    ');
            redirect('family_controllers/message/Message_c', 'refresh');
        }
         $sarf_data=$data["sarf_data"]=$this->Message_m->getByArray($id);
        $data["sarf_details"]=$this->Message_m->select_sarf_detals($id);
        $data['family_category'] = $this->Message_m->get_table("family_category", array());
        $data['files_status'] = $this->Message_m->get_table("files_status_setting", array());
        $data['title'] = 'تعديل المجموعة     ';
        $data['metakeyword'] = 'تعديل المجموعة       ';
        $data['metadiscription'] = 'تعديل المجموعة       ';
        $data['subview'] = 'admin/familys_views/message/add_message';
        $this->load->view('admin_index', $data);
    }
    public function delete($id)
    {
        $this->Message_m->delete($id);
        redirect('family_controllers/message/Message_c', 'refresh');
    }
   /////yarastart20-2-2021
   //send_message_osr
public function send_message_osr(){ //family_controllers/message/Message_c/send_message_osr
    if($this->input->post('ADD') == "ADD"){
     $this->Message_m->insert_send_message_osr();
     $this->message('success','تمت إضافة    ');
    redirect('family_controllers/message/Message_c/send_message_osr', 'refresh');
}else {
    $data['all_data']=$this->Message_m->select_all_messages();
    $data['groups'] = $this->Message_m->get_table("osr_message", array());
    $data['namazeg'] = $this->Message_m->get_table("osr_namazeg_messages", array());
    $data['title'] = '  إدارة الرسائل  ';
    $data['metakeyword'] = ' إدارة الرسائل    ';
    $data['metadiscription'] = ' إدارة الرسائل   ';
    $data['subview'] = 'admin/familys_views/message/send_message_osr';
    $this->load->view('admin_index', $data);
}    
}
public function LoadPage_send_message(){   
    $member_type=$this->input->post('member_type');
    $data_load['member_type']=$this->input->post('member_type');
    $data_load=$_POST;
    if($member_type == 2){      
            $Conditions_arr = array("basic.final_suspend" => 4);
            $data_load['data_table'] = $this->Message_m->select_where_cashing(array("basic.final_suspend" => 4)); 
            $this->load->view('admin/familys_views/message/load_family_send_message', $data_load); 
    }  
}
public function LoadPage_details_message(){   
    $member_type=$this->input->post('member_type');
    $data_load['member_type']=$this->input->post('member_type');
    $id=$this->input->post('id');
    $data_load['data_table']=$this->Message_m->select_sarf_detals_message($id);
    $this->load->view('admin/familys_views/message/load_family_details_message', $data_load);
}
public function Update_send_message_osr($id){  
    if($this->input->post('UPDATE') == "UPDATE"){
        $this->Message_m->update_message($id);
        $this->message('success','تم تعديل      ');
        redirect('family_controllers/message/Message_c/send_message_osr', 'refresh');
    }
    $sarf_data=$data["sarf_data"]=$this->Message_m->getByArray_message($id);
    $data["sarf_details"]=$this->Message_m->select_sarf_detals_message($id);
    $data['groups'] = $this->Message_m->get_table("osr_message", array());
    $data['namazeg'] = $this->Message_m->get_table("osr_namazeg_messages", array());
    $data['title'] = 'تعديل الرسائل     ';
    $data['metakeyword'] = 'تعديل الرسائل       ';
    $data['metadiscription'] = 'تعديل الرسائل       ';
    $data['subview'] = 'admin/familys_views/message/send_message_osr';
    $this->load->view('admin_index', $data);
 }
public function delete_message($id)
 {
     $this->Message_m->delete_message($id);
     $this->message('success','تم الحذف      ');
     redirect('family_controllers/message/Message_c/send_message_osr', 'refresh');
 }
 public function send_message()
 {
    $id=$this->input->post('id');
    $this->Message_m->send_message($id);
 }
 ////////////////////////////////////نماذج الرسائل///////////////////
 public function add_namazeg_message(){ //family_controllers/message/Message_c/add_namazeg_message
    if($this->input->post('ADD') == "ADD"){
     $this->Message_m->add_namazeg_message();
     $this->message('success','تمت إضافة    ');
    redirect('family_controllers/message/Message_c/add_namazeg_message', 'refresh');
}else {
    $data['all_data']=$this->Message_m->select_all_namazeg_message();
 
    $data['title'] = '   نماذج الرسائل  ';
    $data['metakeyword'] = '  نماذج الرسائل    ';
    $data['metadiscription'] = '  نماذج الرسائل   ';
    $data['subview'] = 'admin/familys_views/message/add_namazeg_message';
    $this->load->view('admin_index', $data);
}    
}


public function Update_namazeg_message($id){  
    if($this->input->post('UPDATE') == "UPDATE"){
        $this->Message_m->update_namazeg_message($id);
        $this->message('success','تم تعديل      ');
        redirect('family_controllers/message/Message_c/add_namazeg_message', 'refresh');
    }
    $sarf_data=$data["sarf_data"]=$this->Message_m->getByArray_namazeg_message($id);
    $data['title'] = 'تعديل نماذج الرسائل     ';
    $data['metakeyword'] = 'تعديل نماذج الرسائل       ';
    $data['metadiscription'] = 'تعديل نماذج الرسائل       ';
    $data['subview'] = 'admin/familys_views/message/add_namazeg_message';
    $this->load->view('admin_index', $data);
 }
 public function get_namozag_message()
 {
     $id=$this->input->post('namozag_message');
     $data['reason']=$this->Message_m->get_namozag_byId($id);
     $this->load->view('admin/familys_views/message/get_namozag_message', $data);
 }
public function delete_namazeg_message($id)
 {
     $this->Message_m->delete_namazeg_message($id);
     $this->message('success','تم الحذف      ');
     redirect('family_controllers/message/Message_c/add_namazeg_message', 'refresh');
 }
}// END CLASS