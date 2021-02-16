<?php

class Transformation_banks_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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


    public function select_transformation_setting_by_level($level)
    {
        $q = $this->db->where('level', $level)->where('tbl', 'banks')->get('hr_all_transformation_setting')->row();
        if (!empty($q)) {
            return $q;
        }
    }

    public function select_hr_all_transformations_history_by_level($arr)
    {
        $this->db->select('*');
        $this->db->from("hr_all_emp_banks_history");
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $query->row();
            $query->row()->from_user_photo = $this->Get_photo($query->row()->from_user);
            $query->row()->from_user_job = $this->Get_job($query->row()->from_user);
            $query->row()->to_user_photo = $this->Get_photo($query->row()->to_user);
            $query->row()->to_user_job = $this->Get_job($query->row()->to_user);
            return $query->row();
        } else {
            return false;
        }
    }

    public function Get_photo($user_id)
    {
        $this->db->select('users.user_id ,users.emp_code,employees.id,employees.personal_photo');
        $this->db->from("users");
        $this->db->join('employees', 'users.emp_code=employees.id', 'left');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->personal_photo;
        } else {
            return false;
        }
    }

    public function Get_photo_emp($user_id)
    {
        $this->db->select('employees.id,employees.personal_photo');
        $this->db->from("employees");
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->personal_photo;
        } else {
            return false;
        }
    }

    public function Get_job($user_id)
    {
        $this->db->select('users.user_id ,users.emp_code,employees.id,employees.degree_id,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from("users");
        $this->db->join('employees', 'users.emp_code=employees.id', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->job_title;
        } else {
            return false;
        }
    }

    public function select_allhistory_by_banks_rkm_fk($banks_rkm_fk)
    {
        $this->db->select('*');
        $this->db->from("hr_all_emp_banks_history");
        $this->db->where("banks_rkm_fk", $banks_rkm_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $c = 0;
            foreach ($query->result() as $value) {
                $data[$c] = $value;
                $data[$c]->from_user_photo = $this->Get_photo($value->from_user);
                $data[$c]->from_user_job = $this->Get_job($value->from_user);
                $data[$c]->to_user_job = $this->Get_job($value->to_user);
                $data[$c]->to_user_photo = $this->Get_photo($value->to_user);
                $c++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function explode_date($date)
    {
    
        $txt = explode('-', $date);
        $title = $txt[0] . '-' . $txt[1] . '-' . $txt[2];
        return $title;
    }


    public function get_employees_by_level($arr)
    {
        $query = $this->db->where($arr)->get('hr_egraat_emp_setting');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $value) {
                $query[$key]->photo = $this->Get_photo_emp($value->person_id);
            }
            return $query;
// Get_photo
        } else {
            return false;
        }
    }

    public function save_from_transfomation()
    {
        // $solaf_data=$this->get_solaf_data(array('t_rkm'=>$solaf_rkm));
        $insert['banks_rkm_fk'] = $this->input->post('banks_rkm_fk');
        $insert['banks_id_fk'] = $this->input->post('banks_id_fk');
        $insert['from_user'] = $this->input->post('from_user');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));
        if (!empty($from_user)) {
            $insert['from_user_n'] = $from_user->employee;
            $update['current_from_user_id'] = $from_user->user_id;
            $update['current_from_user_name'] = $from_user->employee;
        }
        $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));
        if (!empty($to_user)) {
            $insert['to_user'] = $to_user->user_id;
            $insert['to_user_n'] = $to_user->employee;
            $update['current_to_user_id'] = $to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }
        if ($this->input->post('reason_action')) {
            $insert['reason_action'] = $this->input->post('reason_action');
        }
        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');
        $level = $this->input->post('level');
        // $update['suspend'] = $level;
        switch ($level) {
            case 2:
                $update['action_moder_fr'] = $this->input->post('action_moder_fr');
                if ($update['action_moder_fr'] == 1) {
                    $action = 1;
                } elseif ($update['action_moder_fr'] == 2) {
                  //  $level = 0;
                    $action = 2;
                }
                
                break;
            case 3:
                $update['action_moder_hr'] = $this->input->post('action_moder_hr');
                if ($update['action_moder_hr'] == 1) {
                    $action = 1;
                } elseif ($update['action_moder_hr'] == 2) {
                    //  $level = 0;
                    $action = 2;
                }
                
                break;
            case 4:
                $level = 0;
             //  $update['level'] = 0;
             $update['action_employee'] = $this->input->post('action_employee');
                $to_user = $this->get_user_data2(array('employees.id' => $this->input->post('emp_id_fk')));
                if (!empty($to_user)&&($this->input->post('level')!=4)) {
                    $insert['to_user'] = $to_user->user_id;
                    $insert['to_user_n'] = $to_user->employee;
                    $update['current_to_user_id'] = $to_user->user_id;
                    $update['current_to_user_name'] = $to_user->employee;
                }
                else if($this->input->post('level')==4 && $update['action_employee'] == 1){
                 
                   
                    $update['current_to_user_id'] =  0;
                    $update['current_to_user_name'] = Null;
                }
               
                if ($update['action_employee'] == 1) {
                    $action = 1;
                } elseif ($update['action_employee'] == 2) {
                    //  $level = 0;
                    $action = 2;
                }
               
                break;
            default:
                break;
        }
        $level_data = $this->select_transformation_setting_by_level($level);
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level') - 1);
        if (!empty($level_data)) {
            $insert['talab_in_fk'] = $level_data->id;
            $insert['talab_in_title'] = $level_data->title;
            $insert['level'] = $this->input->post('level') - 1;
            $update['level_title'] = $level_data->title;
            $update['level'] = $level;
        }
        if (isset($action)) {
            if (in_array($action, array(1, 4))) {
                $insert['talab_msg'] = $level_data_msg->msg_accept;
                /*                $update['talab_msg'] = $level_data_msg->msg_accept;*/
                $update['suspend'] = $action;
            } else {
                $insert['talab_msg'] = $level_data_msg->msg_refuse;
                /*                $update['talab_msg'] = $level_data_msg->msg_refuse;*/
                $update['suspend'] = $action;
               
               
            }
        }
     
        $update['seen'] = 0;
        $this->db->insert("hr_all_emp_banks_history", $insert);
        $this->db->where('rkm', $this->input->post('banks_rkm_fk'));
        $this->db->update('hr_emp_hesabat_banks_orders', $update);
    }

  
    public function select_from_hr_emp_hesabat_banks_orders($arr)
    {
        $this->db->select('hr_emp_hesabat_banks_orders.*,employees.id as emp_id,employees.employee');
        $this->db->from("hr_emp_hesabat_banks_orders");
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=hr_emp_hesabat_banks_orders.emp_id', 'left');
        $this->db->order_by("hr_emp_hesabat_banks_orders.id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function get_employees($arr)
    {
        $this->db->select('employees.*,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('employees');
        $this->db->where($arr);
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_user_data($arr)
    {
        $this->db->select('id,employee');
        $this->db->from('employees');
        $this->db->where($arr);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

   
    public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee,employees.personal_photo,employees.degree_id,
        all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=users.emp_code', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_change_banks_data($arr)
    {
        $this->db->select('hr_emp_hesabat_banks_orders.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title,
        
            first_tbl.title as current_bank_name,
            second_tbl.title as new_bank_name,

         ');
        $this->db->from('hr_emp_hesabat_banks_orders');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id= hr_emp_hesabat_banks_orders.emp_id', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
     //  $this->db->join('bank_employes_details', 'bank_employes_details.emp_code = hr_emp_hesabat_banks_orders.emp_id', 'left');
        
         $this->db->join('banks_settings first_tbl', 'first_tbl.id=hr_emp_hesabat_banks_orders.current_bank_id_fk', 'LEFT');
         $this->db->join('banks_settings second_tbl', 'second_tbl.id=hr_emp_hesabat_banks_orders.new_bank_id_fk', 'LEFT');
        
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_solaf_banks_data($arr)
    {
        $this->db->select('hr_emp_hesabat_banks_orders.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title
         ');
        $this->db->from('hr_emp_hesabat_banks_orders');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id= hr_emp_hesabat_banks_orders.emp_id', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_banks_data($arr)
    {
        $this->db->select('hr_emp_hesabat_banks_orders.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title
         ');
        $this->db->from(' hr_emp_hesabat_banks_orders');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id= hr_emp_hesabat_banks_orders.emp_id', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }



    

  

    

    public function select_department_jobs()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('from_id_fk', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if ($row->id == 3) {
                    array_unshift($data, $row);
                    continue;
                }
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}// END CLASS
