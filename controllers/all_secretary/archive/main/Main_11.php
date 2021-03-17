<?php

class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        $this->load->model('maham_mowazf_model/archive_m/main/Main_model');
        /*************************************************************/
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    public function tnbehat_gdeda()
    { //maham_mowazf/archive/main/Main/tnbehat_gdeda
        $data['title'] = ' تنبيهات جديدة ';

        $data['customer_js'] = $this->load->view('admin/maham_mowazf_view/archive_v/main/app_js', '', TRUE);

        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/tnbehat_gdeda';
        $this->load->view('admin_index', $data);
    }

    public function thwelat_mostlma()
    { //maham_mowazf/archive/main/Main/thwelat_mostlma
        $data['title'] = ' تحويلات مستلمة';

        $data['estlam_js'] = $this->load->view('admin/maham_mowazf_view/archive_v/main/app_estlam_js', '', TRUE);

        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/thwelat_mostlma';
        $this->load->view('admin_index', $data);
    }

    public function thwelat_end()
    { //maham_mowazf/archive/main/Main/thwelat_end
        $data['title'] = 'تحويلات منتهيه';

        $data['end_js'] = $this->load->view('admin/maham_mowazf_view/archive_v/main/app_end_js', '', TRUE);


        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/thwelat_end';
        $this->load->view('admin_index', $data);
    }

    public function load_tahwel_sader()
    { //maham_mowazf/archive/main/Main/load_tahwel_sader
        $data['title'] = 'تحويلات صادرة';

        if ($_SESSION['role_id_fk'] == 1) {
            $data['all_sader'] = $this->Main_model->get_table('arch_sader_history', '');
            $data['all_wared'] = $this->Main_model->get_table('arch_wared_history', '');
        } else {
            $data['all_sader'] = $this->Main_model->get_table('arch_sader_history', array('from_user_id' => $_SESSION['emp_code']));
            $data['all_wared'] = $this->Main_model->get_table('arch_wared_history', array('from_user_id' => $_SESSION['emp_code']));
        }


        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/load_tahwel_sader';
        $this->load->view('admin_index', $data);
    }

    public function load_new_updates()
    { //maham_mowazf/archive/main/Main/load_new_updates
        $data['title'] = 'أحدث المعاملات';

        $data['new_sader'] = $this->Main_model->get_updates('arch_sader', array('current_from_user_id !=' => 0));
        $data['new_wared'] = $this->Main_model->get_updates('arch_wared', array('current_form_user_id !=' => 0));


        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/load_new_updates';
        $this->load->view('admin_index', $data);
    }

    public function all_archive()//maham_mowazf/archive/main/Main/all_archive
    {
        //$data['all_sader_end']=$this->Main_model->get_updates('arch_sader',array('suspend'=>4));
        //$data['all_wared_end']=$this->Main_model->get_updates('arch_wared',array('suspend'=>4));
//  $this->test($data);
        $this->load->model('all_secretary_models/archive_m/wared/Wared_model');
        $data['arry'] = $this->Wared_model->select_secret();
        $data['no3_khtab_n'] = $this->Wared_model->select_setting(201);
        $data['tarekt_estlam_name'] = $this->Wared_model->select_setting(401);
        $data['awlawya'] = $this->Wared_model->select_setting(401);
        $data['title_name'] = $this->Wared_model->select_setting(601);
//$this->test($data['arr']);
        $data['subview'] = 'admin/maham_mowazf_view/archive_v/main/data_archive';
        $this->load->view('admin_index', $data);
    }

    public function getConnection($from_date, $to_date, $reply_moamla, $no3_khtab, $title_name, $tarekt_estlam_name, $is_secret, $awlawya, $need_follow)
    {
        $all_Donors = $this->Main_model->get_updates_wared('arch_wared', array('suspend' => 4), $from_date, $to_date, $reply_moamla, $no3_khtab, $title_name, $tarekt_estlam_name, $is_secret, $awlawya, $need_follow);
        //$this->test( $all_Donors);
        $arr_donors = array();
        $arr_donors['data'] = array();
        if (!empty($all_Donors)) {
            foreach ($all_Donors as $row_donors) {
                if ($row_donors->awlawya == 1) {
                    $alwaya_text = 'هام';
                } elseif ($row_donors->awlawya == 2) {
                    $alwaya_text = ' عادي  ';
                } elseif ($row_donors->awlawya == 0) {
                    $alwaya_text = 'هام جدا  ';
                }
                $arr_donors['data'][] = array(
                    $row_donors->rkm,
                    $row_donors->estlam_date,
                    $row_donors->geha_ekhtsas_name,
                    $row_donors->geha_morsla_name,
                    $row_donors->title,
                    $row_donors->tarekt_estlam_name,
                    $alwaya_text,
                    '<button 
                   data-toggle="modal" data-target="#myModal_print"   
                   onclick="get_print(\'' . $row_donors->title . '\',\'' . $row_donors->date_ar . '\' ,\'' . $row_donors->rkm . '\');"
                   class="btn btn-success">طباعه الباركود</button>
                   <div class="btn-group">
                   <button type="button" class="btn btn-warning">إجراءات</button>
                   <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu">
                     <li><a  href="' . base_url() . '/maham_mowazf/archive/wared/Add_wared/compelete_details/' . $row_donors->id . '"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                   </ul>
                 </div> '
                );
            }
        }
        echo json_encode($arr_donors);
    }

///
    public function getConnection_sader($from_date, $to_date, $reply_moamla, $no3_khtab, $title_name, $tarekt_estlam_name, $is_secret, $awlawya, $need_follow)
    {
        $all_Donors_sader = $this->Main_model->get_updates_sader('arch_sader', array('suspend' => 4), $from_date, $to_date, $reply_moamla, $no3_khtab, $title_name, $tarekt_estlam_name, $is_secret, $awlawya, $need_follow);
        //$this->test( $all_Donors);
        $arr_donors_sader = array();
        $arr_donors_sader['data'] = array();
        if (!empty($all_Donors_sader)) {
            foreach ($all_Donors_sader as $row_donors) {
                $arr_donors_sader['data'][] = array(
                    $row_donors->sader_rkm,
                    $row_donors->ersal_date,
                    $row_donors->geha_ekhtsas_n,
                    $row_donors->geha_morsel_n,
                    $row_donors->mawdo3_name,
                    $row_donors->tarekt_ersal_n,
                    $row_donors->awlawia_n,
                    '<button 
                   data-toggle="modal" data-target="#myModal_print"   
                   onclick="get_print(\'' . $row_donors->mawdo3_name . '\',\'' . $row_donors->date_ar . '\' ,\'' . $row_donors->sader_rkm . '\');"
                   class="btn btn-success">طباعه الباركود</button>
                   <div class="btn-group">
                   <button type="button" class="btn btn-warning">إجراءات</button>
                   <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu">
                     <li><a  href="' . base_url() . '/maham_mowazf/archive/sader/Add_sader/add_deal/' . $row_donors->id . '"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                   </ul>
                 </div> '
                );
            }
        }
        echo json_encode($arr_donors_sader);
    }

    public function load_details_sader()
    {
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Main_model->get_sader_by_id($row_id);
        $this->load->view('admin/maham_mowazf_view/archive_v/main/load_details_sader', $data);
    }

    public function load_details_wared()
    {
        $row_id = $this->input->post('row_id');
        $data['get_all'] = $this->Main_model->get_wared_by_id($row_id);
        $this->load->view('admin/maham_mowazf_view/archive_v/main/load_details_wared', $data);
    }

    public function update_mo3mla()//maham_mowazf/archive/main/Main/update_mo3mla
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        if ($type == 2) {
            $this->Main_model->update_mo3mla_sader($id);
        } elseif ($type == 1) {
            $this->Main_model->update_mo3mla_wared($id);
        }
    }

    public function load_travel_type()
    {
//  $this->update_seen_wared();
        $data['wared'] = $this->Main_model->select_new_wared();
        $data['sader'] = $this->Main_model->select_new_sader();
        $this->load->view('admin/maham_mowazf_view/archive_v/main/new_notifecation', $data);
    }

    public function end_mo3mla()//maham_mowazf/archive/main/Main/update_mo3mla
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        if ($type == 2) {
            $this->Main_model->end_mo3mla_sader($id);
        } elseif ($type == 1) {
            $this->Main_model->end_mo3mla_wared($id);
        }
    }

    public function load_mostlma()
    {
        $data['wared_mostalm'] = $this->Main_model->select_wared_mostalm();
        $data['sader_mostalm'] = $this->Main_model->select_sader_mostalm();
        $this->load->view('admin/maham_mowazf_view/archive_v/main/tahwelat_imports', $data);
    }

    public function load_end()
    {
        $data['wared_end'] = $this->Main_model->select_end_wared();
        $data['sader_end'] = $this->Main_model->select_end_sader();
        $this->load->view('admin/maham_mowazf_view/archive_v/main/end_thwelat', $data);
    }
/////yara27-2-2020/////////////
// تنبيهات جديده
    public function new_data()
    {
        $wared = $this->Main_model->select_new_wared();
        $sader = $this->Main_model->select_new_sader();
        $arr = array();
        $arr['data'] = array();
        if (!empty($wared)) {
            $x = 0;
            foreach ($wared as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'وارده',
                    $row->mohma_name,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    $row->from_user_name,
                    '
                 <a onclick="get_details_wared(' . $row->id . ')"
                 aria-hidden="true"
                data-toggle="modal"
                data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>                  
',
                    '
<button    aria-hidden="true" class="btn btn-warning" onclick="resive_mo3mla(' . $row->id . ',1)"
><i class="fa fa-archive"> </i> اضغط لاستلام المعامله</button>
'
                );
            }
        }
        if (!empty($sader)) {
            $x = 0;
            foreach ($sader as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'صادره',
                    $row->mohema_n,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    $row->from_user_n,
                    '
               <a onclick="get_details_sader(' . $row->id . ')"
               aria-hidden="true"
              data-toggle="modal"
              data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>                  
',
                    '
<button    aria-hidden="true" class="btn btn-warning" onclick="resive_mo3mla(' . $row->id . ',2)"
><i class="fa fa-archive"> </i> اضغط لاستلام المعامله</button>
'
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

// تنبيهات مستلمه
    public function estlam_data()
    {
        $wared_mostalm = $this->Main_model->select_wared_mostalm();
        $sader_mostalm = $this->Main_model->select_sader_mostalm();
        $arr = array();
        $arr['data'] = array();
        if (!empty($wared_mostalm)) {
            $x = 0;
            foreach ($wared_mostalm as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'وارده',
                    $row->mohma_name,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    $row->from_user_name,
                    '
                 <a onclick="get_details_wared_mostalam(' . $row->id . ')"
                 aria-hidden="true"
                data-toggle="modal"
                data-target="#myModal_det_mostlam"><i class="fa fa-search" aria-hidden="true"></i></a>                 ',
                    date('Y-m-d',strtotime($row->readed_date_ar)),
                    date('h:i a ',strtotime($row->readed_date_ar)),
                    '
<button    aria-hidden="true" class="btn btn-danger" onclick="end_mo3mla(' . $row->id . ',1)"
                                            ><i class="fa fa-archive"> </i> اضغط لانهاء المعامله</button>
                                            <div class="btn-group">
                  <button type="button" class="btn btn-warning" style="height: 33px;">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" style="height: 33px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a  href="' . base_url() . '/all_secretary/archive/wared/Add_wared/compelete_details/' . $row->wared_id_fk . '"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                 </ul>
                 </div>
'
                );
            }
        }
        if (!empty($sader_mostalm)) {
            $x = 0;
            foreach ($sader_mostalm as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'صادره',
                    $row->mohema_n,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    $row->from_user_n,
                    '
               <a onclick="get_details_sader_mostalam(' . $row->id . ')"
               aria-hidden="true"
              data-toggle="modal"
              data-target="#myModal_det_mostlam"><i class="fa fa-search" aria-hidden="true"></i></a>                  
',
                    date('Y-m-d',strtotime($row->readed_date_ar)),
                    date('h:i a ',strtotime($row->readed_date_ar)),
                    '
<button    aria-hidden="true" class="btn btn-danger" onclick="end_mo3mla(' . $row->id . ',2)"
><i class="fa fa-archive"> </i> اضغط لانهاء المعامله</button>
<div class="btn-group">
<button type="button" class="btn btn-warning" style="height: 33px;">إجراءات</button>
<button type="button" class="btn btn-warning dropdown-toggle" style="height: 33px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="' . base_url() . '/all_secretary/archive/sader/Add_sader/add_deal/' . $row->sader_id_fk . '"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
</ul>
</div>
'
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

///معاملات منتهيه
    public function end_data()
    {
        $wared_end = $this->Main_model->select_end_wared();
        $sader_end = $this->Main_model->select_end_sader();
        $arr = array();
        $arr['data'] = array();
        if (!empty($wared_end)) {
            $x = 0;
            foreach ($wared_end as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'وارده',
                    $row->mohma_name,
                    $row->from_user_name,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    '
                 <a onclick="get_details_wared_end(' . $row->id . ')"
                 aria-hidden="true"
                data-toggle="modal"
                data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>               
'
                );
            }
        }
        if (!empty($sader_end)) {
            $x = 0;
            foreach ($sader_end as $row) {
                $x++;
                $arr['data'][] = array(
                    $x,
                    'صادره',
                    $row->mohema_n,
                    $row->from_user_n,
                    date('Y-m-d',strtotime($row->date_ar)),
                    date('h:i a ',strtotime($row->date_ar)),
                    '
               <a onclick="get_details_sader_end(' . $row->id . ')"
                 aria-hidden="true"
                data-toggle="modal"
                data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>                   
'
                );
            }
        }
        $json = json_encode($arr);
        echo $json;
    }

//yara24-8-2020
    public function check_notification()
    {
        $wared = $this->Main_model->select_new_wared_count();
        $sader = $this->Main_model->select_new_sader_count();
        echo $wared + $sader;
    }

    public function check_notification_estlam()
    {

        $wared_mostalm = $this->Main_model->select_wared_mostalm_count();
        $sader_mostalm = $this->Main_model->select_sader_mostalm_count();
        echo $wared_mostalm + $sader_mostalm;
    }

    public function check_notification_end()
    {


        $wared_end = $this->Main_model->select_end_wared_count();
        $sader_end = $this->Main_model->select_end_sader_count();
        echo $wared_end + $sader_end;

    }


}

?>