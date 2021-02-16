<?php

class Settings extends MY_Controller{


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
        $this->load->model('md/gam3ia_contact/Settings_model');

        $this->myarray = array (
            1=>' نوع التواصل ',
            2=>'اجراءات رسائل التواصل'

        );
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

    public function index($type=0){ // md/gam3ia_contact/Settings

        $data['typee']= $type;
        $data['all'] = $this->Settings_model->get_all_data($this->myarray);
        $data['title'] = "الاعدادات ";
        $data['subview'] = 'admin/md/gam3ia_contact/settings_view';
        $this->load->view('admin_index', $data);
    }
    public function AddSitting($type=0)
    {
        if ($this->input->post('add')) {
            $this->Settings_model->insert_setting($type);
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('md/gam3ia_contact/Settings/index/' . $type, 'refresh');
        }

        elseif ($this->input->post('add_contract')){

            $this->Settings_model->add_contract_setting();
            $this->messages('success', 'تم الاضافة بنجاح ' );
            redirect('md/gam3ia_contact/Settings/index/' . $type, 'refresh');
        }

    }

    public function UpdateSitting($id, $type)
    {
        $data['typee'] = $type;
        $data['get_setting'] = $this->Settings_model->getById($id);
        $data['typee'] = $type;
        $data["id"] = $id;
        $data["type_name"] = $this->myarray[$type];
        if ($this->input->post('add')) {
            $this->Settings_model->update_setting($id);
            $this->messages('success', '  تم التعديل بنجاح');
            redirect('md/gam3ia_contact/Settings/index/' . $type, 'refresh');
        }

        $data['title'] = "الاعدادات ";
        $data['subview'] = 'admin/md/gam3ia_contact/settings_view';
        $this->load->view('admin_index', $data);

    }

    public function DeleteSitting($id, $type)
    {
        $this->Settings_model->delete_setting($id);
        $this->messages('success', 'تم الحذف بنجاح ' );
        redirect('md/gam3ia_contact/Settings/index/' . $type, 'refresh');

    }

}