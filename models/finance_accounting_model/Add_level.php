<?php
	
class Add_level extends CI_Model
{
    public function __construct() {
        parent::__construct();
}    
//-------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value) ){
            return 0;
        }else{
            return $post_value;
        }
    }
    

public function find($from_id){
    $query = $this->db->select('*')->from('accounts_group')->where('id', $from_id)->get();
    $type = $query->result();
    if(isset($type) && $type != null)
      $this->find($type[0]->from_id);
    return $type;
  }
public  function insert(){
    $data['name']=$this->chek_Null($this->input->post('name'));
    $data['code']=$this->chek_Null($this->input->post('code'));
    $data['from_id']=$this->chek_Null($this->input->post('from_id'));
    $data['level']=$this->chek_Null($this->input->post('level'));
    $data['have_branch']=$this->input->post('branch');

    if($this->input->post('types'))
      $data['type']=$this->chek_Null($this->input->post('types'));
    else{
      $final = $this->find($data['from_id']);
      $data['type'] = $final[0]->type;
    }
    if($data['type'] == 1 || $data['type'] == 3){
      $data['account_type'] = 1;
      if($this->chek_Null($this->input->post('branch')) == 2){
        $data['last_value_madeen'] = $this->chek_Null($this->input->post('last_value_madeen'));
        $data['last_value_dayen'] = $this->chek_Null($this->input->post('last_value_dayen'));
        $data['last_value'] = $this->chek_Null($this->input->post('last_value_madeen')) - $this->chek_Null($this->input->post('last_value_dayen'));
      }
    }
    if($data['type'] == 2 || $data['type'] == 4){
      $data['account_type'] = 2;
      if($this->chek_Null($this->input->post('branch')) == 2){
        $data['last_value_madeen'] = $this->chek_Null($this->input->post('last_value_madeen'));
        $data['last_value_dayen'] = $this->chek_Null($this->input->post('last_value_dayen'));
        $data['last_value'] = $this->chek_Null($this->input->post('last_value_dayen')) - $this->chek_Null($this->input->post('last_value_madeen'));
      }
    }

      $this->db->insert('accounts_group',$data);
}
//------------------------ update -------------------
public  function update($id){
    $data['name']=$this->chek_Null($this->input->post('name'));
    $data['code']=$this->chek_Null($this->input->post('code'));
    $data['from_id']=$this->chek_Null($this->input->post('from_id'));
    $data['level']=$this->chek_Null($this->input->post('level'));
    $data['have_branch']=$this->input->post('branch');
       
    if($this->input->post('types'))
      $data['type']=$this->chek_Null($this->input->post('types'));
    else{
      $final = $this->find($data['from_id']);
      $data['type'] = $final[0]->type;
    }
    if($data['type'] == 1 || $data['type'] == 3){
      $data['account_type'] = 1;
      if($this->chek_Null($this->input->post('branch')) == 2){
        $data['last_value_madeen'] = $this->chek_Null($this->input->post('last_value_madeen'));
        $data['last_value_dayen'] = $this->chek_Null($this->input->post('last_value_dayen'));
        $data['last_value'] = $this->chek_Null($this->input->post('last_value_madeen')) - $this->chek_Null($this->input->post('last_value_dayen'));
      }
    }
    if($data['type'] == 2 || $data['type'] == 4){
      $data['account_type'] = 2;
      if($this->chek_Null($this->input->post('branch')) == 2){
        $data['last_value_madeen'] = $this->chek_Null($this->input->post('last_value_madeen'));
        $data['last_value_dayen'] = $this->chek_Null($this->input->post('last_value_dayen'));
        $data['last_value'] = $this->chek_Null($this->input->post('last_value_dayen')) - $this->chek_Null($this->input->post('last_value_madeen'));
      }
    }
    
       $this->db->where('id',$id);
       $update= $this->db->update('accounts_group',$data);
}


//---------------------------------------------------------
public function select_all(){   
    $this->db->select("*");
    $this->db->from('accounts_group');
    $this->db->where('from_id',0);
    $query = $this->db->get();
      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                    $data[$row->id] = $row;
                     $query2 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row->id);
                  if ($query->num_rows() > 0) {
                   foreach ($query2->result() as $row2) {
                   $data[$row2->id] = $row2;
                   $query3 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row2->id);
                           if ($query3->num_rows() > 0) {
                               
                                foreach ($query3->result() as $row3) {
                                     $data[$row3->id] = $row3;
                                     $query4 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row3->id);
                                           if ($query4->num_rows() > 0) {
                                              foreach ($query4->result() as $row4) {
                                              $data[$row4->id] = $row4;
                                              $query5 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row4->id);
                                                      if ($query5->num_rows() > 0) {
                                                      foreach ($query5->result() as $row5) {
                                                     
                                                     $data[$row5->id] = $row5;
                                                     }}
                                            
                                     
                                     }}
                                     
                                }
                            }        
                         
                          }
                  
                         }
                
            }
            return $data;
        }
    
}
//-------------------------------------------------------------------
 public function root(){
    $this->db->select("*");
    $this->db->from('accounts_group');
    $this->db->group_by('from_id');
    $query = $this->db->get();
      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
             $query2 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row->from_id);    
                    $sub_data=array();
                    foreach ($query2->result() as $row2) {
                        
                        $sub_data[]=$row2;
                    }
                        $data[]=$row->from_id;       
                
            }
    return $data;
    }
    return false;
 }
 //------------------------------------------------------------------
    public  function get_by_code($code){
        $h = $this->db->get_where('accounts_group', array('code'=>$code));
        return $h->row_array();
    }
//------------------------------------------------------------------
    public  function get_by_id($id){
        $h = $this->db->get_where('accounts_group', array('id'=>$id));
        return $h->row_array();
    }
//-------------------------------------------------------------------
   public function get_last($from_id){
       $this->db->select('*');
       $this->db->from('accounts_group');
       $this->db->where('from_id',$from_id);
       $this->db->order_by("id","DESC");
       $this->db->limit(1);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data = $row->code;
           }
           return $data;
       }
       return false;
   }
/**
 * ==================================================================================================================
 */

public function get_categories(){

        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('from_id', 0);

        $parent = $this->db->get();
        
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;
    }
//-----------------------------------------------------------
    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('from_id', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;       
    }
//-----------------------------------------------------------


    public function select_disabled(){
        $this->db->select("*");
        $this->db->from('accounts_group');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $query2 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row->id);
                if ($query->num_rows() > 0) {
                    $var['dis'.$row->id] = 'disabled';
                    foreach ($query2->result() as $row2) {
                        $data[$row2->id] = $row2;
                        $query3 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row2->id);
                        if ($query3->num_rows() > 0) {
                            $var['dis'.$row2->id] = 'disabled';
                            foreach ($query3->result() as $row3) {
                                $data[$row3->id] = $row3;
                                $query4 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row3->id);
                                if ($query4->num_rows() > 0) {
                                    $var['dis'.$row3->id] = 'disabled';
                                    foreach ($query4->result() as $row4) {
                                        $data[$row4->id] = $row4;
                                        $query5 = $this->db->query("SELECT * FROM `accounts_group` WHERE `from_id`=".$row4->id);
                                        if ($query5->num_rows() > 0) {
                                            foreach ($query5->result() as $row5) {

                                                $data[$row5->id] = $row5;
                                            }}


                                    }}

                            }
                        }

                    }

                }

            }

            return $var;
        }

    }

}//END CLASS 

?>