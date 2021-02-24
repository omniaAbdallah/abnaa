<?php
class Employee_salaries_model extends CI_Model{




	public function select_last_mosayer(){
        $this->db->select('*');
        $this->db->from("hr_mosayer");
		$this->db->order_by("id","DESC");
		$this->db->limit(1);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->mosayer_rkm;
            }
            return $data;
        }else{
		return 1;
		}
     }
/***********/
    public function insert_sysat(){
        $titles_arr =array('absent'=>'غياب',
            'takher'=>'تأخير',
            'sa3at_edafi'=>'ساعات إضافي');
        foreach ($titles_arr as $key=>$value){
            if(!empty($_POST[$key])){
                foreach ($_POST[$key] as $k=>$v){
                    $data[$k]=$v;
                }
                $this->db->where('title',$key);
                $this->db->update('hr_mosayer_sysat',$data);
            }
        }
    }
    public function get_data_insert_sysat($arr){
        $this->db->where($arr);
        $query = $this->db->get('hr_mosayer_sysat');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public  function  get_records(){
        $titles_arr =array('absent'=>'غياب',
            'takher'=>'تأخير',
            'sa3at_edafi'=>'ساعات إضافي');
        foreach ($titles_arr as $key=>$value){
        $data[$key]=$this->get_data_insert_sysat(array('title'=>$key));
        }
        return $data;
    }


/**************/
public function Employee_date_new(){
    $this->db->select('employees.id,employees.emp_code,employees.employee as emp_name,employees.edara_n, employees.qsm_n, 
                    employees.mosma_wazefy_n, employees.markz_id, employees.markz_name, employees.emp_type, employees.card_num,
                     employees.mosma_wazefy_n , employees.employee_type,
                     hr_egraat_setting.title as new_mosma_wazefy
                           ');
                           
    $this->db->from("employees");
   // $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
   $this->db->join('hr_egraat_setting', 'hr_egraat_setting.code = employees.mosma_wazefy_code',"left");
      $this->db->where('employee_type',1);
      $this->db->where('show_in_mosayer','yes');
     //   $this->db->where('emp_code',10021); 
     //    $this->db->where('employees.id','5');
      // $this->db->order_by("employees.cat_mosayer_id_fk", "ASC");
       $this->db->order_by("employees.mosma_wazefy_tarteb", "ASC");
       // $this->db->order_by("employees.emp_code", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
            $data[$i]->rateb_asasy= $this->get_badl_value(100,$row->emp_code);
            $data[$i]->badal_sakn= $this->get_badl_value(101,$row->emp_code);
            $data[$i]->badal_mowaslat= $this->get_badl_value(102,$row->emp_code);
            $data[$i]->badal_tabe3a_amal= $this->get_badl_value(103,$row->emp_code);
            $data[$i]->badal_taklef= $this->get_badl_value(104,$row->emp_code);
            $data[$i]->badal_e3asha= $this->get_badl_value(105,$row->emp_code);
            $data[$i]->badal_etsal= $this->get_badl_value(106,$row->emp_code);
            
            $data[$i]->khasm_tamen= $this->get_badl_value(200,$row->emp_code);
            $data[$i]->emp_pay_method= $this->get_contract_employe_data($row->emp_code,'pay_method_id_fk');
            $data[$i]->ayam_amal= $this->get_contract_employe_data($row->emp_code,'num_days_in_month');
            $data[$i]->sa3at_amal= $this->get_contract_employe_data($row->emp_code,'hours_work');
            $data[$i]->agr_sa3a= $this->get_contract_employe_data($row->emp_code,'hour_value');
            
            $data[$i]->emp_bank_id_fk= $this->get_bank_employes_details($row->id,'bank_id_fk');
            $data[$i]->emp_bank_account_num= $this->get_bank_employes_details($row->id,'bank_account_num');
             $data[$i]->bank_code= $this->get_bank_employes_details($row->id,'bank_code');
            
            $data[$i]->emp_name_in_bank= $this->get_bank_employes_details($row->id,'emp_bank_name');
              
            
/*$data[$i]->current_month_mokfaa= $this->get_current_mokafaa($row->emp_code,$this->current_date_mosayer('','month'),$this->current_date_mosayer('','year'));
$data[$i]->current_month_solaf= $this->get_current_solaf($row->emp_code,$this->current_date_mosayer('','month'),$this->current_date_mosayer('','year'));
$data[$i]->current_month_solaf_ta3gel = $this->get_current_solaf_ta3gel($row->emp_code,$this->current_date_mosayer('','month'),$this->current_date_mosayer('','year'));
$data[$i]->badal_entdab = $this->get_current_entdab($row->emp_code,$this->current_date_mosayer('','month'),$this->current_date_mosayer('','year'));
               
  */
  
$data[$i]->current_month_mokfaa= $this->get_current_mokafaa($row->emp_code,date('m'),date('Y'));
$data[$i]->current_month_solaf= $this->get_current_solaf($row->emp_code,date('m'),date('Y'));
$data[$i]->current_month_solaf_ta3gel = $this->get_current_solaf_ta3gel($row->emp_code,date('m'),date('Y'));
$data[$i]->badal_entdab = $this->get_current_entdab($row->emp_code,date('m'),date('Y'));
            
            // $data[$i]->bank_code_new = $this->get_bank_employes_details($bank_id_fk);
            
            $i++;

        }
        return $data;

    }
    return false;
}





       public function get_current_entdab($emp_code,$current_month,$current_year){
            
     $this->db->select('hr_entdab.*');
    $this->db->from("hr_entdab");
           
        $this->db->where("hr_entdab.emp_code",$emp_code);
        $this->db->where("hr_entdab.for_month",$current_month);
         $this->db->where("hr_entdab.for_year",$current_year);
         
       $this->db->where("hr_entdab.tanfez_hr",'yes');  
       $this->db->where("hr_entdab.tanfez_mosayer",'no');    
         
         
       $this->db->where("hr_entdab.suspend",4);

        
       
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->bdal_total;
            }
        }
        return $total;
    }

    public function get_badl_value($badl_code,$emp_code)
    {
        $this->db->where('badl_code', $badl_code);
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get('hr_finance_employes');
        if ($query->num_rows() > 0) {
            return $query->row()->value;
        } else {
            return 0;
        }
    }

    public function get_contract_employe_data($emp_code,$val)
    {
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get('contract_employe');
        if ($query->num_rows() > 0) {
            return $query->row()->$val;
        } else {
            return false;
        }
    }

    public function get_bank_employes_details($emp_id,$val)
    {
        $this->db->where('emp_code', $emp_id);
        $query = $this->db->get('bank_employes_details');
        if ($query->num_rows() > 0) {
            return $query->row()->$val;
        } else {
            return false;
        }
    }





    public function get_mosayer_sysat($syasa)
    {
        $this->db->where('title', $syasa);
        $query = $this->db->get('hr_mosayer_sysat');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }






/**********************************************************/
public function Employee_date(){
    $this->db->select('employees.* , 
                           all_defined_setting.defined_title as degree_name ,
                           ');
    $this->db->from("employees");
    $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id',"left");
   // $this->db->join('emp_badlat_discount_details', 'emp_badlat_discount_details.emp_code = employees.id',"left");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
           $data[$i]->main_salary= $this->get_main_salary($row->id);
           $data[$i]->badlat= $this->check_badl($row->id);
          // $data[$i]->sum = array_sum()
          // foreach ( $data[$i]->badlat as   )
            $i++;

        }
        return $data;

    }
    return false;
}

public function get_emp_badlat($emp_code){
    $this->db->select('badl_discount_id_fk,value');
    $this->db->where('badl_discount_id_fk !=',9);
    $this->db->where('emp_code',$emp_code);
  //  $this->db->order_by('badl_discount_id_fk','DESC');
    return $this->db->get('emp_badlat_discount_details')->result();
}
public function get_all_badlat(){
    $this->db->where('type',1);
    $this->db->where('id !=',9);
   // $this->db->order_by('id','DESC');
    return $this->db->get('emp_badlat_discount_settings')->result();

}
public function get_main_salary ($id){
    $this->db->where('badl_discount_id_fk',9);
    $this->db->where('emp_code',$id);
    return $this->db->get('emp_badlat_discount_details')->row();
}

public function check_badl($emp_code){
    $this->db->where('type',1);
    $this->db->where('id !=',9);
   // $this->db->order_by('id','DESC');
   $query = $this->db->get('emp_badlat_discount_settings');
   if ($query->num_rows()>0){
       $i=0;
       $value =0;
       $total = 0;
       foreach ($query->result() as $row){
           $data[$i]= $row;
           $data[$i]->value= $value;
           $data[$i]->emp_badl= $this->get_emp_badlat($emp_code);
           foreach ($data[$i]->emp_badl as $badl){
               if ($row->id == $badl->badl_discount_id_fk){
                   $data[$i]->value = $badl->value;
               }

           }
           $total +=  $data[$i]->value;
           $i++;
       }
       $data[0]->total= $total;
      return $data;
      // return $i;
   }
}

    public function get_all_mosayer_details_current_month_all($mosayer_rkm_fk,$emp_pay_method = null,$current_month,$current_year){
          $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk,
          hr_mosayer.mosayer_month');
         $this->db->from("hr_mosayer_details");
       //  $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left');
           $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
        
         $this->db->where('hr_mosayer.mosayer_month',$current_month);
        $this->db->where('hr_mosayer.mosayer_year',$current_year);
              if ($emp_pay_method != null) {
                 $this->db->where('emp_pay_method', $emp_pay_method);
             }
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data = $query->result();
             $i = 0;
             foreach ($query->result() as $row) {
                $data[$i]= $row;
          
                 $i++;
     
             }
             return $data;
     
         }
         return false;
     }
    public function get_all_mosayer_details_current_month($mosayer_rkm_fk,$emp_pay_method = null,$current_month,$current_year){
          $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk,
          hr_mosayer.mosayer_month');
         $this->db->from("hr_mosayer_details");
         $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left');
           $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
        
         $this->db->where('hr_mosayer.mosayer_month',$current_month);
        $this->db->where('hr_mosayer.mosayer_year',$current_year);
              if ($emp_pay_method != null) {
                 $this->db->where('emp_pay_method', $emp_pay_method);
             }
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data = $query->result();
             $i = 0;
             foreach ($query->result() as $row) {
                $data[$i]= $row;
          
                 $i++;
     
             }
             return $data;
     
         }
         return false;
     }


    public function get_all_mosayer_details($mosayer_rkm_fk,$emp_pay_method = null){
          $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk');
         $this->db->from("hr_mosayer_details");
         $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
           $this->db->where('mosayer_rkm_fk',$mosayer_rkm_fk);
        
              if ($emp_pay_method != null) {
                 $this->db->where('emp_pay_method', $emp_pay_method);
             }
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data = $query->result();
             $i = 0;
             foreach ($query->result() as $row) {
                $data[$i]= $row;
          
                 $i++;
     
             }
             return $data;
     
         }
         return false;
     }

    public function get_all_mosayer_details_new($mosayer_rkm_fk,$emp_pay_method = null){
          $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk');
         $this->db->from("hr_mosayer_details");
        // $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
           $this->db->where('mosayer_rkm_fk',$mosayer_rkm_fk);
        
              if ($emp_pay_method != null) {
                 $this->db->where('emp_pay_method', $emp_pay_method);
             }
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data = $query->result();
             $i = 0;
             foreach ($query->result() as $row) {
                $data[$i]= $row;
          
                 $i++;
     
             }
             return $data;
     
         }
         return false;
     }

    public function get_all_mosayer_data($mosayer_rkm)
    {
        $this->db->where('mosayer_rkm', $mosayer_rkm);
        $query = $this->db->get('hr_mosayer');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    
    
    

        public function get_current_mokafaa($emp_code,$current_month,$current_year){
            
     $this->db->select('hr_mokafat_details.*');
    $this->db->from("hr_mokafat_details");
           
        $this->db->where("hr_mokafat_details.emp_code",$emp_code);
        $this->db->where("hr_mokafat_details.month",$current_month);
         $this->db->where("hr_mokafat_details.year",$current_year);
       $this->db->where("hr_mokafat_details.suspend",4);

        
       
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value;
            }
        }
        return $total;
    }
    
    
           public function get_current_solaf($emp_code,$current_month,$current_year){
            
     $this->db->select('hr_solaf_quest.*,hr_solaf.suspend as e3tmad_solfa');
    $this->db->from("hr_solaf_quest");
    $this->db->join('hr_solaf', 'hr_solaf.t_rkm=hr_solaf_quest.t_rkm_fk', 'left');
             
        $this->db->where("hr_solaf_quest.emp_code_fk",$emp_code);
        $this->db->where("hr_solaf_quest.month",$current_month);
         $this->db->where("hr_solaf_quest.year",$current_year);
       $this->db->where("hr_solaf_quest.paid",'no');
 $this->db->where("hr_solaf.suspend",4);
       
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value_of_qst;
            }
        }
        return $total;
    }
    
    
    public function get_current_solaf_ta3gel($emp_code,$current_month,$current_year){
            
      $this->db->select('hr_solaf_ta3gel_months.*,hr_solaf_ta3gel.suspend,hr_solaf_ta3gel.fe2a_ta3gel');
    $this->db->from("hr_solaf_ta3gel_months");
      
      
         $this->db->join('hr_solaf_ta3gel', 'hr_solaf_ta3gel.id = hr_solaf_ta3gel_months.ta3gel_id_fk',"left");     
        $this->db->where("hr_solaf_ta3gel_months.emp_code",$emp_code);
     
        $this->db->where("hr_solaf_ta3gel_months.mosayer_month",$current_month);
         $this->db->where("hr_solaf_ta3gel_months.mosayer_year",$current_year);
        
      $this->db->where("hr_solaf_ta3gel_months.for_month != ",$current_month);

      $this->db->where("hr_solaf_ta3gel_months.closed_in_mosayer",'no');
     //   $this->db->where("hr_solaf_ta3gel.fe2a_ta3gel",3);
   //   $this->db->where("hr_solaf_ta3gel.suspend",4);
       
       
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->value_of_qst;
            }
        }
        return $total;
    }
    
    
    
  /**********************************************************************/
  
  public function get_all_mosayer_details_by_emp_id($mosayer_rkm_fk, $emp_id)
{
    $this->db->select('hr_mosayer_details.*');
    $this->db->from("hr_mosayer_details");
    $this->db->where('mosayer_rkm_fk', $mosayer_rkm_fk);
    $this->db->where('emp_id', $emp_id);
    $query = $this->db->get();
    return $query->row();
}

public function get_all_egrat_mosayer_by_emp_id($code, $mosayer_rkm_fk, $emp_id)
{
    $this->db->select('hr_mosayer_egraat.*');
    $this->db->from("hr_mosayer_egraat");
   $this->db->where('mosayer_rkm_fk', $mosayer_rkm_fk);
    $this->db->where('badal_code', $code);
    $this->db->where('emp_id', $emp_id);
    $query = $this->db->get();
    return $query->result();
}

function get_last_ancient_value($emp_id, $code,$mosayer_rkm_fk)
{
    $this->db->select('hr_mosayer_egraat.*');
    $this->db->from("hr_mosayer_egraat");
  $this->db->where('mosayer_rkm_fk', $mosayer_rkm_fk);
    $this->db->where('badal_code', $code);
    
    $this->db->where('emp_id', $emp_id);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get()->last_row('array');
  
       return $query;  
   
   
}
function save_egrat()
{
    /*17-8-20-om*/
    $data['mosayer_rkm_fk'] = $this->input->post('mosayer_rkm_fk');
    $data['egraa_date_ar'] = $this->input->post('egraa_date');
    $data['emp_name'] = $this->input->post('emp_name');
    $data['emp_id'] = $this->input->post('emp_id');
    $data['emp_code'] = $this->input->post('emp_code');
    $data['mosma_wazefy_n'] = $this->input->post('mosma_wazefy_n');
    $data['badal_code'] = $this->input->post('badal_code');
    $data['badal_n'] = $this->input->post('badal_n');
    $data['badal_name'] = $this->input->post('badal_n');
    $data['reason'] = $this->input->post('reason');
    $data['num'] = $this->input->post('num');
    /*17-8-20-om*/
    $data['new_value'] = round($this->input->post('new_value'));
   // $data['ancient_value'] = $this->get_last_ancient_value($data['emp_id'], $data['badal_code'])['new_value'];

   $data['ancient_value'] = $this->get_last_ancient_value($data['emp_id'], $data['badal_code'], $data['mosayer_rkm_fk'])['new_value'];/*18-8-20-om*/

    $data['subs_value'] = $data['new_value'] - $data['ancient_value'];

  if ($this->input->post('dwam_f2a')) {
        $data['dwam_f2a'] = $this->input->post('dwam_f2a');
    }

    if ($data['subs_value'] < 0) {
        $data['operation_value'] = 'min';
    } else {
        $data['operation_value'] = 'plus';
    }

    $data['publisher'] = $_SESSION['user_id'];
    $data['egraa_date'] = date('Y-m-d');
    $data['time_add'] = date('h:i A');
    $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);

    $this->db->insert('hr_mosayer_egraat', $data);

    /*17-8-20-om*/

  // return $this->update_mosayer($data['emp_id'], $data['badal_code'], $data['mosayer_rkm_fk'], $data['new_value']);
     return $this->update_mosayer($data['emp_id'], $data['badal_code'], $data['mosayer_rkm_fk'], $data['new_value']);
}


public function getUserName($user_id)
{
    $sql = $this->db->where("user_id", $user_id)->get('users');
    if ($sql->num_rows() > 0) {
        $data = $sql->row();
        if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
            return $data->user_username;
        } elseif ($data->role_id_fk == 2) {
            $id = $data->user_name;
            $table = 'magls_members_table';
            $field = 'member_name';
        } elseif ($data->role_id_fk == 3) {
            $id = $data->emp_code;
            $table = 'employees';
            $field = 'employee';
        } elseif ($data->role_id_fk == 4) {
            $id = $data->user_name;
            $table = 'general_assembley_members';
            $field = 'name';
        }
        return $this->getUserNameByRoll($id, $table, $field);
    }
    return false;

}

public function getUserNameByRoll($id, $table, $field)
{
    return $this->db->where('id', $id)->get($table)->row_array()[$field];
}

function delete_egraa($egraa_id)
{
    $this->db->where('id',$egraa_id)->delete('hr_mosayer_egraat');
}  
/*******************************************************************************/

  public function get_table_past($table)
    {
        /*if (!empty($arr)) {
            $this->db->where($arr);
        }*/
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
      public function get_table($table, $arr,$group_by)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $this->db->group_by($group_by);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
          public function get_all_mosayer_details_search_new($mosayer_rkm_fk){
        $this->db->select('hr_mosayer_details.*','employees.edara_id','employees.markz_id');
        $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id');
        $this->db->from("hr_mosayer_details");
         $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
         $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $edara = $this->input->post('edara');
         $mosayer_fe2at = $this->input->post('mosayer_fe2at');
         $markez_taklfa = $this->input->post('markez_taklfa');
         $pay_method_id_fk = $this->input->post('pay_method_id_fk');
         
       $this->db->where('hr_mosayer_details.emp_pay_method' ,$this->input->post('pay_method_id_fk'));

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
                $i++;
            }
            return $data;
        }
        return false;
    }
   
      public function get_all_mosayer_details_search($mosayer_rkm_fk){
        $this->db->select('hr_mosayer_details.*','employees.edara_id','employees.markz_id');
        $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id');
        $this->db->from("hr_mosayer_details");
         $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
         $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $edara = $this->input->post('edara');
         $mosayer_fe2at = $this->input->post('mosayer_fe2at');
         $markez_taklfa = $this->input->post('markez_taklfa');
         $pay_method_id_fk = $this->input->post('pay_method_id_fk');
         
         
         
         $conn_in = array();
        if (!empty($markez_taklfa)) {
            $conn_in['employees.markz_id'] = array();
            for ($i = 0; $i < sizeof($markez_taklfa); $i++) {
                array_push($conn_in['employees.markz_id'], $markez_taklfa[$i]);

            }
        }
        if (!empty($edara)) {
            $conn_in['employees.edara_id'] = array();
            for ($i = 0; $i < sizeof($edara); $i++) {
                array_push($conn_in['employees.edara_id'], $edara[$i]);

            }
        }
         if (!empty($mosayer_fe2at)) {
            $conn_in['employees.cat_mosayer_id_fk'] = array();
            for ($i = 0; $i < sizeof($mosayer_fe2at); $i++) {
                array_push($conn_in['employees.cat_mosayer_id_fk'], $mosayer_fe2at[$i]);

            }
        }
        
        
        
        if (!empty($pay_method_id_fk)) {
            $conn_in['hr_mosayer_details.emp_pay_method'] = array();
            for ($i = 0; $i < sizeof($pay_method_id_fk); $i++) {
                array_push($conn_in['hr_mosayer_details.emp_pay_method'], $pay_method_id_fk[$i]);

            }
        }
if (key_exists('employees.edara_id', $conn_in)) {
    $this->db->where_in('employees.edara_id', $conn_in['employees.edara_id']);
}
if (key_exists('employees.cat_mosayer_id_fk', $conn_in)) {
    $this->db->where_in('employees.cat_mosayer_id_fk', $conn_in['employees.cat_mosayer_id_fk']);
}

if (key_exists('employees.markz_id', $conn_in)) {
    $this->db->where_in('employees.markz_id', $conn_in['employees.markz_id']);
}
if (key_exists('hr_mosayer_details.emp_pay_method', $conn_in)) {
    $this->db->where_in('hr_mosayer_details.emp_pay_method', $conn_in['hr_mosayer_details.emp_pay_method']);
}


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
         
                $i++;
    
            }
            return $data;
    
        }
        return false;
    }
    


      public function get_all_mosayer_details_search_data($mosayer_rkm_fk){
        $this->db->select('hr_mosayer_details.*','employees.edara_id','employees.markz_id');
        $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id');
        $this->db->from("hr_mosayer_details");
         $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
      //   $this->db->where('hr_mosayer_details.sent_sarf',NULL);
         $edara = $this->input->post('edara');
         $mosayer_fe2at = $this->input->post('mosayer_fe2at');
         $markez_taklfa = $this->input->post('markez_taklfa');
         $pay_method_id_fk = $this->input->post('pay_method_id_fk');
         
         
         
         $conn_in = array();
        if (!empty($markez_taklfa)) {
            $conn_in['employees.markz_id'] = array();
            for ($i = 0; $i < sizeof($markez_taklfa); $i++) {
                array_push($conn_in['employees.markz_id'], $markez_taklfa[$i]);

            }
        }
        if (!empty($edara)) {
            $conn_in['employees.edara_id'] = array();
            for ($i = 0; $i < sizeof($edara); $i++) {
                array_push($conn_in['employees.edara_id'], $edara[$i]);

            }
        }
         if (!empty($mosayer_fe2at)) {
            $conn_in['employees.cat_mosayer_id_fk'] = array();
            for ($i = 0; $i < sizeof($mosayer_fe2at); $i++) {
                array_push($conn_in['employees.cat_mosayer_id_fk'], $mosayer_fe2at[$i]);

            }
        }
        
        
        
        if (!empty($pay_method_id_fk)) {
            $conn_in['hr_mosayer_details.emp_pay_method'] = array();
            for ($i = 0; $i < sizeof($pay_method_id_fk); $i++) {
                array_push($conn_in['hr_mosayer_details.emp_pay_method'], $pay_method_id_fk[$i]);

            }
        }
if (key_exists('employees.edara_id', $conn_in)) {
    $this->db->where_in('employees.edara_id', $conn_in['employees.edara_id']);
}
if (key_exists('employees.cat_mosayer_id_fk', $conn_in)) {
    $this->db->where_in('employees.cat_mosayer_id_fk', $conn_in['employees.cat_mosayer_id_fk']);
}

if (key_exists('employees.markz_id', $conn_in)) {
    $this->db->where_in('employees.markz_id', $conn_in['employees.markz_id']);
}
if (key_exists('hr_mosayer_details.emp_pay_method', $conn_in)) {
    $this->db->where_in('hr_mosayer_details.emp_pay_method', $conn_in['hr_mosayer_details.emp_pay_method']);
}


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
         
                $i++;
    
            }
            return $data;
    
        }
        return false;
    }
    public function getAll_markez($where)
    {
        $q = $this->db->where($where)->order_by('parent', 'ASC')->get('finance_markz_taklfa_tree')->result();
        if (!empty($q)) {
            foreach ($q as $key => $item) {
                if ($item->markz_no3 == 2) {
                    $q[$key]->acount_parent = $this->get_parent($item->code);
                }
            }
        }
        return $q;
    }
    public function get_parent($code)
    {
        $new_code=substr($code, 0, 2);
        $query2 = $this->db->where('code', $new_code)->get('finance_markz_taklfa_tree')->row_array();
        return $query2;
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
function update_mosayer($emp_id, $code, $mosayer_rkm_fk, $new_value)
{

   /* $code_arr = array(901 => 'khasm_keyab', 902 => 'agaza_bdon_rateb', 903 => 'khasm_takher', 904 => 'khasm_gezaa',905=>'tot_mokafaa', 100 => 'rateb_asasy', 101 => 'badal_sakn', 102 => 'badal_mowaslat', 106 => 'badal_etsal', 105 => 'badal_e3asha',
        103 => 'badal_tabe3a_amal', 107 => "tot_edafi", 104 => "badal_taklef", 200 => "khasm_tamen");*/
        
         $code_arr = array(901 => 'khasm_keyab', 902 => 'agaza_bdon_rateb', 903 => 'khasm_takher', 904 => 'khasm_gezaa', 905 => 'tot_mokafaa', 906 => 'tot_okraa_khasm', 100 => 'rateb_asasy', 101 => 'badal_sakn', 102 => 'badal_mowaslat', 106 => 'badal_etsal', 105 => 'badal_e3asha',
        103 => 'badal_tabe3a_amal', 107 => "tot_edafi", 104 => "badal_taklef", 200 => "khasm_tamen");   
        
    $where_arr = array('mosayer_rkm_fk' => $mosayer_rkm_fk, 'emp_id' => $emp_id);
    if (key_exists($code, $code_arr)) {
        $filed = $code_arr[$code];
        $data[$filed] = $new_value;

        $this->db->where($where_arr)->update('hr_mosayer_details', $data);
        $mosayer_data = $this->get_by('hr_mosayer_details', $where_arr, 1);

        $update_data['total_esthkak'] = $mosayer_data->rateb_asasy + $mosayer_data->badal_sakn + $mosayer_data->badal_mowaslat + $mosayer_data->badal_etsal + $mosayer_data->badal_e3asha + $mosayer_data->badal_tabe3a_amal + $mosayer_data->tot_edafi + $mosayer_data->badal_taklef + $mosayer_data->tot_mokafaa + $mosayer_data->tot_entdab + $mosayer_data->tot_okraa_esthkaq;
        $update_data['total_khsomat'] = $mosayer_data->khasm_keyab + $mosayer_data->agaza_bdon_rateb + $mosayer_data->khasm_takher + $mosayer_data->khasm_gezaa + $mosayer_data->khasm_tamen + $mosayer_data->khasm_solaf + $mosayer_data->tot_okraa_khasm;
        $update_data['safi'] = $update_data['total_esthkak'] - $update_data['total_khsomat'];

        $this->db->where($where_arr)->update('hr_mosayer_details', $update_data);

        $update_data['emp_id'] = $emp_id;
        $update_data['filed'] = $filed;
        $update_data['value'] = $mosayer_data->$filed;
        return $update_data;
    }




}
/*function update_mosayer($emp_id, $code, $mosayer_rkm_fk, $new_value)
{

    $code_arr = array(901 => 'khasm_keyab', 902 => 'agaza_bdon_rateb', 903 => 'khasm_takher', 904 => 'khasm_gezaa', 100 => 'rateb_asasy', 101 => 'badal_sakn', 102 => 'badal_mowaslat', 106 => 'badal_etsal', 105 => 'badal_e3asha',
        103 => 'badal_tabe3a_amal', 107 => "tot_edafi", 104 => "badal_taklef", 0 => "khasm_tamen");
    $where_arr = array('mosayer_rkm_fk' => $mosayer_rkm_fk, 'emp_id' => $emp_id);
    if (key_exists($code, $code_arr)) {
        $filed = $code_arr[$code];
        $data[$filed] = $new_value;

        $this->db->where($where_arr)->update('hr_mosayer_details', $data);
    }

    $mosayer_data = $this->get_by('hr_mosayer_details', $where_arr, 1);

    $update_data['total_esthkak'] = $mosayer_data->rateb_asasy + $mosayer_data->badal_sakn + $mosayer_data->badal_mowaslat + $mosayer_data->badal_etsal + $mosayer_data->badal_e3asha + $mosayer_data->badal_tabe3a_amal + $mosayer_data->tot_edafi + $mosayer_data->badal_taklef + $mosayer_data->tot_mokafaa + $mosayer_data->tot_entdab + $mosayer_data->tot_okraa_esthkaq;
    $update_data['total_khsomat'] = $mosayer_data->khasm_keyab + $mosayer_data->agaza_bdon_rateb + $mosayer_data->khasm_takher + $mosayer_data->khasm_gezaa + $mosayer_data->khasm_tamen + $mosayer_data->khasm_solaf + $mosayer_data->tot_okraa_khasm;
    $update_data['safi'] = $update_data['total_esthkak'] - $update_data['total_khsomat'];

    $this->db->where($where_arr)->update('hr_mosayer_details', $update_data);

    $update_data['emp_id'] = $emp_id;
    $update_data['filed'] = $filed;
    $update_data['value'] = $mosayer_data->$filed;
    return $update_data;


}*/

/*
      public function get_all_mosayer_actions($mosayer_rkm)
    {
       $this->db->where('mosayer_rkm_fk', $mosayer_rkm);
       
         $query = $this->db->get('hr_mosayer_egraat');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }*/


public function get_all_mosayer_actions($mosayer_rkm){
    $this->db->select('hr_mosayer_egraat.*,employees.personal_photo as emp_photo ');
                           
    $this->db->from("hr_mosayer_egraat");
    $this->db->join('employees', 'employees.emp_code = hr_mosayer_egraat.emp_code',"left");
    $this->db->where('hr_mosayer_egraat.mosayer_rkm_fk', $mosayer_rkm);
       $this->db->order_by("id", "ASC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
            $data[$i]->rateb_asasy= $this->get_badl_value(100,$row->emp_code);
            $i++;

        }
        return $data;

    }
    return false;
}


 function current_date_mosayer($date = false , $var)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $date = date('Y').'-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()["$var"];
    }

 function get_month($date = false)
    {
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        $date = date('Y').'-' . date('m', strtotime($date)) . '-' . date('d', strtotime($date));
        return $this->db->where('from_date <=', strtotime($date))->where('to_date >=', strtotime($date))->get('hr_mosayer_months')->row_array()['month'];
    }

    function get_mosayer_rkm(){

       return $this->db->select('MAX(mosayer_rkm) as max')->get('hr_mosayer')->row_array()['max'] + 1 ;
    }



    public function current_month_mosayer($current_month)
    {
    
        $this->db->where('month', $current_month);
        $query = $this->db->get('hr_mosayer_months');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
/********************************************/

public function get_all_emps_bank(){
    $this->db->select('employees.id,employees.emp_code,employees.employee as emp_name,employees.edara_n, employees.qsm_n, 
                    employees.mosma_wazefy_n, employees.markz_id, employees.markz_name, employees.emp_type, employees.card_num,
                     employees.mosma_wazefy_n , employees.employee_type,
                     bank_employes_details.bank_id_fk as emp_bank_id ,  bank_employes_details.bank_code,
                     bank_employes_details.emp_bank_name   as esm_lda_bank,
                      bank_employes_details.bank_account_num , banks_settings.title as bank_name,
                      contract_employe.pay_method_id_fk
                           ');
                           
    $this->db->from("employees");
    $this->db->join('bank_employes_details', 'bank_employes_details.emp_code = employees.id',"left");
   $this->db->join('banks_settings', 'banks_settings.id = bank_employes_details.bank_id_fk',"left");
   $this->db->join('contract_employe', 'contract_employe.emp_code = employees.emp_code',"left");
   
      $this->db->where('employee_type',1);
      $this->db->where('show_in_mosayer','yes');
       $this->db->order_by("employees.mosma_wazefy_tarteb", "ASC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;

            $i++;

        }
        return $data;

    }
    return false;
}
/****************************************************************/
/**
 *tbadol 
 */ 
 public function get_all_mosayer()
    {
        $this->db->where('id !=', 1);
        $query = $this->db->get('hr_mosayer');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function update_amin_manager($id)
    {
        $data['amin_name'] = $this->input->post('amin_name');
        $data['manager_name'] = $this->input->post('manager_name');
        $data['naeb_name'] = $this->input->post('naeb_name');
        $this->db->where("id", $id);
        $this->db->update('hr_mosayer', $data);
    }
    public function make_approve($id){
        $data['approved']=1;
        $data['cashing_date']=strtotime($this->input->post('cashing_date'));
        $data['due_date']=strtotime($this->input->post('due_date'));
        $this->db->where('id',$id);
        $this->db->update('hr_mosayer',$data);
   }
   public function insert_file($file, $mosayer_rkm)
    {
        $data['file_downloded'] = $file;
        $this->db->where('mosayer_rkm', $mosayer_rkm);
        $this->db->update('hr_mosayer', $data);
    }
    public function select_from_main_data()
    {
        $this->db->select('*');
        $this->db->from('main_data');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;

    }





  public function getById($num){
        $h = $this->db->get_where("hr_mosayer", array('mosayer_rkm'=>$num));
        return $h->row_array();
    }
    
          public function cheetDetailes($num){
        $this->db->select('hr_mosayer_details.*,employees.card_num');
        $this->db->from("hr_mosayer_details");
       $this->db->join('employees', 'employees.emp_code = hr_mosayer_details.emp_code',"left");
      //  $this->db->join("family_data","finance_sarf_order_details.mother_national_num_fk=family_data.file_num");
       // $this->db->join("banks_settings","banks_settings.id=family_data.bank_id_fk ");
      // $this->db->join("basic","finance_sarf_order_details.mother_national_num_fk=basic.mother_national_num");
        $this->db->where("mosayer_rkm_fk",$num);
          $this->db->where("emp_pay_method",3);
           $this->db->order_by("hr_mosayer_details.emp_code", "ASC");
        return $this->db->get()->result();

    }



           public function get_sum_cheetDetailes($mosayer_rkm_fk){
            
     $this->db->select('*');
    $this->db->from("hr_mosayer_details");
           
        $this->db->where("hr_mosayer_details.emp_pay_method",3);
        $this->db->where("hr_mosayer_details.mosayer_rkm_fk",$mosayer_rkm_fk);

        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->safi;
            }
        }
        return $total;
    }


    public function get_emp_tabdol_num($mosayer_rkm_fk){
        //$this->db->where($arr);
        $this->db->where("hr_mosayer_details.emp_pay_method",3);
        $this->db->where("hr_mosayer_details.mosayer_rkm_fk",$mosayer_rkm_fk);
        $query = $this->db->get('hr_mosayer_details');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }






function get_mosayer_month(){
    $month=$this->get_month();
    return  $this->db->select('COUNT(id) as count')->where('mosayer_month', $month)->get('hr_mosayer')->row_array()['count'];
}




    public function get_halet_taghez($current_mosayer_month)
    {
        
        $this->db->where('mosayer_month', $current_mosayer_month);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get('hr_mosayer');
        if ($query->num_rows() > 0) {
            return $query->row()->taghez;
        } else {
            return false;
        }
    }
    
    
    
    public function get_all_mosayer_dettails($month,$years){
        $this->db->select('*');
                               
        $this->db->from("hr_mosayer");
        $this->db->where('mosayer_month',$month);
       // $this->db->join('employees', 'employees.emp_code = hr_mosayer_egraat.emp_code',"left");
      // $this->db->where('id !=', 1);
           $this->db->order_by("id", "ASC");

        $query = $this->db->get();
     $year=$this->get_year($years);
     if( $year==1)
     {
        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
                
                $i++;
    
            }
            return $data;
    
        }
    }
        return false;
    }  
    
    
    
    
            public function get_all_mosayrat_for($mosayer_month,$mosayer_year){
        $this->db->select('*');  
        $this->db->from("hr_mosayer");
        $this->db->where('mosayer_month',$mosayer_month);
        $this->db->where('mosayer_year',$mosayer_year);
          $this->db->where('halet_sarf','yes');
           $this->db->order_by("id", "ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
                $i++;
            }
            return $data;
    
        }else{
            return false;  
        }
    } 
    
    
        public function get_all_mosayrat($mosayer_month,$mosayer_year){
        $this->db->select('*');
                               
        $this->db->from("hr_mosayer");
        $this->db->where('mosayer_month',$mosayer_month);
        $this->db->where('mosayer_year',$mosayer_year);
       // $this->db->join('employees', 'employees.emp_code = hr_mosayer_egraat.emp_code',"left");
      // $this->db->where('id !=', 1);
           $this->db->order_by("id", "ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->result();
            $i = 0;
            foreach ($query->result() as $row) {
               $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
                
                $i++;
    
            }
            return $data;
    
        }else{
            return false;  
        }

    } 
/*public function get_all_mosayer_dettails(){
    $this->db->select('*');
                           
    $this->db->from("hr_mosayer");
   // $this->db->join('employees', 'employees.emp_code = hr_mosayer_egraat.emp_code',"left");
   $this->db->where('id !=', 1);
       $this->db->order_by("id", "ASC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
            $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
            $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
            
            
            $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
            $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
            
            $i++;

        }
        return $data;

    }
    return false;
}*/



    public function get_all_emp_pay_method($emp_pay_method,$mosayer_rkm)
    {
       
        $this->db->where('emp_pay_method', $emp_pay_method);
        $this->db->where("mosayer_rkm_fk",$mosayer_rkm);
        $query = $this->db->get('hr_mosayer_details');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }    
    
    
    
 public function get_sum_all_emp_pay_method($emp_pay_method,$mosayer_rkm){
            
     $this->db->select('*');
    $this->db->from("hr_mosayer_details");
           
        $this->db->where("emp_pay_method",$emp_pay_method);
       $this->db->where("mosayer_rkm_fk",$mosayer_rkm);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach( $query->result() as $row){
                $total+=$row->safi;
            }
        }
        return $total;
    }
    
    
    
    
          public function get_all_mosayer_details_rwateb_for($mosayer_rkm_fk,$emp_pay_method = null){
        $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk');
       $this->db->from("hr_mosayer_details");
       $this->db->where('hr_mosayer_details.sent_sarf','yes');
       $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->where('mosayer_rkm_fk',$mosayer_rkm_fk);
      
            if ($emp_pay_method != null) {
               $this->db->where('emp_pay_method', $emp_pay_method);
           }
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
        
               $i++;
   
           }
           return $data;
   
       }
       return false;
   }
   
      public function get_all_mosayer_details_rwateb($mosayer_rkm_fk,$emp_pay_method = null){
        $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk');
       $this->db->from("hr_mosayer_details");
      // $this->db->where('hr_mosayer_details.sent_sarf',NULL);
       $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->where('mosayer_rkm_fk',$mosayer_rkm_fk);
      
            if ($emp_pay_method != null) {
               $this->db->where('emp_pay_method', $emp_pay_method);
           }
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
        
               $i++;
   
           }
           return $data;
   
       }
       return false;
   }  
    
        //new_funcc
    public function get_all_mosayer_details_rwateb_new($mosayer_month,$mosayer_year){
        $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,employees.cat_mosayer_id_fk,
        hr_mosayer.mosayer_month, hr_mosayer.mosayer_year
        ');
       $this->db->from("hr_mosayer_details");
      // $this->db->where('hr_mosayer_details.sent_sarf',NULL);
       $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
       $this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left'); 
        
         $this->db->where('hr_mosayer.mosayer_month',$mosayer_month);
      $this->db->where('hr_mosayer.mosayer_year',$mosayer_year);
         /*   if ($emp_pay_method != null) {
               $this->db->where('emp_pay_method', $emp_pay_method);
           }*/
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
        
               $i++;
   
           }
           return $data;
   
       }
       return false;
   }
    public function get_year($year)
    {
        $this->db->where('year',$year);
        $query = $this->db->get('hr_mosayer_months')->row();
      
        if(!empty($query))
        {
            return  1;
        }
        else{
            return  0;
        }
    }
    public function update_all_mosayer_details_search($mosayer_rkm_fk,$choosed_pay_method_id_fk)
    {
       $data['sent_sarf']="yes";
      $data['publisher_sent_sarf'] = $this->getUserName($_SESSION['user_id']);
      $data['sent_sarf_time']= date('h:i A');
       $this->db->where('mosayer_rkm_fk',$mosayer_rkm_fk);
       $this->db->where('emp_pay_method',$choosed_pay_method_id_fk);
       $this->db->update('hr_mosayer_details',$data);
    
    
     $data_mosyer['halet_sarf']="yes";
     $this->db->where('mosayer_rkm',$mosayer_rkm_fk);
     $this->db->update('hr_mosayer',$data_mosyer);
    
    }
    
    
    
    
    
        public function get_current_month_in_mosayer($current_month,$current_year)
    {
       
        $this->db->where('mosayer_month', $current_month);
        $this->db->where("mosayer_year",$current_year);
        $query = $this->db->get('hr_mosayer');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }    
    
     public function delete_mosayer($mosayer_fk)
    {
        $this->db->where('mosayer_rkm', $mosayer_fk)->delete('hr_mosayer');
        $this->db->where('mosayer_rkm_fk', $mosayer_fk)->delete('hr_mosayer_details');
        $this->db->where('mosayer_rkm_fk', $mosayer_fk)->delete('hr_mosayer_egraat');
        
        
    }
/***********************************************/

  /*12-8-20-om  تحويلات */
    public function get_emp_data($id)
    {
        $q = $this->db->select('id,emp_code,start_work_date_m')->where('id', $id)->get('employees')->row();
        return $q;
    }

    public function get_mosayer_data($arr)
    {
        $this->db->select('hr_mosayer.*,employees.id as emp_id,employees.employee,employees.degree_id,employees.personal_photo
        ,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from(' hr_mosayer');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id= hr_mosayer.emp_id_fk', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function get_mosayer_data_history($arr)
    {
        $this->db->select('hr_mosayer_history.*,users.*');
        $this->db->from('hr_mosayer_history');
        $this->db->where($arr);
        $this->db->join('users', 'users.user_id= hr_mosayer_history.from_user', 'left');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $c = 0;
            foreach ($query->result() as $value) {
                $data[$c] = $value;
                $data[$c]->from_user_job = $this->Get_job($value->from_user);
                $data[$c]->to_user_job = $this->Get_job($value->to_user);
                $c++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function Get_job($user_id)
    {
        $this->db->select('users.user_id ,users.emp_code,employees.id,employees.degree_id,all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from("users");
        $this->db->join('employees', 'users.emp_code=employees.id', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->job_title;
        } else {
            return false;
        }
    }

    public function get_employees_by_level($arr)
    {


        $query = $this->db->where($arr)->get('hr_egraat_emp_setting');
        if ($query->num_rows() > 0) {
            $query = $query->result();
            foreach ($query as $key => $value) {
                $query[$key]->photo = $this->Get_photo_emp($value->person_id);
            }
            return $query;

        } else {
            return false;
        }

    }

    public function Get_photo_emp($user_id)
    {

        $this->db->select('employees.id,employees.personal_photo');
        $this->db->from("employees");
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->personal_photo;
        } else {
            return false;
        }
    }

    public function save_from_transfomation()
    {

        $insert['mosayer_rkm_fk'] = $this->input->post('mosayer_rkm_fk');
        $insert['mosayer_id_fk'] = $this->input->post('mosayer_id_fk');
        $insert['from_user'] = $this->input->post('from_user');
        $from_user = $this->get_user_data2(array('user_id' => $this->input->post('from_user')));


        if (!empty($from_user)) {

            $insert['from_user_n'] = $from_user->employee;
            $update['current_from_user_id'] = $from_user->user_id;
            $update['current_from_user_name'] = $from_user->employee;
        }
        $to_user = $this->get_user_data2(array('users.emp_code' => $this->input->post('current_to_id')));

        if (!empty($to_user)) {
            $insert['to_user'] = $to_user->user_id;
            $insert['to_user_n'] = $to_user->employee;
            $update['current_to_user_id'] = $to_user->user_id;
            $update['current_to_user_name'] = $to_user->employee;
        }


        if ($this->input->post('reason_action')) {
            $insert['reason_action'] = $this->input->post('reason_action');
        }
        $insert['date'] = strtotime(date('Y-m-d'));
        $insert['date_ar'] = date('Y-m-d');

        $level = $this->input->post('level');

        switch ($level) {
            case 2:
                $update['suspend_direct_manager'] = $this->input->post('action');
                if ($update['suspend_direct_manager'] == 1) {
                    $update['suspend_direct_manager'] = 'yes';
                    $action = 1;
                } elseif ($update['suspend_direct_manager'] == 2) {
                    $update['suspend_direct_manager'] = 'no';
                    $action = 2;
                }
                break;
            case 3:
                $update['suspend_mohasb'] = $this->input->post('action');
                if ($update['suspend_mohasb'] == 1) {
                    $update['suspend_mohasb'] = 'yes';

                    $action = 1;
                } elseif ($update['suspend_mohasb'] == 2) {
                    $update['suspend_mohasb'] = 'no';
                    $action = 2;
                }
                break;
            case 4:
                $update['suspend_moder_mali'] = $this->input->post('action');
                if ($update['suspend_moder_mali'] == 1) {
                    $update['suspend_moder_mali'] = 'yes';
                    $action = 1;
                } elseif ($update['suspend_moder_mali'] == 2) {
                    $update['suspend_moder_mali'] = 'no';
                    $action = 2;
                }
                break;
            case 5:
                $update['suspend_moder_3am'] = $this->input->post('action');
                if ($update['suspend_moder_3am'] == 1) {
                    $update['suspend_moder_3am'] = 'yes';
                    $action = 4;
                } elseif ($update['suspend_moder_3am'] == 2) {
                    $update['suspend_moder_3am'] = 'no';
                    $action = 5;

                }
                break;
            default:
                break;
        }


        $level_data = $this->select_transformation_setting_by_level($level);
        $level_data_msg = $this->select_transformation_setting_by_level($this->input->post('level') - 1);
        if (!empty($level_data)) {
            $insert['level_title'] = $level_data->title;
            $insert['level'] = $level - 1;

            $update['level_title'] = $level_data->title;
            $update['level'] = $level;
        }
        if (isset($action)) {
            if (in_array($action, array(1, 4))) {
                $insert['talab_msg'] = $level_data_msg->msg_accept;
                $insert['action'] = 'yes';
                $update['talab_msg'] = $level_data_msg->msg_accept;
                if ($action == 4) {
                    $level = 0;
                    $to_user = $this->get_user_data2(array('employees.id' => $this->input->post('emp_id_fk')));
                    if (!empty($to_user)) {
                        $insert['to_user'] = $to_user->user_id;
                        $insert['to_user_n'] = $to_user->employee;
                        $update['current_to_user_id'] = $to_user->user_id;
                        $update['current_to_user_name'] = $to_user->employee;
                    }
                }
            } else {
                $insert['talab_msg'] = $level_data_msg->msg_refuse;
                $insert['action'] = 'no';
                $update['talab_msg'] = $level_data_msg->msg_refuse;
                if ($action == 5) {
                    $level = 0;
                    $to_user = $this->get_user_data2(array('employees.id' => $this->input->post('emp_id_fk')));
                    if (!empty($to_user)) {
                        $insert['to_user'] = $to_user->user_id;
                        $insert['to_user_n'] = $to_user->employee;
                        $update['current_to_user_id'] = $to_user->user_id;
                        $update['current_to_user_name'] = $to_user->employee;
                    }
                } else {
                    $level--;
                    $level_data = $this->select_transformation_setting_by_level($level - 1);
                    if (!empty($level_data)) {
                        $update['level_title'] = $level_data->title;
                        $update['level'] = $level;
                    }
                    $to_user = $this->get_user_data2(array('user_id' => $this->input->post('real_from_user')));
                    if (!empty($to_user)) {
                        $insert['to_user'] = $to_user->user_id;
                        $insert['to_user_n'] = $to_user->employee;
                        $update['current_to_user_id'] = $to_user->user_id;
                        $update['current_to_user_name'] = $to_user->employee;
                    }
                }
            }
        }

        /*    echo '<pre>';
            print_r($_POST);
            print_r($insert);
            print_r($update);
            echo '</pre>';
            die;*/
        $update['seen'] = 0;
        $this->db->insert("hr_mosayer_history", $insert);

        $this->db->where('mosayer_rkm', $this->input->post('mosayer_rkm_fk'));
        $this->db->update('hr_mosayer', $update);


    }

    public function get_user_data2($arr)
    {
        $this->db->select('users.*,employees.id as emp_id,employees.employee,employees.personal_photo,employees.degree_id,employees.manger,
        all_defined_setting.defined_id,all_defined_setting.defined_title as job_title');
        $this->db->from('users');
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=users.emp_code', 'left');
        $this->db->join('all_defined_setting', 'all_defined_setting.defined_id = employees.degree_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function select_transformation_setting_by_level($level)
    {
        $q = $this->db->where('level', $level)->where('tbl', 'mosayer')->get('hr_all_transformation_setting')->row();

        if (!empty($q)) {
            return $q;
        }
    }

    function update_seen_mosayer()
    {
        $this->db->where('current_to_user_id', $_SESSION['user_id']);
        $this->db->update('hr_mosayer', array('seen' => 1));

    }

    public function select_from_hr_mosayer_orders($arr)
    {
        $this->db->select('hr_mosayer.*,employees.id as emp_id,employees.employee');
        $this->db->from("hr_mosayer");
        $this->db->where($arr);
        $this->db->join('employees', 'employees.id=hr_mosayer.emp_id_fk', 'left');
        $this->db->order_by("hr_mosayer.id", "DESC");

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $x = 0;
            foreach ($query->result() as $row) {
                $data[$x] = $row;
                $data[$x]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$x]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
                $x++;
            }
            return $data;
        } else {
            return false;
        }
    }
    
    
    /**************************************/
public function get_all_mosayer_tabadols_sums($mosayer_rkm){
    $this->db->select('*');
    $this->db->from("hr_mosayer");
    $this->db->where('mosayer_rkm', $mosayer_rkm);
       $this->db->order_by("mosayer_rkm", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
            $i++;
        }
        return $data;
    }
    return false;
}

public function get_all_mosayer_tabadols_for(){
    $this->db->select('*');
    $this->db->from("hr_mosayer");
    $this->db->where('halet_sarf', 'yes');
       $this->db->order_by("mosayer_rkm", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
            $i++;
        }
        return $data;
    }
    return false;
}
public function get_all_mosayer_tabadols(){
    $this->db->select('*');
    $this->db->from("hr_mosayer");
    //$this->db->where('id !=', 1);
       $this->db->order_by("mosayer_rkm", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
            $i++;
        }
        return $data;
    }
    return false;
}


/**
 *@المرفقات
 */  

function save_attachment($images, $mosayer_rkm)
{
    if (!empty($images)) {
        $data['mosayer_rkm_fk'] = $mosayer_rkm;
        $data['attechment'] = $images;
        $data['title'] = $this->input->post('title');
        $data['date_ar'] = date("Y-m-d ");
        $data['time_ar'] = date("h:i A ");
        $data['date'] = strtotime(date("Y-m-d"));
        $data['publisher'] = ($_SESSION['user_id']);
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
        $this->db->insert('hr_mosayer_attechment', $data);
    }
}
function get_attachment($where = false)
{
    if (!empty($where)) {
        $this->db->where($where);
    }
    return $this->db->get('hr_mosayer_attechment')->result();
}
function delete_morfaq($row_id, $mosayer_rkm, $folder_path)
{
    $this->delete_upload($row_id, $mosayer_rkm,$folder_path);
    $this->db->where(array('mosayer_rkm_fk' => $mosayer_rkm, "id" => $row_id))->delete('hr_mosayer_attechment');
}
public function delete_upload($row_id, $mosayer_rkm,$folder_path)
{
    $img = $this->get_by('hr_mosayer_attechment', array('mosayer_rkm_fk' => $mosayer_rkm, "id" => $row_id), 1);
    if (file_exists($folder_path . "/" . $img->attechment)) {
        unlink(FCPATH . $folder_path. "/" . $img->attechment);
    }
    if (file_exists($folder_path . '/thumbs/' . $img->attechment)) {
        unlink(FCPATH . $folder_path . '/thumbs/' . $img->attechment);
    }
}
/**
 *@نهاية 
 */ 
    
/**
 *@تامينات 
 */ 
    
    
    public function get_all_mosayer_insurace(){
    $this->db->select('*');
    $this->db->from("hr_mosayer");
    //$this->db->where('id !=', 1);
       $this->db->order_by("mosayer_rkm", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
                $data[$i]->num_all_sheeks = $this->get_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->num_all_tahwel = $this->get_all_emp_pay_method(3,$row->mosayer_rkm);
                
                
                $data[$i]->sum_all_sheeks = $this->get_sum_all_emp_pay_method(2,$row->mosayer_rkm);
                $data[$i]->sum_all_tahwel = $this->get_sum_all_emp_pay_method(3,$row->mosayer_rkm);
            $i++;
        }
        return $data;
    }
    return false;
}    
    
    ///////////////////////////new/////////////////////////////
        public function get_all_mosayer_emps_insurace($mosayer_rkm_fk){
        $this->db->select('employees.*,hr_mosayer_details.mosayer_rkm_fk , hr_mosayer_details.rateb_asasy,
        hr_mosayer_details.badal_sakn,hr_mosayer_details.badal_mowaslat,
         employees_settings.title_setting as emp_nationality_name
                           ');
       $this->db->from("employees");
       $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);
       $this->db->join('hr_mosayer_details', 'hr_mosayer_details.emp_id =employees.id', 'left');
        $this->db->join('employees_settings', 'employees_settings.id_setting =employees.nationality', 'left');
      
       
         $this->db->where('employees.show_in_tamen','yes');

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
             // $data[$i]->finance_data=$this->get_all_finance_details_social_insurace($row->emp_id);
               $i++;
           }
           return $data;
       }
       return false;
   }
    
    
    
    public function get_all_mosayer_details_social_insurace($mosayer_rkm_fk){
        $this->db->select('hr_mosayer_details.*,employees.edara_id,employees.markz_id,
                           employees.markz_name,employees.nationality,employees.cat_mosayer_id_fk,
                           employees_settings.title_setting as emp_nationality_name
                           ');
       $this->db->from("hr_mosayer_details");
       $this->db->where('hr_mosayer_details.khasm_tamen !=',0.00);
       $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->join('employees_settings', 'employees_settings.id_setting =employees.nationality', 'left');
      
       
         $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
             // $data[$i]->finance_data=$this->get_all_finance_details_social_insurace($row->emp_id);
               $i++;
           }
           return $data;
       }
       return false;
   }
   ///
   public function get_all_finance_details_social_insurace($emp_id){
    $this->db->select('*');
     $this->db->where('emp_id',$emp_id);
     $this->db->where('badl_type',2);
     $this->db->where('dalel_code',41101008);
   $query = $this->db->get('hr_finance_employes');
   if ($query->num_rows() > 0) {
       $data = $query->row();
       return $data;
   }
   return false;
}

  /**
 *@نهاية 
 */  
 
 
  function do_sarf($mosayer_rkm_fk)
    {



     //   $data['finish_sarf_date'] = date('Y-m-d');
     //   $data['finish_sarf_time'] = date('h:i A');
     //   $data['finish_sarf_person'] = $this->getUserName($_SESSION['user_id']);
        
           
            
        $data['halet_sarf'] = 'yes';
        $data['tanfez_ezn_sarf'] = 'yes';
        
        $this->db->where('mosayer_rkm', $mosayer_rkm_fk)->update('hr_mosayer', $data);
        $this->db->where('mosayer_rkm_fk', $mosayer_rkm_fk)->update('hr_mosayer_details', $data);
        
       /*  $mosyer_month = $this->Get_mosayer_month_year($mosayer_rkm_fk,'mosayer_month');
        $mosyer_year = $this->Get_mosayer_month_year($mosayer_rkm_fk,'mosayer_year');
        
        
            $solaf_quest['paid'] = 'yes';
             $this->db->where('month',$mosyer_month);
             $this->db->where('year',$mosyer_year);
             $this->db->update('hr_solaf_quest',$solaf_quest);*/
             
             
   /*  $all_emps =   $this->Employee_salaries_model->get_all_mosayer_emps($mosayer_rkm_fk);
  foreach($all_emps as $emp){
    
    echo $w->emp_name;
  
  
  
  } */        
             
    }
    
    
           public function get_all_mosayer_emps_ta3gel($mosayer_rkm_fk,$mosayer_year){
        $this->db->select('hr_solaf_ta3gel_months.*');
       $this->db->from("hr_solaf_ta3gel_months");
//$this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left');
      // $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
      $this->db->where('hr_solaf_ta3gel_months.mosayer_month',$mosayer_rkm_fk);
      $this->db->where('hr_solaf_ta3gel_months.mosayer_year',$mosayer_year);

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
               $i++;
           }
           return $data;
       }
       return false;
   } 
    
        public function get_all_mosayer_emps($mosayer_rkm_fk){
        $this->db->select('hr_mosayer_details.*,hr_mosayer.mosayer_month,hr_mosayer.mosayer_year');
       $this->db->from("hr_mosayer_details");
$this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left');
      // $this->db->join('employees', 'employees.id =hr_mosayer_details.emp_id', 'left');
         $this->db->where('hr_mosayer_details.mosayer_rkm_fk',$mosayer_rkm_fk);

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           $data = $query->result();
           $i = 0;
           foreach ($query->result() as $row) {
              $data[$i]= $row;
               $i++;
           }
           return $data;
       }
       return false;
   }
   
 function update_quest_solaf($mosayer_rkm_fk,$mosayer_month,$mosayer_year){
  
   $all_emps =   $this->get_all_mosayer_emps($mosayer_rkm_fk);
  foreach($all_emps as $emp){
    
 
            $solaf_quest['paid'] = 'yes';
            $solaf_quest['date_paid'] = date('Y-m-d');
            $solaf_quest['time_paid'] = date('h:i A');
            $solaf_quest['paid_sarf_person'] = $this->getUserName($_SESSION['user_id']);
            
            
             $this->db->where('emp_code_fk',$emp->emp_code);
             $this->db->where('month',$mosayer_month);
             $this->db->where('year',$mosayer_year);
             $this->db->update('hr_solaf_quest',$solaf_quest);
  
  
  }  
    
 }   
   
   
   
    function update_quest_solaf_ta3gel($mosayer_month,$mosayer_year){
   $all_emps =   $this->get_all_mosayer_emps_ta3gel($mosayer_month,$mosayer_year);
  foreach($all_emps as $emp){
        $ta3gel_quest['closed_in_mosayer'] = 'yes';
 
           /* $ta3gel_quest['paid'] = 'yes';
            $solaf_quest['date_paid'] = date('Y-m-d');
            $solaf_quest['time_paid'] = date('h:i A');
            $solaf_quest['paid_sarf_person'] = $this->getUserName($_SESSION['user_id']);
            */
          //   $this->db->where('emp_code_fk',$emp->emp_code);
             $this->db->where('fe2a_ta3gel',3);
             $this->db->where('mosayer_month',$mosayer_month);
             $this->db->where('mosayer_year',$mosayer_year);
             $this->db->update('hr_solaf_ta3gel_months',$ta3gel_quest);
  
  
             $basic_talab_ta3gel['tanfez'] = 'yes';
             $this->db->where('emp_code_fk',$emp->emp_code);
             $this->db->where('mosayer_month',$mosayer_month);
             $this->db->where('mosayer_year',$mosayer_year);
             $this->db->update('hr_solaf_ta3gel',$basic_talab_ta3gel);
  
            $solaf_quest_two['paid'] = 'yes';
            $solaf_quest_two['date_paid'] = date('Y-m-d');
            $solaf_quest_two['time_paid'] = date('h:i A');
            $solaf_quest_two['paid_sarf_person'] = $this->getUserName($_SESSION['user_id']);
            
             $this->db->where('emp_code_fk',$emp->emp_code);
             $this->db->where('month',$emp->for_month);
             $this->db->where('year',$emp->for_year);
             $this->db->where('t_rkm_fk',$emp->solfa_rkm_fk);
             
             $this->db->update('hr_solaf_quest',$solaf_quest_two);
  }  
 }   
    
    
    
    
    
        public function Get_mosayer_month_year($mosayer_rkm_fk,$var)
    {

        $this->db->select('hr_mosayer.id,hr_mosayer.mosayer_rkm,hr_mosayer.mosayer_month,hr_mosayer.mosayer_year');
        $this->db->from("hr_mosayer");
        $this->db->where('mosayer_rkm', $mosayer_rkm_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->$var;
        } else {
            return false;
        }
    }

    public function get_sysat_setting($syasa)
    {
        $this->db->where('title', $syasa);
        $query = $this->db->get('hr_entdab_sysat_setting');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    
    
    
        public function get_main_mosayer_data($mosayer_rkm)
    {
        $this->db->where('mosayer_rkm', $mosayer_rkm);
        $query = $this->db->get('hr_mosayer');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
}