<?php

class Contract_employee_model extends CI_Model
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
    
        public function get_emp_data($emp_id)
    {
        $this->db->select('employees.id,employees.employee,employees.emp_code,hr_finance_employes.having_all_value')
            ->from('employees')
            ->join('hr_finance_employes',"employees.id=hr_finance_employes.emp_id")
            ->where('employees.id',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    //-----------------------------------------------------------
    public function check_finance_data($emp_id)
    {
        $this->db->select('finance_employes.having_all_value')
            ->from('finance_employes')
            ->where('finance_employes.emp_code',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    
    
        public function check_finance_data_new($emp_id)
    {
        $this->db->select('hr_finance_employes.having_all_value')
            ->from('hr_finance_employes')
            ->where('hr_finance_employes.emp_id',$emp_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }
    
    
    //-----------------------------------------------------------

    
     public function get_banks_data(){
        $this->db->select('*');
        $this->db->from("banks_settings");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
           $data=$query->result();$i=0;
            foreach ($query->result() as $row){
               $data[$row->id]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
    
        public function insert(){

       
           $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
           $data['num_days_in_month']=$this->chek_Null( $this->input->post('num_days_in_month'));
           $data['hours_work']=$this->chek_Null( $this->input->post('hours_work'));
           $data['hour_value']=$this->chek_Null($this->input->post('hour_value'));
           $data['work_period_id_fk']=$this->chek_Null( $this->input->post('work_period_id_fk'));
           $data['work_period_id_fk']=$this->chek_Null( $this->input->post('work_period_id_fk'));
           $data['contract_nature']=$this->chek_Null( $this->input->post('contract_nature'));
           $data['job_type']=$this->chek_Null($this->input->post('job_type'));
          $data['pay_method_id_fk']=$this->chek_Null($this->input->post('pay_method_id_fk'));



           if($this->input->post('bank_id_fk') !=''){
           $bank=explode('-',$this->input->post('bank_id_fk'));
           $data['bank_id_fk']=$bank[0];
           $data['bank_code']=$bank[1]; 
           }else{
            $data['bank_id_fk']=0; 
            $data['bank_code']=0; 
           }
           $data['bank_account_num']=$this->chek_Null( $this->input->post('bank_account_num'));
           $data['year_vacation_num']=$this->chek_Null( $this->input->post('year_vacation_num'));
           
           $data['year_vacation_period']=$this->chek_Null( $this->input->post('year_vacation_period'));
           $data['casual_vacation_num']=$this->chek_Null( $this->input->post('casual_vacation_num'));
           
           $data['travel_ticket']=$this->chek_Null( $this->input->post('travel_ticket'));
           
           $data['travel_type_fk']=$this->chek_Null( $this->input->post('travel_type_fk'));
           $data['travel_period']=$this->chek_Null( $this->input->post('travel_period'));
           $data['reward_end_work']=$this->chek_Null( $this->input->post('reward_end_work'));
            
            $data['vacation_previous_balance']=$this->chek_Null( $this->input->post('vacation_previous_balance'));
            $data['vacation_start_ar']=$this->chek_Null( $this->input->post('vacation_start'));
          //  $data['vacation_start']=$this->chek_Null( strtotime($this->input->post('vacation_start')) );
         
             $data['vacation_start_m']=$this->chek_Null( $this->input->post('vacation_start_m'));
            $data['vacation_start_h']=$this->chek_Null( $this->input->post('vacation_start_h'));
		//	 $data['vacation_start']=$this->chek_Null( strtotime($this->input->post('vacation_start_m')) );
          $data['travel_type_name']=$this->chek_Null( $this->input->post('travel_type_name'));
       
           if($this->get_employee($this->input->post('emp_code'))>0){
               $this->db->where('emp_code',$this->input->post('emp_code'));
               $this->db->update('contract_employe',$data);


           }else {


               $this->db->insert('contract_employe',$data);

           }
       }
    
    
     public function get_employee($emp_code)
    {
        $this->db->where('emp_code',$emp_code);
        $query=$this->db->get('contract_employe');
        return $query->num_rows();
}   
     //=======================================================
    public  function get_emp_salary($emp_id){
        $basid_salary = $this->get_in_salary(array("emp_code"=>$emp_id,"badl_discount_id_fk"=>9)); // راتب اساسى 
        if($basid_salary != 0){
            return $basid_salary;
        }elseif ($basid_salary == 0){
            $sectioned_salary= $this->get_in_salary(array("emp_code"=>$emp_id,"badl_discount_id_fk"=>10)); // راتب مقطوع 
            if ($sectioned_salary != 0){
                return $sectioned_salary;
            }else{
                return 0;  
            }
        }else{
            return 0;
        }
    }
    //=======================================================
    public function get_in_salary($arr){
        $h = $this->db->get_where("emp_badlat_discount_details",$arr);
        if($h->num_rows() > 0){
        $data = $h->row_array();
        return $data["value"];
        }
        return 0 ;
    }
    //========================================================    

}// END CLASS

