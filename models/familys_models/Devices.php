<?php
class Devices extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }
   /* public  function  insert($mother_national_num){
         $count=1;
        for ($a=0;$a<$_POST['max'];$a++){
          $data['mother_national_num_fk'] = $mother_national_num;
            $data['d_house_device_id_fk'] = $this->input->post('d_house_device_id_fk'.$count);
            $data['d_count'] = $this->input->post('d_count'.$count);
            $data['d_house_device_status_id_fk'] =$this->input->post('d_house_device_status_id_fk'.$count);
             $data['d_note'] = $this->input->post('d_note'.$count);
            $this->db->insert('devices',$data);
            $count++;
        }
    }*/
        public  function  insert($mother_national_num){
         $count=1;
        for ($a=0;$a<sizeof($_POST['d_house_device_id_fk']);$a++){
          $data['mother_national_num_fk'] = $mother_national_num;
            $data['d_house_device_id_fk'] = $this->input->post('sub_cat')[$a];
            $data['d_count'] = $this->input->post('d_count')[$a];
            $data['d_house_device_status_id_fk'] =$this->input->post('d_house_device_status_id_fk')[$a];
             $data['d_note'] = $this->input->post('d_note')[$a];
            $this->db->insert('devices',$data);
            $this->add_history(205,$mother_national_num);

            $count++;
        }
    }
    //=======================================================================
    public  function  update($mother_id){
        for($a =1;$a<=$_POST['max_edit'];$a++){
           $input_post=$this->input->post('d_house_device_id_fk'.$a);
            if(!empty($input_post)) {
                $data['d_house_device_id_fk'] = $this->input->post('d_house_device_id_fk' . $a);
            }
            $out=$this->input->post('d_count'.$a);
            if(!empty($out)) {
            $data['d_count']= $this->input->post('d_count'.$a);
            }
            $out2=$this->input->post('d_house_device_status_id_fk'.$a);
            if(!empty($out2)) {
            $data['d_house_device_status_id_fk']= $this->input->post('d_house_device_status_id_fk'.$a);
            }
            if(!empty($this->input->post('d_note'.$a))) {
            $data['d_note']=$this->input->post('d_note'.$a);
            }
            if($_POST['type'.$a] == 'edit') {
                $this->db->where('id', $_POST['id'.$a]);
                $this->db->update('devices', $data);
                $this->add_history(206,$mother_national_num);
            }
        }
               $d =$_POST['max'] ;
        for($s = 0; $s<$_POST['max_insert'];$s++){
            $d++;
                if ($_POST['type' . $d] == 'insert') {
                    $v['mother_national_num_fk']=$mother_id;
                    $v['d_house_device_id_fk'] = $this->chek_Null($this->input->post('d_house_device_id_fk' . $d));
                    $v['d_count'] = $this->chek_Null($this->input->post('d_count' . $d));
                    $v['d_house_device_status_id_fk'] = $this->chek_Null($this->input->post('d_house_device_status_id_fk' . $d));
                    $v['d_note'] = $this->chek_Null($this->input->post('d_note' . $d));
               $this->db->insert('devices', $v);
               $this->add_history(205,$mother_national_num);
                }
        }
    }
//===============================================================
    public function delete($from,$id){
        $this->db->where('id',$id);
        $this->db->delete($from);
       
    }
//===============================================================    
    public function select_ids(){
        $this->db->select('*');
        $this->db->from("electrical_equipment");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }
        return false;
    }
//=========================================================
   /* public function select_where($mother_national_num_fk){
        $this->db->select('*');
        $this->db->from('devices');
        $this->db->join('family_setting',"family_setting.id_setting=devices.d_house_device_id_fk","left");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }*/
    public function select_where($mother_national_num_fk){
        $this->db->select('devices.* , devices.id as devices_id ,
                              products_sub.* ,
                              products_main.name as main_name ');
        $this->db->from('devices');
        $this->db->join('products  products_sub',"products_sub.id=devices.d_house_device_id_fk","left");
        $this->db->join('products  products_main',"products_main.id=products_sub.from_id","left");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
//=========================================================
public function insert_device(){
      $data['title']= $this->input->post('title');
        $this->db->insert('electrical_equipment', $data);
} 
public function update_device($id){
     $data['title']= $this->input->post('title');
     $this->db->where('id', $id);
                $this->db->update('electrical_equipment', $data);
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
}// END CLASS