<?php


class Pages_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //=======================================
    public function get_my_page_permession()
    {
        $this->db->where('level',0);
        $this->db->from("pages_tataw3");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            $data = $query->result();
            foreach ($query->result() as $row) {
                $data[$i]->sub = $this->get_sub_page($row->page_id);
                $i++;
            }
            return $data;
        }
        return array();
    }
    //======================================
    public function get_sub_page($group_id_fk)
    {
        $this->db->select('*');
        $this->db->from('pages_tataw3');
        $this->db->where("group_id_fk", $group_id_fk);
        $this->db->order_by('page_order', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            return $data;
        }
        return array();
    }
    //======================================

    public function get_sub($id)
    {
        $permetions=$this->Permission->select_per($_SESSION['user_id']);
        $this->db->where('group_id_fk',$id);
        $this->db->where_in("page_id",$permetions);
        $query= $this->db->get('pages_tataw3');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $data[$x]=$row;
                $data[$x]->sub=$this->get_sub($row->page_id);
                $x++;
            }
            return $data;
        }else{
            return false;
        }

    }


    public function main_fetch_group(){
//        $this->db->where('user_id',$_SESSION['user_id']);
        $this->db->where('level',0);
        // $this->db->order_by('page_id_fk','ASC');
        $parent = $this->db->get("pages_tataw3");
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->count_level= $this->get_count_level($p_cat->page_id);
            $categories[$i]->sub = $this->get_date_page($p_cat->page_id);
            $i++;
        }
        return $categories;
    }
    public function main_fetch_group_main(){
        $this->db->select('page_id as page_id_fk , level as page_level');
        $this->db->where('level',0);
        // $this->db->order_by('page_id_fk','ASC');
        $parent = $this->db->get("pages_tataw3");
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->permission = $this->get_user_permission($p_cat->page_id_fk,$_SESSION['id']);
            $categories[$i]->count_level= $this->get_count_level($p_cat->page_id_fk);
            $categories[$i]->sub = $this->get_date_page($p_cat->page_id_fk);
            $categories[$i]->user_id = $_SESSION['id'];
            $i++;
        }
        return $categories;
    }
    public function get_user_permission($page_id,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->where('page_id_fk',$page_id);
    $this->db->where('page_level',0);
        $query=$this->db->get('permissions');
        return $query->num_rows();
    }
    public  function get_count_level($id){
        $this->db->select('*');
        $this->db->from('pages_tataw3');
        $this->db->order_by('page_order','ASC');
        $this->db->where('group_id_fk', $id);
        $child = $this->db->get();
        $total=0;
        if ($child->num_rows() > 0){
            $categories = $child->result();
            foreach($categories as $p_cat){
                $total += $this->get_count_sub_level($p_cat->page_id);
            }
        }
        return $total;
    }
    public  function get_count_sub_level($id){
        $this->db->select('*');
        $this->db->from('pages_tataw3');
        $this->db->where('group_id_fk', $id);
        $child = $this->db->get();
        $total=$child->num_rows();
        return $total;
    }
    public  function get_date_page($id){

        $this->db->where('page_id',$id);
        $this->db->order_by('page_order','ASC');
        $query = $this->db->get("pages_tataw3");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public  function get_group($id ){
        $this->db->select('*');
        $this->db->from('pages_tataw3');
        $this->db->where("group_id_fk",$id);
        $this->db->order_by('page_order','ASC');
        $query = $this->db->get();
        $data=array();
        $i=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                    $data[$i] = $row;
                    $data[$i]->count_level= $this->get_count_level($row->page_id);
                    $data[$i]->sub = $this->get_date_page($row->page_id);
                    $i++;

            }
            return $data;
        }
        return false;
    }
    public  function getgroupbyid($id){
        $query= $this->db->get_where('pages_tataw3',array('page_id'=>$id));
        return $query->row_array();
    }
    public function get_group_title($id){
        $h = $this->db->get_where("pages_tataw3", array('page_id'=>$id));
        $data=$h->row_array();

        $details=array();
        if($data['group_id_fk'] == 0  ){
            $details["title"]= $data['page_title'];
            $count_level=$this->get_count_level($data['page_id']);
            if($count_level >0){
                $link_to="Dash/mian_group/".$data['page_id'] ;
            }else{
                $link_to="Dash/sub_sub_main/".$data['page_id'].'/'.$data['page_id'] ;
            }
            $details["link"]= $link_to;
            //   $details["font_awesome"]=$data['page_icon_code'];
            return $details;
        }  if($data['group_id_fk'] != 0  ){
            $datareturn = $this->get_group_title($data['group_id_fk']);
            $details["title"]=$datareturn['title'];
            $details["link"]=$datareturn['link'];
            //    $details["font_awesome"]=$datareturn['font_awesome'];
            return $details;
        }
    }


    public  function get_groupId_by_path($path){
        $this->db->select('*');
        $this->db->from('pages_tataw3');
        $this->db->where("page_link",$path);
        $this->db->order_by('page_order','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return  $data->group_id_fk;
        }
        return false;
    }
}