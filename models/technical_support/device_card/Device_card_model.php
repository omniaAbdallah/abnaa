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
        $data['buy_date']= $this->input->post('buy_date');
        $data['estbdal_date']= $this->input->post('estbdal_date');
        $data['time_added']= date("H:i a");
        $data['date_added'] = date('Y-m-d');
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
        $data['buy_date']= $this->input->post('buy_date');
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
   ///////////////////////////yara2-3-2021

//    get_model_name
public function get_model_name($from_id)
    {
        return $this->db->where('id', $from_id)
            ->get('tech_device_card_settings')->row()->name;
    }
   public function get_devices_settings($type)
   {
       return $this->db->where('no3_device', $type)
           ->get('tech_device_card')->result();
   }

   public function get_all_emps()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->order_by('id','Asc');
        $this->db->where('employee_type', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
              
                $a++;
            }
            return $arr;
        } else {
            return 0;
        }
    }
    public function add_ohda()
    {

      

        $data['ohda_rkm']= $this->input->post('ohda_rkm');
        $data['ohda_type']= $this->input->post('ohda_type');
        if($data['ohda_type']==1)
        {
            $data['from_ohda_date']= $this->input->post('from_ohda_date');
            $data['to_ohda_date']= $this->input->post('to_ohda_date');
        }
        $data['ohda_date']= $this->input->post('ohda_date');
        $data['rkm']= $this->input->post('rkm');
        $data['no3_device']= $this->input->post('no3_device');
    
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['addition_device']= $this->input->post('addition_device');
        $data['brand_id_fk']= $this->input->post('brand_id_fk');
        $data['model_id_fk']= $this->input->post('model_id_fk');
        $data['describe']= $this->input->post('describe');


        $data['emp_name']= $this->input->post('emp_name');
        $data['emp_code']= $this->input->post('emp_code');
        $data['emp_id_fk']= $this->input->post('emp_id_fk');
        $data['job_title']= $this->input->post('job_title');
        $data['edara_n']= $this->input->post('edara_n');
        $data['qsm_n']= $this->input->post('qsm_n');
        $data['notes']= $this->input->post('notes');
   
        $data['value']= $this->input->post('value');
        $data['nsbet_ehlak']= $this->input->post('nsbet_ehlak');
        $data['date_added_device'] = $this->input->post('date_added');
        $data['estbdal_date']= $this->input->post('estbdal_date');
        $data['time_added']= date("H:i a");
        $data['date_added'] = date('Y-m-d');
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
        $this->db->insert('tech_device_ohda',$data);
      
    }
    public function update_ohda($id)
    {

      

        $data['ohda_rkm']= $this->input->post('ohda_rkm');
        $data['ohda_type']= $this->input->post('ohda_type');
        if($data['ohda_type']==1)
        {
            $data['from_ohda_date']= $this->input->post('from_ohda_date');
            $data['to_ohda_date']= $this->input->post('to_ohda_date');
        }
        else{
            $data['from_ohda_date']= '';
            $data['to_ohda_date']= '';
        }
        $data['ohda_date']= $this->input->post('ohda_date');
        $data['rkm']= $this->input->post('rkm');
        $data['no3_device']= $this->input->post('no3_device');
       
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['addition_device']= $this->input->post('addition_device');
        $data['brand_id_fk']= $this->input->post('brand_id_fk');
        $data['model_id_fk']= $this->input->post('model_id_fk');
        $data['describe']= $this->input->post('describe');
        $data['emp_name']= $this->input->post('emp_name');
        $data['emp_code']= $this->input->post('emp_code');
        $data['emp_id_fk']= $this->input->post('emp_id_fk');
        $data['job_title']= $this->input->post('job_title');
        $data['edara_n']= $this->input->post('edara_n');
        $data['qsm_n']= $this->input->post('qsm_n');
        $data['notes']= $this->input->post('notes');
    
        $data['value']= $this->input->post('value');
        $data['nsbet_ehlak']= $this->input->post('nsbet_ehlak');
        $data['date_added_device'] = $this->input->post('date_added');
        $data['estbdal_date']= $this->input->post('estbdal_date');
      
        $this->db->where('id',$id)->update('tech_device_ohda',$data);
      
    }
    public function delete_ohda($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_device_ohda');
    }
    public function get_ohda_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_device_ohda');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
           
         return $data;
        } else{
            return 0;
        }
    }
    public function get_all_ohda(){
        $query = $this->db->get('tech_device_ohda');
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
    /////////////////////////////////////////////////////////////////////
    public function add_technial_support()
    {

      

        $data['rkm_talb']= $this->get_last_rkm();
        $data['talb_type']= $this->input->post('talb_type');
        $data['talb_date']= $this->input->post('talb_date');
        $data['device_code']= $this->input->post('device_code');
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['wasf']= $this->input->post('wasf');
        $data['mada_hdoth']= $this->input->post('mada_hdoth');
        $data['emp_name']= $this->input->post('emp_name');
        $data['emp_code']= $this->input->post('emp_code');
        $data['emp_id_fk']= $this->input->post('emp_id_fk');
        $data['job_title']= $this->input->post('job_title');
        $data['edara_n']= $this->input->post('edara_n');
        $data['qsm_n']= $this->input->post('qsm_n');
        $data['wasf']= $this->input->post('wasf');
        $data['time_added']= date("H:i a");
        $data['date_added'] = date('Y-m-d');
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
        $this->db->insert('tech_device_technial_support',$data);
      
    }
    public function get_last_rkm()
    {
      
        $query = $this->db->get('tech_device_technial_support');
        if ($query->num_rows()>0){
            $data = $query->row()->id+1;
           
         return $data;
        } else{
            return 1;
        }
    }
    public function update_technial_support($id)
    {

      
        

     
        $data['talb_type']= $this->input->post('talb_type');
        $data['talb_date']= $this->input->post('talb_date');
        $data['device_code']= $this->input->post('device_code');
        $data['device_rkm']= $this->input->post('device_rkm');
        $data['wasf']= $this->input->post('wasf');
        $data['mada_hdoth']= $this->input->post('mada_hdoth');
        $data['emp_name']= $this->input->post('emp_name');
        $data['emp_code']= $this->input->post('emp_code');
        $data['emp_id_fk']= $this->input->post('emp_id_fk');
        $data['job_title']= $this->input->post('job_title');
        $data['edara_n']= $this->input->post('edara_n');
        $data['qsm_n']= $this->input->post('qsm_n');
        $data['wasf']= $this->input->post('wasf');
  
      
        $this->db->where('id',$id)->update('tech_device_technial_support',$data);
      
    }
    public function delete_technial_support($id){
        $this->db->where('id',$id);
        $this->db->delete('tech_device_technial_support');
    }
    public function get_technial_support_byId($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tech_device_technial_support');
        if ($query->num_rows()>0){
          //  return $query->row();
            $data = $query->row();
           
         return $data;
        } else{
            return 0;
        }
    }
    public function get_all_technial_support(){
        $query = $this->db->get('tech_device_technial_support');
        if ($query->num_rows()>0){
         $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $data[$i]->no3_talb_n= $this->get_id('tech_device_card_settings','id',$row->talb_type,'name');
             
                $i++;
            }
            return $data;
        } else{
            return false;
        }
    }
}