<?php

class Job_title_model extends CI_Model

{

    public function __construct()

    {

        parent::__construct();

    }

    public function chek_Null($post_value)

    {

        if ($post_value == '' || $post_value == null || (!isset($post_value))) {

            $val = '';

            return $val;

        } else {

            return $post_value;

        }

    }

    public function select_search($table){

        $this->db->select('*');

        $this->db->from($table);

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

    public function get_code()

    {

        $this->db->select_max('code');

        $query = $this->db->get('hr_egraat_setting');

        if ($query->num_rows() > 0) {

            return $query->row()->code+1;

        } else {

            return 0;

        }

    }


public function insert()
    {
        $data['title'] = $this->input->post('title');
        $data['main_type'] = $this->input->post('main_type');
        $data['edara'] = $this->input->post('edara');
        $data['qsm'] = $this->input->post('qsm');
        $data['job_number'] = $this->input->post('job_number');
        $data['marg3_mobasher'] = $this->input->post('marg3_mobasher');
        $data['code'] = $this->get_code();
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d');
        $data['time'] = date('h:i:s a');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->insert(' hr_egraat_setting', $data);
    }
    
    
    
        public function update($id)
    {
        $data['title'] = $this->input->post('title');
        $data['main_type'] = $this->input->post('main_type');
        $data['edara'] = $this->input->post('edara');
        $data['qsm'] = $this->input->post('qsm');
        $data['job_number'] = $this->input->post('job_number');
        $data['marg3_mobasher'] = $this->input->post('marg3_mobasher');
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d');
        $data['time'] = date('h:i:s a');
        if ($_SESSION['role_id_fk'] == 1) {
            $data['publisher'] = $_SESSION['user_id'];
            $data['publisher_name'] = $_SESSION['user_name'];;
        } else if ($_SESSION['role_id_fk'] == 2) {
            $data['publisher'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("magls_members_table", 'id', $_SESSION['emp_code'], "member_name");
        } else if ($_SESSION['role_id_fk'] == 3) {
            $data['publisher'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("employees", 'id', $_SESSION['emp_code'], "employee");
        } else if ($_SESSION['role_id_fk'] == 4) {
            $data['publisher'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "id");
            $data['publisher_name'] = $this->get_id("general_assembley_members", 'id', $_SESSION['emp_code'], "name");
        }
        $this->db->where('id', $id);
        $this->db->update('hr_egraat_setting', $data);
    }
   /* public function insert()

 {

     $data['title']=$this->input->post('title');
     $data['edara']=$this->input->post('edara');
     $data['qsm']=$this->input->post('qsm');
     $data['job_number']=$this->input->post('job_number');
     $data['marg3_mobasher']=$this->input->post('marg3_mobasher');

     $data['code']=$this->get_code();

     $data['date']= strtotime(date("Y-m-d"));

     $data['date_ar'] = date('Y-m-d');

     $data['time'] = date('h:i:s a');

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

     $this->db->insert(' hr_egraat_setting',$data);

 }
*/
 public function select_all_job_title()

 {

  return $this->db->get('hr_egraat_setting')->result();

 }

 public function get_by_id($id)

{

    $this->db->where('id',$id);

   return $this->db->get('hr_egraat_setting')->row();

}

/*public function update($id)

{

    $data['title']=$this->input->post('title');
    $data['edara']=$this->input->post('edara');
    $data['qsm']=$this->input->post('qsm');
    $data['job_number']=$this->input->post('job_number');
    $data['marg3_mobasher']=$this->input->post('marg3_mobasher');
    $data['date']= strtotime(date("Y-m-d"));

     $data['date_ar'] = date('Y-m-d');

     $data['time'] = date('h:i:s a');

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

   $this->db->where('id',$id);

    $this->db->update('hr_egraat_setting',$data);

}
*/

public function delete($id)

{

   $this->db->where('id',$id);

   $this->db->delete('hr_egraat_setting');

}

public function delete_media($id)

{

   $this->db->where('job_title_id_fk',$id);

   $this->db->delete('hr_egraat_setting_details');

}

public function get_news_by_id($id){

    $this->db->where('id',$id);

    $query = $this->db->get('hr_egraat_setting');

    if ($query->num_rows()>0){

        return $query->row();

    } else{

        return false;

    }

}

public function insert_attach($id,$images)

{

    if(isset($images)&& !empty($images))

    {

        $count=count($images);

        for($x=0; $x<$count;$x++)

        {

            $data['title']=$this->input->post('title');

            $data['file']=$images[$x];

            $data['job_title_id_fk']=$id;

            $data['date']= strtotime(date("Y-m-d"));

            $data['date_ar']= date("Y-m-d");

            $data['time'] = date('h:i:s a');

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

            $this->db->insert('hr_egraat_setting_details',$data);

        }

    }

}

public function delete_morfq($id)

{

$this->db->where('id',$id)->delete('hr_egraat_setting_details');

}

public function get_morfq_by_id($id){

    $this->db->where('job_title_id_fk',$id);

    $query = $this->db->get('hr_egraat_setting_details');

        return $query->result();

}

public function get_images($id)

{

    $this->db->where('id',$id);

    $query=$this->db->get('hr_egraat_setting_details');

    if($query->num_rows()>0)

    {

        return $query->result();

    }else{

        return false;

    }

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

	public function change_status($id,$emp_code,$approved)

	{

		$this->db->where('job_title_id_fk',$emp_code);

		$data['status']=0;

		$this->db->update('hr_egraat_setting_details',$data);

		$this->db->where('id',$id);

		$data2['status']=$approved;

		$this->db->update('hr_egraat_setting_details',$data2);

    }
    
    ///yara3-9-2020
    public function select_all(){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk",0);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
           
            return $query_result;
        }
        return false;
    }

    public function select_sub($f_id){
        $this->db->select('*');
        $this->db->from('hr_edarat_aqsam');
        $this->db->where("from_id_fk",$f_id);
         $this->db->order_by('trteeb','asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//select_all_sub
public function select_all_sub(){
    $this->db->select('*');
    $this->db->from('hr_edarat_aqsam');
    $this->db->where("from_id_fk!=",0);
     $this->db->order_by('trteeb','asc');
    $query = $this->db->get();
    $query_result=$query->result();
    if ($query->num_rows() > 0) {
       
        return $query_result;
    }
    return false;
}


function get_from_main_type($main_type)
{
    $data = array();
    switch ($main_type) {
        case 1:
            $data = $this->db->select('code,title,id,main_type')->where('code', 100)->get('hr_egraat_setting')->result_array();
            break;
        case 2:
        case 3:
            $data = $this->db->select('code,title,id,main_type')->where('main_type', 1)->get('hr_egraat_setting')->result_array();
            break;
        case 4:
            $data = $this->db->select('code,title,id,main_type')->where('main_type', 3)->get('hr_egraat_setting')->result_array();
            break;
        case 5:
            $data = $this->db->select('code,title,id,main_type')->where_in('main_type', array(4,3))->get('hr_egraat_setting')->result_array();
            break;
        default:
            $data = $this->db->select('code,title,id,main_type')->get('hr_egraat_setting')->result_array();
            break;
    }
    return $data;
}
}// END CLASS