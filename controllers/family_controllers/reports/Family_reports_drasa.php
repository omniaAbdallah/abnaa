<?php


class Family_reports_drasa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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

        return $HYear;


    }

    public function getConnection_file_num()
    {
        $this->load->model('familys_models/reports/Reports_model');

        $all_files = $this->Reports_model->get_files_num();
        $arr_eiles = array();
        $arr_eiles['data'] = array();

        if (!empty($all_files)) {
            foreach ($all_files as $row_file) {
                $arr_eiles['data'][] = array(
                    '<input type="radio" name="choosed" value="' . $row_file->file_num . '"
                       ondblclick="Get_file_num(this)"
                        id="member' . $row_file->file_num . '"
                        data-file_num="' . $row_file->file_num . '"
                         />',
                    $row_file->file_num,
                    $row_file->father_name,
                    $row_file->mother_name,

                    ''
                );
            }
        }
        echo json_encode($arr_eiles);
    }

    public function report_mostafed_search()
    {
        $this->load->model('familys_models/reports/Reports_model');
        $year_current = $this->current_hjri_year();
        $type_member = $this->input->post('type_member');
        if (!empty($type_member) && ($type_member != 0)) {
            $data_qurey = $this->Reports_model->report_mostafed_search($type_member, $year_current);
            $data['result'] = $data_qurey;
        } else {
            $data['result'] = array();
            $data_qurey = $this->Reports_model->report_mostafed_search(1, $year_current);
            $data_1 = $data_qurey;
            if (!empty($data_1)) {
                $data['result'] = $data_1;
            }
            $data_qurey = $this->Reports_model->report_mostafed_search(2, $year_current);
            $data_2 = $data_qurey;
            if (!empty($data_2)) {
                $data['result'] = $data_2;
            }
            if ((!empty($data_1)) && (!empty($data_2))) {
                $data['result'] = array_merge($data_1, $data_2);
            }
        }
        $this->load->view('admin/familys_views/reports/report_mostafed_search_result', $data);
    }

    public function report_mostafed_education_search()
    {
        $this->load->model('familys_models/reports/Reports_model');
        $year_current = $this->current_hjri_year();

        $data_qurey = $this->Reports_model->report_mostafed_education_search($year_current);
        $data['result'] = $data_qurey;

        $this->load->view('admin/familys_views/reports/report_mostafed_education_result', $data);
    }

    function get_stage_class(){
        $this->load->model('familys_models/reports/Reports_model');

        $data_load['all_classroom'] = $this->Reports_model->get_classroom($this->input->post('main_stage'));
        $this->load->view('admin/familys_views/load_class', $data_load);
    }
}