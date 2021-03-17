<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talb_egar_model extends CI_Model
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

    public function select_last_talab_rkm()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_egar");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->rkm_talab + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_egar");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id + 1;
            }
            return $data;
        } else {
            return 1;
        }
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_egar");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function select_family_table()
    {
        $this->db->select('basic.*,
      basic.mother_national_num  as  faher_name ,
         father.f_national_id     as  father_national,
          father.full_name as father_full_name,
           mother.full_name     as  mother_name,
           mother.mother_national_card_new     as  mother_new_card,
            files_status_setting.title as process_title ,
              files_status_setting.color as files_status_color ,
            mother.categoriey_m as categorey');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.final_suspend', 4);
        $this->db->where('basic.deleted', 0);
        $this->db->where('basic.file_status', 1);
        $this->db->order_by('file_num', "ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getFileNUmData($file_num)
    {
        $this->db->select('basic.*,
      basic.mother_national_num  as  faher_name ,
      houses.hai_name as  hai_name,
      houses.h_village_id_fk as  hai_id,
         father.f_national_id     as  father_national,
          father.full_name as father_full_name,
           mother.full_name     as  mother_name,
           mother.mother_national_card_new     as  mother_new_card,
            files_status_setting.title as process_title ,
              files_status_setting.color as files_status_color ,
            mother.categoriey_m as categorey');
        $this->db->from('basic');
        $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('houses', 'houses.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num', "left");
        $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status', "left");
        $this->db->where('basic.file_num', $file_num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getFamilyNum($mother_num)
    {
        $this->db->select('*');
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk", $mother_num);
        //  $this->db->where_in("persons_status",array(1,2));
        $this->db->where("persons_status", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_mother_status($mother_num)
    {
        $this->db->select('*');
        $this->db->from("mother");
        $this->db->where("mother_national_num_fk", $mother_num);
        $this->db->where("halt_elmostafid_m", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function insert()
    {

        $last_last_letter_rkm = $this->select_last_talab_rkm();

        $data['rkm_talab'] = $last_last_letter_rkm;
        //   $data['letter_rkm'] =$this->input->post('letter_rkm');
        $data['talab_date'] = strtotime($this->input->post('talab_date'));
        $data['talab_date_ar'] = $this->input->post('talab_date');
        $data['talab_time'] = date('H:i:s a');
        $data['emp_add_id'] = $_SESSION['user_id'];
        $data['emp_add_code'] = $_SESSION['emp_code'];
        $data['emp_add_n'] = $this->getUserName($_SESSION['user_id']);

        $data['file_num'] = $this->input->post('file_num');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_name'] = $this->input->post('osra_name');
        $data['fe2a_n'] = $this->input->post('fe2a_n');
        $data['hai_id'] = $this->input->post('hai_id');
        $data['hai_name'] = $this->input->post('hai_name');
        $data['tasgel_date'] = $this->input->post('tasgel_date');
        $data['num_afrad'] = $this->input->post('num_afrad');
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['mokadem_name'] = $this->input->post('mokadem_name');

        $this->db->insert("osr_talbat_egar", $data);

    }

    public function update($id)
    {
        $data['file_num'] = $this->input->post('file_num');
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_name'] = $this->input->post('osra_name');
        $data['fe2a_n'] = $this->input->post('fe2a_n');
        $data['hai_id'] = $this->input->post('hai_id');
        $data['hai_name'] = $this->input->post('hai_name');
        $data['tasgel_date'] = $this->input->post('tasgel_date');
        $data['num_afrad'] = $this->input->post('num_afrad');
        $data['contact_mob'] = $this->input->post('contact_mob');
        $data['mokadem_name'] = $this->input->post('mokadem_name');
        $this->db->where("id", $id);
        $this->db->update("osr_talbat_egar", $data);

    }


    public function Delete($rkm)
    {

        $this->db->where("id", $rkm);
        $this->db->delete("osr_talbat_egar");

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


    public function getAllDetails($id)
    {
        $this->db->select('*');
        $this->db->from("osr_talbat_egar");
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

    public function family_member($file_num)
    {
        $q = $this->db->select('mother.mother_national_num_fk,mother.full_name')->where('basic.file_num', $file_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')->get('mother')->row();
        if (!empty($q)) {
            $q->sons = $this->db->select('id,member_full_name,member_relationship,member_card_num,member_gender')->where('mother_national_num_fk', $q->mother_national_num_fk)
                ->get('f_members')->result();
            if (!empty($q->sons)) {
                foreach ($q->sons as $key => $item) {
                    $q->sons[$key]->member_relationship_title = $this->get_by('family_setting', array('id_setting' => $item->member_relationship), 'title_setting');
                }
            }
            return $q;
        }
        return false;
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

    /////////////////////////new_funcc/////////////////////////////////////////////////////////

    public function insert_attach($id, $images)
    {
        if (isset($images) && !empty($images)) {
            $count = count($images);
            for ($x = 0; $x < $count; $x++) {
                $data['title'] = $this->input->post('title');
                $data['file'] = $images[$x];
                $data['talab_rkm_fk'] = $id;
                $data['date'] = strtotime(date("Y-m-d"));
                $data['date_ar'] = date("Y-m-d");
                $data['time'] = date('h:i:s a');
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
                $this->db->insert('osr_talbat_egar_files', $data);
            }
        }
    }

    public function delete_morfq($id)
    {
        $this->db->where('id', $id)->delete('osr_talbat_egar_files');
    }

    public function get_morfq_by_id($id)
    {
        $this->db->where('talab_rkm_fk', $id);
        $query = $this->db->get('osr_talbat_egar_files');
        return $query->result();
    }

    public function get_images($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('osr_talbat_egar_files');
        if ($query->num_rows() > 0) {
            return $query->result();
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
/*18-1-21-om*/
    public function get_all_emps_egraat($job_title_code_fk)
    {
        $this->db->select('hr_egraat_emp_setting.*');
        $this->db->from('hr_egraat_emp_setting');
        $this->db->where('job_title_code_fk', $job_title_code_fk);
        $this->db->where('person_suspend', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_emp($emp_id, $data_need)
    {
        $this->db->where('id', $emp_id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->$data_need;
        } else {
            return false;
        }
    }

    public function get_emp_user_id($emp_id, $data_need)
    {
        $this->db->where('emp_code', $emp_id);
        $this->db->where('role_id_fk', 3);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row()->$data_need;
        } else {
            return false;
        }
    }

    public function add_emp_transform($post)
    {
        $parmas['talab_id_fk'] = $post['talab_id'];

        $parmas['talab_rkm_fk'] = $post['rkm_talab'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];

        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
        $parmas['talab_in_title'] = 'المدير المباشر';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');

        $parmas['ttime'] = date('h:i A');

       /* if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }*/
        $parmas['process_title'] = 'الإطلاع وإبداء الرأي';
        $this->db->insert('osr_talbat_egar_history', $parmas);


  /*      if($post['option_choosed'] == 'accept'){
            $update['suspend'] = 1;
        }elseif($post['option_choosed'] == 'refuse'){
            $update['suspend'] = 2;
        }


        $update['action_mowazf_mokhtas'] = $post['option_choosed'];
        $update['action_mowazf_mokhtas_date'] = date('Y-m-d');

   */
        $update['suspend'] = 1;
        $update['level'] = 1;
        $update['seen'] =0;
        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');
        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_egar', $update);
    }
    public function add_emp_action($post)
    {
        $parmas['talab_id_fk'] = $post['talab_id'];

        $parmas['talab_rkm_fk'] = $post['rkm_talab'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];

        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
        $parmas['talab_in_title'] = 'الموظف المختص ';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');

        $parmas['ttime'] = date('h:i A');

        if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }
        $parmas['process_title'] = 'الإطلاع وإبداء الرأي';
        $this->db->insert('osr_talbat_egar_history', $parmas);


        if($post['option_choosed'] == 'accept'){
            $update['suspend'] = 1;
        }elseif($post['option_choosed'] == 'refuse'){
            $update['suspend'] = 2;
        }


        $update['action_mowazf_mokhtas'] = $post['option_choosed'];
        $update['action_mowazf_mokhtas_date'] = date('Y-m-d');


        $update['level'] = 2;
        $update['seen'] = 0;

        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');

        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];

        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_egar', $update);
    }

    public function add_action($post)
    {
        $parmas['talab_id_fk'] = $post['talab_id'];

        $parmas['talab_rkm_fk'] = $post['rkm_talab'];
        $parmas['from_user'] = $post['current_from_user_id'];
        $parmas['from_user_n'] = $post['current_from_user_name'];

        $parmas['option_choosed'] = $post['option_choosed'];
        $parmas['reason_action'] = $post['notes'];
        $parmas['to_user'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');;
        $parmas['to_user_n'] = $this->get_emp($post['to_person_id'], 'employee');
        $parmas['talab_in_title'] = 'المدير ادارة الرعاية';
        $parmas['date'] = strtotime(date('Y-m-d'));
        $parmas['date_ar'] = date('Y-m-d');

        $parmas['ttime'] = date('h:i A');

        if ($post['option_choosed'] == 'accept') {
            $parmas['action_title'] = 'موافق';
        } elseif ($post['option_choosed'] == 'refuse') {
            $parmas['action_title'] = 'غير موافق';
        }
        $parmas['process_title'] = 'الإفادة ومراجعة الطلب';
        $this->db->insert('osr_talbat_egar_history', $parmas);


        if ($post['option_choosed'] == 'accept') {
            $update['level'] = 3;
            $update['suspend'] = 4;

        } elseif ($post['option_choosed'] == 'refuse') {
            $update['level'] = 0;
            $update['suspend'] = 2;
        }

        $update['action_moder_edara'] = $post['option_choosed'];
        $update['action_moder_edara_date'] = date('Y-m-d');
        $update['seen'] = 0;
        $update['current_to_user_id'] = $this->get_emp_user_id($post['to_person_id'], 'user_id');
        $update['current_to_user_name'] = $this->get_emp($post['to_person_id'], 'employee');

        $update['current_from_user_id'] = $post['current_from_user_id'];
        $update['current_from_user_name'] = $post['current_from_user_name'];
        $this->db->where('id', $post['talab_id']);
        $this->db->update('osr_talbat_egar', $update);
        /*echo '<pre>';
        print_r($_POST);
        print_r($this->db->last_query());
        die;*/
    }

    public function get_all_history($talab_id_fk = null)
    {
        $this->db->select('osr_talbat_egar_history.*');
        $this->db->from('osr_talbat_egar_history');
        $this->db->order_by('id', 'ASC');
        if ($talab_id_fk != null) {
            $this->db->where('talab_id_fk', $talab_id_fk);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }
    public function get_transformed()
    {
        $this->db->select('osr_talbat_egar.*');
        $this->db->from('osr_talbat_egar');

        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }
    function update_seen_taleb_service()
    {
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->update('osr_talbat_egar', array('seen' => 1));
    }


}