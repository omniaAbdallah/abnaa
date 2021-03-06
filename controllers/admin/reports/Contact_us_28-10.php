<?php
class Contact_us extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
        $this->load->helper('pagination');
        $this->load->model('contact/Contact_model');
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تم بنجاح!</strong> '.$text.'.
                                                </div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong> تحذير  !</strong> '.$text.'.
                                                </div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>خطأ!</strong> '.$text.'.
                                                </div>');
        }
    }
    public function contact_report(){ // admin/reports/Contact_us/contact_report
        error_reporting(E_ALL & ~E_NOTICE);
        $data['result'] = $this->Contact_model->display_contact();
        $data['subview']='admin/contact/contact_report_view';
        $this->load->view('admin_index',$data);

    }
    public function DeleteContacts($id){ // admin/reports/Contact_us/DeleteContacts
        $this->Contact_model->delete_contact($id);
        $this->message('success','تم الحذف بنجاح');
        redirect('admin/reports/Contact_us/contact_report','refresh');

    }
    public function update_message(){ // admin/reports/Contact_us/update_message
        $id = $this->input->post('id');
        $this->Contact_model->update_message($id);

    }
}