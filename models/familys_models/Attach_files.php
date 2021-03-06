<?php
class Attach_files extends CI_Model
{
    public function __construct()
    {
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
//-------------------------------
public function insert_files($all_files,$mother_national_num){
    $data['mother_national_num_fk']=$mother_national_num;
    $data['death_certificate']=$this->chek_Null($all_files['death_certificate']);
    $data['family_card']=$this->chek_Null($all_files['family_card']);
    $data['plowing_inheritance']=$this->chek_Null($all_files['plowing_inheritance']);
    $data['instrument_agency_with_orphans']=$this->chek_Null($all_files['instrument_agency_with_orphans']);
    $data['birth_certificate']=$this->chek_Null($all_files['birth_certificate']);
    $data['ownership_housing']=$this->chek_Null($all_files['ownership_housing']);
    $data['definition_school']=$this->chek_Null($all_files['definition_school']);
    $data['social_security_card']=$this->chek_Null($all_files['social_security_card']);
  //  $data['retirement_department']=$this->chek_Null($all_files['retirement_department']);
 //   $data['social_insurance']=$this->chek_Null($all_files['social_insurance']);
      $data['collected_files']=$this->chek_Null($all_files['collected_files']);
	$data['bank_statement']=$this->chek_Null($all_files['bank_statement']);
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];  
    $this->db->insert('family_attach_files',$data);
    $this->add_history(304,$mother_national_num);
}
 public function update_files($all_files,$mother_national_num){
    $all_files['date']=strtotime(date("Y-m-d",time()));
    $all_files['date_s']=time();
    $all_files['publisher']=$_SESSION['user_name']; 
    $this->db->where('mother_national_num_fk',$mother_national_num); 
    $this->db->update('family_attach_files',$all_files);
}
 //=======================================================================
 public function delete_file($mother_national_num,$data){
    $this->db->where('mother_national_num_fk',$mother_national_num); 
    $this->db->update('family_attach_files',$data);
 }
  //=======================================================================
  public function insert_all_files($mother_national_num,$all_img){
       $file_attach_id_fk=$this->input->post('file_attach_id_fk');
        foreach ($all_img as $key=>$value){
            $data['mother_national_num_fk'] = $mother_national_num;
            $data['file_attach_id_fk'] = $file_attach_id_fk[$key];
            $data['file_attach_name'] =$value;
             $this->db->insert('family_attach_files',$data);  
        }
        $this->add_history(304,$mother_national_num);
  }
   //=======================================================================
     public function select_data_table_2($mother_national_num){
        $this->db->select('family_attach_files.mother_national_num_fk ,
                           family_attach_files.file_attach_id_fk  ,
                           family_setting.title_setting');
        $this->db->from('family_attach_files');
        $this->db->join('family_setting', 'family_setting.id_setting = family_attach_files.file_attach_id_fk',"left");
        $this->db->where("mother_national_num_fk",$mother_national_num);
        $this->db->where("family_setting.id_setting != ",2106);
        $this->db->group_by("file_attach_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach( $query->result() as $row){
                $data[$i]->sub = $this->get_by_file_attach_id_fk($row->file_attach_id_fk,$mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }
   public function select_data_table($mother_national_num){
        $this->db->select('family_attach_files.mother_national_num_fk ,
                           family_attach_files.file_attach_id_fk  ,
                           family_setting.title_setting');
        $this->db->from('family_attach_files');
        $this->db->join('family_setting', 'family_setting.id_setting = family_attach_files.file_attach_id_fk',"left");
        $this->db->where("mother_national_num_fk",$mother_national_num);
        $this->db->group_by("file_attach_id_fk");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();$i=0;
            foreach( $query->result() as $row){
                $data[$i]->sub = $this->get_by_file_attach_id_fk($row->file_attach_id_fk,$mother_national_num);
                $i++;
            }
            return $data;
        }
        return false;
    }
  //=======================================================================
  public function get_by_file_attach_id_fk($file_attach_id_fk,$mother_national_num_fk){
        $this->db->select('mother_national_num_fk , file_attach_name  , id');
        $this->db->from('family_attach_files');
        $this->db->where("file_attach_id_fk",$file_attach_id_fk);
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
      //=======================================================================
    public function delete($Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete('family_attach_files');
    }
    public function get_all_files($mother_national_num)
    {
        $this->db->where('type',47);
        $query=$this->db->get('family_setting');
        $data=array();
        $x=0;
        if($query->num_rows()>0)
        {
            foreach ($query->result()as $row)
            {
                $data[$x]=$row;
                $data[$x]->file=$this->get_files($row->id_setting,$mother_national_num);
                $x++;
            }
            return $data;
            }else{
            return false;
        }
        }
    public function get_files($id,$mother_national_num)
    {
        $this->db->where('mother_national_num_fk',$mother_national_num);
        $this->db->where('file_attach_id_fk',$id);
        $query=$this->db->get('family_attach_files');
        if($query->num_rows()>0)
        {
            return $query->row()->file_attach_name;
        }else{
            return 0;
        }
    }
/********************************************************/
    public function insert_all_files_other($mother_national_num,$all_img){
       $file_attach_id_fk=$this->input->post('file_name_other');
        foreach ($all_img as $key=>$value){
            $data['mother_national_num_fk'] = $mother_national_num;
            $data['file_attach_id_fk'] = $file_attach_id_fk[$key];
            $data['file_attach_name'] =$value;
             $this->db->insert('family_attach_files_other',$data);
             
        }
        $this->add_history(304,$mother_national_num);
  }
      public function get_files_other($mother_national_num)
    {
        $this->db->where('mother_national_num_fk',$mother_national_num);
        // $this->db->where('file_attach_id_fk!=', 'مرفقات السكن');
        $query=$this->db->get('family_attach_files_other');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return 0;
        }
    }
   public function deleteOtherFiles($Conditions_arr){
        $this->db->where($Conditions_arr);
        $this->db->delete('family_attach_files_other');
    }
     //add_history
function add_history($action_code,$mother_id)
{
    
 $action_name= $this->db->where('code',$action_code)->get('osr_action_process')->row()->process_name;
    $data['action_code'] = $action_code;
    $data['action_name'] = $action_name;
    $data['mother_national_num'] = $mother_id;

    // if (key_exists($action, $actions)) {
    //     $data['action_n'] = $actions[$action];
    // }
    $data['date_action'] = date('Y-m-d');
    $data['time_action'] = date('h:i a');
    $data['publisher'] = $_SESSION["user_id"];
    $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
    $this->db->insert('osr_all_history', $data);
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
}//END CLASS 