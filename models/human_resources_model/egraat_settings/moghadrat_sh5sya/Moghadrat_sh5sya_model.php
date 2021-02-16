<?php
class Moghadrat_sh5sya_model extends CI_Model{

/***********/
    public function insert_sysat(){
    $check=$this->get_records();
    if($check !='')
    {
          $data['nums_in_month']=$this->input->post('nums_in_month');
          $data['nums_in_one_time']=$this->input->post('nums_in_one_time');
          $data['moda_dwam_kamel']=$this->input->post('moda_dwam_kamel');
          $data['moda_dwam_gozee']=$this->input->post('moda_dwam_gozee');
          $this->db->where('title','ozonat');
          $this->db->update('hr_egraat_sysat',$data);
    }else{
        $data['title']='ozonat';
        $data['nums_in_month']=$this->input->post('nums_in_month');
        $data['nums_in_one_time']=$this->input->post('nums_in_one_time');
        $data['moda_dwam_kamel']=$this->input->post('moda_dwam_kamel');
        $data['moda_dwam_gozee']=$this->input->post('moda_dwam_gozee');
        $this->db->insert('hr_egraat_sysat',$data);
    }       
    }
    public function get_records(){

        $query = $this->db->where('title','ozonat')->get('hr_egraat_sysat')->row();     
        return $query;    
    }
  
}