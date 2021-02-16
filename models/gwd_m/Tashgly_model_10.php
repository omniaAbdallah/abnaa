<?php
class Tashgly_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val="";
            return $val;
        }else{
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
    public function select_allStrategy()
    {
        $this->db->select('*');
        $this->db->from("gwd_tashgly_plans");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function last_pln_rkm(){
        $this->db->select('*');
        $this->db->from("gwd_tashgly_plans");
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->pln_rkm;
            }
            return $data;
        }
        return 0;
    }
    public function insert(){
            $data['pln_rkm']=$this->input->post('pln_rkm');
            $data['pln_name']=$this->input->post('pln_name');
            $data['pln_year']=date("Y", strtotime($this->input->post('pln_from_date')));
            $data['pln_from_date']= $this->input->post('pln_from_date');
            $data['pln_to_date']= $this->input->post('pln_to_date');
            // $data['pln_reviser_emp_code']= $this->input->post('pln_reviser_emp_code');
            // $data['pln_reviser_name']= $this->input->post('pln_reviser_name');
            // $data['pln_suspender_emp_code']= $this->input->post('pln_suspender_emp_code');
            // $data['pln_suspender_name']= $this->input->post('pln_suspender_name');
              //yara14-9-2020
              $pln_reviser=explode('-',$this->input->post('pln_reviser_name'));
              $data['pln_reviser_emp_code']=$pln_reviser[1];
              $data['pln_reviser_name']=$pln_reviser[0];
              $pln_suspender=explode('-',$this->input->post('pln_suspender_name'));
              $data['pln_suspender_emp_code']=$pln_suspender[1];
              $data['pln_suspender_name']=$pln_suspender[0];
               //yara14-9-2020
            $data['strategy_pln_fk']= $this->input->post('strategy_pln_fk');
            $data['strategy_pln_name']= $this->input->post('strategy_pln_name');
            $data['pln_wasf']= $this->input->post('pln_wasf');
            $data['date_added']= date('Y-m-d');
            $data['publisher']=$_SESSION['user_id'];
            $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
            $this->db->insert('gwd_tashgly_plans',$data);
    }
    public function update($id){
        //$data['pln_rkm']=$this->input->post('pln_rkm');
        $data['pln_name']=$this->input->post('pln_name');
        $data['pln_year']=date("Y", strtotime($this->input->post('pln_from_date')));
        $data['pln_from_date']= $this->input->post('pln_from_date');
        $data['pln_to_date']= $this->input->post('pln_to_date');
        // $data['pln_reviser_emp_code']= $this->input->post('pln_reviser_emp_code');
        // $data['pln_reviser_name']= $this->input->post('pln_reviser_name');
        // $data['pln_suspender_emp_code']= $this->input->post('pln_suspender_emp_code');
        // $data['pln_suspender_name']= $this->input->post('pln_suspender_name');
          //yara14-9-2020
          $pln_reviser=explode('-',$this->input->post('pln_reviser_name'));
          $data['pln_reviser_emp_code']=$pln_reviser[1];
          $data['pln_reviser_name']=$pln_reviser[0];
          $pln_suspender=explode('-',$this->input->post('pln_suspender_name'));
          $data['pln_suspender_emp_code']=$pln_suspender[1];
          $data['pln_suspender_name']=$pln_suspender[0];
           //yara14-9-2020
        $data['strategy_pln_fk']= $this->input->post('strategy_pln_fk');
        $data['strategy_pln_name']= $this->input->post('strategy_pln_name');
        $data['pln_wasf']= $this->input->post('pln_wasf');
        $data['date_added']= date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $this->db->where('id',$id);
        $this->db->update('gwd_tashgly_plans',$data);
    }
    public function delete_tashgly($id,$table='gwd_tashgly_plans'){
        $this->db->where('id',$id);
        $this->db->delete($table);
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
//======================================gwd_tashgly_plans_program==============================================
    public function select_allStrategy_program($id)
    {
        $this->db->select('*');
        $this->db->from("gwd_tashgly_programs");
        $this->db->where("tashgly_id_fk",$id);
        $this->db->order_by("program_order","ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data=$query->result();
            $i=0;
            foreach ($query->result() as $row){
                $data[$i]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
    public function insert_program(){
        $data['tashgly_id_fk']=$this->input->post('tashgly_id_fk');
        $data['program_name']=$this->input->post('program_name');
        $data['program_wasf']= $this->input->post('program_wasf');
        $data['program_order']= $this->input->post('program_order');
        //yara7-4-2020
        $data['program_year_money']=$this->input->post('program_year_money');
        $data['prog_reviser_name']= $this->input->post('prog_reviser_name');
        $data['prog_ms2ol_name']= $this->input->post('prog_ms2ol_name');
        //
        $data['date_added']= date('Y-m-d');
        $data['publisher']=$_SESSION['user_id'];
        $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
        $this->db->insert('gwd_tashgly_programs',$data);
}
public function update_program($id){
    $data['program_name']=$this->input->post('program_name');
    $data['program_wasf']= $this->input->post('program_wasf');
    $data['program_order']= $this->input->post('program_order');
    $data['program_year_money']=$this->input->post('program_year_money');
    $data['prog_reviser_name']= $this->input->post('prog_reviser_name');
    $data['prog_ms2ol_name']= $this->input->post('prog_ms2ol_name');
    $data['date_added']= date('Y-m-d');
    $data['publisher']=$_SESSION['user_id'];
    $data['publisher_name']= $this->getUserName($_SESSION['user_id']);
    $this->db->where('id',$id);
    $this->db->update('gwd_tashgly_programs',$data);
}
public function delete_tashgly_program($id,$table='gwd_tashgly_programs'){
    $this->db->where('id',$id);
    $this->db->delete($table);
}
public function last_pln_rkm_prog($id){
    $this->db->select('*');
    $this->db->from("gwd_tashgly_programs");
    $this->db->where("tashgly_id_fk",$id);
    $this->db->order_by("program_order","DESC");
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data = $row->program_order;
        }
        return $data;
    }
    return 0;
}
 //yara7-4-2020
 public function check_code($prog_code,$plan_rkm)
 {
     $this->db->select('program_order');
     $this->db->from("gwd_tashgly_programs");
     $this->db->where("program_order", $prog_code);
     $this->db->where("tashgly_id_fk", $plan_rkm);
     $query = $this->db->get();
     if ($query->num_rows() > 0) {
         return 1;
     }
     return 0;
 }
//yara8-4-2020
public function insert_wants_values_program($id){
    $data['all_wanted_values']=$this->input->post('all_wanted_values');
    $data['part1']=$this->input->post('part1');
    $data['part2']= $this->input->post('part2');
    $data['part3']= $this->input->post('part3');
    $data['part4']=$this->input->post('part4');
    $data['total']= $this->input->post('total');
    $data['wanted_values_date']= date('Y-m-d');
    $data['wanted_values_publisher']= $this->getUserName($_SESSION['user_id']);
    $this->db->where('id',$id)->update('gwd_tashgly_programs',$data);
}
public function insert_achived_values_program($id){
    $data['part1_achived']=$this->input->post('part1_achived');
    $data['part2_achived']= $this->input->post('part2_achived');
    $data['part3_achived']= $this->input->post('part3_achived');
    $data['part4_achived']=$this->input->post('part4_achived');
    $data['total_achived']=$this->input->post('total_achived');
    //
    $data['result1']=$this->input->post('result1');
    $data['result2']= $this->input->post('result2');
    $data['result3']= $this->input->post('result3');
    $data['result4']=$this->input->post('result4');
    $data['total_result']=$this->input->post('total_result');
    //
    $data['achived_values_date']= date('Y-m-d');
    $data['achived_values_publisher']= $this->getUserName($_SESSION['user_id']);
    $this->db->where('id',$id)->update('gwd_tashgly_programs',$data);
}
}// END CLASS