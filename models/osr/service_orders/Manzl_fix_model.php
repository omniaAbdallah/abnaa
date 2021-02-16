<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manzl_fix_model extends CI_Model {

	public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


	public function get_last_rkm()
    {
        $this->db->select('talab_rkm');
		$this->db->order_by('id','desc');
		$this->db->where('mother_national_num',$_SESSION['mother_national_num']);
        $query=$this->db->get('family_serv_manzl');
        if($query->num_rows()>0)
        {
            return $query->row()->talab_rkm + 1;
        }else{
            return 1;
        }
    
	}
	function get_last_talab($fe2a_talab, $mother_national_num)
    {
        return $this->db->select('MAX(talab_rkm) as talab_rkm')->where('mother_national_num', $mother_national_num)->get('family_serv_manzl')->row()->talab_rkm + 1;
    }

    function check_talab($fe2a_talab, $mother_national_num)
    {
        return $this->db->select('COUNT(talab_rkm) as total')->where('fe2a_type', $fe2a_talab)->where('suspend', 0)->where('mother_national_num', $mother_national_num)->get('family_serv_manzl')->row()->total;
    }
	public function getMotherChildren($national_id)
	{
		return $this->db->where('mother_national_num_fk',$national_id)->get('f_members')->result();
	}                
	public function add_Manzl_fix($img_file)
	{
		$data['mother_national_num'] = $_SESSION['mother_national_num'];
		$data['talab_rkm'] 	       = $this->input->post('talab_rkm');
		$data['file_num'] 	       =  $_SESSION['file_num'];
		$data['fe2a_type'] 	   = $this->input->post('fe2a_type');
		if($data['fe2a_type']==1)
		{
			$data['elmkan'] 	       = $this->input->post('elmkan_eslah');
			$data['no3_eslah'] 	   = $this->input->post('no3_eslah');
		}
		if($data['fe2a_type']==2)
		{
			$data['elmkan'] 	       = $this->input->post('elmkan_trmem');
			$data['no3_eslah'] 	   = $this->input->post('no3_trmem');
			
		}
		$data['img'] 	   = $img_file;
		$data['notes'] 	   = $this->input->post('notes');
//
       

//
		$data['date_added'] = strtotime(date("m/d/Y"));
        $data['suspend']= 0;
        $this->db->insert('family_serv_manzl',$data);
	}

	public function edit_Manzl_fix($id,$img_file)
	{
		$data['fe2a_type'] 	   = $this->input->post('fe2a_type');
		if($data['fe2a_type']==1)
		{
			$data['elmkan'] 	       = $this->input->post('elmkan_eslah');
			$data['no3_eslah'] 	   = $this->input->post('no3_eslah');
		}
		if($data['fe2a_type']==2)
		{
			$data['elmkan'] 	       = $this->input->post('elmkan_trmem');
			$data['no3_eslah'] 	   = $this->input->post('no3_trmem');
			
		}
		if(!empty($img_file))
		{
		$data['img'] 	   = $img_file;
		}
		$data['notes'] 	   = $this->input->post('notes');
        $this->db->where('id',$id);
		$this->db->update('family_serv_manzl',$data);
	}

	public function selectManzl_fix($national_id)
	{
		return $this->db->select('family_serv_manzl.*, family_serv_setting.title,mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','family_serv_manzl.mother_national_num=mother.mother_national_num_fk','LEFT')
						->join('family_serv_setting','family_serv_manzl.no3_eslah=family_serv_setting.id','LEFT')
						->where('family_serv_manzl.mother_national_num',$national_id)
						->get('family_serv_manzl')
						->result();
	}

	public function selectManzl_fixByID($id)
	{
		return $this->db->select('family_serv_manzl.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','family_serv_manzl.mother_national_num=mother.mother_national_num_fk','LEFT')
						->where('family_serv_manzl.id',$id)
						->get('family_serv_manzl')
						->row_array();
	}

	public function deleteManzl_fix($id)
	{
		$this->db->where('id',$id)->delete('family_serv_manzl');
	}

}

/* End of file Electronic_card_model.php */
/* Location: ./application/models/services_models/Electronic_card_model.php */