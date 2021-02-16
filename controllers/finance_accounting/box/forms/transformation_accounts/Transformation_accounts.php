<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transformation_accounts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('finance_accounting_model/box/forms/transformation_accounts/Transformation_accounts_model');
        $this->load->model('Difined_model');
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
            if (isset($array_number[($i + 1)]) && $array_number[($i + 1)] > 0) {
                $return .= ' و';
            }
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
                '11' => 'أحد عشر', '12' => 'إثني عشر', '13' => 'ثلاثة عشر', '14' => 'أربعة عشر', '15' => 'خمس عشر',
                '16' => 'ستة عشر', '17' => 'سبعة عشر', '18' => 'ثمانية عشر', '19' => 'تسعة عشر', '20' => 'عشرون',
                '30' => 'ثلاثون', '40' => 'أربعون', '50' => 'خمسون', '60' => 'ستون', '70' => 'سبعون',
                '80' => 'ثمانون', '90' => 'تسعون', '100' => 'مائة', '200' => 'مائتان', '300' => 'ثلاثمائة', '400' => 'أربعمائة',
                '500' => 'خمسمائة',
                '600' => 'ستمائة', '700' => 'سبعمائة', '800' => 'ثمانمائة', '900' => 'تسعمائة'
            ),
            'female' => array(
                '0' => '', '1' => 'واحد', '2' => 'اثنتان', '3' => 'ثلاثة', '4' => 'أربعة', '5' => 'خمسة',
                '6' => 'ستة', '7' => 'سبعة', '8' => 'ثمانية', '9' => 'تسعة', '10' => 'عشرة',
                '11' => 'إحدى عشرة', '12' => 'إثني عشر', '13' => 'ثلاث عشرة', '14' => 'أربع عشرة', '15' => 'خمسة عشرة',
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
        if ($number == 0) {
            return '';
        } elseif ($number[0] == 0) {
            if ($number[1] == 0) {
                $number = (int)substr($number, -1);
            } else {
                $number = (int)substr($number, -2);
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
                                if ($number == 1) {
                                    $return = 'ألف';
                                } elseif ($number == 2) {
                                    $return = 'ألفان';
                                } else {
                                    $return = $words[$mf[$place]][$number] . ' آلاف';
                                }
                            }
                            break;
                        case '3':
                            {
                                if ($number == 1) {
                                    $return = 'مليون';
                                } elseif ($number == 2) {
                                    $return = 'مليونان';
                                } else {
                                    $return = $words[$mf[$place]][$number] . ' ملايين';
                                }
                            }
                            break;
                        case '4':
                            {
                                if ($number == 1) {
                                    $return = 'مليار';
                                } elseif ($number == 2) {
                                    $return = 'ملياران';
                                } else {
                                    $return = $words[$mf[$place]][$number] . ' مليارات';
                                }
                            }
                            break;
                    }
                }
                break;
            case '2':
                {
                    if (isset($words[$mf[$place]][$number])) {
                        $return = $words[$mf[$place]][$number];
                    } else {
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
                        if ($number == 200) {
                            $return = 'مائتان';
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
                        } elseif ($twoyony == 1) {
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
                            if (isset($words[$mf[$place]][$twoyony])) {
                                $twoyony = $words[$mf[$place]][$twoyony];
                            } else {
                                $twoy = $number[1] * 10;
                                $ony = $number[2];
                                $twoyony = $words[$mf[$place]][$ony] . ' و' . $words[$mf[$place]][$twoy];
                            }
                            if ($twoyony != '' && $threey != 0) {
                                $return = $return . ' و' . $twoyony;
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
                    }
                }
                break;
        }
        return $return;
    }
    public function GetTotalValueArabic()
    {
        $number = number_format((float)$_POST['number'], 2, '.', '');
        if (strpos($number, '.') !== false) {
            $val = explode('.', $number);
            $integer = $this->convert_number($val[0]);
            $float = $this->convert_number(round($val[1]));
            if (!empty(round($val[1]))) {
                $data['title'] = $integer . " " . "ريال و" . $float . " " . "هللة فقط لا غير";
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
    private function upload_muli_file($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_all_file("userFile");
        }
        return $all_img;
    }
    //"images/finance_accounting/box/quods"
    private function upload_muli_image($input_name, $folder)
    {
        if (!empty($_FILES[$input_name]['name'])) {
            $filesCount = count($_FILES[$input_name]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
                $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
                $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
                $all_img[] = $this->upload_image("userFile", $folder);
            }
            return $all_img;
        }
    }
    private function upload_image($file_name, $folder)
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
            //$this->thumb($datafile);
            return $datafile['file_name'];
        }
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function add_transformation_accounts()
    { //Transfered
        // finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts
        $data['last_id'] = $this->Transformation_accounts_model->select_last_process();
        $data['main_departments'] = $this->Transformation_accounts_model->select_department();
        $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
        $data['records'] = $this->Transformation_accounts_model->select_all();
        $data['Transfered'] = $this->Transformation_accounts_model->select_all(array('deport' => 1));
        $data['NotTransfered'] = $this->Transformation_accounts_model->select_all(array('deport' => 0));
        $data['geha_table'] = $this->Transformation_accounts_model->select_geha();
        $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', 'id', 'asc');
        $data['titles'] = $this->Transformation_accounts_model->GetFromFr_settings(8);
        $data['greetings'] = $this->Transformation_accounts_model->GetFromFr_settings(9);
        //$this->test($data['main_departments']);
        //$record->employee_type
        $data['geha_table'] = $this->Transformation_accounts_model->select_geha();/*22-10-20-om*/
        /*25-10-20-om*/
        $this->load->model('Model_family_cashing');
        $data['manager_name'] = $this->Model_family_cashing->get_magles_edara(1);
        $data['naeb_name'] = $this->Model_family_cashing->get_magles_edara(2);
        $data['amin_name'] = $this->Model_family_cashing->get_magles_edara(3);
         $data['emp_data'] = $this->Transformation_accounts_model->emp_data();
        $data['title'] = 'النماذج والإجراءات';
        $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/add_transformation_accounts';
        $this->load->view('admin_index', $data);
    }
    public function update_transformation_accounts($id)
    {
        // finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_transformation_accounts
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $id));
        $data['employes'] = $this->Difined_model->select_search_key('employees', 'administration', $data['result']->edara_id_fk);
        $data['last_id'] = $this->Transformation_accounts_model->select_last_id();
        $data['main_departments'] = $this->Transformation_accounts_model->select_department();
        $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
        $data['attaches'] = $this->Transformation_accounts_model->get_attach($id);
        $data['geha_table'] = $this->Transformation_accounts_model->select_geha();
        $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', 'id', 'asc');
        $data['titles'] = $this->Transformation_accounts_model->GetFromFr_settings(8);
        $data['greetings'] = $this->Transformation_accounts_model->GetFromFr_settings(9);
        $data['title'] = 'النماذج والإجراءات';
        $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/add_transformation_accounts';
        $this->load->view('admin_index', $data);
    }
    public function insert()
    {
        //   echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        messages('success', 'تم إضافة النموذج والإجراء ');
        $this->Transformation_accounts_model->insert();
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    /*************************21-7-2019**************************/
    public function insert_ajax()
    {
        //   echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        messages('success', 'تم إضافة النموذج والإجراء ');
        $this->Transformation_accounts_model->insert();
        //redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts','refresh');
        echo json_encode($_POST);
    }
    /*************************21-7-2019**************************/
    public function update($process_rkm)
    {
        messages('success', 'تم تعديل النموذج والإجراء ');
        $this->Transformation_accounts_model->update($process_rkm);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    public function Delete($process_rkm)
    {
        $this->Transformation_accounts_model->Delete($process_rkm);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    public function getEmp()
    {
        $this->load->model('Difined_model');
        $data = $this->Difined_model->select_search_key('employees', 'administration', $_POST['edara_id_fk']);
        echo json_encode($data);
    }
    public function GetByArray()
    {
        $data = $this->Transformation_accounts_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk' => $_POST['id']), '');
        echo json_encode($data);
    }
    public function GetAccountNumByArray()
    {
        $data = $this->Transformation_accounts_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk' => $_POST['bank_id_fk'],
            'society_main_banks_account.account_id_fk' => $_POST['account_id_fk']), '');
        echo json_encode($data);
    }
    public function load_banks()
    {
        $data['all_banks'] = $this->Transformation_accounts_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/get_banks', $data);
    }
   /* public function getDetails()
    {
        $id = $_POST['id'];
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $id));
        //$this->test($data['result']);
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/GetDetails', $data);
    }*/
      public function getDetails()
    {
        $id = $_POST['id'];
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $id));
        $data["level_2data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 2));
        $data["level_3data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 3));
        //$this->test($data['result']);
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/GetDetails', $data);
    }
    public function print_account_details()
    {
        $id = $_POST['process_rkm']; 
      //  $id = 1;
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $id));
        $data["level_2data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 2));
        $data["level_3data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 3));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/print_account_details', $data);
    }
    /**************************************Stop*****************************/
    public function add_morfaq($rkm)
    {
        $images = $this->upload_muli_file("file");
        $this->Transformation_accounts_model->insert_attach($rkm, $images);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    public function Delete_attach($id)
    {
        $this->Transformation_accounts_model->delete_attach($id);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    public function transformation_accounts_transfer($rkm)
    {
        $this->Transformation_accounts_model->transfer($rkm);
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    /************************************20-7-2019**********************************/
    public function all_hesab_json_data()
    {
        $hesab_id = '';
        // $hesab_id =$_POST['hesab_id'];
        /* if ( isset($_POST['id']) && !empty($_POST['id'])){
             $data = $this->Transformation_accounts_model->all_hesab($_POST['id']);
         }else{
             $data = $this->Transformation_accounts_model->all_hesab(0);
         }*/
        $data = $this->Transformation_accounts_model->all_hesab('');
        /*$arr = array();
        $arr['data'] = array();
        if (!empty($data)) {
            $x = 0;
            foreach ($data as $row) {
                $x++;
                $radio ='<input type="radio" name="choosed"   id="member'.$row->id.'" data-name="'.$row->account_name.'" 
                value="'.$row->id.'"         ondblclick="getHesabData('.$row->id.','.$hesab_id.')"/>';
                $arr['data'][] = array(
                    $radio,
                    $row->bank_name,
                    $row->account_name,
                    $row->account_num);
            }
        }
        $json = json_encode($arr);
        echo $json;*/
        //$this->test($arr);
        echo json_encode($data);
    }
    public function all_emps()
    {
        $data = $this->Transformation_accounts_model->all_emps();
        echo json_encode($data);
    }
    /************************************20-7-2019**********************************/
    public function GetModalView()
    {
        $title = 'غير محدد';
        $from_general_hesab_id_fk = $_POST['from_general_hesab_id_fk'];
        $arr = array();
        for ($i = 0; $i < sizeof($_POST['from_bank_id_fk']); $i++) {
            $arr[$i]['process_rkm_fk'] = $this->input->post('process_rkm');
            $arr[$i]['value'] = $this->input->post('value')[$i];
            $arr[$i]['from_bank_id_fk'] = $this->input->post('from_bank_id_fk')[$i];
            if (!empty($arr[$i]['from_bank_id_fk'])) {
                $arr[$i]['from_bank_name'] =
                    $this->Transformation_accounts_model->GetBankName($this->input->post('from_bank_id_fk')[$i]);
                $arr[$i]['from_general_hesab_id_fk'] = $this->input->post('from_general_hesab_id_fk')[$i];
                $arr[$i]['from_general_hesab_name'] = $this->Transformation_accounts_model->GetAccountName($this->input->post('from_general_hesab_id_fk')[$i]);
                $from_ayban_rkm_full = $this->Transformation_accounts_model->select_all_by_condition(
                    array(
                        'society_main_banks_account.bank_id_fk' => $this->input->post('from_bank_id_fk')[$i],
                        'society_main_banks_account.account_id_fk' => $this->input->post('from_general_hesab_id_fk')[$i]),
                    ''
                )[0];
                if (isset($from_ayban_rkm_full) && !empty($from_ayban_rkm_full)) {
                    $arr[$i]['from_ayban_rkm_full'] = $from_ayban_rkm_full->account_num;
                    $arr[$i]['from_rkm_hesab'] = $from_ayban_rkm_full->rqm_hesab;
                    $arr[$i]['from_rkm_hesab_name'] = $from_ayban_rkm_full->name_hesab;
                } else {
                    $arr[$i]['from_ayban_rkm_full'] = $title;
                    $arr[$i]['from_rkm_hesab'] = $title;
                    $arr[$i]['from_rkm_hesab_name'] = $title;
                }
            } else {
                $arr[$i]['from_bank_name'] = $title;
                $arr[$i]['from_general_hesab_id_fk'] = $title;
                $arr[$i]['from_general_hesab_name'] = $title;
                $arr[$i]['from_ayban_rkm_full'] = $title;
                $arr[$i]['from_rkm_hesab'] = $title;
                $arr[$i]['from_rkm_hesab_name'] = $title;
            }
            $arr[$i]['to_bank_id_fk'] = $this->input->post('to_bank_id_fk')[$i];
            if (!empty($arr[$i]['to_bank_id_fk'])) {
                $arr[$i]['to_bank_name'] =
                    $this->Transformation_accounts_model->GetBankName($this->input->post('to_bank_id_fk')[$i]);
                $arr[$i]['to_general_hesab_id_fk'] = $this->input->post('to_general_hesab_id_fk')[$i];
                $arr[$i]['to_general_hesab_name'] = $this->Transformation_accounts_model->GetAccountName($this->input->post('to_general_hesab_id_fk')[$i]);
                $to_ayban_rkm_full = $this->Transformation_accounts_model->select_all_by_condition(
                    array(
                        'society_main_banks_account.bank_id_fk' => $this->input->post('to_bank_id_fk')[$i],
                        'society_main_banks_account.account_id_fk' => $this->input->post('to_general_hesab_id_fk')[$i]),
                    ''
                )[0];
                if (isset($to_ayban_rkm_full) && !empty($to_ayban_rkm_full)) {
                    $arr[$i]['to_ayban_rkm_full'] = $to_ayban_rkm_full->account_num;
                    $arr[$i]['to_rkm_hesab'] = $to_ayban_rkm_full->rqm_hesab;
                    $arr[$i]['to_rkm_hesab_name'] = $to_ayban_rkm_full->name_hesab;
                } else {
                    $arr[$i]['to_ayban_rkm_full'] = $title;
                    $arr[$i]['to_rkm_hesab'] = $title;
                    $arr[$i]['to_rkm_hesab_name'] = $title;
                }
            } else {
                $arr[$i]['to_bank_name'] = $title;
                $arr[$i]['to_general_hesab_id_fk'] = $title;
                $arr[$i]['to_general_hesab_name'] = $title;
                $arr[$i]['to_ayban_rkm_full'] = $title;
                $arr[$i]['to_rkm_hesab'] = $title;
                $arr[$i]['to_rkm_hesab_name'] = $title;
            }
        }
        //echo"<pre>"; print_r($arr); echo"</pre>"; die;
        $data['result_details'] = $arr;
        // echo"<pre>"; print_r(  $data['result_details'][0]['value'] ); echo"</pre>"; die;
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transformation_view_load_page', $data);
    }
    public function add_transformation_accounts_modal()
    {
        //  echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $this->Transformation_accounts_model->insert();
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    /****************************transfer 23-7-2019*******************************/
    /*  public function Get_load_page()
      {
          $data_load["all_egraat"]=$this->Transformation_accounts_model->select_egraat_emp('');
          $data_load["mohaseb"]=$this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' =>502));
          //$this->test($data_load["mohaseb"]);
          $data_load["moder_malia"]=$this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' =>501));
          $data_load["moder_3am"]=$this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' =>101));
          $data_load["transformation_data"]=$this->Transformation_accounts_model->get_transformation_data(array('process_rkm'=>$this->input->post('process_rkm')));
          if ($data_load["transformation_data"]->level ==0) {
              $data_load["personal_data"]=$this->Transformation_accounts_model->get_user_data(array('user_id'=>$data_load["transformation_data"]->user_id));
          } elseif ($data_load["transformation_data"]->level ==1 ||  $data_load["transformation_data"]->level ==2) {
              $data_load["personal_data"]=$this->Transformation_accounts_model->get_user_data(array('user_id'=>$data_load["transformation_data"]->current_from_user_id));
          }
          //  $this->test($data_load["moder_3am"]);
          $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transformation_load_page', $data_load);
      }
  */
    public function GetByJob_title_members()
    {
        $data = $this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' => $_POST['job_title_code_fk']));
        echo json_encode($data);
    }
    public function saveToMohaseb()
    {
        // echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $this->Transformation_accounts_model->saveToMohaseb();
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts', 'refresh');
    }
    /* public function saveToModer_malia()
      {
                                  //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
          $this->Transformation_accounts_model->saveToModer_malia();
          if ($this->input->post('from_profile')) {
              redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
          } else {
              redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
          }
      }
    /*  public function saveToModer_malia()
      {
                                  //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
          $this->Transformation_accounts_model->saveToModer_malia();
          redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
      }
  */
    /*  public function saveToModer_3am()
      {
                                               //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
          $this->Transformation_accounts_model->saveToModer_3am();
          redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
      }
  */
    /* public function saveToModer_3am()
      {
                                               //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
          $this->Transformation_accounts_model->saveToModer_3am();
          if ($this->input->post('from_profile')) {
              redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
          } else {
              redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
          }
      }*/
    /*  public function saveToEmp()
      {
                                          //     echo"<pre>"; print_r($_POST); echo"</pre>"; die;
          $this->Transformation_accounts_model->saveToEmp();
          redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
      }
  */
    public function manager_approved()
    {
        $this->Transformation_accounts_model->saveToEmp();
        echo json_encode($_POST);
    }
    public function prepare_letter()
    {
        $this->Transformation_accounts_model->prepare_letter();
        echo json_encode($_POST);
    }
    public function all_transformation_accounts()
    {
        //finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts
        $data['coming_records'] = $this->Transformation_accounts_model->select_from_hr_all_transformation_orders(
            array('current_to_user_id' => $_SESSION['user_id'])
        );
        $data["personal_data"] = $this->Transformation_accounts_model->get_user_data(array('user_id' => $_SESSION['user_id']));
        $data['user_orders'] = $this->Transformation_accounts_model->select_from_hr_all_transformation_orders(
            array('employees.id' => $_SESSION['emp_code'])
        );
        /*echo'<pre>';
        print_r( count($data['user_orders']));
        echo'</pre>';
        die;*/
        //$this->test($data['coming_records']);
        $data['title'] = 'طلبات تحويلات الحسابات';
        if ($this->input->post('tab_id')) {
            $data['tab_id'] = array($this->input->post('tab_id'));
            $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transfer/all_transformations', $data);
        } else {
            $data['tab_id'] = array('mine_1', 'follow_1', 'comming_1');
            $data['title'] = 'الطلبات المحولة';
            $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/transfer/all_transformations';
            $this->load->view('admin_index', $data);
        }
    }
    public function motab3a_details()
    {
        $data_load["transformation_data"] = $this->Transformation_accounts_model->get_transformation_data(array('process_rkm' => $this->input->post('process_rkm')));
        $data_load["personal_data"] = $this->Transformation_accounts_model->get_user_data(array('user_id' => $_SESSION['user_id']));
        $data_load['allhistory'] = $this->Transformation_accounts_model->select_allhistory_by_process_rkm($this->input->post('process_rkm'));
        $data_load["level_2data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 2));
        $data_load["level_3data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 3));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transfer/motab3a_details_load_page', $data_load);
    }
    public function Get_transformDetails()
    {
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $this->input->post('process_rkm')));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $this->input->post('process_rkm')));
        $data["level_2data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 2));
        $data["level_3data"] = $this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm' => $this->input->post('process_rkm'), 'level' => 3));
        // echo"<pre>"; print_r($data["level_2data"]); echo"</pre>"; die;
     //  $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transfer/transformDetails_load_page', $data);
    
       $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/GetDetails', $data);

    }
    /****************************transfer 23-7-2019*******************************/
    public function print_bank()
    {
        $id = $_POST['process_rkm'];
        /*$data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm'=>$id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk'=>$id));
        $data["level_2data"]=$this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm'=>$this->input->post('process_rkm'),'level'=>2));
        $data["level_3data"]=$this->Transformation_accounts_model->select_hr_all_transformations_history_by_level(array('process_rkm'=>$this->input->post('process_rkm'),'level'=>3));
*/
        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $id));
        $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $id));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/print_bank', $data);
    }
    public function saveToModer_malia()
    {
        //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $this->Transformation_accounts_model->saveToModer_malia();
        /*        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');*/
       if ($this->input->post('from_profile')) {
        redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
    } else {
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
    }
    }
    public function saveToModer_3am()
    {
        //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $this->Transformation_accounts_model->saveToModer_3am();
        /*        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');*/
    if ($this->input->post('from_profile')) {
        redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
    } else {
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
    }
    }
    public function saveToEmp()
    {
        //     echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $this->Transformation_accounts_model->saveToEmp();
        /*        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');*/
      /*  if ($this->input->post('from_profile')) {
            //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
            redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
        } else {
            redirect('human_resources/employee_forms/solaf/All_transformations', 'refresh');
        }*/
        
         if ($this->input->post('from_profile')) {
        //  redirect('maham_mowazf/person_profile/Personal_profile', 'refresh');
        redirect('maham_mowazf/person_profile/Personal_profile/estalmat', 'refresh');
    } else {
        redirect('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts', 'refresh');
    }
    }
    public function Get_load_page()
    {
        $data_load["all_egraat"] = $this->Transformation_accounts_model->select_egraat_emp('');
        //echo"<pre>"; print_r($_POST); echo"</pre>"; die;
        $data_load["mohaseb"] = $this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' => 502, 'person_suspend' => 1));
        //$this->test($data_load["mohaseb"]);
        $data_load["moder_malia"] = $this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' => 501, 'person_suspend' => 1));
        $data_load["moder_3am"] = $this->Transformation_accounts_model->select_egraat_emp(array('hr_egraat_emp_setting.job_title_code_fk' => 101, 'person_suspend' => 1));
        $data_load["transformation_data"] = $this->Transformation_accounts_model->get_transformation_data(array('process_rkm' => $this->input->post('process_rkm')));
        if ($data_load["transformation_data"]->level == 0) {
            $data_load["personal_data"] = $this->Transformation_accounts_model->get_user_data(array('user_id' => $data_load["transformation_data"]->user_id));
        } elseif ($data_load["transformation_data"]->level == 1 || $data_load["transformation_data"]->level == 2) {
            $data_load["personal_data"] = $this->Transformation_accounts_model->get_user_data(array('user_id' => $data_load["transformation_data"]->current_from_user_id));
        }
        //  $this->test($data_load["moder_3am"]);
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/transformation_load_page', $data_load);
    }
    function update_seen_accounts()
    {
        $this->Transformation_accounts_model->update_seen_tahwel();
    }
    /*22-10-20-om*/
    function get_attachment()
    {
        $process_rkm = $this->input->post('process_rkm');
        $data_load['folder_path'] = 'uploads/finance/transformation_accounts';
       $data_load["deport_status"] = $this->Transformation_accounts_model->Get_deport_account_transform_status($process_rkm);
        $data_load["transform_account_attechment"] = $this->Transformation_accounts_model->get_attachment(array('process_rkm_fk' => $process_rkm));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/attachment_table_view', $data_load);
    }
    function delete_morfaq()
    {
        $process_rkm = $this->input->post('process_rkm');
        $row_id = $this->input->post('row_id');
        $data_load['folder_path'] = 'uploads/finance/transformation_accounts';
        $this->Transformation_accounts_model->delete_morfaq($row_id, $process_rkm, $data_load['folder_path']);
        $data_load["transform_account_attechment"] = $this->Transformation_accounts_model->get_attachment(array('process_rkm_fk' => $process_rkm));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/attachment_table_view', $data_load);
    }
    function save_attachment()
    {
        $process_rkm = $this->input->post('process_rkm');
        $images = $this->upload_all_file("files", 'uploads/finance/transformation_accounts');
        $this->Transformation_accounts_model->save_attachment($images, $process_rkm);
        $data_load['folder_path'] = 'uploads/finance/transformation_accounts';
        $data_load["transform_account_attechment"] = $this->Transformation_accounts_model->get_attachment(array('process_rkm_fk' => $process_rkm));
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/attachment_table_view', $data_load);
    }
    public function read_file_attechment($row_id)
    {
        $file = $this->Transformation_accounts_model->get_by('finance_transform_account_attechment', array("id" => $row_id), 1);
        $this->load->helper('file');
        $file_path = 'uploads/finance/transformation_accounts/' . $file->attechment;
        header('Content-Type: application/pdf');
        header('Content-Discription:inline; filename="' . $file->attechment . '"');
        header('Content-Disposition: filename="' . $file->title . '.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges:bytes');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
    }
    /*25-10-20-om*/
    public function all_emps_json_data()
    {
        $data = $this->Transformation_accounts_model->all_emps();
        $arr = array();
        $arr['data'] = array();
        if (!empty($data)) {
            $x = 0;
            foreach ($data as $row) {
                $x++;
                $radio = '<input type="radio" name="choosed"   id="member' . $row->id . '" data-name="' . $row->employee . '" data-card_num="' . $row->card_num . '"
    value="' . $row->id . '"  data-edara_id_fk="' . $row->edara_id . '"  data-emp_code="' . $row->emp_code . '"    data-qsm_id_fk="' . $row->qsm_id . '" 
    ondblclick="GetMemberName(' . $row->id . ')"
     />';
                $arr['data'][] = array(
                    $radio,
                    $row->edara_n,
                    $row->qsm_n,
                    $row->emp_code,
                    $row->employee);
            }
        }
        $json = json_encode($arr);
        echo $json;
    }
    /*22-10-20-om*/
    private function upload_all_file($file_name, $folder_path = 'uploads/family_attached/nmazg/nmazg_letter_attaches')
    {
        $config['upload_path'] = $folder_path;
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
    /*22-10-20-om*/
    public function insert_geha_ajax()
    {
        $this->Transformation_accounts_model->insert_geha();
        $data['table'] = $this->Transformation_accounts_model->select_geha();
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/geha_load_page', $data);
    }
    public function update_geha()
    {
        //echo"<pre>"; print_r($_POST); echo"</pre>";
        $id = $this->input->post('id');
        $this->Transformation_accounts_model->update_geah($id);
        $data['table'] = $this->Transformation_accounts_model->select_geha();
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/geha_load_page', $data);
    }
    public function delete_geha()
    {
        $id = $this->input->post('id');
        $this->Transformation_accounts_model->delete_geha($id);
        $data['table'] = $this->Transformation_accounts_model->select_geha();
        $this->load->view('admin/finance_accounting/box/forms/transformation_accounts/geha_load_page', $data);
    }
    public function getById()
    {
        $id = $this->input->post('id');
        $geha = $this->Transformation_accounts_model->get_geha_by_id($id);
        echo json_encode($geha);
    }
    /*22-10-20-om*/
    /*25-10-20-om*/
    function update_amin_manager()
    {
        $this->Transformation_accounts_model->update_amin_manager();
    }
    
/*************************************************************************/

  function make_sand_sarf($process_rkm)
{
    $this->load->model('finance_accounting_model/box/vouch_sarf/Vouch_sarf_model');
    $this->load->model('finance_accounting_model/box/vouch_qbd/Vouch_qbd_model');
    $this->load->model('finance_accounting_model/dalel/Dalel_model');
    $data['banks_setting'] = $this->Dalel_model->getBanks();
    $data['banks'] = $this->Difined_model->select_all('banks_settings', '', '', 'id', 'asc');
    $data['box'] = $this->Vouch_sarf_model->getBox(array('type' => 2));
    $records = $this->Vouch_sarf_model->getAllAccounts(array('id!=' => 0));
//        $data['result'] = $this->Transformation_accounts_model->get_result(array('process_rkm' => $process_rkm));
    $data['result_details'] = $this->Transformation_accounts_model->get_result_details(array('process_rkm_fk' => $process_rkm));
//     $this->test($data['result_details']);
    $data['total_value'] = $this->Transformation_accounts_model->get_sum_result_details(array('process_rkm_fk' => $process_rkm));
    $data['arabicNum'] = convertNumber($data['total_value']);
    $data['tree'] = $this->buildTree($records);
    $data['geha_table'] = $this->Vouch_sarf_model->select_gehat();
    $data['all_qabd_naqdi'] = $this->Vouch_qbd_model->get_all_qabds_naqdi();
    $data['all_qabd_sheek'] = $this->Vouch_qbd_model->get_all_qabds_sheek();

    $data['all_banks'] = $this->Vouch_sarf_model->select_all_by_condition(array("society_main_banks_account.type" => 2), "society_main_banks_account.bank_id_fk");
    $data['bank_accounts_arr'] = $this->Vouch_sarf_model->select_all_by_condition(array('society_main_banks_account.bank_id_fk' => 19), '');
    $data['hesab_data'] = $this->Vouch_sarf_model->select_all_by_condition(array('type' => 2, 'society_main_banks_account.bank_id_fk' => 19, 'society_main_banks_account.account_id_fk' => 2), '');
    $data['all_sarf_naqdi'] = $this->Vouch_qbd_model->get_all_sarf_naqdi();
    $data['all_sarf_sheek'] = $this->Vouch_qbd_model->get_all_sarf_sheek();
    $data['attached_files'] = $this->Transformation_accounts_model->get_attach($process_rkm);

    $data['last_id'] = $this->Vouch_sarf_model->getLastId(array('id!=' => 0)) + 1;

    $data['process_rkm'] = $process_rkm;
    $data['title'] = 'إضافة سند صرف';
    $data['subview'] = 'admin/finance_accounting/box/forms/transformation_accounts/vouch_sarf';
    $this->load->view('admin_index', $data);

}

public function buildTree($elements, $parent = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element->parent == $parent) {
            $children = $this->buildTree($elements, $element->id);
            if ($children) {
                $element->subs = $children;
            }
            $branch[$element->id] = $element;
        }
    }
    return $branch;
}
  
    
    
}
