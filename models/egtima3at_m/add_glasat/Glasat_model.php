<?php


class Glasat_model extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
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
    public function get_by($table, $where_arr = false, $select = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            if (!empty($select) && $select != 1) {
                return $query->row()->$select;
            } else {
                if ($select == 1) {
                    return $query->row();
                } else {
                    return $query->result();
                }
            }
        } else {
            return false;
        }
    }
public function get_last_magls()
{
   //$this->db->where('suspend',1);
    $this->db->order_by('id','desc');
    $query=$this->db->get('egtm_galast');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return 0;
    }
}
public function get_last_galsa()
{
    $this->db->select_max('galsa_rkm');
    $query=$this->db->get('egtm_galast');
 //   $this->db->order_by('id','desc');
    if($query->num_rows()>0)
    {
        return $query->row()->galsa_rkm+1;
    }else{
        return 1;
    }
}

public function get_magls_member($code)
{
    //$this->db->order_by('mansp_fk','ASC');
    $this->db->where('galsa_id_fk',$code);
   
    
    $query=$this->db->get('egtm_galast_members');  
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
    public function get_last_galsa_member($rkm)
    {
        $this->db->where('galsa_rkm',$rkm);
        $query=$this->db->get('egtm_galast');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

public function insert_galsa()
{

$data['galsa_rkm']=$this->input->post('glsa_rkm');
$data['glsa_edara']=$this->input->post('glsa_edara');
$data['galsa_date']=$this->input->post('galsa_date');
$data['galsa_day']=$this->input->post('galsa_day');
$data['galsa_time']=$this->input->post('galsa_time');


$data['enwan_galsa']=$this->input->post('enwan_galsa');
$data['suspender_emp_n']=$this->input->post('suspender_emp_n');
$data['date']= strtotime(date("Y-m-d"));
$data['hader_num']=count($this->input->post('emp_n'));
$data['publisher']=$_SESSION['user_id'];
$data['finshed']=0;

$this->db->insert('egtm_galast', $data);
}
    public function update_galsa($rkm)
    {
    
        $data['galsa_date']=$this->input->post('galsa_date');
        $data['galsa_day']=$this->input->post('galsa_day');
$data['galsa_time']=$this->input->post('galsa_time');
        $data['enwan_galsa']=$this->input->post('enwan_galsa');
        $data['suspender_emp_n']=$this->input->post('suspender_emp_n');
        $data['hader_num']=count($this->input->post('emp_n'));
      //  $this->db->insert('md_all_glasat', $data);

        $this->db->where('galsa_rkm',$rkm);
        $this->db->update('egtm_galast', $data);
    }
public function insert_galsa_member()
{


    if(!empty($this->input->post('emp_n')))
    {
        $count=count($this->input->post('emp_n'));
        for($x=0;$x<$count;$x++)
        {
           
            $data['galsa_rkm_fk']=$this->input->post('glsa_rkm');
            $data['galsa_date']=$this->input->post('galsa_date');
            $data['galsa_id_fk']=$this->input->post('glsa_rkm');
            $data['emp_n']=$this->input->post('emp_n')[$x];
            $data['type']=$this->input->post('type');
            $data['emp_code']=$this->input->post('code')[$x];
            $data['emp_edara']=$this->input->post('emp_edara')[$x];
            $data['emp_edara_n']=$this->input->post('emp_edara_n')[$x];
            $data['emp_qsm']=$this->input->post('emp_qsm')[$x];
            $data['emp_qsm_n']=$this->input->post('emp_qsm_n')[$x];
            $data['emp_mosama_wazifa']=$this->input->post('emp_mosama_wazifa')[$x];
            $data['emp_mosama_wazifa_n']=$this->input->post('emp_mosama_wazifa_n')[$x];
            $data['wazifa_in_galsa']=$this->input->post('wazifa_in_galsa')[$x];
           
         
            $this->db->insert('egtm_galast_members', $data);

        }



    }
}
public function update_galsa_member($rkm)
{

        $this->db->where('galsa_rkm_fk',$rkm) ;
      
        $this->db->delete('egtm_galast_members');
    if(!empty($this->input->post('emp_n')))
    {
        $count=count($this->input->post('emp_n'));
        for($x=0;$x<$count;$x++)
        {
            $data['galsa_rkm_fk']=$this->input->post('glsa_rkm');;
            $data['galsa_id_fk']=$this->input->post('glsa_rkm');;
            $data['emp_n']=$this->input->post('emp_n')[$x];
            $data['emp_code']=$this->input->post('code')[$x];
            $data['type']=$this->input->post('type');
            $data['emp_edara']=$this->input->post('emp_edara')[$x];
            $data['emp_edara_n']=$this->input->post('emp_edara_n')[$x];
            $data['emp_qsm']=$this->input->post('emp_qsm')[$x];
            $data['emp_qsm_n']=$this->input->post('emp_qsm_n')[$x];
            $data['emp_mosama_wazifa']=$this->input->post('emp_mosama_wazifa')[$x];
            $data['emp_mosama_wazifa_n']=$this->input->post('emp_mosama_wazifa_n')[$x];
            $data['wazifa_in_galsa']=$this->input->post('wazifa_in_galsa')[$x];
            $data['hdoor_satus']=0;
            $this->db->insert('egtm_galast_members', $data);

        }



    }

}
public function get_mem_detail($id)
{
$this->db->where('mem_id_fk',$id);
$query=$this->db->get('md_all_magls_edara_members');
if($query->num_rows()>0)
{
    return $query->row();
}else{
    return false;
}


}

public function select_all()
{
    $this->db->order_by('galsa_rkm','desc');
   $query=$this->db->get('egtm_galast');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->galsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}
public function select_all_end()
{
    $this->db->order_by('galsa_rkm','desc');
   $query=$this->db->where('finshed',1)->get('egtm_galast');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->galsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}

public function get_all_details($rkm)
{
    $this->db->where('galsa_rkm_fk',$rkm);
    $query=$this->db->get('egtm_galast_members');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}
public function get_by_rkm($rkm)
{
    $this->db->where('galsa_rkm',$rkm);

    $query=$this->db->get('egtm_galast');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return false;
    }
}
public function get_details_by_rkm($rkm)
{
    $this->db->where('galsa_rkm_fk',$rkm);
    $query=$this->db->get('egtm_galast_members');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}

public function get_galsa_member_vote($rkm,$Conditions_arr)
{
    $this->db->where('galsa_rkm_fk',$rkm);
    $this->db->where($Conditions_arr);
    $this->db->order_by('emp_code','ASC');

    $query=$this->db->get('egtm_galast_members')->result();
   
       
        return $query;
    
}
public function get_galsa_member($rkm)
{
    $this->db->where('galsa_rkm_fk',$rkm);

    $this->db->order_by('emp_code','ASC');

    $query=$this->db->get('egtm_galast_members')->result();
   
       
        return $query;
    
}
public function get_session_data($session_num)
{
    $this->db->where('galsa_rkm',$session_num);
    $query=$this->db->get('egtm_galast');
    if($query->num_rows()>0)
    {
     return $query->row();
    }else{
        return false;
    }

}


public function select_all_glasat_by_rkm($galsa_rkm)
{
    $this->db->order_by('galsa_rkm','desc');
    $this->db->where('galsa_rkm',$galsa_rkm);
   $query=$this->db->get('egtm_galast');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->galsa_rkm);
  
   
   
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}





public function select_all_galasat_finshed()
{
     $this->db->where('finshed',1);
    $this->db->order_by('galsa_rkm','desc');
   $query=$this->db->get('egtm_galast');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->galsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}



  public function delete($table,$Conditions_arr){
       foreach($Conditions_arr as $key=>$value){
        $this->db->where($key,$Conditions_arr[$key]);    }
        $this->db->delete($table);
   }



public function get_open_galesa($edara)
    {
        return $this->db->select('COUNT(id) as count ')->where('glsa_edara', $edara)->where('finshed', 0)->get('egtm_galast')->row()->count;
    }
    ////yara
    public function get_all_emp()

        {
            $x= $this->input->post('to_user_id');
            if(   $x!=null)
            {       
            for($i=0;$i<sizeof($x);$i++)
            { 
                $this->db->where('emp_code !=', $x[$i]);
            }
           }
           // $this->db->where_not_in('id', $id);

           $this->db->where('employee_type', 1);
           $this->db->where('status', 96);
           $this->db->order_by('emp_code','ASC');
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
        public function get_all_gam3ia_mem()

        {
            $x= $this->input->post('to_user_id');
            if(   $x!=null)
            {       
            for($i=0;$i<sizeof($x);$i++)
            { 
                $this->db->where('card_num !=', $x[$i]);
            }
           }
           // $this->db->where_not_in('id', $id);

        //    $this->db->where('employee_type', 1);
        //    $this->db->where('status', 96);
           $this->db->order_by('id','ASC');
            $q = $this->db->get('md_all_gam3ia_omomia_members')->result();

            if (!empty($q)) {

              

                return $q;

            }

        }



        public function get_edara_name_or_qsm($id)

        {

            $this->db->where('id', $id);

            $query = $this->db->get('department_jobs');

            if ($query->num_rows() > 0) {

                return $query->row()->name;

            } else {

                return false;

            }

        }


        
        public function get_edara($id)

        {

            $this->db->where('id', $id);

            $query = $this->db->get('employees');

            if ($query->num_rows() > 0) {

                return $query->row()->administration;

            } else {

                return false;

            }


        }


        public function get_job_title($id)

        {

            $this->db->where('defined_id', $id);

            $query = $this->db->get('all_defined_setting');

            if ($query->num_rows() > 0) {

                return $query->row()->defined_title;

            } else {

                return false;

            }

        }
        //yara30-4-2020
        public function select_notify_galsa(){
            $this->db->select('*');
            $this->db->from("egtm_galast");
          //  $this->db->where("glsa_edara",$edara);
            $this->db->where("finshed",1);
            $this->db->order_by("id","DESC");
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->row();
            }else{
                return false;
            }
        }
        public function update_vote_hoddor($galsa_rkm)
    {
      $data['vote']=$this->input->post('vote');
      $this->db->where('galsa_rkm_fk', $galsa_rkm);
      $this->db->where('emp_n', $_SESSION['emp_name']);
    $this->db->update('egtm_galast_members',$data);
          
    }
    public function check_galsa($galsa_rkm)
    {
        $this->db->where('galsa_rkm', $galsa_rkm);
        $this->db->where('finshed', 1);
        $this->db->from('egtm_galast');
        return $this->db->count_all_results();
    }
    public function check_vote_hoddor($galsa_rkm)
        {
           $check_galsa= $this->check_galsa($galsa_rkm);
            if(!empty($check_galsa))
            {
            $this->db->where('galsa_rkm_fk', $galsa_rkm);
            $this->db->where('emp_n', $_SESSION['emp_name']);
            $this->db->where('hdoor_satus', 1);
            $this->db->where('vote', 0);
            $this->db->from('egtm_galast_members');
            return $this->db->get()->row();
            }
            else{
                return 0;
            }
        }
        




    }