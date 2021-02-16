<?php
class Moshtrken extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        /**********************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        /*************************************************************/
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('system_management/Groups');

        $this->groups = $this->Groups->get_group($_SESSION["group_number"]);
        $this->groups_title = $this->Groups->get_group_title($_SESSION["group_number"]);
        $this->load->model('md/all_gam3ia_omomia_members/Gam3ia_omomia_members_model');
        $this->load->model('Difined_model');
        $this->load->library('google_maps');
        $this->load->model('human_resources_model/employee_setting/Employee_setting');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function current_hjri_year()
    {
        $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
        $TDays = round($time / (60 * 60 * 24));
        $HYear = round($TDays / 354.37419);
        $Remain = $TDays - ($HYear * 354.37419);
        $HMonths = round($Remain / 29.531182);
        $HDays = $Remain - ($HMonths * 29.531182);
        $HYear = $HYear + 1389;
        $HMonths = $HMonths + 10;
        $HDays = $HDays + 23;
        if ($HDays > 29.531188 and round($HDays) != 30) {
            $HMonths = $HMonths + 1;
            $HDays = Round($HDays - 29.531182);
        } else {
            $HDays = Round($HDays);
        }
        if ($HMonths > 12) {
            $HMonths = $HMonths - 12;
            $HYear = $HYear + 1;
        }
        $NowDay = $HDays;
        $NowMonth = $HMonths;
        $NowYear = $HYear;
        $MDay_Num = date("w");
        if ($MDay_Num == "0") {
            $MDay_Name = "الأحد";
        } elseif ($MDay_Num == "1") {
            $MDay_Name = "الإثنين";
        } elseif ($MDay_Num == "2") {
            $MDay_Name = "الثلاثاء";
        } elseif ($MDay_Num == "3") {
            $MDay_Name = "الأربعاء";
        } elseif ($MDay_Num == "4") {
            $MDay_Name = "الخميس";
        } elseif ($MDay_Num == "5") {
            $MDay_Name = "الجمعة";
        } elseif ($MDay_Num == "6") {
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name . "، " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";
        /*
        $NowDate; لطباعة التاريخ الهجري كامل لهذا اليوم مثلاً (الخميس 1/3/1430 هـ).
        $MDay_Name; طباعة اليوم فقط مثلاً (الخميس).
        $HDays; تاريخ اليوم (1).
        $HMonths; الشهر (3).
        $HYear; السنة الهجرية (1430).
        */
        return $HYear;
    }
    public function messages($type, $text, $method = false)
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
    private function upload_image($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/md/gam3ia_omomia_members';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private function upload_all_file($file_name, $folder = '')
    {

        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/md/gam3ia_omomia_members';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '100000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            //  $this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    private function upload_muli_file($input_name, $folder = '')
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile", $folder);
        }
        return $all_img;
    }


    public function add_moshtrken()
    { // all_Finance_resource/moshtrken/Moshtrken/add_moshtrken



        if ($this->input->post('save')) {

            $member_img = 'mem_img';
            $card_img = 'card_img';
            $file['mem_img'] = $this->upload_image($member_img);
            $file['card_img'] = $this->upload_image($card_img);


//            $file_name = 'morfaq';
//            $morfaq = $this->upload_muli_file($file_name, 'uploads/md/gam3ia_omomia_members');

//            $this->Gam3ia_omomia_members_model->insert($file, $morfaq);
            $this->Gam3ia_omomia_members_model->insert($file);
            $this->messages('success', ' تمت إضافة البيانات بنجاح');

            redirect('all_Finance_resource/moshtrken/Moshtrken/add_moshtrken', 'refresh');


        } else {

            /***************************mymap**********/
            $config = array();
            $config['zoom'] = "auto";
            $marker = array();
            $marker['draggable'] = true;
            $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
            $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
            $config['geocodeCaching'] = TRUE;
            $center = '27.517571447136426,41.71273613027347';
            $config['center'] = $center;
            $this->google_maps->initialize($config);
            $this->google_maps->add_marker($marker);
            $data['maps'] = $this->google_maps->create_map();
            /***************************mymap**********/
            $data["current_hijry_year"] = $this->current_hjri_year();

            $data['gender_data'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(1);
            $data['nationality'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(2);
            $data['social_status'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(4);
            $data['dest_card'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(6);

            $data['cities'] = $this->Gam3ia_omomia_members_model->select_areas();
            $data['ahais'] = $this->Gam3ia_omomia_members_model->select_residentials();

            $data['Degree'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(14);
            $data['science_qualification'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(15);
            $data['employer'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(1);
            $data['job_role'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(3);
            $data['records'] = $this->Gam3ia_omomia_members_model->select_all();
            // $this->test( $data['records']);
            $data['membership_arr'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(2);
            $data['surname_arr'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(4);

            $data['title'] = 'إضافة البيانات الأساسية';
            $data['subview'] = 'admin/md/all_gam3ia_omomia_members/add_gam3ia_member';
            $this->load->view('admin_index', $data);
        }

    }
    public function upload_morfaqs()
    {
        $id = $this->input->post('id');
        $file_name = 'morfaq';
        $morfaq['morfaq'] = $this->upload_muli_file($file_name, 'uploads/md/gam3ia_omomia_members');
        $morfaq['morfaq_name'] = $this->input->post('morfaq_name');
        foreach ($morfaq['morfaq'] as $key => $item) {
            if (!empty($item)) {
                $morfaq['morfaq_name'][$key] = $item;
            }
        }

        $this->Gam3ia_omomia_members_model->update_morfaqs($id, $morfaq['morfaq_name']);

        $this->messages('success', ' تمت رفع المرفقات بنجاح');

        redirect('all_Finance_resource/moshtrken/Moshtrken/add_moshtrken', 'refresh');


    }
    public function update_moshtrken($id)
    {
        $data['result'] = $this->Gam3ia_omomia_members_model->getById($id)[0];
//        $this->test($data['result']);
        if ($this->input->post('save')) {


            $member_img = 'mem_img';
            $card_img = 'card_img';
            $file['mem_img'] = $this->upload_image($member_img);
            $file['card_img'] = $this->upload_image($card_img);


//            $this->test($morfaq);
//            $this->Gam3ia_omomia_members_model->update($file, $id, $morfaq['morfaq_name']);
            $this->Gam3ia_omomia_members_model->update($file, $id);
            $this->messages('success', ' تمت تعديل البيانات بنجاح');
            //    redirect('md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_gam3ia_member', 'refresh');
            redirect('all_Finance_resource/moshtrken/Moshtrken/update_moshtrken/' . $id, 'refresh');
        } else {

            /***************************mymap**********/
            $config = array();
            $config['zoom'] = "auto";
            $marker = array();
            $marker['draggable'] = true;
            $marker['ondragend'] = '$("#lat").val(event.latLng.lat());$("#lng").val(event.latLng.lng());';
            $config['onboundschanged'] = '  if (!centreGot) {
                                                var mapCentre = map.getCenter();
                                                marker_0.setOptions({
                                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                                                });
                                                $("#lat").val(mapCentre.lat());
                                                $("#lng").val(mapCentre.lng());
                                            }
                                            centreGot = true;';
            $config['geocodeCaching'] = TRUE;

            if (!empty($data['result']->map_google_lat) && !empty ($data['result']->map_google_lng)) {
                $center = implode(',', array(
                    $data['result']->map_google_lat,
                    $data['result']->map_google_lng
                ));
            } else {
                $center = '27.517571447136426,41.71273613027347';
            }
            $config['center'] = $center;
            $this->google_maps->initialize($config);
            $this->google_maps->add_marker($marker);
            $data['maps'] = $this->google_maps->create_map();
            /***************************mymap**********/
            $data["current_hijry_year"] = $this->current_hjri_year();
            $data['gender_data'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(1);
            $data['nationality'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(2);

            $data['social_status'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(4);
            $data['dest_card'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(6);
            $data['cities'] = $this->Gam3ia_omomia_members_model->select_areas();
            $data['ahais'] = $this->Gam3ia_omomia_members_model->select_residentials();
            $data['membership_arr'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(2);
            $data['Degree'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(14);
            $data['science_qualification'] = $this->Gam3ia_omomia_members_model->GetFromEmployees_settings(15);
            $data['employer'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(1);
            $data['job_role'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(3);
            $data['surname_arr'] = $this->Gam3ia_omomia_members_model->GetFromGeneral_assembly_settings(4);
            $data['title'] = 'إضافة البيانات الأساسية';
            $data['subview'] = 'admin/md/all_gam3ia_omomia_members/add_gam3ia_member';
            $this->load->view('admin_index', $data);
        }

    }

    public function delete_moshtrken($id)
    {
        $this->Gam3ia_omomia_members_model->delete($id);
        $this->messages('success', ' تمت حذف البيانات بنجاح');
        redirect('all_Finance_resource/moshtrken/Moshtrken/add_moshtrken', 'refresh');
    }
}