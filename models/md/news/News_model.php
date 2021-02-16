<?php

class News_model extends CI_Model
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

  
  $data['news_date']=$this->input->post('news_date');
     $data['news_title']=$this->input->post('news_title');
     $data['news_status']=$this->input->post('news_status');
     $data['news_content']=$this->input->post('news_content');
     $data['news_words']=$this->input->post('news_words');
     $data['description']=$this->input->post('description');
     $data['auther']=$this->input->post('auther');
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
     $this->db->insert(' md_news',$data);
     
     
   
 }
 public function select_all_news()
 {
  return $this->db->where('news_status',1)->get('md_news')->result();
 }
 public function get_by_id($id)
{
    $this->db->where('id',$id);
   return $this->db->get('md_news')->row();

}
public function update($id)
{
    $data['news_date']=$this->input->post('news_date');
    $data['news_title']=$this->input->post('news_title');
    $data['news_status']=$this->input->post('news_status');
    $data['news_content']=$this->input->post('news_content');
    $data['news_words']=$this->input->post('news_words');
    $data['description']=$this->input->post('description');
    $data['auther']=$this->input->post('auther');
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
    $this->db->update('md_news',$data);

}
public function delete($id)
{
    
   $this->db->where('id',$id);
   $this->db->delete('md_news');

}
public function delete_media($id)
{
    
   $this->db->where('news_id_fk',$id);
   $this->db->delete('md_news_attachment');

}
public function delete_vedioes($id)
{
    
   $this->db->where('news_id_fk',$id);
   $this->db->delete('md_news_attachment');

}

public function get_news_by_id($id){
    $this->db->where('id',$id);
    $query = $this->db->get('md_news');
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
public function insert_attach($id,$images)
{
    if(isset($images)&& !empty($images))
    {
        $count=count($images);
        for($x=0; $x<$count;$x++)
        {
            
            $data['title']=$this->input->post('title');
            $data['file']=$images[$x];
            $data['news_id_fk']=$id;
            $data['date']= strtotime(date("Y-m-d"));
            $data['date_ar']= date("Y-m-d");
            $data['type'] = 1;
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

            $this->db->insert('md_news_attachment',$data);
        }
    }

}
public function delete_morfq($id)
{

$this->db->where('id',$id)->delete('md_news_attachment');

}

public function get_morfq_by_id($id){
    $this->db->where('news_id_fk',$id);
    $query = $this->db->get('md_news_attachment');
  
        return $query->result();
   
}

public function get_images($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('md_news_attachment');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}



public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}


public function add_vedio($id,$title,$link)
{
    
  $data['news_id_fk']=$id;
   
    $data['file']=  $link;
    $data['title']=  $title;
    $data['date']= strtotime(date("Y-m-d"));
    $data['date_ar'] = date('Y-m-d H:i:s');
    $data['type'] = 2;
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
    $this->db->insert('md_news_attachment',$data);
    return $this->db->insert_id();

}
public function update_vedio($title,$link,$vedio_id)
{
    
 
   
    $data['file']=  $link;
    $data['title']=  $title;
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
    $this->db->where('id',$vedio_id)->update('md_news_attachment',$data);
    

}
public function GetFromGeneral_settings_vedio($id)
{
 $this->db->select('*');
 $this->db->from('md_news_attachment');

 $this->db->where('id', $id);
 $query = $this->db->get()->row();

 return $query;
}
public function delete_vedio($id)
{

$this->db->where('id',$id)->delete('md_news_attachment');

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
    //new
    public function get_main_photo($id){
       
        $query = $this->db->where('news_id_fk',$id)->where('suspend',1)->get('md_news_attachment')->row();
        
            return $query;
     
      
    }
   
    public function select_main_data()
    {
       
        $this->db->select('*');
        $this->db->from('md_news_attachment');
        $this->db->join('md_news', ' md_news.id = md_news_attachment.news_id_fk ');
        $this->db->where(array('md_news_attachment.suspend' => 1,'md_news.news_status' => 1));
        
        $query = $this->db->get()->result();
        return $query;
    }
    
    
}// END CLASS