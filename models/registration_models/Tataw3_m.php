<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tataw3_m extends CI_Model
{
    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

    //yara
    public function get_last_id()
    {
        $this->db->select('id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tat_motat3en');
        if ($query->num_rows() > 0) {
            return $query->row()->id + 1;
        } else {
            return 1;
        }

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

    public function get_title_mgalat($id)
    {

        $this->db->select('id,title');
        $this->db->from('tat_mgalat');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->title;
        } else {
            return 0;
        }


    }


    public function get_title_reason($id)
    {

        $this->db->select('id,title');
        $this->db->from('tat_settings');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->title;
        } else {
            return 0;
        }


    }

    public function add($img_file)
    {
        $data['name'] = $this->input->post('name');
        $data['id_card'] = $this->input->post('id_card');
        $data['talb_date'] = $this->input->post('talb_date');
        $data['talb_num'] = $this->get_last_id();
        $data['tato3_no3'] = $this->input->post('tato3_no3');
        // $data['center_id_fk']=$this->input->post('center_id_fk');
        // $data['district_id_fk']=$this->input->post('district_id_fk');
        //	$data['city_name']=$this->input->post('city_name');
        $data['city_id_fk'] = $this->input->post('center_id_fk');
        //$data['hai_name']=$this->input->post('hai_name');
        $data['hai_id_fk'] = $this->input->post('district_id_fk');

        $data['mobile'] = $this->input->post('mobile');
        $data['email'] = $this->input->post('email');
        $data['dayes'] = serialize($this->input->post('dayes'));
        $data['period'] = serialize($this->input->post('period'));
        $data['another_charity'] = $this->input->post('another_charity');
        $data['charity'] = $this->input->post('charity');
        $data['suspend'] = 1;
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_s'] = time();
        $data['web_registration'] = 1;
        $password = $this->input->post('mobile', true);
        $password = sha1(md5($password));
        $data['password'] = $password;
        $data['user_name'] = $this->input->post('id_card');
        if (isset($_SESSION['user_id'])) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        }
        $data['f2a_talab'] = $this->input->post('esnad_to');
        if ($data['f2a_talab'] == 1) {
            // $data['skills']		   = $this->input->post('skills');
            // $data['nationality_name']		   = $this->input->post('nationality_name');
            // $data['nationality_fk']		   = $this->input->post('nationality_fk');
            // $data['social_status_name']=$this->input->post('social_status_name');
            // $data['social_status_id_fk']=$this->input->post('social_status_id_fk');
            // $data['specialize_name'] 		   = $this->input->post('specialize_name');
            // $data['specialize_fk'] 			   = $this->input->post('specialize_fk_input');
            // $data['work_id_fk'] 		 	   = $this->input->post('work_id_fk');
            // $data['job_name'] 			   = $this->input->post('job_name');
            // $data['job_fk'] 		 	   = $this->input->post('job_fk');
            // $data['job_place'] 		 	   = $this->input->post('job_place');

        } elseif ($data['f2a_talab'] == 2) {
            $data['logo_monzma'] = $img_file;
            $data['no3_monzma'] = $this->input->post('no3_monzma');

            // $data['work_type']= $this->input->post('work_type');

        }
        $this->db->insert('tat_motat3en', $data);


        if ($data['f2a_talab'] == 2) {

            $work_type = $this->input->post('work_type');
            if ($work_type != null) {
                for ($i = 0; $i < sizeof($work_type); $i++) {
                    $dataw['tat_id_fk'] = $this->get_last_id();
                    $dataw['setting_id_fk'] = $work_type[$i];
                    	$dataw['setting_code_fk'] = $this->get_code_reason($work_type[$i]);
                    $dataw['title'] = $this->get_title_reason($work_type[$i]);
                    $dataw['type'] = 3;
                    $this->db->insert('tat_details', $dataw);
                }
            }
            // $data['work_type']= $this->input->post('work_type');

        }
        $skills = $this->input->post('skills');
        if ($skills != null) {
            for ($i = 0; $i < sizeof($skills); $i++) {
                $data_s['tat_id_fk'] = $this->get_last_id();
                $data_s['setting_id_fk'] = $skills[$i];
                $data_s['setting_code_fk'] = $this->get_code_reason($skills[$i]);
                $data_s['title'] = $this->get_title_reason($skills[$i]);
                $data_s['type'] = 4;
                $this->db->insert('tat_details', $data_s);
            }
        }
        $interest = $this->input->post('interest');
        if ($interest != null) {
            for ($i = 0; $i < sizeof($interest); $i++) {
                $data_i['tat_id_fk'] = $this->get_last_id();
                $data_i['setting_id_fk'] = $interest[$i];
                $data_i['setting_code_fk'] = $this->get_code_reason($interest[$i]);
                $data_i['title'] = $this->get_title_reason($interest[$i]);
                $data_i['type'] = 5;
                $this->db->insert('tat_details', $data_i);
            }
        }

        $x = $this->input->post('fields');
        //	echo '<pre>'; print_r($x);
        if ($x != null) {

            for ($i = 0; $i < sizeof($x); $i++) {
                $dataw['tat_id_fk'] = $this->get_last_id();

                $dataw['setting_id_fk'] = $x[$i];
                $dataw['title'] = $this->get_title_mgalat($x[$i]);
                $dataw['type'] = 1;
                $this->db->insert('tat_details', $dataw);
            }
        }
        $y = $this->input->post('reasons');
        if ($y != null) {

            for ($ii = 0; $ii < sizeof($y); $ii++) {
                $dataw['tat_id_fk'] = $this->get_last_id();
                $dataw['setting_id_fk'] = $y[$ii];
                $dataw['title'] = $this->get_title_reason($y[$ii]);
                $dataw['type'] = 2;
                $this->db->insert('tat_details', $dataw);
            }
        }


    }

    public function get_code_reason($id)
    {
        $this->db->select('*');
        $this->db->from('tat_settings');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0]->code;
        } else {
            return 0;
        }
    }


    public function detelall_table($id)
    {
        $this->db->where('tat_id_fk', $id)->delete('tat_details');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tat_motat3en');
        $this->history($id, 'حذف طلب تطوع');
    }

    public function select_volunteers($suspend = false)
    {
        if ($suspend != false) {
            $this->db->where('suspend', $suspend);
        }
        return $this->db->get('tat_motat3en')->result();
    }

    // public function select_settings($type)
    // {
    // 	return $this->db->where('type',$type)->get('volunteer_setting')->result();
    // }
    //yara
    public function select_settings_tat_mgalat()
    {
        return $this->db->get('tat_mgalat')->result();
    }

    public function select_settings_tat_reason($from_code)
    {
        return $this->db->where('from_code', $from_code)->get('tat_settings')->result();
    }

//ayar
    public function getRecordById($where)
    {
        return $this->db->where($where)->get('tat_motat3en')->row_array();
    }

    public function get_last_file_num()
    {
        $this->db->select('file_num');
        $this->db->order_by('file_num', 'desc');
        $query = $this->db->get('tat_motat3en');
        if ($query->num_rows() > 0) {
            return $query->row()->file_num;
        } else {
            return 1;
        }

    }

    public function confirm($id, $status)
    {
        if ($status == 4) {
            $data['file_num'] = $this->get_last_file_num() + 1;
        }
        $data['suspend'] = $status;
        $data['suspend_reason_id'] = $this->input->post('reason_id_fk');
        $data['suspend_reason_name'] = $this->input->post('reason_name');
        $data['suspend_date'] = strtotime(date("Y-m-d"));
        if (isset($_SESSION['user_id'])) {
            $data['suspend_publisher'] = $_SESSION['user_id'];
            $data['suspend_publisher_name'] = $this->getUserName($_SESSION['user_id']);
        }
        $this->db->where('id', $id);
        $this->db->update('tat_motat3en', $data);
        $this->history($id, 'اعتماد طلب تطوع');
    }

    public function getRecordreasonById($where)
    {
        $q = $this->db->where($where)->where('type', 2)->get('tat_details')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->setting_id_fk);
            }
            return $data;
        }
    }

    public function getRecordreasonById_type($where)
    {
        $q = $this->db->where($where)->where('type', 3)->get('tat_details')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->setting_id_fk);
            }
            return $data;
        }
    }

    public function getRecordfieldById($where)
    {
        $q = $this->db->where($where)->where('type', 1)->get('tat_details')->result();
        if (!empty($q)) {
            $data = array();
            foreach ($q as $row) {
                array_push($data, $row->setting_id_fk);
            }
            return $data;
        }
    }

    public function select_search_key($table, $search_key, $search_key_value)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key, $search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_all()
    {
        $this->db->where('type', 17);
        $this->db->order_by('in_order');
        $query = $this->db->get('employees_settings');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;


                $i++;

            }
            return $data;
        }
    }

    // morfq
    public function insert_attach($id, $images)
    {
        if (isset($images) && !empty($images)) {
            $count = count($images);
            for ($x = 0; $x < $count; $x++) {

                $data['title'] = $this->input->post('title');
                $data['file'] = $images[$x];
                $data['tat_id_fk'] = $id;
                $data['date'] = strtotime(date("Y-m-d"));
                $data['date_ar'] = date("Y-m-d");
                if ($_SESSION['role_id_fk'] == 1) {

                    $data['publisher'] = $_SESSION['user_id'];
                    $data['publisher_name'] = $_SESSION['user_name'];;
                } else if ($_SESSION['role_id_fk'] == 2) {
                    $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
                    $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

                } else if ($_SESSION['role_id_fk'] == 3) {
                    $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
                    $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
                } else if ($_SESSION['role_id_fk'] == 4) {
                    $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
                    $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
                }

                $this->db->insert('tat_morfq', $data);
                $this->history($id, 'اضافه مرفقات طلب تطوع');
            }
        }

    }

    public function delete_morfq($id, $wared_id)
    {

        $this->db->where('id', $id)->delete('tat_morfq');
        $this->history($wared_id, 'حذف مرفقات طلب تطوع');

    }

    public function get_morfq_by_id($id)
    {
        $this->db->where('tat_id_fk', $id);
        $query = $this->db->get('tat_morfq');

        return $query->result();

    }

    public function history($id, $process)
    {

        $data['tat_id_fk'] = $id;
        $data['process'] = $process;
        $data['date'] = date("Y-m-d");
        if ($_SESSION['role_id_fk'] == 1) {

            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");

        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }

        $this->db->insert('tat_history', $data);

    }


}

/* End of file Volunteers_model.php */
/* Location: ./application/models/Volunteers/Volunteers_model.php */