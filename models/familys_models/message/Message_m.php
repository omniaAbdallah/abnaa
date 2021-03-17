<?php
class Message_m extends CI_Model{
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
        $this->db->from('osr_message');
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result() ;
        }
        return false;
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
        public function select_where_cashing($Conditions_arr)
        {    
            $this->db->select('basic.file_num ,basic.mother_national_num  , basic.family_cat_name,
            basic.process_title,
            basic.contact_mob,
                                  mother.mother_national_num_fk ,mother.full_name ,
                                  father.full_name as father_full_name  ');
            $this->db->from("basic");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->where($Conditions_arr);
            if ($this->input->post('family_cat') &&(!empty($this->input->post('family_cat'))) && $this->input->post('family_cat') !='null') {
                $family_cat_arr=explode(',', $this->input->post('family_cat'));
                $this->db->where_in('basic.family_cat',$family_cat_arr);
            }
            if ($this->input->post('file_status') &&(!empty($this->input->post('file_status'))) && $this->input->post('file_status') !='null') {
                $file_status_arr=explode(',', $this->input->post('file_status'));
                $this->db->where_in('basic.file_status',$file_status_arr);
            }
            $this->db->order_by('basic.file_num', "ASC");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->result();
                $i = 0;
                foreach ($query->result() as $row) {
                    $i++;
                }
                return $data;
            }
            return false;
        }
        public function get_all_files(){
            $this->db->select('basic.*,
                               basic.mother_national_num     ,
                               basic.family_cat_name,
                               basic.process_title,
                               basic.contact_mob,
                               father.f_national_id     as  father_national,
                                father.full_name as father_full_name,
                               mother.full_name    ,
                               mother.mother_national_card_new     as  mother_new_card,
                               files_status_setting.title as process_title ,
                               files_status_setting.color as files_status_color ,
                               mother.categoriey_m as categorey
                                ');
            $this->db->from('basic');
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('files_status_setting', 'files_status_setting.id = basic.file_status',"left");
            $this->db->where('basic.final_suspend',4);
            $this->db->where('basic.deleted',0);
            $arr_file = array(1,2);
            $this->db->where_in('basic.file_status',$arr_file);
           $this->db->where('basic.file_update_date <=',date('Y-m-d'));
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->result();
                $i = 0;
                foreach ($query->result() as $row) {
                    $i++;
                }
                return $data;
            }
            return false;
        }
        public function get_new_files(){
            $this->db->select('basic.*,
                               basic.mother_national_num     ,
                               basic.family_cat_name,
                               basic.process_title,
                               basic.contact_mob,
                               father.f_national_id     as  father_national,
                                father.full_name as father_full_name,
                               mother.full_name    ,
                               mother.mother_national_card_new     as  mother_new_card,
                               mother.categoriey_m as categorey
                                ');
            $this->db->from('basic');
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->where('basic.suspend',0);
            $this->db->where('basic.deleted',0);
         $this->db->order_by('basic.id',"desc");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->result();
                $i = 0;
                foreach ($query->result() as $row) {
                    $i++;
                }
                return $data;
            }
            return false;
        }
        public function insert(){
             $data['f2a_search'] = $this->input->post('member_type');
            $data['group_name'] = $this->input->post('group_name');
            $data['f2a_search'] = $this->input->post('member_type');
            if($data['f2a_search']==1)
            {
            $data['family_cat'] = serialize($this->input->post('family_cat'));
            $data['file_status'] = serialize($this->input->post('file_status'));
            }
            $data['date'] = strtotime(date('Y-m-d'));
            $data['date_ar'] = date('Y-m-d');
            $data['time'] = date('H:i:s a');
            $data['publisher'] = $_SESSION["user_id"];
            $data['publisher_name'] = $this->getUserName($_SESSION["user_id"]); 
            $this->db->insert('osr_message',$data);
            $group_id_fk= $this->db->insert_id();
            $this->insert_details($group_id_fk,$this->input->post('family_cat'),$this->input->post('file_status'));
        }
public function delete($id)
{
    $this->db->where('id',$id)->delete('osr_message');
    $this->db->where('group_id_fk',$id)->delete('osr_message_details');
}
        public function update($id){
            $data['f2a_search'] = $this->input->post('member_type');
           $data['group_name'] = $this->input->post('group_name');
           $data['f2a_search'] = $this->input->post('member_type');
           if($data['f2a_search']==1)
           {
           $data['family_cat'] = serialize($this->input->post('family_cat'));
           $data['file_status'] = serialize($this->input->post('file_status'));
           }
           else{
            $data['family_cat'] = null;
            $data['file_status'] = null;
           }
           $data['date'] = strtotime(date('Y-m-d'));
           $data['date_ar'] = date('Y-m-d');
           $data['time'] = date('H:i:s a');
           $data['publisher'] = $_SESSION["user_id"];
           $data['publisher_name'] = $this->getUserName($_SESSION["user_id"]); 
           $this->db->where('id',$id)->update('osr_message',$data);
           $this->db->where('group_id_fk',$id)->delete('osr_message_details');
           $this->insert_details($id,$this->input->post('family_cat'),$this->input->post('file_status'));
       }
        public function  insert_details($group_id_fk,$family_cat,$file_status){
if($this->input->post('member_type')==1)
{
    $main=$this->select_where(array("basic.final_suspend" => 4),$family_cat,$file_status);
}
else if($this->input->post('member_type')==2)
{
    $main=$this->Message_m->get_all_files();
}
else if($this->input->post('member_type')==3)
{
    $main=$this->Message_m->get_new_files();
}
            foreach ($main as $row) {
                $data["group_id_fk"]=$group_id_fk;
                if($this->input->post('member_type')==3)
                {
                    $data["file_num"]=$row->id;
                }
                else{
                    $data["file_num"]=$row->file_num;
                }
                $data["father_name"]=$row->father_full_name;
                $data["mother_name"]=$row->full_name;
                $data["mother_national_num"]=$row->mother_national_num;
                $data["family_cat_name"]=$row->family_cat_name;
                $data["process_title"]=$row->process_title;
                $data["contact_mob"]=$row->contact_mob;
                $this->db->insert("osr_message_details",$data);
            }
        }
        public function select_where($Conditions_arr,$family_cat,$file_status)
        {    
            $this->db->select('basic.file_num ,basic.mother_national_num  , basic.family_cat_name,
            basic.process_title,
            basic.contact_mob,
                                  mother.mother_national_num_fk ,mother.full_name ,
                                  father.full_name as father_full_name  ');
            $this->db->from("basic");
            $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
            $this->db->where($Conditions_arr);
            if ((!empty($family_cat)) && $family_cat !='null') {
                $family_cat_arr= $family_cat;
                $this->db->where_in('basic.family_cat',$family_cat_arr);
            }
            if ((!empty($file_status) )&& $file_status !='null') {
                $file_status_arr=$file_status;
                $this->db->where_in('basic.file_status',$file_status_arr);
            }
            $this->db->order_by('basic.file_num', "ASC");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->result();
                $i = 0;
                foreach ($query->result() as $row) {
                    $i++;
                }
                return $data;
            }
            return false;
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
    public function select_sarf_detals($id){
        $this->db->select('osr_message_details.* ,
        osr_message.*');
        $this->db->from("osr_message_details");
        $this->db->join('osr_message', 'osr_message.id = osr_message_details.group_id_fk',"left");
       $this->db->order_by("osr_message_details.file_num","ASC");
        $this->db->where("group_id_fk",$id);
        $query = $this->db->get(); // banks_settings
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach( $query->result() as $row){
            }
            return $data;
        }
        return false;
    }
    public function getByArray($id){
           $this->db->select('*');
         $this->db->from('osr_message');
         $this->db->where(array("id"=>$id));
         $query = $this->db->get();
         return $query->row_array();
     }
//yara_strat
// insert_send_message_osr
public function get_message_rkm()
{
    $this->db->select_max('id');
    $query = $this->db->get('osr_group_messages');
    if ($query->num_rows() > 0) {
        return $query->row()->id+1;
    } else {
        return 1;
    }
}
public function insert_send_message_osr(){
   $data['message_date'] = $this->input->post('message_date');
   $data['message_rkm'] = $this->get_message_rkm();
   $data['f2a_search'] = $this->input->post('member_type');
   $data['message']=$this->input->post('message');
   if($data['f2a_search']==1)
   {
   $data['family_group'] = $this->input->post('family_group');
   }
   $data['namozag_message']=$this->input->post('family_group');
   $data['date'] = strtotime(date('Y-m-d'));
   $data['date_ar'] = date('Y-m-d');
   $data['time'] = date('H:i a');
   $data['publisher'] = $_SESSION["user_id"];
   $data['publisher_name'] = $this->getUserName($_SESSION["user_id"]); 
   $this->db->insert('osr_group_messages',$data);
   $message_id_fk= $this->db->insert_id();
   $this->insert_details_message_osr($message_id_fk);
}
public function update_message($id){
    $data['f2a_search'] = $this->input->post('member_type');
    $data['message_date'] = $this->input->post('message_date');
   if($data['f2a_search']==1)
   {
    $data['family_group'] = $this->input->post('family_group');
   }
   else{
    $data['family_group'] = null;
   }
   $data['namozag_message']=$this->input->post('family_group');
   $data['message']=$this->input->post('message');
   $this->db->where('id',$id)->update('osr_group_messages',$data);
   $this->db->where('message_id_fk',$id)->delete('osr_group_messages_details');
   $this->insert_details_message_osr($id);
}
public function getByArray_message($id){
    $this->db->select('*');
  $this->db->from('osr_group_messages');
  $this->db->where(array("id"=>$id));
  $query = $this->db->get();
  return $query->row_array();
}
public function  insert_details_message_osr($message_id_fk){
    if($this->input->post('member_type')==1)
    {
        $main=$this->select_where_group(array("osr_message_details.group_id_fk" => $this->input->post('family_group')));
        foreach ($main as $row) {
            $data["message_id_fk"]=$message_id_fk;
            $data["file_num"]=$row->file_num;
            $data["father_name"]=$row->father_name;
            $data["mother_name"]=$row->mother_name;
            $data["mother_national_num"]=$row->mother_national_num;
            $data["contact_mob"]=$row->contact_mob;
            $this->db->insert("osr_group_messages_details",$data);
        }
    }
    else if($this->input->post('member_type')==2)
    {
        $x = $this->input->post('file_num');
        if ($x != null) {
            for ($i = 0; $i < sizeof($x); $i++) {
              $data['message_id_fk'] = $message_id_fk;
            $data['file_num'] = $x[$i];
            $data["father_name"]=$this->get_all_files_by_num($x[$i])->father_full_name;
            $data["mother_name"]=$this->get_all_files_by_num($x[$i])->full_name;
            $data["mother_national_num"]=$this->get_all_files_by_num($x[$i])->mother_national_num;
            $data["contact_mob"]=$this->get_all_files_by_num($x[$i])->contact_mob;
                $this->db->insert('osr_group_messages_details', $data);
            }
        }
    }
}
public function select_sarf_detals_message($id){
    $this->db->select('osr_group_messages_details.* ,
    osr_group_messages.*');
    $this->db->from("osr_group_messages_details");
    $this->db->join('osr_group_messages', 'osr_group_messages.id = osr_group_messages_details.message_id_fk',"left");
    $this->db->order_by("osr_group_messages_details.file_num","ASC");
    $this->db->where("message_id_fk",$id);
    $query = $this->db->get(); 
    if ($query->num_rows() > 0) {
        $data=$query->result();$i=0;
        foreach( $query->result() as $row){
        }
        return $data;
    }
    return false;
}
public function get_all_files_by_num($file_num){
    $this->db->select('basic.file_num,
                        basic.mother_national_num,
                        basic.contact_mob,
                        father.full_name as father_full_name,
                        mother.full_name
                        ');
    $this->db->from('basic');
    $this->db->join('father', 'father.mother_national_num_fk = basic.mother_national_num',"left");
    $this->db->join('mother', 'mother.mother_national_num_fk = basic.mother_national_num',"left");
    $this->db->where('basic.file_num',$file_num);
    $query = $this->db->get();
    if (!empty($query)) {
        $data = $query->row();
        return $data;
    }
    return false;
}
public function delete_message($id)
{
    $this->db->where('id',$id)->delete('osr_group_messages');
    $this->db->where('message_id_fk',$id)->delete('osr_group_messages_details');
}
/*public function select_all_messages(){
    $this->db->select('*');
    $this->db->from('osr_group_messages');
    $this->db->order_by("id","DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result() ;
    }
    return false;
}*/
public function select_all_messages(){
    $this->db->select('*');
    $this->db->from('osr_group_messages');
    $this->db->order_by("id","DESC");
    $query = $this->db->get();
    if ($query->num_rows()>0){
        $i = 0;
        $data=$query->result();
        foreach ($query->result() as $row) {
            if($row->f2a_search==1)
            {
$data[$i]->family_group_name=$this->get_table_by_id("osr_message",array("id",$row->family_group))->group_name;
            }
        $i++;
    }
    return $data;
}
    return false;
}
public function select_where_group($Conditions_arr)
{    
    $this->db->select('*');
    $this->db->from("osr_message_details");
    $this->db->where($Conditions_arr);
    $this->db->order_by('file_num', "ASC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
            $i++;
        }
        return $data;
    }
    return false;
}
// send_message
public function send_message($id)
{
    $data['send_message']=1;
    $this->db->where('id',$id)->update('osr_group_messages',$data);
}
//////////////////////////نماذج الرسائل////////////////

public function select_all_namazeg_message(){
    $this->db->select('*');
    $this->db->from('osr_namazeg_messages');
    $this->db->order_by("id","DESC");
    $query = $this->db->get();
    if ($query->num_rows()>0){
        $i = 0;
        $data=$query->result();
      
    return $data;
}
    return false;
}
public function delete_namazeg_message($id)
{
    $this->db->where('id',$id)->delete('osr_namazeg_messages');
  
}
public function getByArray_namazeg_message($id){
    $this->db->select('*');
  $this->db->from('osr_namazeg_messages');
  $this->db->where(array("id"=>$id));
  $query = $this->db->get();
  return $query->row_array();
}
public function add_namazeg_message(){

    $data['namozeg_name'] = $this->input->post('namozeg_name');
    $data['namozeg_details']=$this->input->post('namozeg_details');

    $this->db->insert('osr_namazeg_messages',$data);
  
 }
 public function update_namazeg_message($id){
    $data['namozeg_name'] = $this->input->post('namozeg_name');
    $data['namozeg_details']=$this->input->post('namozeg_details');
    $this->db->where('id',$id)->update('osr_namazeg_messages',$data);
 }
//  get_namozag_byId
public function get_namozag_byId($id){
    $this->db->select('*');
  $this->db->from('osr_namazeg_messages');
  $this->db->where("id",$id);
  $query = $this->db->get();
  return $query->row();
}
// update_message
}?>