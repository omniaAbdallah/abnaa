<?php
class Fav_emp_m extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
    }

  
 //---------------------------------------------------------------
 public  function insert_user_role(){
     for($x=0;$x<sizeof($_POST["select-all"]);$x++){
         $r=explode("-",$_POST["select-all"][$x]);
         $data['user_id']=$this->input->post("user_id");
         $data['page_id_fk']=$r[0];
         $data['page_level']=$r[1];
         $this->db->insert('hr_emp_fav_pages',$data);
     }
 }
//---------------------------------------------------------------
    public function select_per($id){
        $this->db->select('*');
        $this->db->from("hr_emp_fav_pages");
        $this->db->where("user_id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->page_id_fk;
            }
            return $data;
        }
        return false;
    }
//-----------------------------------------------------------
    public function user_in(){
        $this->db->select('*');
        $this->db->from('hr_emp_fav_pages');
        $this->db->group_by("user_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->user_id;
            }
            return $data;
        }
        return false;
    }
//-----------------------------------------------------------
    public function users_name(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row->user_username;
            }
            return $data;
        }
        return false;
    }
    
        public function get_users_name(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row->user_name;
            }
            return $data;
        }
        return false;
    }
    public function select_fav_pages(){
        $this->db->select('*');
        $this->db->from("hr_emp_fav_pages");
        $this->db->where("user_id",$_SESSION['user_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            $data=$query->result();
            foreach ($query->result() as $row) {
           
            $data[$i]->bg_color=$this->getById("pages",array("page_id"=>$row->page_id_fk))->bg_color;
            $data[$i]->page_icon=$this->getById("pages",array("page_id"=>$row->page_id_fk))->page_icon_code;
            $data[$i]->page_link=$this->getById("pages",array("page_id"=>$row->page_id_fk))->page_link;
            
            $data[$i]->page_title=$this->getById("pages",array("page_id"=>$row->page_id_fk))->page_title;
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function getById($table,$array){
        $h = $this->db->where($array);
        return $h->get($table)->row();
    }

}// END CLASS