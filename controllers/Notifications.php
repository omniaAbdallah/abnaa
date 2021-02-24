<?php


class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       // $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
       // $this->load->model('Notification_model');

    }

/*function get_all_notification()
{


       $table_arr = array('hr_all_agzat_orders', 'hr_all_ozonat_orders', 'hr_solaf', 'arch_notes_history', 'arch_sader_history', 'arch_wared_history', 'email_inbox',
        'arch_sader_comments', 'arch_wared_twgehat', 'chat', 'pr_contact', 'family_chat', 'hr_entdab', 'hr_mosayer', 'finance_account_transformations', "hr_solaf_tagel", 
         "hr_solaf_ta3gel",'hr_emp_hesabat_banks_orders');


    $notifiy_filde = array('seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen',
         'seen','suspend','seen','seen','seen','seen','seen','seen','seen');
    $where_filde = array('current_to_user_id', 'current_to_id', 'current_to_user_id', 'to_user_id',
       'to_user_id', 'to_user_id', 'email_to_id', 'to_user_id', 'to_user_id',
        'receiver_id','suspend','receiver_id','current_to_user_id','current_to_user_id',
        'current_to_user_id','current_to_user_id','current_to_user_id','current_to_user_id');
    $where_filde_value = array($_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'],
        $_SESSION['emp_code'], $_SESSION['emp_code'],$_SESSION['user_id'],0,$_SESSION['user_id'],$_SESSION['user_id'],
        $_SESSION['user_id'],$_SESSION['user_id'],$_SESSION['user_id'],$_SESSION['user_id'],$_SESSION['user_id']);

    $return_arr = array();

    $count = sizeof($table_arr);

    for ($i = 0; $i < $count; $i++) {

        $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
            ->get($table_arr[$i])->row()->count;
        array_push($return_arr, $count_q);
    }

    $data['notification'] = $return_arr;
    echo json_encode($data);

}*/
function get_all_notification()
{ 

    $table_arr = array('hr_all_agzat_orders', 
                       'hr_all_ozonat_orders', 
                       'hr_solaf',
                       'arch_notes_history',
                        'arch_sader_history',
                         'arch_wared_history',
                          'email_inbox',     
        'arch_sader_comments',
         'arch_wared_twgehat',
          'chat',
           'pr_contact',
            'family_chat',
             'hr_entdab',
              'hr_mosayer',
               'finance_account_transformations',
                "hr_solaf_tagel",
        "hr_solaf_ta3gel",
         'hr_emp_hesabat_banks_orders',
          'hr_nmazg_letter_emp',
           'hr_nmazg_letter_emp',
           'hr_volunteer_hours_orders',
           'hr_emp_tataw3',
           'hr_emp_tataw3_details',
           'hr_emp_tataw3_details',
        'finance_ezn_sarf',
        'finance_ezn_sarf',
        'hr_solaf',
        'osr_crm_zyraat',
        'selected_lagna_members',
        'selected_lagna_members');
    $notifiy_filde_array = array(
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'to_user_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'to_user_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'to_user_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'email_to_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'to_user_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'to_user_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'receiver_id' => $_SESSION['user_id']),
        array('suspend' => 0),
        array('seen' => 0, 'receiver_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'finished' => 'no', 'current_to_user_id' => $_SESSION['user_id']),
        array('seen' => 0, 'finished' => 'yes', 'emp_id' => $_SESSION['emp_code']),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('moder_tataw3_seen' => 0, 'current_to_moder_tatw3_id' => $_SESSION['emp_code']),
        array('seen' => null, 'emp_id' => $_SESSION['emp_code'],'close_publish_tataw3'=>0),
        array('current_to_user_id' => $_SESSION['user_id'],'current_to_action'=>0),
        array('seen' => 0, 'current_to_id' => $_SESSION['user_id']),
        array('seen' => 0, 'current_to_id' => $_SESSION['user_id'],'suspend' =>4,'level'=>4),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id'],'suspend' =>4),
        array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']),
        array('replay_invitation_seen' => 'no', 'member_id' => $_SESSION['emp_code'],'replay_invitation'=>0),
        array('member_decision_seen' => 'no', 'member_id' => $_SESSION['emp_code'], 'member_decision' => 0 ,'finished' => 1),
        
        );
    $return_arr = array();
    $count = sizeof($table_arr);
    for ($i = 0; $i < $count; $i++) {
        $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde_array[$i])->get($table_arr[$i])->row()->count;
        array_push($return_arr, $count_q);
//            print_r($this->db->last_query());

    }

    $data['notification'] = $return_arr;
    echo json_encode($data);

}

/*function get_all_notification()
{
  $table_arr = array('hr_all_agzat_orders', 'hr_all_ozonat_orders', 'hr_solaf', 'arch_notes_history', 'arch_sader_history', 'arch_wared_history', 'email_inbox',
        'arch_sader_comments', 'arch_wared_twgehat','chat','pr_contact','family_chat','hr_mandate_orders','hr_mosayer','finance_account_transformations');
    $notifiy_filde = array('seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen', 'seen','suspend','seen','seen','seen','seen');
    $where_filde = array('current_to_user_id', 'current_to_id', 'current_to_user_id', 'to_user_id', 'to_user_id', 'to_user_id', 'email_to_id', 'to_user_id', 'to_user_id', 'receiver_id','suspend','receiver_id','current_to_user_id','current_to_user_id','current_to_user_id');
    $where_filde_value = array($_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'], $_SESSION['emp_code'],
        $_SESSION['emp_code'], $_SESSION['emp_code'],$_SESSION['user_id'],0,$_SESSION['user_id'],$_SESSION['user_id'],$_SESSION['user_id'],$_SESSION['user_id']);

    $return_arr = array();

    $count = sizeof($table_arr);

    for ($i = 0; $i < $count; $i++) {

        $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
            ->get($table_arr[$i])->row()->count;
        array_push($return_arr, $count_q);
    }

    $data['notification'] = $return_arr;
    echo json_encode($data);

}*/
function get_all_notification_web()
{

    $table_arr = array( 'family_chat');
    $notifiy_filde = array('seen');
    $where_filde = array('receiver_id');

    $where_filde_value = array( $_SESSION['mother_national_num']);

    $return_arr = array();

    $count = sizeof($table_arr);

    for ($i = 0; $i < $count; $i++) {

        $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
            ->get($table_arr[$i])->row()->count;
        array_push($return_arr, $count_q);
    }

    $data['notification'] = $return_arr;
    echo json_encode($data);

}

function get_all_notification_email()
{
    if ($_SESSION['role_id_fk'] == 3) {
        $email_replay_conn = $_SESSION['emp_code'];
    } else {
        $email_replay_conn = $_SESSION['user_id'];
    }
    $count_q = $this->db->select('*')->where('seen', 0)->where('receiver_id', $email_replay_conn)
        ->get('replay_email')->result_array();
    foreach ($count_q as $key=>$item){
        $count_q[$key]['emp_data']=$this->db->select('employee')->where('id', $email_replay_conn)->get('employees')->row_array()['employee'];
    }
    $data['replay_email'] = $count_q;
    echo json_encode($data);
}


}