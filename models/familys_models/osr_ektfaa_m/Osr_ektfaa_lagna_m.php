<?php

class Osr_ektfaa_lagna_m extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }


    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("osr_ektfaa_lagna");
        $this->db->order_by("id", "DESC");
        $q = $this->db->get()->result();

        if (!empty($q)) {
            foreach ($q as $key => $value) {

                $q[$key]->emp_name = $this->get_data($value->emp_code, 'employee');
                $q[$key]->emp_photo = $this->get_data($value->emp_code, 'personal_photo');

            }
            return $q;
        }
    }

    public function get_data($fe2a, $field)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('emp_code', $fe2a);
        $query = $this->db->get()->row()->$field;
        return $query;
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
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
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;
    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

    public function insert()
    {

        $data['lagna_name'] = $this->input->post('lagna_name');
        $data['lagna_id'] = $this->input->post('lagna_id');
        $data['emp_code'] = $this->input->post('emp_code');
        $emp_data = $this->get_table_by_id('employees', array('emp_code' => $data['emp_code']));
        if (!empty($emp_data)) {
            $data['job_title_name'] = $emp_data->mosma_wazefy_n;
            $data['edara_n'] = $emp_data->edara_n;
            $data['qsm_n'] = $emp_data->qsm_n;
        }
        $job_in_lagna_id = explode('-', $this->input->post('job_in_lagna_id'));
        $data['job_in_lagna_name'] = $job_in_lagna_id[1];
        $data['job_in_lagna_id'] = $job_in_lagna_id[0];


        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['time'] = date('H:i:s a');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);


        $this->db->insert("osr_ektfaa_lagna", $data);

    }

    public function get_job_in_lagna_id()
    {
        $query = $this->db->get('osr_ektfaa_lagna')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->job_in_lagna_id;
            $x++;
        }
        if (!empty($data)) {
            return $data;
        } else {
            return 0;
        }
    }

    // get_emp_in_lagna_id
    public function get_emp_in_lagna_id()
    {
        $query = $this->db->get('osr_ektfaa_lagna')->result();
        $data = array();
        $x = 0;
        foreach ($query as $row) {
            $data[] = $row->emp_code;
            $x++;
        }
        if (!empty($data)) {
            return $data;
        } else {
            return 0;
        }
    }

    public function Delete($rkm)
    {

        $this->db->where("id", $rkm);
        $this->db->delete("osr_ektfaa_lagna");

    }


    public function getAllDetails($id)
    {
        $this->db->select('*');
        $this->db->from("osr_ektfaa_lagna");
        $this->db->where('id', $id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            if (!empty($query)) {


                return $query;
            }
        } else {
            return false;
        }
    }


    public function get_by($table, $where_arr = false, $select = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function get_table($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_table_by_id($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
        return $query;
    }

    function change_status($id)
    {
        $old_statuse = $this->get_by('osr_ektfaa_lagna', array('id' => $id), 'status');
        $this->db->where('id', $id)->update('osr_ektfaa_lagna', array('status' => (1 - $old_statuse)));

    }

}