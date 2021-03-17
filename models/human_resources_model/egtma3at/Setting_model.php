<?php
class Setting_model extends CI_Model
{
    public function insert_edara()
    {
        $data['title']= $this->input->post('title');
        $data['time_added'] =date('H:i:s a');
        $data['date_added'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('hr_egtma3at_legan',$data);
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
    public function update_edara($id){
        $data['title']= $this->input->post('title');
        $this->db->where('id',$id);
        $this->db->update('hr_egtma3at_legan',$data);
    }
    public function getById($id){
        $h = $this->db->get_where('hr_egtma3at_legan', array('id'=>$id));
        return $h->row_array();
    }
    public function getById_sub($id){
        $h = $this->db->get_where('hr_egtma3at_legan_emp', array('id'=>$id));
        return $h->row_array();
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_egtma3at_legan');
       
        $query = $this->db->get()->result();
         
            return $query;
        
    }
  
   
    public function select_sub(){
        $this->db->select('*');
        $this->db->from('hr_egtma3at_legan_emp');
   
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function insert_sub(){
        $data['lagna_id_fk'] = $this->input->post('lagna_id_fk');
        $data['emp_code'] = $this->input->post('emp_code_fk');
        $data['emp_id'] = $this->input->post('emp_id_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['mosma_wazefy_id'] = $this->input->post('mosma_wazefy_id');
        $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['time_added'] =date('H:i:s a');
        $data['date_added'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert("hr_egtma3at_legan_emp", $data);
    }
    public function update_sub($id){
        $data['lagna_id_fk'] = $this->input->post('lagna_id_fk');
        $data['emp_code'] = $this->input->post('emp_code_fk');
        $data['emp_id'] = $this->input->post('emp_id_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['mosma_wazefy_id'] = $this->input->post('mosma_wazefy_id');
        $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $this->db->where('id',$id);
        $this->db->update('hr_egtma3at_legan_emp',$data);
    }
    public function select_allSub(){
        $this->db->select('*');
        $this->db->from('hr_egtma3at_legan_emp');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //=================================================================================
    public function get_all_emp()
    {
         $this->db->select('*');
         $this->db->from('employees');
        $this->db->where("employee_type", 1);
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $x=1;
             foreach ( $query->result() as $row){
                 $data[$x] =  $row;
             $x++;
             }
             return $data ;
         }
        return false;
    }
}