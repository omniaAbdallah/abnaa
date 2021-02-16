<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contracts_model extends CI_Model {


	public function get_last_id()
    {
        $this->db->select('id');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tat_contracts');
        if ($query->num_rows() > 0) {
            return $query->row()->id + 1;
        } else {
            return 1;
        }
    }
	public function add()
	{
		$data['rkm_akd'] 			   = $this->get_last_id();
		$person=explode('-',$this->input->post('motatw3_id_fk'));
		$data['motatw3_id_fk'] 	       = $person[0];
		$data['motatw3_name'] 	       = $person[1];

		$data['card_num']		   = $this->input->post('card_num');
		$data['forsa_id_fk'] 	   = $this->input->post('forsa_id_fk');
		$data['tabe3a_forsa'] 	   = $this->input->post('tabe3a_forsa');
		$data['mohma'] 		 	   = $this->input->post('mohma');
		$data['mkan'] 		       = $this->input->post('mkan');
		$data['madina'] 		   = $this->input->post('madina');
		$data['jwal'] 			   = $this->input->post('jwal');
		$data['email'] 		       = $this->input->post('email');

		$qsm=explode('-',$this->input->post('qsm_id_fk'));
		//print_r($qsm);
		$data['qsm_id_fk'] 	       = $qsm[0];

		if($qsm[1]!=NULL)
		{
		$data['qsm_n'] 	           = $qsm[1];
		}

		$moder=explode('-',$this->input->post('moder_tatw3_emp_code'));
		$data['moder_tatw3_emp_code'] 	       = $moder[0];
		$data['moder_tatw3_n'] 	       = $moder[1];


		//print_r($moder_mobashr);
		$moder_mobashr=explode('-',$this->input->post('moder_mobashr_emp_code'));
		
		$data['moder_mobashr_emp_code'] 	       = $moder_mobashr[0];
		
		if($moder_mobashr[1]!=NULL)
		{
		$data['moder_mobashr_n'] 	       = $moder_mobashr[1];
		}
		
	
		$data['moder_mobashr_edara_n']=$this->get_emp_profile($moder_mobashr[0]);
		
		
		$data['from_date']   = $this->input->post('from_date');
		$data['to_date'] 		   = $this->input->post('to_date');
		$data['moda'] = $this->input->post('moda');
		$data['num_hours'] 	   = $this->input->post('num_hours');
	
		$data['date'] 			   = strtotime(date("Y-m-d"));
		
		if(isset($_SESSION['user_id'])) {
			$data['publisher'] 	   = $_SESSION['user_id'];
			$data['publisher_name'] = $this->getUserName($_SESSION['user_id']);
		}

		$data_updated['rkm_akd_id']=$this->get_last_id();
		$data_updated['had_contract']='yes';

        $this->db->where('id',$person[0]); 
		$this->db->update('tat_motat3en',$data_updated);

		$this->db->insert('tat_contracts',$data);
		
		
	}
	public function getRecordById($where)
	{
		return $this->db->where($where)->get('tat_contracts')->row_array();
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

	public function update($id)
	{
	
		$person=explode('-',$this->input->post('motatw3_id_fk'));
		$data['motatw3_id_fk'] 	       = $person[0];
		$data['motatw3_name'] 	       = $person[1];
		$data['card_num']		   = $this->input->post('card_num');
		$data['forsa_id_fk'] 	   = $this->input->post('forsa_id_fk');
		$data['tabe3a_forsa'] 	   = $this->input->post('tabe3a_forsa');
		$data['mohma'] 		 	   = $this->input->post('mohma');
		$data['mkan'] 		       = $this->input->post('mkan');
		$data['madina'] 		   = $this->input->post('madina');
		$data['jwal'] 			   = $this->input->post('jwal');
		$data['email'] 		       = $this->input->post('email');

		$qsm=explode('-',$this->input->post('qsm_id_fk'));
		//print_r($qsm);
		$data['qsm_id_fk'] 	       = $qsm[0];

		if($qsm[1]!=NULL)
		{
		$data['qsm_n'] 	           = $qsm[1];
		}

		$moder=explode('-',$this->input->post('moder_tatw3_emp_code'));
		$data['moder_tatw3_emp_code'] 	       = $moder[0];
		$data['moder_tatw3_n'] 	       = $moder[1];

		$moder_mobashr=explode('-',$this->input->post('moder_mobashr_emp_code'));
		
		$data['moder_mobashr_emp_code'] 	       = $moder_mobashr[0];
		
		if($moder[1]!=NULL)
		{
		$data['moder_mobashr_n'] 	       = $moder_mobashr[1];
		}
		
	
		$data['moder_mobashr_edara_n']=$this->get_emp_profile($moder_mobashr[0]);
		
		
		$data['from_date']   = $this->input->post('from_date');
		$data['to_date'] 		   = $this->input->post('to_date');
		$data['moda'] = $this->input->post('moda');
		$data['num_hours'] 	   = $this->input->post('num_hours');
	
		

	
		$this->db->where('id',$id);
		$this->db->update('tat_contracts',$data);
	}

	public function delete($id,$motato3_id)
	{
		$data_updated['had_contract']='no';
		$data_updated['rkm_akd_id']=0;
		$this->db->where('id',$motato3_id); 
		$this->db->update('tat_motat3en',$data_updated);
		$this->db->where('id', $id);
	    $this->db->delete('tat_contracts');
	}

	public function select_volunteers()
	{
		
		return $this->db->get('tat_contracts')->result();
	}

	public function get_table($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
	}
	public function get_table_by_id($table, $arr)
    {
        if (!empty($arr)) {
            $this->db->where($arr);
        }
        $query = $this->db->get($table)->row();
        return $query;
	}
	public function get_emp_profile($id)
    {
        $this->db->where('emp_code',$id);
        $q = $this->db->get('employees')->row();
        if (!empty($q)) {
           
                $edara = $this->get_edara_name_or_qsm($q->administration);

            
            return $edara;
        }
	}
	public function get_edara_name_or_qsm($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('department_jobs');
		if ($query->num_rows() > 0) {
			return $query->row()->name;
		} else {
			return false;
		}
	}
	

}

/* End of file Volunteers_model.php */
/* Location: ./application/models/Volunteers/Volunteers_model.php */