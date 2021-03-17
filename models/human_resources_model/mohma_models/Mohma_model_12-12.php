<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mohma_model extends CI_Model
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
        $this->db->from("hr_mohma");
      
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
               
                $a++;
            }
            return $arr;
        } else {
            return false;
        }
    }

    public function insert($id)
    {
       
        $data['mohma_name'] = $this->input->post('mohma_name');
        $data['mohma_id_fk'] = $this->input->post('mohma_id_fk');
        $data['mohma_date'] = $this->input->post('mohma_date');
        $data['mohma_details'] = $this->input->post('mohma_details');
        $data['emp_id_fk'] = $this->input->post('emp_id_fk');
        $data['emp_n'] = $this->input->post('emp_n');
        $data['important'] = $this->input->post('important');
        $data['from_date'] = $this->input->post('from_date');
        $data['to_date'] = $this->input->post('to_date');
        $data['num_days'] = $this->input->post('num_days');
        $data['another_mohma'] = $this->input->post('another_mohma');
        
        if($id==0)
        {
           
        
            $data['date'] = strtotime(date('Y-m-d'));
            $data['time'] = date('H:i:s a');
            $data['date_ar'] = date('Y-m-d');
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert("hr_mohma", $data);
        }
        else{
            $this->db->where('id',$id)->update("hr_mohma", $data);
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
   
    public function select_last_id()
    {
        $this->db->select('*');
        $this->db->from("hr_mohma");
   
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
  
    public function Delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("hr_mohma");
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
    
    //yara23-9-2020

    function get_unseen_mohma()
    {
        $t3mem = $this->db->select('*')
            ->from("hr_mohma")
          
           

            ->where('send_all_mohma', 1)
            ->where('emp_id_fk', $_SESSION['emp_code'])
            ->where('seen',null)
            ->get()->row();

        if (!empty($t3mem)) {
          /// $data = array('t3mem' => $t3mem);   
               $query=$t3mem;
                $query->attaches= $this->get_attaches($t3mem->mohma_id_fk);
               
            return $query;
        }

    
    }
  
    public function get_attaches($id)
    {
        $this->db->where('mohma_id_fk', $id);
        $q = $this->db->get('hr_mohma_attaches')->result();
        if (!empty($q)) {
            return $q;
        }
        else{
            return false;
        }
    }

   
    
    public function get_action_mohma()
    {
        $this->db->select('*');
        $this->db->from("hr_mohma");
        $this->db->where('emp_id_fk', $_SESSION['emp_code']);
        $this->db->where('seen', NULL);
      
        $query = $this->db->get()->row();
        if (!empty($query)) {
            $arr = $query;
          
                return $arr;
            
        } else {
            return false;
        }
    }
    public function basic_data($id)
    {
        return $this->db->where('id', $id)
            ->get('hr_mohma')->row();
    }
    public function update_seen_mohma()
    {
       // $id = $this->input->post('id');
      
            $data['seen'] = 1;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('emp_id_fk', $_SESSION['emp_code'])
              
                ->update('hr_mohma', $data);
        
    }
    
    public function update_seen_comments_mohma()
    {
       // $id = $this->input->post('id');
      
            $data['seen'] = 1;
            $data['seen_time'] = date('h:i:s a');
            $data['seen_date'] = date('Y-m-d');
            $this->db->where('to_emp_id_fk', $_SESSION['emp_code'])
              
                ->update('hr_mohma_comments', $data);
        
    }
    public function get_all_emps($id)
    {
        $this->db->where_not_in('id', $id);
        $this->db->where('employee_type', 1);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            return $q;
        }
    }
    ///////////////////////////////////
    public function select_by_id($id)
    {
        $this->db->select('*');
        $this->db->from("hr_mohma");
        $this->db->where("id", $id);
     
        $this->db->order_by("id", "DESC");
        $query = $this->db->get()->row();
        if ($query != '') {
          
            
               
            return $query;
        } else {
            return false;
        }
    }
  
    ///////////////////////
    public function get_attach($id)
    {
        $query = $this->db->where('mohma_id_fk',$id)->get('hr_mohma_attaches');
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
                       
                        $files['mohma_id_fk'] = $this->input->post('row');
                        $files['date'] = strtotime(date("Y-m-d"));
                        $files['date_ar'] = date("Y-m-d");
                        if (isset($_SESSION['user_id'])) {
                            $files['publisher'] = $_SESSION['user_id'];
                            $files['publisher_name'] = $this->getUserName($_SESSION['user_id']);
                        }
                        $this->db->insert('hr_mohma_attaches', $files);
                    }
        
                }


    }


 
    public function delete_attach($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('hr_mohma_attaches');
    }
    // send_all_mohma
    public function send_all_mohma($id)
    {
$data['send_all_mohma']=1;
$this->db->where('id',$id)->update('hr_mohma',$data);

    }
    public function end_mohma($id)
    {
        $data['suspend']=4;
        $data['suspend_time'] = date('h:i:s a');
        $data['suspend_date'] = date('Y-m-d');
        
$this->db->where('id',$id)->update('hr_mohma',$data);
    }

    public function insert_record($valu)
    {
        $data['title_setting']=$valu;
        $data['type']=38;
        $data['have_branch']=0;
        $this->db->insert('hr_forms_settings',$data);
    }
    public function get_last()
    {
        $this->db->order_by('id_setting','desc');
        $this->db->select('id_setting');
        $this->db->where('type',38);
        $this->db->from('hr_forms_settings');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
          return $query->row()->id_setting;
        }else{
            return 0;
        }
        
    }
    ////////////////////////////////////////comments/////////////////////////////////
    public function add_comment($id,$to_emp_id_fk)
    {
     
      $data['mohma_id_fk']=$id;
      $data['to_emp_id_fk']=$to_emp_id_fk;
        $data['comment']= $this->input->post('comment');
      
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];;
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->insert('hr_mohma_comments',$data);
        return $this->db->insert_id();

    }
    
 
    public function get_comments($id)
    {
        $this->db->select('hr_mohma_comments.*,employees.personal_photo');
        $this->db->from('hr_mohma_comments');
        $this->db->join('employees','employees.id=hr_mohma_comments.publisher');
        $this->db->where('mohma_id_fk',$id);
        return $this->db->get()->result();
    }
   
    public function update_comment($id){

        $data['comment']= $this->input->post('comment');
      
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        if($_SESSION['role_id_fk']==1){

            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']=$_SESSION['user_name'];
        }
        else if ($_SESSION['role_id_fk']==2){
            $data['publisher'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

        }
        else if ($_SESSION['role_id_fk']==3){
            $data['publisher'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
        }
        else if ($_SESSION['role_id_fk']==4){
            $data['publisher'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
            $data['publisher_name'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
        }
        $this->db->where('id',$id);
        $this->db->update('hr_mohma_comments',$data);
    }
    public function get_comment_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('hr_mohma_comments');
        if ($query->num_rows()>0){
            $data = $query->row();            
         return $data;
        } else{
            return 0;
        }
    }
    
   
    public function delete_comment($id){
        $this->db->where('id',$id);
        $this->db->delete('hr_mohma_comments');

    }
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    //yara
    public function add_setting($type){
        $data['title_setting'] = $this->input->post('value');
        $data['type'] = $type;
        
    
        $id = $this->input->post('row_id') ;
         if (!empty($id)){
             $data_update['title_setting'] = $this->input->post('value');
             $this->db->where('id_setting',$id);
             $this->db->update('hr_forms_settings', $data_update);
         } else{
             $this->db->insert('hr_forms_settings', $data);
         }
    }
    public function get_setting($typee)
    {
    $this->db->where('type', $typee);
    
    $query = $this->db->get('hr_forms_settings');
    if ($query->num_rows() > 0) {
        return $query->result();
    }
    return false;
    }
    
    public function get_setting_by_id($id){
        $this->db->where('id_setting',$id);
        $query = $this->db->get('hr_forms_settings');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }
    
    public function get_all_setting(){
        $query = $this->db->get('hr_forms_settings');
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    public function delete_setting($id){
        $this->db->where('id_setting',$id);
        $this->db->delete('hr_forms_settings');
    }
    // emp_data_sesstion
    public function emp_data_sesstion($id){
        $this->db->where('id',$id);
        $query = $this->db->get('employees');
        if ($query->num_rows() > 0) {
            return $query->row() ;
        }
        return false;
    }
    
}