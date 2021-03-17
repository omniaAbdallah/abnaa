<?php
class Settings_model extends CI_Model
{
    public function add_brand($type)
    {
        if($type == 'tab_brands'){
            $data['from_id_fk'] = 0;
            $data['type'] = 2;
        } else  if($type == 'tab_device'){
            $data['from_id_fk'] = 0;
            $data['type'] = 1;
        }else  if($type == 'tab_modals'){
            $data['from_id_fk']= $this->input->post('from_id_fk');
            $data['type'] = 3;
        }
        else  if($type == 'tab_talb'){
         
            $data['type'] = 4;
        }
        $data['name']= $this->input->post('name');
  
        $this->db->insert("tech_device_card_settings",$data);
    }
    public function update_brand($id,$type)
    {
        if($this->input->post('from_id_fk')){
            $type =$this->input->post('from_id_fk');
        }
        $data['from_id_fk']= $type;
        $data['name']= $this->input->post('name');
     
        $this->db->where('id',$id);
        $this->db->update("tech_device_card_settings",$data);
    }
    public function select_brands(){
        $this->db->where('from_id_fk',0);
        $this->db->where('type',2);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $data[$key->id] = $key->name;
            }
            return $data;
        }
        return false;
    }
    // select_talb
    public function select_talb(){
        $this->db->where('from_id_fk',0);
        $this->db->where('type',4);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function select_modals(){
        $this->db->where('from_id_fk !=',0);
        $this->db->where('type',3);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function deletebrands($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_device_card_settings');
    }
    public function getbrands($id){
        $this->db->where('id',$id);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            return $query->row_array() ;
        }
        return false;
    }
    public function select_devices(){
        $this->db->where('from_id_fk',0);
        $this->db->where('type',1);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function getAhai($id){
        $this->db->where('from_id_fk',$id);
        $query =  $this->db->get("tech_device_card_settings");
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
    }
    /*************************************************************/
}