<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ta3mem_adv_model extends CI_Model
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

    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv");
        //$this->db->where("type","adv");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv");
        //$this->db->where("type","adv");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->count_all = $this->count_all_emp($row->id);
                $a++;
            }
            return $arr;
        } else {
            return false;
        }
    }

    public function count_all_emp($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv_details");
        $this->db->where("ta3mem_id_fk", $id);
        $this->db->where("seen", 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_emp($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv_details");
        $this->db->where("ta3mem_id_fk", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_id($table, $where, $id)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->result();
        // return $arr;
        if ($arr != null) {
            for ($i = 0; $i < sizeof($arr); $i++) {
                $dataa['ta3mem_id_fk'] = $this->select_last_id();
                $dataa['emp_id'] = $arr[$i]->id;
                $dataa['emp_code'] = $arr[$i]->emp_code;
                $dataa['emp_name'] = $arr[$i]->employee;
                // $dataa['type'] =2;
                $this->db->insert('hr_ta3mem_adv_details', $dataa);
            }
        }
    }

    public function insert($id, $img)
    {
        //  $data['edara_n'] = $this->input->post('edara_n');
        //  $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $x = $this->input->post('edara_id_fk');
        $y = $this->input->post('edara_fk_name');
        //  $data['edara_id_fk'] = $x[$i];
        //  $data['edara_n']  = 'ادارة';
        $data['ta3mem_date'] = $this->input->post('ta3mem_date');
        //
        $data['ta3mem_title'] = $this->input->post('ta3mem_title');
        $data['adv_from_date'] = $this->input->post('adv_from_date');
        $data['adv_to_date'] = $this->input->post('adv_to_date');
        $data['adv_place'] = $this->input->post('adv_place');
        $data['adv_time'] = $this->input->post('adv_time');
        //
        $data['subject'] = $this->input->post('subject');
        $data['img'] = $img;
        if ($id == 0) {
            // $data['type'] ="adv";
            //
            //   $data['file'] = $img_file;
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_ar'] = date('Y-m-d');
            $data['publisher'] = $_SESSION['emp_code'];
            $data['publisher_name'] = $this->getUserName($_SESSION['emp_code']);
            $this->db->insert("hr_ta3mem_adv", $data);
        } else {
            $this->db->where('id', $id)->update("hr_ta3mem_adv", $data);
        }
        if ($x != null) {
            for ($i = 0; $i < sizeof($x); $i++) {
                $this->get_id("employees", "edara_id", $x[$i]);
                // print_r($vv);
            }
        }
    }

    public function get_emp_code($table, $where, $id)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row()->emp_code;
        return $arr;
    }

    public function insert_emp($img)
    {
        //  $data['edara_n'] = $this->input->post('edara_n');
        //  $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $x = $this->input->post('edara_id_fk');
        $y = $this->input->post('edara_fk_name');
        //$data['edara_id_fk'] = $x[$i];
        // $data['edara_n']  = 'موظف';
        $data['ta3mem_date'] = $this->input->post('ta3mem_date');
        //
        $data['ta3mem_title'] = $this->input->post('ta3mem_title');
        $data['img'] = $img;
        //  $data['type'] ="adv";
        $data['adv_from_date'] = $this->input->post('adv_from_date');
        $data['adv_to_date'] = $this->input->post('adv_to_date');
        $data['adv_place'] = $this->input->post('adv_place');
        $data['adv_time'] = $this->input->post('adv_time');
        //
        //   $data['file'] = $img_file;
        $data['subject'] = $this->input->post('subject');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['emp_code'];
        $data['publisher_name'] = $this->getUserName($_SESSION['emp_code']);
        $this->db->insert("hr_ta3mem_adv", $data);

        if ($x != null) {
            for ($i = 0; $i < sizeof($x); $i++) {
                //  $this->get_id("employees", "id", $x[$i]);
                $dataa['ta3mem_id_fk'] = $this->select_last_id();
                $dataa['emp_id'] = $x[$i];

                $dataa['emp_code'] = $this->get_emp_code("employees", "id", $x[$i]);
                $dataa['emp_name'] = $y[$i];
                $this->db->insert('hr_ta3mem_adv_details', $dataa);
            }
        }
        // print_r($vv);
    }
    // public function change_status($approved,$id)
    // {
    // 	$data['status']=0;
    // 	$this->db->update('hr_ta3mem_adv',$data);
    // 	$this->db->where('id',$id);
    // 	$status = 1 - $approved;
    // 	$data2['status'] = $status;
    // 	$this->db->update('hr_ta3mem_adv',$data2);
    // }
    public function Delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_ta3mem_adv");
    }

    public function Delete_details($id)
    {
        $this->db->where("ta3mem_id_fk", $id);
        $this->db->delete("hr_ta3mem_adv_details");
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

//yara
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

    ////////////////////////////////////yaraaaa/////
    public function select_all_emp($id = false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where("employee_type", 1);
        if (!empty($id)) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("id", $_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function select_depart($id = false)
    {
        $this->db->select('*');
        $this->db->from('employees');
        //   $this->db->where("employee_type", 1);
        if (!empty($id)) {
            $this->db->where("id", $id);
        } else {
            $this->db->where("id", $_SESSION['emp_code']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $a++;
            }
            return $arr[0];
        } else {
            return 0;
        }
    }

    public function get_edara_name_or_qsm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('department_jobs');
        if ($query->num_rows() > 0) {
            return $query->row()->name;
        } else {
            return false;
        }
    }

    public function get_job_title($id)
    {
        $this->db->where('defined_id', $id);
        $query = $this->db->get('all_defined_setting');
        if ($query->num_rows() > 0) {
            return $query->row()->defined_title;
        } else {
            return false;
        }
    }

    public function get_all_edarat()
    {
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk", 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 1;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        }
        return false;
    }
    //yara23-9-2020
    // public function get_action_da3wa()
    // {
    //     $this->db->select('*');
    //     $this->db->from("hr_ta3mem_adv_details");
    //     $this->db->where('emp_id', $_SESSION['emp_code']);
    //     $this->db->where('seen', NULL);
    //     $query = $this->db->get()->row();
    //     if (!empty($query)) {
    //             $arr = $query;
    //             $arr->basic_data = $this->basic_data($query->ta3mem_id_fk);
    //             if(!empty($arr->basic_data))
    //             {
    //         return $arr;
    //             }
    //     } else {
    //         return false;
    //     }
    // }
    public function get_action_da3wa()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv_details");
        $this->db->where('emp_id', $_SESSION['emp_code']);
        $this->db->where('seen', 0);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $i = 0;
            $data = $query->result();
            foreach ($query->result() as $row) {
                $arr = $query;
                $data[$i]->basic_data = $this->basic_data($row->ta3mem_id_fk);
                $data[$i]->attach_data = $this->attach_data($row->ta3mem_id_fk);
                $i++;
            }
            return $data;
        }
        return false;


    }
    // attach_data
     public function attach_data($id)
     {
         return $this->db->where('ta3mem_id_fk', $id)
            ->get('hr_ta3mem_adv_attaches')->result();
     }
    public function basic_data($id)
    {
        return $this->db->where('id', $id)
            ->where('send_all_t3mem', 1)->get('hr_ta3mem_adv')->row();
    }
    // public function basic_data($id)
    // {
    //     return $this->db->where('id',$id)
    //     ->where('send_all_t3mem', 1)->get('hr_ta3mem_adv')->row();
    // }

    public function get_all_emps($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->where('employee_type', 1);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv");
        $this->db->where("id", $id);
        //  $this->db->where("type", "adv");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get()->row();
        if ($query != '') {
            //   $query = $row;
            $query->count_all = $this->get_t3mem_all_emp($query->id);
            return $query;
        } else {
            return false;
        }
    }

    public function get_t3mem_all_emp($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv_details");
        $this->db->where("ta3mem_id_fk", $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_unseen_adv()
    {
        $t3mem = $this->db->select('hr_ta3mem_adv.*,hr_ta3mem_adv_details.*')
            ->from("hr_ta3mem_adv_details")
            ->join('hr_ta3mem_adv', 'hr_ta3mem_adv_details.ta3mem_id_fk=hr_ta3mem_adv.id')
            ->where('hr_ta3mem_adv.send_all_t3mem', 1)
            ->where('emp_id', $_SESSION['emp_code'])
            ->where('seen', 0)
            ->get()->row();
        if (!empty($t3mem)) {
            /// $data = array('t3mem' => $t3mem);
            $query = $t3mem;
            $query->attaches = $this->get_attaches($t3mem->ta3mem_id_fk);
            return $query;
        }
    }

    // get_attaches
    public function get_attaches($id)
    {
        $this->db->where('ta3mem_id_fk', $id);
        $q = $this->db->get('hr_ta3mem_adv_attaches')->result();
        if (!empty($q)) {
            return $q;
        } else {
            return false;
        }
    }

    public function get_attach($id)
    {
        $query = $this->db->where('ta3mem_id_fk', $id)->get('hr_ta3mem_adv_attaches');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function insert_attach($all_img)
    {
        if (!empty($all_img)) {
            $img_count = count($all_img);
            for ($a = 0; $a < $img_count; $a++) {
                $files['file'] = $all_img[$a];
                $files['title'] = $this->input->post('title');
                $files['ta3mem_id_fk'] = $this->input->post('row');
                $files['date'] = strtotime(date("Y-m-d"));
                $files['date_ar'] = date("Y-m-d");
                if (isset($_SESSION['user_id'])) {
                    $files['publisher'] = $_SESSION['user_id'];
                    $files['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                }
                $this->db->insert('hr_ta3mem_adv_attaches', $files);
            }
        }
    }

    public function delete_upload($id)
    {
        $img = $this->get_by('hr_ta3mem_adv_attaches', array('id' => $id), 1);
        if (file_exists("uploads/human_resources/ta3mem/" . $img->file)) {
            unlink(FCPATH . "uploads/human_resources/ta3mem/" . $img->file);
        }
    }

    public function delete_attach_all($id)
    {
        $this->delete_upload($id);
        $this->db->where('ta3mem_id_fk', $id);
        $this->db->delete('hr_ta3mem_adv_attaches');
    }

    public function delete_attach($id)
    {
        $this->delete_upload($id);
        $this->db->where('id', $id);
        $this->db->delete('hr_ta3mem_adv_attaches');
    }

    // send_all_t3mem
    public function send_all_t3mem($id)
    {
        $data['send_all_t3mem'] = 1;
        $this->db->where('id', $id)->update('hr_ta3mem_adv', $data);
        $dataa['seen'] = 0;
        $this->db->where('ta3mem_id_fk', $id)->update('hr_ta3mem_adv_details', $dataa);
    }

    // seen_t3mem_adv

    public function reply_dawa()
    {
        $id = $this->input->post('id');
        if ($this->input->post('action') == 'refuse') {
            //    $data['action'] = 2;
            $data['seen'] = 2;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_ta3mem_adv_details', $data);
        } else if ($this->input->post('action') == 'accept') {
            // $data['action'] = 1;
            $data['seen'] = 1;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_ta3mem_adv_details', $data);
        }
    }

    public function select_all_unseen_ta3mem()
    {
        $query = $this->db->select('hr_ta3mem_adv.*,hr_ta3mem_adv_details.*')
            ->from("hr_ta3mem_adv_details")
            ->join('hr_ta3mem_adv', 'hr_ta3mem_adv_details.ta3mem_id_fk=hr_ta3mem_adv.id')
            ->where('hr_ta3mem_adv.send_all_t3mem', 1)
            ->where('emp_id', $_SESSION['emp_code'])
            ->where('seen', 0)
            ->get()->result();
        if (!empty($query)) {

            return $query;
        } else {
            return false;
        }
    }

    public function select_all_ta3mem()
    {
        $query = $this->db->select('hr_ta3mem_adv.*,hr_ta3mem_adv_details.seen,hr_ta3mem_adv_details.seen_date,hr_ta3mem_adv_details.seen_time')
            ->from("hr_ta3mem_adv")
            ->join('hr_ta3mem_adv_details', 'hr_ta3mem_adv_details.ta3mem_id_fk=hr_ta3mem_adv.id')
            ->where('hr_ta3mem_adv.send_all_t3mem', 1)
            ->where('emp_id', $_SESSION['emp_code'])
            ->get()->result();
        if (!empty($query)) {

            return $query;
        } else {
            return false;
        }
    }

    public function get_one_adv_data($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_adv_details");
        $this->db->where('emp_id', $_SESSION['emp_code']);
        $this->db->where('ta3mem_id_fk', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->row();
            $query->basic_data = $this->basic_data($query->ta3mem_id_fk);
            $query->attach_data = $this->attach_data($query->ta3mem_id_fk);
            return $query;
        }
        return false;


    }

}