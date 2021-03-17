<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gawda_plans_model extends CI_Model {

	public function buildTree($where)
	{
		return $this->db->where($where)->order_by('code','ASC')->get('gwd_make_plans')->result();
	}

	public function checkValidate($where)
	{
		return $this->db->where($where)->get('gwd_make_plans')->row_array();
	}

	public function lastSubCode($where)
	{
		return $this->db->select('COALESCE(MAX(CAST(code AS UNSIGNED)),0) AS maxSubCode')->where($where)->get('gwd_make_plans')->row_array()['maxSubCode'];
	}

	public function deleteTreeNodes($id)
	{
		$accounts = $this->buildTree(array('parent'=>$id));
		if ($accounts != null) {
            foreach ($accounts as $row) {
                $this->deleteTreeNodes($row->id); 
        		$this->deleteAccount($row->id);
            }
        }
        $this->deleteAccount($id);
	}

	public function deleteAccount($id)
	{
		$this->db->where('id',$id)->delete('gwd_make_plans');
    }
    public function add_hadaf()
    {
        $data['plan_rkm']	 	  = $this->input->post('plan_rkm');
        $data['name']	 	  = $this->input->post('name');
		$data['ttype']	 	  = "الهدف الاستراتيجي";
        $data['parent_code']  = 0;
        
		$data['code']	 	  = $this->input->post('code');
		$data['parent'] 	  = 0;
		$data['level']	 	  = 1;
	
		$this->db->insert('gwd_make_plans',$data);
    }


   public function getAccount($id)
    {
        $query = $this->db->select('*')
          
            ->where('id', $id)
            ->get('gwd_make_plans')
            ->row_array();
      
        return $query;
    }


   public function insert()
    {
        $data['plan_rkm']= $this->input->post('plan_rkm');
        $data['name'] = $this->input->post('name');
        $data['ttype'] = "السياسه";
        $data['parent_code'] = $this->input->post('parent_code');
        $data['parent_name'] = $this->input->post('parent_name');
        $data['code'] = $this->input->post('code');
        $data['parent'] = $this->input->post('parent');
        $data['level'] = $this->input->post('level');


        $this->db->insert('gwd_make_plans', $data);
    }
    public function insert_mo24er()
    {
        $data['plan_rkm']= $this->input->post('plan_rkm');
        $data['name'] = $this->input->post('name');
        $data['ttype'] = "المؤشر";
        $data['parent_code'] = $this->input->post('parent_code');
        $data['parent_name'] = $this->input->post('parent_name');
        
        $data['code'] = $this->input->post('code');
        $data['parent'] = $this->input->post('parent');
        $data['level'] = $this->input->post('level');

        $data['wehda_quas'] = $this->input->post('wehda_quas');
        $data['no3_wehda_quas'] = $this->input->post('no3_wehda_quas');
        $data['	last_value'] = $this->input->post('last_value');
        $data['want_value'] = $this->input->post('want_value');
        $data['tareket_hesab'] = $this->input->post('tareket_hesab');
        

        $this->db->insert('gwd_make_plans', $data);
    }
    
	public function update($id)
	{
		$data['name']	 	  = $this->input->post('name');
		
		$data['parent_code']  = $this->input->post('parent_code');
		($this->input->post('code'))?$data['code']=$this->input->post('code'):'';
		($this->input->post('parent'))?$data['parent']=$this->input->post('parent'):'';
		($this->input->post('level'))?$data['level']=$this->input->post('level'):'';
		
		$this->db->where('id',$id)->update('gwd_make_plans',$data);
	}
    
    public function update_mo24er($id)
	{
		$data['name']	 	  = $this->input->post('name');
        $data['ttype'] = "المؤشر";
		$data['parent_code']  = $this->input->post('parent_code');
		($this->input->post('code'))?$data['code']=$this->input->post('code'):'';
		($this->input->post('parent'))?$data['parent']=$this->input->post('parent'):'';
        ($this->input->post('level'))?$data['level']=$this->input->post('level'):'';
        $data['wehda_quas'] = $this->input->post('wehda_quas');
        $data['no3_wehda_quas'] = $this->input->post('no3_wehda_quas');
        $data['	last_value'] = $this->input->post('last_value');
        $data['want_value'] = $this->input->post('want_value');
        $data['tareket_hesab'] = $this->input->post('tareket_hesab');
		
		$this->db->where('id',$id)->update('gwd_make_plans',$data);
	}
    
    
    public function getBanks()
{
    return $this->db->select('bank_id,code_account_id, bank.title AS bank_title')
        ->join('banks_settings bank','bank.id=finance_sheek_setting.bank_id','LEFT')
        ->get('finance_sheek_setting')
        ->result_array();
}
/*************************************************************************/




/******************************************************************************************/
  

    
    
/****************************************************************************/

   


    





/**********************************************************************************/


   

   

    public function getUserName($user_id)
    {
        $sql = $this->db->where("user_id", $user_id)->get('users');
        if ($sql->num_rows() > 0) {
            $data = $sql->row();
            if ($data->role_id_fk == 1 or $data->role_id_fk == 5) {
                return $data->user_username;
            } elseif ($data->role_id_fk == 2) {
                $id = $data->user_name;
                $table = 'md_all_magls_edara_members';
                $field = 'mem_name';
            } elseif ($data->role_id_fk == 3) {
                $id = $data->emp_code;
                $table = 'employees';
                $field = 'employee';
            } elseif ($data->role_id_fk == 4) {
                $id = $data->user_name;
                $table = 'md_all_gam3ia_omomia_members';
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
  public function update_ajex($id)
    {
        $data['name'] = $this->input->post('name');
        $data['ttype'] = $this->input->post('ttype');
        $data['parent_code'] = $this->input->post('parent_code');
        ($this->input->post('code')) ? $data['code'] = $this->input->post('code') : '';
        ($this->input->post('parent')) ? $data['parent'] = $this->input->post('parent') : '';
        ($this->input->post('level')) ? $data['level'] = $this->input->post('level') : '';
      
//        14-1-om
//        ($this->input->post('markz_tklfa')) ? $data['markz_tklfa'] = $this->input->post('markz_tklfa') : '';

        $this->db->where('id', $id)->update('gwd_make_plans', $data);


    }

   
    public function GetById($code)
    {
        $this->db->select('gwd_make_plans.*');
        $this->db->from('gwd_make_plans');
        $this->db->where('gwd_make_plans.code', $code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }
    
     public function get_parent($code)
    {
        $new_code=substr($code, 0, 2);
        $query2 = $this->db->where('code', $new_code)->get('gwd_make_plans')->row_array();
        return $query2;
    }
}

/* End of file Dalel_model.php */
/* Location: ./application/models/finance_accounting_model/Dalel_model.php */