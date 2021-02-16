<?php
class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
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
}