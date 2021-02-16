<?php
/**
 * application/controllers/human_resources/tataw3/setting/Nmazg_setting.php
 */

class Nmazg_setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }

        $this->load->model('human_resources_model/tataw3/setting/Nmazg_setting_m');

        $this->myarray = $this->Nmazg_setting_m->all_settings();

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


    public function index($type=0) /*human_resources/tataw3/setting/Nmazg_setting*/
    {
        $data['typee']= $type;
        //$data['all']= $this->Nmazg_setting_m->get_all_data_settings($this->myarray);

        reset($this->myarray);
        $first_key = key($this->myarray);
        $data['from_code']= $first_key;

        $data['title'] = 'أعدادات النماذج';
        $data['subview'] = 'admin/Human_resources/tataw3_v/setting/Nmazg_setting/Nmazg_setting_view';
        $this->load->view('admin_index', $data);

    }

    public function load_table() {
        /*human_resources/tataw3/setting/Nmazg_setting/load_table*/


        //$data['all']= $this->Nmazg_setting_m->get_all_data_settings($this->myarray);

        $from_code = $this->input->post('from_code');
        $data["from_code"] =  $from_code;
        $data["results"] = $this->Nmazg_setting_m->get_by('tat_nmazg_setting',array("from_code"=>$from_code),'',"id");

        $this->load->view('admin/Human_resources/tataw3_v/setting/Nmazg_setting/load_table',$data);
    }

    public function add_setting(){  // human_resources/tataw3/setting/Nmazg_setting/add_setting

        $from_code = $this->input->post('from_code');
        if($this->input->post('add')){
            $last_insert_id = $this->Nmazg_setting_m->add($from_code);
            $data['value']=$this->Nmazg_setting_m->get_by('tat_nmazg_setting',array("id"=>$last_insert_id),'1');
            $data['num_row']=$this->Nmazg_setting_m->get_count($from_code);

            $this->load->view('admin/Human_resources/tataw3_v/setting/Nmazg_setting/load_row',$data);

            //$this->messages('success',' تم الإضافة بنجاح '.$this->myarray[$from_code]);
            //redirect('familys_models/shroot_setting/Main_setting/index/'.$from_code,'refresh');

        }

    }
    public function update_setting(){

        $from_code = $this->input->post('from_code');
        $id = $this->input->post('id');
        $num_row = $this->input->post('num_row');

        if($this->input->post('add')){
            $this->Nmazg_setting_m->update($id,$from_code);

            $data['value']=$this->Nmazg_setting_m->get_by('tat_nmazg_setting',array("id"=>$id),'1');
            $data['num_row']=$num_row;
            $data['update']= 1;
            $this->load->view('admin/Human_resources/tataw3_v/setting/Nmazg_setting/load_row',$data);
            //echo 1;
            //return;
            //$this->messages('success','تم تحديث البيانات');
            //redirect('human_resources/tataw3/setting/Nmazg_setting/index/'.$from_code,'refresh');
        }

    }

    public function delete_setting(){


        $from_code = $this->input->post('from_code');
        $id = $this->input->post('id');
        $this->Nmazg_setting_m->delete($id);
        echo 1;
        return;
        //$this->messages('success','تم الحذف بنجاح');
        //redirect('human_resources/tataw3/setting/Nmazg_setting/index/'.$from_code,'refresh');
    }

}