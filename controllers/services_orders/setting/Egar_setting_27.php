<?php
/**
 * application/controllers/services_orders/setting/Egar_setting.php
 */

class Egar_setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('services_models/setting/Egar_setting_m');

        $this->myarray = $this->Egar_setting_m->all_settings();

//        /**********************************************************/
//        $this->load->model('familys_models/for_dash/Counting');
//        $this->count_basic_in  = $this->Counting->get_basic_in_num();
//        $this->files_basic_in  = $this->Counting->get_files_basic_in();
//        /*************************************************************/
    }

    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تحذير  !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>خطأ!</strong> ' . $text . '.</div>');
        }
    }

    public function messages($type, $text, $method = false)
    {
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }


    public function index($type=0) /*services_orders/setting/Egar_setting*/
    {
        $data['typee']= $type;
        $data['all']= $this->Egar_setting_m->get_all_data_settings($this->myarray);

        $data['title'] = 'اعدادات طلب الإيجار';
        $data['subview'] = 'admin/services_orders/setting/Egar_setting_view';
        $this->load->view('admin_index', $data);

    }

    public function AddSetting($from_code){  // services_orders/setting/Egar_setting/AddSetting

        if($this->input->post('add')){
            $this->Egar_setting_m->add($from_code);
            $this->messages('success',' تم الإضافة بنجاح '.$this->myarray[$from_code]);
            redirect('services_orders/setting/Egar_setting/index/'.$from_code,'refresh');

        }

    }
    public function UpdateSetting($id,$from_code){


        if($this->input->post('add')){
            $this->Egar_setting_m->update($id);
            $this->messages('success','تم تحديث البيانات');
            redirect('services_orders/setting/Egar_setting/index/'.$from_code,'refresh');
        }

        $data['typee']= $from_code;
        $data['all']= $this->Egar_setting_m->get_all_data_settings($this->myarray);


        $data['record'] = $this->Egar_setting_m->getById($id);
        $data['typee'] = $from_code ;
        $data['id']=$id;


        $data['title'] = 'اعدادات طلب الإيجار';
        $data['subview'] = 'admin/services_orders/setting/Egar_setting_view';
        $this->load->view('admin_index', $data);
    }

    public function DeleteSetting($id,$from_code){
        $this->Egar_setting_m->delete($id);
        $this->messages('success','تم الحذف بنجاح');
        redirect('services_orders/setting/Egar_setting/index/'.$from_code,'refresh');
    }

}