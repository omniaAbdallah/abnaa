<?php
class Osr_ektfaa_t3ref_m extends CI_Model
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

    public function insert_data($images)
{
    
            $data['title']=$this->input->post('title_brnamg');
          
            $data['t3ref_brnamg']=$this->input->post('t3ref_brnamg');
            $data['baramg_ektfaa']=$this->input->post('baramg_ektfaa');
            $data['ahdaf_brnamg']=$this->input->post('ahdaf_brnamg');
            $data['mosthdaf']=$this->input->post('mosthdaf');
            $data['rules']=$this->input->post('rules');
      
           if(!empty($images))
           {
            $data['logo']=$images;
           }
            $check=$this->get_table_by_id('osr_ektfaa_ta3ref',array('id'=>1));
            if($check ==false)
            {
            $this->db->insert('osr_ektfaa_ta3ref',$data);
            }
            else{
                $this->db->where('id',1)->update('osr_ektfaa_ta3ref',$data);
            }
        
    
}
public function insert_attach($images)
{
    if(isset($images)&& !empty($images))
    {
        $count=count($images);
        for($x=0; $x<$count;$x++)
        {
            $data['title']=$this->input->post('title');
            $data['file']=$images[$x];
      
            $data['date']= strtotime(date("Y-m-d"));
            $data['date_ar']= date("Y-m-d");
            $data['time'] = date('h:i:s a');
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
            $this->db->insert('osr_ektfaa_mostndat',$data);
        }
    }
}
public function delete_morfq($id)
{
$this->db->where('id',$id)->delete('osr_ektfaa_mostndat');
}
public function get_morfq_by_id(){
 
    $query = $this->db->get('osr_ektfaa_mostndat');
        return $query->result();
}
public function get_images($id)
{
    $this->db->where('id',$id);
    $query=$this->db->get('osr_ektfaa_mostndat');
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
    public function get_table_by_id($table,$arr){
        if (!empty($arr)){
           $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
            return $query;
    }
      
}