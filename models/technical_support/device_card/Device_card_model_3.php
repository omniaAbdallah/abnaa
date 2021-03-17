<?php
class Device_card_model extends CI_Model
{
    public function get_card_settings($type)
    {
        return $this->db->where('type', $type)
            ->get('tech_device_card_settings')->result();
    }
    
    public function get_model_settings($type,$from_id)
    {
        return $this->db->where('type', $type)->where('from_id_fk', $from_id)
            ->get('tech_device_card_settings')->result();
    }
    
    public function add_card()
    {
        $data['no3_device']= $this->input->post('no3_device');
        $data['device_code']= $this->input->post('device_code');
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['addition_device']= $this->input->post('addition_device');
        $data['brand_id_fk']= $this->input->post('brand_id_fk');
        $data['model_id_fk']= $this->input->post('model_id_fk');
        $data['describe']= $this->input->post('describe');
        $data['device_exist']= $this->input->post('device_exist');
        $data['geha_morda']= $this->input->post('geha_morda');
        $data['daman_duration']= $this->input->post('daman_duration');
        $data['value']= $this->input->post('value');
        $data['nsbet_ehlak']= $this->input->post('nsbet_ehlak');
        
        $data['estbdal_date']= $this->input->post('estbdal_date');
        $data['time_added']= date("H:i a");
        $data['date_added'] = date('Y-m-d g:i a');
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
        $this->db->insert('tech_device_card',$data);
      
    }
   
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
    public function get_card_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_device_card');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
           
         return $data;
        } else{
            return 0;
        }
    }
    public function update_card($id){
        $data['no3_device']= $this->input->post('no3_device');
        $data['device_code']= $this->input->post('device_code');
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['addition_device']= $this->input->post('addition_device');
        $data['brand_id_fk']= $this->input->post('brand_id_fk');
        $data['model_id_fk']= $this->input->post('model_id_fk');
        $data['describe']= $this->input->post('describe');
        $data['device_exist']= $this->input->post('device_exist');
        $data['geha_morda']= $this->input->post('geha_morda');
        $data['daman_duration']= $this->input->post('daman_duration');
        $data['value']= $this->input->post('value');
        $data['nsbet_ehlak']= $this->input->post('nsbet_ehlak');
        $data['estbdal_date']= $this->input->post('estbdal_date');
        $this->db->where('id',$id);
        $this->db->update('tech_device_card',$data);
    }
    public function get_all_card(){
        $query = $this->db->get('tech_device_card');
        if ($query->num_rows()>0){
         $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->no3_device_n= $this->get_id('tech_device_card_settings','id',$row->no3_device,'name');
                $data[$i]->brand_n= $this->get_id('tech_device_card_settings','id',$row->brand_id_fk,'name');
                $data[$i]->model_n= $this->get_id('tech_device_card_settings','id',$row->model_id_fk,'name');
                $i++;
            }
            return $data;
        } else{
            return false;
        }
    }
  
    public function delete_card($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_device_card');
    }
   
}