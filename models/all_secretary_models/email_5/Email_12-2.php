<?php
class Email extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

   
public function get_id($table,$where,$id,$select){
    $h = $this->db->get_where($table, array($where=>$id));
    $arr= $h->row_array();
    return $arr[$select];
}
public function get_last_id()
{
    $this->db->select('id');
    $this->db->order_by('id','desc');
    $query=$this->db->get('email_inbox');
    if($query->num_rows()>0)
    {
        return $query->row()->id+1 ;
    }else{
        return 1;
    }

}
    
        public function insert()
        {
          
            if($_SESSION['role_id_fk']==1){

                $data['email_from_id']=$_SESSION['user_id'];
                $data['email_from_n']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['email_from_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
        
            }
            else if ($_SESSION['role_id_fk']==3){
                $data['email_from_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }
            else if ($_SESSION['role_id_fk']==4){
                $data['email_from_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
      //   $data['email_to_n']=$this->input->post('to_user_n');
      //   $data['email_to_id']=$this->input->post('to_user_id');
      $data['email_rkm']=$this->select_last_email();
           // $data['email_motbaa_n']=$this->input->post('motb3a_user_n');
         //   $data['email_motbaa_id']=$this->input->post('motb3a_user_id');
          //  $data['email_etlaa_n']=$this->input->post('etlaa_user_n');
//$data['email_etlaa_id']=$this->input->post('etlaa_user_id');
            $data['need_replay']=$this->input->post('need_replay');
            $data['important_degree']=$this->input->post('important_degree');
            $data['title']=$this->input->post('title');
               $data['content']=$this->input->post('content');

              










       $data['date']= strtotime(date("Y-m-d"));
       $data['date_ar'] = date('Y-m-d H:i:s');
       $data['sent'] = 1;

       $x= $this->input->post('to_user_fk');
       $y=$this->input->post('to_user_fk_name');
       $h=$this->input->post('type');
       if(   $x!=null)
       { 
       for($i=0;$i<sizeof($x);$i++)
{
   
    $data['type_sender']=$h[$i];
   $data['email_to_id'] = $x[$i];
   $data['email_to_n'] = $y[$i];

   $this->db->insert('email_inbox',$data);
}}


         //   $this->db->insert('email_inbox',$data);
            
            
          
        }
        public function insert_attached($img_file)
        {
            $dataq['file'] = $img_file;
            $dataq['email_rkm']=$this->select_last_email();

            $this->db->insert('email_inbox_attached',$dataq);

        }
        public function get_files_by_id($rkm)
        {
            $this->db->select('*');
            $this->db->from('email_inbox_attached');
            $query = $this->db->where('email_rkm',$rkm)->get()->result();
            return $query;

        }
        public function select_last_email()
        {
            
                $this->db->select('id');
                $this->db->order_by('id','desc');
                $query=$this->db->get('email_inbox');
                if($query->num_rows()>0)
                {
                    return $query->row()->id + 1;
                }else{
                    return 1;
                }
            
              
        }
        public function select_all_my_email()
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $this->db->order_by('id', 'desc');
           // $this->db->order_by('id',"ASC");
            $query_result = $this->db->where('sent',1)->where('deleted',0)->get()->result();
           // return $query;
           // $query_result=$query->result();
            if ($query_result > 0) {
                $i=0;
                foreach ($query_result as $row) {
                    $query_result[$i]->employee_photo =$this->get_employee_photo($row->email_from_id);
                    $i++;
                }
                return $query_result;
            }

        }

        public function select_all_my_sent_email()
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $this->db->order_by('id', 'desc');
           // $this->db->order_by('id',"ASC");
            $query_result = $this->db->where('sent',1)->where('deleted',0)->get()->result();
           // return $query;
           // $query_result=$query->result();
            if ($query_result > 0) {
                $i=0;
                foreach ($query_result as $row) {
                    $query_result[$i]->employee_photo =$this->get_employee_photo($row->email_to_id);
                    $i++;
                }
                return $query_result;
            }

        }
       
        public function get_employee_photo($f_id){
            $this->db->select('*');
            $this->db->from('employees');
            $this->db->where("id",$f_id);
            $query = $this->db->get()->row()->personal_photo;
            
            return $query;
        }
        public function select_all_deleted_email()
        {
            $this->db->select('*');
            $this->db->from('email_inbox');
            $this->db->order_by('id', 'desc');
            $query_result = $this->db->where('deleted',1)->get()->result();
            if ($query_result > 0) {
                $i=0;
                foreach ($query_result as $row) {
                    $query_result[$i]->employee_photo =$this->get_employee_photo($row->email_to_id);
                    $i++;
                }
                return $query_result;
            }

        }
        
        public function make_read($id)
        {
            $data['readed'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        
        public function make_reply($id)
        {
            $data['reply'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        
        public function make_forward($id)
        {
            $data['forward'] = 1;
            $this->db->where('id',$id)->update('email_inbox',$data);

        }
        public function get_email_by_id($id)
        {
           
            $this->db->from('email_inbox');
            $query = $this->db->where('id',$id)->get()->row();
            return $query;

        }
        public function make_deleted($id)
        {

            $data['deleted'] = 1;
            $data['deleted_date'] =  date('Y-m-d H:i:s');
            $this->db->where('id',$id)->update('email_inbox',$data);
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



   //notification

public function total_rows($q=NULL){
    $this->db->like('id',$q);
    

   
$this->db->where('email_to_id',$_SESSION['emp_code']);
$this->db->where('seen',0);  
    
     $this->db->from('email_inbox');
    return $this->db->count_all_results();


}
public function get_new_messages($q=NULL)
{
    $this->db->where('email_to_id',$_SESSION['emp_code']);
  $this->db->where('readed',0);

     $this->db->from('email_inbox');
    return $this->db->get()->result();
    
}
public function update_seen_messages()
{
   
   $data['seen']=1;
     
 $this->db->where('email_to_id',$_SESSION['emp_code'])->update('email_inbox',$data);


}

public function update_read_messages($id)
{
   
   $data['readed']=1;
     
 $this->db->where('id',$id)->update('email_inbox',$data);


}

public function insert_reply()
{
  
    if($_SESSION['role_id_fk']==1){

        $data['email_from_id']=$_SESSION['user_id'];
        $data['email_from_n']=$_SESSION['user_name'];;
    }
    else if ($_SESSION['role_id_fk']==2){
        $data['email_from_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
        $data['email_from_n'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");

    }
    else if ($_SESSION['role_id_fk']==3){
        $data['email_from_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
        $data['email_from_n'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
    }
    else if ($_SESSION['role_id_fk']==4){
        $data['email_from_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
        $data['email_from_n'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
    }

$data['email_rkm']=$this->select_last_email();

    $data['need_replay']=$this->input->post('need_replay');
    $data['important_degree']=$this->input->post('important_degree');
    $data['title']=$this->input->post('title');
       $data['content']=$this->input->post('content');
$data['date']= strtotime(date("Y-m-d"));
$data['date_ar'] = date('Y-m-d H:i:s');
$data['sent'] = 1;
$data['type_sender']=$this->input->post('type');
$data['email_to_id'] = $this->input->post('to_user_fk');
$data['email_to_n'] = $this->input->post('to_user_fk_name');

$this->db->insert('email_inbox',$data);
}

/***************************************************/

public function get_all_emp($id){

              $this->db->where_not_in('id',$id);

              $this->db->where('employee_type',1);

              $q = $this->db->get('employees')->result();

              if (!empty($q)) {

                  foreach ($q as $key => $row) {

                      $q[$key]->edara = $this->get_edara_name_or_qsm($row->administration);

                      $q[$key]->qsm = $this->get_edara_name_or_qsm($row->department);

                      $q[$key]->job_title = $this->get_job_title($row->degree_id);

                  }

                  return $q;

              }

          }
          
          
          public function get_edara_name_or_qsm($id){

    $this->db->where('id', $id);

    $query = $this->db->get('department_jobs');

    if ($query->num_rows() > 0) {

        return $query->row()->name;

    } else {

        return false;

    }

}


public function get_job_title($id){

    $this->db->where('defined_id', $id);
    $query = $this->db->get('all_defined_setting');
    if ($query->num_rows() > 0) {
        return $query->row()->defined_title;
    } else {
        return false;
    }
}
public function insert_ajax(){
            if($_SESSION['role_id_fk']==1){
                $data['email_from_id']=$_SESSION['user_id'];
                $data['email_from_n']=$_SESSION['user_name'];;
            }
            else if ($_SESSION['role_id_fk']==2){
                $data['email_from_id'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("magls_members_table",'id',$_SESSION['emp_code'],"member_name");
            }else if ($_SESSION['role_id_fk']==3){
                $data['email_from_id'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("employees",'id',$_SESSION['emp_code'],"employee");
            }else if ($_SESSION['role_id_fk']==4){
                $data['email_from_id'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"id");
                $data['email_from_n'] = $this->get_id("general_assembley_members",'id',$_SESSION['emp_code'],"name");
            }
      $data['email_rkm']=$this->select_last_email();
            $data['need_replay']=$this->input->post('need_replay');
            $data['important_degree']=$this->input->post('important_degree');
            $data['title']=$this->input->post('title');
               $data['content']=$this->input->post('content');
       $data['date']= strtotime(date("Y-m-d"));
       $data['date_ar'] = date('Y-m-d H:i:s');
       $data['sent'] = 1;
       $x= $this->input->post('to_user_fk');
       $y=$this->input->post('to_user_fk_name');
       $h=$this->input->post('type');
       if($x!=null){ 
           $x=explode(',',$x);
           $y=explode(',',$y);
           $h=explode(',',$h);
       for($i=0;$i<sizeof($x);$i++){
    $data['type_sender']=$h[$i];
   $data['email_to_id'] = $x[$i];
   $data['email_to_n'] = $y[$i];
   $this->db->insert('email_inbox',$data);
}
}
        }



}