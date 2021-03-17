<?php
class Edarat_aqsam_m extends CI_Model
{


function Checkcode($prog_code)
{
    return $this->db->where('from_id_fk',0)->where('trteeb',$prog_code)->get('hr_edarat_aqsam')->num_rows();
}
function Checkcode_qsm($prog_code,$from_id_fk)
{
    return $this->db->where('from_id_fk',$from_id_fk)->where('trteeb',$prog_code)->get('hr_edarat_aqsam')->num_rows();
}
    public function insert_edara()
    {
        $data['title_id']= $this->input->post('title_id');
        $data['title_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
        $data['from_id_fk']= 0;
        $data['trteeb']= $this->input->post('in_order');
        $this->db->insert('hr_edarat_aqsam',$data);
    }
    public function update_edara($id){
        $data['title_id']= $this->input->post('title_id');
        $data['title_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
        $data['trteeb']= $this->input->post('in_order');
        $this->db->where('id',$id);
        $this->db->update('hr_edarat_aqsam',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('hr_edarat_aqsam', array('id'=>$id));
        return $h->row_array();
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk",0);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    public function get_sub($f_id){
        $h = $this->db->get_where('hr_edarat_aqsam', array('from_id_fk'=>$f_id));
        return $h->num_rows();
    }
    public function select_main(){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk",0);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_departments = $this->select_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    public function select_sub($f_id){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk",$f_id);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
  

    public function insert_sub(){


        $data['title_id']= $this->input->post('title_id');
        $data['title_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
        $data['from_id_fk']= $this->input->post('from_id_fk');;
        $data['trteeb']= $this->input->post('in_order');
        $this->db->insert('hr_edarat_aqsam',$data);
    }

    public function update_sub($id){
        $data['title_id']= $this->input->post('title_id');
        $data['title_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
        $data['from_id_fk']= $this->input->post('from_id_fk');;
        $data['trteeb']= $this->input->post('in_order');
        $this->db->where('id',$id);
        $this->db->update('hr_edarat_aqsam',$data);
    }
    public function select_allSub($where=false){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where($where);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //=================================================================================
    public function get_all_emp()
    {
         $this->db->select('*');
         $this->db->from('hr_administrative_structure');
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
	
   
  
}
