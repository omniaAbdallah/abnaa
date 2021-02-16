<?php

class Money extends CI_Model
{
 public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
          $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
    public  function get_father_national_card($mother_national_num_fk){
    
        $h = $this->db->get_where("father", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['f_national_id'];

    }
    public  function get_father_name($mother_national_num_fk){
    
        $h = $this->db->get_where("father", array('mother_national_num_fk'=>$mother_national_num_fk));
        $arr= $h->row_array();
        return $arr['full_name'];

    }
//---------------------------------------------------

    //---------------------------------------------------
    public  function  insert($num)
    {
        if (($this->input->post('income_max')) != ''){
             for ($a=0;$a<$this->input->post('income_max');$a++){
               //  if(!empty($this->input->post('value_income'.$a))&&$this->input->post('affect_income'.$a) !=''){
                 $data['mother_national_num_fk']=$this->chek_Null($num);
                 $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_income'.$a));
                 $data['value']=$this->chek_Null($this->input->post('value_income'.$a));
                 $data['affect']=$this->chek_Null($this->input->post('affect_income'.$a));
                 $data['type']=1;
                 $this->db->insert('web_family_income_duties',$data);
               //  }
             }
        }
        if (($this->input->post('duty_max')) != '' ){
            for ($a=0;$a<$this->input->post('duty_max');$a++){
               // if(!empty($this->input->post('value_duty'.$a))&& $this->input->post('affect_duty'.$a) !='') {
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_duty'.$a));
                    $data['value'] = $this->chek_Null($this->input->post('value_duty' . $a));
                    $data['affect'] = $this->chek_Null($this->input->post('affect_duty' . $a));
                    $data['type'] = 2;
                    $this->db->insert('web_family_income_duties', $data);
               // }
            }
        }
    }
    
    
      public function getArray($num)
    {
        $this->db->select('*');
        $this->db->from('web_family_income_duties');
        $this->db->where("mother_national_num_fk",$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->finance_income_type_id] = $row;
            }
            return $data;
        }else{
            return 0;
        }

    }




//----------------------------------------------------------
   public function getById($id){
        $h = $this->db->get_where('family_income_duties', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }

  
    
    
     public function update($num){
        
            $this->db->where('mother_national_num_fk',$num);
            $this->db->delete("family_income_duties");

        if (!empty($this->input->post('income_max'))){
            for ($a=0;$a<$this->input->post('income_max');$a++){
              //  if(!empty($this->input->post('value_income'.$a))&&$this->input->post('affect_income'.$a) !=''){
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_income'.$a));
                    $data['value']=$this->chek_Null($this->input->post('value_income'.$a));
                    $data['affect']=$this->chek_Null($this->input->post('affect_income'.$a));
                    $data['type']=1;
                    $this->db->where('mother_national_num_fk', $num);
                    $this->db->insert('web_family_income_duties',$data);
             //   }
            }
        }
        if (!empty($this->input->post('duty_max'))){
            for ($a=0;$a<$this->input->post('duty_max');$a++){
              //  if(!empty($this->input->post('value_duty'.$a))&& $this->input->post('affect_duty'.$a) !='') {
                    $data['mother_national_num_fk']=$this->chek_Null($num);
                    $data['finance_income_type_id']=$this->chek_Null($this->input->post('finance_income_type_id_duty'.$a));
                    $data['value'] = $this->chek_Null($this->input->post('value_duty' . $a));
                    $data['affect'] = $this->chek_Null($this->input->post('affect_duty' . $a));
                    $data['type'] = 2;
                    $this->db->insert('web_family_income_duties',$data);
            //    }
            }
        }

    }
    
    
     public function select_bank(){
        $this->db->select('*');
        $this->db->from('banks_settings');
        $this->db->order_by('id','DESC');
        //$this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

public function select_mother_name($national_id)
	{
		 $sql = $this->db->where('mother_national_num_fk',$national_id)->get('mother')->row_array();
         return $sql['full_name'];
	}




    public function  get_member_num($mother_national_num_fk){
        $this->db->select("*");
        $this->db->from("f_members");
        $this->db->where("mother_national_num_fk",$mother_national_num_fk);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();

    }

    public function GetF2a($value)
    {
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row()->title;

        }else{
            return 0;
        }

    }
 /***************************************************/
 public function sum_mosfed_in_mother($mother_national_num_fk){

     $this->db->select('*');
     $this->db->from('mother');
     $this->db->where('mother_national_num_fk',$mother_national_num_fk);
     $this->db->where('person_type',62);
     $this->db->where('halt_elmostafid_m',1);
      $query = $this->db->get();
    
      return $rowcount = $query->num_rows();


}


public function sum_mosfed_in_f_members($mother_national_num_fk){

     $this->db->select('*');
     $this->db->from('f_members');
     $this->db->where('mother_national_num_fk',$mother_national_num_fk);
     $this->db->where('member_person_type',62);
    $this->db->where('halt_elmostafid_member',1);
      $query = $this->db->get();
      return $rowcount = $query->num_rows();

}   
    //------------------------------ 20-10-2018
    public function Get_family_F2a($value)
    {
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row();

        }else{
            return 0;
        }

    }

        public function update_basic_data($mother_national_num){
        $data['family_cat'] = $this->chek_Null($this->input->post('family_cat_id'));
        $data['person_value'] = $this->chek_Null($this->input->post('naseb'));
        $data['family_cat_name'] = $this->chek_Null($this->input->post('family_cat_n'));

        $this->db->where('mother_national_num',$mother_national_num);
        $this->db->update('basic',$data);
       
    }
    
    	   public function GetF2a_id($value)
    {
        $this->db->where('from <=',$value);
        $this->db->where('to >=',$value);
        $query = $this->db->get("family_category");
        if($query->num_rows() >0){
            return $query->row()->id;

        }else{
            return 0;
        }

    }
    

    
    

}// END CLASS 