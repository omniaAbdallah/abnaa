<?php

class Family extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('main_data/Model_main_data');
        $this->load->model('main_data/Model_data_web');
        $this->load->model('Public_relations/website/about_us/About_us_model', 'about_us');
        $this->load->model('Public_relations/website/shoraka_models/Shoraka_model', 'Shoraka');

        $this->pages_data = $this->about_us->pages_web();
        $this->web_shoraka = $this->Shoraka->selet_webshoraka();
        $this->soeials = $this->Model_main_data->select_all_soeial();
        $this->main_data = $this->Model_main_data->select_main_data();
        $this->web_display = $this->Model_data_web->select();

        $this->load->model('registration_models/Family_model');
        $this->load->model('Difined_model');
        $this->load->model('registration_models/Money');

    }


    //--------------------------------------------------
    
    /*    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
      $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    */
    
    private function upload_file($file_name, $folder = '')
    {
        if (!empty($folder)) {
            $config['upload_path'] = 'uploads/' . $folder;
        } else {
            $config['upload_path'] = 'uploads/files';
        }
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
      $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    
    
    public function upload_image($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        // $config['max_size']    = '1024*8';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

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

    public function thumb($data)
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

    //-----------------------------------------------

    public function upload_all_files($file_name, $folder = "images")
    {
        $config['upload_path'] = 'uploads/' . $folder;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name, $folder = "images")
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            // $all_img[]=$this->upload_image("userFile",$folder);
            $all_img[] = $this->upload_all_files("userFile", $folder);
        }
        return $all_img;
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
            $MDay_Name = "الاحد";
        } elseif ($MDay_Num == "1") {
            $MDay_Name = "الاثنين";
        } elseif ($MDay_Num == "2") {
            $MDay_Name = "الثلاثاء";
        } elseif ($MDay_Num == "3") {
            $MDay_Name = "الاربعاء";
        } elseif ($MDay_Num == "4") {
            $MDay_Name = "الخميس";
        } elseif ($MDay_Num == "5") {
            $MDay_Name = "الجمعة";
        } elseif ($MDay_Num == "6") {
            $MDay_Name = "السبت";
        }
        $NowDayName = $MDay_Name;
        $NowDate = $MDay_Name . "? " . $HDays . "/" . $HMonths . "/" . $HYear . " ??";
        return $HYear;
    }

    public function index()//registration/Family
    {
   // echo $_SESSION['mother_national_num'];
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $this->load->model('Public_relations/gam3ia_contact/Contact_model');
             $this->load->model('Public_relations/website/services_setting_model/Family_web_profile', 'family_web_profile');

            $data['current_year'] = $this->current_hjri_year();

            $data['data'] = $this->family_web_profile->get_family_details($_SESSION['mother_national_num']);
            $data['contact_types'] = $this->Contact_model->get_from_setting(1);


            $data['id_page']=3;
            $data['name_page']='data';
          if ($this->input->post('add')){
              $this->Contact_model->add_contact();
                $this->messages('success', 'تم الاضافة بنجاح ' );
              redirect('registeration/Family');
            }


            $data['subview'] = 'web/registration_views/family_views/main_page';
            $this->load->view('web_home_index', $data);
        } else {
            redirect('registration/Family/family_login');
        }
    }

    public function family_login()
    {
        if ($this->input->post('login') == 1) {
            $login = $this->Family_model->check_login();
              $this->Family_model->make_online();
            if ((!empty($login))) {
                $_SESSION = $login;
                redirect('registration/Family', 'refresh');
            } else {
                $data['response'] = "يوجد خطأ في اسم المستخدم او كلمه المرور يمكنك التواصل مع الجمعية ";
                $data['subview'] = 'web/registration_views/family_views/family_login';
                $this->load->view('web_home_index', $data);
            }
        } else {
            $data['subview'] = 'web/registration_views/family_views/family_login';
            $this->load->view('web_home_index', $data);
        }
    }

    function profile_family()//registration/Family/profile_family
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
//            $data['data'] = $this->Family_model->get_family_details($_SESSION['mother_national_num']);
            $data['data'] = $this->Family_model->get_family_details($_SESSION['mother_national_num']);
            //    $this->test($data['data']);
            $data['current_year'] = $this->current_hjri_year();
 //$data['osra_data'] = $this->Contact_model->get_osra_data($_SESSION['mother_national_num']);

           $data['family_sarf']= $this->Family_model->get_sarf_details($_SESSION['mother_national_num']);
            $this->load->view('web/registration_views/family_views/profile_family_view', $data);
        } else {
            redirect('registration/Family/family_login');
        }
//        echo count($data['data']);
        //  $this->test($data['data']);
    }

    private function cheek_link($last_id)
    {
        $this->load->model('Difined_model');
        $key = $last_id;
        $arr_in = array("mother_national_num_fk" => $key);
        $cheek_value["father"] = $this->Difined_model->getByArray("father", $arr_in);
        $cheek_value["f_members"] = $this->Difined_model->getByArray("f_members", $arr_in);
        $cheek_value["houses"] = $this->Difined_model->getByArray("houses", $arr_in);
        $cheek_value["mother"] = $this->Difined_model->getByArray("mother", $arr_in);
        $cheek_value["financial"] = $this->Difined_model->getByArray("financial", $arr_in);
        $cheek_value["devices"] = $this->Difined_model->getByArray("devices", $arr_in);
        $cheek_value["family_attach_files"] = $this->Difined_model->getByArray("family_attach_files", $arr_in);
        return $cheek_value;
    }

    public function father()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['id_page'] = 3;
            $data['name_page'] = 'data';
            if ($this->input->post('add')) {
                $this->Family_model->insert_father($mother_national_num);
                $type = "general-detailsfa";
                echo 1;
                return;
            }
            $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);
            $data['current_year'] = $this->current_hjri_year();
            $data['father'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num), 1);
            $data['nationality'] = $this->Family_model->get_by('family_setting', array('type' => 2));
            $data['national_id_array'] = $this->Family_model->get_by('family_setting', array('type' => 1));
            $data['job_titles'] = $this->Family_model->get_by('family_setting', array('type' => 3));
            $data['arr_deth'] = $this->Family_model->get_by('family_setting', array('type' => 25));
            $data['id_source'] = $this->Family_model->get_by('family_setting', array('type' => 12));
            $data['employment_jobs'] = $this->Family_model->get_by('family_setting', array('type' => 64));
            $data['jobs'] = $this->Family_model->get_by('family_setting', array('type' => 3));
            $data['diseases'] = $this->Family_model->get_by('family_setting', array('type' => 35));
            $data['associations'] = $this->Family_model->get_by('family_setting', array('type' => 65));
            $data['father_employment_result'] = $this->Family_model->get_by("father_employment", array('mother_national_num_fk' => $mother_national_num));
            $data['father_employees_sons_result'] = $this->Family_model->get_by("father_employees_sons", array('mother_national_num_fk' => $mother_national_num));
            $data['father_special_needs_sons_result'] = $this->Family_model->get_by("father_special_needs_sons", array('mother_national_num_fk' => $mother_national_num));
            $data['father_other_associations_result'] = $this->Family_model->get_by("father_other_associations", array('mother_national_num_fk' => $mother_national_num));
            $data['father_active'] = 1;
            $data['title'] = 'بيانات الأب';
            $this->load->view('web/registration_views/family_views/father', $data);
            return;
        } else {
            echo 0;
            return;
        }
    }

    public function mother()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['id_page'] = 4;
            $data['name_page'] = 'data';
            $data['current_year'] = $this->current_hjri_year();
            $data['mother'] = $this->Family_model->get_by('mother', array("mother_national_num_fk" => $mother_national_num), 1);
            $data['nationality'] = $this->Family_model->get_by('family_setting', array('type' => 2));
            $data['national_id_array'] = $this->Family_model->get_by('family_setting', array('type' => 1));
            $data['living_place_array'] = $this->Family_model->get_by('family_setting', array('type' => 5));
            $data['job_titles'] = $this->Family_model->get_by('family_setting', array('type' => 3));
            $data['health_status_array'] = $this->Family_model->get_by('family_setting', array('type' => 6));
            $data['education_level_array'] = $this->Family_model->get_by('family_setting', array("type" => 8, "id_setting !=" => 9));
            $data['arr_ed_state'] = $this->Family_model->get_by('family_setting', array("type" => 40));
            $data['marital_status_array'] = $this->Family_model->get_by('family_setting', array("type" => 4));
            $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);
            $last_id = $this->Family_model->select_last_id();
            $data['dataa'] = $this->Family_model->get_by('basic', array("id" => $last_id), 1);
            $data['all_field'] = $this->Difined_model->get_field('mother');
            $data['person_type'] = $this->Family_model->get_by('family_setting', array("type" => 32));
            $data['relationships'] = $this->Family_model->get_by('family_setting', array("type" => 34));
            $data['id_source'] = $this->Family_model->get_by('family_setting', array("type" => 12));
            $data['diseases'] = $this->Family_model->get_by('family_setting', array("type" => 35));
            $data['responses'] = $this->Family_model->get_by('family_setting', array("type" => 36));
            $data['diseases_status'] = $this->Family_model->get_by('family_setting', array("type" => 37));
            $data['women_houses'] = $this->Family_model->get_by('family_setting', array("type" => 44));
            $data['specialties'] = $this->Family_model->get_by('family_setting', array("type" => 45));
            $data['personal_characters'] = $this->Family_model->get_by('family_setting', array("type" => 48));
            $data['relations_with_family'] = $this->Family_model->get_by('family_setting', array("type" => 49));
            $data['works_type'] = $this->Family_model->get_by('family_setting', array("type" => 50));
            $data['project_names'] = $this->Family_model->get_by('family_setting', array("type" => 59));
            $data['project_status'] = $this->Family_model->get_by('family_setting', array("type" => 60));
            $data['skills'] = $this->Family_model->get_by('family_setting', array("type" => 62));
            $data['dwrat'] = $this->Family_model->get_by('family_setting', array("type" => 61));
            $data['haj_omra_geha'] = $this->Family_model->get_by('family_setting', array("type" => 63));
            $data["courses_arr"] = $this->Family_model->GetCourses_skills(array('mother_national_num_fk' => $mother_national_num, 'type' => 1));
            $data["result_courses"] = $this->Family_model->GetCourses_skills_data(array('mother_national_num_fk' => $mother_national_num, 'type' => 1));
            $data["result_skills"] = $this->Family_model->GetCourses_skills(array('mother_national_num_fk' => $mother_national_num, 'type' => 2));
            $data['member_status'] = $this->Family_model->get_by('files_status_setting');
            $data['title'] = 'بيانات الأم  ';
            if ($this->input->post('add')) {
                $this->Family_model->insert_mother($mother_national_num);
                //  redirect('Web/mother');
                $type = $this->uri->segment(3);
//                redirect('Web/mother/' . $type, 'refresh');
                echo 1;
                return;
            }
//            $data['kafala_details'] = $this->Mother->Getkafalat($data['all_links']['mother']['id']);
            $data['subview'] = 'web/family_profile/mother';
            $this->load->view('web/registration_views/family_views/mother', $data);
        } else {
            echo 0;
            return;
        }
    }

    public function service_order()
    {
//        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
        $data['data'] = $this->Family_model->get_family_details($_SESSION['mother_national_num']);
        $data['service'] = $this->Family_model->get_services();
//            $data['id_page'] = 1;
//            $data['name_page'] = 'service';
//          $this->test($data['data']);
//        } else {
//            redirect('Web/family_login');
//
//        }
//        $data['subview'] = 'web/family_profile/service_order';
        $this->load->view('web/registration_views/family_views/service_order', $data);
    }

    //yara14-3-2020
    public function family_register()
//registration/Family/family_register
    {
        $this->load->model("registration_models/Family_model");
        $data['national_id_array'] = $this->Family_model->select_search_key('family_setting', 'type', 1);
        $data['marital_status_array'] = $this->Family_model->select_search_key('family_setting', 'type', 4);
        $data["relationships"] = $this->Family_model->selectByType('family_setting', 'type', 34, 41);
        $data['all_city'] = $this->Family_model->select_type(3);
        if ($this->input->post('mother_national_num_chik')) {
            $arr["in"] = $this->Family_model->select_search_key('basic', 'mother_national_num', $this->input->post('mother_national_num_chik'));
            $this->load->view('web/registration_views/family_views/load', $arr);
        }
        if ($this->input->post('ADD') == 'ADD') {
            $this->Family_model->insert_new_register($this->input->post('mother_national_num'));
        }
       /* $data['cond'] = $this->Family_model->display_files(1);
        $data['accept'] = $this->Family_model->display_files(3);
        $data['file'] = $this->Family_model->display_files(2);*/
        
        $data['cond'] = $this->Family_model->get_by('family_shroot_tasgel_setting', array("from_code" => 101));
        $data['file'] = $this->Family_model->get_by('family_shroot_tasgel_setting', array("from_code" => 102));
        $data['accept'] = $this->Family_model->get_by('family_shroot_tasgel_setting', array("from_code" => 103));

        $data['subview'] = 'web/registration_views/family_views/family_register';
        $this->load->view('web_home_index', $data);
    }

    public function CheckNationalNum()
    {
        //  $this->load->model("familys_models/Register");
        $mother_national_num = $this->input->post('chek_mother_national_num');
        echo $this->Family_model->check_national_num($mother_national_num);
    }

    public function GetArea()
    {
        if ($this->input->post('get_sub_id')) {
            // $this->load->model('familys_models/Model_area_sitting');
            $id = $this->input->post('get_sub_id');
            $data["records_row"] = $this->Family_model->select_places($id);
            // web/registration_views/family_views/load_places
            $this->load->view('web/registration_views/family_views/load_places', $data);
            //  json_encode($data["records_row"]);
        }
    }

    public function all_requested_from_web()//registration/Family/all_requested_from_web
    {
        $this->load->model("registration_models/Family_model");
        $data['orders'] = $this->Family_model->select_all_order_web();
        $data['title'] = "عرض طلبات  الاسر من البوابة ";
        $data['subview'] = 'admin/registration_views/family_views/web_registration_orders_family';
        $this->load->view('admin_index', $data);
    }

//yara


    public function add_responsible_account()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];

            if ($this->input->post('add')) {
                $img = $this->upload_image('bank_image');
                $this->Responsible_account->insert($mother_national_num, $img);
//                $this->messages('success', 'تم إضافة بيانات مسئول الحساب بنجاح');
                redirect('Web/add_responsible_account');
            }
            /* $data["father_national_card"] = $this->Family_members->get_father_national_card($mother_national_num);
             $data["father_name"] = $this->Family_members->get_father_name($mother_national_num);
             $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);
             $data['name'] = $this->Responsible_account->get_mother_data($mother_national_num);
             $data['f_members'] = $this->Responsible_account->get_mother_f_members($mother_national_num);
             $data["relationships"] = $this->Difined_model->select_search_key('family_setting', 'type', 34);
             $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', "id", "asc");*/
            $data['records'] = $this->Family_model->get_all_family_bank_responsible($mother_national_num);
            $data['title'] = "بيانات الحساب البنكي";
//            $data['subview'] = 'web/family_profile/responsible_account';
            $this->load->view('web/registration_views/family_views/responsible_account', $data);
        } else {
            redirect('Web/family_login');
            echo 0;
            return;
        }
    }

    public function attach_files()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];

            $data['type_attach_file'] = $this->Family_model->get_by('family_setting', array("type" => 47));
//            echo '<pre>';
//            print_r($_POST);
//                die;
            if ($this->input->post("ADDOther")) {
                $all_img = $this->upload_muli_image("file_attach_name_other", "family_attached");
                $this->Family_model->insert_all_files_other($mother_national_num, $all_img);
//                $this->messages('success', 'تمت إضافة البيانات بنجاح');
//                redirect('Web/attach_files');
                echo 1;
                return;
            } elseif ($this->input->get("add_row_other") == " ") {
                $this->load->view('web/registration_views/family_views/get_attach_files_other');
            } elseif ($this->input->post("ADD")) {
                $all_img = $this->upload_muli_image("file_attach_name", "family_attached");
                $this->Family_model->insert_all_files($mother_national_num, $all_img);
//                $this->messages('success', 'تمت إضافة البيانات بنجاح');
//                redirect('Web/attach_files');
                echo 1;
                return;
            } elseif ($this->input->get("add_row") == "1") {
                $this->load->view('web/registration_views/family_views/get_attach_files', $data);
            } else {
                $data['data_table'] = $this->Family_model->select_data_table($mother_national_num);
                $data['pdf_active'] = 1;
                $data['data_table_other'] = $this->Family_model->get_by('family_attach_files_other', array("mother_national_num_fk" => $mother_national_num));

//            echo '<pre>';
//                        print_r($this->db->last_query());
//
//                print_r($data);
//                die;
//                $data['data_table_other'] = $this->Attach_files->get_files_other($mother_national_num);
                $data['mother_national_num'] = $mother_national_num;
                $data['header_title'] = 'رفع الوثائق';
//                $data['subview'] = 'web/family_profile/attach_files';
                $this->load->view('web/registration_views/family_views/attach_files', $data);
            }
        } else {
//            redirect('Web/family_login');
        }
    }

    public function downloads_new($file)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/family_attached/' . $file);
        force_download($name, $data);
    }

    public function read_attached_file($file_name)
    {
        $this->load->helper('file');
        $file_path = 'uploads/family_attached/' . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file_name . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }

    public function DeleteFileAttach($id)
    {

        $this->Family_model->delete('family_attach_files', array("id" => $id));
        echo 1;
        return;
    }

    public function DeleteFileAttachOther($id)
    {
        $this->Family_model->delete('family_attach_files_other', array("id" => $id));
        echo 1;
        return;
    }

//yara18-3-2020
    public function family_money()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {

            if ($this->input->post('add')) {
                $id = $_SESSION['mother_national_num'];
                $this->Money->insert($id);
            }
            //----------------------
            if ($this->input->post('update')) {
                $id = $_SESSION['mother_national_num'];
                $this->Money->update($id);
            }
            $data['mothers_data'] = $this->Family_model->select_search_key('mother', "mother_national_num_fk ", $_SESSION['mother_national_num']);
            $data["father_national_card"] = $this->Money->get_father_national_card($_SESSION['mother_national_num']);
            $data["father_name"] = $this->Money->get_father_name($_SESSION['mother_national_num']);
            $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($_SESSION['mother_national_num']);
            $data["all_records"] = $this->Money->getArray($_SESSION['mother_national_num']);
            $data["income_sources"] = $this->Family_model->select_search_key('family_setting', 'type', 42);
            $data["monthly_duties"] = $this->Family_model->select_search_key('family_setting', 'type', 43);
            $this->load->view('web/registration_views/family_views/family_money_view', $data);
        } else {
            redirect('registration/family_login');
        }


    }
    //yara19-3-2020


//----18-3-2020 rehab-------------------------------------------


    public function add_wakel()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['id_page'] = 5;
            $data['name_page'] = 'data';

            $data['employees'] = $this->Family_model->get_by('hr_egraat_emp_setting', array('job_title_code_fk' => 802, 'person_suspend' => 1));

            if ($this->input->post('add')) {

                $national_img = 'w_national_img';
                $file = $this->upload_image($national_img);
                $this->Family_model->insert_wakel($mother_national_num, $file);
//                $this->messages('success', 'تم إضافة بيانات الوكيل بنجاح');
                echo 1;
                return;
                //redirect('registration/Family/add_wakel' );
            }
            $data['current_year'] = $this->current_hjri_year();
            $data['mother_table'] = $this->Family_model->get_by('mother', array('mother_national_num_fk' => $mother_national_num));
            $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);
            $data['relationships'] = $this->Family_model->get_by('family_setting', array('type' => 34));
            $data['id_source'] = $this->Family_model->get_by('family_setting', array('type' => 12));
            $data['national_id_array'] = $this->Family_model->get_by('family_setting', array('type' => 1));
            $data['marital_status_array'] = $this->Family_model->get_by('family_setting', array('type' => 4));
            $data['job_titles'] = $this->Family_model->get_by('family_setting', array('type' => 3));
            $data['father'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num), 1);
            $data['result'] = $this->Family_model->get_by('wakels', array("mother_national_num_fk" => $mother_national_num));

            $data['title'] = "بيانات الوكيل";
//            $data['subview'] = '';
            $this->load->view('web/registration_views/family_views/add_wakel', $data);
            return;

        } else {
            //redirect('registration/Family/family_login');
            echo 0;
            return;
        }

    }


    public function family_members()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {

            $mother_national_num = $_SESSION['mother_national_num'];

            $data['mother_national_num'] = $mother_national_num;
            $data['skills'] = $this->Family_model->get_by('family_setting', array("type" => 62), 1);
            $data['dwrat'] = $this->Family_model->get_by('family_setting', array("type" => 61), 1);
            $data["courses_arr"] = $this->Family_model->GetCourses_skills(array('mother_national_num_fk' => $mother_national_num, 'type' => 1));
            $data["result_courses"] = $this->Family_model->GetCourses_skills_data(array('mother_national_num_fk' => $mother_national_num, 'type' => 1));
            $data["result_skills"] = $this->Family_model->GetCourses_skills(array('mother_national_num_fk' => $mother_national_num, 'type' => 2));

            $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);
            $data['father_table'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num));
            $data['mothers_data'] = $this->Family_model->select_mother_search_key('mother', "mother_national_num_fk ", $mother_national_num);
            $data["cuttent_higry_year"] = $this->current_hjri_year();
            $data['job'] = $this->Family_model->get_by('family_setting', array("type" => 3), 1);
            $data['data_door_mrakz'] = $this->Family_model->get_by('family_setting', array("type" => 46), 1);
            $data['member_data'] = $this->Family_model->select_all($mother_national_num);
            $data['current_year'] = $this->current_hjri_year();

            if ($this->input->post('add')) {
                $member_sechool_img = 'member_sechool_img';
                $member_birth_card_img = 'member_birth_card_img';
                $member_photo = 'member_photo';
                $file['member_sechool_img'] = $this->upload_image($member_sechool_img);
                $file['member_birth_card_img'] = $this->upload_image($member_birth_card_img);
                $file['member_photo'] = $this->upload_image($member_photo);
                $this->Family_model->insert_family_member($file, $mother_national_num);
//                $this->messages('success','تم إضافة البيانات بنجاح');
                $data['basic_data'] = $this->Family_model->get_by('basic', array("mother_national_num" => $mother_national_num));

                //redirect('registration/Family/family_members');
                echo 1;
                return;

            }
            if ($this->input->get('main_stage')) {
                $data_load['all_classroom'] = $this->Family_model->get_by('classrooms', array("from_id_fk" => $this->input->get('main_stage')));
                $this->load->view('web/registration_views/family_views/load_class', $data_load);
            } else {

                $data['father_national_card'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num), 'f_national_id');
                $data['all_stages'] = $this->Family_model->get_by('classrooms', array("from_id_fk" => 0));
                $data['nationalities'] = $this->Family_model->get_by('family_setting', array("type" => 2));
                $data['national_num_type'] = $this->Family_model->get_by('family_setting', array("type" => 1));
                $data['scocial'] = $this->Family_model->get_by('family_setting', array("type" => 4));
                $data['education_type'] = $this->Family_model->get_by('family_setting', array("type" => 10));
                $data['member_activity_type_arr'] = $this->Family_model->get_by('family_setting', array("type" => 11));
                $data['health_status_array'] = $this->Family_model->get_by('family_setting', array("type" => 6));
                $data['member_home_type_arr'] = $this->Family_model->get_by('family_setting', array("type" => 5));
                $data['mother_national_num'] = $mother_national_num;
                // $data['banks'] = $this->Difined_model->select_all('banks_settings','','',"id","asc");

                $data['person_type'] = $this->Family_model->get_by('family_setting', array("type" => 32));
                $data['id_source'] = $this->Family_model->get_by('family_setting', array("type" => 12));
                $data['education_level'] = $this->Family_model->get_by('family_setting', array("type" => 8));
                $data['stude_case'] = $this->Family_model->get_by('family_setting', array("type" => 40));
                $data['academic_achievement_level'] = $this->Family_model->get_by('family_setting', array("type" => 39));
                $data['relationships'] = $this->Family_model->get_by('family_setting', array("type" => 34));
                $data['women_houses'] = $this->Family_model->get_by('family_setting', array("type" => 44));

                $data['diseases'] = $this->Family_model->get_by('family_setting', array("type" => 35));
                $data['responses'] = $this->Family_model->get_by('family_setting', array("type" => 36));
                $data['diseases_status'] = $this->Family_model->get_by('family_setting', array("type" => 37));

                $data['personal_characters'] = $this->Family_model->get_by('family_setting', array("type" => 48));
                $data['relations_with_family'] = $this->Family_model->get_by('family_setting', array("type" => 49));
                $data['specialties'] = $this->Family_model->get_by('family_setting', array("type" => 45));
                $data['schools'] = $this->Family_model->get_by('family_setting', array("type" => 26));


                $data['member_family_status'] = $this->Family_model->get_by('persons_status_setting');

                $this->load->view('web/registration_views/family_views/family_members', $data);
                return;

            }// end  if
        } else {

            //redirect('registration/Family/family_login');
            echo 0;
            return;
        }
    }


    public function update_family_members($id)
    {


        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            $data['basic_data'] = $this->Family_model->get_by('basic', array("mother_national_num" => $mother_national_num));

            if ($this->input->post('update')) {
                $member_sechool_img = 'member_sechool_img';  //member_sechool_img
                $member_birth_card_img = 'member_birth_card_img';  // member_birth_card_img
                $member_photo = 'member_photo';
                $file['member_sechool_img'] = $this->upload_image($member_sechool_img);
                $file['member_birth_card_img'] = $this->upload_image($member_birth_card_img);
                $file['member_photo'] = $this->upload_image($member_photo);
                $this->Family_model->update_family_member($id, $file);
                //$this->messages('success', 'تم تعديل البيانات بنجاح');
                //  redirect('family_controllers/Family/Add_Register_2');
                echo 1;
                return;
                //$type=$this->uri->segment(4);
                //redirect('Web/update_family_members/'.$id.'/'. $type, 'refresh');

            } else {

                $select = 'family_setting.title_setting as school_title';
                $joinwhere = 'family_setting.id_setting = f_members.school_id_fk';
                $data['result'] = $this->Family_model->get_by_join('f_members', array("id" => $id), $select, 'family_setting', $joinwhere, 'left');

                $data['father_national_card'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num), 'f_national_id');
                $data['skills'] = $this->Family_model->get_by('family_setting', array("type" => 62));
                $data['dwrat'] = $this->Family_model->get_by('family_setting', array("type" => 61));
                //$data['haj_omra_geha'] = $this->Family_model->get_by('family_setting',array("type" => 63));
                $data['personal_characters'] = $this->Family_model->get_by('family_setting', array("type" => 48));
                $data['relations_with_family'] = $this->Family_model->get_by('family_setting', array("type" => 49));

                $data["courses_arr"] = $this->Family_model->GetCourses_skills(array('family_member_id_fk' => $id, 'type' => 1), 'f_members_courses_and_skills');
                $data["result_courses"] = $this->Family_model->GetCourses_skills_data(array('family_member_id_fk' => $id, 'type' => 1), 'f_members_courses_and_skills');
                $data["result_skills"] = $this->Family_model->GetCourses_skills(array('family_member_id_fk' => $id, 'type' => 2), 'f_members_courses_and_skills');

                $data["basic_data_family"] = $this->Family_model->get_basic_mother_num($mother_national_num);

                $data['father_table'] = $this->Family_model->get_by('father', array("mother_national_num_fk" => $mother_national_num));
                $data['mothers_data'] = $this->Family_model->select_mother_search_key('mother', "mother_national_num_fk ", $mother_national_num);
                $data["cuttent_higry_year"] = $this->current_hjri_year();
                $data['job'] = $this->Family_model->get_by('family_setting', array("type" => 3));

                $data['specialties'] = $this->Family_model->get_by('family_setting', array("type" => 45));
                $data['all_classroom'] = $this->Family_model->get_by('classrooms', array("from_id_fk" => $data['result'][0]->stage_id_fk));
                $data['schools'] = $this->Family_model->get_by('family_setting', array("type" => 26));

                //$data['result']=$this->Difined_model->select_search_key('f_members','id',$id);
               //$data['result'] = $this->Family_members->get_member_data($id);

                $data['all_stages'] = $this->Family_model->get_by('classrooms', array("from_id_fk" => 0));
                $data['nationalities'] = $this->Family_model->get_by('family_setting', array("type" => 2));
                $data['national_num_type'] = $this->Family_model->get_by('family_setting', array("type" => 1));
                $data['scocial'] = $this->Family_model->get_by('family_setting', array("type" => 4));
                $data['education_type'] = $this->Family_model->get_by('family_setting', array("type" => 10));
                $data['member_activity_type_arr'] = $this->Family_model->get_by('family_setting', array("type" => 11));
                $data['health_status_array'] = $this->Family_model->get_by('family_setting', array("type" => 6));
                $data['member_home_type_arr'] = $this->Family_model->get_by('family_setting', array("type" => 5));
                $data['data_door_mrakz'] = $this->Family_model->get_by('family_setting', array("type" => 46));

                $data['members_active'] = 1;
                $data['mother_national_num'] = $mother_national_num;

                $data['person_type'] = $this->Family_model->get_by('family_setting', array("type" => 32));
                $data['id_source'] = $this->Family_model->get_by('family_setting', array("type" => 12));
                $data['education_level'] = $this->Family_model->get_by('family_setting', array("type" => 8));
                $data['stude_case'] = $this->Family_model->get_by('family_setting', array("type" => 40));
                $data['academic_achievement_level'] = $this->Family_model->get_by('family_setting', array("type" => 39));
                $data['relationships'] = $this->Family_model->get_by('family_setting', array("type" => 34));
                //$data['relationships_titles'] = $this->Family_model->get_by('family_setting',array("type" => 34));
                $data['women_houses'] = $this->Family_model->get_by('family_setting', array("type" => 44));
                $data['diseases'] = $this->Family_model->get_by('family_setting', array("type" => 35));
                $data['responses'] = $this->Family_model->get_by('family_setting', array("type" => 36));
                $data['diseases_status'] = $this->Family_model->get_by('family_setting', array("type" => 37));

                $data["my_current_hjri_year"] = $this->current_hjri_year();

                $data['subview'] = '';
                $this->load->view('web/registration_views/family_views/family_members', $data);
                return;

            }// end  if
        } else {

            //redirect('registration/Family/family_login');
            echo 0;
            return;
        }

    }


    public function delete_family_members($id)
    {
        //$this->load->model("Difined_model");
        $Conditions_arr = array("id" => $id);
        $this->Family_model->delete("f_members", $Conditions_arr);
//        $this->messages("success","تم  الحذف بنجاح ");
        echo 1;
        return;
        //redirect('Web/family_members');
    }

   /* public function gam3ia_contact()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $data['data'] = $this->Family_model->get_family_details($_SESSION['mother_national_num']);
            $data['contact_types'] = $this->Family_model->get_by('pr_contact_setting', array("type" => 1));
            if ($this->input->post('add')) {
                $this->Family_model->add_contact();
                echo  ' تم إرسال الطلب الي الجمعية سيقوم الموظف المختص بالتواصل معك ... شكرا لك  ';
                return;
            }

            $this->load->view('web/registration_views/family_views/gam3ia_contact', $data);

        } else {
            echo 0;
            return;
        }
    }
    */
    
        public function gam3ia_contact()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $data['data'] = $this->Family_model->get_family_details($_SESSION['mother_national_num']);
            $data['contact_types'] = $this->Family_model->get_by('pr_contact_setting', array("type" => 1));
            if ($this->input->post('add')) {

                $file_attach_name = 'file_attach_name';
                $file = $this->upload_file($file_attach_name,'contact_us');
                $this->Family_model->add_contact($file);
                echo  ' تم إرسال الطلب الي الجمعية سيقوم الموظف المختص بالتواصل معك ... شكرا لك  ';

                return;
            }
        } else {
            echo 0;
            return;
        }
        $this->load->view('web/registration_views/family_views/gam3ia_contact', $data);
    }
    
      public function get_tot_msg()

     {

         $tot=$this->Family_model->total_rows();
         $result['tot_sader']=$tot;
         $msg=$this->Family_model->total_rows();
         $result['msg_sader']=$msg;
         echo json_encode($result);


     }
     
     
        public function account_setting()
    {
        if ((isset($_SESSION['id'])) && (!empty($_SESSION['id']))) {
            $mother_national_num = $_SESSION['mother_national_num'];
            if ($this->input->post("add")) {
                $this->Family_model->update_account_setting($mother_national_num);
                //$this->message('success','تم التعديل بنجاح');
                echo 1;
                return;
            } else {
                $data['result'] = $this->Family_model->get_by('basic',array("mother_national_num" => $mother_national_num));
                $data['mother_national_num'] = $mother_national_num;
                $data['header_title'] = ' إعدادات الحساب';
                $this->load->view('web/registration_views/family_views/account_setting', $data);
            }
        } else {
//            redirect('Web/family_login');
            echo 0;
            return;
        }
    }


    public function change_status_account()
    {
        $valu = $this->input->post('valu');
        $id = $this->input->post('id');
        $data['status'] = $this->Family_model->change_status_account($valu, $id);

        echo json_encode($data);
    }


    
    
}