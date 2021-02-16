<?php

class Dwam_model extends CI_Model
{
    
public function __construct() {

        parent::__construct();

    }
      public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
     private function GetHours($test){
     $t = date('H:i',strtotime($test));
     return $t;

     }
    
    //==========================================================
        public function get_emp_data($emp_id)
    {
        $this->db->select('employees.id,employees.employee,employees.emp_code')
            ->from('employees')
            ->where('employees.id',$emp_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    

        public function insert(){

      
           $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
           $data['emp_id']=$this->chek_Null( $this->input->post('emp_id'));
           $data['device_id_fk']=$this->chek_Null( $this->input->post('device_id_fk'));
           $data['num_in_device']=$this->chek_Null( $this->input->post('num_in_device'));
           $data['period_id_fk']=$this->chek_Null($this->input->post('period_id_fk'));
           $data['from_day']=$this->chek_Null( $this->input->post('from_day'));
           $data['to_day']=$this->chek_Null( $this->input->post('to_day'));
           $data['no3_dawam']=$this->chek_Null( $this->input->post('no3_dawam'));
           
           if($this->get_employee($this->input->post('emp_code'))>0){
               $this->db->where('emp_code',$this->input->post('emp_code'));
               $this->db->update('hr_emp_dwam_details',$data);
           }else{
               $this->db->insert('hr_emp_dwam_details',$data);
           }
       }
    
    
     public function get_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('hr_emp_dwam_details');
        return $query->num_rows();
}   


  public function get_always_setting(){
        $this->db->select('*');
        $this->db->from('always_setting');  
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    

  public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
  public function get_field($table){
    $query = $this->db->query("select * from ".$table);
      $field_array = $query->list_fields();
    return $field_array;
  } 
        public function getByArray($table,$arr){
        $h = $this->db->get_where($table,$arr);
        return $h->row_array();
    }
    //==================================================================================
    public function insert_emp_dwam(){
         $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
        $data['always_id_fk'] = $this->input->post('always_id_fk');
        $data['period_id_fk'] = $this->input->post('period_id_fk');
        $data['emp_id'] = $this->input->post('emp_id');
        $data['emp_code'] = $this->input->post('emp_code');

        $data['attend_time'] = $this->GetHours($this->input->post('attend_time'));
        $data['leave_time']  =$this->GetHours( $this->input->post('leave_time'));
        $data['start_enter'] = $this->GetHours($this->input->post('start_enter'));
        $data['end_enter'] = $this->GetHours($this->input->post('end_enter'));
        $data['start_out'] = $this->GetHours($this->input->post('start_out'));
        $data['end_out']   = $this->GetHours($this->input->post('end_out'));
       
        $data['from_date'] = strtotime( $this->input->post('from_date') );
        $data['from_date_ar'] = $this->input->post('from_date');
        $data['to_date'] = strtotime ($this->input->post('to_date') );
        $data['to_date_ar'] = $this->input->post('to_date');
        
        $days =explode(',',$this->input->post('days'));
           foreach ($days as $day){
                if(in_array($day,$days_en)){
                    $data[$day] = 1;
                }
           }
       $this->db->insert('hr_emp_dwam', $data);
    }
    //------------------------------------------------
    public function update_emp_dwam($id){
         $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
       // $data['always_id_fk'] = $this->input->post('always_id_fk');
       // $data['period_id_fk'] = $this->input->post('period_id_fk');
       // $data['emp_id'] = $this->input->post('emp_id');
        
        $data['attend_time'] = $this->GetHours($this->input->post('attend_time'));
        $data['leave_time']  =$this->GetHours( $this->input->post('leave_time'));
        $data['start_enter'] = $this->GetHours($this->input->post('start_enter'));
        $data['end_enter'] = $this->GetHours($this->input->post('end_enter'));
        $data['start_out'] = $this->GetHours($this->input->post('start_out'));
        $data['end_out']   = $this->GetHours($this->input->post('end_out'));
       
        $data['from_date'] = strtotime( $this->input->post('from_date') );
        $data['from_date_ar'] = $this->input->post('from_date');
        $data['to_date'] = strtotime ($this->input->post('to_date') );
        $data['to_date_ar'] = $this->input->post('to_date');
        
        foreach ($days_en as $name){
            $data[$name] =0;
        }
        $days =explode(',',$this->input->post('days_update'));
        foreach ($days as $day){

            if(in_array($day,$days_en)){
                $data[$day] = 1;
            }

        }
        $this->db->where("id",$id);
        $this->db->update('hr_emp_dwam', $data);
    }
    //==================================================================================
    public function get_my_dwam($emp_id){
        $this->db->select('hr_emp_dwam.*,
                           always_setting.id as always_setting_id ,always_setting.name');
        $this->db->from("hr_emp_dwam");
        $this->db->join('always_setting', 'always_setting.id = hr_emp_dwam.always_id_fk','left');
        $this->db->where("emp_id",$emp_id);
        $this->db->group_by('always_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x=0;$data =$query->result();
            foreach ($query->result() as $row) {
                $data[$x]->period_num = $this->get_period_num($row->always_id_fk,$emp_id);
                $x++;
                }
            return $data;
        }
        return false ;
    }
    public function get_period_num($always_id_fk,$emp_id){
        $this->db->select('*');
        $this->db->from("hr_emp_dwam");
        $this->db->where("always_id_fk",$always_id_fk);
        $this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        return false ;
    }
    //==================================================================================
     public function get_emp_dwam($id){
        $h = $this->db->get_where("hr_emp_dwam",array("id"=>$id));
        return $h->row_array();
    }
    //==================================================================================
     public function delete_emp_dwam($id){
          $this->db->where(array("id"=>$id));
        $this->db->delete("hr_emp_dwam");
    }
    //===================================================================================
    public  function get_last_period_id_fk($emp_id){
        $this->db->select('period_id_fk');
        $this->db->from("hr_emp_dwam");
        $this->db->where("emp_id",$emp_id);
        $this->db->order_by("period_id_fk","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->period_id_fk + 1;
            }
            return $data;
        }
        return 1;
    }

    public function get_one_employee($id){
        $this->db->select('employees.* , 
                           admin_t.name as admin_name ,
                           depart_t.name as depart_name ,
                           all_defined_setting.defined_title as degree_name');
        $this->db->from("employees");
        $this->db->join('department_jobs as admin_t', 'admin_t.id = employees.administration',"left");
        $this->db->join('department_jobs as depart_t', 'depart_t.id = employees.department',"left");
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
        $this->db->where("employees.id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x]->manger_name = $this->get_emp_name($row->manger);
                $data[$x]->having_all_value = $this->get_emp_money($row->manger)["having_all_value"];
                $data[$x]->discut_all_value = $this->get_emp_money($row->manger)["discut_all_value"];

                $data[$x]->sum_all_esthqaq = $this->select_from_emp_badlat_discount_details($row->id,1);
                $data[$x]->sum_all_estqta3 = $this->select_from_emp_badlat_discount_details($row->id,2);
                // $data[$x]->sum_all_estqta3 = $this->select_from_emp_badlat_discount_details($row->manger)["discut_all_value"];
                $data[$x]->order = $this->get_orders($id);
                $x++;
            }
            return $data;
        }
        return false;
    }

    public function get_emp_name($id){
        $h = $this->db->get_where("employees",array("id"=>$id));
        $data= $h->row_array();
        return $data["employee"];
    }


    public function select_from_emp_badlat_discount_details($id,$type)
    {
        $this->db->select('*');
        $this->db->where('badl_type ',$type);
        $this->db->where('emp_code ',$id);
        $query = $this->db->get('emp_badlat_discount_details');
        if ($query->num_rows() > 0) {
            $data =0;
            foreach ($query->result() as $row) {
                $data += $row->value;
            }
            return $data;
        }
        return 0;
    }


    //-----------------------------------------------
    public function get_emp_money($id){
        $h = $this->db->get_where("finance_employes",array("id"=>$id));
        $data= $h->row_array();
        return $data;
    }


    public function get_orders($id)
    {
        $this->db->where('emp_id_fk',$id);
        $query=$this->db->get('hr_mandate_orders');
        return $query->num_rows();

    }


}// END CLASS

?>