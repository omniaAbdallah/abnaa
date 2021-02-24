<?php
class Osr_crm_m extends CI_Model{
    public function __construct(){
        parent:: __construct();
      
    } 
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    public function select_all(){
        $this->db->select('*');
        $this->db->from('osr_crm');
    //
    $this->db->where("zyraa_id_fk",null);
    $this->db->where("related_to_zyraa",'no');
    //
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
         
            $i=0;
            foreach ($query_result as $row) {
      
             $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal); 
             $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
             $i++; 
            }
            return $query_result;
        }
       return false;
    } 

       public function get_count_etsal()
    {
        $this->db->select('osr_crm.*');
        $this->db->from('osr_crm');

        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query;
    }
    public function select_all_youm(){
        $this->db->select('*');
        $this->db->from('osr_crm');
    //
    $this->db->where("zyraa_id_fk",null);
    $this->db->where("related_to_zyraa",'no');
        $this->db->where("date_added",strtotime(date('Y-m-d')));
    //
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
         
            $i=0;
            foreach ($query_result as $row) {
      
             $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal); 
             $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
             $i++; 
            }
            return $query_result;
        }
       return false;
    } 
    // select_all_etsal
    public function select_all_etsal($id){
        $this->db->select('*');
        $this->db->from('osr_crm');
        //
        $this->db->where("zyraa_id_fk",$id);
        $this->db->where("related_to_zyraa",'yes');
        //
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
         
            $i=0;
            foreach ($query_result as $row) {
      
             $query_result[$i]->method_etsal_name = $this->get_settting($row->wasela_etsal); 
             $query_result[$i]->natega_etsal_name = $this->get_settting($row->contact_result);
             $i++; 
            }
            return $query_result;
        }
       return false;
    }

    public function  get_settting($id){   
        $this->db->select("*");
        $this->db->from("osr_crm_settings");
        $this->db->where("conf_id",$id);
        $query = $this->db->get()->row()->title;
        return $query;
    
    }
   
    public function get_id($table,$where,$id,$select){
        $h = $this->db->get_where($table, array($where=>$id));
        $arr= $h->row_array();
        return $arr[$select];
    }
        public function get_table($table,$arr){
            if (!empty($arr)){
                $this->db->where($arr);
            }
            $query = $this->db->get($table);
            if ($query->num_rows()>0){
                return $query->result();
            } else{
                return false;
            }
        }
        public function get_table_by_id($table,$arr){
    
            if (!empty($arr)){
    
                $this->db->where($arr);
    
            }
    
            $query = $this->db->get($table)->row();
    
                return $query;
    
        }

        


        public function insert(){
            $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
            
           $data['contact_date'] = $this->input->post('contact_date');
           $data['contact_time'] =  date('H:i a');
           $data['date_added'] =  strtotime(date('Y-m-d'));
           $data['wasela_etsal'] = $this->input->post('wasela_etsal');
           $data['contact_result'] = $this->input->post('contact_result');
         //  $data['file_num'] =$this->get_file_num($data['mother_national_num']);
           
           $data['notes'] = $this->input->post('visit_result');
           $data['emp_code'] = $_SESSION["user_id"];
           $data['emp_name'] = $this->getUserName($_SESSION["user_id"]); 
           $this->db->insert('osr_crm',$data);
         
       }
    //    insert_etsal
    public function insert_etsal($id){
        $data['zyraa_id_fk'] = $id;
        $data['related_to_zyraa'] ='yes';
        $data['mother_national_num'] = $this->input->post('mother_national_num');
       $data['contact_date'] = $this->input->post('contact_date');
       $data['contact_time'] =  date('H:i a');
       $data['date_added'] =  strtotime(date('Y-m-d'));
       $data['wasela_etsal'] = $this->input->post('wasela_etsal');
       $data['contact_result'] = $this->input->post('contact_result');
      // $data['file_num'] =$this->get_file_num($data['mother_national_num']);
         $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
       $data['notes'] = $this->input->post('visit_result');
       $data['emp_code'] = $_SESSION["user_id"];
       $data['emp_name'] = $this->getUserName($_SESSION["user_id"]); 
       $this->db->insert('osr_crm',$data);
     
   }
    
       public function update($id){
        $data['mother_national_num'] = $this->input->post('mother_national_num');
        $data['osra_id'] =$this->get_osra_details($this->input->post('mother_national_num'),'id');
        $data['file_num'] =$this->get_osra_details($this->input->post('mother_national_num'),'file_num');
       // $data['file_num'] =$this->get_file_num($data['mother_national_num']); 

           $data['contact_date'] = $this->input->post('contact_date');
           $data['contact_time'] =  date('H:i a');
           $data['wasela_etsal'] = $this->input->post('wasela_etsal');
           $data['contact_result'] = $this->input->post('contact_result');
           $data['details'] = $this->input->post('visit_result');
           
          $this->db->where('id',$id)->update('osr_crm',$data);
        
      }
    
      public function get_file_num($mother_national_num)
      {
         $query = $this->db->where('mother_national_num',$mother_national_num)->get('basic')->row();
         if ($query ->file_num !=0) {
             return $query->file_num;
         } else {
             return $query->id;
         }
      }
    
    public function get_osra_details($mother_national_num,$val){
        $this->db->where('mother_national_num', $mother_national_num);
        $query = $this->db->get('basic');
        if ($query->num_rows() > 0) {
            return $query->row()->$val;
        } else {
            return false;

        }
    }
          //new_funnccc
    public function check_date($visit_date,$visit_time_from,$visit_time_to)
    {
        $this->db->select('visit_date');
        $this->db->from("osr_crm");
        $this->db->where("visit_date", $visit_date);
        $this->db->where("visit_time_from", $visit_time_from);
        $this->db->where("visit_time_to", $visit_time_to);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }
    public function get_fasel_zamni()
    {
    $this->db->select('fasel_zeyara');
    $this->db->from('osr_main_setting');
    $this->db->where(array("id"=>1));
    $query = $this->db->get()->row()->fasel_zeyara;
    return $query;
    }
    public function delete($id)
    {
        $this->db->where('id',$id)->delete('osr_crm');
    
    }
            

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id",$user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if($data->role_id_fk == 1 or $data->role_id_fk == 5)
            {
                return  $data->user_username;
            }
            elseif($data->role_id_fk == 2)
            {
                $id    = $data->user_name;
                $table = 'magls_members_table';
                $field = 'member_name';
            }
            elseif($data->role_id_fk == 3)
            {
                $id    = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            elseif($data->role_id_fk == 4)
            {
                $id    = $data->user_name;
                $table = 'general_assembley_members';
                $field = 'name'; 
            }
            return $this->getUserNameByRoll($id,$table,$field);
        }
        return false;
    }
    public function getUserNameByRoll($id,$table,$field)
    {
        return $this->db->where('id',$id)->get($table)->row_array()[$field];
    } 

 
    public function getByArray($id){
           $this->db->select('*');
         $this->db->from('osr_crm');
         $this->db->where(array("id"=>$id));
         $query = $this->db->get();
         return $query->row_array();
     }

       
}?>