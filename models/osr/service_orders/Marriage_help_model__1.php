<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marriage_help_model extends CI_Model {
	public function getMotherChildren($national_id)
	{
		return $this->db->where('mother_national_num_fk',$national_id)->get('f_members')->result();
	}
	public function add_help($files)
	{
		$data['mother_national_num'] = $_SESSION['mother_national_num'];
		$data['file_num'] =	$_SESSION['file_num'];
		$person=explode('-',$this->input->post('person_id_fk'));
		$data['person_id_fk'] 	       = $person[0];
		$data['person_name'] 	       = $person[1];
		$data['makan_zawaj'] 				   = $this->input->post('makan_zawaj');
		$data['date_zawaj'] 		   = $this->input->post('date_zawaj');
		$data['rkm_akd'] 	   = $this->input->post('rkm_akd');
		$data['date_akd'] 		   = $this->input->post('date_akd');
		$data['geha_esdar_akd'] 	   = $this->input->post('geha_esdar_akd');
		$data['mahr_value']			   = $this->input->post('mahr_value');
		$data['gensia_husband']	   = $this->input->post('gensia_husband');
		$data['national_num_husband']		   = $this->input->post('national_num_husband');
		$data['national_num_husband_type']		   = $this->input->post('national_num_husband_type');
		$data['first_zawaj']		   = $this->input->post('first_zawaj');
		$data['jwal'] 			   = $this->input->post('jwal');
		$data['date']			       = strtotime(date("m/d/Y"));
        $data['date_s']				   = time();
		$data['publisher'] 			   = $_SESSION['user_id'];
		$data['suspend'] 			   = 0;
		foreach ($files as $key => $value) {
			if($value != '') {
				$data[$key] = $value;
			}
		}
		$this->db->insert('family_serv_zawaj',$data);
	}

	public function edit_help($files,$id)
	{
		$person=explode('-',$this->input->post('person_id_fk'));
		$data['person_id_fk'] 	       = $person[0];
		$data['person_name'] 	       = $person[1];
		$data['makan_zawaj'] 				   = $this->input->post('makan_zawaj');
		$data['date_zawaj'] 		   = $this->input->post('date_zawaj');
		$data['rkm_akd'] 	   = $this->input->post('rkm_akd');
		$data['date_akd'] 		   = $this->input->post('date_akd');
		$data['geha_esdar_akd'] 	   = $this->input->post('geha_esdar_akd');
		$data['mahr_value']			   = $this->input->post('mahr_value');
		$data['gensia_husband']	   = $this->input->post('gensia_husband');
		$data['national_num_husband']		   = $this->input->post('national_num_husband');
		$data['national_num_husband_type']		   = $this->input->post('national_num_husband_type');
		$data['first_zawaj']		   = $this->input->post('first_zawaj');
		$data['jwal'] 			   = $this->input->post('jwal');
		foreach ($files as $key => $value) {
			if(!empty($value)&& $value != '') {
				$data[$key] = $value;
			}
		}
		$this->db->where('id',$id);
		$this->db->update('family_serv_zawaj',$data);
	}

	public function selectMarriage_help($national_id)
	{
		return $this->db->select('family_serv_zawaj.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob, f_members.member_full_name, nationality.title_setting AS nationality')
						->join('mother','family_serv_zawaj.mother_national_num=mother.mother_national_num_fk','LEFT')
					
						->join('family_setting nationality','family_serv_zawaj.national_num_husband=nationality.id_setting','LEFT')
						->join('f_members','family_serv_zawaj.person_id_fk=f_members.id','LEFT')
						->where('family_serv_zawaj.mother_national_num',$national_id)
						->get('family_serv_zawaj')
						->result();
	}

	public function getSetting($where)
	{
		return $this->db->where($where)->get('family_setting')->result();
	}

	public function selectMarriage_helpByID($id)
	{
		return $this->db->select('family_serv_zawaj.*, mother.full_name, mother.m_birth_date_hijri, mother.m_mob')
						->join('mother','family_serv_zawaj.mother_national_num=mother.mother_national_num_fk','LEFT')
						->where('family_serv_zawaj.id',$id)
						->get('family_serv_zawaj')
						->row_array();
	}

	public function deleteMarriage_help($id)
	{
		$this->db->where('id',$id)->delete('family_serv_zawaj');
	}

}

/* End of file Marriage_help_model.php */
/* Location: ./application/models/services_models/Marriage_help_model.php */