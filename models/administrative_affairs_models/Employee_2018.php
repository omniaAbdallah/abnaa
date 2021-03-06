<?php
class Employee extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function select_by(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id !=',9);
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }

  
  /*  public function insert($img_file, $training_file){
        $data['emp_code']=$this->input->post('emp_code');
        $data['employee']=$this->input->post('employee');
        $data['administration']=$this->input->post('administration');
        $data['department']=$this->input->post('department');
        $data['birth_date']=strtotime($this->input->post('birth_date'));
        $data['id_num']=$this->input->post('id_num');
        $data['address']=$this->input->post('address');
        $data['phone_num']=$this->input->post('phone_num');
        $data['email']=$this->input->post('email');
        $data['scientific_qualification']=$this->input->post('scientific_qualification');
        $data['all_courses']=$this->input->post('all_courses');
        $data['social_status']=$this->input->post('social_status');
        $data['contract']=$this->input->post('contract');
        $data['salary']=$this->input->post('salary');
        $data['img']=$img_file ;
        $data['job_attach']=$img_file ;
        $data['group_affairs_id_fk']=$this->input->post('group_affairs_id_fk');
        $data['past_days']=$this->input->post('past_days');
        $data['gender_id']=$this->input->post('gender_id');
       // $data['b_naql']=$this->input->post('b_naql');
      //  $data['b_etislat']=$this->input->post('b_etislat');
      //  $data['k_tamen']=$this->input->post('k_tamen');
        $data['degree_id']=$this->input->post('degree_id'); 
        $data['training'] = $training_file;
        $data['insurance_num'] = $this->input->post('insurance_num');
        $data['mobile'] = $this->input->post('mobile');
        $data['bank_id_fk'] = $this->input->post('bank_id_fk');
        $data['bank_account'] = $this->input->post('bank_account');
        
        $data['b_sakn'] = $this->input->post('b_sakn');
        $data['b_mosalat'] = $this->input->post('b_mosalat');
        $data['b_amal'] = $this->input->post('b_amal');
        $data['b_maesha'] = $this->input->post('b_maesha');
        $data['k_tamen'] = $this->input->post('k_tamen');
        
        
      //  $data['emp_allowances'] = serialize($this->input->post('allowances'));
      //  $data['emp_deduction'] = serialize($this->input->post('deduction'));
        
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('employees',$data);
    }

    public function update($id,$img_file,$training_file){
        $data['emp_code']=$this->input->post('emp_code');
        $data['employee']=$this->input->post('employee');
        $data['administration']=$this->input->post('administration');
        $data['department']=$this->input->post('department');
        $data['birth_date']=strtotime($this->input->post('birth_date'));
        $data['id_num']=$this->input->post('id_num');
        $data['address']=$this->input->post('address');
        $data['phone_num']=$this->input->post('phone_num');
        $data['email']=$this->input->post('email');
        $data['scientific_qualification']=$this->input->post('scientific_qualification');
        $data['all_courses']=$this->input->post('all_courses');
        $data['social_status']=$this->input->post('social_status');
        $data['contract']=$this->input->post('contract');
        $data['salary']=$this->input->post('salary');
        $data['img']=$img_file ;
        $data['group_affairs_id_fk']=$this->input->post('group_affairs_id_fk');
        $data['past_days']=$this->input->post('past_days'); 
        $data['gender_id']=$this->input->post('gender_id');
       // $data['b_naql']=$this->input->post('b_naql');
       // $data['b_etislat']=$this->input->post('b_etislat');
      //  $data['k_tamen']=$this->input->post('k_tamen');
        $data['degree_id']=$this->input->post('degree_id'); 
        $data['training'] = $training_file;
        $data['insurance_num'] = $this->input->post('insurance_num');
        $data['mobile'] = $this->input->post('mobile');
        $data['bank_id_fk'] = $this->input->post('bank_id_fk');
        $data['bank_account'] = $this->input->post('bank_account');
        
        $data['b_sakn'] = $this->input->post('b_sakn');
        $data['b_mosalat'] = $this->input->post('b_mosalat');
        $data['b_amal'] = $this->input->post('b_amal');
        $data['b_maesha'] = $this->input->post('b_maesha');
        $data['k_tamen'] = $this->input->post('k_tamen');
    //    $data['emp_allowances'] = serialize($this->input->post('allowances'));
     //   $data['emp_deduction'] = serialize($this->input->post('deduction'));
        
        $this->db->where('id', $id);
        $this->db->update('employees',$data);
    }
*/
    public function insert($img_file, $training_file){

        $data['emp_code']=$this->input->post('emp_code');
        $data['employee']=$this->input->post('employee');
        $data['administration']=$this->input->post('administration');
        $data['department']=$this->input->post('department');
        $data['birth_date']=strtotime($this->input->post('birth_date'));
        $data['id_num']=$this->input->post('id_num');
        $data['address']=$this->input->post('address');
        $data['phone_num']=$this->input->post('phone_num');
        $data['email']=$this->input->post('email');
        $data['scientific_qualification']=$this->input->post('scientific_qualification');
        $data['all_courses']=$this->input->post('all_courses');
        $data['social_status']=$this->input->post('social_status');
        $data['contract']=$this->input->post('contract');
        $data['salary']=$this->input->post('salary');
        $data['img']=$img_file ;
        $data['job_attach']=$img_file ;
        $data['group_affairs_id_fk']=$this->input->post('group_affairs_id_fk');
        $data['past_days']=$this->input->post('past_days');
        $data['gender_id']=$this->input->post('gender_id');

        $data['degree_id']=$this->input->post('degree_id'); 
        $data['training'] = $training_file;
        $data['insurance_num'] = $this->input->post('insurance_num');
        $data['mobile'] = $this->input->post('mobile');
        $data['bank_id_fk'] = $this->input->post('bank_id_fk');
        $data['bank_account'] = $this->input->post('bank_account');
        
        $data['b_sakn'] = $this->input->post('b_sakn');
        $data['b_mosalat'] = $this->input->post('b_mosalat');
        $data['b_amal'] = $this->input->post('b_amal');
        $data['b_maesha'] = $this->input->post('b_maesha');
        $data['b_other'] = $this->input->post('b_other');
        $data['k_tamen'] = $this->input->post('k_tamen');

        $data['job_id_fk'] = $this->input->post('job_id_fk');

        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('employees',$data);
    }

    public function update($id,$img_file,$training_file){
        $data['emp_code']=$this->input->post('emp_code');
        $data['employee']=$this->input->post('employee');
        $data['administration']=$this->input->post('administration');
        $data['department']=$this->input->post('department');
        $data['birth_date']=strtotime($this->input->post('birth_date'));
        $data['id_num']=$this->input->post('id_num');
        $data['address']=$this->input->post('address');
        $data['phone_num']=$this->input->post('phone_num');
        $data['email']=$this->input->post('email');
        $data['scientific_qualification']=$this->input->post('scientific_qualification');
        $data['all_courses']=$this->input->post('all_courses');
        $data['social_status']=$this->input->post('social_status');
        $data['contract']=$this->input->post('contract');
        $data['salary']=$this->input->post('salary');
        $data['img']=$img_file ;
        $data['group_affairs_id_fk']=$this->input->post('group_affairs_id_fk');
        $data['past_days']=$this->input->post('past_days'); 
        $data['gender_id']=$this->input->post('gender_id');

        $data['degree_id']=$this->input->post('degree_id'); 
        $data['training'] = $training_file;
        $data['insurance_num'] = $this->input->post('insurance_num');
        $data['mobile'] = $this->input->post('mobile');
        $data['bank_id_fk'] = $this->input->post('bank_id_fk');
        $data['bank_account'] = $this->input->post('bank_account');
        $data['b_sakn'] = $this->input->post('b_sakn');
        $data['b_mosalat'] = $this->input->post('b_mosalat');
        $data['b_amal'] = $this->input->post('b_amal');
        $data['b_maesha'] = $this->input->post('b_maesha');
        $data['b_other'] = $this->input->post('b_other');
        $data['k_tamen'] = $this->input->post('k_tamen');


        $data['job_id_fk'] = $this->input->post('job_id_fk');
        $this->db->where('id', $id);
        $this->db->update('employees',$data);
    }




    public function select_allEmployee()
    {
        return $this->db->select('employees.*, admin.name AS admin_name, dep.name AS dep_name, prog_main_sitting.title')
                        ->from('employees')
                        ->join('department_jobs admin','employees.administration = admin.id')
                        ->join('department_jobs dep','employees.department = dep.id')
                        ->join('prog_main_sitting','prog_main_sitting.id=employees.contract')
                        ->get()
                        ->result();
    }

    public function select_employ_(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function select_employ_name(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function select_employ_by_dep(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$row->administration);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->administration]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function all_emp_details()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }

    public function get_emp_rewards_month($emp_id)
    {
        $this->db->select('*');
        $this->db->from('mon_rewards');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }

    public function get_emp_penalty_month($emp_id)
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('penalty_type',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }    

    public function select_depart_name()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `id`=' . $row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }

    public function select_depart_sub()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function select_emp_assigned($dep,$id)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('administration',$dep);
        $this->db->where('id !=',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function update_deport_employee($array_ids)
    {
        $data['deport_month']=date("m",time());
        $data['deport_year']=date("Y",time());
        $this->db->where_in("id",$array_ids);
        $this->db->update("employees",$data);
    }

    public function update_deport_emp_adds($table,$array_ids)
    {
        $data['deport']=1;
        $this->db->where_in("emp_id",$array_ids);
        $this->db->update($table,$data);
    }

    public function insert_deport_employee_salaries($process)
    {
        $data['p_cost']=$this->input->post("value");
        $data['madeen']=$this->input->post("madeen");
        $data['dayen']=$this->input->post("dayen");
        $data['paid_type']=0;
        $data['process']=$process;
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['pill_num']=time();
        $data['publisher']=$_SESSION['user_username'];
        $this->db->insert("all_deports",$data);
    }

    public function underot_emp_salaries()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('deport_month !=',date("m",time()));
        $this->db->where('deport_year !=',date("Y",time()));
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->employees_total_rewards = $this->get_emp_rewards_month($p_cat->id);
            $categories[$i]->employees_total_penalty = $this->get_emp_penalty_month($p_cat->id);
            $i++;
        }
        return $categories;
    }

    //=========================================
    public function get_emp_allowances_deduction_setting($id,$type){
      $this->db->select('emp_allowances ,emp_deduction');  
       $this->db->from('employees'); 
       $this->db->where('id',$id); 
       $query = $this->db->get();
       if ($query->num_rows() > 0) { 
           $data=$query->row_array();
           $ser_arr=unserialize($data[$type]);
           $data_return= array()  ;
           //$data_return=(object) $data_return;
           $i=0;
           foreach($ser_arr as $key=>$value){
              $data_return[$i]["defined_id"]=$key;
              $data_return[$i]['value']=$value;
              $data_return[$i]["defined_title"]=$this->get_setting_name($key);
              $i++;
           }
           return $data_return ;
       }    
    }
    //=========================================
    public function get_setting_name($id){
         $h = $this->db->get_where("all_defined_setting",array("defined_id"=>$id));
        return $h->row_array()["defined_title"];
    }





  public function get_dep_name($id){
         $h = $this->db->get_where("department_jobs",array("id"=>$id));
        return $h->row_array()["name"];
    }
/**************************************************/

/*
public function select_all()
{
    $this->db->select('*');
    $this->db->from('employees');
    $parent = $this->db->get();
    $categories = $parent->result();
    $i=0;
    foreach($categories as $row){
        $categories[$i] = $row;
        $categories[$i]->all_penalty = $this->get_all_penalty($row->id);
        $categories[$i]->all_rewards = $this->get_all_rewards($row->id);

        $i++;
    }
    return $categories;
}
*/
/*
public function get_all_penalty($id){
    $this->db->select('*');
    $this->db->from('penalty');
    $this->db->where('emp_id',$id);
    $this->db->where('penalty_type',8);
    $query = $this->db->get();
    $data=0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data  +=$row->value;
        }
        return$data;
    }else{
        return 0;
    }

}*/

public function get_all_rewards($id){
    $this->db->select('*');
    $this->db->from('mon_rewards');
    $this->db->where('emp_id',$id);
    $this->db->where('type',14);
    $query = $this->db->get();
    $data=0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data  +=$row->value;
        }
        return$data;
    }else{
        return 0;
    }

}


public function select_all()
{
    $this->db->select('*');
    $this->db->from('employees');
    $parent = $this->db->get();
    $categories = $parent->result();
    $i=0;
    foreach($categories as $row){
        $categories[$i] = $row;
        foreach ($this->select_all_prog_main_sitting()as $k=>$v){
            $categories[$i]->penalty[$v] = $this->get_all_penalty(array('emp_id'=>$row->id,'penalty_type'=>$v));
        }
        $categories[$i]->all_rewards = $this->get_all_rewards($row->id);
        $i++;
    }
    return $categories;
}
public function get_all_penalty($arr){
    $this->db->select('*');
    $this->db->from('penalty');
    $this->db->where($arr);
    $query = $this->db->get();
    $data=0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data  +=$row->value;
        }
        return$data;
    }else{
        return 0;
    }

}

    public function select_all_prog_main_sitting(){
        $this->db->select('*');
        $this->db->from('prog_main_sitting');
        $this->db->where('type',3);
        $this->db->where('cash',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[]=$row->id;
            }
            return$data;
        }else{
            return 0;
        }

    }
    /********************************************************/
    
          public function all_emp_salary($where=false)
{
    $this->db->select('*');
    $this->db->from('employees');
       if($where != false) {
        $this->db->where($where);
    }
    $query = $this->db->get();
    $i=0;
    if ($query->num_rows() > 0) {
    foreach($query->result() as $row){
        $data[$i] = $row;
          
        /*  
          foreach ($this->discount_types() as $value){
            $data[$i]->discount[$value] = $this->get_discount_salary_operations(array('emp_id'=>$row->id,'discount_id_fk'=>$value));
 
       $data[$i]->sssssss[$value] = $this->get_discount_salary_operations(array('emp_id'=>$row->id));
    
          
        }*/
        
         $data[$i]->discount_typesss = $this->get_discount_salary_operations_new___2(array('emp_id'=>$row->id));
         $data[$i]->employees_total_rewards = $this->get_emp_rewards_month($row->id);
         $data[$i]->employees_total_penalty = $this->get_emp_penalty_month_new($row->id);
         
         
       $data[$i]->sum_first_discount = $this->get_sum_first_discount($row->id);   
          
        $i++;
    }
    return $data;
    }else{
        return 0;
    }
}


          public function all_emp_salary_male($where=false)
{
    $this->db->select('*');
    $this->db->from('employees');
       if($where != false) {
        $this->db->where($where);
    }
    $query = $this->db->get();
    $i=0;
    if ($query->num_rows() > 0) {
    foreach($query->result() as $row){
        $data[$i] = $row;
          
         $data[$i]->discount_typesss = $this->get_discount_salary_operations_new___2(array('emp_id'=>$row->id));
         $data[$i]->employees_total_rewards = $this->get_emp_rewards_month($row->id);
         $data[$i]->employees_total_penalty = $this->get_emp_penalty_month_new($row->id);
         
         
       $data[$i]->sum_first_discount = $this->get_sum_first_discount($row->id);   
          
        $i++;
    }
    return $data;
    }else{
        return 0;
    }
}




public function get_discount_salary_operations_new___2($arr){
    $this->db->select('*');
    $this->db->from('discount_salary_operations');
    $this->db->order_by('id','asc');
    $this->db->where($arr);
    $this->db->where('mon',date("m",time()));
    $this->db->where('year',date("Y",time()));
    $this->db->where('deport',0);
    //$this->db->order('deport',0);
    $query = $this->db->get();
    $data=0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data =$row->discount_id_fk;
        }
        return$data;
    }else{
        return 0;
    }
}
 
 
 public function get_discount_salary_operations($arr){
    $this->db->select('*');
    $this->db->from('discount_salary_operations');
    $this->db->where($arr);
    $this->db->where('mon',date("m",time()));
    $this->db->where('year',date("Y",time()));
    $this->db->where('deport',0);
    
    $query = $this->db->get();
    $data=0;
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data  +=$row->value;
        }
        return$data;
    }else{
        return 0;
    }
}   
    
    
      public  function  discount_types(){
    $this->db->select('*');
   // $this->db->from('discount_salary');
      $this->db->from('discount_salary_operations');
  //  $this->db->group_by('emp_id');
  //  $this->db->order_by('discount_id_fk','asc');
    $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
        $this->db->where('deport',0);
         $this->db->where('emp_id',2);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){
            $data[]=$row->id;
        }
        return $data;
    }else{
        return 0;
    }

}
    public function get_emp_penalty_month_new($emp_id)
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
      //  $this->db->where('penalty_type',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    
    
    
    
        public function get_sum_first_discount($emp_id)
    {
        $this->db->select('*');
        $this->db->from('discount_salary_operations');
        $this->db->where('emp_id',$emp_id);
        $this->db->where('mon',date("m",time()));
        $this->db->where('year',date("Y",time()));
      $this->db->where('discount_id_fk',1);
        $this->db->where('deport',0);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total +=$row->value;
            }
            return $total;
        }
        return 0;
    }
    
}// END CLASS 