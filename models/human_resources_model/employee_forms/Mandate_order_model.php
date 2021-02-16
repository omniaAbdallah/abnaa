<?php

class Mandate_order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*10-11-20-om*/
    function get_value_badel()
    {
        $emp_id_fk = $this->input->post('emp_id_fk');
        $cat_manager_id_fk = $this->input->post('cat_manager_id_fk');
        $entdab_type = $this->input->post('entdab_type');
        $bdal_count_method = $this->input->post('bdal_count_method');
        if ($bdal_count_method == 1) {
            $return_filed = 'badal_value_part_day';
        } elseif ($bdal_count_method == 2) {
            $return_filed = 'badal_value_full_day';
        }
        if ($entdab_type == 1) {
            $con_arr['title'] = "badel_entab_in";
        } elseif ($entdab_type == 2) {
            $con_arr['title'] = 'badel_entab_out';
        }
        $con_arr['mostwa_wazefy'] = $cat_manager_id_fk;
        $query = $this->db->where($con_arr)->get('hr_entdab_sysat_setting')->row_array();
        if (!empty($query)) {
            return $query[$return_filed];
        } else {
            return 0;
        }
    }

    public function get_emp_data($emp_id)
    {

        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id', $emp_id);
        $query = $this->db->get();
        return $query->row();
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

    public function select_depart()
    {
        $this->db->select('*');
        $this->db->where('from_id_fk!=', 0);
        $this->db->from('department_jobs');
        $query = $this->db->get();
        return $query->result();
    }

    /* public function get_last()
     {
         $this->db->order_by('id_setting','desc');
         $this->db->select('id_setting');
         $this->db->where('type',9);
         $this->db->from('hr_forms_settings');
         $query = $this->db->get();
         return $query->row()->id_setting;
     }*/
    public function get_last()
    {
        $this->db->order_by('id_setting', 'desc');
        $this->db->select('id_setting');
        $this->db->where('type', 9);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id_setting;
        } else {
            return 0;
        }
    }

    public function insert_record($valu)
    {
        $data['title_setting'] = $valu;
        $data['type'] = 9;
        $data['have_branch'] = 0;
        $this->db->insert('hr_forms_settings', $data);
    }

    

    function current_date_mosayer($date = false, $var)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $date = date('Y') . '-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()["$var"];
    }

    public function get_transformation_setting($level)
    {
        $q = $this->db->where('level', $level)->where('tbl', 'mandate')->get('hr_all_transformation_setting')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
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

    public function insert_order()
    {
        $data = $this->get_data();
        $last_id = $this->get_last_id();
        if (isset($last_id) && !empty($last_id)) {
            $rkm_talab = $last_id + 1;
        } else {
            $rkm_talab = 1;
        }
        $data['rkm_talab'] = $rkm_talab;
        $data['emp_user_id'] = $_SESSION['user_id'];
        $data['current_from_user_id'] = $_SESSION['user_id'];
        $data['current_from_user_name'] = $data['publisher_name'];
        $data['current_to_user_id'] = $this->get_id('users', 'emp_code', $data['emp_id_fk'], 'user_id');
        $data['current_to_user_name'] = $this->get_id('users', 'emp_code', $data['emp_id_fk'], 'emp_name');
        $data['level'] = 1;
        $data['talab_in_fk'] = $this->get_transformation_setting($data['level'])->id;
        $data['talab_in_title'] = $this->get_transformation_setting($data['level'])->title;
        $this->db->insert('hr_entdab', $data);
        // return $data;
    }

    public function get_last_id()
    {
        $this->db->select_max('id');
//        $this->db->order_by('id','desc');
        $query = $this->db->get('hr_entdab');
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return 0;
        }
    }

    public function get_from_hr_entdab()
    {
        $this->db->order_by('emp_id_fk', 'asc');
        $query = $this->db->get('hr_entdab');
        $data = array();
        $x = 0;
        foreach ($query->result() as $row) {
            $data[$x] = $row;
            $data[$x]->name = $this->get_name($row->emp_id_fk);
            $data[$x]->destination = $this->get_dest($row->mandate_direction);
            $data[$x]->times = $this->get_orders($row->emp_id_fk);
            $data[$x]->emp_code = $this->get_emp_code($row->emp_id_fk);
            $x++;
        }
        return $data;
    }

    public function get_name($emp)
    {
        $this->db->where('id', $emp);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->employee;
        } else {
            return 0;
        }
    }

    public function get_dest($dest)
    {
        $this->db->where('id_setting', $dest);
        $query = $this->db->get('hr_forms_settings');
        if ($query->num_rows() > 0) {
            return $query->row()->title_setting;
        } else {
            return 0;
        }
    }

    /*11-10-20-om*/
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('hr_entdab');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->times = $this->get_orders($row->emp_id_fk);
                $data[$x]->emp_code = $this->get_emp_code($row->emp_id_fk);
                $data[$x]->emp_name = $this->get_id('employees', 'id', $row->emp_id_fk, 'employee');
                $data[$x]->job_title = $this->get_id('employees', 'id', $row->emp_id_fk, 'mosma_wazefy_n');
                $data[$x]->qsm_name = $this->get_id('employees', 'id', $row->emp_id_fk, 'qsm_n');
                $data[$x]->edara_name = $this->get_id('employees', 'id', $row->emp_id_fk, 'edara_n');

                /*$data[$x]->job_title = $this->get_id('all_defined_setting', 'defined_id', $row->job_title_id_fk, 'defined_title');
                $data[$x]->qsm_name = $this->get_id('department_jobs', 'id', $row->qsm_id_fk, 'name');
                $data[$x]->edara_name = $this->get_id('department_jobs', 'id', $row->edara_id_fk, 'name');*/
                $data[$x]->personal_emp_img = $this->get_id('employees', 'id', $row->emp_id_fk, 'personal_photo');
                return $data[0];
            }
        } else {
            return 0;
        }
    }

    function update_seen_entdab()
    {
        $this->db->where(array('seen' => 0, 'current_to_user_id' => $_SESSION['user_id']));
        $this->db->update('hr_entdab', array('seen' => 1));

    }

    public function get_id($table, $where, $id, $select)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->row_array();
        return $arr[$select];
    }

    public function get_emp_code($emp)
    {
        $this->db->where('id', $emp);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row()->emp_code;
        } else {
            return 0;
        }
    }

    public function get_orders($id)
    {
        $this->db->where('emp_id_fk', $id);
        $query = $this->db->get('hr_entdab');
        return $query->num_rows();
    }

    public function edit_order($id)
    {
        $data = $this->get_data();
        $this->db->where('id', $id);
        $this->db->update('hr_entdab', $data);
    }

    public function delete_mandate_order($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_entdab');
    }
    /***************************************************/
    // public function get_all_emp()
    // {
    //     $q = $this->db->where("employee_type", 1)->get('employees')->result();
    //     if (!empty($q)) {
    //         foreach ($q as $key => $row) {
    //             $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
    //             $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
    //             $q[$key]->job_title = $this->get_job_title($row->degree_id);
    //             $q[$key]->direct_manager_id_fk= $this->get_direct_manager_name_by_emp_id($row->id);
    //             $q[$key]->direct_manager_job_title_fk= $this->get_job_title($row->id);
    //             $q[$key]->times= $this->get_by_id($row->id);
    //         }
    //         return $q;
    //     }
    // }
    public function get_all_emp()
    {
        $this->db->select('*');
        $this->db->where("employee_type", 1);
        $this->db->from('employees');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 1;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->times = $this->get_by_id($row->id);
                $x++;
            }
            return $data;
        }
        return false;
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

    public function get_direct_manager_name_by_emp_id($id)
    {
        $this->db->select('employees.id,employees.manger,manager_table.id,manager_table.employee as manager_name');
        $this->db->from('employees');
        $this->db->where('employees.id', $id);
        $this->db->join('employees as manager_table', 'manager_table.id=employees.manger', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->manager_name;
        } else {
            return false;
        }
    }

    public function select_search($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function add_geha_type()
    {
        $data['name'] = $this->input->post('geha_type');
        $this->db->insert('hr_mandate_gehat', $data);
    }

    public function update_geha_type($id)
    {
        $data['name'] = $this->input->post('geha_name');
        $this->db->where('id', $id)->update('hr_mandate_gehat', $data);
    }

    public function getById_geha_type($id)
    {
        $this->db->select('*');
        $this->db->from('hr_mandate_gehat');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function delete_geha_type($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_mandate_gehat");
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

    public function add_mostlm($geha_id)
    {
        $data['geha_id_fk'] = $geha_id;
        $data['safms2ol_name'] = $this->input->post('safms2ol_name');
        $data['safms2ol_fk'] = $this->input->post('safms2ol_fk');
        $data['name'] = $this->input->post('mostlm_name');
        $this->db->insert('hr_mandate_gehat_ms2olen', $data);
    }

    public function getById_mostlm($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('hr_mandate_gehat_ms2olen');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function delete_mostlm($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_mandate_gehat_ms2olen");
    }

    public function update_mostlm($geha_id, $id)
    {
        //$data['geha_id_fk']=$geha_id;
        $data['safms2ol_name'] = $this->input->post('safms2ol_name');
        $data['safms2ol_fk'] = $this->input->post('safms2ol_fk');
        $data['name'] = $this->input->post('mostlm_name');
        $this->db->where('id', $id);
        $this->db->update('hr_mandate_gehat_ms2olen', $data);
    }

    public function add_setting($type, $type_name)
    {
        $data['title_setting'] = $this->input->post('value');
        $data['type'] = $type;
        $data['form_id'] = 159;
        $data['type_name'] = $type_name;
        $id = $this->input->post('row_id');
        if (!empty($id)) {
            $data_update['title_setting'] = $this->input->post('value');
            $this->db->where('id_setting', $id);
            $this->db->update('employees_settings', $data_update);
        } else {
            $this->db->insert('employees_settings', $data);
        }
    }

    public function get_setting($typee, $type)
    {
        $this->db->where('type', $typee)->where('form_id!=', 0);
        $query = $this->db->get('employees_settings');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_setting($id)
    {
        $this->db->where('id_setting', $id);
        $this->db->delete('employees_settings');
    }

    public function get_setting_by_id($id)
    {
        $this->db->where('id_setting', $id);
        $query = $this->db->get('employees_settings');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    //////////////////////////////
      //yara26-10-2020
      //old_func
      public function get_data()
    {
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['direct_manager_id_fk'] = $this->input->post('direct_manager_id_fk');
        $data['job_title_id_fk'] = $this->input->post('job_title');
        //========================
        $data['mandate_type_fk'] = $this->input->post('mandate_type_fk');
        //yara19-11
         $data['makan_id_fk']=$this->input->post('makan_id_fk');
          //yara19-11
        $data['mandate_distance'] = $this->input->post('mandate_distance');
        $data['mandate_purpose'] = $this->input->post('mandate_purpose');
        //yaraaa
        $data['mandate_purpose_id_fk'] = $this->input->post('mandate_purpose_id_fk');
        $data['geha_mandate_id_fk'] = $this->input->post('geha_mandate_id_fk');
        $data['geha_mandate_name'] = $this->input->post('geha_mandate_name');
        $data['mandate_direction'] = $this->input->post('geha_mandate_name');
        $data['mandate_id_fk'] = $this->input->post('mandate_id_fk');
        $data['mandate_name'] = $this->input->post('mandate_name');
        //yaraaa
        $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');
        $data['num_days'] = $this->input->post('num_days');
        $data['bdal_count_method'] = $this->input->post('bdal_count_method');
        $data['bdal_value'] = $this->input->post('bdal_value');
        $data['bdal_total'] = $this->input->post('bdal_total');
        $data['date'] = $this->input->post('date');
        $data['date_s'] = strtotime($data['date']);
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $data['job_title_id_fk'] = $this->get_id('employees', 'id', $data['emp_id_fk'], 'degree_id');
        /*10-11-20-om*/
        $data['for_month'] = $this->current_date_mosayer($data['from_date'], 'month');
        $data['for_year'] = $this->current_date_mosayer($data['from_date'], 'year');

        return $data;
    }
    //new_func
      public function get_all_setting(){
        $query = $this->db->get('hr_entdab_amaken');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    public function get_one_setting($id)
    {
        $this->db->select('*');
        $this->db->from('hr_entdab_amaken');
        $this->db->where("id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data =$query->row();
            return $data;
        }
    }
    public function insert_stetting($id){
        $data['mkan'] = $this->input->post('mkan');
        $data['distance'] = $this->input->post('distance');
      
     
         if ($id!=0){
          
             $this->db->where('id',$id);
             $this->db->update('hr_entdab_amaken', $data);
         } else{
             $this->db->insert('hr_entdab_amaken', $data);
         }
    }
    public function delete_setting_amaken($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_entdab_amaken');
    }

}