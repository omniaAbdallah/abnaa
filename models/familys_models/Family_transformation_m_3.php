<?php


class Family_transformation_m extends CI_Model
{
    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return strip_tags($post_value);
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
                return $query->row_array()[$select];
            } else {
                if ($select == 1) {
                    return $query->row_array();
                } else {
                    return $query->result_array();
                }
            }
        } else {
            return false;
        }
    }

    function basic_data($national_num)
    {
        $q = $this->db->select('basic.file_num,basic.id as order_num,basic.family_cat_name as osara_fe2a,basic.final_suspend,
        mother.full_name as mother_name ,mother.categoriey_m,mother.mother_national_num_fk,mother.id,mother.m_mob,mother.m_marital_status_id_fk,
        father.full_name as father_name,father.f_national_id')
            ->from('mother')->where('mother.mother_national_num_fk', $national_num)
            ->join('basic', 'basic.mother_national_num = mother.mother_national_num_fk')
            ->join('father', 'father.mother_national_num_fk = mother.mother_national_num_fk')
            ->get()->row_array();
        return $q;
    }
    public function select_process_procedures()
    {
        $this->db->select('*');
        $this->db->from("process_procedures");
        //   $this->db->where($Conditions_arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function get_all_egraat($code_arr = false)
    {
        $this->db->select('hr_egraat_setting.*');
        $this->db->from('hr_egraat_setting');
        if (!empty($code_arr)) {
            $this->db->where_in('code', $code_arr);
        }
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();

    }

    public function get_all_emps_egraat($job_title_code_fk)
    {
        $this->db->select('hr_egraat_emp_setting.*');
        $this->db->from('hr_egraat_emp_setting');
        $this->db->where_in('job_title_code_fk', $job_title_code_fk);
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
            return 0;
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




    public function insert_operation($process, $file_id)
    {  //all_actions_in_family_files
        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');;
        $emp_name = $this->get_emp($_POST['user_to'], 'employee');
        $role_id_fk = $this->get_emp_user_id($_POST['user_to'], 'role_id_fk');

        $data['mother_national_num_fk'] = $file_id;
        if ($process == 4 || $process == 6) {
            $data['family_file_from'] = $_SESSION['user_id'];
            $data['family_file_to'] = $_SESSION['user_id'];
        } else {
            $data['family_file_from'] = $_SESSION['role_id_fk'];
            $data['family_file_to'] = $role_id_fk;
        }
        $data['from_user'] = $_SESSION['user_id'];
        $data['to_user'] = $user_id;
        $data['process'] = $process;
        $data['reason'] = $this->input->post('reason');
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_name'];
        $this->db->insert('operation_table', $data);
    }
    public function insert_tran_family($process, $file_id)
    { //  user_to
        $user_id = $this->get_emp_user_id($_POST['user_to'], 'user_id');;
        $system_structure_id_fk = $this->get_emp_user_id($_POST['user_to'], 'system_structure_id_fk');
        $role_id_fk = $this->get_emp_user_id($_POST['user_to'], 'role_id_fk');

        $data['family_file'] = $file_id;
        $data['process'] = 1;
        $data['transformation_type'] = $process;
        $data['transformation_note'] = $this->input->post('reason');
        $data['from_id'] = $this->chek_Null($_SESSION["user_id"]);
        $data['to_id'] = $this->chek_Null($user_id);
        $data['role_id_fk_from'] = $this->chek_Null($_SESSION["role_id_fk"]);
        $data['role_id_fk_to'] = $this->chek_Null($role_id_fk);
        $data['system_structure_id_fk_from'] = $this->chek_Null($_SESSION["system_structure_id_fk"]);
        $data['system_structure_id_fk_to'] = $this->chek_Null($system_structure_id_fk);
        $data['process_procedure_id_fk'] = $this->chek_Null($this->input->post('process_procedure_id_fk'));
        $data['date'] = time();
        $data['date_s'] = time();
        $data['seen'] = 1;
        $this->db->insert('transformation_process', $data);
    }
    public function update_file_state($file_id, $value)
    {
        $data["suspend"] = $value;
        $data['final_suspend'] = $this->get_final_suspend($file_id);
        if ($data['final_suspend'] == 4) {
            $data["final_suspend"] = 4;
        } else {
            $data["final_suspend"] = 0;
        }
        $this->db->where("mother_national_num", $file_id);
        $this->db->update("basic", $data);
    }
    public function get_final_suspend($mother_national_num_fk)
    {
        $h = $this->db->get_where("basic", array('mother_national_num' => $mother_national_num_fk));
        $arr = $h->row_array();
        return $arr['final_suspend'];
    }

    public function select_operation($id){
        $this->db->select('transformation_process.* ,
                          e_to.employee  as to_employee  , 
                          e_from.employee  as from_employee,
                          user_to_t.user_name  as to_user_name, 
                          user_from_t.user_name as from_user_name');
        $this->db->from('transformation_process');
        $this->db->join('users as user_to_t', 'user_to_t.user_id = transformation_process.to_id',"left");
        $this->db->join('users as user_from_t', 'user_from_t.user_id = transformation_process.from_id',"left");
        $this->db->join('employees as e_to', 'e_to.id = user_to_t.emp_code',"left");
        $this->db->join('employees as e_from', 'e_from.id = user_from_t.emp_code',"left");
        $this->db->where('family_file',$id);
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        /* if ($query->num_rows() > 0) {
             return $query->result();
         }*/
        if ($query->num_rows() > 0) {
            //  return $query->result();
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                if ($row->role_id_fk_to == 3){
                    $data[$i]->user_name_to = $this->get_user_name('employees',array('id'=>$row->to_id),'employee');
                } elseif ($row->role_id_fk_to == 1){
                    $data[$i]->user_name_to = $this->get_user_name('users',array('user_id'=>$row->to_id),'user_name');
                }
                if ($row->role_id_fk_from == 3){
                    $data[$i]->user_name_from = $this->get_user_name('employees',array('id'=>$row->from_id),'employee');
                } elseif ($row->role_id_fk_from == 1){
                    $data[$i]->user_name_from = $this->get_user_name('users',array('user_id'=>$row->from_id),'user_name');
                }

                $i++;
            }
            return $data;
        }
        return false;
    }

    public function select_my_messions($id)
    {
        $this->db->select('transformation_process.* ,users.emp_name as sender_name ,basic.level as real_level,process_procedures.title as mession_title 
         ,basic.full_name_order as mother_name , basic.current_to_user_id, basic.current_form_user_id, basic.current_form_user_name
         , basic.current_to_user_name, basic.mother_national_num');
        $this->db->from("transformation_process");
        $this->db->join('users', 'users.user_id = transformation_process.to_id', "left");
        $this->db->join('process_procedures', 'process_procedures.id = transformation_process.process_procedure_id_fk', "left");
        $this->db->join('basic', 'basic.mother_national_num = transformation_process.family_file', "left");
/*        $this->db->where("basic.current_to_user_id", $id);*/
    /*    $this->db->where("basic.level <=", 3);
        $this->db->where("basic.level !=", 0);*/
        $this->db->where("transformation_process.to_id", $id);
        $this->db->where("transformation_process.seen", 0);
        $this->db->group_by("transformation_process.family_file");
        $this->db->where_not_in("action", array(4, 2));
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function get_user_name($table,$arr,$return){
        $this->db->where($arr);
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->row()->$return;
        } else{
            return false;
        }
    }


    public function get_transformed()
    {
        $this->db->select('osr_talbat_main.*');
        $this->db->from('osr_talbat_main');
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $item) {
                $query[$key]->type_sevice_title = $this->get_by('osr_serv_khdmat_fe2a_setting', array('id' => $item->type_sevice), 'fe2a_title');
                $query[$key]->f2a_service_title = $this->get_by('osr_serv_khdmat_settings', array('id' => $item->f2a_service), 'khdma_name');
            }
            return $query;
        } else {
            return false;
        }
    }

    function update_seen_main_taleb()
    {
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->update('osr_talbat_main', array('seen' => 1));
    }
}