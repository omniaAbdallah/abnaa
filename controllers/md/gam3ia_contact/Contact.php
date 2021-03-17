<?php
class Contact extends  MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in  = $this->Counting->get_basic_in_num();
        $this->files_basic_in  = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('system_management/Groups');

        $this->groups=$this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title=$this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->library('google_maps');
        $this->load->model('md/gam3ia_contact/Contact_model');
    }
    public function messages($type,$text,$method=false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if($type =='success') {
            return $CI->session->set_flashdata('message','<script> swal({
                    title:"'.$text.'" ,
                    confirmButtonText: "تم"
                })</script>');

        }elseif($type=='warning'){
            return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
        }elseif($type=='error'){
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
        }

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function messages_wared(){ // md/gam3ia_contact/Contact/messages_wared

        $data['egraat'] = $this->Contact_model->get_from_setting(2);
        $data['records']= $this->Contact_model->get_all_messags(0);
        $data['title'] = "رسائل التواصل الوارده ";
        $data['subview'] = 'admin/md/gam3ia_contact/messages_wared';
        $this->load->view('admin_index', $data);
    }

    public function load_message(){
        $row_id = $this->input->post('row_id') ;
        $data['result']= $this->Contact_model->get_by_id($row_id);
        $this->load->view('admin/md/gam3ia_contact/load_message', $data);
    }

    public function update_egraa(){
        $row_id = $this->input->post('row_id') ;
        $this->Contact_model->update_egraa($row_id);
        $data['records']= $this->Contact_model->get_all_messags(0);
        $this->load->view('admin/md/gam3ia_contact/load_all_messages', $data);

    }

    public function messages_read(){ // md/gam3ia_contact/Contact/messages_read


        $data['records']= $this->Contact_model->get_all_messags(4);
        $data['title'] = "رسائل تم الاطلاع عليها  ";
        $data['subview'] = 'admin/md/gam3ia_contact/messages_read';
        $this->load->view('admin_index', $data);
    }


 public function delete_message($id,$url){
        $this->Contact_model->delete_message($id);
        $this->messages('success', '  تم الحذف بنجاح');
        redirect('md/gam3ia_contact/Contact/'.$url, 'refresh');
    }
    
    public function downloads_contact_us($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/md/gam3ia_contact/contact_us/' . $file);
        force_download($name, $data);
    }

}