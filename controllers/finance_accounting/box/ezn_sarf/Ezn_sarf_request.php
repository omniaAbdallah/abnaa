<?php

class Ezn_sarf_request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('finance_accounting_model/box/ezn_sarf/Ezn_sarf_model');
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="hidden-print alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }
    public function add_morfaq()
    {
        $rkm = $this->input->post('row');
        $images = $this->upload_all_file("files");
        $this->Ezn_sarf_model->insert_attach($images);
    }

    public function get_attaches()
    {
        $rkm = $this->input->post('rkm');
        $data['rkm'] = $this->input->post('rkm');
        $data['one_data'] = $this->Ezn_sarf_model->get_attach($rkm);
        $this->load->view('admin/finance_accounting/box/ezn_sarf/get_table_attaches', $data);
    }

    public function Delete_attach()
    {
        $id = $this->input->post('id');
        $this->Ezn_sarf_model->delete_attach_ezn_sarf($id);
    }

    private function upload_all_file($file_name)
    {
        $config['upload_path'] = 'uploads/files/sarf_attaches';
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

    public function getConnection($Fe2aType)
    {
        /********* خاص بالموظفين*********************************************/
        if ($Fe2aType == 1) {
            $all_employees = $this->Ezn_sarf_model->getMembersEmployees();
            $arr_employees = array();
            $arr_employees['data'] = array();
            if (!empty($all_employees)) {
                foreach ($all_employees as $row_employee) {
                    $all_employees['data'][] = array(
                        '<input type="radio" name="person_id_fk" value="' . $row_employee['id'] . '"
                         ondblclick="GetMemberName(' . $row_employee['id'] . ')"   id="member' . $row_employee['id'] . '" data-name="' . $row_employee['employee'] . '" data-id="' . $row_employee['id'] . '"
                      data-mob="' . $row_employee['phone'] . '" data-type="' . $Fe2aType . '"
                       />',
                        $row_employee['emp_code'],
                        $row_employee['employee'],
                        $row_employee['administration_title'],
                        $row_employee['department_title']
                    );
                }
            }
            echo json_encode($all_employees);
        } elseif ($Fe2aType == 2) {
            /********* خاص بالأسر  *********************************************/
            $all_Basic = $this->Ezn_sarf_model->getMembersBasic();
            $arr_Basic = array();
            $arr_Basic['data'] = array();
            if (!empty($all_Basic)) {
                foreach ($all_Basic as $row_Basic) {
                    $all_Basic['data'][] = array(
                        '<input type="radio" name="person_id_fk" value="' . $row_Basic['id'] . '"
                         ondblclick="GetMemberName(' . $row_Basic['id'] . ')"   id="member' . $row_Basic['id'] . '" 
                         data-name="' . $row_Basic['person_name'] . '" data-id="' . $row_Basic['id'] . '" data-mother_num="' . $row_Basic['person_national_card'] . '"
                        data-type="' . $Fe2aType . '" />',
                        $row_Basic['file_num'],
                        $row_Basic['father_name'],
                        $row_Basic['father_national_num'],
                        $row_Basic['person_name'],
                        $row_Basic['person_national_card'],
                        ''
                    );
                }
            }
            echo json_encode($all_Basic);
        } elseif ($Fe2aType == 3) {
            /********* خاص الجمعية العمومية  *********************************************/
            $all_general_assembly = $this->Ezn_sarf_model->getMembersGeneral_assembly();
            $arr_general_assembly = array();
            $arr_general_assembly['data'] = array();
            if (!empty($all_general_assembly)) {
                foreach ($all_general_assembly as $row_general_assembly) {
                    $arr_general_assembly['data'][] = array(
                        '<input type="radio" name="person_id_fk" value="' . $row_general_assembly['id'] . '"
                          ondblclick="GetMemberName(' . $row_general_assembly['id'] . ')"   id="member' . $row_general_assembly['id'] . '" data-name="' . $row_general_assembly['name'] . '" data-id="' . $row_general_assembly['id'] . '"
                                data-mob=""    data-type="' . $Fe2aType . '" />',
                        $row_general_assembly['name'],
                        $row_general_assembly['card_num']
                    );
                }
            }
            echo json_encode($arr_general_assembly);
        } elseif ($Fe2aType == 4) {
            /********* خاص بالمتطوعين *********************************************/
            $all_general_assembly = $this->Ezn_sarf_model->getFunanceGehat(array('id!=' => 0));
            //$this->Ezn_sarf_model->getMembersGeneral_assembly(   );
            $arr_general_assembly = array();
            $arr_general_assembly['data'] = array();
            if (!empty($all_general_assembly)) {
                foreach ($all_general_assembly as $row_general_assembly) {
                    $arr_general_assembly['data'][] = array(
                        '<input type="radio" name="person_id_fk" value="' . $row_general_assembly->id . '"
                          ondblclick="GetMemberName(' . $row_general_assembly->id . ')"   id="member' . $row_general_assembly->id . '" data-name="' . $row_general_assembly->title . '" data-id="' . $row_general_assembly->id . '"
                                data-mob=""    data-type="' . $Fe2aType . '" />',
                        $row_general_assembly->title,
                        ''
                    );
                }
            }
            echo json_encode($arr_general_assembly);
        } elseif ($Fe2aType == 5) {
            /********* خاص بالجهات والمؤسسات  *********************************************/
            $all_gehat = $this->Ezn_sarf_model->getFunanceGehat(array('id!=' => 0));
            //$this->Ezn_sarf_model->getMembersGeneral_assembly(   );
            $arr_gehat = array();
            $arr_gehat['data'] = array();
            if (!empty($all_gehat)) {
                foreach ($all_gehat as $row_gehat) {
                    $arr_gehat['data'][] = array(
                        '<input type="radio" name="person_id_fk" value="' . $row_gehat['id'] . '"
                          ondblclick="GetMemberName(' . $row_gehat['id'] . ')"   id="member' . $row_gehat['id'] . '" data-name="' . $row_gehat['title'] . '" data-id="' . $row_gehat['id'] . '"
                                data-mob=""    data-type="' . $Fe2aType . '" />',
                        $row_gehat['title']
                    );
                }
            }
            echo json_encode($arr_gehat);
        }
    }

    public function convert_number($number)
    {
        if (($number < 0) || ($number > 999999999999)) {
            throw new Exception("العدد خارج النطاق");
        }
        $return = "";
        //convert number into array of (string) number each case
        // -------number: 121210002876-----------//
        // 	0		1		2		3  //
        //'121'	  '210'	  '002'	  '876'
        $english_format_number = number_format($number);
        $array_number = explode(',', $english_format_number);
        //convert each number(hundred) to arabic
        for ($i = 0; $i < count($array_number); $i++) {
            $place = count($array_number) - $i;
            $return .= $this->convert($array_number[$i], $place);
            if (isset($array_number[($i + 1)]) && $array_number[($i + 1)] > 0) $return .= ' و';
        }
        return $return;
    }

    private function convert($number, $place)
    {
        // take in charge the sex of NUMBERED
        $sex = 'female';
        //the number word in arabic for masculine and feminine
        $words = array(
            'male' => array(
                '0' => '', '1' => 'واحد', '2' => 'اثنان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
                '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
                '11' => 'أحد عشر', '12' => 'إثني عشر', '13' => 'ثلاثة عشر', '14' => 'أربعة عشر', '15' => 'خمسة عشر',
                '16' => 'ستة عشر', '17' => 'سبعة عشر', '18' => 'ثمانية عشر', '19' => 'تسعة عشر', '20' => 'عشرون',
                '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
                '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة',
                '500' => 'خمسمائة',
                '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
            ),
            'female' => array(
                '0' => '', '1' => 'واحد', '2' => 'اثنتان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
                '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
                '11' => 'إحدى عشرة', '12' => 'إثني عشر', '13' => 'ثلاث عشرة', '14' => 'أربع عشرة', '15' => 'خمسة عشر',
                '16' => 'ستة عشرة', '17' => 'سبعة عشرة', '18' => 'ثمانية عشرة', '19' => 'تسعة عشرة', '20' => 'عشرون',
                '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
                '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة',
                '500' => 'خمسمائة',
                '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
            )
        );
        //take in charge the different way of writing the thousands and millions ...
        $mil = array(
            '2' => array('1' => 'ألف', '2' => 'ألفان', '3' => 'آلاف'),
            '3' => array('1' => 'مليون', '2' => 'مليونان', '3' => 'ملايين'),
            '4' => array('1' => 'مليار', '2' => 'ملياران', '3' => 'مليارات')
        );
        $mf = array('1' => $sex, '2' => 'male', '3' => 'male', '4' => 'male');
        $number_length = strlen((string)$number);
        if ($number == 0) return '';
        /*
        else if($number[0]==0){
            if($number[1]==0) $number=(int)substr($number, -1);
            else $number=(int)substr($number, -2);
        }*/
        else if ($number[0] == 0) {
            if ($number[1] == 0) {
                $number = (int)substr($number, -1);
                $number = (string)$number;
                $number_length = strlen((string)$number);
            } else {
                $number = (int)substr($number, -2);
                $number = (string)$number;
                $number_length = strlen((string)$number);
            }
        }
        switch ($number_length) {
            case '1':
                {
                    switch ($place) {
                        case '1':
                            {
                                $return = $words[$mf[$place]][$number];
                            }
                            break;
                        case '2':
                            {
                                if ($number == 1) $return = 'ألف';
                                else if ($number == 2) $return = 'ألفان';
                                else {
                                    $return = $words[$mf[$place]][$number] . ' آلاف';
                                }
                            }
                            break;
                        case '3':
                            {
                                if ($number == 1) $return = 'مليون';
                                else if ($number == 2) $return = 'مليونان';
                                else $return = $words[$mf[$place]][$number] . ' ملايين';
                            }
                            break;
                        case '4':
                            {
                                if ($number == 1) $return = 'مليار';
                                else if ($number == 2) $return = 'ملياران';
                                else $return = $words[$mf[$place]][$number] . ' مليارات';
                            }
                            break;
                    }
                }
                break;
            case '2':
                {
                    if (isset($words[$mf[$place]][$number])) $return = $words[$mf[$place]][$number];
                    else {
                        $twoy = $number[0] * 10;
                        $ony = $number[1];
                        $return = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                    }
                    switch ($place) {
                        case '2':
                            {
                                $return .= ' ألف';
                            }
                            break;
                        case '3':
                            {
                                $return .= ' مليون';
                            }
                            break;
                        case '4':
                            {
                                $return .= ' مليار';
                            }
                            break;
                    }
                }
                break;
            case '3':
                {
                    if (isset($words[$mf[$place]][$number])) {
                        $return = $words[$mf[$place]][$number];
                        if ($number == 200) $return = 'مائتان';
                        switch ($place) {
                            case '2':
                                {
                                    $return .= ' ألف';
                                }
                                break;
                            case '3':
                                {
                                    $return .= ' مليون';
                                }
                                break;
                            case '4':
                                {
                                    $return .= ' مليار';
                                }
                                break;
                        }
                        return $return;
                    } else {
                        $threey = $number[0] * 100;
                        if (isset($words[$mf[$place]][$threey])) {
                            $return = $words[$mf[$place]][$threey];
                        }
                        $twoyony = $number[1] * 10 + $number[2];
                        if ($twoyony == 2) {
                            switch ($place) {
                                case '1':
                                    $twoyony = $words[$mf[$place]]['2'];
                                    break;
                                case '2':
                                    $twoyony = 'ألفان';
                                    break;
                                case '3':
                                    $twoyony = 'مليونان';
                                    break;
                                case '4':
                                    $twoyony = 'ملياران';
                                    break;
                            }
                            if ($threey != 0) {
                                $twoyony = 'و' . $twoyony;
                            }
                            $return = $return . ' ' . $twoyony;
                        } else if ($twoyony == 1) {
                            switch ($place) {
                                case '1':
                                    $twoyony = $words[$mf[$place]]['1'];
                                    break;
                                case '2':
                                    $twoyony = 'ألف';
                                    break;
                                case '3':
                                    $twoyony = 'مليون';
                                    break;
                                case '4':
                                    $twoyony = 'مليار';
                                    break;
                            }
                            if ($threey != 0) {
                                $twoyony = 'و' . $twoyony;
                            }
                            $return = $return . ' ' . $twoyony;
                        } else {
                            if (isset($words[$mf[$place]][$twoyony])) $twoyony = $words[$mf[$place]][$twoyony];
                            else {
                                $twoy = $number[1] * 10;
                                $ony = $number[2];
                                $twoyony = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                            }
                            if ($twoyony != '' && $threey != 0) $return = $return . ' و' . $twoyony;
                            switch ($place) {
                                case '2':
                                    {
                                        $return .= ' ألف';
                                    }
                                    break;
                                case '3':
                                    {
                                        $return .= ' مليون';
                                    }
                                    break;
                                case '4':
                                    {
                                        $return .= ' مليار';
                                    }
                                    break;
                            }
                        }
                    }
                }
                break;
        }
        return $return;
    }

    public function GetArabicNum()
    {
        $number = number_format((float)$_POST['number'], 2, '.', '');
        if (strpos($number, '.') !== false) {
            $val = explode('.', $number);
            $integer = $this->convert_number($val[0]);
            $float = $this->convert_number(round($val[1]));
            if (!empty(round($val[1]))) {
                if ($integer == '') {
                    $reyal = '';
                } else {
                    $reyal = 'ريال و';
                }
                $data['title'] = $integer . " " . "" . $reyal . "" . $float . " " . "هللة فقط لا غير";
                $data['value'] = $number;
            } else {
                $data['title'] = $integer . " " . "ريال " . " فقط لا غير";
                $data['value'] = $val[0];
            }
        } else {
            $title = $this->convert_number($number);
            $data['title'] = $title . " " . "ريال فقط لا غير";
            $data['value'] = $number;
        }
        echo json_encode($data);
    }

  /*  public function editeEzn($id = false)
    {    //finance_accounting/box/ezn_sarf/Ezn_sarf/editeEzn

        if (!empty($id)) {
            $data['result'] = $this->Ezn_sarf_model->getById($id)[0];
            $data['employee_data'] = $this->Ezn_sarf_model->get_employee_data($data['result']->emp_id);

            $number = number_format((float)$data['result']->value, 2, '.', '');
            if (strpos($number, '.') !== false) {
                $val = explode('.', $number);
                $integer = $this->convert_number($val[0]);
                $float = $this->convert_number(round($val[1]));
                if (!empty(round($val[1]))) {
                    $data['number_title'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
                    $data['number_value'] = $number;
                } else {
                    $data['number_title'] = $integer . " " . "ريال " . " فقط لا غير";
                    $data['number_value'] = $val[0];
                }
            } else {
                $title = $this->convert_number($number);
                $data['number_title'] = $title . " " . "ريال فقط لا غير";
                $data['number_value'] = $number;
            }
        }

        $data['people_arr'] = $this->Ezn_sarf_model->getFunanceGehat(array('id!=' => 0));
        $data['title'] = 'تعديل إذن صرف ';
        $data['subview'] = 'admin/finance_accounting/box/ezn_sarf/editeEzn';
        $this->load->view('admin_index', $data);

    }*/
    public function editeEzn($id = false)
    {    //finance_accounting/box/ezn_sarf/Ezn_sarf_request/editeEzn
        if ($this->input->post('save') != '') {
            $this->Ezn_sarf_model->edite_ezn_sarf($id);
            $this->message('success', 'تم التعديل ');
            redirect('finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf', 'refresh');
        }
    }

    public function GetTransferPage()
    {
        $id = $_POST['id'];
        $data['eznInfo'] = $this->Ezn_sarf_model->getEznSarfById_new($id);
        $data['mohasebs'] = $this->Ezn_sarf_model->get_all_emps_egraat(502);
        $data['moder_malis'] = $this->Ezn_sarf_model->get_all_emps_egraat(501);
        $data['moder_3ams'] = $this->Ezn_sarf_model->get_all_emps_egraat(101);
        $data['amin_sandoks'] = $this->Ezn_sarf_model->get_all_emps_egraat(503);
         $data['one_data'] = $this->Ezn_sarf_model->get_attach($id);
           $data['ezn_history'] = $this->Ezn_sarf_model->get_all_ozonat_history($id); 
        $this->load->view('admin/finance_accounting/box/ezn_sarf/GetProcedureActionPage', $data);
    }

   
   
     public function process_transform_to_mder_mobasher()
    {
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_emp_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');

    }  
   
    public function process_transform()
    {
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');

    }

    public function process_transform_mohaseb()
    {
        $post = $this->input->post(null, true);
    /*    echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action_mohaseb($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_modermali()
    {
        $post = $this->input->post(null, true);
      /*  echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action_modermali($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');
    }

    public function process_transform_moderaam()
    {
        $post = $this->input->post(null, true);
      /*  echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action_moderaam($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
    
    
        public function process_transform_to_mohaseb()
    {
        $post = $this->input->post(null, true);
      /*  echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action_to_mohaseb($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
          public function process_transform_to_sandok()
    {
        $post = $this->input->post(null, true);
      /*  echo '<pre>';
        print_r($post);*/
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_action_to_sandok($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        echo $this->Ezn_sarf_model->get_emp_user_id($post['to_person_id'], 'user_id');
        echo $this->Ezn_sarf_model->get_emp($post['to_person_id'], 'employee');
    }
    
    
    function update_seen_eznsarf()
    {
        $this->Ezn_sarf_model->update_seen_ezn_sarf();
    }
    function update_amin_manager()
    {
        $post = $this->input->post(null, true);
        //     echo '<pre>';
        // /print_r($post);
        if (isset($_POST['save'])) {
            $this->Ezn_sarf_model->add_mofawden($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Success added ');
        }
        redirect('finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf_transformed', 'refresh');
    }
}