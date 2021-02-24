<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Finance_employee_model extends CI_Model
{
	public function getEmpData($empCode)
	{
		return $this->db->where('id', $empCode)->get('employees')->row_array();
	}
	public function getBadalat($type)
	{
		return $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
	}
	public function getBanks()
	{
		return $this->db->get('banks_settings')->result();
	}
	public function getbanks_another()
	{
		return $this->db->get('banks_settings')->result();
	}
public function get_type_badl($id)
{
$this->db->where('id',$id);
   $query=$this->db->get('emp_badlat_discount_settings');
   if($query->num_rows()>0){
      return $query->row()->type;
   }else{
      return 0;
}
}
    	//old
	public function bank_employes_details($emp_code,$img_file)
    {
			$data['emp_code'] = $emp_code;
			$data['bank_id_fk_image'] = $img_file;
                $data['approved_for_sarf'] = 0;
                $data['bank_id_fk'] = $this->input->post('bank_id_fk');
                $data['bank_account_num'] = $this->input->post('bank_account_num');
                 $data['emp_bank_name'] = trim($this->input->post('emp_bank_name'));
                
                $this->db->insert('bank_employes_details', $data);
	}
	public function getEmpBank($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('emp_code', $emp_code)
			->get('bank_employes_details')
			->result();
	}
    
    	public function getEmpBank_new($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('emp_code', $emp_code)
			->get('bank_employes_details')
			->result();
	}
	public function deleteFinanceEmp($id)
	{
		$this->db->where('id', $id)->delete('bank_employes_details');
	}
	public function DeleteEmpAll($id)
	{
		$this->db->where('id', $id)->delete('employees');
		$this->db->where('from_emp_code', $id)->delete('emp_custody_transfer_operations');
		$arr_table = array('hr_finance_employes', 'emp_custody', 'emp_files', 'emp_debts', 'emp_evaluation',
			'emp_attendance', 'bank_employes_details');
		$arr = array('emp_debts', 'emp_evaluation', 'emp_attendance');
		foreach ($arr_table as $key => $value) {
			if (in_array($value, $arr)) {
				$this->db->where('emp_id', $id)->delete($value);
			} else {
				$this->db->where('emp_code', $id)->delete($value);
			}
		}
	}
	//==========================================================================================
	public function getBadalat_id($type)
	{
		$query = $this->db->where('type', $type)->get('emp_badlat_discount_settings')->result();
		$data = array();
		$x = 0;
		foreach ($query as $row) {
			$data[] = $row->id;
			$x++;
		}
		return $data;
	}
	
	
	public function get_all_badalat($type, $id)
	{
		$this->db->where('type', $type);
		$this->db->where_not_in('id', $id);
	    $this->db->order_by('in_order',"ASC");
		return $this->db->get('emp_badlat_discount_settings')->result();
	}
	public function change_bank_status($id,$emp_code,$approved)
	{
		$this->db->where('emp_code',$emp_code);
		$data['approved_for_sarf']=0;
		$this->db->update('bank_employes_details',$data);
		$this->db->where('id',$id);
		$data2['approved_for_sarf']=$approved;
		$this->db->update('bank_employes_details',$data2);
	}
    	private function set_upload_options($folder = "images") 
	{ 
		//upload an image options
		$config = array();
		$config['upload_path'] = 'uploads/'.$folder;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}
    	public function edit_bank_account($img)
	{
		$id=$this->input->post('row_id');
		$data['bank_id_fk'] = $this->input->post('edit_bank_id_fk');
		$data['bank_account_num'] = $this->input->post('edit_bank_account_num');
 	    $data['emp_bank_name'] = trim($this->input->post('emp_bank_name'));
        $data['bank_code'] = $this->input->post('bank_codey');
        
        
if($img!=''){
	$data['bank_id_fk_image'] = $img;
}
		$this->db->where('id',$id)->update('bank_employes_details',$data);
	}
    public function get_option_for_modal_select()
	{
		$ids=$this->input->post('valu');
		$select_val=$this->input->post('select_val');
		$type=$this->input->post('type');
		$this->db->where('type', $type);
		$this->db->where_not_in('id', $ids);
		return $this->db->get('emp_badlat_discount_settings')->result();
	}
	//===================================================== old ============================================================
	  public function get_nationality($emp_code)
	{
		$this->db->where('id',$emp_code);
		$query=$this->db->get('employees');
		if($query->num_rows()>0)
		{
		return $query->row()->nationality;
		}else{
			return 0;
		}
	}
	public function get_emp_setting($nationality)
	{
     $this->db->where('nationality_type',$nationality);
		$query2=$this->db->get('hr_insurance_settings');
		if($query2->num_rows()>0)
		{
			$this->db->select_sum('emp_average');
			$this->db->where('nationality_type',$nationality);
			$query=$this->db->get('hr_insurance_settings');
			return $query->row()->emp_average;
		}else{
			return 0;
		}
	}
    public function get_rkm_hesab($markz_id,$badl_id){
 	     $this->db->where('markz_id_fk',$markz_id);
 	     $this->db->where('band_id_fk',$badl_id);
 	   $query =  $this->db->get('hr_markz_taklfa_settings');
 	   if ($query->num_rows()>0){
 	      // return $query->row()->rkm_hesab;
          	 return $query->row();
       } else{
 	       return 0;
       }
    }      
    public function getBadalat_by_id($type,$id)
	{
		return $this->db->where('badl_type', $type)->where('id', $id)->get('hr_finance_employes')->row();
	}
    public function get_id($table,$where,$id,$select){
		$h = $this->db->get_where($table, array($where=>$id));
		$arr= $h->row_array();
		return $arr[$select];
	}
    public function getEmpBankby_id($id)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('bank_employes_details.id', $id)
			->get('bank_employes_details')
			->row();
	}
       /*23-7-om*/
    function get_badlat($markz_id){
        return $this->db->where('markz_id_fk',$markz_id)->get('hr_markz_taklfa_settings')->result_array();
    }
    function update_emp_data($emp_id)
    {
        $data['markz_id'] = $this->input->post('markz');
        $data['markz_name'] = $this->input->post('markz_name');
        $this->db->where('id', $emp_id)->update('employees', $data);
    }
    public function getEmp_Badalat($emp_code, $type)
    {
        $query2 = $this->db->where('emp_id', $emp_code)->get('hr_finance_employes');
        if ($query2->num_rows() > 0) {
            $data_ids = array();
            foreach ($query2->result() as $row) {
                $data_ids[] = $row->badl_discount_id_fk;
            }
        } else {
            return 0;
        }
        $this->db->where_in('id', $data_ids);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get('emp_badlat_discount_settings')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->badalat = $this->get_badalat_order_by($emp_code, $row->id);
            $x++;
        }
        return $data;
    }
    public function get_badalat_order_by($emp_code, $id)
    {
        $arr = array('emp_id' => $emp_code, 'badl_discount_id_fk' => $id);
        $this->db->where($arr);
        return $this->db->get('hr_finance_employes')->row();
    }
    public function get_badl($emp_code, $id)
    {
        $this->db->where('emp_id', $emp_code);
        $this->db->where('badl_discount_id_fk', $id);
        return $this->db->get('hr_finance_employes')->result();
    }
    /*23-7-om*/
    public function deleteAllFinanceEmployee($empCode)
    {
        $this->db->where('emp_code', $empCode)->delete('hr_finance_employes');
        $this->db->where('emp_code', $empCode)->delete('hr_finance_employes');
        $this->db->where('emp_code', $empCode)->delete('bank_employes_details');
        $this->financeEmployee($empCode);
    }
    /*23-7-om*/
    public function getAllData($emp_code)
    {
        $query = $this->db->where('emp_id', $emp_code)->get('hr_finance_employes');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->badlat = $this->getEmp_Badalat($emp_code, 1);
                $data[$i]->Banks = $this->getEmpBank($emp_code);
                $data[$i]->get_having_value = $this->get_sum_value($emp_code, $this->getBadalat_id(1));
                $data[$i]->get_discut_value = $this->get_sum_value($emp_code, $this->getBadalat_id(2));
                $data[$i]->tamin_value = $this->get_tamin_value($emp_code, $this->getBadalat_id(1));
                $i++;
            }
            return $data;
        }
        return false;
    }
    
    	public function getAllData_n($emp_code)
    {
        $query = $this->db->where('emp_id', $emp_code)->get('hr_finance_employes');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
				$data[$i]->badlat = $this->getEmp_Badalat($emp_code, 1);
				//yara9-8-2020
				$data[$i]->badlatt = $this->getEmp_Badalat_by_id($emp_code, 1);
				$data[$i]->discunt = $this->getEmp_discunt($emp_code, 2);
					//yara9-8-2020
				$data[$i]->Banks = $this->getEmpBank($emp_code);
				//yara6-8-2020
				$data[$i]->Banks_past = $this->getEmpBank_past($emp_code);
				//yara6-8-2020
                $data[$i]->get_having_value = $this->get_sum_value($emp_code, $this->getBadalat_id(1));
                $data[$i]->get_discut_value = $this->get_sum_value($emp_code, $this->getBadalat_id(2));
                $data[$i]->tamin_value = $this->get_tamin_value($emp_code, $this->getBadalat_id(1));
                $i++;
            }
            return $data;
        }
        return false;
	}
		//new_funcc
	public function getEmp_Badalat_by_id($emp_code, $type)
    {
        $query2 = $this->db->where('badl_type', $type)->where('emp_id', $emp_code)->get('hr_finance_employes');
        if ($query2->num_rows() > 0) {
            $data_ids = array();
            foreach ($query2->result() as $row) {
                $data_ids[] = $row->badl_discount_id_fk;
            }
        } else {
            return 0;
        }
        $this->db->where_in('id', $data_ids);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get('emp_badlat_discount_settings')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->badalat = $this->get_badalat_order_by($emp_code, $row->id);
            $x++;
        }
        return $data;
	}

	public function getEmp_discunt($emp_code, $type)
    {
        $query2 = $this->db->where('badl_type', $type)->where('emp_id', $emp_code)->get('hr_finance_employes');
        if ($query2->num_rows() > 0) {
            $data_ids = array();
            foreach ($query2->result() as $row) {
                $data_ids[] = $row->badl_discount_id_fk;
            }
        } else {
            return 0;
        }
        $this->db->where_in('id', $data_ids);
        $this->db->order_by('in_order', 'asc');
        $query = $this->db->get('emp_badlat_discount_settings')->result();
        $x = 0;
        $data = array();
        foreach ($query as $row) {
            $data[$x] = $row;
            $data[$x]->discunt = $this->get_badalat_order_by($emp_code, $row->id);
            $x++;
        }
        return $data;
    }
    public function getEmpBank_past($emp_code)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('emp_code', $emp_code)
			->where('past_bank_id_fk!=', 0)
			->get('bank_employes_details')
			->result();
	}
    
    public function get_sum_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_id', $emp_code);
        $this->db->select_sum('value');
        $result = $this->db->get('hr_finance_employes');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }
    }
    public function get_tamin_value($emp_code, $ids)
    {
        $this->db->where_in('badl_discount_id_fk', $ids);
        $this->db->where('emp_id', $emp_code);
        $this->db->where('insurance_affect', 1);
        $this->db->select_sum('value');
        $result = $this->db->get('hr_finance_employes');
        if ($result->num_rows() > 0) {
            return $result->row()->value;
        } else {
            return 0;
        }
    }
    /*23-7-om*/
    public function delete_badl($id, $empCode, $value, $type)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_finance_employes');
        if ($type == 1) {
            $val1 = $this->get_new_value($empCode)->having_all_value;
            $val2 = $value;
            $data['having_all_value'] = $val1 - $val2;
            $this->db->where('emp_code', $empCode);
            $this->db->update('hr_finance_employes', $data);
        } elseif ($type == 2) {
            $val1 = $this->get_new_value($empCode)->discut_all_value;
            $val2 = $value;
            $data['discut_all_value'] = $val1 - $val2;
            $this->db->where('emp_code', $empCode);
            $this->db->update('hr_finance_employes', $data);
        }
    }
    /*23-7-om*/
    public function get_new_value($empCode)
    {
        $this->db->where('emp_code', $empCode);
        $query = $this->db->get('hr_finance_employes');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    /*23-7-om*/
    /******************************/
    public function edit_table_finance()
    {
        $emp_id = $this->input->post('emp_id');
        $data['having_all_value'] = $this->input->post('having_all_value');
        $data['having_tamin_value'] = $this->input->post('having_tamin_value');
        $data['discut_all_value'] = $this->input->post('discut_all_value');
        $data['discut_tamin_value'] = $this->input->post('discut_tamin_value	');
        $this->db->where('emp_code', $emp_id);
        $this->db->update('hr_finance_employes', $data);
    } 
	////yaraaaa26-7-2020
	public function financeEmployee($emp_id)
    {
        $this->update_emp_data($emp_id);
    }
    public function emp_badlat_discount_details($emp_code)
    {

                $data['emp_id'] = $this->input->post('emp_id');
                $data['emp_code'] = $this->input->post('emp_code');
                $data['method_to_count'] = $this->input->post('method_to_count');
                $data['badl_discount_id_fk'] = $this->input->post('badl_discount_id_fk');
                $data['badl_type'] = $this->get_type_badl($this->input->post('badl_discount_id_fk'));
                $data['badl_code'] = $this->get_code_badl($this->input->post('badl_discount_id_fk'));
                
                
                $data['value'] = $this->input->post('value');
                $data['specific_period'] = $this->input->post('specific_period');
                if (!empty($this->input->post('date_from'))) {
                    $data['date_from'] = $this->input->post('date_from');
                }
                if (!empty($this->input->post('date_to'))) {
                    $data['date_to'] = $this->input->post('date_to');
                }
                if (!empty($this->input->post('insurance_affect')) && $this->input->post('insurance_affect') == 1) {
                    $data['insurance_affect'] = $this->input->post('insurance_affect');
                }
                $data['dalel_name'] = $this->input->post('dalel_name');
                $data['dalel_code'] = $this->input->post('dalel_code');
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
				//yaraaa
				$data['having_all_value'] = $this->input->post('having_all_value');
				$data['having_tamin_value'] = $this->input->post('having_tamin_value');
				$data['discut_all_value'] = $this->input->post('discut_all_value');
                
                
				//yaraaahr_finance_employes
                $this->db->insert('hr_finance_employes', $data);
              //  print_r($this->db->last_query());
	}
    
    
    
    public function get_code_badl($badl_discount_id_fk)
{
$this->db->where('id',$badl_discount_id_fk);
   $query=$this->db->get('emp_badlat_discount_settings');
   if($query->num_rows()>0){
      return $query->row()->badal_code;
   }else{
      return false;
}
}
    
    
    
    
	public function update_discut_having_employee($emp_code,$type)
	{
		$data['emp_code'] = $emp_code;
		$id = $this->input->post('having_row_id');
		$data['method_to_count'] = $this->input->post('have_method_to_count');
		$data['badl_discount_id_fk'] = $this->input->post('have_badl_discount_id_fk');
		$data['value'] = $this->input->post('have_value');
		$data['specific_period'] = $this->input->post('have_specific_period');
		$data['date_from'] = $this->input->post('have_date_from');
	    $data['dalel_name'] = $this->input->post('have_dalel_name');
		$data['date_to'] = $this->input->post('have_date_to');
		if($type==1) {
			$data['insurance_affect'] = $this->input->post('have_insurance_affect');
		}else{
			$data['insurance_affect'] =0;
		}
		$data['dalel_code'] = $this->input->post('have_dalel_code');
           $data['badl_code'] = $this->get_code_badl($this->input->post('have_badl_discount_id_fk'));
        
		$this->db->where('id',$id);
		$this->db->update('hr_finance_employes',$data);
	}
//new_funcc
	public function getBadalat_id_by_emp($type,$emp)
	{
		$query = $this->db->where('badl_type', $type)->where('emp_id', $emp)->get('hr_finance_employes')->result();
		$data = array();
		$x = 0;
		foreach ($query as $row) {
			$data[] = $row->badl_discount_id_fk;
			$x++;
		}
		if(!empty($data))
		{
		return $data;
		}else{
			return 0;
		}
	}
    
    

 
    
        public function get_all_mosayer_details_for_emp($emp_code,$month_n=null){
        $this->db->select('hr_mosayer_details.*,
        hr_mosayer.mosayer_month, hr_mosayer.mosayer_year
        ');
       $this->db->from("hr_mosayer_details");
      // $this->db->where('hr_mosayer_details.sent_sarf',NULL);
      
       $this->db->join('hr_mosayer', 'hr_mosayer.mosayer_rkm =hr_mosayer_details.mosayer_rkm_fk', 'left'); 
         if ($month_n != null) {
            $this->db->where('hr_mosayer.mosayer_month', $month_n);
        }
        $this->db->where('hr_mosayer_details.emp_id',$emp_code);
        $this->db->where('hr_mosayer.halet_sarf','yes');

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
    
    
    
}
/* End of file Finance_employee_model.php */
/* Location: ./application/models/human_resources_model/Finance_employee_model.php */