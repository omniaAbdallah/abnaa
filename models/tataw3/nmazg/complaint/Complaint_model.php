<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint_model extends CI_Model {


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
		
		$person=explode('-',$this->input->post('motatw3_id_fk'));
		$data['motatw3_id_fk'] 	       = $person[0];
		$data['motatw3_name'] 	       = $person[1];

		
		$data['forsa_id_fk'] 	   = $this->input->post('forsa_id_fk');
		$data['forsa_name'] 	   = $this->input->post('forsa_name');
		$data['jwal'] 			   = $this->input->post('jwal');
		$qsm=explode('-',$this->input->post('qsm_id_fk'));
		//print_r($qsm);
		$data['qsm_id_fk'] 	       = $qsm[0];

		if($qsm[1]!=NULL)
		{
		$data['qsm_n'] 	           = $qsm[1];
		}


		$data['motatw3_date'] 		 	   = $this->input->post('motatw3_date');
		$data['problem_date'] 		       = $this->input->post('problem_date');
		$data['problem_wasf'] 		   = $this->input->post('problem_wasf');
		
		$data['complaint_type'] 		       = $this->input->post('complaint_type');

		$data['who_allowed'] 		       = $this->input->post('who_allowed');
		// $moder=explode('-',$this->input->post('moder_tatw3_emp_code'));
		// $data['moder_tatw3_emp_code'] 	       = $moder[0];
		// $data['moder_tatw3_n'] 	       = $moder[1];


		//print_r($moder_mobashr);
	
	
		
		
		$data['last_check_problem']   = $this->input->post('last_check_problem');
		$data['last_check_problem_date'] 		   = $this->input->post('last_check_problem_date');
	
		$data['twgeh'] 	   = $this->input->post('twgeh');

		$data['tnfez_twgeh']   = $this->input->post('tnfez_twgeh');
		$data['reason']   = $this->input->post('reason');
		$data['close_problem_n'] 		   = $this->input->post('close_problem_n');
		$data['close_problem_date'] = $this->input->post('close_problem_date');

	
		$data['date'] 			   = strtotime(date("Y-m-d"));
		
		
			$data['publisher'] 	   = $_SESSION['id'];
			$data['publisher_name'] = $_SESSION['name'];
		$this->db->insert('tat_complaints',$data);
		
		
	}
	public function getRecordById($where)
	{
		return $this->db->where($where)->get('tat_complaints')->row_array();
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

		
		$data['forsa_id_fk'] 	   = $this->input->post('forsa_id_fk');
		$data['forsa_name'] 	   = $this->input->post('forsa_name');
		$data['jwal'] 			   = $this->input->post('jwal');
		$qsm=explode('-',$this->input->post('qsm_id_fk'));
		//print_r($qsm);
		$data['qsm_id_fk'] 	       = $qsm[0];

		if($qsm[1]!=NULL)
		{
		$data['qsm_n'] 	           = $qsm[1];
		}


		$data['motatw3_date'] 		 	   = $this->input->post('motatw3_date');
		$data['problem_date'] 		       = $this->input->post('problem_date');
		$data['problem_wasf'] 		   = $this->input->post('problem_wasf');
		
		$data['complaint_type'] 		       = $this->input->post('complaint_type');

		$data['who_allowed'] 		       = $this->input->post('who_allowed');
		// $moder=explode('-',$this->input->post('moder_tatw3_emp_code'));
		// $data['moder_tatw3_emp_code'] 	       = $moder[0];
		// $data['moder_tatw3_n'] 	       = $moder[1];


		//print_r($moder_mobashr);
	
	
		
		
		$data['last_check_problem']   = $this->input->post('last_check_problem');
		$data['last_check_problem_date'] 		   = $this->input->post('last_check_problem_date');

		$data['twgeh'] 	   = $this->input->post('twgeh');
		$data['reason']   = $this->input->post('reason');
		$data['tnfez_twgeh']   = $this->input->post('tnfez_twgeh');
		$data['close_problem_n'] 		   = $this->input->post('close_problem_n');
		$data['close_problem_date'] = $this->input->post('close_problem_date');

	
		


	
		$this->db->where('id',$id);
		$this->db->update('tat_complaints',$data);
	}

	public function delete($id)
	{
	
		$this->db->where('id', $id);
	    $this->db->delete('tat_complaints');
	}

	public function select_volunteers()
	{
		
		return $this->db->where('motatw3_id_fk',$_SESSION['id'])->get('tat_complaints')->result();
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
	public function get_forsa_data($motatw3_id_fk){

        $this->db->where("id", $motatw3_id_fk);
      
        $query = $this->db->get('tat_motat3en');
        if ($query->num_rows() > 0) {
                $data =  $query->row();
                $data->forsa_data = $this->get_table('tat_foras',array('id'=>$data->current_forsa_fk));
                return $data->forsa_data;

        }
        return false;
	}
	public function get_last_record()
    {
        $this->db->select('approved');
		$this->db->order_by('id','desc');
		$this->db->where('motatw3_id_fk',$_SESSION['id']);
        $query=$this->db->get('tat_complaints');
        if($query->num_rows()>0)
        {
            return $query->row()->approved ;
		}
		
    
    }
	

}

/* End of file Volunteers_model.php */
/* Location: ./application/models/Volunteers/Volunteers_model.php */