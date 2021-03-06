<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ta3mem_msg_model extends CI_Model
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
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg");
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
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->where("ta3mem_msg_id_fk", $id);
        $this->db->where("seen", 1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function insert($id, $img)
    {
        //  $data['edara_n'] = $this->input->post('edara_n');
        //  $data['edara_id_fk'] = $this->input->post('edara_id_fk');
        $x = $this->input->post('edara_id_fk');
        $y = $this->input->post('edara_fk_name');
        //  $data['edara_id_fk'] = $x[$i];
        //  $data['edara_n']  = 'ادارة';
          $data['msg_title'] = $this->input->post('msg_title');
        $data['msg_date'] = $this->input->post('msg_date');
        $data['msg_f2a'] = $this->input->post('msg_f2a');
        $data['start_date'] = $this->input->post('start_date');
        $data['start_time'] = $this->input->post('start_time');
        $data['moda'] = $this->input->post('moda');
        $data['img'] = $img;
        $data['subject'] = $this->input->post('subject');
        // $data['date'] = strtotime(date('Y-m-d'));
        // $data['date_ar'] = date('Y-m-d');
        // $data['publisher'] = $_SESSION['user_id'];
        // $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        //  $this->db->insert("hr_ta3mem_msg", $data);
        if ($id == 0) {
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_ar'] = date('Y-m-d');
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
            $this->db->insert("hr_ta3mem_msg", $data);
        } else {
            $this->db->where('id', $id)->update("hr_ta3mem_msg", $data);
        }
        if ($x != null) {
            for ($i = 0; $i < sizeof($x); $i++) {
                $this->get_id("employees", "edara_id", $x[$i]);
                // print_r($vv);
            }
        }
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
    public function get_id($table, $where, $id)
    {
        $h = $this->db->get_where($table, array($where => $id));
        $arr = $h->result();
        // return $arr;
        if ($arr != null) {
            for ($i = 0; $i < sizeof($arr); $i++) {
                $dataa['ta3mem_msg_id_fk'] = $this->select_last_id();
                $dataa['emp_id'] = $arr[$i]->id;
                $dataa['emp_code'] = $arr[$i]->emp_code;
                $dataa['emp_name'] = $arr[$i]->employee;
                //   $dataa['type'] = 2;
                $this->db->insert('hr_ta3mem_msg_details', $dataa);
            }
        }
    }
    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg");
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
        $data['img'] = $img;
        $data['msg_date'] = $this->input->post('msg_date');
        $data['msg_f2a'] = $this->input->post('msg_f2a');
        $data['start_date'] = $this->input->post('start_date');
        $data['start_time'] = $this->input->post('start_time');
        $data['moda'] = $this->input->post('moda');
             $data['msg_title'] = $this->input->post('msg_title');
        $data['subject'] = $this->input->post('subject');
        $data['date'] = strtotime(date('Y-m-d'));
        $data['date_ar'] = date('Y-m-d');
        $data['publisher'] = $_SESSION['emp_code'];
        $data['publisher_name'] = $this->getUserName($_SESSION['emp_code']);
        $this->db->insert("hr_ta3mem_msg", $data);
        if ($x != null) {
            for ($i = 0; $i < sizeof($x); $i++) {
              //  $this->get_id("employees", "id", $x[$i]);
              $dataa['ta3mem_msg_id_fk'] = $this->select_last_id();
                $dataa['emp_id'] = $x[$i];
             //   $dataa['type'] = 't3mem';
                $dataa['emp_code'] =$this->get_emp_code("employees", "id", $x[$i]);
                $dataa['emp_name'] = $y[$i];
                $this->db->insert('hr_ta3mem_msg_details', $dataa);
            }
        }
        // print_r($vv);
    }
    public function Delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_ta3mem_msg");
    }
    public function Delete_details($id)
    {
        $this->db->where("ta3mem_id_fk", $id);
        $this->db->delete("hr_ta3mem_msg_details");
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
    public function get_action_da3wa()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->where('emp_id', $_SESSION['emp_code']);
        $this->db->where('seen', 0);
        $query = $this->db->get();
   
            if ($query->num_rows()>0){
                $i = 0;
                $data=$query->result();
                foreach ($query->result() as $row) {
            $arr = $query;
            $data[$i]->basic_data = $this->basic_data($row->ta3mem_msg_id_fk);
            $data[$i]->attach_data = $this->attach_data($row->ta3mem_msg_id_fk);
            $i++;
        }
        return $data;
    }
        return false;
    
        
        
    }
    // attach_data
    public function attach_data($id)
    {
        return $this->db->where('ta3mem_msg_id_fk', $id)
           ->get('hr_ta3mem_msg_attaches')->result();
    }
    public function basic_data($id)
    {
        return $this->db->where('id', $id)
            ->where('send_all_t3mem', 1)->get('hr_ta3mem_msg')->row();
    }
   
/////////////////////////////////////////////////////////////
    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg");
        $this->db->where("id", $id);
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
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->where("ta3mem_msg_id_fk", $id);
        $query = $this->db->get();
        return $query->result();
    }
    ///////////////////////
    public function get_attach($id)
    {
        $query = $this->db->where('ta3mem_msg_id_fk', $id)->get('hr_ta3mem_msg_attaches');
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
                $files['ta3mem_msg_id_fk'] = $this->input->post('row');
                $files['date'] = strtotime(date("Y-m-d"));
                $files['date_ar'] = date("Y-m-d");
                if (isset($_SESSION['user_id'])) {
                    $files['publisher'] = $_SESSION['user_id'];
                    $files['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                }
                $this->db->insert('hr_ta3mem_msg_attaches', $files);
            }
        }
    }
    public function delete_upload($id)
    {
        $img = $this->get_by('hr_ta3mem_msg_attaches', array('id' => $id), 1);
        if (file_exists("uploads/human_resources/ta3mem/" . $img->file)) {
            unlink(FCPATH . "uploads/human_resources/ta3mem/" . $img->file);
        }
    }
    public function delete_attach_all($id)
    {
        $this->delete_upload($id);
        $this->db->where('ta3mem_msg_id_fk', $id);
        $this->db->delete('hr_ta3mem_msg_attaches');
    }
    public function delete_attach($id)
    {
        $this->delete_upload($id);
        $this->db->where('id', $id);
        $this->db->delete('hr_ta3mem_msg_attaches');
    }
    // send_all_t3mem
    public function send_all_t3mem($id)
    {
        $data['send_all_t3mem'] = 1;
        $this->db->where('id', $id)->update('hr_ta3mem_msg', $data);
        $dataa['seen']=0;
$this->db->where('ta3mem_msg_id_fk',$id)->update('hr_ta3mem_msg_details',$dataa);
    }
 //old_fun
 //   31-12-2020
    public function get_all_emp($id)
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->order_by("emp_id", "ِASC");
        $this->db->where("ta3mem_msg_id_fk", $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_emps($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->order_by("emp_code", "ِASC");
        $this->db->where('employee_type', 1);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            return $q;
        }
    }

    public function get_unseen_msg_new()
    {
        $this->db->where('hr_ta3mem_msg_details.emp_id', $_SESSION['emp_code']);
        $this->db->where('hr_ta3mem_msg_details.seen',null);
        $query= $this->db->get('hr_ta3mem_msg_details')->result();
        $data=array();
        $x=0;
        foreach ($query as $row)
        {
            $data[$x]=$row;
            $data[$x]->msg_data=$this->get_msg_data($row->ta3mem_msg_id_fk);
            $data[$x]->msg_img=$this->get_msg_img($row->ta3mem_msg_id_fk);
            $x++;
        }
        return $data;
    } 
    public function get_msg_data($ta3mem_msg_id_fk){
        $h = $this->db->get_where("hr_ta3mem_msg",array("id"=>$ta3mem_msg_id_fk));
        $data= $h->row_array();
        return $data["subject"];
    }
       public function get_msg_img($ta3mem_msg_id_fk){
        $h = $this->db->get_where("hr_ta3mem_msg",array("id"=>$ta3mem_msg_id_fk));
        $data= $h->row_array();
        return $data["img"];
    } 
    function get_unseen_msg()
    {
        $t3mem = $this->db->select('hr_ta3mem_msg.*,hr_ta3mem_msg_details.*,COUNT(hr_ta3mem_msg.id) as count ')
            ->from("hr_ta3mem_msg_details")
            ->join('hr_ta3mem_msg', 'hr_ta3mem_msg_details.ta3mem_msg_id_fk=hr_ta3mem_msg.id')
            ->where('hr_ta3mem_msg.send_all_t3mem', 1)
            ->where('hr_ta3mem_msg_details.emp_id', $_SESSION['emp_code'])
            ->where('hr_ta3mem_msg_details.seen',0)
            ->get()->row();
        if (!empty($t3mem)) {
          /// $data = array('t3mem' => $t3mem);   
               $query=$t3mem;
                $query->attaches= $this->get_attaches_msg($t3mem->ta3mem_msg_id_fk);
            return $query;
        }
    }
    // get_attaches
    public function get_attaches_msg($id)
    {
        $this->db->where('ta3mem_msg_id_fk', $id);
        $q = $this->db->get('hr_ta3mem_msg_attaches')->result();
        if (!empty($q)) {
            return $q;
        }
        else{
            return false;
        }
    }
  
    // seen_msg
    public function reply_dawa()
    {
        $id = $this->input->post('id');
        if ($this->input->post('action') == 'refuse') {
           // $data['action'] = 2;
            $data['seen'] = 2;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_ta3mem_msg_details', $data);
        } else if ($this->input->post('action') == 'accept') {
        //    $data['action'] = 1;
            $data['seen'] = 1;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id', $_SESSION['emp_code'])
                ->where('id', $id)
                ->update('hr_ta3mem_msg_details', $data);
        }
    }
    public function select_all_unseen_ta3mem()
    {
        $query = $this->db->select('hr_ta3mem_msg.*,hr_ta3mem_msg_details.*')
        ->from("hr_ta3mem_msg_details")
        ->join('hr_ta3mem_msg', 'hr_ta3mem_msg_details.ta3mem_msg_id_fk=hr_ta3mem_msg.id')
        ->where('hr_ta3mem_msg.send_all_t3mem', 1)
        ->where('emp_id', $_SESSION['emp_code'])
        ->where('seen',0)
        ->get()->result();
        if (!empty($query)) {
            
            return $query;
        } else {
            return false;
        }
    }
    ///////////////////////////////25-4-2021////////////////
    public function get_dash_da3wa()
    {
        $this->db->select('*');
        $this->db->from("hr_ta3mem_msg_details");
        $this->db->where('emp_id', $_SESSION['emp_code']);
        $this->db->order_by("id", "DESC");
        
        $query = $this->db->get();
   
            if ($query->num_rows()>0){
                $data=$query->row();
                $data->basic_data = $this->basic_data($data->ta3mem_msg_id_fk);
        return $data;
    }
        return false; 
    }
  
}