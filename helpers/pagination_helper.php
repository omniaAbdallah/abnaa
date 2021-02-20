<?php
/*
function messages($type,$text)
{
    $CI =& get_instance();
    $CI->load->library("session");
    if($type =='success') {
        return $CI->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> '.$text.'.</div>');
    }elseif($type=='warning'){
        return $CI->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> '.$text.'.</div>');
    }elseif($type=='error'){
        return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> '.$text.'.</div>');
    }
}*/


function messages($type, $text, $method = false)
{
    $CI =& get_instance();
    $CI->load->library("session");
    if ($type == 'success') {
        return $CI->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> تم بنجاح!</strong> ' . $text . '.</div>');
    } elseif ($type == 'warning') {
        return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
    } elseif ($type == 'error') {
        return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
    } elseif ($type == 'printSanad') {
        $sheek = '';
        if ($method == 3) {
            $sheek = 'setTimeout(function () {
                        swal({
                            title: "هل تريد طباعة الشيك!",
                            text: "تأكد من إدخال الشيك بالطابعة.",
                            type: "warning",
                            showCancelButton: true, 
                            confirmButtonColor: "#DD6B55",
                            cancelButtonClass: "btn-danger",
                            confirmButtonText: "نعم, قم بالطباعة!",
                            cancelButtonText: "لا, إلغاء الأمر!", 
                        }, function(isConfirm){
                            if (isConfirm) {
                                document.getElementById("ptrintSheekButton' . $text . '").click();
                            }
                        });
                    }, 2000);';
        }
        return $CI->session->set_flashdata('message',
            '<script>
                swal({
                    title: "هل تريد طباعة السند!",
                    text: "",
                    type: "warning",
                    showCancelButton: true, 
                    confirmButtonColor: "#DD6B55",
                    cancelButtonClass: "btn-danger",
                    confirmButtonText: "نعم, قم بالطباعة!",
                    cancelButtonText: "لا, إلغاء الأمر!", 
                }, function(isConfirm){
                    if (isConfirm) {
                        document.getElementById("ptrintSanadButton' . $text . '").click();
                    }
                    ' . $sheek . '
                });
            </script>');
    }
}

function calculate_from_time($time_from)
{
    $diff = abs(time() - $time_from);
    $day = 60 * 60 * 24;
    $result = floor($diff / $day);
    if ($result == 0) {
        return "اليوم ";
    } else {
        return $result . " أيام ";
    }

}

function thumb($data)
{
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $data['full_path'];
    $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = '';
    $config['width'] = 275;
    $config['height'] = 250;
    $CI->load->library('image_lib', $config);
    $CI->image_lib->resize();
}

function upload_image($file_name, $filepath = false)
{
    $CI =& get_instance();
    if ($filepath == false) {
        $config['upload_path'] = 'uploads/images';
    } else {
        $config['upload_path'] = $filepath;
    }
    // $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';


    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['max_size'] = '80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';


    $config['encrypt_name'] = true;
    $config['overwrite'] = true;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $CI->upload->data();
        thumb($datafile);
        return $datafile['file_name'];
    }
}

function upload_file($file_name)
{
    $CI =& get_instance();
    $config['upload_path'] = 'uploads/files';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
    $config['overwrite'] = true;
    $config['encrypt_name'] = true;
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($file_name)) {
        return false;
    } else {
        $datafile = $CI->upload->data();
        return $datafile['file_name'];
    }
}

function upload_muli_image($input_name, $folder)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = upload_image("userFile", $folder);
    }
    return $all_img;
}

function my_pagination($controller, $total_records, $limit_per_page)
{
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url() . $controller;
    $config['total_rows'] = $total_records;
    $config['per_page'] = $limit_per_page;
    $config["uri_segment"] = 3;
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_links'] = 5;
    $config['page_query_string'] = FALSE;
    $config['prev_link'] = '&lt;Previous  '; // السابق
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next &gt;';  // التالى
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_link'] = FALSE;
    $config['last_link'] = FALSE;
    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}

function ara_date($day_in)
{
    function arabic_e2w($str)
    {
        $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }

    $nameday = date("l", $day_in);
    $day = date("d", $day_in);
    $namemonth = date("m", $day_in);
    $year = date("Y", $day_in);
    switch ($nameday) {
        case "Saturday":
            $nameday = "السبت";
            break;
        case "Sunday":
            $nameday = "الأحد";
            break;
        case "Monday":
            $nameday = "الاثنين";
            break;
        case "Tuesday":
            $nameday = "الثلاثاء";
            break;
        case "Wednesday":
            $nameday = "الأربعاء";
            break;
        case "Thursday":
            $nameday = "الخميس";
            break;
        case "Friday":
            $nameday = "الجمعة";
            break;
    }
    switch ($namemonth) {
        case 1:
            $namemonth = "يناير";
            break;
        case 2:
            $namemonth = "فبراير";
            break;
        case 3:
            $namemonth = "مارس";
            break;
        case 4:
            $namemonth = "إبريل";
            break;
        case 5:
            $namemonth = "مايو";
            break;
        case 6:
            $namemonth = "يونيو";
            break;
        case 7:
            $namemonth = "يوليو";
            break;
        case 8:
            $namemonth = "اغسطس";
            break;
        case 9:
            $namemonth = "سبتمبر";
            break;
        case 10:
            $namemonth = "اكتوبر";
            break;
        case 11:
            $namemonth = "نوفمبر";
            break;
        case 12:
            $namemonth = "ديسمبر";
            break;
    }
    $day = arabic_e2w($day); //$year
    $year = arabic_e2w($year);
    return "$nameday $day $namemonth $year";
}

//====================================================================================================
function current_hjri_year()
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
        $MDay_Name = "ÇáÃÍÏ";
    } elseif ($MDay_Num == "1") {
        $MDay_Name = "ÇáÅËäíä";
    } elseif ($MDay_Num == "2") {
        $MDay_Name = "ÇáËáÇËÇÁ";
    } elseif ($MDay_Num == "3") {
        $MDay_Name = "ÇáÃÑÈÚÇÁ";
    } elseif ($MDay_Num == "4") {
        $MDay_Name = "ÇáÎãíÓ";
    } elseif ($MDay_Num == "5") {
        $MDay_Name = "ÇáÌãÚÉ";
    } elseif ($MDay_Num == "6") {
        $MDay_Name = "ÇáÓÈÊ";
    }
    $NowDayName = $MDay_Name;
    $NowDate = $MDay_Name . "¡ " . $HDays . "/" . $HMonths . "/" . $HYear . " هـ";

    return $HYear;
}

/***************************************/
function convertNumber($number)
{
    if (($number < 0) || ($number > 999999999999)) {
        throw new Exception("العدد خارج النطاق");
    }
    $return = "";

    $english_format_number = number_format($number);
    $array_number = explode(',', $english_format_number);

    for ($i = 0; $i < count($array_number); $i++) {
        $place = count($array_number) - $i;
        $return .= convertArabic($array_number[$i], $place);
        if (isset($array_number[($i + 1)]) && $array_number[($i + 1)] > 0) $return .= ' و';
    }
    return $return;
}


function convertArabic($number, $place)
{
    $sex = "male";
    $arr = array('20', '30', '40', '50', '60', '70', '80', '90');
    $all_numbers_title_male = array('1' => 'واحد', '2' => 'اثنان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
        '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة');
    $all_numbers_title_female = array('1' => 'واحد', '2' => 'اثنتان', '3' => 'ثلاثة', '4' => 'أربع', '5' => 'خمس',
        '6' => 'ست', '7' => 'سبع', '8' => 'ثمان', '9' => 'تسع', '10' => 'عشر');
    $all_numbers = array(
        '0' => '', '1' => 'واحد', '2' => 'اثنان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
        '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
        '11' => 'أحد عشر', '12' => 'اثنا عشر', '13' => 'ثلاثة عشر', '14' => 'أربعة عشر', '15' => 'خمسة عشر',
        '16' => 'ستة عشر', '17' => 'سبعة عشر', '18' => 'ثمانية عشر', '19' => 'تسعة عشر', '20' => 'عشرون',
        '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
        '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة',
        '400' => 'أربعمائة', '500' => 'خمسمائة', '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة');

    $all_numbers_arr_male = array();
    foreach ($all_numbers as $key => $value) {
        $all_numbers_arr_male[$key] = $value;
        if (in_array($key, $arr)) {
            foreach ($all_numbers_title_male as $aa => $bb) {
                $all_numbers_arr_male[$key + $aa] = $bb . ' و' . $value;
            }
        }
    }

    $all_numbers_arr_female = array();
    foreach ($all_numbers as $key => $value) {
        $all_numbers_arr_female[$key] = $value;
        if (in_array($key, $arr)) {
            foreach ($all_numbers_title_female as $aa => $bb) {
                $all_numbers_arr_female[$key + $aa] = $bb . ' و' . $value;
            }
        }
    }
    $words = array('male' => $all_numbers_arr_male,
        'female' => $all_numbers_arr_female);
    //take in charge the different way of writing the thousands and millions ...
    $mil = array(
        '2' => array('1' => 'ألف', '2' => 'ألفان', '3' => 'آلاف'),
        '3' => array('1' => 'مليون', '2' => 'مليونان', '3' => 'ملايين'),
        '4' => array('1' => 'مليار', '2' => 'ملياران', '3' => 'مليارات')
    );

    $mf = array('1' => $sex, '2' => 'male', '3' => 'male', '4' => 'male');
    $number_length = strlen((string)$number);
    if ($number == 0) return '';
    else if ($number[0] == 0) {
        if ($number[1] == 0) $number = (int)substr($number, -1);
        else $number = (int)substr($number, -2);
    }
    //return$number_length;
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
                    if ($number == 200) $return = 'مئتا';
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

function send_email_gmail($send_from_email, $send_from_name = '', $send_to, $sub, $message, $img_path=false)
{
    $CI =& get_instance();

    $CI->load->library('email');

    $config['protocol'] = 'smtp';

    $config['smtp_host'] = 'smtp.hostinger.ae';
    $config['smtp_port'] = '587';
    $config['smtp_user'] = 'kawc.3oon@kawccq-sa.org';
    $config['smtp_pass'] = '123456789';
    $config['charset'] = 'utf-8';
    $config['mailtype'] = 'html';

    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->set_mailtype("html");

    $CI->email->from($send_from_email, $send_from_name, $send_from_email);
    $CI->email->to($send_to);
    $CI->email->cc($send_to);
    $CI->email->bcc($send_to);

    $CI->email->subject($sub);
    $CI->email->message($message);

    //    $CI->email->attach($img_path);

    if ($CI->email->send()) {
        return true;
    } else {
        return false;
    }
}


//add_history
function add_history($action_code, $mother_id)
{
    $CI =& get_instance();

    $action_name = $CI->db->where('code', $action_code)->get('osr_action_process')->row()->process_name;
    $data['action_code'] = $action_code;
    $data['action_name'] = $action_name;
    $data['mother_national_num'] = $mother_id;

    // if (key_exists($action, $actions)) {
    //     $data['action_n'] = $actions[$action];
    // }
    $data['date_action'] = date('Y-m-d');
    $data['time_action'] = date('h:i a');
    $data['publisher'] = $_SESSION["user_id"];
    $data['publisher_name'] = getUserName($_SESSION['user_id']);
    $CI->db->insert('osr_all_history', $data);
}

function getUserName($user_id)
{
    $CI =& get_instance();

    $sql = $CI->db->where("user_id", $user_id)->get('users');
    if ($sql->num_rows() > 0) {
        $data = $sql->row();
        if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
            return $data->user_username;
        } elseif ($data->role_id_fk == 2) {
            $id = $data->user_name;
            $table = 'magls_members_table';
            $field = 'member_name';
        } elseif ($data->role_id_fk == 3) {
            $id = $data->emp_code;
            $table = 'employees';
            $field = 'employee';
        } elseif ($data->role_id_fk == 4) {
            $id = $data->user_name;
            $table = 'general_assembley_members';
            $field = 'name';
        }
        return $CI->getUserNameByRoll($id, $table, $field);
    }
    return false;
}

function getUserNameByRoll($id, $table, $field)
{
    $CI =& get_instance();

    return $CI->db->where('id', $id)->get($table)->row_array()[$field];
}


?>