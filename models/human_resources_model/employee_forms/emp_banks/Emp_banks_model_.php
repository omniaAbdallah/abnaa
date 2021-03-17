<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emp_banks_model extends CI_Model
{
	
    public function getBanks()
	{
		return $this->db->get('banks_settings')->result();
	}
    public function getEmpData($empCode)
	{
		return $this->db->where('id', $empCode)->get('employees')->row_array();
	}
    public function getEmpBankby_id($id)
	{
		return $this->db->select('bank_employes_details.*, banks_settings.bank_code')
			->join('banks_settings', 'banks_settings.id=bank_employes_details.bank_id_fk')
			->where('bank_employes_details.id', $id)
			->get('bank_employes_details')
			->row();
	}
	//new_function
	public function get_by_options_by_id($table, $where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {   
                    return $query->row();

        } else {
            return false;
        }
	}
	public function get_by_options($table, $where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {   
                    return $query->result();

        } else {
            return false;
        }
	}
	public function get_rkm()
    {
        $this->db->select_max('id');
        $query = $this->db->get('hr_emp_hesabat_banks_orders');
        if ($query->num_rows() > 0) {
            return $query->row()->id+1;
        } else {
            return 1;
        }
    }
	public function change_bank_account_emp($img)
	{
		$id=$this->input->post('emp_code');
		$data['rkm'] = $this->get_rkm();
		$data['order_date']=$this->input->post('order_date');
		$data['emp_id']=$this->input->post('emp_id');
		$data['emp_code']=$this->input->post('emp_code');
	
		$data['mosma_wazefy_id']=$this->input->post('mosma_wazefy_id');
		$data['mosma_wazefy_n']=$this->input->post('mosma_wazefy_n');
		$data['new_emp_bank_name']=$this->input->post('emp_n');
		$data['current_emp_bank_name']=$this->input->post('emp_n');
		$data['qsm_n']=$this->input->post('qsm_n');
		$data['edara_n']=$this->input->post('edara_n');

		$data['current_bank_id_fk'] = $this->input->post('edit_bank_id_fk');
		$data['current_bank_account_num'] = $this->input->post('edit_bank_account_num');
		if($img!=''){
			$data['new_bank_image'] = $img;
		}
		$data['new_bank_id_fk'] = $this->input->post('bank_id_fk');
		$data['new_bank_account_num'] = $this->input->post('bank_account_num');
		$data['current_bank_image'] = $this->get_past_bank_image($id);
		$data['order_time']=date('H:i:s a');
		$data['publisher'] = $_SESSION['emp_code'];
        $data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
		$this->db->insert('hr_emp_hesabat_banks_orders',$data);
    }
    
    public function get_past_bank_image($id)
	{
		return $this->db->where('id', $id)
			->get('bank_employes_details')->row()->bank_id_fk_image;
	}
	
	public function edite_bank_account_emp($img)
	{
		$id=$this->input->post('row_id');
		
		$data['new_emp_bank_name']=$this->input->post('emp_n');
		
		if($img!=''){
			$data['new_bank_image'] = $img;
		}
		$data['new_bank_id_fk'] = $this->input->post('bank_id_fk');
		$data['new_bank_account_num'] = $this->input->post('bank_account_num');
		$this->db->where('id',$id)->update('hr_emp_hesabat_banks_orders',$data);
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
	public function delete_bank_talb($id)
	{
		$this->db->where('id', $id)->delete('hr_emp_hesabat_banks_orders');
    }
    public function get_all_emp()
    {
         $this->db->where('employee_type', 1);
        //  $this->db->where('status', 96);
        $q = $this->db->get('employees')->result();
        if (!empty($q)) {
            
            return $q;
        }
    }
    public function send_all($id)
    {
$data['suspend']=4;
$this->db->where('id',$id)->update('hr_emp_hesabat_banks_orders',$data);

    }
    // update_main_tabel
    public function update_main_tabel($new_bank_id_fk,$new_bank_account_num,$new_bank_image,$bank_id_fk,$bank_account_num,$bank_id_fk_image,$empCode)
    {

        $data['bank_id_fk'] = $new_bank_id_fk;
        $data['bank_account_num'] = $new_bank_account_num;
         $data['bank_id_fk_image'] = $new_bank_image;
         $data['past_bank_id_fk'] = $bank_id_fk;
         $data['past_bank_account_num'] = $bank_account_num;
          $data['past_bank_id_fk_image'] = $bank_id_fk_image;
          $this->db->where('emp_code',$empCode)->update('bank_employes_details',$data);
    }


    public function get_last_record($id)

    {

        $this->db->select('suspend');

		$this->db->order_by('id','desc');

		$this->db->where('emp_id',$id);

        $query=$this->db->get('hr_emp_hesabat_banks_orders');

        if($query->num_rows()>0)

        {

            return $query->row()->suspend ;

		}

		

    

    }
}
