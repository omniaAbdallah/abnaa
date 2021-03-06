<?php

class Time_tables extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }
    
         private   function HijriToJD($inp){
          $input_date=explode('/',$inp);
           $m=$input_date[1];   
           $d=$input_date[0];  
           $y=$input_date[2]; 
        $out= (int)((11 * $y + 3) / 30) + (int)(354 * $y) + (int)(30 * $m)
        - (int)(($m - 1) / 2) + $d + 1948440 - 385;
       return  strtotime(jdtogregorian($out));
    }
//==========================================================
    public function insert($last){
        $session_id_fk=($last+1);
        //time_tables
        $time['council_id_fk'] = $this->chek_Null($this->input->post('council_id_fk'));
       // $time['session_date']= strtotime($this->input->post('session_date'));
        
         $time['session_date'] = $this->HijriToJD($this->chek_Null($this->input->post('session_date')));
         $time['session_date_ar'] = $this->chek_Null($this->input->post('session_date'));
        
        $this->db->insert('council_time_tables',$time);
        //members
        for ($a=1;$a<=$this->input->post('max');$a++) {
            $member['council_id_fk'] =$session_id_fk;
            if($this->input->post('member'.$a) != '') {
                  $member['members_nums'] = $this->chek_Null($this->input->post('member'.$a));
                 $this->db->insert('council_members_table',$member);
             }
        }
        //items_decisions
        for ($s=1;$s<=$this->input->post('band_num');$s++) {
            $item['session_id_fk'] = $session_id_fk;
            $item['item_num'] = $this->chek_Null($this->input->post('item_num'.$s));
            $item['item_title'] = $this->chek_Null($this->input->post('item_title'.$s));
            $item['decision_num'] = 'null';
            $item['decision_title'] = 'null';
            $item['motab3a'] = 0;
            $this->db->insert('council_items_decisions',$item);
        }
    }
//==========================================================
public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('council_time_tables');
        $this->db->where('council_id_fk',$id);
        $this->db->delete('council_members_table');
        $this->db->where('session_id_fk',$id);
        $this->db->delete('council_items_decisions');

    }
//==============================================================================================
public function select_items(){
        $this->db->select('*');
        $this->db->from('council_items_decisions');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_items_decisions` WHERE `session_id_fk`=' . $row->session_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->session_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
//=====================================================
    public function getById($id){
        $h = $this->db->get_where('council_time_tables', array('id'=>$id));
        return $h->row_array();

    }
//==========================================================
    public function update_item($id){
        $data['item_title'] = $this->chek_Null($this->input->post('item_title'));
        $this->db->where('id', $id);
        $this->db->update('council_items_decisions',$data);
    }
//==============================================================
    public function select_members_session($session_id)
    {
        $this->db->select('*');
        $this->db->from('council_members_table');
        $this->db->where('council_id_fk', $session_id);
        
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_members_table` WHERE `council_id_fk`=' . $row->council_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->council_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
    
    
    
        public function count_members_session($session_id){
        $this->db->select('*')->from('council_members_table')->where('council_id_fk',$session_id); 
        $q = $this->db->get(); 
        return $q->num_rows();
    } 

        public function count_item_session($session_id){
        $this->db->select('*')->from('council_items_decisions')->where('session_id_fk',$session_id); 
        $q = $this->db->get(); 
        return $q->num_rows();
    } 

    public function select_members()
    {
        $this->db->select('*');
        $this->db->from('council_members_table');
        
        
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_members_table` WHERE `council_id_fk`=' . $row->council_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->council_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
//==========================================================

    public function select_job_title_2()
    {
        $this->db->select('*');
        $this->db->from('magls_members_table');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arr = array();
            foreach ($query->result() as $row) {
                    $arr[$row->id] = $row;
            }
            return $arr;
        }
        return false;
    }
    
    
    public function select_job_title()
    {
        $this->db->select('*');
        $this->db->from('magls_members_t');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arr = array();
            foreach ($query->result() as $row) {
                    $arr[$row->id] = $row;
            }
            return $arr;
        }
        return false;
    }
//==========================================================    
    public function get_job_title(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
//==========================================================
    public function select_all_time_tables(){
        $this->db->select('*');
        $this->db->from('council_time_tables');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_time_tables` WHERE `council_id_fk`=' . $row->council_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->council_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
//================================================================
    public function update_time_table($id){
       //$time['session_date']=strtotime($this->input->post('session_date'));
         $time['session_date'] = $this->HijriToJD($this->chek_Null($this->input->post('session_date')));
         $time['session_date_ar'] = $this->chek_Null($this->input->post('session_date'));
        
       
        $this->db->where('id', $id);
        $this->db->update('council_time_tables', $time);
   }
   public function update_member($session_id_fk){
     for ($a=1;$a<=$this->input->post('max');$a++) {
            $member['council_id_fk'] =$session_id_fk;
            if($this->input->post('member'.$a) != '') {
                  $member['members_nums'] = $this->chek_Null($this->input->post('member'.$a));
                 $this->db->insert('council_members_table',$member);
             }
        }
    
   }
//==========================================================   
   public function insert_bonod($session_id_fk){  
    
    //echo $session_id_fk;
  //  die;
    
      for ($s=1;$s<=$this->input->post('band_num');$s++) {
            $item['session_id_fk'] = $session_id_fk;
            $item['item_num'] = $this->chek_Null($this->input->post('item_num'.$s));
            $item['item_title'] = $this->chek_Null($this->input->post('item_title'.$s));
            $item['decision_num'] = 'null';
            $item['decision_title'] = 'null';
            $item['motab3a'] = 0;
            $this->db->insert('council_items_decisions',$item);
        }
      
   }   
//==========================================================
    public function update_decision()
    {
        $max=$this->input->post('max');
        for ($a = 1; $a <= $max; $a++) {
               $id=$this->input->post('id'.$a);
                $data['decision_title'] = $this->input->post('decision_title_edit'.$id);
                $this->db->where('id', $id);
                $this->db->update('council_items_decisions', $data);
              }
    }
 //----------------------------------------------------------------   
        public function update_decision_(){
            //update
            for($a=1;$a<=$this->input->post('max');$a++){
                if($this->input->post('decision_title_edit'.$a) != ''):
                    $data['decision_title'] = $this->chek_Null($this->input->post('decision_title_edit'.$a));
                endif;
                if($this->input->post('item_title_edit'.$a) != ''):
                    $data['item_title'] = $this->chek_Null($this->input->post('item_title_edit'.$a));
                endif;
                    $this->db->where('id', $this->input->post('id'.$a));
                  $this->db->update('council_items_decisions', $data);
            }

            //insert
            if(isset($_POST['band_num'])){
            for ($s=1;$s<=$this->input->post('band_num');$s++) {
                $item['session_id_fk'] = $this->chek_Null($this->input->post('council_id_fk'));
                $item['item_num'] = $this->chek_Null($this->input->post('item_num'.$s));
                $item['item_title'] = $this->chek_Null($this->input->post('item_title'.$s));
                $item['decision_num'] = 'null';
                $item['decision_title'] = $this->chek_Null($this->input->post('decision_title'.$s));
                $item['motab3a'] = 0;
                $this->db->insert('council_items_decisions',$item);
            }
            }
    }
    //================================================================
    public function delete_decision($id){
                $data['decision_title'] = 'null';
                $this->db->where('session_id_fk', $id);
                $this->db->update('council_items_decisions', $data);
        }


        //================================================================
    public function select_all_by_date()
    {
        $this->db->select('*');
        $this->db->from('council_time_tables');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_time_tables` WHERE `session_date`=' . $row->session_date);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->session_date] = $arr;
            }
            return $data;
        }
        return false;
    }

    //==================================================
    public function select_decisions()
    {
        $this->db->select('*');
        $this->db->from('council_items_decisions');
        $this->db->where('decision_title !=', 'null');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `council_items_decisions` WHERE  `decision_title` !=\'null\' AND `session_id_fk`=' . $row->session_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->session_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }
    //========================================================
    public function update_motab3a($id,$type){
        $data['motab3a'] = $type;
        $this->db->where('id', $id);
        $this->db->update('council_items_decisions',$data);
    }
    
    /*****************************/
    
     public function select_all($table,$grouby,$limit,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($grouby);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->limit($limit);
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
    
    
         public function select_last_id($table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        }
        return 0;
     } 
    
    
       public function select_last_id_magls($table){
        $this->db->select('*');
        $this->db->from($table);
         $this->db->where('status',1);
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->id;
            }
            return $data;
        }
        return 0;
     } 
     /*****************************************/
     
     
       public function select_items_desions($session_id_fk){
        $this->db->select('*');
        $this->db->from('council_items_decisions');
         $this->db->where('session_id_fk',$session_id_fk);
		$this->db->order_by("id","asc");
	
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }      
     
     
     
     
    
    
}//endfunc