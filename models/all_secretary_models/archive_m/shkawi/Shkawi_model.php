<?php
class Shkawi_model extends CI_Model{
    public function get_employee_data($table,$id){
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $data = $query->row() ;
          //  $data->edara_n = $this->get_edara_name_or_qsm($data->administration);
          //  $data->qsm_n = $this->get_edara_name_or_qsm($data->department);
            return $data ;
        } else{
            return false;
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
    public function get_table($table, $arr){
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
    // public function get_all_emp($id){
    //     $this->db->where_not_in('id', $id);
    //     $this->db->where('employee_type', 1);
    //     $q = $this->db->get('employees')->result();
    //     if (!empty($q)) {
    //         foreach ($q as $key => $row) {
    //             $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);
    //             $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);
    //             $q[$key]->job_title = $this->get_job_title($row->degree_id);
    //         }
    //         return $q;
    //     }
    // }
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
    public function get_last_rkm(){
        $this->db->select('*');
        $this->db->from('arch_shkawi');
        $this->db->order_by("rkm","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->rkm +1 ;
        }
        return 1;
    }
    public function add_shkwa(){
        $data['rkm'] = $this->get_last_rkm();
            $type_arr = explode('-',$type);
        $data['type']= $this->input->post('type');
        $data['type_n']= $this->input->post('type_n');
        if($data['type_n']=="شكوي")
        {
            $data['shkwa_type']= $this->input->post('shkwa_typee');
            $data['shkwa_type_n']= $this->input->post('shkwa_type_n');
        }
        $data['sender_code'] = $this->input->post('sender_code');
        $data['sender_id_fk'] = $this->input->post('sender_id_fk');
        $data['sender_name'] = $this->input->post('sender_name');
        $data['sender_edara_fk'] = $this->input->post('sender_edara_fk');
        $data['sender_edara_n'] = $this->input->post('sender_edara_n');
        $data['sender_qsm_fk'] = $this->input->post('sender_qsm_fk');
        $data['sender_qsm_n'] = $this->input->post('sender_qsm_n');
        $data['send_date_ar'] = $this->input->post('send_date');
        $data['send_date'] = strtotime($this->input->post('send_date')) ;
        //yara
        $data['send_time'] = date('H:i:s a');
        //yara
        //yara
        $data['reciver_id_fk'] = $this->input->post('reciver_id_fk');
        $data['reciver_name'] = $this->input->post('reciver_name');
        $data['reciver_code'] = $this->input->post('reciver_code');
        $data['reciver_edara_fk'] =$this->input->post('reciver_edara_fk');
        $data['reciver_edara_n'] = $this->input->post('reciver_edara_n');
        $data['reciver_qsm_fk'] = $this->input->post('reciver_qsm_fk');
        $data['reciver_qsm_n'] = $this->input->post('reciver_qsm_n');
        // $data['recived_date'] = strtotime($this->input->post('send_date')) ;
        // //yara
        // $data['recived_time'] = date('H:i:s a');


        
        $data['content'] = $this->input->post('content');
        $data['date_ar'] = date('Y-m-d');
        $data['date'] = strtotime(date('Y-m-d')) ;
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('arch_shkawi',$data);
       
    }
    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;
    }
    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    }
    ///
    public function get_all_shkwa(){
      
        $q = $this->db->get('arch_shkawi')->result();
        if (!empty($q)) {
            
            return $q;
        }
    }
   
    public function get_all_shkwa_records($id){
        $this->db->where('sender_id_fk', $id);
        $q = $this->db->get('arch_shkawi')->result();
        if (!empty($q)) {
            
            return $q;
        }
    }
    public function get_shkwa($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('arch_shkawi');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    ////////////////////////////////model/////////////////////////////////
 public function add_message_type($type)
 {
     $data['title'] =$this->input->post('message_type');
     $data['from_code'] = $type;
     $this->db->insert('arch_setting', $data);
 }
 public function update_message_type($type,$id)
 {
     $data['title'] =$this->input->post('message_type');
     $data['from_code'] = $type;
     $this->db->where('id',$id)->update('arch_setting', $data);
 }

 public function add_shkwa_type($type)
 {
     $data['title'] =$this->input->post('shkwa_type');
     $data['from_code'] = $type;
     $this->db->insert('arch_setting', $data);
 }
 public function update_shkwa_type($type,$id)
 {
     $data['title'] =$this->input->post('shkwa_type');
     $data['from_code'] = $type;
     $this->db->where('id',$id)->update('arch_setting', $data);
 }
public function GetFromGeneral_settings($id,$type)
{
 $this->db->select('*');
 $this->db->from('arch_setting');
 $this->db->where('from_code', $type);
 $this->db->where('id', $id);
 $query = $this->db->get()->row();
 return $query;
}
public function delete_setting($id)
 {
     $this->db->where("id", $id);
     $this->db->delete("arch_setting");
 }
 public function select_search_key($table,$search_key,$search_key_value){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($search_key,$search_key_value);    
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
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
    public function delete_shakwa($id)
 {
     $this->db->where("id", $id);
     $this->db->delete("arch_shkawi");
 }
 public function read_shakwa($id)
 {
    $data['readed']=1;
    $data['recived_date'] = date('Y-m-d') ;
    $data['recived_time'] = date('H:i:s a');
     $this->db->where("id", $id);
     $this->db->update("arch_shkawi",$data);
 }
}