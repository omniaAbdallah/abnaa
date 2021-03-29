<?php
class Agazat_setting_model extends CI_Model{
/***********/
    public function insert_sysat(){
    $check=$this->get_records();
    if($check !='')
    {
          $data['min_nums_in_year']=$this->input->post('min_nums_in_year');
          $data['max_nums_in_year']=$this->input->post('max_nums_in_year');
          $data['moda_takdem_talb']=$this->input->post('moda_takdem_talb');
          $data['emergency_nums_in_year']=$this->input->post('emergency_nums_in_year');
          $data['min_nums_in_talb']=$this->input->post('min_nums_in_talb');
          $data['moda_takdem_talb_min']=$this->input->post('moda_takdem_talb_min');
          $data['is_avlible_no_sallary_agaza']=$this->input->post('is_avlible_no_sallary_agaza');
          $this->db->update('hr_agazat_sysat',$data);
    }else{
        $data['min_nums_in_year']=$this->input->post('min_nums_in_year');
        $data['max_nums_in_year']=$this->input->post('max_nums_in_year');
        $data['emergency_nums_in_year']=$this->input->post('emergency_nums_in_year');
        $data['moda_takdem_talb']=$this->input->post('moda_takdem_talb');
        $data['min_nums_in_talb']=$this->input->post('min_nums_in_talb');
        $data['moda_takdem_talb_min']=$this->input->post('moda_takdem_talb_min');
        $data['is_avlible_no_sallary_agaza']=$this->input->post('is_avlible_no_sallary_agaza');
        $this->db->insert('hr_agazat_sysat',$data);
    }       
    }
    public function get_records(){
        $query = $this->db->get('hr_agazat_sysat')->row();     
        return $query;    
    }
}
