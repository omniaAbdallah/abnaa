<?php

class Egtma3at_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    public function get_last_galsa()
    {
        $this->db->select_max('glsa_rkm');
        $query = $this->db->get('hr_all_glasat_emp');
        //   $this->db->order_by('id','desc');
        if ($query->num_rows() > 0) {
            return $query->row()->glsa_rkm + 1;
        } else {
            return 1;
        }
    }

    public function get_last_mehwer()
    {
        $this->db->select_max('id');
        $query = $this->db->get('hr_all_galast_gadwal_a3mal');
        //   $this->db->order_by('id','desc');
        if ($query->num_rows() > 0) {
            return $query->row()->id + 1;
        } else {
            return 1;
        }
    }

    public function get_magls_member()
    {
        $this->db->order_by('id', 'ASC');

        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_last_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            return $query;
        } else {
            return array();
        }
    }

    public function get_by_id($table, $where_arr = false, $select = false)
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

    public function send_da3wat()
    {
        $glsa_rkm = $this->input->post('glsa_rkm');
        $data['send_da3wat'] = $this->input->post('send_da3wat');
        $this->db->where('glsa_rkm', $glsa_rkm);
        $this->db->update('hr_all_glasat_emp', $data);
        $data_hdoor['send_da3wa'] = $this->input->post('send_da3wat');
        $this->db->where('glsa_rkm', $glsa_rkm);
        $this->db->update('hr_all_glasat_emp_hdoor', $data_hdoor);
    }

    public function insert_galsa_member()
    {
        if (!empty($this->input->post('member_id'))) {
            $count = count($this->input->post('member_id'));
            for ($x = 0; $x < $count; $x++) {

                $data['glsa_rkm'] = $this->input->post('glsa_rkm');
                $data['emp_id_fk'] = $this->input->post('member_id')[$x];
                $data['emp_name'] = $this->get_mem_detail($this->input->post('member_id')[$x])->employee;
                $data['emp_code'] = $this->get_mem_detail($this->input->post('member_id')[$x])->emp_code;
                $data['edara_n'] = $this->get_mem_detail($this->input->post('member_id')[$x])->edara_n;
                $data['qsm_n'] = $this->get_mem_detail($this->input->post('member_id')[$x])->qsm_n;

                $data['hdoor_satus'] = 0;
                $data['reason'] = 0;
                $data['date_add'] = date('Y-m-d');
                $data['time_add'] = date('H:i:s a');
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                $this->db->insert('hr_all_glasat_emp_hdoor', $data);
            }
        }
    }

    public function update_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        //$this->db->where('mgls_code', $code);
        $this->db->delete('hr_all_glasat_emp_hdoor');
        if (!empty($this->input->post('member_id'))) {
            $count = count($this->input->post('member_id'));
            for ($x = 0; $x < $count; $x++) {

                $data['glsa_rkm'] = $this->input->post('glsa_rkm');
                $data['emp_id_fk'] = $this->input->post('member_id')[$x];
                $data['emp_name'] = $this->get_mem_detail($this->input->post('member_id')[$x])->employee;
                $data['emp_code'] = $this->get_mem_detail($this->input->post('member_id')[$x])->emp_code;
                $data['edara_n'] = $this->get_mem_detail($this->input->post('member_id')[$x])->edara_n;
                $data['qsm_n'] = $this->get_mem_detail($this->input->post('member_id')[$x])->qsm_n;
                $data['hdoor_satus'] = 0;
                $data['reason'] = 0;
                $data['date_add'] = date('Y-m-d');
                $data['time_add'] = date('H:i:s a');
                $data['publisher'] = $_SESSION['user_id'];
                $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                $this->db->insert('hr_all_glasat_emp_hdoor', $data);
            }
        }
    }

    public function get_mem_detail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function select_all()
    {
        $this->db->order_by('glsa_rkm', 'desc');
        $query = $this->db->get('hr_all_glasat_emp');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_all_details($row->glsa_rkm);
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_by_rkm($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('hr_all_glasat_emp');
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->mehwr_num = $this->get_mehwr($query->glsa_rkm);
            $query->qrar_num = $this->get_qrar($query->glsa_rkm);
            $query->glsa_members_num = $this->get_glasat_hdoor_num($query->glsa_rkm, NULL);
            $query->glsa_members_hdoor_num = $this->get_glasat_hdoor_num($query->glsa_rkm, 1);
            $query->glsa_members_absent_num = $this->get_glasat_hdoor_num($query->glsa_rkm, 0);
            $query->makn_en3qd_name = $this->get_makn_en3qd_name($query->makn_en3qd);
            $query->glsa_members_all = $this->get_glasat_hdoor_da3wat_num($query->glsa_rkm, 10);
            $query->glsa_members_accept = $this->get_glasat_hdoor_da3wat_num($query->glsa_rkm, 1);
            $query->glsa_members_refuse = $this->get_glasat_hdoor_da3wat_num($query->glsa_rkm, 2);
            $query->glsa_members_wait = $this->get_glasat_hdoor_da3wat_num($query->glsa_rkm, 0);
            $query->glsa_members_no_action = $this->get_glasat_hdoor_da3wat_num($query->glsa_rkm, 5);
            return $query;
        } else {
            return false;
        }
    }

    /*16-7-om*/
    public function get_glasat_hdoor_num($glsa_rkm, $type)
    {
        $this->db->select('*');
        $this->db->from("hr_all_glasat_emp_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where("hdoor_satus", $type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_mehwr($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("hr_all_galast_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_qrar($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("hr_all_galast_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->where('elqrar_add', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }

    public function get_glasat_hdoor_da3wat_num($glsa_rkm, $attend)
    {
        $this->db->select('*');
        $this->db->from("hr_all_glasat_emp_hdoor");
        $this->db->where("glsa_rkm", $glsa_rkm);
        if ($attend == 1) {
            $this->db->where('action_da3wa', 'accept');
        } elseif ($attend == 2) {
            $this->db->where('action_da3wa', 'refuse');
        } elseif ($attend == 0) {
            $this->db->where('action_da3wa', 'wait');
        } elseif ($attend == 5) {
            $this->db->where('action_da3wa', NULL);
        } elseif ($attend == 10) {
        }
        //  $query = $this->db->get('md_da3wat_gam3ia_omomia');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_all_details_attend_new($rkm, $attend)
    {
        $this->db->where('glsa_rkm', $rkm);
        if ($attend == 1) {
            $this->db->where('action_da3wa', 'accept');
        } elseif ($attend == 2) {
            $this->db->where('action_da3wa', 'refuse');
        } elseif ($attend == 0) {
            $this->db->where('action_da3wa', 'wait');
        } elseif ($attend == 5) {
            $this->db->where('action_da3wa', NULL);
        }
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {

            }
            return $query;
        } else {
            return false;
        }
    }

    public function get_makn_en3qd_name($id_setting)
    {
        $q = $this->db->where('id_setting', $id_setting)->get('md_settings')->row()->title_setting;
        return $q;
    }

    /*16-7-om*/
    public function get_details_by_rkm($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        //  $this->db->where('mgls_code', $code);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[] = $row->emp_id_fk;
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function select_all_glasat_by_rkm($glsa_rkm)
    {
        $this->db->order_by('glsa_rkm', 'desc');
        $this->db->where('glsa_rkm', $glsa_rkm);
        $query = $this->db->get('hr_all_glasat_emp');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_all_details($row->glsa_rkm);
                $data[$x]->all_bnod = $this->get_all_bnod($row->glsa_rkm);
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_all_bnod($glsa_rkm)
    {
        $this->db->where('glsa_rkm', $glsa_rkm);
        $query = $this->db->get('hr_all_galast_gadwal_a3mal');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function select_all_galasat_finshed()
    {
        $this->db->where('glsa_finshed', 1);
        $this->db->order_by('glsa_rkm', 'desc');
        $query = $this->db->get('hr_all_glasat_emp');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_all_details($row->glsa_rkm);
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function delete($table, $Conditions_arr)
    {
        foreach ($Conditions_arr as $key => $value) {
            $this->db->where($key, $Conditions_arr[$key]);
        }
        $this->db->delete($table);
    }

    public function get_open_galesa()
    {
        return $this->db->select('COUNT(id) as count ')->where('glsa_finshed', 0)->get('hr_all_glasat_emp')->row()->count;
    }

    /************************************/
    public function get_by($table, $where_arr, $select = false)
    {
        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }
    }

    public function get_galsa_attach($glsa_id_fk)
    {
        $this->db->where('glsa_id_fk', $glsa_id_fk);
        $query = $this->db->get('hr_all_glasat_emp_attaches');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_attach($glsa_id_fk, $file)
    {
        $data['glsa_id_fk'] = $glsa_id_fk;
        $data['title'] = $this->input->post('title');
        if (!empty($file)) {
            $data['file'] = $file;
        }
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('hr_all_glasat_emp_attaches', $data);
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;
    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

    public function delete_attach($id, $table)
    {
//        $img = $this->get_row_morfq($id);
//        if (file_exists("uploads/md/all_glasat_gam3ia_omomia_attaches/" . $img->file)) {
//            unlink(FCPATH . "uploads/md/all_glasat_gam3ia_omomia_attaches/" . $img->file);
//        }
        $this->db->where('id', $id)->delete($table);
    }

    public function get_galsa_morfaq($glsa_id_fk, $type)
    {
        $this->db->where('glsa_id_fk', $glsa_id_fk);
        $this->db->where('type', $type);
        $query = $this->db->get('hr_all_glasat_emp_morfaq');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert_morfaq($glsa_id_fk, $file)
    {
        $data['glsa_id_fk'] = $glsa_id_fk;
        $data['title'] = $this->input->post('title');
        $data['type'] = $this->input->post('type');
        if (!empty($file)) {
            $data['file'] = $file;
        }
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('hr_all_glasat_emp_morfaq', $data);
    }

    public function change_status($valu, $id)
    {
        $status = 1 - $valu;
        $data['status'] = $status;
        $this->db->where('id', $id)->update('hr_all_glasat_emp', $data);
        return $status;
    }

    /*16-7-om*/
    public function get_all_details($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();

            return $query;
        } else {
            return false;
        }
    }

    public function get_by_mem($table, $where_arr, $select = false)
    {
        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }
    }

    function get_member_hdoor($rkm)
    {
        $this->db->order_by("hr_all_glasat_emp_hdoor.emp_code", "asc");
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('hdoor_satus', 1);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                /*                $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->emp_id_fk));*/
            }
            return $query;
        } else {
            return false;
        }
    }

    public function change_qrar_status($id)
    {
        $data['opend'] = 1;
        $this->db->where('id', $id)->update('hr_all_galast_gadwal_a3mal', $data);
    }

    function save_member_hdoor()
    {
        $row_id = $this->input->post('row_id');
        $member_name = $this->input->post('member_name');
        $member_id = $this->input->post('member_id');
        $mem_id_fk = $this->input->post('emp_id_fk');
        $hdoor_satus = $this->input->post('hdoor_satus');
        $hodoor_status = $this->input->post('hodoor_status');
        $data['hdoor_satus'] = $hdoor_satus;
        $data['hodoor_status'] = $hodoor_status;
        if ($data['hodoor_status'] == 'naeb') {
            /*  $mem_arr = explode('--', $member_id);
              if (!empty($mem_arr) && count($mem_arr) == 2) {
                  $data['member_name'] = $mem_arr[1];
                  $data['member_id'] = $mem_arr[0];
              }*/
            $data['member_name'] = $member_name;
            $data['member_id'] = $member_id;
        }
        $data['hdoor_date'] = strtotime(date('y-m-d h:i a'));
        $data['hdoor_time'] = strtotime(date('y-m-d h:i a'));
        $data['hdoor_added_by'] = $_SESSION['user_id'];
        $data['hdoor_added_by_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->where('id', $row_id)->where('emp_id_fk', $mem_id_fk)->update('hr_all_glasat_emp_hdoor', $data);
    }

    /*15-7-om*/
    function get_hdoor_num($glsa_rkm)
    {
        $data = array();
        $data['glsa_members_hdoor_num'] = $this->get_glasat_hdoor_num($glsa_rkm, 1);
        $data['glsa_members_absent_num'] = $this->get_glasat_hdoor_num($glsa_rkm, 0);
        $data['glsa_members_all'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 10);
        $data['glsa_members_accept'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 1);
        $data['glsa_members_refuse'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 2);
        $data['glsa_members_wait'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 0);
        $data['glsa_members_no_action'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 5);
        return $data;
    }


    public function insert_galsa()
    {

        $data['glsa_rkm'] = $this->input->post('glsa_rkm');
        $data['glsa_rkm_full'] = $this->input->post('glsa_rkm_full');

        $data['glsa_time'] = $this->input->post('glsa_time');
        $data['glsa_date'] = strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar'] = $this->input->post('glsa_date');
        $data['glsa_date_m'] = $this->input->post('glsa_date');
        $data['glsa_day'] = $this->input->post('glsa_day');


        $data['makn_en3qd'] = $this->input->post('makn_en3qd');
        $data['subject'] = $this->input->post('subject');
        $data['glsa_reviser_id'] = $this->input->post('glsa_reviser_id');
        //yara18-8-2020
        $data['glsa_reviser_name'] = $this->input->post('glsa_reviser_name');
        $data['glsa_reviser_time'] = $this->input->post('glsa_reviser_time');
        $data['glsa_duration'] = $this->input->post('glsa_duration');
        $data['date_add'] = date('Y-m-d');
        $data['time_add'] = date('H:i:s a');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        //yara18-8-2020
        $this->db->insert('hr_all_glasat_emp', $data);
    }

    public function update_galsa($rkm)
    {


        $data['glsa_time'] = $this->input->post('glsa_time');
        $data['glsa_date'] = strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar'] = $this->input->post('glsa_date');
        $data['glsa_date_m'] = $this->input->post('glsa_date');
        $data['glsa_day'] = $this->input->post('glsa_day');


        $data['makn_en3qd'] = $this->input->post('makn_en3qd');
        $data['subject'] = $this->input->post('subject');
        $data['glsa_reviser_id'] = $this->input->post('glsa_reviser_id');
        //yara18-8-2020
        $data['glsa_reviser_name'] = $this->input->post('glsa_reviser_name');
        $data['glsa_reviser_time'] = $this->input->post('glsa_reviser_time');
        $data['glsa_duration'] = $this->input->post('glsa_duration');
        //yara18-8-2020

        $this->db->where('glsa_rkm', $rkm);
        $this->db->update('hr_all_glasat_emp', $data);
    }

    //new_funcc
    public function get_all_emp()
    {


        $query = $this->db->order_by('id', 'ASC')->get('employees')->result();
        if ($query != 0) {

            return $query;
        }
        return false;
    }

    //yara27-8-2020
    public function get_action_da3wa()
    {
        $galsa_rkm = $this->get_by('hr_all_glasat_emp', array('glsa_finshed' => 0, 'send_da3wat' => 1), 'glsa_rkm');
        if (!empty($galsa_rkm)) {
            return $this->db->where('emp_id_fk', $_SESSION['emp_code'])
                ->where('glsa_rkm', $galsa_rkm)
                ->where('action_da3wa', NULL)
                ->get('hr_all_glasat_emp_hdoor')->row();
        }
    }

    public function get_galsa_details()
    {

        return $this->db->where('glsa_finshed', 0)
            ->where('send_da3wat', 1)
            ->get('hr_all_glasat_emp')->row();
    }

    public function get_mehwr_details_dash()
    {
        $glsa_rkm = $this->get_by('hr_all_glasat_emp', array('glsa_finshed' => 0, 'send_da3wat' => 1), 'glsa_rkm');
        if (!empty($glsa_rkm)) {
            $this->db->select('*');
            $this->db->from("hr_all_galast_gadwal_a3mal");
            $this->db->where("glsa_rkm", $glsa_rkm);
            $this->db->order_by('mehwar_rkm');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $a = 0;
                foreach ($query->result() as $row) {
                    $data[$a] = $row;
                    $a++;
                }
                return $data;
            } else {
                return false;
            }
        }
    }

    public function reply_dawa()
    {
        $data['action_da3wa'] = $this->chek_Null($this->input->post('action'));
        if ($data['action_da3wa'] == 'refuse') {
            $data['reason_refuse'] = $this->chek_Null($this->input->post('reason'));
        }
        $data['action_time'] = date('H:i:s a');
        $data['action_date'] = date('Y-m-d');
        $this->db->where('emp_id_fk', $_SESSION['emp_code'])->update('hr_all_glasat_emp_hdoor', $data);
    }

    /*29-8-20-om*/
    public function get_all_mahawer($rkm, $val)
    {
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('elqrar_add', $val);
        $query = $this->db->get('hr_all_galast_gadwal_a3mal');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_qrar()
    {
        $id = $this->input->post('valu');
        $mehar = $this->input->post('mehar');
        $data['elqrar'] = $mehar;
        $data['elqrar_date_add'] = date("Y-m-d");
        $data['elqrar_date_add_ar'] = date("Y-m-d");
        $data['elqrar_publisher'] = $_SESSION['user_id'];
        $data['elqrar_add'] = 1;
        $data['elqrar_publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $query = $this->db->get('hr_all_galast_gadwal_a3mal');
        $this->db->where('id', $id);
        $this->db->update('hr_all_galast_gadwal_a3mal', $data);
    }

    public function update_table_hoddor()
    {
        $id = $this->input->post('emp_id_fk');
        $attend = $this->input->post('attend');
        if (!empty($attend) && !empty($id)) {
            for ($x = 0; $x < count($attend); $x++) {
                $data['hdoor_satus'] = $this->input->post('attend')[$x];
                $this->db->where('id', $this->input->post('emp_id_fk')[$x]);
                $this->db->update('hr_all_glasat_emp_hdoor', $data);
            }
        }
    }


    public function update_start_galsa($tim)
    {
        $glsa_rkm = $this->input->post('glsa_rkm');
        $data['time_start'] = $tim;
        $this->db->where('glsa_rkm', $glsa_rkm);
        $this->db->update('hr_all_glasat_emp', $data);
    }

    public function get_magls_member_new()
    {
        $this->db->order_by("employees.emp_code", "asc");
        $query = $this->db->get('employees')->result();
        if (!empty($query)) {
            return $query;
        } else {
            return false;
        }

    }

    public function get_all_details_accept($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('action_dawa', 'accept');
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                /*  $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                  $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));*/
            }
            return $query;
        } else {
            return false;
        }
    }

    public function select_last_mehwar($glsa_rkm)
    {
        $this->db->select('*');
        $this->db->from("hr_all_galast_gadwal_a3mal");
        $this->db->where("glsa_rkm", $glsa_rkm);
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array()['mehwar_rkm'];
        } else {
            return false;
        }
    }

    public function select_last_galsa()
    {
        $this->db->select('*');
        $this->db->from("hr_all_glasat_emp");
        $this->db->where("glsa_finshed", 0);
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_galsa($glsa_rkm)
    {
        $h = $this->db->get_where("hr_all_glasat_emp", array('glsa_rkm' => $glsa_rkm));
        return $arr = $h->row();
    }
    public function insert_mehwor_qrar($files, $glsa_rkm = false)
    {
        /*      echo '<pre>';
              print_r($_POST);
      die;*/
        if (!empty($glsa_rkm)) {
            $last_galsa = $this->get_galsa($glsa_rkm);
        } else {
            $last_galsa = $this->select_last_galsa();
        }

        $data['glsa_rkm'] = $last_galsa->glsa_rkm;
        $data['glsa_rkm_full'] = $last_galsa->glsa_rkm_full;
        $data['glsa_date_m'] = $last_galsa->glsa_date_m;

        $data['mehwar_rkm'] = $this->select_last_mehwar($data['glsa_rkm']);
        $data['mehwar_title'] = $this->input->post('mehwar_title');

        $data['mehwar_vote'] = $this->input->post('mehwar_vote');

        if (!empty($data['mehwar_vote'])) {
            $data['vote_type'] = $this->input->post('vote_type');
        }
        if (!empty($files)) {
            $data['mehwar_morfaq'] = $files;
        }
        $data['mehwar_duration'] = $this->input->post('mehwar_duration');
        $data['mehwar_date_add'] = strtotime(date('Y-m-d'));
        $data['mehwar_date_add_ar'] = date('Y-m-d');
        $data['mehwar_publisher'] = $_SESSION['user_id'];
        $data['mehwar_publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $data['elqrar'] = $this->input->post('elqrar');
        $data['elqrar_date_add'] = date("Y-m-d");
        $data['elqrar_date_add_ar'] = date("Y-m-d");
        $data['elqrar_publisher'] = $_SESSION['user_id'];
        $data['elqrar_add'] = 1;
        $data['elqrar_publisher_name'] = $this->getUserName($_SESSION['user_id']);

        $this->db->insert('hr_all_galast_gadwal_a3mal', $data);

    }
    public function finished_galsa($tim)
    {
        $glsa_rkm=$this->input->post('glsa_rkm');
        // $data['time_end']=$tim;
        $data['time_end']=date("h:i A");
        $data['num_hdoor']=count($this->get_last_galsa_member($glsa_rkm,1));
        $data['num_absent']=count($this->get_last_galsa_member($glsa_rkm,0));
        $data['glsa_finshed']=1;
        $data['glsa_finshed_title']='تم الإنتهاء';
        $this->db->where('glsa_rkm',$glsa_rkm);
        $this->db->update('hr_all_glasat_emp',$data);
    }
    //yara30-8-2020
    public function get_all_details_action($rkm,$action)
    {
        $this->db->where('glsa_rkm', $rkm);
        $this->db->where('action_da3wa', $action);
        $query = $this->db->get('hr_all_glasat_emp_hdoor');
        if ($query->num_rows() > 0) {
            $query = $query->result();

            return $query;
        } else {
            return false;
        }
    }
}