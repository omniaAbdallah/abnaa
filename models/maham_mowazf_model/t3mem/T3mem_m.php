<?php
class T3mem_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    ////yara
     public function count_by($table, $where_arr = false, $select = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        return $this->db->select('COUNT(id) as count')->get($table)->row_array()['count'];
    }
    public function select_all_my_email($where_arr = false)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem_details');
        $this->db->order_by('id', 'desc');
        if ($_SESSION['role_id_fk'] == 1) {
            $x = $_SESSION['user_id'];
        } else {
            $x = $_SESSION['emp_code'];
        }
        if (!empty($x)) {
            $this->db->group_start()->where('emp_id', $x)->group_end();
        }
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query_result = $this->db->get()->result();
        if (!empty($query_result)) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->employee_photo = $this->get_employee_photo($row->emp_id);
                $query_result[$i]->t3mem_data = $this->get_ta3mem_data($row->ta3mem_id_fk);
                $i++;
            }
            
            return $query_result;
            
        }
    }
    public function get_employee_photo($f_id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("id", $f_id);
        $query = $this->db->get()->row()->personal_photo;
        return $query;
    }
    public function get_ta3mem_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem');
        $this->db->where("id", $id);
        $this->db->where("type", "t3mem");
        $query = $this->db->get()->row();
        return $query;
    }
    

    public function update_seen_messages()
    {
        $data['seen'] = 1;
        $this->db->where('emp_id', $_SESSION['emp_code'])->update('hr_ta3mem_details', $data);
    }
    public function get_action_da3wa($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_details");
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        if (!empty($query)) {
                $arr = $query;
                $arr->basic_data = $this->basic_data($query->ta3mem_id_fk);
                if(!empty($arr->basic_data))
                {
            return $arr;
                }
        } else {
            return false;
        }
    }
    public function basic_data($id)
    {
        return $this->db->where('id',$id)
        ->where('type','t3mem')->get('hr_ta3mem')->row();
    }
    public function get_action_da3wa_adv($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_details");
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        if (!empty($query)) {
                $arr = $query;
                $arr->basic_data = $this->basic_data_adv($query->ta3mem_id_fk);
                if(!empty($arr->basic_data))
                {
            return $arr;
                }
        } else {
            return false;
        }
    }
    public function basic_data_adv($id)
    {
        return $this->db->where('id',$id)
        ->where('type','adv')->get('hr_ta3mem')->row();
    }
    public function select_all_my_sent_email($where_arr = false)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem_details');
        $this->db->order_by('id', 'desc');
        if ($_SESSION['role_id_fk'] == 1) {
            $x = $_SESSION['user_id'];
        } else {
            $x = $_SESSION['emp_code'];
        }
        if (!empty($x)) {
            $this->db->group_start()->where('emp_id', $x)->group_end();
        }
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query_result = $this->db->get()->result();
        if (!empty($query_result)) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->employee_photo = $this->get_employee_photo($row->emp_id);
                $query_result[$i]->t3mem_data = $this->get_adv_data($row->ta3mem_id_fk);
                $i++;
            }
            
            return $query_result;
            
        }
    }
    public function get_adv_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem');
        $this->db->where("id", $id);
        $this->db->where("type", "adv");
        $query = $this->db->get()->row();
        return $query;
    }

    public function select_all_my_sent_msg($where_arr = false)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem_msg_details');
        $this->db->order_by('id', 'desc');
        if ($_SESSION['role_id_fk'] == 1) {
            $x = $_SESSION['user_id'];
        } else {
            $x = $_SESSION['emp_code'];
        }
        if (!empty($x)) {
            $this->db->group_start()->where('emp_id', $x)->group_end();
        }
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query_result = $this->db->get()->result();
        if (!empty($query_result)) {
            $i = 0;
            foreach ($query_result as $row) {
                $query_result[$i]->employee_photo = $this->get_employee_photo($row->emp_id);
                $query_result[$i]->t3mem_data = $this->get_msg_data($row->ta3mem_msg_id_fk);
                $i++;
            }
            
            return $query_result;
            
        }
    }
    public function get_msg_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_ta3mem_msg');
        $this->db->where("id", $id);
        $query = $this->db->get()->row();
        return $query;
    }
    public function get_action_da3wa_msg($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        if (!empty($query)) {
                $arr = $query;
                $arr->basic_data = $this->basic_data_msg($query->ta3mem_msg_id_fk);
                if(!empty($arr->basic_data))
                {
            return $arr;
                }
        } else {
            return false;
        }
    }
    public function basic_data_msg($id)
    {
        return $this->db->where('id',$id)
      ->get('hr_ta3mem_msg')->row();
    }
}