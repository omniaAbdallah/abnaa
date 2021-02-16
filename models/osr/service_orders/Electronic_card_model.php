<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Electronic_card_model extends CI_Model {
	public function getMotherChildren($national_id)
	{
		return $this->db->where('mother_national_num_fk',$national_id)->get('f_members')->result();
	}    
	
	
	public function get_last_rkm()
    {
        $this->db->select('talab_rkm');
		$this->db->order_by('id','desc');
		$this->db->where('mother_national_id_fk',$_SESSION['mother_national_num']);
        $query=$this->db->get('family_serv_electronic_card');
        if($query->num_rows()>0)
        {
            return $query->row()->talab_rkm + 1;
        }else{
            return 1;
        }
    
	}
	public function get_last_record()
    {
        $this->db->select('approved ');
		$this->db->order_by('id','desc');
		$this->db->where('mother_national_id_fk',$_SESSION['mother_national_num']);
        $query=$this->db->get('family_serv_electronic_card');
        if($query->num_rows()>0)
        {
            return $query->row()->approved ;
		}
		
    
    }
	public function add_electronic_card()
	{
		$data['mother_national_id_fk'] = $_SESSION['mother_national_num'];
		$data['file_num'] = $_SESSION['file_num'];
		$data['talab_rkm'] 	       = $this->input->post('talab_rkm');
		$data['person_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['national_id'] 	       = $this->input->post('national_id');
		$data['card_service_type'] 	   = $this->input->post('card_service_type');
		$data['notes'] 	   = $this->input->post('notes');

		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
        $data['publisher'] 			   = $_SESSION['user_id'];
        $this->db->insert('family_serv_electronic_card',$data);
	}

	public function edit_electronic_card($id)
	{
		
		$data['person_id_fk'] 	       = $this->input->post('child_id_fk');
		$data['national_id'] 	       = $this->input->post('national_id');
		$data['card_service_type'] 	   = $this->input->post('card_service_type');
		$data['notes'] 	   = $this->input->post('notes');
        $this->db->where('id',$id);
		$this->db->update('family_serv_electronic_card',$data);
	}

	public function selectElectronic_card($national_id)
	{
		return $this->db->select('family_serv_electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name')
						->join('mother','family_serv_electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->join('f_members','family_serv_electronic_card.person_id_fk=f_members.id','LEFT')
						->where('family_serv_electronic_card.mother_national_id_fk',$national_id)
						->get('family_serv_electronic_card')
						->result();
	}

	public function selectElectronic_cardByID($id)
	{
		return $this->db->select('family_serv_electronic_card.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','family_serv_electronic_card.mother_national_id_fk=mother.mother_national_num_fk','LEFT')
						->where('family_serv_electronic_card.id',$id)
						->get('family_serv_electronic_card')
						->row_array();
	}

	public function deleteElectronic_card($id)
	{
		$this->db->where('id',$id)->delete('family_serv_electronic_card');
	}

	public function check_national_num($child_id_fk)
    {
        $this->db->select('member_card_num');
        $this->db->from("f_members");
        $this->db->where("id", $child_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			//return 1;
			return $query->row()->member_card_num ;
        }
        return 0;
    }

}

/* End of file Electronic_card_model.php */
/* Location: ./application/models/services_models/Electronic_card_model.php */