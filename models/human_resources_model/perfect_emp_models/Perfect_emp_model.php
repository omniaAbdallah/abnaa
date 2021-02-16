<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfect_emp_model extends CI_Model
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
        $this->db->from("hr_emp_methali");
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
        $this->db->from("hr_emp_methali");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function insert()
    {
       
        
        $data['emp_code'] = $this->input->post('emp_code_fk');
        $data['emp_id'] = $this->input->post('emp_id_fk');
        $data['emp_name'] = $this->input->post('emp_name');
        $data['mosma_wazefy_id'] = $this->input->post('mosma_wazefy_id');
        $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');
        $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $data['edara_n'] = $this->input->post('edara_n');
        $data['qsm_id_fk'] = $this->input->post('qsm_id_fk');
        $data['qsm_n'] = $this->input->post('qsm_n');
        $data['details'] = $this->input->post('details');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);;
        $this->db->insert("hr_emp_methali", $data);
    }
    public function change_status($approved,$id)
	{

		
		$data['status']=0;
		$this->db->update('hr_emp_methali',$data);
		$this->db->where('id',$id);
		$status = 1 - $approved;
		$data2['status'] = $status;
		$this->db->update('hr_emp_methali',$data2);

	}

    public function Delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_emp_methali");
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