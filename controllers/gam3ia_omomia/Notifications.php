<?php


class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 0) {
            redirect('gam3ia_omomia/Login_gam3ia_omomia');
        }
    }

    function get_all_notification()
    {

        $table_arr = array('md_gam3ia_contact');
        $notifiy_filde = array('seen');
        $where_filde = array('send_to_id_fk');
        $where_filde_value = array($_SESSION['id']);
        $return_arr = array();

        $count = sizeof($table_arr);

        for ($i = 0; $i < $count; $i++) {
            if ($i == 0) {
                $count_q = $this->db->select('COUNT(id) as count')->where('member_type_to',1)->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
                    ->get($table_arr[$i])->row()->count;
            } else {
                $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
                    ->get($table_arr[$i])->row()->count;
            }
            array_push($return_arr, $count_q);
        }

        $data['notification'] = $return_arr;
        echo json_encode($data);

    }
   /* function get_all_notification()
    {

        $table_arr = array('md_gam3ia_contact');
        $notifiy_filde = array('seen');
        $where_filde = array('send_to_id_fk');
        $where_filde_value = array($_SESSION['id']);
        $return_arr = array();

        $count = sizeof($table_arr);

        for ($i = 0; $i < $count; $i++) {
            if ($i == 0) {
                $count_q = $this->db->select('COUNT(id) as count')->where('member_type_to',1)->where('replay_id_fk',0)->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
                    ->get($table_arr[$i])->row()->count;
            } else {
                $count_q = $this->db->select('COUNT(id) as count')->where($notifiy_filde[$i], 0)->where($where_filde[$i], $where_filde_value[$i])
                    ->get($table_arr[$i])->row()->count;
            }
            array_push($return_arr, $count_q);
        }

        $data['notification'] = $return_arr;
        echo json_encode($data);

    }*/


}