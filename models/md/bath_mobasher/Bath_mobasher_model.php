<?php

class Bath_mobasher_model extends CI_Model
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
public function get_count($table, $where_arr)

{

    $count = $this->db->where($where_arr)->count_all_results($table);

    return $count;

}

public function add_vedio($link)
{
    
 
   
    //$data['link']=  $link;
    $video_id = explode("?v=", $link);
    $data['link']= $video_id[1];
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
    $this->db->insert('md_bath_mobasher',$data);
    return $this->db->insert_id();

}
public function update_vedio($link,$vedio_id)
{
    
 
   
   // $data['link']=  $link;
    $video_id = explode("?v=", $link);
    $data['link']= $video_id[1];

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
    $this->db->where('id',$vedio_id)->update('md_bath_mobasher',$data);
    

}
public function GetFromGeneral_settings_vedio($id)
{
 $this->db->select('*');
 $this->db->from('md_bath_mobasher');

 $this->db->where('id', $id);
 $query = $this->db->get()->row();

 return $query;
}
public function delete_vedio($id)
{

$this->db->where('id',$id)->delete('md_bath_mobasher');

}

    public function get_table($table,$arr){
        if (!empty($arr)){
            $this->db->where($arr);
        }
        $this->db->limit(1);
        $query = $this->db->get($table)->row();
      
            return $query;
        
    }
 
    
    
}// END CLASS