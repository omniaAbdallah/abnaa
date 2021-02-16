<?php
class Users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function record_count()
    {
        return $this->db->count_all("users");
    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val=0;
            return $val;
        }else{
            return $post_value;
        }
    }
//--------------------------------------------------
    public function fetch_users($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->member_name = $this->get_member_name($row->emp_code);
                  $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                 $i++;
            }
            return $data;
        }
        return false;
    }
    
    
        public function fetch_users_profile($limit, $start,$user_id){
        $this->db->select('*');
        $this->db->from('users');
         $this->db->where('user_id', $user_id);
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->member_name = $this->get_member_name($row->emp_code);
                 $data[$i]->emp_name = $this->get_emp_name($row->emp_code);
                // $data[$i]->emp_data = $this->emp_reportBy_id($row->emp_code); 
                 $data[$i]->member_name_data = $this->get_member_data($row->emp_code); 
                 $data[$i]->emp_data = $this->get_one_employee($row->emp_code);
                 
                 
                 $i++;
            }
            return $data;
        }
        return false;
    }
    //=========================================================================
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
            $data = $query->row();
            $data->manger_name = $this->get_emp_name($data->manger);
            $data->sum_all_esthqaq = $this->select_from_emp_badlat_discount_details($data->id,1);
            $data->sum_all_estqta3 = $this->select_from_emp_badlat_discount_details($data->id,2);
            return $data;
        }
        return false;
    }
    public function select_from_emp_badlat_discount_details($id,$type){
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
    //=========================================================================
 public  function get_member_name($id){
    
    $h = $this->db->get_where("magls_members_table", array('id'=>$id));
    $arr= $h->row_array();
    return $arr['member_name'];

}
public  function get_member_data($id){
    
    $h = $this->db->get_where("magls_members_table", array('id'=>$id));
    $arr= $h->row_array();
    return $arr;

}
   
 public  function get_emp_name($id){
    
    $h = $this->db->get_where("employees", array('id'=>$id));
    $arr= $h->row_array();
    return $arr['employee'];

}


 
public function update_approved_user($id,$table,$value){

    if($value == 1){
       $myval = 0;
    }elseif($value == 0){
        $myval = 1; 
     }    
    $update = array(
        'approved'=>$myval
    
    );
    
    $this->db->where('user_id', $id);
    if($this->db->update(''.$table.'',$update)) {
    return true;
    }else{
        return false;
    }
} 
       
    
    
    
    
     public function insert(){

  /*     echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        $password=$this->input->post('user_pass',true);
        $password=sha1(md5($password));
        $data['user_pass'] = $password;
        $data['user_name'] = $this->chek_Null($this->input->post('user_name'));
        $data['user_username'] = $this->chek_Null($this->input->post('user_name'));
        $data['role_id_fk'] = $this->chek_Null($this->input->post('role_id_fk'));
        $data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));
        $data['user_id_number'] = $this->chek_Null($this->input->post('id_number'));
        $emp_code=$this->input->post('emp_code');
        if(!empty($emp_code)){
        $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
        }
        $this->db->insert('users',$data);




      //  $data['user_username'] = $this->chek_Null($this->input->post('user_name'));
       // $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));

        //$data['user_email'] = $this->chek_Null($this->input->post('user_email'));

        /*if($this->input->post('role_id_fk') == 0){
          $var = 1;
          $var2 = 0;
        }elseif($this->input->post('role_id_fk') == 1){
             $var = 3;
             $var2 =  $this->chek_Null($this->input->post('emp_code'));
        }elseif($this->input->post('role_id_fk') == 3){
              $var = 2;


              $var2 =  $this->chek_Null($this->input->post('member_id'));
        }

        $data['role_id_fk'] =$var;
        $data['emp_code'] = $var2;*/


        //$data['head_dep_id_fk'] = $this->chek_Null($this->input->post('head_dep_id_fk'));
        //$data['dep_job_id_fk'] = $this->chek_Null($this->input->post('dep_job_id_fk'));
        //$data['administration_id'] = $this->chek_Null($this->input->post('administration_id'));
        //$data['user_photo'] = $file;
/*        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;*/


    }
    
    
    
        public function update($id)
{
    $password=$this->input->post('user_pass',true);
    if(!empty($password)){
    $password=sha1(md5($password));
    $data['user_pass'] = $password;
}
   // $password=sha1(md5($password));
    
    
   // $data['user_pass'] = $password;
    $data['user_name'] = $this->chek_Null($this->input->post('user_name'));
    $data['user_username'] = $this->chek_Null($this->input->post('user_name'));
    $data['role_id_fk'] = $this->chek_Null($this->input->post('role_id_fk'));
    $data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));
    $data['user_id_number'] = $this->chek_Null($this->input->post('id_number'));
    $emp_code=$this->input->post('emp_code');
    if(!empty($emp_code)){
        $data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
    }
    $this->db->where('user_id', $id);
    $this->db->update('users', $data);
}


    public function getById($id){
        $h = $this->db->get_where("users", array('user_id'=>$id));
        return $h->row_array();
    }
    
    
  /*  public function insert($file)
    {
        $password = $this->input->post('user_pass', true);
        $password = sha1(md5($password));
        
        $data = array(
            "user_name"     => $this->input->post('user_name'),
            "user_username" => $this->input->post('user_username'),
            "user_pass"     => $password,
            "user_email"    => $this->input->post('user_email'),
            "role_id_fk"    => $this->input->post('role_id_fk'),
            "head_dep_id_fk"=> $this->input->post('head_dep_id_fk'),
            "user_phone"    => $this->input->post('user_phone'),
            "doctor_id"     => $this->input->post('doc_id'),
            "user_photo"    => $file
        );
        $data['emp_code'] = 0;
        $data["dep_id"] = 0;
        if($this->input->post('role_id_fk') == 1){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
            $this->db->where('id', $data['emp_code']);
            $query = $this->db->get('employees');
            $r = $query->row_array();
            $data["dep_id"] = $r['administration'];
        }
        if($this->input->post('role_id_fk') == 4){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
        }
        if($this->input->post('role_id_fk') == 5){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
        }
        if($file == ''){
            $data['user_photo'] = 'user.png';
        }
        $done = $this->db->insert('users', $data);
        if ($done == 1) {
            return true;
        } else {
            return false;
        }
    }
*/
    public function display($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }
    
    public function display_doc($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

/*
    public function insert($file){
        $password=$this->input->post('user_pass',true);
        $password=sha1(md5($password));

   
       
$data['user_name'] = $this->chek_Null($this->input->post('user_name'));
$data['user_username'] = $this->chek_Null($this->input->post('user_name'));
$data['emp_code'] = $this->chek_Null($this->input->post('emp_code'));
$data['user_pass'] = $password;
$data['user_email'] = $this->chek_Null($this->input->post('user_email'));

if($this->input->post('role_id_fk') == 0){
  $var = 1;  
  $var2 = 0;
}elseif($this->input->post('role_id_fk') == 1){
     $var = 3; 
     $var2 =  $this->chek_Null($this->input->post('emp_code'));
}elseif($this->input->post('role_id_fk') == 3){
      $var = 2; 
      
      
      $var2 =  $this->chek_Null($this->input->post('member_id'));
}

$data['role_id_fk'] =$var;
$data['emp_code'] = $var2;
$data['user_phone'] = $this->chek_Null($this->input->post('user_phone'));

$data['head_dep_id_fk'] = $this->chek_Null($this->input->post('head_dep_id_fk'));        
$data['dep_job_id_fk'] = $this->chek_Null($this->input->post('dep_job_id_fk'));     
$data['administration_id'] = $this->chek_Null($this->input->post('administration_id'));
$data['user_photo'] = $file;
           
        $done=$this->db->insert('users',$data);
        if($done==1){
            return true;
        }else{
            return false;
        }
    }
    */
    

/*
public function insert($file)
{

    $password = $this->input->post('user_pass', true);
    $password = sha1(md5($password));
    $doctor_id = explode('-',$_POST['doc_id']);
    $data = array(
        "user_name"     => $this->input->post('user_name'),
        "user_username" => $this->input->post('user_username'),
        "user_pass"     => $password,
        "user_email"    => $this->input->post('user_email'),
        "role_id_fk"    => $this->input->post('role_id_fk'),
        "dep_id"=> $this->input->post('dep_id'),
        "user_phone"    => $this->input->post('user_phone'),
        "doctor_id"     => $doctor_id[0],
        "user_photo"    => $file
    );
    $data['emp_code'] = 0;
    // $data["dep_id"] = 0;
    if($this->input->post('role_id_fk') == 1){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
        $this->db->where('id', $data['emp_code']);
        $query = $this->db->get('employees');
        $r = $query->row_array();
        $data["dep_id"] = $r['administration'];
    }elseif ($this->input->post('role_id_fk') == 3){
        $data['dep_id'] = $doctor_id[1];
    }
    if($this->input->post('role_id_fk') == 4){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
    }
    if($this->input->post('role_id_fk') == 5){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
    }
    if($file == ''){
        $data['user_photo'] = 'user.png';
    }
    $done = $this->db->insert('users', $data);
    if ($done == 1) {
        return true;
    } else {
        return false;
    }
}
*/
/*
public function update($id, $user_photo)
{
    $data = array(
        'user_name' => $this->input->post('user_name'),
        'user_username' => $this->input->post('user_username'),
        'user_email' => $this->input->post('user_email'),
        "head_dep_id_fk"=>$this->input->post('head_dep_id_fk'),
        'user_phone' => $this->input->post('user_phone')
    );
    $data["doctor_id"] = 0;
    $data["dep_id"] = 0;
    $data['emp_code'] = 0;
    if ($this->input->post('user_pass')){
        $password = $this->input->post('user_pass', true);
        $password = sha1(md5($password));
        $data['user_pass'] = $password;
    }
    if($this->input->post('role_id_fk') == 1){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
        $this->db->where('id', $data['emp_code']);
        $query = $this->db->get('employees');
        $r = $query->row_array();
        $data["dep_id"] = $r['administration'];
    }elseif ($this->input->post('role_id_fk') == 3){
        $doctor_id = explode('-',$_POST['doc_id']);
        $data["doctor_id"] = $doctor_id[0];
        $data["dep_id"] = $doctor_id[1];
    }
    if($this->input->post('role_id_fk') == 4){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
    }
    if($this->input->post('role_id_fk') == 5){
        $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
    }
    if ($this->input->post('role_id_fk')) {
        $data['role_id_fk'] = $this->input->post('role_id_fk');
    }
    if ($user_photo != '') {
        $data['user_photo'] = $user_photo;
    }

    $this->db->where('user_id', $id);
    $update = $this->db->update('users', $data);
    if ($update == 1) {
        return true;
    }
    return false;
}
*/

    /*public function update($id, $user_photo)
    {
        $data = array(
            'user_name' => $this->input->post('user_name'),
            'user_username' => $this->input->post('user_username'),
            'user_email' => $this->input->post('user_email'),
            "head_dep_id_fk"=>$this->input->post('head_dep_id_fk'),
            'user_phone' => $this->input->post('user_phone')
        );
        $data["doctor_id"] = 0;
        $data["dep_id"] = 0;
        $data['emp_code'] = 0;
        if ($this->input->post('user_pass')){
            $password = $this->input->post('user_pass', true);
            $password = sha1(md5($password));
            $data['user_pass'] = $password;
        }
        if ($this->input->post('doctor_id')) {
            $data["doctor_id"] = $this->input->post('doctor_id');
            $data["dep_id"] = $this->input->post('dep_id');
        } 
        if($this->input->post('role_id_fk') == 1){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id'));
            $this->db->where('id', $data['emp_code']);
            $query = $this->db->get('employees');
            $r = $query->row_array();
            $data["dep_id"] = $r['administration'];
        }
        if($this->input->post('role_id_fk') == 4){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id2'));
        }
        if($this->input->post('role_id_fk') == 5){
            $data['emp_code'] = $this->chek_Null($this->input->post('employee_id3'));
        }
        if ($this->input->post('role_id_fk')) {
            $data['role_id_fk'] = $this->input->post('role_id_fk');
        }
        if ($user_photo != '') {
            $data['user_photo'] = $user_photo;
        }
      
        $this->db->where('user_id', $id);
        $update = $this->db->update('users', $data);
        if ($update == 1) {
            return true;
        }
        return false;
    }*/
    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }
    public function check_user_data()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_username', $this->input->post('user_name'));
        $this->db->where('user_pass', sha1(md5($this->input->post('user_pass'))));
        $this->db->where('approved', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
//---------------------------------------------------------------

public function employes_in(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where("role_id_fk",3);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row->emp_code;
        }
        return $data;
    }else{
        return 0;
    }

} 

    public function members_in(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where("role_id_fk",2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row->emp_code;
        }
        return $data;
    }else{
        return 0;
    }

}





    public function emp_in()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    } 
    
        public function memb_in()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    }
    
    
//-------------------------------------------------------
public  function update_pass($id){
    $password = $this->input->post('user_pass', true);
    if ($password != '') {
        $data['user_pass'] = sha1(md5($password));
    }
    $this->db->where('user_id', $id);
    $this->db->update('users', $data);
}
//-----------------------------------------------------
      public function nur_in($role_id_fk)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("role_id_fk",$role_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->emp_code;
            }
            return $data;
        }
        return false;
    }
/***********************************************************/

    public function emp_reportBy_id($emp_id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('id',$emp_id);
        $parent = $this->db->get();
        $data = $parent->row();

       if($parent->num_rows() > 0){

           $data->depart_name = $this->emp_depart_name($data->department)->name;

           return $data;
       }
        return false;
    }    
    
     public function emp_depart_name($id)
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id',$id);
        $parent1 = $this->db->get();
        $data1 = $parent1->row();
        if($parent1->num_rows() > 0) {
            return $data1;
        }
        return false;
    }   
    
    
    
}// END CLASS