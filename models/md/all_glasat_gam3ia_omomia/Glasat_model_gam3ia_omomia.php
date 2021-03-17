<?php
/**
 * Created by PhpStorm.
 * User: mini
 * Date: 31/01/2019
 * Time: 01:29 ص
 */

class Glasat_model_gam3ia_omomia extends CI_Model
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
public function get_last_magls()
{
  
    $this->db->order_by('id','desc');
    $query=$this->db->get('md_all_gam3ia_omomia_members');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return 0;
    }
}
public function get_last_galsa()
{
    $this->db->select_max('glsa_rkm');
    $query=$this->db->get('md_all_glasat_gam3ia_omomia');

    if($query->num_rows()>0)
    {
        return $query->row()->glsa_rkm+1;
    }else{
        return 1;
    }
}

/*public function get_magls_member()
{
  
   
    
    $query=$this->db->get('md_all_gam3ia_omomia_members');  
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}*/


    public function get_magls_member_new()
    {
        //$this->db->select('*');
        $this->db->select('md_all_gam3ia_omomia_members.*, md_all_gam3ia_omomia_odwiat.rkm_odwia as rkm_odwia_full , md_all_gam3ia_omomia_odwiat.no3_odwia_title ,md_all_gam3ia_omomia_odwiat.rkm_odwia,
        md_all_gam3ia_omomia_odwiat.odwia_status_title ,md_all_gam3ia_omomia_odwiat.subs_to_date_m,md_all_gam3ia_omomia_odwiat.subs_from_date_m,
        md_all_gam3ia_omomia_odwiat.from_date,md_all_gam3ia_omomia_odwiat.to_date
          ');
       
        $this->db->from('md_all_gam3ia_omomia_members');
        $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_gam3ia_omomia_members.id', "LEFT");
       
        $this->db->where("md_all_gam3ia_omomia_odwiat.odwia_status_fk",1);
        $this->db->order_by("md_all_gam3ia_omomia_odwiat.rkm_odwia", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
               // $data[$i]->odwiat = $this->get_odwiat($row->id);
                $i++;
            }
            return $data;
        } else {
            return false;
        }

    }

    public function get_magls_member()
    {
        $query = $this->db->get('md_all_gam3ia_omomia_members');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->odwiat = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->id), '');
            }
            return $query;
        } else {
            return false;
        }
    }
/*public function get_last_galsa_member($rkm)
{
    $this->db->where('glsa_rkm', $rkm);
    $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if ($query->num_rows() > 0) {
        $query = $query->result();
        foreach ($query as $key => $row) {
            $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
            $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
        }
        return $query;
    } else {
        return false;
    }
}*/
public function get_last_galsa_member($rkm)
{
    /*$this->db->where('glsa_rkm', $rkm);
    
    $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    */
    
      $this->db->select('md_all_glasat_hdoor_gam3ia_omomia.*, md_all_gam3ia_omomia_odwiat.rkm_odwia');
       
        $this->db->from('md_all_glasat_hdoor_gam3ia_omomia');
        $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_glasat_hdoor_gam3ia_omomia.mem_id_fk', "LEFT");
       
        $this->db->order_by("md_all_gam3ia_omomia_odwiat.rkm_odwia", "asc");
        $query = $this->db->get();
    
    
    if ($query->num_rows() > 0) {
        $query = $query->result();
        foreach ($query as $key => $row) {
            $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
            $query[$key]->odwiat_data = $this->get_by_mem('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
        }
        return $query;
    } else {
        return false;
    }
}

public function get_by_mem($table, $where_arr, $select = false)
{
    $q = $this->db->where($where_arr)
        ->get($table)->row();
    if (!empty($q)) {
        if (!empty($select)) {
            return $q->$select;
        } else {
            return $q;
        }
    } else {
        return false;
    }
}
/*function save_member_hdoor()
{
    $row_id = $this->input->post('row_id');
    $member_name = $this->input->post('member_name');
    $member_id = $this->input->post('member_id');
    $mem_id_fk = $this->input->post('mem_id_fk');
    $hdoor_satus = $this->input->post('hdoor_satus');
    $hodoor_status = $this->input->post('hodoor_status');
    $data['member_name'] = $member_name;
    $data['member_id'] = $member_id;
    $data['hdoor_satus'] = $hdoor_satus;
    $data['hodoor_status'] = $hodoor_status;
    $data['hdoor_date'] = strtotime(date('y-m-d h:i a'));
    $data['hdoor_time'] = strtotime(date('y-m-d h:i a'));
    $data['hdoor_added_by'] =$_SESSION['user_id'];
    $data['hdoor_added_by_name'] =$this->getUserName($_SESSION['user_id']);
    $this->db->where('id', $row_id)->where('mem_id_fk', $mem_id_fk)->update('md_all_glasat_hdoor_gam3ia_omomia', $data);
}*/

function save_member_hdoor()
{

    $row_id = $this->input->post('row_id');
    $member_name = $this->input->post('member_name');
    $member_id = $this->input->post('member_id');
    $mem_id_fk = $this->input->post('mem_id_fk');
    $hdoor_satus = $this->input->post('hdoor_satus');
    $hodoor_status = $this->input->post('hodoor_status');
    $data['hdoor_satus'] = $hdoor_satus;
    $data['hodoor_status'] = $hodoor_status;
    if ($data['hodoor_status'] == 'naeb') {
        $data['member_name'] = $member_name;
        $data['member_id'] = $member_id;
    }
    $data['hdoor_date'] = strtotime(date('y-m-d h:i a'));
    $data['hdoor_time'] = date('h:i a');
    $data['hdoor_added_by'] = $_SESSION['user_id'];
    $data['hdoor_added_by_name'] = $this->getUserName($_SESSION['user_id']);
    $this->db->where('id', $row_id)->where('mem_id_fk', $mem_id_fk)->update('md_all_glasat_hdoor_gam3ia_omomia', $data);


}

   /* public function get_last_galsa_member($rkm)
    {
        $this->db->where('glsa_rkm',$rkm);
        $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }*/

/*public function insert_galsa()
{

$data['glsa_rkm']=$this->input->post('glsa_rkm');
$data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
$data['glsa_date_m']=$this->input->post('glsa_date_m');
$data['glsa_date_h']=$this->input->post('glsa_date_h');
$data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
$this->db->insert('md_all_glasat_gam3ia_omomia', $data);
}*/

  /*  public function insert_galsa()
    {
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');

        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');

        $this->db->insert('md_all_glasat_gam3ia_omomia', $data);
    }*/
   /* public function update_galsa($rkm)
    {

        
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_date_m']=$this->input->post('glsa_date_m');
        $data['glsa_date_h']=$this->input->post('glsa_date_h');
        $data['glsa_date']=strtotime($this->input->post('glsa_date_m'));
   
        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }*/
    
   /*     public function update_galsa($rkm)
    {

        
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');

        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');

        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }*/
    
    
      
  /*  public function insert_galsa()
    {
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');

        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');


        $this->db->insert('md_all_glasat_gam3ia_omomia', $data);
    }
    public function update_galsa($rkm)
    {

        
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');

        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');

        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }
*/

  public function insert_galsa()
    {
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');

        $data['glsa_time']=$this->input->post('glsa_time');
        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        
        
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['magls_rkm_date']=strtotime($this->input->post('magls_rkm_date'));
        $data['makn_en3qd']=$this->input->post('makn_en3qd');
        //yara2-7-2020
        $data['glsa_reviser_id']=$this->input->post('glsa_reviser_id');
        //

        $this->db->insert('md_all_glasat_gam3ia_omomia', $data);
    }
 
   /* public function insert_galsa()
    {
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_time']=$this->input->post('glsa_time');
        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');
        $this->db->insert('md_all_glasat_gam3ia_omomia', $data);
    }*/
    
    
      /* public function update_galsa($rkm)
    {
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_time']=$this->input->post('glsa_time');
        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['makn_en3qd']=$this->input->post('makn_en3qd');
        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }*/
           public function update_galsa($rkm)
    {

        
        $data['glsa_rkm']=$this->input->post('glsa_rkm');
        $data['glsa_rkm_full']=$this->input->post('glsa_rkm_full');
        $data['glsa_time']=$this->input->post('glsa_time');

        $data['glsa_date']=strtotime($this->input->post('glsa_date'));
        $data['glsa_date_ar']=$this->input->post('glsa_date');
        $data['glsa_date_m']=$this->input->post('glsa_date');
        $data['glsa_day']=$this->input->post('glsa_day');
        $data['no3_egtma3']=$this->input->post('no3_egtma3');
        $data['magls_rkm']=$this->input->post('magls_rkm');
        $data['magls_rkm_date']=strtotime($this->input->post('magls_rkm_date'));
        $data['makn_en3qd']=$this->input->post('makn_en3qd');
 //yara2-7-2020
 $data['glsa_reviser_id']=$this->input->post('glsa_reviser_id');
 //
        $this->db->where('glsa_rkm',$rkm);
        $this->db->update('md_all_glasat_gam3ia_omomia', $data);
    }
    
    
       public function get_by_id($table, $where_arr = false, $select = false)
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
    
public function insert_galsa_member()
{


    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
       
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->name;
        
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor_gam3ia_omomia', $data);

        }



    }
}
public function update_galsa_member($rkm)
{

        $this->db->where('glsa_rkm',$rkm) ;
     
        $this->db->delete('md_all_glasat_hdoor_gam3ia_omomia');
    if(!empty($this->input->post('member_id')))
    {
        $count=count($this->input->post('member_id'));
        for($x=0;$x<$count;$x++)
        {
           
            $data['glsa_rkm']=$this->input->post('glsa_rkm');
            $data['mem_id_fk']=$this->input->post('member_id')[$x];
            $data['mem_name']=$this->get_mem_detail($this->input->post('member_id')[$x])->name;
      
            $data['hdoor_satus']=0;
            $data['reason']=0;
            $this->db->insert('md_all_glasat_hdoor_gam3ia_omomia', $data);

        }



    }

}
public function get_mem_detail($id)
{
$this->db->where('id',$id);
$query=$this->db->get('md_all_gam3ia_omomia_members');
if($query->num_rows()>0)
{
    return $query->row();
}else{
    return false;
}


}

public function select_all()
{
    $this->db->order_by('glsa_rkm','desc');
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}
/*
public function get_all_details($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}*/


/*    public function get_all_details($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->start_laqb = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk), 'laqb_title');
            }
            return $query;
        } else {
            return false;
        }
    }*/
    
    
     public function get_all_details($rkm)
    {
        $this->db->where('glsa_rkm', $rkm);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }  
    
    
/*public function get_by_rkm($rkm)
{
    $this->db->where('glsa_rkm',$rkm);

    $query=$this->db->get('md_all_glasat_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        return $query->row();
    }else{
        return false;
    }
}*/
public function get_by_rkm($rkm)
{
    $this->db->where('glsa_rkm', $rkm);

    $query = $this->db->get('md_all_glasat_gam3ia_omomia');
    if ($query->num_rows() > 0) {
        $query = $query->row();
        $query->mehwr_num = $this->get_mehwr($query->glsa_rkm);
        $query->qrar_num = $this->get_qrar($query->glsa_rkm);
        $query->glsa_members_num = $this->get_glasat_hdoor_num($query->glsa_rkm, NULL);
        $query->glsa_members_hdoor_num = $this->get_glasat_hdoor_num($query->glsa_rkm, 1);
        $query->glsa_members_absent_num = $this->get_glasat_hdoor_num($query->glsa_rkm, 0);
          $query->makn_en3qd_name = $this->get_makn_en3qd_name($query->makn_en3qd);
        
        
        
             $query->glsa_members_all =$this->get_glasat_hdoor_da3wat_num($query->glsa_rkm,10);
             $query->glsa_members_accept =$this->get_glasat_hdoor_da3wat_num($query->glsa_rkm,1);
             $query->glsa_members_refuse =$this->get_glasat_hdoor_da3wat_num($query->glsa_rkm,2);
             $query->glsa_members_wait =$this->get_glasat_hdoor_da3wat_num($query->glsa_rkm,0);
            $query->glsa_members_no_action =$this->get_glasat_hdoor_da3wat_num($query->glsa_rkm,5);
            
            

        return $query;
    } else {
        return false;
    }
}


   public function get_glasat_hdoor_da3wat_num($glsa_rkm,$attend){
        $this->db->select('*');
        $this->db->from("md_da3wat_gam3ia_omomia");
        $this->db->where("galsa_rkm",$glsa_rkm);
 
    if($attend == 1){
       $this->db->where('action_dawa', 'accept');  
    }elseif($attend == 2){
         $this->db->where('action_dawa', 'refuse');
    }elseif($attend == 0){
         $this->db->where('action_dawa', 'wait');
    }elseif($attend == 5){
         $this->db->where('action_dawa', NULL);
    }elseif($attend == 10){
        
    }
   
  //  $query = $this->db->get('md_da3wat_gam3ia_omomia');
       
       
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->num_rows();
        }else{
            return 0;
        }
    }


	public function get_makn_en3qd_name($id_setting)
	{
		$q=$this->db->where('id_setting',$id_setting)->get('md_settings')->row()->title_setting;
		return $q;

	}
public function get_details_by_rkm($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        return $query->result();
    }else{
        return false;
    }
}

public function get_galsa_member($rkm)
{
    $this->db->where('glsa_rkm',$rkm);
    

    $query=$this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
    if($query->num_rows()>0)
    {
        $data=array();
        $x=0;
        foreach ($query->result() as $row)
        {
            $data[]=$row->mem_id_fk;

            $x++;
        }
        return $data;
    }else{
        return false;
    }
}

public function get_glasat_hdoor_num($glsa_rkm, $type)
{
    $this->db->select('*');
    $this->db->from("md_all_glasat_hdoor_gam3ia_omomia");
    $this->db->where("glsa_rkm", $glsa_rkm);
    $this->db->where("hdoor_satus", $type);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->num_rows();
    } else {
        return false;
    }
}

public function get_mehwr($glsa_rkm)
{
    $this->db->select('*');
    $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
    $this->db->where("glsa_rkm", $glsa_rkm);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->num_rows();
    } else {
        return false;
    }
}
public function get_qrar($glsa_rkm)
{
    $this->db->select('*');
    $this->db->from("md_gadwal_a3mal_gam3ia_omomia");
    $this->db->where("glsa_rkm", $glsa_rkm);
    $this->db->where('elqrar_add', 1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->num_rows();
    } else {
        return false;
    }
}
/*public function select_all_glasat_by_rkm($glsa_rkm)
{
    $this->db->order_by('glsa_rkm','desc');
    $this->db->where('glsa_rkm',$glsa_rkm);
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
 
   
   
   $x++;
       }
       return $data;
   }else{
       return false;
   }

}*/

    public function select_all_glasat_by_rkm($glsa_rkm)
    {
        $this->db->order_by('glsa_rkm', 'desc');
        $this->db->where('glsa_rkm', $glsa_rkm);
        $query = $this->db->get('md_all_glasat_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $data = array();
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->members = $this->get_all_details_for_print($row->glsa_rkm);


                $x++;
            }
            return $data;
        } else {
            return false;
        }

    }

   public function get_all_details_for_print($rkm)
    {
        $this->db->where('glsa_rkm', $rkm)->where('hdoor_satus',1);
        $query = $this->db->get('md_all_glasat_hdoor_gam3ia_omomia');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $row) {
                $query[$key]->member_data = $this->get_by('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
                $query[$key]->odwiat_data = $this->get_by('md_all_gam3ia_omomia_odwiat', array('member_id_fk' => $row->mem_id_fk));
            }
            return $query;
        } else {
            return false;
        }
    }


public function select_all_galasat_finshed()
{
     $this->db->where('glsa_finshed',1);
    $this->db->order_by('glsa_rkm','desc');
   $query=$this->db->get('md_all_glasat_gam3ia_omomia');
   if($query->num_rows()>0)
   {
       $data=array();
       $x=0;
       foreach ($query->result() as $row)
       {
   $data[$x]=$row;
   $data[$x]->members=$this->get_all_details($row->glsa_rkm);
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



public function get_open_galesa()
    {
        return $this->db->select('COUNT(id) as count ')->where('glsa_finshed', 0)->get('md_all_glasat_gam3ia_omomia')->row()->count;
    }

  /*  public function get_by($table, $where_arr, $select)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            return $q->$select;
        } else {
            return false;
        }

    }
*/


    public function get_by($table, $where_arr, $select = false)
    {

        $q = $this->db->where($where_arr)
            ->get($table)->row();
        if (!empty($q)) {
            if (!empty($select)) {
                return $q->$select;
            } else {
                return $q;
            }
        } else {
            return false;
        }

    }
/*********************************************/


    public function get_galsa_attach($glsa_id_fk)
    {
        $this->db->where('glsa_id_fk',$glsa_id_fk);
        $query=$this->db->get('md_all_glasat_gam3ia_omomia_attaches');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }

    public  function insert_attach($glsa_id_fk,$file){

        $data['glsa_id_fk'] = $glsa_id_fk;
        $data['title'] = $this->input->post('title');
        if (!empty($file)) {
            $data['file'] = $file;
        }
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);

        $this->db->insert('md_all_glasat_gam3ia_omomia_attaches',$data);

    }


    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 ) {
                return $data->user_username;
            }  elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            }
            return $this->getUserNameByRoll($id, $table, $field);
        }
        return false;

    }

    public function getUserNameByRoll($id, $table, $field)
    {
        return $this->db->where('id', $id)->get($table)->row_array()[$field];
    }

    public function delete_attach($id,$table)
    {
//        $img = $this->get_row_morfq($id);
//        if (file_exists("uploads/md/all_glasat_gam3ia_omomia_attaches/" . $img->file)) {
//            unlink(FCPATH . "uploads/md/all_glasat_gam3ia_omomia_attaches/" . $img->file);
//        }
        $this->db->where('id', $id)->delete($table);

    }


    public function get_galsa_morfaq($glsa_id_fk , $type)
    {
        $this->db->where('glsa_id_fk',$glsa_id_fk);
        $this->db->where('type',$type);
        $query=$this->db->get('md_all_glasat_gam3ia_omomia_morfaq');
        if($query->num_rows()>0)
        {
            return $query->result();
        }else{
            return false;
        }
    }



    public  function insert_morfaq($glsa_id_fk,$file){

        $data['glsa_id_fk'] = $glsa_id_fk;
        $data['title'] = $this->input->post('title');
        $data['type'] = $this->input->post('type');
        if (!empty($file)) {
            $data['file'] = $file;
        }
        $data['date']= strtotime(date("Y-m-d"));
        $data['date_ar'] = date('Y-m-d H:i:s');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);

        $this->db->insert('md_all_glasat_gam3ia_omomia_morfaq',$data);

    }
    
    
    public function change_status($valu, $id)
    {
        $status = 1 - $valu;
        $data['status'] = $status;
        $this->db->where('id', $id)->update('md_all_glasat_gam3ia_omomia', $data);

        return $status;
    }
    
  /*************************************/
  
  
      function get_member_hdoor($rkm)
{

    $this->db->select('md_all_glasat_hdoor_gam3ia_omomia.*, md_all_gam3ia_omomia_odwiat.rkm_odwia, md_all_gam3ia_omomia_odwiat.subs_to_date_m, md_all_gam3ia_omomia_odwiat.rkm_odwia_full
    ');
    $this->db->from('md_all_glasat_hdoor_gam3ia_omomia');
    $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_glasat_hdoor_gam3ia_omomia.mem_id_fk', "LEFT");
     
    
    $this->db->order_by("md_all_gam3ia_omomia_odwiat.rkm_odwia", "asc");
    $this->db->where('glsa_rkm', $rkm);
    $this->db->where('hdoor_satus', 1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $query = $query->result();
        foreach ($query as $key => $row) {
            $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
        }
        return $query;
    } else {
        return false;
    }


}
    function get_member_hdoor_new($rkm)
{
    $this->db->select('md_all_glasat_hdoor_gam3ia_omomia.*, md_all_gam3ia_omomia_odwiat.rkm_odwia, md_all_gam3ia_omomia_odwiat.subs_to_date_m, md_all_gam3ia_omomia_odwiat.rkm_odwia_full,
    md_all_gam3ia_omomia_members.name as mofawd_name
    ');
    $this->db->from('md_all_glasat_hdoor_gam3ia_omomia');
    $this->db->join('md_all_gam3ia_omomia_odwiat', 'md_all_gam3ia_omomia_odwiat.member_id_fk = md_all_glasat_hdoor_gam3ia_omomia.mem_id_fk', "LEFT");
    $this->db->join('md_all_gam3ia_omomia_members', 'md_all_gam3ia_omomia_members.id = md_all_glasat_hdoor_gam3ia_omomia.member_id', "LEFT");
    
    $this->db->order_by("md_all_gam3ia_omomia_odwiat.rkm_odwia", "asc");
    $this->db->where('glsa_rkm', $rkm);
    $this->db->where('hdoor_satus', 1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $query = $query->result();
       foreach ($query as $key => $row) {
            $query[$key]->member_data = $this->get_by_mem('md_all_gam3ia_omomia_members', array('id' => $row->mem_id_fk));
        }
        return $query;
    } else {
        return false;
    }


}


function get_hdoor_num($glsa_rkm)
{

    $data = array();
    $data['glsa_members_all'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 10);
    $data['glsa_members_accept'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 1);
    $data['glsa_members_refuse'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 2);
    $data['glsa_members_wait'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 0);
    $data['glsa_members_no_action'] = $this->get_glasat_hdoor_da3wat_num($glsa_rkm, 5);

    return $data;

}
    
    
    }