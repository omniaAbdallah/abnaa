<?php

class Sponsor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('osr/Sponsor_model');

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

    public function sponsor_details()
    { // osr/Sponsor/sponsor_details
        if ((isset($_SESSION['mother_national_num'])) && (!empty($_SESSION['mother_national_num']))) {
            $data['data'] = $this->Sponsor_model->get_family_details($_SESSION['mother_national_num']);
            //$this->test($data['data']);
            $data['current_year'] = $this->current_hjri_year();
            $data['title'] = ' تفاصيل الكفالات ';
            $data['file_script'] = 'sponsor_details';
            $data['subview'] = 'osr/sponsors/sponsors_details';
            $this->load->view('osr/osr_index', $data);
        } else {
            redirect('osr/Login_osr');
        }
    }


    public function get_kafala_details()
    {

        $data_load['all_data'] = $this->Sponsor_model->Getkafalat($this->input->post('id'));
        if ($data_load['all_data'][0]->kafala_type_fk == 2) {
            $data_load['all_data_second'] = $this->Sponsor_model->Getkafalat_second($this->input->post('id'));
        }
        $this->load->view('osr/sponsors/get_kafala_details', $data_load);

    }

}