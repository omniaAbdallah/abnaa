<?php

class Vote_model extends CI_Model
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

    public function select_search($table){
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
  
    public function insert()
 {

  
  $data['vote_date']=$this->input->post('vote_date');
     $data['vote_title']=$this->input->post('vote_title');
     $data['vote_status']=$this->input->post('vote_status');
    
     $data['vote_option1']=$this->input->post('vote_option1');
     $data['vote_option2']=$this->input->post('vote_option2');
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
     $this->db->insert(' md_vote',$data);
     
     
   
 }
 public function select_all_news()
 {
  return $this->db->where('vote_status',1)->get('md_vote')->result();
 }
 public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('md_vote')->row();

}
public function update($id)
{
    $data['vote_date']=$this->input->post('vote_date');
    $data['vote_title']=$this->input->post('vote_title');
    $data['vote_option1']=$this->input->post('vote_option1');
     $data['vote_option2']=$this->input->post('vote_option2');
   
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
   $this->db->where('id',$id);
    $this->db->update('md_vote',$data);

}
public function delete($id)
{
    
   $this->db->where('id',$id);
   $this->db->delete('md_vote');

}
public function delete_media($id)
{
    
   $this->db->where('vote_id_fk',$id);
   $this->db->delete('md_vote_attachment');

}
public function delete_vedioes($id)
{
    
   $this->db->where('vote_id_fk',$id);
   $this->db->delete('md_vote_attachment');

}

public function get_vote_by_id($id){
    $this->db->where('vote_id_fk',$id);
    $query = $this->db->get('md_vote_gam3ia_omomia_member');
    if ($query->num_rows()>0){
        return $query->result();
    } else{
        return false;
    }
}
public function get_options_by_id($id)
{
    $this->db->where('id',$id);
    $query = $this->db->get('md_vote');
    if ($query->num_rows()>0){
        return $query->row();
    } else{
        return false;
    }
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
                $table = 'magls_members_table';
                $field = 'member_name';
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
                $table = 'general_assembley_members';
                $field = 'name';
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;

    }




public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}




    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows()>0){
            return $query->result();
        } else{
            return false;
        }
    }
   
   
    
    
}// END CLASS