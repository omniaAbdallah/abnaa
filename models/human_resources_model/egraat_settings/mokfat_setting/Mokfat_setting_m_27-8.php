<?php
class Mokfat_setting_m extends CI_Model
{

    public function insert_edara()
    {
       
        $data['mokafa_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
       
        $this->db->insert('hr_mokafat_types',$data);
    }
    public function update_edara($id){
        $data['mokafa_code']= $this->input->post('title_code');
        $data['title']= $this->input->post('title');
        $this->db->where('id',$id);
        $this->db->update('hr_mokafat_types',$data);
    }

    public function getById($id){
        $h = $this->db->get_where('hr_mokafat_types', array('id'=>$id));
        return $h->row_array();
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_mokafat_types');
      
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
               // $query_result[$i]->count =$this->get_sub($row->id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
   
	
   
  
}
