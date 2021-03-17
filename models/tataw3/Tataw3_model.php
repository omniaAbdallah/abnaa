<?php
/**
 * Created by PhpStorm.
 * User: nnnnn
 * Date: 29/07/2019
 * Time: 01:18 م
 */

class Tataw3_model extends CI_Model
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

    public function get_id($table, $where, $value, $select)
    {
        $query = $this->db->get_where($table, array($where => $value));
        if ($query->num_rows() > 0) {
            return $query->row()->$select;
        }
        return 0;
    }

    public function get_count($table, $where_arr)
    {
        $count = $this->db->where($where_arr)->count_all_results($table);
        return $count;
    }

   

  
    //yara
    public function update_account($id)
    {
        $data['user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['password'] =  sha1(md5($this->input->post('user_password')));

       // $data['suspend'] = $this->chek_Null($this->input->post('suspend'));
        $this->db->where('id', $id);
        $this->db->update('tat_motat3en', $data);
    }

    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('tat_motat3en');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }


    public function get_all_emp()
    {
        $this->db->order_by('emp_code');
        $this->db->where('employee_type', 1);
        $query = $this->db->get('employees');

        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->degree_id, 'defined_title');
                $data[$i]->edara_name = $this->get_id('department_jobs', 'id', $row->administration, 'name');
                $data[$i]->qsm_name = $this->get_id('department_jobs', 'id', $row->department, 'name');
                $i++;
            }
            return $data;
        }

    }

   


    public function check_login()
    {
        $memb_user_name = $this->input->post('memb_user_name');
        $pass = sha1(md5($this->input->post('memb_password')));
        $this->db->where('user_name', $memb_user_name);
         $this->db->where('password',$pass);
        // $this->db->where('suspend',1);
        $q = $this->db->get('tat_motat3en')->row_array();
        //$q = $this->db->where('memb_user_name', $memb_user_name)->get('tat_motat3en_accounts')->row_array();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_by_member_id($val, $field, $table)
    {
        $this->db->where($field, $val);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }
    public function getById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tat_motat3en');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->odwiat = $this->get_odwiat($row->id);
              //  $data[$i]->last_odwiat = $this->get_last_odwiat($row->id);


                $i++;
            }
            return $data;
            //  return $query->row();
        }
        return 0;
    }

    
/*****************************************************************************/



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

public function update($id, $img_file)
{
    $this->detelall_table($id);
     //yara
     $data['current_forsa_fk'] = $this->input->post('current_forsa_fk');
     //yara
    $data['name'] = $this->input->post('name');
    $data['id_card'] = $this->input->post('id_card');
    $data['talb_date'] = $this->input->post('talb_date');
    $data['tato3_no3'] = $this->input->post('tato3_no3');
    // $data['center_id_fk']=$this->input->post('center_id_fk');
    // $data['district_id_fk']=$this->input->post('district_id_fk');
    $data['city_name'] = $this->input->post('city_name');
    $data['city_id_fk'] = $this->input->post('city_id_fk');
    $data['hai_name'] = $this->input->post('hai_name');
    $data['hai_id_fk'] = $this->input->post('hai_id_fk');
    $data['mobile'] = $this->input->post('mobile');
    $data['email'] = $this->input->post('email');
    $data['dayes'] = serialize($this->input->post('dayes'));
    $data['period'] = serialize($this->input->post('period'));
    $data['another_charity'] = $this->input->post('another_charity');
    $data['charity'] = $this->input->post('charity');
//        $data['skills'] = $this->input->post('skills');
    //$data['f2a_talab']=$this->input->post('esnad_to');
    $data['study_code_fk'] = $this->input->post('study_code_fk');
    $skills = $this->input->post('skills');
    if ($skills != null) {
        for ($i = 0; $i < sizeof($skills); $i++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $skills[$i];
            $dataw['setting_code_fk'] = $this->get_code_reason($skills[$i]);
            $dataw['title'] = $this->get_title_reason($skills[$i]);
            $dataw['type'] = 4;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $interests = $this->input->post('interests');
    if ($interests != null) {
        for ($i = 0; $i < sizeof($interests); $i++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $interests[$i];
            $dataw['setting_code_fk'] = $this->get_code_reason($interests[$i]);
            $dataw['title'] = $this->get_title_reason($interests[$i]);
            $dataw['type'] = 5;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $data['nationality_name'] = $this->input->post('nationality_name');
    $data['nationality_fk'] = $this->input->post('nationality_fk');
    $data['social_status_name'] = $this->input->post('social_status_name');
    $data['social_status_id_fk'] = $this->input->post('social_status_id_fk');
    $data['specialize_name'] = $this->input->post('specialize_name');
    $data['specialize_fk'] = $this->input->post('specialize_fk_input');
    $data['work_id_fk'] = $this->input->post('work_id_fk');
    $data['job_name'] = $this->input->post('job_name');
    $data['job_fk'] = $this->input->post('job_fk');
    $data['job_place'] = $this->input->post('job_place');
    if (!empty($img_file)) {
        $data['logo_monzma'] = $img_file;
    }
    $data['no3_monzma'] = $this->input->post('no3_monzma');
    //$data['work_type']= $this->input->post('work_type');

    $work_type = $this->input->post('work_type');
    if ($work_type != null) {
        for ($i = 0; $i < sizeof($work_type); $i++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $work_type[$i];
            $dataw['title'] = $this->get_title_reason($work_type[$i]);
            $dataw['type'] = 3;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $skills = $this->input->post('skills');
    if ($skills != null) {
        for ($i = 0; $i < sizeof($skills); $i++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $skills[$i];
            $dataw['setting_code_fk'] = $this->get_code_reason($skills[$i]);
            $dataw['title'] = $this->get_title_reason($skills[$i]);
            $dataw['type'] = 4;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $interests = $this->input->post('interests');
    if ($interests != null) {
        for ($i = 0; $i < sizeof($interests); $i++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $interests[$i];
            $dataw['setting_code_fk'] = $this->get_code_reason($interests[$i]);
            $dataw['title'] = $this->get_title_reason($interests[$i]);
            $dataw['type'] = 5;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $x = $this->input->post('fields');
    if ($x != null) {
        for ($i = 0; $i < sizeof($x); $i++) {
            $dataw['tat_id_fk'] = $id;
            $dataw['setting_id_fk'] = $x[$i];
            $dataw['setting_code_fk'] = $this->get_code_reason($x[$i]);
            $dataw['title'] = $this->get_title_mgalat($x[$i]);
            $dataw['type'] = 1;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $y = $this->input->post('reasons');
    if ($y != null) {
        for ($ii = 0; $ii < sizeof($y); $ii++) {
            $dataw['tat_id_fk'] =  $id;
            $dataw['setting_id_fk'] = $y[$ii];
            $dataw['setting_code_fk'] = $this->get_code_reason($y[$ii]);
            $dataw['title'] = $this->get_title_reason($y[$ii]);
            $dataw['type'] = 2;
            $this->db->insert('tat_details', $dataw);
        }
    }
    $this->db->where('id', $id);
    $this->db->update('tat_motat3en', $data);
    $this->history($id, 'تعديل طلب تطوع');
}
public function detelall_table($id)
{
    $this->db->where('tat_id_fk', $id)->delete('tat_details');
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