<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dash extends CI_Controller
{
    public $email_count;
    public $count_basic_in;
    public $files_basic_in;
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $this->load->model('osr/Pages_m');
        $this->load->model('osr/Family_model');
        $this->load->model('osr/Family_data');
//        $this->main_groups = $this->Pages_m->main_fetch_group();
//        $this->my_side_bar = $this->Pages_m->get_my_page_permession();
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

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function index()
    { /*osr/Dash*/
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $data['current_year'] = $this->current_hjri_year();

        $data["main_groups"] = $this->Pages_m->main_fetch_group_main();
        $data["chart_data"] = $this->Family_data->get_chart_data($_SESSION['mother_national_num']);
        $data["family_data"] = $this->Family_data->basic_data($_SESSION['mother_national_num']);
        $data["member_data"] = $this->Family_data->member_data($_SESSION['mother_national_num']);
/*        $data['family_sarf'] = $this->Family_model->get_sarf_details($_SESSION['mother_national_num']);*/
        $data['family_sarf_months'] = $this->Family_data->get_sarf_months($_SESSION['mother_national_num']);
        $data['family_sarf_bands'] = $this->Family_data->get_sarf_bands($_SESSION['mother_national_num']);

;
        $data['title'] = 'الرئيسية';
        $data['metakeyword'] = 'الرئيسية';
        $data['metadiscription'] = 'الرئيسية';
        $data['subview'] = 'osr/main';
        $this->load->view('osr/index_osr_without_sidebar', $data);
    }
    public function mian_group($id)
    {
        if ($this->session->userdata('is_osra_logged_in') == 0) {
            redirect('osr/Login_osr');
        }
        $_SESSION["group_number"] = $id;
        $data["groups"] = $this->Pages_m->get_group($id);
        $data["groups_id"] = $id;
        $date_table = $this->Pages_m->getgroupbyid($id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'osr/sub_main';
        $this->load->view('osr/osr_index', $data);
    }
    public function sub_sub_main($id, $main_group_id)
    {
        $_SESSION["group_number"] = $id;
        $data["sub_groups"] = $this->Pages_m->get_group($id);
        $date_table = $this->Pages_m->getgroupbyid($main_group_id);
        $data['title'] = $date_table["page_title"];
        $data['metakeyword'] = $date_table["page_title"];
        $data['metadiscription'] = $date_table["page_title"];
        $data['subview'] = 'osr/sub_sub_main';
        $this->load->view('osr/osr_index', $data);
    }


    public function family_data_load() {
        /*osr/Dash/family_data_load*/

        $mother_national_num = $_SESSION['mother_national_num'];
        $data['mother_national_num'] = $mother_national_num;

        $data["family_data"] = $this->Family_data->basic_data($_SESSION['mother_national_num']);


        $data["h_street"] =$this->Family_data->get_by('houses',array('mother_national_num_fk'=>$mother_national_num),'h_street');
        $h_village_id_fk =$this->Family_data->get_by('houses',array('mother_national_num_fk'=>$mother_national_num),'h_village_id_fk');
        $data["h_village"] =$this->Family_data->get_by('area_settings',array('id'=>$h_village_id_fk),'title');

        $data["count_members"] = $this->Family_data->get_count('f_members',array('mother_national_num_fk'=>$mother_national_num));
        $data["count_halt_active"] = $this->Family_data->get_count('f_members',array('mother_national_num_fk'=>$mother_national_num,'halt_elmostafid_member'=>1));


//        $this->load->view('osr/service_orders/family_data_load.php',$data);
        $this->load->view('osr/family_data_load.php',$data);
    }

    function omnia(){

/*

        echo '<pre>';
        echo 'describe table ';

       echo "edite";
        $this->load->dbforge();

             $fields = array(
                  'ttype' => array(
                      'type' => 'TINYINT ',
                      'default' => 1,
                      'null' => TRUE
                  )
              );
echo 'after edite';
              $this->dbforge->add_column('family_attach_files', $fields);
              $this->dbforge->add_column('family_attach_files_other', $fields);
        $table = $this->db->escape_str('family_attach_files');
        $sql = "DESCRIBE `$table`";
        print_r( $this->db->query($sql)->result());
        $table = $this->db->escape_str('family_attach_files_other');
        $sql = "DESCRIBE `$table`";
        print_r( $this->db->query($sql)->result());*/

/*        echo "\n print 1 <pre>";*/
        /* print_r($this->db->get('basic')->result());*/
     /*   echo "\n print 1 <pre>";
print_r($this->db->get('pages_osr')->result());
        $this->db->where('page_id',16)->delete('pages_osr');
        $this->db->where('page_id',15)->delete('pages_osr');
 INSERT INTO `pages_osr` (`page_id`, `page_title`, `page_link`, `group_id_fk`, `level`, `page_order`, `page_icon_code`, `page_image`, `bg_color`, `width`, `color`, `class`) VALUES (NULL, 'الصرف ', 'osr/Family/family_sarf', '14', '2', '2', 'fa fa-group (alias)', '26086cb2069223620e99e9752cbb79b4.png', '#fff', '20', '#009688', NULL);
 INSERT INTO `pages_osr` (`page_id`, `page_title`, `page_link`, `group_id_fk`, `level`, `page_order`, `page_icon_code`, `page_image`, `bg_color`, `width`, `color`, `class`) VALUES (NULL, 'الكفلات', 'osr/Sponsor/sponsor_details', '14', '2', '1', 'fa fa-group (alias)', '26086cb2069223620e99e9752cbb79b4.png', '#fff', '20', '#009688', NULL);
     */

  /*      print_r($this->db->get('pages_osr')->result());

         $SQL="INSERT INTO `pages_osr` (`page_id`, `page_title`, `page_link`, `group_id_fk`, `level`, `page_order`, `page_icon_code`, `page_image`, `bg_color`, `width`, `color`, `class`) VALUES 
(null, 'خدمة الحج/العمرة', 'osr/service_orders/Serv_hij_omra', 20, 2, 1, '', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'معالجة البطاقة الالكترونية', 'osr/service_orders/Electronic_card', 20, 2, 2, '', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'مساعده زواج', 'osr/service_orders/Marriage_orders', 20, 2, 3, '', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'التحويل لمركز طبي', 'osr/service_orders/Medical_center', 20, 2, 4, '', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'طلبات الاجهزة الكهربية /الأثاث', 'osr/service_orders/Aghza_athath', 20, 2, 5, 'fa fa-group (alias)', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'إصلاح / ترميم المنزل', 'osr/service_orders/Aghza_athath', 20, 2, 6, 'fa fa-group (alias)', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL),
(null, 'طلبات تسديد الفواتير', 'osr/service_orders/Fator2', 20, 2, 7, 'fa fa-group (alias)', '26086cb2069223620e99e9752cbb79b4.png', '#fff', 20, '#009688', NULL);

 ";

          $this->db->query($SQL);
         echo "\n print 2";
        print_r($this->db->get('pages_osr')->result());*/

//         print_r($query->result_array());


    }
}//END CLASS
?>