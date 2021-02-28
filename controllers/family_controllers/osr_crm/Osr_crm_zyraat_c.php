<?php
class Osr_crm_zyraat_c extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        $this->load->model("familys_models/Register");
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

    public function add_crm($mother_num = null)
    { //family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm
        // $this->test($_SESSION);
        if ($this->input->post('ADD') == "ADD") {
            $this->Osr_crm_zyraat_m->insert();
            $this->message('success', 'تمت إضافة زيارة   ');
            if ($mother_num != null) {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $mother_num, 'refresh');
            } else {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            }
        }else {
            if ($mother_num != null) {
                $data['employees'] = $this->Register->select_all_employee();
                $data["basic_data_family"] = $this->basic_family_data($mother_num);
                $data['mother_national_num'] = $mother_num;
                $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
                $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($mother_num);
                $data['all_data'] = $this->Osr_crm_zyraat_m->select_all($mother_num);
            } else {
                $data['all_data'] = $this->Osr_crm_zyraat_m->select_all();
            }

            // $data['method_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'method_etsal'));
            // $data['natega_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'natega_etsal'));
            $data['purpose_visit'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type' => 'purpose_visit'));
            $data['title'] = '  إنشاء موعد زيارة  ';
            $data['metakeyword'] = ' إنشاء موعد زيارة       ';
            $data['metadiscription'] = ' إنشاء موعد زيارة   ';
            $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_zyraat';
            $this->load->view('admin_index', $data);
        }
    }

    private function basic_family_data($mother_num_fk)
    {
        $this->load->model('familys_models/osr_crm/Osr_crm_zyraat_m');
        $basic_data = $this->Osr_crm_zyraat_m->get_basic_mother_num($mother_num_fk);
        return $basic_data;
    }

    //
    public function Update($id, $mother_num = null)
    {
        if ($this->input->post('UPDATE') == "UPDATE") {
            $this->Osr_crm_zyraat_m->update($id);
            $this->message('success', 'تم تعديل      ');
            if ($mother_num != null) {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $mother_num, 'refresh');
            } else {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            }
            //  redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
        }
        if ($mother_num != null) {
            $data['mother_national_num'] = $mother_num;
            $data['employees'] = $this->Register->select_all_employee();
            $data["basic_data_family"] = $this->basic_family_data($mother_num);

        }

        //  $data['mother_national_num']=$mother_national_num;
        $crm_data = $data["crm_data"] = $this->Osr_crm_zyraat_m->getByArray($id);
        $data['load_details'] = ('admin/familys_views/talbat_v/main_talb_v/details_load_page');
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["crm_data"]['mother_national_num']);
        //  $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        //  $data['employees'] = $this->Register->select_all_employee();
        //  $data['method_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'method_etsal'));
        //   $data['natega_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'natega_etsal'));
        $data['purpose_visit'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type' => 'purpose_visit'));
        $data['title'] = 'تعديل موعد زيارة   ';
        $data['metakeyword'] = 'تعديل موعد زيارة';
        $data['metadiscription'] = 'تعديل        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/add_crm_zyraat';
        $this->load->view('admin_index', $data);
    }

    public function getDetails()
    {
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($_POST['mother_national_num']);
        $this->load->view('admin/familys_views/osr_crm_v/details_load_page', $data);
    }

    public function delete($id, $mother_num = null)
    {
        $this->Osr_crm_zyraat_m->delete($id);
        $this->message('success', 'تم حذف      ');
        if ($mother_num != null) {
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $mother_num, 'refresh');
        } else {
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
        }
        //   redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
    }
    // all_crm_zyraat
    public function all_crm_zyraat(){ //family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm
             $data['employees'] = $this->Register->select_all_employee();
             $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
             $data['mother_national_num']=$mother_national_num;
             $data['all_data']=$this->Osr_crm_zyraat_m->select_all_crm_zyraat($mother_national_num);
             $data['method_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'method_etsal'));
             $data['natega_etsal'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type'=>'natega_etsal'));
             $data['title'] = '    جدول الزيارات   ';
             $data['metakeyword'] = '   جدول الزيارات    ';
             $data['metadiscription'] = '  جدول الزيارات   ';
             $data['subview'] = 'admin/familys_views/osr_crm_v/all_crm_zyraat';
             $this->load->view('admin_index', $data);
     }
     public  function check_date(){   
        $visit_date =$this->input->post('visit_date');
        $visit_time_from =$this->input->post('visit_time_from');
        $visit_time_to =$this->input->post('visit_time_to');
        echo $this->Osr_crm_zyraat_m->check_date($visit_date,$visit_time_from,$visit_time_to);
    }
        public function getFamilyTable()
    {
        $customer = $this->Osr_crm_zyraat_m->select_family_table();
        //$this->test($customer);
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
               if ($row['file_num'] == 0) {
                    $file_num = $row['id'];
                } 
                if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];
                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];
                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $button = '<input type="radio" name="radio" data-father="' . $row['mother_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $file_num . '"
                      ondblclick="getFile_num(' . $file_num . ')">';
                if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                    $father_full_name = $row['father_full_name'];
                } else {
                    $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                    $father_national_num = $row['father_national_num'];
                } else {
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $on_click_data = array('father' => $row['mother_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' =>  $file_num);
                $arr['data'][] = array(
                   $x,
                    $this->add_link($file_num, $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
        public function getFamilyTable_file()
    {
        $customer = $this->Osr_crm_zyraat_m->select_family_table_file();
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                if ($row['file_num'] != 0 && $row['file_num'] != null) {
                    $file_num = $row['file_num'];
                } 
                if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];
                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];
                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $button = '<input type="radio" name="radio" data-father="' . $row['mother_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $row['file_num'] . '"
                      ondblclick="getFile_num(' . $row['file_num'] . ')">';
                if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                    $father_full_name = $row['father_full_name'];
                } else {
                    $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                    $father_national_num = $row['father_national_num'];
                } else {
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $on_click_data = array('father' => $row['mother_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' => $row['file_num']);
                $arr['data'][] = array(
                  $x,
                    $this->add_link($file_num, $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
   /* public function getFamilyTable()
    {
        $customer = $this->Osr_crm_zyraat_m->select_family_table();
        $arr = array();
        $arr['data'] = array();
        if (!empty($customer)) {
            $x = 0;
            foreach ($customer as $row) {
                $x++;
                if ($row['file_num'] != 0 && $row['file_num'] != null) {
                    $file_num = $row['file_num'];
                    $f2a="ملف";
                } elseif ($row['file_num'] == 0) {
                    $file_num = $row['id'];
                    $f2a="طلب";
                } 
                if ($row['mother_name'] != '' and $row['mother_name'] != null) {
                    $mother_name = $row['mother_name'];
                } elseif ($row['mother_name'] == '') {
                    $mother_name = $row['full_name_order'];
                } else {
                    $mother_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['mother_new_card'] != '' and $row['mother_new_card'] != null) {
                    $mother_new_card = $row['mother_new_card'];
                } elseif ($row['mother_new_card'] == '' and $row['id'] >= 852) {
                    $mother_new_card = $row['mother_national_num'];
                } else {
                    $mother_new_card = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $button = '<input type="radio" name="radio" data-father="' . $row['mother_name'] . '"
                    data-father-card="' . $row['father_national_num'] . '"  data-mother="' . $row['mother_national_num'] . '" id="radio' . $row['file_num'] . '"
                      ondblclick="getFile_num(' . $row['file_num'] . ')">';
                if ($row['father_full_name'] != '' and $row['father_full_name'] != null) {
                    $father_full_name = $row['father_full_name'];
                } else {
                    $father_full_name = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                if ($row['father_national_num'] != '' and $row['father_national_num'] != null) {
                    $father_national_num = $row['father_national_num'];
                } else {
                    $father_national_num = '<span class="label label-pill label-danger m-r-15">إستكمل البيانات</span>';
                }
                $on_click_data = array('father' => $row['mother_name'],
                    'father_card' => $row['father_national_num'],
                    'mother' => $row['mother_national_num'], 'file_num' => $row['file_num']);
                $arr['data'][] = array(
                    $this->add_link($x, $on_click_data),
                    $this->add_link($file_num, $on_click_data),
                    $this->add_link($father_full_name, $on_click_data),
                    $this->add_link($father_national_num, $on_click_data),
                    $this->add_link($mother_name, $on_click_data),
                    $this->add_link($mother_new_card, $on_click_data),
                    $this->add_link($f2a, $on_click_data),
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }*/
    public function change_time_zyraa()
{
    $data['id'] = $this->input->post('id');
    $data["crm_data"] = $this->Osr_crm_zyraat_m->getByArray($data['id']);
    $data['purpose_visit'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type' => 'purpose_visit'));
      $data['action_visit_history'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_zyraat_history", array('visit_id_fk' => $data['id']));
    $data['load_details'] = ('admin/familys_views/osr_crm_v/detalis_load');
    $this->load->view('admin/familys_views/osr_crm_v/change_time_load', $data);
}
function do_change_time_zyraa(){
    $id = $this->input->post('id');
    $this->Osr_crm_zyraat_m->do_change_time_zyraa($id);
}
    public function add_link($title, $arr)
    {
        return '<a  id="radio' . $arr['file_num'] . '" data-father="' . $arr['father'] . '"  
            data-father-card="' . $arr['father_card'] . '"
             data-mother="' . $arr['mother'] . '"  
             ondblclick="getFile_num(' . $arr['file_num'] . ')">' . $title . '</a>';
    }
    public function getDetails_zyraa()
{
    $id = $this->input->post('id');
//        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
    $crm_data = $data["crm_data"] = $this->Osr_crm_zyraat_m->getByArray($id);
//        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($data["crm_data"]['mother_national_num']);
    $data['purpose_visit'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type' => 'purpose_visit'));
        $data['action_visit_history'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_zyraat_history", array('visit_id_fk' => $id));
    $this->load->view('admin/familys_views/osr_crm_v/detalis_load', $data);
}
          public function main(){ 
            $this->load->model('familys_models/osr_crm/Osr_crm_m');
            $data['all_data']=$this->Osr_crm_m->select_all_youm();
            $data['all_data_zyrat']=$this->Osr_crm_zyraat_m->select_all_youm();
            $data["all_etslat"] = $this->Osr_crm_m->get_count_etsal()->num_rows();
            $data["all_visits"] = $this->Osr_crm_zyraat_m->get_count_zeyarat('')->num_rows();
            $data["all_visits_ended"] = $this->Osr_crm_zyraat_m->get_count_zeyarat('yes')->num_rows();
            $data["all_visits_gari"] = $this->Osr_crm_zyraat_m->get_count_zeyarat('no')->num_rows();
            $data['subview'] = 'admin/familys_views/osr_crm_v/baheth';
             $this->load->view('admin_index', $data);  
         }
     ///new_func
    // start_zyraa
    public function start_zyraa($id, $mother_num = null)
    {
        if ($this->input->post('add') == "add") {
            $this->Osr_crm_zyraat_m->end_zyraa($id);
            $this->message('success', 'تم الانهاء بنجاح      ');
            // redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            if ($mother_num != null) {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $mother_num, 'refresh');
            } else {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            }
        }

         $crm_data=$data["crm_data"]=$this->Osr_crm_zyraat_m->getByArray($id);
         $data['id']=$id;
         $data['mother_national_num']=$data["crm_data"]['mother_national_num'];
        $data['arr_op']=  $this->Osr_crm_zyraat_m->get_from_family_setting(28);
        $data['arr_in']=  $this->Osr_crm_zyraat_m->get_from_family_setting(27);
        $data['arr_type']=  $this->Osr_crm_zyraat_m->get_from_family_setting(29);
        $data["basic_data_family"]=$this->basic_family_data($data["crm_data"]['mother_national_num']);
        $data['all_cat'] =  $this->Osr_crm_zyraat_m->select_Family_categories();
        $data['family_new_cat'] =  $this->Osr_crm_zyraat_m->specific_familys_category($data["crm_data"]['mother_national_num']);
        $data["mother"]= $this->Osr_crm_zyraat_m->select_search_mother($data['crm_data']['mother_national_num']);
        $data["member"]= $this->Osr_crm_zyraat_m->select_search_member($data['crm_data']['mother_national_num']);
        $data['title'] = 'بدء الزيارة      ';
        $data['metakeyword'] = 'بدء الزيارة        ';
        $data['metadiscription'] = 'بدء الزيارة        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/start_zyraa';
        $this->load->view('admin_index', $data);
    }

    public function start_time_zyraa()
    {
        $id = $this->input->post('id');
        $this->Osr_crm_zyraat_m->start_time_zyraa($id);
    }

    public function complete_zyraa_data($id, $mother_num = null)
    {
        if ($this->input->post('add') == "add") {
            //$this->test($_POST);
            $this->Osr_crm_zyraat_m->complete_zyraa_data($id);
            $this->message('success', 'تم إستكمال  بيانات الزيارة بنجاح ');
            //   redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            if ($mother_num != null) {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/' . $mother_num, 'refresh');
            } else {
                redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm', 'refresh');
            }
        }
         $crm_data=$data["crm_data"]=$this->Osr_crm_zyraat_m->getByArray($id);
         $data['id']=$id;
         $zyraa_data=$data["zyraa_data"]=$this->Osr_crm_zyraat_m->getByArray_zyraa_data($id);
         $data['mother_national_num']=$data["crm_data"]['mother_national_num'];
        $data['arr_op']=  $this->Osr_crm_zyraat_m->get_from_family_setting(28);
        $data['arr_in']=  $this->Osr_crm_zyraat_m->get_from_family_setting(27);
        $data['arr_type']=  $this->Osr_crm_zyraat_m->get_from_family_setting(29);
        $data["basic_data_family"]=$this->basic_family_data($data["crm_data"]['mother_national_num']);
        $data['all_cat'] =  $this->Osr_crm_zyraat_m->select_Family_categories();
         $data['family_new_cat'] =  $this->Osr_crm_zyraat_m->specific_familys_category($data["crm_data"]['mother_national_num']);
         $data["mother"]= $this->Osr_crm_zyraat_m->select_search_mother($data['crm_data']['mother_national_num']);
         $data["member"]= $this->Osr_crm_zyraat_m->select_search_member($data['crm_data']['mother_national_num']);
        $data['title'] = 'إستكمال بيانات الزيارة      ';
        $data['metakeyword'] = 'إستكمال بيانات الزيارة         ';
        $data['metadiscription'] = 'إستكمال بيانات الزيارة        ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/complete_zyraa';
        $this->load->view('admin_index', $data);
    }        
  /**********************************************/
  public function transformatiom_zyraa()
{
    $data['id'] = $this->input->post('id');
    $data["crm_data"] = $this->Osr_crm_zyraat_m->getByArray($data['id']);
    $data['purpose_visit'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_settings", array('type' => 'purpose_visit'));
    $data['action_visit_history'] = $this->Osr_crm_zyraat_m->get_table("osr_crm_zyraat_history", array('visit_id_fk' => $data['id']));
    $data['moder_edara'] = $this->Osr_crm_zyraat_m->get_all_emps_egraat(801);
    $data['visit_transformation_history'] = $this->Osr_crm_zyraat_m->get_all_history($data['id']);
    $data['all_lagna_to'] = $this->Osr_crm_zyraat_m->get_table("lagna");
//$this->test($data['visit_transformation_history'] );
    $data['load_details'] = ('admin/familys_views/osr_crm_v/detalis_load');
    $this->load->view('admin/familys_views/osr_crm_v/transformatiom_zyraa_load', $data);
}
public function process_transform_to_moder_edara()
{
    $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
    if (isset($_POST['save'])) {
        $this->Osr_crm_zyraat_m->add_emp_transform($post);
    }
}
public function process_action_from_moder_edara()
{
    $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
    if (isset($_POST['save'])) {
        $this->Osr_crm_zyraat_m->add_action_moder_edara($post);
    }
}
function all_transformed()
{
    $data['all_data'] = $this->Osr_crm_zyraat_m->get_transformed();
    $data['title'] = ' الطلبات المحولة ';
    $data['subview'] = 'admin/familys_views/osr_crm_v/all_transformed';
    $this->load->view('admin_index', $data);
}
function update_seen_crm_zyraat()
{
    $this->Osr_crm_zyraat_m->update_seen_crm_zyraat();
}
function close_crm_zyraat()
{
    $data['id'] = $this->input->post('id');
    $this->Osr_crm_zyraat_m->close_crm_zyraat($data['id']);
}
   /* public function  crm_money($id){ // family_controllers/Family/money
         $crm_data=$data["crm_data"]=$this->Osr_crm_zyraat_m->getByArray($id);
         $data['id']=$id;
         $mother_national_num= $data['mother_national_num']=$data["crm_data"]['mother_national_num'];
        if($this->input->post('add')){
            $this->Osr_crm_zyraat_m->insert_money($id,$mother_national_num);
            $this->message('success','إضافة الحالة المادية');
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/'.$id);
        }
        if($this->input->post('update')){
            $this->Osr_crm_zyraat_m->update_money($id,$mother_national_num);
            $this->message('success','تعديل الحالة المادية   ');
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/'.$id); 
        }
        $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        $data["all_records"]=$this->Osr_crm_zyraat_m->getArray($id,$mother_national_num);
        $data['income_sources']=  $this->Osr_crm_zyraat_m->get_from_family_setting(42);
        $data['monthly_duties']=  $this->Osr_crm_zyraat_m->get_from_family_setting(43);
        $data['title'] = ' الحالة المادية      ';
        $data['metakeyword'] = ' الحالة المادية         ';
        $data['metadiscription'] = ' الحالة المادية   ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/money_crm';
        $this->load->view('admin_index', $data);
    } */
        public function  crm_money($id){ // /family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/
         $crm_data=$data["crm_data"]=$this->Osr_crm_zyraat_m->getByArray($id);
         $data['id']=$id;
         $mother_national_num= $data['mother_national_num']=$data["crm_data"]['mother_national_num'];
        if($this->input->post('add')){
            $this->Osr_crm_zyraat_m->insert_money($id,$mother_national_num);
            $this->message('success','إضافة الحالة المادية');
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/'.$id);

        }
        if($this->input->post('update')){
            $this->Osr_crm_zyraat_m->update_money($id,$mother_national_num);
            $this->message('success','تعديل الحالة المادية   ');
            redirect('family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/'.$id); 
        }
        //yara22-2-2021
        $data['load_details'] = ('admin/familys_views/osr_crm_v/details_load_page');
        $data['file_num_data'] = $this->Osr_crm_zyraat_m->getFileNUmData($mother_national_num);
         //yara22-2-2021
        $data["basic_data_family"]=$this->basic_family_data($mother_national_num);
        $data["all_records"]=$this->Osr_crm_zyraat_m->getArray($id,$mother_national_num);
        $data['income_sources']=  $this->Osr_crm_zyraat_m->get_from_family_setting(42);
        $data['monthly_duties']=  $this->Osr_crm_zyraat_m->get_from_family_setting(43);
        $data['title'] = ' الحالة المادية      ';
        $data['metakeyword'] = ' الحالة المادية         ';
        $data['metadiscription'] = ' الحالة المادية   ';
        $data['subview'] = 'admin/familys_views/osr_crm_v/money_crm';
        $this->load->view('admin_index', $data);
    } 
}// END CLASS